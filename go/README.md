# TelegramBot Golang SDK

The Golang SDK for the TelegramBot API. Provides an entity-oriented interface using standard Go conventions — no generics required, data flows as `map[string]any`.


## Install
```bash
go get github.com/voxgig-sdk/telegram-bot-sdk/go
```

If the module is not yet published to a registry, use a `replace` directive
in your `go.mod` to point to a local checkout:

```bash
go mod edit -replace github.com/voxgig-sdk/telegram-bot-sdk/go=../path/to/github.com/voxgig-sdk/telegram-bot-sdk/go
```


## Tutorial: your first API call

This tutorial walks through creating a client, listing entities, and
loading a specific record.

### 1. Create a client

```go
package main

import (
    "fmt"
    "os"

    sdk "github.com/voxgig-sdk/telegram-bot-sdk/go"
    "github.com/voxgig-sdk/telegram-bot-sdk/go/core"
)

func main() {
    client := sdk.NewTelegramBotSDK(map[string]any{
        "apikey": os.Getenv("TELEGRAM-BOT_APIKEY"),
    })
```

### 4. Create, update, and remove

```go
// Create
created, _ := client.ApproveSuggestedPost(nil).Create(
    map[string]any{"name": "Example"}, nil,
)
cm := core.ToMapAny(created)
newID := core.ToMapAny(cm["data"])["id"]

```


## How-to guides

### Make a direct HTTP request

For endpoints not covered by entity methods:

```go
result, err := client.Direct(map[string]any{
    "path":   "/api/resource/{id}",
    "method": "GET",
    "params": map[string]any{"id": "example"},
})
if err != nil {
    panic(err)
}

if result["ok"] == true {
    fmt.Println(result["status"]) // 200
    fmt.Println(result["data"])   // response body
}
```

### Prepare a request without sending it

```go
fetchdef, err := client.Prepare(map[string]any{
    "path":   "/api/resource/{id}",
    "method": "DELETE",
    "params": map[string]any{"id": "example"},
})
if err != nil {
    panic(err)
}

fmt.Println(fetchdef["url"])
fmt.Println(fetchdef["method"])
fmt.Println(fetchdef["headers"])
```

### Use test mode

Create a mock client for unit testing — no server required:

```go
client := sdk.TestSDK(nil, nil)

result, err := client.Planet(nil).Load(
    map[string]any{"id": "test01"}, nil,
)
// result contains mock response data
```

### Use a custom fetch function

Replace the HTTP transport with your own function:

```go
mockFetch := func(url string, init map[string]any) (map[string]any, error) {
    return map[string]any{
        "status":     200,
        "statusText": "OK",
        "headers":    map[string]any{},
        "json": (func() any)(func() any {
            return map[string]any{"id": "mock01"}
        }),
    }, nil
}

client := sdk.NewTelegramBotSDK(map[string]any{
    "base": "http://localhost:8080",
    "system": map[string]any{
        "fetch": (func(string, map[string]any) (map[string]any, error))(mockFetch),
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
cd go && go test ./test/...
```


## Reference

### NewTelegramBotSDK

```go
func NewTelegramBotSDK(options map[string]any) *TelegramBotSDK
```

Creates a new SDK client.

| Option | Type | Description |
| --- | --- | --- |
| `"apikey"` | `string` | API key for authentication. |
| `"base"` | `string` | Base URL of the API server. |
| `"prefix"` | `string` | URL path prefix prepended to all requests. |
| `"suffix"` | `string` | URL path suffix appended to all requests. |
| `"feature"` | `map[string]any` | Feature activation flags. |
| `"extend"` | `[]any` | Additional Feature instances to load. |
| `"system"` | `map[string]any` | System overrides (e.g. custom `"fetch"` function). |

### TestSDK

```go
func TestSDK(testopts map[string]any, sdkopts map[string]any) *TelegramBotSDK
```

Creates a test-mode client with mock transport. Both arguments may be `nil`.

### TelegramBotSDK methods

| Method | Signature | Description |
| --- | --- | --- |
| `OptionsMap` | `() map[string]any` | Deep copy of current SDK options. |
| `GetUtility` | `() *Utility` | Copy of the SDK utility object. |
| `Prepare` | `(fetchargs map[string]any) (map[string]any, error)` | Build an HTTP request definition without sending. |
| `Direct` | `(fetchargs map[string]any) (map[string]any, error)` | Build and send an HTTP request. |
| `ApproveSuggestedPost` | `(data map[string]any) TelegramBotEntity` | Create a ApproveSuggestedPost entity instance. |
| `DeclineSuggestedPost` | `(data map[string]any) TelegramBotEntity` | Create a DeclineSuggestedPost entity instance. |
| `DeleteForumTopic` | `(data map[string]any) TelegramBotEntity` | Create a DeleteForumTopic entity instance. |
| `EditForumTopic` | `(data map[string]any) TelegramBotEntity` | Create a EditForumTopic entity instance. |
| `File` | `(data map[string]any) TelegramBotEntity` | Create a File entity instance. |
| `ForumTopic` | `(data map[string]any) TelegramBotEntity` | Create a ForumTopic entity instance. |
| `GetBusinessAccountGift` | `(data map[string]any) TelegramBotEntity` | Create a GetBusinessAccountGift entity instance. |
| `GetChatGift` | `(data map[string]any) TelegramBotEntity` | Create a GetChatGift entity instance. |
| `GetMe` | `(data map[string]any) TelegramBotEntity` | Create a GetMe entity instance. |
| `GetUserGift` | `(data map[string]any) TelegramBotEntity` | Create a GetUserGift entity instance. |
| `GetUserProfileAudio` | `(data map[string]any) TelegramBotEntity` | Create a GetUserProfileAudio entity instance. |
| `Message` | `(data map[string]any) TelegramBotEntity` | Create a Message entity instance. |
| `MessageId` | `(data map[string]any) TelegramBotEntity` | Create a MessageId entity instance. |
| `PromoteChatMember` | `(data map[string]any) TelegramBotEntity` | Create a PromoteChatMember entity instance. |
| `RemoveMyProfilePhoto` | `(data map[string]any) TelegramBotEntity` | Create a RemoveMyProfilePhoto entity instance. |
| `RepostStory` | `(data map[string]any) TelegramBotEntity` | Create a RepostStory entity instance. |
| `SendChatAction` | `(data map[string]any) TelegramBotEntity` | Create a SendChatAction entity instance. |
| `SendMessageDraft` | `(data map[string]any) TelegramBotEntity` | Create a SendMessageDraft entity instance. |
| `SetMyProfilePhoto` | `(data map[string]any) TelegramBotEntity` | Create a SetMyProfilePhoto entity instance. |
| `UnpinAllForumTopicMessage` | `(data map[string]any) TelegramBotEntity` | Create a UnpinAllForumTopicMessage entity instance. |
| `Update` | `(data map[string]any) TelegramBotEntity` | Create a Update entity instance. |

### Entity interface (TelegramBotEntity)

All entities implement the `TelegramBotEntity` interface.

| Method | Signature | Description |
| --- | --- | --- |
| `Load` | `(reqmatch, ctrl map[string]any) (any, error)` | Load a single entity by match criteria. |
| `List` | `(reqmatch, ctrl map[string]any) (any, error)` | List entities matching the criteria. |
| `Create` | `(reqdata, ctrl map[string]any) (any, error)` | Create a new entity. |
| `Update` | `(reqdata, ctrl map[string]any) (any, error)` | Update an existing entity. |
| `Remove` | `(reqmatch, ctrl map[string]any) (any, error)` | Remove an entity. |
| `Data` | `(args ...any) any` | Get or set entity data. |
| `Match` | `(args ...any) any` | Get or set entity match criteria. |
| `Make` | `() Entity` | Create a new instance with the same options. |
| `GetName` | `() string` | Return the entity name. |

### Result shape

Entity operations return `(any, error)`. The `any` value is a
`map[string]any` with these keys:

| Key | Type | Description |
| --- | --- | --- |
| `"ok"` | `bool` | `true` if the HTTP status is 2xx. |
| `"status"` | `int` | HTTP status code. |
| `"headers"` | `map[string]any` | Response headers. |
| `"data"` | `any` | Parsed JSON response body. |

On error, `"ok"` is `false` and `"err"` contains the error value.

### Entities

#### ApproveSuggestedPost

| Field | Description |
| --- | --- |
| `"chat_id"` |  |
| `"description"` |  |
| `"error_code"` |  |
| `"message_id"` |  |
| `"ok"` |  |
| `"parameter"` |  |
| `"result"` |  |

Operations: Create.

API path: `/approveSuggestedPost`

#### DeclineSuggestedPost

| Field | Description |
| --- | --- |
| `"chat_id"` |  |
| `"description"` |  |
| `"error_code"` |  |
| `"message_id"` |  |
| `"ok"` |  |
| `"parameter"` |  |
| `"result"` |  |

Operations: Create.

API path: `/declineSuggestedPost`

#### DeleteForumTopic

| Field | Description |
| --- | --- |
| `"chat_id"` |  |
| `"description"` |  |
| `"error_code"` |  |
| `"message_thread_id"` |  |
| `"ok"` |  |
| `"parameter"` |  |
| `"result"` |  |

Operations: Create.

API path: `/deleteForumTopic`

#### EditForumTopic

| Field | Description |
| --- | --- |
| `"chat_id"` |  |
| `"description"` |  |
| `"error_code"` |  |
| `"icon_custom_emoji_id"` |  |
| `"message_thread_id"` |  |
| `"name"` |  |
| `"ok"` |  |
| `"parameter"` |  |
| `"result"` |  |

Operations: Create.

API path: `/editForumTopic`

#### File

| Field | Description |
| --- | --- |
| `"file_id"` |  |

Operations: Create.

API path: `/getFile`

#### ForumTopic

| Field | Description |
| --- | --- |
| `"chat_id"` |  |
| `"icon_color"` |  |
| `"icon_custom_emoji_id"` |  |
| `"name"` |  |

Operations: Create.

API path: `/createForumTopic`

#### GetBusinessAccountGift

| Field | Description |
| --- | --- |
| `"description"` |  |
| `"error_code"` |  |
| `"exclude_from_blockchain"` |  |
| `"exclude_limited_non_upgradable"` |  |
| `"exclude_limited_upgradable"` |  |
| `"ok"` |  |
| `"parameter"` |  |
| `"result"` |  |

Operations: Create.

API path: `/getBusinessAccountGifts`

#### GetChatGift

| Field | Description |
| --- | --- |
| `"chat_id"` |  |
| `"description"` |  |
| `"error_code"` |  |
| `"ok"` |  |
| `"parameter"` |  |
| `"result"` |  |

Operations: Create.

API path: `/getChatGifts`

#### GetMe

| Field | Description |
| --- | --- |
| `"description"` |  |
| `"error_code"` |  |
| `"ok"` |  |
| `"parameter"` |  |
| `"result"` |  |

Operations: Create, Load.

API path: `/getMe`

#### GetUserGift

| Field | Description |
| --- | --- |
| `"description"` |  |
| `"error_code"` |  |
| `"ok"` |  |
| `"parameter"` |  |
| `"result"` |  |
| `"user_id"` |  |

Operations: Create.

API path: `/getUserGifts`

#### GetUserProfileAudio

| Field | Description |
| --- | --- |
| `"description"` |  |
| `"error_code"` |  |
| `"ok"` |  |
| `"parameter"` |  |
| `"result"` |  |
| `"user_id"` |  |

Operations: Create.

API path: `/getUserProfileAudios`

#### Message

| Field | Description |
| --- | --- |
| `"chat_id"` |  |
| `"direct_messages_topic_id"` |  |
| `"disable_notification"` |  |
| `"disable_web_page_preview"` |  |
| `"from_chat_id"` |  |
| `"latitude"` |  |
| `"longitude"` |  |
| `"message_effect_id"` |  |
| `"message_id"` |  |
| `"message_thread_id"` |  |
| `"option"` |  |
| `"parse_mode"` |  |
| `"protect_content"` |  |
| `"question"` |  |
| `"reply_to_message_id"` |  |
| `"text"` |  |

Operations: Create.

API path: `/forwardMessage`

#### MessageId

| Field | Description |
| --- | --- |
| `"chat_id"` |  |
| `"direct_messages_topic_id"` |  |
| `"from_chat_id"` |  |
| `"message_effect_id"` |  |
| `"message_id"` |  |
| `"message_thread_id"` |  |

Operations: Create.

API path: `/copyMessage`

#### PromoteChatMember

| Field | Description |
| --- | --- |
| `"can_delete_message"` |  |
| `"can_edit_message"` |  |
| `"can_manage_chat"` |  |
| `"can_manage_direct_message"` |  |
| `"can_post_message"` |  |
| `"chat_id"` |  |
| `"description"` |  |
| `"error_code"` |  |
| `"ok"` |  |
| `"parameter"` |  |
| `"result"` |  |
| `"user_id"` |  |

Operations: Create.

API path: `/promoteChatMember`

#### RemoveMyProfilePhoto

| Field | Description |
| --- | --- |
| `"description"` |  |
| `"error_code"` |  |
| `"ok"` |  |
| `"parameter"` |  |
| `"result"` |  |

Operations: Create.

API path: `/removeMyProfilePhoto`

#### RepostStory

| Field | Description |
| --- | --- |
| `"chat_id"` |  |
| `"description"` |  |
| `"error_code"` |  |
| `"ok"` |  |
| `"parameter"` |  |
| `"result"` |  |
| `"story_id"` |  |

Operations: Create.

API path: `/repostStory`

#### SendChatAction

| Field | Description |
| --- | --- |
| `"action"` |  |
| `"chat_id"` |  |
| `"description"` |  |
| `"error_code"` |  |
| `"message_thread_id"` |  |
| `"ok"` |  |
| `"parameter"` |  |
| `"result"` |  |

Operations: Create.

API path: `/sendChatAction`

#### SendMessageDraft

| Field | Description |
| --- | --- |
| `"chat_id"` |  |
| `"description"` |  |
| `"error_code"` |  |
| `"message_thread_id"` |  |
| `"ok"` |  |
| `"parameter"` |  |
| `"result"` |  |
| `"text"` |  |

Operations: Create.

API path: `/sendMessageDraft`

#### SetMyProfilePhoto

| Field | Description |
| --- | --- |
| `"description"` |  |
| `"error_code"` |  |
| `"ok"` |  |
| `"parameter"` |  |
| `"result"` |  |

Operations: Create.

API path: `/setMyProfilePhoto`

#### UnpinAllForumTopicMessage

| Field | Description |
| --- | --- |
| `"chat_id"` |  |
| `"description"` |  |
| `"error_code"` |  |
| `"message_thread_id"` |  |
| `"ok"` |  |
| `"parameter"` |  |
| `"result"` |  |

Operations: Create.

API path: `/unpinAllForumTopicMessages`

#### Update

| Field | Description |
| --- | --- |
| `"allowed_update"` |  |
| `"description"` |  |
| `"error_code"` |  |
| `"limit"` |  |
| `"offset"` |  |
| `"ok"` |  |
| `"parameter"` |  |
| `"result"` |  |
| `"timeout"` |  |

Operations: Create, List.

API path: `/getUpdates`



## Entities


### ApproveSuggestedPost

Create an instance: `approve_suggested_post := client.ApproveSuggestedPost(nil)`

#### Operations

| Method | Description |
| --- | --- |
| `Create(data, ctrl)` | Create a new entity with the given data. |

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

```go
result, err := client.ApproveSuggestedPost(nil).Create(map[string]any{
    "chat_id": /* `$STRING` */,
    "message_id": /* `$INTEGER` */,
    "ok": /* `$BOOLEAN` */,
}, nil)
```


### DeclineSuggestedPost

Create an instance: `decline_suggested_post := client.DeclineSuggestedPost(nil)`

#### Operations

| Method | Description |
| --- | --- |
| `Create(data, ctrl)` | Create a new entity with the given data. |

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

```go
result, err := client.DeclineSuggestedPost(nil).Create(map[string]any{
    "chat_id": /* `$STRING` */,
    "message_id": /* `$INTEGER` */,
    "ok": /* `$BOOLEAN` */,
}, nil)
```


### DeleteForumTopic

Create an instance: `delete_forum_topic := client.DeleteForumTopic(nil)`

#### Operations

| Method | Description |
| --- | --- |
| `Create(data, ctrl)` | Create a new entity with the given data. |

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

```go
result, err := client.DeleteForumTopic(nil).Create(map[string]any{
    "chat_id": /* `$STRING` */,
    "message_thread_id": /* `$INTEGER` */,
    "ok": /* `$BOOLEAN` */,
}, nil)
```


### EditForumTopic

Create an instance: `edit_forum_topic := client.EditForumTopic(nil)`

#### Operations

| Method | Description |
| --- | --- |
| `Create(data, ctrl)` | Create a new entity with the given data. |

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

```go
result, err := client.EditForumTopic(nil).Create(map[string]any{
    "chat_id": /* `$STRING` */,
    "message_thread_id": /* `$INTEGER` */,
    "ok": /* `$BOOLEAN` */,
}, nil)
```


### File

Create an instance: `file := client.File(nil)`

#### Operations

| Method | Description |
| --- | --- |
| `Create(data, ctrl)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `file_id` | ``$STRING`` |  |

#### Example: Create

```go
result, err := client.File(nil).Create(map[string]any{
    "file_id": /* `$STRING` */,
}, nil)
```


### ForumTopic

Create an instance: `forum_topic := client.ForumTopic(nil)`

#### Operations

| Method | Description |
| --- | --- |
| `Create(data, ctrl)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | ``$STRING`` |  |
| `icon_color` | ``$INTEGER`` |  |
| `icon_custom_emoji_id` | ``$STRING`` |  |
| `name` | ``$STRING`` |  |

#### Example: Create

```go
result, err := client.ForumTopic(nil).Create(map[string]any{
    "chat_id": /* `$STRING` */,
    "name": /* `$STRING` */,
}, nil)
```


### GetBusinessAccountGift

Create an instance: `get_business_account_gift := client.GetBusinessAccountGift(nil)`

#### Operations

| Method | Description |
| --- | --- |
| `Create(data, ctrl)` | Create a new entity with the given data. |

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

```go
result, err := client.GetBusinessAccountGift(nil).Create(map[string]any{
    "ok": /* `$BOOLEAN` */,
}, nil)
```


### GetChatGift

Create an instance: `get_chat_gift := client.GetChatGift(nil)`

#### Operations

| Method | Description |
| --- | --- |
| `Create(data, ctrl)` | Create a new entity with the given data. |

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

```go
result, err := client.GetChatGift(nil).Create(map[string]any{
    "chat_id": /* `$STRING` */,
    "ok": /* `$BOOLEAN` */,
}, nil)
```


### GetMe

Create an instance: `get_me := client.GetMe(nil)`

#### Operations

| Method | Description |
| --- | --- |
| `Create(data, ctrl)` | Create a new entity with the given data. |
| `Load(match, ctrl)` | Load a single entity by match criteria. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `description` | ``$STRING`` |  |
| `error_code` | ``$INTEGER`` |  |
| `ok` | ``$BOOLEAN`` |  |
| `parameter` | ``$OBJECT`` |  |
| `result` | ``$ANY`` |  |

#### Example: Load

```go
result, err := client.GetMe(nil).Load(map[string]any{"id": "get_me_id"}, nil)
```

#### Example: Create

```go
result, err := client.GetMe(nil).Create(map[string]any{
    "ok": /* `$BOOLEAN` */,
}, nil)
```


### GetUserGift

Create an instance: `get_user_gift := client.GetUserGift(nil)`

#### Operations

| Method | Description |
| --- | --- |
| `Create(data, ctrl)` | Create a new entity with the given data. |

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

```go
result, err := client.GetUserGift(nil).Create(map[string]any{
    "ok": /* `$BOOLEAN` */,
    "user_id": /* `$INTEGER` */,
}, nil)
```


### GetUserProfileAudio

Create an instance: `get_user_profile_audio := client.GetUserProfileAudio(nil)`

#### Operations

| Method | Description |
| --- | --- |
| `Create(data, ctrl)` | Create a new entity with the given data. |

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

```go
result, err := client.GetUserProfileAudio(nil).Create(map[string]any{
    "ok": /* `$BOOLEAN` */,
    "user_id": /* `$INTEGER` */,
}, nil)
```


### Message

Create an instance: `message := client.Message(nil)`

#### Operations

| Method | Description |
| --- | --- |
| `Create(data, ctrl)` | Create a new entity with the given data. |

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


### MessageId

Create an instance: `message_id := client.MessageId(nil)`

#### Operations

| Method | Description |
| --- | --- |
| `Create(data, ctrl)` | Create a new entity with the given data. |

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

```go
result, err := client.MessageId(nil).Create(map[string]any{
    "chat_id": /* `$STRING` */,
    "from_chat_id": /* `$STRING` */,
    "message_id": /* `$INTEGER` */,
}, nil)
```


### PromoteChatMember

Create an instance: `promote_chat_member := client.PromoteChatMember(nil)`

#### Operations

| Method | Description |
| --- | --- |
| `Create(data, ctrl)` | Create a new entity with the given data. |

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

```go
result, err := client.PromoteChatMember(nil).Create(map[string]any{
    "chat_id": /* `$STRING` */,
    "ok": /* `$BOOLEAN` */,
    "user_id": /* `$INTEGER` */,
}, nil)
```


### RemoveMyProfilePhoto

Create an instance: `remove_my_profile_photo := client.RemoveMyProfilePhoto(nil)`

#### Operations

| Method | Description |
| --- | --- |
| `Create(data, ctrl)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `description` | ``$STRING`` |  |
| `error_code` | ``$INTEGER`` |  |
| `ok` | ``$BOOLEAN`` |  |
| `parameter` | ``$OBJECT`` |  |
| `result` | ``$ANY`` |  |

#### Example: Create

```go
result, err := client.RemoveMyProfilePhoto(nil).Create(map[string]any{
    "ok": /* `$BOOLEAN` */,
}, nil)
```


### RepostStory

Create an instance: `repost_story := client.RepostStory(nil)`

#### Operations

| Method | Description |
| --- | --- |
| `Create(data, ctrl)` | Create a new entity with the given data. |

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

```go
result, err := client.RepostStory(nil).Create(map[string]any{
    "chat_id": /* `$STRING` */,
    "ok": /* `$BOOLEAN` */,
    "story_id": /* `$INTEGER` */,
}, nil)
```


### SendChatAction

Create an instance: `send_chat_action := client.SendChatAction(nil)`

#### Operations

| Method | Description |
| --- | --- |
| `Create(data, ctrl)` | Create a new entity with the given data. |

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

```go
result, err := client.SendChatAction(nil).Create(map[string]any{
    "action": /* `$STRING` */,
    "chat_id": /* `$STRING` */,
    "ok": /* `$BOOLEAN` */,
}, nil)
```


### SendMessageDraft

Create an instance: `send_message_draft := client.SendMessageDraft(nil)`

#### Operations

| Method | Description |
| --- | --- |
| `Create(data, ctrl)` | Create a new entity with the given data. |

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

```go
result, err := client.SendMessageDraft(nil).Create(map[string]any{
    "chat_id": /* `$STRING` */,
    "ok": /* `$BOOLEAN` */,
    "text": /* `$STRING` */,
}, nil)
```


### SetMyProfilePhoto

Create an instance: `set_my_profile_photo := client.SetMyProfilePhoto(nil)`

#### Operations

| Method | Description |
| --- | --- |
| `Create(data, ctrl)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `description` | ``$STRING`` |  |
| `error_code` | ``$INTEGER`` |  |
| `ok` | ``$BOOLEAN`` |  |
| `parameter` | ``$OBJECT`` |  |
| `result` | ``$ANY`` |  |

#### Example: Create

```go
result, err := client.SetMyProfilePhoto(nil).Create(map[string]any{
    "ok": /* `$BOOLEAN` */,
}, nil)
```


### UnpinAllForumTopicMessage

Create an instance: `unpin_all_forum_topic_message := client.UnpinAllForumTopicMessage(nil)`

#### Operations

| Method | Description |
| --- | --- |
| `Create(data, ctrl)` | Create a new entity with the given data. |

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

```go
result, err := client.UnpinAllForumTopicMessage(nil).Create(map[string]any{
    "chat_id": /* `$STRING` */,
    "message_thread_id": /* `$INTEGER` */,
    "ok": /* `$BOOLEAN` */,
}, nil)
```


### Update

Create an instance: `update := client.Update(nil)`

#### Operations

| Method | Description |
| --- | --- |
| `Create(data, ctrl)` | Create a new entity with the given data. |
| `List(match, ctrl)` | List entities matching the criteria. |

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

```go
results, err := client.Update(nil).List(nil, nil)
```

#### Example: Create

```go
result, err := client.Update(nil).Create(map[string]any{
    "ok": /* `$BOOLEAN` */,
}, nil)
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
error is returned to the caller. An unexpected panic triggers the
`PreUnexpected` hook.

### Features and hooks

Features are the extension mechanism. A feature implements the
`Feature` interface and provides hooks — functions keyed by pipeline
stage names.

The SDK ships with built-in features:

- **TestFeature**: In-memory mock transport for testing without a live server

Features are initialized in order. Hooks fire in the order features
were added, so later features can override earlier ones.

### Data as maps

The Go SDK uses `map[string]any` throughout rather than typed structs.
This mirrors the dynamic nature of the API and keeps the SDK
flexible — no code generation is needed when the API schema changes.

Use `core.ToMapAny()` to safely cast results and nested data.

### Package structure

```
github.com/voxgig-sdk/telegram-bot-sdk/go/
├── telegram-bot.go        # Root package — type aliases and constructors
├── core/               # SDK core — client, types, pipeline
├── entity/             # Entity implementations
├── feature/            # Built-in features (Base, Test, Log)
├── utility/            # Utility functions and struct library
└── test/               # Test suites
```

The root package (`github.com/voxgig-sdk/telegram-bot-sdk/go`) re-exports everything needed
for normal use. Import sub-packages only when you need specific types
like `core.ToMapAny`.

### Entity state

Entity instances are stateful. After a successful `Load`, the entity
stores the returned data and match criteria internally.

```go
moon := client.Moon(nil)
moon.Load(map[string]any{"planet_id": "earth", "id": "luna"}, nil)

// moon.Data() now returns the loaded moon data
// moon.Match() returns the last match criteria
```

Call `Make()` to create a fresh instance with the same configuration
but no stored state.

### Direct vs entity access

The entity interface handles URL construction, parameter placement,
and response parsing automatically. Use it for standard CRUD operations.

`Direct()` gives full control over the HTTP request. Use it for
non-standard endpoints, bulk operations, or any path not modelled as
an entity. `Prepare()` builds the request without sending it — useful
for debugging or custom transport.


## Full Reference

See [REFERENCE.md](REFERENCE.md) for complete API reference
documentation including all method signatures, entity field schemas,
and detailed usage examples.
