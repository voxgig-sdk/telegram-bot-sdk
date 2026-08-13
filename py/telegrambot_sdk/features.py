# TelegramBot SDK feature factory

from telegrambot_sdk.feature.base_feature import TelegramBotBaseFeature
from telegrambot_sdk.feature.test_feature import TelegramBotTestFeature


def _make_feature(name):
    features = {
        "base": lambda: TelegramBotBaseFeature(),
        "test": lambda: TelegramBotTestFeature(),
    }
    factory = features.get(name)
    if factory is not None:
        return factory()
    return features["base"]()
