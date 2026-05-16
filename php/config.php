<?php
declare(strict_types=1);

// TelegramBot SDK configuration

class TelegramBotConfig
{
    public static function make_config(): array
    {
        return [
            "main" => [
                "name" => "TelegramBot",
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
                "auth" => [
                    "prefix" => "Bearer",
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
              'active' => true,
              'index$' => 0,
            ],
            [
              'name' => 'description',
              'req' => false,
              'type' => '`$STRING`',
              'active' => true,
              'index$' => 1,
            ],
            [
              'name' => 'error_code',
              'req' => false,
              'type' => '`$INTEGER`',
              'active' => true,
              'index$' => 2,
            ],
            [
              'name' => 'message_id',
              'req' => true,
              'type' => '`$INTEGER`',
              'active' => true,
              'index$' => 3,
            ],
            [
              'name' => 'ok',
              'req' => true,
              'type' => '`$BOOLEAN`',
              'active' => true,
              'index$' => 4,
            ],
            [
              'name' => 'parameter',
              'req' => false,
              'type' => '`$OBJECT`',
              'active' => true,
              'index$' => 5,
            ],
            [
              'name' => 'result',
              'req' => false,
              'type' => '`$ANY`',
              'active' => true,
              'index$' => 6,
            ],
          ],
          'name' => 'approve_suggested_post',
          'op' => [
            'create' => [
              'name' => 'create',
              'points' => [
                [
                  'method' => 'POST',
                  'orig' => '/approveSuggestedPost',
                  'parts' => [
                    'approveSuggestedPost',
                  ],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'active' => true,
                  'args' => [],
                  'select' => [],
                  'index$' => 0,
                ],
              ],
              'input' => 'data',
              'key$' => 'create',
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
              'active' => true,
              'index$' => 0,
            ],
            [
              'name' => 'description',
              'req' => false,
              'type' => '`$STRING`',
              'active' => true,
              'index$' => 1,
            ],
            [
              'name' => 'error_code',
              'req' => false,
              'type' => '`$INTEGER`',
              'active' => true,
              'index$' => 2,
            ],
            [
              'name' => 'message_id',
              'req' => true,
              'type' => '`$INTEGER`',
              'active' => true,
              'index$' => 3,
            ],
            [
              'name' => 'ok',
              'req' => true,
              'type' => '`$BOOLEAN`',
              'active' => true,
              'index$' => 4,
            ],
            [
              'name' => 'parameter',
              'req' => false,
              'type' => '`$OBJECT`',
              'active' => true,
              'index$' => 5,
            ],
            [
              'name' => 'result',
              'req' => false,
              'type' => '`$ANY`',
              'active' => true,
              'index$' => 6,
            ],
          ],
          'name' => 'decline_suggested_post',
          'op' => [
            'create' => [
              'name' => 'create',
              'points' => [
                [
                  'method' => 'POST',
                  'orig' => '/declineSuggestedPost',
                  'parts' => [
                    'declineSuggestedPost',
                  ],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'active' => true,
                  'args' => [],
                  'select' => [],
                  'index$' => 0,
                ],
              ],
              'input' => 'data',
              'key$' => 'create',
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
              'active' => true,
              'index$' => 0,
            ],
            [
              'name' => 'description',
              'req' => false,
              'type' => '`$STRING`',
              'active' => true,
              'index$' => 1,
            ],
            [
              'name' => 'error_code',
              'req' => false,
              'type' => '`$INTEGER`',
              'active' => true,
              'index$' => 2,
            ],
            [
              'name' => 'message_thread_id',
              'req' => true,
              'type' => '`$INTEGER`',
              'active' => true,
              'index$' => 3,
            ],
            [
              'name' => 'ok',
              'req' => true,
              'type' => '`$BOOLEAN`',
              'active' => true,
              'index$' => 4,
            ],
            [
              'name' => 'parameter',
              'req' => false,
              'type' => '`$OBJECT`',
              'active' => true,
              'index$' => 5,
            ],
            [
              'name' => 'result',
              'req' => false,
              'type' => '`$ANY`',
              'active' => true,
              'index$' => 6,
            ],
          ],
          'name' => 'delete_forum_topic',
          'op' => [
            'create' => [
              'name' => 'create',
              'points' => [
                [
                  'method' => 'POST',
                  'orig' => '/deleteForumTopic',
                  'parts' => [
                    'deleteForumTopic',
                  ],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'active' => true,
                  'args' => [],
                  'select' => [],
                  'index$' => 0,
                ],
              ],
              'input' => 'data',
              'key$' => 'create',
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
              'active' => true,
              'index$' => 0,
            ],
            [
              'name' => 'description',
              'req' => false,
              'type' => '`$STRING`',
              'active' => true,
              'index$' => 1,
            ],
            [
              'name' => 'error_code',
              'req' => false,
              'type' => '`$INTEGER`',
              'active' => true,
              'index$' => 2,
            ],
            [
              'name' => 'icon_custom_emoji_id',
              'req' => false,
              'type' => '`$STRING`',
              'active' => true,
              'index$' => 3,
            ],
            [
              'name' => 'message_thread_id',
              'req' => true,
              'type' => '`$INTEGER`',
              'active' => true,
              'index$' => 4,
            ],
            [
              'name' => 'name',
              'req' => false,
              'type' => '`$STRING`',
              'active' => true,
              'index$' => 5,
            ],
            [
              'name' => 'ok',
              'req' => true,
              'type' => '`$BOOLEAN`',
              'active' => true,
              'index$' => 6,
            ],
            [
              'name' => 'parameter',
              'req' => false,
              'type' => '`$OBJECT`',
              'active' => true,
              'index$' => 7,
            ],
            [
              'name' => 'result',
              'req' => false,
              'type' => '`$ANY`',
              'active' => true,
              'index$' => 8,
            ],
          ],
          'name' => 'edit_forum_topic',
          'op' => [
            'create' => [
              'name' => 'create',
              'points' => [
                [
                  'method' => 'POST',
                  'orig' => '/editForumTopic',
                  'parts' => [
                    'editForumTopic',
                  ],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'active' => true,
                  'args' => [],
                  'select' => [],
                  'index$' => 0,
                ],
              ],
              'input' => 'data',
              'key$' => 'create',
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
              'active' => true,
              'index$' => 0,
            ],
          ],
          'name' => 'file',
          'op' => [
            'create' => [
              'name' => 'create',
              'points' => [
                [
                  'method' => 'POST',
                  'orig' => '/getFile',
                  'parts' => [
                    'getFile',
                  ],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'active' => true,
                  'args' => [],
                  'select' => [],
                  'index$' => 0,
                ],
              ],
              'input' => 'data',
              'key$' => 'create',
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
              'active' => true,
              'index$' => 0,
            ],
            [
              'name' => 'icon_color',
              'req' => false,
              'type' => '`$INTEGER`',
              'active' => true,
              'index$' => 1,
            ],
            [
              'name' => 'icon_custom_emoji_id',
              'req' => false,
              'type' => '`$STRING`',
              'active' => true,
              'index$' => 2,
            ],
            [
              'name' => 'name',
              'req' => true,
              'type' => '`$STRING`',
              'active' => true,
              'index$' => 3,
            ],
          ],
          'name' => 'forum_topic',
          'op' => [
            'create' => [
              'name' => 'create',
              'points' => [
                [
                  'method' => 'POST',
                  'orig' => '/createForumTopic',
                  'parts' => [
                    'createForumTopic',
                  ],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'active' => true,
                  'args' => [],
                  'select' => [],
                  'index$' => 0,
                ],
              ],
              'input' => 'data',
              'key$' => 'create',
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
              'req' => false,
              'type' => '`$STRING`',
              'active' => true,
              'index$' => 0,
            ],
            [
              'name' => 'error_code',
              'req' => false,
              'type' => '`$INTEGER`',
              'active' => true,
              'index$' => 1,
            ],
            [
              'name' => 'exclude_from_blockchain',
              'req' => false,
              'type' => '`$BOOLEAN`',
              'active' => true,
              'index$' => 2,
            ],
            [
              'name' => 'exclude_limited_non_upgradable',
              'req' => false,
              'type' => '`$BOOLEAN`',
              'active' => true,
              'index$' => 3,
            ],
            [
              'name' => 'exclude_limited_upgradable',
              'req' => false,
              'type' => '`$BOOLEAN`',
              'active' => true,
              'index$' => 4,
            ],
            [
              'name' => 'ok',
              'req' => true,
              'type' => '`$BOOLEAN`',
              'active' => true,
              'index$' => 5,
            ],
            [
              'name' => 'parameter',
              'req' => false,
              'type' => '`$OBJECT`',
              'active' => true,
              'index$' => 6,
            ],
            [
              'name' => 'result',
              'req' => false,
              'type' => '`$ANY`',
              'active' => true,
              'index$' => 7,
            ],
          ],
          'name' => 'get_business_account_gift',
          'op' => [
            'create' => [
              'name' => 'create',
              'points' => [
                [
                  'method' => 'POST',
                  'orig' => '/getBusinessAccountGifts',
                  'parts' => [
                    'getBusinessAccountGifts',
                  ],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'active' => true,
                  'args' => [],
                  'select' => [],
                  'index$' => 0,
                ],
              ],
              'input' => 'data',
              'key$' => 'create',
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
              'active' => true,
              'index$' => 0,
            ],
            [
              'name' => 'description',
              'req' => false,
              'type' => '`$STRING`',
              'active' => true,
              'index$' => 1,
            ],
            [
              'name' => 'error_code',
              'req' => false,
              'type' => '`$INTEGER`',
              'active' => true,
              'index$' => 2,
            ],
            [
              'name' => 'ok',
              'req' => true,
              'type' => '`$BOOLEAN`',
              'active' => true,
              'index$' => 3,
            ],
            [
              'name' => 'parameter',
              'req' => false,
              'type' => '`$OBJECT`',
              'active' => true,
              'index$' => 4,
            ],
            [
              'name' => 'result',
              'req' => false,
              'type' => '`$ANY`',
              'active' => true,
              'index$' => 5,
            ],
          ],
          'name' => 'get_chat_gift',
          'op' => [
            'create' => [
              'name' => 'create',
              'points' => [
                [
                  'method' => 'POST',
                  'orig' => '/getChatGifts',
                  'parts' => [
                    'getChatGifts',
                  ],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'active' => true,
                  'args' => [],
                  'select' => [],
                  'index$' => 0,
                ],
              ],
              'input' => 'data',
              'key$' => 'create',
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
              'req' => false,
              'type' => '`$STRING`',
              'active' => true,
              'index$' => 0,
            ],
            [
              'name' => 'error_code',
              'req' => false,
              'type' => '`$INTEGER`',
              'active' => true,
              'index$' => 1,
            ],
            [
              'name' => 'ok',
              'req' => true,
              'type' => '`$BOOLEAN`',
              'active' => true,
              'index$' => 2,
            ],
            [
              'name' => 'parameter',
              'req' => false,
              'type' => '`$OBJECT`',
              'active' => true,
              'index$' => 3,
            ],
            [
              'name' => 'result',
              'req' => false,
              'type' => '`$ANY`',
              'active' => true,
              'index$' => 4,
            ],
          ],
          'name' => 'get_me',
          'op' => [
            'create' => [
              'name' => 'create',
              'points' => [
                [
                  'method' => 'POST',
                  'orig' => '/getMe',
                  'parts' => [
                    'getMe',
                  ],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'active' => true,
                  'args' => [],
                  'select' => [],
                  'index$' => 0,
                ],
              ],
              'input' => 'data',
              'key$' => 'create',
            ],
            'load' => [
              'name' => 'load',
              'points' => [
                [
                  'method' => 'GET',
                  'orig' => '/getMe',
                  'parts' => [
                    'getMe',
                  ],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'active' => true,
                  'args' => [],
                  'select' => [],
                  'index$' => 0,
                ],
              ],
              'input' => 'data',
              'key$' => 'load',
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
              'req' => false,
              'type' => '`$STRING`',
              'active' => true,
              'index$' => 0,
            ],
            [
              'name' => 'error_code',
              'req' => false,
              'type' => '`$INTEGER`',
              'active' => true,
              'index$' => 1,
            ],
            [
              'name' => 'ok',
              'req' => true,
              'type' => '`$BOOLEAN`',
              'active' => true,
              'index$' => 2,
            ],
            [
              'name' => 'parameter',
              'req' => false,
              'type' => '`$OBJECT`',
              'active' => true,
              'index$' => 3,
            ],
            [
              'name' => 'result',
              'req' => false,
              'type' => '`$ANY`',
              'active' => true,
              'index$' => 4,
            ],
            [
              'name' => 'user_id',
              'req' => true,
              'type' => '`$INTEGER`',
              'active' => true,
              'index$' => 5,
            ],
          ],
          'name' => 'get_user_gift',
          'op' => [
            'create' => [
              'name' => 'create',
              'points' => [
                [
                  'method' => 'POST',
                  'orig' => '/getUserGifts',
                  'parts' => [
                    'getUserGifts',
                  ],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'active' => true,
                  'args' => [],
                  'select' => [],
                  'index$' => 0,
                ],
              ],
              'input' => 'data',
              'key$' => 'create',
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
              'req' => false,
              'type' => '`$STRING`',
              'active' => true,
              'index$' => 0,
            ],
            [
              'name' => 'error_code',
              'req' => false,
              'type' => '`$INTEGER`',
              'active' => true,
              'index$' => 1,
            ],
            [
              'name' => 'ok',
              'req' => true,
              'type' => '`$BOOLEAN`',
              'active' => true,
              'index$' => 2,
            ],
            [
              'name' => 'parameter',
              'req' => false,
              'type' => '`$OBJECT`',
              'active' => true,
              'index$' => 3,
            ],
            [
              'name' => 'result',
              'req' => false,
              'type' => '`$ANY`',
              'active' => true,
              'index$' => 4,
            ],
            [
              'name' => 'user_id',
              'req' => true,
              'type' => '`$INTEGER`',
              'active' => true,
              'index$' => 5,
            ],
          ],
          'name' => 'get_user_profile_audio',
          'op' => [
            'create' => [
              'name' => 'create',
              'points' => [
                [
                  'method' => 'POST',
                  'orig' => '/getUserProfileAudios',
                  'parts' => [
                    'getUserProfileAudios',
                  ],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'active' => true,
                  'args' => [],
                  'select' => [],
                  'index$' => 0,
                ],
              ],
              'input' => 'data',
              'key$' => 'create',
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
              'type' => '`$STRING`',
              'active' => true,
              'index$' => 0,
            ],
            [
              'name' => 'direct_messages_topic_id',
              'req' => false,
              'type' => '`$INTEGER`',
              'active' => true,
              'index$' => 1,
            ],
            [
              'name' => 'disable_notification',
              'req' => false,
              'type' => '`$BOOLEAN`',
              'active' => true,
              'index$' => 2,
            ],
            [
              'name' => 'disable_web_page_preview',
              'req' => false,
              'type' => '`$BOOLEAN`',
              'active' => true,
              'index$' => 3,
            ],
            [
              'name' => 'from_chat_id',
              'req' => true,
              'type' => '`$STRING`',
              'active' => true,
              'index$' => 4,
            ],
            [
              'name' => 'latitude',
              'req' => true,
              'type' => '`$NUMBER`',
              'active' => true,
              'index$' => 5,
            ],
            [
              'name' => 'longitude',
              'req' => true,
              'type' => '`$NUMBER`',
              'active' => true,
              'index$' => 6,
            ],
            [
              'name' => 'message_effect_id',
              'req' => false,
              'type' => '`$STRING`',
              'active' => true,
              'index$' => 7,
            ],
            [
              'name' => 'message_id',
              'req' => true,
              'type' => '`$INTEGER`',
              'active' => true,
              'index$' => 8,
            ],
            [
              'name' => 'message_thread_id',
              'req' => false,
              'type' => '`$INTEGER`',
              'active' => true,
              'index$' => 9,
            ],
            [
              'name' => 'option',
              'req' => true,
              'type' => '`$ARRAY`',
              'active' => true,
              'index$' => 10,
            ],
            [
              'name' => 'parse_mode',
              'req' => false,
              'type' => '`$STRING`',
              'active' => true,
              'index$' => 11,
            ],
            [
              'name' => 'protect_content',
              'req' => false,
              'type' => '`$BOOLEAN`',
              'active' => true,
              'index$' => 12,
            ],
            [
              'name' => 'question',
              'req' => true,
              'type' => '`$STRING`',
              'active' => true,
              'index$' => 13,
            ],
            [
              'name' => 'reply_to_message_id',
              'req' => false,
              'type' => '`$INTEGER`',
              'active' => true,
              'index$' => 14,
            ],
            [
              'name' => 'text',
              'req' => true,
              'type' => '`$STRING`',
              'active' => true,
              'index$' => 15,
            ],
          ],
          'name' => 'message',
          'op' => [
            'create' => [
              'name' => 'create',
              'points' => [
                [
                  'method' => 'POST',
                  'orig' => '/forwardMessage',
                  'parts' => [
                    'forwardMessage',
                  ],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'active' => true,
                  'args' => [],
                  'select' => [],
                  'index$' => 0,
                ],
                [
                  'method' => 'POST',
                  'orig' => '/sendAnimation',
                  'parts' => [
                    'sendAnimation',
                  ],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'active' => true,
                  'args' => [],
                  'select' => [],
                  'index$' => 1,
                ],
                [
                  'method' => 'POST',
                  'orig' => '/sendAudio',
                  'parts' => [
                    'sendAudio',
                  ],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'active' => true,
                  'args' => [],
                  'select' => [],
                  'index$' => 2,
                ],
                [
                  'method' => 'POST',
                  'orig' => '/sendDocument',
                  'parts' => [
                    'sendDocument',
                  ],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'active' => true,
                  'args' => [],
                  'select' => [],
                  'index$' => 3,
                ],
                [
                  'method' => 'POST',
                  'orig' => '/sendLocation',
                  'parts' => [
                    'sendLocation',
                  ],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'active' => true,
                  'args' => [],
                  'select' => [],
                  'index$' => 4,
                ],
                [
                  'method' => 'POST',
                  'orig' => '/sendMessage',
                  'parts' => [
                    'sendMessage',
                  ],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'active' => true,
                  'args' => [],
                  'select' => [],
                  'index$' => 5,
                ],
                [
                  'method' => 'POST',
                  'orig' => '/sendPhoto',
                  'parts' => [
                    'sendPhoto',
                  ],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'active' => true,
                  'args' => [],
                  'select' => [],
                  'index$' => 6,
                ],
                [
                  'method' => 'POST',
                  'orig' => '/sendPoll',
                  'parts' => [
                    'sendPoll',
                  ],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'active' => true,
                  'args' => [],
                  'select' => [],
                  'index$' => 7,
                ],
                [
                  'method' => 'POST',
                  'orig' => '/sendSticker',
                  'parts' => [
                    'sendSticker',
                  ],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'active' => true,
                  'args' => [],
                  'select' => [],
                  'index$' => 8,
                ],
                [
                  'method' => 'POST',
                  'orig' => '/sendVideo',
                  'parts' => [
                    'sendVideo',
                  ],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'active' => true,
                  'args' => [],
                  'select' => [],
                  'index$' => 9,
                ],
              ],
              'input' => 'data',
              'key$' => 'create',
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
              'active' => true,
              'index$' => 0,
            ],
            [
              'name' => 'direct_messages_topic_id',
              'req' => false,
              'type' => '`$INTEGER`',
              'active' => true,
              'index$' => 1,
            ],
            [
              'name' => 'from_chat_id',
              'req' => true,
              'type' => '`$STRING`',
              'active' => true,
              'index$' => 2,
            ],
            [
              'name' => 'message_effect_id',
              'req' => false,
              'type' => '`$STRING`',
              'active' => true,
              'index$' => 3,
            ],
            [
              'name' => 'message_id',
              'req' => true,
              'type' => '`$INTEGER`',
              'active' => true,
              'index$' => 4,
            ],
            [
              'name' => 'message_thread_id',
              'req' => false,
              'type' => '`$INTEGER`',
              'active' => true,
              'index$' => 5,
            ],
          ],
          'name' => 'message_id',
          'op' => [
            'create' => [
              'name' => 'create',
              'points' => [
                [
                  'method' => 'POST',
                  'orig' => '/copyMessage',
                  'parts' => [
                    'copyMessage',
                  ],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'active' => true,
                  'args' => [],
                  'select' => [],
                  'index$' => 0,
                ],
              ],
              'input' => 'data',
              'key$' => 'create',
            ],
          ],
          'relations' => [
            'ancestors' => [],
          ],
        ],
        'promote_chat_member' => [
          'fields' => [
            [
              'name' => 'can_delete_message',
              'req' => false,
              'type' => '`$BOOLEAN`',
              'active' => true,
              'index$' => 0,
            ],
            [
              'name' => 'can_edit_message',
              'req' => false,
              'type' => '`$BOOLEAN`',
              'active' => true,
              'index$' => 1,
            ],
            [
              'name' => 'can_manage_chat',
              'req' => false,
              'type' => '`$BOOLEAN`',
              'active' => true,
              'index$' => 2,
            ],
            [
              'name' => 'can_manage_direct_message',
              'req' => false,
              'type' => '`$BOOLEAN`',
              'active' => true,
              'index$' => 3,
            ],
            [
              'name' => 'can_post_message',
              'req' => false,
              'type' => '`$BOOLEAN`',
              'active' => true,
              'index$' => 4,
            ],
            [
              'name' => 'chat_id',
              'req' => true,
              'type' => '`$STRING`',
              'active' => true,
              'index$' => 5,
            ],
            [
              'name' => 'description',
              'req' => false,
              'type' => '`$STRING`',
              'active' => true,
              'index$' => 6,
            ],
            [
              'name' => 'error_code',
              'req' => false,
              'type' => '`$INTEGER`',
              'active' => true,
              'index$' => 7,
            ],
            [
              'name' => 'ok',
              'req' => true,
              'type' => '`$BOOLEAN`',
              'active' => true,
              'index$' => 8,
            ],
            [
              'name' => 'parameter',
              'req' => false,
              'type' => '`$OBJECT`',
              'active' => true,
              'index$' => 9,
            ],
            [
              'name' => 'result',
              'req' => false,
              'type' => '`$ANY`',
              'active' => true,
              'index$' => 10,
            ],
            [
              'name' => 'user_id',
              'req' => true,
              'type' => '`$INTEGER`',
              'active' => true,
              'index$' => 11,
            ],
          ],
          'name' => 'promote_chat_member',
          'op' => [
            'create' => [
              'name' => 'create',
              'points' => [
                [
                  'method' => 'POST',
                  'orig' => '/promoteChatMember',
                  'parts' => [
                    'promoteChatMember',
                  ],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'active' => true,
                  'args' => [],
                  'select' => [],
                  'index$' => 0,
                ],
              ],
              'input' => 'data',
              'key$' => 'create',
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
              'req' => false,
              'type' => '`$STRING`',
              'active' => true,
              'index$' => 0,
            ],
            [
              'name' => 'error_code',
              'req' => false,
              'type' => '`$INTEGER`',
              'active' => true,
              'index$' => 1,
            ],
            [
              'name' => 'ok',
              'req' => true,
              'type' => '`$BOOLEAN`',
              'active' => true,
              'index$' => 2,
            ],
            [
              'name' => 'parameter',
              'req' => false,
              'type' => '`$OBJECT`',
              'active' => true,
              'index$' => 3,
            ],
            [
              'name' => 'result',
              'req' => false,
              'type' => '`$ANY`',
              'active' => true,
              'index$' => 4,
            ],
          ],
          'name' => 'remove_my_profile_photo',
          'op' => [
            'create' => [
              'name' => 'create',
              'points' => [
                [
                  'method' => 'POST',
                  'orig' => '/removeMyProfilePhoto',
                  'parts' => [
                    'removeMyProfilePhoto',
                  ],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'active' => true,
                  'args' => [],
                  'select' => [],
                  'index$' => 0,
                ],
              ],
              'input' => 'data',
              'key$' => 'create',
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
              'active' => true,
              'index$' => 0,
            ],
            [
              'name' => 'description',
              'req' => false,
              'type' => '`$STRING`',
              'active' => true,
              'index$' => 1,
            ],
            [
              'name' => 'error_code',
              'req' => false,
              'type' => '`$INTEGER`',
              'active' => true,
              'index$' => 2,
            ],
            [
              'name' => 'ok',
              'req' => true,
              'type' => '`$BOOLEAN`',
              'active' => true,
              'index$' => 3,
            ],
            [
              'name' => 'parameter',
              'req' => false,
              'type' => '`$OBJECT`',
              'active' => true,
              'index$' => 4,
            ],
            [
              'name' => 'result',
              'req' => false,
              'type' => '`$ANY`',
              'active' => true,
              'index$' => 5,
            ],
            [
              'name' => 'story_id',
              'req' => true,
              'type' => '`$INTEGER`',
              'active' => true,
              'index$' => 6,
            ],
          ],
          'name' => 'repost_story',
          'op' => [
            'create' => [
              'name' => 'create',
              'points' => [
                [
                  'method' => 'POST',
                  'orig' => '/repostStory',
                  'parts' => [
                    'repostStory',
                  ],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'active' => true,
                  'args' => [],
                  'select' => [],
                  'index$' => 0,
                ],
              ],
              'input' => 'data',
              'key$' => 'create',
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
              'active' => true,
              'index$' => 0,
            ],
            [
              'name' => 'chat_id',
              'req' => true,
              'type' => '`$STRING`',
              'active' => true,
              'index$' => 1,
            ],
            [
              'name' => 'description',
              'req' => false,
              'type' => '`$STRING`',
              'active' => true,
              'index$' => 2,
            ],
            [
              'name' => 'error_code',
              'req' => false,
              'type' => '`$INTEGER`',
              'active' => true,
              'index$' => 3,
            ],
            [
              'name' => 'message_thread_id',
              'req' => false,
              'type' => '`$INTEGER`',
              'active' => true,
              'index$' => 4,
            ],
            [
              'name' => 'ok',
              'req' => true,
              'type' => '`$BOOLEAN`',
              'active' => true,
              'index$' => 5,
            ],
            [
              'name' => 'parameter',
              'req' => false,
              'type' => '`$OBJECT`',
              'active' => true,
              'index$' => 6,
            ],
            [
              'name' => 'result',
              'req' => false,
              'type' => '`$ANY`',
              'active' => true,
              'index$' => 7,
            ],
          ],
          'name' => 'send_chat_action',
          'op' => [
            'create' => [
              'name' => 'create',
              'points' => [
                [
                  'method' => 'POST',
                  'orig' => '/sendChatAction',
                  'parts' => [
                    'sendChatAction',
                  ],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'active' => true,
                  'args' => [],
                  'select' => [],
                  'index$' => 0,
                ],
              ],
              'input' => 'data',
              'key$' => 'create',
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
              'active' => true,
              'index$' => 0,
            ],
            [
              'name' => 'description',
              'req' => false,
              'type' => '`$STRING`',
              'active' => true,
              'index$' => 1,
            ],
            [
              'name' => 'error_code',
              'req' => false,
              'type' => '`$INTEGER`',
              'active' => true,
              'index$' => 2,
            ],
            [
              'name' => 'message_thread_id',
              'req' => false,
              'type' => '`$INTEGER`',
              'active' => true,
              'index$' => 3,
            ],
            [
              'name' => 'ok',
              'req' => true,
              'type' => '`$BOOLEAN`',
              'active' => true,
              'index$' => 4,
            ],
            [
              'name' => 'parameter',
              'req' => false,
              'type' => '`$OBJECT`',
              'active' => true,
              'index$' => 5,
            ],
            [
              'name' => 'result',
              'req' => false,
              'type' => '`$ANY`',
              'active' => true,
              'index$' => 6,
            ],
            [
              'name' => 'text',
              'req' => true,
              'type' => '`$STRING`',
              'active' => true,
              'index$' => 7,
            ],
          ],
          'name' => 'send_message_draft',
          'op' => [
            'create' => [
              'name' => 'create',
              'points' => [
                [
                  'method' => 'POST',
                  'orig' => '/sendMessageDraft',
                  'parts' => [
                    'sendMessageDraft',
                  ],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'active' => true,
                  'args' => [],
                  'select' => [],
                  'index$' => 0,
                ],
              ],
              'input' => 'data',
              'key$' => 'create',
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
              'req' => false,
              'type' => '`$STRING`',
              'active' => true,
              'index$' => 0,
            ],
            [
              'name' => 'error_code',
              'req' => false,
              'type' => '`$INTEGER`',
              'active' => true,
              'index$' => 1,
            ],
            [
              'name' => 'ok',
              'req' => true,
              'type' => '`$BOOLEAN`',
              'active' => true,
              'index$' => 2,
            ],
            [
              'name' => 'parameter',
              'req' => false,
              'type' => '`$OBJECT`',
              'active' => true,
              'index$' => 3,
            ],
            [
              'name' => 'result',
              'req' => false,
              'type' => '`$ANY`',
              'active' => true,
              'index$' => 4,
            ],
          ],
          'name' => 'set_my_profile_photo',
          'op' => [
            'create' => [
              'name' => 'create',
              'points' => [
                [
                  'method' => 'POST',
                  'orig' => '/setMyProfilePhoto',
                  'parts' => [
                    'setMyProfilePhoto',
                  ],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'active' => true,
                  'args' => [],
                  'select' => [],
                  'index$' => 0,
                ],
              ],
              'input' => 'data',
              'key$' => 'create',
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
              'active' => true,
              'index$' => 0,
            ],
            [
              'name' => 'description',
              'req' => false,
              'type' => '`$STRING`',
              'active' => true,
              'index$' => 1,
            ],
            [
              'name' => 'error_code',
              'req' => false,
              'type' => '`$INTEGER`',
              'active' => true,
              'index$' => 2,
            ],
            [
              'name' => 'message_thread_id',
              'req' => true,
              'type' => '`$INTEGER`',
              'active' => true,
              'index$' => 3,
            ],
            [
              'name' => 'ok',
              'req' => true,
              'type' => '`$BOOLEAN`',
              'active' => true,
              'index$' => 4,
            ],
            [
              'name' => 'parameter',
              'req' => false,
              'type' => '`$OBJECT`',
              'active' => true,
              'index$' => 5,
            ],
            [
              'name' => 'result',
              'req' => false,
              'type' => '`$ANY`',
              'active' => true,
              'index$' => 6,
            ],
          ],
          'name' => 'unpin_all_forum_topic_message',
          'op' => [
            'create' => [
              'name' => 'create',
              'points' => [
                [
                  'method' => 'POST',
                  'orig' => '/unpinAllForumTopicMessages',
                  'parts' => [
                    'unpinAllForumTopicMessages',
                  ],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'active' => true,
                  'args' => [],
                  'select' => [],
                  'index$' => 0,
                ],
              ],
              'input' => 'data',
              'key$' => 'create',
            ],
          ],
          'relations' => [
            'ancestors' => [],
          ],
        ],
        'update' => [
          'fields' => [
            [
              'name' => 'allowed_update',
              'req' => false,
              'type' => '`$ARRAY`',
              'active' => true,
              'index$' => 0,
            ],
            [
              'name' => 'description',
              'req' => false,
              'type' => '`$STRING`',
              'active' => true,
              'index$' => 1,
            ],
            [
              'name' => 'error_code',
              'req' => false,
              'type' => '`$INTEGER`',
              'active' => true,
              'index$' => 2,
            ],
            [
              'name' => 'limit',
              'req' => false,
              'type' => '`$INTEGER`',
              'active' => true,
              'index$' => 3,
            ],
            [
              'name' => 'offset',
              'req' => false,
              'type' => '`$INTEGER`',
              'active' => true,
              'index$' => 4,
            ],
            [
              'name' => 'ok',
              'req' => true,
              'type' => '`$BOOLEAN`',
              'active' => true,
              'index$' => 5,
            ],
            [
              'name' => 'parameter',
              'req' => false,
              'type' => '`$OBJECT`',
              'active' => true,
              'index$' => 6,
            ],
            [
              'name' => 'result',
              'req' => false,
              'type' => '`$ARRAY`',
              'active' => true,
              'index$' => 7,
            ],
            [
              'name' => 'timeout',
              'req' => false,
              'type' => '`$INTEGER`',
              'active' => true,
              'index$' => 8,
            ],
          ],
          'name' => 'update',
          'op' => [
            'create' => [
              'name' => 'create',
              'points' => [
                [
                  'method' => 'POST',
                  'orig' => '/getUpdates',
                  'parts' => [
                    'getUpdates',
                  ],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'active' => true,
                  'args' => [],
                  'select' => [],
                  'index$' => 0,
                ],
              ],
              'input' => 'data',
              'key$' => 'create',
            ],
            'list' => [
              'name' => 'list',
              'points' => [
                [
                  'args' => [
                    'query' => [
                      [
                        'kind' => 'query',
                        'name' => 'allowed_update',
                        'orig' => 'allowed_update',
                        'reqd' => false,
                        'type' => '`$ARRAY`',
                        'active' => true,
                      ],
                      [
                        'example' => 100,
                        'kind' => 'query',
                        'name' => 'limit',
                        'orig' => 'limit',
                        'reqd' => false,
                        'type' => '`$INTEGER`',
                        'active' => true,
                      ],
                      [
                        'kind' => 'query',
                        'name' => 'offset',
                        'orig' => 'offset',
                        'reqd' => false,
                        'type' => '`$INTEGER`',
                        'active' => true,
                      ],
                      [
                        'example' => 0,
                        'kind' => 'query',
                        'name' => 'timeout',
                        'orig' => 'timeout',
                        'reqd' => false,
                        'type' => '`$INTEGER`',
                        'active' => true,
                      ],
                    ],
                  ],
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
                  'active' => true,
                  'index$' => 0,
                ],
              ],
              'input' => 'data',
              'key$' => 'list',
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
