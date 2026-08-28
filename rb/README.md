# TelegramBot Ruby SDK



The Ruby SDK for the TelegramBot API — an entity-oriented client using idiomatic Ruby conventions.

The SDK exposes the API as capitalised, semantic **Entities** — for example `client.ApproveSuggestedPost` — with named operations (`list`/`load`/`create`) instead of raw URL paths and query strings. Working with resources and verbs keeps call sites self-describing and reduces cognitive load.

> Other languages, the CLI, and MCP server live alongside this one — see
> the [top-level README](../README.md).


## Install
This package is not yet published to RubyGems. Install it from the
GitHub release tag (`rb/vX.Y.Z`):

- Releases: [https://github.com/voxgig-sdk/telegram-bot-sdk/releases](https://github.com/voxgig-sdk/telegram-bot-sdk/releases)


## Tutorial: your first API call

This tutorial walks through creating a client, listing entities, and
loading a specific record.

### 1. Create a client

```ruby
require_relative "TelegramBot_sdk"

client = TelegramBotSDK.new({
  "apikey" => ENV["TELEGRAM_BOT_APIKEY"],
})
```

### 4. Create, update, and remove

```ruby
# create returns the ENTITY — call data_get for the created ApproveSuggestedPost record.
created = client.ApproveSuggestedPost.create({ "chat_id" => "example_chat_id", "message_id" => 1, "ok" => true })

```


## Error handling

Entity operations raise on failure, so rescue them:

```ruby
begin
  getme = client.GetMe.load()
rescue => err
  warn "load failed: #{err}"
end
```

`direct` does **not** raise — it returns the result hash. Branch on
`ok`; on failure `status` holds the HTTP status (for error responses) and
`err` holds a transport error, so read both defensively:

```ruby
result = client.direct({
  "path" => "/api/resource/{id}",
  "method" => "GET",
  "params" => { "id" => "example_id" },
})

warn "request failed: #{result["err"] || "HTTP #{result["status"]}"}" unless result["ok"]
```


## How-to guides

### Make a direct HTTP request

For endpoints not covered by entity methods:

```ruby
result = client.direct({
  "path" => "/api/resource/{id}",
  "method" => "GET",
  "params" => { "id" => "example" },
})

if result["ok"]
  puts result["status"]  # 200
  puts result["data"]    # response body
else
  # On an HTTP error status there is no err (only a transport failure sets
  # it), so fall back to the status code.
  warn(result["err"] || "HTTP #{result["status"]}")
end
```

### Prepare a request without sending it

```ruby
begin
  fetchdef = client.prepare({
    "path" => "/api/resource/{id}",
    "method" => "DELETE",
    "params" => { "id" => "example" },
  })
  puts fetchdef["url"]
  puts fetchdef["method"]
  puts fetchdef["headers"]
rescue => err
  warn "prepare failed: #{err}"
end
```

### Use test mode

Create a mock client for unit testing — no server required:

```ruby
client = TelegramBotSDK.test

# Entity ops return the ENTITY (raises on error);
# call data_get for the mock record.
getme = client.GetMe.load()
puts getme
```

### Use a custom fetch function

Replace the HTTP transport with your own function:

```ruby
mock_fetch = ->(url, init) {
  return {
    "status" => 200,
    "statusText" => "OK",
    "headers" => {},
    "json" => ->() { { "id" => "mock01" } },
  }, nil
}

client = TelegramBotSDK.new({
  "base" => "http://localhost:8080",
  "system" => {
    "fetch" => mock_fetch,
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
cd rb && ruby -Itest -e "Dir['test/*_test.rb'].each { |f| require_relative f }"
```


## Reference

### TelegramBotSDK

```ruby
require_relative "TelegramBot_sdk"
client = TelegramBotSDK.new(options)
```

Creates a new SDK client.

| Option | Type | Description |
| --- | --- | --- |
| `apikey` | `String` | API key for authentication. |
| `base` | `String` | Base URL of the API server. |
| `prefix` | `String` | URL path prefix prepended to all requests. |
| `suffix` | `String` | URL path suffix appended to all requests. |
| `feature` | `Hash` | Feature activation flags. |
| `extend` | `Hash` | Additional Feature instances to load. |
| `system` | `Hash` | System overrides (e.g. custom `fetch` lambda). |

### test

```ruby
client = TelegramBotSDK.test(testopts, sdkopts)
```

Creates a test-mode client with mock transport. Both arguments may be `nil`.

### TelegramBotSDK methods

| Method | Signature | Description |
| --- | --- | --- |
| `options_map` | `() -> Hash` | Deep copy of current SDK options. |
| `get_utility` | `() -> Utility` | Copy of the SDK utility object. |
| `prepare` | `(fetchargs) -> Hash` | Build an HTTP request definition without sending. Raises on error. |
| `direct` | `(fetchargs) -> Hash` | Build and send an HTTP request. Returns a result hash (`result["ok"]`); does not raise. |
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
| `load` | `(reqmatch, ctrl) -> any` | Load a single entity by match criteria. Raises on error. |
| `list` | `(reqmatch = nil, ctrl) -> Array` | List entities matching the criteria (call with no argument to list all). Raises on error. |
| `create` | `(reqdata, ctrl) -> any` | Create a new entity. Raises on error. |
| `data_get` | `() -> Hash` | Get entity data. |
| `data_set` | `(data)` | Set entity data. |
| `match_get` | `() -> Hash` | Get entity match criteria. |
| `match_set` | `(match)` | Set entity match criteria. |
| `make` | `() -> Entity` | Create a new instance with the same options. |
| `get_name` | `() -> String` | Return the entity name. |

### Result shape

Entity operations return the result data directly. On failure they
raise a `TelegramBotError` (a `StandardError` subclass), so wrap
calls in `begin`/`rescue` where you need to handle errors.

The `direct` escape hatch is the exception: it never raises and instead
returns a result `Hash` with these keys:

| Key | Type | Description |
| --- | --- | --- |
| `ok` | `Boolean` | `true` if the HTTP status is 2xx. |
| `status` | `Integer` | HTTP status code. |
| `headers` | `Hash` | Response headers. |
| `data` | `any` | Parsed JSON response body. |
| `err` | `Error` | Present when `ok` is `false`. |

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

Create an instance: `approve_suggested_post = client.ApproveSuggestedPost`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | `String` |  |
| `description` | `String` | Human-readable description of the result |
| `error_code` | `Integer` | Error code |
| `message_id` | `Integer` |  |
| `ok` | `Boolean` | If true, the request was successful |
| `parameters` | `Hash` |  |
| `result` | `Array` | The result of the query |

#### Example: Create

```ruby
approve_suggested_post = client.ApproveSuggestedPost.create({
  "chat_id" => "example_chat_id", # String
  "message_id" => 1, # Integer
  "ok" => true, # Boolean
})
```


### DeclineSuggestedPost

Create an instance: `decline_suggested_post = client.DeclineSuggestedPost`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | `String` |  |
| `description` | `String` | Human-readable description of the result |
| `error_code` | `Integer` | Error code |
| `message_id` | `Integer` |  |
| `ok` | `Boolean` | If true, the request was successful |
| `parameters` | `Hash` |  |
| `result` | `Array` | The result of the query |

#### Example: Create

```ruby
decline_suggested_post = client.DeclineSuggestedPost.create({
  "chat_id" => "example_chat_id", # String
  "message_id" => 1, # Integer
  "ok" => true, # Boolean
})
```


### DeleteForumTopic

Create an instance: `delete_forum_topic = client.DeleteForumTopic`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | `String` |  |
| `description` | `String` | Human-readable description of the result |
| `error_code` | `Integer` | Error code |
| `message_thread_id` | `Integer` |  |
| `ok` | `Boolean` | If true, the request was successful |
| `parameters` | `Hash` |  |
| `result` | `Array` | The result of the query |

#### Example: Create

```ruby
delete_forum_topic = client.DeleteForumTopic.create({
  "chat_id" => "example_chat_id", # String
  "message_thread_id" => 1, # Integer
  "ok" => true, # Boolean
})
```


### EditForumTopic

Create an instance: `edit_forum_topic = client.EditForumTopic`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | `String` |  |
| `description` | `String` | Human-readable description of the result |
| `error_code` | `Integer` | Error code |
| `icon_custom_emoji_id` | `String` |  |
| `message_thread_id` | `Integer` |  |
| `name` | `String` |  |
| `ok` | `Boolean` | If true, the request was successful |
| `parameters` | `Hash` |  |
| `result` | `Array` | The result of the query |

#### Example: Create

```ruby
edit_forum_topic = client.EditForumTopic.create({
  "chat_id" => "example_chat_id", # String
  "message_thread_id" => 1, # Integer
  "ok" => true, # Boolean
})
```


### File

Create an instance: `file = client.File`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `file_id` | `String` |  |

#### Example: Create

```ruby
file = client.File.create({
  "file_id" => "example_file_id", # String
})
```


### ForumTopic

Create an instance: `forum_topic = client.ForumTopic`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | `String` |  |
| `icon_color` | `Integer` |  |
| `icon_custom_emoji_id` | `String` |  |
| `name` | `String` |  |

#### Example: Create

```ruby
forum_topic = client.ForumTopic.create({
  "chat_id" => "example_chat_id", # String
  "name" => "example_name", # String
})
```


### GetBusinessAccountGift

Create an instance: `get_business_account_gift = client.GetBusinessAccountGift`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `description` | `String` | Human-readable description of the result |
| `error_code` | `Integer` | Error code |
| `exclude_from_blockchain` | `Boolean` |  |
| `exclude_limited_non_upgradable` | `Boolean` |  |
| `exclude_limited_upgradable` | `Boolean` |  |
| `ok` | `Boolean` | If true, the request was successful |
| `parameters` | `Hash` |  |
| `result` | `Array` | The result of the query |

#### Example: Create

```ruby
get_business_account_gift = client.GetBusinessAccountGift.create({
  "ok" => true, # Boolean
})
```


### GetChatGift

Create an instance: `get_chat_gift = client.GetChatGift`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | `String` |  |
| `description` | `String` | Human-readable description of the result |
| `error_code` | `Integer` | Error code |
| `ok` | `Boolean` | If true, the request was successful |
| `parameters` | `Hash` |  |
| `result` | `Array` | The result of the query |

#### Example: Create

```ruby
get_chat_gift = client.GetChatGift.create({
  "chat_id" => "example_chat_id", # String
  "ok" => true, # Boolean
})
```


### GetMe

Create an instance: `get_me = client.GetMe`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |
| `load(match)` | Load a single entity by match criteria. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `description` | `String` | Human-readable description of the result |
| `error_code` | `Integer` | Error code |
| `ok` | `Boolean` | If true, the request was successful |
| `parameters` | `Hash` |  |
| `result` | `Array` | The result of the query |

#### Example: Load

```ruby
# load returns the ENTITY — call data_get for the GetMe record (raises on error).
get_me = client.GetMe.load()
```

#### Example: Create

```ruby
get_me = client.GetMe.create({
  "ok" => true, # Boolean
})
```


### GetUserGift

Create an instance: `get_user_gift = client.GetUserGift`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `description` | `String` | Human-readable description of the result |
| `error_code` | `Integer` | Error code |
| `ok` | `Boolean` | If true, the request was successful |
| `parameters` | `Hash` |  |
| `result` | `Array` | The result of the query |
| `user_id` | `Integer` |  |

#### Example: Create

```ruby
get_user_gift = client.GetUserGift.create({
  "ok" => true, # Boolean
  "user_id" => 1, # Integer
})
```


### GetUserProfileAudio

Create an instance: `get_user_profile_audio = client.GetUserProfileAudio`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `description` | `String` | Human-readable description of the result |
| `error_code` | `Integer` | Error code |
| `ok` | `Boolean` | If true, the request was successful |
| `parameters` | `Hash` |  |
| `result` | `Array` | The result of the query |
| `user_id` | `Integer` |  |

#### Example: Create

```ruby
get_user_profile_audio = client.GetUserProfileAudio.create({
  "ok" => true, # Boolean
  "user_id" => 1, # Integer
})
```


### Message

Create an instance: `message = client.Message`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | `String` | Unique identifier for the target chat or username |
| `direct_messages_topic_id` | `Integer` | Unique identifier for the target direct messages topic |
| `disable_notification` | `Boolean` | Sends the message silently |
| `disable_web_page_preview` | `Boolean` | Disables link previews for links in this message |
| `from_chat_id` | `String` |  |
| `latitude` | `Float` |  |
| `longitude` | `Float` |  |
| `message_effect_id` | `String` | Unique identifier of the message effect to be added to the message |
| `message_id` | `Integer` |  |
| `message_thread_id` | `Integer` | Unique identifier for the target message thread (topic) of the forum |
| `options` | `Array` |  |
| `parse_mode` | `String` | Mode for parsing entities in the message text |
| `protect_content` | `Boolean` | Protects the contents of the sent message from forwarding and saving |
| `question` | `String` |  |
| `reply_to_message_id` | `Integer` | If the message is a reply, ID of the original message |
| `text` | `String` | Text of the message to be sent |

#### Example: Create

```ruby
message = client.Message.create({
  "chat_id" => "example_chat_id", # String
  "from_chat_id" => "example_from_chat_id", # String
  "latitude" => 1, # Float
  "longitude" => 1, # Float
  "message_id" => 1, # Integer
  "options" => [], # Array
  "question" => "example_question", # String
  "text" => "example_text", # String
})
```


### MessageId

Create an instance: `message_id = client.MessageId`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | `String` |  |
| `direct_messages_topic_id` | `Integer` |  |
| `from_chat_id` | `String` |  |
| `message_effect_id` | `String` |  |
| `message_id` | `Integer` |  |
| `message_thread_id` | `Integer` |  |

#### Example: Create

```ruby
message_id = client.MessageId.create({
  "chat_id" => "example_chat_id", # String
  "from_chat_id" => "example_from_chat_id", # String
  "message_id" => 1, # Integer
})
```


### PromoteChatMember

Create an instance: `promote_chat_member = client.PromoteChatMember`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `can_delete_messages` | `Boolean` |  |
| `can_edit_messages` | `Boolean` |  |
| `can_manage_chat` | `Boolean` |  |
| `can_manage_direct_messages` | `Boolean` |  |
| `can_post_messages` | `Boolean` |  |
| `chat_id` | `String` |  |
| `description` | `String` | Human-readable description of the result |
| `error_code` | `Integer` | Error code |
| `ok` | `Boolean` | If true, the request was successful |
| `parameters` | `Hash` |  |
| `result` | `Array` | The result of the query |
| `user_id` | `Integer` |  |

#### Example: Create

```ruby
promote_chat_member = client.PromoteChatMember.create({
  "chat_id" => "example_chat_id", # String
  "ok" => true, # Boolean
  "user_id" => 1, # Integer
})
```


### RemoveMyProfilePhoto

Create an instance: `remove_my_profile_photo = client.RemoveMyProfilePhoto`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `description` | `String` | Human-readable description of the result |
| `error_code` | `Integer` | Error code |
| `ok` | `Boolean` | If true, the request was successful |
| `parameters` | `Hash` |  |
| `result` | `Array` | The result of the query |

#### Example: Create

```ruby
remove_my_profile_photo = client.RemoveMyProfilePhoto.create({
  "ok" => true, # Boolean
})
```


### RepostStory

Create an instance: `repost_story = client.RepostStory`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | `String` |  |
| `description` | `String` | Human-readable description of the result |
| `error_code` | `Integer` | Error code |
| `ok` | `Boolean` | If true, the request was successful |
| `parameters` | `Hash` |  |
| `result` | `Array` | The result of the query |
| `story_id` | `Integer` |  |

#### Example: Create

```ruby
repost_story = client.RepostStory.create({
  "chat_id" => "example_chat_id", # String
  "ok" => true, # Boolean
  "story_id" => 1, # Integer
})
```


### SendChatAction

Create an instance: `send_chat_action = client.SendChatAction`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `action` | `String` |  |
| `chat_id` | `String` |  |
| `description` | `String` | Human-readable description of the result |
| `error_code` | `Integer` | Error code |
| `message_thread_id` | `Integer` |  |
| `ok` | `Boolean` | If true, the request was successful |
| `parameters` | `Hash` |  |
| `result` | `Array` | The result of the query |

#### Example: Create

```ruby
send_chat_action = client.SendChatAction.create({
  "action" => "example_action", # String
  "chat_id" => "example_chat_id", # String
  "ok" => true, # Boolean
})
```


### SendMessageDraft

Create an instance: `send_message_draft = client.SendMessageDraft`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | `String` |  |
| `description` | `String` | Human-readable description of the result |
| `error_code` | `Integer` | Error code |
| `message_thread_id` | `Integer` |  |
| `ok` | `Boolean` | If true, the request was successful |
| `parameters` | `Hash` |  |
| `result` | `Array` | The result of the query |
| `text` | `String` |  |

#### Example: Create

```ruby
send_message_draft = client.SendMessageDraft.create({
  "chat_id" => "example_chat_id", # String
  "ok" => true, # Boolean
  "text" => "example_text", # String
})
```


### SetMyProfilePhoto

Create an instance: `set_my_profile_photo = client.SetMyProfilePhoto`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `description` | `String` | Human-readable description of the result |
| `error_code` | `Integer` | Error code |
| `ok` | `Boolean` | If true, the request was successful |
| `parameters` | `Hash` |  |
| `result` | `Array` | The result of the query |

#### Example: Create

```ruby
set_my_profile_photo = client.SetMyProfilePhoto.create({
  "ok" => true, # Boolean
})
```


### UnpinAllForumTopicMessage

Create an instance: `unpin_all_forum_topic_message = client.UnpinAllForumTopicMessage`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | `String` |  |
| `description` | `String` | Human-readable description of the result |
| `error_code` | `Integer` | Error code |
| `message_thread_id` | `Integer` |  |
| `ok` | `Boolean` | If true, the request was successful |
| `parameters` | `Hash` |  |
| `result` | `Array` | The result of the query |

#### Example: Create

```ruby
unpin_all_forum_topic_message = client.UnpinAllForumTopicMessage.create({
  "chat_id" => "example_chat_id", # String
  "message_thread_id" => 1, # Integer
  "ok" => true, # Boolean
})
```


### Update

Create an instance: `update = client.Update`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |
| `list(match)` | List entities matching the criteria. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `allowed_updates` | `Array` |  |
| `description` | `String` | Human-readable description of the result |
| `error_code` | `Integer` | Error code |
| `limit` | `Integer` |  |
| `offset` | `Integer` |  |
| `ok` | `Boolean` | If true, the request was successful |
| `parameters` | `Hash` |  |
| `result` | `Array` | The result of the query |
| `timeout` | `Integer` |  |

#### Example: List

```ruby
# list returns an Array of Update records (raises on error).
updates = client.Update.list
```

#### Example: Create

```ruby
update = client.Update.create({
  "ok" => true, # Boolean
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

Features are the extension mechanism. A feature is a Ruby class
with hook methods named after pipeline stages (e.g. `PrePoint`,
`PreSpec`). Each method receives the context.

The SDK ships with built-in features:

- **TestFeature**: In-memory mock transport for testing without a live server

Features are initialized in order. Hooks fire in the order features
were added, so later features can override earlier ones.

### Data as hashes

The Ruby SDK uses plain Ruby hashes throughout rather than typed
objects. This mirrors the dynamic nature of the API and keeps the
SDK flexible — no code generation is needed when the API schema
changes.

Use `Helpers.to_map()` to safely validate that a value is a hash.

### Module structure

```
rb/
├── TelegramBot_sdk.rb       -- Main SDK module
├── config.rb                  -- Configuration
├── features.rb                -- Feature factory
├── core/                      -- Core types and context
├── entity/                    -- Entity implementations
├── feature/                   -- Built-in features (Base, Test, Log)
├── utility/                   -- Utility functions and struct library
└── test/                      -- Test suites
```

The main module (`TelegramBot_sdk`) exports the SDK class
and test helper. Import entity or utility modules directly only
when needed.

### Entity state

Entity instances are stateful. After a successful `load`, the entity
stores the returned data and match criteria internally.

```ruby
getme = client.GetMe
getme.load()

# getme.data_get now returns the getme data from the last load
# getme.match_get returns the last match criteria
```

Call `make` to create a fresh instance with the same configuration
but no stored state.

### Direct vs entity access

The entity interface handles URL construction, parameter placement,
and response parsing automatically. Use it for standard CRUD operations.

`direct` gives full control over the HTTP request. Use it for
non-standard endpoints, bulk operations, or any path not modelled as
an entity. `prepare` builds the request without sending it — useful
for debugging or custom transport.


## Full Reference

See [REFERENCE.md](REFERENCE.md) for complete API reference
documentation including all method signatures, entity field schemas,
and detailed usage examples.
