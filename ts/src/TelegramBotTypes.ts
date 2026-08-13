// Typed models for the TelegramBot SDK.
//
// GENERATED from the API model: main.kit.entity.<e>.fields[] and per-op
// params (op.<name>.points[].args.params[]). Field/param types come from the
// canonical type sentinels via @voxgig/sdkgen canonToType (source of truth:
// @voxgig/apidef VALID_CANON). Do not edit by hand.

export interface ApproveSuggestedPost {
  chat_id: string
  description?: string
  error_code?: number
  message_id: number
  ok: boolean
  parameters?: Record<string, any>
  result?: any[]
}

export interface ApproveSuggestedPostCreateData {
  chat_id: string
  description?: string
  error_code?: number
  message_id: number
  ok: boolean
  parameters?: Record<string, any>
  result?: any[]
}

export interface DeclineSuggestedPost {
  chat_id: string
  description?: string
  error_code?: number
  message_id: number
  ok: boolean
  parameters?: Record<string, any>
  result?: any[]
}

export interface DeclineSuggestedPostCreateData {
  chat_id: string
  description?: string
  error_code?: number
  message_id: number
  ok: boolean
  parameters?: Record<string, any>
  result?: any[]
}

export interface DeleteForumTopic {
  chat_id: string
  description?: string
  error_code?: number
  message_thread_id: number
  ok: boolean
  parameters?: Record<string, any>
  result?: any[]
}

export interface DeleteForumTopicCreateData {
  chat_id: string
  description?: string
  error_code?: number
  message_thread_id: number
  ok: boolean
  parameters?: Record<string, any>
  result?: any[]
}

export interface EditForumTopic {
  chat_id: string
  description?: string
  error_code?: number
  icon_custom_emoji_id?: string
  message_thread_id: number
  name?: string
  ok: boolean
  parameters?: Record<string, any>
  result?: any[]
}

export interface EditForumTopicCreateData {
  chat_id: string
  description?: string
  error_code?: number
  icon_custom_emoji_id?: string
  message_thread_id: number
  name?: string
  ok: boolean
  parameters?: Record<string, any>
  result?: any[]
}

export interface File {
  file_id: string
}

export interface FileCreateData {
  file_id: string
}

export interface ForumTopic {
  chat_id: string
  icon_color?: number
  icon_custom_emoji_id?: string
  name: string
}

export interface ForumTopicCreateData {
  chat_id: string
  icon_color?: number
  icon_custom_emoji_id?: string
  name: string
}

export interface GetBusinessAccountGift {
  description?: string
  error_code?: number
  exclude_from_blockchain?: boolean
  exclude_limited_non_upgradable?: boolean
  exclude_limited_upgradable?: boolean
  ok: boolean
  parameters?: Record<string, any>
  result?: any[]
}

export interface GetBusinessAccountGiftCreateData {
  description?: string
  error_code?: number
  exclude_from_blockchain?: boolean
  exclude_limited_non_upgradable?: boolean
  exclude_limited_upgradable?: boolean
  ok: boolean
  parameters?: Record<string, any>
  result?: any[]
}

export interface GetChatGift {
  chat_id: string
  description?: string
  error_code?: number
  ok: boolean
  parameters?: Record<string, any>
  result?: any[]
}

export interface GetChatGiftCreateData {
  chat_id: string
  description?: string
  error_code?: number
  ok: boolean
  parameters?: Record<string, any>
  result?: any[]
}

export interface GetMe {
  description?: string
  error_code?: number
  ok: boolean
  parameters?: Record<string, any>
  result?: any[]
}

export interface GetMeLoadMatch {
  description?: string
  error_code?: number
  ok?: boolean
  parameters?: Record<string, any>
  result?: any[]
}

export interface GetMeCreateData {
  description?: string
  error_code?: number
  ok: boolean
  parameters?: Record<string, any>
  result?: any[]
}

export interface GetUserGift {
  description?: string
  error_code?: number
  ok: boolean
  parameters?: Record<string, any>
  result?: any[]
  user_id: number
}

export interface GetUserGiftCreateData {
  description?: string
  error_code?: number
  ok: boolean
  parameters?: Record<string, any>
  result?: any[]
  user_id: number
}

export interface GetUserProfileAudio {
  description?: string
  error_code?: number
  ok: boolean
  parameters?: Record<string, any>
  result?: any[]
  user_id: number
}

export interface GetUserProfileAudioCreateData {
  description?: string
  error_code?: number
  ok: boolean
  parameters?: Record<string, any>
  result?: any[]
  user_id: number
}

export interface Message {
  chat_id: string
  direct_messages_topic_id?: number
  disable_notification?: boolean
  disable_web_page_preview?: boolean
  from_chat_id: string
  latitude: number
  longitude: number
  message_effect_id?: string
  message_id: number
  message_thread_id?: number
  options: any[]
  parse_mode?: string
  protect_content?: boolean
  question: string
  reply_to_message_id?: number
  text: string
}

export interface MessageCreateData {
  chat_id: string
  direct_messages_topic_id?: number
  disable_notification?: boolean
  disable_web_page_preview?: boolean
  from_chat_id: string
  latitude: number
  longitude: number
  message_effect_id?: string
  message_id: number
  message_thread_id?: number
  options: any[]
  parse_mode?: string
  protect_content?: boolean
  question: string
  reply_to_message_id?: number
  text: string
}

export interface MessageId {
  chat_id: string
  direct_messages_topic_id?: number
  from_chat_id: string
  message_effect_id?: string
  message_id: number
  message_thread_id?: number
}

export interface MessageIdCreateData {
  chat_id: string
  direct_messages_topic_id?: number
  from_chat_id: string
  message_effect_id?: string
  message_id: number
  message_thread_id?: number
}

export interface PromoteChatMember {
  can_delete_messages?: boolean
  can_edit_messages?: boolean
  can_manage_chat?: boolean
  can_manage_direct_messages?: boolean
  can_post_messages?: boolean
  chat_id: string
  description?: string
  error_code?: number
  ok: boolean
  parameters?: Record<string, any>
  result?: any[]
  user_id: number
}

export interface PromoteChatMemberCreateData {
  can_delete_messages?: boolean
  can_edit_messages?: boolean
  can_manage_chat?: boolean
  can_manage_direct_messages?: boolean
  can_post_messages?: boolean
  chat_id: string
  description?: string
  error_code?: number
  ok: boolean
  parameters?: Record<string, any>
  result?: any[]
  user_id: number
}

export interface RemoveMyProfilePhoto {
  description?: string
  error_code?: number
  ok: boolean
  parameters?: Record<string, any>
  result?: any[]
}

export interface RemoveMyProfilePhotoCreateData {
  description?: string
  error_code?: number
  ok: boolean
  parameters?: Record<string, any>
  result?: any[]
}

export interface RepostStory {
  chat_id: string
  description?: string
  error_code?: number
  ok: boolean
  parameters?: Record<string, any>
  result?: any[]
  story_id: number
}

export interface RepostStoryCreateData {
  chat_id: string
  description?: string
  error_code?: number
  ok: boolean
  parameters?: Record<string, any>
  result?: any[]
  story_id: number
}

export interface SendChatAction {
  action: string
  chat_id: string
  description?: string
  error_code?: number
  message_thread_id?: number
  ok: boolean
  parameters?: Record<string, any>
  result?: any[]
}

export interface SendChatActionCreateData {
  action: string
  chat_id: string
  description?: string
  error_code?: number
  message_thread_id?: number
  ok: boolean
  parameters?: Record<string, any>
  result?: any[]
}

export interface SendMessageDraft {
  chat_id: string
  description?: string
  error_code?: number
  message_thread_id?: number
  ok: boolean
  parameters?: Record<string, any>
  result?: any[]
  text: string
}

export interface SendMessageDraftCreateData {
  chat_id: string
  description?: string
  error_code?: number
  message_thread_id?: number
  ok: boolean
  parameters?: Record<string, any>
  result?: any[]
  text: string
}

export interface SetMyProfilePhoto {
  description?: string
  error_code?: number
  ok: boolean
  parameters?: Record<string, any>
  result?: any[]
}

export interface SetMyProfilePhotoCreateData {
  description?: string
  error_code?: number
  ok: boolean
  parameters?: Record<string, any>
  result?: any[]
}

export interface UnpinAllForumTopicMessage {
  chat_id: string
  description?: string
  error_code?: number
  message_thread_id: number
  ok: boolean
  parameters?: Record<string, any>
  result?: any[]
}

export interface UnpinAllForumTopicMessageCreateData {
  chat_id: string
  description?: string
  error_code?: number
  message_thread_id: number
  ok: boolean
  parameters?: Record<string, any>
  result?: any[]
}

export interface Update {
  allowed_updates?: any[]
  description?: string
  error_code?: number
  limit?: number
  offset?: number
  ok: boolean
  parameters?: Record<string, any>
  result?: any[]
  timeout?: number
}

export interface UpdateListMatch {
  allowed_updates?: any[]
  description?: string
  error_code?: number
  limit?: number
  offset?: number
  ok?: boolean
  parameters?: Record<string, any>
  result?: any[]
  timeout?: number
}

export interface UpdateCreateData {
  allowed_updates?: any[]
  description?: string
  error_code?: number
  limit?: number
  offset?: number
  ok: boolean
  parameters?: Record<string, any>
  result?: any[]
  timeout?: number
}

