<?php
declare(strict_types=1);

// TelegramBot SDK utility: feature_add

class TelegramBotFeatureAdd
{
    public static function call(TelegramBotContext $ctx, mixed $f): void
    {
        $ctx->client->features[] = $f;
    }
}
