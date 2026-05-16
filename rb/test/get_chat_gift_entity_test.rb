# GetChatGift entity test

require "minitest/autorun"
require "json"
require_relative "../TelegramBot_sdk"
require_relative "runner"

class GetChatGiftEntityTest < Minitest::Test
  def test_create_instance
    testsdk = TelegramBotSDK.test(nil, nil)
    ent = testsdk.GetChatGift(nil)
    assert !ent.nil?
  end

  def test_basic_flow
    setup = get_chat_gift_basic_setup(nil)
    # Per-op sdk-test-control.json skip.
    _live = setup[:live] || false
    ["create"].each do |_op|
      _should_skip, _reason = Runner.is_control_skipped("entityOp", "get_chat_gift." + _op, _live ? "live" : "unit")
      if _should_skip
        skip(_reason || "skipped via sdk-test-control.json")
        return
      end
    end
    # The basic flow consumes synthetic IDs from the fixture. In live mode
    # without an *_ENTID env override, those IDs hit the live API and 4xx.
    if setup[:synthetic_only]
      skip "live entity test uses synthetic IDs from fixture — set TELEGRAMBOT_TEST_GET_CHAT_GIFT_ENTID JSON to run live"
      return
    end
    client = setup[:client]

    # CREATE
    get_chat_gift_ref01_ent = client.GetChatGift(nil)
    get_chat_gift_ref01_data = Helpers.to_map(Vs.getprop(
      Vs.getpath(setup[:data], "new.get_chat_gift"), "get_chat_gift_ref01"))

    get_chat_gift_ref01_data_result, err = get_chat_gift_ref01_ent.create(get_chat_gift_ref01_data, nil)
    assert_nil err
    get_chat_gift_ref01_data = Helpers.to_map(get_chat_gift_ref01_data_result)
    assert !get_chat_gift_ref01_data.nil?

  end
end

def get_chat_gift_basic_setup(extra)
  Runner.load_env_local

  entity_data_file = File.join(__dir__, "..", "..", ".sdk", "test", "entity", "get_chat_gift", "GetChatGiftTestData.json")
  entity_data_source = File.read(entity_data_file)
  entity_data = JSON.parse(entity_data_source)

  options = {}
  options["entity"] = entity_data["existing"]

  client = TelegramBotSDK.test(options, extra)

  # Generate idmap via transform.
  idmap = Vs.transform(
    ["get_chat_gift01", "get_chat_gift02", "get_chat_gift03"],
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
  entid_env_raw = ENV["TELEGRAMBOT_TEST_GET_CHAT_GIFT_ENTID"]
  idmap_overridden = !entid_env_raw.nil? && entid_env_raw.strip.start_with?("{")

  env = Runner.env_override({
    "TELEGRAMBOT_TEST_GET_CHAT_GIFT_ENTID" => idmap,
    "TELEGRAMBOT_TEST_LIVE" => "FALSE",
    "TELEGRAMBOT_TEST_EXPLAIN" => "FALSE",
    "TELEGRAMBOT_APIKEY" => "NONE",
  })

  idmap_resolved = Helpers.to_map(
    env["TELEGRAMBOT_TEST_GET_CHAT_GIFT_ENTID"])
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
