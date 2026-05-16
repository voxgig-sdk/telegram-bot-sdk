# ProjectName SDK exists test

import pytest
from telegrambot_sdk import TelegramBotSDK


class TestExists:

    def test_should_create_test_sdk(self):
        testsdk = TelegramBotSDK.test(None, None)
        assert testsdk is not None
