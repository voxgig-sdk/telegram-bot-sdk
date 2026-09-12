# TelegramBot SDK configuration


# The sekreto plugin DEFINITIONS the model selected per feature, imported
# above by name from the modules the catalogue's active `plugin.def`
# entries declare. Handed to each feature (secrets builds its Sekreto
# with them): a provider kind not listed here is unknown to that SDK.
FEATURE_PLUGINS = {
}


_shared_config = None


def shared_config():
    """Return the process-wide config, built once on first use.

    The SDK reads the config on every request and never writes to it, so one
    instance is shared by every client rather than rebuilt per client.

    The returned dict is shared: treat it as read-only. Callers that need to
    mutate should use make_config, which always returns a fresh copy.
    """
    global _shared_config
    if _shared_config is None:
        _shared_config = make_config()
    return _shared_config


def make_config():
    """Build a fresh, fully materialised config dict.

    Every call rebuilds the whole structure, so prefer shared_config unless
    you need a private copy you intend to mutate.
    """
    return {
        "main": {
            "name": "TelegramBot",
            "slug": "telegram-bot",
            "version": "0.0.1",
            "target": "py",
        },
        "feature": {
            "test": {
        "options": {
          "active": False,
        },
        "transport": "base",
      },
        },
        "options": {
            "base": "https://api.telegram.org/bot{token}",
            "server": {
                "token": "",
            },
            "auth": {
                "prefix": "",
            },
            "headers": {
        "content-type": "application/json",
      },
            "entity": {
                "approve_suggested_post": {},
                "decline_suggested_post": {},
                "delete_forum_topic": {},
                "edit_forum_topic": {},
                "file": {},
                "forum_topic": {},
                "get_business_account_gift": {},
                "get_chat_gift": {},
                "get_me": {},
                "get_user_gift": {},
                "get_user_profile_audio": {},
                "message": {},
                "message_id": {},
                "promote_chat_member": {},
                "remove_my_profile_photo": {},
                "repost_story": {},
                "send_chat_action": {},
                "send_message_draft": {},
                "set_my_profile_photo": {},
                "unpin_all_forum_topic_message": {},
                "update": {},
            },
        },
        "entity": {
      "approve_suggested_post": {
        "fields": [
          {
            "name": "chat_id",
            "req": True,
            "type": "`$STRING`",
            "union": {
              "branches": 2,
              "count": 1,
              "depth": 0,
            },
          },
          {
            "name": "description",
            "short": "Human-readable description of the result",
            "type": "`$STRING`",
          },
          {
            "name": "error_code",
            "short": "Error code",
            "type": "`$INTEGER`",
          },
          {
            "name": "message_id",
            "req": True,
            "type": "`$INTEGER`",
          },
          {
            "name": "ok",
            "req": True,
            "short": "If true, the request was successful",
            "type": "`$BOOLEAN`",
          },
          {
            "name": "parameters",
            "type": "`$OBJECT`",
          },
          {
            "name": "result",
            "short": "The result of the query",
            "type": "`$ARRAY`",
          },
        ],
        "name": "approve_suggested_post",
        "op": {
          "create": {
            "input": "data",
            "name": "create",
            "points": [
              {
                "args": {},
                "kind": "http",
                "method": "POST",
                "orig": "/approveSuggestedPost",
                "segments": [
                  {
                    "lit": "approveSuggestedPost",
                  },
                ],
                "select": {},
                "transform": {
                  "req": "`reqdata`",
                  "res": "`body.parameters`",
                },
                "parts": [
                  "approveSuggestedPost",
                ],
              },
            ],
          },
        },
        "relations": {
          "ancestors": [],
        },
      },
      "decline_suggested_post": {
        "fields": [
          {
            "name": "chat_id",
            "req": True,
            "type": "`$STRING`",
            "union": {
              "branches": 2,
              "count": 1,
              "depth": 0,
            },
          },
          {
            "name": "description",
            "short": "Human-readable description of the result",
            "type": "`$STRING`",
          },
          {
            "name": "error_code",
            "short": "Error code",
            "type": "`$INTEGER`",
          },
          {
            "name": "message_id",
            "req": True,
            "type": "`$INTEGER`",
          },
          {
            "name": "ok",
            "req": True,
            "short": "If true, the request was successful",
            "type": "`$BOOLEAN`",
          },
          {
            "name": "parameters",
            "type": "`$OBJECT`",
          },
          {
            "name": "result",
            "short": "The result of the query",
            "type": "`$ARRAY`",
          },
        ],
        "name": "decline_suggested_post",
        "op": {
          "create": {
            "input": "data",
            "name": "create",
            "points": [
              {
                "args": {},
                "kind": "http",
                "method": "POST",
                "orig": "/declineSuggestedPost",
                "segments": [
                  {
                    "lit": "declineSuggestedPost",
                  },
                ],
                "select": {},
                "transform": {
                  "req": "`reqdata`",
                  "res": "`body.parameters`",
                },
                "parts": [
                  "declineSuggestedPost",
                ],
              },
            ],
          },
        },
        "relations": {
          "ancestors": [],
        },
      },
      "delete_forum_topic": {
        "fields": [
          {
            "name": "chat_id",
            "req": True,
            "type": "`$STRING`",
            "union": {
              "branches": 2,
              "count": 1,
              "depth": 0,
            },
          },
          {
            "name": "description",
            "short": "Human-readable description of the result",
            "type": "`$STRING`",
          },
          {
            "name": "error_code",
            "short": "Error code",
            "type": "`$INTEGER`",
          },
          {
            "name": "message_thread_id",
            "req": True,
            "type": "`$INTEGER`",
          },
          {
            "name": "ok",
            "req": True,
            "short": "If true, the request was successful",
            "type": "`$BOOLEAN`",
          },
          {
            "name": "parameters",
            "type": "`$OBJECT`",
          },
          {
            "name": "result",
            "short": "The result of the query",
            "type": "`$ARRAY`",
          },
        ],
        "name": "delete_forum_topic",
        "op": {
          "create": {
            "input": "data",
            "name": "create",
            "points": [
              {
                "args": {},
                "kind": "http",
                "method": "POST",
                "orig": "/deleteForumTopic",
                "segments": [
                  {
                    "lit": "deleteForumTopic",
                  },
                ],
                "select": {},
                "transform": {
                  "req": "`reqdata`",
                  "res": "`body.parameters`",
                },
                "parts": [
                  "deleteForumTopic",
                ],
              },
            ],
          },
        },
        "relations": {
          "ancestors": [],
        },
      },
      "edit_forum_topic": {
        "fields": [
          {
            "name": "chat_id",
            "req": True,
            "type": "`$STRING`",
            "union": {
              "branches": 2,
              "count": 1,
              "depth": 0,
            },
          },
          {
            "name": "description",
            "short": "Human-readable description of the result",
            "type": "`$STRING`",
          },
          {
            "name": "error_code",
            "short": "Error code",
            "type": "`$INTEGER`",
          },
          {
            "name": "icon_custom_emoji_id",
            "type": "`$STRING`",
          },
          {
            "name": "message_thread_id",
            "req": True,
            "type": "`$INTEGER`",
          },
          {
            "name": "name",
            "type": "`$STRING`",
          },
          {
            "name": "ok",
            "req": True,
            "short": "If true, the request was successful",
            "type": "`$BOOLEAN`",
          },
          {
            "name": "parameters",
            "type": "`$OBJECT`",
          },
          {
            "name": "result",
            "short": "The result of the query",
            "type": "`$ARRAY`",
          },
        ],
        "name": "edit_forum_topic",
        "op": {
          "create": {
            "input": "data",
            "name": "create",
            "points": [
              {
                "args": {},
                "kind": "http",
                "method": "POST",
                "orig": "/editForumTopic",
                "segments": [
                  {
                    "lit": "editForumTopic",
                  },
                ],
                "select": {},
                "transform": {
                  "req": "`reqdata`",
                  "res": "`body.parameters`",
                },
                "parts": [
                  "editForumTopic",
                ],
              },
            ],
          },
        },
        "relations": {
          "ancestors": [],
        },
      },
      "file": {
        "fields": [
          {
            "name": "file_id",
            "req": True,
            "type": "`$STRING`",
          },
        ],
        "name": "file",
        "op": {
          "create": {
            "input": "data",
            "name": "create",
            "points": [
              {
                "args": {},
                "kind": "http",
                "method": "POST",
                "orig": "/getFile",
                "segments": [
                  {
                    "lit": "getFile",
                  },
                ],
                "select": {},
                "transform": {
                  "req": "`reqdata`",
                  "res": "`body`",
                },
                "parts": [
                  "getFile",
                ],
              },
            ],
          },
        },
        "relations": {
          "ancestors": [],
        },
      },
      "forum_topic": {
        "fields": [
          {
            "name": "chat_id",
            "req": True,
            "type": "`$STRING`",
            "union": {
              "branches": 2,
              "count": 1,
              "depth": 0,
            },
          },
          {
            "name": "icon_color",
            "type": "`$INTEGER`",
          },
          {
            "name": "icon_custom_emoji_id",
            "type": "`$STRING`",
          },
          {
            "name": "name",
            "req": True,
            "type": "`$STRING`",
          },
        ],
        "name": "forum_topic",
        "op": {
          "create": {
            "input": "data",
            "name": "create",
            "points": [
              {
                "args": {},
                "kind": "http",
                "method": "POST",
                "orig": "/createForumTopic",
                "segments": [
                  {
                    "lit": "createForumTopic",
                  },
                ],
                "select": {},
                "transform": {
                  "req": "`reqdata`",
                  "res": "`body`",
                },
                "parts": [
                  "createForumTopic",
                ],
              },
            ],
          },
        },
        "relations": {
          "ancestors": [],
        },
      },
      "get_business_account_gift": {
        "fields": [
          {
            "name": "description",
            "short": "Human-readable description of the result",
            "type": "`$STRING`",
          },
          {
            "name": "error_code",
            "short": "Error code",
            "type": "`$INTEGER`",
          },
          {
            "name": "exclude_from_blockchain",
            "type": "`$BOOLEAN`",
          },
          {
            "name": "exclude_limited_non_upgradable",
            "type": "`$BOOLEAN`",
          },
          {
            "name": "exclude_limited_upgradable",
            "type": "`$BOOLEAN`",
          },
          {
            "name": "ok",
            "req": True,
            "short": "If true, the request was successful",
            "type": "`$BOOLEAN`",
          },
          {
            "name": "parameters",
            "type": "`$OBJECT`",
          },
          {
            "name": "result",
            "short": "The result of the query",
            "type": "`$ARRAY`",
          },
        ],
        "name": "get_business_account_gift",
        "op": {
          "create": {
            "input": "data",
            "name": "create",
            "points": [
              {
                "args": {},
                "kind": "http",
                "method": "POST",
                "orig": "/getBusinessAccountGifts",
                "segments": [
                  {
                    "lit": "getBusinessAccountGifts",
                  },
                ],
                "select": {},
                "transform": {
                  "req": "`reqdata`",
                  "res": "`body.parameters`",
                },
                "parts": [
                  "getBusinessAccountGifts",
                ],
              },
            ],
          },
        },
        "relations": {
          "ancestors": [],
        },
      },
      "get_chat_gift": {
        "fields": [
          {
            "name": "chat_id",
            "req": True,
            "type": "`$STRING`",
            "union": {
              "branches": 2,
              "count": 1,
              "depth": 0,
            },
          },
          {
            "name": "description",
            "short": "Human-readable description of the result",
            "type": "`$STRING`",
          },
          {
            "name": "error_code",
            "short": "Error code",
            "type": "`$INTEGER`",
          },
          {
            "name": "ok",
            "req": True,
            "short": "If true, the request was successful",
            "type": "`$BOOLEAN`",
          },
          {
            "name": "parameters",
            "type": "`$OBJECT`",
          },
          {
            "name": "result",
            "short": "The result of the query",
            "type": "`$ARRAY`",
          },
        ],
        "name": "get_chat_gift",
        "op": {
          "create": {
            "input": "data",
            "name": "create",
            "points": [
              {
                "args": {},
                "kind": "http",
                "method": "POST",
                "orig": "/getChatGifts",
                "segments": [
                  {
                    "lit": "getChatGifts",
                  },
                ],
                "select": {},
                "transform": {
                  "req": "`reqdata`",
                  "res": "`body.parameters`",
                },
                "parts": [
                  "getChatGifts",
                ],
              },
            ],
          },
        },
        "relations": {
          "ancestors": [],
        },
      },
      "get_me": {
        "fields": [
          {
            "name": "description",
            "short": "Human-readable description of the result",
            "type": "`$STRING`",
          },
          {
            "name": "error_code",
            "short": "Error code",
            "type": "`$INTEGER`",
          },
          {
            "name": "ok",
            "req": True,
            "short": "If true, the request was successful",
            "type": "`$BOOLEAN`",
          },
          {
            "name": "parameters",
            "type": "`$OBJECT`",
          },
          {
            "name": "result",
            "short": "The result of the query",
            "type": "`$ARRAY`",
          },
        ],
        "name": "get_me",
        "op": {
          "create": {
            "input": "data",
            "name": "create",
            "points": [
              {
                "args": {},
                "kind": "http",
                "method": "POST",
                "orig": "/getMe",
                "segments": [
                  {
                    "lit": "getMe",
                  },
                ],
                "select": {},
                "transform": {
                  "req": "`reqdata`",
                  "res": "`body.parameters`",
                },
                "parts": [
                  "getMe",
                ],
              },
            ],
          },
          "load": {
            "input": "data",
            "name": "load",
            "points": [
              {
                "args": {},
                "kind": "http",
                "method": "GET",
                "orig": "/getMe",
                "segments": [
                  {
                    "lit": "getMe",
                  },
                ],
                "select": {},
                "transform": {
                  "req": "`reqdata`",
                  "res": "`body.parameters`",
                },
                "parts": [
                  "getMe",
                ],
              },
            ],
          },
        },
        "relations": {
          "ancestors": [],
        },
      },
      "get_user_gift": {
        "fields": [
          {
            "name": "description",
            "short": "Human-readable description of the result",
            "type": "`$STRING`",
          },
          {
            "name": "error_code",
            "short": "Error code",
            "type": "`$INTEGER`",
          },
          {
            "name": "ok",
            "req": True,
            "short": "If true, the request was successful",
            "type": "`$BOOLEAN`",
          },
          {
            "name": "parameters",
            "type": "`$OBJECT`",
          },
          {
            "name": "result",
            "short": "The result of the query",
            "type": "`$ARRAY`",
          },
          {
            "name": "user_id",
            "req": True,
            "type": "`$INTEGER`",
          },
        ],
        "name": "get_user_gift",
        "op": {
          "create": {
            "input": "data",
            "name": "create",
            "points": [
              {
                "args": {},
                "kind": "http",
                "method": "POST",
                "orig": "/getUserGifts",
                "segments": [
                  {
                    "lit": "getUserGifts",
                  },
                ],
                "select": {},
                "transform": {
                  "req": "`reqdata`",
                  "res": "`body`",
                },
                "parts": [
                  "getUserGifts",
                ],
              },
            ],
          },
        },
        "relations": {
          "ancestors": [],
        },
      },
      "get_user_profile_audio": {
        "fields": [
          {
            "name": "description",
            "short": "Human-readable description of the result",
            "type": "`$STRING`",
          },
          {
            "name": "error_code",
            "short": "Error code",
            "type": "`$INTEGER`",
          },
          {
            "name": "ok",
            "req": True,
            "short": "If true, the request was successful",
            "type": "`$BOOLEAN`",
          },
          {
            "name": "parameters",
            "type": "`$OBJECT`",
          },
          {
            "name": "result",
            "short": "The result of the query",
            "type": "`$ARRAY`",
          },
          {
            "name": "user_id",
            "req": True,
            "type": "`$INTEGER`",
          },
        ],
        "name": "get_user_profile_audio",
        "op": {
          "create": {
            "input": "data",
            "name": "create",
            "points": [
              {
                "args": {},
                "kind": "http",
                "method": "POST",
                "orig": "/getUserProfileAudios",
                "segments": [
                  {
                    "lit": "getUserProfileAudios",
                  },
                ],
                "select": {},
                "transform": {
                  "req": "`reqdata`",
                  "res": "`body`",
                },
                "parts": [
                  "getUserProfileAudios",
                ],
              },
            ],
          },
        },
        "relations": {
          "ancestors": [],
        },
      },
      "message": {
        "fields": [
          {
            "name": "chat_id",
            "req": True,
            "short": "Unique identifier for the target chat or username",
            "type": "`$STRING`",
            "union": {
              "branches": 2,
              "count": 1,
              "depth": 0,
            },
          },
          {
            "name": "direct_messages_topic_id",
            "short": "Unique identifier for the target direct messages topic",
            "type": "`$INTEGER`",
          },
          {
            "name": "disable_notification",
            "short": "Sends the message silently",
            "type": "`$BOOLEAN`",
          },
          {
            "name": "disable_web_page_preview",
            "short": "Disables link previews for links in this message",
            "type": "`$BOOLEAN`",
          },
          {
            "name": "from_chat_id",
            "req": True,
            "type": "`$STRING`",
            "union": {
              "branches": 2,
              "count": 1,
              "depth": 0,
            },
          },
          {
            "format": "float",
            "name": "latitude",
            "req": True,
            "type": "`$NUMBER`",
          },
          {
            "format": "float",
            "name": "longitude",
            "req": True,
            "type": "`$NUMBER`",
          },
          {
            "name": "message_effect_id",
            "short": "Unique identifier of the message effect to be added to the message",
            "type": "`$STRING`",
          },
          {
            "name": "message_id",
            "req": True,
            "type": "`$INTEGER`",
          },
          {
            "name": "message_thread_id",
            "short": "Unique identifier for the target message thread (topic) of the forum",
            "type": "`$INTEGER`",
          },
          {
            "name": "options",
            "req": True,
            "type": "`$ARRAY`",
          },
          {
            "name": "parse_mode",
            "short": "Mode for parsing entities in the message text",
            "type": "`$STRING`",
          },
          {
            "name": "protect_content",
            "short": "Protects the contents of the sent message from forwarding and saving",
            "type": "`$BOOLEAN`",
          },
          {
            "name": "question",
            "req": True,
            "type": "`$STRING`",
          },
          {
            "name": "reply_to_message_id",
            "short": "If the message is a reply, ID of the original message",
            "type": "`$INTEGER`",
          },
          {
            "name": "text",
            "req": True,
            "short": "Text of the message to be sent",
            "type": "`$STRING`",
          },
        ],
        "name": "message",
        "op": {
          "create": {
            "input": "data",
            "name": "create",
            "points": [
              {
                "args": {},
                "kind": "http",
                "method": "POST",
                "orig": "/forwardMessage",
                "segments": [
                  {
                    "lit": "forwardMessage",
                  },
                ],
                "select": {},
                "transform": {
                  "req": "`reqdata`",
                  "res": "`body`",
                },
                "parts": [
                  "forwardMessage",
                ],
              },
              {
                "args": {},
                "kind": "http",
                "method": "POST",
                "orig": "/sendAnimation",
                "segments": [
                  {
                    "lit": "sendAnimation",
                  },
                ],
                "select": {},
                "transform": {
                  "req": "`reqdata`",
                  "res": "`body`",
                },
                "parts": [
                  "sendAnimation",
                ],
              },
              {
                "args": {},
                "kind": "http",
                "method": "POST",
                "orig": "/sendAudio",
                "segments": [
                  {
                    "lit": "sendAudio",
                  },
                ],
                "select": {},
                "transform": {
                  "req": "`reqdata`",
                  "res": "`body`",
                },
                "parts": [
                  "sendAudio",
                ],
              },
              {
                "args": {},
                "kind": "http",
                "method": "POST",
                "orig": "/sendDocument",
                "segments": [
                  {
                    "lit": "sendDocument",
                  },
                ],
                "select": {},
                "transform": {
                  "req": "`reqdata`",
                  "res": "`body`",
                },
                "parts": [
                  "sendDocument",
                ],
              },
              {
                "args": {},
                "kind": "http",
                "method": "POST",
                "orig": "/sendLocation",
                "segments": [
                  {
                    "lit": "sendLocation",
                  },
                ],
                "select": {},
                "transform": {
                  "req": "`reqdata`",
                  "res": "`body`",
                },
                "parts": [
                  "sendLocation",
                ],
              },
              {
                "args": {},
                "kind": "http",
                "method": "POST",
                "orig": "/sendMessage",
                "segments": [
                  {
                    "lit": "sendMessage",
                  },
                ],
                "select": {},
                "transform": {
                  "req": "`reqdata`",
                  "res": "`body`",
                },
                "parts": [
                  "sendMessage",
                ],
              },
              {
                "args": {},
                "kind": "http",
                "method": "POST",
                "orig": "/sendPhoto",
                "segments": [
                  {
                    "lit": "sendPhoto",
                  },
                ],
                "select": {},
                "transform": {
                  "req": "`reqdata`",
                  "res": "`body`",
                },
                "parts": [
                  "sendPhoto",
                ],
              },
              {
                "args": {},
                "kind": "http",
                "method": "POST",
                "orig": "/sendPoll",
                "segments": [
                  {
                    "lit": "sendPoll",
                  },
                ],
                "select": {},
                "transform": {
                  "req": "`reqdata`",
                  "res": "`body`",
                },
                "parts": [
                  "sendPoll",
                ],
              },
              {
                "args": {},
                "kind": "http",
                "method": "POST",
                "orig": "/sendSticker",
                "segments": [
                  {
                    "lit": "sendSticker",
                  },
                ],
                "select": {},
                "transform": {
                  "req": "`reqdata`",
                  "res": "`body`",
                },
                "parts": [
                  "sendSticker",
                ],
              },
              {
                "args": {},
                "kind": "http",
                "method": "POST",
                "orig": "/sendVideo",
                "segments": [
                  {
                    "lit": "sendVideo",
                  },
                ],
                "select": {},
                "transform": {
                  "req": "`reqdata`",
                  "res": "`body`",
                },
                "parts": [
                  "sendVideo",
                ],
              },
            ],
          },
        },
        "relations": {
          "ancestors": [],
        },
      },
      "message_id": {
        "fields": [
          {
            "name": "chat_id",
            "req": True,
            "type": "`$STRING`",
            "union": {
              "branches": 2,
              "count": 1,
              "depth": 0,
            },
          },
          {
            "name": "direct_messages_topic_id",
            "type": "`$INTEGER`",
          },
          {
            "name": "from_chat_id",
            "req": True,
            "type": "`$STRING`",
            "union": {
              "branches": 2,
              "count": 1,
              "depth": 0,
            },
          },
          {
            "name": "message_effect_id",
            "type": "`$STRING`",
          },
          {
            "name": "message_id",
            "req": True,
            "type": "`$INTEGER`",
          },
          {
            "name": "message_thread_id",
            "type": "`$INTEGER`",
          },
        ],
        "name": "message_id",
        "op": {
          "create": {
            "input": "data",
            "name": "create",
            "points": [
              {
                "args": {},
                "kind": "http",
                "method": "POST",
                "orig": "/copyMessage",
                "segments": [
                  {
                    "lit": "copyMessage",
                  },
                ],
                "select": {},
                "transform": {
                  "req": {
                    "message_id": "`reqdata`",
                  },
                  "res": "`body`",
                },
                "parts": [
                  "copyMessage",
                ],
              },
            ],
          },
        },
        "relations": {
          "ancestors": [],
        },
      },
      "promote_chat_member": {
        "fields": [
          {
            "name": "can_delete_messages",
            "type": "`$BOOLEAN`",
          },
          {
            "name": "can_edit_messages",
            "type": "`$BOOLEAN`",
          },
          {
            "name": "can_manage_chat",
            "type": "`$BOOLEAN`",
          },
          {
            "name": "can_manage_direct_messages",
            "type": "`$BOOLEAN`",
          },
          {
            "name": "can_post_messages",
            "type": "`$BOOLEAN`",
          },
          {
            "name": "chat_id",
            "req": True,
            "type": "`$STRING`",
            "union": {
              "branches": 2,
              "count": 1,
              "depth": 0,
            },
          },
          {
            "name": "description",
            "short": "Human-readable description of the result",
            "type": "`$STRING`",
          },
          {
            "name": "error_code",
            "short": "Error code",
            "type": "`$INTEGER`",
          },
          {
            "name": "ok",
            "req": True,
            "short": "If true, the request was successful",
            "type": "`$BOOLEAN`",
          },
          {
            "name": "parameters",
            "type": "`$OBJECT`",
          },
          {
            "name": "result",
            "short": "The result of the query",
            "type": "`$ARRAY`",
          },
          {
            "name": "user_id",
            "req": True,
            "type": "`$INTEGER`",
          },
        ],
        "name": "promote_chat_member",
        "op": {
          "create": {
            "input": "data",
            "name": "create",
            "points": [
              {
                "args": {},
                "kind": "http",
                "method": "POST",
                "orig": "/promoteChatMember",
                "segments": [
                  {
                    "lit": "promoteChatMember",
                  },
                ],
                "select": {},
                "transform": {
                  "req": "`reqdata`",
                  "res": "`body`",
                },
                "parts": [
                  "promoteChatMember",
                ],
              },
            ],
          },
        },
        "relations": {
          "ancestors": [],
        },
      },
      "remove_my_profile_photo": {
        "fields": [
          {
            "name": "description",
            "short": "Human-readable description of the result",
            "type": "`$STRING`",
          },
          {
            "name": "error_code",
            "short": "Error code",
            "type": "`$INTEGER`",
          },
          {
            "name": "ok",
            "req": True,
            "short": "If true, the request was successful",
            "type": "`$BOOLEAN`",
          },
          {
            "name": "parameters",
            "type": "`$OBJECT`",
          },
          {
            "name": "result",
            "short": "The result of the query",
            "type": "`$ARRAY`",
          },
        ],
        "name": "remove_my_profile_photo",
        "op": {
          "create": {
            "input": "data",
            "name": "create",
            "points": [
              {
                "args": {},
                "kind": "http",
                "method": "POST",
                "orig": "/removeMyProfilePhoto",
                "segments": [
                  {
                    "lit": "removeMyProfilePhoto",
                  },
                ],
                "select": {},
                "transform": {
                  "req": "`reqdata`",
                  "res": "`body`",
                },
                "parts": [
                  "removeMyProfilePhoto",
                ],
              },
            ],
          },
        },
        "relations": {
          "ancestors": [],
        },
      },
      "repost_story": {
        "fields": [
          {
            "name": "chat_id",
            "req": True,
            "type": "`$STRING`",
            "union": {
              "branches": 2,
              "count": 1,
              "depth": 0,
            },
          },
          {
            "name": "description",
            "short": "Human-readable description of the result",
            "type": "`$STRING`",
          },
          {
            "name": "error_code",
            "short": "Error code",
            "type": "`$INTEGER`",
          },
          {
            "name": "ok",
            "req": True,
            "short": "If true, the request was successful",
            "type": "`$BOOLEAN`",
          },
          {
            "name": "parameters",
            "type": "`$OBJECT`",
          },
          {
            "name": "result",
            "short": "The result of the query",
            "type": "`$ARRAY`",
          },
          {
            "name": "story_id",
            "req": True,
            "type": "`$INTEGER`",
          },
        ],
        "name": "repost_story",
        "op": {
          "create": {
            "input": "data",
            "name": "create",
            "points": [
              {
                "args": {},
                "kind": "http",
                "method": "POST",
                "orig": "/repostStory",
                "segments": [
                  {
                    "lit": "repostStory",
                  },
                ],
                "select": {},
                "transform": {
                  "req": "`reqdata`",
                  "res": "`body`",
                },
                "parts": [
                  "repostStory",
                ],
              },
            ],
          },
        },
        "relations": {
          "ancestors": [],
        },
      },
      "send_chat_action": {
        "fields": [
          {
            "name": "action",
            "req": True,
            "type": "`$STRING`",
          },
          {
            "name": "chat_id",
            "req": True,
            "type": "`$STRING`",
            "union": {
              "branches": 2,
              "count": 1,
              "depth": 0,
            },
          },
          {
            "name": "description",
            "short": "Human-readable description of the result",
            "type": "`$STRING`",
          },
          {
            "name": "error_code",
            "short": "Error code",
            "type": "`$INTEGER`",
          },
          {
            "name": "message_thread_id",
            "type": "`$INTEGER`",
          },
          {
            "name": "ok",
            "req": True,
            "short": "If true, the request was successful",
            "type": "`$BOOLEAN`",
          },
          {
            "name": "parameters",
            "type": "`$OBJECT`",
          },
          {
            "name": "result",
            "short": "The result of the query",
            "type": "`$ARRAY`",
          },
        ],
        "name": "send_chat_action",
        "op": {
          "create": {
            "input": "data",
            "name": "create",
            "points": [
              {
                "args": {},
                "kind": "http",
                "method": "POST",
                "orig": "/sendChatAction",
                "segments": [
                  {
                    "lit": "sendChatAction",
                  },
                ],
                "select": {},
                "transform": {
                  "req": "`reqdata`",
                  "res": "`body`",
                },
                "parts": [
                  "sendChatAction",
                ],
              },
            ],
          },
        },
        "relations": {
          "ancestors": [],
        },
      },
      "send_message_draft": {
        "fields": [
          {
            "name": "chat_id",
            "req": True,
            "type": "`$STRING`",
            "union": {
              "branches": 2,
              "count": 1,
              "depth": 0,
            },
          },
          {
            "name": "description",
            "short": "Human-readable description of the result",
            "type": "`$STRING`",
          },
          {
            "name": "error_code",
            "short": "Error code",
            "type": "`$INTEGER`",
          },
          {
            "name": "message_thread_id",
            "type": "`$INTEGER`",
          },
          {
            "name": "ok",
            "req": True,
            "short": "If true, the request was successful",
            "type": "`$BOOLEAN`",
          },
          {
            "name": "parameters",
            "type": "`$OBJECT`",
          },
          {
            "name": "result",
            "short": "The result of the query",
            "type": "`$ARRAY`",
          },
          {
            "name": "text",
            "req": True,
            "type": "`$STRING`",
          },
        ],
        "name": "send_message_draft",
        "op": {
          "create": {
            "input": "data",
            "name": "create",
            "points": [
              {
                "args": {},
                "kind": "http",
                "method": "POST",
                "orig": "/sendMessageDraft",
                "segments": [
                  {
                    "lit": "sendMessageDraft",
                  },
                ],
                "select": {},
                "transform": {
                  "req": "`reqdata`",
                  "res": "`body`",
                },
                "parts": [
                  "sendMessageDraft",
                ],
              },
            ],
          },
        },
        "relations": {
          "ancestors": [],
        },
      },
      "set_my_profile_photo": {
        "fields": [
          {
            "name": "description",
            "short": "Human-readable description of the result",
            "type": "`$STRING`",
          },
          {
            "name": "error_code",
            "short": "Error code",
            "type": "`$INTEGER`",
          },
          {
            "name": "ok",
            "req": True,
            "short": "If true, the request was successful",
            "type": "`$BOOLEAN`",
          },
          {
            "name": "parameters",
            "type": "`$OBJECT`",
          },
          {
            "name": "result",
            "short": "The result of the query",
            "type": "`$ARRAY`",
          },
        ],
        "name": "set_my_profile_photo",
        "op": {
          "create": {
            "input": "data",
            "name": "create",
            "points": [
              {
                "args": {},
                "kind": "http",
                "method": "POST",
                "orig": "/setMyProfilePhoto",
                "segments": [
                  {
                    "lit": "setMyProfilePhoto",
                  },
                ],
                "select": {},
                "transform": {
                  "req": "`reqdata`",
                  "res": "`body`",
                },
                "parts": [
                  "setMyProfilePhoto",
                ],
              },
            ],
          },
        },
        "relations": {
          "ancestors": [],
        },
      },
      "unpin_all_forum_topic_message": {
        "fields": [
          {
            "name": "chat_id",
            "req": True,
            "type": "`$STRING`",
            "union": {
              "branches": 2,
              "count": 1,
              "depth": 0,
            },
          },
          {
            "name": "description",
            "short": "Human-readable description of the result",
            "type": "`$STRING`",
          },
          {
            "name": "error_code",
            "short": "Error code",
            "type": "`$INTEGER`",
          },
          {
            "name": "message_thread_id",
            "req": True,
            "type": "`$INTEGER`",
          },
          {
            "name": "ok",
            "req": True,
            "short": "If true, the request was successful",
            "type": "`$BOOLEAN`",
          },
          {
            "name": "parameters",
            "type": "`$OBJECT`",
          },
          {
            "name": "result",
            "short": "The result of the query",
            "type": "`$ARRAY`",
          },
        ],
        "name": "unpin_all_forum_topic_message",
        "op": {
          "create": {
            "input": "data",
            "name": "create",
            "points": [
              {
                "args": {},
                "kind": "http",
                "method": "POST",
                "orig": "/unpinAllForumTopicMessages",
                "segments": [
                  {
                    "lit": "unpinAllForumTopicMessages",
                  },
                ],
                "select": {},
                "transform": {
                  "req": "`reqdata`",
                  "res": "`body`",
                },
                "parts": [
                  "unpinAllForumTopicMessages",
                ],
              },
            ],
          },
        },
        "relations": {
          "ancestors": [],
        },
      },
      "update": {
        "fields": [
          {
            "name": "allowed_updates",
            "type": "`$ARRAY`",
          },
          {
            "name": "description",
            "short": "Human-readable description of the result",
            "type": "`$STRING`",
          },
          {
            "name": "error_code",
            "short": "Error code",
            "type": "`$INTEGER`",
          },
          {
            "name": "limit",
            "type": "`$INTEGER`",
          },
          {
            "name": "offset",
            "type": "`$INTEGER`",
          },
          {
            "name": "ok",
            "req": True,
            "short": "If true, the request was successful",
            "type": "`$BOOLEAN`",
          },
          {
            "name": "parameters",
            "type": "`$OBJECT`",
          },
          {
            "name": "result",
            "short": "The result of the query",
            "type": "`$ARRAY`",
          },
          {
            "name": "timeout",
            "type": "`$INTEGER`",
          },
        ],
        "name": "update",
        "op": {
          "create": {
            "input": "data",
            "name": "create",
            "points": [
              {
                "args": {},
                "kind": "http",
                "method": "POST",
                "orig": "/getUpdates",
                "segments": [
                  {
                    "lit": "getUpdates",
                  },
                ],
                "select": {},
                "transform": {
                  "req": "`reqdata`",
                  "res": "`body`",
                },
                "parts": [
                  "getUpdates",
                ],
              },
            ],
          },
          "list": {
            "input": "data",
            "name": "list",
            "points": [
              {
                "args": {
                  "query": [
                    {
                      "kind": "query",
                      "name": "allowed_update",
                      "orig": "allowed_update",
                      "type": "`$ARRAY`",
                    },
                    {
                      "example": 100,
                      "kind": "query",
                      "name": "limit",
                      "orig": "limit",
                      "type": "`$INTEGER`",
                    },
                    {
                      "kind": "query",
                      "name": "offset",
                      "orig": "offset",
                      "type": "`$INTEGER`",
                    },
                    {
                      "example": 0,
                      "kind": "query",
                      "name": "timeout",
                      "orig": "timeout",
                      "type": "`$INTEGER`",
                    },
                  ],
                },
                "kind": "http",
                "method": "GET",
                "orig": "/getUpdates",
                "segments": [
                  {
                    "lit": "getUpdates",
                  },
                ],
                "select": {
                  "exist": [
                    "allowed_update",
                    "limit",
                    "offset",
                    "timeout",
                  ],
                },
                "transform": {
                  "req": "`reqdata`",
                  "res": "`body`",
                },
                "parts": [
                  "getUpdates",
                ],
              },
            ],
          },
        },
        "relations": {
          "ancestors": [],
        },
      },
    },
    }
