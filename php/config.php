<?php
declare(strict_types=1);

// TelegramBot SDK configuration

class TelegramBotConfig
{
    /** @var array<string,mixed>|null */
    private static ?array $shared_config = null;

    /**
     * Return the process-wide config, built once on first use. The SDK reads
     * the config on every request and never writes to it, so one instance is
     * shared by every client rather than rebuilt per client.
     *
     * PHP arrays are copy-on-write, so callers that do mutate the result get
     * their own copy and cannot disturb the shared one.
     */
    public static function shared_config(): array
    {
        if (self::$shared_config === null) {
            self::$shared_config = self::make_config();
        }
        return self::$shared_config;
    }

    /**
     * Build a fresh, fully materialised config array. Every call rebuilds the
     * whole structure, so prefer shared_config unless you need a private copy.
     */
    public static function make_config(): array
    {
        return [
            "main" => [
                "name" => "TelegramBot",
                "slug" => "telegram-bot",
                "version" => "0.0.1",
                "target" => "php",
            ],
            "feature" => [
                "test" => [
          'options' => [
            'active' => false,
          ],
        ],
            ],
            "options" => [
                "base" => "https://api.telegram.org/bot{token}",
                "server" => [
                    "token" => "",
                ],
                "auth" => [
                    "prefix" => "",
                ],
                "headers" => [
          'content-type' => 'application/json',
        ],
                "entity" => [
                    "approve_suggested_post" => [],
                    "decline_suggested_post" => [],
                    "delete_forum_topic" => [],
                    "edit_forum_topic" => [],
                    "file" => [],
                    "forum_topic" => [],
                    "get_business_account_gift" => [],
                    "get_chat_gift" => [],
                    "get_me" => [],
                    "get_user_gift" => [],
                    "get_user_profile_audio" => [],
                    "message" => [],
                    "message_id" => [],
                    "promote_chat_member" => [],
                    "remove_my_profile_photo" => [],
                    "repost_story" => [],
                    "send_chat_action" => [],
                    "send_message_draft" => [],
                    "set_my_profile_photo" => [],
                    "unpin_all_forum_topic_message" => [],
                    "update" => [],
                ],
            ],
            "entity" => [
        'approve_suggested_post' => [
          'fields' => [
            [
              'name' => 'chat_id',
              'req' => true,
              'type' => '`$STRING`',
              'union' => [
                'branches' => 2,
                'count' => 1,
                'depth' => 0,
              ],
            ],
            [
              'name' => 'description',
              'short' => 'Human-readable description of the result',
              'type' => '`$STRING`',
            ],
            [
              'name' => 'error_code',
              'short' => 'Error code',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'message_id',
              'req' => true,
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'ok',
              'req' => true,
              'short' => 'If true, the request was successful',
              'type' => '`$BOOLEAN`',
            ],
            [
              'name' => 'parameters',
              'type' => '`$OBJECT`',
            ],
            [
              'name' => 'result',
              'short' => 'The result of the query',
              'type' => '`$ARRAY`',
            ],
          ],
          'name' => 'approve_suggested_post',
          'op' => [
            'create' => [
              'input' => 'data',
              'name' => 'create',
              'points' => [
                [
                  'args' => [],
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/approveSuggestedPost',
                  'parts' => [
                    'approveSuggestedPost',
                  ],
                  'select' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body.parameters`',
                  ],
                ],
              ],
            ],
          ],
          'relations' => [
            'ancestors' => [],
          ],
        ],
        'decline_suggested_post' => [
          'fields' => [
            [
              'name' => 'chat_id',
              'req' => true,
              'type' => '`$STRING`',
              'union' => [
                'branches' => 2,
                'count' => 1,
                'depth' => 0,
              ],
            ],
            [
              'name' => 'description',
              'short' => 'Human-readable description of the result',
              'type' => '`$STRING`',
            ],
            [
              'name' => 'error_code',
              'short' => 'Error code',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'message_id',
              'req' => true,
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'ok',
              'req' => true,
              'short' => 'If true, the request was successful',
              'type' => '`$BOOLEAN`',
            ],
            [
              'name' => 'parameters',
              'type' => '`$OBJECT`',
            ],
            [
              'name' => 'result',
              'short' => 'The result of the query',
              'type' => '`$ARRAY`',
            ],
          ],
          'name' => 'decline_suggested_post',
          'op' => [
            'create' => [
              'input' => 'data',
              'name' => 'create',
              'points' => [
                [
                  'args' => [],
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/declineSuggestedPost',
                  'parts' => [
                    'declineSuggestedPost',
                  ],
                  'select' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body.parameters`',
                  ],
                ],
              ],
            ],
          ],
          'relations' => [
            'ancestors' => [],
          ],
        ],
        'delete_forum_topic' => [
          'fields' => [
            [
              'name' => 'chat_id',
              'req' => true,
              'type' => '`$STRING`',
              'union' => [
                'branches' => 2,
                'count' => 1,
                'depth' => 0,
              ],
            ],
            [
              'name' => 'description',
              'short' => 'Human-readable description of the result',
              'type' => '`$STRING`',
            ],
            [
              'name' => 'error_code',
              'short' => 'Error code',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'message_thread_id',
              'req' => true,
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'ok',
              'req' => true,
              'short' => 'If true, the request was successful',
              'type' => '`$BOOLEAN`',
            ],
            [
              'name' => 'parameters',
              'type' => '`$OBJECT`',
            ],
            [
              'name' => 'result',
              'short' => 'The result of the query',
              'type' => '`$ARRAY`',
            ],
          ],
          'name' => 'delete_forum_topic',
          'op' => [
            'create' => [
              'input' => 'data',
              'name' => 'create',
              'points' => [
                [
                  'args' => [],
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/deleteForumTopic',
                  'parts' => [
                    'deleteForumTopic',
                  ],
                  'select' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body.parameters`',
                  ],
                ],
              ],
            ],
          ],
          'relations' => [
            'ancestors' => [],
          ],
        ],
        'edit_forum_topic' => [
          'fields' => [
            [
              'name' => 'chat_id',
              'req' => true,
              'type' => '`$STRING`',
              'union' => [
                'branches' => 2,
                'count' => 1,
                'depth' => 0,
              ],
            ],
            [
              'name' => 'description',
              'short' => 'Human-readable description of the result',
              'type' => '`$STRING`',
            ],
            [
              'name' => 'error_code',
              'short' => 'Error code',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'icon_custom_emoji_id',
              'type' => '`$STRING`',
            ],
            [
              'name' => 'message_thread_id',
              'req' => true,
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'name',
              'type' => '`$STRING`',
            ],
            [
              'name' => 'ok',
              'req' => true,
              'short' => 'If true, the request was successful',
              'type' => '`$BOOLEAN`',
            ],
            [
              'name' => 'parameters',
              'type' => '`$OBJECT`',
            ],
            [
              'name' => 'result',
              'short' => 'The result of the query',
              'type' => '`$ARRAY`',
            ],
          ],
          'name' => 'edit_forum_topic',
          'op' => [
            'create' => [
              'input' => 'data',
              'name' => 'create',
              'points' => [
                [
                  'args' => [],
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/editForumTopic',
                  'parts' => [
                    'editForumTopic',
                  ],
                  'select' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body.parameters`',
                  ],
                ],
              ],
            ],
          ],
          'relations' => [
            'ancestors' => [],
          ],
        ],
        'file' => [
          'fields' => [
            [
              'name' => 'file_id',
              'req' => true,
              'type' => '`$STRING`',
            ],
          ],
          'name' => 'file',
          'op' => [
            'create' => [
              'input' => 'data',
              'name' => 'create',
              'points' => [
                [
                  'args' => [],
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/getFile',
                  'parts' => [
                    'getFile',
                  ],
                  'select' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                ],
              ],
            ],
          ],
          'relations' => [
            'ancestors' => [],
          ],
        ],
        'forum_topic' => [
          'fields' => [
            [
              'name' => 'chat_id',
              'req' => true,
              'type' => '`$STRING`',
              'union' => [
                'branches' => 2,
                'count' => 1,
                'depth' => 0,
              ],
            ],
            [
              'name' => 'icon_color',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'icon_custom_emoji_id',
              'type' => '`$STRING`',
            ],
            [
              'name' => 'name',
              'req' => true,
              'type' => '`$STRING`',
            ],
          ],
          'name' => 'forum_topic',
          'op' => [
            'create' => [
              'input' => 'data',
              'name' => 'create',
              'points' => [
                [
                  'args' => [],
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/createForumTopic',
                  'parts' => [
                    'createForumTopic',
                  ],
                  'select' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                ],
              ],
            ],
          ],
          'relations' => [
            'ancestors' => [],
          ],
        ],
        'get_business_account_gift' => [
          'fields' => [
            [
              'name' => 'description',
              'short' => 'Human-readable description of the result',
              'type' => '`$STRING`',
            ],
            [
              'name' => 'error_code',
              'short' => 'Error code',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'exclude_from_blockchain',
              'type' => '`$BOOLEAN`',
            ],
            [
              'name' => 'exclude_limited_non_upgradable',
              'type' => '`$BOOLEAN`',
            ],
            [
              'name' => 'exclude_limited_upgradable',
              'type' => '`$BOOLEAN`',
            ],
            [
              'name' => 'ok',
              'req' => true,
              'short' => 'If true, the request was successful',
              'type' => '`$BOOLEAN`',
            ],
            [
              'name' => 'parameters',
              'type' => '`$OBJECT`',
            ],
            [
              'name' => 'result',
              'short' => 'The result of the query',
              'type' => '`$ARRAY`',
            ],
          ],
          'name' => 'get_business_account_gift',
          'op' => [
            'create' => [
              'input' => 'data',
              'name' => 'create',
              'points' => [
                [
                  'args' => [],
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/getBusinessAccountGifts',
                  'parts' => [
                    'getBusinessAccountGifts',
                  ],
                  'select' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body.parameters`',
                  ],
                ],
              ],
            ],
          ],
          'relations' => [
            'ancestors' => [],
          ],
        ],
        'get_chat_gift' => [
          'fields' => [
            [
              'name' => 'chat_id',
              'req' => true,
              'type' => '`$STRING`',
              'union' => [
                'branches' => 2,
                'count' => 1,
                'depth' => 0,
              ],
            ],
            [
              'name' => 'description',
              'short' => 'Human-readable description of the result',
              'type' => '`$STRING`',
            ],
            [
              'name' => 'error_code',
              'short' => 'Error code',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'ok',
              'req' => true,
              'short' => 'If true, the request was successful',
              'type' => '`$BOOLEAN`',
            ],
            [
              'name' => 'parameters',
              'type' => '`$OBJECT`',
            ],
            [
              'name' => 'result',
              'short' => 'The result of the query',
              'type' => '`$ARRAY`',
            ],
          ],
          'name' => 'get_chat_gift',
          'op' => [
            'create' => [
              'input' => 'data',
              'name' => 'create',
              'points' => [
                [
                  'args' => [],
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/getChatGifts',
                  'parts' => [
                    'getChatGifts',
                  ],
                  'select' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body.parameters`',
                  ],
                ],
              ],
            ],
          ],
          'relations' => [
            'ancestors' => [],
          ],
        ],
        'get_me' => [
          'fields' => [
            [
              'name' => 'description',
              'short' => 'Human-readable description of the result',
              'type' => '`$STRING`',
            ],
            [
              'name' => 'error_code',
              'short' => 'Error code',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'ok',
              'req' => true,
              'short' => 'If true, the request was successful',
              'type' => '`$BOOLEAN`',
            ],
            [
              'name' => 'parameters',
              'type' => '`$OBJECT`',
            ],
            [
              'name' => 'result',
              'short' => 'The result of the query',
              'type' => '`$ARRAY`',
            ],
          ],
          'name' => 'get_me',
          'op' => [
            'create' => [
              'input' => 'data',
              'name' => 'create',
              'points' => [
                [
                  'args' => [],
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/getMe',
                  'parts' => [
                    'getMe',
                  ],
                  'select' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body.parameters`',
                  ],
                ],
              ],
            ],
            'load' => [
              'input' => 'data',
              'name' => 'load',
              'points' => [
                [
                  'args' => [],
                  'kind' => 'http',
                  'method' => 'GET',
                  'orig' => '/getMe',
                  'parts' => [
                    'getMe',
                  ],
                  'select' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body.parameters`',
                  ],
                ],
              ],
            ],
          ],
          'relations' => [
            'ancestors' => [],
          ],
        ],
        'get_user_gift' => [
          'fields' => [
            [
              'name' => 'description',
              'short' => 'Human-readable description of the result',
              'type' => '`$STRING`',
            ],
            [
              'name' => 'error_code',
              'short' => 'Error code',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'ok',
              'req' => true,
              'short' => 'If true, the request was successful',
              'type' => '`$BOOLEAN`',
            ],
            [
              'name' => 'parameters',
              'type' => '`$OBJECT`',
            ],
            [
              'name' => 'result',
              'short' => 'The result of the query',
              'type' => '`$ARRAY`',
            ],
            [
              'name' => 'user_id',
              'req' => true,
              'type' => '`$INTEGER`',
            ],
          ],
          'name' => 'get_user_gift',
          'op' => [
            'create' => [
              'input' => 'data',
              'name' => 'create',
              'points' => [
                [
                  'args' => [],
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/getUserGifts',
                  'parts' => [
                    'getUserGifts',
                  ],
                  'select' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                ],
              ],
            ],
          ],
          'relations' => [
            'ancestors' => [],
          ],
        ],
        'get_user_profile_audio' => [
          'fields' => [
            [
              'name' => 'description',
              'short' => 'Human-readable description of the result',
              'type' => '`$STRING`',
            ],
            [
              'name' => 'error_code',
              'short' => 'Error code',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'ok',
              'req' => true,
              'short' => 'If true, the request was successful',
              'type' => '`$BOOLEAN`',
            ],
            [
              'name' => 'parameters',
              'type' => '`$OBJECT`',
            ],
            [
              'name' => 'result',
              'short' => 'The result of the query',
              'type' => '`$ARRAY`',
            ],
            [
              'name' => 'user_id',
              'req' => true,
              'type' => '`$INTEGER`',
            ],
          ],
          'name' => 'get_user_profile_audio',
          'op' => [
            'create' => [
              'input' => 'data',
              'name' => 'create',
              'points' => [
                [
                  'args' => [],
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/getUserProfileAudios',
                  'parts' => [
                    'getUserProfileAudios',
                  ],
                  'select' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                ],
              ],
            ],
          ],
          'relations' => [
            'ancestors' => [],
          ],
        ],
        'message' => [
          'fields' => [
            [
              'name' => 'chat_id',
              'req' => true,
              'short' => 'Unique identifier for the target chat or username',
              'type' => '`$STRING`',
              'union' => [
                'branches' => 2,
                'count' => 1,
                'depth' => 0,
              ],
            ],
            [
              'name' => 'direct_messages_topic_id',
              'short' => 'Unique identifier for the target direct messages topic',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'disable_notification',
              'short' => 'Sends the message silently',
              'type' => '`$BOOLEAN`',
            ],
            [
              'name' => 'disable_web_page_preview',
              'short' => 'Disables link previews for links in this message',
              'type' => '`$BOOLEAN`',
            ],
            [
              'name' => 'from_chat_id',
              'req' => true,
              'type' => '`$STRING`',
              'union' => [
                'branches' => 2,
                'count' => 1,
                'depth' => 0,
              ],
            ],
            [
              'name' => 'latitude',
              'req' => true,
              'type' => '`$NUMBER`',
            ],
            [
              'name' => 'longitude',
              'req' => true,
              'type' => '`$NUMBER`',
            ],
            [
              'name' => 'message_effect_id',
              'short' => 'Unique identifier of the message effect to be added to the message',
              'type' => '`$STRING`',
            ],
            [
              'name' => 'message_id',
              'req' => true,
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'message_thread_id',
              'short' => 'Unique identifier for the target message thread (topic) of the forum',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'options',
              'req' => true,
              'type' => '`$ARRAY`',
            ],
            [
              'name' => 'parse_mode',
              'short' => 'Mode for parsing entities in the message text',
              'type' => '`$STRING`',
            ],
            [
              'name' => 'protect_content',
              'short' => 'Protects the contents of the sent message from forwarding and saving',
              'type' => '`$BOOLEAN`',
            ],
            [
              'name' => 'question',
              'req' => true,
              'type' => '`$STRING`',
            ],
            [
              'name' => 'reply_to_message_id',
              'short' => 'If the message is a reply, ID of the original message',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'text',
              'req' => true,
              'short' => 'Text of the message to be sent',
              'type' => '`$STRING`',
            ],
          ],
          'name' => 'message',
          'op' => [
            'create' => [
              'input' => 'data',
              'name' => 'create',
              'points' => [
                [
                  'args' => [],
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/forwardMessage',
                  'parts' => [
                    'forwardMessage',
                  ],
                  'select' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                ],
                [
                  'args' => [],
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/sendAnimation',
                  'parts' => [
                    'sendAnimation',
                  ],
                  'select' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                ],
                [
                  'args' => [],
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/sendAudio',
                  'parts' => [
                    'sendAudio',
                  ],
                  'select' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                ],
                [
                  'args' => [],
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/sendDocument',
                  'parts' => [
                    'sendDocument',
                  ],
                  'select' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                ],
                [
                  'args' => [],
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/sendLocation',
                  'parts' => [
                    'sendLocation',
                  ],
                  'select' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                ],
                [
                  'args' => [],
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/sendMessage',
                  'parts' => [
                    'sendMessage',
                  ],
                  'select' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                ],
                [
                  'args' => [],
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/sendPhoto',
                  'parts' => [
                    'sendPhoto',
                  ],
                  'select' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                ],
                [
                  'args' => [],
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/sendPoll',
                  'parts' => [
                    'sendPoll',
                  ],
                  'select' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                ],
                [
                  'args' => [],
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/sendSticker',
                  'parts' => [
                    'sendSticker',
                  ],
                  'select' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                ],
                [
                  'args' => [],
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/sendVideo',
                  'parts' => [
                    'sendVideo',
                  ],
                  'select' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                ],
              ],
            ],
          ],
          'relations' => [
            'ancestors' => [],
          ],
        ],
        'message_id' => [
          'fields' => [
            [
              'name' => 'chat_id',
              'req' => true,
              'type' => '`$STRING`',
              'union' => [
                'branches' => 2,
                'count' => 1,
                'depth' => 0,
              ],
            ],
            [
              'name' => 'direct_messages_topic_id',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'from_chat_id',
              'req' => true,
              'type' => '`$STRING`',
              'union' => [
                'branches' => 2,
                'count' => 1,
                'depth' => 0,
              ],
            ],
            [
              'name' => 'message_effect_id',
              'type' => '`$STRING`',
            ],
            [
              'name' => 'message_id',
              'req' => true,
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'message_thread_id',
              'type' => '`$INTEGER`',
            ],
          ],
          'name' => 'message_id',
          'op' => [
            'create' => [
              'input' => 'data',
              'name' => 'create',
              'points' => [
                [
                  'args' => [],
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/copyMessage',
                  'parts' => [
                    'copyMessage',
                  ],
                  'select' => [],
                  'transform' => [
                    'req' => [
                      'message_id' => '`reqdata`',
                    ],
                    'res' => '`body`',
                  ],
                ],
              ],
            ],
          ],
          'relations' => [
            'ancestors' => [],
          ],
        ],
        'promote_chat_member' => [
          'fields' => [
            [
              'name' => 'can_delete_messages',
              'type' => '`$BOOLEAN`',
            ],
            [
              'name' => 'can_edit_messages',
              'type' => '`$BOOLEAN`',
            ],
            [
              'name' => 'can_manage_chat',
              'type' => '`$BOOLEAN`',
            ],
            [
              'name' => 'can_manage_direct_messages',
              'type' => '`$BOOLEAN`',
            ],
            [
              'name' => 'can_post_messages',
              'type' => '`$BOOLEAN`',
            ],
            [
              'name' => 'chat_id',
              'req' => true,
              'type' => '`$STRING`',
              'union' => [
                'branches' => 2,
                'count' => 1,
                'depth' => 0,
              ],
            ],
            [
              'name' => 'description',
              'short' => 'Human-readable description of the result',
              'type' => '`$STRING`',
            ],
            [
              'name' => 'error_code',
              'short' => 'Error code',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'ok',
              'req' => true,
              'short' => 'If true, the request was successful',
              'type' => '`$BOOLEAN`',
            ],
            [
              'name' => 'parameters',
              'type' => '`$OBJECT`',
            ],
            [
              'name' => 'result',
              'short' => 'The result of the query',
              'type' => '`$ARRAY`',
            ],
            [
              'name' => 'user_id',
              'req' => true,
              'type' => '`$INTEGER`',
            ],
          ],
          'name' => 'promote_chat_member',
          'op' => [
            'create' => [
              'input' => 'data',
              'name' => 'create',
              'points' => [
                [
                  'args' => [],
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/promoteChatMember',
                  'parts' => [
                    'promoteChatMember',
                  ],
                  'select' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                ],
              ],
            ],
          ],
          'relations' => [
            'ancestors' => [],
          ],
        ],
        'remove_my_profile_photo' => [
          'fields' => [
            [
              'name' => 'description',
              'short' => 'Human-readable description of the result',
              'type' => '`$STRING`',
            ],
            [
              'name' => 'error_code',
              'short' => 'Error code',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'ok',
              'req' => true,
              'short' => 'If true, the request was successful',
              'type' => '`$BOOLEAN`',
            ],
            [
              'name' => 'parameters',
              'type' => '`$OBJECT`',
            ],
            [
              'name' => 'result',
              'short' => 'The result of the query',
              'type' => '`$ARRAY`',
            ],
          ],
          'name' => 'remove_my_profile_photo',
          'op' => [
            'create' => [
              'input' => 'data',
              'name' => 'create',
              'points' => [
                [
                  'args' => [],
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/removeMyProfilePhoto',
                  'parts' => [
                    'removeMyProfilePhoto',
                  ],
                  'select' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                ],
              ],
            ],
          ],
          'relations' => [
            'ancestors' => [],
          ],
        ],
        'repost_story' => [
          'fields' => [
            [
              'name' => 'chat_id',
              'req' => true,
              'type' => '`$STRING`',
              'union' => [
                'branches' => 2,
                'count' => 1,
                'depth' => 0,
              ],
            ],
            [
              'name' => 'description',
              'short' => 'Human-readable description of the result',
              'type' => '`$STRING`',
            ],
            [
              'name' => 'error_code',
              'short' => 'Error code',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'ok',
              'req' => true,
              'short' => 'If true, the request was successful',
              'type' => '`$BOOLEAN`',
            ],
            [
              'name' => 'parameters',
              'type' => '`$OBJECT`',
            ],
            [
              'name' => 'result',
              'short' => 'The result of the query',
              'type' => '`$ARRAY`',
            ],
            [
              'name' => 'story_id',
              'req' => true,
              'type' => '`$INTEGER`',
            ],
          ],
          'name' => 'repost_story',
          'op' => [
            'create' => [
              'input' => 'data',
              'name' => 'create',
              'points' => [
                [
                  'args' => [],
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/repostStory',
                  'parts' => [
                    'repostStory',
                  ],
                  'select' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                ],
              ],
            ],
          ],
          'relations' => [
            'ancestors' => [],
          ],
        ],
        'send_chat_action' => [
          'fields' => [
            [
              'name' => 'action',
              'req' => true,
              'type' => '`$STRING`',
            ],
            [
              'name' => 'chat_id',
              'req' => true,
              'type' => '`$STRING`',
              'union' => [
                'branches' => 2,
                'count' => 1,
                'depth' => 0,
              ],
            ],
            [
              'name' => 'description',
              'short' => 'Human-readable description of the result',
              'type' => '`$STRING`',
            ],
            [
              'name' => 'error_code',
              'short' => 'Error code',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'message_thread_id',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'ok',
              'req' => true,
              'short' => 'If true, the request was successful',
              'type' => '`$BOOLEAN`',
            ],
            [
              'name' => 'parameters',
              'type' => '`$OBJECT`',
            ],
            [
              'name' => 'result',
              'short' => 'The result of the query',
              'type' => '`$ARRAY`',
            ],
          ],
          'name' => 'send_chat_action',
          'op' => [
            'create' => [
              'input' => 'data',
              'name' => 'create',
              'points' => [
                [
                  'args' => [],
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/sendChatAction',
                  'parts' => [
                    'sendChatAction',
                  ],
                  'select' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                ],
              ],
            ],
          ],
          'relations' => [
            'ancestors' => [],
          ],
        ],
        'send_message_draft' => [
          'fields' => [
            [
              'name' => 'chat_id',
              'req' => true,
              'type' => '`$STRING`',
              'union' => [
                'branches' => 2,
                'count' => 1,
                'depth' => 0,
              ],
            ],
            [
              'name' => 'description',
              'short' => 'Human-readable description of the result',
              'type' => '`$STRING`',
            ],
            [
              'name' => 'error_code',
              'short' => 'Error code',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'message_thread_id',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'ok',
              'req' => true,
              'short' => 'If true, the request was successful',
              'type' => '`$BOOLEAN`',
            ],
            [
              'name' => 'parameters',
              'type' => '`$OBJECT`',
            ],
            [
              'name' => 'result',
              'short' => 'The result of the query',
              'type' => '`$ARRAY`',
            ],
            [
              'name' => 'text',
              'req' => true,
              'type' => '`$STRING`',
            ],
          ],
          'name' => 'send_message_draft',
          'op' => [
            'create' => [
              'input' => 'data',
              'name' => 'create',
              'points' => [
                [
                  'args' => [],
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/sendMessageDraft',
                  'parts' => [
                    'sendMessageDraft',
                  ],
                  'select' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                ],
              ],
            ],
          ],
          'relations' => [
            'ancestors' => [],
          ],
        ],
        'set_my_profile_photo' => [
          'fields' => [
            [
              'name' => 'description',
              'short' => 'Human-readable description of the result',
              'type' => '`$STRING`',
            ],
            [
              'name' => 'error_code',
              'short' => 'Error code',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'ok',
              'req' => true,
              'short' => 'If true, the request was successful',
              'type' => '`$BOOLEAN`',
            ],
            [
              'name' => 'parameters',
              'type' => '`$OBJECT`',
            ],
            [
              'name' => 'result',
              'short' => 'The result of the query',
              'type' => '`$ARRAY`',
            ],
          ],
          'name' => 'set_my_profile_photo',
          'op' => [
            'create' => [
              'input' => 'data',
              'name' => 'create',
              'points' => [
                [
                  'args' => [],
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/setMyProfilePhoto',
                  'parts' => [
                    'setMyProfilePhoto',
                  ],
                  'select' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                ],
              ],
            ],
          ],
          'relations' => [
            'ancestors' => [],
          ],
        ],
        'unpin_all_forum_topic_message' => [
          'fields' => [
            [
              'name' => 'chat_id',
              'req' => true,
              'type' => '`$STRING`',
              'union' => [
                'branches' => 2,
                'count' => 1,
                'depth' => 0,
              ],
            ],
            [
              'name' => 'description',
              'short' => 'Human-readable description of the result',
              'type' => '`$STRING`',
            ],
            [
              'name' => 'error_code',
              'short' => 'Error code',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'message_thread_id',
              'req' => true,
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'ok',
              'req' => true,
              'short' => 'If true, the request was successful',
              'type' => '`$BOOLEAN`',
            ],
            [
              'name' => 'parameters',
              'type' => '`$OBJECT`',
            ],
            [
              'name' => 'result',
              'short' => 'The result of the query',
              'type' => '`$ARRAY`',
            ],
          ],
          'name' => 'unpin_all_forum_topic_message',
          'op' => [
            'create' => [
              'input' => 'data',
              'name' => 'create',
              'points' => [
                [
                  'args' => [],
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/unpinAllForumTopicMessages',
                  'parts' => [
                    'unpinAllForumTopicMessages',
                  ],
                  'select' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                ],
              ],
            ],
          ],
          'relations' => [
            'ancestors' => [],
          ],
        ],
        'update' => [
          'fields' => [
            [
              'name' => 'allowed_updates',
              'type' => '`$ARRAY`',
            ],
            [
              'name' => 'description',
              'short' => 'Human-readable description of the result',
              'type' => '`$STRING`',
            ],
            [
              'name' => 'error_code',
              'short' => 'Error code',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'limit',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'offset',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'ok',
              'req' => true,
              'short' => 'If true, the request was successful',
              'type' => '`$BOOLEAN`',
            ],
            [
              'name' => 'parameters',
              'type' => '`$OBJECT`',
            ],
            [
              'name' => 'result',
              'short' => 'The result of the query',
              'type' => '`$ARRAY`',
            ],
            [
              'name' => 'timeout',
              'type' => '`$INTEGER`',
            ],
          ],
          'name' => 'update',
          'op' => [
            'create' => [
              'input' => 'data',
              'name' => 'create',
              'points' => [
                [
                  'args' => [],
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/getUpdates',
                  'parts' => [
                    'getUpdates',
                  ],
                  'select' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                ],
              ],
            ],
            'list' => [
              'input' => 'data',
              'name' => 'list',
              'points' => [
                [
                  'args' => [
                    'query' => [
                      [
                        'kind' => 'query',
                        'name' => 'allowed_update',
                        'orig' => 'allowed_update',
                        'type' => '`$ARRAY`',
                      ],
                      [
                        'example' => 100,
                        'kind' => 'query',
                        'name' => 'limit',
                        'orig' => 'limit',
                        'type' => '`$INTEGER`',
                      ],
                      [
                        'kind' => 'query',
                        'name' => 'offset',
                        'orig' => 'offset',
                        'type' => '`$INTEGER`',
                      ],
                      [
                        'example' => 0,
                        'kind' => 'query',
                        'name' => 'timeout',
                        'orig' => 'timeout',
                        'type' => '`$INTEGER`',
                      ],
                    ],
                  ],
                  'kind' => 'http',
                  'method' => 'GET',
                  'orig' => '/getUpdates',
                  'parts' => [
                    'getUpdates',
                  ],
                  'select' => [
                    'exist' => [
                      'allowed_update',
                      'limit',
                      'offset',
                      'timeout',
                    ],
                  ],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                ],
              ],
            ],
          ],
          'relations' => [
            'ancestors' => [],
          ],
        ],
      ],
        ];
    }


    public static function make_feature(string $name)
    {
        require_once __DIR__ . '/features.php';
        return TelegramBotFeatures::make_feature($name);
    }
}
