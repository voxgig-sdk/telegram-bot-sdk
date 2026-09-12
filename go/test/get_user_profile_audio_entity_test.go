package sdktest

import (
	"encoding/json"
	"os"
	"path/filepath"
	"runtime"
	"strings"
	"testing"
	"time"

	sdk "github.com/voxgig-sdk/telegram-bot-sdk/go"
	"github.com/voxgig-sdk/telegram-bot-sdk/go/core"

	vs "github.com/voxgig-sdk/telegram-bot-sdk/go/utility/struct"
)

func TestGetUserProfileAudioEntity(t *testing.T) {
	t.Run("instance", func(t *testing.T) {
		testsdk := sdk.TestSDK(nil, nil)
		ent := testsdk.GetUserProfileAudio(nil)
		if ent == nil {
			t.Fatal("expected non-nil GetUserProfileAudioEntity")
		}
	})

	t.Run("basic", func(t *testing.T) {
		setup := get_user_profile_audioBasicSetup(nil)
		// Per-op sdk-test-control.json skip — basic test exercises a flow
		// with multiple ops; skipping any op skips the whole flow.
		_mode := "unit"
		if setup.live {
			_mode = "live"
		}
		for _, _op := range []string{"create"} {
			if _shouldSkip, _reason := isControlSkipped("entityOp", "get_user_profile_audio." + _op, _mode); _shouldSkip {
				if _reason == "" {
					_reason = "skipped via sdk-test-control.json"
				}
				t.Skip(_reason)
				return
			}
		}
		// The basic flow consumes synthetic IDs from the fixture. In live mode
		// without an *_ENTID env override, those IDs hit the live API and 4xx.
		if setup.syntheticOnly {
			t.Skip("live entity test uses synthetic IDs from fixture — set TELEGRAM_BOT_TEST_GET_USER_PROFILE_AUDIO_ENTID JSON to run live")
			return
		}
		client := setup.client

		// CREATE
		getUserProfileAudioRef01Ent := client.GetUserProfileAudio(nil)
		getUserProfileAudioRef01Data := core.ToMapAny(vs.GetProp(
			vs.GetPath(setup.data, []any{"new", "get_user_profile_audio"}), "get_user_profile_audio_ref01"))

		getUserProfileAudioRef01DataResult, err := getUserProfileAudioRef01Ent.Create(getUserProfileAudioRef01Data, nil)
		if err != nil {
			t.Fatalf("create failed: %v", err)
		}
		getUserProfileAudioRef01Data = core.ToMapAny(entityData(getUserProfileAudioRef01DataResult))
		if getUserProfileAudioRef01Data == nil {
			t.Fatal("expected create result to be a map")
		}

	})
}

func get_user_profile_audioBasicSetup(extra map[string]any) *entityTestSetup {
	loadEnvLocal()

	_, filename, _, _ := runtime.Caller(0)
	dir := filepath.Dir(filename)

	entityDataFile := filepath.Join(dir, "..", "..", ".sdk", "test", "entity", "get_user_profile_audio", "GetUserProfileAudioTestData.json")

	entityDataSource, err := os.ReadFile(entityDataFile)
	if err != nil {
		panic("failed to read get_user_profile_audio test data: " + err.Error())
	}

	var entityData map[string]any
	if err := json.Unmarshal(entityDataSource, &entityData); err != nil {
		panic("failed to parse get_user_profile_audio test data: " + err.Error())
	}

	options := map[string]any{}
	options["entity"] = entityData["existing"]

	client := sdk.TestSDK(options, extra)

	// Generate idmap via transform, matching TS pattern.
	idmap, _ := vs.Transform(
		[]any{"get_user_profile_audio01", "get_user_profile_audio02", "get_user_profile_audio03"},
		map[string]any{
			"`$PACK`": []any{"", map[string]any{
				"`$KEY`": "`$COPY`",
				"`$VAL`": []any{"`$FORMAT`", "upper", "`$COPY`"},
			}},
		},
	)

	// Detect ENTID env override before envOverride consumes it. When live
	// mode is on without a real override, the basic test runs against synthetic
	// IDs from the fixture and 4xx's. Surface this so the test can skip.
	entidEnvRaw := os.Getenv("TELEGRAM_BOT_TEST_GET_USER_PROFILE_AUDIO_ENTID")
	idmapOverridden := entidEnvRaw != "" && strings.HasPrefix(strings.TrimSpace(entidEnvRaw), "{")

	env := envOverride(map[string]any{
		"TELEGRAM_BOT_TEST_GET_USER_PROFILE_AUDIO_ENTID": idmap,
		"TELEGRAM_BOT_TEST_LIVE":      "FALSE",
		"TELEGRAM_BOT_TEST_EXPLAIN":   "FALSE",
		"TELEGRAM_BOT_APIKEY":         "",
		"TELEGRAM_BOT_SERVER_TOKEN": "",
	})

	idmapResolved := core.ToMapAny(env["TELEGRAM_BOT_TEST_GET_USER_PROFILE_AUDIO_ENTID"])
	if idmapResolved == nil {
		idmapResolved = core.ToMapAny(idmap)
	}

	if env["TELEGRAM_BOT_TEST_LIVE"] == "TRUE" {
		// An empty map, not a nil one: Merge returns nil when its last entry
		// is nil, and BasicSetup is normally called with no extras - so a
		// bare nil silently discarded the apikey and server values below.
		extraOpts := extra
		if extraOpts == nil {
			extraOpts = map[string]any{}
		}

		mergedOpts := vs.Merge([]any{
			// liveClientOptions() FIRST, so the generated fields below win:
			// sdk-test-control.json's test.client.options adds to the live
			// client, it does not redirect it.
			liveClientOptions(),
			map[string]any{
				"apikey": env["TELEGRAM_BOT_APIKEY"],
				"server": map[string]any{
					"token": env["TELEGRAM_BOT_SERVER_TOKEN"],
				},
			},
			extraOpts,
		})
		client = sdk.NewTelegramBotSDK(core.ToMapAny(mergedOpts))
	}

	live := env["TELEGRAM_BOT_TEST_LIVE"] == "TRUE"
	return &entityTestSetup{
		client:        client,
		data:          entityData,
		idmap:         idmapResolved,
		env:           env,
		explain:       env["TELEGRAM_BOT_TEST_EXPLAIN"] == "TRUE",
		live:          live,
		syntheticOnly: live && !idmapOverridden,
		now:           time.Now().UnixMilli(),
	}
}
