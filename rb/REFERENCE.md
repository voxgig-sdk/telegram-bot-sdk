# TelegramBot Ruby SDK Reference

Complete API reference for the TelegramBot Ruby SDK.


## TelegramBotSDK

### Constructor

```ruby
require_relative 'TelegramBot_sdk'

client = TelegramBotSDK.new(options)
```

Create a new SDK client instance.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `options` | `Hash` | SDK configuration options. |
| `options["apikey"]` | `String` | API key for authentication. |
| `options["base"]` | `String` | Base URL for API requests. |
| `options["prefix"]` | `String` | URL prefix appended after base. |
| `options["suffix"]` | `String` | URL suffix appended after path. |
| `options["headers"]` | `Hash` | Custom headers for all requests. |
| `options["feature"]` | `Hash` | Feature configuration. |
| `options["system"]` | `Hash` | System overrides (e.g. custom fetch). |


### Static Methods

#### `TelegramBotSDK.test(testopts = nil, sdkopts = nil)`

Create a test client with mock features active. Both arguments may be `nil`.

```ruby
client = TelegramBotSDK.test
```


### Instance Methods

#### `ApproveSuggestedPost(data = nil)`

Create a new `ApproveSuggestedPost` entity instance. Pass `nil` for no initial data.

#### `DeclineSuggestedPost(data = nil)`

Create a new `DeclineSuggestedPost` entity instance. Pass `nil` for no initial data.

#### `DeleteForumTopic(data = nil)`

Create a new `DeleteForumTopic` entity instance. Pass `nil` for no initial data.

#### `EditForumTopic(data = nil)`

Create a new `EditForumTopic` entity instance. Pass `nil` for no initial data.

#### `File(data = nil)`

Create a new `File` entity instance. Pass `nil` for no initial data.

#### `ForumTopic(data = nil)`

Create a new `ForumTopic` entity instance. Pass `nil` for no initial data.

#### `GetBusinessAccountGift(data = nil)`

Create a new `GetBusinessAccountGift` entity instance. Pass `nil` for no initial data.

#### `GetChatGift(data = nil)`

Create a new `GetChatGift` entity instance. Pass `nil` for no initial data.

#### `GetMe(data = nil)`

Create a new `GetMe` entity instance. Pass `nil` for no initial data.

#### `GetUserGift(data = nil)`

Create a new `GetUserGift` entity instance. Pass `nil` for no initial data.

#### `GetUserProfileAudio(data = nil)`

Create a new `GetUserProfileAudio` entity instance. Pass `nil` for no initial data.

#### `Message(data = nil)`

Create a new `Message` entity instance. Pass `nil` for no initial data.

#### `MessageId(data = nil)`

Create a new `MessageId` entity instance. Pass `nil` for no initial data.

#### `PromoteChatMember(data = nil)`

Create a new `PromoteChatMember` entity instance. Pass `nil` for no initial data.

#### `RemoveMyProfilePhoto(data = nil)`

Create a new `RemoveMyProfilePhoto` entity instance. Pass `nil` for no initial data.

#### `RepostStory(data = nil)`

Create a new `RepostStory` entity instance. Pass `nil` for no initial data.

#### `SendChatAction(data = nil)`

Create a new `SendChatAction` entity instance. Pass `nil` for no initial data.

#### `SendMessageDraft(data = nil)`

Create a new `SendMessageDraft` entity instance. Pass `nil` for no initial data.

#### `SetMyProfilePhoto(data = nil)`

Create a new `SetMyProfilePhoto` entity instance. Pass `nil` for no initial data.

#### `UnpinAllForumTopicMessage(data = nil)`

Create a new `UnpinAllForumTopicMessage` entity instance. Pass `nil` for no initial data.

#### `Update(data = nil)`

Create a new `Update` entity instance. Pass `nil` for no initial data.

#### `options_map -> Hash`

Return a deep copy of the current SDK options.

#### `get_utility -> Utility`

Return a copy of the SDK utility object.

#### `direct(fetchargs = {}) -> Hash`

Make a direct HTTP request to any API endpoint. Returns a result hash
(`{ "ok" => ..., "status" => ..., "data" => ..., "err" => ... }`); it
does not raise — inspect `result["ok"]`.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `fetchargs["path"]` | `String` | URL path with optional `{param}` placeholders. |
| `fetchargs["method"]` | `String` | HTTP method (default: `"GET"`). |
| `fetchargs["params"]` | `Hash` | Path parameter values for `{param}` substitution. |
| `fetchargs["query"]` | `Hash` | Query string parameters. |
| `fetchargs["headers"]` | `Hash` | Request headers (merged with defaults). |
| `fetchargs["body"]` | `any` | Request body (hashes are JSON-serialized). |
| `fetchargs["ctrl"]` | `Hash` | Control options (e.g. `{ "explain" => true }`). |

**Returns:** `Hash`

#### `prepare(fetchargs = {}) -> Hash`

Prepare a fetch definition without sending the request. Accepts the
same parameters as `direct()`. Raises on error.

**Returns:** `Hash` (the fetch definition; raises on error)


---

## ApproveSuggestedPostEntity

```ruby
approve_suggested_post = client.ApproveSuggestedPost
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `String` | Yes |  |
| `description` | `String` | No |  |
| `error_code` | `Integer` | No |  |
| `message_id` | `Integer` | Yes |  |
| `ok` | `Boolean` | Yes |  |
| `parameters` | `Hash` | No |  |
| `result` | `Array` | No |  |

### Operations

#### `create(reqdata, ctrl = nil) -> result`

Create a new entity with the given data. Raises on error.

```ruby
result = client.ApproveSuggestedPost.create({
  "chat_id" => "example_chat_id", # String
  "message_id" => 1, # Integer
  "ok" => true, # Boolean
})
```

### Common Methods

#### `data_get -> Hash`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get -> Hash`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make -> Entity`

Create a new `ApproveSuggestedPostEntity` instance with the same client and
options.

#### `get_name -> String`

Return the entity name.


---

## DeclineSuggestedPostEntity

```ruby
decline_suggested_post = client.DeclineSuggestedPost
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `String` | Yes |  |
| `description` | `String` | No |  |
| `error_code` | `Integer` | No |  |
| `message_id` | `Integer` | Yes |  |
| `ok` | `Boolean` | Yes |  |
| `parameters` | `Hash` | No |  |
| `result` | `Array` | No |  |

### Operations

#### `create(reqdata, ctrl = nil) -> result`

Create a new entity with the given data. Raises on error.

```ruby
result = client.DeclineSuggestedPost.create({
  "chat_id" => "example_chat_id", # String
  "message_id" => 1, # Integer
  "ok" => true, # Boolean
})
```

### Common Methods

#### `data_get -> Hash`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get -> Hash`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make -> Entity`

Create a new `DeclineSuggestedPostEntity` instance with the same client and
options.

#### `get_name -> String`

Return the entity name.


---

## DeleteForumTopicEntity

```ruby
delete_forum_topic = client.DeleteForumTopic
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `String` | Yes |  |
| `description` | `String` | No |  |
| `error_code` | `Integer` | No |  |
| `message_thread_id` | `Integer` | Yes |  |
| `ok` | `Boolean` | Yes |  |
| `parameters` | `Hash` | No |  |
| `result` | `Array` | No |  |

### Operations

#### `create(reqdata, ctrl = nil) -> result`

Create a new entity with the given data. Raises on error.

```ruby
result = client.DeleteForumTopic.create({
  "chat_id" => "example_chat_id", # String
  "message_thread_id" => 1, # Integer
  "ok" => true, # Boolean
})
```

### Common Methods

#### `data_get -> Hash`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get -> Hash`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make -> Entity`

Create a new `DeleteForumTopicEntity` instance with the same client and
options.

#### `get_name -> String`

Return the entity name.


---

## EditForumTopicEntity

```ruby
edit_forum_topic = client.EditForumTopic
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `String` | Yes |  |
| `description` | `String` | No |  |
| `error_code` | `Integer` | No |  |
| `icon_custom_emoji_id` | `String` | No |  |
| `message_thread_id` | `Integer` | Yes |  |
| `name` | `String` | No |  |
| `ok` | `Boolean` | Yes |  |
| `parameters` | `Hash` | No |  |
| `result` | `Array` | No |  |

### Operations

#### `create(reqdata, ctrl = nil) -> result`

Create a new entity with the given data. Raises on error.

```ruby
result = client.EditForumTopic.create({
  "chat_id" => "example_chat_id", # String
  "message_thread_id" => 1, # Integer
  "ok" => true, # Boolean
})
```

### Common Methods

#### `data_get -> Hash`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get -> Hash`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make -> Entity`

Create a new `EditForumTopicEntity` instance with the same client and
options.

#### `get_name -> String`

Return the entity name.


---

## FileEntity

```ruby
file = client.File
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `file_id` | `String` | Yes |  |

### Operations

#### `create(reqdata, ctrl = nil) -> result`

Create a new entity with the given data. Raises on error.

```ruby
result = client.File.create({
  "file_id" => "example_file_id", # String
})
```

### Common Methods

#### `data_get -> Hash`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get -> Hash`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make -> Entity`

Create a new `FileEntity` instance with the same client and
options.

#### `get_name -> String`

Return the entity name.


---

## ForumTopicEntity

```ruby
forum_topic = client.ForumTopic
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `String` | Yes |  |
| `icon_color` | `Integer` | No |  |
| `icon_custom_emoji_id` | `String` | No |  |
| `name` | `String` | Yes |  |

### Operations

#### `create(reqdata, ctrl = nil) -> result`

Create a new entity with the given data. Raises on error.

```ruby
result = client.ForumTopic.create({
  "chat_id" => "example_chat_id", # String
  "name" => "example_name", # String
})
```

### Common Methods

#### `data_get -> Hash`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get -> Hash`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make -> Entity`

Create a new `ForumTopicEntity` instance with the same client and
options.

#### `get_name -> String`

Return the entity name.


---

## GetBusinessAccountGiftEntity

```ruby
get_business_account_gift = client.GetBusinessAccountGift
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `description` | `String` | No |  |
| `error_code` | `Integer` | No |  |
| `exclude_from_blockchain` | `Boolean` | No |  |
| `exclude_limited_non_upgradable` | `Boolean` | No |  |
| `exclude_limited_upgradable` | `Boolean` | No |  |
| `ok` | `Boolean` | Yes |  |
| `parameters` | `Hash` | No |  |
| `result` | `Array` | No |  |

### Operations

#### `create(reqdata, ctrl = nil) -> result`

Create a new entity with the given data. Raises on error.

```ruby
result = client.GetBusinessAccountGift.create({
  "ok" => true, # Boolean
})
```

### Common Methods

#### `data_get -> Hash`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get -> Hash`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make -> Entity`

Create a new `GetBusinessAccountGiftEntity` instance with the same client and
options.

#### `get_name -> String`

Return the entity name.


---

## GetChatGiftEntity

```ruby
get_chat_gift = client.GetChatGift
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `String` | Yes |  |
| `description` | `String` | No |  |
| `error_code` | `Integer` | No |  |
| `ok` | `Boolean` | Yes |  |
| `parameters` | `Hash` | No |  |
| `result` | `Array` | No |  |

### Operations

#### `create(reqdata, ctrl = nil) -> result`

Create a new entity with the given data. Raises on error.

```ruby
result = client.GetChatGift.create({
  "chat_id" => "example_chat_id", # String
  "ok" => true, # Boolean
})
```

### Common Methods

#### `data_get -> Hash`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get -> Hash`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make -> Entity`

Create a new `GetChatGiftEntity` instance with the same client and
options.

#### `get_name -> String`

Return the entity name.


---

## GetMeEntity

```ruby
get_me = client.GetMe
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `description` | `String` | No |  |
| `error_code` | `Integer` | No |  |
| `ok` | `Boolean` | Yes |  |
| `parameters` | `Hash` | No |  |
| `result` | `Array` | No |  |

### Operations

#### `create(reqdata, ctrl = nil) -> result`

Create a new entity with the given data. Raises on error.

```ruby
result = client.GetMe.create({
  "ok" => true, # Boolean
})
```

#### `load(reqmatch, ctrl = nil) -> result`

Load a single entity matching the given criteria. Raises on error.

```ruby
result = client.GetMe.load()
```

### Common Methods

#### `data_get -> Hash`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get -> Hash`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make -> Entity`

Create a new `GetMeEntity` instance with the same client and
options.

#### `get_name -> String`

Return the entity name.


---

## GetUserGiftEntity

```ruby
get_user_gift = client.GetUserGift
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `description` | `String` | No |  |
| `error_code` | `Integer` | No |  |
| `ok` | `Boolean` | Yes |  |
| `parameters` | `Hash` | No |  |
| `result` | `Array` | No |  |
| `user_id` | `Integer` | Yes |  |

### Operations

#### `create(reqdata, ctrl = nil) -> result`

Create a new entity with the given data. Raises on error.

```ruby
result = client.GetUserGift.create({
  "ok" => true, # Boolean
  "user_id" => 1, # Integer
})
```

### Common Methods

#### `data_get -> Hash`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get -> Hash`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make -> Entity`

Create a new `GetUserGiftEntity` instance with the same client and
options.

#### `get_name -> String`

Return the entity name.


---

## GetUserProfileAudioEntity

```ruby
get_user_profile_audio = client.GetUserProfileAudio
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `description` | `String` | No |  |
| `error_code` | `Integer` | No |  |
| `ok` | `Boolean` | Yes |  |
| `parameters` | `Hash` | No |  |
| `result` | `Array` | No |  |
| `user_id` | `Integer` | Yes |  |

### Operations

#### `create(reqdata, ctrl = nil) -> result`

Create a new entity with the given data. Raises on error.

```ruby
result = client.GetUserProfileAudio.create({
  "ok" => true, # Boolean
  "user_id" => 1, # Integer
})
```

### Common Methods

#### `data_get -> Hash`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get -> Hash`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make -> Entity`

Create a new `GetUserProfileAudioEntity` instance with the same client and
options.

#### `get_name -> String`

Return the entity name.


---

## MessageEntity

```ruby
message = client.Message
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `String` | Yes |  |
| `direct_messages_topic_id` | `Integer` | No |  |
| `disable_notification` | `Boolean` | No |  |
| `disable_web_page_preview` | `Boolean` | No |  |
| `from_chat_id` | `String` | Yes |  |
| `latitude` | `Float` | Yes |  |
| `longitude` | `Float` | Yes |  |
| `message_effect_id` | `String` | No |  |
| `message_id` | `Integer` | Yes |  |
| `message_thread_id` | `Integer` | No |  |
| `options` | `Array` | Yes |  |
| `parse_mode` | `String` | No |  |
| `protect_content` | `Boolean` | No |  |
| `question` | `String` | Yes |  |
| `reply_to_message_id` | `Integer` | No |  |
| `text` | `String` | Yes |  |

### Operations

#### `create(reqdata, ctrl = nil) -> result`

Create a new entity with the given data. Raises on error.

```ruby
result = client.Message.create({
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

### Common Methods

#### `data_get -> Hash`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get -> Hash`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make -> Entity`

Create a new `MessageEntity` instance with the same client and
options.

#### `get_name -> String`

Return the entity name.


---

## MessageIdEntity

```ruby
message_id = client.MessageId
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `String` | Yes |  |
| `direct_messages_topic_id` | `Integer` | No |  |
| `from_chat_id` | `String` | Yes |  |
| `message_effect_id` | `String` | No |  |
| `message_id` | `Integer` | Yes |  |
| `message_thread_id` | `Integer` | No |  |

### Operations

#### `create(reqdata, ctrl = nil) -> result`

Create a new entity with the given data. Raises on error.

```ruby
result = client.MessageId.create({
  "chat_id" => "example_chat_id", # String
  "from_chat_id" => "example_from_chat_id", # String
  "message_id" => 1, # Integer
})
```

### Common Methods

#### `data_get -> Hash`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get -> Hash`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make -> Entity`

Create a new `MessageIdEntity` instance with the same client and
options.

#### `get_name -> String`

Return the entity name.


---

## PromoteChatMemberEntity

```ruby
promote_chat_member = client.PromoteChatMember
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `can_delete_messages` | `Boolean` | No |  |
| `can_edit_messages` | `Boolean` | No |  |
| `can_manage_chat` | `Boolean` | No |  |
| `can_manage_direct_messages` | `Boolean` | No |  |
| `can_post_messages` | `Boolean` | No |  |
| `chat_id` | `String` | Yes |  |
| `description` | `String` | No |  |
| `error_code` | `Integer` | No |  |
| `ok` | `Boolean` | Yes |  |
| `parameters` | `Hash` | No |  |
| `result` | `Array` | No |  |
| `user_id` | `Integer` | Yes |  |

### Operations

#### `create(reqdata, ctrl = nil) -> result`

Create a new entity with the given data. Raises on error.

```ruby
result = client.PromoteChatMember.create({
  "chat_id" => "example_chat_id", # String
  "ok" => true, # Boolean
  "user_id" => 1, # Integer
})
```

### Common Methods

#### `data_get -> Hash`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get -> Hash`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make -> Entity`

Create a new `PromoteChatMemberEntity` instance with the same client and
options.

#### `get_name -> String`

Return the entity name.


---

## RemoveMyProfilePhotoEntity

```ruby
remove_my_profile_photo = client.RemoveMyProfilePhoto
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `description` | `String` | No |  |
| `error_code` | `Integer` | No |  |
| `ok` | `Boolean` | Yes |  |
| `parameters` | `Hash` | No |  |
| `result` | `Array` | No |  |

### Operations

#### `create(reqdata, ctrl = nil) -> result`

Create a new entity with the given data. Raises on error.

```ruby
result = client.RemoveMyProfilePhoto.create({
  "ok" => true, # Boolean
})
```

### Common Methods

#### `data_get -> Hash`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get -> Hash`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make -> Entity`

Create a new `RemoveMyProfilePhotoEntity` instance with the same client and
options.

#### `get_name -> String`

Return the entity name.


---

## RepostStoryEntity

```ruby
repost_story = client.RepostStory
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `String` | Yes |  |
| `description` | `String` | No |  |
| `error_code` | `Integer` | No |  |
| `ok` | `Boolean` | Yes |  |
| `parameters` | `Hash` | No |  |
| `result` | `Array` | No |  |
| `story_id` | `Integer` | Yes |  |

### Operations

#### `create(reqdata, ctrl = nil) -> result`

Create a new entity with the given data. Raises on error.

```ruby
result = client.RepostStory.create({
  "chat_id" => "example_chat_id", # String
  "ok" => true, # Boolean
  "story_id" => 1, # Integer
})
```

### Common Methods

#### `data_get -> Hash`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get -> Hash`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make -> Entity`

Create a new `RepostStoryEntity` instance with the same client and
options.

#### `get_name -> String`

Return the entity name.


---

## SendChatActionEntity

```ruby
send_chat_action = client.SendChatAction
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `action` | `String` | Yes |  |
| `chat_id` | `String` | Yes |  |
| `description` | `String` | No |  |
| `error_code` | `Integer` | No |  |
| `message_thread_id` | `Integer` | No |  |
| `ok` | `Boolean` | Yes |  |
| `parameters` | `Hash` | No |  |
| `result` | `Array` | No |  |

### Operations

#### `create(reqdata, ctrl = nil) -> result`

Create a new entity with the given data. Raises on error.

```ruby
result = client.SendChatAction.create({
  "action" => "example_action", # String
  "chat_id" => "example_chat_id", # String
  "ok" => true, # Boolean
})
```

### Common Methods

#### `data_get -> Hash`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get -> Hash`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make -> Entity`

Create a new `SendChatActionEntity` instance with the same client and
options.

#### `get_name -> String`

Return the entity name.


---

## SendMessageDraftEntity

```ruby
send_message_draft = client.SendMessageDraft
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `String` | Yes |  |
| `description` | `String` | No |  |
| `error_code` | `Integer` | No |  |
| `message_thread_id` | `Integer` | No |  |
| `ok` | `Boolean` | Yes |  |
| `parameters` | `Hash` | No |  |
| `result` | `Array` | No |  |
| `text` | `String` | Yes |  |

### Operations

#### `create(reqdata, ctrl = nil) -> result`

Create a new entity with the given data. Raises on error.

```ruby
result = client.SendMessageDraft.create({
  "chat_id" => "example_chat_id", # String
  "ok" => true, # Boolean
  "text" => "example_text", # String
})
```

### Common Methods

#### `data_get -> Hash`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get -> Hash`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make -> Entity`

Create a new `SendMessageDraftEntity` instance with the same client and
options.

#### `get_name -> String`

Return the entity name.


---

## SetMyProfilePhotoEntity

```ruby
set_my_profile_photo = client.SetMyProfilePhoto
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `description` | `String` | No |  |
| `error_code` | `Integer` | No |  |
| `ok` | `Boolean` | Yes |  |
| `parameters` | `Hash` | No |  |
| `result` | `Array` | No |  |

### Operations

#### `create(reqdata, ctrl = nil) -> result`

Create a new entity with the given data. Raises on error.

```ruby
result = client.SetMyProfilePhoto.create({
  "ok" => true, # Boolean
})
```

### Common Methods

#### `data_get -> Hash`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get -> Hash`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make -> Entity`

Create a new `SetMyProfilePhotoEntity` instance with the same client and
options.

#### `get_name -> String`

Return the entity name.


---

## UnpinAllForumTopicMessageEntity

```ruby
unpin_all_forum_topic_message = client.UnpinAllForumTopicMessage
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `String` | Yes |  |
| `description` | `String` | No |  |
| `error_code` | `Integer` | No |  |
| `message_thread_id` | `Integer` | Yes |  |
| `ok` | `Boolean` | Yes |  |
| `parameters` | `Hash` | No |  |
| `result` | `Array` | No |  |

### Operations

#### `create(reqdata, ctrl = nil) -> result`

Create a new entity with the given data. Raises on error.

```ruby
result = client.UnpinAllForumTopicMessage.create({
  "chat_id" => "example_chat_id", # String
  "message_thread_id" => 1, # Integer
  "ok" => true, # Boolean
})
```

### Common Methods

#### `data_get -> Hash`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get -> Hash`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make -> Entity`

Create a new `UnpinAllForumTopicMessageEntity` instance with the same client and
options.

#### `get_name -> String`

Return the entity name.


---

## UpdateEntity

```ruby
update = client.Update
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `allowed_updates` | `Array` | No |  |
| `description` | `String` | No |  |
| `error_code` | `Integer` | No |  |
| `limit` | `Integer` | No |  |
| `offset` | `Integer` | No |  |
| `ok` | `Boolean` | Yes |  |
| `parameters` | `Hash` | No |  |
| `result` | `Array` | No |  |
| `timeout` | `Integer` | No |  |

### Operations

#### `create(reqdata, ctrl = nil) -> result`

Create a new entity with the given data. Raises on error.

```ruby
result = client.Update.create({
  "ok" => true, # Boolean
})
```

#### `list(reqmatch = nil, ctrl = nil) -> Array`

List entities matching the given criteria (call with no argument to list all). Returns an array. Raises on error.

```ruby
results = client.Update.list
```

### Common Methods

#### `data_get -> Hash`

Get the entity data. Returns a copy of the current data.

#### `data_set(data)`

Set the entity data.

#### `match_get -> Hash`

Get the entity match criteria.

#### `match_set(match)`

Set the entity match criteria.

#### `make -> Entity`

Create a new `UpdateEntity` instance with the same client and
options.

#### `get_name -> String`

Return the entity name.


---

## Features

| Feature | Version | Description |
| --- | --- | --- |
| `test` | 0.0.1 | In-memory mock transport for testing without a live server |


Features are activated via the `feature` option:

```ruby
client = TelegramBotSDK.new({
  "feature" => {
    "test" => { "active" => true },
  },
})
```

