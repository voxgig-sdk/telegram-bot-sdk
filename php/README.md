# TelegramBot PHP SDK

The PHP SDK for the TelegramBot API. Provides an entity-oriented interface using PHP conventions.


## Install
```bash
composer require voxgig/telegram-bot-sdk
```


## Tutorial: your first API call

This tutorial walks through creating a client, listing entities, and
loading a specific record.

### 1. Create a client

```php
<?php
require_once 'telegrambot_sdk.php';

$client = new TelegramBotSDK([
    "apikey" => getenv("TELEGRAM-BOT_APIKEY"),
]);
```

### 4. Create, update, and remove

```php
// Create
[$created, $_] = $client->ApproveSuggestedPost(null)->create(["name" => "Example"], null);

```


## How-to guides

### Make a direct HTTP request

For endpoints not covered by entity methods:

```php
[$result, $err] = $client->direct([
    "path" => "/api/resource/{id}",
    "method" => "GET",
    "params" => ["id" => "example"],
]);
if ($err) { throw new \Exception($err); }

if ($result["ok"]) {
    echo $result["status"];  // 200
    print_r($result["data"]);  // response body
}
```

### Prepare a request without sending it

```php
[$fetchdef, $err] = $client->prepare([
    "path" => "/api/resource/{id}",
    "method" => "DELETE",
    "params" => ["id" => "example"],
]);
if ($err) { throw new \Exception($err); }

echo $fetchdef["url"];
echo $fetchdef["method"];
print_r($fetchdef["headers"]);
```

### Use test mode

Create a mock client for unit testing — no server required:

```php
$client = TelegramBotSDK::test(null, null);

[$result, $err] = $client->TelegramBot(null)->load(
    ["id" => "test01"], null
);
// $result contains mock response data
```

### Use a custom fetch function

Replace the HTTP transport with your own function:

```php
$mock_fetch = function ($url, $init) {
    return [
        [
            "status" => 200,
            "statusText" => "OK",
            "headers" => [],
            "json" => function () { return ["id" => "mock01"]; },
        ],
        null,
    ];
};

$client = new TelegramBotSDK([
    "base" => "http://localhost:8080",
    "system" => [
        "fetch" => $mock_fetch,
    ],
]);
```

### Run live tests

Create a `.env.local` file at the project root:

```
TELEGRAM-BOT_TEST_LIVE=TRUE
TELEGRAM-BOT_APIKEY=<your-key>
```

Then run:

```bash
cd php && ./vendor/bin/phpunit test/
```


## Reference

### TelegramBotSDK

```php
require_once 'telegrambot_sdk.php';
$client = new TelegramBotSDK($options);
```

Creates a new SDK client.

| Option | Type | Description |
| --- | --- | --- |
| `apikey` | `string` | API key for authentication. |
| `base` | `string` | Base URL of the API server. |
| `prefix` | `string` | URL path prefix prepended to all requests. |
| `suffix` | `string` | URL path suffix appended to all requests. |
| `feature` | `array` | Feature activation flags. |
| `extend` | `array` | Additional Feature instances to load. |
| `system` | `array` | System overrides (e.g. custom `fetch` callable). |

### test

```php
$client = TelegramBotSDK::test($testopts, $sdkopts);
```

Creates a test-mode client with mock transport. Both arguments may be `null`.

### TelegramBotSDK methods

| Method | Signature | Description |
| --- | --- | --- |
| `options_map` | `(): array` | Deep copy of current SDK options. |
| `get_utility` | `(): Utility` | Copy of the SDK utility object. |
| `prepare` | `(array $fetchargs): array` | Build an HTTP request definition without sending. |
| `direct` | `(array $fetchargs): array` | Build and send an HTTP request. |
| `ApproveSuggestedPost` | `($data): ApproveSuggestedPostEntity` | Create a ApproveSuggestedPost entity instance. |
| `DeclineSuggestedPost` | `($data): DeclineSuggestedPostEntity` | Create a DeclineSuggestedPost entity instance. |
| `DeleteForumTopic` | `($data): DeleteForumTopicEntity` | Create a DeleteForumTopic entity instance. |
| `EditForumTopic` | `($data): EditForumTopicEntity` | Create a EditForumTopic entity instance. |
| `File` | `($data): FileEntity` | Create a File entity instance. |
| `ForumTopic` | `($data): ForumTopicEntity` | Create a ForumTopic entity instance. |
| `GetBusinessAccountGift` | `($data): GetBusinessAccountGiftEntity` | Create a GetBusinessAccountGift entity instance. |
| `GetChatGift` | `($data): GetChatGiftEntity` | Create a GetChatGift entity instance. |
| `GetMe` | `($data): GetMeEntity` | Create a GetMe entity instance. |
| `GetUserGift` | `($data): GetUserGiftEntity` | Create a GetUserGift entity instance. |
| `GetUserProfileAudio` | `($data): GetUserProfileAudioEntity` | Create a GetUserProfileAudio entity instance. |
| `Message` | `($data): MessageEntity` | Create a Message entity instance. |
| `MessageId` | `($data): MessageIdEntity` | Create a MessageId entity instance. |
| `PromoteChatMember` | `($data): PromoteChatMemberEntity` | Create a PromoteChatMember entity instance. |
| `RemoveMyProfilePhoto` | `($data): RemoveMyProfilePhotoEntity` | Create a RemoveMyProfilePhoto entity instance. |
| `RepostStory` | `($data): RepostStoryEntity` | Create a RepostStory entity instance. |
| `SendChatAction` | `($data): SendChatActionEntity` | Create a SendChatAction entity instance. |
| `SendMessageDraft` | `($data): SendMessageDraftEntity` | Create a SendMessageDraft entity instance. |
| `SetMyProfilePhoto` | `($data): SetMyProfilePhotoEntity` | Create a SetMyProfilePhoto entity instance. |
| `UnpinAllForumTopicMessage` | `($data): UnpinAllForumTopicMessageEntity` | Create a UnpinAllForumTopicMessage entity instance. |
| `Update` | `($data): UpdateEntity` | Create a Update entity instance. |

### Entity interface

All entities share the same interface.

| Method | Signature | Description |
| --- | --- | --- |
| `load` | `($reqmatch, $ctrl): array` | Load a single entity by match criteria. |
| `list` | `($reqmatch, $ctrl): array` | List entities matching the criteria. |
| `create` | `($reqdata, $ctrl): array` | Create a new entity. |
| `update` | `($reqdata, $ctrl): array` | Update an existing entity. |
| `remove` | `($reqmatch, $ctrl): array` | Remove an entity. |
| `data_get` | `(): array` | Get entity data. |
| `data_set` | `($data): void` | Set entity data. |
| `match_get` | `(): array` | Get entity match criteria. |
| `match_set` | `($match): void` | Set entity match criteria. |
| `make` | `(): Entity` | Create a new instance with the same options. |
| `get_name` | `(): string` | Return the entity name. |

### Result shape

Entity operations return `[$result, $err]`. The first value is an
`array` with these keys:

| Key | Type | Description |
| --- | --- | --- |
| `ok` | `bool` | `true` if the HTTP status is 2xx. |
| `status` | `int` | HTTP status code. |
| `headers` | `array` | Response headers. |
| `data` | `mixed` | Parsed JSON response body. |

On error, `ok` is `false` and `$err` contains the error value.

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

Operations: Create.

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

Operations: Create.

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

Operations: Create.

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
| `description` |  |
| `error_code` |  |
| `exclude_from_blockchain` |  |
| `exclude_limited_non_upgradable` |  |
| `exclude_limited_upgradable` |  |
| `ok` |  |
| `parameter` |  |
| `result` |  |

Operations: Create.

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

Operations: Create.

API path: `/getChatGifts`

#### GetMe

| Field | Description |
| --- | --- |
| `description` |  |
| `error_code` |  |
| `ok` |  |
| `parameter` |  |
| `result` |  |

Operations: Create, Load.

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

Operations: Create.

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

Operations: Create.

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

Operations: Create.

API path: `/promoteChatMember`

#### RemoveMyProfilePhoto

| Field | Description |
| --- | --- |
| `description` |  |
| `error_code` |  |
| `ok` |  |
| `parameter` |  |
| `result` |  |

Operations: Create.

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

Operations: Create.

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

Operations: Create.

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

Operations: Create.

API path: `/sendMessageDraft`

#### SetMyProfilePhoto

| Field | Description |
| --- | --- |
| `description` |  |
| `error_code` |  |
| `ok` |  |
| `parameter` |  |
| `result` |  |

Operations: Create.

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

Operations: Create.

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

Operations: Create, List.

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
error is returned to the caller as the second element in the return array.

### Features and hooks

Features are the extension mechanism. A feature is a PHP class
with hook methods named after pipeline stages (e.g. `PrePoint`,
`PreSpec`). Each method receives the context.

The SDK ships with built-in features:

- **TestFeature**: In-memory mock transport for testing without a live server

Features are initialized in order. Hooks fire in the order features
were added, so later features can override earlier ones.

### Data as arrays

The PHP SDK uses plain PHP associative arrays throughout rather than typed
objects. This mirrors the dynamic nature of the API and keeps the
SDK flexible — no code generation is needed when the API schema
changes.

Use `Helpers::to_map()` to safely validate that a value is an array.

### Directory structure

```
php/
├── telegrambot_sdk.php          -- Main SDK class
├── config.php                     -- Configuration
├── features.php                   -- Feature factory
├── core/                          -- Core types and context
├── entity/                        -- Entity implementations
├── feature/                       -- Built-in features (Base, Test, Log)
├── utility/                       -- Utility functions and struct library
└── test/                          -- Test suites
```

The main class (`telegrambot_sdk.php`) exports the SDK class
and test helper. Import entity or utility modules directly only
when needed.

### Entity state

Entity instances are stateful. After a successful `load`, the entity
stores the returned data and match criteria internally.

```php
$moon = $client->Moon();
[$result, $err] = $moon->load(["planet_id" => "earth", "id" => "luna"]);

// $moon->dataGet() now returns the loaded moon data
// $moon->matchGet() returns the last match criteria
```

Call `make()` to create a fresh instance with the same configuration
but no stored state.

### Direct vs entity access

The entity interface handles URL construction, parameter placement,
and response parsing automatically. Use it for standard CRUD operations.

`direct()` gives full control over the HTTP request. Use it for
non-standard endpoints, bulk operations, or any path not modelled as
an entity. `prepare()` builds the request without sending it — useful
for debugging or custom transport.


## Full Reference

See [REFERENCE.md](REFERENCE.md) for complete API reference
documentation including all method signatures, entity field schemas,
and detailed usage examples.
