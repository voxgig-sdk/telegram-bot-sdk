<?php
declare(strict_types=1);

// TelegramBot SDK utility: make_context

require_once __DIR__ . '/../core/Context.php';

class TelegramBotMakeContext
{
    public static function call(array $ctxmap, ?TelegramBotContext $basectx): TelegramBotContext
    {
        return new TelegramBotContext($ctxmap, $basectx);
    }
}
