# TelegramBot TypeScript SDK Reference

Complete API reference for the TelegramBot TypeScript SDK.


## TelegramBotSDK

### Constructor

```ts
new TelegramBotSDK(options?: object)
```

Create a new SDK client instance.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `options` | `object` | SDK configuration options. |
| `options.apikey` | `string` | API key for authentication. |
| `options.base` | `string` | Base URL for API requests. |
| `options.prefix` | `string` | URL prefix appended after base. |
| `options.suffix` | `string` | URL suffix appended after path. |
| `options.headers` | `object` | Custom headers for all requests. |
| `options.feature` | `object` | Feature configuration. |
| `options.system` | `object` | System overrides (e.g. custom fetch). |


### Static Methods

#### `TelegramBotSDK.test(testopts?, sdkopts?)`

Create a test client with mock features active.

```ts
const client = TelegramBotSDK.test()
```

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `testopts` | `object` | Test feature options. |
| `sdkopts` | `object` | Additional SDK options merged with test defaults. |

**Returns:** `TelegramBotSDK` instance in test mode.


### Instance Methods

#### `ApproveSuggestedPost(data?: object)`

Create a new `ApproveSuggestedPost` entity instance.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `data` | `object` | Initial entity data. |

**Returns:** `ApproveSuggestedPostEntity` instance.

#### `DeclineSuggestedPost(data?: object)`

Create a new `DeclineSuggestedPost` entity instance.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `data` | `object` | Initial entity data. |

**Returns:** `DeclineSuggestedPostEntity` instance.

#### `DeleteForumTopic(data?: object)`

Create a new `DeleteForumTopic` entity instance.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `data` | `object` | Initial entity data. |

**Returns:** `DeleteForumTopicEntity` instance.

#### `EditForumTopic(data?: object)`

Create a new `EditForumTopic` entity instance.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `data` | `object` | Initial entity data. |

**Returns:** `EditForumTopicEntity` instance.

#### `File(data?: object)`

Create a new `File` entity instance.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `data` | `object` | Initial entity data. |

**Returns:** `FileEntity` instance.

#### `ForumTopic(data?: object)`

Create a new `ForumTopic` entity instance.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `data` | `object` | Initial entity data. |

**Returns:** `ForumTopicEntity` instance.

#### `GetBusinessAccountGift(data?: object)`

Create a new `GetBusinessAccountGift` entity instance.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `data` | `object` | Initial entity data. |

**Returns:** `GetBusinessAccountGiftEntity` instance.

#### `GetChatGift(data?: object)`

Create a new `GetChatGift` entity instance.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `data` | `object` | Initial entity data. |

**Returns:** `GetChatGiftEntity` instance.

#### `GetMe(data?: object)`

Create a new `GetMe` entity instance.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `data` | `object` | Initial entity data. |

**Returns:** `GetMeEntity` instance.

#### `GetUserGift(data?: object)`

Create a new `GetUserGift` entity instance.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `data` | `object` | Initial entity data. |

**Returns:** `GetUserGiftEntity` instance.

#### `GetUserProfileAudio(data?: object)`

Create a new `GetUserProfileAudio` entity instance.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `data` | `object` | Initial entity data. |

**Returns:** `GetUserProfileAudioEntity` instance.

#### `Message(data?: object)`

Create a new `Message` entity instance.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `data` | `object` | Initial entity data. |

**Returns:** `MessageEntity` instance.

#### `MessageId(data?: object)`

Create a new `MessageId` entity instance.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `data` | `object` | Initial entity data. |

**Returns:** `MessageIdEntity` instance.

#### `PromoteChatMember(data?: object)`

Create a new `PromoteChatMember` entity instance.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `data` | `object` | Initial entity data. |

**Returns:** `PromoteChatMemberEntity` instance.

#### `RemoveMyProfilePhoto(data?: object)`

Create a new `RemoveMyProfilePhoto` entity instance.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `data` | `object` | Initial entity data. |

**Returns:** `RemoveMyProfilePhotoEntity` instance.

#### `RepostStory(data?: object)`

Create a new `RepostStory` entity instance.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `data` | `object` | Initial entity data. |

**Returns:** `RepostStoryEntity` instance.

#### `SendChatAction(data?: object)`

Create a new `SendChatAction` entity instance.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `data` | `object` | Initial entity data. |

**Returns:** `SendChatActionEntity` instance.

#### `SendMessageDraft(data?: object)`

Create a new `SendMessageDraft` entity instance.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `data` | `object` | Initial entity data. |

**Returns:** `SendMessageDraftEntity` instance.

#### `SetMyProfilePhoto(data?: object)`

Create a new `SetMyProfilePhoto` entity instance.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `data` | `object` | Initial entity data. |

**Returns:** `SetMyProfilePhotoEntity` instance.

#### `UnpinAllForumTopicMessage(data?: object)`

Create a new `UnpinAllForumTopicMessage` entity instance.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `data` | `object` | Initial entity data. |

**Returns:** `UnpinAllForumTopicMessageEntity` instance.

#### `Update(data?: object)`

Create a new `Update` entity instance.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `data` | `object` | Initial entity data. |

**Returns:** `UpdateEntity` instance.

#### `options()`

Return a deep copy of the current SDK options.

**Returns:** `object`

#### `utility()`

Return a copy of the SDK utility object.

**Returns:** `object`

#### `direct(fetchargs?: object)`

Make a direct HTTP request to any API endpoint.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `fetchargs.path` | `string` | URL path with optional `{param}` placeholders. |
| `fetchargs.method` | `string` | HTTP method (default: `GET`). |
| `fetchargs.params` | `object` | Path parameter values for `{param}` substitution. |
| `fetchargs.query` | `object` | Query string parameters. |
| `fetchargs.headers` | `object` | Request headers (merged with defaults). |
| `fetchargs.body` | `any` | Request body (objects are JSON-serialized). |
| `fetchargs.ctrl` | `object` | Control options (e.g. `{ explain: true }`). |

**Returns:** `Promise<{ ok, status, headers, data } | Error>`

#### `prepare(fetchargs?: object)`

Prepare a fetch definition without sending the request. Accepts the
same parameters as `direct()`.

**Returns:** `Promise<{ url, method, headers, body } | Error>`

#### `tester(testopts?, sdkopts?)`

Alias for `TelegramBotSDK.test()`.

**Returns:** `TelegramBotSDK` instance in test mode.


---

## ApproveSuggestedPostEntity

```ts
const approve_suggested_post = client.ApproveSuggestedPost()
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `string` | Yes |  |
| `description` | `string` | No | Human-readable description of the result |
| `error_code` | `number` | No | Error code |
| `message_id` | `number` | Yes |  |
| `ok` | `boolean` | Yes | If true, the request was successful |
| `parameters` | `Record<string, any>` | No |  |
| `result` | `any[]` | No | The result of the query |

### Operations

#### `create(data: object, ctrl?: object)`

Create a new entity with the given data.

```ts
const result = await client.ApproveSuggestedPost().create({
  chat_id: 'example_chat_id',
  message_id: 1,
  ok: true,
})
```

### Common Methods

#### `data(data?: object)`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `match(match?: object)`

Get or set the entity match criteria. Works the same as `data()`.

#### `make()`

Create a new `ApproveSuggestedPostEntity` instance with the same client and
options.

#### `client()`

Return the parent `TelegramBotSDK` instance.

#### `entopts()`

Return a copy of the entity options.


---

## DeclineSuggestedPostEntity

```ts
const decline_suggested_post = client.DeclineSuggestedPost()
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `string` | Yes |  |
| `description` | `string` | No | Human-readable description of the result |
| `error_code` | `number` | No | Error code |
| `message_id` | `number` | Yes |  |
| `ok` | `boolean` | Yes | If true, the request was successful |
| `parameters` | `Record<string, any>` | No |  |
| `result` | `any[]` | No | The result of the query |

### Operations

#### `create(data: object, ctrl?: object)`

Create a new entity with the given data.

```ts
const result = await client.DeclineSuggestedPost().create({
  chat_id: 'example_chat_id',
  message_id: 1,
  ok: true,
})
```

### Common Methods

#### `data(data?: object)`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `match(match?: object)`

Get or set the entity match criteria. Works the same as `data()`.

#### `make()`

Create a new `DeclineSuggestedPostEntity` instance with the same client and
options.

#### `client()`

Return the parent `TelegramBotSDK` instance.

#### `entopts()`

Return a copy of the entity options.


---

## DeleteForumTopicEntity

```ts
const delete_forum_topic = client.DeleteForumTopic()
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `string` | Yes |  |
| `description` | `string` | No | Human-readable description of the result |
| `error_code` | `number` | No | Error code |
| `message_thread_id` | `number` | Yes |  |
| `ok` | `boolean` | Yes | If true, the request was successful |
| `parameters` | `Record<string, any>` | No |  |
| `result` | `any[]` | No | The result of the query |

### Operations

#### `create(data: object, ctrl?: object)`

Create a new entity with the given data.

```ts
const result = await client.DeleteForumTopic().create({
  chat_id: 'example_chat_id',
  message_thread_id: 1,
  ok: true,
})
```

### Common Methods

#### `data(data?: object)`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `match(match?: object)`

Get or set the entity match criteria. Works the same as `data()`.

#### `make()`

Create a new `DeleteForumTopicEntity` instance with the same client and
options.

#### `client()`

Return the parent `TelegramBotSDK` instance.

#### `entopts()`

Return a copy of the entity options.


---

## EditForumTopicEntity

```ts
const edit_forum_topic = client.EditForumTopic()
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
| `parameters` | `Record<string, any>` | No |  |
| `result` | `any[]` | No | The result of the query |

### Operations

#### `create(data: object, ctrl?: object)`

Create a new entity with the given data.

```ts
const result = await client.EditForumTopic().create({
  chat_id: 'example_chat_id',
  message_thread_id: 1,
  ok: true,
})
```

### Common Methods

#### `data(data?: object)`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `match(match?: object)`

Get or set the entity match criteria. Works the same as `data()`.

#### `make()`

Create a new `EditForumTopicEntity` instance with the same client and
options.

#### `client()`

Return the parent `TelegramBotSDK` instance.

#### `entopts()`

Return a copy of the entity options.


---

## FileEntity

```ts
const file = client.File()
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `file_id` | `string` | Yes |  |

### Operations

#### `create(data: object, ctrl?: object)`

Create a new entity with the given data.

```ts
const result = await client.File().create({
  file_id: 'example_file_id',
})
```

### Common Methods

#### `data(data?: object)`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `match(match?: object)`

Get or set the entity match criteria. Works the same as `data()`.

#### `make()`

Create a new `FileEntity` instance with the same client and
options.

#### `client()`

Return the parent `TelegramBotSDK` instance.

#### `entopts()`

Return a copy of the entity options.


---

## ForumTopicEntity

```ts
const forum_topic = client.ForumTopic()
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `string` | Yes |  |
| `icon_color` | `number` | No |  |
| `icon_custom_emoji_id` | `string` | No |  |
| `name` | `string` | Yes |  |

### Operations

#### `create(data: object, ctrl?: object)`

Create a new entity with the given data.

```ts
const result = await client.ForumTopic().create({
  chat_id: 'example_chat_id',
  name: 'example_name',
})
```

### Common Methods

#### `data(data?: object)`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `match(match?: object)`

Get or set the entity match criteria. Works the same as `data()`.

#### `make()`

Create a new `ForumTopicEntity` instance with the same client and
options.

#### `client()`

Return the parent `TelegramBotSDK` instance.

#### `entopts()`

Return a copy of the entity options.


---

## GetBusinessAccountGiftEntity

```ts
const get_business_account_gift = client.GetBusinessAccountGift()
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
| `parameters` | `Record<string, any>` | No |  |
| `result` | `any[]` | No | The result of the query |

### Operations

#### `create(data: object, ctrl?: object)`

Create a new entity with the given data.

```ts
const result = await client.GetBusinessAccountGift().create({
  ok: true,
})
```

### Common Methods

#### `data(data?: object)`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `match(match?: object)`

Get or set the entity match criteria. Works the same as `data()`.

#### `make()`

Create a new `GetBusinessAccountGiftEntity` instance with the same client and
options.

#### `client()`

Return the parent `TelegramBotSDK` instance.

#### `entopts()`

Return a copy of the entity options.


---

## GetChatGiftEntity

```ts
const get_chat_gift = client.GetChatGift()
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `string` | Yes |  |
| `description` | `string` | No | Human-readable description of the result |
| `error_code` | `number` | No | Error code |
| `ok` | `boolean` | Yes | If true, the request was successful |
| `parameters` | `Record<string, any>` | No |  |
| `result` | `any[]` | No | The result of the query |

### Operations

#### `create(data: object, ctrl?: object)`

Create a new entity with the given data.

```ts
const result = await client.GetChatGift().create({
  chat_id: 'example_chat_id',
  ok: true,
})
```

### Common Methods

#### `data(data?: object)`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `match(match?: object)`

Get or set the entity match criteria. Works the same as `data()`.

#### `make()`

Create a new `GetChatGiftEntity` instance with the same client and
options.

#### `client()`

Return the parent `TelegramBotSDK` instance.

#### `entopts()`

Return a copy of the entity options.


---

## GetMeEntity

```ts
const get_me = client.GetMe()
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `description` | `string` | No | Human-readable description of the result |
| `error_code` | `number` | No | Error code |
| `ok` | `boolean` | Yes | If true, the request was successful |
| `parameters` | `Record<string, any>` | No |  |
| `result` | `any[]` | No | The result of the query |

### Operations

#### `create(data: object, ctrl?: object)`

Create a new entity with the given data.

```ts
const result = await client.GetMe().create({
  ok: true,
})
```

#### `load(match: object, ctrl?: object)`

Load a single entity matching the given criteria.

```ts
const result = await client.GetMe().load()
```

### Common Methods

#### `data(data?: object)`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `match(match?: object)`

Get or set the entity match criteria. Works the same as `data()`.

#### `make()`

Create a new `GetMeEntity` instance with the same client and
options.

#### `client()`

Return the parent `TelegramBotSDK` instance.

#### `entopts()`

Return a copy of the entity options.


---

## GetUserGiftEntity

```ts
const get_user_gift = client.GetUserGift()
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `description` | `string` | No | Human-readable description of the result |
| `error_code` | `number` | No | Error code |
| `ok` | `boolean` | Yes | If true, the request was successful |
| `parameters` | `Record<string, any>` | No |  |
| `result` | `any[]` | No | The result of the query |
| `user_id` | `number` | Yes |  |

### Operations

#### `create(data: object, ctrl?: object)`

Create a new entity with the given data.

```ts
const result = await client.GetUserGift().create({
  ok: true,
  user_id: 1,
})
```

### Common Methods

#### `data(data?: object)`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `match(match?: object)`

Get or set the entity match criteria. Works the same as `data()`.

#### `make()`

Create a new `GetUserGiftEntity` instance with the same client and
options.

#### `client()`

Return the parent `TelegramBotSDK` instance.

#### `entopts()`

Return a copy of the entity options.


---

## GetUserProfileAudioEntity

```ts
const get_user_profile_audio = client.GetUserProfileAudio()
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `description` | `string` | No | Human-readable description of the result |
| `error_code` | `number` | No | Error code |
| `ok` | `boolean` | Yes | If true, the request was successful |
| `parameters` | `Record<string, any>` | No |  |
| `result` | `any[]` | No | The result of the query |
| `user_id` | `number` | Yes |  |

### Operations

#### `create(data: object, ctrl?: object)`

Create a new entity with the given data.

```ts
const result = await client.GetUserProfileAudio().create({
  ok: true,
  user_id: 1,
})
```

### Common Methods

#### `data(data?: object)`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `match(match?: object)`

Get or set the entity match criteria. Works the same as `data()`.

#### `make()`

Create a new `GetUserProfileAudioEntity` instance with the same client and
options.

#### `client()`

Return the parent `TelegramBotSDK` instance.

#### `entopts()`

Return a copy of the entity options.


---

## MessageEntity

```ts
const message = client.Message()
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
| `options` | `any[]` | Yes |  |
| `parse_mode` | `string` | No | Mode for parsing entities in the message text |
| `protect_content` | `boolean` | No | Protects the contents of the sent message from forwarding and saving |
| `question` | `string` | Yes |  |
| `reply_to_message_id` | `number` | No | If the message is a reply, ID of the original message |
| `text` | `string` | Yes | Text of the message to be sent |

### Operations

#### `create(data: object, ctrl?: object)`

Create a new entity with the given data.

```ts
const result = await client.Message().create({
  chat_id: 'example_chat_id',
  from_chat_id: 'example_from_chat_id',
  latitude: 1,
  longitude: 1,
  message_id: 1,
  options: [],
  question: 'example_question',
  text: 'example_text',
})
```

### Common Methods

#### `data(data?: object)`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `match(match?: object)`

Get or set the entity match criteria. Works the same as `data()`.

#### `make()`

Create a new `MessageEntity` instance with the same client and
options.

#### `client()`

Return the parent `TelegramBotSDK` instance.

#### `entopts()`

Return a copy of the entity options.


---

## MessageIdEntity

```ts
const message_id = client.MessageId()
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

#### `create(data: object, ctrl?: object)`

Create a new entity with the given data.

```ts
const result = await client.MessageId().create({
  chat_id: 'example_chat_id',
  from_chat_id: 'example_from_chat_id',
  message_id: 1,
})
```

### Common Methods

#### `data(data?: object)`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `match(match?: object)`

Get or set the entity match criteria. Works the same as `data()`.

#### `make()`

Create a new `MessageIdEntity` instance with the same client and
options.

#### `client()`

Return the parent `TelegramBotSDK` instance.

#### `entopts()`

Return a copy of the entity options.


---

## PromoteChatMemberEntity

```ts
const promote_chat_member = client.PromoteChatMember()
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
| `parameters` | `Record<string, any>` | No |  |
| `result` | `any[]` | No | The result of the query |
| `user_id` | `number` | Yes |  |

### Operations

#### `create(data: object, ctrl?: object)`

Create a new entity with the given data.

```ts
const result = await client.PromoteChatMember().create({
  chat_id: 'example_chat_id',
  ok: true,
  user_id: 1,
})
```

### Common Methods

#### `data(data?: object)`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `match(match?: object)`

Get or set the entity match criteria. Works the same as `data()`.

#### `make()`

Create a new `PromoteChatMemberEntity` instance with the same client and
options.

#### `client()`

Return the parent `TelegramBotSDK` instance.

#### `entopts()`

Return a copy of the entity options.


---

## RemoveMyProfilePhotoEntity

```ts
const remove_my_profile_photo = client.RemoveMyProfilePhoto()
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `description` | `string` | No | Human-readable description of the result |
| `error_code` | `number` | No | Error code |
| `ok` | `boolean` | Yes | If true, the request was successful |
| `parameters` | `Record<string, any>` | No |  |
| `result` | `any[]` | No | The result of the query |

### Operations

#### `create(data: object, ctrl?: object)`

Create a new entity with the given data.

```ts
const result = await client.RemoveMyProfilePhoto().create({
  ok: true,
})
```

### Common Methods

#### `data(data?: object)`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `match(match?: object)`

Get or set the entity match criteria. Works the same as `data()`.

#### `make()`

Create a new `RemoveMyProfilePhotoEntity` instance with the same client and
options.

#### `client()`

Return the parent `TelegramBotSDK` instance.

#### `entopts()`

Return a copy of the entity options.


---

## RepostStoryEntity

```ts
const repost_story = client.RepostStory()
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `string` | Yes |  |
| `description` | `string` | No | Human-readable description of the result |
| `error_code` | `number` | No | Error code |
| `ok` | `boolean` | Yes | If true, the request was successful |
| `parameters` | `Record<string, any>` | No |  |
| `result` | `any[]` | No | The result of the query |
| `story_id` | `number` | Yes |  |

### Operations

#### `create(data: object, ctrl?: object)`

Create a new entity with the given data.

```ts
const result = await client.RepostStory().create({
  chat_id: 'example_chat_id',
  ok: true,
  story_id: 1,
})
```

### Common Methods

#### `data(data?: object)`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `match(match?: object)`

Get or set the entity match criteria. Works the same as `data()`.

#### `make()`

Create a new `RepostStoryEntity` instance with the same client and
options.

#### `client()`

Return the parent `TelegramBotSDK` instance.

#### `entopts()`

Return a copy of the entity options.


---

## SendChatActionEntity

```ts
const send_chat_action = client.SendChatAction()
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
| `parameters` | `Record<string, any>` | No |  |
| `result` | `any[]` | No | The result of the query |

### Operations

#### `create(data: object, ctrl?: object)`

Create a new entity with the given data.

```ts
const result = await client.SendChatAction().create({
  action: 'example_action',
  chat_id: 'example_chat_id',
  ok: true,
})
```

### Common Methods

#### `data(data?: object)`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `match(match?: object)`

Get or set the entity match criteria. Works the same as `data()`.

#### `make()`

Create a new `SendChatActionEntity` instance with the same client and
options.

#### `client()`

Return the parent `TelegramBotSDK` instance.

#### `entopts()`

Return a copy of the entity options.


---

## SendMessageDraftEntity

```ts
const send_message_draft = client.SendMessageDraft()
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `string` | Yes |  |
| `description` | `string` | No | Human-readable description of the result |
| `error_code` | `number` | No | Error code |
| `message_thread_id` | `number` | No |  |
| `ok` | `boolean` | Yes | If true, the request was successful |
| `parameters` | `Record<string, any>` | No |  |
| `result` | `any[]` | No | The result of the query |
| `text` | `string` | Yes |  |

### Operations

#### `create(data: object, ctrl?: object)`

Create a new entity with the given data.

```ts
const result = await client.SendMessageDraft().create({
  chat_id: 'example_chat_id',
  ok: true,
  text: 'example_text',
})
```

### Common Methods

#### `data(data?: object)`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `match(match?: object)`

Get or set the entity match criteria. Works the same as `data()`.

#### `make()`

Create a new `SendMessageDraftEntity` instance with the same client and
options.

#### `client()`

Return the parent `TelegramBotSDK` instance.

#### `entopts()`

Return a copy of the entity options.


---

## SetMyProfilePhotoEntity

```ts
const set_my_profile_photo = client.SetMyProfilePhoto()
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `description` | `string` | No | Human-readable description of the result |
| `error_code` | `number` | No | Error code |
| `ok` | `boolean` | Yes | If true, the request was successful |
| `parameters` | `Record<string, any>` | No |  |
| `result` | `any[]` | No | The result of the query |

### Operations

#### `create(data: object, ctrl?: object)`

Create a new entity with the given data.

```ts
const result = await client.SetMyProfilePhoto().create({
  ok: true,
})
```

### Common Methods

#### `data(data?: object)`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `match(match?: object)`

Get or set the entity match criteria. Works the same as `data()`.

#### `make()`

Create a new `SetMyProfilePhotoEntity` instance with the same client and
options.

#### `client()`

Return the parent `TelegramBotSDK` instance.

#### `entopts()`

Return a copy of the entity options.


---

## UnpinAllForumTopicMessageEntity

```ts
const unpin_all_forum_topic_message = client.UnpinAllForumTopicMessage()
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `string` | Yes |  |
| `description` | `string` | No | Human-readable description of the result |
| `error_code` | `number` | No | Error code |
| `message_thread_id` | `number` | Yes |  |
| `ok` | `boolean` | Yes | If true, the request was successful |
| `parameters` | `Record<string, any>` | No |  |
| `result` | `any[]` | No | The result of the query |

### Operations

#### `create(data: object, ctrl?: object)`

Create a new entity with the given data.

```ts
const result = await client.UnpinAllForumTopicMessage().create({
  chat_id: 'example_chat_id',
  message_thread_id: 1,
  ok: true,
})
```

### Common Methods

#### `data(data?: object)`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `match(match?: object)`

Get or set the entity match criteria. Works the same as `data()`.

#### `make()`

Create a new `UnpinAllForumTopicMessageEntity` instance with the same client and
options.

#### `client()`

Return the parent `TelegramBotSDK` instance.

#### `entopts()`

Return a copy of the entity options.


---

## UpdateEntity

```ts
const update = client.Update()
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `allowed_updates` | `any[]` | No |  |
| `description` | `string` | No | Human-readable description of the result |
| `error_code` | `number` | No | Error code |
| `limit` | `number` | No |  |
| `offset` | `number` | No |  |
| `ok` | `boolean` | Yes | If true, the request was successful |
| `parameters` | `Record<string, any>` | No |  |
| `result` | `any[]` | No | The result of the query |
| `timeout` | `number` | No |  |

### Operations

#### `create(data: object, ctrl?: object)`

Create a new entity with the given data.

```ts
const result = await client.Update().create({
  ok: true,
})
```

#### `list(match: object, ctrl?: object)`

List entities matching the given criteria. Returns an array.

```ts
const results = await client.Update().list()
```

### Common Methods

#### `data(data?: object)`

Get or set the entity data. When called with data, sets the entity's
internal data and returns the current data. When called without
arguments, returns a copy of the current data.

#### `match(match?: object)`

Get or set the entity match criteria. Works the same as `data()`.

#### `make()`

Create a new `UpdateEntity` instance with the same client and
options.

#### `client()`

Return the parent `TelegramBotSDK` instance.

#### `entopts()`

Return a copy of the entity options.


---

## Features

| Feature | Version | Description |
| --- | --- | --- |
| `test` | 0.0.1 | In-memory mock transport for testing without a live server |


Features are activated via the `feature` option:

```ts
const client = new TelegramBotSDK({
  feature: {
    test: { active: true },
  }
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

