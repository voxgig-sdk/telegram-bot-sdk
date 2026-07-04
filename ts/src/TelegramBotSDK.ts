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



  _approve_suggested_post?: ApproveSuggestedPostEntity

  // Idiomatic facade: `client.approve_suggested_post.list()` / `client.approve_suggested_post.load({ id })`.
  get approve_suggested_post(): ApproveSuggestedPostEntity {
    return (this._approve_suggested_post ??= new ApproveSuggestedPostEntity(this, undefined))
  }

  /** @deprecated Use `client.approve_suggested_post` instead. */
  ApproveSuggestedPost(data?: any) {
    const self = this
    return new ApproveSuggestedPostEntity(self,data)
  }


  _decline_suggested_post?: DeclineSuggestedPostEntity

  // Idiomatic facade: `client.decline_suggested_post.list()` / `client.decline_suggested_post.load({ id })`.
  get decline_suggested_post(): DeclineSuggestedPostEntity {
    return (this._decline_suggested_post ??= new DeclineSuggestedPostEntity(this, undefined))
  }

  /** @deprecated Use `client.decline_suggested_post` instead. */
  DeclineSuggestedPost(data?: any) {
    const self = this
    return new DeclineSuggestedPostEntity(self,data)
  }


  _delete_forum_topic?: DeleteForumTopicEntity

  // Idiomatic facade: `client.delete_forum_topic.list()` / `client.delete_forum_topic.load({ id })`.
  get delete_forum_topic(): DeleteForumTopicEntity {
    return (this._delete_forum_topic ??= new DeleteForumTopicEntity(this, undefined))
  }

  /** @deprecated Use `client.delete_forum_topic` instead. */
  DeleteForumTopic(data?: any) {
    const self = this
    return new DeleteForumTopicEntity(self,data)
  }


  _edit_forum_topic?: EditForumTopicEntity

  // Idiomatic facade: `client.edit_forum_topic.list()` / `client.edit_forum_topic.load({ id })`.
  get edit_forum_topic(): EditForumTopicEntity {
    return (this._edit_forum_topic ??= new EditForumTopicEntity(this, undefined))
  }

  /** @deprecated Use `client.edit_forum_topic` instead. */
  EditForumTopic(data?: any) {
    const self = this
    return new EditForumTopicEntity(self,data)
  }


  _file?: FileEntity

  // Idiomatic facade: `client.file.list()` / `client.file.load({ id })`.
  get file(): FileEntity {
    return (this._file ??= new FileEntity(this, undefined))
  }

  /** @deprecated Use `client.file` instead. */
  File(data?: any) {
    const self = this
    return new FileEntity(self,data)
  }


  _forum_topic?: ForumTopicEntity

  // Idiomatic facade: `client.forum_topic.list()` / `client.forum_topic.load({ id })`.
  get forum_topic(): ForumTopicEntity {
    return (this._forum_topic ??= new ForumTopicEntity(this, undefined))
  }

  /** @deprecated Use `client.forum_topic` instead. */
  ForumTopic(data?: any) {
    const self = this
    return new ForumTopicEntity(self,data)
  }


  _get_business_account_gift?: GetBusinessAccountGiftEntity

  // Idiomatic facade: `client.get_business_account_gift.list()` / `client.get_business_account_gift.load({ id })`.
  get get_business_account_gift(): GetBusinessAccountGiftEntity {
    return (this._get_business_account_gift ??= new GetBusinessAccountGiftEntity(this, undefined))
  }

  /** @deprecated Use `client.get_business_account_gift` instead. */
  GetBusinessAccountGift(data?: any) {
    const self = this
    return new GetBusinessAccountGiftEntity(self,data)
  }


  _get_chat_gift?: GetChatGiftEntity

  // Idiomatic facade: `client.get_chat_gift.list()` / `client.get_chat_gift.load({ id })`.
  get get_chat_gift(): GetChatGiftEntity {
    return (this._get_chat_gift ??= new GetChatGiftEntity(this, undefined))
  }

  /** @deprecated Use `client.get_chat_gift` instead. */
  GetChatGift(data?: any) {
    const self = this
    return new GetChatGiftEntity(self,data)
  }


  _get_me?: GetMeEntity

  // Idiomatic facade: `client.get_me.list()` / `client.get_me.load({ id })`.
  get get_me(): GetMeEntity {
    return (this._get_me ??= new GetMeEntity(this, undefined))
  }

  /** @deprecated Use `client.get_me` instead. */
  GetMe(data?: any) {
    const self = this
    return new GetMeEntity(self,data)
  }


  _get_user_gift?: GetUserGiftEntity

  // Idiomatic facade: `client.get_user_gift.list()` / `client.get_user_gift.load({ id })`.
  get get_user_gift(): GetUserGiftEntity {
    return (this._get_user_gift ??= new GetUserGiftEntity(this, undefined))
  }

  /** @deprecated Use `client.get_user_gift` instead. */
  GetUserGift(data?: any) {
    const self = this
    return new GetUserGiftEntity(self,data)
  }


  _get_user_profile_audio?: GetUserProfileAudioEntity

  // Idiomatic facade: `client.get_user_profile_audio.list()` / `client.get_user_profile_audio.load({ id })`.
  get get_user_profile_audio(): GetUserProfileAudioEntity {
    return (this._get_user_profile_audio ??= new GetUserProfileAudioEntity(this, undefined))
  }

  /** @deprecated Use `client.get_user_profile_audio` instead. */
  GetUserProfileAudio(data?: any) {
    const self = this
    return new GetUserProfileAudioEntity(self,data)
  }


  _message?: MessageEntity

  // Idiomatic facade: `client.message.list()` / `client.message.load({ id })`.
  get message(): MessageEntity {
    return (this._message ??= new MessageEntity(this, undefined))
  }

  /** @deprecated Use `client.message` instead. */
  Message(data?: any) {
    const self = this
    return new MessageEntity(self,data)
  }


  _message_id?: MessageIdEntity

  // Idiomatic facade: `client.message_id.list()` / `client.message_id.load({ id })`.
  get message_id(): MessageIdEntity {
    return (this._message_id ??= new MessageIdEntity(this, undefined))
  }

  /** @deprecated Use `client.message_id` instead. */
  MessageId(data?: any) {
    const self = this
    return new MessageIdEntity(self,data)
  }


  _promote_chat_member?: PromoteChatMemberEntity

  // Idiomatic facade: `client.promote_chat_member.list()` / `client.promote_chat_member.load({ id })`.
  get promote_chat_member(): PromoteChatMemberEntity {
    return (this._promote_chat_member ??= new PromoteChatMemberEntity(this, undefined))
  }

  /** @deprecated Use `client.promote_chat_member` instead. */
  PromoteChatMember(data?: any) {
    const self = this
    return new PromoteChatMemberEntity(self,data)
  }


  _remove_my_profile_photo?: RemoveMyProfilePhotoEntity

  // Idiomatic facade: `client.remove_my_profile_photo.list()` / `client.remove_my_profile_photo.load({ id })`.
  get remove_my_profile_photo(): RemoveMyProfilePhotoEntity {
    return (this._remove_my_profile_photo ??= new RemoveMyProfilePhotoEntity(this, undefined))
  }

  /** @deprecated Use `client.remove_my_profile_photo` instead. */
  RemoveMyProfilePhoto(data?: any) {
    const self = this
    return new RemoveMyProfilePhotoEntity(self,data)
  }


  _repost_story?: RepostStoryEntity

  // Idiomatic facade: `client.repost_story.list()` / `client.repost_story.load({ id })`.
  get repost_story(): RepostStoryEntity {
    return (this._repost_story ??= new RepostStoryEntity(this, undefined))
  }

  /** @deprecated Use `client.repost_story` instead. */
  RepostStory(data?: any) {
    const self = this
    return new RepostStoryEntity(self,data)
  }


  _send_chat_action?: SendChatActionEntity

  // Idiomatic facade: `client.send_chat_action.list()` / `client.send_chat_action.load({ id })`.
  get send_chat_action(): SendChatActionEntity {
    return (this._send_chat_action ??= new SendChatActionEntity(this, undefined))
  }

  /** @deprecated Use `client.send_chat_action` instead. */
  SendChatAction(data?: any) {
    const self = this
    return new SendChatActionEntity(self,data)
  }


  _send_message_draft?: SendMessageDraftEntity

  // Idiomatic facade: `client.send_message_draft.list()` / `client.send_message_draft.load({ id })`.
  get send_message_draft(): SendMessageDraftEntity {
    return (this._send_message_draft ??= new SendMessageDraftEntity(this, undefined))
  }

  /** @deprecated Use `client.send_message_draft` instead. */
  SendMessageDraft(data?: any) {
    const self = this
    return new SendMessageDraftEntity(self,data)
  }


  _set_my_profile_photo?: SetMyProfilePhotoEntity

  // Idiomatic facade: `client.set_my_profile_photo.list()` / `client.set_my_profile_photo.load({ id })`.
  get set_my_profile_photo(): SetMyProfilePhotoEntity {
    return (this._set_my_profile_photo ??= new SetMyProfilePhotoEntity(this, undefined))
  }

  /** @deprecated Use `client.set_my_profile_photo` instead. */
  SetMyProfilePhoto(data?: any) {
    const self = this
    return new SetMyProfilePhotoEntity(self,data)
  }


  _unpin_all_forum_topic_message?: UnpinAllForumTopicMessageEntity

  // Idiomatic facade: `client.unpin_all_forum_topic_message.list()` / `client.unpin_all_forum_topic_message.load({ id })`.
  get unpin_all_forum_topic_message(): UnpinAllForumTopicMessageEntity {
    return (this._unpin_all_forum_topic_message ??= new UnpinAllForumTopicMessageEntity(this, undefined))
  }

  /** @deprecated Use `client.unpin_all_forum_topic_message` instead. */
  UnpinAllForumTopicMessage(data?: any) {
    const self = this
    return new UnpinAllForumTopicMessageEntity(self,data)
  }


  _update?: UpdateEntity

  // Idiomatic facade: `client.update.list()` / `client.update.load({ id })`.
  get update(): UpdateEntity {
    return (this._update ??= new UpdateEntity(this, undefined))
  }

  /** @deprecated Use `client.update` instead. */
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


