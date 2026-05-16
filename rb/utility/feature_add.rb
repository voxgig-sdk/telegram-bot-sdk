# TelegramBot SDK utility: feature_add
module TelegramBotUtilities
  FeatureAdd = ->(ctx, f) {
    ctx.client.features << f
  }
end
