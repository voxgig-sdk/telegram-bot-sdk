<?php
declare(strict_types=1);

// TelegramBot SDK utility: result_headers

class TelegramBotResultHeaders
{
    public static function call(TelegramBotContext $ctx): ?TelegramBotResult
    {
        $response = $ctx->response;
        $result = $ctx->result;
        if ($result) {
            if ($response && is_array($response->headers)) {
                $result->headers = $response->headers;
            } else {
                $result->headers = [];
            }
        }
        return $result;
    }
}
