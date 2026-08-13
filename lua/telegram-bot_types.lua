-- Typed models for the TelegramBot SDK (LuaLS annotations).
--
-- GENERATED from the API model: main.kit.entity.<e>.fields[] and per-op
-- params (op.<name>.points[].args.params[]). Field/param types come from the
-- canonical type sentinels via @voxgig/sdkgen canonToType (source of truth:
-- @voxgig/apidef VALID_CANON). Annotations only — no runtime effect. Do not
-- edit by hand.

---@class ApproveSuggestedPost
---@field chat_id string
---@field description? string
---@field error_code? number
---@field message_id number
---@field ok boolean
---@field parameters? table
---@field result? table

---@class ApproveSuggestedPostCreateData
---@field chat_id string
---@field description? string
---@field error_code? number
---@field message_id number
---@field ok boolean
---@field parameters? table
---@field result? table

---@class DeclineSuggestedPost
---@field chat_id string
---@field description? string
---@field error_code? number
---@field message_id number
---@field ok boolean
---@field parameters? table
---@field result? table

---@class DeclineSuggestedPostCreateData
---@field chat_id string
---@field description? string
---@field error_code? number
---@field message_id number
---@field ok boolean
---@field parameters? table
---@field result? table

---@class DeleteForumTopic
---@field chat_id string
---@field description? string
---@field error_code? number
---@field message_thread_id number
---@field ok boolean
---@field parameters? table
---@field result? table

---@class DeleteForumTopicCreateData
---@field chat_id string
---@field description? string
---@field error_code? number
---@field message_thread_id number
---@field ok boolean
---@field parameters? table
---@field result? table

---@class EditForumTopic
---@field chat_id string
---@field description? string
---@field error_code? number
---@field icon_custom_emoji_id? string
---@field message_thread_id number
---@field name? string
---@field ok boolean
---@field parameters? table
---@field result? table

---@class EditForumTopicCreateData
---@field chat_id string
---@field description? string
---@field error_code? number
---@field icon_custom_emoji_id? string
---@field message_thread_id number
---@field name? string
---@field ok boolean
---@field parameters? table
---@field result? table

---@class File
---@field file_id string

---@class FileCreateData
---@field file_id string

---@class ForumTopic
---@field chat_id string
---@field icon_color? number
---@field icon_custom_emoji_id? string
---@field name string

---@class ForumTopicCreateData
---@field chat_id string
---@field icon_color? number
---@field icon_custom_emoji_id? string
---@field name string

---@class GetBusinessAccountGift
---@field description? string
---@field error_code? number
---@field exclude_from_blockchain? boolean
---@field exclude_limited_non_upgradable? boolean
---@field exclude_limited_upgradable? boolean
---@field ok boolean
---@field parameters? table
---@field result? table

---@class GetBusinessAccountGiftCreateData
---@field description? string
---@field error_code? number
---@field exclude_from_blockchain? boolean
---@field exclude_limited_non_upgradable? boolean
---@field exclude_limited_upgradable? boolean
---@field ok boolean
---@field parameters? table
---@field result? table

---@class GetChatGift
---@field chat_id string
---@field description? string
---@field error_code? number
---@field ok boolean
---@field parameters? table
---@field result? table

---@class GetChatGiftCreateData
---@field chat_id string
---@field description? string
---@field error_code? number
---@field ok boolean
---@field parameters? table
---@field result? table

---@class GetMe
---@field description? string
---@field error_code? number
---@field ok boolean
---@field parameters? table
---@field result? table

---@class GetMeLoadMatch
---@field description? string
---@field error_code? number
---@field ok? boolean
---@field parameters? table
---@field result? table

---@class GetMeCreateData
---@field description? string
---@field error_code? number
---@field ok boolean
---@field parameters? table
---@field result? table

---@class GetUserGift
---@field description? string
---@field error_code? number
---@field ok boolean
---@field parameters? table
---@field result? table
---@field user_id number

---@class GetUserGiftCreateData
---@field description? string
---@field error_code? number
---@field ok boolean
---@field parameters? table
---@field result? table
---@field user_id number

---@class GetUserProfileAudio
---@field description? string
---@field error_code? number
---@field ok boolean
---@field parameters? table
---@field result? table
---@field user_id number

---@class GetUserProfileAudioCreateData
---@field description? string
---@field error_code? number
---@field ok boolean
---@field parameters? table
---@field result? table
---@field user_id number

---@class Message
---@field chat_id string
---@field direct_messages_topic_id? number
---@field disable_notification? boolean
---@field disable_web_page_preview? boolean
---@field from_chat_id string
---@field latitude number
---@field longitude number
---@field message_effect_id? string
---@field message_id number
---@field message_thread_id? number
---@field options table
---@field parse_mode? string
---@field protect_content? boolean
---@field question string
---@field reply_to_message_id? number
---@field text string

---@class MessageCreateData
---@field chat_id string
---@field direct_messages_topic_id? number
---@field disable_notification? boolean
---@field disable_web_page_preview? boolean
---@field from_chat_id string
---@field latitude number
---@field longitude number
---@field message_effect_id? string
---@field message_id number
---@field message_thread_id? number
---@field options table
---@field parse_mode? string
---@field protect_content? boolean
---@field question string
---@field reply_to_message_id? number
---@field text string

---@class MessageId
---@field chat_id string
---@field direct_messages_topic_id? number
---@field from_chat_id string
---@field message_effect_id? string
---@field message_id number
---@field message_thread_id? number

---@class MessageIdCreateData
---@field chat_id string
---@field direct_messages_topic_id? number
---@field from_chat_id string
---@field message_effect_id? string
---@field message_id number
---@field message_thread_id? number

---@class PromoteChatMember
---@field can_delete_messages? boolean
---@field can_edit_messages? boolean
---@field can_manage_chat? boolean
---@field can_manage_direct_messages? boolean
---@field can_post_messages? boolean
---@field chat_id string
---@field description? string
---@field error_code? number
---@field ok boolean
---@field parameters? table
---@field result? table
---@field user_id number

---@class PromoteChatMemberCreateData
---@field can_delete_messages? boolean
---@field can_edit_messages? boolean
---@field can_manage_chat? boolean
---@field can_manage_direct_messages? boolean
---@field can_post_messages? boolean
---@field chat_id string
---@field description? string
---@field error_code? number
---@field ok boolean
---@field parameters? table
---@field result? table
---@field user_id number

---@class RemoveMyProfilePhoto
---@field description? string
---@field error_code? number
---@field ok boolean
---@field parameters? table
---@field result? table

---@class RemoveMyProfilePhotoCreateData
---@field description? string
---@field error_code? number
---@field ok boolean
---@field parameters? table
---@field result? table

---@class RepostStory
---@field chat_id string
---@field description? string
---@field error_code? number
---@field ok boolean
---@field parameters? table
---@field result? table
---@field story_id number

---@class RepostStoryCreateData
---@field chat_id string
---@field description? string
---@field error_code? number
---@field ok boolean
---@field parameters? table
---@field result? table
---@field story_id number

---@class SendChatAction
---@field action string
---@field chat_id string
---@field description? string
---@field error_code? number
---@field message_thread_id? number
---@field ok boolean
---@field parameters? table
---@field result? table

---@class SendChatActionCreateData
---@field action string
---@field chat_id string
---@field description? string
---@field error_code? number
---@field message_thread_id? number
---@field ok boolean
---@field parameters? table
---@field result? table

---@class SendMessageDraft
---@field chat_id string
---@field description? string
---@field error_code? number
---@field message_thread_id? number
---@field ok boolean
---@field parameters? table
---@field result? table
---@field text string

---@class SendMessageDraftCreateData
---@field chat_id string
---@field description? string
---@field error_code? number
---@field message_thread_id? number
---@field ok boolean
---@field parameters? table
---@field result? table
---@field text string

---@class SetMyProfilePhoto
---@field description? string
---@field error_code? number
---@field ok boolean
---@field parameters? table
---@field result? table

---@class SetMyProfilePhotoCreateData
---@field description? string
---@field error_code? number
---@field ok boolean
---@field parameters? table
---@field result? table

---@class UnpinAllForumTopicMessage
---@field chat_id string
---@field description? string
---@field error_code? number
---@field message_thread_id number
---@field ok boolean
---@field parameters? table
---@field result? table

---@class UnpinAllForumTopicMessageCreateData
---@field chat_id string
---@field description? string
---@field error_code? number
---@field message_thread_id number
---@field ok boolean
---@field parameters? table
---@field result? table

---@class Update
---@field allowed_updates? table
---@field description? string
---@field error_code? number
---@field limit? number
---@field offset? number
---@field ok boolean
---@field parameters? table
---@field result? table
---@field timeout? number

---@class UpdateListMatch
---@field allowed_updates? table
---@field description? string
---@field error_code? number
---@field limit? number
---@field offset? number
---@field ok? boolean
---@field parameters? table
---@field result? table
---@field timeout? number

---@class UpdateCreateData
---@field allowed_updates? table
---@field description? string
---@field error_code? number
---@field limit? number
---@field offset? number
---@field ok boolean
---@field parameters? table
---@field result? table
---@field timeout? number

local M = {}

return M
