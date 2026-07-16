<?php
declare(strict_types=1);

// TelegramBot SDK

require_once __DIR__ . '/utility/struct/Struct.php';
require_once __DIR__ . '/core/UtilityType.php';
require_once __DIR__ . '/core/Spec.php';
require_once __DIR__ . '/core/Helpers.php';

// Load utility registration
require_once __DIR__ . '/utility/Register.php';

// Load config and features
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/feature/BaseFeature.php';
require_once __DIR__ . '/features.php';

use Voxgig\Struct\Struct;

// Features record diagnostic state on the client as dynamic properties
// (_retry, _cache, _metrics, ...); allow them explicitly (PHP 8.2+
// deprecates implicit dynamic properties).
#[\AllowDynamicProperties]
class TelegramBotSDK
{
    public string $mode;
    public array $features;
    public ?array $options;

    private $_utility;
    private $_rootctx;

    public function __construct(array $options = [])
    {
        $this->mode = "live";
        $this->features = [];
        $this->options = null;

        $utility = new TelegramBotUtility();
        $this->_utility = $utility;

        $config = TelegramBotConfig::make_config();

        $this->_rootctx = ($utility->make_context)([
            "client" => $this,
            "utility" => $utility,
            "config" => $config,
            "options" => $options ?? [],
            "shared" => [],
        ], null);

        $this->options = ($utility->make_options)($this->_rootctx);

        if (Struct::getpath($this->options, "feature.test.active") === true) {
            $this->mode = "test";
        }

        $this->_rootctx->options = $this->options;

        // Add features in the resolved order (make_options puts an explicit
        // list order first, else defaults to test-first). Ordering matters: the
        // `test` feature installs the base mock transport and the transport
        // features (retry/cache/netsim/proxy/ratelimit) wrap whatever is
        // current, so `test` must be added before them to sit at the base.
        $feature_opts = TelegramBotHelpers::to_map(Struct::getprop($this->options, "feature"));
        if ($feature_opts) {
            $featureorder = Struct::getpath($this->options, "__derived__.featureorder");
            if (is_array($featureorder)) {
                foreach ($featureorder as $fname) {
                    $fopts = TelegramBotHelpers::to_map($feature_opts[$fname] ?? null);
                    if ($fopts && isset($fopts["active"]) && $fopts["active"] === true) {
                        ($utility->feature_add)($this->_rootctx, TelegramBotFeatures::make_feature($fname));
                    }
                }
            }
        }

        // Add extension features.
        $extend_val = Struct::getprop($this->options, "extend");
        if (is_array($extend_val)) {
            foreach ($extend_val as $f) {
                if (is_object($f) && method_exists($f, 'get_name')) {
                    ($utility->feature_add)($this->_rootctx, $f);
                }
            }
        }

        // Initialize features.
        foreach ($this->features as $f) {
            ($utility->feature_init)($this->_rootctx, $f);
        }

        ($utility->feature_hook)($this->_rootctx, "PostConstruct");
    }

    public function options_map(): array
    {
        $out = Struct::clone($this->options);
        return is_array($out) ? $out : [];
    }

    public function get_utility()
    {
        return TelegramBotUtility::copy($this->_utility);
    }

    public function get_root_ctx()
    {
        return $this->_rootctx;
    }

    public function prepare(array $fetchargs = []): mixed
    {
        $utility = $this->_utility;
        $fetchargs = $fetchargs ?? [];

        $ctrl = TelegramBotHelpers::to_map(Struct::getprop($fetchargs, "ctrl")) ?? [];

        $ctx = ($utility->make_context)([
            "opname" => "prepare",
            "ctrl" => $ctrl,
        ], $this->_rootctx);

        $opts = $this->options;
        $path = Struct::getprop($fetchargs, "path") ?? "";
        $path = is_string($path) ? $path : "";
        $method_val = Struct::getprop($fetchargs, "method") ?? "GET";
        $method_val = is_string($method_val) ? $method_val : "GET";
        $params = TelegramBotHelpers::to_map(Struct::getprop($fetchargs, "params")) ?? [];
        $query = TelegramBotHelpers::to_map(Struct::getprop($fetchargs, "query")) ?? [];
        $headers = ($utility->prepare_headers)($ctx);

        $base = Struct::getprop($opts, "base") ?? "";
        $base = is_string($base) ? $base : "";
        $prefix = Struct::getprop($opts, "prefix") ?? "";
        $prefix = is_string($prefix) ? $prefix : "";
        $suffix = Struct::getprop($opts, "suffix") ?? "";
        $suffix = is_string($suffix) ? $suffix : "";

        $ctx->spec = new TelegramBotSpec([
            "base" => $base, "prefix" => $prefix, "suffix" => $suffix,
            "path" => $path, "method" => $method_val,
            "params" => $params, "query" => $query, "headers" => $headers,
            "body" => Struct::getprop($fetchargs, "body"),
            "step" => "start",
        ]);

        // Merge user-provided headers.
        $uh = Struct::getprop($fetchargs, "headers");
        if (is_array($uh)) {
            foreach ($uh as $k => $v) {
                $ctx->spec->headers[$k] = $v;
            }
        }

        [$_, $err] = ($utility->prepare_auth)($ctx);
        if ($err) {
            return ($utility->make_error)($ctx, $err);
        }

        [$fetchdef, $fd_err] = ($utility->make_fetch_def)($ctx);
        if ($fd_err) {
            return ($utility->make_error)($ctx, $fd_err);
        }
        return $fetchdef;
    }

    public function direct(array $fetchargs = []): mixed
    {
        $utility = $this->_utility;

        // direct() is the raw-HTTP escape hatch: it never throws, it returns
        // an {ok, err, ...} dict. prepare() now raises on error, so catch it
        // and surface the failure through the dict instead.
        try {
            $fetchdef = $this->prepare($fetchargs);
        } catch (\Throwable $err) {
            return ["ok" => false, "err" => $err];
        }

        $fetchargs = $fetchargs ?? [];
        $ctrl = TelegramBotHelpers::to_map(Struct::getprop($fetchargs, "ctrl")) ?? [];

        $ctx = ($utility->make_context)([
            "opname" => "direct",
            "ctrl" => $ctrl,
        ], $this->_rootctx);

        $url = $fetchdef["url"] ?? "";
        [$fetched, $fetch_err] = ($utility->fetcher)($ctx, $url, $fetchdef);

        if ($fetch_err) {
            return ["ok" => false, "err" => $fetch_err];
        }

        if ($fetched === null) {
            return [
                "ok" => false,
                "err" => $ctx->make_error("direct_no_response", "response: undefined"),
            ];
        }

        if (is_array($fetched)) {
            $status = TelegramBotHelpers::to_int(Struct::getprop($fetched, "status"));
            $headers = Struct::getprop($fetched, "headers") ?? [];

            // No-body responses (204, 304) and explicit zero content-length
            // must skip JSON parsing — calling json() on an empty body errors.
            $content_length = is_array($headers) ? ($headers["content-length"] ?? null) : null;
            $no_body = $status === 204 || $status === 304 || (string)$content_length === "0";

            $json_data = null;
            if (!$no_body) {
                $jf = Struct::getprop($fetched, "json");
                if (is_callable($jf)) {
                    try {
                        $json_data = $jf();
                    } catch (\Throwable $e) {
                        // Non-JSON body — leave data null but keep status/ok.
                        $json_data = null;
                    }
                }
            }

            return [
                "ok" => $status >= 200 && $status < 300,
                "status" => $status,
                "headers" => Struct::getprop($fetched, "headers"),
                "data" => $json_data,
            ];
        }

        return [
            "ok" => false,
            "err" => $ctx->make_error("direct_invalid", "invalid response type"),
        ];
    }


    private $_approve_suggested_post = null;

    // Canonical facade: $client->ApproveSuggestedPost()->list() / ->load(["id" => ...]).
    // PHP method names are case-insensitive, so lowercase $client->approve_suggested_post()
    // resolves here too.
    public function ApproveSuggestedPost($data = null)
    {
        require_once __DIR__ . '/entity/approve_suggested_post_entity.php';
        if ($data === null) {
            if ($this->_approve_suggested_post === null) {
                $this->_approve_suggested_post = new ApproveSuggestedPostEntity($this, null);
            }
            return $this->_approve_suggested_post;
        }
        return new ApproveSuggestedPostEntity($this, $data);
    }


    private $_decline_suggested_post = null;

    // Canonical facade: $client->DeclineSuggestedPost()->list() / ->load(["id" => ...]).
    // PHP method names are case-insensitive, so lowercase $client->decline_suggested_post()
    // resolves here too.
    public function DeclineSuggestedPost($data = null)
    {
        require_once __DIR__ . '/entity/decline_suggested_post_entity.php';
        if ($data === null) {
            if ($this->_decline_suggested_post === null) {
                $this->_decline_suggested_post = new DeclineSuggestedPostEntity($this, null);
            }
            return $this->_decline_suggested_post;
        }
        return new DeclineSuggestedPostEntity($this, $data);
    }


    private $_delete_forum_topic = null;

    // Canonical facade: $client->DeleteForumTopic()->list() / ->load(["id" => ...]).
    // PHP method names are case-insensitive, so lowercase $client->delete_forum_topic()
    // resolves here too.
    public function DeleteForumTopic($data = null)
    {
        require_once __DIR__ . '/entity/delete_forum_topic_entity.php';
        if ($data === null) {
            if ($this->_delete_forum_topic === null) {
                $this->_delete_forum_topic = new DeleteForumTopicEntity($this, null);
            }
            return $this->_delete_forum_topic;
        }
        return new DeleteForumTopicEntity($this, $data);
    }


    private $_edit_forum_topic = null;

    // Canonical facade: $client->EditForumTopic()->list() / ->load(["id" => ...]).
    // PHP method names are case-insensitive, so lowercase $client->edit_forum_topic()
    // resolves here too.
    public function EditForumTopic($data = null)
    {
        require_once __DIR__ . '/entity/edit_forum_topic_entity.php';
        if ($data === null) {
            if ($this->_edit_forum_topic === null) {
                $this->_edit_forum_topic = new EditForumTopicEntity($this, null);
            }
            return $this->_edit_forum_topic;
        }
        return new EditForumTopicEntity($this, $data);
    }


    private $_file = null;

    // Canonical facade: $client->File()->list() / ->load(["id" => ...]).
    // PHP method names are case-insensitive, so lowercase $client->file()
    // resolves here too.
    public function File($data = null)
    {
        require_once __DIR__ . '/entity/file_entity.php';
        if ($data === null) {
            if ($this->_file === null) {
                $this->_file = new FileEntity($this, null);
            }
            return $this->_file;
        }
        return new FileEntity($this, $data);
    }


    private $_forum_topic = null;

    // Canonical facade: $client->ForumTopic()->list() / ->load(["id" => ...]).
    // PHP method names are case-insensitive, so lowercase $client->forum_topic()
    // resolves here too.
    public function ForumTopic($data = null)
    {
        require_once __DIR__ . '/entity/forum_topic_entity.php';
        if ($data === null) {
            if ($this->_forum_topic === null) {
                $this->_forum_topic = new ForumTopicEntity($this, null);
            }
            return $this->_forum_topic;
        }
        return new ForumTopicEntity($this, $data);
    }


    private $_get_business_account_gift = null;

    // Canonical facade: $client->GetBusinessAccountGift()->list() / ->load(["id" => ...]).
    // PHP method names are case-insensitive, so lowercase $client->get_business_account_gift()
    // resolves here too.
    public function GetBusinessAccountGift($data = null)
    {
        require_once __DIR__ . '/entity/get_business_account_gift_entity.php';
        if ($data === null) {
            if ($this->_get_business_account_gift === null) {
                $this->_get_business_account_gift = new GetBusinessAccountGiftEntity($this, null);
            }
            return $this->_get_business_account_gift;
        }
        return new GetBusinessAccountGiftEntity($this, $data);
    }


    private $_get_chat_gift = null;

    // Canonical facade: $client->GetChatGift()->list() / ->load(["id" => ...]).
    // PHP method names are case-insensitive, so lowercase $client->get_chat_gift()
    // resolves here too.
    public function GetChatGift($data = null)
    {
        require_once __DIR__ . '/entity/get_chat_gift_entity.php';
        if ($data === null) {
            if ($this->_get_chat_gift === null) {
                $this->_get_chat_gift = new GetChatGiftEntity($this, null);
            }
            return $this->_get_chat_gift;
        }
        return new GetChatGiftEntity($this, $data);
    }


    private $_get_me = null;

    // Canonical facade: $client->GetMe()->list() / ->load(["id" => ...]).
    // PHP method names are case-insensitive, so lowercase $client->get_me()
    // resolves here too.
    public function GetMe($data = null)
    {
        require_once __DIR__ . '/entity/get_me_entity.php';
        if ($data === null) {
            if ($this->_get_me === null) {
                $this->_get_me = new GetMeEntity($this, null);
            }
            return $this->_get_me;
        }
        return new GetMeEntity($this, $data);
    }


    private $_get_user_gift = null;

    // Canonical facade: $client->GetUserGift()->list() / ->load(["id" => ...]).
    // PHP method names are case-insensitive, so lowercase $client->get_user_gift()
    // resolves here too.
    public function GetUserGift($data = null)
    {
        require_once __DIR__ . '/entity/get_user_gift_entity.php';
        if ($data === null) {
            if ($this->_get_user_gift === null) {
                $this->_get_user_gift = new GetUserGiftEntity($this, null);
            }
            return $this->_get_user_gift;
        }
        return new GetUserGiftEntity($this, $data);
    }


    private $_get_user_profile_audio = null;

    // Canonical facade: $client->GetUserProfileAudio()->list() / ->load(["id" => ...]).
    // PHP method names are case-insensitive, so lowercase $client->get_user_profile_audio()
    // resolves here too.
    public function GetUserProfileAudio($data = null)
    {
        require_once __DIR__ . '/entity/get_user_profile_audio_entity.php';
        if ($data === null) {
            if ($this->_get_user_profile_audio === null) {
                $this->_get_user_profile_audio = new GetUserProfileAudioEntity($this, null);
            }
            return $this->_get_user_profile_audio;
        }
        return new GetUserProfileAudioEntity($this, $data);
    }


    private $_message = null;

    // Canonical facade: $client->Message()->list() / ->load(["id" => ...]).
    // PHP method names are case-insensitive, so lowercase $client->message()
    // resolves here too.
    public function Message($data = null)
    {
        require_once __DIR__ . '/entity/message_entity.php';
        if ($data === null) {
            if ($this->_message === null) {
                $this->_message = new MessageEntity($this, null);
            }
            return $this->_message;
        }
        return new MessageEntity($this, $data);
    }


    private $_message_id = null;

    // Canonical facade: $client->MessageId()->list() / ->load(["id" => ...]).
    // PHP method names are case-insensitive, so lowercase $client->message_id()
    // resolves here too.
    public function MessageId($data = null)
    {
        require_once __DIR__ . '/entity/message_id_entity.php';
        if ($data === null) {
            if ($this->_message_id === null) {
                $this->_message_id = new MessageIdEntity($this, null);
            }
            return $this->_message_id;
        }
        return new MessageIdEntity($this, $data);
    }


    private $_promote_chat_member = null;

    // Canonical facade: $client->PromoteChatMember()->list() / ->load(["id" => ...]).
    // PHP method names are case-insensitive, so lowercase $client->promote_chat_member()
    // resolves here too.
    public function PromoteChatMember($data = null)
    {
        require_once __DIR__ . '/entity/promote_chat_member_entity.php';
        if ($data === null) {
            if ($this->_promote_chat_member === null) {
                $this->_promote_chat_member = new PromoteChatMemberEntity($this, null);
            }
            return $this->_promote_chat_member;
        }
        return new PromoteChatMemberEntity($this, $data);
    }


    private $_remove_my_profile_photo = null;

    // Canonical facade: $client->RemoveMyProfilePhoto()->list() / ->load(["id" => ...]).
    // PHP method names are case-insensitive, so lowercase $client->remove_my_profile_photo()
    // resolves here too.
    public function RemoveMyProfilePhoto($data = null)
    {
        require_once __DIR__ . '/entity/remove_my_profile_photo_entity.php';
        if ($data === null) {
            if ($this->_remove_my_profile_photo === null) {
                $this->_remove_my_profile_photo = new RemoveMyProfilePhotoEntity($this, null);
            }
            return $this->_remove_my_profile_photo;
        }
        return new RemoveMyProfilePhotoEntity($this, $data);
    }


    private $_repost_story = null;

    // Canonical facade: $client->RepostStory()->list() / ->load(["id" => ...]).
    // PHP method names are case-insensitive, so lowercase $client->repost_story()
    // resolves here too.
    public function RepostStory($data = null)
    {
        require_once __DIR__ . '/entity/repost_story_entity.php';
        if ($data === null) {
            if ($this->_repost_story === null) {
                $this->_repost_story = new RepostStoryEntity($this, null);
            }
            return $this->_repost_story;
        }
        return new RepostStoryEntity($this, $data);
    }


    private $_send_chat_action = null;

    // Canonical facade: $client->SendChatAction()->list() / ->load(["id" => ...]).
    // PHP method names are case-insensitive, so lowercase $client->send_chat_action()
    // resolves here too.
    public function SendChatAction($data = null)
    {
        require_once __DIR__ . '/entity/send_chat_action_entity.php';
        if ($data === null) {
            if ($this->_send_chat_action === null) {
                $this->_send_chat_action = new SendChatActionEntity($this, null);
            }
            return $this->_send_chat_action;
        }
        return new SendChatActionEntity($this, $data);
    }


    private $_send_message_draft = null;

    // Canonical facade: $client->SendMessageDraft()->list() / ->load(["id" => ...]).
    // PHP method names are case-insensitive, so lowercase $client->send_message_draft()
    // resolves here too.
    public function SendMessageDraft($data = null)
    {
        require_once __DIR__ . '/entity/send_message_draft_entity.php';
        if ($data === null) {
            if ($this->_send_message_draft === null) {
                $this->_send_message_draft = new SendMessageDraftEntity($this, null);
            }
            return $this->_send_message_draft;
        }
        return new SendMessageDraftEntity($this, $data);
    }


    private $_set_my_profile_photo = null;

    // Canonical facade: $client->SetMyProfilePhoto()->list() / ->load(["id" => ...]).
    // PHP method names are case-insensitive, so lowercase $client->set_my_profile_photo()
    // resolves here too.
    public function SetMyProfilePhoto($data = null)
    {
        require_once __DIR__ . '/entity/set_my_profile_photo_entity.php';
        if ($data === null) {
            if ($this->_set_my_profile_photo === null) {
                $this->_set_my_profile_photo = new SetMyProfilePhotoEntity($this, null);
            }
            return $this->_set_my_profile_photo;
        }
        return new SetMyProfilePhotoEntity($this, $data);
    }


    private $_unpin_all_forum_topic_message = null;

    // Canonical facade: $client->UnpinAllForumTopicMessage()->list() / ->load(["id" => ...]).
    // PHP method names are case-insensitive, so lowercase $client->unpin_all_forum_topic_message()
    // resolves here too.
    public function UnpinAllForumTopicMessage($data = null)
    {
        require_once __DIR__ . '/entity/unpin_all_forum_topic_message_entity.php';
        if ($data === null) {
            if ($this->_unpin_all_forum_topic_message === null) {
                $this->_unpin_all_forum_topic_message = new UnpinAllForumTopicMessageEntity($this, null);
            }
            return $this->_unpin_all_forum_topic_message;
        }
        return new UnpinAllForumTopicMessageEntity($this, $data);
    }


    private $_update = null;

    // Canonical facade: $client->Update()->list() / ->load(["id" => ...]).
    // PHP method names are case-insensitive, so lowercase $client->update()
    // resolves here too.
    public function Update($data = null)
    {
        require_once __DIR__ . '/entity/update_entity.php';
        if ($data === null) {
            if ($this->_update === null) {
                $this->_update = new UpdateEntity($this, null);
            }
            return $this->_update;
        }
        return new UpdateEntity($this, $data);
    }



    public static function test(?array $testopts = null, ?array $sdkopts = null): self
    {
        $sdkopts = $sdkopts ?? [];
        $sdkopts = Struct::clone($sdkopts);
        $sdkopts = is_array($sdkopts) ? $sdkopts : [];

        $testopts = $testopts ?? [];
        $testopts = Struct::clone($testopts);
        $testopts = is_array($testopts) ? $testopts : [];
        $testopts["active"] = true;

        if (!isset($sdkopts["feature"])) {
            $sdkopts["feature"] = [];
        }
        $sdkopts["feature"]["test"] = $testopts;

        $sdk = new TelegramBotSDK($sdkopts);
        $sdk->mode = "test";
        return $sdk;
    }
}
