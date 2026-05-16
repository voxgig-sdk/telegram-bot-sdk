# TelegramBot PHP SDK Reference

Complete API reference for the TelegramBot PHP SDK.


## TelegramBotSDK

### Constructor

```php
require_once __DIR__ . '/telegram-bot_sdk.php';

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

#### `optionsMap(): array`

Return a deep copy of the current SDK options.

#### `getUtility(): ProjectNameUtility`

Return a copy of the SDK utility object.

#### `direct(array $fetchargs = []): array`

Make a direct HTTP request to any API endpoint. Returns `[$result, $err]`.

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

**Returns:** `array [$result, $err]`

#### `prepare(array $fetchargs = []): array`

Prepare a fetch definition without sending the request. Returns `[$fetchdef, $err]`.


---

## ApproveSuggestedPostEntity

```php
$approve_suggested_post = $client->ApproveSuggestedPost();
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

#### `create(array $reqdata, ?array $ctrl = null): array`

Create a new entity with the given data.

```php
[$result, $err] = $client->ApproveSuggestedPost()->create([
  "chat_id" => /* `$STRING` */,
  "message_id" => /* `$INTEGER` */,
  "ok" => /* `$BOOLEAN` */,
]);
```

### Common Methods

#### `dataGet(): array`

Get the entity data. Returns a copy of the current data.

#### `dataSet($data): void`

Set the entity data.

#### `matchGet(): array`

Get the entity match criteria.

#### `matchSet($match): void`

Set the entity match criteria.

#### `make(): ApproveSuggestedPostEntity`

Create a new `ApproveSuggestedPostEntity` instance with the same client and
options.

#### `getName(): string`

Return the entity name.


---

## DeclineSuggestedPostEntity

```php
$decline_suggested_post = $client->DeclineSuggestedPost();
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

#### `create(array $reqdata, ?array $ctrl = null): array`

Create a new entity with the given data.

```php
[$result, $err] = $client->DeclineSuggestedPost()->create([
  "chat_id" => /* `$STRING` */,
  "message_id" => /* `$INTEGER` */,
  "ok" => /* `$BOOLEAN` */,
]);
```

### Common Methods

#### `dataGet(): array`

Get the entity data. Returns a copy of the current data.

#### `dataSet($data): void`

Set the entity data.

#### `matchGet(): array`

Get the entity match criteria.

#### `matchSet($match): void`

Set the entity match criteria.

#### `make(): DeclineSuggestedPostEntity`

Create a new `DeclineSuggestedPostEntity` instance with the same client and
options.

#### `getName(): string`

Return the entity name.


---

## DeleteForumTopicEntity

```php
$delete_forum_topic = $client->DeleteForumTopic();
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

#### `create(array $reqdata, ?array $ctrl = null): array`

Create a new entity with the given data.

```php
[$result, $err] = $client->DeleteForumTopic()->create([
  "chat_id" => /* `$STRING` */,
  "message_thread_id" => /* `$INTEGER` */,
  "ok" => /* `$BOOLEAN` */,
]);
```

### Common Methods

#### `dataGet(): array`

Get the entity data. Returns a copy of the current data.

#### `dataSet($data): void`

Set the entity data.

#### `matchGet(): array`

Get the entity match criteria.

#### `matchSet($match): void`

Set the entity match criteria.

#### `make(): DeleteForumTopicEntity`

Create a new `DeleteForumTopicEntity` instance with the same client and
options.

#### `getName(): string`

Return the entity name.


---

## EditForumTopicEntity

```php
$edit_forum_topic = $client->EditForumTopic();
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

#### `create(array $reqdata, ?array $ctrl = null): array`

Create a new entity with the given data.

```php
[$result, $err] = $client->EditForumTopic()->create([
  "chat_id" => /* `$STRING` */,
  "message_thread_id" => /* `$INTEGER` */,
  "ok" => /* `$BOOLEAN` */,
]);
```

### Common Methods

#### `dataGet(): array`

Get the entity data. Returns a copy of the current data.

#### `dataSet($data): void`

Set the entity data.

#### `matchGet(): array`

Get the entity match criteria.

#### `matchSet($match): void`

Set the entity match criteria.

#### `make(): EditForumTopicEntity`

Create a new `EditForumTopicEntity` instance with the same client and
options.

#### `getName(): string`

Return the entity name.


---

## FileEntity

```php
$file = $client->File();
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `file_id` | ``$STRING`` | Yes |  |

### Operations

#### `create(array $reqdata, ?array $ctrl = null): array`

Create a new entity with the given data.

```php
[$result, $err] = $client->File()->create([
  "file_id" => /* `$STRING` */,
]);
```

### Common Methods

#### `dataGet(): array`

Get the entity data. Returns a copy of the current data.

#### `dataSet($data): void`

Set the entity data.

#### `matchGet(): array`

Get the entity match criteria.

#### `matchSet($match): void`

Set the entity match criteria.

#### `make(): FileEntity`

Create a new `FileEntity` instance with the same client and
options.

#### `getName(): string`

Return the entity name.


---

## ForumTopicEntity

```php
$forum_topic = $client->ForumTopic();
```

### Fields

| Field | Type | Required | Description |
| --- | --- | --- | --- |
| `chat_id` | ``$STRING`` | Yes |  |
| `icon_color` | ``$INTEGER`` | No |  |
| `icon_custom_emoji_id` | ``$STRING`` | No |  |
| `name` | ``$STRING`` | Yes |  |

### Operations

#### `create(array $reqdata, ?array $ctrl = null): array`

Create a new entity with the given data.

```php
[$result, $err] = $client->ForumTopic()->create([
  "chat_id" => /* `$STRING` */,
  "name" => /* `$STRING` */,
]);
```

### Common Methods

#### `dataGet(): array`

Get the entity data. Returns a copy of the current data.

#### `dataSet($data): void`

Set the entity data.

#### `matchGet(): array`

Get the entity match criteria.

#### `matchSet($match): void`

Set the entity match criteria.

#### `make(): ForumTopicEntity`

Create a new `ForumTopicEntity` instance with the same client and
options.

#### `getName(): string`

Return the entity name.


---

## GetBusinessAccountGiftEntity

```php
$get_business_account_gift = $client->GetBusinessAccountGift();
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

#### `create(array $reqdata, ?array $ctrl = null): array`

Create a new entity with the given data.

```php
[$result, $err] = $client->GetBusinessAccountGift()->create([
  "ok" => /* `$BOOLEAN` */,
]);
```

### Common Methods

#### `dataGet(): array`

Get the entity data. Returns a copy of the current data.

#### `dataSet($data): void`

Set the entity data.

#### `matchGet(): array`

Get the entity match criteria.

#### `matchSet($match): void`

Set the entity match criteria.

#### `make(): GetBusinessAccountGiftEntity`

Create a new `GetBusinessAccountGiftEntity` instance with the same client and
options.

#### `getName(): string`

Return the entity name.


---

## GetChatGiftEntity

```php
$get_chat_gift = $client->GetChatGift();
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

#### `create(array $reqdata, ?array $ctrl = null): array`

Create a new entity with the given data.

```php
[$result, $err] = $client->GetChatGift()->create([
  "chat_id" => /* `$STRING` */,
  "ok" => /* `$BOOLEAN` */,
]);
```

### Common Methods

#### `dataGet(): array`

Get the entity data. Returns a copy of the current data.

#### `dataSet($data): void`

Set the entity data.

#### `matchGet(): array`

Get the entity match criteria.

#### `matchSet($match): void`

Set the entity match criteria.

#### `make(): GetChatGiftEntity`

Create a new `GetChatGiftEntity` instance with the same client and
options.

#### `getName(): string`

Return the entity name.


---

## GetMeEntity

```php
$get_me = $client->GetMe();
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

#### `create(array $reqdata, ?array $ctrl = null): array`

Create a new entity with the given data.

```php
[$result, $err] = $client->GetMe()->create([
  "ok" => /* `$BOOLEAN` */,
]);
```

#### `load(array $reqmatch, ?array $ctrl = null): array`

Load a single entity matching the given criteria.

```php
[$result, $err] = $client->GetMe()->load(["id" => "get_me_id"]);
```

### Common Methods

#### `dataGet(): array`

Get the entity data. Returns a copy of the current data.

#### `dataSet($data): void`

Set the entity data.

#### `matchGet(): array`

Get the entity match criteria.

#### `matchSet($match): void`

Set the entity match criteria.

#### `make(): GetMeEntity`

Create a new `GetMeEntity` instance with the same client and
options.

#### `getName(): string`

Return the entity name.


---

## GetUserGiftEntity

```php
$get_user_gift = $client->GetUserGift();
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

#### `create(array $reqdata, ?array $ctrl = null): array`

Create a new entity with the given data.

```php
[$result, $err] = $client->GetUserGift()->create([
  "ok" => /* `$BOOLEAN` */,
  "user_id" => /* `$INTEGER` */,
]);
```

### Common Methods

#### `dataGet(): array`

Get the entity data. Returns a copy of the current data.

#### `dataSet($data): void`

Set the entity data.

#### `matchGet(): array`

Get the entity match criteria.

#### `matchSet($match): void`

Set the entity match criteria.

#### `make(): GetUserGiftEntity`

Create a new `GetUserGiftEntity` instance with the same client and
options.

#### `getName(): string`

Return the entity name.


---

## GetUserProfileAudioEntity

```php
$get_user_profile_audio = $client->GetUserProfileAudio();
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

#### `create(array $reqdata, ?array $ctrl = null): array`

Create a new entity with the given data.

```php
[$result, $err] = $client->GetUserProfileAudio()->create([
  "ok" => /* `$BOOLEAN` */,
  "user_id" => /* `$INTEGER` */,
]);
```

### Common Methods

#### `dataGet(): array`

Get the entity data. Returns a copy of the current data.

#### `dataSet($data): void`

Set the entity data.

#### `matchGet(): array`

Get the entity match criteria.

#### `matchSet($match): void`

Set the entity match criteria.

#### `make(): GetUserProfileAudioEntity`

Create a new `GetUserProfileAudioEntity` instance with the same client and
options.

#### `getName(): string`

Return the entity name.


---

## MessageEntity

```php
$message = $client->Message();
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

#### `create(array $reqdata, ?array $ctrl = null): array`

Create a new entity with the given data.

```php
[$result, $err] = $client->Message()->create([
  "chat_id" => /* `$STRING` */,
  "from_chat_id" => /* `$STRING` */,
  "latitude" => /* `$NUMBER` */,
  "longitude" => /* `$NUMBER` */,
  "message_id" => /* `$INTEGER` */,
  "option" => /* `$ARRAY` */,
  "question" => /* `$STRING` */,
  "text" => /* `$STRING` */,
]);
```

### Common Methods

#### `dataGet(): array`

Get the entity data. Returns a copy of the current data.

#### `dataSet($data): void`

Set the entity data.

#### `matchGet(): array`

Get the entity match criteria.

#### `matchSet($match): void`

Set the entity match criteria.

#### `make(): MessageEntity`

Create a new `MessageEntity` instance with the same client and
options.

#### `getName(): string`

Return the entity name.


---

## MessageIdEntity

```php
$message_id = $client->MessageId();
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

#### `create(array $reqdata, ?array $ctrl = null): array`

Create a new entity with the given data.

```php
[$result, $err] = $client->MessageId()->create([
  "chat_id" => /* `$STRING` */,
  "from_chat_id" => /* `$STRING` */,
  "message_id" => /* `$INTEGER` */,
]);
```

### Common Methods

#### `dataGet(): array`

Get the entity data. Returns a copy of the current data.

#### `dataSet($data): void`

Set the entity data.

#### `matchGet(): array`

Get the entity match criteria.

#### `matchSet($match): void`

Set the entity match criteria.

#### `make(): MessageIdEntity`

Create a new `MessageIdEntity` instance with the same client and
options.

#### `getName(): string`

Return the entity name.


---

## PromoteChatMemberEntity

```php
$promote_chat_member = $client->PromoteChatMember();
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

#### `create(array $reqdata, ?array $ctrl = null): array`

Create a new entity with the given data.

```php
[$result, $err] = $client->PromoteChatMember()->create([
  "chat_id" => /* `$STRING` */,
  "ok" => /* `$BOOLEAN` */,
  "user_id" => /* `$INTEGER` */,
]);
```

### Common Methods

#### `dataGet(): array`

Get the entity data. Returns a copy of the current data.

#### `dataSet($data): void`

Set the entity data.

#### `matchGet(): array`

Get the entity match criteria.

#### `matchSet($match): void`

Set the entity match criteria.

#### `make(): PromoteChatMemberEntity`

Create a new `PromoteChatMemberEntity` instance with the same client and
options.

#### `getName(): string`

Return the entity name.


---

## RemoveMyProfilePhotoEntity

```php
$remove_my_profile_photo = $client->RemoveMyProfilePhoto();
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

#### `create(array $reqdata, ?array $ctrl = null): array`

Create a new entity with the given data.

```php
[$result, $err] = $client->RemoveMyProfilePhoto()->create([
  "ok" => /* `$BOOLEAN` */,
]);
```

### Common Methods

#### `dataGet(): array`

Get the entity data. Returns a copy of the current data.

#### `dataSet($data): void`

Set the entity data.

#### `matchGet(): array`

Get the entity match criteria.

#### `matchSet($match): void`

Set the entity match criteria.

#### `make(): RemoveMyProfilePhotoEntity`

Create a new `RemoveMyProfilePhotoEntity` instance with the same client and
options.

#### `getName(): string`

Return the entity name.


---

## RepostStoryEntity

```php
$repost_story = $client->RepostStory();
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

#### `create(array $reqdata, ?array $ctrl = null): array`

Create a new entity with the given data.

```php
[$result, $err] = $client->RepostStory()->create([
  "chat_id" => /* `$STRING` */,
  "ok" => /* `$BOOLEAN` */,
  "story_id" => /* `$INTEGER` */,
]);
```

### Common Methods

#### `dataGet(): array`

Get the entity data. Returns a copy of the current data.

#### `dataSet($data): void`

Set the entity data.

#### `matchGet(): array`

Get the entity match criteria.

#### `matchSet($match): void`

Set the entity match criteria.

#### `make(): RepostStoryEntity`

Create a new `RepostStoryEntity` instance with the same client and
options.

#### `getName(): string`

Return the entity name.


---

## SendChatActionEntity

```php
$send_chat_action = $client->SendChatAction();
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

#### `create(array $reqdata, ?array $ctrl = null): array`

Create a new entity with the given data.

```php
[$result, $err] = $client->SendChatAction()->create([
  "action" => /* `$STRING` */,
  "chat_id" => /* `$STRING` */,
  "ok" => /* `$BOOLEAN` */,
]);
```

### Common Methods

#### `dataGet(): array`

Get the entity data. Returns a copy of the current data.

#### `dataSet($data): void`

Set the entity data.

#### `matchGet(): array`

Get the entity match criteria.

#### `matchSet($match): void`

Set the entity match criteria.

#### `make(): SendChatActionEntity`

Create a new `SendChatActionEntity` instance with the same client and
options.

#### `getName(): string`

Return the entity name.


---

## SendMessageDraftEntity

```php
$send_message_draft = $client->SendMessageDraft();
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

#### `create(array $reqdata, ?array $ctrl = null): array`

Create a new entity with the given data.

```php
[$result, $err] = $client->SendMessageDraft()->create([
  "chat_id" => /* `$STRING` */,
  "ok" => /* `$BOOLEAN` */,
  "text" => /* `$STRING` */,
]);
```

### Common Methods

#### `dataGet(): array`

Get the entity data. Returns a copy of the current data.

#### `dataSet($data): void`

Set the entity data.

#### `matchGet(): array`

Get the entity match criteria.

#### `matchSet($match): void`

Set the entity match criteria.

#### `make(): SendMessageDraftEntity`

Create a new `SendMessageDraftEntity` instance with the same client and
options.

#### `getName(): string`

Return the entity name.


---

## SetMyProfilePhotoEntity

```php
$set_my_profile_photo = $client->SetMyProfilePhoto();
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

#### `create(array $reqdata, ?array $ctrl = null): array`

Create a new entity with the given data.

```php
[$result, $err] = $client->SetMyProfilePhoto()->create([
  "ok" => /* `$BOOLEAN` */,
]);
```

### Common Methods

#### `dataGet(): array`

Get the entity data. Returns a copy of the current data.

#### `dataSet($data): void`

Set the entity data.

#### `matchGet(): array`

Get the entity match criteria.

#### `matchSet($match): void`

Set the entity match criteria.

#### `make(): SetMyProfilePhotoEntity`

Create a new `SetMyProfilePhotoEntity` instance with the same client and
options.

#### `getName(): string`

Return the entity name.


---

## UnpinAllForumTopicMessageEntity

```php
$unpin_all_forum_topic_message = $client->UnpinAllForumTopicMessage();
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

#### `create(array $reqdata, ?array $ctrl = null): array`

Create a new entity with the given data.

```php
[$result, $err] = $client->UnpinAllForumTopicMessage()->create([
  "chat_id" => /* `$STRING` */,
  "message_thread_id" => /* `$INTEGER` */,
  "ok" => /* `$BOOLEAN` */,
]);
```

### Common Methods

#### `dataGet(): array`

Get the entity data. Returns a copy of the current data.

#### `dataSet($data): void`

Set the entity data.

#### `matchGet(): array`

Get the entity match criteria.

#### `matchSet($match): void`

Set the entity match criteria.

#### `make(): UnpinAllForumTopicMessageEntity`

Create a new `UnpinAllForumTopicMessageEntity` instance with the same client and
options.

#### `getName(): string`

Return the entity name.


---

## UpdateEntity

```php
$update = $client->Update();
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

#### `create(array $reqdata, ?array $ctrl = null): array`

Create a new entity with the given data.

```php
[$result, $err] = $client->Update()->create([
  "ok" => /* `$BOOLEAN` */,
]);
```

#### `list(array $reqmatch, ?array $ctrl = null): array`

List entities matching the given criteria. Returns an array.

```php
[$results, $err] = $client->Update()->list([]);
```

### Common Methods

#### `dataGet(): array`

Get the entity data. Returns a copy of the current data.

#### `dataSet($data): void`

Set the entity data.

#### `matchGet(): array`

Get the entity match criteria.

#### `matchSet($match): void`

Set the entity match criteria.

#### `make(): UpdateEntity`

Create a new `UpdateEntity` instance with the same client and
options.

#### `getName(): string`

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

