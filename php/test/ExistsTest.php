<?php
declare(strict_types=1);

// TelegramBot SDK exists test

require_once __DIR__ . '/../telegrambot_sdk.php';

use PHPUnit\Framework\TestCase;

class ExistsTest extends TestCase
{
    public function test_create_test_sdk(): void
    {
        $testsdk = TelegramBotSDK::test(null, null);
        $this->assertNotNull($testsdk);
    }
}
