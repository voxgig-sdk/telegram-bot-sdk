package core

import (
	"sync"
)

// MakeConfig builds a fresh, fully materialised config map. Every call
// rebuilds the whole structure, so prefer SharedConfig unless you need a
// private copy you intend to mutate.
func MakeConfig() map[string]any {
	return map[string]any{
		"main": map[string]any{
			"name": "TelegramBot",
			"slug": "telegram-bot",
			"version": "0.0.1",
			"target": "go",
		},
		"feature": map[string]any{
			"test": map[string]any{
				"options": map[string]any{
					"active": false,
				},
				"transport": "base",
			},
		},
		"options": map[string]any{
			"base": "https://api.telegram.org/bot{token}",
			"server": map[string]any{
				"token": "",
			},
			"auth": map[string]any{
				"prefix": "",
			},
			"headers": map[string]any{
				"content-type": "application/json",
			},
			"entity": map[string]any{
				"approve_suggested_post": map[string]any{},
				"decline_suggested_post": map[string]any{},
				"delete_forum_topic": map[string]any{},
				"edit_forum_topic": map[string]any{},
				"file": map[string]any{},
				"forum_topic": map[string]any{},
				"get_business_account_gift": map[string]any{},
				"get_chat_gift": map[string]any{},
				"get_me": map[string]any{},
				"get_user_gift": map[string]any{},
				"get_user_profile_audio": map[string]any{},
				"message": map[string]any{},
				"message_id": map[string]any{},
				"promote_chat_member": map[string]any{},
				"remove_my_profile_photo": map[string]any{},
				"repost_story": map[string]any{},
				"send_chat_action": map[string]any{},
				"send_message_draft": map[string]any{},
				"set_my_profile_photo": map[string]any{},
				"unpin_all_forum_topic_message": map[string]any{},
				"update": map[string]any{},
			},
		},
		"entity": map[string]any{
			"approve_suggested_post": map[string]any{
				"fields": []any{
					map[string]any{
						"name": "chat_id",
						"req": true,
						"type": "`$STRING`",
						"union": map[string]any{
							"branches": 2,
							"count": 1,
							"depth": 0,
						},
					},
					map[string]any{
						"name": "description",
						"short": "Human-readable description of the result",
						"type": "`$STRING`",
					},
					map[string]any{
						"name": "error_code",
						"short": "Error code",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "message_id",
						"req": true,
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "ok",
						"req": true,
						"short": "If true, the request was successful",
						"type": "`$BOOLEAN`",
					},
					map[string]any{
						"name": "parameters",
						"type": "`$OBJECT`",
					},
					map[string]any{
						"name": "result",
						"short": "The result of the query",
						"type": "`$ARRAY`",
					},
				},
				"name": "approve_suggested_post",
				"op": map[string]any{
					"create": map[string]any{
						"input": "data",
						"name": "create",
						"points": []any{
							map[string]any{
								"args": map[string]any{},
								"kind": "http",
								"method": "POST",
								"orig": "/approveSuggestedPost",
								"segments": []any{
									map[string]any{
										"lit": "approveSuggestedPost",
									},
								},
								"select": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body.parameters`",
								},
								"parts": []any{
									"approveSuggestedPost",
								},
							},
						},
					},
				},
				"relations": map[string]any{
					"ancestors": []any{},
				},
			},
			"decline_suggested_post": map[string]any{
				"fields": []any{
					map[string]any{
						"name": "chat_id",
						"req": true,
						"type": "`$STRING`",
						"union": map[string]any{
							"branches": 2,
							"count": 1,
							"depth": 0,
						},
					},
					map[string]any{
						"name": "description",
						"short": "Human-readable description of the result",
						"type": "`$STRING`",
					},
					map[string]any{
						"name": "error_code",
						"short": "Error code",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "message_id",
						"req": true,
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "ok",
						"req": true,
						"short": "If true, the request was successful",
						"type": "`$BOOLEAN`",
					},
					map[string]any{
						"name": "parameters",
						"type": "`$OBJECT`",
					},
					map[string]any{
						"name": "result",
						"short": "The result of the query",
						"type": "`$ARRAY`",
					},
				},
				"name": "decline_suggested_post",
				"op": map[string]any{
					"create": map[string]any{
						"input": "data",
						"name": "create",
						"points": []any{
							map[string]any{
								"args": map[string]any{},
								"kind": "http",
								"method": "POST",
								"orig": "/declineSuggestedPost",
								"segments": []any{
									map[string]any{
										"lit": "declineSuggestedPost",
									},
								},
								"select": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body.parameters`",
								},
								"parts": []any{
									"declineSuggestedPost",
								},
							},
						},
					},
				},
				"relations": map[string]any{
					"ancestors": []any{},
				},
			},
			"delete_forum_topic": map[string]any{
				"fields": []any{
					map[string]any{
						"name": "chat_id",
						"req": true,
						"type": "`$STRING`",
						"union": map[string]any{
							"branches": 2,
							"count": 1,
							"depth": 0,
						},
					},
					map[string]any{
						"name": "description",
						"short": "Human-readable description of the result",
						"type": "`$STRING`",
					},
					map[string]any{
						"name": "error_code",
						"short": "Error code",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "message_thread_id",
						"req": true,
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "ok",
						"req": true,
						"short": "If true, the request was successful",
						"type": "`$BOOLEAN`",
					},
					map[string]any{
						"name": "parameters",
						"type": "`$OBJECT`",
					},
					map[string]any{
						"name": "result",
						"short": "The result of the query",
						"type": "`$ARRAY`",
					},
				},
				"name": "delete_forum_topic",
				"op": map[string]any{
					"create": map[string]any{
						"input": "data",
						"name": "create",
						"points": []any{
							map[string]any{
								"args": map[string]any{},
								"kind": "http",
								"method": "POST",
								"orig": "/deleteForumTopic",
								"segments": []any{
									map[string]any{
										"lit": "deleteForumTopic",
									},
								},
								"select": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body.parameters`",
								},
								"parts": []any{
									"deleteForumTopic",
								},
							},
						},
					},
				},
				"relations": map[string]any{
					"ancestors": []any{},
				},
			},
			"edit_forum_topic": map[string]any{
				"fields": []any{
					map[string]any{
						"name": "chat_id",
						"req": true,
						"type": "`$STRING`",
						"union": map[string]any{
							"branches": 2,
							"count": 1,
							"depth": 0,
						},
					},
					map[string]any{
						"name": "description",
						"short": "Human-readable description of the result",
						"type": "`$STRING`",
					},
					map[string]any{
						"name": "error_code",
						"short": "Error code",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "icon_custom_emoji_id",
						"type": "`$STRING`",
					},
					map[string]any{
						"name": "message_thread_id",
						"req": true,
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "name",
						"type": "`$STRING`",
					},
					map[string]any{
						"name": "ok",
						"req": true,
						"short": "If true, the request was successful",
						"type": "`$BOOLEAN`",
					},
					map[string]any{
						"name": "parameters",
						"type": "`$OBJECT`",
					},
					map[string]any{
						"name": "result",
						"short": "The result of the query",
						"type": "`$ARRAY`",
					},
				},
				"name": "edit_forum_topic",
				"op": map[string]any{
					"create": map[string]any{
						"input": "data",
						"name": "create",
						"points": []any{
							map[string]any{
								"args": map[string]any{},
								"kind": "http",
								"method": "POST",
								"orig": "/editForumTopic",
								"segments": []any{
									map[string]any{
										"lit": "editForumTopic",
									},
								},
								"select": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body.parameters`",
								},
								"parts": []any{
									"editForumTopic",
								},
							},
						},
					},
				},
				"relations": map[string]any{
					"ancestors": []any{},
				},
			},
			"file": map[string]any{
				"fields": []any{
					map[string]any{
						"name": "file_id",
						"req": true,
						"type": "`$STRING`",
					},
				},
				"name": "file",
				"op": map[string]any{
					"create": map[string]any{
						"input": "data",
						"name": "create",
						"points": []any{
							map[string]any{
								"args": map[string]any{},
								"kind": "http",
								"method": "POST",
								"orig": "/getFile",
								"segments": []any{
									map[string]any{
										"lit": "getFile",
									},
								},
								"select": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"parts": []any{
									"getFile",
								},
							},
						},
					},
				},
				"relations": map[string]any{
					"ancestors": []any{},
				},
			},
			"forum_topic": map[string]any{
				"fields": []any{
					map[string]any{
						"name": "chat_id",
						"req": true,
						"type": "`$STRING`",
						"union": map[string]any{
							"branches": 2,
							"count": 1,
							"depth": 0,
						},
					},
					map[string]any{
						"name": "icon_color",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "icon_custom_emoji_id",
						"type": "`$STRING`",
					},
					map[string]any{
						"name": "name",
						"req": true,
						"type": "`$STRING`",
					},
				},
				"name": "forum_topic",
				"op": map[string]any{
					"create": map[string]any{
						"input": "data",
						"name": "create",
						"points": []any{
							map[string]any{
								"args": map[string]any{},
								"kind": "http",
								"method": "POST",
								"orig": "/createForumTopic",
								"segments": []any{
									map[string]any{
										"lit": "createForumTopic",
									},
								},
								"select": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"parts": []any{
									"createForumTopic",
								},
							},
						},
					},
				},
				"relations": map[string]any{
					"ancestors": []any{},
				},
			},
			"get_business_account_gift": map[string]any{
				"fields": []any{
					map[string]any{
						"name": "description",
						"short": "Human-readable description of the result",
						"type": "`$STRING`",
					},
					map[string]any{
						"name": "error_code",
						"short": "Error code",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "exclude_from_blockchain",
						"type": "`$BOOLEAN`",
					},
					map[string]any{
						"name": "exclude_limited_non_upgradable",
						"type": "`$BOOLEAN`",
					},
					map[string]any{
						"name": "exclude_limited_upgradable",
						"type": "`$BOOLEAN`",
					},
					map[string]any{
						"name": "ok",
						"req": true,
						"short": "If true, the request was successful",
						"type": "`$BOOLEAN`",
					},
					map[string]any{
						"name": "parameters",
						"type": "`$OBJECT`",
					},
					map[string]any{
						"name": "result",
						"short": "The result of the query",
						"type": "`$ARRAY`",
					},
				},
				"name": "get_business_account_gift",
				"op": map[string]any{
					"create": map[string]any{
						"input": "data",
						"name": "create",
						"points": []any{
							map[string]any{
								"args": map[string]any{},
								"kind": "http",
								"method": "POST",
								"orig": "/getBusinessAccountGifts",
								"segments": []any{
									map[string]any{
										"lit": "getBusinessAccountGifts",
									},
								},
								"select": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body.parameters`",
								},
								"parts": []any{
									"getBusinessAccountGifts",
								},
							},
						},
					},
				},
				"relations": map[string]any{
					"ancestors": []any{},
				},
			},
			"get_chat_gift": map[string]any{
				"fields": []any{
					map[string]any{
						"name": "chat_id",
						"req": true,
						"type": "`$STRING`",
						"union": map[string]any{
							"branches": 2,
							"count": 1,
							"depth": 0,
						},
					},
					map[string]any{
						"name": "description",
						"short": "Human-readable description of the result",
						"type": "`$STRING`",
					},
					map[string]any{
						"name": "error_code",
						"short": "Error code",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "ok",
						"req": true,
						"short": "If true, the request was successful",
						"type": "`$BOOLEAN`",
					},
					map[string]any{
						"name": "parameters",
						"type": "`$OBJECT`",
					},
					map[string]any{
						"name": "result",
						"short": "The result of the query",
						"type": "`$ARRAY`",
					},
				},
				"name": "get_chat_gift",
				"op": map[string]any{
					"create": map[string]any{
						"input": "data",
						"name": "create",
						"points": []any{
							map[string]any{
								"args": map[string]any{},
								"kind": "http",
								"method": "POST",
								"orig": "/getChatGifts",
								"segments": []any{
									map[string]any{
										"lit": "getChatGifts",
									},
								},
								"select": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body.parameters`",
								},
								"parts": []any{
									"getChatGifts",
								},
							},
						},
					},
				},
				"relations": map[string]any{
					"ancestors": []any{},
				},
			},
			"get_me": map[string]any{
				"fields": []any{
					map[string]any{
						"name": "description",
						"short": "Human-readable description of the result",
						"type": "`$STRING`",
					},
					map[string]any{
						"name": "error_code",
						"short": "Error code",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "ok",
						"req": true,
						"short": "If true, the request was successful",
						"type": "`$BOOLEAN`",
					},
					map[string]any{
						"name": "parameters",
						"type": "`$OBJECT`",
					},
					map[string]any{
						"name": "result",
						"short": "The result of the query",
						"type": "`$ARRAY`",
					},
				},
				"name": "get_me",
				"op": map[string]any{
					"create": map[string]any{
						"input": "data",
						"name": "create",
						"points": []any{
							map[string]any{
								"args": map[string]any{},
								"kind": "http",
								"method": "POST",
								"orig": "/getMe",
								"segments": []any{
									map[string]any{
										"lit": "getMe",
									},
								},
								"select": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body.parameters`",
								},
								"parts": []any{
									"getMe",
								},
							},
						},
					},
					"load": map[string]any{
						"input": "data",
						"name": "load",
						"points": []any{
							map[string]any{
								"args": map[string]any{},
								"kind": "http",
								"method": "GET",
								"orig": "/getMe",
								"segments": []any{
									map[string]any{
										"lit": "getMe",
									},
								},
								"select": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body.parameters`",
								},
								"parts": []any{
									"getMe",
								},
							},
						},
					},
				},
				"relations": map[string]any{
					"ancestors": []any{},
				},
			},
			"get_user_gift": map[string]any{
				"fields": []any{
					map[string]any{
						"name": "description",
						"short": "Human-readable description of the result",
						"type": "`$STRING`",
					},
					map[string]any{
						"name": "error_code",
						"short": "Error code",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "ok",
						"req": true,
						"short": "If true, the request was successful",
						"type": "`$BOOLEAN`",
					},
					map[string]any{
						"name": "parameters",
						"type": "`$OBJECT`",
					},
					map[string]any{
						"name": "result",
						"short": "The result of the query",
						"type": "`$ARRAY`",
					},
					map[string]any{
						"name": "user_id",
						"req": true,
						"type": "`$INTEGER`",
					},
				},
				"name": "get_user_gift",
				"op": map[string]any{
					"create": map[string]any{
						"input": "data",
						"name": "create",
						"points": []any{
							map[string]any{
								"args": map[string]any{},
								"kind": "http",
								"method": "POST",
								"orig": "/getUserGifts",
								"segments": []any{
									map[string]any{
										"lit": "getUserGifts",
									},
								},
								"select": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"parts": []any{
									"getUserGifts",
								},
							},
						},
					},
				},
				"relations": map[string]any{
					"ancestors": []any{},
				},
			},
			"get_user_profile_audio": map[string]any{
				"fields": []any{
					map[string]any{
						"name": "description",
						"short": "Human-readable description of the result",
						"type": "`$STRING`",
					},
					map[string]any{
						"name": "error_code",
						"short": "Error code",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "ok",
						"req": true,
						"short": "If true, the request was successful",
						"type": "`$BOOLEAN`",
					},
					map[string]any{
						"name": "parameters",
						"type": "`$OBJECT`",
					},
					map[string]any{
						"name": "result",
						"short": "The result of the query",
						"type": "`$ARRAY`",
					},
					map[string]any{
						"name": "user_id",
						"req": true,
						"type": "`$INTEGER`",
					},
				},
				"name": "get_user_profile_audio",
				"op": map[string]any{
					"create": map[string]any{
						"input": "data",
						"name": "create",
						"points": []any{
							map[string]any{
								"args": map[string]any{},
								"kind": "http",
								"method": "POST",
								"orig": "/getUserProfileAudios",
								"segments": []any{
									map[string]any{
										"lit": "getUserProfileAudios",
									},
								},
								"select": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"parts": []any{
									"getUserProfileAudios",
								},
							},
						},
					},
				},
				"relations": map[string]any{
					"ancestors": []any{},
				},
			},
			"message": map[string]any{
				"fields": []any{
					map[string]any{
						"name": "chat_id",
						"req": true,
						"short": "Unique identifier for the target chat or username",
						"type": "`$STRING`",
						"union": map[string]any{
							"branches": 2,
							"count": 1,
							"depth": 0,
						},
					},
					map[string]any{
						"name": "direct_messages_topic_id",
						"short": "Unique identifier for the target direct messages topic",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "disable_notification",
						"short": "Sends the message silently",
						"type": "`$BOOLEAN`",
					},
					map[string]any{
						"name": "disable_web_page_preview",
						"short": "Disables link previews for links in this message",
						"type": "`$BOOLEAN`",
					},
					map[string]any{
						"name": "from_chat_id",
						"req": true,
						"type": "`$STRING`",
						"union": map[string]any{
							"branches": 2,
							"count": 1,
							"depth": 0,
						},
					},
					map[string]any{
						"format": "float",
						"name": "latitude",
						"req": true,
						"type": "`$NUMBER`",
					},
					map[string]any{
						"format": "float",
						"name": "longitude",
						"req": true,
						"type": "`$NUMBER`",
					},
					map[string]any{
						"name": "message_effect_id",
						"short": "Unique identifier of the message effect to be added to the message",
						"type": "`$STRING`",
					},
					map[string]any{
						"name": "message_id",
						"req": true,
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "message_thread_id",
						"short": "Unique identifier for the target message thread (topic) of the forum",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "options",
						"req": true,
						"type": "`$ARRAY`",
					},
					map[string]any{
						"name": "parse_mode",
						"short": "Mode for parsing entities in the message text",
						"type": "`$STRING`",
					},
					map[string]any{
						"name": "protect_content",
						"short": "Protects the contents of the sent message from forwarding and saving",
						"type": "`$BOOLEAN`",
					},
					map[string]any{
						"name": "question",
						"req": true,
						"type": "`$STRING`",
					},
					map[string]any{
						"name": "reply_to_message_id",
						"short": "If the message is a reply, ID of the original message",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "text",
						"req": true,
						"short": "Text of the message to be sent",
						"type": "`$STRING`",
					},
				},
				"name": "message",
				"op": map[string]any{
					"create": map[string]any{
						"input": "data",
						"name": "create",
						"points": []any{
							map[string]any{
								"args": map[string]any{},
								"kind": "http",
								"method": "POST",
								"orig": "/forwardMessage",
								"segments": []any{
									map[string]any{
										"lit": "forwardMessage",
									},
								},
								"select": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"parts": []any{
									"forwardMessage",
								},
							},
							map[string]any{
								"args": map[string]any{},
								"kind": "http",
								"method": "POST",
								"orig": "/sendAnimation",
								"segments": []any{
									map[string]any{
										"lit": "sendAnimation",
									},
								},
								"select": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"parts": []any{
									"sendAnimation",
								},
							},
							map[string]any{
								"args": map[string]any{},
								"kind": "http",
								"method": "POST",
								"orig": "/sendAudio",
								"segments": []any{
									map[string]any{
										"lit": "sendAudio",
									},
								},
								"select": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"parts": []any{
									"sendAudio",
								},
							},
							map[string]any{
								"args": map[string]any{},
								"kind": "http",
								"method": "POST",
								"orig": "/sendDocument",
								"segments": []any{
									map[string]any{
										"lit": "sendDocument",
									},
								},
								"select": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"parts": []any{
									"sendDocument",
								},
							},
							map[string]any{
								"args": map[string]any{},
								"kind": "http",
								"method": "POST",
								"orig": "/sendLocation",
								"segments": []any{
									map[string]any{
										"lit": "sendLocation",
									},
								},
								"select": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"parts": []any{
									"sendLocation",
								},
							},
							map[string]any{
								"args": map[string]any{},
								"kind": "http",
								"method": "POST",
								"orig": "/sendMessage",
								"segments": []any{
									map[string]any{
										"lit": "sendMessage",
									},
								},
								"select": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"parts": []any{
									"sendMessage",
								},
							},
							map[string]any{
								"args": map[string]any{},
								"kind": "http",
								"method": "POST",
								"orig": "/sendPhoto",
								"segments": []any{
									map[string]any{
										"lit": "sendPhoto",
									},
								},
								"select": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"parts": []any{
									"sendPhoto",
								},
							},
							map[string]any{
								"args": map[string]any{},
								"kind": "http",
								"method": "POST",
								"orig": "/sendPoll",
								"segments": []any{
									map[string]any{
										"lit": "sendPoll",
									},
								},
								"select": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"parts": []any{
									"sendPoll",
								},
							},
							map[string]any{
								"args": map[string]any{},
								"kind": "http",
								"method": "POST",
								"orig": "/sendSticker",
								"segments": []any{
									map[string]any{
										"lit": "sendSticker",
									},
								},
								"select": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"parts": []any{
									"sendSticker",
								},
							},
							map[string]any{
								"args": map[string]any{},
								"kind": "http",
								"method": "POST",
								"orig": "/sendVideo",
								"segments": []any{
									map[string]any{
										"lit": "sendVideo",
									},
								},
								"select": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"parts": []any{
									"sendVideo",
								},
							},
						},
					},
				},
				"relations": map[string]any{
					"ancestors": []any{},
				},
			},
			"message_id": map[string]any{
				"fields": []any{
					map[string]any{
						"name": "chat_id",
						"req": true,
						"type": "`$STRING`",
						"union": map[string]any{
							"branches": 2,
							"count": 1,
							"depth": 0,
						},
					},
					map[string]any{
						"name": "direct_messages_topic_id",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "from_chat_id",
						"req": true,
						"type": "`$STRING`",
						"union": map[string]any{
							"branches": 2,
							"count": 1,
							"depth": 0,
						},
					},
					map[string]any{
						"name": "message_effect_id",
						"type": "`$STRING`",
					},
					map[string]any{
						"name": "message_id",
						"req": true,
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "message_thread_id",
						"type": "`$INTEGER`",
					},
				},
				"name": "message_id",
				"op": map[string]any{
					"create": map[string]any{
						"input": "data",
						"name": "create",
						"points": []any{
							map[string]any{
								"args": map[string]any{},
								"kind": "http",
								"method": "POST",
								"orig": "/copyMessage",
								"segments": []any{
									map[string]any{
										"lit": "copyMessage",
									},
								},
								"select": map[string]any{},
								"transform": map[string]any{
									"req": map[string]any{
										"message_id": "`reqdata`",
									},
									"res": "`body`",
								},
								"parts": []any{
									"copyMessage",
								},
							},
						},
					},
				},
				"relations": map[string]any{
					"ancestors": []any{},
				},
			},
			"promote_chat_member": map[string]any{
				"fields": []any{
					map[string]any{
						"name": "can_delete_messages",
						"type": "`$BOOLEAN`",
					},
					map[string]any{
						"name": "can_edit_messages",
						"type": "`$BOOLEAN`",
					},
					map[string]any{
						"name": "can_manage_chat",
						"type": "`$BOOLEAN`",
					},
					map[string]any{
						"name": "can_manage_direct_messages",
						"type": "`$BOOLEAN`",
					},
					map[string]any{
						"name": "can_post_messages",
						"type": "`$BOOLEAN`",
					},
					map[string]any{
						"name": "chat_id",
						"req": true,
						"type": "`$STRING`",
						"union": map[string]any{
							"branches": 2,
							"count": 1,
							"depth": 0,
						},
					},
					map[string]any{
						"name": "description",
						"short": "Human-readable description of the result",
						"type": "`$STRING`",
					},
					map[string]any{
						"name": "error_code",
						"short": "Error code",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "ok",
						"req": true,
						"short": "If true, the request was successful",
						"type": "`$BOOLEAN`",
					},
					map[string]any{
						"name": "parameters",
						"type": "`$OBJECT`",
					},
					map[string]any{
						"name": "result",
						"short": "The result of the query",
						"type": "`$ARRAY`",
					},
					map[string]any{
						"name": "user_id",
						"req": true,
						"type": "`$INTEGER`",
					},
				},
				"name": "promote_chat_member",
				"op": map[string]any{
					"create": map[string]any{
						"input": "data",
						"name": "create",
						"points": []any{
							map[string]any{
								"args": map[string]any{},
								"kind": "http",
								"method": "POST",
								"orig": "/promoteChatMember",
								"segments": []any{
									map[string]any{
										"lit": "promoteChatMember",
									},
								},
								"select": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"parts": []any{
									"promoteChatMember",
								},
							},
						},
					},
				},
				"relations": map[string]any{
					"ancestors": []any{},
				},
			},
			"remove_my_profile_photo": map[string]any{
				"fields": []any{
					map[string]any{
						"name": "description",
						"short": "Human-readable description of the result",
						"type": "`$STRING`",
					},
					map[string]any{
						"name": "error_code",
						"short": "Error code",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "ok",
						"req": true,
						"short": "If true, the request was successful",
						"type": "`$BOOLEAN`",
					},
					map[string]any{
						"name": "parameters",
						"type": "`$OBJECT`",
					},
					map[string]any{
						"name": "result",
						"short": "The result of the query",
						"type": "`$ARRAY`",
					},
				},
				"name": "remove_my_profile_photo",
				"op": map[string]any{
					"create": map[string]any{
						"input": "data",
						"name": "create",
						"points": []any{
							map[string]any{
								"args": map[string]any{},
								"kind": "http",
								"method": "POST",
								"orig": "/removeMyProfilePhoto",
								"segments": []any{
									map[string]any{
										"lit": "removeMyProfilePhoto",
									},
								},
								"select": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"parts": []any{
									"removeMyProfilePhoto",
								},
							},
						},
					},
				},
				"relations": map[string]any{
					"ancestors": []any{},
				},
			},
			"repost_story": map[string]any{
				"fields": []any{
					map[string]any{
						"name": "chat_id",
						"req": true,
						"type": "`$STRING`",
						"union": map[string]any{
							"branches": 2,
							"count": 1,
							"depth": 0,
						},
					},
					map[string]any{
						"name": "description",
						"short": "Human-readable description of the result",
						"type": "`$STRING`",
					},
					map[string]any{
						"name": "error_code",
						"short": "Error code",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "ok",
						"req": true,
						"short": "If true, the request was successful",
						"type": "`$BOOLEAN`",
					},
					map[string]any{
						"name": "parameters",
						"type": "`$OBJECT`",
					},
					map[string]any{
						"name": "result",
						"short": "The result of the query",
						"type": "`$ARRAY`",
					},
					map[string]any{
						"name": "story_id",
						"req": true,
						"type": "`$INTEGER`",
					},
				},
				"name": "repost_story",
				"op": map[string]any{
					"create": map[string]any{
						"input": "data",
						"name": "create",
						"points": []any{
							map[string]any{
								"args": map[string]any{},
								"kind": "http",
								"method": "POST",
								"orig": "/repostStory",
								"segments": []any{
									map[string]any{
										"lit": "repostStory",
									},
								},
								"select": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"parts": []any{
									"repostStory",
								},
							},
						},
					},
				},
				"relations": map[string]any{
					"ancestors": []any{},
				},
			},
			"send_chat_action": map[string]any{
				"fields": []any{
					map[string]any{
						"name": "action",
						"req": true,
						"type": "`$STRING`",
					},
					map[string]any{
						"name": "chat_id",
						"req": true,
						"type": "`$STRING`",
						"union": map[string]any{
							"branches": 2,
							"count": 1,
							"depth": 0,
						},
					},
					map[string]any{
						"name": "description",
						"short": "Human-readable description of the result",
						"type": "`$STRING`",
					},
					map[string]any{
						"name": "error_code",
						"short": "Error code",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "message_thread_id",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "ok",
						"req": true,
						"short": "If true, the request was successful",
						"type": "`$BOOLEAN`",
					},
					map[string]any{
						"name": "parameters",
						"type": "`$OBJECT`",
					},
					map[string]any{
						"name": "result",
						"short": "The result of the query",
						"type": "`$ARRAY`",
					},
				},
				"name": "send_chat_action",
				"op": map[string]any{
					"create": map[string]any{
						"input": "data",
						"name": "create",
						"points": []any{
							map[string]any{
								"args": map[string]any{},
								"kind": "http",
								"method": "POST",
								"orig": "/sendChatAction",
								"segments": []any{
									map[string]any{
										"lit": "sendChatAction",
									},
								},
								"select": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"parts": []any{
									"sendChatAction",
								},
							},
						},
					},
				},
				"relations": map[string]any{
					"ancestors": []any{},
				},
			},
			"send_message_draft": map[string]any{
				"fields": []any{
					map[string]any{
						"name": "chat_id",
						"req": true,
						"type": "`$STRING`",
						"union": map[string]any{
							"branches": 2,
							"count": 1,
							"depth": 0,
						},
					},
					map[string]any{
						"name": "description",
						"short": "Human-readable description of the result",
						"type": "`$STRING`",
					},
					map[string]any{
						"name": "error_code",
						"short": "Error code",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "message_thread_id",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "ok",
						"req": true,
						"short": "If true, the request was successful",
						"type": "`$BOOLEAN`",
					},
					map[string]any{
						"name": "parameters",
						"type": "`$OBJECT`",
					},
					map[string]any{
						"name": "result",
						"short": "The result of the query",
						"type": "`$ARRAY`",
					},
					map[string]any{
						"name": "text",
						"req": true,
						"type": "`$STRING`",
					},
				},
				"name": "send_message_draft",
				"op": map[string]any{
					"create": map[string]any{
						"input": "data",
						"name": "create",
						"points": []any{
							map[string]any{
								"args": map[string]any{},
								"kind": "http",
								"method": "POST",
								"orig": "/sendMessageDraft",
								"segments": []any{
									map[string]any{
										"lit": "sendMessageDraft",
									},
								},
								"select": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"parts": []any{
									"sendMessageDraft",
								},
							},
						},
					},
				},
				"relations": map[string]any{
					"ancestors": []any{},
				},
			},
			"set_my_profile_photo": map[string]any{
				"fields": []any{
					map[string]any{
						"name": "description",
						"short": "Human-readable description of the result",
						"type": "`$STRING`",
					},
					map[string]any{
						"name": "error_code",
						"short": "Error code",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "ok",
						"req": true,
						"short": "If true, the request was successful",
						"type": "`$BOOLEAN`",
					},
					map[string]any{
						"name": "parameters",
						"type": "`$OBJECT`",
					},
					map[string]any{
						"name": "result",
						"short": "The result of the query",
						"type": "`$ARRAY`",
					},
				},
				"name": "set_my_profile_photo",
				"op": map[string]any{
					"create": map[string]any{
						"input": "data",
						"name": "create",
						"points": []any{
							map[string]any{
								"args": map[string]any{},
								"kind": "http",
								"method": "POST",
								"orig": "/setMyProfilePhoto",
								"segments": []any{
									map[string]any{
										"lit": "setMyProfilePhoto",
									},
								},
								"select": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"parts": []any{
									"setMyProfilePhoto",
								},
							},
						},
					},
				},
				"relations": map[string]any{
					"ancestors": []any{},
				},
			},
			"unpin_all_forum_topic_message": map[string]any{
				"fields": []any{
					map[string]any{
						"name": "chat_id",
						"req": true,
						"type": "`$STRING`",
						"union": map[string]any{
							"branches": 2,
							"count": 1,
							"depth": 0,
						},
					},
					map[string]any{
						"name": "description",
						"short": "Human-readable description of the result",
						"type": "`$STRING`",
					},
					map[string]any{
						"name": "error_code",
						"short": "Error code",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "message_thread_id",
						"req": true,
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "ok",
						"req": true,
						"short": "If true, the request was successful",
						"type": "`$BOOLEAN`",
					},
					map[string]any{
						"name": "parameters",
						"type": "`$OBJECT`",
					},
					map[string]any{
						"name": "result",
						"short": "The result of the query",
						"type": "`$ARRAY`",
					},
				},
				"name": "unpin_all_forum_topic_message",
				"op": map[string]any{
					"create": map[string]any{
						"input": "data",
						"name": "create",
						"points": []any{
							map[string]any{
								"args": map[string]any{},
								"kind": "http",
								"method": "POST",
								"orig": "/unpinAllForumTopicMessages",
								"segments": []any{
									map[string]any{
										"lit": "unpinAllForumTopicMessages",
									},
								},
								"select": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"parts": []any{
									"unpinAllForumTopicMessages",
								},
							},
						},
					},
				},
				"relations": map[string]any{
					"ancestors": []any{},
				},
			},
			"update": map[string]any{
				"fields": []any{
					map[string]any{
						"name": "allowed_updates",
						"type": "`$ARRAY`",
					},
					map[string]any{
						"name": "description",
						"short": "Human-readable description of the result",
						"type": "`$STRING`",
					},
					map[string]any{
						"name": "error_code",
						"short": "Error code",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "limit",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "offset",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "ok",
						"req": true,
						"short": "If true, the request was successful",
						"type": "`$BOOLEAN`",
					},
					map[string]any{
						"name": "parameters",
						"type": "`$OBJECT`",
					},
					map[string]any{
						"name": "result",
						"short": "The result of the query",
						"type": "`$ARRAY`",
					},
					map[string]any{
						"name": "timeout",
						"type": "`$INTEGER`",
					},
				},
				"name": "update",
				"op": map[string]any{
					"create": map[string]any{
						"input": "data",
						"name": "create",
						"points": []any{
							map[string]any{
								"args": map[string]any{},
								"kind": "http",
								"method": "POST",
								"orig": "/getUpdates",
								"segments": []any{
									map[string]any{
										"lit": "getUpdates",
									},
								},
								"select": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"parts": []any{
									"getUpdates",
								},
							},
						},
					},
					"list": map[string]any{
						"input": "data",
						"name": "list",
						"points": []any{
							map[string]any{
								"args": map[string]any{
									"query": []any{
										map[string]any{
											"kind": "query",
											"name": "allowed_update",
											"orig": "allowed_update",
											"type": "`$ARRAY`",
										},
										map[string]any{
											"example": 100,
											"kind": "query",
											"name": "limit",
											"orig": "limit",
											"type": "`$INTEGER`",
										},
										map[string]any{
											"kind": "query",
											"name": "offset",
											"orig": "offset",
											"type": "`$INTEGER`",
										},
										map[string]any{
											"example": 0,
											"kind": "query",
											"name": "timeout",
											"orig": "timeout",
											"type": "`$INTEGER`",
										},
									},
								},
								"kind": "http",
								"method": "GET",
								"orig": "/getUpdates",
								"segments": []any{
									map[string]any{
										"lit": "getUpdates",
									},
								},
								"select": map[string]any{
									"exist": []any{
										"allowed_update",
										"limit",
										"offset",
										"timeout",
									},
								},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"parts": []any{
									"getUpdates",
								},
							},
						},
					},
				},
				"relations": map[string]any{
					"ancestors": []any{},
				},
			},
		},
	}
}

// The plugin definitions the model selected per feature, as []any so a
// feature package can consume them without core naming its types. Empty
// when no active feature declares active plugin groups for this target.
var featurePlugins = map[string][]any{
}

// FeaturePlugins is the definitions list for one feature's chain.
func FeaturePlugins(name string) []any {
	return featurePlugins[name]
}

var (
	sharedConfigOnce sync.Once
	sharedConfigVal  map[string]any
)

// SharedConfig returns the process-wide config, built once on first use.
// The SDK reads the config on every request and never writes to it, so one
// instance is shared by every client rather than rebuilt per client.
//
// The returned map is shared: treat it as read-only. Callers that need to
// mutate should use MakeConfig, which always returns a fresh copy.
func SharedConfig() map[string]any {
	sharedConfigOnce.Do(func() {
		sharedConfigVal = MakeConfig()
	})
	return sharedConfigVal
}

func makeFeature(name string) Feature {
	switch name {
	case "test":
		if NewTestFeatureFunc != nil {
			return NewTestFeatureFunc()
		}
	default:
		if NewBaseFeatureFunc != nil {
			return NewBaseFeatureFunc()
		}
	}
	return nil
}
