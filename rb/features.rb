# TelegramBot SDK feature factory

require_relative 'feature/base_feature'
require_relative 'feature/test_feature'


module TelegramBotFeatures
  def self.make_feature(name)
    case name
    when "base"
      TelegramBotBaseFeature.new
    when "test"
      TelegramBotTestFeature.new
    else
      TelegramBotBaseFeature.new
    end
  end
end
