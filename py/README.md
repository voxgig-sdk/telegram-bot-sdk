# TelegramBot Python SDK



The Python SDK for the TelegramBot API — an entity-oriented client following Pythonic conventions.

The SDK exposes the API as capitalised, semantic **Entities** — for example `client.ApproveSuggestedPost()` — each
carrying a small, uniform set of operations (`list`, `load`, `create`) instead of raw URL
paths and query strings. You work with named resources and verbs, which
keeps the cognitive load low.

> Other languages, the CLI, and MCP server live alongside this one — see
> the [top-level README](../README.md).


## Install
This package is not yet published to PyPI. Install it from the GitHub
release tag (`py/vX.Y.Z`, see [Releases](https://github.com/voxgig-sdk/telegram-bot-sdk/releases)) or
from a source checkout:

```bash
pip install -e .
```


## Tutorial: your first API call

This tutorial walks through creating a client, listing entities, and
loading a specific record.

### 1. Create a client

```python
import os
from telegrambot_sdk import TelegramBotSDK

client = TelegramBotSDK({
    "apikey": os.environ.get("TELEGRAM_BOT_APIKEY"),
})
```

### 4. Create, update, and remove

```python
# Create — returns the bare created record (a dict)
created = client.ApproveSuggestedPost().create({"chat_id": "example", "message_id": 1, "ok": True})

```


## Error handling

Entity operations raise on failure, so wrap them in `try` / `except`:

```python
try:
    approvesuggestedpost = client.ApproveSuggestedPost().create({ "chat_id": "example", "message_id": 1, "ok": True })
    print(approvesuggestedpost)
except Exception as err:
    print(f"create failed: {err}")
```

`direct()` does **not** raise — it returns the result envelope. Branch
on `ok`; on failure `status` holds the HTTP status (for error responses)
and `err` holds a transport error, so read both defensively:

```python
result = client.direct({
    "path": "/api/resource/{id}",
    "method": "GET",
    "params": {"id": "example_id"},
})

if not result["ok"]:
    print("request failed:", result.get("status"), result.get("err"))
```


## How-to guides

### Make a direct HTTP request

For endpoints not covered by entity methods:

```python
result = client.direct({
    "path": "/api/resource/{id}",
    "method": "GET",
    "params": {"id": "example"},
})

if result["ok"]:
    print(result["status"])  # 200
    print(result["data"])    # response body
else:
    # A non-2xx response carries status + data (the error body); a
    # transport-level failure carries err instead. Only one is present, so
    # read both with .get() rather than indexing a key that may be absent.
    print(result.get("status"), result.get("err"))
```

### Prepare a request without sending it

```python
# prepare() returns the fetch definition and raises on error.
fetchdef = client.prepare({
    "path": "/api/resource/{id}",
    "method": "DELETE",
    "params": {"id": "example"},
})

print(fetchdef["url"])
print(fetchdef["method"])
print(fetchdef["headers"])
```

### Use test mode

Create a mock client for unit testing — no server required:

```python
client = TelegramBotSDK.test()

# Entity ops return the bare record and raise on error.
approvesuggestedpost = client.ApproveSuggestedPost().create({"chat_id": "example", "message_id": 1, "ok": True})
# approvesuggestedpost contains the mock response record
```

### Use a custom fetch function

Replace the HTTP transport with your own function:

```python
def mock_fetch(url, init):
    return {
        "status": 200,
        "statusText": "OK",
        "headers": {},
        "json": lambda: {"id": "mock01"},
    }, None

client = TelegramBotSDK({
    "base": "http://localhost:8080",
    "system": {
        "fetch": mock_fetch,
    },
})
```

### Run live tests

Create a `.env.local` file at the project root:

```
TELEGRAM_BOT_TEST_LIVE=TRUE
TELEGRAM_BOT_APIKEY=<your-key>
```

Then run:

```bash
cd py && pytest test/
```


## Reference

### TelegramBotSDK

```python
from telegrambot_sdk import TelegramBotSDK

client = TelegramBotSDK(options)
```

Creates a new SDK client.

| Option | Type | Description |
| --- | --- | --- |
| `apikey` | `str` | API key for authentication. |
| `base` | `str` | Base URL of the API server. |
| `prefix` | `str` | URL path prefix prepended to all requests. |
| `suffix` | `str` | URL path suffix appended to all requests. |
| `feature` | `dict` | Feature activation flags. |
| `extend` | `list` | Additional Feature instances to load. |
| `system` | `dict` | System overrides (e.g. custom `fetch` function). |

### test

```python
client = TelegramBotSDK.test(testopts, sdkopts)
```

Creates a test-mode client with mock transport. Both arguments may be `None`.

### TelegramBotSDK methods

| Method | Signature | Description |
| --- | --- | --- |
| `options_map` | `() -> dict` | Deep copy of current SDK options. |
| `get_utility` | `() -> Utility` | Copy of the SDK utility object. |
| `prepare` | `(fetchargs) -> dict` | Build an HTTP request definition without sending. Raises on error. |
| `direct` | `(fetchargs) -> dict` | Build and send an HTTP request. Returns a result dict (branch on `ok`). |
| `ApproveSuggestedPost` | `(data) -> ApproveSuggestedPostEntity` | Create an ApproveSuggestedPost entity instance. |
| `DeclineSuggestedPost` | `(data) -> DeclineSuggestedPostEntity` | Create a DeclineSuggestedPost entity instance. |
| `DeleteForumTopic` | `(data) -> DeleteForumTopicEntity` | Create a DeleteForumTopic entity instance. |
| `EditForumTopic` | `(data) -> EditForumTopicEntity` | Create an EditForumTopic entity instance. |
| `File` | `(data) -> FileEntity` | Create a File entity instance. |
| `ForumTopic` | `(data) -> ForumTopicEntity` | Create a ForumTopic entity instance. |
| `GetBusinessAccountGift` | `(data) -> GetBusinessAccountGiftEntity` | Create a GetBusinessAccountGift entity instance. |
| `GetChatGift` | `(data) -> GetChatGiftEntity` | Create a GetChatGift entity instance. |
| `GetMe` | `(data) -> GetMeEntity` | Create a GetMe entity instance. |
| `GetUserGift` | `(data) -> GetUserGiftEntity` | Create a GetUserGift entity instance. |
| `GetUserProfileAudio` | `(data) -> GetUserProfileAudioEntity` | Create a GetUserProfileAudio entity instance. |
| `Message` | `(data) -> MessageEntity` | Create a Message entity instance. |
| `MessageId` | `(data) -> MessageIdEntity` | Create a MessageId entity instance. |
| `PromoteChatMember` | `(data) -> PromoteChatMemberEntity` | Create a PromoteChatMember entity instance. |
| `RemoveMyProfilePhoto` | `(data) -> RemoveMyProfilePhotoEntity` | Create a RemoveMyProfilePhoto entity instance. |
| `RepostStory` | `(data) -> RepostStoryEntity` | Create a RepostStory entity instance. |
| `SendChatAction` | `(data) -> SendChatActionEntity` | Create a SendChatAction entity instance. |
| `SendMessageDraft` | `(data) -> SendMessageDraftEntity` | Create a SendMessageDraft entity instance. |
| `SetMyProfilePhoto` | `(data) -> SetMyProfilePhotoEntity` | Create a SetMyProfilePhoto entity instance. |
| `UnpinAllForumTopicMessage` | `(data) -> UnpinAllForumTopicMessageEntity` | Create an UnpinAllForumTopicMessage entity instance. |
| `Update` | `(data) -> UpdateEntity` | Create an Update entity instance. |

### Entity interface

All entities share the same interface.

| Method | Signature | Description |
| --- | --- | --- |
| `load` | `(reqmatch, ctrl) -> any` | Load a single entity by match criteria. Raises on error. |
| `list` | `(reqmatch, ctrl) -> list` | List entities matching the criteria. Raises on error. |
| `create` | `(reqdata, ctrl) -> any` | Create a new entity. Raises on error. |
| `data_get` | `() -> dict` | Get entity data. |
| `data_set` | `(data)` | Set entity data. |
| `match_get` | `() -> dict` | Get entity match criteria. |
| `match_set` | `(match)` | Set entity match criteria. |
| `make` | `() -> Entity` | Create a new instance with the same options. |
| `get_name` | `() -> str` | Return the entity name. |

### Result shape

Entity operations return the bare result data (a `dict` for single-entity
ops, a `list` for `list`) and raise on error. Wrap calls in
`try`/`except` to handle failures.

The `direct()` escape hatch never raises — it returns a result `dict`
you branch on via `result["ok"]`:

| Key | Type | Description |
| --- | --- | --- |
| `ok` | `bool` | `True` if the HTTP status is 2xx. |
| `status` | `int` | HTTP status code. |
| `headers` | `dict` | Response headers. |
| `data` | `any` | Parsed JSON response body. |

On error, `ok` is `False` and `err` contains the error value.

### Entities

#### ApproveSuggestedPost

| Field | Description |
| --- | --- |
| `chat_id` |  |
| `description` |  |
| `error_code` |  |
| `message_id` |  |
| `ok` |  |
| `parameter` |  |
| `result` |  |

Operations: Create.

API path: `/approveSuggestedPost`

#### DeclineSuggestedPost

| Field | Description |
| --- | --- |
| `chat_id` |  |
| `description` |  |
| `error_code` |  |
| `message_id` |  |
| `ok` |  |
| `parameter` |  |
| `result` |  |

Operations: Create.

API path: `/declineSuggestedPost`

#### DeleteForumTopic

| Field | Description |
| --- | --- |
| `chat_id` |  |
| `description` |  |
| `error_code` |  |
| `message_thread_id` |  |
| `ok` |  |
| `parameter` |  |
| `result` |  |

Operations: Create.

API path: `/deleteForumTopic`

#### EditForumTopic

| Field | Description |
| --- | --- |
| `chat_id` |  |
| `description` |  |
| `error_code` |  |
| `icon_custom_emoji_id` |  |
| `message_thread_id` |  |
| `name` |  |
| `ok` |  |
| `parameter` |  |
| `result` |  |

Operations: Create.

API path: `/editForumTopic`

#### File

| Field | Description |
| --- | --- |
| `file_id` |  |

Operations: Create.

API path: `/getFile`

#### ForumTopic

| Field | Description |
| --- | --- |
| `chat_id` |  |
| `icon_color` |  |
| `icon_custom_emoji_id` |  |
| `name` |  |

Operations: Create.

API path: `/createForumTopic`

#### GetBusinessAccountGift

| Field | Description |
| --- | --- |
| `description` |  |
| `error_code` |  |
| `exclude_from_blockchain` |  |
| `exclude_limited_non_upgradable` |  |
| `exclude_limited_upgradable` |  |
| `ok` |  |
| `parameter` |  |
| `result` |  |

Operations: Create.

API path: `/getBusinessAccountGifts`

#### GetChatGift

| Field | Description |
| --- | --- |
| `chat_id` |  |
| `description` |  |
| `error_code` |  |
| `ok` |  |
| `parameter` |  |
| `result` |  |

Operations: Create.

API path: `/getChatGifts`

#### GetMe

| Field | Description |
| --- | --- |
| `description` |  |
| `error_code` |  |
| `ok` |  |
| `parameter` |  |
| `result` |  |

Operations: Create, Load.

API path: `/getMe`

#### GetUserGift

| Field | Description |
| --- | --- |
| `description` |  |
| `error_code` |  |
| `ok` |  |
| `parameter` |  |
| `result` |  |
| `user_id` |  |

Operations: Create.

API path: `/getUserGifts`

#### GetUserProfileAudio

| Field | Description |
| --- | --- |
| `description` |  |
| `error_code` |  |
| `ok` |  |
| `parameter` |  |
| `result` |  |
| `user_id` |  |

Operations: Create.

API path: `/getUserProfileAudios`

#### Message

| Field | Description |
| --- | --- |
| `chat_id` |  |
| `direct_messages_topic_id` |  |
| `disable_notification` |  |
| `disable_web_page_preview` |  |
| `from_chat_id` |  |
| `latitude` |  |
| `longitude` |  |
| `message_effect_id` |  |
| `message_id` |  |
| `message_thread_id` |  |
| `option` |  |
| `parse_mode` |  |
| `protect_content` |  |
| `question` |  |
| `reply_to_message_id` |  |
| `text` |  |

Operations: Create.

API path: `/forwardMessage`

#### MessageId

| Field | Description |
| --- | --- |
| `chat_id` |  |
| `direct_messages_topic_id` |  |
| `from_chat_id` |  |
| `message_effect_id` |  |
| `message_id` |  |
| `message_thread_id` |  |

Operations: Create.

API path: `/copyMessage`

#### PromoteChatMember

| Field | Description |
| --- | --- |
| `can_delete_message` |  |
| `can_edit_message` |  |
| `can_manage_chat` |  |
| `can_manage_direct_message` |  |
| `can_post_message` |  |
| `chat_id` |  |
| `description` |  |
| `error_code` |  |
| `ok` |  |
| `parameter` |  |
| `result` |  |
| `user_id` |  |

Operations: Create.

API path: `/promoteChatMember`

#### RemoveMyProfilePhoto

| Field | Description |
| --- | --- |
| `description` |  |
| `error_code` |  |
| `ok` |  |
| `parameter` |  |
| `result` |  |

Operations: Create.

API path: `/removeMyProfilePhoto`

#### RepostStory

| Field | Description |
| --- | --- |
| `chat_id` |  |
| `description` |  |
| `error_code` |  |
| `ok` |  |
| `parameter` |  |
| `result` |  |
| `story_id` |  |

Operations: Create.

API path: `/repostStory`

#### SendChatAction

| Field | Description |
| --- | --- |
| `action` |  |
| `chat_id` |  |
| `description` |  |
| `error_code` |  |
| `message_thread_id` |  |
| `ok` |  |
| `parameter` |  |
| `result` |  |

Operations: Create.

API path: `/sendChatAction`

#### SendMessageDraft

| Field | Description |
| --- | --- |
| `chat_id` |  |
| `description` |  |
| `error_code` |  |
| `message_thread_id` |  |
| `ok` |  |
| `parameter` |  |
| `result` |  |
| `text` |  |

Operations: Create.

API path: `/sendMessageDraft`

#### SetMyProfilePhoto

| Field | Description |
| --- | --- |
| `description` |  |
| `error_code` |  |
| `ok` |  |
| `parameter` |  |
| `result` |  |

Operations: Create.

API path: `/setMyProfilePhoto`

#### UnpinAllForumTopicMessage

| Field | Description |
| --- | --- |
| `chat_id` |  |
| `description` |  |
| `error_code` |  |
| `message_thread_id` |  |
| `ok` |  |
| `parameter` |  |
| `result` |  |

Operations: Create.

API path: `/unpinAllForumTopicMessages`

#### Update

| Field | Description |
| --- | --- |
| `allowed_update` |  |
| `description` |  |
| `error_code` |  |
| `limit` |  |
| `offset` |  |
| `ok` |  |
| `parameter` |  |
| `result` |  |
| `timeout` |  |

Operations: Create, List.

API path: `/getUpdates`



## Entities


### ApproveSuggestedPost

Create an instance: `approve_suggested_post = client.ApproveSuggestedPost()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | `str` |  |
| `description` | `str` |  |
| `error_code` | `int` |  |
| `message_id` | `int` |  |
| `ok` | `bool` |  |
| `parameter` | `dict` |  |
| `result` | `Any` |  |

#### Example: Create

```python
approve_suggested_post = client.ApproveSuggestedPost().create({
    "chat_id": "example",  # str
    "message_id": 1,  # int
    "ok": True,  # bool
})
```


### DeclineSuggestedPost

Create an instance: `decline_suggested_post = client.DeclineSuggestedPost()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | `str` |  |
| `description` | `str` |  |
| `error_code` | `int` |  |
| `message_id` | `int` |  |
| `ok` | `bool` |  |
| `parameter` | `dict` |  |
| `result` | `Any` |  |

#### Example: Create

```python
decline_suggested_post = client.DeclineSuggestedPost().create({
    "chat_id": "example",  # str
    "message_id": 1,  # int
    "ok": True,  # bool
})
```


### DeleteForumTopic

Create an instance: `delete_forum_topic = client.DeleteForumTopic()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | `str` |  |
| `description` | `str` |  |
| `error_code` | `int` |  |
| `message_thread_id` | `int` |  |
| `ok` | `bool` |  |
| `parameter` | `dict` |  |
| `result` | `Any` |  |

#### Example: Create

```python
delete_forum_topic = client.DeleteForumTopic().create({
    "chat_id": "example",  # str
    "message_thread_id": 1,  # int
    "ok": True,  # bool
})
```


### EditForumTopic

Create an instance: `edit_forum_topic = client.EditForumTopic()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | `str` |  |
| `description` | `str` |  |
| `error_code` | `int` |  |
| `icon_custom_emoji_id` | `str` |  |
| `message_thread_id` | `int` |  |
| `name` | `str` |  |
| `ok` | `bool` |  |
| `parameter` | `dict` |  |
| `result` | `Any` |  |

#### Example: Create

```python
edit_forum_topic = client.EditForumTopic().create({
    "chat_id": "example",  # str
    "message_thread_id": 1,  # int
    "ok": True,  # bool
})
```


### File

Create an instance: `file = client.File()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `file_id` | `str` |  |

#### Example: Create

```python
file = client.File().create({
    "file_id": "example",  # str
})
```


### ForumTopic

Create an instance: `forum_topic = client.ForumTopic()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | `str` |  |
| `icon_color` | `int` |  |
| `icon_custom_emoji_id` | `str` |  |
| `name` | `str` |  |

#### Example: Create

```python
forum_topic = client.ForumTopic().create({
    "chat_id": "example",  # str
    "name": "example",  # str
})
```


### GetBusinessAccountGift

Create an instance: `get_business_account_gift = client.GetBusinessAccountGift()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `description` | `str` |  |
| `error_code` | `int` |  |
| `exclude_from_blockchain` | `bool` |  |
| `exclude_limited_non_upgradable` | `bool` |  |
| `exclude_limited_upgradable` | `bool` |  |
| `ok` | `bool` |  |
| `parameter` | `dict` |  |
| `result` | `Any` |  |

#### Example: Create

```python
get_business_account_gift = client.GetBusinessAccountGift().create({
    "ok": True,  # bool
})
```


### GetChatGift

Create an instance: `get_chat_gift = client.GetChatGift()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | `str` |  |
| `description` | `str` |  |
| `error_code` | `int` |  |
| `ok` | `bool` |  |
| `parameter` | `dict` |  |
| `result` | `Any` |  |

#### Example: Create

```python
get_chat_gift = client.GetChatGift().create({
    "chat_id": "example",  # str
    "ok": True,  # bool
})
```


### GetMe

Create an instance: `get_me = client.GetMe()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |
| `load(match)` | Load a single entity by match criteria. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `description` | `str` |  |
| `error_code` | `int` |  |
| `ok` | `bool` |  |
| `parameter` | `dict` |  |
| `result` | `Any` |  |

#### Example: Load

```python
get_me = client.GetMe().load()
```

#### Example: Create

```python
get_me = client.GetMe().create({
    "ok": True,  # bool
})
```


### GetUserGift

Create an instance: `get_user_gift = client.GetUserGift()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `description` | `str` |  |
| `error_code` | `int` |  |
| `ok` | `bool` |  |
| `parameter` | `dict` |  |
| `result` | `Any` |  |
| `user_id` | `int` |  |

#### Example: Create

```python
get_user_gift = client.GetUserGift().create({
    "ok": True,  # bool
    "user_id": 1,  # int
})
```


### GetUserProfileAudio

Create an instance: `get_user_profile_audio = client.GetUserProfileAudio()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `description` | `str` |  |
| `error_code` | `int` |  |
| `ok` | `bool` |  |
| `parameter` | `dict` |  |
| `result` | `Any` |  |
| `user_id` | `int` |  |

#### Example: Create

```python
get_user_profile_audio = client.GetUserProfileAudio().create({
    "ok": True,  # bool
    "user_id": 1,  # int
})
```


### Message

Create an instance: `message = client.Message()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | `str` |  |
| `direct_messages_topic_id` | `int` |  |
| `disable_notification` | `bool` |  |
| `disable_web_page_preview` | `bool` |  |
| `from_chat_id` | `str` |  |
| `latitude` | `float` |  |
| `longitude` | `float` |  |
| `message_effect_id` | `str` |  |
| `message_id` | `int` |  |
| `message_thread_id` | `int` |  |
| `option` | `list` |  |
| `parse_mode` | `str` |  |
| `protect_content` | `bool` |  |
| `question` | `str` |  |
| `reply_to_message_id` | `int` |  |
| `text` | `str` |  |

#### Example: Create

```python
message = client.Message().create({
    "chat_id": "example",  # str
    "from_chat_id": "example",  # str
    "latitude": 1,  # float
    "longitude": 1,  # float
    "message_id": 1,  # int
    "option": [],  # list
    "question": "example",  # str
    "text": "example",  # str
})
```


### MessageId

Create an instance: `message_id = client.MessageId()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | `str` |  |
| `direct_messages_topic_id` | `int` |  |
| `from_chat_id` | `str` |  |
| `message_effect_id` | `str` |  |
| `message_id` | `int` |  |
| `message_thread_id` | `int` |  |

#### Example: Create

```python
message_id = client.MessageId().create({
    "chat_id": "example",  # str
    "from_chat_id": "example",  # str
    "message_id": 1,  # int
})
```


### PromoteChatMember

Create an instance: `promote_chat_member = client.PromoteChatMember()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `can_delete_message` | `bool` |  |
| `can_edit_message` | `bool` |  |
| `can_manage_chat` | `bool` |  |
| `can_manage_direct_message` | `bool` |  |
| `can_post_message` | `bool` |  |
| `chat_id` | `str` |  |
| `description` | `str` |  |
| `error_code` | `int` |  |
| `ok` | `bool` |  |
| `parameter` | `dict` |  |
| `result` | `Any` |  |
| `user_id` | `int` |  |

#### Example: Create

```python
promote_chat_member = client.PromoteChatMember().create({
    "chat_id": "example",  # str
    "ok": True,  # bool
    "user_id": 1,  # int
})
```


### RemoveMyProfilePhoto

Create an instance: `remove_my_profile_photo = client.RemoveMyProfilePhoto()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `description` | `str` |  |
| `error_code` | `int` |  |
| `ok` | `bool` |  |
| `parameter` | `dict` |  |
| `result` | `Any` |  |

#### Example: Create

```python
remove_my_profile_photo = client.RemoveMyProfilePhoto().create({
    "ok": True,  # bool
})
```


### RepostStory

Create an instance: `repost_story = client.RepostStory()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | `str` |  |
| `description` | `str` |  |
| `error_code` | `int` |  |
| `ok` | `bool` |  |
| `parameter` | `dict` |  |
| `result` | `Any` |  |
| `story_id` | `int` |  |

#### Example: Create

```python
repost_story = client.RepostStory().create({
    "chat_id": "example",  # str
    "ok": True,  # bool
    "story_id": 1,  # int
})
```


### SendChatAction

Create an instance: `send_chat_action = client.SendChatAction()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `action` | `str` |  |
| `chat_id` | `str` |  |
| `description` | `str` |  |
| `error_code` | `int` |  |
| `message_thread_id` | `int` |  |
| `ok` | `bool` |  |
| `parameter` | `dict` |  |
| `result` | `Any` |  |

#### Example: Create

```python
send_chat_action = client.SendChatAction().create({
    "action": "example",  # str
    "chat_id": "example",  # str
    "ok": True,  # bool
})
```


### SendMessageDraft

Create an instance: `send_message_draft = client.SendMessageDraft()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | `str` |  |
| `description` | `str` |  |
| `error_code` | `int` |  |
| `message_thread_id` | `int` |  |
| `ok` | `bool` |  |
| `parameter` | `dict` |  |
| `result` | `Any` |  |
| `text` | `str` |  |

#### Example: Create

```python
send_message_draft = client.SendMessageDraft().create({
    "chat_id": "example",  # str
    "ok": True,  # bool
    "text": "example",  # str
})
```


### SetMyProfilePhoto

Create an instance: `set_my_profile_photo = client.SetMyProfilePhoto()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `description` | `str` |  |
| `error_code` | `int` |  |
| `ok` | `bool` |  |
| `parameter` | `dict` |  |
| `result` | `Any` |  |

#### Example: Create

```python
set_my_profile_photo = client.SetMyProfilePhoto().create({
    "ok": True,  # bool
})
```


### UnpinAllForumTopicMessage

Create an instance: `unpin_all_forum_topic_message = client.UnpinAllForumTopicMessage()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | `str` |  |
| `description` | `str` |  |
| `error_code` | `int` |  |
| `message_thread_id` | `int` |  |
| `ok` | `bool` |  |
| `parameter` | `dict` |  |
| `result` | `Any` |  |

#### Example: Create

```python
unpin_all_forum_topic_message = client.UnpinAllForumTopicMessage().create({
    "chat_id": "example",  # str
    "message_thread_id": 1,  # int
    "ok": True,  # bool
})
```


### Update

Create an instance: `update = client.Update()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |
| `list()` | List entities, optionally matching the given criteria. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `allowed_update` | `list` |  |
| `description` | `str` |  |
| `error_code` | `int` |  |
| `limit` | `int` |  |
| `offset` | `int` |  |
| `ok` | `bool` |  |
| `parameter` | `dict` |  |
| `result` | `list` |  |
| `timeout` | `int` |  |

#### Example: List

```python
updates = client.Update().list()
```

#### Example: Create

```python
update = client.Update().create({
    "ok": True,  # bool
})
```


## Advanced

> The sections above cover everyday use. The material below explains the
> SDK's internals — useful when extending it with custom features, but not
> needed for normal use.

### The operation pipeline

Every entity operation follows a six-stage pipeline. Each stage fires a
feature hook before executing:

```
PrePoint → PreSpec → PreRequest → PreResponse → PreResult → PreDone
```

- **PrePoint**: Resolves which API endpoint to call based on the
  operation name and entity configuration.
- **PreSpec**: Builds the HTTP spec — URL, method, headers, body —
  from the resolved point and the caller's parameters.
- **PreRequest**: Sends the HTTP request. Features can intercept here
  to replace the transport (as TestFeature does with mocks).
- **PreResponse**: Parses the raw HTTP response.
- **PreResult**: Extracts the business data from the parsed response.
- **PreDone**: Final stage before returning to the caller. Entity
  state (match, data) is updated here.

If any stage errors, the pipeline short-circuits and the error surfaces
to the caller — see [Error handling](#error-handling) for how that looks
in this language.

### Features and hooks

Features are the extension mechanism. A feature is a Python class
with hook methods named after pipeline stages (e.g. `PrePoint`,
`PreSpec`). Each method receives the context.

The SDK ships with built-in features:

- **TestFeature**: In-memory mock transport for testing without a live server

Features are initialized in order. Hooks fire in the order features
were added, so later features can override earlier ones.

### Data as dicts

The Python SDK uses plain dicts throughout rather than typed
objects. This mirrors the dynamic nature of the API and keeps the
SDK flexible — no code generation is needed when the API schema
changes.

Use `helpers.to_map()` to safely validate that a value is a dict.

### Module structure

```
py/
├── telegrambot_sdk.py         -- Main SDK module
├── config.py                    -- Configuration
├── features.py                  -- Feature factory
├── core/                        -- Core types and context
├── entity/                      -- Entity implementations
├── feature/                     -- Built-in features (Base, Test, Log)
├── utility/                     -- Utility functions and struct library
└── test/                        -- Test suites
```

The main module (`telegrambot_sdk`) exports the SDK class.
Import entity or utility modules directly only when needed.

### Entity state

Entity instances are stateful. After a successful `create`, the entity
stores the returned data and match criteria internally.

```python
approvesuggestedpost = client.ApproveSuggestedPost()
approvesuggestedpost.create({ "chat_id": "example", "message_id": 1, "ok": True })

# approvesuggestedpost.data_get() now returns the approvesuggestedpost data from the last create
# approvesuggestedpost.match_get() returns the last match criteria
```

Call `make()` to create a fresh instance with the same configuration
but no stored state.

### Direct vs entity access

The entity interface handles URL construction, parameter placement,
and response parsing automatically. Use it for standard CRUD operations.

`direct()` gives full control over the HTTP request. Use it for
non-standard endpoints, bulk operations, or any path not modelled as
an entity. `prepare()` builds the request without sending it — useful
for debugging or custom transport.


## Full Reference

See [REFERENCE.md](REFERENCE.md) for complete API reference
documentation including all method signatures, entity field schemas,
and detailed usage examples.
