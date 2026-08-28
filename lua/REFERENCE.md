# TelegramBot Lua SDK Reference

Complete API reference for the TelegramBot Lua SDK.


## TelegramBotSDK

### Constructor

```lua
local sdk = require("telegram-bot_sdk")
local client = sdk.new(options)
```

Create a new SDK client instance.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `options` | `table` | SDK configuration options. |
| `options.apikey` | `string` | API key for authentication. |
| `options.base` | `string` | Base URL for API requests. |
| `options.prefix` | `string` | URL prefix appended after base. |
| `options.suffix` | `string` | URL suffix appended after path. |
| `options.headers` | `table` | Custom headers for all requests. |
| `options.feature` | `table` | Feature configuration. |
| `options.system` | `table` | System overrides (e.g. custom fetch). |


### Static Methods

#### `sdk.test(testopts?, sdkopts?)`

Create a test client with mock features active. Both arguments are optional.

```lua
local client = sdk.test()
```


### Instance Methods

#### `ApproveSuggestedPost(data)`

Create a new `ApproveSuggestedPost` entity instance. Pass `nil` for no initial data.

#### `DeclineSuggestedPost(data)`

Create a new `DeclineSuggestedPost` entity instance. Pass `nil` for no initial data.

#### `DeleteForumTopic(data)`

Create a new `DeleteForumTopic` entity instance. Pass `nil` for no initial data.

#### `EditForumTopic(data)`

Create a new `EditForumTopic` entity instance. Pass `nil` for no initial data.

#### `File(data)`

Create a new `File` entity instance. Pass `nil` for no initial data.

#### `ForumTopic(data)`

Create a new `ForumTopic` entity instance. Pass `nil` for no initial data.

#### `GetBusinessAccountGift(data)`

Create a new `GetBusinessAccountGift` entity instance. Pass `nil` for no initial data.

#### `GetChatGift(data)`

Create a new `GetChatGift` entity instance. Pass `nil` for no initial data.

#### `GetMe(data)`

Create a new `GetMe` entity instance. Pass `nil` for no initial data.

#### `GetUserGift(data)`

Create a new `GetUserGift` entity instance. Pass `nil` for no initial data.

#### `GetUserProfileAudio(data)`

Create a new `GetUserProfileAudio` entity instance. Pass `nil` for no initial data.

#### `Message(data)`

Create a new `Message` entity instance. Pass `nil` for no initial data.

#### `MessageId(data)`

Create a new `MessageId` entity instance. Pass `nil` for no initial data.

#### `PromoteChatMember(data)`

Create a new `PromoteChatMember` entity instance. Pass `nil` for no initial data.

#### `RemoveMyProfilePhoto(data)`

Create a new `RemoveMyProfilePhoto` entity instance. Pass `nil` for no initial data.

#### `RepostStory(data)`

Create a new `RepostStory` entity instance. Pass `nil` for no initial data.

#### `SendChatAction(data)`

Create a new `SendChatAction` entity instance. Pass `nil` for no initial data.

#### `SendMessageDraft(data)`

Create a new `SendMessageDraft` entity instance. Pass `nil` for no initial data.

#### `SetMyProfilePhoto(data)`

Create a new `SetMyProfilePhoto` entity instance. Pass `nil` for no initial data.

#### `UnpinAllForumTopicMessage(data)`

Create a new `UnpinAllForumTopicMessage` entity instance. Pass `nil` for no initial data.

#### `Update(data)`

Create a new `Update` entity instance. Pass `nil` for no initial data.

#### `options_map() -> table`

Return a deep copy of the current SDK options.

#### `get_utility() -> Utility`

Return a copy of the SDK utility object.

#### `direct(fetchargs) -> table, err`

Make a direct HTTP request to any API endpoint.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `fetchargs.path` | `string` | URL path with optional `{param}` placeholders. |
| `fetchargs.method` | `string` | HTTP method (default: `"GET"`). |
| `fetchargs.params` | `table` | Path parameter values for `{param}` substitution. |
| `fetchargs.query` | `table` | Query string parameters. |
| `fetchargs.headers` | `table` | Request headers (merged with defaults). |
| `fetchargs.body` | `any` | Request body (tables are JSON-serialized). |
| `fetchargs.ctrl` | `table` | Control options (e.g. `{ explain = true }`). |

**Returns:** `table, err`

#### `prepare(fetchargs) -> table, err`

Prepare a fetch definition without sending the request. Accepts the
same parameters as `direct()`.

**Returns:** `table, err`


---

## ApproveSuggestedPostEntity

```lua
local approve_suggested_post = client:ApproveSuggestedPost(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `string` | Yes |  |
| `description` | `string` | No | Human-readable description of the result |
| `error_code` | `number` | No | Error code |
| `message_id` | `number` | Yes |  |
| `ok` | `boolean` | Yes | If true, the request was successful |
| `parameters` | `table` | No |  |
| `result` | `table` | No | The result of the query |

### Operations

#### `create(reqdata, ctrl) -> any, err`

Create a new entity with the given data.

```lua
local result, err = client:ApproveSuggestedPost():create({
  chat_id = --[[ string ]],
  message_id = --[[ number ]],
  ok = --[[ boolean ]],
})
```

### Common Methods

#### `data_get() -> table`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> table`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `ApproveSuggestedPostEntity` instance with the same client and
options.

#### `get_name() -> string`

Return the entity name.


---

## DeclineSuggestedPostEntity

```lua
local decline_suggested_post = client:DeclineSuggestedPost(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `string` | Yes |  |
| `description` | `string` | No | Human-readable description of the result |
| `error_code` | `number` | No | Error code |
| `message_id` | `number` | Yes |  |
| `ok` | `boolean` | Yes | If true, the request was successful |
| `parameters` | `table` | No |  |
| `result` | `table` | No | The result of the query |

### Operations

#### `create(reqdata, ctrl) -> any, err`

Create a new entity with the given data.

```lua
local result, err = client:DeclineSuggestedPost():create({
  chat_id = --[[ string ]],
  message_id = --[[ number ]],
  ok = --[[ boolean ]],
})
```

### Common Methods

#### `data_get() -> table`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> table`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `DeclineSuggestedPostEntity` instance with the same client and
options.

#### `get_name() -> string`

Return the entity name.


---

## DeleteForumTopicEntity

```lua
local delete_forum_topic = client:DeleteForumTopic(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `string` | Yes |  |
| `description` | `string` | No | Human-readable description of the result |
| `error_code` | `number` | No | Error code |
| `message_thread_id` | `number` | Yes |  |
| `ok` | `boolean` | Yes | If true, the request was successful |
| `parameters` | `table` | No |  |
| `result` | `table` | No | The result of the query |

### Operations

#### `create(reqdata, ctrl) -> any, err`

Create a new entity with the given data.

```lua
local result, err = client:DeleteForumTopic():create({
  chat_id = --[[ string ]],
  message_thread_id = --[[ number ]],
  ok = --[[ boolean ]],
})
```

### Common Methods

#### `data_get() -> table`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> table`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `DeleteForumTopicEntity` instance with the same client and
options.

#### `get_name() -> string`

Return the entity name.


---

## EditForumTopicEntity

```lua
local edit_forum_topic = client:EditForumTopic(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `string` | Yes |  |
| `description` | `string` | No | Human-readable description of the result |
| `error_code` | `number` | No | Error code |
| `icon_custom_emoji_id` | `string` | No |  |
| `message_thread_id` | `number` | Yes |  |
| `name` | `string` | No |  |
| `ok` | `boolean` | Yes | If true, the request was successful |
| `parameters` | `table` | No |  |
| `result` | `table` | No | The result of the query |

### Operations

#### `create(reqdata, ctrl) -> any, err`

Create a new entity with the given data.

```lua
local result, err = client:EditForumTopic():create({
  chat_id = --[[ string ]],
  message_thread_id = --[[ number ]],
  ok = --[[ boolean ]],
})
```

### Common Methods

#### `data_get() -> table`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> table`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `EditForumTopicEntity` instance with the same client and
options.

#### `get_name() -> string`

Return the entity name.


---

## FileEntity

```lua
local file = client:File(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `file_id` | `string` | Yes |  |

### Operations

#### `create(reqdata, ctrl) -> any, err`

Create a new entity with the given data.

```lua
local result, err = client:File():create({
  file_id = --[[ string ]],
})
```

### Common Methods

#### `data_get() -> table`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> table`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `FileEntity` instance with the same client and
options.

#### `get_name() -> string`

Return the entity name.


---

## ForumTopicEntity

```lua
local forum_topic = client:ForumTopic(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `string` | Yes |  |
| `icon_color` | `number` | No |  |
| `icon_custom_emoji_id` | `string` | No |  |
| `name` | `string` | Yes |  |

### Operations

#### `create(reqdata, ctrl) -> any, err`

Create a new entity with the given data.

```lua
local result, err = client:ForumTopic():create({
  chat_id = --[[ string ]],
  name = --[[ string ]],
})
```

### Common Methods

#### `data_get() -> table`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> table`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `ForumTopicEntity` instance with the same client and
options.

#### `get_name() -> string`

Return the entity name.


---

## GetBusinessAccountGiftEntity

```lua
local get_business_account_gift = client:GetBusinessAccountGift(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `description` | `string` | No | Human-readable description of the result |
| `error_code` | `number` | No | Error code |
| `exclude_from_blockchain` | `boolean` | No |  |
| `exclude_limited_non_upgradable` | `boolean` | No |  |
| `exclude_limited_upgradable` | `boolean` | No |  |
| `ok` | `boolean` | Yes | If true, the request was successful |
| `parameters` | `table` | No |  |
| `result` | `table` | No | The result of the query |

### Operations

#### `create(reqdata, ctrl) -> any, err`

Create a new entity with the given data.

```lua
local result, err = client:GetBusinessAccountGift():create({
  ok = --[[ boolean ]],
})
```

### Common Methods

#### `data_get() -> table`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> table`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `GetBusinessAccountGiftEntity` instance with the same client and
options.

#### `get_name() -> string`

Return the entity name.


---

## GetChatGiftEntity

```lua
local get_chat_gift = client:GetChatGift(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `string` | Yes |  |
| `description` | `string` | No | Human-readable description of the result |
| `error_code` | `number` | No | Error code |
| `ok` | `boolean` | Yes | If true, the request was successful |
| `parameters` | `table` | No |  |
| `result` | `table` | No | The result of the query |

### Operations

#### `create(reqdata, ctrl) -> any, err`

Create a new entity with the given data.

```lua
local result, err = client:GetChatGift():create({
  chat_id = --[[ string ]],
  ok = --[[ boolean ]],
})
```

### Common Methods

#### `data_get() -> table`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> table`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `GetChatGiftEntity` instance with the same client and
options.

#### `get_name() -> string`

Return the entity name.


---

## GetMeEntity

```lua
local get_me = client:GetMe(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `description` | `string` | No | Human-readable description of the result |
| `error_code` | `number` | No | Error code |
| `ok` | `boolean` | Yes | If true, the request was successful |
| `parameters` | `table` | No |  |
| `result` | `table` | No | The result of the query |

### Operations

#### `create(reqdata, ctrl) -> any, err`

Create a new entity with the given data.

```lua
local result, err = client:GetMe():create({
  ok = --[[ boolean ]],
})
```

#### `load(reqmatch, ctrl) -> any, err`

Load a single entity matching the given criteria.

```lua
local result, err = client:GetMe():load()
```

### Common Methods

#### `data_get() -> table`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> table`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `GetMeEntity` instance with the same client and
options.

#### `get_name() -> string`

Return the entity name.


---

## GetUserGiftEntity

```lua
local get_user_gift = client:GetUserGift(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `description` | `string` | No | Human-readable description of the result |
| `error_code` | `number` | No | Error code |
| `ok` | `boolean` | Yes | If true, the request was successful |
| `parameters` | `table` | No |  |
| `result` | `table` | No | The result of the query |
| `user_id` | `number` | Yes |  |

### Operations

#### `create(reqdata, ctrl) -> any, err`

Create a new entity with the given data.

```lua
local result, err = client:GetUserGift():create({
  ok = --[[ boolean ]],
  user_id = --[[ number ]],
})
```

### Common Methods

#### `data_get() -> table`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> table`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `GetUserGiftEntity` instance with the same client and
options.

#### `get_name() -> string`

Return the entity name.


---

## GetUserProfileAudioEntity

```lua
local get_user_profile_audio = client:GetUserProfileAudio(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `description` | `string` | No | Human-readable description of the result |
| `error_code` | `number` | No | Error code |
| `ok` | `boolean` | Yes | If true, the request was successful |
| `parameters` | `table` | No |  |
| `result` | `table` | No | The result of the query |
| `user_id` | `number` | Yes |  |

### Operations

#### `create(reqdata, ctrl) -> any, err`

Create a new entity with the given data.

```lua
local result, err = client:GetUserProfileAudio():create({
  ok = --[[ boolean ]],
  user_id = --[[ number ]],
})
```

### Common Methods

#### `data_get() -> table`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> table`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `GetUserProfileAudioEntity` instance with the same client and
options.

#### `get_name() -> string`

Return the entity name.


---

## MessageEntity

```lua
local message = client:Message(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `string` | Yes | Unique identifier for the target chat or username |
| `direct_messages_topic_id` | `number` | No | Unique identifier for the target direct messages topic |
| `disable_notification` | `boolean` | No | Sends the message silently |
| `disable_web_page_preview` | `boolean` | No | Disables link previews for links in this message |
| `from_chat_id` | `string` | Yes |  |
| `latitude` | `number` | Yes |  |
| `longitude` | `number` | Yes |  |
| `message_effect_id` | `string` | No | Unique identifier of the message effect to be added to the message |
| `message_id` | `number` | Yes |  |
| `message_thread_id` | `number` | No | Unique identifier for the target message thread (topic) of the forum |
| `options` | `table` | Yes |  |
| `parse_mode` | `string` | No | Mode for parsing entities in the message text |
| `protect_content` | `boolean` | No | Protects the contents of the sent message from forwarding and saving |
| `question` | `string` | Yes |  |
| `reply_to_message_id` | `number` | No | If the message is a reply, ID of the original message |
| `text` | `string` | Yes | Text of the message to be sent |

### Operations

#### `create(reqdata, ctrl) -> any, err`

Create a new entity with the given data.

```lua
local result, err = client:Message():create({
  chat_id = --[[ string ]],
  from_chat_id = --[[ string ]],
  latitude = --[[ number ]],
  longitude = --[[ number ]],
  message_id = --[[ number ]],
  options = --[[ table ]],
  question = --[[ string ]],
  text = --[[ string ]],
})
```

### Common Methods

#### `data_get() -> table`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> table`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `MessageEntity` instance with the same client and
options.

#### `get_name() -> string`

Return the entity name.


---

## MessageIdEntity

```lua
local message_id = client:MessageId(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `string` | Yes |  |
| `direct_messages_topic_id` | `number` | No |  |
| `from_chat_id` | `string` | Yes |  |
| `message_effect_id` | `string` | No |  |
| `message_id` | `number` | Yes |  |
| `message_thread_id` | `number` | No |  |

### Operations

#### `create(reqdata, ctrl) -> any, err`

Create a new entity with the given data.

```lua
local result, err = client:MessageId():create({
  chat_id = --[[ string ]],
  from_chat_id = --[[ string ]],
  message_id = --[[ number ]],
})
```

### Common Methods

#### `data_get() -> table`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> table`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `MessageIdEntity` instance with the same client and
options.

#### `get_name() -> string`

Return the entity name.


---

## PromoteChatMemberEntity

```lua
local promote_chat_member = client:PromoteChatMember(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `can_delete_messages` | `boolean` | No |  |
| `can_edit_messages` | `boolean` | No |  |
| `can_manage_chat` | `boolean` | No |  |
| `can_manage_direct_messages` | `boolean` | No |  |
| `can_post_messages` | `boolean` | No |  |
| `chat_id` | `string` | Yes |  |
| `description` | `string` | No | Human-readable description of the result |
| `error_code` | `number` | No | Error code |
| `ok` | `boolean` | Yes | If true, the request was successful |
| `parameters` | `table` | No |  |
| `result` | `table` | No | The result of the query |
| `user_id` | `number` | Yes |  |

### Operations

#### `create(reqdata, ctrl) -> any, err`

Create a new entity with the given data.

```lua
local result, err = client:PromoteChatMember():create({
  chat_id = --[[ string ]],
  ok = --[[ boolean ]],
  user_id = --[[ number ]],
})
```

### Common Methods

#### `data_get() -> table`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> table`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `PromoteChatMemberEntity` instance with the same client and
options.

#### `get_name() -> string`

Return the entity name.


---

## RemoveMyProfilePhotoEntity

```lua
local remove_my_profile_photo = client:RemoveMyProfilePhoto(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `description` | `string` | No | Human-readable description of the result |
| `error_code` | `number` | No | Error code |
| `ok` | `boolean` | Yes | If true, the request was successful |
| `parameters` | `table` | No |  |
| `result` | `table` | No | The result of the query |

### Operations

#### `create(reqdata, ctrl) -> any, err`

Create a new entity with the given data.

```lua
local result, err = client:RemoveMyProfilePhoto():create({
  ok = --[[ boolean ]],
})
```

### Common Methods

#### `data_get() -> table`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> table`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `RemoveMyProfilePhotoEntity` instance with the same client and
options.

#### `get_name() -> string`

Return the entity name.


---

## RepostStoryEntity

```lua
local repost_story = client:RepostStory(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `string` | Yes |  |
| `description` | `string` | No | Human-readable description of the result |
| `error_code` | `number` | No | Error code |
| `ok` | `boolean` | Yes | If true, the request was successful |
| `parameters` | `table` | No |  |
| `result` | `table` | No | The result of the query |
| `story_id` | `number` | Yes |  |

### Operations

#### `create(reqdata, ctrl) -> any, err`

Create a new entity with the given data.

```lua
local result, err = client:RepostStory():create({
  chat_id = --[[ string ]],
  ok = --[[ boolean ]],
  story_id = --[[ number ]],
})
```

### Common Methods

#### `data_get() -> table`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> table`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `RepostStoryEntity` instance with the same client and
options.

#### `get_name() -> string`

Return the entity name.


---

## SendChatActionEntity

```lua
local send_chat_action = client:SendChatAction(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `action` | `string` | Yes |  |
| `chat_id` | `string` | Yes |  |
| `description` | `string` | No | Human-readable description of the result |
| `error_code` | `number` | No | Error code |
| `message_thread_id` | `number` | No |  |
| `ok` | `boolean` | Yes | If true, the request was successful |
| `parameters` | `table` | No |  |
| `result` | `table` | No | The result of the query |

### Operations

#### `create(reqdata, ctrl) -> any, err`

Create a new entity with the given data.

```lua
local result, err = client:SendChatAction():create({
  action = --[[ string ]],
  chat_id = --[[ string ]],
  ok = --[[ boolean ]],
})
```

### Common Methods

#### `data_get() -> table`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> table`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `SendChatActionEntity` instance with the same client and
options.

#### `get_name() -> string`

Return the entity name.


---

## SendMessageDraftEntity

```lua
local send_message_draft = client:SendMessageDraft(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `string` | Yes |  |
| `description` | `string` | No | Human-readable description of the result |
| `error_code` | `number` | No | Error code |
| `message_thread_id` | `number` | No |  |
| `ok` | `boolean` | Yes | If true, the request was successful |
| `parameters` | `table` | No |  |
| `result` | `table` | No | The result of the query |
| `text` | `string` | Yes |  |

### Operations

#### `create(reqdata, ctrl) -> any, err`

Create a new entity with the given data.

```lua
local result, err = client:SendMessageDraft():create({
  chat_id = --[[ string ]],
  ok = --[[ boolean ]],
  text = --[[ string ]],
})
```

### Common Methods

#### `data_get() -> table`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> table`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `SendMessageDraftEntity` instance with the same client and
options.

#### `get_name() -> string`

Return the entity name.


---

## SetMyProfilePhotoEntity

```lua
local set_my_profile_photo = client:SetMyProfilePhoto(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `description` | `string` | No | Human-readable description of the result |
| `error_code` | `number` | No | Error code |
| `ok` | `boolean` | Yes | If true, the request was successful |
| `parameters` | `table` | No |  |
| `result` | `table` | No | The result of the query |

### Operations

#### `create(reqdata, ctrl) -> any, err`

Create a new entity with the given data.

```lua
local result, err = client:SetMyProfilePhoto():create({
  ok = --[[ boolean ]],
})
```

### Common Methods

#### `data_get() -> table`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> table`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `SetMyProfilePhotoEntity` instance with the same client and
options.

#### `get_name() -> string`

Return the entity name.


---

## UnpinAllForumTopicMessageEntity

```lua
local unpin_all_forum_topic_message = client:UnpinAllForumTopicMessage(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `string` | Yes |  |
| `description` | `string` | No | Human-readable description of the result |
| `error_code` | `number` | No | Error code |
| `message_thread_id` | `number` | Yes |  |
| `ok` | `boolean` | Yes | If true, the request was successful |
| `parameters` | `table` | No |  |
| `result` | `table` | No | The result of the query |

### Operations

#### `create(reqdata, ctrl) -> any, err`

Create a new entity with the given data.

```lua
local result, err = client:UnpinAllForumTopicMessage():create({
  chat_id = --[[ string ]],
  message_thread_id = --[[ number ]],
  ok = --[[ boolean ]],
})
```

### Common Methods

#### `data_get() -> table`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> table`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `UnpinAllForumTopicMessageEntity` instance with the same client and
options.

#### `get_name() -> string`

Return the entity name.


---

## UpdateEntity

```lua
local update = client:Update(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `allowed_updates` | `table` | No |  |
| `description` | `string` | No | Human-readable description of the result |
| `error_code` | `number` | No | Error code |
| `limit` | `number` | No |  |
| `offset` | `number` | No |  |
| `ok` | `boolean` | Yes | If true, the request was successful |
| `parameters` | `table` | No |  |
| `result` | `table` | No | The result of the query |
| `timeout` | `number` | No |  |

### Operations

#### `create(reqdata, ctrl) -> any, err`

Create a new entity with the given data.

```lua
local result, err = client:Update():create({
  ok = --[[ boolean ]],
})
```

#### `list(reqmatch, ctrl) -> any, err`

List entities matching the given criteria. Returns an array.

```lua
local results, err = client:Update():list()
```

### Common Methods

#### `data_get() -> table`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get() -> table`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make() -> Entity`

Create a new `UpdateEntity` instance with the same client and
options.

#### `get_name() -> string`

Return the entity name.


---

## Features

| Feature | Version | Description |
| --- | --- | --- |
| `test` | 0.0.1 | In-memory mock transport for testing without a live server |


Features are activated via the `feature` option:

```lua
local client = sdk.new({
  feature = {
    test = { active = true },
  },
})
```


### Configuring features

Each feature is inactive until switched on, and an SDK with no feature
configured does no feature work at all. Every option below keeps its default
unless you name it.

The array form of \`feature\` is significant: several features wrap the
transport, and the order you list them in is the order they nest.

#### `test`

In-memory mock transport for testing without a live server.

**Configuration**

| Option | Default |
|---|---|
| `active` | `false` |

Options above are those the model carries a default for. A feature may
also accept callback options — a `sink` to receive each record, for
instance — which have no default and are covered in the full feature
reference.

**Usage**

Set `feature.test.active` to true in the client options, and override any option above in the same entry. Every option keeps
its default unless you name it.

**Considerations**

- Attaches to pipeline hooks, not the transport, so activation order does
  not change what it observes.
- Installs the BASE transport that the wrapping features wrap, so it must be
  activated before them.
- Inactive by default: leaving it out costs nothing at runtime.

