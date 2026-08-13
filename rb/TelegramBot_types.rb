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
# @!attribute [rw] parameters
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Array, nil]
ApproveSuggestedPost = Struct.new(
  :chat_id,
  :description,
  :error_code,
  :message_id,
  :ok,
  :parameters,
  :result,
  keyword_init: true
)

# Request payload for ApproveSuggestedPost#create.
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
# @!attribute [rw] parameters
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Array, nil]
ApproveSuggestedPostCreateData = Struct.new(
  :chat_id,
  :description,
  :error_code,
  :message_id,
  :ok,
  :parameters,
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
# @!attribute [rw] parameters
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Array, nil]
DeclineSuggestedPost = Struct.new(
  :chat_id,
  :description,
  :error_code,
  :message_id,
  :ok,
  :parameters,
  :result,
  keyword_init: true
)

# Request payload for DeclineSuggestedPost#create.
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
# @!attribute [rw] parameters
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Array, nil]
DeclineSuggestedPostCreateData = Struct.new(
  :chat_id,
  :description,
  :error_code,
  :message_id,
  :ok,
  :parameters,
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
# @!attribute [rw] parameters
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Array, nil]
DeleteForumTopic = Struct.new(
  :chat_id,
  :description,
  :error_code,
  :message_thread_id,
  :ok,
  :parameters,
  :result,
  keyword_init: true
)

# Request payload for DeleteForumTopic#create.
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
# @!attribute [rw] parameters
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Array, nil]
DeleteForumTopicCreateData = Struct.new(
  :chat_id,
  :description,
  :error_code,
  :message_thread_id,
  :ok,
  :parameters,
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
# @!attribute [rw] parameters
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Array, nil]
EditForumTopic = Struct.new(
  :chat_id,
  :description,
  :error_code,
  :icon_custom_emoji_id,
  :message_thread_id,
  :name,
  :ok,
  :parameters,
  :result,
  keyword_init: true
)

# Request payload for EditForumTopic#create.
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
# @!attribute [rw] parameters
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Array, nil]
EditForumTopicCreateData = Struct.new(
  :chat_id,
  :description,
  :error_code,
  :icon_custom_emoji_id,
  :message_thread_id,
  :name,
  :ok,
  :parameters,
  :result,
  keyword_init: true
)

# File entity data model.
#
# @!attribute [rw] file_id
#   @return [String]
FileType = Struct.new(
  :file_id,
  keyword_init: true
)

# Request payload for File#create.
#
# @!attribute [rw] file_id
#   @return [String]
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

# Request payload for ForumTopic#create.
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
# @!attribute [rw] parameters
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Array, nil]
GetBusinessAccountGift = Struct.new(
  :description,
  :error_code,
  :exclude_from_blockchain,
  :exclude_limited_non_upgradable,
  :exclude_limited_upgradable,
  :ok,
  :parameters,
  :result,
  keyword_init: true
)

# Request payload for GetBusinessAccountGift#create.
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
# @!attribute [rw] parameters
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Array, nil]
GetBusinessAccountGiftCreateData = Struct.new(
  :description,
  :error_code,
  :exclude_from_blockchain,
  :exclude_limited_non_upgradable,
  :exclude_limited_upgradable,
  :ok,
  :parameters,
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
# @!attribute [rw] parameters
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Array, nil]
GetChatGift = Struct.new(
  :chat_id,
  :description,
  :error_code,
  :ok,
  :parameters,
  :result,
  keyword_init: true
)

# Request payload for GetChatGift#create.
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
# @!attribute [rw] parameters
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Array, nil]
GetChatGiftCreateData = Struct.new(
  :chat_id,
  :description,
  :error_code,
  :ok,
  :parameters,
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
# @!attribute [rw] parameters
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Array, nil]
GetMe = Struct.new(
  :description,
  :error_code,
  :ok,
  :parameters,
  :result,
  keyword_init: true
)

# Request payload for GetMe#load.
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
# @!attribute [rw] parameters
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Array, nil]
GetMeLoadMatch = Struct.new(
  :description,
  :error_code,
  :ok,
  :parameters,
  :result,
  keyword_init: true
)

# Request payload for GetMe#create.
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
# @!attribute [rw] parameters
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Array, nil]
GetMeCreateData = Struct.new(
  :description,
  :error_code,
  :ok,
  :parameters,
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
# @!attribute [rw] parameters
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Array, nil]
#
# @!attribute [rw] user_id
#   @return [Integer]
GetUserGift = Struct.new(
  :description,
  :error_code,
  :ok,
  :parameters,
  :result,
  :user_id,
  keyword_init: true
)

# Request payload for GetUserGift#create.
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
# @!attribute [rw] parameters
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Array, nil]
#
# @!attribute [rw] user_id
#   @return [Integer]
GetUserGiftCreateData = Struct.new(
  :description,
  :error_code,
  :ok,
  :parameters,
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
# @!attribute [rw] parameters
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Array, nil]
#
# @!attribute [rw] user_id
#   @return [Integer]
GetUserProfileAudio = Struct.new(
  :description,
  :error_code,
  :ok,
  :parameters,
  :result,
  :user_id,
  keyword_init: true
)

# Request payload for GetUserProfileAudio#create.
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
# @!attribute [rw] parameters
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Array, nil]
#
# @!attribute [rw] user_id
#   @return [Integer]
GetUserProfileAudioCreateData = Struct.new(
  :description,
  :error_code,
  :ok,
  :parameters,
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
# @!attribute [rw] options
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
  :options,
  :parse_mode,
  :protect_content,
  :question,
  :reply_to_message_id,
  :text,
  keyword_init: true
)

# Request payload for Message#create.
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
# @!attribute [rw] options
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
  :options,
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

# Request payload for MessageId#create.
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
# @!attribute [rw] can_delete_messages
#   @return [Boolean, nil]
#
# @!attribute [rw] can_edit_messages
#   @return [Boolean, nil]
#
# @!attribute [rw] can_manage_chat
#   @return [Boolean, nil]
#
# @!attribute [rw] can_manage_direct_messages
#   @return [Boolean, nil]
#
# @!attribute [rw] can_post_messages
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
# @!attribute [rw] parameters
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Array, nil]
#
# @!attribute [rw] user_id
#   @return [Integer]
PromoteChatMember = Struct.new(
  :can_delete_messages,
  :can_edit_messages,
  :can_manage_chat,
  :can_manage_direct_messages,
  :can_post_messages,
  :chat_id,
  :description,
  :error_code,
  :ok,
  :parameters,
  :result,
  :user_id,
  keyword_init: true
)

# Request payload for PromoteChatMember#create.
#
# @!attribute [rw] can_delete_messages
#   @return [Boolean, nil]
#
# @!attribute [rw] can_edit_messages
#   @return [Boolean, nil]
#
# @!attribute [rw] can_manage_chat
#   @return [Boolean, nil]
#
# @!attribute [rw] can_manage_direct_messages
#   @return [Boolean, nil]
#
# @!attribute [rw] can_post_messages
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
# @!attribute [rw] parameters
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Array, nil]
#
# @!attribute [rw] user_id
#   @return [Integer]
PromoteChatMemberCreateData = Struct.new(
  :can_delete_messages,
  :can_edit_messages,
  :can_manage_chat,
  :can_manage_direct_messages,
  :can_post_messages,
  :chat_id,
  :description,
  :error_code,
  :ok,
  :parameters,
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
# @!attribute [rw] parameters
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Array, nil]
RemoveMyProfilePhoto = Struct.new(
  :description,
  :error_code,
  :ok,
  :parameters,
  :result,
  keyword_init: true
)

# Request payload for RemoveMyProfilePhoto#create.
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
# @!attribute [rw] parameters
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Array, nil]
RemoveMyProfilePhotoCreateData = Struct.new(
  :description,
  :error_code,
  :ok,
  :parameters,
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
# @!attribute [rw] parameters
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Array, nil]
#
# @!attribute [rw] story_id
#   @return [Integer]
RepostStory = Struct.new(
  :chat_id,
  :description,
  :error_code,
  :ok,
  :parameters,
  :result,
  :story_id,
  keyword_init: true
)

# Request payload for RepostStory#create.
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
# @!attribute [rw] parameters
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Array, nil]
#
# @!attribute [rw] story_id
#   @return [Integer]
RepostStoryCreateData = Struct.new(
  :chat_id,
  :description,
  :error_code,
  :ok,
  :parameters,
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
# @!attribute [rw] parameters
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Array, nil]
SendChatAction = Struct.new(
  :action,
  :chat_id,
  :description,
  :error_code,
  :message_thread_id,
  :ok,
  :parameters,
  :result,
  keyword_init: true
)

# Request payload for SendChatAction#create.
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
# @!attribute [rw] parameters
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Array, nil]
SendChatActionCreateData = Struct.new(
  :action,
  :chat_id,
  :description,
  :error_code,
  :message_thread_id,
  :ok,
  :parameters,
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
# @!attribute [rw] parameters
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Array, nil]
#
# @!attribute [rw] text
#   @return [String]
SendMessageDraft = Struct.new(
  :chat_id,
  :description,
  :error_code,
  :message_thread_id,
  :ok,
  :parameters,
  :result,
  :text,
  keyword_init: true
)

# Request payload for SendMessageDraft#create.
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
# @!attribute [rw] parameters
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Array, nil]
#
# @!attribute [rw] text
#   @return [String]
SendMessageDraftCreateData = Struct.new(
  :chat_id,
  :description,
  :error_code,
  :message_thread_id,
  :ok,
  :parameters,
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
# @!attribute [rw] parameters
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Array, nil]
SetMyProfilePhoto = Struct.new(
  :description,
  :error_code,
  :ok,
  :parameters,
  :result,
  keyword_init: true
)

# Request payload for SetMyProfilePhoto#create.
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
# @!attribute [rw] parameters
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Array, nil]
SetMyProfilePhotoCreateData = Struct.new(
  :description,
  :error_code,
  :ok,
  :parameters,
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
# @!attribute [rw] parameters
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Array, nil]
UnpinAllForumTopicMessage = Struct.new(
  :chat_id,
  :description,
  :error_code,
  :message_thread_id,
  :ok,
  :parameters,
  :result,
  keyword_init: true
)

# Request payload for UnpinAllForumTopicMessage#create.
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
# @!attribute [rw] parameters
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Array, nil]
UnpinAllForumTopicMessageCreateData = Struct.new(
  :chat_id,
  :description,
  :error_code,
  :message_thread_id,
  :ok,
  :parameters,
  :result,
  keyword_init: true
)

# Update entity data model.
#
# @!attribute [rw] allowed_updates
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
# @!attribute [rw] parameters
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Array, nil]
#
# @!attribute [rw] timeout
#   @return [Integer, nil]
Update = Struct.new(
  :allowed_updates,
  :description,
  :error_code,
  :limit,
  :offset,
  :ok,
  :parameters,
  :result,
  :timeout,
  keyword_init: true
)

# Request payload for Update#list.
#
# @!attribute [rw] allowed_updates
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
# @!attribute [rw] parameters
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Array, nil]
#
# @!attribute [rw] timeout
#   @return [Integer, nil]
UpdateListMatch = Struct.new(
  :allowed_updates,
  :description,
  :error_code,
  :limit,
  :offset,
  :ok,
  :parameters,
  :result,
  :timeout,
  keyword_init: true
)

# Request payload for Update#create.
#
# @!attribute [rw] allowed_updates
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
# @!attribute [rw] parameters
#   @return [Hash, nil]
#
# @!attribute [rw] result
#   @return [Array, nil]
#
# @!attribute [rw] timeout
#   @return [Integer, nil]
UpdateCreateData = Struct.new(
  :allowed_updates,
  :description,
  :error_code,
  :limit,
  :offset,
  :ok,
  :parameters,
  :result,
  :timeout,
  keyword_init: true
)

