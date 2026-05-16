package core

var UtilityRegistrar func(u *Utility)

var NewBaseFeatureFunc func() Feature

var NewTestFeatureFunc func() Feature

var NewApproveSuggestedPostEntityFunc func(client *TelegramBotSDK, entopts map[string]any) TelegramBotEntity

var NewDeclineSuggestedPostEntityFunc func(client *TelegramBotSDK, entopts map[string]any) TelegramBotEntity

var NewDeleteForumTopicEntityFunc func(client *TelegramBotSDK, entopts map[string]any) TelegramBotEntity

var NewEditForumTopicEntityFunc func(client *TelegramBotSDK, entopts map[string]any) TelegramBotEntity

var NewFileEntityFunc func(client *TelegramBotSDK, entopts map[string]any) TelegramBotEntity

var NewForumTopicEntityFunc func(client *TelegramBotSDK, entopts map[string]any) TelegramBotEntity

var NewGetBusinessAccountGiftEntityFunc func(client *TelegramBotSDK, entopts map[string]any) TelegramBotEntity

var NewGetChatGiftEntityFunc func(client *TelegramBotSDK, entopts map[string]any) TelegramBotEntity

var NewGetMeEntityFunc func(client *TelegramBotSDK, entopts map[string]any) TelegramBotEntity

var NewGetUserGiftEntityFunc func(client *TelegramBotSDK, entopts map[string]any) TelegramBotEntity

var NewGetUserProfileAudioEntityFunc func(client *TelegramBotSDK, entopts map[string]any) TelegramBotEntity

var NewMessageEntityFunc func(client *TelegramBotSDK, entopts map[string]any) TelegramBotEntity

var NewMessageIdEntityFunc func(client *TelegramBotSDK, entopts map[string]any) TelegramBotEntity

var NewPromoteChatMemberEntityFunc func(client *TelegramBotSDK, entopts map[string]any) TelegramBotEntity

var NewRemoveMyProfilePhotoEntityFunc func(client *TelegramBotSDK, entopts map[string]any) TelegramBotEntity

var NewRepostStoryEntityFunc func(client *TelegramBotSDK, entopts map[string]any) TelegramBotEntity

var NewSendChatActionEntityFunc func(client *TelegramBotSDK, entopts map[string]any) TelegramBotEntity

var NewSendMessageDraftEntityFunc func(client *TelegramBotSDK, entopts map[string]any) TelegramBotEntity

var NewSetMyProfilePhotoEntityFunc func(client *TelegramBotSDK, entopts map[string]any) TelegramBotEntity

var NewUnpinAllForumTopicMessageEntityFunc func(client *TelegramBotSDK, entopts map[string]any) TelegramBotEntity

var NewUpdateEntityFunc func(client *TelegramBotSDK, entopts map[string]any) TelegramBotEntity

