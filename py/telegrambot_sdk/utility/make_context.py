# TelegramBot SDK utility: make_context

from telegrambot_sdk.core.context import TelegramBotContext


def make_context_util(ctxmap, basectx):
    return TelegramBotContext(ctxmap, basectx)
