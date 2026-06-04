# TelegramBot SDK

HTTP-based interface for building bots that send messages, manage chats, and receive updates on Telegram

> TypeScript, Python, PHP, Golang, Ruby, Lua SDKs, a CLI, an interactive REPL, and an MCP server for AI agents — all generated from one OpenAPI spec by [@voxgig/sdkgen](https://github.com/voxgig/sdkgen).

## About Telegram Bot API

The Telegram Bot API is an HTTP interface published by [Telegram](https://telegram.org) for developers building automated accounts (bots) on the Telegram messaging platform. Bots are special Telegram accounts controlled by code rather than a person, and the API exposes the operations a bot can perform on a user's behalf.

What you get from the API:

- Send and edit messages, including text, media, polls, stickers, and other content types
- Receive incoming events either by long polling (`getUpdates`) or by registering a webhook (`setWebhook`)
- Manage chats, groups, channels, forum topics, and chat member permissions
- Read and update bot and user profile data, including profile photos and profile audio
- Interact with Telegram's gifts system for user and business accounts

All requests use the base URL `https://api.telegram.org/bot{token}/METHOD_NAME`, where `{token}` is the bot's authentication token issued by [@BotFather](https://t.me/BotFather). Methods accept GET or POST with query-string, application/json, application/x-www-form-urlencoded, or multipart/form-data payloads, and every response is a JSON object with an `ok` flag and either a `result` or an `error_code`/`description`. Telegram does not publish hard numerical rate limits, but the platform enforces flood-control limits per chat and globally; clients should respect `retry_after` values returned in 429 responses.

## Try it

**TypeScript**
```bash
npm install telegram-bot
```

**Python**
```bash
pip install telegram-bot-sdk
```

**PHP**
```bash
composer require voxgig/telegram-bot-sdk
```

**Golang**
```bash
go get github.com/voxgig-sdk/telegram-bot-sdk/go
```

**Ruby**
```bash
gem install telegram-bot-sdk
```

**Lua**
```bash
luarocks install telegram-bot-sdk
```

## 30-second quickstart

### TypeScript

```ts
import { TelegramBotSDK } from 'telegram-bot'

const client = new TelegramBotSDK({})

```

See the [TypeScript README](ts/README.md) for the
full guide, or scroll down for the same example in other languages.

## What's in the box

| Surface | Use it for | Path |
| --- | --- | --- |
| **SDK** (TypeScript, Python, PHP, Golang, Ruby, Lua) | App integration | `ts/` `py/` `php/` `go/` `rb/` `lua/` |
| **CLI** | Scripts, CI, ops, one-off API calls | `go-cli/` |
| **MCP server** | AI agents (Claude, Cursor, Cline) | `go-mcp/` |

## Use it from an AI agent (MCP)

The generated MCP server exposes every operation in this SDK as an
[MCP](https://modelcontextprotocol.io) tool that Claude, Cursor or Cline
can call directly. Build and register it:

```bash
cd go-mcp && go build -o telegram-bot-mcp .
```

Then add it to your agent's MCP config (Claude Desktop, Cursor, etc.):

```json
{
  "mcpServers": {
    "telegram-bot": {
      "command": "/abs/path/to/telegram-bot-mcp"
    }
  }
}
```

## Entities

The API exposes 21 entities:

| Entity | Description | API path |
| --- | --- | --- |
| **ApproveSuggestedPost** | Approves a post that was suggested for publication in a connected channel; corresponds to the `approveSuggestedPost` method. | `/approveSuggestedPost` |
| **DeclineSuggestedPost** | Declines a post suggested for publication in a connected channel; corresponds to the `declineSuggestedPost` method. | `/declineSuggestedPost` |
| **DeleteForumTopic** | Deletes a forum topic along with all of its messages in a forum-enabled supergroup (`deleteForumTopic`). | `/deleteForumTopic` |
| **EditForumTopic** | Edits the name and icon of an existing forum topic in a supergroup (`editForumTopic`). | `/editForumTopic` |
| **File** | Represents an uploaded or downloadable file that the bot can fetch via `getFile`; resolved files are served from `https://api.telegram.org/file/bot{token}/<file_path>`. | `/getFile` |
| **ForumTopic** | A topic inside a forum-enabled supergroup, created and managed through `createForumTopic`, `editForumTopic`, `closeForumTopic`, and related methods. | `/createForumTopic` |
| **GetBusinessAccountGift** | Retrieves the gifts owned by a connected Telegram Business account. | `/getBusinessAccountGifts` |
| **GetChatGift** | Retrieves gifts attached to a chat (for chats that can receive gifts). | `/getChatGifts` |
| **GetMe** | Returns the bot's own User object, including id, username, and capability flags (`getMe`). | `/getMe` |
| **GetUserGift** | Retrieves gifts owned by a specific user, used in the gifts/business gift flow. | `/getUserGifts` |
| **GetUserProfileAudio** | Fetches a user's profile audio attachment, the audio counterpart to a profile photo. | `/getUserProfileAudios` |
| **Message** | A single message in a chat — text, media, service, or otherwise — sent or received by the bot via methods such as `sendMessage`, `editMessageText`, and `forwardMessage`. | `/forwardMessage` |
| **MessageId** | A lightweight reference object that contains only the identifier of a message, returned by methods like `copyMessage` and `copyMessages`. | `/copyMessage` |
| **PromoteChatMember** | Promotes or demotes a user in a supergroup or channel and sets their administrator privileges (`promoteChatMember`). | `/promoteChatMember` |
| **RemoveMyProfilePhoto** | Removes the bot's current profile photo, the counterpart to `setMyProfilePhoto`. | `/removeMyProfilePhoto` |
| **RepostStory** | Reposts an existing story to the bot's or a connected business account's profile. | `/repostStory` |
| **SendChatAction** | Tells the user that the bot is doing something (typing, uploading a photo, recording audio, etc.) via `sendChatAction`. | `/sendChatAction` |
| **SendMessageDraft** | Sends a message draft on behalf of a connected business account, allowing the user to review and send it. | `/sendMessageDraft` |
| **SetMyProfilePhoto** | Sets a new profile photo for the bot. | `/setMyProfilePhoto` |
| **UnpinAllForumTopicMessage** | Unpins every pinned message inside a specific forum topic (`unpinAllForumTopicMessages`). | `/unpinAllForumTopicMessages` |
| **Update** | An incoming event delivered by `getUpdates` or to the configured webhook; carries one of several optional payloads such as `message`, `edited_message`, `callback_query`, or `business_message`. | `/getUpdates` |

Each entity supports the following operations where available: **load**,
**list**, **create**, **update**, and **remove**.

## Quickstart in other languages

### Python

```python
from telegrambot_sdk import TelegramBotSDK

client = TelegramBotSDK({})

```

### PHP

```php
<?php
require_once 'telegrambot_sdk.php';

$client = new TelegramBotSDK([]);

```

### Golang

```go
import sdk "github.com/voxgig-sdk/telegram-bot-sdk/go"

client := sdk.NewTelegramBotSDK(map[string]any{})

```

### Ruby

```ruby
require_relative "TelegramBot_sdk"

client = TelegramBotSDK.new({})

```

### Lua

```lua
local sdk = require("telegram-bot_sdk")

local client = sdk.new({})

```

## Unit testing in offline mode

Every SDK ships a test mode that swaps the HTTP transport for an
in-memory mock, so unit tests run offline.

### TypeScript

```ts
const client = TelegramBotSDK.test()
const result = await client.ApproveSuggestedPost().load({ id: 'test01' })
// result.ok === true, result.data contains mock data
```

### Python

```python
client = TelegramBotSDK.test(None, None)
result, err = client.ApproveSuggestedPost(None).load(
    {"id": "test01"}, None
)
```

### PHP

```php
$client = TelegramBotSDK::test(null, null);
[$result, $err] = $client->ApproveSuggestedPost(null)->load(
    ["id" => "test01"], null
);
```

### Golang

```go
client := sdk.TestSDK(nil, nil)
result, err := client.ApproveSuggestedPost(nil).Load(
    map[string]any{"id": "test01"}, nil,
)
```

### Ruby

```ruby
client = TelegramBotSDK.test(nil, nil)
result, err = client.ApproveSuggestedPost(nil).load(
  { "id" => "test01" }, nil
)
```

### Lua

```lua
local client = sdk.test(nil, nil)
local result, err = client:ApproveSuggestedPost(nil):load(
  { id = "test01" }, nil
)
```

## How it works

Every SDK call runs the same five-stage pipeline:

1. **Point** — resolve the API endpoint from the operation definition.
2. **Spec** — build the HTTP specification (URL, method, headers, body).
3. **Request** — send the HTTP request.
4. **Response** — receive and parse the response.
5. **Result** — extract the result data for the caller.

A feature hook fires at each stage (e.g. `PrePoint`, `PreSpec`,
`PreRequest`), so features can inspect or modify the pipeline without
forking the SDK.

### Features

| Feature | Purpose |
| --- | --- |
| **TestFeature** | In-memory mock transport for testing without a live server |

Pass custom features via the `extend` option at construction time.

### Direct and Prepare

For endpoints the entity model doesn't cover, use the low-level methods:

- **`direct(fetchargs)`** — build and send an HTTP request in one step.
- **`prepare(fetchargs)`** — build the request without sending it.

Both accept a map with `path`, `method`, `params`, `query`,
`headers`, and `body`. See the [How-to guides](#how-to-guides) below.

## How-to guides

### Make a direct API call

When the entity interface does not cover an endpoint, use `direct`:

**TypeScript:**
```ts
const result = await client.direct({
  path: '/api/resource/{id}',
  method: 'GET',
  params: { id: 'example' },
})
console.log(result.data)
```

**Python:**
```python
result, err = client.direct({
    "path": "/api/resource/{id}",
    "method": "GET",
    "params": {"id": "example"},
})
```

**PHP:**
```php
[$result, $err] = $client->direct([
    "path" => "/api/resource/{id}",
    "method" => "GET",
    "params" => ["id" => "example"],
]);
```

**Go:**
```go
result, err := client.Direct(map[string]any{
    "path":   "/api/resource/{id}",
    "method": "GET",
    "params": map[string]any{"id": "example"},
})
```

**Ruby:**
```ruby
result, err = client.direct({
  "path" => "/api/resource/{id}",
  "method" => "GET",
  "params" => { "id" => "example" },
})
```

**Lua:**
```lua
local result, err = client:direct({
  path = "/api/resource/{id}",
  method = "GET",
  params = { id = "example" },
})
```

## Per-language documentation

- [TypeScript](ts/README.md)
- [Python](py/README.md)
- [PHP](php/README.md)
- [Golang](go/README.md)
- [Ruby](rb/README.md)
- [Lua](lua/README.md)

## Using the Telegram Bot API

- Upstream: [https://core.telegram.org/bots](https://core.telegram.org/bots)
- API docs: [https://core.telegram.org/bots/api](https://core.telegram.org/bots/api)

- Use of the API is governed by Telegram's Bot API terms and the broader Telegram Terms of Service.
- Bots are identified by tokens issued through [@BotFather](https://t.me/BotFather); tokens must be kept secret.
- No fee is charged by Telegram for use of the Bot API; usage is bound by Telegram's acceptable-use rules for bots and content.

---

Generated from the Telegram Bot API OpenAPI spec by [@voxgig/sdkgen](https://github.com/voxgig/sdkgen).
