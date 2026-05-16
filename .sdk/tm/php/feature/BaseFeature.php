<?php
declare(strict_types=1);

// TelegramBot SDK base feature

class TelegramBotBaseFeature
{
    public string $version;
    public string $name;
    public bool $active;

    public function __construct()
    {
        $this->version = '0.0.1';
        $this->name = 'base';
        $this->active = true;
    }

    public function get_version(): string { return $this->version; }
    public function get_name(): string { return $this->name; }
    public function get_active(): bool { return $this->active; }

    public function init(TelegramBotContext $ctx, array $options): void {}
    public function PostConstruct(TelegramBotContext $ctx): void {}
    public function PostConstructEntity(TelegramBotContext $ctx): void {}
    public function SetData(TelegramBotContext $ctx): void {}
    public function GetData(TelegramBotContext $ctx): void {}
    public function GetMatch(TelegramBotContext $ctx): void {}
    public function SetMatch(TelegramBotContext $ctx): void {}
    public function PrePoint(TelegramBotContext $ctx): void {}
    public function PreSpec(TelegramBotContext $ctx): void {}
    public function PreRequest(TelegramBotContext $ctx): void {}
    public function PreResponse(TelegramBotContext $ctx): void {}
    public function PreResult(TelegramBotContext $ctx): void {}
    public function PreDone(TelegramBotContext $ctx): void {}
    public function PreUnexpected(TelegramBotContext $ctx): void {}
}
