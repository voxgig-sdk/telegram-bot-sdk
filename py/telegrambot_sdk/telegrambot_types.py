# Typed models for the TelegramBot SDK.
#
# GENERATED from the API model: main.kit.entity.<e>.fields[] and per-op
# params (op.<name>.points[].args.params[]). Field/param types come from the
# canonical type sentinels via @voxgig/sdkgen canonToType (source of truth:
# @voxgig/apidef VALID_CANON). Do not edit by hand.
#
# These are TypedDicts, not dataclasses: the SDK ops return/accept plain dicts
# at runtime, and a TypedDict IS a dict shape, so the types match the runtime.
# Optional (req:false) keys are modelled as TypedDict key-optionality
# (total=False), split into a required base + total=False subclass when a type
# has both required and optional keys.

from __future__ import annotations

from typing import TypedDict, Any


class ApproveSuggestedPostRequired(TypedDict):
    chat_id: str
    message_id: int
    ok: bool


class ApproveSuggestedPost(ApproveSuggestedPostRequired, total=False):
    description: str
    error_code: int
    parameters: dict
    result: list


class ApproveSuggestedPostCreateDataRequired(TypedDict):
    chat_id: str
    message_id: int
    ok: bool


class ApproveSuggestedPostCreateData(ApproveSuggestedPostCreateDataRequired, total=False):
    description: str
    error_code: int
    parameters: dict
    result: list


class DeclineSuggestedPostRequired(TypedDict):
    chat_id: str
    message_id: int
    ok: bool


class DeclineSuggestedPost(DeclineSuggestedPostRequired, total=False):
    description: str
    error_code: int
    parameters: dict
    result: list


class DeclineSuggestedPostCreateDataRequired(TypedDict):
    chat_id: str
    message_id: int
    ok: bool


class DeclineSuggestedPostCreateData(DeclineSuggestedPostCreateDataRequired, total=False):
    description: str
    error_code: int
    parameters: dict
    result: list


class DeleteForumTopicRequired(TypedDict):
    chat_id: str
    message_thread_id: int
    ok: bool


class DeleteForumTopic(DeleteForumTopicRequired, total=False):
    description: str
    error_code: int
    parameters: dict
    result: list


class DeleteForumTopicCreateDataRequired(TypedDict):
    chat_id: str
    message_thread_id: int
    ok: bool


class DeleteForumTopicCreateData(DeleteForumTopicCreateDataRequired, total=False):
    description: str
    error_code: int
    parameters: dict
    result: list


class EditForumTopicRequired(TypedDict):
    chat_id: str
    message_thread_id: int
    ok: bool


class EditForumTopic(EditForumTopicRequired, total=False):
    description: str
    error_code: int
    icon_custom_emoji_id: str
    name: str
    parameters: dict
    result: list


class EditForumTopicCreateDataRequired(TypedDict):
    chat_id: str
    message_thread_id: int
    ok: bool


class EditForumTopicCreateData(EditForumTopicCreateDataRequired, total=False):
    description: str
    error_code: int
    icon_custom_emoji_id: str
    name: str
    parameters: dict
    result: list


class File(TypedDict):
    file_id: str


class FileCreateData(TypedDict):
    file_id: str


class ForumTopicRequired(TypedDict):
    chat_id: str
    name: str


class ForumTopic(ForumTopicRequired, total=False):
    icon_color: int
    icon_custom_emoji_id: str


class ForumTopicCreateDataRequired(TypedDict):
    chat_id: str
    name: str


class ForumTopicCreateData(ForumTopicCreateDataRequired, total=False):
    icon_color: int
    icon_custom_emoji_id: str


class GetBusinessAccountGiftRequired(TypedDict):
    ok: bool


class GetBusinessAccountGift(GetBusinessAccountGiftRequired, total=False):
    description: str
    error_code: int
    exclude_from_blockchain: bool
    exclude_limited_non_upgradable: bool
    exclude_limited_upgradable: bool
    parameters: dict
    result: list


class GetBusinessAccountGiftCreateDataRequired(TypedDict):
    ok: bool


class GetBusinessAccountGiftCreateData(GetBusinessAccountGiftCreateDataRequired, total=False):
    description: str
    error_code: int
    exclude_from_blockchain: bool
    exclude_limited_non_upgradable: bool
    exclude_limited_upgradable: bool
    parameters: dict
    result: list


class GetChatGiftRequired(TypedDict):
    chat_id: str
    ok: bool


class GetChatGift(GetChatGiftRequired, total=False):
    description: str
    error_code: int
    parameters: dict
    result: list


class GetChatGiftCreateDataRequired(TypedDict):
    chat_id: str
    ok: bool


class GetChatGiftCreateData(GetChatGiftCreateDataRequired, total=False):
    description: str
    error_code: int
    parameters: dict
    result: list


class GetMeRequired(TypedDict):
    ok: bool


class GetMe(GetMeRequired, total=False):
    description: str
    error_code: int
    parameters: dict
    result: list


class GetMeLoadMatch(TypedDict, total=False):
    description: str
    error_code: int
    ok: bool
    parameters: dict
    result: list


class GetMeCreateDataRequired(TypedDict):
    ok: bool


class GetMeCreateData(GetMeCreateDataRequired, total=False):
    description: str
    error_code: int
    parameters: dict
    result: list


class GetUserGiftRequired(TypedDict):
    ok: bool
    user_id: int


class GetUserGift(GetUserGiftRequired, total=False):
    description: str
    error_code: int
    parameters: dict
    result: list


class GetUserGiftCreateDataRequired(TypedDict):
    ok: bool
    user_id: int


class GetUserGiftCreateData(GetUserGiftCreateDataRequired, total=False):
    description: str
    error_code: int
    parameters: dict
    result: list


class GetUserProfileAudioRequired(TypedDict):
    ok: bool
    user_id: int


class GetUserProfileAudio(GetUserProfileAudioRequired, total=False):
    description: str
    error_code: int
    parameters: dict
    result: list


class GetUserProfileAudioCreateDataRequired(TypedDict):
    ok: bool
    user_id: int


class GetUserProfileAudioCreateData(GetUserProfileAudioCreateDataRequired, total=False):
    description: str
    error_code: int
    parameters: dict
    result: list


class MessageRequired(TypedDict):
    chat_id: str
    from_chat_id: str
    latitude: float
    longitude: float
    message_id: int
    options: list
    question: str
    text: str


class Message(MessageRequired, total=False):
    direct_messages_topic_id: int
    disable_notification: bool
    disable_web_page_preview: bool
    message_effect_id: str
    message_thread_id: int
    parse_mode: str
    protect_content: bool
    reply_to_message_id: int


class MessageCreateDataRequired(TypedDict):
    chat_id: str
    from_chat_id: str
    latitude: float
    longitude: float
    message_id: int
    options: list
    question: str
    text: str


class MessageCreateData(MessageCreateDataRequired, total=False):
    direct_messages_topic_id: int
    disable_notification: bool
    disable_web_page_preview: bool
    message_effect_id: str
    message_thread_id: int
    parse_mode: str
    protect_content: bool
    reply_to_message_id: int


class MessageIdRequired(TypedDict):
    chat_id: str
    from_chat_id: str
    message_id: int


class MessageId(MessageIdRequired, total=False):
    direct_messages_topic_id: int
    message_effect_id: str
    message_thread_id: int


class MessageIdCreateDataRequired(TypedDict):
    chat_id: str
    from_chat_id: str
    message_id: int


class MessageIdCreateData(MessageIdCreateDataRequired, total=False):
    direct_messages_topic_id: int
    message_effect_id: str
    message_thread_id: int


class PromoteChatMemberRequired(TypedDict):
    chat_id: str
    ok: bool
    user_id: int


class PromoteChatMember(PromoteChatMemberRequired, total=False):
    can_delete_messages: bool
    can_edit_messages: bool
    can_manage_chat: bool
    can_manage_direct_messages: bool
    can_post_messages: bool
    description: str
    error_code: int
    parameters: dict
    result: list


class PromoteChatMemberCreateDataRequired(TypedDict):
    chat_id: str
    ok: bool
    user_id: int


class PromoteChatMemberCreateData(PromoteChatMemberCreateDataRequired, total=False):
    can_delete_messages: bool
    can_edit_messages: bool
    can_manage_chat: bool
    can_manage_direct_messages: bool
    can_post_messages: bool
    description: str
    error_code: int
    parameters: dict
    result: list


class RemoveMyProfilePhotoRequired(TypedDict):
    ok: bool


class RemoveMyProfilePhoto(RemoveMyProfilePhotoRequired, total=False):
    description: str
    error_code: int
    parameters: dict
    result: list


class RemoveMyProfilePhotoCreateDataRequired(TypedDict):
    ok: bool


class RemoveMyProfilePhotoCreateData(RemoveMyProfilePhotoCreateDataRequired, total=False):
    description: str
    error_code: int
    parameters: dict
    result: list


class RepostStoryRequired(TypedDict):
    chat_id: str
    ok: bool
    story_id: int


class RepostStory(RepostStoryRequired, total=False):
    description: str
    error_code: int
    parameters: dict
    result: list


class RepostStoryCreateDataRequired(TypedDict):
    chat_id: str
    ok: bool
    story_id: int


class RepostStoryCreateData(RepostStoryCreateDataRequired, total=False):
    description: str
    error_code: int
    parameters: dict
    result: list


class SendChatActionRequired(TypedDict):
    action: str
    chat_id: str
    ok: bool


class SendChatAction(SendChatActionRequired, total=False):
    description: str
    error_code: int
    message_thread_id: int
    parameters: dict
    result: list


class SendChatActionCreateDataRequired(TypedDict):
    action: str
    chat_id: str
    ok: bool


class SendChatActionCreateData(SendChatActionCreateDataRequired, total=False):
    description: str
    error_code: int
    message_thread_id: int
    parameters: dict
    result: list


class SendMessageDraftRequired(TypedDict):
    chat_id: str
    ok: bool
    text: str


class SendMessageDraft(SendMessageDraftRequired, total=False):
    description: str
    error_code: int
    message_thread_id: int
    parameters: dict
    result: list


class SendMessageDraftCreateDataRequired(TypedDict):
    chat_id: str
    ok: bool
    text: str


class SendMessageDraftCreateData(SendMessageDraftCreateDataRequired, total=False):
    description: str
    error_code: int
    message_thread_id: int
    parameters: dict
    result: list


class SetMyProfilePhotoRequired(TypedDict):
    ok: bool


class SetMyProfilePhoto(SetMyProfilePhotoRequired, total=False):
    description: str
    error_code: int
    parameters: dict
    result: list


class SetMyProfilePhotoCreateDataRequired(TypedDict):
    ok: bool


class SetMyProfilePhotoCreateData(SetMyProfilePhotoCreateDataRequired, total=False):
    description: str
    error_code: int
    parameters: dict
    result: list


class UnpinAllForumTopicMessageRequired(TypedDict):
    chat_id: str
    message_thread_id: int
    ok: bool


class UnpinAllForumTopicMessage(UnpinAllForumTopicMessageRequired, total=False):
    description: str
    error_code: int
    parameters: dict
    result: list


class UnpinAllForumTopicMessageCreateDataRequired(TypedDict):
    chat_id: str
    message_thread_id: int
    ok: bool


class UnpinAllForumTopicMessageCreateData(UnpinAllForumTopicMessageCreateDataRequired, total=False):
    description: str
    error_code: int
    parameters: dict
    result: list


class UpdateRequired(TypedDict):
    ok: bool


class Update(UpdateRequired, total=False):
    allowed_updates: list
    description: str
    error_code: int
    limit: int
    offset: int
    parameters: dict
    result: list
    timeout: int


class UpdateListMatch(TypedDict, total=False):
    allowed_update: list
    limit: int
    offset: int
    timeout: int


class UpdateCreateDataRequired(TypedDict):
    ok: bool


class UpdateCreateData(UpdateCreateDataRequired, total=False):
    allowed_updates: list
    description: str
    error_code: int
    limit: int
    offset: int
    parameters: dict
    result: list
    timeout: int
