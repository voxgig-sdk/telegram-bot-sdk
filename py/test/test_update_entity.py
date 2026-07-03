# Update entity test

import json
import os
import time

import pytest

from utility.voxgig_struct import voxgig_struct as vs
from telegrambot_sdk import TelegramBotSDK
from core import helpers

_TEST_DIR = os.path.dirname(os.path.abspath(__file__))
from test import runner


class TestUpdateEntity:

    def test_should_create_instance(self):
        testsdk = TelegramBotSDK.test(None, None)
        ent = testsdk.Update(None)
        assert ent is not None

    def test_should_run_basic_flow(self):
        setup = _update_basic_setup(None)
        # Per-op sdk-test-control.json skip — basic test exercises a flow with
        # multiple ops; skipping any one skips the whole flow (steps depend
        # on each other).
        _live = setup.get("live", False)
        for _op in ["create", "list"]:
            _skip, _reason = runner.is_control_skipped("entityOp", "update." + _op, "live" if _live else "unit")
            if _skip:
                pytest.skip(_reason or "skipped via sdk-test-control.json")
                return
        # The basic flow consumes synthetic IDs from the fixture. In live mode
        # without an *_ENTID env override, those IDs hit the live API and 4xx.
        if setup.get("synthetic_only"):
            pytest.skip("live entity test uses synthetic IDs from fixture — "
                        "set TELEGRAMBOT_TEST_UPDATE_ENTID JSON to run live")
        client = setup["client"]

        # CREATE
        update_ref01_ent = client.Update(None)
        update_ref01_data = helpers.to_map(vs.getprop(
            vs.getpath(setup["data"], "new.update"), "update_ref01"))

        update_ref01_data_result, err = update_ref01_ent.create(update_ref01_data, None)
        assert err is None
        update_ref01_data = helpers.to_map(update_ref01_data_result)
        assert update_ref01_data is not None

        # LIST
        update_ref01_match = {}

        update_ref01_list_result, err = update_ref01_ent.list(update_ref01_match, None)
        assert err is None
        assert isinstance(update_ref01_list_result, list)

        found_item = vs.select(
            runner.entity_list_to_data(update_ref01_list_result),
            {"id": update_ref01_data["id"]})
        assert not vs.isempty(found_item)



def _update_basic_setup(extra):
    runner.load_env_local()

    entity_data_file = os.path.join(_TEST_DIR, "../../.sdk/test/entity/update/UpdateTestData.json")
    with open(entity_data_file, "r") as f:
        entity_data_source = f.read()

    entity_data = json.loads(entity_data_source)

    options = {}
    options["entity"] = entity_data.get("existing")

    client = TelegramBotSDK.test(options, extra)

    # Generate idmap via transform.
    idmap = vs.transform(
        ["update01", "update02", "update03"],
        {
            "`$PACK`": ["", {
                "`$KEY`": "`$COPY`",
                "`$VAL`": ["`$FORMAT`", "upper", "`$COPY`"],
            }],
        }
    )

    # Detect ENTID env override before envOverride consumes it. When live
    # mode is on without a real override, the basic test runs against synthetic
    # IDs from the fixture and 4xx's. We surface this so the test can skip.
    _entid_env_raw = os.environ.get(
        "TELEGRAMBOT_TEST_UPDATE_ENTID")
    _idmap_overridden = _entid_env_raw is not None and _entid_env_raw.strip().startswith("{")

    env = runner.env_override({
        "TELEGRAMBOT_TEST_UPDATE_ENTID": idmap,
        "TELEGRAMBOT_TEST_LIVE": "FALSE",
        "TELEGRAMBOT_TEST_EXPLAIN": "FALSE",
        "TELEGRAMBOT_APIKEY": "NONE",
    })

    idmap_resolved = helpers.to_map(
        env.get("TELEGRAMBOT_TEST_UPDATE_ENTID"))
    if idmap_resolved is None:
        idmap_resolved = helpers.to_map(idmap)

    if env.get("TELEGRAMBOT_TEST_LIVE") == "TRUE":
        merged_opts = vs.merge([
            {
                "apikey": env.get("TELEGRAMBOT_APIKEY"),
            },
            extra or {},
        ])
        client = TelegramBotSDK(helpers.to_map(merged_opts))

    _live = env.get("TELEGRAMBOT_TEST_LIVE") == "TRUE"
    return {
        "client": client,
        "data": entity_data,
        "idmap": idmap_resolved,
        "env": env,
        "explain": env.get("TELEGRAMBOT_TEST_EXPLAIN") == "TRUE",
        "live": _live,
        "synthetic_only": _live and not _idmap_overridden,
        "now": int(time.time() * 1000),
    }
