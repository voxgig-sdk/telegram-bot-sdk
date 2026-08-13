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

#### `Test() *TelegramBotSDK`

No-arg convenience constructor for the common no-options test case.

```go
client := sdk.Test()
```

#### `TestSDK(testopts, sdkopts map[string]any) *TelegramBotSDK`

Test client with options. Both arguments may be `nil`.

```go
client := sdk.TestSDK(testopts, sdkopts)
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
approveSuggestedPost := client.ApproveSuggestedPost(nil)
fmt.Println(approveSuggestedPost.GetName()) // "approve_suggested_post"
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `string` | Yes |  |
| `description` | `string` | No |  |
| `error_code` | `int` | No |  |
| `message_id` | `int` | Yes |  |
| `ok` | `bool` | Yes |  |
| `parameters` | `map[string]any` | No |  |
| `result` | `[]any` | No |  |

### Operations

#### `Create(reqdata, ctrl map[string]any) (any, error)`

Create a new entity with the given data.

```go
result, err := client.ApproveSuggestedPost(nil).Create(map[string]any{
    "chat_id": "example_chat_id",
    "message_id": 1,
    "ok": true,
}, nil)
if err != nil {
    panic(err)
}
fmt.Println(result)
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
declineSuggestedPost := client.DeclineSuggestedPost(nil)
fmt.Println(declineSuggestedPost.GetName()) // "decline_suggested_post"
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `string` | Yes |  |
| `description` | `string` | No |  |
| `error_code` | `int` | No |  |
| `message_id` | `int` | Yes |  |
| `ok` | `bool` | Yes |  |
| `parameters` | `map[string]any` | No |  |
| `result` | `[]any` | No |  |

### Operations

#### `Create(reqdata, ctrl map[string]any) (any, error)`

Create a new entity with the given data.

```go
result, err := client.DeclineSuggestedPost(nil).Create(map[string]any{
    "chat_id": "example_chat_id",
    "message_id": 1,
    "ok": true,
}, nil)
if err != nil {
    panic(err)
}
fmt.Println(result)
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
deleteForumTopic := client.DeleteForumTopic(nil)
fmt.Println(deleteForumTopic.GetName()) // "delete_forum_topic"
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `string` | Yes |  |
| `description` | `string` | No |  |
| `error_code` | `int` | No |  |
| `message_thread_id` | `int` | Yes |  |
| `ok` | `bool` | Yes |  |
| `parameters` | `map[string]any` | No |  |
| `result` | `[]any` | No |  |

### Operations

#### `Create(reqdata, ctrl map[string]any) (any, error)`

Create a new entity with the given data.

```go
result, err := client.DeleteForumTopic(nil).Create(map[string]any{
    "chat_id": "example_chat_id",
    "message_thread_id": 1,
    "ok": true,
}, nil)
if err != nil {
    panic(err)
}
fmt.Println(result)
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
editForumTopic := client.EditForumTopic(nil)
fmt.Println(editForumTopic.GetName()) // "edit_forum_topic"
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `string` | Yes |  |
| `description` | `string` | No |  |
| `error_code` | `int` | No |  |
| `icon_custom_emoji_id` | `string` | No |  |
| `message_thread_id` | `int` | Yes |  |
| `name` | `string` | No |  |
| `ok` | `bool` | Yes |  |
| `parameters` | `map[string]any` | No |  |
| `result` | `[]any` | No |  |

### Operations

#### `Create(reqdata, ctrl map[string]any) (any, error)`

Create a new entity with the given data.

```go
result, err := client.EditForumTopic(nil).Create(map[string]any{
    "chat_id": "example_chat_id",
    "message_thread_id": 1,
    "ok": true,
}, nil)
if err != nil {
    panic(err)
}
fmt.Println(result)
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
fmt.Println(file.GetName()) // "file"
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `file_id` | `string` | Yes |  |

### Operations

#### `Create(reqdata, ctrl map[string]any) (any, error)`

Create a new entity with the given data.

```go
result, err := client.File(nil).Create(map[string]any{
    "file_id": "example_file_id",
}, nil)
if err != nil {
    panic(err)
}
fmt.Println(result)
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
forumTopic := client.ForumTopic(nil)
fmt.Println(forumTopic.GetName()) // "forum_topic"
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `string` | Yes |  |
| `icon_color` | `int` | No |  |
| `icon_custom_emoji_id` | `string` | No |  |
| `name` | `string` | Yes |  |

### Operations

#### `Create(reqdata, ctrl map[string]any) (any, error)`

Create a new entity with the given data.

```go
result, err := client.ForumTopic(nil).Create(map[string]any{
    "chat_id": "example_chat_id",
    "name": "example_name",
}, nil)
if err != nil {
    panic(err)
}
fmt.Println(result)
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
getBusinessAccountGift := client.GetBusinessAccountGift(nil)
fmt.Println(getBusinessAccountGift.GetName()) // "get_business_account_gift"
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `description` | `string` | No |  |
| `error_code` | `int` | No |  |
| `exclude_from_blockchain` | `bool` | No |  |
| `exclude_limited_non_upgradable` | `bool` | No |  |
| `exclude_limited_upgradable` | `bool` | No |  |
| `ok` | `bool` | Yes |  |
| `parameters` | `map[string]any` | No |  |
| `result` | `[]any` | No |  |

### Operations

#### `Create(reqdata, ctrl map[string]any) (any, error)`

Create a new entity with the given data.

```go
result, err := client.GetBusinessAccountGift(nil).Create(map[string]any{
    "ok": true,
}, nil)
if err != nil {
    panic(err)
}
fmt.Println(result)
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
getChatGift := client.GetChatGift(nil)
fmt.Println(getChatGift.GetName()) // "get_chat_gift"
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `string` | Yes |  |
| `description` | `string` | No |  |
| `error_code` | `int` | No |  |
| `ok` | `bool` | Yes |  |
| `parameters` | `map[string]any` | No |  |
| `result` | `[]any` | No |  |

### Operations

#### `Create(reqdata, ctrl map[string]any) (any, error)`

Create a new entity with the given data.

```go
result, err := client.GetChatGift(nil).Create(map[string]any{
    "chat_id": "example_chat_id",
    "ok": true,
}, nil)
if err != nil {
    panic(err)
}
fmt.Println(result)
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
getMe := client.GetMe(nil)
fmt.Println(getMe.GetName()) // "get_me"
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `description` | `string` | No |  |
| `error_code` | `int` | No |  |
| `ok` | `bool` | Yes |  |
| `parameters` | `map[string]any` | No |  |
| `result` | `[]any` | No |  |

### Operations

#### `Load(reqmatch, ctrl map[string]any) (any, error)`

Load a single entity matching the given criteria.

```go
result, err := client.GetMe(nil).Load(nil, nil)
if err != nil {
    panic(err)
}
fmt.Println(result)
```

#### `Create(reqdata, ctrl map[string]any) (any, error)`

Create a new entity with the given data.

```go
result, err := client.GetMe(nil).Create(map[string]any{
    "ok": true,
}, nil)
if err != nil {
    panic(err)
}
fmt.Println(result)
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
getUserGift := client.GetUserGift(nil)
fmt.Println(getUserGift.GetName()) // "get_user_gift"
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `description` | `string` | No |  |
| `error_code` | `int` | No |  |
| `ok` | `bool` | Yes |  |
| `parameters` | `map[string]any` | No |  |
| `result` | `[]any` | No |  |
| `user_id` | `int` | Yes |  |

### Operations

#### `Create(reqdata, ctrl map[string]any) (any, error)`

Create a new entity with the given data.

```go
result, err := client.GetUserGift(nil).Create(map[string]any{
    "ok": true,
    "user_id": 1,
}, nil)
if err != nil {
    panic(err)
}
fmt.Println(result)
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
getUserProfileAudio := client.GetUserProfileAudio(nil)
fmt.Println(getUserProfileAudio.GetName()) // "get_user_profile_audio"
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `description` | `string` | No |  |
| `error_code` | `int` | No |  |
| `ok` | `bool` | Yes |  |
| `parameters` | `map[string]any` | No |  |
| `result` | `[]any` | No |  |
| `user_id` | `int` | Yes |  |

### Operations

#### `Create(reqdata, ctrl map[string]any) (any, error)`

Create a new entity with the given data.

```go
result, err := client.GetUserProfileAudio(nil).Create(map[string]any{
    "ok": true,
    "user_id": 1,
}, nil)
if err != nil {
    panic(err)
}
fmt.Println(result)
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
fmt.Println(message.GetName()) // "message"
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `string` | Yes |  |
| `direct_messages_topic_id` | `int` | No |  |
| `disable_notification` | `bool` | No |  |
| `disable_web_page_preview` | `bool` | No |  |
| `from_chat_id` | `string` | Yes |  |
| `latitude` | `float64` | Yes |  |
| `longitude` | `float64` | Yes |  |
| `message_effect_id` | `string` | No |  |
| `message_id` | `int` | Yes |  |
| `message_thread_id` | `int` | No |  |
| `options` | `[]any` | Yes |  |
| `parse_mode` | `string` | No |  |
| `protect_content` | `bool` | No |  |
| `question` | `string` | Yes |  |
| `reply_to_message_id` | `int` | No |  |
| `text` | `string` | Yes |  |

### Operations

#### `Create(reqdata, ctrl map[string]any) (any, error)`

Create a new entity with the given data.

```go
result, err := client.Message(nil).Create(map[string]any{
    "chat_id": "example_chat_id",
    "from_chat_id": "example_from_chat_id",
    "latitude": 1,
    "longitude": 1,
    "message_id": 1,
    "options": []any{},
    "question": "example_question",
    "text": "example_text",
}, nil)
if err != nil {
    panic(err)
}
fmt.Println(result)
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
messageId := client.MessageId(nil)
fmt.Println(messageId.GetName()) // "message_id"
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `string` | Yes |  |
| `direct_messages_topic_id` | `int` | No |  |
| `from_chat_id` | `string` | Yes |  |
| `message_effect_id` | `string` | No |  |
| `message_id` | `int` | Yes |  |
| `message_thread_id` | `int` | No |  |

### Operations

#### `Create(reqdata, ctrl map[string]any) (any, error)`

Create a new entity with the given data.

```go
result, err := client.MessageId(nil).Create(map[string]any{
    "chat_id": "example_chat_id",
    "from_chat_id": "example_from_chat_id",
    "message_id": 1,
}, nil)
if err != nil {
    panic(err)
}
fmt.Println(result)
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
promoteChatMember := client.PromoteChatMember(nil)
fmt.Println(promoteChatMember.GetName()) // "promote_chat_member"
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `can_delete_messages` | `bool` | No |  |
| `can_edit_messages` | `bool` | No |  |
| `can_manage_chat` | `bool` | No |  |
| `can_manage_direct_messages` | `bool` | No |  |
| `can_post_messages` | `bool` | No |  |
| `chat_id` | `string` | Yes |  |
| `description` | `string` | No |  |
| `error_code` | `int` | No |  |
| `ok` | `bool` | Yes |  |
| `parameters` | `map[string]any` | No |  |
| `result` | `[]any` | No |  |
| `user_id` | `int` | Yes |  |

### Operations

#### `Create(reqdata, ctrl map[string]any) (any, error)`

Create a new entity with the given data.

```go
result, err := client.PromoteChatMember(nil).Create(map[string]any{
    "chat_id": "example_chat_id",
    "ok": true,
    "user_id": 1,
}, nil)
if err != nil {
    panic(err)
}
fmt.Println(result)
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
removeMyProfilePhoto := client.RemoveMyProfilePhoto(nil)
fmt.Println(removeMyProfilePhoto.GetName()) // "remove_my_profile_photo"
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `description` | `string` | No |  |
| `error_code` | `int` | No |  |
| `ok` | `bool` | Yes |  |
| `parameters` | `map[string]any` | No |  |
| `result` | `[]any` | No |  |

### Operations

#### `Create(reqdata, ctrl map[string]any) (any, error)`

Create a new entity with the given data.

```go
result, err := client.RemoveMyProfilePhoto(nil).Create(map[string]any{
    "ok": true,
}, nil)
if err != nil {
    panic(err)
}
fmt.Println(result)
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
repostStory := client.RepostStory(nil)
fmt.Println(repostStory.GetName()) // "repost_story"
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `string` | Yes |  |
| `description` | `string` | No |  |
| `error_code` | `int` | No |  |
| `ok` | `bool` | Yes |  |
| `parameters` | `map[string]any` | No |  |
| `result` | `[]any` | No |  |
| `story_id` | `int` | Yes |  |

### Operations

#### `Create(reqdata, ctrl map[string]any) (any, error)`

Create a new entity with the given data.

```go
result, err := client.RepostStory(nil).Create(map[string]any{
    "chat_id": "example_chat_id",
    "ok": true,
    "story_id": 1,
}, nil)
if err != nil {
    panic(err)
}
fmt.Println(result)
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
sendChatAction := client.SendChatAction(nil)
fmt.Println(sendChatAction.GetName()) // "send_chat_action"
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `action` | `string` | Yes |  |
| `chat_id` | `string` | Yes |  |
| `description` | `string` | No |  |
| `error_code` | `int` | No |  |
| `message_thread_id` | `int` | No |  |
| `ok` | `bool` | Yes |  |
| `parameters` | `map[string]any` | No |  |
| `result` | `[]any` | No |  |

### Operations

#### `Create(reqdata, ctrl map[string]any) (any, error)`

Create a new entity with the given data.

```go
result, err := client.SendChatAction(nil).Create(map[string]any{
    "action": "example_action",
    "chat_id": "example_chat_id",
    "ok": true,
}, nil)
if err != nil {
    panic(err)
}
fmt.Println(result)
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
sendMessageDraft := client.SendMessageDraft(nil)
fmt.Println(sendMessageDraft.GetName()) // "send_message_draft"
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `string` | Yes |  |
| `description` | `string` | No |  |
| `error_code` | `int` | No |  |
| `message_thread_id` | `int` | No |  |
| `ok` | `bool` | Yes |  |
| `parameters` | `map[string]any` | No |  |
| `result` | `[]any` | No |  |
| `text` | `string` | Yes |  |

### Operations

#### `Create(reqdata, ctrl map[string]any) (any, error)`

Create a new entity with the given data.

```go
result, err := client.SendMessageDraft(nil).Create(map[string]any{
    "chat_id": "example_chat_id",
    "ok": true,
    "text": "example_text",
}, nil)
if err != nil {
    panic(err)
}
fmt.Println(result)
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
setMyProfilePhoto := client.SetMyProfilePhoto(nil)
fmt.Println(setMyProfilePhoto.GetName()) // "set_my_profile_photo"
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `description` | `string` | No |  |
| `error_code` | `int` | No |  |
| `ok` | `bool` | Yes |  |
| `parameters` | `map[string]any` | No |  |
| `result` | `[]any` | No |  |

### Operations

#### `Create(reqdata, ctrl map[string]any) (any, error)`

Create a new entity with the given data.

```go
result, err := client.SetMyProfilePhoto(nil).Create(map[string]any{
    "ok": true,
}, nil)
if err != nil {
    panic(err)
}
fmt.Println(result)
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
unpinAllForumTopicMessage := client.UnpinAllForumTopicMessage(nil)
fmt.Println(unpinAllForumTopicMessage.GetName()) // "unpin_all_forum_topic_message"
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `string` | Yes |  |
| `description` | `string` | No |  |
| `error_code` | `int` | No |  |
| `message_thread_id` | `int` | Yes |  |
| `ok` | `bool` | Yes |  |
| `parameters` | `map[string]any` | No |  |
| `result` | `[]any` | No |  |

### Operations

#### `Create(reqdata, ctrl map[string]any) (any, error)`

Create a new entity with the given data.

```go
result, err := client.UnpinAllForumTopicMessage(nil).Create(map[string]any{
    "chat_id": "example_chat_id",
    "message_thread_id": 1,
    "ok": true,
}, nil)
if err != nil {
    panic(err)
}
fmt.Println(result)
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
fmt.Println(update.GetName()) // "update"
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `allowed_updates` | `[]any` | No |  |
| `description` | `string` | No |  |
| `error_code` | `int` | No |  |
| `limit` | `int` | No |  |
| `offset` | `int` | No |  |
| `ok` | `bool` | Yes |  |
| `parameters` | `map[string]any` | No |  |
| `result` | `[]any` | No |  |
| `timeout` | `int` | No |  |

### Operations

#### `List(reqmatch, ctrl map[string]any) (any, error)`

List entities matching the given criteria. Returns an array.

```go
results, err := client.Update(nil).List(nil, nil)
if err != nil {
    panic(err)
}
fmt.Println(results)
```

#### `Create(reqdata, ctrl map[string]any) (any, error)`

Create a new entity with the given data.

```go
result, err := client.Update(nil).Create(map[string]any{
    "ok": true,
}, nil)
if err != nil {
    panic(err)
}
fmt.Println(result)
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

