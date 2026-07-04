// Typed models for the TelegramBot SDK.
//
// GENERATED from the API model: main.kit.entity.<e>.fields[] and per-op
// params (op.<name>.points[].args.params[]). Field/param types come from the
// canonical type sentinels via @voxgig/sdkgen canonToType (source of truth:
// @voxgig/apidef VALID_CANON). Do not edit by hand.
package entity

import "encoding/json"

// ApproveSuggestedPost is the typed data model for the approve_suggested_post entity.
type ApproveSuggestedPost struct {
	ChatId string `json:"chat_id"`
	Description *string `json:"description,omitempty"`
	ErrorCode *int `json:"error_code,omitempty"`
	MessageId int `json:"message_id"`
	Ok bool `json:"ok"`
	Parameter *map[string]any `json:"parameter,omitempty"`
	Result *any `json:"result,omitempty"`
}

// ApproveSuggestedPostCreateData mirrors the approve_suggested_post fields as an all-optional match
// filter (Go analog of Partial<ApproveSuggestedPost>).
type ApproveSuggestedPostCreateData struct {
	ChatId *string `json:"chat_id,omitempty"`
	Description *string `json:"description,omitempty"`
	ErrorCode *int `json:"error_code,omitempty"`
	MessageId *int `json:"message_id,omitempty"`
	Ok *bool `json:"ok,omitempty"`
	Parameter *map[string]any `json:"parameter,omitempty"`
	Result *any `json:"result,omitempty"`
}

// DeclineSuggestedPost is the typed data model for the decline_suggested_post entity.
type DeclineSuggestedPost struct {
	ChatId string `json:"chat_id"`
	Description *string `json:"description,omitempty"`
	ErrorCode *int `json:"error_code,omitempty"`
	MessageId int `json:"message_id"`
	Ok bool `json:"ok"`
	Parameter *map[string]any `json:"parameter,omitempty"`
	Result *any `json:"result,omitempty"`
}

// DeclineSuggestedPostCreateData mirrors the decline_suggested_post fields as an all-optional match
// filter (Go analog of Partial<DeclineSuggestedPost>).
type DeclineSuggestedPostCreateData struct {
	ChatId *string `json:"chat_id,omitempty"`
	Description *string `json:"description,omitempty"`
	ErrorCode *int `json:"error_code,omitempty"`
	MessageId *int `json:"message_id,omitempty"`
	Ok *bool `json:"ok,omitempty"`
	Parameter *map[string]any `json:"parameter,omitempty"`
	Result *any `json:"result,omitempty"`
}

// DeleteForumTopic is the typed data model for the delete_forum_topic entity.
type DeleteForumTopic struct {
	ChatId string `json:"chat_id"`
	Description *string `json:"description,omitempty"`
	ErrorCode *int `json:"error_code,omitempty"`
	MessageThreadId int `json:"message_thread_id"`
	Ok bool `json:"ok"`
	Parameter *map[string]any `json:"parameter,omitempty"`
	Result *any `json:"result,omitempty"`
}

// DeleteForumTopicCreateData mirrors the delete_forum_topic fields as an all-optional match
// filter (Go analog of Partial<DeleteForumTopic>).
type DeleteForumTopicCreateData struct {
	ChatId *string `json:"chat_id,omitempty"`
	Description *string `json:"description,omitempty"`
	ErrorCode *int `json:"error_code,omitempty"`
	MessageThreadId *int `json:"message_thread_id,omitempty"`
	Ok *bool `json:"ok,omitempty"`
	Parameter *map[string]any `json:"parameter,omitempty"`
	Result *any `json:"result,omitempty"`
}

// EditForumTopic is the typed data model for the edit_forum_topic entity.
type EditForumTopic struct {
	ChatId string `json:"chat_id"`
	Description *string `json:"description,omitempty"`
	ErrorCode *int `json:"error_code,omitempty"`
	IconCustomEmojiId *string `json:"icon_custom_emoji_id,omitempty"`
	MessageThreadId int `json:"message_thread_id"`
	Name *string `json:"name,omitempty"`
	Ok bool `json:"ok"`
	Parameter *map[string]any `json:"parameter,omitempty"`
	Result *any `json:"result,omitempty"`
}

// EditForumTopicCreateData mirrors the edit_forum_topic fields as an all-optional match
// filter (Go analog of Partial<EditForumTopic>).
type EditForumTopicCreateData struct {
	ChatId *string `json:"chat_id,omitempty"`
	Description *string `json:"description,omitempty"`
	ErrorCode *int `json:"error_code,omitempty"`
	IconCustomEmojiId *string `json:"icon_custom_emoji_id,omitempty"`
	MessageThreadId *int `json:"message_thread_id,omitempty"`
	Name *string `json:"name,omitempty"`
	Ok *bool `json:"ok,omitempty"`
	Parameter *map[string]any `json:"parameter,omitempty"`
	Result *any `json:"result,omitempty"`
}

// File is the typed data model for the file entity.
type File struct {
	FileId string `json:"file_id"`
}

// FileCreateData mirrors the file fields as an all-optional match
// filter (Go analog of Partial<File>).
type FileCreateData struct {
	FileId *string `json:"file_id,omitempty"`
}

// ForumTopic is the typed data model for the forum_topic entity.
type ForumTopic struct {
	ChatId string `json:"chat_id"`
	IconColor *int `json:"icon_color,omitempty"`
	IconCustomEmojiId *string `json:"icon_custom_emoji_id,omitempty"`
	Name string `json:"name"`
}

// ForumTopicCreateData mirrors the forum_topic fields as an all-optional match
// filter (Go analog of Partial<ForumTopic>).
type ForumTopicCreateData struct {
	ChatId *string `json:"chat_id,omitempty"`
	IconColor *int `json:"icon_color,omitempty"`
	IconCustomEmojiId *string `json:"icon_custom_emoji_id,omitempty"`
	Name *string `json:"name,omitempty"`
}

// GetBusinessAccountGift is the typed data model for the get_business_account_gift entity.
type GetBusinessAccountGift struct {
	Description *string `json:"description,omitempty"`
	ErrorCode *int `json:"error_code,omitempty"`
	ExcludeFromBlockchain *bool `json:"exclude_from_blockchain,omitempty"`
	ExcludeLimitedNonUpgradable *bool `json:"exclude_limited_non_upgradable,omitempty"`
	ExcludeLimitedUpgradable *bool `json:"exclude_limited_upgradable,omitempty"`
	Ok bool `json:"ok"`
	Parameter *map[string]any `json:"parameter,omitempty"`
	Result *any `json:"result,omitempty"`
}

// GetBusinessAccountGiftCreateData mirrors the get_business_account_gift fields as an all-optional match
// filter (Go analog of Partial<GetBusinessAccountGift>).
type GetBusinessAccountGiftCreateData struct {
	Description *string `json:"description,omitempty"`
	ErrorCode *int `json:"error_code,omitempty"`
	ExcludeFromBlockchain *bool `json:"exclude_from_blockchain,omitempty"`
	ExcludeLimitedNonUpgradable *bool `json:"exclude_limited_non_upgradable,omitempty"`
	ExcludeLimitedUpgradable *bool `json:"exclude_limited_upgradable,omitempty"`
	Ok *bool `json:"ok,omitempty"`
	Parameter *map[string]any `json:"parameter,omitempty"`
	Result *any `json:"result,omitempty"`
}

// GetChatGift is the typed data model for the get_chat_gift entity.
type GetChatGift struct {
	ChatId string `json:"chat_id"`
	Description *string `json:"description,omitempty"`
	ErrorCode *int `json:"error_code,omitempty"`
	Ok bool `json:"ok"`
	Parameter *map[string]any `json:"parameter,omitempty"`
	Result *any `json:"result,omitempty"`
}

// GetChatGiftCreateData mirrors the get_chat_gift fields as an all-optional match
// filter (Go analog of Partial<GetChatGift>).
type GetChatGiftCreateData struct {
	ChatId *string `json:"chat_id,omitempty"`
	Description *string `json:"description,omitempty"`
	ErrorCode *int `json:"error_code,omitempty"`
	Ok *bool `json:"ok,omitempty"`
	Parameter *map[string]any `json:"parameter,omitempty"`
	Result *any `json:"result,omitempty"`
}

// GetMe is the typed data model for the get_me entity.
type GetMe struct {
	Description *string `json:"description,omitempty"`
	ErrorCode *int `json:"error_code,omitempty"`
	Ok bool `json:"ok"`
	Parameter *map[string]any `json:"parameter,omitempty"`
	Result *any `json:"result,omitempty"`
}

// GetMeLoadMatch mirrors the get_me fields as an all-optional match
// filter (Go analog of Partial<GetMe>).
type GetMeLoadMatch struct {
	Description *string `json:"description,omitempty"`
	ErrorCode *int `json:"error_code,omitempty"`
	Ok *bool `json:"ok,omitempty"`
	Parameter *map[string]any `json:"parameter,omitempty"`
	Result *any `json:"result,omitempty"`
}

// GetMeCreateData mirrors the get_me fields as an all-optional match
// filter (Go analog of Partial<GetMe>).
type GetMeCreateData struct {
	Description *string `json:"description,omitempty"`
	ErrorCode *int `json:"error_code,omitempty"`
	Ok *bool `json:"ok,omitempty"`
	Parameter *map[string]any `json:"parameter,omitempty"`
	Result *any `json:"result,omitempty"`
}

// GetUserGift is the typed data model for the get_user_gift entity.
type GetUserGift struct {
	Description *string `json:"description,omitempty"`
	ErrorCode *int `json:"error_code,omitempty"`
	Ok bool `json:"ok"`
	Parameter *map[string]any `json:"parameter,omitempty"`
	Result *any `json:"result,omitempty"`
	UserId int `json:"user_id"`
}

// GetUserGiftCreateData mirrors the get_user_gift fields as an all-optional match
// filter (Go analog of Partial<GetUserGift>).
type GetUserGiftCreateData struct {
	Description *string `json:"description,omitempty"`
	ErrorCode *int `json:"error_code,omitempty"`
	Ok *bool `json:"ok,omitempty"`
	Parameter *map[string]any `json:"parameter,omitempty"`
	Result *any `json:"result,omitempty"`
	UserId *int `json:"user_id,omitempty"`
}

// GetUserProfileAudio is the typed data model for the get_user_profile_audio entity.
type GetUserProfileAudio struct {
	Description *string `json:"description,omitempty"`
	ErrorCode *int `json:"error_code,omitempty"`
	Ok bool `json:"ok"`
	Parameter *map[string]any `json:"parameter,omitempty"`
	Result *any `json:"result,omitempty"`
	UserId int `json:"user_id"`
}

// GetUserProfileAudioCreateData mirrors the get_user_profile_audio fields as an all-optional match
// filter (Go analog of Partial<GetUserProfileAudio>).
type GetUserProfileAudioCreateData struct {
	Description *string `json:"description,omitempty"`
	ErrorCode *int `json:"error_code,omitempty"`
	Ok *bool `json:"ok,omitempty"`
	Parameter *map[string]any `json:"parameter,omitempty"`
	Result *any `json:"result,omitempty"`
	UserId *int `json:"user_id,omitempty"`
}

// Message is the typed data model for the message entity.
type Message struct {
	ChatId string `json:"chat_id"`
	DirectMessagesTopicId *int `json:"direct_messages_topic_id,omitempty"`
	DisableNotification *bool `json:"disable_notification,omitempty"`
	DisableWebPagePreview *bool `json:"disable_web_page_preview,omitempty"`
	FromChatId string `json:"from_chat_id"`
	Latitude float64 `json:"latitude"`
	Longitude float64 `json:"longitude"`
	MessageEffectId *string `json:"message_effect_id,omitempty"`
	MessageId int `json:"message_id"`
	MessageThreadId *int `json:"message_thread_id,omitempty"`
	Option []any `json:"option"`
	ParseMode *string `json:"parse_mode,omitempty"`
	ProtectContent *bool `json:"protect_content,omitempty"`
	Question string `json:"question"`
	ReplyToMessageId *int `json:"reply_to_message_id,omitempty"`
	Text string `json:"text"`
}

// MessageCreateData mirrors the message fields as an all-optional match
// filter (Go analog of Partial<Message>).
type MessageCreateData struct {
	ChatId *string `json:"chat_id,omitempty"`
	DirectMessagesTopicId *int `json:"direct_messages_topic_id,omitempty"`
	DisableNotification *bool `json:"disable_notification,omitempty"`
	DisableWebPagePreview *bool `json:"disable_web_page_preview,omitempty"`
	FromChatId *string `json:"from_chat_id,omitempty"`
	Latitude *float64 `json:"latitude,omitempty"`
	Longitude *float64 `json:"longitude,omitempty"`
	MessageEffectId *string `json:"message_effect_id,omitempty"`
	MessageId *int `json:"message_id,omitempty"`
	MessageThreadId *int `json:"message_thread_id,omitempty"`
	Option *[]any `json:"option,omitempty"`
	ParseMode *string `json:"parse_mode,omitempty"`
	ProtectContent *bool `json:"protect_content,omitempty"`
	Question *string `json:"question,omitempty"`
	ReplyToMessageId *int `json:"reply_to_message_id,omitempty"`
	Text *string `json:"text,omitempty"`
}

// MessageId is the typed data model for the message_id entity.
type MessageId struct {
	ChatId string `json:"chat_id"`
	DirectMessagesTopicId *int `json:"direct_messages_topic_id,omitempty"`
	FromChatId string `json:"from_chat_id"`
	MessageEffectId *string `json:"message_effect_id,omitempty"`
	MessageId int `json:"message_id"`
	MessageThreadId *int `json:"message_thread_id,omitempty"`
}

// MessageIdCreateData mirrors the message_id fields as an all-optional match
// filter (Go analog of Partial<MessageId>).
type MessageIdCreateData struct {
	ChatId *string `json:"chat_id,omitempty"`
	DirectMessagesTopicId *int `json:"direct_messages_topic_id,omitempty"`
	FromChatId *string `json:"from_chat_id,omitempty"`
	MessageEffectId *string `json:"message_effect_id,omitempty"`
	MessageId *int `json:"message_id,omitempty"`
	MessageThreadId *int `json:"message_thread_id,omitempty"`
}

// PromoteChatMember is the typed data model for the promote_chat_member entity.
type PromoteChatMember struct {
	CanDeleteMessage *bool `json:"can_delete_message,omitempty"`
	CanEditMessage *bool `json:"can_edit_message,omitempty"`
	CanManageChat *bool `json:"can_manage_chat,omitempty"`
	CanManageDirectMessage *bool `json:"can_manage_direct_message,omitempty"`
	CanPostMessage *bool `json:"can_post_message,omitempty"`
	ChatId string `json:"chat_id"`
	Description *string `json:"description,omitempty"`
	ErrorCode *int `json:"error_code,omitempty"`
	Ok bool `json:"ok"`
	Parameter *map[string]any `json:"parameter,omitempty"`
	Result *any `json:"result,omitempty"`
	UserId int `json:"user_id"`
}

// PromoteChatMemberCreateData mirrors the promote_chat_member fields as an all-optional match
// filter (Go analog of Partial<PromoteChatMember>).
type PromoteChatMemberCreateData struct {
	CanDeleteMessage *bool `json:"can_delete_message,omitempty"`
	CanEditMessage *bool `json:"can_edit_message,omitempty"`
	CanManageChat *bool `json:"can_manage_chat,omitempty"`
	CanManageDirectMessage *bool `json:"can_manage_direct_message,omitempty"`
	CanPostMessage *bool `json:"can_post_message,omitempty"`
	ChatId *string `json:"chat_id,omitempty"`
	Description *string `json:"description,omitempty"`
	ErrorCode *int `json:"error_code,omitempty"`
	Ok *bool `json:"ok,omitempty"`
	Parameter *map[string]any `json:"parameter,omitempty"`
	Result *any `json:"result,omitempty"`
	UserId *int `json:"user_id,omitempty"`
}

// RemoveMyProfilePhoto is the typed data model for the remove_my_profile_photo entity.
type RemoveMyProfilePhoto struct {
	Description *string `json:"description,omitempty"`
	ErrorCode *int `json:"error_code,omitempty"`
	Ok bool `json:"ok"`
	Parameter *map[string]any `json:"parameter,omitempty"`
	Result *any `json:"result,omitempty"`
}

// RemoveMyProfilePhotoCreateData mirrors the remove_my_profile_photo fields as an all-optional match
// filter (Go analog of Partial<RemoveMyProfilePhoto>).
type RemoveMyProfilePhotoCreateData struct {
	Description *string `json:"description,omitempty"`
	ErrorCode *int `json:"error_code,omitempty"`
	Ok *bool `json:"ok,omitempty"`
	Parameter *map[string]any `json:"parameter,omitempty"`
	Result *any `json:"result,omitempty"`
}

// RepostStory is the typed data model for the repost_story entity.
type RepostStory struct {
	ChatId string `json:"chat_id"`
	Description *string `json:"description,omitempty"`
	ErrorCode *int `json:"error_code,omitempty"`
	Ok bool `json:"ok"`
	Parameter *map[string]any `json:"parameter,omitempty"`
	Result *any `json:"result,omitempty"`
	StoryId int `json:"story_id"`
}

// RepostStoryCreateData mirrors the repost_story fields as an all-optional match
// filter (Go analog of Partial<RepostStory>).
type RepostStoryCreateData struct {
	ChatId *string `json:"chat_id,omitempty"`
	Description *string `json:"description,omitempty"`
	ErrorCode *int `json:"error_code,omitempty"`
	Ok *bool `json:"ok,omitempty"`
	Parameter *map[string]any `json:"parameter,omitempty"`
	Result *any `json:"result,omitempty"`
	StoryId *int `json:"story_id,omitempty"`
}

// SendChatAction is the typed data model for the send_chat_action entity.
type SendChatAction struct {
	Action string `json:"action"`
	ChatId string `json:"chat_id"`
	Description *string `json:"description,omitempty"`
	ErrorCode *int `json:"error_code,omitempty"`
	MessageThreadId *int `json:"message_thread_id,omitempty"`
	Ok bool `json:"ok"`
	Parameter *map[string]any `json:"parameter,omitempty"`
	Result *any `json:"result,omitempty"`
}

// SendChatActionCreateData mirrors the send_chat_action fields as an all-optional match
// filter (Go analog of Partial<SendChatAction>).
type SendChatActionCreateData struct {
	Action *string `json:"action,omitempty"`
	ChatId *string `json:"chat_id,omitempty"`
	Description *string `json:"description,omitempty"`
	ErrorCode *int `json:"error_code,omitempty"`
	MessageThreadId *int `json:"message_thread_id,omitempty"`
	Ok *bool `json:"ok,omitempty"`
	Parameter *map[string]any `json:"parameter,omitempty"`
	Result *any `json:"result,omitempty"`
}

// SendMessageDraft is the typed data model for the send_message_draft entity.
type SendMessageDraft struct {
	ChatId string `json:"chat_id"`
	Description *string `json:"description,omitempty"`
	ErrorCode *int `json:"error_code,omitempty"`
	MessageThreadId *int `json:"message_thread_id,omitempty"`
	Ok bool `json:"ok"`
	Parameter *map[string]any `json:"parameter,omitempty"`
	Result *any `json:"result,omitempty"`
	Text string `json:"text"`
}

// SendMessageDraftCreateData mirrors the send_message_draft fields as an all-optional match
// filter (Go analog of Partial<SendMessageDraft>).
type SendMessageDraftCreateData struct {
	ChatId *string `json:"chat_id,omitempty"`
	Description *string `json:"description,omitempty"`
	ErrorCode *int `json:"error_code,omitempty"`
	MessageThreadId *int `json:"message_thread_id,omitempty"`
	Ok *bool `json:"ok,omitempty"`
	Parameter *map[string]any `json:"parameter,omitempty"`
	Result *any `json:"result,omitempty"`
	Text *string `json:"text,omitempty"`
}

// SetMyProfilePhoto is the typed data model for the set_my_profile_photo entity.
type SetMyProfilePhoto struct {
	Description *string `json:"description,omitempty"`
	ErrorCode *int `json:"error_code,omitempty"`
	Ok bool `json:"ok"`
	Parameter *map[string]any `json:"parameter,omitempty"`
	Result *any `json:"result,omitempty"`
}

// SetMyProfilePhotoCreateData mirrors the set_my_profile_photo fields as an all-optional match
// filter (Go analog of Partial<SetMyProfilePhoto>).
type SetMyProfilePhotoCreateData struct {
	Description *string `json:"description,omitempty"`
	ErrorCode *int `json:"error_code,omitempty"`
	Ok *bool `json:"ok,omitempty"`
	Parameter *map[string]any `json:"parameter,omitempty"`
	Result *any `json:"result,omitempty"`
}

// UnpinAllForumTopicMessage is the typed data model for the unpin_all_forum_topic_message entity.
type UnpinAllForumTopicMessage struct {
	ChatId string `json:"chat_id"`
	Description *string `json:"description,omitempty"`
	ErrorCode *int `json:"error_code,omitempty"`
	MessageThreadId int `json:"message_thread_id"`
	Ok bool `json:"ok"`
	Parameter *map[string]any `json:"parameter,omitempty"`
	Result *any `json:"result,omitempty"`
}

// UnpinAllForumTopicMessageCreateData mirrors the unpin_all_forum_topic_message fields as an all-optional match
// filter (Go analog of Partial<UnpinAllForumTopicMessage>).
type UnpinAllForumTopicMessageCreateData struct {
	ChatId *string `json:"chat_id,omitempty"`
	Description *string `json:"description,omitempty"`
	ErrorCode *int `json:"error_code,omitempty"`
	MessageThreadId *int `json:"message_thread_id,omitempty"`
	Ok *bool `json:"ok,omitempty"`
	Parameter *map[string]any `json:"parameter,omitempty"`
	Result *any `json:"result,omitempty"`
}

// Update is the typed data model for the update entity.
type Update struct {
	AllowedUpdate *[]any `json:"allowed_update,omitempty"`
	Description *string `json:"description,omitempty"`
	ErrorCode *int `json:"error_code,omitempty"`
	Limit *int `json:"limit,omitempty"`
	Offset *int `json:"offset,omitempty"`
	Ok bool `json:"ok"`
	Parameter *map[string]any `json:"parameter,omitempty"`
	Result *[]any `json:"result,omitempty"`
	Timeout *int `json:"timeout,omitempty"`
}

// UpdateListMatch mirrors the update fields as an all-optional match
// filter (Go analog of Partial<Update>).
type UpdateListMatch struct {
	AllowedUpdate *[]any `json:"allowed_update,omitempty"`
	Description *string `json:"description,omitempty"`
	ErrorCode *int `json:"error_code,omitempty"`
	Limit *int `json:"limit,omitempty"`
	Offset *int `json:"offset,omitempty"`
	Ok *bool `json:"ok,omitempty"`
	Parameter *map[string]any `json:"parameter,omitempty"`
	Result *[]any `json:"result,omitempty"`
	Timeout *int `json:"timeout,omitempty"`
}

// UpdateCreateData mirrors the update fields as an all-optional match
// filter (Go analog of Partial<Update>).
type UpdateCreateData struct {
	AllowedUpdate *[]any `json:"allowed_update,omitempty"`
	Description *string `json:"description,omitempty"`
	ErrorCode *int `json:"error_code,omitempty"`
	Limit *int `json:"limit,omitempty"`
	Offset *int `json:"offset,omitempty"`
	Ok *bool `json:"ok,omitempty"`
	Parameter *map[string]any `json:"parameter,omitempty"`
	Result *[]any `json:"result,omitempty"`
	Timeout *int `json:"timeout,omitempty"`
}

// asMap turns a typed request/data struct into the map[string]any the
// runtime op pipeline consumes, honouring the json tags above.
func asMap(v any) map[string]any {
	out := map[string]any{}
	b, err := json.Marshal(v)
	if err != nil {
		return out
	}
	_ = json.Unmarshal(b, &out)
	return out
}

// typedFrom decodes a runtime value (a map[string]any produced by the op
// pipeline) into a typed model T via a JSON round-trip. On any error it
// returns the zero value of T; the op's own (value, error) tuple carries the
// real error.
func typedFrom[T any](v any) T {
	var out T
	if v == nil {
		return out
	}
	b, err := json.Marshal(v)
	if err != nil {
		return out
	}
	_ = json.Unmarshal(b, &out)
	return out
}

// typedSliceFrom decodes a runtime list value ([]any of maps) into a typed
// slice []T via a JSON round-trip, for list ops.
func typedSliceFrom[T any](v any) []T {
	var out []T
	if v == nil {
		return out
	}
	b, err := json.Marshal(v)
	if err != nil {
		return out
	}
	_ = json.Unmarshal(b, &out)
	return out
}
