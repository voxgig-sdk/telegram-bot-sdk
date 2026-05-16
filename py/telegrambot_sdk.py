# TelegramBot SDK

from utility.voxgig_struct import voxgig_struct as vs
from core.utility_type import TelegramBotUtility
from core.spec import TelegramBotSpec
from core import helpers

# Load utility registration (populates Utility._registrar)
from utility import register

# Load features
from feature.base_feature import TelegramBotBaseFeature
from features import _make_feature


class TelegramBotSDK:

    def __init__(self, options=None):
        self.mode = "live"
        self.features = []
        self.options = None

        utility = TelegramBotUtility()
        self._utility = utility

        from config import make_config
        config = make_config()

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

        # Add features from config.
        feature_opts = helpers.to_map(vs.getprop(self.options, "feature"))
        if feature_opts is not None:
            feature_items = vs.items(feature_opts)
            if feature_items is not None:
                for item in feature_items:
                    fname = item[0]
                    fopts = helpers.to_map(item[1])
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
            return None, err

        return utility.make_fetch_def(ctx)

    def direct(self, fetchargs=None):
        utility = self._utility

        fetchdef, err = self.prepare(fetchargs)
        if err is not None:
            return {"ok": False, "err": err}, None

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
            return {"ok": False, "err": fetch_err}, None

        if fetched is None:
            return {
                "ok": False,
                "err": ctx.make_error("direct_no_response", "response: undefined"),
            }, None

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
            }, None

        return {
            "ok": False,
            "err": ctx.make_error("direct_invalid", "invalid response type"),
        }, None


    def ApproveSuggestedPost(self, data=None):
        from entity.approve_suggested_post_entity import ApproveSuggestedPostEntity
        return ApproveSuggestedPostEntity(self, data)


    def DeclineSuggestedPost(self, data=None):
        from entity.decline_suggested_post_entity import DeclineSuggestedPostEntity
        return DeclineSuggestedPostEntity(self, data)


    def DeleteForumTopic(self, data=None):
        from entity.delete_forum_topic_entity import DeleteForumTopicEntity
        return DeleteForumTopicEntity(self, data)


    def EditForumTopic(self, data=None):
        from entity.edit_forum_topic_entity import EditForumTopicEntity
        return EditForumTopicEntity(self, data)


    def File(self, data=None):
        from entity.file_entity import FileEntity
        return FileEntity(self, data)


    def ForumTopic(self, data=None):
        from entity.forum_topic_entity import ForumTopicEntity
        return ForumTopicEntity(self, data)


    def GetBusinessAccountGift(self, data=None):
        from entity.get_business_account_gift_entity import GetBusinessAccountGiftEntity
        return GetBusinessAccountGiftEntity(self, data)


    def GetChatGift(self, data=None):
        from entity.get_chat_gift_entity import GetChatGiftEntity
        return GetChatGiftEntity(self, data)


    def GetMe(self, data=None):
        from entity.get_me_entity import GetMeEntity
        return GetMeEntity(self, data)


    def GetUserGift(self, data=None):
        from entity.get_user_gift_entity import GetUserGiftEntity
        return GetUserGiftEntity(self, data)


    def GetUserProfileAudio(self, data=None):
        from entity.get_user_profile_audio_entity import GetUserProfileAudioEntity
        return GetUserProfileAudioEntity(self, data)


    def Message(self, data=None):
        from entity.message_entity import MessageEntity
        return MessageEntity(self, data)


    def MessageId(self, data=None):
        from entity.message_id_entity import MessageIdEntity
        return MessageIdEntity(self, data)


    def PromoteChatMember(self, data=None):
        from entity.promote_chat_member_entity import PromoteChatMemberEntity
        return PromoteChatMemberEntity(self, data)


    def RemoveMyProfilePhoto(self, data=None):
        from entity.remove_my_profile_photo_entity import RemoveMyProfilePhotoEntity
        return RemoveMyProfilePhotoEntity(self, data)


    def RepostStory(self, data=None):
        from entity.repost_story_entity import RepostStoryEntity
        return RepostStoryEntity(self, data)


    def SendChatAction(self, data=None):
        from entity.send_chat_action_entity import SendChatActionEntity
        return SendChatActionEntity(self, data)


    def SendMessageDraft(self, data=None):
        from entity.send_message_draft_entity import SendMessageDraftEntity
        return SendMessageDraftEntity(self, data)


    def SetMyProfilePhoto(self, data=None):
        from entity.set_my_profile_photo_entity import SetMyProfilePhotoEntity
        return SetMyProfilePhotoEntity(self, data)


    def UnpinAllForumTopicMessage(self, data=None):
        from entity.unpin_all_forum_topic_message_entity import UnpinAllForumTopicMessageEntity
        return UnpinAllForumTopicMessageEntity(self, data)


    def Update(self, data=None):
        from entity.update_entity import UpdateEntity
        return UpdateEntity(self, data)



    @classmethod
    def test(cls, testopts=None, sdkopts=None):
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
