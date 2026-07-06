# TelegramBot PHP SDK Reference

Complete API reference for the TelegramBot PHP SDK.


## TelegramBotSDK

### Constructor

```php
require_once __DIR__ . '/telegrambot_sdk.php';

$client = new TelegramBotSDK($options);
```

Create a new SDK client instance.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `$options` | `array` | SDK configuration options. |
| `$options["apikey"]` | `string` | API key for authentication. |
| `$options["base"]` | `string` | Base URL for API requests. |
| `$options["prefix"]` | `string` | URL prefix appended after base. |
| `$options["suffix"]` | `string` | URL suffix appended after path. |
| `$options["headers"]` | `array` | Custom headers for all requests. |
| `$options["feature"]` | `array` | Feature configuration. |
| `$options["system"]` | `array` | System overrides (e.g. custom fetch). |


### Static Methods

#### `TelegramBotSDK::test($testopts = null, $sdkopts = null)`

Create a test client with mock features active. Both arguments may be `null`.

```php
$client = TelegramBotSDK::test();
```


### Instance Methods

#### `ApproveSuggestedPost($data = null)`

Create a new `ApproveSuggestedPostEntity` instance. Pass `null` for no initial data.

#### `DeclineSuggestedPost($data = null)`

Create a new `DeclineSuggestedPostEntity` instance. Pass `null` for no initial data.

#### `DeleteForumTopic($data = null)`

Create a new `DeleteForumTopicEntity` instance. Pass `null` for no initial data.

#### `EditForumTopic($data = null)`

Create a new `EditForumTopicEntity` instance. Pass `null` for no initial data.

#### `File($data = null)`

Create a new `FileEntity` instance. Pass `null` for no initial data.

#### `ForumTopic($data = null)`

Create a new `ForumTopicEntity` instance. Pass `null` for no initial data.

#### `GetBusinessAccountGift($data = null)`

Create a new `GetBusinessAccountGiftEntity` instance. Pass `null` for no initial data.

#### `GetChatGift($data = null)`

Create a new `GetChatGiftEntity` instance. Pass `null` for no initial data.

#### `GetMe($data = null)`

Create a new `GetMeEntity` instance. Pass `null` for no initial data.

#### `GetUserGift($data = null)`

Create a new `GetUserGiftEntity` instance. Pass `null` for no initial data.

#### `GetUserProfileAudio($data = null)`

Create a new `GetUserProfileAudioEntity` instance. Pass `null` for no initial data.

#### `Message($data = null)`

Create a new `MessageEntity` instance. Pass `null` for no initial data.

#### `MessageId($data = null)`

Create a new `MessageIdEntity` instance. Pass `null` for no initial data.

#### `PromoteChatMember($data = null)`

Create a new `PromoteChatMemberEntity` instance. Pass `null` for no initial data.

#### `RemoveMyProfilePhoto($data = null)`

Create a new `RemoveMyProfilePhotoEntity` instance. Pass `null` for no initial data.

#### `RepostStory($data = null)`

Create a new `RepostStoryEntity` instance. Pass `null` for no initial data.

#### `SendChatAction($data = null)`

Create a new `SendChatActionEntity` instance. Pass `null` for no initial data.

#### `SendMessageDraft($data = null)`

Create a new `SendMessageDraftEntity` instance. Pass `null` for no initial data.

#### `SetMyProfilePhoto($data = null)`

Create a new `SetMyProfilePhotoEntity` instance. Pass `null` for no initial data.

#### `UnpinAllForumTopicMessage($data = null)`

Create a new `UnpinAllForumTopicMessageEntity` instance. Pass `null` for no initial data.

#### `Update($data = null)`

Create a new `UpdateEntity` instance. Pass `null` for no initial data.

#### `options_map(): array`

Return a deep copy of the current SDK options.

#### `get_utility(): TelegramBotUtility`

Return a copy of the SDK utility object.

#### `direct(array $fetchargs = []): array`

Make a direct HTTP request to any API endpoint. This is the raw-HTTP escape
hatch: it does **not** throw. It returns a result array
`["ok" => bool, "status" => int, "headers" => array, "data" => mixed]`, or
`["ok" => false, "err" => \Exception]` on failure. Branch on `$result["ok"]`.

**Parameters:**

| Name | Type | Description |
| --- | --- | --- |
| `$fetchargs["path"]` | `string` | URL path with optional `{param}` placeholders. |
| `$fetchargs["method"]` | `string` | HTTP method (default: `"GET"`). |
| `$fetchargs["params"]` | `array` | Path parameter values for `{param}` substitution. |
| `$fetchargs["query"]` | `array` | Query string parameters. |
| `$fetchargs["headers"]` | `array` | Request headers (merged with defaults). |
| `$fetchargs["body"]` | `mixed` | Request body (arrays are JSON-serialized). |
| `$fetchargs["ctrl"]` | `array` | Control options. |

**Returns:** `array` — the result dict (see above); never throws.

#### `prepare(array $fetchargs = []): mixed`

Prepare a fetch definition without sending the request. Returns the
`$fetchdef` array. Throws on error.


---

## ApproveSuggestedPostEntity

```php
$approve_suggested_post = $client->ApproveSuggestedPost();
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `string` | Yes |  |
| `description` | `string` | No |  |
| `error_code` | `int` | No |  |
| `message_id` | `int` | Yes |  |
| `ok` | `bool` | Yes |  |
| `parameter` | `array` | No |  |
| `result` | `mixed` | No |  |

### Operations

#### `create(array $reqdata, ?array $ctrl = null): mixed`

Create a new entity with the given data. Throws on error.

```php
$result = $client->ApproveSuggestedPost()->create([
  "chat_id" => null, // string
  "message_id" => null, // int
  "ok" => null, // bool
]);
```

### Common Methods

#### `data_get(): array`

Get the entity data. Returns a copy of the current data.

#### `data_set($data): void`

Set the entity data.

#### `match_get(): array`

Get the entity match criteria.

#### `match_set($match): void`

Set the entity match criteria.

#### `make(): ApproveSuggestedPostEntity`

Create a new `ApproveSuggestedPostEntity` instance with the same client and
options.

#### `get_name(): string`

Return the entity name.


---

## DeclineSuggestedPostEntity

```php
$decline_suggested_post = $client->DeclineSuggestedPost();
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `string` | Yes |  |
| `description` | `string` | No |  |
| `error_code` | `int` | No |  |
| `message_id` | `int` | Yes |  |
| `ok` | `bool` | Yes |  |
| `parameter` | `array` | No |  |
| `result` | `mixed` | No |  |

### Operations

#### `create(array $reqdata, ?array $ctrl = null): mixed`

Create a new entity with the given data. Throws on error.

```php
$result = $client->DeclineSuggestedPost()->create([
  "chat_id" => null, // string
  "message_id" => null, // int
  "ok" => null, // bool
]);
```

### Common Methods

#### `data_get(): array`

Get the entity data. Returns a copy of the current data.

#### `data_set($data): void`

Set the entity data.

#### `match_get(): array`

Get the entity match criteria.

#### `match_set($match): void`

Set the entity match criteria.

#### `make(): DeclineSuggestedPostEntity`

Create a new `DeclineSuggestedPostEntity` instance with the same client and
options.

#### `get_name(): string`

Return the entity name.


---

## DeleteForumTopicEntity

```php
$delete_forum_topic = $client->DeleteForumTopic();
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `string` | Yes |  |
| `description` | `string` | No |  |
| `error_code` | `int` | No |  |
| `message_thread_id` | `int` | Yes |  |
| `ok` | `bool` | Yes |  |
| `parameter` | `array` | No |  |
| `result` | `mixed` | No |  |

### Operations

#### `create(array $reqdata, ?array $ctrl = null): mixed`

Create a new entity with the given data. Throws on error.

```php
$result = $client->DeleteForumTopic()->create([
  "chat_id" => null, // string
  "message_thread_id" => null, // int
  "ok" => null, // bool
]);
```

### Common Methods

#### `data_get(): array`

Get the entity data. Returns a copy of the current data.

#### `data_set($data): void`

Set the entity data.

#### `match_get(): array`

Get the entity match criteria.

#### `match_set($match): void`

Set the entity match criteria.

#### `make(): DeleteForumTopicEntity`

Create a new `DeleteForumTopicEntity` instance with the same client and
options.

#### `get_name(): string`

Return the entity name.


---

## EditForumTopicEntity

```php
$edit_forum_topic = $client->EditForumTopic();
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `string` | Yes |  |
| `description` | `string` | No |  |
| `error_code` | `int` | No |  |
| `icon_custom_emoji_id` | `string` | No |  |
| `message_thread_id` | `int` | Yes |  |
| `name` | `string` | No |  |
| `ok` | `bool` | Yes |  |
| `parameter` | `array` | No |  |
| `result` | `mixed` | No |  |

### Operations

#### `create(array $reqdata, ?array $ctrl = null): mixed`

Create a new entity with the given data. Throws on error.

```php
$result = $client->EditForumTopic()->create([
  "chat_id" => null, // string
  "message_thread_id" => null, // int
  "ok" => null, // bool
]);
```

### Common Methods

#### `data_get(): array`

Get the entity data. Returns a copy of the current data.

#### `data_set($data): void`

Set the entity data.

#### `match_get(): array`

Get the entity match criteria.

#### `match_set($match): void`

Set the entity match criteria.

#### `make(): EditForumTopicEntity`

Create a new `EditForumTopicEntity` instance with the same client and
options.

#### `get_name(): string`

Return the entity name.


---

## FileEntity

```php
$file = $client->File();
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `file_id` | `string` | Yes |  |

### Operations

#### `create(array $reqdata, ?array $ctrl = null): mixed`

Create a new entity with the given data. Throws on error.

```php
$result = $client->File()->create([
  "file_id" => null, // string
]);
```

### Common Methods

#### `data_get(): array`

Get the entity data. Returns a copy of the current data.

#### `data_set($data): void`

Set the entity data.

#### `match_get(): array`

Get the entity match criteria.

#### `match_set($match): void`

Set the entity match criteria.

#### `make(): FileEntity`

Create a new `FileEntity` instance with the same client and
options.

#### `get_name(): string`

Return the entity name.


---

## ForumTopicEntity

```php
$forum_topic = $client->ForumTopic();
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `string` | Yes |  |
| `icon_color` | `int` | No |  |
| `icon_custom_emoji_id` | `string` | No |  |
| `name` | `string` | Yes |  |

### Operations

#### `create(array $reqdata, ?array $ctrl = null): mixed`

Create a new entity with the given data. Throws on error.

```php
$result = $client->ForumTopic()->create([
  "chat_id" => null, // string
  "name" => null, // string
]);
```

### Common Methods

#### `data_get(): array`

Get the entity data. Returns a copy of the current data.

#### `data_set($data): void`

Set the entity data.

#### `match_get(): array`

Get the entity match criteria.

#### `match_set($match): void`

Set the entity match criteria.

#### `make(): ForumTopicEntity`

Create a new `ForumTopicEntity` instance with the same client and
options.

#### `get_name(): string`

Return the entity name.


---

## GetBusinessAccountGiftEntity

```php
$get_business_account_gift = $client->GetBusinessAccountGift();
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `description` | `string` | No |  |
| `error_code` | `int` | No |  |
| `exclude_from_blockchain` | `bool` | No |  |
| `exclude_limited_non_upgradable` | `bool` | No |  |
| `exclude_limited_upgradable` | `bool` | No |  |
| `ok` | `bool` | Yes |  |
| `parameter` | `array` | No |  |
| `result` | `mixed` | No |  |

### Operations

#### `create(array $reqdata, ?array $ctrl = null): mixed`

Create a new entity with the given data. Throws on error.

```php
$result = $client->GetBusinessAccountGift()->create([
  "ok" => null, // bool
]);
```

### Common Methods

#### `data_get(): array`

Get the entity data. Returns a copy of the current data.

#### `data_set($data): void`

Set the entity data.

#### `match_get(): array`

Get the entity match criteria.

#### `match_set($match): void`

Set the entity match criteria.

#### `make(): GetBusinessAccountGiftEntity`

Create a new `GetBusinessAccountGiftEntity` instance with the same client and
options.

#### `get_name(): string`

Return the entity name.


---

## GetChatGiftEntity

```php
$get_chat_gift = $client->GetChatGift();
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `string` | Yes |  |
| `description` | `string` | No |  |
| `error_code` | `int` | No |  |
| `ok` | `bool` | Yes |  |
| `parameter` | `array` | No |  |
| `result` | `mixed` | No |  |

### Operations

#### `create(array $reqdata, ?array $ctrl = null): mixed`

Create a new entity with the given data. Throws on error.

```php
$result = $client->GetChatGift()->create([
  "chat_id" => null, // string
  "ok" => null, // bool
]);
```

### Common Methods

#### `data_get(): array`

Get the entity data. Returns a copy of the current data.

#### `data_set($data): void`

Set the entity data.

#### `match_get(): array`

Get the entity match criteria.

#### `match_set($match): void`

Set the entity match criteria.

#### `make(): GetChatGiftEntity`

Create a new `GetChatGiftEntity` instance with the same client and
options.

#### `get_name(): string`

Return the entity name.


---

## GetMeEntity

```php
$get_me = $client->GetMe();
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `description` | `string` | No |  |
| `error_code` | `int` | No |  |
| `ok` | `bool` | Yes |  |
| `parameter` | `array` | No |  |
| `result` | `mixed` | No |  |

### Operations

#### `create(array $reqdata, ?array $ctrl = null): mixed`

Create a new entity with the given data. Throws on error.

```php
$result = $client->GetMe()->create([
  "ok" => null, // bool
]);
```

#### `load(array $reqmatch, ?array $ctrl = null): mixed`

Load a single entity matching the given criteria. Throws on error.

```php
$result = $client->GetMe()->load();
```

### Common Methods

#### `data_get(): array`

Get the entity data. Returns a copy of the current data.

#### `data_set($data): void`

Set the entity data.

#### `match_get(): array`

Get the entity match criteria.

#### `match_set($match): void`

Set the entity match criteria.

#### `make(): GetMeEntity`

Create a new `GetMeEntity` instance with the same client and
options.

#### `get_name(): string`

Return the entity name.


---

## GetUserGiftEntity

```php
$get_user_gift = $client->GetUserGift();
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `description` | `string` | No |  |
| `error_code` | `int` | No |  |
| `ok` | `bool` | Yes |  |
| `parameter` | `array` | No |  |
| `result` | `mixed` | No |  |
| `user_id` | `int` | Yes |  |

### Operations

#### `create(array $reqdata, ?array $ctrl = null): mixed`

Create a new entity with the given data. Throws on error.

```php
$result = $client->GetUserGift()->create([
  "ok" => null, // bool
  "user_id" => null, // int
]);
```

### Common Methods

#### `data_get(): array`

Get the entity data. Returns a copy of the current data.

#### `data_set($data): void`

Set the entity data.

#### `match_get(): array`

Get the entity match criteria.

#### `match_set($match): void`

Set the entity match criteria.

#### `make(): GetUserGiftEntity`

Create a new `GetUserGiftEntity` instance with the same client and
options.

#### `get_name(): string`

Return the entity name.


---

## GetUserProfileAudioEntity

```php
$get_user_profile_audio = $client->GetUserProfileAudio();
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `description` | `string` | No |  |
| `error_code` | `int` | No |  |
| `ok` | `bool` | Yes |  |
| `parameter` | `array` | No |  |
| `result` | `mixed` | No |  |
| `user_id` | `int` | Yes |  |

### Operations

#### `create(array $reqdata, ?array $ctrl = null): mixed`

Create a new entity with the given data. Throws on error.

```php
$result = $client->GetUserProfileAudio()->create([
  "ok" => null, // bool
  "user_id" => null, // int
]);
```

### Common Methods

#### `data_get(): array`

Get the entity data. Returns a copy of the current data.

#### `data_set($data): void`

Set the entity data.

#### `match_get(): array`

Get the entity match criteria.

#### `match_set($match): void`

Set the entity match criteria.

#### `make(): GetUserProfileAudioEntity`

Create a new `GetUserProfileAudioEntity` instance with the same client and
options.

#### `get_name(): string`

Return the entity name.


---

## MessageEntity

```php
$message = $client->Message();
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `string` | Yes |  |
| `direct_messages_topic_id` | `int` | No |  |
| `disable_notification` | `bool` | No |  |
| `disable_web_page_preview` | `bool` | No |  |
| `from_chat_id` | `string` | Yes |  |
| `latitude` | `float` | Yes |  |
| `longitude` | `float` | Yes |  |
| `message_effect_id` | `string` | No |  |
| `message_id` | `int` | Yes |  |
| `message_thread_id` | `int` | No |  |
| `option` | `array` | Yes |  |
| `parse_mode` | `string` | No |  |
| `protect_content` | `bool` | No |  |
| `question` | `string` | Yes |  |
| `reply_to_message_id` | `int` | No |  |
| `text` | `string` | Yes |  |

### Operations

#### `create(array $reqdata, ?array $ctrl = null): mixed`

Create a new entity with the given data. Throws on error.

```php
$result = $client->Message()->create([
  "chat_id" => null, // string
  "from_chat_id" => null, // string
  "latitude" => null, // float
  "longitude" => null, // float
  "message_id" => null, // int
  "option" => null, // array
  "question" => null, // string
  "text" => null, // string
]);
```

### Common Methods

#### `data_get(): array`

Get the entity data. Returns a copy of the current data.

#### `data_set($data): void`

Set the entity data.

#### `match_get(): array`

Get the entity match criteria.

#### `match_set($match): void`

Set the entity match criteria.

#### `make(): MessageEntity`

Create a new `MessageEntity` instance with the same client and
options.

#### `get_name(): string`

Return the entity name.


---

## MessageIdEntity

```php
$message_id = $client->MessageId();
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `string` | Yes |  |
| `direct_messages_topic_id` | `int` | No |  |
| `from_chat_id` | `string` | Yes |  |
| `message_effect_id` | `string` | No |  |
| `message_id` | `int` | Yes |  |
| `message_thread_id` | `int` | No |  |

### Operations

#### `create(array $reqdata, ?array $ctrl = null): mixed`

Create a new entity with the given data. Throws on error.

```php
$result = $client->MessageId()->create([
  "chat_id" => null, // string
  "from_chat_id" => null, // string
  "message_id" => null, // int
]);
```

### Common Methods

#### `data_get(): array`

Get the entity data. Returns a copy of the current data.

#### `data_set($data): void`

Set the entity data.

#### `match_get(): array`

Get the entity match criteria.

#### `match_set($match): void`

Set the entity match criteria.

#### `make(): MessageIdEntity`

Create a new `MessageIdEntity` instance with the same client and
options.

#### `get_name(): string`

Return the entity name.


---

## PromoteChatMemberEntity

```php
$promote_chat_member = $client->PromoteChatMember();
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `can_delete_message` | `bool` | No |  |
| `can_edit_message` | `bool` | No |  |
| `can_manage_chat` | `bool` | No |  |
| `can_manage_direct_message` | `bool` | No |  |
| `can_post_message` | `bool` | No |  |
| `chat_id` | `string` | Yes |  |
| `description` | `string` | No |  |
| `error_code` | `int` | No |  |
| `ok` | `bool` | Yes |  |
| `parameter` | `array` | No |  |
| `result` | `mixed` | No |  |
| `user_id` | `int` | Yes |  |

### Operations

#### `create(array $reqdata, ?array $ctrl = null): mixed`

Create a new entity with the given data. Throws on error.

```php
$result = $client->PromoteChatMember()->create([
  "chat_id" => null, // string
  "ok" => null, // bool
  "user_id" => null, // int
]);
```

### Common Methods

#### `data_get(): array`

Get the entity data. Returns a copy of the current data.

#### `data_set($data): void`

Set the entity data.

#### `match_get(): array`

Get the entity match criteria.

#### `match_set($match): void`

Set the entity match criteria.

#### `make(): PromoteChatMemberEntity`

Create a new `PromoteChatMemberEntity` instance with the same client and
options.

#### `get_name(): string`

Return the entity name.


---

## RemoveMyProfilePhotoEntity

```php
$remove_my_profile_photo = $client->RemoveMyProfilePhoto();
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `description` | `string` | No |  |
| `error_code` | `int` | No |  |
| `ok` | `bool` | Yes |  |
| `parameter` | `array` | No |  |
| `result` | `mixed` | No |  |

### Operations

#### `create(array $reqdata, ?array $ctrl = null): mixed`

Create a new entity with the given data. Throws on error.

```php
$result = $client->RemoveMyProfilePhoto()->create([
  "ok" => null, // bool
]);
```

### Common Methods

#### `data_get(): array`

Get the entity data. Returns a copy of the current data.

#### `data_set($data): void`

Set the entity data.

#### `match_get(): array`

Get the entity match criteria.

#### `match_set($match): void`

Set the entity match criteria.

#### `make(): RemoveMyProfilePhotoEntity`

Create a new `RemoveMyProfilePhotoEntity` instance with the same client and
options.

#### `get_name(): string`

Return the entity name.


---

## RepostStoryEntity

```php
$repost_story = $client->RepostStory();
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `string` | Yes |  |
| `description` | `string` | No |  |
| `error_code` | `int` | No |  |
| `ok` | `bool` | Yes |  |
| `parameter` | `array` | No |  |
| `result` | `mixed` | No |  |
| `story_id` | `int` | Yes |  |

### Operations

#### `create(array $reqdata, ?array $ctrl = null): mixed`

Create a new entity with the given data. Throws on error.

```php
$result = $client->RepostStory()->create([
  "chat_id" => null, // string
  "ok" => null, // bool
  "story_id" => null, // int
]);
```

### Common Methods

#### `data_get(): array`

Get the entity data. Returns a copy of the current data.

#### `data_set($data): void`

Set the entity data.

#### `match_get(): array`

Get the entity match criteria.

#### `match_set($match): void`

Set the entity match criteria.

#### `make(): RepostStoryEntity`

Create a new `RepostStoryEntity` instance with the same client and
options.

#### `get_name(): string`

Return the entity name.


---

## SendChatActionEntity

```php
$send_chat_action = $client->SendChatAction();
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `action` | `string` | Yes |  |
| `chat_id` | `string` | Yes |  |
| `description` | `string` | No |  |
| `error_code` | `int` | No |  |
| `message_thread_id` | `int` | No |  |
| `ok` | `bool` | Yes |  |
| `parameter` | `array` | No |  |
| `result` | `mixed` | No |  |

### Operations

#### `create(array $reqdata, ?array $ctrl = null): mixed`

Create a new entity with the given data. Throws on error.

```php
$result = $client->SendChatAction()->create([
  "action" => null, // string
  "chat_id" => null, // string
  "ok" => null, // bool
]);
```

### Common Methods

#### `data_get(): array`

Get the entity data. Returns a copy of the current data.

#### `data_set($data): void`

Set the entity data.

#### `match_get(): array`

Get the entity match criteria.

#### `match_set($match): void`

Set the entity match criteria.

#### `make(): SendChatActionEntity`

Create a new `SendChatActionEntity` instance with the same client and
options.

#### `get_name(): string`

Return the entity name.


---

## SendMessageDraftEntity

```php
$send_message_draft = $client->SendMessageDraft();
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `string` | Yes |  |
| `description` | `string` | No |  |
| `error_code` | `int` | No |  |
| `message_thread_id` | `int` | No |  |
| `ok` | `bool` | Yes |  |
| `parameter` | `array` | No |  |
| `result` | `mixed` | No |  |
| `text` | `string` | Yes |  |

### Operations

#### `create(array $reqdata, ?array $ctrl = null): mixed`

Create a new entity with the given data. Throws on error.

```php
$result = $client->SendMessageDraft()->create([
  "chat_id" => null, // string
  "ok" => null, // bool
  "text" => null, // string
]);
```

### Common Methods

#### `data_get(): array`

Get the entity data. Returns a copy of the current data.

#### `data_set($data): void`

Set the entity data.

#### `match_get(): array`

Get the entity match criteria.

#### `match_set($match): void`

Set the entity match criteria.

#### `make(): SendMessageDraftEntity`

Create a new `SendMessageDraftEntity` instance with the same client and
options.

#### `get_name(): string`

Return the entity name.


---

## SetMyProfilePhotoEntity

```php
$set_my_profile_photo = $client->SetMyProfilePhoto();
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `description` | `string` | No |  |
| `error_code` | `int` | No |  |
| `ok` | `bool` | Yes |  |
| `parameter` | `array` | No |  |
| `result` | `mixed` | No |  |

### Operations

#### `create(array $reqdata, ?array $ctrl = null): mixed`

Create a new entity with the given data. Throws on error.

```php
$result = $client->SetMyProfilePhoto()->create([
  "ok" => null, // bool
]);
```

### Common Methods

#### `data_get(): array`

Get the entity data. Returns a copy of the current data.

#### `data_set($data): void`

Set the entity data.

#### `match_get(): array`

Get the entity match criteria.

#### `match_set($match): void`

Set the entity match criteria.

#### `make(): SetMyProfilePhotoEntity`

Create a new `SetMyProfilePhotoEntity` instance with the same client and
options.

#### `get_name(): string`

Return the entity name.


---

## UnpinAllForumTopicMessageEntity

```php
$unpin_all_forum_topic_message = $client->UnpinAllForumTopicMessage();
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | `string` | Yes |  |
| `description` | `string` | No |  |
| `error_code` | `int` | No |  |
| `message_thread_id` | `int` | Yes |  |
| `ok` | `bool` | Yes |  |
| `parameter` | `array` | No |  |
| `result` | `mixed` | No |  |

### Operations

#### `create(array $reqdata, ?array $ctrl = null): mixed`

Create a new entity with the given data. Throws on error.

```php
$result = $client->UnpinAllForumTopicMessage()->create([
  "chat_id" => null, // string
  "message_thread_id" => null, // int
  "ok" => null, // bool
]);
```

### Common Methods

#### `data_get(): array`

Get the entity data. Returns a copy of the current data.

#### `data_set($data): void`

Set the entity data.

#### `match_get(): array`

Get the entity match criteria.

#### `match_set($match): void`

Set the entity match criteria.

#### `make(): UnpinAllForumTopicMessageEntity`

Create a new `UnpinAllForumTopicMessageEntity` instance with the same client and
options.

#### `get_name(): string`

Return the entity name.


---

## UpdateEntity

```php
$update = $client->Update();
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `allowed_update` | `array` | No |  |
| `description` | `string` | No |  |
| `error_code` | `int` | No |  |
| `limit` | `int` | No |  |
| `offset` | `int` | No |  |
| `ok` | `bool` | Yes |  |
| `parameter` | `array` | No |  |
| `result` | `array` | No |  |
| `timeout` | `int` | No |  |

### Operations

#### `create(array $reqdata, ?array $ctrl = null): mixed`

Create a new entity with the given data. Throws on error.

```php
$result = $client->Update()->create([
  "ok" => null, // bool
]);
```

#### `list(?array $reqmatch = null, ?array $ctrl = null): mixed`

List entities matching the given criteria (call with no argument to list all). Returns an array. Throws on error.

```php
$results = $client->Update()->list();
```

### Common Methods

#### `data_get(): array`

Get the entity data. Returns a copy of the current data.

#### `data_set($data): void`

Set the entity data.

#### `match_get(): array`

Get the entity match criteria.

#### `match_set($match): void`

Set the entity match criteria.

#### `make(): UpdateEntity`

Create a new `UpdateEntity` instance with the same client and
options.

#### `get_name(): string`

Return the entity name.


---

## Features

| Feature | Version | Description |
| --- | --- | --- |
| `test` | 0.0.1 | In-memory mock transport for testing without a live server |


Features are activated via the `feature` option:

```php
$client = new TelegramBotSDK([
  "feature" => [
    "test" => ["active" => true],
  ],
]);
```

