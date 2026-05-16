<?php
declare(strict_types=1);

// TelegramBot SDK utility: result_body

class TelegramBotResultBody
{
    public static function call(TelegramBotContext $ctx): ?TelegramBotResult
    {
        $response = $ctx->response;
        $result = $ctx->result;
        if ($result && $response && $response->json_func && $response->body) {
            $result->body = ($response->json_func)();
        }
        return $result;
    }
}
