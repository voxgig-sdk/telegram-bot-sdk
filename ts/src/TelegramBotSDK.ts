// TelegramBot Ts SDK

import { ApproveSuggestedPostEntity } from './entity/ApproveSuggestedPostEntity'
import { DeclineSuggestedPostEntity } from './entity/DeclineSuggestedPostEntity'
import { DeleteForumTopicEntity } from './entity/DeleteForumTopicEntity'
import { EditForumTopicEntity } from './entity/EditForumTopicEntity'
import { FileEntity } from './entity/FileEntity'
import { ForumTopicEntity } from './entity/ForumTopicEntity'
import { GetBusinessAccountGiftEntity } from './entity/GetBusinessAccountGiftEntity'
import { GetChatGiftEntity } from './entity/GetChatGiftEntity'
import { GetMeEntity } from './entity/GetMeEntity'
import { GetUserGiftEntity } from './entity/GetUserGiftEntity'
import { GetUserProfileAudioEntity } from './entity/GetUserProfileAudioEntity'
import { MessageEntity } from './entity/MessageEntity'
import { MessageIdEntity } from './entity/MessageIdEntity'
import { PromoteChatMemberEntity } from './entity/PromoteChatMemberEntity'
import { RemoveMyProfilePhotoEntity } from './entity/RemoveMyProfilePhotoEntity'
import { RepostStoryEntity } from './entity/RepostStoryEntity'
import { SendChatActionEntity } from './entity/SendChatActionEntity'
import { SendMessageDraftEntity } from './entity/SendMessageDraftEntity'
import { SetMyProfilePhotoEntity } from './entity/SetMyProfilePhotoEntity'
import { UnpinAllForumTopicMessageEntity } from './entity/UnpinAllForumTopicMessageEntity'
import { UpdateEntity } from './entity/UpdateEntity'

export type * from './TelegramBotTypes'


import { inspect } from 'node:util'

import type { Context, Feature } from './types'

import { config } from './Config'
import { TelegramBotEntityBase } from './TelegramBotEntityBase'
import { Utility } from './utility/Utility'


import { BaseFeature } from './feature/base/BaseFeature'


const stdutil = new Utility()


class TelegramBotSDK {
  _mode: string = 'live'
  _options: any
  _utility = new Utility()
  _features: Feature[]
  _rootctx: Context

  constructor(options?: any) {

    this._rootctx = this._utility.makeContext({
      client: this,
      utility: this._utility,
      config,
      options,
      shared: new WeakMap()
    })

    this._options = this._utility.makeOptions(this._rootctx)

    const struct = this._utility.struct
    const getpath = struct.getpath

    if (true === getpath(this._options.feature, 'test.active')) {
      this._mode = 'test'
    }

    this._rootctx.options = this._options

    this._features = []

    const featureAdd = this._utility.featureAdd
    const featureInit = this._utility.featureInit

    // Add features in the resolved order (makeOptions puts an explicit
    // array order first, else defaults to test-first). Ordering matters:
    // the `test` feature installs the base mock transport and the transport
    // features (retry/cache/netsim/proxy/ratelimit) wrap whatever is current,
    // so `test` must be added before them to sit at the base of the chain.
    const featureorder = getpath(this._options, '__derived__.featureorder') || []
    for (const fname of featureorder) {
      const fopts = this._options.feature[fname] || {}
      if (fopts.active) {
        featureAdd(this._rootctx, this._rootctx.config.makeFeature(fname))
      }
    }

    if (null != this._options.extend) {
      for (let f of this._options.extend) {
        featureAdd(this._rootctx, f)
      }
    }

    for (let f of this._features) {
      featureInit(this._rootctx, f)
    }

    const featureHook = this._utility.featureHook
    featureHook(this._rootctx, 'PostConstruct')
  }


  options() {
    return this._utility.struct.clone(this._options)
  }


  utility() {
    return this._utility.struct.clone(this._utility)
  }


  async prepare(fetchargs?: any) {
    const utility = this._utility
    const struct = utility.struct
    const clone = struct.clone

    const {
      makeContext,
      makeFetchDef,
      prepareHeaders,
      prepareAuth,
    } = utility

    fetchargs = fetchargs || {}

    let ctx: Context = makeContext({
      opname: 'prepare',
      ctrl: fetchargs.ctrl || {},
    }, this._rootctx)

    const options = this._options

    // Build spec directly from SDK options + user-provided fetch args.
    const spec: any = {
      base: options.base,
      prefix: options.prefix,
      suffix: options.suffix,
      path: fetchargs.path || '',
      method: fetchargs.method || 'GET',
      params: fetchargs.params || {},
      query: fetchargs.query || {},
      headers: prepareHeaders(ctx),
      body: fetchargs.body,
      step: 'start',
    }

    ctx.spec = spec

    // Merge user-provided headers over SDK defaults.
    if (fetchargs.headers) {
      const uheaders = fetchargs.headers
      for (let key in uheaders) {
        spec.headers[key] = uheaders[key]
      }
    }

    // Apply SDK auth (apikey, auth prefix, etc.)
    const authResult = prepareAuth(ctx)
    if (authResult instanceof Error) {
      return authResult
    }

    return makeFetchDef(ctx)
  }


  // Raw endpoint access is operator-controllable, like every entity op.
  // Blocking it means denying BOTH the 'direct' and 'graphql' tokens, since
  // either one reaches the same endpoint.
  async direct(fetchargs?: any) {
    if (!this._options.allow.op.includes('direct')) {
      return {
        ok: false,
        err: new Error('TelegramBotSDK: direct: operation not allowed by' +
          ' SDK option allow.op value: "' + this._options.allow.op + '"'),
      }
    }

    return this._rawRequest(fetchargs)
  }


  // Ungated request path shared by direct() and graphql(), each of which
  // checks its own allow.op token first. Private, rather than a flag on
  // fetchargs: a caller-supplied marker would let anyone opt straight back
  // out of the gate by passing it.
  async _rawRequest(fetchargs?: any) {
    const utility = this._utility

    const fetcher = utility.fetcher
    const makeContext = utility.makeContext

    const fetchdef = await this.prepare(fetchargs)
    if (fetchdef instanceof Error) {
      return fetchdef
    }

    let ctx: Context = makeContext({
      opname: 'direct',
      ctrl: (fetchargs || {}).ctrl || {},
    }, this._rootctx)

    try {
      const fetched = await fetcher(ctx, fetchdef.url, fetchdef)

      if (null == fetched) {
        return { ok: false, err: ctx.error('direct_no_response', 'response: undefined') }
      }
      else if (fetched instanceof Error) {
        return { ok: false, err: fetched }
      }

      const status = fetched.status

      // No body responses (204 No Content, 304 Not Modified) and explicit
      // zero content-length must skip JSON parsing — fetched.json() would
      // throw `Unexpected end of JSON input` on an empty body.
      const headers = fetched.headers
      const contentLength = headers && 'function' === typeof headers.get
        ? headers.get('content-length')
        : (headers || {})['content-length']
      const noBody = 204 === status || 304 === status || '0' === String(contentLength)

      let json: any = undefined
      if (!noBody) {
        try {
          json = 'function' === typeof fetched.json ? await fetched.json() : fetched.json
        }
        catch (parseErr) {
          // Body wasn't valid JSON — surface the raw response rather than
          // throwing. data stays undefined; callers can inspect status/headers.
          json = undefined
        }
      }

      return {
        ok: status >= 200 && status < 300,
        status,
        headers: fetched.headers,
        data: json,
      }
    }
    catch (err: any) {
      return { ok: false, err }
    }
  }



  // Raw GraphQL access: the pressure valve that makes the generated
  // surface's deliberate omissions (per-call selection sets, typed filter
  // builders, batching, subscriptions) livable — the whole schema stays
  // reachable.
  //
  // Thin wrapper over the same prepare/fetch path `direct` uses, with the
  // one thing raw `direct` cannot do for GraphQL: a GraphQL failure rides
  // HTTP 200 as a top-level `errors` array, so status alone would report a
  // failed query as ok.
  //
  // NOTE: like `direct`, this bypasses the feature pipeline — no retry,
  // ratelimit or paging features apply.
  async graphql(query: string, variables?: any, ctrl?: any) {
    const options = this._options

    if (!options.allow.op.includes('graphql')) {
      return {
        ok: false,
        err: new Error('TelegramBotSDK: graphql: operation not allowed by' +
          ' SDK option allow.op value: "' + options.allow.op + '"'),
      }
    }

    const res: any = await this._rawRequest({
      method: 'POST',
      headers: { 'content-type': 'application/json' },
      body: { query, variables: variables || {} },
      ctrl,
    })

    if (res instanceof Error) {
      return res
    }

    // Errors are read BEFORE any status check: a GraphQL parse or validation
    // failure comes back as HTTP 400 carrying the standard { errors: [...] }
    // body, and the raw path represents a non-2xx as { ok: false } with no
    // err — so returning early on status would discard the server's own
    // diagnostics, which are the only useful part of that response.
    const errors = null == res.data ? undefined : res.data.errors

    if (null != errors && Array.isArray(errors) && 0 < errors.length) {
      const first = errors[0] || {}
      const err: any = new Error('TelegramBotSDK: graphql: ' +
        (first.message || 'graphql error'))
      err.graphql = errors
      return { ok: false, status: res.status, headers: res.headers, err, data: res.data }
    }

    return res
  }



  // Entity access: `client.ApproveSuggestedPost().list()` / `client.ApproveSuggestedPost().load({ id })`.
  // The argument is the entity OPTIONS object (passed to the entity
  // constructor as entopts), not initial entity data.
  ApproveSuggestedPost(entopts?: Record<string, any>) {
    const self = this
    return new ApproveSuggestedPostEntity(self, entopts)
  }


  // Entity access: `client.DeclineSuggestedPost().list()` / `client.DeclineSuggestedPost().load({ id })`.
  // The argument is the entity OPTIONS object (passed to the entity
  // constructor as entopts), not initial entity data.
  DeclineSuggestedPost(entopts?: Record<string, any>) {
    const self = this
    return new DeclineSuggestedPostEntity(self, entopts)
  }


  // Entity access: `client.DeleteForumTopic().list()` / `client.DeleteForumTopic().load({ id })`.
  // The argument is the entity OPTIONS object (passed to the entity
  // constructor as entopts), not initial entity data.
  DeleteForumTopic(entopts?: Record<string, any>) {
    const self = this
    return new DeleteForumTopicEntity(self, entopts)
  }


  // Entity access: `client.EditForumTopic().list()` / `client.EditForumTopic().load({ id })`.
  // The argument is the entity OPTIONS object (passed to the entity
  // constructor as entopts), not initial entity data.
  EditForumTopic(entopts?: Record<string, any>) {
    const self = this
    return new EditForumTopicEntity(self, entopts)
  }


  // Entity access: `client.File().list()` / `client.File().load({ id })`.
  // The argument is the entity OPTIONS object (passed to the entity
  // constructor as entopts), not initial entity data.
  File(entopts?: Record<string, any>) {
    const self = this
    return new FileEntity(self, entopts)
  }


  // Entity access: `client.ForumTopic().list()` / `client.ForumTopic().load({ id })`.
  // The argument is the entity OPTIONS object (passed to the entity
  // constructor as entopts), not initial entity data.
  ForumTopic(entopts?: Record<string, any>) {
    const self = this
    return new ForumTopicEntity(self, entopts)
  }


  // Entity access: `client.GetBusinessAccountGift().list()` / `client.GetBusinessAccountGift().load({ id })`.
  // The argument is the entity OPTIONS object (passed to the entity
  // constructor as entopts), not initial entity data.
  GetBusinessAccountGift(entopts?: Record<string, any>) {
    const self = this
    return new GetBusinessAccountGiftEntity(self, entopts)
  }


  // Entity access: `client.GetChatGift().list()` / `client.GetChatGift().load({ id })`.
  // The argument is the entity OPTIONS object (passed to the entity
  // constructor as entopts), not initial entity data.
  GetChatGift(entopts?: Record<string, any>) {
    const self = this
    return new GetChatGiftEntity(self, entopts)
  }


  // Entity access: `client.GetMe().list()` / `client.GetMe().load({ id })`.
  // The argument is the entity OPTIONS object (passed to the entity
  // constructor as entopts), not initial entity data.
  GetMe(entopts?: Record<string, any>) {
    const self = this
    return new GetMeEntity(self, entopts)
  }


  // Entity access: `client.GetUserGift().list()` / `client.GetUserGift().load({ id })`.
  // The argument is the entity OPTIONS object (passed to the entity
  // constructor as entopts), not initial entity data.
  GetUserGift(entopts?: Record<string, any>) {
    const self = this
    return new GetUserGiftEntity(self, entopts)
  }


  // Entity access: `client.GetUserProfileAudio().list()` / `client.GetUserProfileAudio().load({ id })`.
  // The argument is the entity OPTIONS object (passed to the entity
  // constructor as entopts), not initial entity data.
  GetUserProfileAudio(entopts?: Record<string, any>) {
    const self = this
    return new GetUserProfileAudioEntity(self, entopts)
  }


  // Entity access: `client.Message().list()` / `client.Message().load({ id })`.
  // The argument is the entity OPTIONS object (passed to the entity
  // constructor as entopts), not initial entity data.
  Message(entopts?: Record<string, any>) {
    const self = this
    return new MessageEntity(self, entopts)
  }


  // Entity access: `client.MessageId().list()` / `client.MessageId().load({ id })`.
  // The argument is the entity OPTIONS object (passed to the entity
  // constructor as entopts), not initial entity data.
  MessageId(entopts?: Record<string, any>) {
    const self = this
    return new MessageIdEntity(self, entopts)
  }


  // Entity access: `client.PromoteChatMember().list()` / `client.PromoteChatMember().load({ id })`.
  // The argument is the entity OPTIONS object (passed to the entity
  // constructor as entopts), not initial entity data.
  PromoteChatMember(entopts?: Record<string, any>) {
    const self = this
    return new PromoteChatMemberEntity(self, entopts)
  }


  // Entity access: `client.RemoveMyProfilePhoto().list()` / `client.RemoveMyProfilePhoto().load({ id })`.
  // The argument is the entity OPTIONS object (passed to the entity
  // constructor as entopts), not initial entity data.
  RemoveMyProfilePhoto(entopts?: Record<string, any>) {
    const self = this
    return new RemoveMyProfilePhotoEntity(self, entopts)
  }


  // Entity access: `client.RepostStory().list()` / `client.RepostStory().load({ id })`.
  // The argument is the entity OPTIONS object (passed to the entity
  // constructor as entopts), not initial entity data.
  RepostStory(entopts?: Record<string, any>) {
    const self = this
    return new RepostStoryEntity(self, entopts)
  }


  // Entity access: `client.SendChatAction().list()` / `client.SendChatAction().load({ id })`.
  // The argument is the entity OPTIONS object (passed to the entity
  // constructor as entopts), not initial entity data.
  SendChatAction(entopts?: Record<string, any>) {
    const self = this
    return new SendChatActionEntity(self, entopts)
  }


  // Entity access: `client.SendMessageDraft().list()` / `client.SendMessageDraft().load({ id })`.
  // The argument is the entity OPTIONS object (passed to the entity
  // constructor as entopts), not initial entity data.
  SendMessageDraft(entopts?: Record<string, any>) {
    const self = this
    return new SendMessageDraftEntity(self, entopts)
  }


  // Entity access: `client.SetMyProfilePhoto().list()` / `client.SetMyProfilePhoto().load({ id })`.
  // The argument is the entity OPTIONS object (passed to the entity
  // constructor as entopts), not initial entity data.
  SetMyProfilePhoto(entopts?: Record<string, any>) {
    const self = this
    return new SetMyProfilePhotoEntity(self, entopts)
  }


  // Entity access: `client.UnpinAllForumTopicMessage().list()` / `client.UnpinAllForumTopicMessage().load({ id })`.
  // The argument is the entity OPTIONS object (passed to the entity
  // constructor as entopts), not initial entity data.
  UnpinAllForumTopicMessage(entopts?: Record<string, any>) {
    const self = this
    return new UnpinAllForumTopicMessageEntity(self, entopts)
  }


  // Entity access: `client.Update().list()` / `client.Update().load({ id })`.
  // The argument is the entity OPTIONS object (passed to the entity
  // constructor as entopts), not initial entity data.
  Update(entopts?: Record<string, any>) {
    const self = this
    return new UpdateEntity(self, entopts)
  }




  static test(testoptsarg?: any, sdkoptsarg?: any) {
    const struct = stdutil.struct
    const setpath = struct.setpath
    const getdef = struct.getdef
    const clone = struct.clone
    const setprop = struct.setprop

    const sdkopts = getdef(clone(sdkoptsarg), {})
    const testopts = getdef(clone(testoptsarg), {})
    setprop(testopts, 'active', true)
    setpath(sdkopts, 'feature.test', testopts)

    const testsdk = new TelegramBotSDK(sdkopts)
    testsdk._mode = 'test'

    return testsdk
  }


  tester(testopts?: any, sdkopts?: any) {
    return TelegramBotSDK.test(testopts, sdkopts)
  }


  toJSON() {
    return { name: 'TelegramBot' }
  }

  toString() {
    return 'TelegramBot ' + this._utility.struct.jsonify(this.toJSON())
  }

  [inspect.custom]() {
    return this.toString()
  }

}




const SDK = TelegramBotSDK


export {
  stdutil,
  config,

  BaseFeature,
  TelegramBotEntityBase,

  TelegramBotSDK,
  SDK,
}


