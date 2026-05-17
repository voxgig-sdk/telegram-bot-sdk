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

func TestRepostStoryEntity(t *testing.T) {
	t.Run("instance", func(t *testing.T) {
		testsdk := sdk.TestSDK(nil, nil)
		ent := testsdk.RepostStory(nil)
		if ent == nil {
			t.Fatal("expected non-nil RepostStoryEntity")
		}
	})

	t.Run("basic", func(t *testing.T) {
		setup := repost_storyBasicSetup(nil)
		// Per-op sdk-test-control.json skip — basic test exercises a flow
		// with multiple ops; skipping any op skips the whole flow.
		_mode := "unit"
		if setup.live {
			_mode = "live"
		}
		for _, _op := range []string{"create"} {
			if _shouldSkip, _reason := isControlSkipped("entityOp", "repost_story." + _op, _mode); _shouldSkip {
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
			t.Skip("live entity test uses synthetic IDs from fixture — set TELEGRAMBOT_TEST_REPOST_STORY_ENTID JSON to run live")
			return
		}
		client := setup.client

		// CREATE
		repostStoryRef01Ent := client.RepostStory(nil)
		repostStoryRef01Data := core.ToMapAny(vs.GetProp(
			vs.GetPath([]any{"new", "repost_story"}, setup.data), "repost_story_ref01"))

		repostStoryRef01DataResult, err := repostStoryRef01Ent.Create(repostStoryRef01Data, nil)
		if err != nil {
			t.Fatalf("create failed: %v", err)
		}
		repostStoryRef01Data = core.ToMapAny(repostStoryRef01DataResult)
		if repostStoryRef01Data == nil {
			t.Fatal("expected create result to be a map")
		}

	})
}

func repost_storyBasicSetup(extra map[string]any) *entityTestSetup {
	loadEnvLocal()

	_, filename, _, _ := runtime.Caller(0)
	dir := filepath.Dir(filename)

	entityDataFile := filepath.Join(dir, "..", "..", ".sdk", "test", "entity", "repost_story", "RepostStoryTestData.json")

	entityDataSource, err := os.ReadFile(entityDataFile)
	if err != nil {
		panic("failed to read repost_story test data: " + err.Error())
	}

	var entityData map[string]any
	if err := json.Unmarshal(entityDataSource, &entityData); err != nil {
		panic("failed to parse repost_story test data: " + err.Error())
	}

	options := map[string]any{}
	options["entity"] = entityData["existing"]

	client := sdk.TestSDK(options, extra)

	// Generate idmap via transform, matching TS pattern.
	idmap := vs.Transform(
		[]any{"repost_story01", "repost_story02", "repost_story03"},
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
	entidEnvRaw := os.Getenv("TELEGRAMBOT_TEST_REPOST_STORY_ENTID")
	idmapOverridden := entidEnvRaw != "" && strings.HasPrefix(strings.TrimSpace(entidEnvRaw), "{")

	env := envOverride(map[string]any{
		"TELEGRAMBOT_TEST_REPOST_STORY_ENTID": idmap,
		"TELEGRAMBOT_TEST_LIVE":      "FALSE",
		"TELEGRAMBOT_TEST_EXPLAIN":   "FALSE",
		"TELEGRAMBOT_APIKEY":         "NONE",
	})

	idmapResolved := core.ToMapAny(env["TELEGRAMBOT_TEST_REPOST_STORY_ENTID"])
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
