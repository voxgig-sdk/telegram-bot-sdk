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
			"ratelimit": map[string]any{
				"options": map[string]any{
					"active": false,
					"burst": 5,
					"rate": 5,
				},
				"optspec": map[string]any{
					"now": "`$FUNCTION`",
					"sleep": "`$FUNCTION`",
				},
				"strict": false,
				"transport": "wrap",
			},
			"retry": map[string]any{
				"options": map[string]any{
					"active": false,
					"factor": 2,
					"maxDelay": 2000,
					"minDelay": 50,
					"retries": 2,
					"statuses": []any{
						408,
						425,
						429,
						500,
						502,
						503,
						504,
					},
				},
				"optspec": map[string]any{
					"jitter": "`$BOOLEAN`",
					"sleep": "`$FUNCTION`",
				},
				"strict": false,
				"transport": "wrap",
			},
			"test": map[string]any{
				"options": map[string]any{
					"active": false,
				},
				"optspec": map[string]any{
					"entity": "`$MAP`",
					"net": "`$MAP`",
				},
				"strict": false,
				"transport": "base",
			},
			"timeout": map[string]any{
				"options": map[string]any{
					"active": false,
					"ms": 30000,
				},
				"optspec": map[string]any{
					"clearTimer": "`$FUNCTION`",
					"setTimer": "`$FUNCTION`",
				},
				"strict": false,
				"transport": "wrap",
			},
		},
		"options": map[string]any{
			"base": "https://api.telegram.org/bot{token}",
			"server": map[string]any{
				"token": "",
			},
			"auth": map[string]any{
				"prefix": "",
				"in": "path",
				"name": "token",
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
						"title": "Chat Id",
						"type": "`$STRING`",
						"req": true,
					},
					map[string]any{
						"name": "description",
						"title": "Description",
						"type": "`$STRING`",
						"short": "Human-readable description of the result",
					},
					map[string]any{
						"name": "error_code",
						"title": "Error Code",
						"type": "`$INTEGER`",
						"short": "Error code",
					},
					map[string]any{
						"name": "message_id",
						"title": "Message Id",
						"type": "`$INTEGER`",
						"req": true,
					},
					map[string]any{
						"name": "ok",
						"title": "Ok",
						"type": "`$BOOLEAN`",
						"req": true,
						"short": "If true, the request was successful",
					},
					map[string]any{
						"name": "parameters",
						"title": "Parameters",
						"type": "`$OBJECT`",
					},
					map[string]any{
						"name": "result",
						"title": "Result",
						"type": "`$ARRAY`",
						"short": "The result of the query",
					},
				},
				"name": "approve_suggested_post",
				"op": map[string]any{
					"create": map[string]any{
						"input": "data",
						"name": "create",
						"points": []any{
							map[string]any{
								"kind": "http",
								"method": "POST",
								"orig": "/approveSuggestedPost",
								"segments": []any{
									map[string]any{
										"lit": "approveSuggestedPost",
									},
								},
								"parts": []any{
									"approveSuggestedPost",
								},
								"rename": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"args": map[string]any{},
								"select": map[string]any{},
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
						"title": "Chat Id",
						"type": "`$STRING`",
						"req": true,
					},
					map[string]any{
						"name": "description",
						"title": "Description",
						"type": "`$STRING`",
						"short": "Human-readable description of the result",
					},
					map[string]any{
						"name": "error_code",
						"title": "Error Code",
						"type": "`$INTEGER`",
						"short": "Error code",
					},
					map[string]any{
						"name": "message_id",
						"title": "Message Id",
						"type": "`$INTEGER`",
						"req": true,
					},
					map[string]any{
						"name": "ok",
						"title": "Ok",
						"type": "`$BOOLEAN`",
						"req": true,
						"short": "If true, the request was successful",
					},
					map[string]any{
						"name": "parameters",
						"title": "Parameters",
						"type": "`$OBJECT`",
					},
					map[string]any{
						"name": "result",
						"title": "Result",
						"type": "`$ARRAY`",
						"short": "The result of the query",
					},
				},
				"name": "decline_suggested_post",
				"op": map[string]any{
					"create": map[string]any{
						"input": "data",
						"name": "create",
						"points": []any{
							map[string]any{
								"kind": "http",
								"method": "POST",
								"orig": "/declineSuggestedPost",
								"segments": []any{
									map[string]any{
										"lit": "declineSuggestedPost",
									},
								},
								"parts": []any{
									"declineSuggestedPost",
								},
								"rename": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"args": map[string]any{},
								"select": map[string]any{},
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
						"title": "Chat Id",
						"type": "`$STRING`",
						"req": true,
					},
					map[string]any{
						"name": "description",
						"title": "Description",
						"type": "`$STRING`",
						"short": "Human-readable description of the result",
					},
					map[string]any{
						"name": "error_code",
						"title": "Error Code",
						"type": "`$INTEGER`",
						"short": "Error code",
					},
					map[string]any{
						"name": "message_thread_id",
						"title": "Message Thread Id",
						"type": "`$INTEGER`",
						"req": true,
					},
					map[string]any{
						"name": "ok",
						"title": "Ok",
						"type": "`$BOOLEAN`",
						"req": true,
						"short": "If true, the request was successful",
					},
					map[string]any{
						"name": "parameters",
						"title": "Parameters",
						"type": "`$OBJECT`",
					},
					map[string]any{
						"name": "result",
						"title": "Result",
						"type": "`$ARRAY`",
						"short": "The result of the query",
					},
				},
				"name": "delete_forum_topic",
				"op": map[string]any{
					"create": map[string]any{
						"input": "data",
						"name": "create",
						"points": []any{
							map[string]any{
								"kind": "http",
								"method": "POST",
								"orig": "/deleteForumTopic",
								"segments": []any{
									map[string]any{
										"lit": "deleteForumTopic",
									},
								},
								"parts": []any{
									"deleteForumTopic",
								},
								"rename": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"args": map[string]any{},
								"select": map[string]any{},
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
						"title": "Chat Id",
						"type": "`$STRING`",
						"req": true,
					},
					map[string]any{
						"name": "description",
						"title": "Description",
						"type": "`$STRING`",
						"short": "Human-readable description of the result",
					},
					map[string]any{
						"name": "error_code",
						"title": "Error Code",
						"type": "`$INTEGER`",
						"short": "Error code",
					},
					map[string]any{
						"name": "icon_custom_emoji_id",
						"title": "Icon Custom Emoji Id",
						"type": "`$STRING`",
					},
					map[string]any{
						"name": "message_thread_id",
						"title": "Message Thread Id",
						"type": "`$INTEGER`",
						"req": true,
					},
					map[string]any{
						"name": "name",
						"title": "Name",
						"type": "`$STRING`",
					},
					map[string]any{
						"name": "ok",
						"title": "Ok",
						"type": "`$BOOLEAN`",
						"req": true,
						"short": "If true, the request was successful",
					},
					map[string]any{
						"name": "parameters",
						"title": "Parameters",
						"type": "`$OBJECT`",
					},
					map[string]any{
						"name": "result",
						"title": "Result",
						"type": "`$ARRAY`",
						"short": "The result of the query",
					},
				},
				"name": "edit_forum_topic",
				"op": map[string]any{
					"create": map[string]any{
						"input": "data",
						"name": "create",
						"points": []any{
							map[string]any{
								"kind": "http",
								"method": "POST",
								"orig": "/editForumTopic",
								"segments": []any{
									map[string]any{
										"lit": "editForumTopic",
									},
								},
								"parts": []any{
									"editForumTopic",
								},
								"rename": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"args": map[string]any{},
								"select": map[string]any{},
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
						"title": "File Id",
						"type": "`$STRING`",
						"req": true,
					},
				},
				"name": "file",
				"op": map[string]any{
					"create": map[string]any{
						"input": "data",
						"name": "create",
						"points": []any{
							map[string]any{
								"kind": "http",
								"method": "POST",
								"orig": "/getFile",
								"segments": []any{
									map[string]any{
										"lit": "getFile",
									},
								},
								"parts": []any{
									"getFile",
								},
								"rename": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"args": map[string]any{},
								"select": map[string]any{},
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
						"title": "Chat Id",
						"type": "`$STRING`",
						"req": true,
					},
					map[string]any{
						"name": "icon_color",
						"title": "Icon Color",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "icon_custom_emoji_id",
						"title": "Icon Custom Emoji Id",
						"type": "`$STRING`",
					},
					map[string]any{
						"name": "name",
						"title": "Name",
						"type": "`$STRING`",
						"req": true,
					},
				},
				"name": "forum_topic",
				"op": map[string]any{
					"create": map[string]any{
						"input": "data",
						"name": "create",
						"points": []any{
							map[string]any{
								"kind": "http",
								"method": "POST",
								"orig": "/createForumTopic",
								"segments": []any{
									map[string]any{
										"lit": "createForumTopic",
									},
								},
								"parts": []any{
									"createForumTopic",
								},
								"rename": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"args": map[string]any{},
								"select": map[string]any{},
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
						"title": "Description",
						"type": "`$STRING`",
						"short": "Human-readable description of the result",
					},
					map[string]any{
						"name": "error_code",
						"title": "Error Code",
						"type": "`$INTEGER`",
						"short": "Error code",
					},
					map[string]any{
						"name": "exclude_from_blockchain",
						"title": "Exclude From Blockchain",
						"type": "`$BOOLEAN`",
					},
					map[string]any{
						"name": "exclude_limited_non_upgradable",
						"title": "Exclude Limited Non Upgradable",
						"type": "`$BOOLEAN`",
					},
					map[string]any{
						"name": "exclude_limited_upgradable",
						"title": "Exclude Limited Upgradable",
						"type": "`$BOOLEAN`",
					},
					map[string]any{
						"name": "ok",
						"title": "Ok",
						"type": "`$BOOLEAN`",
						"req": true,
						"short": "If true, the request was successful",
					},
					map[string]any{
						"name": "parameters",
						"title": "Parameters",
						"type": "`$OBJECT`",
					},
					map[string]any{
						"name": "result",
						"title": "Result",
						"type": "`$ARRAY`",
						"short": "The result of the query",
					},
				},
				"name": "get_business_account_gift",
				"op": map[string]any{
					"create": map[string]any{
						"input": "data",
						"name": "create",
						"points": []any{
							map[string]any{
								"kind": "http",
								"method": "POST",
								"orig": "/getBusinessAccountGifts",
								"segments": []any{
									map[string]any{
										"lit": "getBusinessAccountGifts",
									},
								},
								"parts": []any{
									"getBusinessAccountGifts",
								},
								"rename": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"args": map[string]any{},
								"select": map[string]any{},
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
						"title": "Chat Id",
						"type": "`$STRING`",
						"req": true,
					},
					map[string]any{
						"name": "description",
						"title": "Description",
						"type": "`$STRING`",
						"short": "Human-readable description of the result",
					},
					map[string]any{
						"name": "error_code",
						"title": "Error Code",
						"type": "`$INTEGER`",
						"short": "Error code",
					},
					map[string]any{
						"name": "ok",
						"title": "Ok",
						"type": "`$BOOLEAN`",
						"req": true,
						"short": "If true, the request was successful",
					},
					map[string]any{
						"name": "parameters",
						"title": "Parameters",
						"type": "`$OBJECT`",
					},
					map[string]any{
						"name": "result",
						"title": "Result",
						"type": "`$ARRAY`",
						"short": "The result of the query",
					},
				},
				"name": "get_chat_gift",
				"op": map[string]any{
					"create": map[string]any{
						"input": "data",
						"name": "create",
						"points": []any{
							map[string]any{
								"kind": "http",
								"method": "POST",
								"orig": "/getChatGifts",
								"segments": []any{
									map[string]any{
										"lit": "getChatGifts",
									},
								},
								"parts": []any{
									"getChatGifts",
								},
								"rename": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"args": map[string]any{},
								"select": map[string]any{},
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
						"name": "business_connection",
						"title": "Business Connection",
						"type": "`$OBJECT`",
					},
					map[string]any{
						"name": "business_message",
						"title": "Business Message",
						"type": "`$OBJECT`",
						"req": true,
					},
					map[string]any{
						"name": "channel_post",
						"title": "Channel Post",
						"type": "`$OBJECT`",
						"req": true,
					},
					map[string]any{
						"name": "chosen_inline_result",
						"title": "Chosen Inline Result",
						"type": "`$OBJECT`",
						"req": true,
					},
					map[string]any{
						"name": "deleted_business_messages",
						"title": "Deleted Business Messages",
						"type": "`$OBJECT`",
					},
					map[string]any{
						"name": "description",
						"title": "Description",
						"type": "`$STRING`",
						"short": "Human-readable description of the result",
					},
					map[string]any{
						"name": "edited_business_message",
						"title": "Edited Business Message",
						"type": "`$OBJECT`",
						"req": true,
					},
					map[string]any{
						"name": "edited_channel_post",
						"title": "Edited Channel Post",
						"type": "`$OBJECT`",
						"req": true,
					},
					map[string]any{
						"name": "edited_message",
						"title": "Edited Message",
						"type": "`$OBJECT`",
						"req": true,
					},
					map[string]any{
						"name": "error_code",
						"title": "Error Code",
						"type": "`$INTEGER`",
						"short": "Error code",
					},
					map[string]any{
						"name": "inline_query",
						"title": "Inline Query",
						"type": "`$OBJECT`",
						"req": true,
					},
					map[string]any{
						"name": "message",
						"title": "Message",
						"type": "`$OBJECT`",
						"req": true,
					},
					map[string]any{
						"name": "message_reaction",
						"title": "Message Reaction",
						"type": "`$OBJECT`",
					},
					map[string]any{
						"name": "message_reaction_count",
						"title": "Message Reaction Count",
						"type": "`$OBJECT`",
					},
					map[string]any{
						"name": "ok",
						"title": "Ok",
						"type": "`$BOOLEAN`",
						"req": true,
						"short": "If true, the request was successful",
					},
					map[string]any{
						"name": "parameters",
						"title": "Parameters",
						"type": "`$OBJECT`",
					},
					map[string]any{
						"name": "result",
						"title": "Result",
						"type": "`$ARRAY`",
						"short": "The result of the query",
					},
					map[string]any{
						"name": "update_id",
						"title": "Update Id",
						"type": "`$INTEGER`",
						"req": true,
						"short": "The update's unique identifier",
					},
				},
				"name": "get_me",
				"op": map[string]any{
					"create": map[string]any{
						"input": "data",
						"name": "create",
						"points": []any{
							map[string]any{
								"kind": "http",
								"method": "POST",
								"orig": "/getMe",
								"segments": []any{
									map[string]any{
										"lit": "getMe",
									},
								},
								"parts": []any{
									"getMe",
								},
								"rename": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"args": map[string]any{},
								"select": map[string]any{},
							},
						},
					},
					"list": map[string]any{
						"input": "data",
						"name": "list",
						"points": []any{
							map[string]any{
								"kind": "http",
								"method": "GET",
								"orig": "/getMe",
								"segments": []any{
									map[string]any{
										"lit": "getMe",
									},
								},
								"parts": []any{
									"getMe",
								},
								"rename": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"args": map[string]any{},
								"select": map[string]any{},
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
						"title": "Description",
						"type": "`$STRING`",
						"short": "Human-readable description of the result",
					},
					map[string]any{
						"name": "error_code",
						"title": "Error Code",
						"type": "`$INTEGER`",
						"short": "Error code",
					},
					map[string]any{
						"name": "ok",
						"title": "Ok",
						"type": "`$BOOLEAN`",
						"req": true,
						"short": "If true, the request was successful",
					},
					map[string]any{
						"name": "parameters",
						"title": "Parameters",
						"type": "`$OBJECT`",
					},
					map[string]any{
						"name": "result",
						"title": "Result",
						"type": "`$ARRAY`",
						"short": "The result of the query",
					},
					map[string]any{
						"name": "user_id",
						"title": "User Id",
						"type": "`$INTEGER`",
						"req": true,
					},
				},
				"name": "get_user_gift",
				"op": map[string]any{
					"create": map[string]any{
						"input": "data",
						"name": "create",
						"points": []any{
							map[string]any{
								"kind": "http",
								"method": "POST",
								"orig": "/getUserGifts",
								"segments": []any{
									map[string]any{
										"lit": "getUserGifts",
									},
								},
								"parts": []any{
									"getUserGifts",
								},
								"rename": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"args": map[string]any{},
								"select": map[string]any{},
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
						"title": "Description",
						"type": "`$STRING`",
						"short": "Human-readable description of the result",
					},
					map[string]any{
						"name": "error_code",
						"title": "Error Code",
						"type": "`$INTEGER`",
						"short": "Error code",
					},
					map[string]any{
						"name": "ok",
						"title": "Ok",
						"type": "`$BOOLEAN`",
						"req": true,
						"short": "If true, the request was successful",
					},
					map[string]any{
						"name": "parameters",
						"title": "Parameters",
						"type": "`$OBJECT`",
					},
					map[string]any{
						"name": "result",
						"title": "Result",
						"type": "`$ARRAY`",
						"short": "The result of the query",
					},
					map[string]any{
						"name": "user_id",
						"title": "User Id",
						"type": "`$INTEGER`",
						"req": true,
					},
				},
				"name": "get_user_profile_audio",
				"op": map[string]any{
					"create": map[string]any{
						"input": "data",
						"name": "create",
						"points": []any{
							map[string]any{
								"kind": "http",
								"method": "POST",
								"orig": "/getUserProfileAudios",
								"segments": []any{
									map[string]any{
										"lit": "getUserProfileAudios",
									},
								},
								"parts": []any{
									"getUserProfileAudios",
								},
								"rename": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"args": map[string]any{},
								"select": map[string]any{},
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
						"title": "Chat Id",
						"type": "`$STRING`",
						"req": true,
						"short": "Unique identifier for the target chat or username",
					},
					map[string]any{
						"name": "direct_messages_topic_id",
						"title": "Direct Messages Topic Id",
						"type": "`$INTEGER`",
						"short": "Unique identifier for the target direct messages topic",
					},
					map[string]any{
						"name": "disable_notification",
						"title": "Disable Notification",
						"type": "`$BOOLEAN`",
						"short": "Sends the message silently",
					},
					map[string]any{
						"name": "disable_web_page_preview",
						"title": "Disable Web Page Preview",
						"type": "`$BOOLEAN`",
						"short": "Disables link previews for links in this message",
					},
					map[string]any{
						"name": "from_chat_id",
						"title": "From Chat Id",
						"type": "`$STRING`",
						"req": true,
					},
					map[string]any{
						"name": "latitude",
						"title": "Latitude",
						"type": "`$NUMBER`",
						"req": true,
						"format": "float",
					},
					map[string]any{
						"name": "longitude",
						"title": "Longitude",
						"type": "`$NUMBER`",
						"req": true,
						"format": "float",
					},
					map[string]any{
						"name": "message_effect_id",
						"title": "Message Effect Id",
						"type": "`$STRING`",
						"short": "Unique identifier of the message effect to be added to the message",
					},
					map[string]any{
						"name": "message_id",
						"title": "Message Id",
						"type": "`$INTEGER`",
						"req": true,
					},
					map[string]any{
						"name": "message_thread_id",
						"title": "Message Thread Id",
						"type": "`$INTEGER`",
						"short": "Unique identifier for the target message thread (topic) of the forum",
					},
					map[string]any{
						"name": "options",
						"title": "Options",
						"type": "`$ARRAY`",
						"req": true,
					},
					map[string]any{
						"name": "parse_mode",
						"title": "Parse Mode",
						"type": "`$STRING`",
						"short": "Mode for parsing entities in the message text",
					},
					map[string]any{
						"name": "protect_content",
						"title": "Protect Content",
						"type": "`$BOOLEAN`",
						"short": "Protects the contents of the sent message from forwarding and saving",
					},
					map[string]any{
						"name": "question",
						"title": "Question",
						"type": "`$STRING`",
						"req": true,
					},
					map[string]any{
						"name": "reply_to_message_id",
						"title": "Reply To Message Id",
						"type": "`$INTEGER`",
						"short": "If the message is a reply, ID of the original message",
					},
					map[string]any{
						"name": "text",
						"title": "Text",
						"type": "`$STRING`",
						"req": true,
						"short": "Text of the message to be sent",
					},
				},
				"name": "message",
				"op": map[string]any{
					"create": map[string]any{
						"input": "data",
						"name": "create",
						"points": []any{
							map[string]any{
								"kind": "http",
								"method": "POST",
								"orig": "/forwardMessage",
								"segments": []any{
									map[string]any{
										"lit": "forwardMessage",
									},
								},
								"parts": []any{
									"forwardMessage",
								},
								"rename": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"args": map[string]any{},
								"select": map[string]any{},
							},
							map[string]any{
								"kind": "http",
								"method": "POST",
								"orig": "/sendAnimation",
								"segments": []any{
									map[string]any{
										"lit": "sendAnimation",
									},
								},
								"parts": []any{
									"sendAnimation",
								},
								"rename": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"args": map[string]any{},
								"select": map[string]any{},
							},
							map[string]any{
								"kind": "http",
								"method": "POST",
								"orig": "/sendAudio",
								"segments": []any{
									map[string]any{
										"lit": "sendAudio",
									},
								},
								"parts": []any{
									"sendAudio",
								},
								"rename": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"args": map[string]any{},
								"select": map[string]any{},
							},
							map[string]any{
								"kind": "http",
								"method": "POST",
								"orig": "/sendDocument",
								"segments": []any{
									map[string]any{
										"lit": "sendDocument",
									},
								},
								"parts": []any{
									"sendDocument",
								},
								"rename": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"args": map[string]any{},
								"select": map[string]any{},
							},
							map[string]any{
								"kind": "http",
								"method": "POST",
								"orig": "/sendLocation",
								"segments": []any{
									map[string]any{
										"lit": "sendLocation",
									},
								},
								"parts": []any{
									"sendLocation",
								},
								"rename": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"args": map[string]any{},
								"select": map[string]any{},
							},
							map[string]any{
								"kind": "http",
								"method": "POST",
								"orig": "/sendMessage",
								"segments": []any{
									map[string]any{
										"lit": "sendMessage",
									},
								},
								"parts": []any{
									"sendMessage",
								},
								"rename": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"args": map[string]any{},
								"select": map[string]any{},
							},
							map[string]any{
								"kind": "http",
								"method": "POST",
								"orig": "/sendPhoto",
								"segments": []any{
									map[string]any{
										"lit": "sendPhoto",
									},
								},
								"parts": []any{
									"sendPhoto",
								},
								"rename": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"args": map[string]any{},
								"select": map[string]any{},
							},
							map[string]any{
								"kind": "http",
								"method": "POST",
								"orig": "/sendPoll",
								"segments": []any{
									map[string]any{
										"lit": "sendPoll",
									},
								},
								"parts": []any{
									"sendPoll",
								},
								"rename": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"args": map[string]any{},
								"select": map[string]any{},
							},
							map[string]any{
								"kind": "http",
								"method": "POST",
								"orig": "/sendSticker",
								"segments": []any{
									map[string]any{
										"lit": "sendSticker",
									},
								},
								"parts": []any{
									"sendSticker",
								},
								"rename": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"args": map[string]any{},
								"select": map[string]any{},
							},
							map[string]any{
								"kind": "http",
								"method": "POST",
								"orig": "/sendVideo",
								"segments": []any{
									map[string]any{
										"lit": "sendVideo",
									},
								},
								"parts": []any{
									"sendVideo",
								},
								"rename": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"args": map[string]any{},
								"select": map[string]any{},
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
						"title": "Chat Id",
						"type": "`$STRING`",
						"req": true,
					},
					map[string]any{
						"name": "direct_messages_topic_id",
						"title": "Direct Messages Topic Id",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "from_chat_id",
						"title": "From Chat Id",
						"type": "`$STRING`",
						"req": true,
					},
					map[string]any{
						"name": "message_effect_id",
						"title": "Message Effect Id",
						"type": "`$STRING`",
					},
					map[string]any{
						"name": "message_id",
						"title": "Message Id",
						"type": "`$INTEGER`",
						"req": true,
					},
					map[string]any{
						"name": "message_thread_id",
						"title": "Message Thread Id",
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
								"kind": "http",
								"method": "POST",
								"orig": "/copyMessage",
								"segments": []any{
									map[string]any{
										"lit": "copyMessage",
									},
								},
								"parts": []any{
									"copyMessage",
								},
								"rename": map[string]any{},
								"transform": map[string]any{
									"req": map[string]any{
										"message_id": "`reqdata`",
									},
									"res": "`body`",
								},
								"args": map[string]any{},
								"select": map[string]any{},
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
						"title": "Can Delete Messages",
						"type": "`$BOOLEAN`",
					},
					map[string]any{
						"name": "can_edit_messages",
						"title": "Can Edit Messages",
						"type": "`$BOOLEAN`",
					},
					map[string]any{
						"name": "can_manage_chat",
						"title": "Can Manage Chat",
						"type": "`$BOOLEAN`",
					},
					map[string]any{
						"name": "can_manage_direct_messages",
						"title": "Can Manage Direct Messages",
						"type": "`$BOOLEAN`",
					},
					map[string]any{
						"name": "can_post_messages",
						"title": "Can Post Messages",
						"type": "`$BOOLEAN`",
					},
					map[string]any{
						"name": "chat_id",
						"title": "Chat Id",
						"type": "`$STRING`",
						"req": true,
					},
					map[string]any{
						"name": "description",
						"title": "Description",
						"type": "`$STRING`",
						"short": "Human-readable description of the result",
					},
					map[string]any{
						"name": "error_code",
						"title": "Error Code",
						"type": "`$INTEGER`",
						"short": "Error code",
					},
					map[string]any{
						"name": "ok",
						"title": "Ok",
						"type": "`$BOOLEAN`",
						"req": true,
						"short": "If true, the request was successful",
					},
					map[string]any{
						"name": "parameters",
						"title": "Parameters",
						"type": "`$OBJECT`",
					},
					map[string]any{
						"name": "result",
						"title": "Result",
						"type": "`$ARRAY`",
						"short": "The result of the query",
					},
					map[string]any{
						"name": "user_id",
						"title": "User Id",
						"type": "`$INTEGER`",
						"req": true,
					},
				},
				"name": "promote_chat_member",
				"op": map[string]any{
					"create": map[string]any{
						"input": "data",
						"name": "create",
						"points": []any{
							map[string]any{
								"kind": "http",
								"method": "POST",
								"orig": "/promoteChatMember",
								"segments": []any{
									map[string]any{
										"lit": "promoteChatMember",
									},
								},
								"parts": []any{
									"promoteChatMember",
								},
								"rename": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"args": map[string]any{},
								"select": map[string]any{},
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
						"title": "Description",
						"type": "`$STRING`",
						"short": "Human-readable description of the result",
					},
					map[string]any{
						"name": "error_code",
						"title": "Error Code",
						"type": "`$INTEGER`",
						"short": "Error code",
					},
					map[string]any{
						"name": "ok",
						"title": "Ok",
						"type": "`$BOOLEAN`",
						"req": true,
						"short": "If true, the request was successful",
					},
					map[string]any{
						"name": "parameters",
						"title": "Parameters",
						"type": "`$OBJECT`",
					},
					map[string]any{
						"name": "result",
						"title": "Result",
						"type": "`$ARRAY`",
						"short": "The result of the query",
					},
				},
				"name": "remove_my_profile_photo",
				"op": map[string]any{
					"create": map[string]any{
						"input": "data",
						"name": "create",
						"points": []any{
							map[string]any{
								"kind": "http",
								"method": "POST",
								"orig": "/removeMyProfilePhoto",
								"segments": []any{
									map[string]any{
										"lit": "removeMyProfilePhoto",
									},
								},
								"parts": []any{
									"removeMyProfilePhoto",
								},
								"rename": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"args": map[string]any{},
								"select": map[string]any{},
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
						"title": "Chat Id",
						"type": "`$STRING`",
						"req": true,
					},
					map[string]any{
						"name": "description",
						"title": "Description",
						"type": "`$STRING`",
						"short": "Human-readable description of the result",
					},
					map[string]any{
						"name": "error_code",
						"title": "Error Code",
						"type": "`$INTEGER`",
						"short": "Error code",
					},
					map[string]any{
						"name": "ok",
						"title": "Ok",
						"type": "`$BOOLEAN`",
						"req": true,
						"short": "If true, the request was successful",
					},
					map[string]any{
						"name": "parameters",
						"title": "Parameters",
						"type": "`$OBJECT`",
					},
					map[string]any{
						"name": "result",
						"title": "Result",
						"type": "`$ARRAY`",
						"short": "The result of the query",
					},
					map[string]any{
						"name": "story_id",
						"title": "Story Id",
						"type": "`$INTEGER`",
						"req": true,
					},
				},
				"name": "repost_story",
				"op": map[string]any{
					"create": map[string]any{
						"input": "data",
						"name": "create",
						"points": []any{
							map[string]any{
								"kind": "http",
								"method": "POST",
								"orig": "/repostStory",
								"segments": []any{
									map[string]any{
										"lit": "repostStory",
									},
								},
								"parts": []any{
									"repostStory",
								},
								"rename": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"args": map[string]any{},
								"select": map[string]any{},
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
						"title": "Action",
						"type": "`$STRING`",
						"req": true,
					},
					map[string]any{
						"name": "chat_id",
						"title": "Chat Id",
						"type": "`$STRING`",
						"req": true,
					},
					map[string]any{
						"name": "description",
						"title": "Description",
						"type": "`$STRING`",
						"short": "Human-readable description of the result",
					},
					map[string]any{
						"name": "error_code",
						"title": "Error Code",
						"type": "`$INTEGER`",
						"short": "Error code",
					},
					map[string]any{
						"name": "message_thread_id",
						"title": "Message Thread Id",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "ok",
						"title": "Ok",
						"type": "`$BOOLEAN`",
						"req": true,
						"short": "If true, the request was successful",
					},
					map[string]any{
						"name": "parameters",
						"title": "Parameters",
						"type": "`$OBJECT`",
					},
					map[string]any{
						"name": "result",
						"title": "Result",
						"type": "`$ARRAY`",
						"short": "The result of the query",
					},
				},
				"name": "send_chat_action",
				"op": map[string]any{
					"create": map[string]any{
						"input": "data",
						"name": "create",
						"points": []any{
							map[string]any{
								"kind": "http",
								"method": "POST",
								"orig": "/sendChatAction",
								"segments": []any{
									map[string]any{
										"lit": "sendChatAction",
									},
								},
								"parts": []any{
									"sendChatAction",
								},
								"rename": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"args": map[string]any{},
								"select": map[string]any{},
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
						"title": "Chat Id",
						"type": "`$STRING`",
						"req": true,
					},
					map[string]any{
						"name": "description",
						"title": "Description",
						"type": "`$STRING`",
						"short": "Human-readable description of the result",
					},
					map[string]any{
						"name": "error_code",
						"title": "Error Code",
						"type": "`$INTEGER`",
						"short": "Error code",
					},
					map[string]any{
						"name": "message_thread_id",
						"title": "Message Thread Id",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "ok",
						"title": "Ok",
						"type": "`$BOOLEAN`",
						"req": true,
						"short": "If true, the request was successful",
					},
					map[string]any{
						"name": "parameters",
						"title": "Parameters",
						"type": "`$OBJECT`",
					},
					map[string]any{
						"name": "result",
						"title": "Result",
						"type": "`$ARRAY`",
						"short": "The result of the query",
					},
					map[string]any{
						"name": "text",
						"title": "Text",
						"type": "`$STRING`",
						"req": true,
					},
				},
				"name": "send_message_draft",
				"op": map[string]any{
					"create": map[string]any{
						"input": "data",
						"name": "create",
						"points": []any{
							map[string]any{
								"kind": "http",
								"method": "POST",
								"orig": "/sendMessageDraft",
								"segments": []any{
									map[string]any{
										"lit": "sendMessageDraft",
									},
								},
								"parts": []any{
									"sendMessageDraft",
								},
								"rename": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"args": map[string]any{},
								"select": map[string]any{},
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
						"title": "Description",
						"type": "`$STRING`",
						"short": "Human-readable description of the result",
					},
					map[string]any{
						"name": "error_code",
						"title": "Error Code",
						"type": "`$INTEGER`",
						"short": "Error code",
					},
					map[string]any{
						"name": "ok",
						"title": "Ok",
						"type": "`$BOOLEAN`",
						"req": true,
						"short": "If true, the request was successful",
					},
					map[string]any{
						"name": "parameters",
						"title": "Parameters",
						"type": "`$OBJECT`",
					},
					map[string]any{
						"name": "result",
						"title": "Result",
						"type": "`$ARRAY`",
						"short": "The result of the query",
					},
				},
				"name": "set_my_profile_photo",
				"op": map[string]any{
					"create": map[string]any{
						"input": "data",
						"name": "create",
						"points": []any{
							map[string]any{
								"kind": "http",
								"method": "POST",
								"orig": "/setMyProfilePhoto",
								"segments": []any{
									map[string]any{
										"lit": "setMyProfilePhoto",
									},
								},
								"parts": []any{
									"setMyProfilePhoto",
								},
								"rename": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"args": map[string]any{},
								"select": map[string]any{},
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
						"title": "Chat Id",
						"type": "`$STRING`",
						"req": true,
					},
					map[string]any{
						"name": "description",
						"title": "Description",
						"type": "`$STRING`",
						"short": "Human-readable description of the result",
					},
					map[string]any{
						"name": "error_code",
						"title": "Error Code",
						"type": "`$INTEGER`",
						"short": "Error code",
					},
					map[string]any{
						"name": "message_thread_id",
						"title": "Message Thread Id",
						"type": "`$INTEGER`",
						"req": true,
					},
					map[string]any{
						"name": "ok",
						"title": "Ok",
						"type": "`$BOOLEAN`",
						"req": true,
						"short": "If true, the request was successful",
					},
					map[string]any{
						"name": "parameters",
						"title": "Parameters",
						"type": "`$OBJECT`",
					},
					map[string]any{
						"name": "result",
						"title": "Result",
						"type": "`$ARRAY`",
						"short": "The result of the query",
					},
				},
				"name": "unpin_all_forum_topic_message",
				"op": map[string]any{
					"create": map[string]any{
						"input": "data",
						"name": "create",
						"points": []any{
							map[string]any{
								"kind": "http",
								"method": "POST",
								"orig": "/unpinAllForumTopicMessages",
								"segments": []any{
									map[string]any{
										"lit": "unpinAllForumTopicMessages",
									},
								},
								"parts": []any{
									"unpinAllForumTopicMessages",
								},
								"rename": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"args": map[string]any{},
								"select": map[string]any{},
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
						"title": "Allowed Updates",
						"type": "`$ARRAY`",
					},
					map[string]any{
						"name": "description",
						"title": "Description",
						"type": "`$STRING`",
						"short": "Human-readable description of the result",
					},
					map[string]any{
						"name": "error_code",
						"title": "Error Code",
						"type": "`$INTEGER`",
						"short": "Error code",
					},
					map[string]any{
						"name": "limit",
						"title": "Limit",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "offset",
						"title": "Offset",
						"type": "`$INTEGER`",
					},
					map[string]any{
						"name": "ok",
						"title": "Ok",
						"type": "`$BOOLEAN`",
						"req": true,
						"short": "If true, the request was successful",
					},
					map[string]any{
						"name": "parameters",
						"title": "Parameters",
						"type": "`$OBJECT`",
					},
					map[string]any{
						"name": "result",
						"title": "Result",
						"type": "`$ARRAY`",
						"short": "The result of the query",
					},
					map[string]any{
						"name": "timeout",
						"title": "Timeout",
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
								"kind": "http",
								"method": "POST",
								"orig": "/getUpdates",
								"segments": []any{
									map[string]any{
										"lit": "getUpdates",
									},
								},
								"parts": []any{
									"getUpdates",
								},
								"rename": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"args": map[string]any{},
								"select": map[string]any{},
							},
						},
					},
					"list": map[string]any{
						"input": "data",
						"name": "list",
						"points": []any{
							map[string]any{
								"kind": "http",
								"method": "GET",
								"orig": "/getUpdates",
								"segments": []any{
									map[string]any{
										"lit": "getUpdates",
									},
								},
								"parts": []any{
									"getUpdates",
								},
								"rename": map[string]any{},
								"transform": map[string]any{
									"req": "`reqdata`",
									"res": "`body`",
								},
								"args": map[string]any{
									"query": []any{
										map[string]any{
											"name": "allowed_update",
											"orig": "allowed_update",
											"type": "`$ARRAY`",
											"kind": "query",
										},
										map[string]any{
											"name": "limit",
											"orig": "limit",
											"type": "`$INTEGER`",
											"kind": "query",
											"example": 100,
										},
										map[string]any{
											"name": "offset",
											"orig": "offset",
											"type": "`$INTEGER`",
											"kind": "query",
										},
										map[string]any{
											"name": "timeout",
											"orig": "timeout",
											"type": "`$INTEGER`",
											"kind": "query",
											"example": 0,
										},
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
	case "ratelimit":
		if NewRatelimitFeatureFunc != nil {
			return NewRatelimitFeatureFunc()
		}
	case "retry":
		if NewRetryFeatureFunc != nil {
			return NewRetryFeatureFunc()
		}
	case "test":
		if NewTestFeatureFunc != nil {
			return NewTestFeatureFunc()
		}
	case "timeout":
		if NewTimeoutFeatureFunc != nil {
			return NewTimeoutFeatureFunc()
		}
	default:
		if NewBaseFeatureFunc != nil {
			return NewBaseFeatureFunc()
		}
	}
	return nil
}
