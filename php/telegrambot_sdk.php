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

        // Add features from config.
        $feature_opts = TelegramBotHelpers::to_map(Struct::getprop($this->options, "feature"));
        if ($feature_opts) {
            $items = Struct::items($feature_opts);
            if ($items) {
                foreach ($items as $item) {
                    $fname = $item[0];
                    $fopts = TelegramBotHelpers::to_map($item[1]);
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

    // Idiomatic facade: $client->approve_suggested_post()->list() / ->load(["id" => ...]).
    // Also serves the deprecated PascalCase alias ApproveSuggestedPost() (PHP method
    // names are case-insensitive).
    public function approve_suggested_post($data = null)
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

    // Idiomatic facade: $client->decline_suggested_post()->list() / ->load(["id" => ...]).
    // Also serves the deprecated PascalCase alias DeclineSuggestedPost() (PHP method
    // names are case-insensitive).
    public function decline_suggested_post($data = null)
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

    // Idiomatic facade: $client->delete_forum_topic()->list() / ->load(["id" => ...]).
    // Also serves the deprecated PascalCase alias DeleteForumTopic() (PHP method
    // names are case-insensitive).
    public function delete_forum_topic($data = null)
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

    // Idiomatic facade: $client->edit_forum_topic()->list() / ->load(["id" => ...]).
    // Also serves the deprecated PascalCase alias EditForumTopic() (PHP method
    // names are case-insensitive).
    public function edit_forum_topic($data = null)
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

    // Idiomatic facade: $client->file()->list() / ->load(["id" => ...]).
    // Also serves the deprecated PascalCase alias File() (PHP method
    // names are case-insensitive).
    public function file($data = null)
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

    // Idiomatic facade: $client->forum_topic()->list() / ->load(["id" => ...]).
    // Also serves the deprecated PascalCase alias ForumTopic() (PHP method
    // names are case-insensitive).
    public function forum_topic($data = null)
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

    // Idiomatic facade: $client->get_business_account_gift()->list() / ->load(["id" => ...]).
    // Also serves the deprecated PascalCase alias GetBusinessAccountGift() (PHP method
    // names are case-insensitive).
    public function get_business_account_gift($data = null)
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

    // Idiomatic facade: $client->get_chat_gift()->list() / ->load(["id" => ...]).
    // Also serves the deprecated PascalCase alias GetChatGift() (PHP method
    // names are case-insensitive).
    public function get_chat_gift($data = null)
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

    // Idiomatic facade: $client->get_me()->list() / ->load(["id" => ...]).
    // Also serves the deprecated PascalCase alias GetMe() (PHP method
    // names are case-insensitive).
    public function get_me($data = null)
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

    // Idiomatic facade: $client->get_user_gift()->list() / ->load(["id" => ...]).
    // Also serves the deprecated PascalCase alias GetUserGift() (PHP method
    // names are case-insensitive).
    public function get_user_gift($data = null)
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

    // Idiomatic facade: $client->get_user_profile_audio()->list() / ->load(["id" => ...]).
    // Also serves the deprecated PascalCase alias GetUserProfileAudio() (PHP method
    // names are case-insensitive).
    public function get_user_profile_audio($data = null)
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

    // Idiomatic facade: $client->message()->list() / ->load(["id" => ...]).
    // Also serves the deprecated PascalCase alias Message() (PHP method
    // names are case-insensitive).
    public function message($data = null)
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

    // Idiomatic facade: $client->message_id()->list() / ->load(["id" => ...]).
    // Also serves the deprecated PascalCase alias MessageId() (PHP method
    // names are case-insensitive).
    public function message_id($data = null)
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

    // Idiomatic facade: $client->promote_chat_member()->list() / ->load(["id" => ...]).
    // Also serves the deprecated PascalCase alias PromoteChatMember() (PHP method
    // names are case-insensitive).
    public function promote_chat_member($data = null)
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

    // Idiomatic facade: $client->remove_my_profile_photo()->list() / ->load(["id" => ...]).
    // Also serves the deprecated PascalCase alias RemoveMyProfilePhoto() (PHP method
    // names are case-insensitive).
    public function remove_my_profile_photo($data = null)
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

    // Idiomatic facade: $client->repost_story()->list() / ->load(["id" => ...]).
    // Also serves the deprecated PascalCase alias RepostStory() (PHP method
    // names are case-insensitive).
    public function repost_story($data = null)
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

    // Idiomatic facade: $client->send_chat_action()->list() / ->load(["id" => ...]).
    // Also serves the deprecated PascalCase alias SendChatAction() (PHP method
    // names are case-insensitive).
    public function send_chat_action($data = null)
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

    // Idiomatic facade: $client->send_message_draft()->list() / ->load(["id" => ...]).
    // Also serves the deprecated PascalCase alias SendMessageDraft() (PHP method
    // names are case-insensitive).
    public function send_message_draft($data = null)
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

    // Idiomatic facade: $client->set_my_profile_photo()->list() / ->load(["id" => ...]).
    // Also serves the deprecated PascalCase alias SetMyProfilePhoto() (PHP method
    // names are case-insensitive).
    public function set_my_profile_photo($data = null)
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

    // Idiomatic facade: $client->unpin_all_forum_topic_message()->list() / ->load(["id" => ...]).
    // Also serves the deprecated PascalCase alias UnpinAllForumTopicMessage() (PHP method
    // names are case-insensitive).
    public function unpin_all_forum_topic_message($data = null)
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

    // Idiomatic facade: $client->update()->list() / ->load(["id" => ...]).
    // Also serves the deprecated PascalCase alias Update() (PHP method
    // names are case-insensitive).
    public function update($data = null)
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
