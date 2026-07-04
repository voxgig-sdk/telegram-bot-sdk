# TelegramBot Lua SDK



The Lua SDK for the TelegramBot API — an entity-oriented client using Lua conventions.

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
local created, err = client:ApproveSuggestedPost():create({ name = "Example" })
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

local result, err = client:ApproveSuggestedPost():load({ id = "test01" })
-- result is the loaded data; err is set on failure
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
| `update` | `(reqdata, ctrl) -> any, err` | Update an existing entity. |
| `remove` | `(reqmatch, ctrl) -> any, err` | Remove an entity. |
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
| `load` / `create` / `update` / `remove` | the entity record (a `table`) |
| `list` | an array (`table`) of entity records |

Check `err` first (it is non-`nil` on failure), then use `value`:

    local approve_suggested_post, err = client:ApproveSuggestedPost():load({ id = "example_id" })
    if err then error(err) end
    -- approve_suggested_post is the loaded record

Only `direct()` returns a response envelope — a `table` with `ok`,
`status`, `headers`, and `data` keys.

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

Create an instance: `local approve_suggested_post = client:ApproveSuggestedPost(nil)`

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

```lua
local approve_suggested_post, err = client:ApproveSuggestedPost():create({
  chat_id = nil, -- `$STRING`
  message_id = nil, -- `$INTEGER`
  ok = nil, -- `$BOOLEAN`
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
| `chat_id` | ``$STRING`` |  |
| `description` | ``$STRING`` |  |
| `error_code` | ``$INTEGER`` |  |
| `message_id` | ``$INTEGER`` |  |
| `ok` | ``$BOOLEAN`` |  |
| `parameter` | ``$OBJECT`` |  |
| `result` | ``$ANY`` |  |

#### Example: Create

```lua
local decline_suggested_post, err = client:DeclineSuggestedPost():create({
  chat_id = nil, -- `$STRING`
  message_id = nil, -- `$INTEGER`
  ok = nil, -- `$BOOLEAN`
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
| `chat_id` | ``$STRING`` |  |
| `description` | ``$STRING`` |  |
| `error_code` | ``$INTEGER`` |  |
| `message_thread_id` | ``$INTEGER`` |  |
| `ok` | ``$BOOLEAN`` |  |
| `parameter` | ``$OBJECT`` |  |
| `result` | ``$ANY`` |  |

#### Example: Create

```lua
local delete_forum_topic, err = client:DeleteForumTopic():create({
  chat_id = nil, -- `$STRING`
  message_thread_id = nil, -- `$INTEGER`
  ok = nil, -- `$BOOLEAN`
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

```lua
local edit_forum_topic, err = client:EditForumTopic():create({
  chat_id = nil, -- `$STRING`
  message_thread_id = nil, -- `$INTEGER`
  ok = nil, -- `$BOOLEAN`
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
| `file_id` | ``$STRING`` |  |

#### Example: Create

```lua
local file, err = client:File():create({
  file_id = nil, -- `$STRING`
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
| `chat_id` | ``$STRING`` |  |
| `icon_color` | ``$INTEGER`` |  |
| `icon_custom_emoji_id` | ``$STRING`` |  |
| `name` | ``$STRING`` |  |

#### Example: Create

```lua
local forum_topic, err = client:ForumTopic():create({
  chat_id = nil, -- `$STRING`
  name = nil, -- `$STRING`
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
| `description` | ``$STRING`` |  |
| `error_code` | ``$INTEGER`` |  |
| `exclude_from_blockchain` | ``$BOOLEAN`` |  |
| `exclude_limited_non_upgradable` | ``$BOOLEAN`` |  |
| `exclude_limited_upgradable` | ``$BOOLEAN`` |  |
| `ok` | ``$BOOLEAN`` |  |
| `parameter` | ``$OBJECT`` |  |
| `result` | ``$ANY`` |  |

#### Example: Create

```lua
local get_business_account_gift, err = client:GetBusinessAccountGift():create({
  ok = nil, -- `$BOOLEAN`
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
| `chat_id` | ``$STRING`` |  |
| `description` | ``$STRING`` |  |
| `error_code` | ``$INTEGER`` |  |
| `ok` | ``$BOOLEAN`` |  |
| `parameter` | ``$OBJECT`` |  |
| `result` | ``$ANY`` |  |

#### Example: Create

```lua
local get_chat_gift, err = client:GetChatGift():create({
  chat_id = nil, -- `$STRING`
  ok = nil, -- `$BOOLEAN`
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
| `description` | ``$STRING`` |  |
| `error_code` | ``$INTEGER`` |  |
| `ok` | ``$BOOLEAN`` |  |
| `parameter` | ``$OBJECT`` |  |
| `result` | ``$ANY`` |  |

#### Example: Load

```lua
local get_me, err = client:GetMe():load({ id = "get_me_id" })
```

#### Example: Create

```lua
local get_me, err = client:GetMe():create({
  ok = nil, -- `$BOOLEAN`
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
| `description` | ``$STRING`` |  |
| `error_code` | ``$INTEGER`` |  |
| `ok` | ``$BOOLEAN`` |  |
| `parameter` | ``$OBJECT`` |  |
| `result` | ``$ANY`` |  |
| `user_id` | ``$INTEGER`` |  |

#### Example: Create

```lua
local get_user_gift, err = client:GetUserGift():create({
  ok = nil, -- `$BOOLEAN`
  user_id = nil, -- `$INTEGER`
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
| `description` | ``$STRING`` |  |
| `error_code` | ``$INTEGER`` |  |
| `ok` | ``$BOOLEAN`` |  |
| `parameter` | ``$OBJECT`` |  |
| `result` | ``$ANY`` |  |
| `user_id` | ``$INTEGER`` |  |

#### Example: Create

```lua
local get_user_profile_audio, err = client:GetUserProfileAudio():create({
  ok = nil, -- `$BOOLEAN`
  user_id = nil, -- `$INTEGER`
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

```lua
local message, err = client:Message():create({
  chat_id = nil, -- `$STRING`
  from_chat_id = nil, -- `$STRING`
  latitude = nil, -- `$NUMBER`
  longitude = nil, -- `$NUMBER`
  message_id = nil, -- `$INTEGER`
  option = nil, -- `$ARRAY`
  question = nil, -- `$STRING`
  text = nil, -- `$STRING`
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
| `chat_id` | ``$STRING`` |  |
| `direct_messages_topic_id` | ``$INTEGER`` |  |
| `from_chat_id` | ``$STRING`` |  |
| `message_effect_id` | ``$STRING`` |  |
| `message_id` | ``$INTEGER`` |  |
| `message_thread_id` | ``$INTEGER`` |  |

#### Example: Create

```lua
local message_id, err = client:MessageId():create({
  chat_id = nil, -- `$STRING`
  from_chat_id = nil, -- `$STRING`
  message_id = nil, -- `$INTEGER`
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

```lua
local promote_chat_member, err = client:PromoteChatMember():create({
  chat_id = nil, -- `$STRING`
  ok = nil, -- `$BOOLEAN`
  user_id = nil, -- `$INTEGER`
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
| `description` | ``$STRING`` |  |
| `error_code` | ``$INTEGER`` |  |
| `ok` | ``$BOOLEAN`` |  |
| `parameter` | ``$OBJECT`` |  |
| `result` | ``$ANY`` |  |

#### Example: Create

```lua
local remove_my_profile_photo, err = client:RemoveMyProfilePhoto():create({
  ok = nil, -- `$BOOLEAN`
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
| `chat_id` | ``$STRING`` |  |
| `description` | ``$STRING`` |  |
| `error_code` | ``$INTEGER`` |  |
| `ok` | ``$BOOLEAN`` |  |
| `parameter` | ``$OBJECT`` |  |
| `result` | ``$ANY`` |  |
| `story_id` | ``$INTEGER`` |  |

#### Example: Create

```lua
local repost_story, err = client:RepostStory():create({
  chat_id = nil, -- `$STRING`
  ok = nil, -- `$BOOLEAN`
  story_id = nil, -- `$INTEGER`
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
| `action` | ``$STRING`` |  |
| `chat_id` | ``$STRING`` |  |
| `description` | ``$STRING`` |  |
| `error_code` | ``$INTEGER`` |  |
| `message_thread_id` | ``$INTEGER`` |  |
| `ok` | ``$BOOLEAN`` |  |
| `parameter` | ``$OBJECT`` |  |
| `result` | ``$ANY`` |  |

#### Example: Create

```lua
local send_chat_action, err = client:SendChatAction():create({
  action = nil, -- `$STRING`
  chat_id = nil, -- `$STRING`
  ok = nil, -- `$BOOLEAN`
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
| `chat_id` | ``$STRING`` |  |
| `description` | ``$STRING`` |  |
| `error_code` | ``$INTEGER`` |  |
| `message_thread_id` | ``$INTEGER`` |  |
| `ok` | ``$BOOLEAN`` |  |
| `parameter` | ``$OBJECT`` |  |
| `result` | ``$ANY`` |  |
| `text` | ``$STRING`` |  |

#### Example: Create

```lua
local send_message_draft, err = client:SendMessageDraft():create({
  chat_id = nil, -- `$STRING`
  ok = nil, -- `$BOOLEAN`
  text = nil, -- `$STRING`
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
| `description` | ``$STRING`` |  |
| `error_code` | ``$INTEGER`` |  |
| `ok` | ``$BOOLEAN`` |  |
| `parameter` | ``$OBJECT`` |  |
| `result` | ``$ANY`` |  |

#### Example: Create

```lua
local set_my_profile_photo, err = client:SetMyProfilePhoto():create({
  ok = nil, -- `$BOOLEAN`
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
| `chat_id` | ``$STRING`` |  |
| `description` | ``$STRING`` |  |
| `error_code` | ``$INTEGER`` |  |
| `message_thread_id` | ``$INTEGER`` |  |
| `ok` | ``$BOOLEAN`` |  |
| `parameter` | ``$OBJECT`` |  |
| `result` | ``$ANY`` |  |

#### Example: Create

```lua
local unpin_all_forum_topic_message, err = client:UnpinAllForumTopicMessage():create({
  chat_id = nil, -- `$STRING`
  message_thread_id = nil, -- `$INTEGER`
  ok = nil, -- `$BOOLEAN`
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

```lua
local updates, err = client:Update():list()
```

#### Example: Create

```lua
local update, err = client:Update():create({
  ok = nil, -- `$BOOLEAN`
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
error is returned to the caller as a second return value.

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
local approvesuggestedpost = client:ApproveSuggestedPost()
approvesuggestedpost:load({ id = "example_id" })

-- approvesuggestedpost:data_get() now returns the loaded approvesuggestedpost data
-- approvesuggestedpost:match_get() returns the last match criteria
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
