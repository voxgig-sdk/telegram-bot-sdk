<?php
declare(strict_types=1);

// TelegramBot SDK feature factory

require_once __DIR__ . '/feature/BaseFeature.php';
require_once __DIR__ . '/feature/TestFeature.php';


class TelegramBotFeatures
{
    public static function make_feature(string $name)
    {
        switch ($name) {
            case "base":
                return new TelegramBotBaseFeature();
            case "test":
                return new TelegramBotTestFeature();
            default:
                return new TelegramBotBaseFeature();
        }
    }
}
