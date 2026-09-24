

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


loadEnvLocal(__dirname + '/../../../.env.local')


describe('RemoveMyProfilePhotoEntity', async () => {

  // Per-test live pacing. Delay is read from sdk-test-control.json's
  // `test.live.delayMs`; only sleeps when TELEGRAM_BOT_TEST_LIVE=TRUE.
  afterEach(liveDelay('TELEGRAM_BOT_TEST_LIVE'))

  test('instance', async () => {
    const testsdk = TelegramBotSDK.test()
    const ent = testsdk.RemoveMyProfilePhoto()
    assert(null != ent)
  })


  test('basic', async (t) => {

    const live = 'TRUE' === process.env.TELEGRAM_BOT_TEST_LIVE
    for (const op of ['create']) {
      if (!live && maybeSkipControl(t, 'entityOp', 'remove_my_profile_photo.' + op, live)) return
    }

    
    const setup = basicSetup()
    if (setup.live) {
      return runLiveEntity(setup, {"active":true,"alias":{"field":{}},"fields":{"description":{"a":true,"h":"Description","n":"description","r":false,"sh":"Human-readable description of the result","t":"`$STRING`","key$":"description","index$":0},"error_code":{"a":true,"h":"Error Code","n":"error_code","r":false,"sh":"Error code","t":"`$INTEGER`","key$":"error_code","index$":1},"ok":{"a":true,"h":"Ok","n":"ok","r":true,"sh":"If true, the request was successful","t":"`$BOOLEAN`","key$":"ok","index$":2},"parameters":{"a":true,"h":"Parameters","n":"parameters","r":false,"t":"`$OBJECT`","key$":"parameters","index$":3},"result":{"a":true,"h":"Result","n":"result","r":false,"sh":"The result of the query","t":"`$ARRAY`","key$":"result","index$":4}},"name":"remove_my_profile_photo","op":{"create":{"input":"data","name":"create","points":[{"a":true,"co":{"id":"POST /removeMyProfilePhoto","source":"openapi3","version":2},"g":{},"k":"http","m":"POST","o":"/removeMyProfilePhoto","q":{},"r":{},"s":[{"lit":"removeMyProfilePhoto"}],"t":{"req":"`reqdata`","res":"`body`"},"index$":0}],"key$":"create"}},"relations":{"ancestors":[]},"key$":"remove_my_profile_photo","name__orig":"remove_my_profile_photo","Name":"RemoveMyProfilePhoto","name_":"remove_my_profile_photo","name-":"remove-my-profile-photo","NAME":"REMOVE_MY_PROFILE_PHOTO","index$":14}, {"active":true,"entity":"remove_my_profile_photo","key$":"BasicRemoveMyProfilePhotoFlow","kind":"basic","name":"BasicRemoveMyProfilePhotoFlow","param":{},"step":[{"a":true,"d":{},"i":{"ref":"remove_my_profile_photo_ref01"},"m":{},"o":"create","s":[],"v":[],"index$":0}]}, 'RemoveMyProfilePhoto', {"POST /removeMyProfilePhoto":{"protocol":"http","operationId":"removeMyProfilePhoto","responses":{"200":{"description":"Profile photo removed successfully","content":{"application/json":{"schema":{"type":"object","required":["ok"],"properties":{"ok":{"description":"If true, the request was successful","key$":"ok","type":"boolean"},"result":{"description":"The result of the query","items":{"properties":{"business_connection":{"properties":{"id":{"type":"string"},"user":{"properties":{"allows_users_to_create_topics":{"type":"boolean"},"first_name":{"type":"string"},"has_topics_enabled":{"type":"boolean"},"id":{"type":"integer"},"is_bot":{"type":"boolean"},"language_code":{"type":"string"},"last_name":{"type":"string"},"username":{"type":"string"}},"required":["id","is_bot","first_name"],"type":"object","x-ref":"#/components/schemas/User"}},"type":"object","x-ref":"#/components/schemas/BusinessConnection","key$":"business_connection"},"business_message":{"properties":{"chat":{"properties":{"first_name":{"type":"string"},"id":{"type":"integer"},"is_direct_messages":{"type":"boolean"},"last_name":{"type":"string"},"title":{"type":"string"},"type":{"enum":["private","group","supergroup","channel"],"type":"string"},"username":{"type":"string"}},"required":["id","type"],"type":"object","x-ref":"#/components/schemas/Chat"},"chat_owner_changed":{"description":"Service message about the chat owner being changed","type":"object","x-ref":"#/components/schemas/ChatOwnerChanged"},"chat_owner_left":{"description":"Service message about the chat owner leaving","type":"object","x-ref":"#/components/schemas/ChatOwnerLeft"},"date":{"type":"integer"},"direct_messages_topic":{"properties":{"topic_id":{"type":"integer"}},"type":"object","x-ref":"#/components/schemas/DirectMessagesTopic"},"from":{"properties":{"allows_users_to_create_topics":{"type":"boolean"},"first_name":{"type":"string"},"has_topics_enabled":{"type":"boolean"},"id":{"type":"integer"},"is_bot":{"type":"boolean"},"language_code":{"type":"string"},"last_name":{"type":"string"},"username":{"type":"string"}},"required":["id","is_bot","first_name"],"type":"object","x-ref":"#/components/schemas/User"},"gift_upgrade_sent":{"type":"object"},"is_paid_post":{"type":"boolean"},"is_topic_message":{"type":"boolean"},"message_id":{"type":"integer"},"message_thread_id":{"type":"integer"},"reply_to_checklist_task_id":{"type":"integer"},"reply_to_message_id":{"type":"integer"},"suggested_post_approval_failed":{"description":"Service message about the failed approval of a suggested post","type":"object","x-ref":"#/components/schemas/SuggestedPostApprovalFailed"},"suggested_post_approved":{"description":"Service message about the approval of a suggested post","type":"object","x-ref":"#/components/schemas/SuggestedPostApproved"},"suggested_post_declined":{"description":"Service message about the rejection of a suggested post","type":"object","x-ref":"#/components/schemas/SuggestedPostDeclined"},"suggested_post_info":{"properties":{"price":{"properties":{"amount":{"type":"integer"},"currency":{"type":"string"}},"type":"object","x-ref":"#/components/schemas/SuggestedPostPrice"}},"type":"object","x-ref":"#/components/schemas/SuggestedPostInfo"},"suggested_post_paid":{"description":"Service message about a successful payment for a suggested post","type":"object","x-ref":"#/components/schemas/SuggestedPostPaid"},"suggested_post_refunded":{"description":"Service message about a payment refund for a suggested post","type":"object","x-ref":"#/components/schemas/SuggestedPostRefunded"},"text":{"type":"string"}},"required":["message_id","date","chat"],"type":"object","x-ref":"#/components/schemas/Message","key$":"business_message"},"channel_post":{"properties":{"chat":{"properties":{"first_name":{"type":"string"},"id":{"type":"integer"},"is_direct_messages":{"type":"boolean"},"last_name":{"type":"string"},"title":{"type":"string"},"type":{"enum":["private","group","supergroup","channel"],"type":"string"},"username":{"type":"string"}},"required":["id","type"],"type":"object","x-ref":"#/components/schemas/Chat"},"chat_owner_changed":{"description":"Service message about the chat owner being changed","type":"object","x-ref":"#/components/schemas/ChatOwnerChanged"},"chat_owner_left":{"description":"Service message about the chat owner leaving","type":"object","x-ref":"#/components/schemas/ChatOwnerLeft"},"date":{"type":"integer"},"direct_messages_topic":{"properties":{"topic_id":{"type":"integer"}},"type":"object","x-ref":"#/components/schemas/DirectMessagesTopic"},"from":{"properties":{"allows_users_to_create_topics":{"type":"boolean"},"first_name":{"type":"string"},"has_topics_enabled":{"type":"boolean"},"id":{"type":"integer"},"is_bot":{"type":"boolean"},"language_code":{"type":"string"},"last_name":{"type":"string"},"username":{"type":"string"}},"required":["id","is_bot","first_name"],"type":"object","x-ref":"#/components/schemas/User"},"gift_upgrade_sent":{"type":"object"},"is_paid_post":{"type":"boolean"},"is_topic_message":{"type":"boolean"},"message_id":{"type":"integer"},"message_thread_id":{"type":"integer"},"reply_to_checklist_task_id":{"type":"integer"},"reply_to_message_id":{"type":"integer"},"suggested_post_approval_failed":{"description":"Service message about the failed approval of a suggested post","type":"object","x-ref":"#/components/schemas/SuggestedPostApprovalFailed"},"suggested_post_approved":{"description":"Service message about the approval of a suggested post","type":"object","x-ref":"#/components/schemas/SuggestedPostApproved"},"suggested_post_declined":{"description":"Service message about the rejection of a suggested post","type":"object","x-ref":"#/components/schemas/SuggestedPostDeclined"},"suggested_post_info":{"properties":{"price":{"properties":{"amount":{"type":"integer"},"currency":{"type":"string"}},"type":"object","x-ref":"#/components/schemas/SuggestedPostPrice"}},"type":"object","x-ref":"#/components/schemas/SuggestedPostInfo"},"suggested_post_paid":{"description":"Service message about a successful payment for a suggested post","type":"object","x-ref":"#/components/schemas/SuggestedPostPaid"},"suggested_post_refunded":{"description":"Service message about a payment refund for a suggested post","type":"object","x-ref":"#/components/schemas/SuggestedPostRefunded"},"text":{"type":"string"}},"required":["message_id","date","chat"],"type":"object","x-ref":"#/components/schemas/Message","key$":"channel_post"},"chosen_inline_result":{"properties":{"from":{"properties":{"allows_users_to_create_topics":{"type":"boolean"},"first_name":{"type":"string"},"has_topics_enabled":{"type":"boolean"},"id":{"type":"integer"},"is_bot":{"type":"boolean"},"language_code":{"type":"string"},"last_name":{"type":"string"},"username":{"type":"string"}},"required":["id","is_bot","first_name"],"type":"object","x-ref":"#/components/schemas/User"},"query":{"type":"string"},"result_id":{"type":"string"}},"required":["result_id","from","query"],"type":"object","x-ref":"#/components/schemas/ChosenInlineResult","key$":"chosen_inline_result"},"deleted_business_messages":{"properties":{"business_connection_id":{"type":"string"},"chat":{"properties":{"first_name":{"type":"string"},"id":{"type":"integer"},"is_direct_messages":{"type":"boolean"},"last_name":{"type":"string"},"title":{"type":"string"},"type":{"enum":["private","group","supergroup","channel"],"type":"string"},"username":{"type":"string"}},"required":["id","type"],"type":"object","x-ref":"#/components/schemas/Chat"}},"type":"object","x-ref":"#/components/schemas/BusinessMessagesDeleted","key$":"deleted_business_messages"},"edited_business_message":{"properties":{"chat":{"properties":{"first_name":{"type":"string"},"id":{"type":"integer"},"is_direct_messages":{"type":"boolean"},"last_name":{"type":"string"},"title":{"type":"string"},"type":{"enum":["private","group","supergroup","channel"],"type":"string"},"username":{"type":"string"}},"required":["id","type"],"type":"object","x-ref":"#/components/schemas/Chat"},"chat_owner_changed":{"description":"Service message about the chat owner being changed","type":"object","x-ref":"#/components/schemas/ChatOwnerChanged"},"chat_owner_left":{"description":"Service message about the chat owner leaving","type":"object","x-ref":"#/components/schemas/ChatOwnerLeft"},"date":{"type":"integer"},"direct_messages_topic":{"properties":{"topic_id":{"type":"integer"}},"type":"object","x-ref":"#/components/schemas/DirectMessagesTopic"},"from":{"properties":{"allows_users_to_create_topics":{"type":"boolean"},"first_name":{"type":"string"},"has_topics_enabled":{"type":"boolean"},"id":{"type":"integer"},"is_bot":{"type":"boolean"},"language_code":{"type":"string"},"last_name":{"type":"string"},"username":{"type":"string"}},"required":["id","is_bot","first_name"],"type":"object","x-ref":"#/components/schemas/User"},"gift_upgrade_sent":{"type":"object"},"is_paid_post":{"type":"boolean"},"is_topic_message":{"type":"boolean"},"message_id":{"type":"integer"},"message_thread_id":{"type":"integer"},"reply_to_checklist_task_id":{"type":"integer"},"reply_to_message_id":{"type":"integer"},"suggested_post_approval_failed":{"description":"Service message about the failed approval of a suggested post","type":"object","x-ref":"#/components/schemas/SuggestedPostApprovalFailed"},"suggested_post_approved":{"description":"Service message about the approval of a suggested post","type":"object","x-ref":"#/components/schemas/SuggestedPostApproved"},"suggested_post_declined":{"description":"Service message about the rejection of a suggested post","type":"object","x-ref":"#/components/schemas/SuggestedPostDeclined"},"suggested_post_info":{"properties":{"price":{"properties":{"amount":{"type":"integer"},"currency":{"type":"string"}},"type":"object","x-ref":"#/components/schemas/SuggestedPostPrice"}},"type":"object","x-ref":"#/components/schemas/SuggestedPostInfo"},"suggested_post_paid":{"description":"Service message about a successful payment for a suggested post","type":"object","x-ref":"#/components/schemas/SuggestedPostPaid"},"suggested_post_refunded":{"description":"Service message about a payment refund for a suggested post","type":"object","x-ref":"#/components/schemas/SuggestedPostRefunded"},"text":{"type":"string"}},"required":["message_id","date","chat"],"type":"object","x-ref":"#/components/schemas/Message","key$":"edited_business_message"},"edited_channel_post":{"properties":{"chat":{"properties":{"first_name":{"type":"string"},"id":{"type":"integer"},"is_direct_messages":{"type":"boolean"},"last_name":{"type":"string"},"title":{"type":"string"},"type":{"enum":["private","group","supergroup","channel"],"type":"string"},"username":{"type":"string"}},"required":["id","type"],"type":"object","x-ref":"#/components/schemas/Chat"},"chat_owner_changed":{"description":"Service message about the chat owner being changed","type":"object","x-ref":"#/components/schemas/ChatOwnerChanged"},"chat_owner_left":{"description":"Service message about the chat owner leaving","type":"object","x-ref":"#/components/schemas/ChatOwnerLeft"},"date":{"type":"integer"},"direct_messages_topic":{"properties":{"topic_id":{"type":"integer"}},"type":"object","x-ref":"#/components/schemas/DirectMessagesTopic"},"from":{"properties":{"allows_users_to_create_topics":{"type":"boolean"},"first_name":{"type":"string"},"has_topics_enabled":{"type":"boolean"},"id":{"type":"integer"},"is_bot":{"type":"boolean"},"language_code":{"type":"string"},"last_name":{"type":"string"},"username":{"type":"string"}},"required":["id","is_bot","first_name"],"type":"object","x-ref":"#/components/schemas/User"},"gift_upgrade_sent":{"type":"object"},"is_paid_post":{"type":"boolean"},"is_topic_message":{"type":"boolean"},"message_id":{"type":"integer"},"message_thread_id":{"type":"integer"},"reply_to_checklist_task_id":{"type":"integer"},"reply_to_message_id":{"type":"integer"},"suggested_post_approval_failed":{"description":"Service message about the failed approval of a suggested post","type":"object","x-ref":"#/components/schemas/SuggestedPostApprovalFailed"},"suggested_post_approved":{"description":"Service message about the approval of a suggested post","type":"object","x-ref":"#/components/schemas/SuggestedPostApproved"},"suggested_post_declined":{"description":"Service message about the rejection of a suggested post","type":"object","x-ref":"#/components/schemas/SuggestedPostDeclined"},"suggested_post_info":{"properties":{"price":{"properties":{"amount":{"type":"integer"},"currency":{"type":"string"}},"type":"object","x-ref":"#/components/schemas/SuggestedPostPrice"}},"type":"object","x-ref":"#/components/schemas/SuggestedPostInfo"},"suggested_post_paid":{"description":"Service message about a successful payment for a suggested post","type":"object","x-ref":"#/components/schemas/SuggestedPostPaid"},"suggested_post_refunded":{"description":"Service message about a payment refund for a suggested post","type":"object","x-ref":"#/components/schemas/SuggestedPostRefunded"},"text":{"type":"string"}},"required":["message_id","date","chat"],"type":"object","x-ref":"#/components/schemas/Message","key$":"edited_channel_post"},"edited_message":{"properties":{"chat":{"properties":{"first_name":{"type":"string"},"id":{"type":"integer"},"is_direct_messages":{"type":"boolean"},"last_name":{"type":"string"},"title":{"type":"string"},"type":{"enum":["private","group","supergroup","channel"],"type":"string"},"username":{"type":"string"}},"required":["id","type"],"type":"object","x-ref":"#/components/schemas/Chat"},"chat_owner_changed":{"description":"Service message about the chat owner being changed","type":"object","x-ref":"#/components/schemas/ChatOwnerChanged"},"chat_owner_left":{"description":"Service message about the chat owner leaving","type":"object","x-ref":"#/components/schemas/ChatOwnerLeft"},"date":{"type":"integer"},"direct_messages_topic":{"properties":{"topic_id":{"type":"integer"}},"type":"object","x-ref":"#/components/schemas/DirectMessagesTopic"},"from":{"properties":{"allows_users_to_create_topics":{"type":"boolean"},"first_name":{"type":"string"},"has_topics_enabled":{"type":"boolean"},"id":{"type":"integer"},"is_bot":{"type":"boolean"},"language_code":{"type":"string"},"last_name":{"type":"string"},"username":{"type":"string"}},"required":["id","is_bot","first_name"],"type":"object","x-ref":"#/components/schemas/User"},"gift_upgrade_sent":{"type":"object"},"is_paid_post":{"type":"boolean"},"is_topic_message":{"type":"boolean"},"message_id":{"type":"integer"},"message_thread_id":{"type":"integer"},"reply_to_checklist_task_id":{"type":"integer"},"reply_to_message_id":{"type":"integer"},"suggested_post_approval_failed":{"description":"Service message about the failed approval of a suggested post","type":"object","x-ref":"#/components/schemas/SuggestedPostApprovalFailed"},"suggested_post_approved":{"description":"Service message about the approval of a suggested post","type":"object","x-ref":"#/components/schemas/SuggestedPostApproved"},"suggested_post_declined":{"description":"Service message about the rejection of a suggested post","type":"object","x-ref":"#/components/schemas/SuggestedPostDeclined"},"suggested_post_info":{"properties":{"price":{"properties":{"amount":{"type":"integer"},"currency":{"type":"string"}},"type":"object","x-ref":"#/components/schemas/SuggestedPostPrice"}},"type":"object","x-ref":"#/components/schemas/SuggestedPostInfo"},"suggested_post_paid":{"description":"Service message about a successful payment for a suggested post","type":"object","x-ref":"#/components/schemas/SuggestedPostPaid"},"suggested_post_refunded":{"description":"Service message about a payment refund for a suggested post","type":"object","x-ref":"#/components/schemas/SuggestedPostRefunded"},"text":{"type":"string"}},"required":["message_id","date","chat"],"type":"object","x-ref":"#/components/schemas/Message","key$":"edited_message"},"inline_query":{"properties":{"from":{"properties":{"allows_users_to_create_topics":{"type":"boolean"},"first_name":{"type":"string"},"has_topics_enabled":{"type":"boolean"},"id":{"type":"integer"},"is_bot":{"type":"boolean"},"language_code":{"type":"string"},"last_name":{"type":"string"},"username":{"type":"string"}},"required":["id","is_bot","first_name"],"type":"object","x-ref":"#/components/schemas/User"},"id":{"type":"string"},"offset":{"type":"string"},"query":{"type":"string"}},"required":["id","from","query","offset"],"type":"object","x-ref":"#/components/schemas/InlineQuery","key$":"inline_query"},"message":{"properties":{"chat":{"properties":{"first_name":{"type":"string"},"id":{"type":"integer"},"is_direct_messages":{"type":"boolean"},"last_name":{"type":"string"},"title":{"type":"string"},"type":{"enum":["private","group","supergroup","channel"],"type":"string"},"username":{"type":"string"}},"required":["id","type"],"type":"object","x-ref":"#/components/schemas/Chat"},"chat_owner_changed":{"description":"Service message about the chat owner being changed","type":"object","x-ref":"#/components/schemas/ChatOwnerChanged"},"chat_owner_left":{"description":"Service message about the chat owner leaving","type":"object","x-ref":"#/components/schemas/ChatOwnerLeft"},"date":{"type":"integer"},"direct_messages_topic":{"properties":{"topic_id":{"type":"integer"}},"type":"object","x-ref":"#/components/schemas/DirectMessagesTopic"},"from":{"properties":{"allows_users_to_create_topics":{"type":"boolean"},"first_name":{"type":"string"},"has_topics_enabled":{"type":"boolean"},"id":{"type":"integer"},"is_bot":{"type":"boolean"},"language_code":{"type":"string"},"last_name":{"type":"string"},"username":{"type":"string"}},"required":["id","is_bot","first_name"],"type":"object","x-ref":"#/components/schemas/User"},"gift_upgrade_sent":{"type":"object"},"is_paid_post":{"type":"boolean"},"is_topic_message":{"type":"boolean"},"message_id":{"type":"integer"},"message_thread_id":{"type":"integer"},"reply_to_checklist_task_id":{"type":"integer"},"reply_to_message_id":{"type":"integer"},"suggested_post_approval_failed":{"description":"Service message about the failed approval of a suggested post","type":"object","x-ref":"#/components/schemas/SuggestedPostApprovalFailed"},"suggested_post_approved":{"description":"Service message about the approval of a suggested post","type":"object","x-ref":"#/components/schemas/SuggestedPostApproved"},"suggested_post_declined":{"description":"Service message about the rejection of a suggested post","type":"object","x-ref":"#/components/schemas/SuggestedPostDeclined"},"suggested_post_info":{"properties":{"price":{"properties":{"amount":{"type":"integer"},"currency":{"type":"string"}},"type":"object","x-ref":"#/components/schemas/SuggestedPostPrice"}},"type":"object","x-ref":"#/components/schemas/SuggestedPostInfo"},"suggested_post_paid":{"description":"Service message about a successful payment for a suggested post","type":"object","x-ref":"#/components/schemas/SuggestedPostPaid"},"suggested_post_refunded":{"description":"Service message about a payment refund for a suggested post","type":"object","x-ref":"#/components/schemas/SuggestedPostRefunded"},"text":{"type":"string"}},"required":["message_id","date","chat"],"type":"object","x-ref":"#/components/schemas/Message","key$":"message"},"message_reaction":{"properties":{"chat":{"properties":{"first_name":{"type":"string"},"id":{"type":"integer"},"is_direct_messages":{"type":"boolean"},"last_name":{"type":"string"},"title":{"type":"string"},"type":{"enum":["private","group","supergroup","channel"],"type":"string"},"username":{"type":"string"}},"required":["id","type"],"type":"object","x-ref":"#/components/schemas/Chat"},"message_id":{"type":"integer"},"user":{"properties":{"allows_users_to_create_topics":{"type":"boolean"},"first_name":{"type":"string"},"has_topics_enabled":{"type":"boolean"},"id":{"type":"integer"},"is_bot":{"type":"boolean"},"language_code":{"type":"string"},"last_name":{"type":"string"},"username":{"type":"string"}},"required":["id","is_bot","first_name"],"type":"object","x-ref":"#/components/schemas/User"}},"type":"object","x-ref":"#/components/schemas/MessageReactionUpdated","key$":"message_reaction"},"message_reaction_count":{"properties":{"chat":{"properties":{"first_name":{"type":"string"},"id":{"type":"integer"},"is_direct_messages":{"type":"boolean"},"last_name":{"type":"string"},"title":{"type":"string"},"type":{"enum":["private","group","supergroup","channel"],"type":"string"},"username":{"type":"string"}},"required":["id","type"],"type":"object","x-ref":"#/components/schemas/Chat"},"message_id":{"type":"integer"}},"type":"object","x-ref":"#/components/schemas/MessageReactionCountUpdated","key$":"message_reaction_count"},"update_id":{"description":"The update's unique identifier","type":"integer","key$":"update_id"}},"required":["update_id"],"type":"object","x-ref":"#/components/schemas/Update","index$":0},"key$":"result","type":"array"},"description":{"description":"Human-readable description of the result","key$":"description","type":"string"},"error_code":{"description":"Error code","key$":"error_code","type":"integer"},"parameters":{"key$":"parameters","properties":{"migrate_to_chat_id":{"type":"integer"},"retry_after":{"type":"integer"}},"type":"object","x-ref":"#/components/schemas/ResponseParameters"}},"x-ref":"#/components/schemas/ApiResponse","index$":0}}}}},"parameters":[],"security":[{"BotToken":[]}],"securitySource":"definition","securitySchemes":{"BotToken":{"type":"apiKey","in":"path","name":"token","description":"Bot authentication token provided in the server URL path variable"}}}})
    }
    const client = setup.client
    const struct = setup.struct

    const isempty = struct.isempty
    const select = struct.select


    // CREATE
    const remove_my_profile_photo_ref01_ent = client.RemoveMyProfilePhoto()
    let remove_my_profile_photo_ref01_data = setup.data.new.remove_my_profile_photo['remove_my_profile_photo_ref01']

    remove_my_profile_photo_ref01_data = (await remove_my_profile_photo_ref01_ent.create(remove_my_profile_photo_ref01_data)).data()
    assert(null != remove_my_profile_photo_ref01_data)


  })
})



function basicSetup(extra?: any) {
  // TODO: fix test def options
  const options: any = {} // null

  // TODO: needs test utility to resolve path
  const entityDataFile =
    Path.resolve(__dirname, 
      '../../../../.sdk/test/entity/remove_my_profile_photo/RemoveMyProfilePhotoTestData.json')

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
    ['remove_my_profile_photo01','remove_my_profile_photo02','remove_my_profile_photo03'],
    {
      '`$PACK`': ['', {
        '`$KEY`': '`$COPY`',
        '`$VAL`': ['`$FORMAT`', 'upper', '`$COPY`']
      }]
    })

  const env = envOverride({
    'TELEGRAM_BOT_TEST_REMOVE_MY_PROFILE_PHOTO_ENTID': idmap,
    'TELEGRAM_BOT_TEST_LIVE': 'FALSE',
    'TELEGRAM_BOT_TEST_EXPLAIN': 'FALSE',
    'TELEGRAM_BOT_APIKEY': '',
    'TELEGRAM_BOT_SERVER_TOKEN': "",
  })

  idmap = env['TELEGRAM_BOT_TEST_REMOVE_MY_PROFILE_PHOTO_ENTID']

  const live = 'TRUE' === env.TELEGRAM_BOT_TEST_LIVE

  const transport = createLiveTransport()
  if (live) {
    const rawIds = process.env['TELEGRAM_BOT_TEST_REMOVE_MY_PROFILE_PHOTO_ENTID']
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
  
