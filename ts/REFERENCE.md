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
| `chat_id` | ``$STRING`` | Yes |  |
| `description` | ``$STRING`` | No |  |
| `error_code` | ``$INTEGER`` | No |  |
| `message_id` | ``$INTEGER`` | Yes |  |
| `ok` | ``$BOOLEAN`` | Yes |  |
| `parameter` | ``$OBJECT`` | No |  |
| `result` | ``$ANY`` | No |  |

### Operations

#### `create(data: object, ctrl?: object)`

Create a new entity with the given data.

```ts
const result = await client.ApproveSuggestedPost().create({
  chat_id: /* `$STRING` */,
  message_id: /* `$INTEGER` */,
  ok: /* `$BOOLEAN` */,
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
| `chat_id` | ``$STRING`` | Yes |  |
| `description` | ``$STRING`` | No |  |
| `error_code` | ``$INTEGER`` | No |  |
| `message_id` | ``$INTEGER`` | Yes |  |
| `ok` | ``$BOOLEAN`` | Yes |  |
| `parameter` | ``$OBJECT`` | No |  |
| `result` | ``$ANY`` | No |  |

### Operations

#### `create(data: object, ctrl?: object)`

Create a new entity with the given data.

```ts
const result = await client.DeclineSuggestedPost().create({
  chat_id: /* `$STRING` */,
  message_id: /* `$INTEGER` */,
  ok: /* `$BOOLEAN` */,
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
| `chat_id` | ``$STRING`` | Yes |  |
| `description` | ``$STRING`` | No |  |
| `error_code` | ``$INTEGER`` | No |  |
| `message_thread_id` | ``$INTEGER`` | Yes |  |
| `ok` | ``$BOOLEAN`` | Yes |  |
| `parameter` | ``$OBJECT`` | No |  |
| `result` | ``$ANY`` | No |  |

### Operations

#### `create(data: object, ctrl?: object)`

Create a new entity with the given data.

```ts
const result = await client.DeleteForumTopic().create({
  chat_id: /* `$STRING` */,
  message_thread_id: /* `$INTEGER` */,
  ok: /* `$BOOLEAN` */,
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

#### `create(data: object, ctrl?: object)`

Create a new entity with the given data.

```ts
const result = await client.EditForumTopic().create({
  chat_id: /* `$STRING` */,
  message_thread_id: /* `$INTEGER` */,
  ok: /* `$BOOLEAN` */,
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
| `file_id` | ``$STRING`` | Yes |  |

### Operations

#### `create(data: object, ctrl?: object)`

Create a new entity with the given data.

```ts
const result = await client.File().create({
  file_id: /* `$STRING` */,
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
| `chat_id` | ``$STRING`` | Yes |  |
| `icon_color` | ``$INTEGER`` | No |  |
| `icon_custom_emoji_id` | ``$STRING`` | No |  |
| `name` | ``$STRING`` | Yes |  |

### Operations

#### `create(data: object, ctrl?: object)`

Create a new entity with the given data.

```ts
const result = await client.ForumTopic().create({
  chat_id: /* `$STRING` */,
  name: /* `$STRING` */,
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
| `description` | ``$STRING`` | No |  |
| `error_code` | ``$INTEGER`` | No |  |
| `exclude_from_blockchain` | ``$BOOLEAN`` | No |  |
| `exclude_limited_non_upgradable` | ``$BOOLEAN`` | No |  |
| `exclude_limited_upgradable` | ``$BOOLEAN`` | No |  |
| `ok` | ``$BOOLEAN`` | Yes |  |
| `parameter` | ``$OBJECT`` | No |  |
| `result` | ``$ANY`` | No |  |

### Operations

#### `create(data: object, ctrl?: object)`

Create a new entity with the given data.

```ts
const result = await client.GetBusinessAccountGift().create({
  ok: /* `$BOOLEAN` */,
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
| `chat_id` | ``$STRING`` | Yes |  |
| `description` | ``$STRING`` | No |  |
| `error_code` | ``$INTEGER`` | No |  |
| `ok` | ``$BOOLEAN`` | Yes |  |
| `parameter` | ``$OBJECT`` | No |  |
| `result` | ``$ANY`` | No |  |

### Operations

#### `create(data: object, ctrl?: object)`

Create a new entity with the given data.

```ts
const result = await client.GetChatGift().create({
  chat_id: /* `$STRING` */,
  ok: /* `$BOOLEAN` */,
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
| `description` | ``$STRING`` | No |  |
| `error_code` | ``$INTEGER`` | No |  |
| `ok` | ``$BOOLEAN`` | Yes |  |
| `parameter` | ``$OBJECT`` | No |  |
| `result` | ``$ANY`` | No |  |

### Operations

#### `create(data: object, ctrl?: object)`

Create a new entity with the given data.

```ts
const result = await client.GetMe().create({
  ok: /* `$BOOLEAN` */,
})
```

#### `load(match: object, ctrl?: object)`

Load a single entity matching the given criteria.

```ts
const result = await client.GetMe().load({ id: 'get_me_id' })
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
| `description` | ``$STRING`` | No |  |
| `error_code` | ``$INTEGER`` | No |  |
| `ok` | ``$BOOLEAN`` | Yes |  |
| `parameter` | ``$OBJECT`` | No |  |
| `result` | ``$ANY`` | No |  |
| `user_id` | ``$INTEGER`` | Yes |  |

### Operations

#### `create(data: object, ctrl?: object)`

Create a new entity with the given data.

```ts
const result = await client.GetUserGift().create({
  ok: /* `$BOOLEAN` */,
  user_id: /* `$INTEGER` */,
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
| `description` | ``$STRING`` | No |  |
| `error_code` | ``$INTEGER`` | No |  |
| `ok` | ``$BOOLEAN`` | Yes |  |
| `parameter` | ``$OBJECT`` | No |  |
| `result` | ``$ANY`` | No |  |
| `user_id` | ``$INTEGER`` | Yes |  |

### Operations

#### `create(data: object, ctrl?: object)`

Create a new entity with the given data.

```ts
const result = await client.GetUserProfileAudio().create({
  ok: /* `$BOOLEAN` */,
  user_id: /* `$INTEGER` */,
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

#### `create(data: object, ctrl?: object)`

Create a new entity with the given data.

```ts
const result = await client.Message().create({
  chat_id: /* `$STRING` */,
  from_chat_id: /* `$STRING` */,
  latitude: /* `$NUMBER` */,
  longitude: /* `$NUMBER` */,
  message_id: /* `$INTEGER` */,
  option: /* `$ARRAY` */,
  question: /* `$STRING` */,
  text: /* `$STRING` */,
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
| `chat_id` | ``$STRING`` | Yes |  |
| `direct_messages_topic_id` | ``$INTEGER`` | No |  |
| `from_chat_id` | ``$STRING`` | Yes |  |
| `message_effect_id` | ``$STRING`` | No |  |
| `message_id` | ``$INTEGER`` | Yes |  |
| `message_thread_id` | ``$INTEGER`` | No |  |

### Operations

#### `create(data: object, ctrl?: object)`

Create a new entity with the given data.

```ts
const result = await client.MessageId().create({
  chat_id: /* `$STRING` */,
  from_chat_id: /* `$STRING` */,
  message_id: /* `$INTEGER` */,
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

#### `create(data: object, ctrl?: object)`

Create a new entity with the given data.

```ts
const result = await client.PromoteChatMember().create({
  chat_id: /* `$STRING` */,
  ok: /* `$BOOLEAN` */,
  user_id: /* `$INTEGER` */,
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
| `description` | ``$STRING`` | No |  |
| `error_code` | ``$INTEGER`` | No |  |
| `ok` | ``$BOOLEAN`` | Yes |  |
| `parameter` | ``$OBJECT`` | No |  |
| `result` | ``$ANY`` | No |  |

### Operations

#### `create(data: object, ctrl?: object)`

Create a new entity with the given data.

```ts
const result = await client.RemoveMyProfilePhoto().create({
  ok: /* `$BOOLEAN` */,
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
| `chat_id` | ``$STRING`` | Yes |  |
| `description` | ``$STRING`` | No |  |
| `error_code` | ``$INTEGER`` | No |  |
| `ok` | ``$BOOLEAN`` | Yes |  |
| `parameter` | ``$OBJECT`` | No |  |
| `result` | ``$ANY`` | No |  |
| `story_id` | ``$INTEGER`` | Yes |  |

### Operations

#### `create(data: object, ctrl?: object)`

Create a new entity with the given data.

```ts
const result = await client.RepostStory().create({
  chat_id: /* `$STRING` */,
  ok: /* `$BOOLEAN` */,
  story_id: /* `$INTEGER` */,
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
| `action` | ``$STRING`` | Yes |  |
| `chat_id` | ``$STRING`` | Yes |  |
| `description` | ``$STRING`` | No |  |
| `error_code` | ``$INTEGER`` | No |  |
| `message_thread_id` | ``$INTEGER`` | No |  |
| `ok` | ``$BOOLEAN`` | Yes |  |
| `parameter` | ``$OBJECT`` | No |  |
| `result` | ``$ANY`` | No |  |

### Operations

#### `create(data: object, ctrl?: object)`

Create a new entity with the given data.

```ts
const result = await client.SendChatAction().create({
  action: /* `$STRING` */,
  chat_id: /* `$STRING` */,
  ok: /* `$BOOLEAN` */,
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
| `chat_id` | ``$STRING`` | Yes |  |
| `description` | ``$STRING`` | No |  |
| `error_code` | ``$INTEGER`` | No |  |
| `message_thread_id` | ``$INTEGER`` | No |  |
| `ok` | ``$BOOLEAN`` | Yes |  |
| `parameter` | ``$OBJECT`` | No |  |
| `result` | ``$ANY`` | No |  |
| `text` | ``$STRING`` | Yes |  |

### Operations

#### `create(data: object, ctrl?: object)`

Create a new entity with the given data.

```ts
const result = await client.SendMessageDraft().create({
  chat_id: /* `$STRING` */,
  ok: /* `$BOOLEAN` */,
  text: /* `$STRING` */,
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
| `description` | ``$STRING`` | No |  |
| `error_code` | ``$INTEGER`` | No |  |
| `ok` | ``$BOOLEAN`` | Yes |  |
| `parameter` | ``$OBJECT`` | No |  |
| `result` | ``$ANY`` | No |  |

### Operations

#### `create(data: object, ctrl?: object)`

Create a new entity with the given data.

```ts
const result = await client.SetMyProfilePhoto().create({
  ok: /* `$BOOLEAN` */,
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
| `chat_id` | ``$STRING`` | Yes |  |
| `description` | ``$STRING`` | No |  |
| `error_code` | ``$INTEGER`` | No |  |
| `message_thread_id` | ``$INTEGER`` | Yes |  |
| `ok` | ``$BOOLEAN`` | Yes |  |
| `parameter` | ``$OBJECT`` | No |  |
| `result` | ``$ANY`` | No |  |

### Operations

#### `create(data: object, ctrl?: object)`

Create a new entity with the given data.

```ts
const result = await client.UnpinAllForumTopicMessage().create({
  chat_id: /* `$STRING` */,
  message_thread_id: /* `$INTEGER` */,
  ok: /* `$BOOLEAN` */,
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

#### `create(data: object, ctrl?: object)`

Create a new entity with the given data.

```ts
const result = await client.Update().create({
  ok: /* `$BOOLEAN` */,
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

