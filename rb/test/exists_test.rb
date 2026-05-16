# TelegramBot SDK exists test

require "minitest/autorun"
require_relative "../TelegramBot_sdk"

class ExistsTest < Minitest::Test
  def test_create_test_sdk
    testsdk = TelegramBotSDK.test(nil, nil)
    assert !testsdk.nil?
  end
end
