# TelegramBot SDK feature factory

from telegrambot_sdk.feature.base_feature import TelegramBotBaseFeature
from telegrambot_sdk.feature.ratelimit_feature import TelegramBotRatelimitFeature
from telegrambot_sdk.feature.retry_feature import TelegramBotRetryFeature
from telegrambot_sdk.feature.test_feature import TelegramBotTestFeature
from telegrambot_sdk.feature.timeout_feature import TelegramBotTimeoutFeature


_FEATURES = {
    "base": lambda: TelegramBotBaseFeature(),
    "ratelimit": lambda: TelegramBotRatelimitFeature(),
    "retry": lambda: TelegramBotRetryFeature(),
    "test": lambda: TelegramBotTestFeature(),
    "timeout": lambda: TelegramBotTimeoutFeature(),
}


def _make_feature(name):
    factory = _FEATURES.get(name)
    if factory is not None:
        return factory()
    return _FEATURES["base"]()


# True when this SDK was generated with the named feature class - the
# constructor's tolerance for extend-carried features reads this (an
# active name with no generated class must not become a BaseFeature
# stray when an extend instance carries it).
def _has_feature(name):
    return name in _FEATURES
