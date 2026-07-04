# frozen_string_literal: true

# Typed models for the TelegramBot SDK.
#
# GENERATED from the API model: main.kit.entity.<e>.fields[] and per-op
# params (op.<name>.points[].args.params[]). Member types come from the
# canonical type sentinels via @voxgig/sdkgen canonToType (source of truth:
# @voxgig/apidef VALID_CANON). Ruby types are unenforced; these YARD
# annotations document the shapes. Do not edit by hand.

# ApproveSuggestedPost entity data model.
#
# @!attribute [rw] chat_id
#   @return [String]
#
# @!attribute [rw] description
#   @return [String, nil]
#
# @!attribute [rw] error_code
#   @return [Integer, nil]
#
# @!attribute [rw] message_id
#   @return [Integer]
#
# @!attribute [rw] ok
#   @return [Boolean]
#
# @!attribute [rw] parameter
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Object, nil]
ApproveSuggestedPost = Struct.new(
  :chat_id,
  :description,
  :error_code,
  :message_id,
  :ok,
  :parameter,
  :result,
  keyword_init: true
)

# Match filter for ApproveSuggestedPost#create (any subset of ApproveSuggestedPost fields).
#
# @!attribute [rw] chat_id
#   @return [String, nil]
#
# @!attribute [rw] description
#   @return [String, nil]
#
# @!attribute [rw] error_code
#   @return [Integer, nil]
#
# @!attribute [rw] message_id
#   @return [Integer, nil]
#
# @!attribute [rw] ok
#   @return [Boolean, nil]
#
# @!attribute [rw] parameter
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Object, nil]
ApproveSuggestedPostCreateData = Struct.new(
  :chat_id,
  :description,
  :error_code,
  :message_id,
  :ok,
  :parameter,
  :result,
  keyword_init: true
)

# DeclineSuggestedPost entity data model.
#
# @!attribute [rw] chat_id
#   @return [String]
#
# @!attribute [rw] description
#   @return [String, nil]
#
# @!attribute [rw] error_code
#   @return [Integer, nil]
#
# @!attribute [rw] message_id
#   @return [Integer]
#
# @!attribute [rw] ok
#   @return [Boolean]
#
# @!attribute [rw] parameter
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Object, nil]
DeclineSuggestedPost = Struct.new(
  :chat_id,
  :description,
  :error_code,
  :message_id,
  :ok,
  :parameter,
  :result,
  keyword_init: true
)

# Match filter for DeclineSuggestedPost#create (any subset of DeclineSuggestedPost fields).
#
# @!attribute [rw] chat_id
#   @return [String, nil]
#
# @!attribute [rw] description
#   @return [String, nil]
#
# @!attribute [rw] error_code
#   @return [Integer, nil]
#
# @!attribute [rw] message_id
#   @return [Integer, nil]
#
# @!attribute [rw] ok
#   @return [Boolean, nil]
#
# @!attribute [rw] parameter
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Object, nil]
DeclineSuggestedPostCreateData = Struct.new(
  :chat_id,
  :description,
  :error_code,
  :message_id,
  :ok,
  :parameter,
  :result,
  keyword_init: true
)

# DeleteForumTopic entity data model.
#
# @!attribute [rw] chat_id
#   @return [String]
#
# @!attribute [rw] description
#   @return [String, nil]
#
# @!attribute [rw] error_code
#   @return [Integer, nil]
#
# @!attribute [rw] message_thread_id
#   @return [Integer]
#
# @!attribute [rw] ok
#   @return [Boolean]
#
# @!attribute [rw] parameter
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Object, nil]
DeleteForumTopic = Struct.new(
  :chat_id,
  :description,
  :error_code,
  :message_thread_id,
  :ok,
  :parameter,
  :result,
  keyword_init: true
)

# Match filter for DeleteForumTopic#create (any subset of DeleteForumTopic fields).
#
# @!attribute [rw] chat_id
#   @return [String, nil]
#
# @!attribute [rw] description
#   @return [String, nil]
#
# @!attribute [rw] error_code
#   @return [Integer, nil]
#
# @!attribute [rw] message_thread_id
#   @return [Integer, nil]
#
# @!attribute [rw] ok
#   @return [Boolean, nil]
#
# @!attribute [rw] parameter
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Object, nil]
DeleteForumTopicCreateData = Struct.new(
  :chat_id,
  :description,
  :error_code,
  :message_thread_id,
  :ok,
  :parameter,
  :result,
  keyword_init: true
)

# EditForumTopic entity data model.
#
# @!attribute [rw] chat_id
#   @return [String]
#
# @!attribute [rw] description
#   @return [String, nil]
#
# @!attribute [rw] error_code
#   @return [Integer, nil]
#
# @!attribute [rw] icon_custom_emoji_id
#   @return [String, nil]
#
# @!attribute [rw] message_thread_id
#   @return [Integer]
#
# @!attribute [rw] name
#   @return [String, nil]
#
# @!attribute [rw] ok
#   @return [Boolean]
#
# @!attribute [rw] parameter
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Object, nil]
EditForumTopic = Struct.new(
  :chat_id,
  :description,
  :error_code,
  :icon_custom_emoji_id,
  :message_thread_id,
  :name,
  :ok,
  :parameter,
  :result,
  keyword_init: true
)

# Match filter for EditForumTopic#create (any subset of EditForumTopic fields).
#
# @!attribute [rw] chat_id
#   @return [String, nil]
#
# @!attribute [rw] description
#   @return [String, nil]
#
# @!attribute [rw] error_code
#   @return [Integer, nil]
#
# @!attribute [rw] icon_custom_emoji_id
#   @return [String, nil]
#
# @!attribute [rw] message_thread_id
#   @return [Integer, nil]
#
# @!attribute [rw] name
#   @return [String, nil]
#
# @!attribute [rw] ok
#   @return [Boolean, nil]
#
# @!attribute [rw] parameter
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Object, nil]
EditForumTopicCreateData = Struct.new(
  :chat_id,
  :description,
  :error_code,
  :icon_custom_emoji_id,
  :message_thread_id,
  :name,
  :ok,
  :parameter,
  :result,
  keyword_init: true
)

# File entity data model.
#
# @!attribute [rw] file_id
#   @return [String]
File = Struct.new(
  :file_id,
  keyword_init: true
)

# Match filter for File#create (any subset of File fields).
#
# @!attribute [rw] file_id
#   @return [String, nil]
FileCreateData = Struct.new(
  :file_id,
  keyword_init: true
)

# ForumTopic entity data model.
#
# @!attribute [rw] chat_id
#   @return [String]
#
# @!attribute [rw] icon_color
#   @return [Integer, nil]
#
# @!attribute [rw] icon_custom_emoji_id
#   @return [String, nil]
#
# @!attribute [rw] name
#   @return [String]
ForumTopic = Struct.new(
  :chat_id,
  :icon_color,
  :icon_custom_emoji_id,
  :name,
  keyword_init: true
)

# Match filter for ForumTopic#create (any subset of ForumTopic fields).
#
# @!attribute [rw] chat_id
#   @return [String, nil]
#
# @!attribute [rw] icon_color
#   @return [Integer, nil]
#
# @!attribute [rw] icon_custom_emoji_id
#   @return [String, nil]
#
# @!attribute [rw] name
#   @return [String, nil]
ForumTopicCreateData = Struct.new(
  :chat_id,
  :icon_color,
  :icon_custom_emoji_id,
  :name,
  keyword_init: true
)

# GetBusinessAccountGift entity data model.
#
# @!attribute [rw] description
#   @return [String, nil]
#
# @!attribute [rw] error_code
#   @return [Integer, nil]
#
# @!attribute [rw] exclude_from_blockchain
#   @return [Boolean, nil]
#
# @!attribute [rw] exclude_limited_non_upgradable
#   @return [Boolean, nil]
#
# @!attribute [rw] exclude_limited_upgradable
#   @return [Boolean, nil]
#
# @!attribute [rw] ok
#   @return [Boolean]
#
# @!attribute [rw] parameter
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Object, nil]
GetBusinessAccountGift = Struct.new(
  :description,
  :error_code,
  :exclude_from_blockchain,
  :exclude_limited_non_upgradable,
  :exclude_limited_upgradable,
  :ok,
  :parameter,
  :result,
  keyword_init: true
)

# Match filter for GetBusinessAccountGift#create (any subset of GetBusinessAccountGift fields).
#
# @!attribute [rw] description
#   @return [String, nil]
#
# @!attribute [rw] error_code
#   @return [Integer, nil]
#
# @!attribute [rw] exclude_from_blockchain
#   @return [Boolean, nil]
#
# @!attribute [rw] exclude_limited_non_upgradable
#   @return [Boolean, nil]
#
# @!attribute [rw] exclude_limited_upgradable
#   @return [Boolean, nil]
#
# @!attribute [rw] ok
#   @return [Boolean, nil]
#
# @!attribute [rw] parameter
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Object, nil]
GetBusinessAccountGiftCreateData = Struct.new(
  :description,
  :error_code,
  :exclude_from_blockchain,
  :exclude_limited_non_upgradable,
  :exclude_limited_upgradable,
  :ok,
  :parameter,
  :result,
  keyword_init: true
)

# GetChatGift entity data model.
#
# @!attribute [rw] chat_id
#   @return [String]
#
# @!attribute [rw] description
#   @return [String, nil]
#
# @!attribute [rw] error_code
#   @return [Integer, nil]
#
# @!attribute [rw] ok
#   @return [Boolean]
#
# @!attribute [rw] parameter
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Object, nil]
GetChatGift = Struct.new(
  :chat_id,
  :description,
  :error_code,
  :ok,
  :parameter,
  :result,
  keyword_init: true
)

# Match filter for GetChatGift#create (any subset of GetChatGift fields).
#
# @!attribute [rw] chat_id
#   @return [String, nil]
#
# @!attribute [rw] description
#   @return [String, nil]
#
# @!attribute [rw] error_code
#   @return [Integer, nil]
#
# @!attribute [rw] ok
#   @return [Boolean, nil]
#
# @!attribute [rw] parameter
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Object, nil]
GetChatGiftCreateData = Struct.new(
  :chat_id,
  :description,
  :error_code,
  :ok,
  :parameter,
  :result,
  keyword_init: true
)

# GetMe entity data model.
#
# @!attribute [rw] description
#   @return [String, nil]
#
# @!attribute [rw] error_code
#   @return [Integer, nil]
#
# @!attribute [rw] ok
#   @return [Boolean]
#
# @!attribute [rw] parameter
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Object, nil]
GetMe = Struct.new(
  :description,
  :error_code,
  :ok,
  :parameter,
  :result,
  keyword_init: true
)

# Match filter for GetMe#load (any subset of GetMe fields).
#
# @!attribute [rw] description
#   @return [String, nil]
#
# @!attribute [rw] error_code
#   @return [Integer, nil]
#
# @!attribute [rw] ok
#   @return [Boolean, nil]
#
# @!attribute [rw] parameter
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Object, nil]
GetMeLoadMatch = Struct.new(
  :description,
  :error_code,
  :ok,
  :parameter,
  :result,
  keyword_init: true
)

# Match filter for GetMe#create (any subset of GetMe fields).
#
# @!attribute [rw] description
#   @return [String, nil]
#
# @!attribute [rw] error_code
#   @return [Integer, nil]
#
# @!attribute [rw] ok
#   @return [Boolean, nil]
#
# @!attribute [rw] parameter
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Object, nil]
GetMeCreateData = Struct.new(
  :description,
  :error_code,
  :ok,
  :parameter,
  :result,
  keyword_init: true
)

# GetUserGift entity data model.
#
# @!attribute [rw] description
#   @return [String, nil]
#
# @!attribute [rw] error_code
#   @return [Integer, nil]
#
# @!attribute [rw] ok
#   @return [Boolean]
#
# @!attribute [rw] parameter
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Object, nil]
#
# @!attribute [rw] user_id
#   @return [Integer]
GetUserGift = Struct.new(
  :description,
  :error_code,
  :ok,
  :parameter,
  :result,
  :user_id,
  keyword_init: true
)

# Match filter for GetUserGift#create (any subset of GetUserGift fields).
#
# @!attribute [rw] description
#   @return [String, nil]
#
# @!attribute [rw] error_code
#   @return [Integer, nil]
#
# @!attribute [rw] ok
#   @return [Boolean, nil]
#
# @!attribute [rw] parameter
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Object, nil]
#
# @!attribute [rw] user_id
#   @return [Integer, nil]
GetUserGiftCreateData = Struct.new(
  :description,
  :error_code,
  :ok,
  :parameter,
  :result,
  :user_id,
  keyword_init: true
)

# GetUserProfileAudio entity data model.
#
# @!attribute [rw] description
#   @return [String, nil]
#
# @!attribute [rw] error_code
#   @return [Integer, nil]
#
# @!attribute [rw] ok
#   @return [Boolean]
#
# @!attribute [rw] parameter
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Object, nil]
#
# @!attribute [rw] user_id
#   @return [Integer]
GetUserProfileAudio = Struct.new(
  :description,
  :error_code,
  :ok,
  :parameter,
  :result,
  :user_id,
  keyword_init: true
)

# Match filter for GetUserProfileAudio#create (any subset of GetUserProfileAudio fields).
#
# @!attribute [rw] description
#   @return [String, nil]
#
# @!attribute [rw] error_code
#   @return [Integer, nil]
#
# @!attribute [rw] ok
#   @return [Boolean, nil]
#
# @!attribute [rw] parameter
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Object, nil]
#
# @!attribute [rw] user_id
#   @return [Integer, nil]
GetUserProfileAudioCreateData = Struct.new(
  :description,
  :error_code,
  :ok,
  :parameter,
  :result,
  :user_id,
  keyword_init: true
)

# Message entity data model.
#
# @!attribute [rw] chat_id
#   @return [String]
#
# @!attribute [rw] direct_messages_topic_id
#   @return [Integer, nil]
#
# @!attribute [rw] disable_notification
#   @return [Boolean, nil]
#
# @!attribute [rw] disable_web_page_preview
#   @return [Boolean, nil]
#
# @!attribute [rw] from_chat_id
#   @return [String]
#
# @!attribute [rw] latitude
#   @return [Float]
#
# @!attribute [rw] longitude
#   @return [Float]
#
# @!attribute [rw] message_effect_id
#   @return [String, nil]
#
# @!attribute [rw] message_id
#   @return [Integer]
#
# @!attribute [rw] message_thread_id
#   @return [Integer, nil]
#
# @!attribute [rw] option
#   @return [Array]
#
# @!attribute [rw] parse_mode
#   @return [String, nil]
#
# @!attribute [rw] protect_content
#   @return [Boolean, nil]
#
# @!attribute [rw] question
#   @return [String]
#
# @!attribute [rw] reply_to_message_id
#   @return [Integer, nil]
#
# @!attribute [rw] text
#   @return [String]
Message = Struct.new(
  :chat_id,
  :direct_messages_topic_id,
  :disable_notification,
  :disable_web_page_preview,
  :from_chat_id,
  :latitude,
  :longitude,
  :message_effect_id,
  :message_id,
  :message_thread_id,
  :option,
  :parse_mode,
  :protect_content,
  :question,
  :reply_to_message_id,
  :text,
  keyword_init: true
)

# Match filter for Message#create (any subset of Message fields).
#
# @!attribute [rw] chat_id
#   @return [String, nil]
#
# @!attribute [rw] direct_messages_topic_id
#   @return [Integer, nil]
#
# @!attribute [rw] disable_notification
#   @return [Boolean, nil]
#
# @!attribute [rw] disable_web_page_preview
#   @return [Boolean, nil]
#
# @!attribute [rw] from_chat_id
#   @return [String, nil]
#
# @!attribute [rw] latitude
#   @return [Float, nil]
#
# @!attribute [rw] longitude
#   @return [Float, nil]
#
# @!attribute [rw] message_effect_id
#   @return [String, nil]
#
# @!attribute [rw] message_id
#   @return [Integer, nil]
#
# @!attribute [rw] message_thread_id
#   @return [Integer, nil]
#
# @!attribute [rw] option
#   @return [Array, nil]
#
# @!attribute [rw] parse_mode
#   @return [String, nil]
#
# @!attribute [rw] protect_content
#   @return [Boolean, nil]
#
# @!attribute [rw] question
#   @return [String, nil]
#
# @!attribute [rw] reply_to_message_id
#   @return [Integer, nil]
#
# @!attribute [rw] text
#   @return [String, nil]
MessageCreateData = Struct.new(
  :chat_id,
  :direct_messages_topic_id,
  :disable_notification,
  :disable_web_page_preview,
  :from_chat_id,
  :latitude,
  :longitude,
  :message_effect_id,
  :message_id,
  :message_thread_id,
  :option,
  :parse_mode,
  :protect_content,
  :question,
  :reply_to_message_id,
  :text,
  keyword_init: true
)

# MessageId entity data model.
#
# @!attribute [rw] chat_id
#   @return [String]
#
# @!attribute [rw] direct_messages_topic_id
#   @return [Integer, nil]
#
# @!attribute [rw] from_chat_id
#   @return [String]
#
# @!attribute [rw] message_effect_id
#   @return [String, nil]
#
# @!attribute [rw] message_id
#   @return [Integer]
#
# @!attribute [rw] message_thread_id
#   @return [Integer, nil]
MessageId = Struct.new(
  :chat_id,
  :direct_messages_topic_id,
  :from_chat_id,
  :message_effect_id,
  :message_id,
  :message_thread_id,
  keyword_init: true
)

# Match filter for MessageId#create (any subset of MessageId fields).
#
# @!attribute [rw] chat_id
#   @return [String, nil]
#
# @!attribute [rw] direct_messages_topic_id
#   @return [Integer, nil]
#
# @!attribute [rw] from_chat_id
#   @return [String, nil]
#
# @!attribute [rw] message_effect_id
#   @return [String, nil]
#
# @!attribute [rw] message_id
#   @return [Integer, nil]
#
# @!attribute [rw] message_thread_id
#   @return [Integer, nil]
MessageIdCreateData = Struct.new(
  :chat_id,
  :direct_messages_topic_id,
  :from_chat_id,
  :message_effect_id,
  :message_id,
  :message_thread_id,
  keyword_init: true
)

# PromoteChatMember entity data model.
#
# @!attribute [rw] can_delete_message
#   @return [Boolean, nil]
#
# @!attribute [rw] can_edit_message
#   @return [Boolean, nil]
#
# @!attribute [rw] can_manage_chat
#   @return [Boolean, nil]
#
# @!attribute [rw] can_manage_direct_message
#   @return [Boolean, nil]
#
# @!attribute [rw] can_post_message
#   @return [Boolean, nil]
#
# @!attribute [rw] chat_id
#   @return [String]
#
# @!attribute [rw] description
#   @return [String, nil]
#
# @!attribute [rw] error_code
#   @return [Integer, nil]
#
# @!attribute [rw] ok
#   @return [Boolean]
#
# @!attribute [rw] parameter
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Object, nil]
#
# @!attribute [rw] user_id
#   @return [Integer]
PromoteChatMember = Struct.new(
  :can_delete_message,
  :can_edit_message,
  :can_manage_chat,
  :can_manage_direct_message,
  :can_post_message,
  :chat_id,
  :description,
  :error_code,
  :ok,
  :parameter,
  :result,
  :user_id,
  keyword_init: true
)

# Match filter for PromoteChatMember#create (any subset of PromoteChatMember fields).
#
# @!attribute [rw] can_delete_message
#   @return [Boolean, nil]
#
# @!attribute [rw] can_edit_message
#   @return [Boolean, nil]
#
# @!attribute [rw] can_manage_chat
#   @return [Boolean, nil]
#
# @!attribute [rw] can_manage_direct_message
#   @return [Boolean, nil]
#
# @!attribute [rw] can_post_message
#   @return [Boolean, nil]
#
# @!attribute [rw] chat_id
#   @return [String, nil]
#
# @!attribute [rw] description
#   @return [String, nil]
#
# @!attribute [rw] error_code
#   @return [Integer, nil]
#
# @!attribute [rw] ok
#   @return [Boolean, nil]
#
# @!attribute [rw] parameter
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Object, nil]
#
# @!attribute [rw] user_id
#   @return [Integer, nil]
PromoteChatMemberCreateData = Struct.new(
  :can_delete_message,
  :can_edit_message,
  :can_manage_chat,
  :can_manage_direct_message,
  :can_post_message,
  :chat_id,
  :description,
  :error_code,
  :ok,
  :parameter,
  :result,
  :user_id,
  keyword_init: true
)

# RemoveMyProfilePhoto entity data model.
#
# @!attribute [rw] description
#   @return [String, nil]
#
# @!attribute [rw] error_code
#   @return [Integer, nil]
#
# @!attribute [rw] ok
#   @return [Boolean]
#
# @!attribute [rw] parameter
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Object, nil]
RemoveMyProfilePhoto = Struct.new(
  :description,
  :error_code,
  :ok,
  :parameter,
  :result,
  keyword_init: true
)

# Match filter for RemoveMyProfilePhoto#create (any subset of RemoveMyProfilePhoto fields).
#
# @!attribute [rw] description
#   @return [String, nil]
#
# @!attribute [rw] error_code
#   @return [Integer, nil]
#
# @!attribute [rw] ok
#   @return [Boolean, nil]
#
# @!attribute [rw] parameter
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Object, nil]
RemoveMyProfilePhotoCreateData = Struct.new(
  :description,
  :error_code,
  :ok,
  :parameter,
  :result,
  keyword_init: true
)

# RepostStory entity data model.
#
# @!attribute [rw] chat_id
#   @return [String]
#
# @!attribute [rw] description
#   @return [String, nil]
#
# @!attribute [rw] error_code
#   @return [Integer, nil]
#
# @!attribute [rw] ok
#   @return [Boolean]
#
# @!attribute [rw] parameter
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Object, nil]
#
# @!attribute [rw] story_id
#   @return [Integer]
RepostStory = Struct.new(
  :chat_id,
  :description,
  :error_code,
  :ok,
  :parameter,
  :result,
  :story_id,
  keyword_init: true
)

# Match filter for RepostStory#create (any subset of RepostStory fields).
#
# @!attribute [rw] chat_id
#   @return [String, nil]
#
# @!attribute [rw] description
#   @return [String, nil]
#
# @!attribute [rw] error_code
#   @return [Integer, nil]
#
# @!attribute [rw] ok
#   @return [Boolean, nil]
#
# @!attribute [rw] parameter
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Object, nil]
#
# @!attribute [rw] story_id
#   @return [Integer, nil]
RepostStoryCreateData = Struct.new(
  :chat_id,
  :description,
  :error_code,
  :ok,
  :parameter,
  :result,
  :story_id,
  keyword_init: true
)

# SendChatAction entity data model.
#
# @!attribute [rw] action
#   @return [String]
#
# @!attribute [rw] chat_id
#   @return [String]
#
# @!attribute [rw] description
#   @return [String, nil]
#
# @!attribute [rw] error_code
#   @return [Integer, nil]
#
# @!attribute [rw] message_thread_id
#   @return [Integer, nil]
#
# @!attribute [rw] ok
#   @return [Boolean]
#
# @!attribute [rw] parameter
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Object, nil]
SendChatAction = Struct.new(
  :action,
  :chat_id,
  :description,
  :error_code,
  :message_thread_id,
  :ok,
  :parameter,
  :result,
  keyword_init: true
)

# Match filter for SendChatAction#create (any subset of SendChatAction fields).
#
# @!attribute [rw] action
#   @return [String, nil]
#
# @!attribute [rw] chat_id
#   @return [String, nil]
#
# @!attribute [rw] description
#   @return [String, nil]
#
# @!attribute [rw] error_code
#   @return [Integer, nil]
#
# @!attribute [rw] message_thread_id
#   @return [Integer, nil]
#
# @!attribute [rw] ok
#   @return [Boolean, nil]
#
# @!attribute [rw] parameter
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Object, nil]
SendChatActionCreateData = Struct.new(
  :action,
  :chat_id,
  :description,
  :error_code,
  :message_thread_id,
  :ok,
  :parameter,
  :result,
  keyword_init: true
)

# SendMessageDraft entity data model.
#
# @!attribute [rw] chat_id
#   @return [String]
#
# @!attribute [rw] description
#   @return [String, nil]
#
# @!attribute [rw] error_code
#   @return [Integer, nil]
#
# @!attribute [rw] message_thread_id
#   @return [Integer, nil]
#
# @!attribute [rw] ok
#   @return [Boolean]
#
# @!attribute [rw] parameter
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Object, nil]
#
# @!attribute [rw] text
#   @return [String]
SendMessageDraft = Struct.new(
  :chat_id,
  :description,
  :error_code,
  :message_thread_id,
  :ok,
  :parameter,
  :result,
  :text,
  keyword_init: true
)

# Match filter for SendMessageDraft#create (any subset of SendMessageDraft fields).
#
# @!attribute [rw] chat_id
#   @return [String, nil]
#
# @!attribute [rw] description
#   @return [String, nil]
#
# @!attribute [rw] error_code
#   @return [Integer, nil]
#
# @!attribute [rw] message_thread_id
#   @return [Integer, nil]
#
# @!attribute [rw] ok
#   @return [Boolean, nil]
#
# @!attribute [rw] parameter
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Object, nil]
#
# @!attribute [rw] text
#   @return [String, nil]
SendMessageDraftCreateData = Struct.new(
  :chat_id,
  :description,
  :error_code,
  :message_thread_id,
  :ok,
  :parameter,
  :result,
  :text,
  keyword_init: true
)

# SetMyProfilePhoto entity data model.
#
# @!attribute [rw] description
#   @return [String, nil]
#
# @!attribute [rw] error_code
#   @return [Integer, nil]
#
# @!attribute [rw] ok
#   @return [Boolean]
#
# @!attribute [rw] parameter
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Object, nil]
SetMyProfilePhoto = Struct.new(
  :description,
  :error_code,
  :ok,
  :parameter,
  :result,
  keyword_init: true
)

# Match filter for SetMyProfilePhoto#create (any subset of SetMyProfilePhoto fields).
#
# @!attribute [rw] description
#   @return [String, nil]
#
# @!attribute [rw] error_code
#   @return [Integer, nil]
#
# @!attribute [rw] ok
#   @return [Boolean, nil]
#
# @!attribute [rw] parameter
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Object, nil]
SetMyProfilePhotoCreateData = Struct.new(
  :description,
  :error_code,
  :ok,
  :parameter,
  :result,
  keyword_init: true
)

# UnpinAllForumTopicMessage entity data model.
#
# @!attribute [rw] chat_id
#   @return [String]
#
# @!attribute [rw] description
#   @return [String, nil]
#
# @!attribute [rw] error_code
#   @return [Integer, nil]
#
# @!attribute [rw] message_thread_id
#   @return [Integer]
#
# @!attribute [rw] ok
#   @return [Boolean]
#
# @!attribute [rw] parameter
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Object, nil]
UnpinAllForumTopicMessage = Struct.new(
  :chat_id,
  :description,
  :error_code,
  :message_thread_id,
  :ok,
  :parameter,
  :result,
  keyword_init: true
)

# Match filter for UnpinAllForumTopicMessage#create (any subset of UnpinAllForumTopicMessage fields).
#
# @!attribute [rw] chat_id
#   @return [String, nil]
#
# @!attribute [rw] description
#   @return [String, nil]
#
# @!attribute [rw] error_code
#   @return [Integer, nil]
#
# @!attribute [rw] message_thread_id
#   @return [Integer, nil]
#
# @!attribute [rw] ok
#   @return [Boolean, nil]
#
# @!attribute [rw] parameter
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Object, nil]
UnpinAllForumTopicMessageCreateData = Struct.new(
  :chat_id,
  :description,
  :error_code,
  :message_thread_id,
  :ok,
  :parameter,
  :result,
  keyword_init: true
)

# Update entity data model.
#
# @!attribute [rw] allowed_update
#   @return [Array, nil]
#
# @!attribute [rw] description
#   @return [String, nil]
#
# @!attribute [rw] error_code
#   @return [Integer, nil]
#
# @!attribute [rw] limit
#   @return [Integer, nil]
#
# @!attribute [rw] offset
#   @return [Integer, nil]
#
# @!attribute [rw] ok
#   @return [Boolean]
#
# @!attribute [rw] parameter
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Array, nil]
#
# @!attribute [rw] timeout
#   @return [Integer, nil]
Update = Struct.new(
  :allowed_update,
  :description,
  :error_code,
  :limit,
  :offset,
  :ok,
  :parameter,
  :result,
  :timeout,
  keyword_init: true
)

# Match filter for Update#list (any subset of Update fields).
#
# @!attribute [rw] allowed_update
#   @return [Array, nil]
#
# @!attribute [rw] description
#   @return [String, nil]
#
# @!attribute [rw] error_code
#   @return [Integer, nil]
#
# @!attribute [rw] limit
#   @return [Integer, nil]
#
# @!attribute [rw] offset
#   @return [Integer, nil]
#
# @!attribute [rw] ok
#   @return [Boolean, nil]
#
# @!attribute [rw] parameter
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Array, nil]
#
# @!attribute [rw] timeout
#   @return [Integer, nil]
UpdateListMatch = Struct.new(
  :allowed_update,
  :description,
  :error_code,
  :limit,
  :offset,
  :ok,
  :parameter,
  :result,
  :timeout,
  keyword_init: true
)

# Match filter for Update#create (any subset of Update fields).
#
# @!attribute [rw] allowed_update
#   @return [Array, nil]
#
# @!attribute [rw] description
#   @return [String, nil]
#
# @!attribute [rw] error_code
#   @return [Integer, nil]
#
# @!attribute [rw] limit
#   @return [Integer, nil]
#
# @!attribute [rw] offset
#   @return [Integer, nil]
#
# @!attribute [rw] ok
#   @return [Boolean, nil]
#
# @!attribute [rw] parameter
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Array, nil]
#
# @!attribute [rw] timeout
#   @return [Integer, nil]
UpdateCreateData = Struct.new(
  :allowed_update,
  :description,
  :error_code,
  :limit,
  :offset,
  :ok,
  :parameter,
  :result,
  :timeout,
  keyword_init: true
)

