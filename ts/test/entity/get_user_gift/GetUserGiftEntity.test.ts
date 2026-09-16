

import Path from 'node:path'
import * as Fs from 'node:fs'

import { test, describe, afterEach } from 'node:test'
import assert from 'node:assert'
import { createLiveTransport } from '../../live-runner'
import { runLiveEntity } from '../../live-entity'


import { TelegramBotSDK, BaseFeature, stdutil } from '../../..'

import {
  envOverride,
  liveClientOptions,
  liveDelay,
  loadEnvLocal,
  makeCtrl,
  makeMatch,
  makeReqdata,
  makeStepData,
  makeValid,
  maybeSkipControl,
} from '../../utility'


// AFTER the imports on purpose: TypeScript hoists `import` above any
// statement in the emitted CommonJS, so a loader placed above them would
// run only after every imported module had already been evaluated - and
// anything reading process.env at module scope would miss these values.
loadEnvLocal(__dirname + '/../../../.env.local')


describe('GetUserGiftEntity', async () => {

  // Per-test live pacing. Delay is read from sdk-test-control.json's
  // `test.live.delayMs`; only sleeps when TELEGRAM_BOT_TEST_LIVE=TRUE.
  afterEach(liveDelay('TELEGRAM_BOT_TEST_LIVE'))

  test('instance', async () => {
    const testsdk = TelegramBotSDK.test()
    const ent = testsdk.GetUserGift()
    assert(null != ent)
  })


  test('basic', async (t) => {

    const live = 'TRUE' === process.env.TELEGRAM_BOT_TEST_LIVE
    for (const op of ['create']) {
      if (!live && maybeSkipControl(t, 'entityOp', 'get_user_gift.' + op, live)) return
    }

    
    const setup = basicSetup()
    if (setup.live) {
      return runLiveEntity(setup, {"active":true,"alias":{"field":{}},"fields":[{"active":true,"name":"description","req":false,"short":"Human-readable description of the result","type":"`$STRING`","index$":0},{"active":true,"name":"error_code","req":false,"short":"Error code","type":"`$INTEGER`","index$":1},{"active":true,"name":"ok","req":true,"short":"If true, the request was successful","type":"`$BOOLEAN`","index$":2},{"active":true,"name":"parameters","req":false,"type":"`$OBJECT`","index$":3},{"active":true,"name":"result","req":false,"short":"The result of the query","type":"`$ARRAY`","index$":4},{"active":true,"name":"user_id","req":true,"type":"`$INTEGER`","index$":5}],"name":"get_user_gift","op":{"create":{"input":"data","name":"create","points":[{"active":true,"args":{},"contract":{"id":"POST /getUserGifts","json":"{\"operationId\":\"getUserGifts\",\"parameters\":[],\"protocol\":\"http\",\"requestBody\":{\"content\":{\"application/json\":{\"schema\":{\"properties\":{\"user_id\":{\"type\":\"integer\"}},\"required\":[\"user_id\"],\"type\":\"object\"}}},\"required\":true},\"responses\":{\"200\":{\"content\":{\"application/json\":{\"schema\":{\"properties\":{\"description\":{\"description\":\"Human-readable description of the result\",\"type\":\"string\"},\"error_code\":{\"description\":\"Error code\",\"type\":\"integer\"},\"ok\":{\"description\":\"If true, the request was successful\",\"type\":\"boolean\"},\"parameters\":{\"properties\":{\"migrate_to_chat_id\":{\"type\":\"integer\"},\"retry_after\":{\"type\":\"integer\"}},\"type\":\"object\"},\"result\":{\"description\":\"The result of the query\",\"items\":{\"properties\":{\"business_connection\":{\"properties\":{\"id\":{\"type\":\"string\"},\"user\":{\"properties\":{\"allows_users_to_create_topics\":{\"type\":\"boolean\"},\"first_name\":{\"type\":\"string\"},\"has_topics_enabled\":{\"type\":\"boolean\"},\"id\":{\"type\":\"integer\"},\"is_bot\":{\"type\":\"boolean\"},\"language_code\":{\"type\":\"string\"},\"last_name\":{\"type\":\"string\"},\"username\":{\"type\":\"string\"}},\"required\":[\"id\",\"is_bot\",\"first_name\"],\"type\":\"object\"}},\"type\":\"object\"},\"business_message\":{\"properties\":{\"chat\":{\"properties\":{\"first_name\":{\"type\":\"string\"},\"id\":{\"type\":\"integer\"},\"is_direct_messages\":{\"type\":\"boolean\"},\"last_name\":{\"type\":\"string\"},\"title\":{\"type\":\"string\"},\"type\":{\"enum\":[\"private\",\"group\",\"supergroup\",\"channel\"],\"type\":\"string\"},\"username\":{\"type\":\"string\"}},\"required\":[\"id\",\"type\"],\"type\":\"object\"},\"chat_owner_changed\":{\"description\":\"Service message about the chat owner being changed\",\"type\":\"object\"},\"chat_owner_left\":{\"description\":\"Service message about the chat owner leaving\",\"type\":\"object\"},\"date\":{\"type\":\"integer\"},\"direct_messages_topic\":{\"properties\":{\"topic_id\":{\"type\":\"integer\"}},\"type\":\"object\"},\"from\":{\"properties\":{\"allows_users_to_create_topics\":{\"type\":\"boolean\"},\"first_name\":{\"type\":\"string\"},\"has_topics_enabled\":{\"type\":\"boolean\"},\"id\":{\"type\":\"integer\"},\"is_bot\":{\"type\":\"boolean\"},\"language_code\":{\"type\":\"string\"},\"last_name\":{\"type\":\"string\"},\"username\":{\"type\":\"string\"}},\"required\":[\"id\",\"is_bot\",\"first_name\"],\"type\":\"object\"},\"gift_upgrade_sent\":{\"type\":\"object\"},\"is_paid_post\":{\"type\":\"boolean\"},\"is_topic_message\":{\"type\":\"boolean\"},\"message_id\":{\"type\":\"integer\"},\"message_thread_id\":{\"type\":\"integer\"},\"reply_to_checklist_task_id\":{\"type\":\"integer\"},\"reply_to_message_id\":{\"type\":\"integer\"},\"suggested_post_approval_failed\":{\"description\":\"Service message about the failed approval of a suggested post\",\"type\":\"object\"},\"suggested_post_approved\":{\"description\":\"Service message about the approval of a suggested post\",\"type\":\"object\"},\"suggested_post_declined\":{\"description\":\"Service message about the rejection of a suggested post\",\"type\":\"object\"},\"suggested_post_info\":{\"properties\":{\"price\":{\"properties\":{\"amount\":{\"type\":\"integer\"},\"currency\":{\"type\":\"string\"}},\"type\":\"object\"}},\"type\":\"object\"},\"suggested_post_paid\":{\"description\":\"Service message about a successful payment for a suggested post\",\"type\":\"object\"},\"suggested_post_refunded\":{\"description\":\"Service message about a payment refund for a suggested post\",\"type\":\"object\"},\"text\":{\"type\":\"string\"}},\"required\":[\"message_id\",\"date\",\"chat\"],\"type\":\"object\"},\"channel_post\":{\"properties\":{\"chat\":{\"properties\":{\"first_name\":{\"type\":\"string\"},\"id\":{\"type\":\"integer\"},\"is_direct_messages\":{\"type\":\"boolean\"},\"last_name\":{\"type\":\"string\"},\"title\":{\"type\":\"string\"},\"type\":{\"enum\":[\"private\",\"group\",\"supergroup\",\"channel\"],\"type\":\"string\"},\"username\":{\"type\":\"string\"}},\"required\":[\"id\",\"type\"],\"type\":\"object\"},\"chat_owner_changed\":{\"description\":\"Service message about the chat owner being changed\",\"type\":\"object\"},\"chat_owner_left\":{\"description\":\"Service message about the chat owner leaving\",\"type\":\"object\"},\"date\":{\"type\":\"integer\"},\"direct_messages_topic\":{\"properties\":{\"topic_id\":{\"type\":\"integer\"}},\"type\":\"object\"},\"from\":{\"properties\":{\"allows_users_to_create_topics\":{\"type\":\"boolean\"},\"first_name\":{\"type\":\"string\"},\"has_topics_enabled\":{\"type\":\"boolean\"},\"id\":{\"type\":\"integer\"},\"is_bot\":{\"type\":\"boolean\"},\"language_code\":{\"type\":\"string\"},\"last_name\":{\"type\":\"string\"},\"username\":{\"type\":\"string\"}},\"required\":[\"id\",\"is_bot\",\"first_name\"],\"type\":\"object\"},\"gift_upgrade_sent\":{\"type\":\"object\"},\"is_paid_post\":{\"type\":\"boolean\"},\"is_topic_message\":{\"type\":\"boolean\"},\"message_id\":{\"type\":\"integer\"},\"message_thread_id\":{\"type\":\"integer\"},\"reply_to_checklist_task_id\":{\"type\":\"integer\"},\"reply_to_message_id\":{\"type\":\"integer\"},\"suggested_post_approval_failed\":{\"description\":\"Service message about the failed approval of a suggested post\",\"type\":\"object\"},\"suggested_post_approved\":{\"description\":\"Service message about the approval of a suggested post\",\"type\":\"object\"},\"suggested_post_declined\":{\"description\":\"Service message about the rejection of a suggested post\",\"type\":\"object\"},\"suggested_post_info\":{\"properties\":{\"price\":{\"properties\":{\"amount\":{\"type\":\"integer\"},\"currency\":{\"type\":\"string\"}},\"type\":\"object\"}},\"type\":\"object\"},\"suggested_post_paid\":{\"description\":\"Service message about a successful payment for a suggested post\",\"type\":\"object\"},\"suggested_post_refunded\":{\"description\":\"Service message about a payment refund for a suggested post\",\"type\":\"object\"},\"text\":{\"type\":\"string\"}},\"required\":[\"message_id\",\"date\",\"chat\"],\"type\":\"object\"},\"chosen_inline_result\":{\"properties\":{\"from\":{\"properties\":{\"allows_users_to_create_topics\":{\"type\":\"boolean\"},\"first_name\":{\"type\":\"string\"},\"has_topics_enabled\":{\"type\":\"boolean\"},\"id\":{\"type\":\"integer\"},\"is_bot\":{\"type\":\"boolean\"},\"language_code\":{\"type\":\"string\"},\"last_name\":{\"type\":\"string\"},\"username\":{\"type\":\"string\"}},\"required\":[\"id\",\"is_bot\",\"first_name\"],\"type\":\"object\"},\"query\":{\"type\":\"string\"},\"result_id\":{\"type\":\"string\"}},\"required\":[\"result_id\",\"from\",\"query\"],\"type\":\"object\"},\"deleted_business_messages\":{\"properties\":{\"business_connection_id\":{\"type\":\"string\"},\"chat\":{\"properties\":{\"first_name\":{\"type\":\"string\"},\"id\":{\"type\":\"integer\"},\"is_direct_messages\":{\"type\":\"boolean\"},\"last_name\":{\"type\":\"string\"},\"title\":{\"type\":\"string\"},\"type\":{\"enum\":[\"private\",\"group\",\"supergroup\",\"channel\"],\"type\":\"string\"},\"username\":{\"type\":\"string\"}},\"required\":[\"id\",\"type\"],\"type\":\"object\"}},\"type\":\"object\"},\"edited_business_message\":{\"properties\":{\"chat\":{\"properties\":{\"first_name\":{\"type\":\"string\"},\"id\":{\"type\":\"integer\"},\"is_direct_messages\":{\"type\":\"boolean\"},\"last_name\":{\"type\":\"string\"},\"title\":{\"type\":\"string\"},\"type\":{\"enum\":[\"private\",\"group\",\"supergroup\",\"channel\"],\"type\":\"string\"},\"username\":{\"type\":\"string\"}},\"required\":[\"id\",\"type\"],\"type\":\"object\"},\"chat_owner_changed\":{\"description\":\"Service message about the chat owner being changed\",\"type\":\"object\"},\"chat_owner_left\":{\"description\":\"Service message about the chat owner leaving\",\"type\":\"object\"},\"date\":{\"type\":\"integer\"},\"direct_messages_topic\":{\"properties\":{\"topic_id\":{\"type\":\"integer\"}},\"type\":\"object\"},\"from\":{\"properties\":{\"allows_users_to_create_topics\":{\"type\":\"boolean\"},\"first_name\":{\"type\":\"string\"},\"has_topics_enabled\":{\"type\":\"boolean\"},\"id\":{\"type\":\"integer\"},\"is_bot\":{\"type\":\"boolean\"},\"language_code\":{\"type\":\"string\"},\"last_name\":{\"type\":\"string\"},\"username\":{\"type\":\"string\"}},\"required\":[\"id\",\"is_bot\",\"first_name\"],\"type\":\"object\"},\"gift_upgrade_sent\":{\"type\":\"object\"},\"is_paid_post\":{\"type\":\"boolean\"},\"is_topic_message\":{\"type\":\"boolean\"},\"message_id\":{\"type\":\"integer\"},\"message_thread_id\":{\"type\":\"integer\"},\"reply_to_checklist_task_id\":{\"type\":\"integer\"},\"reply_to_message_id\":{\"type\":\"integer\"},\"suggested_post_approval_failed\":{\"description\":\"Service message about the failed approval of a suggested post\",\"type\":\"object\"},\"suggested_post_approved\":{\"description\":\"Service message about the approval of a suggested post\",\"type\":\"object\"},\"suggested_post_declined\":{\"description\":\"Service message about the rejection of a suggested post\",\"type\":\"object\"},\"suggested_post_info\":{\"properties\":{\"price\":{\"properties\":{\"amount\":{\"type\":\"integer\"},\"currency\":{\"type\":\"string\"}},\"type\":\"object\"}},\"type\":\"object\"},\"suggested_post_paid\":{\"description\":\"Service message about a successful payment for a suggested post\",\"type\":\"object\"},\"suggested_post_refunded\":{\"description\":\"Service message about a payment refund for a suggested post\",\"type\":\"object\"},\"text\":{\"type\":\"string\"}},\"required\":[\"message_id\",\"date\",\"chat\"],\"type\":\"object\"},\"edited_channel_post\":{\"properties\":{\"chat\":{\"properties\":{\"first_name\":{\"type\":\"string\"},\"id\":{\"type\":\"integer\"},\"is_direct_messages\":{\"type\":\"boolean\"},\"last_name\":{\"type\":\"string\"},\"title\":{\"type\":\"string\"},\"type\":{\"enum\":[\"private\",\"group\",\"supergroup\",\"channel\"],\"type\":\"string\"},\"username\":{\"type\":\"string\"}},\"required\":[\"id\",\"type\"],\"type\":\"object\"},\"chat_owner_changed\":{\"description\":\"Service message about the chat owner being changed\",\"type\":\"object\"},\"chat_owner_left\":{\"description\":\"Service message about the chat owner leaving\",\"type\":\"object\"},\"date\":{\"type\":\"integer\"},\"direct_messages_topic\":{\"properties\":{\"topic_id\":{\"type\":\"integer\"}},\"type\":\"object\"},\"from\":{\"properties\":{\"allows_users_to_create_topics\":{\"type\":\"boolean\"},\"first_name\":{\"type\":\"string\"},\"has_topics_enabled\":{\"type\":\"boolean\"},\"id\":{\"type\":\"integer\"},\"is_bot\":{\"type\":\"boolean\"},\"language_code\":{\"type\":\"string\"},\"last_name\":{\"type\":\"string\"},\"username\":{\"type\":\"string\"}},\"required\":[\"id\",\"is_bot\",\"first_name\"],\"type\":\"object\"},\"gift_upgrade_sent\":{\"type\":\"object\"},\"is_paid_post\":{\"type\":\"boolean\"},\"is_topic_message\":{\"type\":\"boolean\"},\"message_id\":{\"type\":\"integer\"},\"message_thread_id\":{\"type\":\"integer\"},\"reply_to_checklist_task_id\":{\"type\":\"integer\"},\"reply_to_message_id\":{\"type\":\"integer\"},\"suggested_post_approval_failed\":{\"description\":\"Service message about the failed approval of a suggested post\",\"type\":\"object\"},\"suggested_post_approved\":{\"description\":\"Service message about the approval of a suggested post\",\"type\":\"object\"},\"suggested_post_declined\":{\"description\":\"Service message about the rejection of a suggested post\",\"type\":\"object\"},\"suggested_post_info\":{\"properties\":{\"price\":{\"properties\":{\"amount\":{\"type\":\"integer\"},\"currency\":{\"type\":\"string\"}},\"type\":\"object\"}},\"type\":\"object\"},\"suggested_post_paid\":{\"description\":\"Service message about a successful payment for a suggested post\",\"type\":\"object\"},\"suggested_post_refunded\":{\"description\":\"Service message about a payment refund for a suggested post\",\"type\":\"object\"},\"text\":{\"type\":\"string\"}},\"required\":[\"message_id\",\"date\",\"chat\"],\"type\":\"object\"},\"edited_message\":{\"properties\":{\"chat\":{\"properties\":{\"first_name\":{\"type\":\"string\"},\"id\":{\"type\":\"integer\"},\"is_direct_messages\":{\"type\":\"boolean\"},\"last_name\":{\"type\":\"string\"},\"title\":{\"type\":\"string\"},\"type\":{\"enum\":[\"private\",\"group\",\"supergroup\",\"channel\"],\"type\":\"string\"},\"username\":{\"type\":\"string\"}},\"required\":[\"id\",\"type\"],\"type\":\"object\"},\"chat_owner_changed\":{\"description\":\"Service message about the chat owner being changed\",\"type\":\"object\"},\"chat_owner_left\":{\"description\":\"Service message about the chat owner leaving\",\"type\":\"object\"},\"date\":{\"type\":\"integer\"},\"direct_messages_topic\":{\"properties\":{\"topic_id\":{\"type\":\"integer\"}},\"type\":\"object\"},\"from\":{\"properties\":{\"allows_users_to_create_topics\":{\"type\":\"boolean\"},\"first_name\":{\"type\":\"string\"},\"has_topics_enabled\":{\"type\":\"boolean\"},\"id\":{\"type\":\"integer\"},\"is_bot\":{\"type\":\"boolean\"},\"language_code\":{\"type\":\"string\"},\"last_name\":{\"type\":\"string\"},\"username\":{\"type\":\"string\"}},\"required\":[\"id\",\"is_bot\",\"first_name\"],\"type\":\"object\"},\"gift_upgrade_sent\":{\"type\":\"object\"},\"is_paid_post\":{\"type\":\"boolean\"},\"is_topic_message\":{\"type\":\"boolean\"},\"message_id\":{\"type\":\"integer\"},\"message_thread_id\":{\"type\":\"integer\"},\"reply_to_checklist_task_id\":{\"type\":\"integer\"},\"reply_to_message_id\":{\"type\":\"integer\"},\"suggested_post_approval_failed\":{\"description\":\"Service message about the failed approval of a suggested post\",\"type\":\"object\"},\"suggested_post_approved\":{\"description\":\"Service message about the approval of a suggested post\",\"type\":\"object\"},\"suggested_post_declined\":{\"description\":\"Service message about the rejection of a suggested post\",\"type\":\"object\"},\"suggested_post_info\":{\"properties\":{\"price\":{\"properties\":{\"amount\":{\"type\":\"integer\"},\"currency\":{\"type\":\"string\"}},\"type\":\"object\"}},\"type\":\"object\"},\"suggested_post_paid\":{\"description\":\"Service message about a successful payment for a suggested post\",\"type\":\"object\"},\"suggested_post_refunded\":{\"description\":\"Service message about a payment refund for a suggested post\",\"type\":\"object\"},\"text\":{\"type\":\"string\"}},\"required\":[\"message_id\",\"date\",\"chat\"],\"type\":\"object\"},\"inline_query\":{\"properties\":{\"from\":{\"properties\":{\"allows_users_to_create_topics\":{\"type\":\"boolean\"},\"first_name\":{\"type\":\"string\"},\"has_topics_enabled\":{\"type\":\"boolean\"},\"id\":{\"type\":\"integer\"},\"is_bot\":{\"type\":\"boolean\"},\"language_code\":{\"type\":\"string\"},\"last_name\":{\"type\":\"string\"},\"username\":{\"type\":\"string\"}},\"required\":[\"id\",\"is_bot\",\"first_name\"],\"type\":\"object\"},\"id\":{\"type\":\"string\"},\"offset\":{\"type\":\"string\"},\"query\":{\"type\":\"string\"}},\"required\":[\"id\",\"from\",\"query\",\"offset\"],\"type\":\"object\"},\"message\":{\"properties\":{\"chat\":{\"properties\":{\"first_name\":{\"type\":\"string\"},\"id\":{\"type\":\"integer\"},\"is_direct_messages\":{\"type\":\"boolean\"},\"last_name\":{\"type\":\"string\"},\"title\":{\"type\":\"string\"},\"type\":{\"enum\":[\"private\",\"group\",\"supergroup\",\"channel\"],\"type\":\"string\"},\"username\":{\"type\":\"string\"}},\"required\":[\"id\",\"type\"],\"type\":\"object\"},\"chat_owner_changed\":{\"description\":\"Service message about the chat owner being changed\",\"type\":\"object\"},\"chat_owner_left\":{\"description\":\"Service message about the chat owner leaving\",\"type\":\"object\"},\"date\":{\"type\":\"integer\"},\"direct_messages_topic\":{\"properties\":{\"topic_id\":{\"type\":\"integer\"}},\"type\":\"object\"},\"from\":{\"properties\":{\"allows_users_to_create_topics\":{\"type\":\"boolean\"},\"first_name\":{\"type\":\"string\"},\"has_topics_enabled\":{\"type\":\"boolean\"},\"id\":{\"type\":\"integer\"},\"is_bot\":{\"type\":\"boolean\"},\"language_code\":{\"type\":\"string\"},\"last_name\":{\"type\":\"string\"},\"username\":{\"type\":\"string\"}},\"required\":[\"id\",\"is_bot\",\"first_name\"],\"type\":\"object\"},\"gift_upgrade_sent\":{\"type\":\"object\"},\"is_paid_post\":{\"type\":\"boolean\"},\"is_topic_message\":{\"type\":\"boolean\"},\"message_id\":{\"type\":\"integer\"},\"message_thread_id\":{\"type\":\"integer\"},\"reply_to_checklist_task_id\":{\"type\":\"integer\"},\"reply_to_message_id\":{\"type\":\"integer\"},\"suggested_post_approval_failed\":{\"description\":\"Service message about the failed approval of a suggested post\",\"type\":\"object\"},\"suggested_post_approved\":{\"description\":\"Service message about the approval of a suggested post\",\"type\":\"object\"},\"suggested_post_declined\":{\"description\":\"Service message about the rejection of a suggested post\",\"type\":\"object\"},\"suggested_post_info\":{\"properties\":{\"price\":{\"properties\":{\"amount\":{\"type\":\"integer\"},\"currency\":{\"type\":\"string\"}},\"type\":\"object\"}},\"type\":\"object\"},\"suggested_post_paid\":{\"description\":\"Service message about a successful payment for a suggested post\",\"type\":\"object\"},\"suggested_post_refunded\":{\"description\":\"Service message about a payment refund for a suggested post\",\"type\":\"object\"},\"text\":{\"type\":\"string\"}},\"required\":[\"message_id\",\"date\",\"chat\"],\"type\":\"object\"},\"message_reaction\":{\"properties\":{\"chat\":{\"properties\":{\"first_name\":{\"type\":\"string\"},\"id\":{\"type\":\"integer\"},\"is_direct_messages\":{\"type\":\"boolean\"},\"last_name\":{\"type\":\"string\"},\"title\":{\"type\":\"string\"},\"type\":{\"enum\":[\"private\",\"group\",\"supergroup\",\"channel\"],\"type\":\"string\"},\"username\":{\"type\":\"string\"}},\"required\":[\"id\",\"type\"],\"type\":\"object\"},\"message_id\":{\"type\":\"integer\"},\"user\":{\"properties\":{\"allows_users_to_create_topics\":{\"type\":\"boolean\"},\"first_name\":{\"type\":\"string\"},\"has_topics_enabled\":{\"type\":\"boolean\"},\"id\":{\"type\":\"integer\"},\"is_bot\":{\"type\":\"boolean\"},\"language_code\":{\"type\":\"string\"},\"last_name\":{\"type\":\"string\"},\"username\":{\"type\":\"string\"}},\"required\":[\"id\",\"is_bot\",\"first_name\"],\"type\":\"object\"}},\"type\":\"object\"},\"message_reaction_count\":{\"properties\":{\"chat\":{\"properties\":{\"first_name\":{\"type\":\"string\"},\"id\":{\"type\":\"integer\"},\"is_direct_messages\":{\"type\":\"boolean\"},\"last_name\":{\"type\":\"string\"},\"title\":{\"type\":\"string\"},\"type\":{\"enum\":[\"private\",\"group\",\"supergroup\",\"channel\"],\"type\":\"string\"},\"username\":{\"type\":\"string\"}},\"required\":[\"id\",\"type\"],\"type\":\"object\"},\"message_id\":{\"type\":\"integer\"}},\"type\":\"object\"},\"update_id\":{\"description\":\"The update's unique identifier\",\"type\":\"integer\"}},\"required\":[\"update_id\"],\"type\":\"object\"},\"type\":\"array\"}},\"required\":[\"ok\"],\"type\":\"object\"}}},\"description\":\"User gifts retrieved successfully\"}},\"security\":[{\"BotToken\":[]}],\"securitySchemes\":{\"BotToken\":{\"description\":\"Bot authentication token provided in the server URL path variable\",\"in\":\"path\",\"name\":\"token\",\"type\":\"apiKey\"}},\"securitySource\":\"definition\"}","source":"openapi3","version":1},"kind":"http","method":"POST","orig":"/getUserGifts","segments":[{"lit":"getUserGifts"}],"select":{},"transform":{"req":"`reqdata`","res":"`body`"},"index$":0}],"key$":"create"}},"relations":{"ancestors":[]},"key$":"get_user_gift","name__orig":"get_user_gift","Name":"GetUserGift","name_":"get_user_gift","name-":"get-user-gift","NAME":"GET_USER_GIFT","index$":9}, {"active":true,"entity":"get_user_gift","key$":"BasicGetUserGiftFlow","kind":"basic","name":"BasicGetUserGiftFlow","param":{},"step":[{"active":true,"data":{},"input":{"ref":"get_user_gift_ref01"},"match":{},"op":"create","spec":[],"valid":[],"index$":0}]}, 'GetUserGift')
    }
    const client = setup.client
    const struct = setup.struct

    const isempty = struct.isempty
    const select = struct.select


    // CREATE
    const get_user_gift_ref01_ent = client.GetUserGift()
    let get_user_gift_ref01_data = setup.data.new.get_user_gift['get_user_gift_ref01']

    get_user_gift_ref01_data = (await get_user_gift_ref01_ent.create(get_user_gift_ref01_data)).data()
    assert(null != get_user_gift_ref01_data)


  })
})



function basicSetup(extra?: any) {
  // TODO: fix test def options
  const options: any = {} // null

  // TODO: needs test utility to resolve path
  const entityDataFile =
    Path.resolve(__dirname, 
      '../../../../.sdk/test/entity/get_user_gift/GetUserGiftTestData.json')

  // TODO: file ready util needed?
  const entityDataSource = Fs.readFileSync(entityDataFile).toString('utf8')

  // TODO: need a xlang JSON parse utility in voxgig/struct with better error msgs
  const entityData = JSON.parse(entityDataSource)

  options.entity = entityData.existing

  let client = TelegramBotSDK.test(options, extra)
  const struct = client.utility().struct
  const merge = struct.merge
  const transform = struct.transform

  let idmap = transform(
    ['get_user_gift01','get_user_gift02','get_user_gift03'],
    {
      '`$PACK`': ['', {
        '`$KEY`': '`$COPY`',
        '`$VAL`': ['`$FORMAT`', 'upper', '`$COPY`']
      }]
    })

  const env = envOverride({
    'TELEGRAM_BOT_TEST_GET_USER_GIFT_ENTID': idmap,
    'TELEGRAM_BOT_TEST_LIVE': 'FALSE',
    'TELEGRAM_BOT_TEST_EXPLAIN': 'FALSE',
    'TELEGRAM_BOT_APIKEY': '',
    'TELEGRAM_BOT_SERVER_TOKEN': "",
  })

  idmap = env['TELEGRAM_BOT_TEST_GET_USER_GIFT_ENTID']

  const live = 'TRUE' === env.TELEGRAM_BOT_TEST_LIVE

  const transport = createLiveTransport()
  if (live) {
    const rawIds = process.env['TELEGRAM_BOT_TEST_GET_USER_GIFT_ENTID']
    idmap = rawIds && rawIds.trim() ? JSON.parse(rawIds) : {}
    if (!idmap || Array.isArray(idmap) || typeof idmap !== 'object') {
      throw new Error('Live ENTID must be a JSON object')
    }
    client = new TelegramBotSDK(merge([
      // FIRST, so the generated fields below win: sdk-test-control.json's
      // test.client.options adds to the live client, it does not redirect it.
      liveClientOptions(),
      {
        apikey: env.TELEGRAM_BOT_APIKEY,
        server: {
          token: env.TELEGRAM_BOT_SERVER_TOKEN,
        },
      },
      // 'extra || {}', not a bare 'extra': struct.merge returns UNDEFINED when the
      // last entry is undefined, and basicSetup is normally called with no
      // argument at all - so a bare 'extra' silently discarded the apikey
      // and server values above and handed the SDK undefined. Harmless
      // while there was nothing in that object; not harmless now.
      extra || {},
      { system: { fetch: transport.fetch } }
    ]))
  }

  const setup = {
    idmap,
    env,
    options,
    client,
    struct,
    data: entityData,
    explain: 'TRUE' === env.TELEGRAM_BOT_TEST_EXPLAIN,
    live,
    transport,
    now: Date.now(),
  }

  return setup
}
  
