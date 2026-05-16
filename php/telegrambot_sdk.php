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

    public function prepare(array $fetchargs = []): array
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
            return [null, $err];
        }

        return ($utility->make_fetch_def)($ctx);
    }

    public function direct(array $fetchargs = []): array
    {
        $utility = $this->_utility;

        [$fetchdef, $err] = $this->prepare($fetchargs);
        if ($err) {
            return [["ok" => false, "err" => $err], null];
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
            return [["ok" => false, "err" => $fetch_err], null];
        }

        if ($fetched === null) {
            return [[
                "ok" => false,
                "err" => $ctx->make_error("direct_no_response", "response: undefined"),
            ], null];
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

            return [[
                "ok" => $status >= 200 && $status < 300,
                "status" => $status,
                "headers" => Struct::getprop($fetched, "headers"),
                "data" => $json_data,
            ], null];
        }

        return [[
            "ok" => false,
            "err" => $ctx->make_error("direct_invalid", "invalid response type"),
        ], null];
    }


    public function ApproveSuggestedPost($data = null)
    {
        require_once __DIR__ . '/entity/approve_suggested_post_entity.php';
        return new ApproveSuggestedPostEntity($this, $data);
    }


    public function DeclineSuggestedPost($data = null)
    {
        require_once __DIR__ . '/entity/decline_suggested_post_entity.php';
        return new DeclineSuggestedPostEntity($this, $data);
    }


    public function DeleteForumTopic($data = null)
    {
        require_once __DIR__ . '/entity/delete_forum_topic_entity.php';
        return new DeleteForumTopicEntity($this, $data);
    }


    public function EditForumTopic($data = null)
    {
        require_once __DIR__ . '/entity/edit_forum_topic_entity.php';
        return new EditForumTopicEntity($this, $data);
    }


    public function File($data = null)
    {
        require_once __DIR__ . '/entity/file_entity.php';
        return new FileEntity($this, $data);
    }


    public function ForumTopic($data = null)
    {
        require_once __DIR__ . '/entity/forum_topic_entity.php';
        return new ForumTopicEntity($this, $data);
    }


    public function GetBusinessAccountGift($data = null)
    {
        require_once __DIR__ . '/entity/get_business_account_gift_entity.php';
        return new GetBusinessAccountGiftEntity($this, $data);
    }


    public function GetChatGift($data = null)
    {
        require_once __DIR__ . '/entity/get_chat_gift_entity.php';
        return new GetChatGiftEntity($this, $data);
    }


    public function GetMe($data = null)
    {
        require_once __DIR__ . '/entity/get_me_entity.php';
        return new GetMeEntity($this, $data);
    }


    public function GetUserGift($data = null)
    {
        require_once __DIR__ . '/entity/get_user_gift_entity.php';
        return new GetUserGiftEntity($this, $data);
    }


    public function GetUserProfileAudio($data = null)
    {
        require_once __DIR__ . '/entity/get_user_profile_audio_entity.php';
        return new GetUserProfileAudioEntity($this, $data);
    }


    public function Message($data = null)
    {
        require_once __DIR__ . '/entity/message_entity.php';
        return new MessageEntity($this, $data);
    }


    public function MessageId($data = null)
    {
        require_once __DIR__ . '/entity/message_id_entity.php';
        return new MessageIdEntity($this, $data);
    }


    public function PromoteChatMember($data = null)
    {
        require_once __DIR__ . '/entity/promote_chat_member_entity.php';
        return new PromoteChatMemberEntity($this, $data);
    }


    public function RemoveMyProfilePhoto($data = null)
    {
        require_once __DIR__ . '/entity/remove_my_profile_photo_entity.php';
        return new RemoveMyProfilePhotoEntity($this, $data);
    }


    public function RepostStory($data = null)
    {
        require_once __DIR__ . '/entity/repost_story_entity.php';
        return new RepostStoryEntity($this, $data);
    }


    public function SendChatAction($data = null)
    {
        require_once __DIR__ . '/entity/send_chat_action_entity.php';
        return new SendChatActionEntity($this, $data);
    }


    public function SendMessageDraft($data = null)
    {
        require_once __DIR__ . '/entity/send_message_draft_entity.php';
        return new SendMessageDraftEntity($this, $data);
    }


    public function SetMyProfilePhoto($data = null)
    {
        require_once __DIR__ . '/entity/set_my_profile_photo_entity.php';
        return new SetMyProfilePhotoEntity($this, $data);
    }


    public function UnpinAllForumTopicMessage($data = null)
    {
        require_once __DIR__ . '/entity/unpin_all_forum_topic_message_entity.php';
        return new UnpinAllForumTopicMessageEntity($this, $data);
    }


    public function Update($data = null)
    {
        require_once __DIR__ . '/entity/update_entity.php';
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
