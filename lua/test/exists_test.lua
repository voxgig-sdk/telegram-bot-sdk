-- ProjectName SDK exists test

local sdk = require("telegram-bot_sdk")

describe("TelegramBotSDK", function()
  it("should create test SDK", function()
    local testsdk = sdk.test(nil, nil)
    assert.is_not_nil(testsdk)
  end)
end)
