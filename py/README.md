# TelegramBot Python SDK

The Python SDK for the TelegramBot API. Provides an entity-oriented interface following Pythonic conventions.


## Install
```bash
pip install telegram-bot-sdk
```

Or install from source:

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
    "apikey": os.environ.get("TELEGRAM-BOT_APIKEY"),
})
```

### 4. Create, update, and remove

```python
# Create
created, _ = client.ApproveSuggestedPost(None).create({"name": "Example"}, None)

```


## How-to guides

### Make a direct HTTP request

For endpoints not covered by entity methods:

```python
result, err = client.direct({
    "path": "/api/resource/{id}",
    "method": "GET",
    "params": {"id": "example"},
})
if err:
    raise Exception(err)

if result["ok"]:
    print(result["status"])  # 200
    print(result["data"])    # response body
```

### Prepare a request without sending it

```python
fetchdef, err = client.prepare({
    "path": "/api/resource/{id}",
    "method": "DELETE",
    "params": {"id": "example"},
})
if err:
    raise Exception(err)

print(fetchdef["url"])
print(fetchdef["method"])
print(fetchdef["headers"])
```

### Use test mode

Create a mock client for unit testing — no server required:

```python
client = TelegramBotSDK.test(None, None)

result, err = client.TelegramBot(None).load(
    {"id": "test01"}, None
)
# result contains mock response data
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
TELEGRAM-BOT_TEST_LIVE=TRUE
TELEGRAM-BOT_APIKEY=<your-key>
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
| `prepare` | `(fetchargs) -> (dict, err)` | Build an HTTP request definition without sending. |
| `direct` | `(fetchargs) -> (dict, err)` | Build and send an HTTP request. |
| `ApproveSuggestedPost` | `(data) -> ApproveSuggestedPostEntity` | Create a ApproveSuggestedPost entity instance. |
| `DeclineSuggestedPost` | `(data) -> DeclineSuggestedPostEntity` | Create a DeclineSuggestedPost entity instance. |
| `DeleteForumTopic` | `(data) -> DeleteForumTopicEntity` | Create a DeleteForumTopic entity instance. |
| `EditForumTopic` | `(data) -> EditForumTopicEntity` | Create a EditForumTopic entity instance. |
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
| `UnpinAllForumTopicMessage` | `(data) -> UnpinAllForumTopicMessageEntity` | Create a UnpinAllForumTopicMessage entity instance. |
| `Update` | `(data) -> UpdateEntity` | Create a Update entity instance. |

### Entity interface

All entities share the same interface.

| Method | Signature | Description |
| --- | --- | --- |
| `load` | `(reqmatch, ctrl) -> (any, err)` | Load a single entity by match criteria. |
| `list` | `(reqmatch, ctrl) -> (any, err)` | List entities matching the criteria. |
| `create` | `(reqdata, ctrl) -> (any, err)` | Create a new entity. |
| `update` | `(reqdata, ctrl) -> (any, err)` | Update an existing entity. |
| `remove` | `(reqmatch, ctrl) -> (any, err)` | Remove an entity. |
| `data_get` | `() -> dict` | Get entity data. |
| `data_set` | `(data)` | Set entity data. |
| `match_get` | `() -> dict` | Get entity match criteria. |
| `match_set` | `(match)` | Set entity match criteria. |
| `make` | `() -> Entity` | Create a new instance with the same options. |
| `get_name` | `() -> str` | Return the entity name. |

### Result shape

Entity operations return `(any, err)`. The first value is a
`dict` with these keys:

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

Create an instance: `const approve_suggested_post = client.ApproveSuggestedPost()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | ``$STRING`` |  |
| `description` | ``$STRING`` |  |
| `error_code` | ``$INTEGER`` |  |
| `message_id` | ``$INTEGER`` |  |
| `ok` | ``$BOOLEAN`` |  |
| `parameter` | ``$OBJECT`` |  |
| `result` | ``$ANY`` |  |

#### Example: Create

```ts
const approve_suggested_post = await client.ApproveSuggestedPost().create({
  chat_id: /* `$STRING` */,
  message_id: /* `$INTEGER` */,
  ok: /* `$BOOLEAN` */,
})
```


### DeclineSuggestedPost

Create an instance: `const decline_suggested_post = client.DeclineSuggestedPost()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | ``$STRING`` |  |
| `description` | ``$STRING`` |  |
| `error_code` | ``$INTEGER`` |  |
| `message_id` | ``$INTEGER`` |  |
| `ok` | ``$BOOLEAN`` |  |
| `parameter` | ``$OBJECT`` |  |
| `result` | ``$ANY`` |  |

#### Example: Create

```ts
const decline_suggested_post = await client.DeclineSuggestedPost().create({
  chat_id: /* `$STRING` */,
  message_id: /* `$INTEGER` */,
  ok: /* `$BOOLEAN` */,
})
```


### DeleteForumTopic

Create an instance: `const delete_forum_topic = client.DeleteForumTopic()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | ``$STRING`` |  |
| `description` | ``$STRING`` |  |
| `error_code` | ``$INTEGER`` |  |
| `message_thread_id` | ``$INTEGER`` |  |
| `ok` | ``$BOOLEAN`` |  |
| `parameter` | ``$OBJECT`` |  |
| `result` | ``$ANY`` |  |

#### Example: Create

```ts
const delete_forum_topic = await client.DeleteForumTopic().create({
  chat_id: /* `$STRING` */,
  message_thread_id: /* `$INTEGER` */,
  ok: /* `$BOOLEAN` */,
})
```


### EditForumTopic

Create an instance: `const edit_forum_topic = client.EditForumTopic()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | ``$STRING`` |  |
| `description` | ``$STRING`` |  |
| `error_code` | ``$INTEGER`` |  |
| `icon_custom_emoji_id` | ``$STRING`` |  |
| `message_thread_id` | ``$INTEGER`` |  |
| `name` | ``$STRING`` |  |
| `ok` | ``$BOOLEAN`` |  |
| `parameter` | ``$OBJECT`` |  |
| `result` | ``$ANY`` |  |

#### Example: Create

```ts
const edit_forum_topic = await client.EditForumTopic().create({
  chat_id: /* `$STRING` */,
  message_thread_id: /* `$INTEGER` */,
  ok: /* `$BOOLEAN` */,
})
```


### File

Create an instance: `const file = client.File()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `file_id` | ``$STRING`` |  |

#### Example: Create

```ts
const file = await client.File().create({
  file_id: /* `$STRING` */,
})
```


### ForumTopic

Create an instance: `const forum_topic = client.ForumTopic()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | ``$STRING`` |  |
| `icon_color` | ``$INTEGER`` |  |
| `icon_custom_emoji_id` | ``$STRING`` |  |
| `name` | ``$STRING`` |  |

#### Example: Create

```ts
const forum_topic = await client.ForumTopic().create({
  chat_id: /* `$STRING` */,
  name: /* `$STRING` */,
})
```


### GetBusinessAccountGift

Create an instance: `const get_business_account_gift = client.GetBusinessAccountGift()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `description` | ``$STRING`` |  |
| `error_code` | ``$INTEGER`` |  |
| `exclude_from_blockchain` | ``$BOOLEAN`` |  |
| `exclude_limited_non_upgradable` | ``$BOOLEAN`` |  |
| `exclude_limited_upgradable` | ``$BOOLEAN`` |  |
| `ok` | ``$BOOLEAN`` |  |
| `parameter` | ``$OBJECT`` |  |
| `result` | ``$ANY`` |  |

#### Example: Create

```ts
const get_business_account_gift = await client.GetBusinessAccountGift().create({
  ok: /* `$BOOLEAN` */,
})
```


### GetChatGift

Create an instance: `const get_chat_gift = client.GetChatGift()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | ``$STRING`` |  |
| `description` | ``$STRING`` |  |
| `error_code` | ``$INTEGER`` |  |
| `ok` | ``$BOOLEAN`` |  |
| `parameter` | ``$OBJECT`` |  |
| `result` | ``$ANY`` |  |

#### Example: Create

```ts
const get_chat_gift = await client.GetChatGift().create({
  chat_id: /* `$STRING` */,
  ok: /* `$BOOLEAN` */,
})
```


### GetMe

Create an instance: `const get_me = client.GetMe()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |
| `load(match)` | Load a single entity by match criteria. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `description` | ``$STRING`` |  |
| `error_code` | ``$INTEGER`` |  |
| `ok` | ``$BOOLEAN`` |  |
| `parameter` | ``$OBJECT`` |  |
| `result` | ``$ANY`` |  |

#### Example: Load

```ts
const get_me = await client.GetMe().load({ id: 'get_me_id' })
```

#### Example: Create

```ts
const get_me = await client.GetMe().create({
  ok: /* `$BOOLEAN` */,
})
```


### GetUserGift

Create an instance: `const get_user_gift = client.GetUserGift()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `description` | ``$STRING`` |  |
| `error_code` | ``$INTEGER`` |  |
| `ok` | ``$BOOLEAN`` |  |
| `parameter` | ``$OBJECT`` |  |
| `result` | ``$ANY`` |  |
| `user_id` | ``$INTEGER`` |  |

#### Example: Create

```ts
const get_user_gift = await client.GetUserGift().create({
  ok: /* `$BOOLEAN` */,
  user_id: /* `$INTEGER` */,
})
```


### GetUserProfileAudio

Create an instance: `const get_user_profile_audio = client.GetUserProfileAudio()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `description` | ``$STRING`` |  |
| `error_code` | ``$INTEGER`` |  |
| `ok` | ``$BOOLEAN`` |  |
| `parameter` | ``$OBJECT`` |  |
| `result` | ``$ANY`` |  |
| `user_id` | ``$INTEGER`` |  |

#### Example: Create

```ts
const get_user_profile_audio = await client.GetUserProfileAudio().create({
  ok: /* `$BOOLEAN` */,
  user_id: /* `$INTEGER` */,
})
```


### Message

Create an instance: `const message = client.Message()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | ``$STRING`` |  |
| `direct_messages_topic_id` | ``$INTEGER`` |  |
| `disable_notification` | ``$BOOLEAN`` |  |
| `disable_web_page_preview` | ``$BOOLEAN`` |  |
| `from_chat_id` | ``$STRING`` |  |
| `latitude` | ``$NUMBER`` |  |
| `longitude` | ``$NUMBER`` |  |
| `message_effect_id` | ``$STRING`` |  |
| `message_id` | ``$INTEGER`` |  |
| `message_thread_id` | ``$INTEGER`` |  |
| `option` | ``$ARRAY`` |  |
| `parse_mode` | ``$STRING`` |  |
| `protect_content` | ``$BOOLEAN`` |  |
| `question` | ``$STRING`` |  |
| `reply_to_message_id` | ``$INTEGER`` |  |
| `text` | ``$STRING`` |  |

#### Example: Create

```ts
const message = await client.Message().create({
  chat_id: /* `$STRING` */,
  from_chat_id: /* `$STRING` */,
  latitude: /* `$NUMBER` */,
  longitude: /* `$NUMBER` */,
  message_id: /* `$INTEGER` */,
  option: /* `$ARRAY` */,
  question: /* `$STRING` */,
  text: /* `$STRING` */,
})
```


### MessageId

Create an instance: `const message_id = client.MessageId()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | ``$STRING`` |  |
| `direct_messages_topic_id` | ``$INTEGER`` |  |
| `from_chat_id` | ``$STRING`` |  |
| `message_effect_id` | ``$STRING`` |  |
| `message_id` | ``$INTEGER`` |  |
| `message_thread_id` | ``$INTEGER`` |  |

#### Example: Create

```ts
const message_id = await client.MessageId().create({
  chat_id: /* `$STRING` */,
  from_chat_id: /* `$STRING` */,
  message_id: /* `$INTEGER` */,
})
```


### PromoteChatMember

Create an instance: `const promote_chat_member = client.PromoteChatMember()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `can_delete_message` | ``$BOOLEAN`` |  |
| `can_edit_message` | ``$BOOLEAN`` |  |
| `can_manage_chat` | ``$BOOLEAN`` |  |
| `can_manage_direct_message` | ``$BOOLEAN`` |  |
| `can_post_message` | ``$BOOLEAN`` |  |
| `chat_id` | ``$STRING`` |  |
| `description` | ``$STRING`` |  |
| `error_code` | ``$INTEGER`` |  |
| `ok` | ``$BOOLEAN`` |  |
| `parameter` | ``$OBJECT`` |  |
| `result` | ``$ANY`` |  |
| `user_id` | ``$INTEGER`` |  |

#### Example: Create

```ts
const promote_chat_member = await client.PromoteChatMember().create({
  chat_id: /* `$STRING` */,
  ok: /* `$BOOLEAN` */,
  user_id: /* `$INTEGER` */,
})
```


### RemoveMyProfilePhoto

Create an instance: `const remove_my_profile_photo = client.RemoveMyProfilePhoto()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `description` | ``$STRING`` |  |
| `error_code` | ``$INTEGER`` |  |
| `ok` | ``$BOOLEAN`` |  |
| `parameter` | ``$OBJECT`` |  |
| `result` | ``$ANY`` |  |

#### Example: Create

```ts
const remove_my_profile_photo = await client.RemoveMyProfilePhoto().create({
  ok: /* `$BOOLEAN` */,
})
```


### RepostStory

Create an instance: `const repost_story = client.RepostStory()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | ``$STRING`` |  |
| `description` | ``$STRING`` |  |
| `error_code` | ``$INTEGER`` |  |
| `ok` | ``$BOOLEAN`` |  |
| `parameter` | ``$OBJECT`` |  |
| `result` | ``$ANY`` |  |
| `story_id` | ``$INTEGER`` |  |

#### Example: Create

```ts
const repost_story = await client.RepostStory().create({
  chat_id: /* `$STRING` */,
  ok: /* `$BOOLEAN` */,
  story_id: /* `$INTEGER` */,
})
```


### SendChatAction

Create an instance: `const send_chat_action = client.SendChatAction()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `action` | ``$STRING`` |  |
| `chat_id` | ``$STRING`` |  |
| `description` | ``$STRING`` |  |
| `error_code` | ``$INTEGER`` |  |
| `message_thread_id` | ``$INTEGER`` |  |
| `ok` | ``$BOOLEAN`` |  |
| `parameter` | ``$OBJECT`` |  |
| `result` | ``$ANY`` |  |

#### Example: Create

```ts
const send_chat_action = await client.SendChatAction().create({
  action: /* `$STRING` */,
  chat_id: /* `$STRING` */,
  ok: /* `$BOOLEAN` */,
})
```


### SendMessageDraft

Create an instance: `const send_message_draft = client.SendMessageDraft()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | ``$STRING`` |  |
| `description` | ``$STRING`` |  |
| `error_code` | ``$INTEGER`` |  |
| `message_thread_id` | ``$INTEGER`` |  |
| `ok` | ``$BOOLEAN`` |  |
| `parameter` | ``$OBJECT`` |  |
| `result` | ``$ANY`` |  |
| `text` | ``$STRING`` |  |

#### Example: Create

```ts
const send_message_draft = await client.SendMessageDraft().create({
  chat_id: /* `$STRING` */,
  ok: /* `$BOOLEAN` */,
  text: /* `$STRING` */,
})
```


### SetMyProfilePhoto

Create an instance: `const set_my_profile_photo = client.SetMyProfilePhoto()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `description` | ``$STRING`` |  |
| `error_code` | ``$INTEGER`` |  |
| `ok` | ``$BOOLEAN`` |  |
| `parameter` | ``$OBJECT`` |  |
| `result` | ``$ANY`` |  |

#### Example: Create

```ts
const set_my_profile_photo = await client.SetMyProfilePhoto().create({
  ok: /* `$BOOLEAN` */,
})
```


### UnpinAllForumTopicMessage

Create an instance: `const unpin_all_forum_topic_message = client.UnpinAllForumTopicMessage()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | ``$STRING`` |  |
| `description` | ``$STRING`` |  |
| `error_code` | ``$INTEGER`` |  |
| `message_thread_id` | ``$INTEGER`` |  |
| `ok` | ``$BOOLEAN`` |  |
| `parameter` | ``$OBJECT`` |  |
| `result` | ``$ANY`` |  |

#### Example: Create

```ts
const unpin_all_forum_topic_message = await client.UnpinAllForumTopicMessage().create({
  chat_id: /* `$STRING` */,
  message_thread_id: /* `$INTEGER` */,
  ok: /* `$BOOLEAN` */,
})
```


### Update

Create an instance: `const update = client.Update()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |
| `list(match)` | List entities matching the criteria. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `allowed_update` | ``$ARRAY`` |  |
| `description` | ``$STRING`` |  |
| `error_code` | ``$INTEGER`` |  |
| `limit` | ``$INTEGER`` |  |
| `offset` | ``$INTEGER`` |  |
| `ok` | ``$BOOLEAN`` |  |
| `parameter` | ``$OBJECT`` |  |
| `result` | ``$ARRAY`` |  |
| `timeout` | ``$INTEGER`` |  |

#### Example: List

```ts
const updates = await client.Update().list()
```

#### Example: Create

```ts
const update = await client.Update().create({
  ok: /* `$BOOLEAN` */,
})
```


## Explanation

### The operation pipeline

Every entity operation (load, list, create, update, remove) follows a
six-stage pipeline. Each stage fires a feature hook before executing:

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

If any stage returns an error, the pipeline short-circuits and the
error is returned to the caller as the second element in the return tuple.

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

Entity instances are stateful. After a successful `load`, the entity
stores the returned data and match criteria internally.

```python
moon = client.Moon()
moon.load({"planet_id": "earth", "id": "luna"})

# moon.data_get() now returns the loaded moon data
# moon.match_get() returns the last match criteria
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
