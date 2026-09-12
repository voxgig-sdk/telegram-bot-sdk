"use strict";
// TelegramBot Ts SDK
Object.defineProperty(exports, "__esModule", { value: true });
exports.SDK = exports.TelegramBotSDK = exports.TelegramBotEntityBase = exports.BaseFeature = exports.config = exports.stdutil = void 0;
const ApproveSuggestedPostEntity_1 = require("./entity/ApproveSuggestedPostEntity");
const DeclineSuggestedPostEntity_1 = require("./entity/DeclineSuggestedPostEntity");
const DeleteForumTopicEntity_1 = require("./entity/DeleteForumTopicEntity");
const EditForumTopicEntity_1 = require("./entity/EditForumTopicEntity");
const FileEntity_1 = require("./entity/FileEntity");
const ForumTopicEntity_1 = require("./entity/ForumTopicEntity");
const GetBusinessAccountGiftEntity_1 = require("./entity/GetBusinessAccountGiftEntity");
const GetChatGiftEntity_1 = require("./entity/GetChatGiftEntity");
const GetMeEntity_1 = require("./entity/GetMeEntity");
const GetUserGiftEntity_1 = require("./entity/GetUserGiftEntity");
const GetUserProfileAudioEntity_1 = require("./entity/GetUserProfileAudioEntity");
const MessageEntity_1 = require("./entity/MessageEntity");
const MessageIdEntity_1 = require("./entity/MessageIdEntity");
const PromoteChatMemberEntity_1 = require("./entity/PromoteChatMemberEntity");
const RemoveMyProfilePhotoEntity_1 = require("./entity/RemoveMyProfilePhotoEntity");
const RepostStoryEntity_1 = require("./entity/RepostStoryEntity");
const SendChatActionEntity_1 = require("./entity/SendChatActionEntity");
const SendMessageDraftEntity_1 = require("./entity/SendMessageDraftEntity");
const SetMyProfilePhotoEntity_1 = require("./entity/SetMyProfilePhotoEntity");
const UnpinAllForumTopicMessageEntity_1 = require("./entity/UnpinAllForumTopicMessageEntity");
const UpdateEntity_1 = require("./entity/UpdateEntity");
const node_util_1 = require("node:util");
const Config_1 = require("./Config");
Object.defineProperty(exports, "config", { enumerable: true, get: function () { return Config_1.config; } });
const TelegramBotEntityBase_1 = require("./TelegramBotEntityBase");
Object.defineProperty(exports, "TelegramBotEntityBase", { enumerable: true, get: function () { return TelegramBotEntityBase_1.TelegramBotEntityBase; } });
const Utility_1 = require("./utility/Utility");
const BaseFeature_1 = require("./feature/base/BaseFeature");
Object.defineProperty(exports, "BaseFeature", { enumerable: true, get: function () { return BaseFeature_1.BaseFeature; } });
const stdutil = new Utility_1.Utility();
exports.stdutil = stdutil;
class TelegramBotSDK {
    _mode = 'live';
    _options;
    _utility = new Utility_1.Utility();
    _features;
    _rootctx;
    constructor(options) {
        this._rootctx = this._utility.makeContext({
            client: this,
            utility: this._utility,
            config: Config_1.config,
            options,
            shared: new WeakMap()
        });
        this._options = this._utility.makeOptions(this._rootctx);
        const struct = this._utility.struct;
        const getpath = struct.getpath;
        if (true === getpath(this._options.feature, 'test.active')) {
            this._mode = 'test';
        }
        this._rootctx.options = this._options;
        this._features = [];
        const featureAdd = this._utility.featureAdd;
        const featureInit = this._utility.featureInit;
        // Add features in the resolved order (makeOptions puts an explicit
        // array order first, else defaults to test-first). Ordering matters:
        // the `test` feature installs the base mock transport and the transport
        // features (retry/cache/netsim/proxy/ratelimit) wrap whatever is current,
        // so `test` must be added before them to sit at the base of the chain.
        const extend = this._options.extend || [];
        const featureorder = getpath(this._options, '__derived__.featureorder') || [];
        for (const fname of featureorder) {
            const fopts = this._options.feature[fname] || {};
            if (fopts.active) {
                // An active name with no generated class is legal when an
                // extend-supplied instance carries that name (station's adopt
                // path): the instance is added below, positioned by its own
                // __after__ entry, so skip it here rather than fail construction.
                if (!this._rootctx.config.hasFeature(fname) &&
                    extend.some((f) => fname === f.name)) {
                    continue;
                }
                featureAdd(this._rootctx, this._rootctx.config.makeFeature(fname));
            }
        }
        for (let f of extend) {
            featureAdd(this._rootctx, f);
        }
        for (let f of this._features) {
            featureInit(this._rootctx, f);
        }
        const featureHook = this._utility.featureHook;
        featureHook(this._rootctx, 'PostConstruct');
    }
    options() {
        return this._utility.struct.clone(this._options);
    }
    utility() {
        return this._utility.struct.clone(this._utility);
    }
    async prepare(fetchargs) {
        const utility = this._utility;
        const struct = utility.struct;
        const clone = struct.clone;
        const { makeContext, makeFetchDef, prepareHeaders, prepareAuth, } = utility;
        fetchargs = fetchargs || {};
        let ctx = makeContext({
            opname: 'prepare',
            ctrl: fetchargs.ctrl || {},
        }, this._rootctx);
        const options = this._options;
        // Build spec directly from SDK options + user-provided fetch args.
        const spec = {
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
        };
        ctx.spec = spec;
        // Merge user-provided headers over SDK defaults.
        if (fetchargs.headers) {
            const uheaders = fetchargs.headers;
            for (let key in uheaders) {
                spec.headers[key] = uheaders[key];
            }
        }
        // Apply SDK auth (apikey, auth prefix, etc.)
        const authResult = prepareAuth(ctx);
        if (authResult instanceof Error) {
            return authResult;
        }
        return makeFetchDef(ctx);
    }
    // Raw endpoint access is operator-controllable, like every entity op.
    // Blocking it means denying BOTH the 'direct' and 'graphql' tokens, since
    // either one reaches the same endpoint.
    async direct(fetchargs) {
        if (!this._options.allow.op.includes('direct')) {
            return {
                ok: false,
                err: new Error('TelegramBotSDK: direct: operation not allowed by' +
                    ' SDK option allow.op value: "' + this._options.allow.op + '"'),
            };
        }
        return this._rawRequest(fetchargs);
    }
    // Ungated request path shared by direct() and graphql(), each of which
    // checks its own allow.op token first. Private, rather than a flag on
    // fetchargs: a caller-supplied marker would let anyone opt straight back
    // out of the gate by passing it.
    async _rawRequest(fetchargs) {
        const utility = this._utility;
        const fetcher = utility.fetcher;
        const makeContext = utility.makeContext;
        const fetchdef = await this.prepare(fetchargs);
        if (fetchdef instanceof Error) {
            return fetchdef;
        }
        let ctx = makeContext({
            opname: 'direct',
            ctrl: (fetchargs || {}).ctrl || {},
        }, this._rootctx);
        try {
            const fetched = await fetcher(ctx, fetchdef.url, fetchdef);
            if (null == fetched) {
                return { ok: false, err: ctx.error('direct_no_response', 'response: undefined') };
            }
            else if (fetched instanceof Error) {
                return { ok: false, err: fetched };
            }
            const status = fetched.status;
            // No body responses (204 No Content, 304 Not Modified) and explicit
            // zero content-length must skip JSON parsing — fetched.json() would
            // throw `Unexpected end of JSON input` on an empty body.
            const headers = fetched.headers;
            const contentLength = headers && 'function' === typeof headers.get
                ? headers.get('content-length')
                : (headers || {})['content-length'];
            const noBody = 204 === status || 304 === status || '0' === String(contentLength);
            let json = undefined;
            if (!noBody) {
                try {
                    json = 'function' === typeof fetched.json ? await fetched.json() : fetched.json;
                }
                catch (parseErr) {
                    // Body wasn't valid JSON — surface the raw response rather than
                    // throwing. data stays undefined; callers can inspect status/headers.
                    json = undefined;
                }
            }
            return {
                ok: status >= 200 && status < 300,
                status,
                headers: fetched.headers,
                data: json,
            };
        }
        catch (err) {
            return { ok: false, err };
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
    async graphql(query, variables, ctrl) {
        const options = this._options;
        if (!options.allow.op.includes('graphql')) {
            return {
                ok: false,
                err: new Error('TelegramBotSDK: graphql: operation not allowed by' +
                    ' SDK option allow.op value: "' + options.allow.op + '"'),
            };
        }
        const res = await this._rawRequest({
            method: 'POST',
            headers: { 'content-type': 'application/json' },
            body: { query, variables: variables || {} },
            ctrl,
        });
        if (res instanceof Error) {
            return res;
        }
        // Errors are read BEFORE any status check: a GraphQL parse or validation
        // failure comes back as HTTP 400 carrying the standard { errors: [...] }
        // body, and the raw path represents a non-2xx as { ok: false } with no
        // err — so returning early on status would discard the server's own
        // diagnostics, which are the only useful part of that response.
        const errors = null == res.data ? undefined : res.data.errors;
        if (null != errors && Array.isArray(errors) && 0 < errors.length) {
            const first = errors[0] || {};
            const err = new Error('TelegramBotSDK: graphql: ' +
                (first.message || 'graphql error'));
            err.graphql = errors;
            return { ok: false, status: res.status, headers: res.headers, err, data: res.data };
        }
        return res;
    }
    // Entity access: `client.ApproveSuggestedPost().list()` / `client.ApproveSuggestedPost().load({ id })`.
    // The argument is the entity OPTIONS object (passed to the entity
    // constructor as entopts), not initial entity data.
    ApproveSuggestedPost(entopts) {
        const self = this;
        return new ApproveSuggestedPostEntity_1.ApproveSuggestedPostEntity(self, entopts);
    }
    // Entity access: `client.DeclineSuggestedPost().list()` / `client.DeclineSuggestedPost().load({ id })`.
    // The argument is the entity OPTIONS object (passed to the entity
    // constructor as entopts), not initial entity data.
    DeclineSuggestedPost(entopts) {
        const self = this;
        return new DeclineSuggestedPostEntity_1.DeclineSuggestedPostEntity(self, entopts);
    }
    // Entity access: `client.DeleteForumTopic().list()` / `client.DeleteForumTopic().load({ id })`.
    // The argument is the entity OPTIONS object (passed to the entity
    // constructor as entopts), not initial entity data.
    DeleteForumTopic(entopts) {
        const self = this;
        return new DeleteForumTopicEntity_1.DeleteForumTopicEntity(self, entopts);
    }
    // Entity access: `client.EditForumTopic().list()` / `client.EditForumTopic().load({ id })`.
    // The argument is the entity OPTIONS object (passed to the entity
    // constructor as entopts), not initial entity data.
    EditForumTopic(entopts) {
        const self = this;
        return new EditForumTopicEntity_1.EditForumTopicEntity(self, entopts);
    }
    // Entity access: `client.File().list()` / `client.File().load({ id })`.
    // The argument is the entity OPTIONS object (passed to the entity
    // constructor as entopts), not initial entity data.
    File(entopts) {
        const self = this;
        return new FileEntity_1.FileEntity(self, entopts);
    }
    // Entity access: `client.ForumTopic().list()` / `client.ForumTopic().load({ id })`.
    // The argument is the entity OPTIONS object (passed to the entity
    // constructor as entopts), not initial entity data.
    ForumTopic(entopts) {
        const self = this;
        return new ForumTopicEntity_1.ForumTopicEntity(self, entopts);
    }
    // Entity access: `client.GetBusinessAccountGift().list()` / `client.GetBusinessAccountGift().load({ id })`.
    // The argument is the entity OPTIONS object (passed to the entity
    // constructor as entopts), not initial entity data.
    GetBusinessAccountGift(entopts) {
        const self = this;
        return new GetBusinessAccountGiftEntity_1.GetBusinessAccountGiftEntity(self, entopts);
    }
    // Entity access: `client.GetChatGift().list()` / `client.GetChatGift().load({ id })`.
    // The argument is the entity OPTIONS object (passed to the entity
    // constructor as entopts), not initial entity data.
    GetChatGift(entopts) {
        const self = this;
        return new GetChatGiftEntity_1.GetChatGiftEntity(self, entopts);
    }
    // Entity access: `client.GetMe().list()` / `client.GetMe().load({ id })`.
    // The argument is the entity OPTIONS object (passed to the entity
    // constructor as entopts), not initial entity data.
    GetMe(entopts) {
        const self = this;
        return new GetMeEntity_1.GetMeEntity(self, entopts);
    }
    // Entity access: `client.GetUserGift().list()` / `client.GetUserGift().load({ id })`.
    // The argument is the entity OPTIONS object (passed to the entity
    // constructor as entopts), not initial entity data.
    GetUserGift(entopts) {
        const self = this;
        return new GetUserGiftEntity_1.GetUserGiftEntity(self, entopts);
    }
    // Entity access: `client.GetUserProfileAudio().list()` / `client.GetUserProfileAudio().load({ id })`.
    // The argument is the entity OPTIONS object (passed to the entity
    // constructor as entopts), not initial entity data.
    GetUserProfileAudio(entopts) {
        const self = this;
        return new GetUserProfileAudioEntity_1.GetUserProfileAudioEntity(self, entopts);
    }
    // Entity access: `client.Message().list()` / `client.Message().load({ id })`.
    // The argument is the entity OPTIONS object (passed to the entity
    // constructor as entopts), not initial entity data.
    Message(entopts) {
        const self = this;
        return new MessageEntity_1.MessageEntity(self, entopts);
    }
    // Entity access: `client.MessageId().list()` / `client.MessageId().load({ id })`.
    // The argument is the entity OPTIONS object (passed to the entity
    // constructor as entopts), not initial entity data.
    MessageId(entopts) {
        const self = this;
        return new MessageIdEntity_1.MessageIdEntity(self, entopts);
    }
    // Entity access: `client.PromoteChatMember().list()` / `client.PromoteChatMember().load({ id })`.
    // The argument is the entity OPTIONS object (passed to the entity
    // constructor as entopts), not initial entity data.
    PromoteChatMember(entopts) {
        const self = this;
        return new PromoteChatMemberEntity_1.PromoteChatMemberEntity(self, entopts);
    }
    // Entity access: `client.RemoveMyProfilePhoto().list()` / `client.RemoveMyProfilePhoto().load({ id })`.
    // The argument is the entity OPTIONS object (passed to the entity
    // constructor as entopts), not initial entity data.
    RemoveMyProfilePhoto(entopts) {
        const self = this;
        return new RemoveMyProfilePhotoEntity_1.RemoveMyProfilePhotoEntity(self, entopts);
    }
    // Entity access: `client.RepostStory().list()` / `client.RepostStory().load({ id })`.
    // The argument is the entity OPTIONS object (passed to the entity
    // constructor as entopts), not initial entity data.
    RepostStory(entopts) {
        const self = this;
        return new RepostStoryEntity_1.RepostStoryEntity(self, entopts);
    }
    // Entity access: `client.SendChatAction().list()` / `client.SendChatAction().load({ id })`.
    // The argument is the entity OPTIONS object (passed to the entity
    // constructor as entopts), not initial entity data.
    SendChatAction(entopts) {
        const self = this;
        return new SendChatActionEntity_1.SendChatActionEntity(self, entopts);
    }
    // Entity access: `client.SendMessageDraft().list()` / `client.SendMessageDraft().load({ id })`.
    // The argument is the entity OPTIONS object (passed to the entity
    // constructor as entopts), not initial entity data.
    SendMessageDraft(entopts) {
        const self = this;
        return new SendMessageDraftEntity_1.SendMessageDraftEntity(self, entopts);
    }
    // Entity access: `client.SetMyProfilePhoto().list()` / `client.SetMyProfilePhoto().load({ id })`.
    // The argument is the entity OPTIONS object (passed to the entity
    // constructor as entopts), not initial entity data.
    SetMyProfilePhoto(entopts) {
        const self = this;
        return new SetMyProfilePhotoEntity_1.SetMyProfilePhotoEntity(self, entopts);
    }
    // Entity access: `client.UnpinAllForumTopicMessage().list()` / `client.UnpinAllForumTopicMessage().load({ id })`.
    // The argument is the entity OPTIONS object (passed to the entity
    // constructor as entopts), not initial entity data.
    UnpinAllForumTopicMessage(entopts) {
        const self = this;
        return new UnpinAllForumTopicMessageEntity_1.UnpinAllForumTopicMessageEntity(self, entopts);
    }
    // Entity access: `client.Update().list()` / `client.Update().load({ id })`.
    // The argument is the entity OPTIONS object (passed to the entity
    // constructor as entopts), not initial entity data.
    Update(entopts) {
        const self = this;
        return new UpdateEntity_1.UpdateEntity(self, entopts);
    }
    static test(testoptsarg, sdkoptsarg) {
        const struct = stdutil.struct;
        const setpath = struct.setpath;
        const getdef = struct.getdef;
        const clone = struct.clone;
        const setprop = struct.setprop;
        const sdkopts = getdef(clone(sdkoptsarg), {});
        const testopts = getdef(clone(testoptsarg), {});
        setprop(testopts, 'active', true);
        setpath(sdkopts, 'feature.test', testopts);
        const testsdk = new TelegramBotSDK(sdkopts);
        testsdk._mode = 'test';
        return testsdk;
    }
    tester(testopts, sdkopts) {
        return TelegramBotSDK.test(testopts, sdkopts);
    }
    toJSON() {
        return { name: 'TelegramBot' };
    }
    toString() {
        return 'TelegramBot ' + this._utility.struct.jsonify(this.toJSON());
    }
    [node_util_1.inspect.custom]() {
        return this.toString();
    }
}
exports.TelegramBotSDK = TelegramBotSDK;
const SDK = TelegramBotSDK;
exports.SDK = SDK;
//# sourceMappingURL=TelegramBotSDK.js.map