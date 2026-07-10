# TelegramBot Python SDK Reference

Complete API reference for the TelegramBot Python SDK.


## TelegramBotSDK

### Constructor

```python
from telegrambot_sdk import TelegramBotSDK

client = TelegramBotSDK(options)
```

Create a new SDK client instance.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `options` | `dict` | SDK configuration options. |
| `options["apikey"]` | `str` | API key for authentication. |
| `options["base"]` | `str` | Base URL for API requests. |
| `options["prefix"]` | `str` | URL prefix appended after base. |
| `options["suffix"]` | `str` | URL suffix appended after path. |
| `options["headers"]` | `dict` | Custom headers for all requests. |
| `options["feature"]` | `dict` | Feature configuration. |
| `options["system"]` | `dict` | System overrides (e.g. custom fetch). |


### Static Methods

#### `TelegramBotSDK.test(testopts=None, sdkopts=None)`

Create a test client with mock features active. Both arguments may be `None`.

```python
client = TelegramBotSDK.test()
```


### Instance Methods

#### `ApproveSuggestedPost(data=None)`

Create a new `ApproveSuggestedPostEntity` instance. Pass `None` for no initial data.

#### `DeclineSuggestedPost(data=None)`

Create a new `DeclineSuggestedPostEntity` instance. Pass `None` for no initial data.

#### `DeleteForumTopic(data=None)`

Create a new `DeleteForumTopicEntity` instance. Pass `None` for no initial data.

#### `EditForumTopic(data=None)`

Create a new `EditForumTopicEntity` instance. Pass `None` for no initial data.

#### `File(data=None)`

Create a new `FileEntity` instance. Pass `None` for no initial data.

#### `ForumTopic(data=None)`

Create a new `ForumTopicEntity` instance. Pass `None` for no initial data.

#### `GetBusinessAccountGift(data=None)`

Create a new `GetBusinessAccountGiftEntity` instance. Pass `None` for no initial data.

#### `GetChatGift(data=None)`

Create a new `GetChatGiftEntity` instance. Pass `None` for no initial data.

#### `GetMe(data=None)`

Create a new `GetMeEntity` instance. Pass `None` for no initial data.

#### `GetUserGift(data=None)`

Create a new `GetUserGiftEntity` instance. Pass `None` for no initial data.

#### `GetUserProfileAudio(data=None)`

Create a new `GetUserProfileAudioEntity` instance. Pass `None` for no initial data.

#### `Message(data=None)`

Create a new `MessageEntity` instance. Pass `None` for no initial data.

#### `MessageId(data=None)`

Create a new `MessageIdEntity` instance. Pass `None` for no initial data.

#### `PromoteChatMember(data=None)`

Create a new `PromoteChatMemberEntity` instance. Pass `None` for no initial data.

#### `RemoveMyProfilePhoto(data=None)`

Create a new `RemoveMyProfilePhotoEntity` instance. Pass `None` for no initial data.

#### `RepostStory(data=None)`

Create a new `RepostStoryEntity` instance. Pass `None` for no initial data.

#### `SendChatAction(data=None)`

Create a new `SendChatActionEntity` instance. Pass `None` for no initial data.

#### `SendMessageDraft(data=None)`

Create a new `SendMessageDraftEntity` instance. Pass `None` for no initial data.

#### `SetMyProfilePhoto(data=None)`

Create a new `SetMyProfilePhotoEntity` instance. Pass `None` for no initial data.

#### `UnpinAllForumTopicMessage(data=None)`

Create a new `UnpinAllForumTopicMessageEntity` instance. Pass `None` for no initial data.

#### `Update(data=None)`

Create a new `UpdateEntity` instance. Pass `None` for no initial data.

#### `options_map() -> dict`

Return a deep copy of the current SDK options.

#### `get_utility() -> Utility`

Return a copy of the SDK utility object.

#### `direct(fetchargs=None) -> dict`

Make a direct HTTP request to any API endpoint. Returns a result `dict` with `ok`, `status`, `headers`, and `data` (or `err` on failure). This escape hatch never raises — branch on `result["ok"]`.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `fetchargs["path"]` | `str` | URL path with optional `{param}` placeholders. |
| `fetchargs["method"]` | `str` | HTTP method (default: `"GET"`). |
| `fetchargs["params"]` | `dict` | Path parameter values. |
| `fetchargs["query"]` | `dict` | Query string parameters. |
| `fetchargs["headers"]` | `dict` | Request headers (merged with defaults). |
| `fetchargs["body"]` | `any` | Request body (dicts are JSON-serialized). |

**Returns:** `result_dict`

#### `prepare(fetchargs=None) -> dict`

Prepare a fetch definition without sending. Returns the `fetchdef` and raises on error.


---

## ApproveSuggestedPostEntity

```python
approve_suggested_post = client.ApproveSuggestedPost()
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `str` | Yes |  |
| `description` | `str` | No |  |
| `error_code` | `int` | No |  |
| `message_id` | `int` | Yes |  |
| `ok` | `bool` | Yes |  |
| `parameter` | `dict` | No |  |
| `result` | `Any` | No |  |

### Operations

#### `create(reqdata, ctrl=None) -> dict`

Create a new entity with the given data. Returns the created entity data and raises on error.

```python
result = client.ApproveSuggestedPost().create({
    "chat_id": "example_chat_id",  # str
    "message_id": 1,  # int
    "ok": True,  # bool
})
```

### Common Methods

#### `data_get() -> dict`

Get the entity data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> dict`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `ApproveSuggestedPostEntity` instance with the same options.

#### `get_name() -> str`

Return the entity name.


---

## DeclineSuggestedPostEntity

```python
decline_suggested_post = client.DeclineSuggestedPost()
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `str` | Yes |  |
| `description` | `str` | No |  |
| `error_code` | `int` | No |  |
| `message_id` | `int` | Yes |  |
| `ok` | `bool` | Yes |  |
| `parameter` | `dict` | No |  |
| `result` | `Any` | No |  |

### Operations

#### `create(reqdata, ctrl=None) -> dict`

Create a new entity with the given data. Returns the created entity data and raises on error.

```python
result = client.DeclineSuggestedPost().create({
    "chat_id": "example_chat_id",  # str
    "message_id": 1,  # int
    "ok": True,  # bool
})
```

### Common Methods

#### `data_get() -> dict`

Get the entity data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> dict`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `DeclineSuggestedPostEntity` instance with the same options.

#### `get_name() -> str`

Return the entity name.


---

## DeleteForumTopicEntity

```python
delete_forum_topic = client.DeleteForumTopic()
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `str` | Yes |  |
| `description` | `str` | No |  |
| `error_code` | `int` | No |  |
| `message_thread_id` | `int` | Yes |  |
| `ok` | `bool` | Yes |  |
| `parameter` | `dict` | No |  |
| `result` | `Any` | No |  |

### Operations

#### `create(reqdata, ctrl=None) -> dict`

Create a new entity with the given data. Returns the created entity data and raises on error.

```python
result = client.DeleteForumTopic().create({
    "chat_id": "example_chat_id",  # str
    "message_thread_id": 1,  # int
    "ok": True,  # bool
})
```

### Common Methods

#### `data_get() -> dict`

Get the entity data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> dict`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `DeleteForumTopicEntity` instance with the same options.

#### `get_name() -> str`

Return the entity name.


---

## EditForumTopicEntity

```python
edit_forum_topic = client.EditForumTopic()
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `str` | Yes |  |
| `description` | `str` | No |  |
| `error_code` | `int` | No |  |
| `icon_custom_emoji_id` | `str` | No |  |
| `message_thread_id` | `int` | Yes |  |
| `name` | `str` | No |  |
| `ok` | `bool` | Yes |  |
| `parameter` | `dict` | No |  |
| `result` | `Any` | No |  |

### Operations

#### `create(reqdata, ctrl=None) -> dict`

Create a new entity with the given data. Returns the created entity data and raises on error.

```python
result = client.EditForumTopic().create({
    "chat_id": "example_chat_id",  # str
    "message_thread_id": 1,  # int
    "ok": True,  # bool
})
```

### Common Methods

#### `data_get() -> dict`

Get the entity data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> dict`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `EditForumTopicEntity` instance with the same options.

#### `get_name() -> str`

Return the entity name.


---

## FileEntity

```python
file = client.File()
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `file_id` | `str` | Yes |  |

### Operations

#### `create(reqdata, ctrl=None) -> dict`

Create a new entity with the given data. Returns the created entity data and raises on error.

```python
result = client.File().create({
    "file_id": "example_file_id",  # str
})
```

### Common Methods

#### `data_get() -> dict`

Get the entity data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> dict`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `FileEntity` instance with the same options.

#### `get_name() -> str`

Return the entity name.


---

## ForumTopicEntity

```python
forum_topic = client.ForumTopic()
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `str` | Yes |  |
| `icon_color` | `int` | No |  |
| `icon_custom_emoji_id` | `str` | No |  |
| `name` | `str` | Yes |  |

### Operations

#### `create(reqdata, ctrl=None) -> dict`

Create a new entity with the given data. Returns the created entity data and raises on error.

```python
result = client.ForumTopic().create({
    "chat_id": "example_chat_id",  # str
    "name": "example_name",  # str
})
```

### Common Methods

#### `data_get() -> dict`

Get the entity data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> dict`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `ForumTopicEntity` instance with the same options.

#### `get_name() -> str`

Return the entity name.


---

## GetBusinessAccountGiftEntity

```python
get_business_account_gift = client.GetBusinessAccountGift()
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `description` | `str` | No |  |
| `error_code` | `int` | No |  |
| `exclude_from_blockchain` | `bool` | No |  |
| `exclude_limited_non_upgradable` | `bool` | No |  |
| `exclude_limited_upgradable` | `bool` | No |  |
| `ok` | `bool` | Yes |  |
| `parameter` | `dict` | No |  |
| `result` | `Any` | No |  |

### Operations

#### `create(reqdata, ctrl=None) -> dict`

Create a new entity with the given data. Returns the created entity data and raises on error.

```python
result = client.GetBusinessAccountGift().create({
    "ok": True,  # bool
})
```

### Common Methods

#### `data_get() -> dict`

Get the entity data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> dict`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `GetBusinessAccountGiftEntity` instance with the same options.

#### `get_name() -> str`

Return the entity name.


---

## GetChatGiftEntity

```python
get_chat_gift = client.GetChatGift()
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `str` | Yes |  |
| `description` | `str` | No |  |
| `error_code` | `int` | No |  |
| `ok` | `bool` | Yes |  |
| `parameter` | `dict` | No |  |
| `result` | `Any` | No |  |

### Operations

#### `create(reqdata, ctrl=None) -> dict`

Create a new entity with the given data. Returns the created entity data and raises on error.

```python
result = client.GetChatGift().create({
    "chat_id": "example_chat_id",  # str
    "ok": True,  # bool
})
```

### Common Methods

#### `data_get() -> dict`

Get the entity data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> dict`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `GetChatGiftEntity` instance with the same options.

#### `get_name() -> str`

Return the entity name.


---

## GetMeEntity

```python
get_me = client.GetMe()
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `description` | `str` | No |  |
| `error_code` | `int` | No |  |
| `ok` | `bool` | Yes |  |
| `parameter` | `dict` | No |  |
| `result` | `Any` | No |  |

### Operations

#### `create(reqdata, ctrl=None) -> dict`

Create a new entity with the given data. Returns the created entity data and raises on error.

```python
result = client.GetMe().create({
    "ok": True,  # bool
})
```

#### `load(reqmatch, ctrl=None) -> dict`

Load a single entity matching the given criteria. Returns the entity data and raises on error.

```python
result = client.GetMe().load()
```

### Common Methods

#### `data_get() -> dict`

Get the entity data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> dict`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `GetMeEntity` instance with the same options.

#### `get_name() -> str`

Return the entity name.


---

## GetUserGiftEntity

```python
get_user_gift = client.GetUserGift()
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `description` | `str` | No |  |
| `error_code` | `int` | No |  |
| `ok` | `bool` | Yes |  |
| `parameter` | `dict` | No |  |
| `result` | `Any` | No |  |
| `user_id` | `int` | Yes |  |

### Operations

#### `create(reqdata, ctrl=None) -> dict`

Create a new entity with the given data. Returns the created entity data and raises on error.

```python
result = client.GetUserGift().create({
    "ok": True,  # bool
    "user_id": 1,  # int
})
```

### Common Methods

#### `data_get() -> dict`

Get the entity data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> dict`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `GetUserGiftEntity` instance with the same options.

#### `get_name() -> str`

Return the entity name.


---

## GetUserProfileAudioEntity

```python
get_user_profile_audio = client.GetUserProfileAudio()
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `description` | `str` | No |  |
| `error_code` | `int` | No |  |
| `ok` | `bool` | Yes |  |
| `parameter` | `dict` | No |  |
| `result` | `Any` | No |  |
| `user_id` | `int` | Yes |  |

### Operations

#### `create(reqdata, ctrl=None) -> dict`

Create a new entity with the given data. Returns the created entity data and raises on error.

```python
result = client.GetUserProfileAudio().create({
    "ok": True,  # bool
    "user_id": 1,  # int
})
```

### Common Methods

#### `data_get() -> dict`

Get the entity data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> dict`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `GetUserProfileAudioEntity` instance with the same options.

#### `get_name() -> str`

Return the entity name.


---

## MessageEntity

```python
message = client.Message()
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `str` | Yes |  |
| `direct_messages_topic_id` | `int` | No |  |
| `disable_notification` | `bool` | No |  |
| `disable_web_page_preview` | `bool` | No |  |
| `from_chat_id` | `str` | Yes |  |
| `latitude` | `float` | Yes |  |
| `longitude` | `float` | Yes |  |
| `message_effect_id` | `str` | No |  |
| `message_id` | `int` | Yes |  |
| `message_thread_id` | `int` | No |  |
| `option` | `list` | Yes |  |
| `parse_mode` | `str` | No |  |
| `protect_content` | `bool` | No |  |
| `question` | `str` | Yes |  |
| `reply_to_message_id` | `int` | No |  |
| `text` | `str` | Yes |  |

### Operations

#### `create(reqdata, ctrl=None) -> dict`

Create a new entity with the given data. Returns the created entity data and raises on error.

```python
result = client.Message().create({
    "chat_id": "example_chat_id",  # str
    "from_chat_id": "example_from_chat_id",  # str
    "latitude": 1,  # float
    "longitude": 1,  # float
    "message_id": 1,  # int
    "option": [],  # list
    "question": "example_question",  # str
    "text": "example_text",  # str
})
```

### Common Methods

#### `data_get() -> dict`

Get the entity data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> dict`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `MessageEntity` instance with the same options.

#### `get_name() -> str`

Return the entity name.


---

## MessageIdEntity

```python
message_id = client.MessageId()
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `str` | Yes |  |
| `direct_messages_topic_id` | `int` | No |  |
| `from_chat_id` | `str` | Yes |  |
| `message_effect_id` | `str` | No |  |
| `message_id` | `int` | Yes |  |
| `message_thread_id` | `int` | No |  |

### Operations

#### `create(reqdata, ctrl=None) -> dict`

Create a new entity with the given data. Returns the created entity data and raises on error.

```python
result = client.MessageId().create({
    "chat_id": "example_chat_id",  # str
    "from_chat_id": "example_from_chat_id",  # str
    "message_id": 1,  # int
})
```

### Common Methods

#### `data_get() -> dict`

Get the entity data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> dict`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `MessageIdEntity` instance with the same options.

#### `get_name() -> str`

Return the entity name.


---

## PromoteChatMemberEntity

```python
promote_chat_member = client.PromoteChatMember()
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `can_delete_message` | `bool` | No |  |
| `can_edit_message` | `bool` | No |  |
| `can_manage_chat` | `bool` | No |  |
| `can_manage_direct_message` | `bool` | No |  |
| `can_post_message` | `bool` | No |  |
| `chat_id` | `str` | Yes |  |
| `description` | `str` | No |  |
| `error_code` | `int` | No |  |
| `ok` | `bool` | Yes |  |
| `parameter` | `dict` | No |  |
| `result` | `Any` | No |  |
| `user_id` | `int` | Yes |  |

### Operations

#### `create(reqdata, ctrl=None) -> dict`

Create a new entity with the given data. Returns the created entity data and raises on error.

```python
result = client.PromoteChatMember().create({
    "chat_id": "example_chat_id",  # str
    "ok": True,  # bool
    "user_id": 1,  # int
})
```

### Common Methods

#### `data_get() -> dict`

Get the entity data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> dict`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `PromoteChatMemberEntity` instance with the same options.

#### `get_name() -> str`

Return the entity name.


---

## RemoveMyProfilePhotoEntity

```python
remove_my_profile_photo = client.RemoveMyProfilePhoto()
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `description` | `str` | No |  |
| `error_code` | `int` | No |  |
| `ok` | `bool` | Yes |  |
| `parameter` | `dict` | No |  |
| `result` | `Any` | No |  |

### Operations

#### `create(reqdata, ctrl=None) -> dict`

Create a new entity with the given data. Returns the created entity data and raises on error.

```python
result = client.RemoveMyProfilePhoto().create({
    "ok": True,  # bool
})
```

### Common Methods

#### `data_get() -> dict`

Get the entity data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> dict`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `RemoveMyProfilePhotoEntity` instance with the same options.

#### `get_name() -> str`

Return the entity name.


---

## RepostStoryEntity

```python
repost_story = client.RepostStory()
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `str` | Yes |  |
| `description` | `str` | No |  |
| `error_code` | `int` | No |  |
| `ok` | `bool` | Yes |  |
| `parameter` | `dict` | No |  |
| `result` | `Any` | No |  |
| `story_id` | `int` | Yes |  |

### Operations

#### `create(reqdata, ctrl=None) -> dict`

Create a new entity with the given data. Returns the created entity data and raises on error.

```python
result = client.RepostStory().create({
    "chat_id": "example_chat_id",  # str
    "ok": True,  # bool
    "story_id": 1,  # int
})
```

### Common Methods

#### `data_get() -> dict`

Get the entity data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> dict`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `RepostStoryEntity` instance with the same options.

#### `get_name() -> str`

Return the entity name.


---

## SendChatActionEntity

```python
send_chat_action = client.SendChatAction()
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `action` | `str` | Yes |  |
| `chat_id` | `str` | Yes |  |
| `description` | `str` | No |  |
| `error_code` | `int` | No |  |
| `message_thread_id` | `int` | No |  |
| `ok` | `bool` | Yes |  |
| `parameter` | `dict` | No |  |
| `result` | `Any` | No |  |

### Operations

#### `create(reqdata, ctrl=None) -> dict`

Create a new entity with the given data. Returns the created entity data and raises on error.

```python
result = client.SendChatAction().create({
    "action": "example_action",  # str
    "chat_id": "example_chat_id",  # str
    "ok": True,  # bool
})
```

### Common Methods

#### `data_get() -> dict`

Get the entity data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> dict`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `SendChatActionEntity` instance with the same options.

#### `get_name() -> str`

Return the entity name.


---

## SendMessageDraftEntity

```python
send_message_draft = client.SendMessageDraft()
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `str` | Yes |  |
| `description` | `str` | No |  |
| `error_code` | `int` | No |  |
| `message_thread_id` | `int` | No |  |
| `ok` | `bool` | Yes |  |
| `parameter` | `dict` | No |  |
| `result` | `Any` | No |  |
| `text` | `str` | Yes |  |

### Operations

#### `create(reqdata, ctrl=None) -> dict`

Create a new entity with the given data. Returns the created entity data and raises on error.

```python
result = client.SendMessageDraft().create({
    "chat_id": "example_chat_id",  # str
    "ok": True,  # bool
    "text": "example_text",  # str
})
```

### Common Methods

#### `data_get() -> dict`

Get the entity data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> dict`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `SendMessageDraftEntity` instance with the same options.

#### `get_name() -> str`

Return the entity name.


---

## SetMyProfilePhotoEntity

```python
set_my_profile_photo = client.SetMyProfilePhoto()
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `description` | `str` | No |  |
| `error_code` | `int` | No |  |
| `ok` | `bool` | Yes |  |
| `parameter` | `dict` | No |  |
| `result` | `Any` | No |  |

### Operations

#### `create(reqdata, ctrl=None) -> dict`

Create a new entity with the given data. Returns the created entity data and raises on error.

```python
result = client.SetMyProfilePhoto().create({
    "ok": True,  # bool
})
```

### Common Methods

#### `data_get() -> dict`

Get the entity data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> dict`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `SetMyProfilePhotoEntity` instance with the same options.

#### `get_name() -> str`

Return the entity name.


---

## UnpinAllForumTopicMessageEntity

```python
unpin_all_forum_topic_message = client.UnpinAllForumTopicMessage()
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `str` | Yes |  |
| `description` | `str` | No |  |
| `error_code` | `int` | No |  |
| `message_thread_id` | `int` | Yes |  |
| `ok` | `bool` | Yes |  |
| `parameter` | `dict` | No |  |
| `result` | `Any` | No |  |

### Operations

#### `create(reqdata, ctrl=None) -> dict`

Create a new entity with the given data. Returns the created entity data and raises on error.

```python
result = client.UnpinAllForumTopicMessage().create({
    "chat_id": "example_chat_id",  # str
    "message_thread_id": 1,  # int
    "ok": True,  # bool
})
```

### Common Methods

#### `data_get() -> dict`

Get the entity data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> dict`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `UnpinAllForumTopicMessageEntity` instance with the same options.

#### `get_name() -> str`

Return the entity name.


---

## UpdateEntity

```python
update = client.Update()
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `allowed_update` | `list` | No |  |
| `description` | `str` | No |  |
| `error_code` | `int` | No |  |
| `limit` | `int` | No |  |
| `offset` | `int` | No |  |
| `ok` | `bool` | Yes |  |
| `parameter` | `dict` | No |  |
| `result` | `list` | No |  |
| `timeout` | `int` | No |  |

### Operations

#### `create(reqdata, ctrl=None) -> dict`

Create a new entity with the given data. Returns the created entity data and raises on error.

```python
result = client.Update().create({
    "ok": True,  # bool
})
```

#### `list(reqmatch=None, ctrl=None) -> list`

List entities matching the given criteria. The match is optional — call `list()` with no argument to list all records. Returns a list and raises on error.

```python
results = client.Update().list()
for update in results:
    print(update)
```

### Common Methods

#### `data_get() -> dict`

Get the entity data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> dict`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `UpdateEntity` instance with the same options.

#### `get_name() -> str`

Return the entity name.


---

## Features

| Feature | Version | Description |
| --- | --- | --- |
| `test` | 0.0.1 | In-memory mock transport for testing without a live server |


Features are activated via the `feature` option:

```python
client = TelegramBotSDK({
    "feature": {
        "test": {"active": True},
    },
})
```

