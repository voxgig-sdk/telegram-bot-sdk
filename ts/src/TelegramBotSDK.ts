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
    const items = struct.items

    if (true === getpath(this._options.feature, 'test.active')) {
      this._mode = 'test'
    }

    this._rootctx.options = this._options

    this._features = []

    const featureAdd = this._utility.featureAdd
    const featureInit = this._utility.featureInit

    items(this._options.feature, (fitem: [string, any]) => {
      const fname = fitem[0]
      const fopts = fitem[1]
      if (fopts.active) {
        featureAdd(this._rootctx, this._rootctx.config.makeFeature(fname))
      }
    })

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


  async direct(fetchargs?: any) {
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



  ApproveSuggestedPost(data?: any) {
    const self = this
    return new ApproveSuggestedPostEntity(self,data)
  }


  DeclineSuggestedPost(data?: any) {
    const self = this
    return new DeclineSuggestedPostEntity(self,data)
  }


  DeleteForumTopic(data?: any) {
    const self = this
    return new DeleteForumTopicEntity(self,data)
  }


  EditForumTopic(data?: any) {
    const self = this
    return new EditForumTopicEntity(self,data)
  }


  File(data?: any) {
    const self = this
    return new FileEntity(self,data)
  }


  ForumTopic(data?: any) {
    const self = this
    return new ForumTopicEntity(self,data)
  }


  GetBusinessAccountGift(data?: any) {
    const self = this
    return new GetBusinessAccountGiftEntity(self,data)
  }


  GetChatGift(data?: any) {
    const self = this
    return new GetChatGiftEntity(self,data)
  }


  GetMe(data?: any) {
    const self = this
    return new GetMeEntity(self,data)
  }


  GetUserGift(data?: any) {
    const self = this
    return new GetUserGiftEntity(self,data)
  }


  GetUserProfileAudio(data?: any) {
    const self = this
    return new GetUserProfileAudioEntity(self,data)
  }


  Message(data?: any) {
    const self = this
    return new MessageEntity(self,data)
  }


  MessageId(data?: any) {
    const self = this
    return new MessageIdEntity(self,data)
  }


  PromoteChatMember(data?: any) {
    const self = this
    return new PromoteChatMemberEntity(self,data)
  }


  RemoveMyProfilePhoto(data?: any) {
    const self = this
    return new RemoveMyProfilePhotoEntity(self,data)
  }


  RepostStory(data?: any) {
    const self = this
    return new RepostStoryEntity(self,data)
  }


  SendChatAction(data?: any) {
    const self = this
    return new SendChatActionEntity(self,data)
  }


  SendMessageDraft(data?: any) {
    const self = this
    return new SendMessageDraftEntity(self,data)
  }


  SetMyProfilePhoto(data?: any) {
    const self = this
    return new SetMyProfilePhotoEntity(self,data)
  }


  UnpinAllForumTopicMessage(data?: any) {
    const self = this
    return new UnpinAllForumTopicMessageEntity(self,data)
  }


  Update(data?: any) {
    const self = this
    return new UpdateEntity(self,data)
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

  BaseFeature,
  TelegramBotEntityBase,

  TelegramBotSDK,
  SDK,
}


