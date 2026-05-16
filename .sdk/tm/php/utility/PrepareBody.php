<?php
declare(strict_types=1);

// TelegramBot SDK utility: prepare_body

class TelegramBotPrepareBody
{
    public static function call(TelegramBotContext $ctx): mixed
    {
        if ($ctx->op->input === 'data') {
            return ($ctx->utility->transform_request)($ctx);
        }
        return null;
    }
}
