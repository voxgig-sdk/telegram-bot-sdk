# TelegramBot SDK

from telegrambot_sdk.utility.voxgig_struct import voxgig_struct as vs
from telegrambot_sdk.core.utility_type import TelegramBotUtility
from telegrambot_sdk.core.spec import TelegramBotSpec
from telegrambot_sdk.core import helpers

# Load utility registration (populates Utility._registrar)
from telegrambot_sdk.utility import register

# Load features
from telegrambot_sdk.feature.base_feature import TelegramBotBaseFeature
from telegrambot_sdk.features import _make_feature


class TelegramBotSDK:

    def __init__(self, options=None):
        self.mode = "live"
        self.features = []
        self.options = None

        utility = TelegramBotUtility()
        self._utility = utility

        from telegrambot_sdk.config import shared_config
        config = shared_config()

        self._rootctx = utility.make_context({
            "client": self,
            "utility": utility,
            "config": config,
            "options": options if options is not None else {},
            "shared": {},
        }, None)

        self.options = utility.make_options(self._rootctx)

        if vs.getpath(self.options, "feature.test.active") is True:
            self.mode = "test"

        self._rootctx.options = self.options

        # Add features in the resolved order (make_options puts an explicit
        # list order first, else defaults to test-first). Ordering matters: the
        # `test` feature installs the base mock transport and the transport
        # features (retry/cache/netsim/proxy/ratelimit) wrap whatever is
        # current, so `test` must be added before them to sit at the base.
        feature_opts = helpers.to_map(vs.getprop(self.options, "feature"))
        if feature_opts is not None:
            featureorder = vs.getpath(self.options, "__derived__.featureorder")
            if isinstance(featureorder, list):
                for fname in featureorder:
                    fopts = helpers.to_map(feature_opts.get(fname))
                    if fopts is not None and fopts.get("active") is True:
                        utility.feature_add(self._rootctx, _make_feature(fname))

        # Add extension features.
        extend = vs.getprop(self.options, "extend")
        if isinstance(extend, list):
            for f in extend:
                if isinstance(f, dict) or (hasattr(f, "get_name") and callable(f.get_name)):
                    utility.feature_add(self._rootctx, f)

        # Initialize features.
        for f in self.features:
            utility.feature_init(self._rootctx, f)

        utility.feature_hook(self._rootctx, "PostConstruct")

        # #BuildFeatures

    def options_map(self):
        out = vs.clone(self.options)
        if isinstance(out, dict):
            return out
        return {}

    def get_utility(self):
        return TelegramBotUtility.copy(self._utility)

    def get_root_ctx(self):
        return self._rootctx

    def prepare(self, fetchargs=None):
        utility = self._utility

        if fetchargs is None:
            fetchargs = {}

        ctrl = helpers.to_map(vs.getprop(fetchargs, "ctrl"))
        if ctrl is None:
            ctrl = {}

        ctx = utility.make_context({
            "opname": "prepare",
            "ctrl": ctrl,
        }, self._rootctx)

        options = self.options

        path = vs.getprop(fetchargs, "path") or ""
        if not isinstance(path, str):
            path = ""

        method = vs.getprop(fetchargs, "method") or "GET"
        if not isinstance(method, str):
            method = "GET"

        params = helpers.to_map(vs.getprop(fetchargs, "params"))
        if params is None:
            params = {}
        query = helpers.to_map(vs.getprop(fetchargs, "query"))
        if query is None:
            query = {}

        headers = utility.prepare_headers(ctx)

        base = vs.getprop(options, "base") or ""
        if not isinstance(base, str):
            base = ""
        prefix = vs.getprop(options, "prefix") or ""
        if not isinstance(prefix, str):
            prefix = ""
        suffix = vs.getprop(options, "suffix") or ""
        if not isinstance(suffix, str):
            suffix = ""

        ctx.spec = TelegramBotSpec({
            "base": base,
            "prefix": prefix,
            "suffix": suffix,
            "path": path,
            "method": method,
            "params": params,
            "query": query,
            "headers": headers,
            "body": vs.getprop(fetchargs, "body"),
            "step": "start",
        })

        # Merge user-provided headers.
        uh = vs.getprop(fetchargs, "headers")
        if isinstance(uh, dict):
            for k, v in uh.items():
                ctx.spec.headers[k] = v

        _, err = utility.prepare_auth(ctx)
        if err is not None:
            raise err

        fetchdef, err = utility.make_fetch_def(ctx)
        if err is not None:
            raise err

        return fetchdef

    # Raw endpoint access is operator-controllable, like every entity op.
    # Blocking it means denying BOTH the 'direct' and 'graphql' tokens, since
    # either one reaches the same endpoint.
    def direct(self, fetchargs=None):
        if not self._op_allowed("direct"):
            return self._op_denied("direct")

        return self._raw_request(fetchargs)

    # Is this raw-access op permitted by the SDK's allow.op option?
    def _op_allowed(self, op):
        allow_op = vs.getpath(self.options, "allow.op")
        return isinstance(allow_op, str) and op in allow_op

    def _op_denied(self, op):
        allow_op = vs.getpath(self.options, "allow.op")
        return {
            "ok": False,
            "err": Exception(
                "TelegramBotSDK: " + op + ": operation not allowed by"
                ' SDK option allow.op value: "' + str(allow_op) + '"'),
        }

    # Ungated request path shared by direct and graphql, each of which checks
    # its own allow.op token first. Private, rather than a flag on fetchargs:
    # a caller-supplied marker would let anyone opt straight back out of the
    # gate by passing it.
    def _raw_request(self, fetchargs=None):
        utility = self._utility

        try:
            fetchdef = self.prepare(fetchargs)
        except Exception as err:
            # direct() is the raw-HTTP escape hatch: it never raises, it
            # returns a result object callers branch on via result["ok"].
            return {"ok": False, "err": err}

        if fetchargs is None:
            fetchargs = {}
        ctrl = helpers.to_map(vs.getprop(fetchargs, "ctrl"))
        if ctrl is None:
            ctrl = {}

        ctx = utility.make_context({
            "opname": "direct",
            "ctrl": ctrl,
        }, self._rootctx)

        url = fetchdef.get("url", "")
        fetched, fetch_err = utility.fetcher(ctx, url, fetchdef)

        if fetch_err is not None:
            return {"ok": False, "err": fetch_err}

        if fetched is None:
            return {
                "ok": False,
                "err": ctx.make_error("direct_no_response", "response: undefined"),
            }

        if isinstance(fetched, dict):
            status = helpers.to_int(vs.getprop(fetched, "status"))
            headers = vs.getprop(fetched, "headers") or {}

            # No-body responses (204, 304) and explicit zero content-length
            # must skip JSON parsing — calling json() on an empty body raises.
            content_length = None
            if isinstance(headers, dict):
                content_length = headers.get("content-length")
            no_body = status in (204, 304) or str(content_length) == "0"

            json_data = None
            if not no_body:
                jf = vs.getprop(fetched, "json")
                if callable(jf):
                    try:
                        json_data = jf()
                    except Exception:
                        # Non-JSON body (e.g. text/plain, text/html). Surface
                        # status + headers but leave data as None.
                        json_data = None

            return {
                "ok": status >= 200 and status < 300,
                "status": status,
                "headers": headers,
                "data": json_data,
            }

        return {
            "ok": False,
            "err": ctx.make_error("direct_invalid", "invalid response type"),
        }

    # Raw GraphQL access: the pressure valve that makes the generated
    # surface's deliberate omissions (per-call selection sets, typed filter
    # builders, batching, subscriptions) livable — the whole schema stays
    # reachable.
    #
    # Thin wrapper over the same prepare/fetch path direct uses, with the one
    # thing raw direct cannot do for GraphQL: a GraphQL failure rides HTTP 200
    # as a top-level `errors` array, so status alone would report a failed
    # query as ok.
    #
    # NOTE: like direct, this bypasses the feature pipeline — no retry,
    # ratelimit or paging features apply.
    def graphql(self, query, variables=None, ctrl=None):
        if not self._op_allowed("graphql"):
            return self._op_denied("graphql")

        res = self._raw_request({
            "method": "POST",
            "headers": {"content-type": "application/json"},
            "body": {"query": query, "variables": variables or {}},
            "ctrl": ctrl or {},
        })

        # Errors are read BEFORE any status check: a GraphQL parse or
        # validation failure comes back as HTTP 400 carrying the standard
        # { errors: [...] } body, and the raw path represents a non-2xx as
        # ok:False with no err — so returning early on status would discard
        # the server's own diagnostics, which are the only useful part of
        # that response.
        errors = vs.getpath(res, "data.errors")

        if isinstance(errors, list) and 0 < len(errors):
            first = errors[0] if isinstance(errors[0], dict) else {}
            msg = first.get("message") or "graphql error"
            res["ok"] = False
            res["err"] = Exception("TelegramBotSDK: graphql: " + str(msg))
            res["graphql"] = errors

        return res


    def ApproveSuggestedPost(self, data=None) -> "ApproveSuggestedPostEntity":
        """Entity factory: client.ApproveSuggestedPost().list() / client.ApproveSuggestedPost().load({"id": ...})."""
        from telegrambot_sdk.entity.approve_suggested_post_entity import ApproveSuggestedPostEntity
        return ApproveSuggestedPostEntity(self, data)


    def DeclineSuggestedPost(self, data=None) -> "DeclineSuggestedPostEntity":
        """Entity factory: client.DeclineSuggestedPost().list() / client.DeclineSuggestedPost().load({"id": ...})."""
        from telegrambot_sdk.entity.decline_suggested_post_entity import DeclineSuggestedPostEntity
        return DeclineSuggestedPostEntity(self, data)


    def DeleteForumTopic(self, data=None) -> "DeleteForumTopicEntity":
        """Entity factory: client.DeleteForumTopic().list() / client.DeleteForumTopic().load({"id": ...})."""
        from telegrambot_sdk.entity.delete_forum_topic_entity import DeleteForumTopicEntity
        return DeleteForumTopicEntity(self, data)


    def EditForumTopic(self, data=None) -> "EditForumTopicEntity":
        """Entity factory: client.EditForumTopic().list() / client.EditForumTopic().load({"id": ...})."""
        from telegrambot_sdk.entity.edit_forum_topic_entity import EditForumTopicEntity
        return EditForumTopicEntity(self, data)


    def File(self, data=None) -> "FileEntity":
        """Entity factory: client.File().list() / client.File().load({"id": ...})."""
        from telegrambot_sdk.entity.file_entity import FileEntity
        return FileEntity(self, data)


    def ForumTopic(self, data=None) -> "ForumTopicEntity":
        """Entity factory: client.ForumTopic().list() / client.ForumTopic().load({"id": ...})."""
        from telegrambot_sdk.entity.forum_topic_entity import ForumTopicEntity
        return ForumTopicEntity(self, data)


    def GetBusinessAccountGift(self, data=None) -> "GetBusinessAccountGiftEntity":
        """Entity factory: client.GetBusinessAccountGift().list() / client.GetBusinessAccountGift().load({"id": ...})."""
        from telegrambot_sdk.entity.get_business_account_gift_entity import GetBusinessAccountGiftEntity
        return GetBusinessAccountGiftEntity(self, data)


    def GetChatGift(self, data=None) -> "GetChatGiftEntity":
        """Entity factory: client.GetChatGift().list() / client.GetChatGift().load({"id": ...})."""
        from telegrambot_sdk.entity.get_chat_gift_entity import GetChatGiftEntity
        return GetChatGiftEntity(self, data)


    def GetMe(self, data=None) -> "GetMeEntity":
        """Entity factory: client.GetMe().list() / client.GetMe().load({"id": ...})."""
        from telegrambot_sdk.entity.get_me_entity import GetMeEntity
        return GetMeEntity(self, data)


    def GetUserGift(self, data=None) -> "GetUserGiftEntity":
        """Entity factory: client.GetUserGift().list() / client.GetUserGift().load({"id": ...})."""
        from telegrambot_sdk.entity.get_user_gift_entity import GetUserGiftEntity
        return GetUserGiftEntity(self, data)


    def GetUserProfileAudio(self, data=None) -> "GetUserProfileAudioEntity":
        """Entity factory: client.GetUserProfileAudio().list() / client.GetUserProfileAudio().load({"id": ...})."""
        from telegrambot_sdk.entity.get_user_profile_audio_entity import GetUserProfileAudioEntity
        return GetUserProfileAudioEntity(self, data)


    def Message(self, data=None) -> "MessageEntity":
        """Entity factory: client.Message().list() / client.Message().load({"id": ...})."""
        from telegrambot_sdk.entity.message_entity import MessageEntity
        return MessageEntity(self, data)


    def MessageId(self, data=None) -> "MessageIdEntity":
        """Entity factory: client.MessageId().list() / client.MessageId().load({"id": ...})."""
        from telegrambot_sdk.entity.message_id_entity import MessageIdEntity
        return MessageIdEntity(self, data)


    def PromoteChatMember(self, data=None) -> "PromoteChatMemberEntity":
        """Entity factory: client.PromoteChatMember().list() / client.PromoteChatMember().load({"id": ...})."""
        from telegrambot_sdk.entity.promote_chat_member_entity import PromoteChatMemberEntity
        return PromoteChatMemberEntity(self, data)


    def RemoveMyProfilePhoto(self, data=None) -> "RemoveMyProfilePhotoEntity":
        """Entity factory: client.RemoveMyProfilePhoto().list() / client.RemoveMyProfilePhoto().load({"id": ...})."""
        from telegrambot_sdk.entity.remove_my_profile_photo_entity import RemoveMyProfilePhotoEntity
        return RemoveMyProfilePhotoEntity(self, data)


    def RepostStory(self, data=None) -> "RepostStoryEntity":
        """Entity factory: client.RepostStory().list() / client.RepostStory().load({"id": ...})."""
        from telegrambot_sdk.entity.repost_story_entity import RepostStoryEntity
        return RepostStoryEntity(self, data)


    def SendChatAction(self, data=None) -> "SendChatActionEntity":
        """Entity factory: client.SendChatAction().list() / client.SendChatAction().load({"id": ...})."""
        from telegrambot_sdk.entity.send_chat_action_entity import SendChatActionEntity
        return SendChatActionEntity(self, data)


    def SendMessageDraft(self, data=None) -> "SendMessageDraftEntity":
        """Entity factory: client.SendMessageDraft().list() / client.SendMessageDraft().load({"id": ...})."""
        from telegrambot_sdk.entity.send_message_draft_entity import SendMessageDraftEntity
        return SendMessageDraftEntity(self, data)


    def SetMyProfilePhoto(self, data=None) -> "SetMyProfilePhotoEntity":
        """Entity factory: client.SetMyProfilePhoto().list() / client.SetMyProfilePhoto().load({"id": ...})."""
        from telegrambot_sdk.entity.set_my_profile_photo_entity import SetMyProfilePhotoEntity
        return SetMyProfilePhotoEntity(self, data)


    def UnpinAllForumTopicMessage(self, data=None) -> "UnpinAllForumTopicMessageEntity":
        """Entity factory: client.UnpinAllForumTopicMessage().list() / client.UnpinAllForumTopicMessage().load({"id": ...})."""
        from telegrambot_sdk.entity.unpin_all_forum_topic_message_entity import UnpinAllForumTopicMessageEntity
        return UnpinAllForumTopicMessageEntity(self, data)


    def Update(self, data=None) -> "UpdateEntity":
        """Entity factory: client.Update().list() / client.Update().load({"id": ...})."""
        from telegrambot_sdk.entity.update_entity import UpdateEntity
        return UpdateEntity(self, data)



    @classmethod
    def test(cls, testopts=None, sdkopts=None) -> "TelegramBotSDK":
        if sdkopts is None:
            sdkopts = {}
        sdkopts = vs.clone(sdkopts)
        if not isinstance(sdkopts, dict):
            sdkopts = {}

        if testopts is None:
            testopts = {}
        testopts = vs.clone(testopts)
        if not isinstance(testopts, dict):
            testopts = {}
        testopts["active"] = True

        vs.setpath(sdkopts, "feature.test", testopts)

        sdk = cls(sdkopts)
        sdk.mode = "test"

        return sdk


from typing import TYPE_CHECKING

if TYPE_CHECKING:
    from telegrambot_sdk.entity.approve_suggested_post_entity import ApproveSuggestedPostEntity
    from telegrambot_sdk.entity.decline_suggested_post_entity import DeclineSuggestedPostEntity
    from telegrambot_sdk.entity.delete_forum_topic_entity import DeleteForumTopicEntity
    from telegrambot_sdk.entity.edit_forum_topic_entity import EditForumTopicEntity
    from telegrambot_sdk.entity.file_entity import FileEntity
    from telegrambot_sdk.entity.forum_topic_entity import ForumTopicEntity
    from telegrambot_sdk.entity.get_business_account_gift_entity import GetBusinessAccountGiftEntity
    from telegrambot_sdk.entity.get_chat_gift_entity import GetChatGiftEntity
    from telegrambot_sdk.entity.get_me_entity import GetMeEntity
    from telegrambot_sdk.entity.get_user_gift_entity import GetUserGiftEntity
    from telegrambot_sdk.entity.get_user_profile_audio_entity import GetUserProfileAudioEntity
    from telegrambot_sdk.entity.message_entity import MessageEntity
    from telegrambot_sdk.entity.message_id_entity import MessageIdEntity
    from telegrambot_sdk.entity.promote_chat_member_entity import PromoteChatMemberEntity
    from telegrambot_sdk.entity.remove_my_profile_photo_entity import RemoveMyProfilePhotoEntity
    from telegrambot_sdk.entity.repost_story_entity import RepostStoryEntity
    from telegrambot_sdk.entity.send_chat_action_entity import SendChatActionEntity
    from telegrambot_sdk.entity.send_message_draft_entity import SendMessageDraftEntity
    from telegrambot_sdk.entity.set_my_profile_photo_entity import SetMyProfilePhotoEntity
    from telegrambot_sdk.entity.unpin_all_forum_topic_message_entity import UnpinAllForumTopicMessageEntity
    from telegrambot_sdk.entity.update_entity import UpdateEntity
