package voxgigtelegrambotsdk

import (
	"github.com/voxgig-sdk/telegram-bot-sdk/core"
	"github.com/voxgig-sdk/telegram-bot-sdk/entity"
	"github.com/voxgig-sdk/telegram-bot-sdk/feature"
	_ "github.com/voxgig-sdk/telegram-bot-sdk/utility"
)

// Type aliases preserve external API.
type TelegramBotSDK = core.TelegramBotSDK
type Context = core.Context
type Utility = core.Utility
type Feature = core.Feature
type Entity = core.Entity
type TelegramBotEntity = core.TelegramBotEntity
type FetcherFunc = core.FetcherFunc
type Spec = core.Spec
type Result = core.Result
type Response = core.Response
type Operation = core.Operation
type Control = core.Control
type TelegramBotError = core.TelegramBotError

// BaseFeature from feature package.
type BaseFeature = feature.BaseFeature

func init() {
	core.NewBaseFeatureFunc = func() core.Feature {
		return feature.NewBaseFeature()
	}
	core.NewTestFeatureFunc = func() core.Feature {
		return feature.NewTestFeature()
	}
	core.NewApproveSuggestedPostEntityFunc = func(client *core.TelegramBotSDK, entopts map[string]any) core.TelegramBotEntity {
		return entity.NewApproveSuggestedPostEntity(client, entopts)
	}
	core.NewDeclineSuggestedPostEntityFunc = func(client *core.TelegramBotSDK, entopts map[string]any) core.TelegramBotEntity {
		return entity.NewDeclineSuggestedPostEntity(client, entopts)
	}
	core.NewDeleteForumTopicEntityFunc = func(client *core.TelegramBotSDK, entopts map[string]any) core.TelegramBotEntity {
		return entity.NewDeleteForumTopicEntity(client, entopts)
	}
	core.NewEditForumTopicEntityFunc = func(client *core.TelegramBotSDK, entopts map[string]any) core.TelegramBotEntity {
		return entity.NewEditForumTopicEntity(client, entopts)
	}
	core.NewFileEntityFunc = func(client *core.TelegramBotSDK, entopts map[string]any) core.TelegramBotEntity {
		return entity.NewFileEntity(client, entopts)
	}
	core.NewForumTopicEntityFunc = func(client *core.TelegramBotSDK, entopts map[string]any) core.TelegramBotEntity {
		return entity.NewForumTopicEntity(client, entopts)
	}
	core.NewGetBusinessAccountGiftEntityFunc = func(client *core.TelegramBotSDK, entopts map[string]any) core.TelegramBotEntity {
		return entity.NewGetBusinessAccountGiftEntity(client, entopts)
	}
	core.NewGetChatGiftEntityFunc = func(client *core.TelegramBotSDK, entopts map[string]any) core.TelegramBotEntity {
		return entity.NewGetChatGiftEntity(client, entopts)
	}
	core.NewGetMeEntityFunc = func(client *core.TelegramBotSDK, entopts map[string]any) core.TelegramBotEntity {
		return entity.NewGetMeEntity(client, entopts)
	}
	core.NewGetUserGiftEntityFunc = func(client *core.TelegramBotSDK, entopts map[string]any) core.TelegramBotEntity {
		return entity.NewGetUserGiftEntity(client, entopts)
	}
	core.NewGetUserProfileAudioEntityFunc = func(client *core.TelegramBotSDK, entopts map[string]any) core.TelegramBotEntity {
		return entity.NewGetUserProfileAudioEntity(client, entopts)
	}
	core.NewMessageEntityFunc = func(client *core.TelegramBotSDK, entopts map[string]any) core.TelegramBotEntity {
		return entity.NewMessageEntity(client, entopts)
	}
	core.NewMessageIdEntityFunc = func(client *core.TelegramBotSDK, entopts map[string]any) core.TelegramBotEntity {
		return entity.NewMessageIdEntity(client, entopts)
	}
	core.NewPromoteChatMemberEntityFunc = func(client *core.TelegramBotSDK, entopts map[string]any) core.TelegramBotEntity {
		return entity.NewPromoteChatMemberEntity(client, entopts)
	}
	core.NewRemoveMyProfilePhotoEntityFunc = func(client *core.TelegramBotSDK, entopts map[string]any) core.TelegramBotEntity {
		return entity.NewRemoveMyProfilePhotoEntity(client, entopts)
	}
	core.NewRepostStoryEntityFunc = func(client *core.TelegramBotSDK, entopts map[string]any) core.TelegramBotEntity {
		return entity.NewRepostStoryEntity(client, entopts)
	}
	core.NewSendChatActionEntityFunc = func(client *core.TelegramBotSDK, entopts map[string]any) core.TelegramBotEntity {
		return entity.NewSendChatActionEntity(client, entopts)
	}
	core.NewSendMessageDraftEntityFunc = func(client *core.TelegramBotSDK, entopts map[string]any) core.TelegramBotEntity {
		return entity.NewSendMessageDraftEntity(client, entopts)
	}
	core.NewSetMyProfilePhotoEntityFunc = func(client *core.TelegramBotSDK, entopts map[string]any) core.TelegramBotEntity {
		return entity.NewSetMyProfilePhotoEntity(client, entopts)
	}
	core.NewUnpinAllForumTopicMessageEntityFunc = func(client *core.TelegramBotSDK, entopts map[string]any) core.TelegramBotEntity {
		return entity.NewUnpinAllForumTopicMessageEntity(client, entopts)
	}
	core.NewUpdateEntityFunc = func(client *core.TelegramBotSDK, entopts map[string]any) core.TelegramBotEntity {
		return entity.NewUpdateEntity(client, entopts)
	}
}

// Constructor re-exports.
var NewTelegramBotSDK = core.NewTelegramBotSDK
var TestSDK = core.TestSDK
var NewContext = core.NewContext
var NewSpec = core.NewSpec
var NewResult = core.NewResult
var NewResponse = core.NewResponse
var NewOperation = core.NewOperation
var MakeConfig = core.MakeConfig
var NewBaseFeature = feature.NewBaseFeature
var NewTestFeature = feature.NewTestFeature
