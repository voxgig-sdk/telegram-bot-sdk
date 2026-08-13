<?php
declare(strict_types=1);

// SetMyProfilePhoto entity test

require_once __DIR__ . '/../telegrambot_sdk.php';
require_once __DIR__ . '/Runner.php';

use PHPUnit\Framework\TestCase;
use Voxgig\Struct\Struct as Vs;

class SetMyProfilePhotoEntityTest extends TestCase
{
    public function test_create_instance(): void
    {
        $testsdk = TelegramBotSDK::test(null, null);
        $ent = $testsdk->SetMyProfilePhoto(null);
        $this->assertNotNull($ent);
    }

    public function test_basic_flow(): void
    {
        $setup = set_my_profile_photo_basic_setup(null);
        // Per-op sdk-test-control.json skip.
        $_live = !empty($setup["live"]);
        foreach (["create"] as $_op) {
            [$_shouldSkip, $_reason] = Runner::is_control_skipped("entityOp", "set_my_profile_photo." . $_op, $_live ? "live" : "unit");
            if ($_shouldSkip) {
                $this->markTestSkipped($_reason ?? "skipped via sdk-test-control.json");
                return;
            }
        }
        // The basic flow consumes synthetic IDs from the fixture. In live mode
        // without an *_ENTID env override, those IDs hit the live API and 4xx.
        if (!empty($setup["synthetic_only"])) {
            $this->markTestSkipped("live entity test uses synthetic IDs from fixture — set TELEGRAM_BOT_TEST_SET_MY_PROFILE_PHOTO_ENTID JSON to run live");
            return;
        }
        $client = $setup["client"];

        // CREATE
        $set_my_profile_photo_ref01_ent = $client->SetMyProfilePhoto(null);
        $set_my_profile_photo_ref01_data = Helpers::to_map(Vs::getprop(
            Vs::getpath($setup["data"], "new.set_my_profile_photo"), "set_my_profile_photo_ref01"));

        $set_my_profile_photo_ref01_data_result = $set_my_profile_photo_ref01_ent->create($set_my_profile_photo_ref01_data, null);
        $set_my_profile_photo_ref01_data = Helpers::to_map(is_object($set_my_profile_photo_ref01_data_result) && method_exists($set_my_profile_photo_ref01_data_result, 'data_get') ? $set_my_profile_photo_ref01_data_result->data_get() : $set_my_profile_photo_ref01_data_result);
        $this->assertNotNull($set_my_profile_photo_ref01_data);

    }
}

function set_my_profile_photo_basic_setup($extra)
{
    Runner::load_env_local();

    $entity_data_file = __DIR__ . '/../../.sdk/test/entity/set_my_profile_photo/SetMyProfilePhotoTestData.json';
    $entity_data_source = file_get_contents($entity_data_file);
    $entity_data = json_decode($entity_data_source, true);

    $options = [];
    $options["entity"] = $entity_data["existing"];

    $client = TelegramBotSDK::test($options, $extra);

    // Generate idmap.
    $idmap = [];
    foreach (["set_my_profile_photo01", "set_my_profile_photo02", "set_my_profile_photo03"] as $k) {
        $idmap[$k] = strtoupper($k);
    }

    // Detect ENTID env override before envOverride consumes it. When live
    // mode is on without a real override, the basic test runs against synthetic
    // IDs from the fixture and 4xx's. Surface this so the test can skip.
    $entid_env_raw = getenv("TELEGRAM_BOT_TEST_SET_MY_PROFILE_PHOTO_ENTID");
    $idmap_overridden = $entid_env_raw !== false && str_starts_with(trim($entid_env_raw), "{");

    $env = Runner::env_override([
        "TELEGRAM_BOT_TEST_SET_MY_PROFILE_PHOTO_ENTID" => $idmap,
        "TELEGRAM_BOT_TEST_LIVE" => "FALSE",
        "TELEGRAM_BOT_TEST_EXPLAIN" => "FALSE",
        "TELEGRAM_BOT_APIKEY" => "NONE",
    ]);

    $idmap_resolved = Helpers::to_map(
        $env["TELEGRAM_BOT_TEST_SET_MY_PROFILE_PHOTO_ENTID"]);
    if ($idmap_resolved === null) {
        $idmap_resolved = Helpers::to_map($idmap);
    }

    if ($env["TELEGRAM_BOT_TEST_LIVE"] === "TRUE") {
        $merged_opts = Vs::merge([
            [
                "apikey" => $env["TELEGRAM_BOT_APIKEY"],
            ],
            $extra ?? [],
        ]);
        $client = new TelegramBotSDK(Helpers::to_map($merged_opts));
    }

    $live = $env["TELEGRAM_BOT_TEST_LIVE"] === "TRUE";
    return [
        "client" => $client,
        "data" => $entity_data,
        "idmap" => $idmap_resolved,
        "env" => $env,
        "explain" => $env["TELEGRAM_BOT_TEST_EXPLAIN"] === "TRUE",
        "live" => $live,
        "synthetic_only" => $live && !$idmap_overridden,
        "now" => (int)(microtime(true) * 1000),
    ];
}
