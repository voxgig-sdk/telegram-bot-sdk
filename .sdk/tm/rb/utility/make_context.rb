# TelegramBot SDK utility: make_context
require_relative '../core/context'
module TelegramBotUtilities
  MakeContext = ->(ctxmap, basectx) {
    TelegramBotContext.new(ctxmap, basectx)
  }
end
