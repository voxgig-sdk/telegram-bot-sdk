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
local approve_suggested_post = client:approve_suggested_post(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | ``$STRING`` | Yes |  |
| `description` | ``$STRING`` | No |  |
| `error_code` | ``$INTEGER`` | No |  |
| `message_id` | ``$INTEGER`` | Yes |  |
| `ok` | ``$BOOLEAN`` | Yes |  |
| `parameter` | ``$OBJECT`` | No |  |
| `result` | ``$ANY`` | No |  |

### Operations

#### `create(reqdata, ctrl) -> any, err`

Create a new entity with the given data.

```lua
local result, err = client:approve_suggested_post():create({
  chat_id = --[[ `$STRING` ]],
  message_id = --[[ `$INTEGER` ]],
  ok = --[[ `$BOOLEAN` ]],
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
local decline_suggested_post = client:decline_suggested_post(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | ``$STRING`` | Yes |  |
| `description` | ``$STRING`` | No |  |
| `error_code` | ``$INTEGER`` | No |  |
| `message_id` | ``$INTEGER`` | Yes |  |
| `ok` | ``$BOOLEAN`` | Yes |  |
| `parameter` | ``$OBJECT`` | No |  |
| `result` | ``$ANY`` | No |  |

### Operations

#### `create(reqdata, ctrl) -> any, err`

Create a new entity with the given data.

```lua
local result, err = client:decline_suggested_post():create({
  chat_id = --[[ `$STRING` ]],
  message_id = --[[ `$INTEGER` ]],
  ok = --[[ `$BOOLEAN` ]],
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
local delete_forum_topic = client:delete_forum_topic(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | ``$STRING`` | Yes |  |
| `description` | ``$STRING`` | No |  |
| `error_code` | ``$INTEGER`` | No |  |
| `message_thread_id` | ``$INTEGER`` | Yes |  |
| `ok` | ``$BOOLEAN`` | Yes |  |
| `parameter` | ``$OBJECT`` | No |  |
| `result` | ``$ANY`` | No |  |

### Operations

#### `create(reqdata, ctrl) -> any, err`

Create a new entity with the given data.

```lua
local result, err = client:delete_forum_topic():create({
  chat_id = --[[ `$STRING` ]],
  message_thread_id = --[[ `$INTEGER` ]],
  ok = --[[ `$BOOLEAN` ]],
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
local edit_forum_topic = client:edit_forum_topic(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | ``$STRING`` | Yes |  |
| `description` | ``$STRING`` | No |  |
| `error_code` | ``$INTEGER`` | No |  |
| `icon_custom_emoji_id` | ``$STRING`` | No |  |
| `message_thread_id` | ``$INTEGER`` | Yes |  |
| `name` | ``$STRING`` | No |  |
| `ok` | ``$BOOLEAN`` | Yes |  |
| `parameter` | ``$OBJECT`` | No |  |
| `result` | ``$ANY`` | No |  |

### Operations

#### `create(reqdata, ctrl) -> any, err`

Create a new entity with the given data.

```lua
local result, err = client:edit_forum_topic():create({
  chat_id = --[[ `$STRING` ]],
  message_thread_id = --[[ `$INTEGER` ]],
  ok = --[[ `$BOOLEAN` ]],
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
local file = client:file(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `file_id` | ``$STRING`` | Yes |  |

### Operations

#### `create(reqdata, ctrl) -> any, err`

Create a new entity with the given data.

```lua
local result, err = client:file():create({
  file_id = --[[ `$STRING` ]],
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
local forum_topic = client:forum_topic(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | ``$STRING`` | Yes |  |
| `icon_color` | ``$INTEGER`` | No |  |
| `icon_custom_emoji_id` | ``$STRING`` | No |  |
| `name` | ``$STRING`` | Yes |  |

### Operations

#### `create(reqdata, ctrl) -> any, err`

Create a new entity with the given data.

```lua
local result, err = client:forum_topic():create({
  chat_id = --[[ `$STRING` ]],
  name = --[[ `$STRING` ]],
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
local get_business_account_gift = client:get_business_account_gift(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `description` | ``$STRING`` | No |  |
| `error_code` | ``$INTEGER`` | No |  |
| `exclude_from_blockchain` | ``$BOOLEAN`` | No |  |
| `exclude_limited_non_upgradable` | ``$BOOLEAN`` | No |  |
| `exclude_limited_upgradable` | ``$BOOLEAN`` | No |  |
| `ok` | ``$BOOLEAN`` | Yes |  |
| `parameter` | ``$OBJECT`` | No |  |
| `result` | ``$ANY`` | No |  |

### Operations

#### `create(reqdata, ctrl) -> any, err`

Create a new entity with the given data.

```lua
local result, err = client:get_business_account_gift():create({
  ok = --[[ `$BOOLEAN` ]],
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
local get_chat_gift = client:get_chat_gift(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | ``$STRING`` | Yes |  |
| `description` | ``$STRING`` | No |  |
| `error_code` | ``$INTEGER`` | No |  |
| `ok` | ``$BOOLEAN`` | Yes |  |
| `parameter` | ``$OBJECT`` | No |  |
| `result` | ``$ANY`` | No |  |

### Operations

#### `create(reqdata, ctrl) -> any, err`

Create a new entity with the given data.

```lua
local result, err = client:get_chat_gift():create({
  chat_id = --[[ `$STRING` ]],
  ok = --[[ `$BOOLEAN` ]],
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
local get_me = client:get_me(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `description` | ``$STRING`` | No |  |
| `error_code` | ``$INTEGER`` | No |  |
| `ok` | ``$BOOLEAN`` | Yes |  |
| `parameter` | ``$OBJECT`` | No |  |
| `result` | ``$ANY`` | No |  |

### Operations

#### `create(reqdata, ctrl) -> any, err`

Create a new entity with the given data.

```lua
local result, err = client:get_me():create({
  ok = --[[ `$BOOLEAN` ]],
})
```

#### `load(reqmatch, ctrl) -> any, err`

Load a single entity matching the given criteria.

```lua
local result, err = client:get_me():load({ id = "get_me_id" })
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
local get_user_gift = client:get_user_gift(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `description` | ``$STRING`` | No |  |
| `error_code` | ``$INTEGER`` | No |  |
| `ok` | ``$BOOLEAN`` | Yes |  |
| `parameter` | ``$OBJECT`` | No |  |
| `result` | ``$ANY`` | No |  |
| `user_id` | ``$INTEGER`` | Yes |  |

### Operations

#### `create(reqdata, ctrl) -> any, err`

Create a new entity with the given data.

```lua
local result, err = client:get_user_gift():create({
  ok = --[[ `$BOOLEAN` ]],
  user_id = --[[ `$INTEGER` ]],
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
local get_user_profile_audio = client:get_user_profile_audio(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `description` | ``$STRING`` | No |  |
| `error_code` | ``$INTEGER`` | No |  |
| `ok` | ``$BOOLEAN`` | Yes |  |
| `parameter` | ``$OBJECT`` | No |  |
| `result` | ``$ANY`` | No |  |
| `user_id` | ``$INTEGER`` | Yes |  |

### Operations

#### `create(reqdata, ctrl) -> any, err`

Create a new entity with the given data.

```lua
local result, err = client:get_user_profile_audio():create({
  ok = --[[ `$BOOLEAN` ]],
  user_id = --[[ `$INTEGER` ]],
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
local message = client:message(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | ``$STRING`` | Yes |  |
| `direct_messages_topic_id` | ``$INTEGER`` | No |  |
| `disable_notification` | ``$BOOLEAN`` | No |  |
| `disable_web_page_preview` | ``$BOOLEAN`` | No |  |
| `from_chat_id` | ``$STRING`` | Yes |  |
| `latitude` | ``$NUMBER`` | Yes |  |
| `longitude` | ``$NUMBER`` | Yes |  |
| `message_effect_id` | ``$STRING`` | No |  |
| `message_id` | ``$INTEGER`` | Yes |  |
| `message_thread_id` | ``$INTEGER`` | No |  |
| `option` | ``$ARRAY`` | Yes |  |
| `parse_mode` | ``$STRING`` | No |  |
| `protect_content` | ``$BOOLEAN`` | No |  |
| `question` | ``$STRING`` | Yes |  |
| `reply_to_message_id` | ``$INTEGER`` | No |  |
| `text` | ``$STRING`` | Yes |  |

### Operations

#### `create(reqdata, ctrl) -> any, err`

Create a new entity with the given data.

```lua
local result, err = client:message():create({
  chat_id = --[[ `$STRING` ]],
  from_chat_id = --[[ `$STRING` ]],
  latitude = --[[ `$NUMBER` ]],
  longitude = --[[ `$NUMBER` ]],
  message_id = --[[ `$INTEGER` ]],
  option = --[[ `$ARRAY` ]],
  question = --[[ `$STRING` ]],
  text = --[[ `$STRING` ]],
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
local message_id = client:message_id(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | ``$STRING`` | Yes |  |
| `direct_messages_topic_id` | ``$INTEGER`` | No |  |
| `from_chat_id` | ``$STRING`` | Yes |  |
| `message_effect_id` | ``$STRING`` | No |  |
| `message_id` | ``$INTEGER`` | Yes |  |
| `message_thread_id` | ``$INTEGER`` | No |  |

### Operations

#### `create(reqdata, ctrl) -> any, err`

Create a new entity with the given data.

```lua
local result, err = client:message_id():create({
  chat_id = --[[ `$STRING` ]],
  from_chat_id = --[[ `$STRING` ]],
  message_id = --[[ `$INTEGER` ]],
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
local promote_chat_member = client:promote_chat_member(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `can_delete_message` | ``$BOOLEAN`` | No |  |
| `can_edit_message` | ``$BOOLEAN`` | No |  |
| `can_manage_chat` | ``$BOOLEAN`` | No |  |
| `can_manage_direct_message` | ``$BOOLEAN`` | No |  |
| `can_post_message` | ``$BOOLEAN`` | No |  |
| `chat_id` | ``$STRING`` | Yes |  |
| `description` | ``$STRING`` | No |  |
| `error_code` | ``$INTEGER`` | No |  |
| `ok` | ``$BOOLEAN`` | Yes |  |
| `parameter` | ``$OBJECT`` | No |  |
| `result` | ``$ANY`` | No |  |
| `user_id` | ``$INTEGER`` | Yes |  |

### Operations

#### `create(reqdata, ctrl) -> any, err`

Create a new entity with the given data.

```lua
local result, err = client:promote_chat_member():create({
  chat_id = --[[ `$STRING` ]],
  ok = --[[ `$BOOLEAN` ]],
  user_id = --[[ `$INTEGER` ]],
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
local remove_my_profile_photo = client:remove_my_profile_photo(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `description` | ``$STRING`` | No |  |
| `error_code` | ``$INTEGER`` | No |  |
| `ok` | ``$BOOLEAN`` | Yes |  |
| `parameter` | ``$OBJECT`` | No |  |
| `result` | ``$ANY`` | No |  |

### Operations

#### `create(reqdata, ctrl) -> any, err`

Create a new entity with the given data.

```lua
local result, err = client:remove_my_profile_photo():create({
  ok = --[[ `$BOOLEAN` ]],
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
local repost_story = client:repost_story(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | ``$STRING`` | Yes |  |
| `description` | ``$STRING`` | No |  |
| `error_code` | ``$INTEGER`` | No |  |
| `ok` | ``$BOOLEAN`` | Yes |  |
| `parameter` | ``$OBJECT`` | No |  |
| `result` | ``$ANY`` | No |  |
| `story_id` | ``$INTEGER`` | Yes |  |

### Operations

#### `create(reqdata, ctrl) -> any, err`

Create a new entity with the given data.

```lua
local result, err = client:repost_story():create({
  chat_id = --[[ `$STRING` ]],
  ok = --[[ `$BOOLEAN` ]],
  story_id = --[[ `$INTEGER` ]],
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
local send_chat_action = client:send_chat_action(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `action` | ``$STRING`` | Yes |  |
| `chat_id` | ``$STRING`` | Yes |  |
| `description` | ``$STRING`` | No |  |
| `error_code` | ``$INTEGER`` | No |  |
| `message_thread_id` | ``$INTEGER`` | No |  |
| `ok` | ``$BOOLEAN`` | Yes |  |
| `parameter` | ``$OBJECT`` | No |  |
| `result` | ``$ANY`` | No |  |

### Operations

#### `create(reqdata, ctrl) -> any, err`

Create a new entity with the given data.

```lua
local result, err = client:send_chat_action():create({
  action = --[[ `$STRING` ]],
  chat_id = --[[ `$STRING` ]],
  ok = --[[ `$BOOLEAN` ]],
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
local send_message_draft = client:send_message_draft(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | ``$STRING`` | Yes |  |
| `description` | ``$STRING`` | No |  |
| `error_code` | ``$INTEGER`` | No |  |
| `message_thread_id` | ``$INTEGER`` | No |  |
| `ok` | ``$BOOLEAN`` | Yes |  |
| `parameter` | ``$OBJECT`` | No |  |
| `result` | ``$ANY`` | No |  |
| `text` | ``$STRING`` | Yes |  |

### Operations

#### `create(reqdata, ctrl) -> any, err`

Create a new entity with the given data.

```lua
local result, err = client:send_message_draft():create({
  chat_id = --[[ `$STRING` ]],
  ok = --[[ `$BOOLEAN` ]],
  text = --[[ `$STRING` ]],
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
local set_my_profile_photo = client:set_my_profile_photo(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `description` | ``$STRING`` | No |  |
| `error_code` | ``$INTEGER`` | No |  |
| `ok` | ``$BOOLEAN`` | Yes |  |
| `parameter` | ``$OBJECT`` | No |  |
| `result` | ``$ANY`` | No |  |

### Operations

#### `create(reqdata, ctrl) -> any, err`

Create a new entity with the given data.

```lua
local result, err = client:set_my_profile_photo():create({
  ok = --[[ `$BOOLEAN` ]],
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
local unpin_all_forum_topic_message = client:unpin_all_forum_topic_message(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | ``$STRING`` | Yes |  |
| `description` | ``$STRING`` | No |  |
| `error_code` | ``$INTEGER`` | No |  |
| `message_thread_id` | ``$INTEGER`` | Yes |  |
| `ok` | ``$BOOLEAN`` | Yes |  |
| `parameter` | ``$OBJECT`` | No |  |
| `result` | ``$ANY`` | No |  |

### Operations

#### `create(reqdata, ctrl) -> any, err`

Create a new entity with the given data.

```lua
local result, err = client:unpin_all_forum_topic_message():create({
  chat_id = --[[ `$STRING` ]],
  message_thread_id = --[[ `$INTEGER` ]],
  ok = --[[ `$BOOLEAN` ]],
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
local update = client:update(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `allowed_update` | ``$ARRAY`` | No |  |
| `description` | ``$STRING`` | No |  |
| `error_code` | ``$INTEGER`` | No |  |
| `limit` | ``$INTEGER`` | No |  |
| `offset` | ``$INTEGER`` | No |  |
| `ok` | ``$BOOLEAN`` | Yes |  |
| `parameter` | ``$OBJECT`` | No |  |
| `result` | ``$ARRAY`` | No |  |
| `timeout` | ``$INTEGER`` | No |  |

### Operations

#### `create(reqdata, ctrl) -> any, err`

Create a new entity with the given data.

```lua
local result, err = client:update():create({
  ok = --[[ `$BOOLEAN` ]],
})
```

#### `list(reqmatch, ctrl) -> any, err`

List entities matching the given criteria. Returns an array.

```lua
local results, err = client:update():list()
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

