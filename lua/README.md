# TelegramBot Lua SDK



The Lua SDK for the TelegramBot API — an entity-oriented client using Lua conventions.

It exposes the API as capitalised, semantic **Entities** — e.g. `client:ApproveSuggestedPost()` — each with the same small set of operations (`list`, `load`, `create`) instead of raw URL paths and query strings. You call meaning, not endpoints, which keeps the cognitive load low.

> Other languages, the CLI, and MCP server live alongside this one — see
> the [top-level README](../README.md).


## Install
This package is not yet published to LuaRocks. Install it from the
GitHub release tag (`lua/vX.Y.Z`, see [Releases](https://github.com/voxgig-sdk/telegram-bot-sdk/releases)),
or add the source directory to your `LUA_PATH`:

```bash
export LUA_PATH="path/to/lua/?.lua;path/to/lua/?/init.lua;;"
```


## Tutorial: your first API call

This tutorial walks through creating a client, listing entities, and
loading a specific record.

### 1. Create a client

```lua
local sdk = require("telegram-bot_sdk")

local client = sdk.new({
  apikey = os.getenv("TELEGRAM_BOT_APIKEY"),
})
```

### 4. Create, update, and remove

```lua
-- Create
local created, err = client:ApproveSuggestedPost():create({ chat_id = "example_chat_id", message_id = 1, ok = true })
if err then error(err) end

```


## Error handling

Entity operations return `(value, err)`. Check `err` before using
the value:

```lua
local getme, err = client:GetMe():load()
if err then error(err) end
```

`direct` follows the same `(value, err)` convention:

```lua
local result, err = client:direct({
  path = "/api/resource/{id}",
  method = "GET",
  params = { id = "example_id" },
})
if err then error(err) end
```


## How-to guides

### Make a direct HTTP request

For endpoints not covered by entity methods:

```lua
local result, err = client:direct({
  path = "/api/resource/{id}",
  method = "GET",
  params = { id = "example" },
})
if err then error(err) end

if result["ok"] then
  print(result["status"])  -- 200
  print(result["data"])    -- response body
end
```

### Prepare a request without sending it

```lua
local fetchdef, err = client:prepare({
  path = "/api/resource/{id}",
  method = "DELETE",
  params = { id = "example" },
})
if err then error(err) end

print(fetchdef["url"])
print(fetchdef["method"])
print(fetchdef["headers"])
```

### Use test mode

Create a mock client for unit testing — no server required:

```lua
local client = sdk.test()

local result, err = client:GetMe():load()
-- result is the returned data; err is set on failure
```

### Use a custom fetch function

Replace the HTTP transport with your own function:

```lua
local function mock_fetch(url, init)
  return {
    status = 200,
    statusText = "OK",
    headers = {},
    json = function()
      return { id = "mock01" }
    end,
  }, nil
end

local client = sdk.new({
  base = "http://localhost:8080",
  system = {
    fetch = mock_fetch,
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
cd lua && busted test/
```


## Reference

### TelegramBotSDK

```lua
local sdk = require("telegram-bot_sdk")
local client = sdk.new(options)
```

Creates a new SDK client.

| Option | Type | Description |
| --- | --- | --- |
| `apikey` | `string` | API key for authentication. |
| `base` | `string` | Base URL of the API server. |
| `prefix` | `string` | URL path prefix prepended to all requests. |
| `suffix` | `string` | URL path suffix appended to all requests. |
| `feature` | `table` | Feature activation flags. |
| `extend` | `table` | Additional Feature instances to load. |
| `system` | `table` | System overrides (e.g. custom `fetch` function). |

### test

```lua
local client = sdk.test(testopts, sdkopts)
```

Creates a test-mode client with mock transport. Both arguments may be `nil`.

### TelegramBotSDK methods

| Method | Signature | Description |
| --- | --- | --- |
| `options_map` | `() -> table` | Deep copy of current SDK options. |
| `get_utility` | `() -> Utility` | Copy of the SDK utility object. |
| `prepare` | `(fetchargs) -> table, err` | Build an HTTP request definition without sending. |
| `direct` | `(fetchargs) -> table, err` | Build and send an HTTP request. |
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
| `load` | `(reqmatch, ctrl) -> any, err` | Load a single entity by match criteria. |
| `list` | `(reqmatch, ctrl) -> any, err` | List entities matching the criteria. |
| `create` | `(reqdata, ctrl) -> any, err` | Create a new entity. |
| `data_get` | `() -> table` | Get entity data. |
| `data_set` | `(data)` | Set entity data. |
| `match_get` | `() -> table` | Get entity match criteria. |
| `match_set` | `(match)` | Set entity match criteria. |
| `make` | `() -> Entity` | Create a new instance with the same options. |
| `get_name` | `() -> string` | Return the entity name. |

### Result shape

Entity operations return `(value, err)`. The `value` is the operation's
data **directly** — there is no wrapper:

| Operation | `value` |
| --- | --- |
| `load` / `create` | the entity record (a `table`) |
| `list` | an array (`table`) of entity records |

Check `err` first (it is non-`nil` on failure), then use `value`:

    local get_me, err = client:GetMe():load()
    if err then error(err) end
    -- get_me is the loaded record

Only `direct()` returns a response envelope — a `table` with `ok`,
`status`, `headers`, and `data` keys.

### Entities

#### ApproveSuggestedPost

| Field | Description |
| --- | --- |
| `chat_id` |  |
| `description` | Human-readable description of the result |
| `error_code` | Error code |
| `message_id` |  |
| `ok` | If true, the request was successful |
| `parameters` |  |
| `result` | The result of the query |

Operations: Create.

API path: `/approveSuggestedPost`

#### DeclineSuggestedPost

| Field | Description |
| --- | --- |
| `chat_id` |  |
| `description` | Human-readable description of the result |
| `error_code` | Error code |
| `message_id` |  |
| `ok` | If true, the request was successful |
| `parameters` |  |
| `result` | The result of the query |

Operations: Create.

API path: `/declineSuggestedPost`

#### DeleteForumTopic

| Field | Description |
| --- | --- |
| `chat_id` |  |
| `description` | Human-readable description of the result |
| `error_code` | Error code |
| `message_thread_id` |  |
| `ok` | If true, the request was successful |
| `parameters` |  |
| `result` | The result of the query |

Operations: Create.

API path: `/deleteForumTopic`

#### EditForumTopic

| Field | Description |
| --- | --- |
| `chat_id` |  |
| `description` | Human-readable description of the result |
| `error_code` | Error code |
| `icon_custom_emoji_id` |  |
| `message_thread_id` |  |
| `name` |  |
| `ok` | If true, the request was successful |
| `parameters` |  |
| `result` | The result of the query |

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
| `description` | Human-readable description of the result |
| `error_code` | Error code |
| `exclude_from_blockchain` |  |
| `exclude_limited_non_upgradable` |  |
| `exclude_limited_upgradable` |  |
| `ok` | If true, the request was successful |
| `parameters` |  |
| `result` | The result of the query |

Operations: Create.

API path: `/getBusinessAccountGifts`

#### GetChatGift

| Field | Description |
| --- | --- |
| `chat_id` |  |
| `description` | Human-readable description of the result |
| `error_code` | Error code |
| `ok` | If true, the request was successful |
| `parameters` |  |
| `result` | The result of the query |

Operations: Create.

API path: `/getChatGifts`

#### GetMe

| Field | Description |
| --- | --- |
| `description` | Human-readable description of the result |
| `error_code` | Error code |
| `ok` | If true, the request was successful |
| `parameters` |  |
| `result` | The result of the query |

Operations: Create, Load.

API path: `/getMe`

#### GetUserGift

| Field | Description |
| --- | --- |
| `description` | Human-readable description of the result |
| `error_code` | Error code |
| `ok` | If true, the request was successful |
| `parameters` |  |
| `result` | The result of the query |
| `user_id` |  |

Operations: Create.

API path: `/getUserGifts`

#### GetUserProfileAudio

| Field | Description |
| --- | --- |
| `description` | Human-readable description of the result |
| `error_code` | Error code |
| `ok` | If true, the request was successful |
| `parameters` |  |
| `result` | The result of the query |
| `user_id` |  |

Operations: Create.

API path: `/getUserProfileAudios`

#### Message

| Field | Description |
| --- | --- |
| `chat_id` | Unique identifier for the target chat or username |
| `direct_messages_topic_id` | Unique identifier for the target direct messages topic |
| `disable_notification` | Sends the message silently |
| `disable_web_page_preview` | Disables link previews for links in this message |
| `from_chat_id` |  |
| `latitude` |  |
| `longitude` |  |
| `message_effect_id` | Unique identifier of the message effect to be added to the message |
| `message_id` |  |
| `message_thread_id` | Unique identifier for the target message thread (topic) of the forum |
| `options` |  |
| `parse_mode` | Mode for parsing entities in the message text |
| `protect_content` | Protects the contents of the sent message from forwarding and saving |
| `question` |  |
| `reply_to_message_id` | If the message is a reply, ID of the original message |
| `text` | Text of the message to be sent |

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
| `can_delete_messages` |  |
| `can_edit_messages` |  |
| `can_manage_chat` |  |
| `can_manage_direct_messages` |  |
| `can_post_messages` |  |
| `chat_id` |  |
| `description` | Human-readable description of the result |
| `error_code` | Error code |
| `ok` | If true, the request was successful |
| `parameters` |  |
| `result` | The result of the query |
| `user_id` |  |

Operations: Create.

API path: `/promoteChatMember`

#### RemoveMyProfilePhoto

| Field | Description |
| --- | --- |
| `description` | Human-readable description of the result |
| `error_code` | Error code |
| `ok` | If true, the request was successful |
| `parameters` |  |
| `result` | The result of the query |

Operations: Create.

API path: `/removeMyProfilePhoto`

#### RepostStory

| Field | Description |
| --- | --- |
| `chat_id` |  |
| `description` | Human-readable description of the result |
| `error_code` | Error code |
| `ok` | If true, the request was successful |
| `parameters` |  |
| `result` | The result of the query |
| `story_id` |  |

Operations: Create.

API path: `/repostStory`

#### SendChatAction

| Field | Description |
| --- | --- |
| `action` |  |
| `chat_id` |  |
| `description` | Human-readable description of the result |
| `error_code` | Error code |
| `message_thread_id` |  |
| `ok` | If true, the request was successful |
| `parameters` |  |
| `result` | The result of the query |

Operations: Create.

API path: `/sendChatAction`

#### SendMessageDraft

| Field | Description |
| --- | --- |
| `chat_id` |  |
| `description` | Human-readable description of the result |
| `error_code` | Error code |
| `message_thread_id` |  |
| `ok` | If true, the request was successful |
| `parameters` |  |
| `result` | The result of the query |
| `text` |  |

Operations: Create.

API path: `/sendMessageDraft`

#### SetMyProfilePhoto

| Field | Description |
| --- | --- |
| `description` | Human-readable description of the result |
| `error_code` | Error code |
| `ok` | If true, the request was successful |
| `parameters` |  |
| `result` | The result of the query |

Operations: Create.

API path: `/setMyProfilePhoto`

#### UnpinAllForumTopicMessage

| Field | Description |
| --- | --- |
| `chat_id` |  |
| `description` | Human-readable description of the result |
| `error_code` | Error code |
| `message_thread_id` |  |
| `ok` | If true, the request was successful |
| `parameters` |  |
| `result` | The result of the query |

Operations: Create.

API path: `/unpinAllForumTopicMessages`

#### Update

| Field | Description |
| --- | --- |
| `allowed_updates` |  |
| `description` | Human-readable description of the result |
| `error_code` | Error code |
| `limit` |  |
| `offset` |  |
| `ok` | If true, the request was successful |
| `parameters` |  |
| `result` | The result of the query |
| `timeout` |  |

Operations: Create, List.

API path: `/getUpdates`



## Entities


### ApproveSuggestedPost

Create an instance: `local approve_suggested_post = client:ApproveSuggestedPost(nil)`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | `string` |  |
| `description` | `string` | Human-readable description of the result |
| `error_code` | `number` | Error code |
| `message_id` | `number` |  |
| `ok` | `boolean` | If true, the request was successful |
| `parameters` | `table` |  |
| `result` | `table` | The result of the query |

#### Example: Create

```lua
local approve_suggested_post, err = client:ApproveSuggestedPost():create({
  chat_id = "example_chat_id", -- string
  message_id = 1, -- number
  ok = true, -- boolean
})
```


### DeclineSuggestedPost

Create an instance: `local decline_suggested_post = client:DeclineSuggestedPost(nil)`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | `string` |  |
| `description` | `string` | Human-readable description of the result |
| `error_code` | `number` | Error code |
| `message_id` | `number` |  |
| `ok` | `boolean` | If true, the request was successful |
| `parameters` | `table` |  |
| `result` | `table` | The result of the query |

#### Example: Create

```lua
local decline_suggested_post, err = client:DeclineSuggestedPost():create({
  chat_id = "example_chat_id", -- string
  message_id = 1, -- number
  ok = true, -- boolean
})
```


### DeleteForumTopic

Create an instance: `local delete_forum_topic = client:DeleteForumTopic(nil)`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | `string` |  |
| `description` | `string` | Human-readable description of the result |
| `error_code` | `number` | Error code |
| `message_thread_id` | `number` |  |
| `ok` | `boolean` | If true, the request was successful |
| `parameters` | `table` |  |
| `result` | `table` | The result of the query |

#### Example: Create

```lua
local delete_forum_topic, err = client:DeleteForumTopic():create({
  chat_id = "example_chat_id", -- string
  message_thread_id = 1, -- number
  ok = true, -- boolean
})
```


### EditForumTopic

Create an instance: `local edit_forum_topic = client:EditForumTopic(nil)`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | `string` |  |
| `description` | `string` | Human-readable description of the result |
| `error_code` | `number` | Error code |
| `icon_custom_emoji_id` | `string` |  |
| `message_thread_id` | `number` |  |
| `name` | `string` |  |
| `ok` | `boolean` | If true, the request was successful |
| `parameters` | `table` |  |
| `result` | `table` | The result of the query |

#### Example: Create

```lua
local edit_forum_topic, err = client:EditForumTopic():create({
  chat_id = "example_chat_id", -- string
  message_thread_id = 1, -- number
  ok = true, -- boolean
})
```


### File

Create an instance: `local file = client:File(nil)`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `file_id` | `string` |  |

#### Example: Create

```lua
local file, err = client:File():create({
  file_id = "example_file_id", -- string
})
```


### ForumTopic

Create an instance: `local forum_topic = client:ForumTopic(nil)`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | `string` |  |
| `icon_color` | `number` |  |
| `icon_custom_emoji_id` | `string` |  |
| `name` | `string` |  |

#### Example: Create

```lua
local forum_topic, err = client:ForumTopic():create({
  chat_id = "example_chat_id", -- string
  name = "example_name", -- string
})
```


### GetBusinessAccountGift

Create an instance: `local get_business_account_gift = client:GetBusinessAccountGift(nil)`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `description` | `string` | Human-readable description of the result |
| `error_code` | `number` | Error code |
| `exclude_from_blockchain` | `boolean` |  |
| `exclude_limited_non_upgradable` | `boolean` |  |
| `exclude_limited_upgradable` | `boolean` |  |
| `ok` | `boolean` | If true, the request was successful |
| `parameters` | `table` |  |
| `result` | `table` | The result of the query |

#### Example: Create

```lua
local get_business_account_gift, err = client:GetBusinessAccountGift():create({
  ok = true, -- boolean
})
```


### GetChatGift

Create an instance: `local get_chat_gift = client:GetChatGift(nil)`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | `string` |  |
| `description` | `string` | Human-readable description of the result |
| `error_code` | `number` | Error code |
| `ok` | `boolean` | If true, the request was successful |
| `parameters` | `table` |  |
| `result` | `table` | The result of the query |

#### Example: Create

```lua
local get_chat_gift, err = client:GetChatGift():create({
  chat_id = "example_chat_id", -- string
  ok = true, -- boolean
})
```


### GetMe

Create an instance: `local get_me = client:GetMe(nil)`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |
| `load(match)` | Load a single entity by match criteria. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `description` | `string` | Human-readable description of the result |
| `error_code` | `number` | Error code |
| `ok` | `boolean` | If true, the request was successful |
| `parameters` | `table` |  |
| `result` | `table` | The result of the query |

#### Example: Load

```lua
local get_me, err = client:GetMe():load()
```

#### Example: Create

```lua
local get_me, err = client:GetMe():create({
  ok = true, -- boolean
})
```


### GetUserGift

Create an instance: `local get_user_gift = client:GetUserGift(nil)`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `description` | `string` | Human-readable description of the result |
| `error_code` | `number` | Error code |
| `ok` | `boolean` | If true, the request was successful |
| `parameters` | `table` |  |
| `result` | `table` | The result of the query |
| `user_id` | `number` |  |

#### Example: Create

```lua
local get_user_gift, err = client:GetUserGift():create({
  ok = true, -- boolean
  user_id = 1, -- number
})
```


### GetUserProfileAudio

Create an instance: `local get_user_profile_audio = client:GetUserProfileAudio(nil)`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `description` | `string` | Human-readable description of the result |
| `error_code` | `number` | Error code |
| `ok` | `boolean` | If true, the request was successful |
| `parameters` | `table` |  |
| `result` | `table` | The result of the query |
| `user_id` | `number` |  |

#### Example: Create

```lua
local get_user_profile_audio, err = client:GetUserProfileAudio():create({
  ok = true, -- boolean
  user_id = 1, -- number
})
```


### Message

Create an instance: `local message = client:Message(nil)`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | `string` | Unique identifier for the target chat or username |
| `direct_messages_topic_id` | `number` | Unique identifier for the target direct messages topic |
| `disable_notification` | `boolean` | Sends the message silently |
| `disable_web_page_preview` | `boolean` | Disables link previews for links in this message |
| `from_chat_id` | `string` |  |
| `latitude` | `number` |  |
| `longitude` | `number` |  |
| `message_effect_id` | `string` | Unique identifier of the message effect to be added to the message |
| `message_id` | `number` |  |
| `message_thread_id` | `number` | Unique identifier for the target message thread (topic) of the forum |
| `options` | `table` |  |
| `parse_mode` | `string` | Mode for parsing entities in the message text |
| `protect_content` | `boolean` | Protects the contents of the sent message from forwarding and saving |
| `question` | `string` |  |
| `reply_to_message_id` | `number` | If the message is a reply, ID of the original message |
| `text` | `string` | Text of the message to be sent |

#### Example: Create

```lua
local message, err = client:Message():create({
  chat_id = "example_chat_id", -- string
  from_chat_id = "example_from_chat_id", -- string
  latitude = 1, -- number
  longitude = 1, -- number
  message_id = 1, -- number
  options = {}, -- table
  question = "example_question", -- string
  text = "example_text", -- string
})
```


### MessageId

Create an instance: `local message_id = client:MessageId(nil)`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | `string` |  |
| `direct_messages_topic_id` | `number` |  |
| `from_chat_id` | `string` |  |
| `message_effect_id` | `string` |  |
| `message_id` | `number` |  |
| `message_thread_id` | `number` |  |

#### Example: Create

```lua
local message_id, err = client:MessageId():create({
  chat_id = "example_chat_id", -- string
  from_chat_id = "example_from_chat_id", -- string
  message_id = 1, -- number
})
```


### PromoteChatMember

Create an instance: `local promote_chat_member = client:PromoteChatMember(nil)`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `can_delete_messages` | `boolean` |  |
| `can_edit_messages` | `boolean` |  |
| `can_manage_chat` | `boolean` |  |
| `can_manage_direct_messages` | `boolean` |  |
| `can_post_messages` | `boolean` |  |
| `chat_id` | `string` |  |
| `description` | `string` | Human-readable description of the result |
| `error_code` | `number` | Error code |
| `ok` | `boolean` | If true, the request was successful |
| `parameters` | `table` |  |
| `result` | `table` | The result of the query |
| `user_id` | `number` |  |

#### Example: Create

```lua
local promote_chat_member, err = client:PromoteChatMember():create({
  chat_id = "example_chat_id", -- string
  ok = true, -- boolean
  user_id = 1, -- number
})
```


### RemoveMyProfilePhoto

Create an instance: `local remove_my_profile_photo = client:RemoveMyProfilePhoto(nil)`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `description` | `string` | Human-readable description of the result |
| `error_code` | `number` | Error code |
| `ok` | `boolean` | If true, the request was successful |
| `parameters` | `table` |  |
| `result` | `table` | The result of the query |

#### Example: Create

```lua
local remove_my_profile_photo, err = client:RemoveMyProfilePhoto():create({
  ok = true, -- boolean
})
```


### RepostStory

Create an instance: `local repost_story = client:RepostStory(nil)`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | `string` |  |
| `description` | `string` | Human-readable description of the result |
| `error_code` | `number` | Error code |
| `ok` | `boolean` | If true, the request was successful |
| `parameters` | `table` |  |
| `result` | `table` | The result of the query |
| `story_id` | `number` |  |

#### Example: Create

```lua
local repost_story, err = client:RepostStory():create({
  chat_id = "example_chat_id", -- string
  ok = true, -- boolean
  story_id = 1, -- number
})
```


### SendChatAction

Create an instance: `local send_chat_action = client:SendChatAction(nil)`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `action` | `string` |  |
| `chat_id` | `string` |  |
| `description` | `string` | Human-readable description of the result |
| `error_code` | `number` | Error code |
| `message_thread_id` | `number` |  |
| `ok` | `boolean` | If true, the request was successful |
| `parameters` | `table` |  |
| `result` | `table` | The result of the query |

#### Example: Create

```lua
local send_chat_action, err = client:SendChatAction():create({
  action = "example_action", -- string
  chat_id = "example_chat_id", -- string
  ok = true, -- boolean
})
```


### SendMessageDraft

Create an instance: `local send_message_draft = client:SendMessageDraft(nil)`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | `string` |  |
| `description` | `string` | Human-readable description of the result |
| `error_code` | `number` | Error code |
| `message_thread_id` | `number` |  |
| `ok` | `boolean` | If true, the request was successful |
| `parameters` | `table` |  |
| `result` | `table` | The result of the query |
| `text` | `string` |  |

#### Example: Create

```lua
local send_message_draft, err = client:SendMessageDraft():create({
  chat_id = "example_chat_id", -- string
  ok = true, -- boolean
  text = "example_text", -- string
})
```


### SetMyProfilePhoto

Create an instance: `local set_my_profile_photo = client:SetMyProfilePhoto(nil)`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `description` | `string` | Human-readable description of the result |
| `error_code` | `number` | Error code |
| `ok` | `boolean` | If true, the request was successful |
| `parameters` | `table` |  |
| `result` | `table` | The result of the query |

#### Example: Create

```lua
local set_my_profile_photo, err = client:SetMyProfilePhoto():create({
  ok = true, -- boolean
})
```


### UnpinAllForumTopicMessage

Create an instance: `local unpin_all_forum_topic_message = client:UnpinAllForumTopicMessage(nil)`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | `string` |  |
| `description` | `string` | Human-readable description of the result |
| `error_code` | `number` | Error code |
| `message_thread_id` | `number` |  |
| `ok` | `boolean` | If true, the request was successful |
| `parameters` | `table` |  |
| `result` | `table` | The result of the query |

#### Example: Create

```lua
local unpin_all_forum_topic_message, err = client:UnpinAllForumTopicMessage():create({
  chat_id = "example_chat_id", -- string
  message_thread_id = 1, -- number
  ok = true, -- boolean
})
```


### Update

Create an instance: `local update = client:Update(nil)`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |
| `list(match)` | List entities matching the criteria. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `allowed_updates` | `table` |  |
| `description` | `string` | Human-readable description of the result |
| `error_code` | `number` | Error code |
| `limit` | `number` |  |
| `offset` | `number` |  |
| `ok` | `boolean` | If true, the request was successful |
| `parameters` | `table` |  |
| `result` | `table` | The result of the query |
| `timeout` | `number` |  |

#### Example: List

```lua
local updates, err = client:Update():list()
```

#### Example: Create

```lua
local update, err = client:Update():create({
  ok = true, -- boolean
})
```

## Features

This SDK ships 1 optional features. Each is **inactive until you
switch it on**, so an SDK you have not configured behaves exactly as if none of
them existed — no retries, no cache, no logging, no measurable overhead.

Activate a feature by name in the client options, alongside the options shown
above:

| Feature | What it does |
|---|---|
| [`test`](#test) | In-memory mock transport for testing without a live server |

### test

In-memory mock transport for testing without a live server.

| Option | Default |
|---|---|
| `active` | `false` |

Set `feature.test.active` to enable it, then override any of the options above.


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

Features are the extension mechanism. A feature is a Lua table
with hook methods named after pipeline stages (e.g. `PrePoint`,
`PreSpec`). Each method receives the context.

The SDK ships with built-in features:

- **TestFeature**: In-memory mock transport for testing without a live server

Features are initialized in order. Hooks fire in the order features
were added, so later features can override earlier ones.

### Data as tables

The Lua SDK uses plain Lua tables throughout rather than typed
objects. This mirrors the dynamic nature of the API and keeps the
SDK flexible — no code generation is needed when the API schema
changes.

Use `helpers.to_map()` to safely validate that a value is a table.

### Module structure

```
lua/
├── telegram-bot_sdk.lua    -- Main SDK module
├── config.lua               -- Configuration
├── features.lua             -- Feature factory
├── core/                    -- Core types and context
├── entity/                  -- Entity implementations
├── feature/                 -- Built-in features (Base, Test, Log)
├── utility/                 -- Utility functions and struct library
└── test/                    -- Test suites
```

The main module (`telegram-bot_sdk`) exports the SDK constructor
and test helper. Import entity or utility modules directly only
when needed.

### Entity state

Entity instances are stateful. After a successful `load`, the entity
stores the returned data and match criteria internally.

```lua
local getme = client:GetMe()
getme:load()

-- getme:data_get() now returns the getme data from the last load
-- getme:match_get() returns the last match criteria
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
