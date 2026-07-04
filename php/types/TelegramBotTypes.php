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
    public ?array $parameter = null;
    public mixed $result = null;
}

/** Match filter for ApproveSuggestedPost#create (any subset of ApproveSuggestedPost fields). */
class ApproveSuggestedPostCreateData
{
    public ?string $chat_id = null;
    public ?string $description = null;
    public ?int $error_code = null;
    public ?int $message_id = null;
    public ?bool $ok = null;
    public ?array $parameter = null;
    public mixed $result = null;
}

/** DeclineSuggestedPost entity data model. */
class DeclineSuggestedPost
{
    public string $chat_id;
    public ?string $description = null;
    public ?int $error_code = null;
    public int $message_id;
    public bool $ok;
    public ?array $parameter = null;
    public mixed $result = null;
}

/** Match filter for DeclineSuggestedPost#create (any subset of DeclineSuggestedPost fields). */
class DeclineSuggestedPostCreateData
{
    public ?string $chat_id = null;
    public ?string $description = null;
    public ?int $error_code = null;
    public ?int $message_id = null;
    public ?bool $ok = null;
    public ?array $parameter = null;
    public mixed $result = null;
}

/** DeleteForumTopic entity data model. */
class DeleteForumTopic
{
    public string $chat_id;
    public ?string $description = null;
    public ?int $error_code = null;
    public int $message_thread_id;
    public bool $ok;
    public ?array $parameter = null;
    public mixed $result = null;
}

/** Match filter for DeleteForumTopic#create (any subset of DeleteForumTopic fields). */
class DeleteForumTopicCreateData
{
    public ?string $chat_id = null;
    public ?string $description = null;
    public ?int $error_code = null;
    public ?int $message_thread_id = null;
    public ?bool $ok = null;
    public ?array $parameter = null;
    public mixed $result = null;
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
    public ?array $parameter = null;
    public mixed $result = null;
}

/** Match filter for EditForumTopic#create (any subset of EditForumTopic fields). */
class EditForumTopicCreateData
{
    public ?string $chat_id = null;
    public ?string $description = null;
    public ?int $error_code = null;
    public ?string $icon_custom_emoji_id = null;
    public ?int $message_thread_id = null;
    public ?string $name = null;
    public ?bool $ok = null;
    public ?array $parameter = null;
    public mixed $result = null;
}

/** File entity data model. */
class File
{
    public string $file_id;
}

/** Match filter for File#create (any subset of File fields). */
class FileCreateData
{
    public ?string $file_id = null;
}

/** ForumTopic entity data model. */
class ForumTopic
{
    public string $chat_id;
    public ?int $icon_color = null;
    public ?string $icon_custom_emoji_id = null;
    public string $name;
}

/** Match filter for ForumTopic#create (any subset of ForumTopic fields). */
class ForumTopicCreateData
{
    public ?string $chat_id = null;
    public ?int $icon_color = null;
    public ?string $icon_custom_emoji_id = null;
    public ?string $name = null;
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
    public ?array $parameter = null;
    public mixed $result = null;
}

/** Match filter for GetBusinessAccountGift#create (any subset of GetBusinessAccountGift fields). */
class GetBusinessAccountGiftCreateData
{
    public ?string $description = null;
    public ?int $error_code = null;
    public ?bool $exclude_from_blockchain = null;
    public ?bool $exclude_limited_non_upgradable = null;
    public ?bool $exclude_limited_upgradable = null;
    public ?bool $ok = null;
    public ?array $parameter = null;
    public mixed $result = null;
}

/** GetChatGift entity data model. */
class GetChatGift
{
    public string $chat_id;
    public ?string $description = null;
    public ?int $error_code = null;
    public bool $ok;
    public ?array $parameter = null;
    public mixed $result = null;
}

/** Match filter for GetChatGift#create (any subset of GetChatGift fields). */
class GetChatGiftCreateData
{
    public ?string $chat_id = null;
    public ?string $description = null;
    public ?int $error_code = null;
    public ?bool $ok = null;
    public ?array $parameter = null;
    public mixed $result = null;
}

/** GetMe entity data model. */
class GetMe
{
    public ?string $description = null;
    public ?int $error_code = null;
    public bool $ok;
    public ?array $parameter = null;
    public mixed $result = null;
}

/** Match filter for GetMe#load (any subset of GetMe fields). */
class GetMeLoadMatch
{
    public ?string $description = null;
    public ?int $error_code = null;
    public ?bool $ok = null;
    public ?array $parameter = null;
    public mixed $result = null;
}

/** Match filter for GetMe#create (any subset of GetMe fields). */
class GetMeCreateData
{
    public ?string $description = null;
    public ?int $error_code = null;
    public ?bool $ok = null;
    public ?array $parameter = null;
    public mixed $result = null;
}

/** GetUserGift entity data model. */
class GetUserGift
{
    public ?string $description = null;
    public ?int $error_code = null;
    public bool $ok;
    public ?array $parameter = null;
    public mixed $result = null;
    public int $user_id;
}

/** Match filter for GetUserGift#create (any subset of GetUserGift fields). */
class GetUserGiftCreateData
{
    public ?string $description = null;
    public ?int $error_code = null;
    public ?bool $ok = null;
    public ?array $parameter = null;
    public mixed $result = null;
    public ?int $user_id = null;
}

/** GetUserProfileAudio entity data model. */
class GetUserProfileAudio
{
    public ?string $description = null;
    public ?int $error_code = null;
    public bool $ok;
    public ?array $parameter = null;
    public mixed $result = null;
    public int $user_id;
}

/** Match filter for GetUserProfileAudio#create (any subset of GetUserProfileAudio fields). */
class GetUserProfileAudioCreateData
{
    public ?string $description = null;
    public ?int $error_code = null;
    public ?bool $ok = null;
    public ?array $parameter = null;
    public mixed $result = null;
    public ?int $user_id = null;
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
    public array $option;
    public ?string $parse_mode = null;
    public ?bool $protect_content = null;
    public string $question;
    public ?int $reply_to_message_id = null;
    public string $text;
}

/** Match filter for Message#create (any subset of Message fields). */
class MessageCreateData
{
    public ?string $chat_id = null;
    public ?int $direct_messages_topic_id = null;
    public ?bool $disable_notification = null;
    public ?bool $disable_web_page_preview = null;
    public ?string $from_chat_id = null;
    public ?float $latitude = null;
    public ?float $longitude = null;
    public ?string $message_effect_id = null;
    public ?int $message_id = null;
    public ?int $message_thread_id = null;
    public ?array $option = null;
    public ?string $parse_mode = null;
    public ?bool $protect_content = null;
    public ?string $question = null;
    public ?int $reply_to_message_id = null;
    public ?string $text = null;
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

/** Match filter for MessageId#create (any subset of MessageId fields). */
class MessageIdCreateData
{
    public ?string $chat_id = null;
    public ?int $direct_messages_topic_id = null;
    public ?string $from_chat_id = null;
    public ?string $message_effect_id = null;
    public ?int $message_id = null;
    public ?int $message_thread_id = null;
}

/** PromoteChatMember entity data model. */
class PromoteChatMember
{
    public ?bool $can_delete_message = null;
    public ?bool $can_edit_message = null;
    public ?bool $can_manage_chat = null;
    public ?bool $can_manage_direct_message = null;
    public ?bool $can_post_message = null;
    public string $chat_id;
    public ?string $description = null;
    public ?int $error_code = null;
    public bool $ok;
    public ?array $parameter = null;
    public mixed $result = null;
    public int $user_id;
}

/** Match filter for PromoteChatMember#create (any subset of PromoteChatMember fields). */
class PromoteChatMemberCreateData
{
    public ?bool $can_delete_message = null;
    public ?bool $can_edit_message = null;
    public ?bool $can_manage_chat = null;
    public ?bool $can_manage_direct_message = null;
    public ?bool $can_post_message = null;
    public ?string $chat_id = null;
    public ?string $description = null;
    public ?int $error_code = null;
    public ?bool $ok = null;
    public ?array $parameter = null;
    public mixed $result = null;
    public ?int $user_id = null;
}

/** RemoveMyProfilePhoto entity data model. */
class RemoveMyProfilePhoto
{
    public ?string $description = null;
    public ?int $error_code = null;
    public bool $ok;
    public ?array $parameter = null;
    public mixed $result = null;
}

/** Match filter for RemoveMyProfilePhoto#create (any subset of RemoveMyProfilePhoto fields). */
class RemoveMyProfilePhotoCreateData
{
    public ?string $description = null;
    public ?int $error_code = null;
    public ?bool $ok = null;
    public ?array $parameter = null;
    public mixed $result = null;
}

/** RepostStory entity data model. */
class RepostStory
{
    public string $chat_id;
    public ?string $description = null;
    public ?int $error_code = null;
    public bool $ok;
    public ?array $parameter = null;
    public mixed $result = null;
    public int $story_id;
}

/** Match filter for RepostStory#create (any subset of RepostStory fields). */
class RepostStoryCreateData
{
    public ?string $chat_id = null;
    public ?string $description = null;
    public ?int $error_code = null;
    public ?bool $ok = null;
    public ?array $parameter = null;
    public mixed $result = null;
    public ?int $story_id = null;
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
    public ?array $parameter = null;
    public mixed $result = null;
}

/** Match filter for SendChatAction#create (any subset of SendChatAction fields). */
class SendChatActionCreateData
{
    public ?string $action = null;
    public ?string $chat_id = null;
    public ?string $description = null;
    public ?int $error_code = null;
    public ?int $message_thread_id = null;
    public ?bool $ok = null;
    public ?array $parameter = null;
    public mixed $result = null;
}

/** SendMessageDraft entity data model. */
class SendMessageDraft
{
    public string $chat_id;
    public ?string $description = null;
    public ?int $error_code = null;
    public ?int $message_thread_id = null;
    public bool $ok;
    public ?array $parameter = null;
    public mixed $result = null;
    public string $text;
}

/** Match filter for SendMessageDraft#create (any subset of SendMessageDraft fields). */
class SendMessageDraftCreateData
{
    public ?string $chat_id = null;
    public ?string $description = null;
    public ?int $error_code = null;
    public ?int $message_thread_id = null;
    public ?bool $ok = null;
    public ?array $parameter = null;
    public mixed $result = null;
    public ?string $text = null;
}

/** SetMyProfilePhoto entity data model. */
class SetMyProfilePhoto
{
    public ?string $description = null;
    public ?int $error_code = null;
    public bool $ok;
    public ?array $parameter = null;
    public mixed $result = null;
}

/** Match filter for SetMyProfilePhoto#create (any subset of SetMyProfilePhoto fields). */
class SetMyProfilePhotoCreateData
{
    public ?string $description = null;
    public ?int $error_code = null;
    public ?bool $ok = null;
    public ?array $parameter = null;
    public mixed $result = null;
}

/** UnpinAllForumTopicMessage entity data model. */
class UnpinAllForumTopicMessage
{
    public string $chat_id;
    public ?string $description = null;
    public ?int $error_code = null;
    public int $message_thread_id;
    public bool $ok;
    public ?array $parameter = null;
    public mixed $result = null;
}

/** Match filter for UnpinAllForumTopicMessage#create (any subset of UnpinAllForumTopicMessage fields). */
class UnpinAllForumTopicMessageCreateData
{
    public ?string $chat_id = null;
    public ?string $description = null;
    public ?int $error_code = null;
    public ?int $message_thread_id = null;
    public ?bool $ok = null;
    public ?array $parameter = null;
    public mixed $result = null;
}

/** Update entity data model. */
class Update
{
    public ?array $allowed_update = null;
    public ?string $description = null;
    public ?int $error_code = null;
    public ?int $limit = null;
    public ?int $offset = null;
    public bool $ok;
    public ?array $parameter = null;
    public ?array $result = null;
    public ?int $timeout = null;
}

/** Match filter for Update#list (any subset of Update fields). */
class UpdateListMatch
{
    public ?array $allowed_update = null;
    public ?string $description = null;
    public ?int $error_code = null;
    public ?int $limit = null;
    public ?int $offset = null;
    public ?bool $ok = null;
    public ?array $parameter = null;
    public ?array $result = null;
    public ?int $timeout = null;
}

/** Match filter for Update#create (any subset of Update fields). */
class UpdateCreateData
{
    public ?array $allowed_update = null;
    public ?string $description = null;
    public ?int $error_code = null;
    public ?int $limit = null;
    public ?int $offset = null;
    public ?bool $ok = null;
    public ?array $parameter = null;
    public ?array $result = null;
    public ?int $timeout = null;
}

