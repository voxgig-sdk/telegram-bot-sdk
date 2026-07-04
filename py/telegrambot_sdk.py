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
            raise err

        fetchdef, err = utility.make_fetch_def(ctx)
        if err is not None:
            raise err

        return fetchdef

    def direct(self, fetchargs=None):
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


    @property
    def approve_suggested_post(self):
        """Idiomatic facade: client.approve_suggested_post.list() / client.approve_suggested_post.load({"id": ...})."""
        from entity.approve_suggested_post_entity import ApproveSuggestedPostEntity
        cached = getattr(self, "_approve_suggested_post", None)
        if cached is None:
            cached = ApproveSuggestedPostEntity(self, None)
            self._approve_suggested_post = cached
        return cached

    def ApproveSuggestedPost(self, data=None):
        # Deprecated: use client.approve_suggested_post instead.
        from entity.approve_suggested_post_entity import ApproveSuggestedPostEntity
        return ApproveSuggestedPostEntity(self, data)


    @property
    def decline_suggested_post(self):
        """Idiomatic facade: client.decline_suggested_post.list() / client.decline_suggested_post.load({"id": ...})."""
        from entity.decline_suggested_post_entity import DeclineSuggestedPostEntity
        cached = getattr(self, "_decline_suggested_post", None)
        if cached is None:
            cached = DeclineSuggestedPostEntity(self, None)
            self._decline_suggested_post = cached
        return cached

    def DeclineSuggestedPost(self, data=None):
        # Deprecated: use client.decline_suggested_post instead.
        from entity.decline_suggested_post_entity import DeclineSuggestedPostEntity
        return DeclineSuggestedPostEntity(self, data)


    @property
    def delete_forum_topic(self):
        """Idiomatic facade: client.delete_forum_topic.list() / client.delete_forum_topic.load({"id": ...})."""
        from entity.delete_forum_topic_entity import DeleteForumTopicEntity
        cached = getattr(self, "_delete_forum_topic", None)
        if cached is None:
            cached = DeleteForumTopicEntity(self, None)
            self._delete_forum_topic = cached
        return cached

    def DeleteForumTopic(self, data=None):
        # Deprecated: use client.delete_forum_topic instead.
        from entity.delete_forum_topic_entity import DeleteForumTopicEntity
        return DeleteForumTopicEntity(self, data)


    @property
    def edit_forum_topic(self):
        """Idiomatic facade: client.edit_forum_topic.list() / client.edit_forum_topic.load({"id": ...})."""
        from entity.edit_forum_topic_entity import EditForumTopicEntity
        cached = getattr(self, "_edit_forum_topic", None)
        if cached is None:
            cached = EditForumTopicEntity(self, None)
            self._edit_forum_topic = cached
        return cached

    def EditForumTopic(self, data=None):
        # Deprecated: use client.edit_forum_topic instead.
        from entity.edit_forum_topic_entity import EditForumTopicEntity
        return EditForumTopicEntity(self, data)


    @property
    def file(self):
        """Idiomatic facade: client.file.list() / client.file.load({"id": ...})."""
        from entity.file_entity import FileEntity
        cached = getattr(self, "_file", None)
        if cached is None:
            cached = FileEntity(self, None)
            self._file = cached
        return cached

    def File(self, data=None):
        # Deprecated: use client.file instead.
        from entity.file_entity import FileEntity
        return FileEntity(self, data)


    @property
    def forum_topic(self):
        """Idiomatic facade: client.forum_topic.list() / client.forum_topic.load({"id": ...})."""
        from entity.forum_topic_entity import ForumTopicEntity
        cached = getattr(self, "_forum_topic", None)
        if cached is None:
            cached = ForumTopicEntity(self, None)
            self._forum_topic = cached
        return cached

    def ForumTopic(self, data=None):
        # Deprecated: use client.forum_topic instead.
        from entity.forum_topic_entity import ForumTopicEntity
        return ForumTopicEntity(self, data)


    @property
    def get_business_account_gift(self):
        """Idiomatic facade: client.get_business_account_gift.list() / client.get_business_account_gift.load({"id": ...})."""
        from entity.get_business_account_gift_entity import GetBusinessAccountGiftEntity
        cached = getattr(self, "_get_business_account_gift", None)
        if cached is None:
            cached = GetBusinessAccountGiftEntity(self, None)
            self._get_business_account_gift = cached
        return cached

    def GetBusinessAccountGift(self, data=None):
        # Deprecated: use client.get_business_account_gift instead.
        from entity.get_business_account_gift_entity import GetBusinessAccountGiftEntity
        return GetBusinessAccountGiftEntity(self, data)


    @property
    def get_chat_gift(self):
        """Idiomatic facade: client.get_chat_gift.list() / client.get_chat_gift.load({"id": ...})."""
        from entity.get_chat_gift_entity import GetChatGiftEntity
        cached = getattr(self, "_get_chat_gift", None)
        if cached is None:
            cached = GetChatGiftEntity(self, None)
            self._get_chat_gift = cached
        return cached

    def GetChatGift(self, data=None):
        # Deprecated: use client.get_chat_gift instead.
        from entity.get_chat_gift_entity import GetChatGiftEntity
        return GetChatGiftEntity(self, data)


    @property
    def get_me(self):
        """Idiomatic facade: client.get_me.list() / client.get_me.load({"id": ...})."""
        from entity.get_me_entity import GetMeEntity
        cached = getattr(self, "_get_me", None)
        if cached is None:
            cached = GetMeEntity(self, None)
            self._get_me = cached
        return cached

    def GetMe(self, data=None):
        # Deprecated: use client.get_me instead.
        from entity.get_me_entity import GetMeEntity
        return GetMeEntity(self, data)


    @property
    def get_user_gift(self):
        """Idiomatic facade: client.get_user_gift.list() / client.get_user_gift.load({"id": ...})."""
        from entity.get_user_gift_entity import GetUserGiftEntity
        cached = getattr(self, "_get_user_gift", None)
        if cached is None:
            cached = GetUserGiftEntity(self, None)
            self._get_user_gift = cached
        return cached

    def GetUserGift(self, data=None):
        # Deprecated: use client.get_user_gift instead.
        from entity.get_user_gift_entity import GetUserGiftEntity
        return GetUserGiftEntity(self, data)


    @property
    def get_user_profile_audio(self):
        """Idiomatic facade: client.get_user_profile_audio.list() / client.get_user_profile_audio.load({"id": ...})."""
        from entity.get_user_profile_audio_entity import GetUserProfileAudioEntity
        cached = getattr(self, "_get_user_profile_audio", None)
        if cached is None:
            cached = GetUserProfileAudioEntity(self, None)
            self._get_user_profile_audio = cached
        return cached

    def GetUserProfileAudio(self, data=None):
        # Deprecated: use client.get_user_profile_audio instead.
        from entity.get_user_profile_audio_entity import GetUserProfileAudioEntity
        return GetUserProfileAudioEntity(self, data)


    @property
    def message(self):
        """Idiomatic facade: client.message.list() / client.message.load({"id": ...})."""
        from entity.message_entity import MessageEntity
        cached = getattr(self, "_message", None)
        if cached is None:
            cached = MessageEntity(self, None)
            self._message = cached
        return cached

    def Message(self, data=None):
        # Deprecated: use client.message instead.
        from entity.message_entity import MessageEntity
        return MessageEntity(self, data)


    @property
    def message_id(self):
        """Idiomatic facade: client.message_id.list() / client.message_id.load({"id": ...})."""
        from entity.message_id_entity import MessageIdEntity
        cached = getattr(self, "_message_id", None)
        if cached is None:
            cached = MessageIdEntity(self, None)
            self._message_id = cached
        return cached

    def MessageId(self, data=None):
        # Deprecated: use client.message_id instead.
        from entity.message_id_entity import MessageIdEntity
        return MessageIdEntity(self, data)


    @property
    def promote_chat_member(self):
        """Idiomatic facade: client.promote_chat_member.list() / client.promote_chat_member.load({"id": ...})."""
        from entity.promote_chat_member_entity import PromoteChatMemberEntity
        cached = getattr(self, "_promote_chat_member", None)
        if cached is None:
            cached = PromoteChatMemberEntity(self, None)
            self._promote_chat_member = cached
        return cached

    def PromoteChatMember(self, data=None):
        # Deprecated: use client.promote_chat_member instead.
        from entity.promote_chat_member_entity import PromoteChatMemberEntity
        return PromoteChatMemberEntity(self, data)


    @property
    def remove_my_profile_photo(self):
        """Idiomatic facade: client.remove_my_profile_photo.list() / client.remove_my_profile_photo.load({"id": ...})."""
        from entity.remove_my_profile_photo_entity import RemoveMyProfilePhotoEntity
        cached = getattr(self, "_remove_my_profile_photo", None)
        if cached is None:
            cached = RemoveMyProfilePhotoEntity(self, None)
            self._remove_my_profile_photo = cached
        return cached

    def RemoveMyProfilePhoto(self, data=None):
        # Deprecated: use client.remove_my_profile_photo instead.
        from entity.remove_my_profile_photo_entity import RemoveMyProfilePhotoEntity
        return RemoveMyProfilePhotoEntity(self, data)


    @property
    def repost_story(self):
        """Idiomatic facade: client.repost_story.list() / client.repost_story.load({"id": ...})."""
        from entity.repost_story_entity import RepostStoryEntity
        cached = getattr(self, "_repost_story", None)
        if cached is None:
            cached = RepostStoryEntity(self, None)
            self._repost_story = cached
        return cached

    def RepostStory(self, data=None):
        # Deprecated: use client.repost_story instead.
        from entity.repost_story_entity import RepostStoryEntity
        return RepostStoryEntity(self, data)


    @property
    def send_chat_action(self):
        """Idiomatic facade: client.send_chat_action.list() / client.send_chat_action.load({"id": ...})."""
        from entity.send_chat_action_entity import SendChatActionEntity
        cached = getattr(self, "_send_chat_action", None)
        if cached is None:
            cached = SendChatActionEntity(self, None)
            self._send_chat_action = cached
        return cached

    def SendChatAction(self, data=None):
        # Deprecated: use client.send_chat_action instead.
        from entity.send_chat_action_entity import SendChatActionEntity
        return SendChatActionEntity(self, data)


    @property
    def send_message_draft(self):
        """Idiomatic facade: client.send_message_draft.list() / client.send_message_draft.load({"id": ...})."""
        from entity.send_message_draft_entity import SendMessageDraftEntity
        cached = getattr(self, "_send_message_draft", None)
        if cached is None:
            cached = SendMessageDraftEntity(self, None)
            self._send_message_draft = cached
        return cached

    def SendMessageDraft(self, data=None):
        # Deprecated: use client.send_message_draft instead.
        from entity.send_message_draft_entity import SendMessageDraftEntity
        return SendMessageDraftEntity(self, data)


    @property
    def set_my_profile_photo(self):
        """Idiomatic facade: client.set_my_profile_photo.list() / client.set_my_profile_photo.load({"id": ...})."""
        from entity.set_my_profile_photo_entity import SetMyProfilePhotoEntity
        cached = getattr(self, "_set_my_profile_photo", None)
        if cached is None:
            cached = SetMyProfilePhotoEntity(self, None)
            self._set_my_profile_photo = cached
        return cached

    def SetMyProfilePhoto(self, data=None):
        # Deprecated: use client.set_my_profile_photo instead.
        from entity.set_my_profile_photo_entity import SetMyProfilePhotoEntity
        return SetMyProfilePhotoEntity(self, data)


    @property
    def unpin_all_forum_topic_message(self):
        """Idiomatic facade: client.unpin_all_forum_topic_message.list() / client.unpin_all_forum_topic_message.load({"id": ...})."""
        from entity.unpin_all_forum_topic_message_entity import UnpinAllForumTopicMessageEntity
        cached = getattr(self, "_unpin_all_forum_topic_message", None)
        if cached is None:
            cached = UnpinAllForumTopicMessageEntity(self, None)
            self._unpin_all_forum_topic_message = cached
        return cached

    def UnpinAllForumTopicMessage(self, data=None):
        # Deprecated: use client.unpin_all_forum_topic_message instead.
        from entity.unpin_all_forum_topic_message_entity import UnpinAllForumTopicMessageEntity
        return UnpinAllForumTopicMessageEntity(self, data)


    @property
    def update(self):
        """Idiomatic facade: client.update.list() / client.update.load({"id": ...})."""
        from entity.update_entity import UpdateEntity
        cached = getattr(self, "_update", None)
        if cached is None:
            cached = UpdateEntity(self, None)
            self._update = cached
        return cached

    def Update(self, data=None):
        # Deprecated: use client.update instead.
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
