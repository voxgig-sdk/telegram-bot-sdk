<?php
declare(strict_types=1);

// GetBusinessAccountGift entity test

require_once __DIR__ . '/../telegrambot_sdk.php';
require_once __DIR__ . '/Runner.php';

use PHPUnit\Framework\TestCase;
use Voxgig\Struct\Struct as Vs;

class GetBusinessAccountGiftEntityTest extends TestCase
{
    public function test_create_instance(): void
    {
        $testsdk = TelegramBotSDK::test(null, null);
        $ent = $testsdk->GetBusinessAccountGift(null);
        $this->assertNotNull($ent);
    }

    public function test_basic_flow(): void
    {
        $setup = get_business_account_gift_basic_setup(null);
        // Per-op sdk-test-control.json skip.
        $_live = !empty($setup["live"]);
        foreach (["create"] as $_op) {
            [$_shouldSkip, $_reason] = Runner::is_control_skipped("entityOp", "get_business_account_gift." . $_op, $_live ? "live" : "unit");
            if ($_shouldSkip) {
                $this->markTestSkipped($_reason ?? "skipped via sdk-test-control.json");
                return;
            }
        }
        // The basic flow consumes synthetic IDs from the fixture. In live mode
        // without an *_ENTID env override, those IDs hit the live API and 4xx.
        if (!empty($setup["synthetic_only"])) {
            $this->markTestSkipped("live entity test uses synthetic IDs from fixture — set TELEGRAMBOT_TEST_GET_BUSINESS_ACCOUNT_GIFT_ENTID JSON to run live");
            return;
        }
        $client = $setup["client"];

        // CREATE
        $get_business_account_gift_ref01_ent = $client->GetBusinessAccountGift(null);
        $get_business_account_gift_ref01_data = Helpers::to_map(Vs::getprop(
            Vs::getpath($setup["data"], "new.get_business_account_gift"), "get_business_account_gift_ref01"));

        [$get_business_account_gift_ref01_data_result, $err] = $get_business_account_gift_ref01_ent->create($get_business_account_gift_ref01_data, null);
        $this->assertNull($err);
        $get_business_account_gift_ref01_data = Helpers::to_map($get_business_account_gift_ref01_data_result);
        $this->assertNotNull($get_business_account_gift_ref01_data);

    }
}

function get_business_account_gift_basic_setup($extra)
{
    Runner::load_env_local();

    $entity_data_file = __DIR__ . '/../../.sdk/test/entity/get_business_account_gift/GetBusinessAccountGiftTestData.json';
    $entity_data_source = file_get_contents($entity_data_file);
    $entity_data = json_decode($entity_data_source, true);

    $options = [];
    $options["entity"] = $entity_data["existing"];

    $client = TelegramBotSDK::test($options, $extra);

    // Generate idmap.
    $idmap = [];
    foreach (["get_business_account_gift01", "get_business_account_gift02", "get_business_account_gift03"] as $k) {
        $idmap[$k] = strtoupper($k);
    }

    // Detect ENTID env override before envOverride consumes it. When live
    // mode is on without a real override, the basic test runs against synthetic
    // IDs from the fixture and 4xx's. Surface this so the test can skip.
    $entid_env_raw = getenv("TELEGRAMBOT_TEST_GET_BUSINESS_ACCOUNT_GIFT_ENTID");
    $idmap_overridden = $entid_env_raw !== false && str_starts_with(trim($entid_env_raw), "{");

    $env = Runner::env_override([
        "TELEGRAMBOT_TEST_GET_BUSINESS_ACCOUNT_GIFT_ENTID" => $idmap,
        "TELEGRAMBOT_TEST_LIVE" => "FALSE",
        "TELEGRAMBOT_TEST_EXPLAIN" => "FALSE",
        "TELEGRAMBOT_APIKEY" => "NONE",
    ]);

    $idmap_resolved = Helpers::to_map(
        $env["TELEGRAMBOT_TEST_GET_BUSINESS_ACCOUNT_GIFT_ENTID"]);
    if ($idmap_resolved === null) {
        $idmap_resolved = Helpers::to_map($idmap);
    }

    if ($env["TELEGRAMBOT_TEST_LIVE"] === "TRUE") {
        $merged_opts = Vs::merge([
            [
                "apikey" => $env["TELEGRAMBOT_APIKEY"],
            ],
            $extra ?? [],
        ]);
        $client = new TelegramBotSDK(Helpers::to_map($merged_opts));
    }

    $live = $env["TELEGRAMBOT_TEST_LIVE"] === "TRUE";
    return [
        "client" => $client,
        "data" => $entity_data,
        "idmap" => $idmap_resolved,
        "env" => $env,
        "explain" => $env["TELEGRAMBOT_TEST_EXPLAIN"] === "TRUE",
        "live" => $live,
        "synthetic_only" => $live && !$idmap_overridden,
        "now" => (int)(microtime(true) * 1000),
    ];
}
