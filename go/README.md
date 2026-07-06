# TelegramBot Golang SDK



The Golang SDK for the TelegramBot API — an entity-oriented client using standard Go conventions. No generics required; data flows as `map[string]any`.

It exposes the API as capitalised, semantic **Entities** — e.g. `client.ApproveSuggestedPost(nil)` — each with the same small set of operations (`List`, `Load`, `Create`) instead of raw URL paths and query strings. You call meaning, not endpoints, which keeps the cognitive load low.

> Other languages, the CLI, and MCP server live alongside this one — see
> the [top-level README](../README.md).


## Install
```bash
go get github.com/voxgig-sdk/telegram-bot-sdk/go@latest
```

The Go module proxy resolves the version from the `go/vX.Y.Z` GitHub
release tag — see [Releases](https://github.com/voxgig-sdk/telegram-bot-sdk/releases) for the available versions.

To vendor from a local checkout instead, clone this repo alongside your
project and add a `replace` directive pointing at the checked-out
`go/` directory:

```bash
go mod edit -replace github.com/voxgig-sdk/telegram-bot-sdk/go=../telegram-bot-sdk/go
```


## Tutorial: your first API call

This tutorial walks through creating a client, listing entities, and
loading a specific record.

### Quickstart

A complete program: create a client, then call the entity operations.
Each operation returns `(value, error)` — the value is the data itself
(there is no `{ok, data}` wrapper), so check `err` and use the value
directly.

```go
package main

import (
    "fmt"
    "os"
    sdk "github.com/voxgig-sdk/telegram-bot-sdk/go"
)

func main() {
    client := sdk.NewTelegramBotSDK(map[string]any{
        "apikey": os.Getenv("TELEGRAM_BOT_APIKEY"),
    })

    // Create a approvesuggestedpost.
    created, err := client.ApproveSuggestedPost(nil).Create(map[string]any{"chat_id": "example", "message_id": 1, "ok": true}, nil)
    if err != nil {
        panic(err)
    }
    fmt.Println(created)
}
```


## Error handling

Every entity operation returns `(value, error)`. Check `err` before
using the value — there is no exception to catch:

```go
approvesuggestedpost, err := client.ApproveSuggestedPost(nil).Create(map[string]any{"chat_id": "example", "message_id": 1, "ok": true}, nil)
if err != nil {
    // handle err
    return
}
_ = approvesuggestedpost
```

`Direct` follows the same `(value, error)` convention:

```go
result, err := client.Direct(map[string]any{
    "path":   "/api/resource/{id}",
    "method": "GET",
    "params": map[string]any{"id": "example_id"},
})
if err != nil {
    // handle err
}
_ = result
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
client := sdk.Test()

approvesuggestedpost, err := client.ApproveSuggestedPost(nil).Create(
    map[string]any{"chat_id": "example", "message_id": 1, "ok": true}, nil,
)
if err != nil {
    panic(err)
}
fmt.Println(approvesuggestedpost) // the returned mock data
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
TELEGRAM_BOT_TEST_LIVE=TRUE
TELEGRAM_BOT_APIKEY=<your-key>
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
| `ApproveSuggestedPost` | `(data map[string]any) TelegramBotEntity` | Create an ApproveSuggestedPost entity instance. |
| `DeclineSuggestedPost` | `(data map[string]any) TelegramBotEntity` | Create a DeclineSuggestedPost entity instance. |
| `DeleteForumTopic` | `(data map[string]any) TelegramBotEntity` | Create a DeleteForumTopic entity instance. |
| `EditForumTopic` | `(data map[string]any) TelegramBotEntity` | Create an EditForumTopic entity instance. |
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
| `UnpinAllForumTopicMessage` | `(data map[string]any) TelegramBotEntity` | Create an UnpinAllForumTopicMessage entity instance. |
| `Update` | `(data map[string]any) TelegramBotEntity` | Create an Update entity instance. |

### Entity interface (TelegramBotEntity)

All entities implement the `TelegramBotEntity` interface.

| Method | Signature | Description |
| --- | --- | --- |
| `Load` | `(reqmatch, ctrl map[string]any) (any, error)` | Load a single entity by match criteria. |
| `List` | `(reqmatch, ctrl map[string]any) (any, error)` | List entities matching the criteria. |
| `Create` | `(reqdata, ctrl map[string]any) (any, error)` | Create a new entity. |
| `Data` | `(args ...any) any` | Get or set entity data. |
| `Match` | `(args ...any) any` | Get or set entity match criteria. |
| `Make` | `() Entity` | Create a new instance with the same options. |
| `GetName` | `() string` | Return the entity name. |

### Result shape

Entity operations return `(value, error)`. The `value` is the
operation's data **directly** — there is no wrapper:

| Operation | `value` |
| --- | --- |
| `Load` / `Create` | the entity record (`map[string]any`) |
| `List` | a `[]any` of entity records |

Check `err` first, then use the value directly (or the typed
`...Typed` variants, which return the entity's model struct and a typed
slice):

    approvesuggestedpost, err := client.ApproveSuggestedPost(nil).Create(map[string]any{/* fields */}, nil)
    if err != nil { /* handle */ }
    // approvesuggestedpost is the returned record

Only `Direct()` returns a response envelope — a `map[string]any` with
`"ok"`, `"status"`, `"headers"`, and `"data"` keys.

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
| `chat_id` | `string` |  |
| `description` | `string` |  |
| `error_code` | `int` |  |
| `message_id` | `int` |  |
| `ok` | `bool` |  |
| `parameter` | `map[string]any` |  |
| `result` | `any` |  |

#### Example: Create

```go
result, err := client.ApproveSuggestedPost(nil).Create(map[string]any{
    "chat_id": /* string */,
    "message_id": /* int */,
    "ok": /* bool */,
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
| `chat_id` | `string` |  |
| `description` | `string` |  |
| `error_code` | `int` |  |
| `message_id` | `int` |  |
| `ok` | `bool` |  |
| `parameter` | `map[string]any` |  |
| `result` | `any` |  |

#### Example: Create

```go
result, err := client.DeclineSuggestedPost(nil).Create(map[string]any{
    "chat_id": /* string */,
    "message_id": /* int */,
    "ok": /* bool */,
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
| `chat_id` | `string` |  |
| `description` | `string` |  |
| `error_code` | `int` |  |
| `message_thread_id` | `int` |  |
| `ok` | `bool` |  |
| `parameter` | `map[string]any` |  |
| `result` | `any` |  |

#### Example: Create

```go
result, err := client.DeleteForumTopic(nil).Create(map[string]any{
    "chat_id": /* string */,
    "message_thread_id": /* int */,
    "ok": /* bool */,
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
| `chat_id` | `string` |  |
| `description` | `string` |  |
| `error_code` | `int` |  |
| `icon_custom_emoji_id` | `string` |  |
| `message_thread_id` | `int` |  |
| `name` | `string` |  |
| `ok` | `bool` |  |
| `parameter` | `map[string]any` |  |
| `result` | `any` |  |

#### Example: Create

```go
result, err := client.EditForumTopic(nil).Create(map[string]any{
    "chat_id": /* string */,
    "message_thread_id": /* int */,
    "ok": /* bool */,
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
| `file_id` | `string` |  |

#### Example: Create

```go
result, err := client.File(nil).Create(map[string]any{
    "file_id": /* string */,
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
| `chat_id` | `string` |  |
| `icon_color` | `int` |  |
| `icon_custom_emoji_id` | `string` |  |
| `name` | `string` |  |

#### Example: Create

```go
result, err := client.ForumTopic(nil).Create(map[string]any{
    "chat_id": /* string */,
    "name": /* string */,
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
| `description` | `string` |  |
| `error_code` | `int` |  |
| `exclude_from_blockchain` | `bool` |  |
| `exclude_limited_non_upgradable` | `bool` |  |
| `exclude_limited_upgradable` | `bool` |  |
| `ok` | `bool` |  |
| `parameter` | `map[string]any` |  |
| `result` | `any` |  |

#### Example: Create

```go
result, err := client.GetBusinessAccountGift(nil).Create(map[string]any{
    "ok": /* bool */,
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
| `chat_id` | `string` |  |
| `description` | `string` |  |
| `error_code` | `int` |  |
| `ok` | `bool` |  |
| `parameter` | `map[string]any` |  |
| `result` | `any` |  |

#### Example: Create

```go
result, err := client.GetChatGift(nil).Create(map[string]any{
    "chat_id": /* string */,
    "ok": /* bool */,
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
| `description` | `string` |  |
| `error_code` | `int` |  |
| `ok` | `bool` |  |
| `parameter` | `map[string]any` |  |
| `result` | `any` |  |

#### Example: Load

```go
get_me, err := client.GetMe(nil).Load(nil, nil)
if err != nil {
    panic(err)
}
fmt.Println(get_me) // the loaded record
```

#### Example: Create

```go
result, err := client.GetMe(nil).Create(map[string]any{
    "ok": /* bool */,
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
| `description` | `string` |  |
| `error_code` | `int` |  |
| `ok` | `bool` |  |
| `parameter` | `map[string]any` |  |
| `result` | `any` |  |
| `user_id` | `int` |  |

#### Example: Create

```go
result, err := client.GetUserGift(nil).Create(map[string]any{
    "ok": /* bool */,
    "user_id": /* int */,
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
| `description` | `string` |  |
| `error_code` | `int` |  |
| `ok` | `bool` |  |
| `parameter` | `map[string]any` |  |
| `result` | `any` |  |
| `user_id` | `int` |  |

#### Example: Create

```go
result, err := client.GetUserProfileAudio(nil).Create(map[string]any{
    "ok": /* bool */,
    "user_id": /* int */,
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
| `chat_id` | `string` |  |
| `direct_messages_topic_id` | `int` |  |
| `disable_notification` | `bool` |  |
| `disable_web_page_preview` | `bool` |  |
| `from_chat_id` | `string` |  |
| `latitude` | `float64` |  |
| `longitude` | `float64` |  |
| `message_effect_id` | `string` |  |
| `message_id` | `int` |  |
| `message_thread_id` | `int` |  |
| `option` | `[]any` |  |
| `parse_mode` | `string` |  |
| `protect_content` | `bool` |  |
| `question` | `string` |  |
| `reply_to_message_id` | `int` |  |
| `text` | `string` |  |

#### Example: Create

```go
result, err := client.Message(nil).Create(map[string]any{
    "chat_id": /* string */,
    "from_chat_id": /* string */,
    "latitude": /* float64 */,
    "longitude": /* float64 */,
    "message_id": /* int */,
    "option": /* []any */,
    "question": /* string */,
    "text": /* string */,
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
| `chat_id` | `string` |  |
| `direct_messages_topic_id` | `int` |  |
| `from_chat_id` | `string` |  |
| `message_effect_id` | `string` |  |
| `message_id` | `int` |  |
| `message_thread_id` | `int` |  |

#### Example: Create

```go
result, err := client.MessageId(nil).Create(map[string]any{
    "chat_id": /* string */,
    "from_chat_id": /* string */,
    "message_id": /* int */,
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
| `can_delete_message` | `bool` |  |
| `can_edit_message` | `bool` |  |
| `can_manage_chat` | `bool` |  |
| `can_manage_direct_message` | `bool` |  |
| `can_post_message` | `bool` |  |
| `chat_id` | `string` |  |
| `description` | `string` |  |
| `error_code` | `int` |  |
| `ok` | `bool` |  |
| `parameter` | `map[string]any` |  |
| `result` | `any` |  |
| `user_id` | `int` |  |

#### Example: Create

```go
result, err := client.PromoteChatMember(nil).Create(map[string]any{
    "chat_id": /* string */,
    "ok": /* bool */,
    "user_id": /* int */,
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
| `description` | `string` |  |
| `error_code` | `int` |  |
| `ok` | `bool` |  |
| `parameter` | `map[string]any` |  |
| `result` | `any` |  |

#### Example: Create

```go
result, err := client.RemoveMyProfilePhoto(nil).Create(map[string]any{
    "ok": /* bool */,
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
| `chat_id` | `string` |  |
| `description` | `string` |  |
| `error_code` | `int` |  |
| `ok` | `bool` |  |
| `parameter` | `map[string]any` |  |
| `result` | `any` |  |
| `story_id` | `int` |  |

#### Example: Create

```go
result, err := client.RepostStory(nil).Create(map[string]any{
    "chat_id": /* string */,
    "ok": /* bool */,
    "story_id": /* int */,
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
| `action` | `string` |  |
| `chat_id` | `string` |  |
| `description` | `string` |  |
| `error_code` | `int` |  |
| `message_thread_id` | `int` |  |
| `ok` | `bool` |  |
| `parameter` | `map[string]any` |  |
| `result` | `any` |  |

#### Example: Create

```go
result, err := client.SendChatAction(nil).Create(map[string]any{
    "action": /* string */,
    "chat_id": /* string */,
    "ok": /* bool */,
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
| `chat_id` | `string` |  |
| `description` | `string` |  |
| `error_code` | `int` |  |
| `message_thread_id` | `int` |  |
| `ok` | `bool` |  |
| `parameter` | `map[string]any` |  |
| `result` | `any` |  |
| `text` | `string` |  |

#### Example: Create

```go
result, err := client.SendMessageDraft(nil).Create(map[string]any{
    "chat_id": /* string */,
    "ok": /* bool */,
    "text": /* string */,
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
| `description` | `string` |  |
| `error_code` | `int` |  |
| `ok` | `bool` |  |
| `parameter` | `map[string]any` |  |
| `result` | `any` |  |

#### Example: Create

```go
result, err := client.SetMyProfilePhoto(nil).Create(map[string]any{
    "ok": /* bool */,
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
| `chat_id` | `string` |  |
| `description` | `string` |  |
| `error_code` | `int` |  |
| `message_thread_id` | `int` |  |
| `ok` | `bool` |  |
| `parameter` | `map[string]any` |  |
| `result` | `any` |  |

#### Example: Create

```go
result, err := client.UnpinAllForumTopicMessage(nil).Create(map[string]any{
    "chat_id": /* string */,
    "message_thread_id": /* int */,
    "ok": /* bool */,
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
| `allowed_update` | `[]any` |  |
| `description` | `string` |  |
| `error_code` | `int` |  |
| `limit` | `int` |  |
| `offset` | `int` |  |
| `ok` | `bool` |  |
| `parameter` | `map[string]any` |  |
| `result` | `[]any` |  |
| `timeout` | `int` |  |

#### Example: List

```go
updates, err := client.Update(nil).List(nil, nil)
if err != nil {
    panic(err)
}
fmt.Println(updates) // the array of records
```

#### Example: Create

```go
result, err := client.Update(nil).Create(map[string]any{
    "ok": /* bool */,
}, nil)
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

Entity instances are stateful. After a successful `Create`, the entity
stores the returned data and match criteria internally.

```go
approvesuggestedpost := client.ApproveSuggestedPost(nil)
approvesuggestedpost.Create(map[string]any{"chat_id": "example", "message_id": 1, "ok": true}, nil)

// approvesuggestedpost.Data() now returns the approvesuggestedpost data from the last create
// approvesuggestedpost.Match() returns the last match criteria
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
