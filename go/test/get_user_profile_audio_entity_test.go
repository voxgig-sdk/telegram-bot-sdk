package sdktest

import (
	"encoding/json"
	"os"
	"path/filepath"
	"runtime"
	"strings"
	"testing"
	"time"

	sdk "github.com/voxgig-sdk/telegram-bot-sdk"
	"github.com/voxgig-sdk/telegram-bot-sdk/core"

	vs "github.com/voxgig/struct"
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
			t.Skip("live entity test uses synthetic IDs from fixture — set TELEGRAMBOT_TEST_GET_USER_PROFILE_AUDIO_ENTID JSON to run live")
			return
		}
		client := setup.client

		// CREATE
		getUserProfileAudioRef01Ent := client.GetUserProfileAudio(nil)
		getUserProfileAudioRef01Data := core.ToMapAny(vs.GetProp(
			vs.GetPath([]any{"new", "get_user_profile_audio"}, setup.data), "get_user_profile_audio_ref01"))

		getUserProfileAudioRef01DataResult, err := getUserProfileAudioRef01Ent.Create(getUserProfileAudioRef01Data, nil)
		if err != nil {
			t.Fatalf("create failed: %v", err)
		}
		getUserProfileAudioRef01Data = core.ToMapAny(getUserProfileAudioRef01DataResult)
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
	idmap := vs.Transform(
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
	entidEnvRaw := os.Getenv("TELEGRAMBOT_TEST_GET_USER_PROFILE_AUDIO_ENTID")
	idmapOverridden := entidEnvRaw != "" && strings.HasPrefix(strings.TrimSpace(entidEnvRaw), "{")

	env := envOverride(map[string]any{
		"TELEGRAMBOT_TEST_GET_USER_PROFILE_AUDIO_ENTID": idmap,
		"TELEGRAMBOT_TEST_LIVE":      "FALSE",
		"TELEGRAMBOT_TEST_EXPLAIN":   "FALSE",
		"TELEGRAMBOT_APIKEY":         "NONE",
	})

	idmapResolved := core.ToMapAny(env["TELEGRAMBOT_TEST_GET_USER_PROFILE_AUDIO_ENTID"])
	if idmapResolved == nil {
		idmapResolved = core.ToMapAny(idmap)
	}

	if env["TELEGRAMBOT_TEST_LIVE"] == "TRUE" {
		mergedOpts := vs.Merge([]any{
			map[string]any{
				"apikey": env["TELEGRAMBOT_APIKEY"],
			},
			extra,
		})
		client = sdk.NewTelegramBotSDK(core.ToMapAny(mergedOpts))
	}

	live := env["TELEGRAMBOT_TEST_LIVE"] == "TRUE"
	return &entityTestSetup{
		client:        client,
		data:          entityData,
		idmap:         idmapResolved,
		env:           env,
		explain:       env["TELEGRAMBOT_TEST_EXPLAIN"] == "TRUE",
		live:          live,
		syntheticOnly: live && !idmapOverridden,
		now:           time.Now().UnixMilli(),
	}
}
