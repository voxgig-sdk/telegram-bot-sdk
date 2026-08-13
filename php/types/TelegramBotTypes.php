<?php
declare(strict_types=1);

// Typed models for the TelegramBot SDK.
//
// GENERATED from the API model: main.kit.entity.<e>.fields[] and per-op
// params (op.<name>.points[].args.params[]). Field/param types come from the
// canonical type sentinels via @voxgig/sdkgen canonToType (source of truth:
// @voxgig/apidef VALID_CANON). Do not edit by hand.
//
// These are documentation-grade value objects (PHP 8 typed properties),
// registered on the composer classmap autoload. The SDK boundary exchanges
// assoc-arrays; these classes name the shapes for tooling and typed callers.

/** ApproveSuggestedPost entity data model. */
class ApproveSuggestedPost
{
    public string $chat_id;
    public ?string $description = null;
    public ?int $error_code = null;
    public int $message_id;
    public bool $ok;
    public ?array $parameters = null;
    public ?array $result = null;
}

/** Request payload for ApproveSuggestedPost#create. */
class ApproveSuggestedPostCreateData
{
    public string $chat_id;
    public ?string $description = null;
    public ?int $error_code = null;
    public int $message_id;
    public bool $ok;
    public ?array $parameters = null;
    public ?array $result = null;
}

/** DeclineSuggestedPost entity data model. */
class DeclineSuggestedPost
{
    public string $chat_id;
    public ?string $description = null;
    public ?int $error_code = null;
    public int $message_id;
    public bool $ok;
    public ?array $parameters = null;
    public ?array $result = null;
}

/** Request payload for DeclineSuggestedPost#create. */
class DeclineSuggestedPostCreateData
{
    public string $chat_id;
    public ?string $description = null;
    public ?int $error_code = null;
    public int $message_id;
    public bool $ok;
    public ?array $parameters = null;
    public ?array $result = null;
}

/** DeleteForumTopic entity data model. */
class DeleteForumTopic
{
    public string $chat_id;
    public ?string $description = null;
    public ?int $error_code = null;
    public int $message_thread_id;
    public bool $ok;
    public ?array $parameters = null;
    public ?array $result = null;
}

/** Request payload for DeleteForumTopic#create. */
class DeleteForumTopicCreateData
{
    public string $chat_id;
    public ?string $description = null;
    public ?int $error_code = null;
    public int $message_thread_id;
    public bool $ok;
    public ?array $parameters = null;
    public ?array $result = null;
}

/** EditForumTopic entity data model. */
class EditForumTopic
{
    public string $chat_id;
    public ?string $description = null;
    public ?int $error_code = null;
    public ?string $icon_custom_emoji_id = null;
    public int $message_thread_id;
    public ?string $name = null;
    public bool $ok;
    public ?array $parameters = null;
    public ?array $result = null;
}

/** Request payload for EditForumTopic#create. */
class EditForumTopicCreateData
{
    public string $chat_id;
    public ?string $description = null;
    public ?int $error_code = null;
    public ?string $icon_custom_emoji_id = null;
    public int $message_thread_id;
    public ?string $name = null;
    public bool $ok;
    public ?array $parameters = null;
    public ?array $result = null;
}

/** File entity data model. */
class File
{
    public string $file_id;
}

/** Request payload for File#create. */
class FileCreateData
{
    public string $file_id;
}

/** ForumTopic entity data model. */
class ForumTopic
{
    public string $chat_id;
    public ?int $icon_color = null;
    public ?string $icon_custom_emoji_id = null;
    public string $name;
}

/** Request payload for ForumTopic#create. */
class ForumTopicCreateData
{
    public string $chat_id;
    public ?int $icon_color = null;
    public ?string $icon_custom_emoji_id = null;
    public string $name;
}

/** GetBusinessAccountGift entity data model. */
class GetBusinessAccountGift
{
    public ?string $description = null;
    public ?int $error_code = null;
    public ?bool $exclude_from_blockchain = null;
    public ?bool $exclude_limited_non_upgradable = null;
    public ?bool $exclude_limited_upgradable = null;
    public bool $ok;
    public ?array $parameters = null;
    public ?array $result = null;
}

/** Request payload for GetBusinessAccountGift#create. */
class GetBusinessAccountGiftCreateData
{
    public ?string $description = null;
    public ?int $error_code = null;
    public ?bool $exclude_from_blockchain = null;
    public ?bool $exclude_limited_non_upgradable = null;
    public ?bool $exclude_limited_upgradable = null;
    public bool $ok;
    public ?array $parameters = null;
    public ?array $result = null;
}

/** GetChatGift entity data model. */
class GetChatGift
{
    public string $chat_id;
    public ?string $description = null;
    public ?int $error_code = null;
    public bool $ok;
    public ?array $parameters = null;
    public ?array $result = null;
}

/** Request payload for GetChatGift#create. */
class GetChatGiftCreateData
{
    public string $chat_id;
    public ?string $description = null;
    public ?int $error_code = null;
    public bool $ok;
    public ?array $parameters = null;
    public ?array $result = null;
}

/** GetMe entity data model. */
class GetMe
{
    public ?string $description = null;
    public ?int $error_code = null;
    public bool $ok;
    public ?array $parameters = null;
    public ?array $result = null;
}

/** Request payload for GetMe#load. */
class GetMeLoadMatch
{
    public ?string $description = null;
    public ?int $error_code = null;
    public ?bool $ok = null;
    public ?array $parameters = null;
    public ?array $result = null;
}

/** Request payload for GetMe#create. */
class GetMeCreateData
{
    public ?string $description = null;
    public ?int $error_code = null;
    public bool $ok;
    public ?array $parameters = null;
    public ?array $result = null;
}

/** GetUserGift entity data model. */
class GetUserGift
{
    public ?string $description = null;
    public ?int $error_code = null;
    public bool $ok;
    public ?array $parameters = null;
    public ?array $result = null;
    public int $user_id;
}

/** Request payload for GetUserGift#create. */
class GetUserGiftCreateData
{
    public ?string $description = null;
    public ?int $error_code = null;
    public bool $ok;
    public ?array $parameters = null;
    public ?array $result = null;
    public int $user_id;
}

/** GetUserProfileAudio entity data model. */
class GetUserProfileAudio
{
    public ?string $description = null;
    public ?int $error_code = null;
    public bool $ok;
    public ?array $parameters = null;
    public ?array $result = null;
    public int $user_id;
}

/** Request payload for GetUserProfileAudio#create. */
class GetUserProfileAudioCreateData
{
    public ?string $description = null;
    public ?int $error_code = null;
    public bool $ok;
    public ?array $parameters = null;
    public ?array $result = null;
    public int $user_id;
}

/** Message entity data model. */
class Message
{
    public string $chat_id;
    public ?int $direct_messages_topic_id = null;
    public ?bool $disable_notification = null;
    public ?bool $disable_web_page_preview = null;
    public string $from_chat_id;
    public float $latitude;
    public float $longitude;
    public ?string $message_effect_id = null;
    public int $message_id;
    public ?int $message_thread_id = null;
    public array $options;
    public ?string $parse_mode = null;
    public ?bool $protect_content = null;
    public string $question;
    public ?int $reply_to_message_id = null;
    public string $text;
}

/** Request payload for Message#create. */
class MessageCreateData
{
    public string $chat_id;
    public ?int $direct_messages_topic_id = null;
    public ?bool $disable_notification = null;
    public ?bool $disable_web_page_preview = null;
    public string $from_chat_id;
    public float $latitude;
    public float $longitude;
    public ?string $message_effect_id = null;
    public int $message_id;
    public ?int $message_thread_id = null;
    public array $options;
    public ?string $parse_mode = null;
    public ?bool $protect_content = null;
    public string $question;
    public ?int $reply_to_message_id = null;
    public string $text;
}

/** MessageId entity data model. */
class MessageId
{
    public string $chat_id;
    public ?int $direct_messages_topic_id = null;
    public string $from_chat_id;
    public ?string $message_effect_id = null;
    public int $message_id;
    public ?int $message_thread_id = null;
}

/** Request payload for MessageId#create. */
class MessageIdCreateData
{
    public string $chat_id;
    public ?int $direct_messages_topic_id = null;
    public string $from_chat_id;
    public ?string $message_effect_id = null;
    public int $message_id;
    public ?int $message_thread_id = null;
}

/** PromoteChatMember entity data model. */
class PromoteChatMember
{
    public ?bool $can_delete_messages = null;
    public ?bool $can_edit_messages = null;
    public ?bool $can_manage_chat = null;
    public ?bool $can_manage_direct_messages = null;
    public ?bool $can_post_messages = null;
    public string $chat_id;
    public ?string $description = null;
    public ?int $error_code = null;
    public bool $ok;
    public ?array $parameters = null;
    public ?array $result = null;
    public int $user_id;
}

/** Request payload for PromoteChatMember#create. */
class PromoteChatMemberCreateData
{
    public ?bool $can_delete_messages = null;
    public ?bool $can_edit_messages = null;
    public ?bool $can_manage_chat = null;
    public ?bool $can_manage_direct_messages = null;
    public ?bool $can_post_messages = null;
    public string $chat_id;
    public ?string $description = null;
    public ?int $error_code = null;
    public bool $ok;
    public ?array $parameters = null;
    public ?array $result = null;
    public int $user_id;
}

/** RemoveMyProfilePhoto entity data model. */
class RemoveMyProfilePhoto
{
    public ?string $description = null;
    public ?int $error_code = null;
    public bool $ok;
    public ?array $parameters = null;
    public ?array $result = null;
}

/** Request payload for RemoveMyProfilePhoto#create. */
class RemoveMyProfilePhotoCreateData
{
    public ?string $description = null;
    public ?int $error_code = null;
    public bool $ok;
    public ?array $parameters = null;
    public ?array $result = null;
}

/** RepostStory entity data model. */
class RepostStory
{
    public string $chat_id;
    public ?string $description = null;
    public ?int $error_code = null;
    public bool $ok;
    public ?array $parameters = null;
    public ?array $result = null;
    public int $story_id;
}

/** Request payload for RepostStory#create. */
class RepostStoryCreateData
{
    public string $chat_id;
    public ?string $description = null;
    public ?int $error_code = null;
    public bool $ok;
    public ?array $parameters = null;
    public ?array $result = null;
    public int $story_id;
}

/** SendChatAction entity data model. */
class SendChatAction
{
    public string $action;
    public string $chat_id;
    public ?string $description = null;
    public ?int $error_code = null;
    public ?int $message_thread_id = null;
    public bool $ok;
    public ?array $parameters = null;
    public ?array $result = null;
}

/** Request payload for SendChatAction#create. */
class SendChatActionCreateData
{
    public string $action;
    public string $chat_id;
    public ?string $description = null;
    public ?int $error_code = null;
    public ?int $message_thread_id = null;
    public bool $ok;
    public ?array $parameters = null;
    public ?array $result = null;
}

/** SendMessageDraft entity data model. */
class SendMessageDraft
{
    public string $chat_id;
    public ?string $description = null;
    public ?int $error_code = null;
    public ?int $message_thread_id = null;
    public bool $ok;
    public ?array $parameters = null;
    public ?array $result = null;
    public string $text;
}

/** Request payload for SendMessageDraft#create. */
class SendMessageDraftCreateData
{
    public string $chat_id;
    public ?string $description = null;
    public ?int $error_code = null;
    public ?int $message_thread_id = null;
    public bool $ok;
    public ?array $parameters = null;
    public ?array $result = null;
    public string $text;
}

/** SetMyProfilePhoto entity data model. */
class SetMyProfilePhoto
{
    public ?string $description = null;
    public ?int $error_code = null;
    public bool $ok;
    public ?array $parameters = null;
    public ?array $result = null;
}

/** Request payload for SetMyProfilePhoto#create. */
class SetMyProfilePhotoCreateData
{
    public ?string $description = null;
    public ?int $error_code = null;
    public bool $ok;
    public ?array $parameters = null;
    public ?array $result = null;
}

/** UnpinAllForumTopicMessage entity data model. */
class UnpinAllForumTopicMessage
{
    public string $chat_id;
    public ?string $description = null;
    public ?int $error_code = null;
    public int $message_thread_id;
    public bool $ok;
    public ?array $parameters = null;
    public ?array $result = null;
}

/** Request payload for UnpinAllForumTopicMessage#create. */
class UnpinAllForumTopicMessageCreateData
{
    public string $chat_id;
    public ?string $description = null;
    public ?int $error_code = null;
    public int $message_thread_id;
    public bool $ok;
    public ?array $parameters = null;
    public ?array $result = null;
}

/** Update entity data model. */
class Update
{
    public ?array $allowed_updates = null;
    public ?string $description = null;
    public ?int $error_code = null;
    public ?int $limit = null;
    public ?int $offset = null;
    public bool $ok;
    public ?array $parameters = null;
    public ?array $result = null;
    public ?int $timeout = null;
}

/** Request payload for Update#list. */
class UpdateListMatch
{
    public ?array $allowed_updates = null;
    public ?string $description = null;
    public ?int $error_code = null;
    public ?int $limit = null;
    public ?int $offset = null;
    public ?bool $ok = null;
    public ?array $parameters = null;
    public ?array $result = null;
    public ?int $timeout = null;
}

/** Request payload for Update#create. */
class UpdateCreateData
{
    public ?array $allowed_updates = null;
    public ?string $description = null;
    public ?int $error_code = null;
    public ?int $limit = null;
    public ?int $offset = null;
    public bool $ok;
    public ?array $parameters = null;
    public ?array $result = null;
    public ?int $timeout = null;
}

