# ApproveSuggestedPost entity test

require "minitest/autorun"
require "json"
require_relative "../TelegramBot_sdk"
require_relative "runner"

class ApproveSuggestedPostEntityTest < Minitest::Test
  def test_create_instance
    testsdk = TelegramBotSDK.test(nil, nil)
    ent = testsdk.ApproveSuggestedPost(nil)
    assert !ent.nil?
  end

  def test_basic_flow
    setup = approve_suggested_post_basic_setup(nil)
    # Per-op sdk-test-control.json skip.
    _live = setup[:live] || false
    ["create"].each do |_op|
      _should_skip, _reason = Runner.is_control_skipped("entityOp", "approve_suggested_post." + _op, _live ? "live" : "unit")
      if _should_skip
        skip(_reason || "skipped via sdk-test-control.json")
        return
      end
    end
    # The basic flow consumes synthetic IDs from the fixture. In live mode
    # without an *_ENTID env override, those IDs hit the live API and 4xx.
    if setup[:synthetic_only]
      skip "live entity test uses synthetic IDs from fixture — set TELEGRAMBOT_TEST_APPROVE_SUGGESTED_POST_ENTID JSON to run live"
      return
    end
    client = setup[:client]

    # CREATE
    approve_suggested_post_ref01_ent = client.ApproveSuggestedPost(nil)
    approve_suggested_post_ref01_data = Helpers.to_map(Vs.getprop(
      Vs.getpath(setup[:data], "new.approve_suggested_post"), "approve_suggested_post_ref01"))

    approve_suggested_post_ref01_data_result, err = approve_suggested_post_ref01_ent.create(approve_suggested_post_ref01_data, nil)
    assert_nil err
    approve_suggested_post_ref01_data = Helpers.to_map(approve_suggested_post_ref01_data_result)
    assert !approve_suggested_post_ref01_data.nil?

  end
end

def approve_suggested_post_basic_setup(extra)
  Runner.load_env_local

  entity_data_file = File.join(__dir__, "..", "..", ".sdk", "test", "entity", "approve_suggested_post", "ApproveSuggestedPostTestData.json")
  entity_data_source = File.read(entity_data_file)
  entity_data = JSON.parse(entity_data_source)

  options = {}
  options["entity"] = entity_data["existing"]

  client = TelegramBotSDK.test(options, extra)

  # Generate idmap via transform.
  idmap = Vs.transform(
    ["approve_suggested_post01", "approve_suggested_post02", "approve_suggested_post03"],
    {
      "`$PACK`" => ["", {
        "`$KEY`" => "`$COPY`",
        "`$VAL`" => ["`$FORMAT`", "upper", "`$COPY`"],
      }],
    }
  )

  # Detect ENTID env override before envOverride consumes it. When live
  # mode is on without a real override, the basic test runs against synthetic
  # IDs from the fixture and 4xx's. Surface this so the test can skip.
  entid_env_raw = ENV["TELEGRAMBOT_TEST_APPROVE_SUGGESTED_POST_ENTID"]
  idmap_overridden = !entid_env_raw.nil? && entid_env_raw.strip.start_with?("{")

  env = Runner.env_override({
    "TELEGRAMBOT_TEST_APPROVE_SUGGESTED_POST_ENTID" => idmap,
    "TELEGRAMBOT_TEST_LIVE" => "FALSE",
    "TELEGRAMBOT_TEST_EXPLAIN" => "FALSE",
    "TELEGRAMBOT_APIKEY" => "NONE",
  })

  idmap_resolved = Helpers.to_map(
    env["TELEGRAMBOT_TEST_APPROVE_SUGGESTED_POST_ENTID"])
  if idmap_resolved.nil?
    idmap_resolved = Helpers.to_map(idmap)
  end

  if env["TELEGRAMBOT_TEST_LIVE"] == "TRUE"
    merged_opts = Vs.merge([
      {
        "apikey" => env["TELEGRAMBOT_APIKEY"],
      },
      extra || {},
    ])
    client = TelegramBotSDK.new(Helpers.to_map(merged_opts))
  end

  live = env["TELEGRAMBOT_TEST_LIVE"] == "TRUE"
  {
    client: client,
    data: entity_data,
    idmap: idmap_resolved,
    env: env,
    explain: env["TELEGRAMBOT_TEST_EXPLAIN"] == "TRUE",
    live: live,
    synthetic_only: live && !idmap_overridden,
    now: (Time.now.to_f * 1000).to_i,
  }
end
