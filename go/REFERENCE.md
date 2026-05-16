# TelegramBot Golang SDK Reference

Complete API reference for the TelegramBot Golang SDK.


## TelegramBotSDK

### Constructor

```go
func NewTelegramBotSDK(options map[string]any) *TelegramBotSDK
```

Create a new SDK client instance.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `options` | `map[string]any` | SDK configuration options. |
| `options["apikey"]` | `string` | API key for authentication. |
| `options["base"]` | `string` | Base URL for API requests. |
| `options["prefix"]` | `string` | URL prefix appended after base. |
| `options["suffix"]` | `string` | URL suffix appended after path. |
| `options["headers"]` | `map[string]any` | Custom headers for all requests. |
| `options["feature"]` | `map[string]any` | Feature configuration. |
| `options["system"]` | `map[string]any` | System overrides (e.g. custom fetch). |


### Static Methods

#### `TestSDK(testopts, sdkopts map[string]any) *TelegramBotSDK`

Create a test client with mock features active. Both arguments may be `nil`.

```go
client := sdk.TestSDK(nil, nil)
```


### Instance Methods

#### `ApproveSuggestedPost(data map[string]any) TelegramBotEntity`

Create a new `ApproveSuggestedPost` entity instance. Pass `nil` for no initial data.

#### `DeclineSuggestedPost(data map[string]any) TelegramBotEntity`

Create a new `DeclineSuggestedPost` entity instance. Pass `nil` for no initial data.

#### `DeleteForumTopic(data map[string]any) TelegramBotEntity`

Create a new `DeleteForumTopic` entity instance. Pass `nil` for no initial data.

#### `EditForumTopic(data map[string]any) TelegramBotEntity`

Create a new `EditForumTopic` entity instance. Pass `nil` for no initial data.

#### `File(data map[string]any) TelegramBotEntity`

Create a new `File` entity instance. Pass `nil` for no initial data.

#### `ForumTopic(data map[string]any) TelegramBotEntity`

Create a new `ForumTopic` entity instance. Pass `nil` for no initial data.

#### `GetBusinessAccountGift(data map[string]any) TelegramBotEntity`

Create a new `GetBusinessAccountGift` entity instance. Pass `nil` for no initial data.

#### `GetChatGift(data map[string]any) TelegramBotEntity`

Create a new `GetChatGift` entity instance. Pass `nil` for no initial data.

#### `GetMe(data map[string]any) TelegramBotEntity`

Create a new `GetMe` entity instance. Pass `nil` for no initial data.

#### `GetUserGift(data map[string]any) TelegramBotEntity`

Create a new `GetUserGift` entity instance. Pass `nil` for no initial data.

#### `GetUserProfileAudio(data map[string]any) TelegramBotEntity`

Create a new `GetUserProfileAudio` entity instance. Pass `nil` for no initial data.

#### `Message(data map[string]any) TelegramBotEntity`

Create a new `Message` entity instance. Pass `nil` for no initial data.

#### `MessageId(data map[string]any) TelegramBotEntity`

Create a new `MessageId` entity instance. Pass `nil` for no initial data.

#### `PromoteChatMember(data map[string]any) TelegramBotEntity`

Create a new `PromoteChatMember` entity instance. Pass `nil` for no initial data.

#### `RemoveMyProfilePhoto(data map[string]any) TelegramBotEntity`

Create a new `RemoveMyProfilePhoto` entity instance. Pass `nil` for no initial data.

#### `RepostStory(data map[string]any) TelegramBotEntity`

Create a new `RepostStory` entity instance. Pass `nil` for no initial data.

#### `SendChatAction(data map[string]any) TelegramBotEntity`

Create a new `SendChatAction` entity instance. Pass `nil` for no initial data.

#### `SendMessageDraft(data map[string]any) TelegramBotEntity`

Create a new `SendMessageDraft` entity instance. Pass `nil` for no initial data.

#### `SetMyProfilePhoto(data map[string]any) TelegramBotEntity`

Create a new `SetMyProfilePhoto` entity instance. Pass `nil` for no initial data.

#### `UnpinAllForumTopicMessage(data map[string]any) TelegramBotEntity`

Create a new `UnpinAllForumTopicMessage` entity instance. Pass `nil` for no initial data.

#### `Update(data map[string]any) TelegramBotEntity`

Create a new `Update` entity instance. Pass `nil` for no initial data.

#### `OptionsMap() map[string]any`

Return a deep copy of the current SDK options.

#### `GetUtility() *Utility`

Return a copy of the SDK utility object.

#### `Direct(fetchargs map[string]any) (map[string]any, error)`

Make a direct HTTP request to any API endpoint.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `fetchargs["path"]` | `string` | URL path with optional `{param}` placeholders. |
| `fetchargs["method"]` | `string` | HTTP method (default: `"GET"`). |
| `fetchargs["params"]` | `map[string]any` | Path parameter values for `{param}` substitution. |
| `fetchargs["query"]` | `map[string]any` | Query string parameters. |
| `fetchargs["headers"]` | `map[string]any` | Request headers (merged with defaults). |
| `fetchargs["body"]` | `any` | Request body (maps are JSON-serialized). |
| `fetchargs["ctrl"]` | `map[string]any` | Control options (e.g. `map[string]any{"explain": true}`). |

**Returns:** `(map[string]any, error)`

#### `Prepare(fetchargs map[string]any) (map[string]any, error)`

Prepare a fetch definition without sending the request. Accepts the
same parameters as `Direct()`.

**Returns:** `(map[string]any, error)`


---

## ApproveSuggestedPostEntity

```go
approve_suggested_post := client.ApproveSuggestedPost(nil)
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

#### `Create(reqdata, ctrl map[string]any) (any, error)`

Create a new entity with the given data.

```go
result, err := client.ApproveSuggestedPost(nil).Create(map[string]any{
    "chat_id": /* `$STRING` */,
    "message_id": /* `$INTEGER` */,
    "ok": /* `$BOOLEAN` */,
}, nil)
```

### Common Methods

#### `Data(args ...any) any`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `Match(args ...any) any`

Get or set the entity match criteria. Works the same as `Data()`.

#### `Make() Entity`

Create a new `ApproveSuggestedPostEntity` instance with the same client and
options.

#### `GetName() string`

Return the entity name.


---

## DeclineSuggestedPostEntity

```go
decline_suggested_post := client.DeclineSuggestedPost(nil)
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

#### `Create(reqdata, ctrl map[string]any) (any, error)`

Create a new entity with the given data.

```go
result, err := client.DeclineSuggestedPost(nil).Create(map[string]any{
    "chat_id": /* `$STRING` */,
    "message_id": /* `$INTEGER` */,
    "ok": /* `$BOOLEAN` */,
}, nil)
```

### Common Methods

#### `Data(args ...any) any`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `Match(args ...any) any`

Get or set the entity match criteria. Works the same as `Data()`.

#### `Make() Entity`

Create a new `DeclineSuggestedPostEntity` instance with the same client and
options.

#### `GetName() string`

Return the entity name.


---

## DeleteForumTopicEntity

```go
delete_forum_topic := client.DeleteForumTopic(nil)
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

#### `Create(reqdata, ctrl map[string]any) (any, error)`

Create a new entity with the given data.

```go
result, err := client.DeleteForumTopic(nil).Create(map[string]any{
    "chat_id": /* `$STRING` */,
    "message_thread_id": /* `$INTEGER` */,
    "ok": /* `$BOOLEAN` */,
}, nil)
```

### Common Methods

#### `Data(args ...any) any`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `Match(args ...any) any`

Get or set the entity match criteria. Works the same as `Data()`.

#### `Make() Entity`

Create a new `DeleteForumTopicEntity` instance with the same client and
options.

#### `GetName() string`

Return the entity name.


---

## EditForumTopicEntity

```go
edit_forum_topic := client.EditForumTopic(nil)
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

#### `Create(reqdata, ctrl map[string]any) (any, error)`

Create a new entity with the given data.

```go
result, err := client.EditForumTopic(nil).Create(map[string]any{
    "chat_id": /* `$STRING` */,
    "message_thread_id": /* `$INTEGER` */,
    "ok": /* `$BOOLEAN` */,
}, nil)
```

### Common Methods

#### `Data(args ...any) any`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `Match(args ...any) any`

Get or set the entity match criteria. Works the same as `Data()`.

#### `Make() Entity`

Create a new `EditForumTopicEntity` instance with the same client and
options.

#### `GetName() string`

Return the entity name.


---

## FileEntity

```go
file := client.File(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `file_id` | ``$STRING`` | Yes |  |

### Operations

#### `Create(reqdata, ctrl map[string]any) (any, error)`

Create a new entity with the given data.

```go
result, err := client.File(nil).Create(map[string]any{
    "file_id": /* `$STRING` */,
}, nil)
```

### Common Methods

#### `Data(args ...any) any`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `Match(args ...any) any`

Get or set the entity match criteria. Works the same as `Data()`.

#### `Make() Entity`

Create a new `FileEntity` instance with the same client and
options.

#### `GetName() string`

Return the entity name.


---

## ForumTopicEntity

```go
forum_topic := client.ForumTopic(nil)
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | ``$STRING`` | Yes |  |
| `icon_color` | ``$INTEGER`` | No |  |
| `icon_custom_emoji_id` | ``$STRING`` | No |  |
| `name` | ``$STRING`` | Yes |  |

### Operations

#### `Create(reqdata, ctrl map[string]any) (any, error)`

Create a new entity with the given data.

```go
result, err := client.ForumTopic(nil).Create(map[string]any{
    "chat_id": /* `$STRING` */,
    "name": /* `$STRING` */,
}, nil)
```

### Common Methods

#### `Data(args ...any) any`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `Match(args ...any) any`

Get or set the entity match criteria. Works the same as `Data()`.

#### `Make() Entity`

Create a new `ForumTopicEntity` instance with the same client and
options.

#### `GetName() string`

Return the entity name.


---

## GetBusinessAccountGiftEntity

```go
get_business_account_gift := client.GetBusinessAccountGift(nil)
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

#### `Create(reqdata, ctrl map[string]any) (any, error)`

Create a new entity with the given data.

```go
result, err := client.GetBusinessAccountGift(nil).Create(map[string]any{
    "ok": /* `$BOOLEAN` */,
}, nil)
```

### Common Methods

#### `Data(args ...any) any`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `Match(args ...any) any`

Get or set the entity match criteria. Works the same as `Data()`.

#### `Make() Entity`

Create a new `GetBusinessAccountGiftEntity` instance with the same client and
options.

#### `GetName() string`

Return the entity name.


---

## GetChatGiftEntity

```go
get_chat_gift := client.GetChatGift(nil)
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

#### `Create(reqdata, ctrl map[string]any) (any, error)`

Create a new entity with the given data.

```go
result, err := client.GetChatGift(nil).Create(map[string]any{
    "chat_id": /* `$STRING` */,
    "ok": /* `$BOOLEAN` */,
}, nil)
```

### Common Methods

#### `Data(args ...any) any`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `Match(args ...any) any`

Get or set the entity match criteria. Works the same as `Data()`.

#### `Make() Entity`

Create a new `GetChatGiftEntity` instance with the same client and
options.

#### `GetName() string`

Return the entity name.


---

## GetMeEntity

```go
get_me := client.GetMe(nil)
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

#### `Create(reqdata, ctrl map[string]any) (any, error)`

Create a new entity with the given data.

```go
result, err := client.GetMe(nil).Create(map[string]any{
    "ok": /* `$BOOLEAN` */,
}, nil)
```

#### `Load(reqmatch, ctrl map[string]any) (any, error)`

Load a single entity matching the given criteria.

```go
result, err := client.GetMe(nil).Load(map[string]any{"id": "get_me_id"}, nil)
```

### Common Methods

#### `Data(args ...any) any`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `Match(args ...any) any`

Get or set the entity match criteria. Works the same as `Data()`.

#### `Make() Entity`

Create a new `GetMeEntity` instance with the same client and
options.

#### `GetName() string`

Return the entity name.


---

## GetUserGiftEntity

```go
get_user_gift := client.GetUserGift(nil)
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

#### `Create(reqdata, ctrl map[string]any) (any, error)`

Create a new entity with the given data.

```go
result, err := client.GetUserGift(nil).Create(map[string]any{
    "ok": /* `$BOOLEAN` */,
    "user_id": /* `$INTEGER` */,
}, nil)
```

### Common Methods

#### `Data(args ...any) any`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `Match(args ...any) any`

Get or set the entity match criteria. Works the same as `Data()`.

#### `Make() Entity`

Create a new `GetUserGiftEntity` instance with the same client and
options.

#### `GetName() string`

Return the entity name.


---

## GetUserProfileAudioEntity

```go
get_user_profile_audio := client.GetUserProfileAudio(nil)
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

#### `Create(reqdata, ctrl map[string]any) (any, error)`

Create a new entity with the given data.

```go
result, err := client.GetUserProfileAudio(nil).Create(map[string]any{
    "ok": /* `$BOOLEAN` */,
    "user_id": /* `$INTEGER` */,
}, nil)
```

### Common Methods

#### `Data(args ...any) any`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `Match(args ...any) any`

Get or set the entity match criteria. Works the same as `Data()`.

#### `Make() Entity`

Create a new `GetUserProfileAudioEntity` instance with the same client and
options.

#### `GetName() string`

Return the entity name.


---

## MessageEntity

```go
message := client.Message(nil)
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

#### `Create(reqdata, ctrl map[string]any) (any, error)`

Create a new entity with the given data.

```go
result, err := client.Message(nil).Create(map[string]any{
    "chat_id": /* `$STRING` */,
    "from_chat_id": /* `$STRING` */,
    "latitude": /* `$NUMBER` */,
    "longitude": /* `$NUMBER` */,
    "message_id": /* `$INTEGER` */,
    "option": /* `$ARRAY` */,
    "question": /* `$STRING` */,
    "text": /* `$STRING` */,
}, nil)
```

### Common Methods

#### `Data(args ...any) any`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `Match(args ...any) any`

Get or set the entity match criteria. Works the same as `Data()`.

#### `Make() Entity`

Create a new `MessageEntity` instance with the same client and
options.

#### `GetName() string`

Return the entity name.


---

## MessageIdEntity

```go
message_id := client.MessageId(nil)
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

#### `Create(reqdata, ctrl map[string]any) (any, error)`

Create a new entity with the given data.

```go
result, err := client.MessageId(nil).Create(map[string]any{
    "chat_id": /* `$STRING` */,
    "from_chat_id": /* `$STRING` */,
    "message_id": /* `$INTEGER` */,
}, nil)
```

### Common Methods

#### `Data(args ...any) any`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `Match(args ...any) any`

Get or set the entity match criteria. Works the same as `Data()`.

#### `Make() Entity`

Create a new `MessageIdEntity` instance with the same client and
options.

#### `GetName() string`

Return the entity name.


---

## PromoteChatMemberEntity

```go
promote_chat_member := client.PromoteChatMember(nil)
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

#### `Create(reqdata, ctrl map[string]any) (any, error)`

Create a new entity with the given data.

```go
result, err := client.PromoteChatMember(nil).Create(map[string]any{
    "chat_id": /* `$STRING` */,
    "ok": /* `$BOOLEAN` */,
    "user_id": /* `$INTEGER` */,
}, nil)
```

### Common Methods

#### `Data(args ...any) any`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `Match(args ...any) any`

Get or set the entity match criteria. Works the same as `Data()`.

#### `Make() Entity`

Create a new `PromoteChatMemberEntity` instance with the same client and
options.

#### `GetName() string`

Return the entity name.


---

## RemoveMyProfilePhotoEntity

```go
remove_my_profile_photo := client.RemoveMyProfilePhoto(nil)
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

#### `Create(reqdata, ctrl map[string]any) (any, error)`

Create a new entity with the given data.

```go
result, err := client.RemoveMyProfilePhoto(nil).Create(map[string]any{
    "ok": /* `$BOOLEAN` */,
}, nil)
```

### Common Methods

#### `Data(args ...any) any`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `Match(args ...any) any`

Get or set the entity match criteria. Works the same as `Data()`.

#### `Make() Entity`

Create a new `RemoveMyProfilePhotoEntity` instance with the same client and
options.

#### `GetName() string`

Return the entity name.


---

## RepostStoryEntity

```go
repost_story := client.RepostStory(nil)
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

#### `Create(reqdata, ctrl map[string]any) (any, error)`

Create a new entity with the given data.

```go
result, err := client.RepostStory(nil).Create(map[string]any{
    "chat_id": /* `$STRING` */,
    "ok": /* `$BOOLEAN` */,
    "story_id": /* `$INTEGER` */,
}, nil)
```

### Common Methods

#### `Data(args ...any) any`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `Match(args ...any) any`

Get or set the entity match criteria. Works the same as `Data()`.

#### `Make() Entity`

Create a new `RepostStoryEntity` instance with the same client and
options.

#### `GetName() string`

Return the entity name.


---

## SendChatActionEntity

```go
send_chat_action := client.SendChatAction(nil)
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

#### `Create(reqdata, ctrl map[string]any) (any, error)`

Create a new entity with the given data.

```go
result, err := client.SendChatAction(nil).Create(map[string]any{
    "action": /* `$STRING` */,
    "chat_id": /* `$STRING` */,
    "ok": /* `$BOOLEAN` */,
}, nil)
```

### Common Methods

#### `Data(args ...any) any`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `Match(args ...any) any`

Get or set the entity match criteria. Works the same as `Data()`.

#### `Make() Entity`

Create a new `SendChatActionEntity` instance with the same client and
options.

#### `GetName() string`

Return the entity name.


---

## SendMessageDraftEntity

```go
send_message_draft := client.SendMessageDraft(nil)
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

#### `Create(reqdata, ctrl map[string]any) (any, error)`

Create a new entity with the given data.

```go
result, err := client.SendMessageDraft(nil).Create(map[string]any{
    "chat_id": /* `$STRING` */,
    "ok": /* `$BOOLEAN` */,
    "text": /* `$STRING` */,
}, nil)
```

### Common Methods

#### `Data(args ...any) any`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `Match(args ...any) any`

Get or set the entity match criteria. Works the same as `Data()`.

#### `Make() Entity`

Create a new `SendMessageDraftEntity` instance with the same client and
options.

#### `GetName() string`

Return the entity name.


---

## SetMyProfilePhotoEntity

```go
set_my_profile_photo := client.SetMyProfilePhoto(nil)
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

#### `Create(reqdata, ctrl map[string]any) (any, error)`

Create a new entity with the given data.

```go
result, err := client.SetMyProfilePhoto(nil).Create(map[string]any{
    "ok": /* `$BOOLEAN` */,
}, nil)
```

### Common Methods

#### `Data(args ...any) any`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `Match(args ...any) any`

Get or set the entity match criteria. Works the same as `Data()`.

#### `Make() Entity`

Create a new `SetMyProfilePhotoEntity` instance with the same client and
options.

#### `GetName() string`

Return the entity name.


---

## UnpinAllForumTopicMessageEntity

```go
unpin_all_forum_topic_message := client.UnpinAllForumTopicMessage(nil)
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

#### `Create(reqdata, ctrl map[string]any) (any, error)`

Create a new entity with the given data.

```go
result, err := client.UnpinAllForumTopicMessage(nil).Create(map[string]any{
    "chat_id": /* `$STRING` */,
    "message_thread_id": /* `$INTEGER` */,
    "ok": /* `$BOOLEAN` */,
}, nil)
```

### Common Methods

#### `Data(args ...any) any`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `Match(args ...any) any`

Get or set the entity match criteria. Works the same as `Data()`.

#### `Make() Entity`

Create a new `UnpinAllForumTopicMessageEntity` instance with the same client and
options.

#### `GetName() string`

Return the entity name.


---

## UpdateEntity

```go
update := client.Update(nil)
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

#### `Create(reqdata, ctrl map[string]any) (any, error)`

Create a new entity with the given data.

```go
result, err := client.Update(nil).Create(map[string]any{
    "ok": /* `$BOOLEAN` */,
}, nil)
```

#### `List(reqmatch, ctrl map[string]any) (any, error)`

List entities matching the given criteria. Returns an array.

```go
results, err := client.Update(nil).List(nil, nil)
```

### Common Methods

#### `Data(args ...any) any`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `Match(args ...any) any`

Get or set the entity match criteria. Works the same as `Data()`.

#### `Make() Entity`

Create a new `UpdateEntity` instance with the same client and
options.

#### `GetName() string`

Return the entity name.


---

## Features

| Feature | Version | Description |
| --- | --- | --- |
| `test` | 0.0.1 | In-memory mock transport for testing without a live server |


Features are activated via the `feature` option:

```go
client := sdk.NewTelegramBotSDK(map[string]any{
    "feature": map[string]any{
        "test": map[string]any{"active": true},
    },
})
```

