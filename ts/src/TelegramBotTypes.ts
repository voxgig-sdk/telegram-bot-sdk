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
  parameter?: Record<string, any>
  result?: any
}

export type ApproveSuggestedPostCreateData = Partial<ApproveSuggestedPost>

export interface DeclineSuggestedPost {
  chat_id: string
  description?: string
  error_code?: number
  message_id: number
  ok: boolean
  parameter?: Record<string, any>
  result?: any
}

export type DeclineSuggestedPostCreateData = Partial<DeclineSuggestedPost>

export interface DeleteForumTopic {
  chat_id: string
  description?: string
  error_code?: number
  message_thread_id: number
  ok: boolean
  parameter?: Record<string, any>
  result?: any
}

export type DeleteForumTopicCreateData = Partial<DeleteForumTopic>

export interface EditForumTopic {
  chat_id: string
  description?: string
  error_code?: number
  icon_custom_emoji_id?: string
  message_thread_id: number
  name?: string
  ok: boolean
  parameter?: Record<string, any>
  result?: any
}

export type EditForumTopicCreateData = Partial<EditForumTopic>

export interface File {
  file_id: string
}

export type FileCreateData = Partial<File>

export interface ForumTopic {
  chat_id: string
  icon_color?: number
  icon_custom_emoji_id?: string
  name: string
}

export type ForumTopicCreateData = Partial<ForumTopic>

export interface GetBusinessAccountGift {
  description?: string
  error_code?: number
  exclude_from_blockchain?: boolean
  exclude_limited_non_upgradable?: boolean
  exclude_limited_upgradable?: boolean
  ok: boolean
  parameter?: Record<string, any>
  result?: any
}

export type GetBusinessAccountGiftCreateData = Partial<GetBusinessAccountGift>

export interface GetChatGift {
  chat_id: string
  description?: string
  error_code?: number
  ok: boolean
  parameter?: Record<string, any>
  result?: any
}

export type GetChatGiftCreateData = Partial<GetChatGift>

export interface GetMe {
  description?: string
  error_code?: number
  ok: boolean
  parameter?: Record<string, any>
  result?: any
}

export type GetMeLoadMatch = Partial<GetMe>

export type GetMeCreateData = Partial<GetMe>

export interface GetUserGift {
  description?: string
  error_code?: number
  ok: boolean
  parameter?: Record<string, any>
  result?: any
  user_id: number
}

export type GetUserGiftCreateData = Partial<GetUserGift>

export interface GetUserProfileAudio {
  description?: string
  error_code?: number
  ok: boolean
  parameter?: Record<string, any>
  result?: any
  user_id: number
}

export type GetUserProfileAudioCreateData = Partial<GetUserProfileAudio>

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
  option: any[]
  parse_mode?: string
  protect_content?: boolean
  question: string
  reply_to_message_id?: number
  text: string
}

export type MessageCreateData = Partial<Message>

export interface MessageId {
  chat_id: string
  direct_messages_topic_id?: number
  from_chat_id: string
  message_effect_id?: string
  message_id: number
  message_thread_id?: number
}

export type MessageIdCreateData = Partial<MessageId>

export interface PromoteChatMember {
  can_delete_message?: boolean
  can_edit_message?: boolean
  can_manage_chat?: boolean
  can_manage_direct_message?: boolean
  can_post_message?: boolean
  chat_id: string
  description?: string
  error_code?: number
  ok: boolean
  parameter?: Record<string, any>
  result?: any
  user_id: number
}

export type PromoteChatMemberCreateData = Partial<PromoteChatMember>

export interface RemoveMyProfilePhoto {
  description?: string
  error_code?: number
  ok: boolean
  parameter?: Record<string, any>
  result?: any
}

export type RemoveMyProfilePhotoCreateData = Partial<RemoveMyProfilePhoto>

export interface RepostStory {
  chat_id: string
  description?: string
  error_code?: number
  ok: boolean
  parameter?: Record<string, any>
  result?: any
  story_id: number
}

export type RepostStoryCreateData = Partial<RepostStory>

export interface SendChatAction {
  action: string
  chat_id: string
  description?: string
  error_code?: number
  message_thread_id?: number
  ok: boolean
  parameter?: Record<string, any>
  result?: any
}

export type SendChatActionCreateData = Partial<SendChatAction>

export interface SendMessageDraft {
  chat_id: string
  description?: string
  error_code?: number
  message_thread_id?: number
  ok: boolean
  parameter?: Record<string, any>
  result?: any
  text: string
}

export type SendMessageDraftCreateData = Partial<SendMessageDraft>

export interface SetMyProfilePhoto {
  description?: string
  error_code?: number
  ok: boolean
  parameter?: Record<string, any>
  result?: any
}

export type SetMyProfilePhotoCreateData = Partial<SetMyProfilePhoto>

export interface UnpinAllForumTopicMessage {
  chat_id: string
  description?: string
  error_code?: number
  message_thread_id: number
  ok: boolean
  parameter?: Record<string, any>
  result?: any
}

export type UnpinAllForumTopicMessageCreateData = Partial<UnpinAllForumTopicMessage>

export interface Update {
  allowed_update?: any[]
  description?: string
  error_code?: number
  limit?: number
  offset?: number
  ok: boolean
  parameter?: Record<string, any>
  result?: any[]
  timeout?: number
}

export type UpdateListMatch = Partial<Update>

export type UpdateCreateData = Partial<Update>

