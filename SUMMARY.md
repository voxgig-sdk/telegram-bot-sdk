# Telegram Bot API

The Bot API is an HTTP-based interface created for developers keen on building bots for Telegram.

## Start here

This guide introduces the API, the client libraries, and the companion tools in this repository. Start with the API capabilities, choose a client for your application, and use the linked reference when you need exact request and response details.

The selected API surface contains 21 entities and 32 HTTP routes. There are 6 SDK targets and 2 companion tools.

An entity groups related API operations. An operation can have several routes with different inputs or authentication requirements. The SDK exposes the entity and its operations using the conventions of the selected language.

## What the API provides

### ApproveSuggestedPost

Results: Suggested post approved successfully.

SDK operations: `create`.

Key fields to recognise:

- `description`: Human-readable description of the result
- `error_code`: Error code
- `ok`: If true, the request was successful
- `result`: The result of the query

### DeclineSuggestedPost

Results: Suggested post declined successfully.

SDK operations: `create`.

Key fields to recognise:

- `description`: Human-readable description of the result
- `error_code`: Error code
- `ok`: If true, the request was successful
- `result`: The result of the query

### DeleteForumTopic

Results: Forum topic deleted successfully.

SDK operations: `create`.

Key fields to recognise:

- `description`: Human-readable description of the result
- `error_code`: Error code
- `ok`: If true, the request was successful
- `result`: The result of the query

### EditForumTopic

Results: Forum topic edited successfully.

SDK operations: `create`.

Key fields to recognise:

- `description`: Human-readable description of the result
- `error_code`: Error code
- `ok`: If true, the request was successful
- `result`: The result of the query

### File

Results: File info retrieved successfully.

SDK operations: `create`.

### ForumTopic

Results: Forum topic created successfully.

SDK operations: `create`.

### GetBusinessAccountGift

Results: Business account gifts retrieved successfully.

SDK operations: `create`.

Key fields to recognise:

- `description`: Human-readable description of the result
- `error_code`: Error code
- `ok`: If true, the request was successful
- `result`: The result of the query

### GetChatGift

Results: Chat gifts retrieved successfully.

SDK operations: `create`.

Key fields to recognise:

- `description`: Human-readable description of the result
- `error_code`: Error code
- `ok`: If true, the request was successful
- `result`: The result of the query

### GetMe

Results: Successful response.

SDK operations: `create`, `load`.

Key fields to recognise:

- `description`: Human-readable description of the result
- `error_code`: Error code
- `ok`: If true, the request was successful
- `result`: The result of the query

### GetUserGift

Results: User gifts retrieved successfully.

SDK operations: `create`.

Key fields to recognise:

- `description`: Human-readable description of the result
- `error_code`: Error code
- `ok`: If true, the request was successful
- `result`: The result of the query

### GetUserProfileAudio

Results: User profile audios retrieved successfully.

SDK operations: `create`.

Key fields to recognise:

- `description`: Human-readable description of the result
- `error_code`: Error code
- `ok`: If true, the request was successful
- `result`: The result of the query

### Message

Results: Message forwarded successfully; Animation sent successfully; Audio sent successfully; Document sent successfully; Location sent successfully; Message sent successfully; Photo sent successfully; Poll sent successfully; Sticker sent successfully; Video sent successfully.

SDK operations: `create`.

Key fields to recognise:

- `chat_id`: Unique identifier for the target chat or username
- `direct_messages_topic_id`: Unique identifier for the target direct messages topic
- `disable_notification`: Sends the message silently
- `disable_web_page_preview`: Disables link previews for links in this message
- `message_effect_id`: Unique identifier of the message effect to be added to the message

### MessageId

Results: Message copied successfully.

SDK operations: `create`.

### PromoteChatMember

Results: Chat member promoted successfully.

SDK operations: `create`.

Key fields to recognise:

- `description`: Human-readable description of the result
- `error_code`: Error code
- `ok`: If true, the request was successful
- `result`: The result of the query

### RemoveMyProfilePhoto

Results: Profile photo removed successfully.

SDK operations: `create`.

Key fields to recognise:

- `description`: Human-readable description of the result
- `error_code`: Error code
- `ok`: If true, the request was successful
- `result`: The result of the query

### RepostStory

Results: Story reposted successfully.

SDK operations: `create`.

Key fields to recognise:

- `description`: Human-readable description of the result
- `error_code`: Error code
- `ok`: If true, the request was successful
- `result`: The result of the query

### SendChatAction

Results: Chat action sent successfully.

SDK operations: `create`.

Key fields to recognise:

- `description`: Human-readable description of the result
- `error_code`: Error code
- `ok`: If true, the request was successful
- `result`: The result of the query

### SendMessageDraft

Results: Draft message sent successfully.

SDK operations: `create`.

Key fields to recognise:

- `description`: Human-readable description of the result
- `error_code`: Error code
- `ok`: If true, the request was successful
- `result`: The result of the query

### SetMyProfilePhoto

Results: Profile photo set successfully.

SDK operations: `create`.

Key fields to recognise:

- `description`: Human-readable description of the result
- `error_code`: Error code
- `ok`: If true, the request was successful
- `result`: The result of the query

### UnpinAllForumTopicMessage

Results: Messages unpinned successfully.

SDK operations: `create`.

Key fields to recognise:

- `description`: Human-readable description of the result
- `error_code`: Error code
- `ok`: If true, the request was successful
- `result`: The result of the query

### Update

Results: Array of Update objects.

SDK operations: `create`, `list`.

Key fields to recognise:

- `description`: Human-readable description of the result
- `error_code`: Error code
- `ok`: If true, the request was successful
- `result`: The result of the query

### Route map

Use this map to locate a capability. Consult the entity reference before supplying request data; routes for the same operation can require different fields.

| Entity | SDK operation | HTTP route | Authentication |
| --- | --- | --- | --- |
| ApproveSuggestedPost | `create` | `POST /approveSuggestedPost` | Required |
| DeclineSuggestedPost | `create` | `POST /declineSuggestedPost` | Required |
| DeleteForumTopic | `create` | `POST /deleteForumTopic` | Required |
| EditForumTopic | `create` | `POST /editForumTopic` | Required |
| File | `create` | `POST /getFile` | Required |
| ForumTopic | `create` | `POST /createForumTopic` | Required |
| GetBusinessAccountGift | `create` | `POST /getBusinessAccountGifts` | Required |
| GetChatGift | `create` | `POST /getChatGifts` | Required |
| GetMe | `create` | `POST /getMe` | Required |
| GetMe | `load` | `GET /getMe` | Required |
| GetUserGift | `create` | `POST /getUserGifts` | Required |
| GetUserProfileAudio | `create` | `POST /getUserProfileAudios` | Required |
| Message | `create` | `POST /forwardMessage` | Required |
| Message | `create` | `POST /sendAnimation` | Required |
| Message | `create` | `POST /sendAudio` | Required |
| Message | `create` | `POST /sendDocument` | Required |
| Message | `create` | `POST /sendLocation` | Required |
| Message | `create` | `POST /sendMessage` | Required |
| Message | `create` | `POST /sendPhoto` | Required |
| Message | `create` | `POST /sendPoll` | Required |
| Message | `create` | `POST /sendSticker` | Required |
| Message | `create` | `POST /sendVideo` | Required |
| MessageId | `create` | `POST /copyMessage` | Required |
| PromoteChatMember | `create` | `POST /promoteChatMember` | Required |
| RemoveMyProfilePhoto | `create` | `POST /removeMyProfilePhoto` | Required |
| RepostStory | `create` | `POST /repostStory` | Required |
| SendChatAction | `create` | `POST /sendChatAction` | Required |
| SendMessageDraft | `create` | `POST /sendMessageDraft` | Required |
| SetMyProfilePhoto | `create` | `POST /setMyProfilePhoto` | Required |
| UnpinAllForumTopicMessage | `create` | `POST /unpinAllForumTopicMessages` | Required |
| Update | `create` | `POST /getUpdates` | Required |
| Update | `list` | `GET /getUpdates` | Required |

## Connect to the API

- Telegram Bot API Server: `https://api.telegram.org/bot{token}`

The default credential is sent in the `token` path.

Bot authentication token provided in the server URL path variable

Check authentication for the route you plan to call. A route that declares no authentication can be used without credentials; this does not change the requirements of other routes. Keep credentials in environment variables or a configured secret provider, and keep them out of source control and logs.

## Make a first request

1. Choose the API server and an operation that matches your task.
2. Check the operation’s required input and authentication. Use values valid for your account and environment.
3. Send one request and inspect the returned data before adding retries, concurrency, or a larger batch.

For an SDK call, install or build the chosen client, create a client instance with its documented configuration, and call the required entity operation. Language references describe the argument shape, asynchronous behaviour, and returned values.

## Choose an SDK

Choose the language already used by your application or service. The clients represent the same API model, while package setup, naming, and return types follow each language. Check the selected client’s reference and tests before integrating it into an existing application.

| Client | Repository directory | Distribution |
| --- | --- | --- |
| Golang | `go/` | Build from source |
| Lua | `lua/` | Build from source |
| PHP | `php/` | Build from source |
| Python | `py/` | Build from source |
| Ruby | `rb/` | Build from source |
| TypeScript | `ts/` | Build from source |

Build-from-source entries are not marked as published in the project model. Follow the build instructions in that target’s README, then consume the resulting package using your language’s local dependency mechanism. Published entries give the installation command recorded for that client.

## Companion tools

These targets provide another way to use the API. Their available commands or tools can cover a smaller set of operations than the client libraries.

### Go CLI

Use the command-line interface for shell-based tasks and scripts.

Repository directory: `go-cli/`. Not published. Build from the go-cli directory.


### Go MCP server

Use the MCP server to expose supported API operations to an MCP client.

Repository directory: `go-mcp/`. Not published. Build from the go-mcp directory.

- `telegram-bot_list`: List records for an entity. Supported entities: `update`.
- `telegram-bot_load`: Load one record for an entity. Supported entities: `get_me`.

## Operational features

Features supply behaviour around API calls, such as request handling, diagnostics, or local testing. Inclusion in this project does not mean a feature is enabled at runtime. Check the selected SDK’s supported features and configuration defaults, then enable the behaviour your application needs.

- `ratelimit`: Client-side rate limiting via a token bucket
- `retry`: Automatic retry of transient failures with exponential backoff
- `test`: In-memory mock transport for testing without a live server
- `timeout`: Per-request timeout with transport abort

Start with the default client configuration. Add request limits and diagnostics as needed, test error paths, and review retry behaviour before using operations that change data. A retry can repeat an operation unless the API provides a suitable guarantee.

## Continue with the documentation

- Follow the first-call guide for the setup sequence.
- Read the authentication guide before using protected routes.
- Use the API reference for request schemas, response formats, and status codes.
- Check the chosen SDK or companion tool reference for its configuration and supported operations.

