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
                "ratelimit" => [
          'options' => [
            'active' => false,
            'burst' => 5,
            'rate' => 5,
          ],
          'optspec' => [
            'now' => '`$FUNCTION`',
            'sleep' => '`$FUNCTION`',
          ],
          'strict' => false,
          'transport' => 'wrap',
        ],
                "retry" => [
          'options' => [
            'active' => false,
            'factor' => 2,
            'maxDelay' => 2000,
            'minDelay' => 50,
            'retries' => 2,
            'statuses' => [
              408,
              425,
              429,
              500,
              502,
              503,
              504,
            ],
          ],
          'optspec' => [
            'jitter' => '`$BOOLEAN`',
            'sleep' => '`$FUNCTION`',
          ],
          'strict' => false,
          'transport' => 'wrap',
        ],
                "test" => [
          'options' => [
            'active' => false,
          ],
          'optspec' => [
            'entity' => '`$MAP`',
            'net' => '`$MAP`',
          ],
          'strict' => false,
          'transport' => 'base',
        ],
                "timeout" => [
          'options' => [
            'active' => false,
            'ms' => 30000,
          ],
          'optspec' => [
            'clearTimer' => '`$FUNCTION`',
            'setTimer' => '`$FUNCTION`',
          ],
          'strict' => false,
          'transport' => 'wrap',
        ],
            ],
            "options" => [
                "base" => "https://api.telegram.org/bot{token}",
                "server" => [
                    "token" => "",
                ],
                "auth" => [
                    "prefix" => "",
                    "in" => "path",
                    "name" => "token",
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
              'title' => 'Chat Id',
              'type' => '`$STRING`',
              'req' => true,
            ],
            [
              'name' => 'description',
              'title' => 'Description',
              'type' => '`$STRING`',
              'short' => 'Human-readable description of the result',
            ],
            [
              'name' => 'error_code',
              'title' => 'Error Code',
              'type' => '`$INTEGER`',
              'short' => 'Error code',
            ],
            [
              'name' => 'message_id',
              'title' => 'Message Id',
              'type' => '`$INTEGER`',
              'req' => true,
            ],
            [
              'name' => 'ok',
              'title' => 'Ok',
              'type' => '`$BOOLEAN`',
              'req' => true,
              'short' => 'If true, the request was successful',
            ],
            [
              'name' => 'parameters',
              'title' => 'Parameters',
              'type' => '`$OBJECT`',
            ],
            [
              'name' => 'result',
              'title' => 'Result',
              'type' => '`$ARRAY`',
              'short' => 'The result of the query',
            ],
          ],
          'name' => 'approve_suggested_post',
          'op' => [
            'create' => [
              'input' => 'data',
              'name' => 'create',
              'points' => [
                [
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/approveSuggestedPost',
                  'segments' => [
                    [
                      'lit' => 'approveSuggestedPost',
                    ],
                  ],
                  'parts' => [
                    'approveSuggestedPost',
                  ],
                  'rename' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'args' => [],
                  'select' => [],
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
              'title' => 'Chat Id',
              'type' => '`$STRING`',
              'req' => true,
            ],
            [
              'name' => 'description',
              'title' => 'Description',
              'type' => '`$STRING`',
              'short' => 'Human-readable description of the result',
            ],
            [
              'name' => 'error_code',
              'title' => 'Error Code',
              'type' => '`$INTEGER`',
              'short' => 'Error code',
            ],
            [
              'name' => 'message_id',
              'title' => 'Message Id',
              'type' => '`$INTEGER`',
              'req' => true,
            ],
            [
              'name' => 'ok',
              'title' => 'Ok',
              'type' => '`$BOOLEAN`',
              'req' => true,
              'short' => 'If true, the request was successful',
            ],
            [
              'name' => 'parameters',
              'title' => 'Parameters',
              'type' => '`$OBJECT`',
            ],
            [
              'name' => 'result',
              'title' => 'Result',
              'type' => '`$ARRAY`',
              'short' => 'The result of the query',
            ],
          ],
          'name' => 'decline_suggested_post',
          'op' => [
            'create' => [
              'input' => 'data',
              'name' => 'create',
              'points' => [
                [
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/declineSuggestedPost',
                  'segments' => [
                    [
                      'lit' => 'declineSuggestedPost',
                    ],
                  ],
                  'parts' => [
                    'declineSuggestedPost',
                  ],
                  'rename' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'args' => [],
                  'select' => [],
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
              'title' => 'Chat Id',
              'type' => '`$STRING`',
              'req' => true,
            ],
            [
              'name' => 'description',
              'title' => 'Description',
              'type' => '`$STRING`',
              'short' => 'Human-readable description of the result',
            ],
            [
              'name' => 'error_code',
              'title' => 'Error Code',
              'type' => '`$INTEGER`',
              'short' => 'Error code',
            ],
            [
              'name' => 'message_thread_id',
              'title' => 'Message Thread Id',
              'type' => '`$INTEGER`',
              'req' => true,
            ],
            [
              'name' => 'ok',
              'title' => 'Ok',
              'type' => '`$BOOLEAN`',
              'req' => true,
              'short' => 'If true, the request was successful',
            ],
            [
              'name' => 'parameters',
              'title' => 'Parameters',
              'type' => '`$OBJECT`',
            ],
            [
              'name' => 'result',
              'title' => 'Result',
              'type' => '`$ARRAY`',
              'short' => 'The result of the query',
            ],
          ],
          'name' => 'delete_forum_topic',
          'op' => [
            'create' => [
              'input' => 'data',
              'name' => 'create',
              'points' => [
                [
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/deleteForumTopic',
                  'segments' => [
                    [
                      'lit' => 'deleteForumTopic',
                    ],
                  ],
                  'parts' => [
                    'deleteForumTopic',
                  ],
                  'rename' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'args' => [],
                  'select' => [],
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
              'title' => 'Chat Id',
              'type' => '`$STRING`',
              'req' => true,
            ],
            [
              'name' => 'description',
              'title' => 'Description',
              'type' => '`$STRING`',
              'short' => 'Human-readable description of the result',
            ],
            [
              'name' => 'error_code',
              'title' => 'Error Code',
              'type' => '`$INTEGER`',
              'short' => 'Error code',
            ],
            [
              'name' => 'icon_custom_emoji_id',
              'title' => 'Icon Custom Emoji Id',
              'type' => '`$STRING`',
            ],
            [
              'name' => 'message_thread_id',
              'title' => 'Message Thread Id',
              'type' => '`$INTEGER`',
              'req' => true,
            ],
            [
              'name' => 'name',
              'title' => 'Name',
              'type' => '`$STRING`',
            ],
            [
              'name' => 'ok',
              'title' => 'Ok',
              'type' => '`$BOOLEAN`',
              'req' => true,
              'short' => 'If true, the request was successful',
            ],
            [
              'name' => 'parameters',
              'title' => 'Parameters',
              'type' => '`$OBJECT`',
            ],
            [
              'name' => 'result',
              'title' => 'Result',
              'type' => '`$ARRAY`',
              'short' => 'The result of the query',
            ],
          ],
          'name' => 'edit_forum_topic',
          'op' => [
            'create' => [
              'input' => 'data',
              'name' => 'create',
              'points' => [
                [
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/editForumTopic',
                  'segments' => [
                    [
                      'lit' => 'editForumTopic',
                    ],
                  ],
                  'parts' => [
                    'editForumTopic',
                  ],
                  'rename' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'args' => [],
                  'select' => [],
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
              'title' => 'File Id',
              'type' => '`$STRING`',
              'req' => true,
            ],
          ],
          'name' => 'file',
          'op' => [
            'create' => [
              'input' => 'data',
              'name' => 'create',
              'points' => [
                [
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/getFile',
                  'segments' => [
                    [
                      'lit' => 'getFile',
                    ],
                  ],
                  'parts' => [
                    'getFile',
                  ],
                  'rename' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'args' => [],
                  'select' => [],
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
              'title' => 'Chat Id',
              'type' => '`$STRING`',
              'req' => true,
            ],
            [
              'name' => 'icon_color',
              'title' => 'Icon Color',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'icon_custom_emoji_id',
              'title' => 'Icon Custom Emoji Id',
              'type' => '`$STRING`',
            ],
            [
              'name' => 'name',
              'title' => 'Name',
              'type' => '`$STRING`',
              'req' => true,
            ],
          ],
          'name' => 'forum_topic',
          'op' => [
            'create' => [
              'input' => 'data',
              'name' => 'create',
              'points' => [
                [
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/createForumTopic',
                  'segments' => [
                    [
                      'lit' => 'createForumTopic',
                    ],
                  ],
                  'parts' => [
                    'createForumTopic',
                  ],
                  'rename' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'args' => [],
                  'select' => [],
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
              'title' => 'Description',
              'type' => '`$STRING`',
              'short' => 'Human-readable description of the result',
            ],
            [
              'name' => 'error_code',
              'title' => 'Error Code',
              'type' => '`$INTEGER`',
              'short' => 'Error code',
            ],
            [
              'name' => 'exclude_from_blockchain',
              'title' => 'Exclude From Blockchain',
              'type' => '`$BOOLEAN`',
            ],
            [
              'name' => 'exclude_limited_non_upgradable',
              'title' => 'Exclude Limited Non Upgradable',
              'type' => '`$BOOLEAN`',
            ],
            [
              'name' => 'exclude_limited_upgradable',
              'title' => 'Exclude Limited Upgradable',
              'type' => '`$BOOLEAN`',
            ],
            [
              'name' => 'ok',
              'title' => 'Ok',
              'type' => '`$BOOLEAN`',
              'req' => true,
              'short' => 'If true, the request was successful',
            ],
            [
              'name' => 'parameters',
              'title' => 'Parameters',
              'type' => '`$OBJECT`',
            ],
            [
              'name' => 'result',
              'title' => 'Result',
              'type' => '`$ARRAY`',
              'short' => 'The result of the query',
            ],
          ],
          'name' => 'get_business_account_gift',
          'op' => [
            'create' => [
              'input' => 'data',
              'name' => 'create',
              'points' => [
                [
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/getBusinessAccountGifts',
                  'segments' => [
                    [
                      'lit' => 'getBusinessAccountGifts',
                    ],
                  ],
                  'parts' => [
                    'getBusinessAccountGifts',
                  ],
                  'rename' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'args' => [],
                  'select' => [],
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
              'title' => 'Chat Id',
              'type' => '`$STRING`',
              'req' => true,
            ],
            [
              'name' => 'description',
              'title' => 'Description',
              'type' => '`$STRING`',
              'short' => 'Human-readable description of the result',
            ],
            [
              'name' => 'error_code',
              'title' => 'Error Code',
              'type' => '`$INTEGER`',
              'short' => 'Error code',
            ],
            [
              'name' => 'ok',
              'title' => 'Ok',
              'type' => '`$BOOLEAN`',
              'req' => true,
              'short' => 'If true, the request was successful',
            ],
            [
              'name' => 'parameters',
              'title' => 'Parameters',
              'type' => '`$OBJECT`',
            ],
            [
              'name' => 'result',
              'title' => 'Result',
              'type' => '`$ARRAY`',
              'short' => 'The result of the query',
            ],
          ],
          'name' => 'get_chat_gift',
          'op' => [
            'create' => [
              'input' => 'data',
              'name' => 'create',
              'points' => [
                [
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/getChatGifts',
                  'segments' => [
                    [
                      'lit' => 'getChatGifts',
                    ],
                  ],
                  'parts' => [
                    'getChatGifts',
                  ],
                  'rename' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'args' => [],
                  'select' => [],
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
              'name' => 'business_connection',
              'title' => 'Business Connection',
              'type' => '`$OBJECT`',
            ],
            [
              'name' => 'business_message',
              'title' => 'Business Message',
              'type' => '`$OBJECT`',
              'req' => true,
            ],
            [
              'name' => 'channel_post',
              'title' => 'Channel Post',
              'type' => '`$OBJECT`',
              'req' => true,
            ],
            [
              'name' => 'chosen_inline_result',
              'title' => 'Chosen Inline Result',
              'type' => '`$OBJECT`',
              'req' => true,
            ],
            [
              'name' => 'deleted_business_messages',
              'title' => 'Deleted Business Messages',
              'type' => '`$OBJECT`',
            ],
            [
              'name' => 'description',
              'title' => 'Description',
              'type' => '`$STRING`',
              'short' => 'Human-readable description of the result',
            ],
            [
              'name' => 'edited_business_message',
              'title' => 'Edited Business Message',
              'type' => '`$OBJECT`',
              'req' => true,
            ],
            [
              'name' => 'edited_channel_post',
              'title' => 'Edited Channel Post',
              'type' => '`$OBJECT`',
              'req' => true,
            ],
            [
              'name' => 'edited_message',
              'title' => 'Edited Message',
              'type' => '`$OBJECT`',
              'req' => true,
            ],
            [
              'name' => 'error_code',
              'title' => 'Error Code',
              'type' => '`$INTEGER`',
              'short' => 'Error code',
            ],
            [
              'name' => 'inline_query',
              'title' => 'Inline Query',
              'type' => '`$OBJECT`',
              'req' => true,
            ],
            [
              'name' => 'message',
              'title' => 'Message',
              'type' => '`$OBJECT`',
              'req' => true,
            ],
            [
              'name' => 'message_reaction',
              'title' => 'Message Reaction',
              'type' => '`$OBJECT`',
            ],
            [
              'name' => 'message_reaction_count',
              'title' => 'Message Reaction Count',
              'type' => '`$OBJECT`',
            ],
            [
              'name' => 'ok',
              'title' => 'Ok',
              'type' => '`$BOOLEAN`',
              'req' => true,
              'short' => 'If true, the request was successful',
            ],
            [
              'name' => 'parameters',
              'title' => 'Parameters',
              'type' => '`$OBJECT`',
            ],
            [
              'name' => 'result',
              'title' => 'Result',
              'type' => '`$ARRAY`',
              'short' => 'The result of the query',
            ],
            [
              'name' => 'update_id',
              'title' => 'Update Id',
              'type' => '`$INTEGER`',
              'req' => true,
              'short' => 'The update\'s unique identifier',
            ],
          ],
          'name' => 'get_me',
          'op' => [
            'create' => [
              'input' => 'data',
              'name' => 'create',
              'points' => [
                [
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/getMe',
                  'segments' => [
                    [
                      'lit' => 'getMe',
                    ],
                  ],
                  'parts' => [
                    'getMe',
                  ],
                  'rename' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'args' => [],
                  'select' => [],
                ],
              ],
            ],
            'list' => [
              'input' => 'data',
              'name' => 'list',
              'points' => [
                [
                  'kind' => 'http',
                  'method' => 'GET',
                  'orig' => '/getMe',
                  'segments' => [
                    [
                      'lit' => 'getMe',
                    ],
                  ],
                  'parts' => [
                    'getMe',
                  ],
                  'rename' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'args' => [],
                  'select' => [],
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
              'title' => 'Description',
              'type' => '`$STRING`',
              'short' => 'Human-readable description of the result',
            ],
            [
              'name' => 'error_code',
              'title' => 'Error Code',
              'type' => '`$INTEGER`',
              'short' => 'Error code',
            ],
            [
              'name' => 'ok',
              'title' => 'Ok',
              'type' => '`$BOOLEAN`',
              'req' => true,
              'short' => 'If true, the request was successful',
            ],
            [
              'name' => 'parameters',
              'title' => 'Parameters',
              'type' => '`$OBJECT`',
            ],
            [
              'name' => 'result',
              'title' => 'Result',
              'type' => '`$ARRAY`',
              'short' => 'The result of the query',
            ],
            [
              'name' => 'user_id',
              'title' => 'User Id',
              'type' => '`$INTEGER`',
              'req' => true,
            ],
          ],
          'name' => 'get_user_gift',
          'op' => [
            'create' => [
              'input' => 'data',
              'name' => 'create',
              'points' => [
                [
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/getUserGifts',
                  'segments' => [
                    [
                      'lit' => 'getUserGifts',
                    ],
                  ],
                  'parts' => [
                    'getUserGifts',
                  ],
                  'rename' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'args' => [],
                  'select' => [],
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
              'title' => 'Description',
              'type' => '`$STRING`',
              'short' => 'Human-readable description of the result',
            ],
            [
              'name' => 'error_code',
              'title' => 'Error Code',
              'type' => '`$INTEGER`',
              'short' => 'Error code',
            ],
            [
              'name' => 'ok',
              'title' => 'Ok',
              'type' => '`$BOOLEAN`',
              'req' => true,
              'short' => 'If true, the request was successful',
            ],
            [
              'name' => 'parameters',
              'title' => 'Parameters',
              'type' => '`$OBJECT`',
            ],
            [
              'name' => 'result',
              'title' => 'Result',
              'type' => '`$ARRAY`',
              'short' => 'The result of the query',
            ],
            [
              'name' => 'user_id',
              'title' => 'User Id',
              'type' => '`$INTEGER`',
              'req' => true,
            ],
          ],
          'name' => 'get_user_profile_audio',
          'op' => [
            'create' => [
              'input' => 'data',
              'name' => 'create',
              'points' => [
                [
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/getUserProfileAudios',
                  'segments' => [
                    [
                      'lit' => 'getUserProfileAudios',
                    ],
                  ],
                  'parts' => [
                    'getUserProfileAudios',
                  ],
                  'rename' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'args' => [],
                  'select' => [],
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
              'title' => 'Chat Id',
              'type' => '`$STRING`',
              'req' => true,
              'short' => 'Unique identifier for the target chat or username',
            ],
            [
              'name' => 'direct_messages_topic_id',
              'title' => 'Direct Messages Topic Id',
              'type' => '`$INTEGER`',
              'short' => 'Unique identifier for the target direct messages topic',
            ],
            [
              'name' => 'disable_notification',
              'title' => 'Disable Notification',
              'type' => '`$BOOLEAN`',
              'short' => 'Sends the message silently',
            ],
            [
              'name' => 'disable_web_page_preview',
              'title' => 'Disable Web Page Preview',
              'type' => '`$BOOLEAN`',
              'short' => 'Disables link previews for links in this message',
            ],
            [
              'name' => 'from_chat_id',
              'title' => 'From Chat Id',
              'type' => '`$STRING`',
              'req' => true,
            ],
            [
              'name' => 'latitude',
              'title' => 'Latitude',
              'type' => '`$NUMBER`',
              'req' => true,
              'format' => 'float',
            ],
            [
              'name' => 'longitude',
              'title' => 'Longitude',
              'type' => '`$NUMBER`',
              'req' => true,
              'format' => 'float',
            ],
            [
              'name' => 'message_effect_id',
              'title' => 'Message Effect Id',
              'type' => '`$STRING`',
              'short' => 'Unique identifier of the message effect to be added to the message',
            ],
            [
              'name' => 'message_id',
              'title' => 'Message Id',
              'type' => '`$INTEGER`',
              'req' => true,
            ],
            [
              'name' => 'message_thread_id',
              'title' => 'Message Thread Id',
              'type' => '`$INTEGER`',
              'short' => 'Unique identifier for the target message thread (topic) of the forum',
            ],
            [
              'name' => 'options',
              'title' => 'Options',
              'type' => '`$ARRAY`',
              'req' => true,
            ],
            [
              'name' => 'parse_mode',
              'title' => 'Parse Mode',
              'type' => '`$STRING`',
              'short' => 'Mode for parsing entities in the message text',
            ],
            [
              'name' => 'protect_content',
              'title' => 'Protect Content',
              'type' => '`$BOOLEAN`',
              'short' => 'Protects the contents of the sent message from forwarding and saving',
            ],
            [
              'name' => 'question',
              'title' => 'Question',
              'type' => '`$STRING`',
              'req' => true,
            ],
            [
              'name' => 'reply_to_message_id',
              'title' => 'Reply To Message Id',
              'type' => '`$INTEGER`',
              'short' => 'If the message is a reply, ID of the original message',
            ],
            [
              'name' => 'text',
              'title' => 'Text',
              'type' => '`$STRING`',
              'req' => true,
              'short' => 'Text of the message to be sent',
            ],
          ],
          'name' => 'message',
          'op' => [
            'create' => [
              'input' => 'data',
              'name' => 'create',
              'points' => [
                [
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/forwardMessage',
                  'segments' => [
                    [
                      'lit' => 'forwardMessage',
                    ],
                  ],
                  'parts' => [
                    'forwardMessage',
                  ],
                  'rename' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'args' => [],
                  'select' => [],
                ],
                [
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/sendAnimation',
                  'segments' => [
                    [
                      'lit' => 'sendAnimation',
                    ],
                  ],
                  'parts' => [
                    'sendAnimation',
                  ],
                  'rename' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'args' => [],
                  'select' => [],
                ],
                [
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/sendAudio',
                  'segments' => [
                    [
                      'lit' => 'sendAudio',
                    ],
                  ],
                  'parts' => [
                    'sendAudio',
                  ],
                  'rename' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'args' => [],
                  'select' => [],
                ],
                [
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/sendDocument',
                  'segments' => [
                    [
                      'lit' => 'sendDocument',
                    ],
                  ],
                  'parts' => [
                    'sendDocument',
                  ],
                  'rename' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'args' => [],
                  'select' => [],
                ],
                [
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/sendLocation',
                  'segments' => [
                    [
                      'lit' => 'sendLocation',
                    ],
                  ],
                  'parts' => [
                    'sendLocation',
                  ],
                  'rename' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'args' => [],
                  'select' => [],
                ],
                [
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/sendMessage',
                  'segments' => [
                    [
                      'lit' => 'sendMessage',
                    ],
                  ],
                  'parts' => [
                    'sendMessage',
                  ],
                  'rename' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'args' => [],
                  'select' => [],
                ],
                [
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/sendPhoto',
                  'segments' => [
                    [
                      'lit' => 'sendPhoto',
                    ],
                  ],
                  'parts' => [
                    'sendPhoto',
                  ],
                  'rename' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'args' => [],
                  'select' => [],
                ],
                [
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/sendPoll',
                  'segments' => [
                    [
                      'lit' => 'sendPoll',
                    ],
                  ],
                  'parts' => [
                    'sendPoll',
                  ],
                  'rename' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'args' => [],
                  'select' => [],
                ],
                [
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/sendSticker',
                  'segments' => [
                    [
                      'lit' => 'sendSticker',
                    ],
                  ],
                  'parts' => [
                    'sendSticker',
                  ],
                  'rename' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'args' => [],
                  'select' => [],
                ],
                [
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/sendVideo',
                  'segments' => [
                    [
                      'lit' => 'sendVideo',
                    ],
                  ],
                  'parts' => [
                    'sendVideo',
                  ],
                  'rename' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'args' => [],
                  'select' => [],
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
              'title' => 'Chat Id',
              'type' => '`$STRING`',
              'req' => true,
            ],
            [
              'name' => 'direct_messages_topic_id',
              'title' => 'Direct Messages Topic Id',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'from_chat_id',
              'title' => 'From Chat Id',
              'type' => '`$STRING`',
              'req' => true,
            ],
            [
              'name' => 'message_effect_id',
              'title' => 'Message Effect Id',
              'type' => '`$STRING`',
            ],
            [
              'name' => 'message_id',
              'title' => 'Message Id',
              'type' => '`$INTEGER`',
              'req' => true,
            ],
            [
              'name' => 'message_thread_id',
              'title' => 'Message Thread Id',
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
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/copyMessage',
                  'segments' => [
                    [
                      'lit' => 'copyMessage',
                    ],
                  ],
                  'parts' => [
                    'copyMessage',
                  ],
                  'rename' => [],
                  'transform' => [
                    'req' => [
                      'message_id' => '`reqdata`',
                    ],
                    'res' => '`body`',
                  ],
                  'args' => [],
                  'select' => [],
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
              'title' => 'Can Delete Messages',
              'type' => '`$BOOLEAN`',
            ],
            [
              'name' => 'can_edit_messages',
              'title' => 'Can Edit Messages',
              'type' => '`$BOOLEAN`',
            ],
            [
              'name' => 'can_manage_chat',
              'title' => 'Can Manage Chat',
              'type' => '`$BOOLEAN`',
            ],
            [
              'name' => 'can_manage_direct_messages',
              'title' => 'Can Manage Direct Messages',
              'type' => '`$BOOLEAN`',
            ],
            [
              'name' => 'can_post_messages',
              'title' => 'Can Post Messages',
              'type' => '`$BOOLEAN`',
            ],
            [
              'name' => 'chat_id',
              'title' => 'Chat Id',
              'type' => '`$STRING`',
              'req' => true,
            ],
            [
              'name' => 'description',
              'title' => 'Description',
              'type' => '`$STRING`',
              'short' => 'Human-readable description of the result',
            ],
            [
              'name' => 'error_code',
              'title' => 'Error Code',
              'type' => '`$INTEGER`',
              'short' => 'Error code',
            ],
            [
              'name' => 'ok',
              'title' => 'Ok',
              'type' => '`$BOOLEAN`',
              'req' => true,
              'short' => 'If true, the request was successful',
            ],
            [
              'name' => 'parameters',
              'title' => 'Parameters',
              'type' => '`$OBJECT`',
            ],
            [
              'name' => 'result',
              'title' => 'Result',
              'type' => '`$ARRAY`',
              'short' => 'The result of the query',
            ],
            [
              'name' => 'user_id',
              'title' => 'User Id',
              'type' => '`$INTEGER`',
              'req' => true,
            ],
          ],
          'name' => 'promote_chat_member',
          'op' => [
            'create' => [
              'input' => 'data',
              'name' => 'create',
              'points' => [
                [
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/promoteChatMember',
                  'segments' => [
                    [
                      'lit' => 'promoteChatMember',
                    ],
                  ],
                  'parts' => [
                    'promoteChatMember',
                  ],
                  'rename' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'args' => [],
                  'select' => [],
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
              'title' => 'Description',
              'type' => '`$STRING`',
              'short' => 'Human-readable description of the result',
            ],
            [
              'name' => 'error_code',
              'title' => 'Error Code',
              'type' => '`$INTEGER`',
              'short' => 'Error code',
            ],
            [
              'name' => 'ok',
              'title' => 'Ok',
              'type' => '`$BOOLEAN`',
              'req' => true,
              'short' => 'If true, the request was successful',
            ],
            [
              'name' => 'parameters',
              'title' => 'Parameters',
              'type' => '`$OBJECT`',
            ],
            [
              'name' => 'result',
              'title' => 'Result',
              'type' => '`$ARRAY`',
              'short' => 'The result of the query',
            ],
          ],
          'name' => 'remove_my_profile_photo',
          'op' => [
            'create' => [
              'input' => 'data',
              'name' => 'create',
              'points' => [
                [
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/removeMyProfilePhoto',
                  'segments' => [
                    [
                      'lit' => 'removeMyProfilePhoto',
                    ],
                  ],
                  'parts' => [
                    'removeMyProfilePhoto',
                  ],
                  'rename' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'args' => [],
                  'select' => [],
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
              'title' => 'Chat Id',
              'type' => '`$STRING`',
              'req' => true,
            ],
            [
              'name' => 'description',
              'title' => 'Description',
              'type' => '`$STRING`',
              'short' => 'Human-readable description of the result',
            ],
            [
              'name' => 'error_code',
              'title' => 'Error Code',
              'type' => '`$INTEGER`',
              'short' => 'Error code',
            ],
            [
              'name' => 'ok',
              'title' => 'Ok',
              'type' => '`$BOOLEAN`',
              'req' => true,
              'short' => 'If true, the request was successful',
            ],
            [
              'name' => 'parameters',
              'title' => 'Parameters',
              'type' => '`$OBJECT`',
            ],
            [
              'name' => 'result',
              'title' => 'Result',
              'type' => '`$ARRAY`',
              'short' => 'The result of the query',
            ],
            [
              'name' => 'story_id',
              'title' => 'Story Id',
              'type' => '`$INTEGER`',
              'req' => true,
            ],
          ],
          'name' => 'repost_story',
          'op' => [
            'create' => [
              'input' => 'data',
              'name' => 'create',
              'points' => [
                [
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/repostStory',
                  'segments' => [
                    [
                      'lit' => 'repostStory',
                    ],
                  ],
                  'parts' => [
                    'repostStory',
                  ],
                  'rename' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'args' => [],
                  'select' => [],
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
              'title' => 'Action',
              'type' => '`$STRING`',
              'req' => true,
            ],
            [
              'name' => 'chat_id',
              'title' => 'Chat Id',
              'type' => '`$STRING`',
              'req' => true,
            ],
            [
              'name' => 'description',
              'title' => 'Description',
              'type' => '`$STRING`',
              'short' => 'Human-readable description of the result',
            ],
            [
              'name' => 'error_code',
              'title' => 'Error Code',
              'type' => '`$INTEGER`',
              'short' => 'Error code',
            ],
            [
              'name' => 'message_thread_id',
              'title' => 'Message Thread Id',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'ok',
              'title' => 'Ok',
              'type' => '`$BOOLEAN`',
              'req' => true,
              'short' => 'If true, the request was successful',
            ],
            [
              'name' => 'parameters',
              'title' => 'Parameters',
              'type' => '`$OBJECT`',
            ],
            [
              'name' => 'result',
              'title' => 'Result',
              'type' => '`$ARRAY`',
              'short' => 'The result of the query',
            ],
          ],
          'name' => 'send_chat_action',
          'op' => [
            'create' => [
              'input' => 'data',
              'name' => 'create',
              'points' => [
                [
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/sendChatAction',
                  'segments' => [
                    [
                      'lit' => 'sendChatAction',
                    ],
                  ],
                  'parts' => [
                    'sendChatAction',
                  ],
                  'rename' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'args' => [],
                  'select' => [],
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
              'title' => 'Chat Id',
              'type' => '`$STRING`',
              'req' => true,
            ],
            [
              'name' => 'description',
              'title' => 'Description',
              'type' => '`$STRING`',
              'short' => 'Human-readable description of the result',
            ],
            [
              'name' => 'error_code',
              'title' => 'Error Code',
              'type' => '`$INTEGER`',
              'short' => 'Error code',
            ],
            [
              'name' => 'message_thread_id',
              'title' => 'Message Thread Id',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'ok',
              'title' => 'Ok',
              'type' => '`$BOOLEAN`',
              'req' => true,
              'short' => 'If true, the request was successful',
            ],
            [
              'name' => 'parameters',
              'title' => 'Parameters',
              'type' => '`$OBJECT`',
            ],
            [
              'name' => 'result',
              'title' => 'Result',
              'type' => '`$ARRAY`',
              'short' => 'The result of the query',
            ],
            [
              'name' => 'text',
              'title' => 'Text',
              'type' => '`$STRING`',
              'req' => true,
            ],
          ],
          'name' => 'send_message_draft',
          'op' => [
            'create' => [
              'input' => 'data',
              'name' => 'create',
              'points' => [
                [
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/sendMessageDraft',
                  'segments' => [
                    [
                      'lit' => 'sendMessageDraft',
                    ],
                  ],
                  'parts' => [
                    'sendMessageDraft',
                  ],
                  'rename' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'args' => [],
                  'select' => [],
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
              'title' => 'Description',
              'type' => '`$STRING`',
              'short' => 'Human-readable description of the result',
            ],
            [
              'name' => 'error_code',
              'title' => 'Error Code',
              'type' => '`$INTEGER`',
              'short' => 'Error code',
            ],
            [
              'name' => 'ok',
              'title' => 'Ok',
              'type' => '`$BOOLEAN`',
              'req' => true,
              'short' => 'If true, the request was successful',
            ],
            [
              'name' => 'parameters',
              'title' => 'Parameters',
              'type' => '`$OBJECT`',
            ],
            [
              'name' => 'result',
              'title' => 'Result',
              'type' => '`$ARRAY`',
              'short' => 'The result of the query',
            ],
          ],
          'name' => 'set_my_profile_photo',
          'op' => [
            'create' => [
              'input' => 'data',
              'name' => 'create',
              'points' => [
                [
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/setMyProfilePhoto',
                  'segments' => [
                    [
                      'lit' => 'setMyProfilePhoto',
                    ],
                  ],
                  'parts' => [
                    'setMyProfilePhoto',
                  ],
                  'rename' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'args' => [],
                  'select' => [],
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
              'title' => 'Chat Id',
              'type' => '`$STRING`',
              'req' => true,
            ],
            [
              'name' => 'description',
              'title' => 'Description',
              'type' => '`$STRING`',
              'short' => 'Human-readable description of the result',
            ],
            [
              'name' => 'error_code',
              'title' => 'Error Code',
              'type' => '`$INTEGER`',
              'short' => 'Error code',
            ],
            [
              'name' => 'message_thread_id',
              'title' => 'Message Thread Id',
              'type' => '`$INTEGER`',
              'req' => true,
            ],
            [
              'name' => 'ok',
              'title' => 'Ok',
              'type' => '`$BOOLEAN`',
              'req' => true,
              'short' => 'If true, the request was successful',
            ],
            [
              'name' => 'parameters',
              'title' => 'Parameters',
              'type' => '`$OBJECT`',
            ],
            [
              'name' => 'result',
              'title' => 'Result',
              'type' => '`$ARRAY`',
              'short' => 'The result of the query',
            ],
          ],
          'name' => 'unpin_all_forum_topic_message',
          'op' => [
            'create' => [
              'input' => 'data',
              'name' => 'create',
              'points' => [
                [
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/unpinAllForumTopicMessages',
                  'segments' => [
                    [
                      'lit' => 'unpinAllForumTopicMessages',
                    ],
                  ],
                  'parts' => [
                    'unpinAllForumTopicMessages',
                  ],
                  'rename' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'args' => [],
                  'select' => [],
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
              'title' => 'Allowed Updates',
              'type' => '`$ARRAY`',
            ],
            [
              'name' => 'description',
              'title' => 'Description',
              'type' => '`$STRING`',
              'short' => 'Human-readable description of the result',
            ],
            [
              'name' => 'error_code',
              'title' => 'Error Code',
              'type' => '`$INTEGER`',
              'short' => 'Error code',
            ],
            [
              'name' => 'limit',
              'title' => 'Limit',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'offset',
              'title' => 'Offset',
              'type' => '`$INTEGER`',
            ],
            [
              'name' => 'ok',
              'title' => 'Ok',
              'type' => '`$BOOLEAN`',
              'req' => true,
              'short' => 'If true, the request was successful',
            ],
            [
              'name' => 'parameters',
              'title' => 'Parameters',
              'type' => '`$OBJECT`',
            ],
            [
              'name' => 'result',
              'title' => 'Result',
              'type' => '`$ARRAY`',
              'short' => 'The result of the query',
            ],
            [
              'name' => 'timeout',
              'title' => 'Timeout',
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
                  'kind' => 'http',
                  'method' => 'POST',
                  'orig' => '/getUpdates',
                  'segments' => [
                    [
                      'lit' => 'getUpdates',
                    ],
                  ],
                  'parts' => [
                    'getUpdates',
                  ],
                  'rename' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'args' => [],
                  'select' => [],
                ],
              ],
            ],
            'list' => [
              'input' => 'data',
              'name' => 'list',
              'points' => [
                [
                  'kind' => 'http',
                  'method' => 'GET',
                  'orig' => '/getUpdates',
                  'segments' => [
                    [
                      'lit' => 'getUpdates',
                    ],
                  ],
                  'parts' => [
                    'getUpdates',
                  ],
                  'rename' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'args' => [
                    'query' => [
                      [
                        'name' => 'allowed_update',
                        'orig' => 'allowed_update',
                        'type' => '`$ARRAY`',
                        'kind' => 'query',
                      ],
                      [
                        'name' => 'limit',
                        'orig' => 'limit',
                        'type' => '`$INTEGER`',
                        'kind' => 'query',
                        'example' => 100,
                      ],
                      [
                        'name' => 'offset',
                        'orig' => 'offset',
                        'type' => '`$INTEGER`',
                        'kind' => 'query',
                      ],
                      [
                        'name' => 'timeout',
                        'orig' => 'timeout',
                        'type' => '`$INTEGER`',
                        'kind' => 'query',
                        'example' => 0,
                      ],
                    ],
                  ],
                  'select' => [
                    'exist' => [
                      'allowed_update',
                      'limit',
                      'offset',
                      'timeout',
                    ],
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
