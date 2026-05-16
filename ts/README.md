# TelegramBot TypeScript SDK

The TypeScript SDK for the TelegramBot API. Provides a type-safe, entity-oriented interface with full async/await support.


## Install
```bash
npm install telegram-bot
```
## Tutorial: your first API call

This tutorial walks through creating a client, listing entities, and
loading a specific record.

### 1. Create a client

```ts
import { TelegramBotSDK } from 'telegram-bot'

const client = new TelegramBotSDK({
  apikey: process.env.TELEGRAM-BOT_APIKEY,
})
```

### 4. Create, update, and remove

```ts
// Create
const created = await client.ApproveSuggestedPost().create({
  name: 'Example',
})

```


## How-to guides

### Make a direct HTTP request

For endpoints not covered by entity methods:

```ts
const result = await client.direct({
  path: '/api/resource/{id}',
  method: 'GET',
  params: { id: 'example' },
})

if (result.ok) {
  console.log(result.status)  // 200
  console.log(result.data)    // response body
}
```

### Prepare a request without sending it

```ts
const fetchdef = await client.prepare({
  path: '/api/resource/{id}',
  method: 'DELETE',
  params: { id: 'example' },
})

// Inspect before sending
console.log(fetchdef.url)
console.log(fetchdef.method)
console.log(fetchdef.headers)
```

### Use test mode

Create a mock client for unit testing — no server required:

```ts
const client = TelegramBotSDK.test()

const result = await client.Planet().load({ id: 'test01' })
// result.ok === true
// result.data contains mock response data
```

You can also use the instance method:

```ts
const client = new TelegramBotSDK({ apikey: '...' })
const testClient = client.tester()
```

### Retain entity state across calls

Entity instances remember their last match and data:

```ts
const entity = client.Planet()

// First call sets internal match
await entity.load({ id: 'example' })

// Subsequent calls reuse the stored match
const data = entity.data()
console.log(data.id) // 'example'
```

### Add custom middleware

Pass features via the `extend` option:

```ts
const logger = {
  hooks: {
    PreRequest: (ctx: any) => {
      console.log('Requesting:', ctx.spec.method, ctx.spec.path)
    },
    PreResponse: (ctx: any) => {
      console.log('Status:', ctx.out.request?.status)
    },
  },
}

const client = new TelegramBotSDK({
  apikey: '...',
  extend: [logger],
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
cd ts && npm test
```


## Reference

### TelegramBotSDK

#### Constructor

```ts
new TelegramBotSDK(options?: {
  apikey?: string
  base?: string
  prefix?: string
  suffix?: string
  feature?: Record<string, { active: boolean }>
  extend?: Feature[]
})
```

| Option | Type | Description |
| --- | --- | --- |
| `apikey` | `string` | API key for authentication. |
| `base` | `string` | Base URL of the API server. |
| `prefix` | `string` | URL path prefix prepended to all requests. |
| `suffix` | `string` | URL path suffix appended to all requests. |
| `feature` | `object` | Feature activation flags (e.g. `{ test: { active: true } }`). |
| `extend` | `Feature[]` | Additional feature instances to load. |

#### Methods

| Method | Returns | Description |
| --- | --- | --- |
| `options()` | `object` | Deep copy of current SDK options. |
| `utility()` | `Utility` | Deep copy of the SDK utility object. |
| `prepare(fetchargs?)` | `Promise<FetchDef>` | Build an HTTP request definition without sending it. |
| `direct(fetchargs?)` | `Promise<DirectResult>` | Build and send an HTTP request. |
| `ApproveSuggestedPost(data?)` | `ApproveSuggestedPostEntity` | Create a ApproveSuggestedPost entity instance. |
| `DeclineSuggestedPost(data?)` | `DeclineSuggestedPostEntity` | Create a DeclineSuggestedPost entity instance. |
| `DeleteForumTopic(data?)` | `DeleteForumTopicEntity` | Create a DeleteForumTopic entity instance. |
| `EditForumTopic(data?)` | `EditForumTopicEntity` | Create a EditForumTopic entity instance. |
| `File(data?)` | `FileEntity` | Create a File entity instance. |
| `ForumTopic(data?)` | `ForumTopicEntity` | Create a ForumTopic entity instance. |
| `GetBusinessAccountGift(data?)` | `GetBusinessAccountGiftEntity` | Create a GetBusinessAccountGift entity instance. |
| `GetChatGift(data?)` | `GetChatGiftEntity` | Create a GetChatGift entity instance. |
| `GetMe(data?)` | `GetMeEntity` | Create a GetMe entity instance. |
| `GetUserGift(data?)` | `GetUserGiftEntity` | Create a GetUserGift entity instance. |
| `GetUserProfileAudio(data?)` | `GetUserProfileAudioEntity` | Create a GetUserProfileAudio entity instance. |
| `Message(data?)` | `MessageEntity` | Create a Message entity instance. |
| `MessageId(data?)` | `MessageIdEntity` | Create a MessageId entity instance. |
| `PromoteChatMember(data?)` | `PromoteChatMemberEntity` | Create a PromoteChatMember entity instance. |
| `RemoveMyProfilePhoto(data?)` | `RemoveMyProfilePhotoEntity` | Create a RemoveMyProfilePhoto entity instance. |
| `RepostStory(data?)` | `RepostStoryEntity` | Create a RepostStory entity instance. |
| `SendChatAction(data?)` | `SendChatActionEntity` | Create a SendChatAction entity instance. |
| `SendMessageDraft(data?)` | `SendMessageDraftEntity` | Create a SendMessageDraft entity instance. |
| `SetMyProfilePhoto(data?)` | `SetMyProfilePhotoEntity` | Create a SetMyProfilePhoto entity instance. |
| `UnpinAllForumTopicMessage(data?)` | `UnpinAllForumTopicMessageEntity` | Create a UnpinAllForumTopicMessage entity instance. |
| `Update(data?)` | `UpdateEntity` | Create a Update entity instance. |
| `tester(testopts?, sdkopts?)` | `TelegramBotSDK` | Create a test-mode client instance. |

#### Static methods

| Method | Returns | Description |
| --- | --- | --- |
| `TelegramBotSDK.test(testopts?, sdkopts?)` | `TelegramBotSDK` | Create a test-mode client. |

### Entity interface

All entities share the same interface.

#### Methods

| Method | Signature | Description |
| --- | --- | --- |
| `load` | `load(reqmatch?, ctrl?): Promise<Result>` | Load a single entity by match criteria. |
| `list` | `list(reqmatch?, ctrl?): Promise<Result>` | List entities matching the criteria. |
| `create` | `create(reqdata?, ctrl?): Promise<Result>` | Create a new entity. |
| `update` | `update(reqdata?, ctrl?): Promise<Result>` | Update an existing entity. |
| `remove` | `remove(reqmatch?, ctrl?): Promise<Result>` | Remove an entity. |
| `data` | `data(data?): any` | Get or set entity data. |
| `match` | `match(match?): any` | Get or set entity match criteria. |
| `make` | `make(): Entity` | Create a new instance with the same options. |
| `client` | `client(): TelegramBotSDK` | Return the parent SDK client. |
| `entopts` | `entopts(): object` | Return a copy of the entity options. |

#### Result shape

All entity operations return a Result object:

```ts
{
  ok: boolean      // true if the HTTP status is 2xx
  status: number   // HTTP status code
  headers: object  // response headers
  data: any        // parsed JSON response body
}
```

### DirectResult shape

The `direct()` method returns:

```ts
{
  ok: boolean
  status: number
  headers: object
  data: any
}
```

On error, `ok` is `false` and an `err` property contains the error.

### FetchDef shape

The `prepare()` method returns:

```ts
{
  url: string
  method: string
  headers: Record<string, string>
  body?: any
}
```

### Entities

#### ApproveSuggestedPost

| Field | Description |
| --- | --- |
| `chat_id` |  |
| `description` |  |
| `error_code` |  |
| `message_id` |  |
| `ok` |  |
| `parameter` |  |
| `result` |  |

Operations: create.

API path: `/approveSuggestedPost`

#### DeclineSuggestedPost

| Field | Description |
| --- | --- |
| `chat_id` |  |
| `description` |  |
| `error_code` |  |
| `message_id` |  |
| `ok` |  |
| `parameter` |  |
| `result` |  |

Operations: create.

API path: `/declineSuggestedPost`

#### DeleteForumTopic

| Field | Description |
| --- | --- |
| `chat_id` |  |
| `description` |  |
| `error_code` |  |
| `message_thread_id` |  |
| `ok` |  |
| `parameter` |  |
| `result` |  |

Operations: create.

API path: `/deleteForumTopic`

#### EditForumTopic

| Field | Description |
| --- | --- |
| `chat_id` |  |
| `description` |  |
| `error_code` |  |
| `icon_custom_emoji_id` |  |
| `message_thread_id` |  |
| `name` |  |
| `ok` |  |
| `parameter` |  |
| `result` |  |

Operations: create.

API path: `/editForumTopic`

#### File

| Field | Description |
| --- | --- |
| `file_id` |  |

Operations: create.

API path: `/getFile`

#### ForumTopic

| Field | Description |
| --- | --- |
| `chat_id` |  |
| `icon_color` |  |
| `icon_custom_emoji_id` |  |
| `name` |  |

Operations: create.

API path: `/createForumTopic`

#### GetBusinessAccountGift

| Field | Description |
| --- | --- |
| `description` |  |
| `error_code` |  |
| `exclude_from_blockchain` |  |
| `exclude_limited_non_upgradable` |  |
| `exclude_limited_upgradable` |  |
| `ok` |  |
| `parameter` |  |
| `result` |  |

Operations: create.

API path: `/getBusinessAccountGifts`

#### GetChatGift

| Field | Description |
| --- | --- |
| `chat_id` |  |
| `description` |  |
| `error_code` |  |
| `ok` |  |
| `parameter` |  |
| `result` |  |

Operations: create.

API path: `/getChatGifts`

#### GetMe

| Field | Description |
| --- | --- |
| `description` |  |
| `error_code` |  |
| `ok` |  |
| `parameter` |  |
| `result` |  |

Operations: create, load.

API path: `/getMe`

#### GetUserGift

| Field | Description |
| --- | --- |
| `description` |  |
| `error_code` |  |
| `ok` |  |
| `parameter` |  |
| `result` |  |
| `user_id` |  |

Operations: create.

API path: `/getUserGifts`

#### GetUserProfileAudio

| Field | Description |
| --- | --- |
| `description` |  |
| `error_code` |  |
| `ok` |  |
| `parameter` |  |
| `result` |  |
| `user_id` |  |

Operations: create.

API path: `/getUserProfileAudios`

#### Message

| Field | Description |
| --- | --- |
| `chat_id` |  |
| `direct_messages_topic_id` |  |
| `disable_notification` |  |
| `disable_web_page_preview` |  |
| `from_chat_id` |  |
| `latitude` |  |
| `longitude` |  |
| `message_effect_id` |  |
| `message_id` |  |
| `message_thread_id` |  |
| `option` |  |
| `parse_mode` |  |
| `protect_content` |  |
| `question` |  |
| `reply_to_message_id` |  |
| `text` |  |

Operations: create.

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

Operations: create.

API path: `/copyMessage`

#### PromoteChatMember

| Field | Description |
| --- | --- |
| `can_delete_message` |  |
| `can_edit_message` |  |
| `can_manage_chat` |  |
| `can_manage_direct_message` |  |
| `can_post_message` |  |
| `chat_id` |  |
| `description` |  |
| `error_code` |  |
| `ok` |  |
| `parameter` |  |
| `result` |  |
| `user_id` |  |

Operations: create.

API path: `/promoteChatMember`

#### RemoveMyProfilePhoto

| Field | Description |
| --- | --- |
| `description` |  |
| `error_code` |  |
| `ok` |  |
| `parameter` |  |
| `result` |  |

Operations: create.

API path: `/removeMyProfilePhoto`

#### RepostStory

| Field | Description |
| --- | --- |
| `chat_id` |  |
| `description` |  |
| `error_code` |  |
| `ok` |  |
| `parameter` |  |
| `result` |  |
| `story_id` |  |

Operations: create.

API path: `/repostStory`

#### SendChatAction

| Field | Description |
| --- | --- |
| `action` |  |
| `chat_id` |  |
| `description` |  |
| `error_code` |  |
| `message_thread_id` |  |
| `ok` |  |
| `parameter` |  |
| `result` |  |

Operations: create.

API path: `/sendChatAction`

#### SendMessageDraft

| Field | Description |
| --- | --- |
| `chat_id` |  |
| `description` |  |
| `error_code` |  |
| `message_thread_id` |  |
| `ok` |  |
| `parameter` |  |
| `result` |  |
| `text` |  |

Operations: create.

API path: `/sendMessageDraft`

#### SetMyProfilePhoto

| Field | Description |
| --- | --- |
| `description` |  |
| `error_code` |  |
| `ok` |  |
| `parameter` |  |
| `result` |  |

Operations: create.

API path: `/setMyProfilePhoto`

#### UnpinAllForumTopicMessage

| Field | Description |
| --- | --- |
| `chat_id` |  |
| `description` |  |
| `error_code` |  |
| `message_thread_id` |  |
| `ok` |  |
| `parameter` |  |
| `result` |  |

Operations: create.

API path: `/unpinAllForumTopicMessages`

#### Update

| Field | Description |
| --- | --- |
| `allowed_update` |  |
| `description` |  |
| `error_code` |  |
| `limit` |  |
| `offset` |  |
| `ok` |  |
| `parameter` |  |
| `result` |  |
| `timeout` |  |

Operations: create, list.

API path: `/getUpdates`



## Entities


### ApproveSuggestedPost

Create an instance: `const approve_suggested_post = client.ApproveSuggestedPost()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

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

```ts
const approve_suggested_post = await client.ApproveSuggestedPost().create({
  chat_id: /* `$STRING` */,
  message_id: /* `$INTEGER` */,
  ok: /* `$BOOLEAN` */,
})
```


### DeclineSuggestedPost

Create an instance: `const decline_suggested_post = client.DeclineSuggestedPost()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

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

```ts
const decline_suggested_post = await client.DeclineSuggestedPost().create({
  chat_id: /* `$STRING` */,
  message_id: /* `$INTEGER` */,
  ok: /* `$BOOLEAN` */,
})
```


### DeleteForumTopic

Create an instance: `const delete_forum_topic = client.DeleteForumTopic()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

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

```ts
const delete_forum_topic = await client.DeleteForumTopic().create({
  chat_id: /* `$STRING` */,
  message_thread_id: /* `$INTEGER` */,
  ok: /* `$BOOLEAN` */,
})
```


### EditForumTopic

Create an instance: `const edit_forum_topic = client.EditForumTopic()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

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

```ts
const edit_forum_topic = await client.EditForumTopic().create({
  chat_id: /* `$STRING` */,
  message_thread_id: /* `$INTEGER` */,
  ok: /* `$BOOLEAN` */,
})
```


### File

Create an instance: `const file = client.File()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `file_id` | ``$STRING`` |  |

#### Example: Create

```ts
const file = await client.File().create({
  file_id: /* `$STRING` */,
})
```


### ForumTopic

Create an instance: `const forum_topic = client.ForumTopic()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | ``$STRING`` |  |
| `icon_color` | ``$INTEGER`` |  |
| `icon_custom_emoji_id` | ``$STRING`` |  |
| `name` | ``$STRING`` |  |

#### Example: Create

```ts
const forum_topic = await client.ForumTopic().create({
  chat_id: /* `$STRING` */,
  name: /* `$STRING` */,
})
```


### GetBusinessAccountGift

Create an instance: `const get_business_account_gift = client.GetBusinessAccountGift()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

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

```ts
const get_business_account_gift = await client.GetBusinessAccountGift().create({
  ok: /* `$BOOLEAN` */,
})
```


### GetChatGift

Create an instance: `const get_chat_gift = client.GetChatGift()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

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

```ts
const get_chat_gift = await client.GetChatGift().create({
  chat_id: /* `$STRING` */,
  ok: /* `$BOOLEAN` */,
})
```


### GetMe

Create an instance: `const get_me = client.GetMe()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |
| `load(match)` | Load a single entity by match criteria. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `description` | ``$STRING`` |  |
| `error_code` | ``$INTEGER`` |  |
| `ok` | ``$BOOLEAN`` |  |
| `parameter` | ``$OBJECT`` |  |
| `result` | ``$ANY`` |  |

#### Example: Load

```ts
const get_me = await client.GetMe().load({ id: 'get_me_id' })
```

#### Example: Create

```ts
const get_me = await client.GetMe().create({
  ok: /* `$BOOLEAN` */,
})
```


### GetUserGift

Create an instance: `const get_user_gift = client.GetUserGift()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

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

```ts
const get_user_gift = await client.GetUserGift().create({
  ok: /* `$BOOLEAN` */,
  user_id: /* `$INTEGER` */,
})
```


### GetUserProfileAudio

Create an instance: `const get_user_profile_audio = client.GetUserProfileAudio()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

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

```ts
const get_user_profile_audio = await client.GetUserProfileAudio().create({
  ok: /* `$BOOLEAN` */,
  user_id: /* `$INTEGER` */,
})
```


### Message

Create an instance: `const message = client.Message()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

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

```ts
const message = await client.Message().create({
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


### MessageId

Create an instance: `const message_id = client.MessageId()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

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

```ts
const message_id = await client.MessageId().create({
  chat_id: /* `$STRING` */,
  from_chat_id: /* `$STRING` */,
  message_id: /* `$INTEGER` */,
})
```


### PromoteChatMember

Create an instance: `const promote_chat_member = client.PromoteChatMember()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

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

```ts
const promote_chat_member = await client.PromoteChatMember().create({
  chat_id: /* `$STRING` */,
  ok: /* `$BOOLEAN` */,
  user_id: /* `$INTEGER` */,
})
```


### RemoveMyProfilePhoto

Create an instance: `const remove_my_profile_photo = client.RemoveMyProfilePhoto()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `description` | ``$STRING`` |  |
| `error_code` | ``$INTEGER`` |  |
| `ok` | ``$BOOLEAN`` |  |
| `parameter` | ``$OBJECT`` |  |
| `result` | ``$ANY`` |  |

#### Example: Create

```ts
const remove_my_profile_photo = await client.RemoveMyProfilePhoto().create({
  ok: /* `$BOOLEAN` */,
})
```


### RepostStory

Create an instance: `const repost_story = client.RepostStory()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

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

```ts
const repost_story = await client.RepostStory().create({
  chat_id: /* `$STRING` */,
  ok: /* `$BOOLEAN` */,
  story_id: /* `$INTEGER` */,
})
```


### SendChatAction

Create an instance: `const send_chat_action = client.SendChatAction()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

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

```ts
const send_chat_action = await client.SendChatAction().create({
  action: /* `$STRING` */,
  chat_id: /* `$STRING` */,
  ok: /* `$BOOLEAN` */,
})
```


### SendMessageDraft

Create an instance: `const send_message_draft = client.SendMessageDraft()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

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

```ts
const send_message_draft = await client.SendMessageDraft().create({
  chat_id: /* `$STRING` */,
  ok: /* `$BOOLEAN` */,
  text: /* `$STRING` */,
})
```


### SetMyProfilePhoto

Create an instance: `const set_my_profile_photo = client.SetMyProfilePhoto()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `description` | ``$STRING`` |  |
| `error_code` | ``$INTEGER`` |  |
| `ok` | ``$BOOLEAN`` |  |
| `parameter` | ``$OBJECT`` |  |
| `result` | ``$ANY`` |  |

#### Example: Create

```ts
const set_my_profile_photo = await client.SetMyProfilePhoto().create({
  ok: /* `$BOOLEAN` */,
})
```


### UnpinAllForumTopicMessage

Create an instance: `const unpin_all_forum_topic_message = client.UnpinAllForumTopicMessage()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

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

```ts
const unpin_all_forum_topic_message = await client.UnpinAllForumTopicMessage().create({
  chat_id: /* `$STRING` */,
  message_thread_id: /* `$INTEGER` */,
  ok: /* `$BOOLEAN` */,
})
```


### Update

Create an instance: `const update = client.Update()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |
| `list(match)` | List entities matching the criteria. |

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

```ts
const updates = await client.Update().list()
```

#### Example: Create

```ts
const update = await client.Update().create({
  ok: /* `$BOOLEAN` */,
})
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
error is returned to the caller.

An unexpected exception triggers the `PreUnexpected` hook before
propagating.

### Features and hooks

Features are the extension mechanism. A feature is an object with a
`hooks` map. Each hook key is a pipeline stage name, and the value is
a function that receives the context.

The SDK ships with built-in features:

- **TestFeature**: In-memory mock transport for testing without a live server

Features are initialized in order. Hooks fire in the order features
were added, so later features can override earlier ones.

### Module structure

```
telegram-bot/
├── src/
│   ├── TelegramBotSDK.ts        # Main SDK class
│   ├── entity/             # Entity implementations
│   ├── feature/            # Built-in features (Base, Test, Log)
│   └── utility/            # Utility functions
├── test/                   # Test suites
└── dist/                   # Compiled output
```

Import the SDK from the package root:

```ts
import { TelegramBotSDK } from 'telegram-bot'
```

### Entity state

Entity instances are stateful. After a successful `load`, the entity
stores the returned data and match criteria internally. Subsequent
calls on the same instance can rely on this state.

```ts
const moon = client.Moon()
await moon.load({ planet_id: 'earth', id: 'luna' })

// moon.data() now returns the loaded moon data
// moon.match() returns { planet_id: 'earth', id: 'luna' }
```

Call `make()` to create a fresh instance with the same configuration
but no stored state.

### Direct vs entity access

The entity interface handles URL construction, parameter placement,
and response parsing automatically. Use it for standard CRUD operations.

The `direct` method gives full control over the HTTP request. Use it
for non-standard endpoints, bulk operations, or any path not modelled
as an entity. The `prepare` method is useful for debugging — it
shows exactly what `direct` would send.


## Full Reference

See [REFERENCE.md](REFERENCE.md) for complete API reference
documentation including all method signatures, entity field schemas,
and detailed usage examples.
