# Typed models for the TelegramBot SDK.
#
# GENERATED from the API model: main.kit.entity.<e>.fields[] and per-op
# params (op.<name>.points[].args.params[]). Field/param types come from the
# canonical type sentinels via @voxgig/sdkgen canonToType (source of truth:
# @voxgig/apidef VALID_CANON). Do not edit by hand.

from __future__ import annotations

from dataclasses import dataclass
from typing import Optional, Any


@dataclass
class ApproveSuggestedPost:
    chat_id: str
    message_id: int
    ok: bool
    description: Optional[str] = None
    error_code: Optional[int] = None
    parameter: Optional[dict] = None
    result: Optional[Any] = None


@dataclass
class ApproveSuggestedPostCreateData:
    chat_id: Optional[str] = None
    description: Optional[str] = None
    error_code: Optional[int] = None
    message_id: Optional[int] = None
    ok: Optional[bool] = None
    parameter: Optional[dict] = None
    result: Optional[Any] = None


@dataclass
class DeclineSuggestedPost:
    chat_id: str
    message_id: int
    ok: bool
    description: Optional[str] = None
    error_code: Optional[int] = None
    parameter: Optional[dict] = None
    result: Optional[Any] = None


@dataclass
class DeclineSuggestedPostCreateData:
    chat_id: Optional[str] = None
    description: Optional[str] = None
    error_code: Optional[int] = None
    message_id: Optional[int] = None
    ok: Optional[bool] = None
    parameter: Optional[dict] = None
    result: Optional[Any] = None


@dataclass
class DeleteForumTopic:
    chat_id: str
    message_thread_id: int
    ok: bool
    description: Optional[str] = None
    error_code: Optional[int] = None
    parameter: Optional[dict] = None
    result: Optional[Any] = None


@dataclass
class DeleteForumTopicCreateData:
    chat_id: Optional[str] = None
    description: Optional[str] = None
    error_code: Optional[int] = None
    message_thread_id: Optional[int] = None
    ok: Optional[bool] = None
    parameter: Optional[dict] = None
    result: Optional[Any] = None


@dataclass
class EditForumTopic:
    chat_id: str
    message_thread_id: int
    ok: bool
    description: Optional[str] = None
    error_code: Optional[int] = None
    icon_custom_emoji_id: Optional[str] = None
    name: Optional[str] = None
    parameter: Optional[dict] = None
    result: Optional[Any] = None


@dataclass
class EditForumTopicCreateData:
    chat_id: Optional[str] = None
    description: Optional[str] = None
    error_code: Optional[int] = None
    icon_custom_emoji_id: Optional[str] = None
    message_thread_id: Optional[int] = None
    name: Optional[str] = None
    ok: Optional[bool] = None
    parameter: Optional[dict] = None
    result: Optional[Any] = None


@dataclass
class File:
    file_id: str


@dataclass
class FileCreateData:
    file_id: Optional[str] = None


@dataclass
class ForumTopic:
    chat_id: str
    name: str
    icon_color: Optional[int] = None
    icon_custom_emoji_id: Optional[str] = None


@dataclass
class ForumTopicCreateData:
    chat_id: Optional[str] = None
    icon_color: Optional[int] = None
    icon_custom_emoji_id: Optional[str] = None
    name: Optional[str] = None


@dataclass
class GetBusinessAccountGift:
    ok: bool
    description: Optional[str] = None
    error_code: Optional[int] = None
    exclude_from_blockchain: Optional[bool] = None
    exclude_limited_non_upgradable: Optional[bool] = None
    exclude_limited_upgradable: Optional[bool] = None
    parameter: Optional[dict] = None
    result: Optional[Any] = None


@dataclass
class GetBusinessAccountGiftCreateData:
    description: Optional[str] = None
    error_code: Optional[int] = None
    exclude_from_blockchain: Optional[bool] = None
    exclude_limited_non_upgradable: Optional[bool] = None
    exclude_limited_upgradable: Optional[bool] = None
    ok: Optional[bool] = None
    parameter: Optional[dict] = None
    result: Optional[Any] = None


@dataclass
class GetChatGift:
    chat_id: str
    ok: bool
    description: Optional[str] = None
    error_code: Optional[int] = None
    parameter: Optional[dict] = None
    result: Optional[Any] = None


@dataclass
class GetChatGiftCreateData:
    chat_id: Optional[str] = None
    description: Optional[str] = None
    error_code: Optional[int] = None
    ok: Optional[bool] = None
    parameter: Optional[dict] = None
    result: Optional[Any] = None


@dataclass
class GetMe:
    ok: bool
    description: Optional[str] = None
    error_code: Optional[int] = None
    parameter: Optional[dict] = None
    result: Optional[Any] = None


@dataclass
class GetMeLoadMatch:
    description: Optional[str] = None
    error_code: Optional[int] = None
    ok: Optional[bool] = None
    parameter: Optional[dict] = None
    result: Optional[Any] = None


@dataclass
class GetMeCreateData:
    description: Optional[str] = None
    error_code: Optional[int] = None
    ok: Optional[bool] = None
    parameter: Optional[dict] = None
    result: Optional[Any] = None


@dataclass
class GetUserGift:
    ok: bool
    user_id: int
    description: Optional[str] = None
    error_code: Optional[int] = None
    parameter: Optional[dict] = None
    result: Optional[Any] = None


@dataclass
class GetUserGiftCreateData:
    description: Optional[str] = None
    error_code: Optional[int] = None
    ok: Optional[bool] = None
    parameter: Optional[dict] = None
    result: Optional[Any] = None
    user_id: Optional[int] = None


@dataclass
class GetUserProfileAudio:
    ok: bool
    user_id: int
    description: Optional[str] = None
    error_code: Optional[int] = None
    parameter: Optional[dict] = None
    result: Optional[Any] = None


@dataclass
class GetUserProfileAudioCreateData:
    description: Optional[str] = None
    error_code: Optional[int] = None
    ok: Optional[bool] = None
    parameter: Optional[dict] = None
    result: Optional[Any] = None
    user_id: Optional[int] = None


@dataclass
class Message:
    chat_id: str
    from_chat_id: str
    latitude: float
    longitude: float
    message_id: int
    option: list
    question: str
    text: str
    direct_messages_topic_id: Optional[int] = None
    disable_notification: Optional[bool] = None
    disable_web_page_preview: Optional[bool] = None
    message_effect_id: Optional[str] = None
    message_thread_id: Optional[int] = None
    parse_mode: Optional[str] = None
    protect_content: Optional[bool] = None
    reply_to_message_id: Optional[int] = None


@dataclass
class MessageCreateData:
    chat_id: Optional[str] = None
    direct_messages_topic_id: Optional[int] = None
    disable_notification: Optional[bool] = None
    disable_web_page_preview: Optional[bool] = None
    from_chat_id: Optional[str] = None
    latitude: Optional[float] = None
    longitude: Optional[float] = None
    message_effect_id: Optional[str] = None
    message_id: Optional[int] = None
    message_thread_id: Optional[int] = None
    option: Optional[list] = None
    parse_mode: Optional[str] = None
    protect_content: Optional[bool] = None
    question: Optional[str] = None
    reply_to_message_id: Optional[int] = None
    text: Optional[str] = None


@dataclass
class MessageId:
    chat_id: str
    from_chat_id: str
    message_id: int
    direct_messages_topic_id: Optional[int] = None
    message_effect_id: Optional[str] = None
    message_thread_id: Optional[int] = None


@dataclass
class MessageIdCreateData:
    chat_id: Optional[str] = None
    direct_messages_topic_id: Optional[int] = None
    from_chat_id: Optional[str] = None
    message_effect_id: Optional[str] = None
    message_id: Optional[int] = None
    message_thread_id: Optional[int] = None


@dataclass
class PromoteChatMember:
    chat_id: str
    ok: bool
    user_id: int
    can_delete_message: Optional[bool] = None
    can_edit_message: Optional[bool] = None
    can_manage_chat: Optional[bool] = None
    can_manage_direct_message: Optional[bool] = None
    can_post_message: Optional[bool] = None
    description: Optional[str] = None
    error_code: Optional[int] = None
    parameter: Optional[dict] = None
    result: Optional[Any] = None


@dataclass
class PromoteChatMemberCreateData:
    can_delete_message: Optional[bool] = None
    can_edit_message: Optional[bool] = None
    can_manage_chat: Optional[bool] = None
    can_manage_direct_message: Optional[bool] = None
    can_post_message: Optional[bool] = None
    chat_id: Optional[str] = None
    description: Optional[str] = None
    error_code: Optional[int] = None
    ok: Optional[bool] = None
    parameter: Optional[dict] = None
    result: Optional[Any] = None
    user_id: Optional[int] = None


@dataclass
class RemoveMyProfilePhoto:
    ok: bool
    description: Optional[str] = None
    error_code: Optional[int] = None
    parameter: Optional[dict] = None
    result: Optional[Any] = None


@dataclass
class RemoveMyProfilePhotoCreateData:
    description: Optional[str] = None
    error_code: Optional[int] = None
    ok: Optional[bool] = None
    parameter: Optional[dict] = None
    result: Optional[Any] = None


@dataclass
class RepostStory:
    chat_id: str
    ok: bool
    story_id: int
    description: Optional[str] = None
    error_code: Optional[int] = None
    parameter: Optional[dict] = None
    result: Optional[Any] = None


@dataclass
class RepostStoryCreateData:
    chat_id: Optional[str] = None
    description: Optional[str] = None
    error_code: Optional[int] = None
    ok: Optional[bool] = None
    parameter: Optional[dict] = None
    result: Optional[Any] = None
    story_id: Optional[int] = None


@dataclass
class SendChatAction:
    action: str
    chat_id: str
    ok: bool
    description: Optional[str] = None
    error_code: Optional[int] = None
    message_thread_id: Optional[int] = None
    parameter: Optional[dict] = None
    result: Optional[Any] = None


@dataclass
class SendChatActionCreateData:
    action: Optional[str] = None
    chat_id: Optional[str] = None
    description: Optional[str] = None
    error_code: Optional[int] = None
    message_thread_id: Optional[int] = None
    ok: Optional[bool] = None
    parameter: Optional[dict] = None
    result: Optional[Any] = None


@dataclass
class SendMessageDraft:
    chat_id: str
    ok: bool
    text: str
    description: Optional[str] = None
    error_code: Optional[int] = None
    message_thread_id: Optional[int] = None
    parameter: Optional[dict] = None
    result: Optional[Any] = None


@dataclass
class SendMessageDraftCreateData:
    chat_id: Optional[str] = None
    description: Optional[str] = None
    error_code: Optional[int] = None
    message_thread_id: Optional[int] = None
    ok: Optional[bool] = None
    parameter: Optional[dict] = None
    result: Optional[Any] = None
    text: Optional[str] = None


@dataclass
class SetMyProfilePhoto:
    ok: bool
    description: Optional[str] = None
    error_code: Optional[int] = None
    parameter: Optional[dict] = None
    result: Optional[Any] = None


@dataclass
class SetMyProfilePhotoCreateData:
    description: Optional[str] = None
    error_code: Optional[int] = None
    ok: Optional[bool] = None
    parameter: Optional[dict] = None
    result: Optional[Any] = None


@dataclass
class UnpinAllForumTopicMessage:
    chat_id: str
    message_thread_id: int
    ok: bool
    description: Optional[str] = None
    error_code: Optional[int] = None
    parameter: Optional[dict] = None
    result: Optional[Any] = None


@dataclass
class UnpinAllForumTopicMessageCreateData:
    chat_id: Optional[str] = None
    description: Optional[str] = None
    error_code: Optional[int] = None
    message_thread_id: Optional[int] = None
    ok: Optional[bool] = None
    parameter: Optional[dict] = None
    result: Optional[Any] = None


@dataclass
class Update:
    ok: bool
    allowed_update: Optional[list] = None
    description: Optional[str] = None
    error_code: Optional[int] = None
    limit: Optional[int] = None
    offset: Optional[int] = None
    parameter: Optional[dict] = None
    result: Optional[list] = None
    timeout: Optional[int] = None


@dataclass
class UpdateListMatch:
    allowed_update: Optional[list] = None
    description: Optional[str] = None
    error_code: Optional[int] = None
    limit: Optional[int] = None
    offset: Optional[int] = None
    ok: Optional[bool] = None
    parameter: Optional[dict] = None
    result: Optional[list] = None
    timeout: Optional[int] = None


@dataclass
class UpdateCreateData:
    allowed_update: Optional[list] = None
    description: Optional[str] = None
    error_code: Optional[int] = None
    limit: Optional[int] = None
    offset: Optional[int] = None
    ok: Optional[bool] = None
    parameter: Optional[dict] = None
    result: Optional[list] = None
    timeout: Optional[int] = None

