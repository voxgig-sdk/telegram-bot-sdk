# TelegramBot SDK feature factory

require_relative 'feature/base_feature'
require_relative 'feature/ratelimit_feature'
require_relative 'feature/retry_feature'
require_relative 'feature/test_feature'
require_relative 'feature/timeout_feature'


module TelegramBotFeatures
  def self.make_feature(name)
    case name
    when "base"
      TelegramBotBaseFeature.new
    when "ratelimit"
      TelegramBotRatelimitFeature.new
    when "retry"
      TelegramBotRetryFeature.new
    when "test"
      TelegramBotTestFeature.new
    when "timeout"
      TelegramBotTimeoutFeature.new
    else
      TelegramBotBaseFeature.new
    end
  end
end
