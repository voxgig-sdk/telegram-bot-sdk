# TelegramBot TypeScript SDK



The TypeScript SDK for the TelegramBot API — a type-safe, entity-oriented client with full async/await support.

The API is exposed as capitalised, semantic **Entities** — e.g.
`client.ApproveSuggestedPost()` — each with a small set of operations (`list`, `load`, `create`)
instead of raw URL paths and query parameters. This keeps the surface
predictable and low-friction for both humans and AI agents.

> Also generated from this model: `go`, `go-cli`, `go-mcp`, `lua`, `php`, `py`, `rb` — see
> the [top-level README](../README.md).


## Install
This package is not yet published to npm. Install it from the GitHub
release tag (`ts/vX.Y.Z`):

- Releases: [https://github.com/voxgig-sdk/telegram-bot-sdk/releases](https://github.com/voxgig-sdk/telegram-bot-sdk/releases)


## Tutorial: your first API call

This tutorial walks through creating a client, listing entities, and
loading a specific record.

### 1. Create a client

```ts
import { TelegramBotSDK } from '@voxgig-sdk/telegram-bot'

const client = new TelegramBotSDK({
  apikey: process.env.TELEGRAM_BOT_APIKEY,
})
```

### 4. Create, update, and remove

```ts
// Create — returns the created ApproveSuggestedPost ENTITY (.data() for the record)
const created = await client.ApproveSuggestedPost().create({
  chat_id: 'example_chat_id',
  message_id: 1,
  ok: true,
})

```


## Error handling

Entity operations reject on failure, so wrap them in `try` / `catch`:

```ts
try {
  const getme = await client.GetMe().load()
  console.log(getme)
} catch (err) {
  console.error('load failed:', err)
}
```

The low-level `direct()` method does **not** throw — it returns the
value or an `Error`, so check the result before using it:

```ts
const result = await client.direct({
  path: '/api/resource/{id}',
  method: 'GET',
  params: { id: 'example_id' },
})

if (result instanceof Error) {
  throw result
}
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

if (result instanceof Error) {
  throw result
}
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

const getme = await client.GetMe().load()
// getme is the entity, populated with mock response data
// — call getme.data() for the record itself
console.log(getme)
```

You can also use the instance method:

```ts
const client = new TelegramBotSDK({ apikey: '...' })
const testClient = client.tester()
```

### Retain entity state across calls

Entity instances remember their last match and data:

```ts
const entity = client.GetMe()

// First call runs the operation and stores its result
await entity.load()

// Subsequent calls reuse the stored state
const data = entity.data()
console.log(data)
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
TELEGRAM_BOT_TEST_LIVE=TRUE
TELEGRAM_BOT_APIKEY=<your-key>
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
| `ApproveSuggestedPost(data?)` | `ApproveSuggestedPostEntity` | Create an ApproveSuggestedPost entity instance. |
| `DeclineSuggestedPost(data?)` | `DeclineSuggestedPostEntity` | Create a DeclineSuggestedPost entity instance. |
| `DeleteForumTopic(data?)` | `DeleteForumTopicEntity` | Create a DeleteForumTopic entity instance. |
| `EditForumTopic(data?)` | `EditForumTopicEntity` | Create an EditForumTopic entity instance. |
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
| `UnpinAllForumTopicMessage(data?)` | `UnpinAllForumTopicMessageEntity` | Create an UnpinAllForumTopicMessage entity instance. |
| `Update(data?)` | `UpdateEntity` | Create an Update entity instance. |
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
| `load` | `load(reqmatch?, ctrl?): Promise<Entity>` | Load a single entity by match criteria. |
| `list` | `list(reqmatch?, ctrl?): Promise<Entity[]>` | List entities matching the criteria. |
| `create` | `create(reqdata?, ctrl?): Promise<Entity>` | Create a new entity. |
| `data` | `data(data?: Partial<Entity>): Entity` | Get or set entity data. |
| `match` | `match(match?: Partial<Entity>): Partial<Entity>` | Get or set entity match criteria. |
| `make` | `make(): Entity` | Create a new instance with the same options. |
| `client` | `client(): TelegramBotSDK` | Return the parent SDK client. |
| `entopts` | `entopts(): object` | Return a copy of the entity options. |

#### Return values

Entity operations resolve to the entity data directly — there is no
result envelope:

- `load` and `create` resolve to a single entity object.
- `list` resolves to an **array** of entity objects (iterate it directly;
  there is no `.data` and no `.ok`).

On a failed request these methods **throw**, so wrap calls in
`try`/`catch` to handle errors. Only `direct()` returns the result
envelope described below.

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
| `description` | Human-readable description of the result |
| `error_code` | Error code |
| `message_id` |  |
| `ok` | If true, the request was successful |
| `parameters` |  |
| `result` | The result of the query |

Operations: create.

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

Operations: create.

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

Operations: create.

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
| `description` | Human-readable description of the result |
| `error_code` | Error code |
| `exclude_from_blockchain` |  |
| `exclude_limited_non_upgradable` |  |
| `exclude_limited_upgradable` |  |
| `ok` | If true, the request was successful |
| `parameters` |  |
| `result` | The result of the query |

Operations: create.

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

Operations: create.

API path: `/getChatGifts`

#### GetMe

| Field | Description |
| --- | --- |
| `description` | Human-readable description of the result |
| `error_code` | Error code |
| `ok` | If true, the request was successful |
| `parameters` |  |
| `result` | The result of the query |

Operations: create, load.

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

Operations: create.

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

Operations: create.

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

Operations: create.

API path: `/promoteChatMember`

#### RemoveMyProfilePhoto

| Field | Description |
| --- | --- |
| `description` | Human-readable description of the result |
| `error_code` | Error code |
| `ok` | If true, the request was successful |
| `parameters` |  |
| `result` | The result of the query |

Operations: create.

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

Operations: create.

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

Operations: create.

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

Operations: create.

API path: `/sendMessageDraft`

#### SetMyProfilePhoto

| Field | Description |
| --- | --- |
| `description` | Human-readable description of the result |
| `error_code` | Error code |
| `ok` | If true, the request was successful |
| `parameters` |  |
| `result` | The result of the query |

Operations: create.

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

Operations: create.

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
| `chat_id` | `string` |  |
| `description` | `string` | Human-readable description of the result |
| `error_code` | `number` | Error code |
| `message_id` | `number` |  |
| `ok` | `boolean` | If true, the request was successful |
| `parameters` | `Record<string, any>` |  |
| `result` | `any[]` | The result of the query |

#### Example: Create

```ts
const approve_suggested_post = await client.ApproveSuggestedPost().create({
  chat_id: 'example_chat_id',
  message_id: 1,
  ok: true,
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
| `chat_id` | `string` |  |
| `description` | `string` | Human-readable description of the result |
| `error_code` | `number` | Error code |
| `message_id` | `number` |  |
| `ok` | `boolean` | If true, the request was successful |
| `parameters` | `Record<string, any>` |  |
| `result` | `any[]` | The result of the query |

#### Example: Create

```ts
const decline_suggested_post = await client.DeclineSuggestedPost().create({
  chat_id: 'example_chat_id',
  message_id: 1,
  ok: true,
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
| `chat_id` | `string` |  |
| `description` | `string` | Human-readable description of the result |
| `error_code` | `number` | Error code |
| `message_thread_id` | `number` |  |
| `ok` | `boolean` | If true, the request was successful |
| `parameters` | `Record<string, any>` |  |
| `result` | `any[]` | The result of the query |

#### Example: Create

```ts
const delete_forum_topic = await client.DeleteForumTopic().create({
  chat_id: 'example_chat_id',
  message_thread_id: 1,
  ok: true,
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
| `chat_id` | `string` |  |
| `description` | `string` | Human-readable description of the result |
| `error_code` | `number` | Error code |
| `icon_custom_emoji_id` | `string` |  |
| `message_thread_id` | `number` |  |
| `name` | `string` |  |
| `ok` | `boolean` | If true, the request was successful |
| `parameters` | `Record<string, any>` |  |
| `result` | `any[]` | The result of the query |

#### Example: Create

```ts
const edit_forum_topic = await client.EditForumTopic().create({
  chat_id: 'example_chat_id',
  message_thread_id: 1,
  ok: true,
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
| `file_id` | `string` |  |

#### Example: Create

```ts
const file = await client.File().create({
  file_id: 'example_file_id',
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
| `chat_id` | `string` |  |
| `icon_color` | `number` |  |
| `icon_custom_emoji_id` | `string` |  |
| `name` | `string` |  |

#### Example: Create

```ts
const forum_topic = await client.ForumTopic().create({
  chat_id: 'example_chat_id',
  name: 'example_name',
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
| `description` | `string` | Human-readable description of the result |
| `error_code` | `number` | Error code |
| `exclude_from_blockchain` | `boolean` |  |
| `exclude_limited_non_upgradable` | `boolean` |  |
| `exclude_limited_upgradable` | `boolean` |  |
| `ok` | `boolean` | If true, the request was successful |
| `parameters` | `Record<string, any>` |  |
| `result` | `any[]` | The result of the query |

#### Example: Create

```ts
const get_business_account_gift = await client.GetBusinessAccountGift().create({
  ok: true,
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
| `chat_id` | `string` |  |
| `description` | `string` | Human-readable description of the result |
| `error_code` | `number` | Error code |
| `ok` | `boolean` | If true, the request was successful |
| `parameters` | `Record<string, any>` |  |
| `result` | `any[]` | The result of the query |

#### Example: Create

```ts
const get_chat_gift = await client.GetChatGift().create({
  chat_id: 'example_chat_id',
  ok: true,
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
| `description` | `string` | Human-readable description of the result |
| `error_code` | `number` | Error code |
| `ok` | `boolean` | If true, the request was successful |
| `parameters` | `Record<string, any>` |  |
| `result` | `any[]` | The result of the query |

#### Example: Load

```ts
const get_me = await client.GetMe().load()
```

#### Example: Create

```ts
const get_me = await client.GetMe().create({
  ok: true,
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
| `description` | `string` | Human-readable description of the result |
| `error_code` | `number` | Error code |
| `ok` | `boolean` | If true, the request was successful |
| `parameters` | `Record<string, any>` |  |
| `result` | `any[]` | The result of the query |
| `user_id` | `number` |  |

#### Example: Create

```ts
const get_user_gift = await client.GetUserGift().create({
  ok: true,
  user_id: 1,
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
| `description` | `string` | Human-readable description of the result |
| `error_code` | `number` | Error code |
| `ok` | `boolean` | If true, the request was successful |
| `parameters` | `Record<string, any>` |  |
| `result` | `any[]` | The result of the query |
| `user_id` | `number` |  |

#### Example: Create

```ts
const get_user_profile_audio = await client.GetUserProfileAudio().create({
  ok: true,
  user_id: 1,
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
| `chat_id` | `string` | Unique identifier for the target chat or username |
| `direct_messages_topic_id` | `number` | Unique identifier for the target direct messages topic |
| `disable_notification` | `boolean` | Sends the message silently |
| `disable_web_page_preview` | `boolean` | Disables link previews for links in this message |
| `from_chat_id` | `string` |  |
| `latitude` | `number` |  |
| `longitude` | `number` |  |
| `message_effect_id` | `string` | Unique identifier of the message effect to be added to the message |
| `message_id` | `number` |  |
| `message_thread_id` | `number` | Unique identifier for the target message thread (topic) of the forum |
| `options` | `any[]` |  |
| `parse_mode` | `string` | Mode for parsing entities in the message text |
| `protect_content` | `boolean` | Protects the contents of the sent message from forwarding and saving |
| `question` | `string` |  |
| `reply_to_message_id` | `number` | If the message is a reply, ID of the original message |
| `text` | `string` | Text of the message to be sent |

#### Example: Create

```ts
const message = await client.Message().create({
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


### MessageId

Create an instance: `const message_id = client.MessageId()`

#### Operations

| Method | Description |
| --- | --- |
| `create(data)` | Create a new entity with the given data. |

#### Fields

| Field | Type | Description |
| --- | --- | --- |
| `chat_id` | `string` |  |
| `direct_messages_topic_id` | `number` |  |
| `from_chat_id` | `string` |  |
| `message_effect_id` | `string` |  |
| `message_id` | `number` |  |
| `message_thread_id` | `number` |  |

#### Example: Create

```ts
const message_id = await client.MessageId().create({
  chat_id: 'example_chat_id',
  from_chat_id: 'example_from_chat_id',
  message_id: 1,
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
| `can_delete_messages` | `boolean` |  |
| `can_edit_messages` | `boolean` |  |
| `can_manage_chat` | `boolean` |  |
| `can_manage_direct_messages` | `boolean` |  |
| `can_post_messages` | `boolean` |  |
| `chat_id` | `string` |  |
| `description` | `string` | Human-readable description of the result |
| `error_code` | `number` | Error code |
| `ok` | `boolean` | If true, the request was successful |
| `parameters` | `Record<string, any>` |  |
| `result` | `any[]` | The result of the query |
| `user_id` | `number` |  |

#### Example: Create

```ts
const promote_chat_member = await client.PromoteChatMember().create({
  chat_id: 'example_chat_id',
  ok: true,
  user_id: 1,
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
| `description` | `string` | Human-readable description of the result |
| `error_code` | `number` | Error code |
| `ok` | `boolean` | If true, the request was successful |
| `parameters` | `Record<string, any>` |  |
| `result` | `any[]` | The result of the query |

#### Example: Create

```ts
const remove_my_profile_photo = await client.RemoveMyProfilePhoto().create({
  ok: true,
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
| `chat_id` | `string` |  |
| `description` | `string` | Human-readable description of the result |
| `error_code` | `number` | Error code |
| `ok` | `boolean` | If true, the request was successful |
| `parameters` | `Record<string, any>` |  |
| `result` | `any[]` | The result of the query |
| `story_id` | `number` |  |

#### Example: Create

```ts
const repost_story = await client.RepostStory().create({
  chat_id: 'example_chat_id',
  ok: true,
  story_id: 1,
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
| `action` | `string` |  |
| `chat_id` | `string` |  |
| `description` | `string` | Human-readable description of the result |
| `error_code` | `number` | Error code |
| `message_thread_id` | `number` |  |
| `ok` | `boolean` | If true, the request was successful |
| `parameters` | `Record<string, any>` |  |
| `result` | `any[]` | The result of the query |

#### Example: Create

```ts
const send_chat_action = await client.SendChatAction().create({
  action: 'example_action',
  chat_id: 'example_chat_id',
  ok: true,
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
| `chat_id` | `string` |  |
| `description` | `string` | Human-readable description of the result |
| `error_code` | `number` | Error code |
| `message_thread_id` | `number` |  |
| `ok` | `boolean` | If true, the request was successful |
| `parameters` | `Record<string, any>` |  |
| `result` | `any[]` | The result of the query |
| `text` | `string` |  |

#### Example: Create

```ts
const send_message_draft = await client.SendMessageDraft().create({
  chat_id: 'example_chat_id',
  ok: true,
  text: 'example_text',
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
| `description` | `string` | Human-readable description of the result |
| `error_code` | `number` | Error code |
| `ok` | `boolean` | If true, the request was successful |
| `parameters` | `Record<string, any>` |  |
| `result` | `any[]` | The result of the query |

#### Example: Create

```ts
const set_my_profile_photo = await client.SetMyProfilePhoto().create({
  ok: true,
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
| `chat_id` | `string` |  |
| `description` | `string` | Human-readable description of the result |
| `error_code` | `number` | Error code |
| `message_thread_id` | `number` |  |
| `ok` | `boolean` | If true, the request was successful |
| `parameters` | `Record<string, any>` |  |
| `result` | `any[]` | The result of the query |

#### Example: Create

```ts
const unpin_all_forum_topic_message = await client.UnpinAllForumTopicMessage().create({
  chat_id: 'example_chat_id',
  message_thread_id: 1,
  ok: true,
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
| `allowed_updates` | `any[]` |  |
| `description` | `string` | Human-readable description of the result |
| `error_code` | `number` | Error code |
| `limit` | `number` |  |
| `offset` | `number` |  |
| `ok` | `boolean` | If true, the request was successful |
| `parameters` | `Record<string, any>` |  |
| `result` | `any[]` | The result of the query |
| `timeout` | `number` |  |

#### Example: List

```ts
const updates = await client.Update().list()
```

#### Example: Create

```ts
const update = await client.Update().create({
  ok: true,
})
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
import { TelegramBotSDK } from '@voxgig-sdk/telegram-bot'
```

### Entity state

Entity instances are stateful. After a successful `load`, the entity
stores the returned data and match criteria internally. Subsequent
calls on the same instance can rely on this state.

```ts
const getme = client.GetMe()
await getme.load()

// getme.data() now returns the getme data from the last `load`
// getme.match() returns the last match criteria
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
