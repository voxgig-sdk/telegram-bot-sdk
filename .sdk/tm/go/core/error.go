package core

type TelegramBotError struct {
	IsTelegramBotError bool
	Sdk              string
	Code             string
	Msg              string
	Ctx              *Context
	Result           any
	Spec             any
}

func NewTelegramBotError(code string, msg string, ctx *Context) *TelegramBotError {
	return &TelegramBotError{
		IsTelegramBotError: true,
		Sdk:              "TelegramBot",
		Code:             code,
		Msg:              msg,
		Ctx:              ctx,
	}
}

func (e *TelegramBotError) Error() string {
	return e.Msg
}
