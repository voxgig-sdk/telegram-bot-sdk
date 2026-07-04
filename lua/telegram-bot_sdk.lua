-- TelegramBot SDK

local vs = require("utility.struct.struct")
local Utility = require("core.utility_type")
local Spec = require("core.spec")
local helpers = require("core.helpers")

-- Load utility registration (populates Utility._registrar)
require("utility.register")

-- Load features
local BaseFeature = require("feature.base_feature")
local features_factory = require("features")


local TelegramBotSDK = {}
TelegramBotSDK.__index = TelegramBotSDK


local function _make_feature(name)
  local factory = features_factory[name]
  if factory ~= nil then
    return factory()
  end
  return features_factory.base()
end

TelegramBotSDK._make_feature = _make_feature


function TelegramBotSDK.new(options)
  local self = setmetatable({}, TelegramBotSDK)
  self.mode = "live"
  self.features = {}
  self.options = nil

  local utility = Utility.new()
  self._utility = utility

  local config = require("config")()

  self._rootctx = utility.make_context({
    client = self,
    utility = utility,
    config = config,
    options = options or {},
    shared = {},
  }, nil)

  self.options = utility.make_options(self._rootctx)

  if vs.getpath(self.options, "feature.test.active") == true then
    self.mode = "test"
  end

  self._rootctx.options = self.options

  -- Add features from config.
  local feature_opts = helpers.to_map(vs.getprop(self.options, "feature"))
  if feature_opts ~= nil then
    local feature_items = vs.items(feature_opts)
    if feature_items ~= nil then
      for _, item in ipairs(feature_items) do
        local fname = item[1]
        local fopts = helpers.to_map(item[2])
        if fopts ~= nil and fopts["active"] == true then
          utility.feature_add(self._rootctx, _make_feature(fname))
        end
      end
    end
  end

  -- Add extension features.
  local extend = vs.getprop(self.options, "extend")
  if type(extend) == "table" then
    for _, f in ipairs(extend) do
      if type(f) == "table" and type(f.get_name) == "function" then
        utility.feature_add(self._rootctx, f)
      end
    end
  end

  -- Initialize features.
  for _, f in ipairs(self.features) do
    utility.feature_init(self._rootctx, f)
  end

  utility.feature_hook(self._rootctx, "PostConstruct")

  -- #BuildFeatures

  return self
end


function TelegramBotSDK:options_map()
  local out = vs.clone(self.options)
  if type(out) == "table" then
    return out
  end
  return {}
end


function TelegramBotSDK:get_utility()
  return Utility.copy(self._utility)
end


function TelegramBotSDK:get_root_ctx()
  return self._rootctx
end


function TelegramBotSDK:prepare(fetchargs)
  local utility = self._utility

  fetchargs = fetchargs or {}

  local ctrl = helpers.to_map(vs.getprop(fetchargs, "ctrl")) or {}

  local ctx = utility.make_context({
    opname = "prepare",
    ctrl = ctrl,
  }, self._rootctx)

  local options = self.options

  local path = vs.getprop(fetchargs, "path") or ""
  if type(path) ~= "string" then path = "" end

  local method = vs.getprop(fetchargs, "method") or "GET"
  if type(method) ~= "string" then method = "GET" end

  local params = helpers.to_map(vs.getprop(fetchargs, "params")) or {}
  local query = helpers.to_map(vs.getprop(fetchargs, "query")) or {}

  local headers = utility.prepare_headers(ctx)

  local base = vs.getprop(options, "base") or ""
  if type(base) ~= "string" then base = "" end
  local prefix = vs.getprop(options, "prefix") or ""
  if type(prefix) ~= "string" then prefix = "" end
  local suffix = vs.getprop(options, "suffix") or ""
  if type(suffix) ~= "string" then suffix = "" end

  ctx.spec = Spec.new({
    base = base,
    prefix = prefix,
    suffix = suffix,
    path = path,
    method = method,
    params = params,
    query = query,
    headers = headers,
    body = vs.getprop(fetchargs, "body"),
    step = "start",
  })

  -- Merge user-provided headers.
  local uh = vs.getprop(fetchargs, "headers")
  if type(uh) == "table" then
    for k, v in pairs(uh) do
      ctx.spec.headers[k] = v
    end
  end

  local _, err = utility.prepare_auth(ctx)
  if err ~= nil then
    return nil, err
  end

  return utility.make_fetch_def(ctx)
end


function TelegramBotSDK:direct(fetchargs)
  local utility = self._utility

  local fetchdef, err = self:prepare(fetchargs)
  if err ~= nil then
    return { ok = false, err = err }, nil
  end

  fetchargs = fetchargs or {}
  local ctrl = helpers.to_map(vs.getprop(fetchargs, "ctrl")) or {}

  local ctx = utility.make_context({
    opname = "direct",
    ctrl = ctrl,
  }, self._rootctx)

  local url = fetchdef["url"] or ""
  local fetched, fetch_err = utility.fetcher(ctx, url, fetchdef)

  if fetch_err ~= nil then
    return { ok = false, err = fetch_err }, nil
  end

  if fetched == nil then
    return {
      ok = false,
      err = ctx:make_error("direct_no_response", "response: undefined"),
    }, nil
  end

  if type(fetched) == "table" then
    local status = helpers.to_int(vs.getprop(fetched, "status"))
    local headers = vs.getprop(fetched, "headers") or {}

    -- No-body responses (204, 304) and explicit zero content-length
    -- must skip JSON parsing — calling json() on an empty body errors.
    local content_length = nil
    if type(headers) == "table" then
      content_length = headers["content-length"]
    end
    local no_body = status == 204 or status == 304 or tostring(content_length) == "0"

    local json_data = nil
    if not no_body then
      local jf = vs.getprop(fetched, "json")
      if type(jf) == "function" then
        local ok, result = pcall(jf)
        if ok then
          json_data = result
        end
        -- Non-JSON body: json_data stays nil, status/headers preserved.
      end
    end

    return {
      ok = status >= 200 and status < 300,
      status = status,
      headers = headers,
      data = json_data,
    }, nil
  end

  return {
    ok = false,
    err = ctx:make_error("direct_invalid", "invalid response type"),
  }, nil
end



-- Idiomatic facade: client:approve_suggested_post():list() / client:approve_suggested_post():load({ id = ... })
function TelegramBotSDK:approve_suggested_post(data)
  local EntityMod = require("entity.approve_suggested_post_entity")
  if data == nil then
    if self._approve_suggested_post == nil then
      self._approve_suggested_post = EntityMod.new(self, nil)
    end
    return self._approve_suggested_post
  end
  return EntityMod.new(self, data)
end

-- Deprecated: use client:approve_suggested_post() instead.
function TelegramBotSDK:ApproveSuggestedPost(data)
  local EntityMod = require("entity.approve_suggested_post_entity")
  return EntityMod.new(self, data)
end


-- Idiomatic facade: client:decline_suggested_post():list() / client:decline_suggested_post():load({ id = ... })
function TelegramBotSDK:decline_suggested_post(data)
  local EntityMod = require("entity.decline_suggested_post_entity")
  if data == nil then
    if self._decline_suggested_post == nil then
      self._decline_suggested_post = EntityMod.new(self, nil)
    end
    return self._decline_suggested_post
  end
  return EntityMod.new(self, data)
end

-- Deprecated: use client:decline_suggested_post() instead.
function TelegramBotSDK:DeclineSuggestedPost(data)
  local EntityMod = require("entity.decline_suggested_post_entity")
  return EntityMod.new(self, data)
end


-- Idiomatic facade: client:delete_forum_topic():list() / client:delete_forum_topic():load({ id = ... })
function TelegramBotSDK:delete_forum_topic(data)
  local EntityMod = require("entity.delete_forum_topic_entity")
  if data == nil then
    if self._delete_forum_topic == nil then
      self._delete_forum_topic = EntityMod.new(self, nil)
    end
    return self._delete_forum_topic
  end
  return EntityMod.new(self, data)
end

-- Deprecated: use client:delete_forum_topic() instead.
function TelegramBotSDK:DeleteForumTopic(data)
  local EntityMod = require("entity.delete_forum_topic_entity")
  return EntityMod.new(self, data)
end


-- Idiomatic facade: client:edit_forum_topic():list() / client:edit_forum_topic():load({ id = ... })
function TelegramBotSDK:edit_forum_topic(data)
  local EntityMod = require("entity.edit_forum_topic_entity")
  if data == nil then
    if self._edit_forum_topic == nil then
      self._edit_forum_topic = EntityMod.new(self, nil)
    end
    return self._edit_forum_topic
  end
  return EntityMod.new(self, data)
end

-- Deprecated: use client:edit_forum_topic() instead.
function TelegramBotSDK:EditForumTopic(data)
  local EntityMod = require("entity.edit_forum_topic_entity")
  return EntityMod.new(self, data)
end


-- Idiomatic facade: client:file():list() / client:file():load({ id = ... })
function TelegramBotSDK:file(data)
  local EntityMod = require("entity.file_entity")
  if data == nil then
    if self._file == nil then
      self._file = EntityMod.new(self, nil)
    end
    return self._file
  end
  return EntityMod.new(self, data)
end

-- Deprecated: use client:file() instead.
function TelegramBotSDK:File(data)
  local EntityMod = require("entity.file_entity")
  return EntityMod.new(self, data)
end


-- Idiomatic facade: client:forum_topic():list() / client:forum_topic():load({ id = ... })
function TelegramBotSDK:forum_topic(data)
  local EntityMod = require("entity.forum_topic_entity")
  if data == nil then
    if self._forum_topic == nil then
      self._forum_topic = EntityMod.new(self, nil)
    end
    return self._forum_topic
  end
  return EntityMod.new(self, data)
end

-- Deprecated: use client:forum_topic() instead.
function TelegramBotSDK:ForumTopic(data)
  local EntityMod = require("entity.forum_topic_entity")
  return EntityMod.new(self, data)
end


-- Idiomatic facade: client:get_business_account_gift():list() / client:get_business_account_gift():load({ id = ... })
function TelegramBotSDK:get_business_account_gift(data)
  local EntityMod = require("entity.get_business_account_gift_entity")
  if data == nil then
    if self._get_business_account_gift == nil then
      self._get_business_account_gift = EntityMod.new(self, nil)
    end
    return self._get_business_account_gift
  end
  return EntityMod.new(self, data)
end

-- Deprecated: use client:get_business_account_gift() instead.
function TelegramBotSDK:GetBusinessAccountGift(data)
  local EntityMod = require("entity.get_business_account_gift_entity")
  return EntityMod.new(self, data)
end


-- Idiomatic facade: client:get_chat_gift():list() / client:get_chat_gift():load({ id = ... })
function TelegramBotSDK:get_chat_gift(data)
  local EntityMod = require("entity.get_chat_gift_entity")
  if data == nil then
    if self._get_chat_gift == nil then
      self._get_chat_gift = EntityMod.new(self, nil)
    end
    return self._get_chat_gift
  end
  return EntityMod.new(self, data)
end

-- Deprecated: use client:get_chat_gift() instead.
function TelegramBotSDK:GetChatGift(data)
  local EntityMod = require("entity.get_chat_gift_entity")
  return EntityMod.new(self, data)
end


-- Idiomatic facade: client:get_me():list() / client:get_me():load({ id = ... })
function TelegramBotSDK:get_me(data)
  local EntityMod = require("entity.get_me_entity")
  if data == nil then
    if self._get_me == nil then
      self._get_me = EntityMod.new(self, nil)
    end
    return self._get_me
  end
  return EntityMod.new(self, data)
end

-- Deprecated: use client:get_me() instead.
function TelegramBotSDK:GetMe(data)
  local EntityMod = require("entity.get_me_entity")
  return EntityMod.new(self, data)
end


-- Idiomatic facade: client:get_user_gift():list() / client:get_user_gift():load({ id = ... })
function TelegramBotSDK:get_user_gift(data)
  local EntityMod = require("entity.get_user_gift_entity")
  if data == nil then
    if self._get_user_gift == nil then
      self._get_user_gift = EntityMod.new(self, nil)
    end
    return self._get_user_gift
  end
  return EntityMod.new(self, data)
end

-- Deprecated: use client:get_user_gift() instead.
function TelegramBotSDK:GetUserGift(data)
  local EntityMod = require("entity.get_user_gift_entity")
  return EntityMod.new(self, data)
end


-- Idiomatic facade: client:get_user_profile_audio():list() / client:get_user_profile_audio():load({ id = ... })
function TelegramBotSDK:get_user_profile_audio(data)
  local EntityMod = require("entity.get_user_profile_audio_entity")
  if data == nil then
    if self._get_user_profile_audio == nil then
      self._get_user_profile_audio = EntityMod.new(self, nil)
    end
    return self._get_user_profile_audio
  end
  return EntityMod.new(self, data)
end

-- Deprecated: use client:get_user_profile_audio() instead.
function TelegramBotSDK:GetUserProfileAudio(data)
  local EntityMod = require("entity.get_user_profile_audio_entity")
  return EntityMod.new(self, data)
end


-- Idiomatic facade: client:message():list() / client:message():load({ id = ... })
function TelegramBotSDK:message(data)
  local EntityMod = require("entity.message_entity")
  if data == nil then
    if self._message == nil then
      self._message = EntityMod.new(self, nil)
    end
    return self._message
  end
  return EntityMod.new(self, data)
end

-- Deprecated: use client:message() instead.
function TelegramBotSDK:Message(data)
  local EntityMod = require("entity.message_entity")
  return EntityMod.new(self, data)
end


-- Idiomatic facade: client:message_id():list() / client:message_id():load({ id = ... })
function TelegramBotSDK:message_id(data)
  local EntityMod = require("entity.message_id_entity")
  if data == nil then
    if self._message_id == nil then
      self._message_id = EntityMod.new(self, nil)
    end
    return self._message_id
  end
  return EntityMod.new(self, data)
end

-- Deprecated: use client:message_id() instead.
function TelegramBotSDK:MessageId(data)
  local EntityMod = require("entity.message_id_entity")
  return EntityMod.new(self, data)
end


-- Idiomatic facade: client:promote_chat_member():list() / client:promote_chat_member():load({ id = ... })
function TelegramBotSDK:promote_chat_member(data)
  local EntityMod = require("entity.promote_chat_member_entity")
  if data == nil then
    if self._promote_chat_member == nil then
      self._promote_chat_member = EntityMod.new(self, nil)
    end
    return self._promote_chat_member
  end
  return EntityMod.new(self, data)
end

-- Deprecated: use client:promote_chat_member() instead.
function TelegramBotSDK:PromoteChatMember(data)
  local EntityMod = require("entity.promote_chat_member_entity")
  return EntityMod.new(self, data)
end


-- Idiomatic facade: client:remove_my_profile_photo():list() / client:remove_my_profile_photo():load({ id = ... })
function TelegramBotSDK:remove_my_profile_photo(data)
  local EntityMod = require("entity.remove_my_profile_photo_entity")
  if data == nil then
    if self._remove_my_profile_photo == nil then
      self._remove_my_profile_photo = EntityMod.new(self, nil)
    end
    return self._remove_my_profile_photo
  end
  return EntityMod.new(self, data)
end

-- Deprecated: use client:remove_my_profile_photo() instead.
function TelegramBotSDK:RemoveMyProfilePhoto(data)
  local EntityMod = require("entity.remove_my_profile_photo_entity")
  return EntityMod.new(self, data)
end


-- Idiomatic facade: client:repost_story():list() / client:repost_story():load({ id = ... })
function TelegramBotSDK:repost_story(data)
  local EntityMod = require("entity.repost_story_entity")
  if data == nil then
    if self._repost_story == nil then
      self._repost_story = EntityMod.new(self, nil)
    end
    return self._repost_story
  end
  return EntityMod.new(self, data)
end

-- Deprecated: use client:repost_story() instead.
function TelegramBotSDK:RepostStory(data)
  local EntityMod = require("entity.repost_story_entity")
  return EntityMod.new(self, data)
end


-- Idiomatic facade: client:send_chat_action():list() / client:send_chat_action():load({ id = ... })
function TelegramBotSDK:send_chat_action(data)
  local EntityMod = require("entity.send_chat_action_entity")
  if data == nil then
    if self._send_chat_action == nil then
      self._send_chat_action = EntityMod.new(self, nil)
    end
    return self._send_chat_action
  end
  return EntityMod.new(self, data)
end

-- Deprecated: use client:send_chat_action() instead.
function TelegramBotSDK:SendChatAction(data)
  local EntityMod = require("entity.send_chat_action_entity")
  return EntityMod.new(self, data)
end


-- Idiomatic facade: client:send_message_draft():list() / client:send_message_draft():load({ id = ... })
function TelegramBotSDK:send_message_draft(data)
  local EntityMod = require("entity.send_message_draft_entity")
  if data == nil then
    if self._send_message_draft == nil then
      self._send_message_draft = EntityMod.new(self, nil)
    end
    return self._send_message_draft
  end
  return EntityMod.new(self, data)
end

-- Deprecated: use client:send_message_draft() instead.
function TelegramBotSDK:SendMessageDraft(data)
  local EntityMod = require("entity.send_message_draft_entity")
  return EntityMod.new(self, data)
end


-- Idiomatic facade: client:set_my_profile_photo():list() / client:set_my_profile_photo():load({ id = ... })
function TelegramBotSDK:set_my_profile_photo(data)
  local EntityMod = require("entity.set_my_profile_photo_entity")
  if data == nil then
    if self._set_my_profile_photo == nil then
      self._set_my_profile_photo = EntityMod.new(self, nil)
    end
    return self._set_my_profile_photo
  end
  return EntityMod.new(self, data)
end

-- Deprecated: use client:set_my_profile_photo() instead.
function TelegramBotSDK:SetMyProfilePhoto(data)
  local EntityMod = require("entity.set_my_profile_photo_entity")
  return EntityMod.new(self, data)
end


-- Idiomatic facade: client:unpin_all_forum_topic_message():list() / client:unpin_all_forum_topic_message():load({ id = ... })
function TelegramBotSDK:unpin_all_forum_topic_message(data)
  local EntityMod = require("entity.unpin_all_forum_topic_message_entity")
  if data == nil then
    if self._unpin_all_forum_topic_message == nil then
      self._unpin_all_forum_topic_message = EntityMod.new(self, nil)
    end
    return self._unpin_all_forum_topic_message
  end
  return EntityMod.new(self, data)
end

-- Deprecated: use client:unpin_all_forum_topic_message() instead.
function TelegramBotSDK:UnpinAllForumTopicMessage(data)
  local EntityMod = require("entity.unpin_all_forum_topic_message_entity")
  return EntityMod.new(self, data)
end


-- Idiomatic facade: client:update():list() / client:update():load({ id = ... })
function TelegramBotSDK:update(data)
  local EntityMod = require("entity.update_entity")
  if data == nil then
    if self._update == nil then
      self._update = EntityMod.new(self, nil)
    end
    return self._update
  end
  return EntityMod.new(self, data)
end

-- Deprecated: use client:update() instead.
function TelegramBotSDK:Update(data)
  local EntityMod = require("entity.update_entity")
  return EntityMod.new(self, data)
end




function TelegramBotSDK.test(testopts, sdkopts)
  sdkopts = sdkopts or {}
  sdkopts = vs.clone(sdkopts)
  if type(sdkopts) ~= "table" then
    sdkopts = {}
  end

  testopts = testopts or {}
  testopts = vs.clone(testopts)
  if type(testopts) ~= "table" then
    testopts = {}
  end
  testopts["active"] = true

  vs.setpath(sdkopts, "feature.test", testopts)

  local sdk = TelegramBotSDK.new(sdkopts)
  sdk.mode = "test"

  return sdk
end


return TelegramBotSDK
