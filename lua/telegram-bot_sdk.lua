-- TelegramBot SDK

local vs = require("utility.struct.struct")
local Utility = require("core.utility_type")
local Spec = require("core.spec")
local helpers = require("core.helpers")

-- Load utility registration (populates Utility._registrar)
require("utility.register")

-- Typed-model annotations (LuaLS ---@class); empty at runtime.
require("telegram-bot_types")

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

  -- Add features in the resolved order (make_options puts an explicit list
  -- order first, else defaults to test-first). Ordering matters: the `test`
  -- feature installs the base mock transport and the transport features
  -- (retry/cache/netsim/proxy/ratelimit) wrap whatever is current, so `test`
  -- must be added before them to sit at the base of the chain.
  local feature_opts = helpers.to_map(vs.getprop(self.options, "feature"))
  if feature_opts ~= nil then
    local featureorder = vs.getpath(self.options, "__derived__.featureorder")
    if type(featureorder) == "table" then
      for _, fname in ipairs(featureorder) do
        local fopts = helpers.to_map(feature_opts[fname])
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

    -- feature: test


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


-- Raw endpoint access is operator-controllable, like every entity op.
-- Blocking it means denying BOTH the 'direct' and 'graphql' tokens, since
-- either one reaches the same endpoint.
function TelegramBotSDK:direct(fetchargs)
  if not self:_op_allowed("direct") then
    return self:_op_denied("direct"), nil
  end

  return self:_raw_request(fetchargs)
end


-- Is this raw-access op permitted by the SDK's allow.op option?
function TelegramBotSDK:_op_allowed(op)
  local allow = vs.getpath(self.options, "allow.op")
  return type(allow) == "string" and allow:find(op, 1, true) ~= nil
end


function TelegramBotSDK:_op_denied(op)
  local allow = vs.getpath(self.options, "allow.op")
  if type(allow) ~= "string" then allow = "" end
  return {
    ok = false,
    err = "TelegramBotSDK: " .. op .. ": operation not allowed by" ..
      " SDK option allow.op value: \"" .. allow .. "\"",
  }
end


-- Ungated request path shared by direct and graphql, each of which checks its
-- own allow.op token first. Private, rather than a flag on fetchargs: a
-- caller-supplied marker would let anyone opt straight back out of the gate
-- by passing it.
function TelegramBotSDK:_raw_request(fetchargs)
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


-- Raw GraphQL access: the pressure valve that makes the generated surface's
-- deliberate omissions (per-call selection sets, typed filter builders,
-- batching, subscriptions) livable — the whole schema stays reachable.
--
-- Thin wrapper over the same prepare/fetch path direct uses, with the one
-- thing raw direct cannot do for GraphQL: a GraphQL failure rides HTTP 200 as
-- a top-level `errors` array, so status alone would report a failed query as
-- ok.
--
-- NOTE: like direct, this bypasses the feature pipeline — no retry, ratelimit
-- or paging features apply.
function TelegramBotSDK:graphql(query, variables, ctrl)
  if not self:_op_allowed("graphql") then
    return self:_op_denied("graphql"), nil
  end

  local res, err = self:_raw_request({
    method = "POST",
    headers = { ["content-type"] = "application/json" },
    body = {
      query = query,
      variables = type(variables) == "table" and variables or {},
    },
    ctrl = type(ctrl) == "table" and ctrl or {},
  })

  if err ~= nil or type(res) ~= "table" then
    return res, err
  end

  -- Errors are read BEFORE any status check: a GraphQL parse or validation
  -- failure comes back as HTTP 400 carrying the standard { errors = {...} }
  -- body, and the raw path represents a non-2xx as ok=false with no err — so
  -- returning early on status would discard the server's own diagnostics,
  -- which are the only useful part of that response.
  local errors = vs.getpath(res, "data.errors")

  if type(errors) == "table" and 0 < #errors then
    local msg = vs.getprop(errors[1], "message")
    if type(msg) ~= "string" or msg == "" then
      msg = "graphql error"
    end
    res.ok = false
    res.err = "TelegramBotSDK: graphql: " .. msg
    res.graphql = errors
  end

  return res, nil
end



-- Idiomatic facade: client:ApproveSuggestedPost():list() / client:ApproveSuggestedPost():load({ id = ... })
-- Entity access is capitalised (PascalCase) for parity with the other SDKs.
function TelegramBotSDK:ApproveSuggestedPost(data)
  local EntityMod = require("entity.approve_suggested_post_entity")
  if data == nil then
    if self._approve_suggested_post == nil then
      self._approve_suggested_post = EntityMod.new(self, nil)
    end
    return self._approve_suggested_post
  end
  return EntityMod.new(self, data)
end


-- Idiomatic facade: client:DeclineSuggestedPost():list() / client:DeclineSuggestedPost():load({ id = ... })
-- Entity access is capitalised (PascalCase) for parity with the other SDKs.
function TelegramBotSDK:DeclineSuggestedPost(data)
  local EntityMod = require("entity.decline_suggested_post_entity")
  if data == nil then
    if self._decline_suggested_post == nil then
      self._decline_suggested_post = EntityMod.new(self, nil)
    end
    return self._decline_suggested_post
  end
  return EntityMod.new(self, data)
end


-- Idiomatic facade: client:DeleteForumTopic():list() / client:DeleteForumTopic():load({ id = ... })
-- Entity access is capitalised (PascalCase) for parity with the other SDKs.
function TelegramBotSDK:DeleteForumTopic(data)
  local EntityMod = require("entity.delete_forum_topic_entity")
  if data == nil then
    if self._delete_forum_topic == nil then
      self._delete_forum_topic = EntityMod.new(self, nil)
    end
    return self._delete_forum_topic
  end
  return EntityMod.new(self, data)
end


-- Idiomatic facade: client:EditForumTopic():list() / client:EditForumTopic():load({ id = ... })
-- Entity access is capitalised (PascalCase) for parity with the other SDKs.
function TelegramBotSDK:EditForumTopic(data)
  local EntityMod = require("entity.edit_forum_topic_entity")
  if data == nil then
    if self._edit_forum_topic == nil then
      self._edit_forum_topic = EntityMod.new(self, nil)
    end
    return self._edit_forum_topic
  end
  return EntityMod.new(self, data)
end


-- Idiomatic facade: client:File():list() / client:File():load({ id = ... })
-- Entity access is capitalised (PascalCase) for parity with the other SDKs.
function TelegramBotSDK:File(data)
  local EntityMod = require("entity.file_entity")
  if data == nil then
    if self._file == nil then
      self._file = EntityMod.new(self, nil)
    end
    return self._file
  end
  return EntityMod.new(self, data)
end


-- Idiomatic facade: client:ForumTopic():list() / client:ForumTopic():load({ id = ... })
-- Entity access is capitalised (PascalCase) for parity with the other SDKs.
function TelegramBotSDK:ForumTopic(data)
  local EntityMod = require("entity.forum_topic_entity")
  if data == nil then
    if self._forum_topic == nil then
      self._forum_topic = EntityMod.new(self, nil)
    end
    return self._forum_topic
  end
  return EntityMod.new(self, data)
end


-- Idiomatic facade: client:GetBusinessAccountGift():list() / client:GetBusinessAccountGift():load({ id = ... })
-- Entity access is capitalised (PascalCase) for parity with the other SDKs.
function TelegramBotSDK:GetBusinessAccountGift(data)
  local EntityMod = require("entity.get_business_account_gift_entity")
  if data == nil then
    if self._get_business_account_gift == nil then
      self._get_business_account_gift = EntityMod.new(self, nil)
    end
    return self._get_business_account_gift
  end
  return EntityMod.new(self, data)
end


-- Idiomatic facade: client:GetChatGift():list() / client:GetChatGift():load({ id = ... })
-- Entity access is capitalised (PascalCase) for parity with the other SDKs.
function TelegramBotSDK:GetChatGift(data)
  local EntityMod = require("entity.get_chat_gift_entity")
  if data == nil then
    if self._get_chat_gift == nil then
      self._get_chat_gift = EntityMod.new(self, nil)
    end
    return self._get_chat_gift
  end
  return EntityMod.new(self, data)
end


-- Idiomatic facade: client:GetMe():list() / client:GetMe():load({ id = ... })
-- Entity access is capitalised (PascalCase) for parity with the other SDKs.
function TelegramBotSDK:GetMe(data)
  local EntityMod = require("entity.get_me_entity")
  if data == nil then
    if self._get_me == nil then
      self._get_me = EntityMod.new(self, nil)
    end
    return self._get_me
  end
  return EntityMod.new(self, data)
end


-- Idiomatic facade: client:GetUserGift():list() / client:GetUserGift():load({ id = ... })
-- Entity access is capitalised (PascalCase) for parity with the other SDKs.
function TelegramBotSDK:GetUserGift(data)
  local EntityMod = require("entity.get_user_gift_entity")
  if data == nil then
    if self._get_user_gift == nil then
      self._get_user_gift = EntityMod.new(self, nil)
    end
    return self._get_user_gift
  end
  return EntityMod.new(self, data)
end


-- Idiomatic facade: client:GetUserProfileAudio():list() / client:GetUserProfileAudio():load({ id = ... })
-- Entity access is capitalised (PascalCase) for parity with the other SDKs.
function TelegramBotSDK:GetUserProfileAudio(data)
  local EntityMod = require("entity.get_user_profile_audio_entity")
  if data == nil then
    if self._get_user_profile_audio == nil then
      self._get_user_profile_audio = EntityMod.new(self, nil)
    end
    return self._get_user_profile_audio
  end
  return EntityMod.new(self, data)
end


-- Idiomatic facade: client:Message():list() / client:Message():load({ id = ... })
-- Entity access is capitalised (PascalCase) for parity with the other SDKs.
function TelegramBotSDK:Message(data)
  local EntityMod = require("entity.message_entity")
  if data == nil then
    if self._message == nil then
      self._message = EntityMod.new(self, nil)
    end
    return self._message
  end
  return EntityMod.new(self, data)
end


-- Idiomatic facade: client:MessageId():list() / client:MessageId():load({ id = ... })
-- Entity access is capitalised (PascalCase) for parity with the other SDKs.
function TelegramBotSDK:MessageId(data)
  local EntityMod = require("entity.message_id_entity")
  if data == nil then
    if self._message_id == nil then
      self._message_id = EntityMod.new(self, nil)
    end
    return self._message_id
  end
  return EntityMod.new(self, data)
end


-- Idiomatic facade: client:PromoteChatMember():list() / client:PromoteChatMember():load({ id = ... })
-- Entity access is capitalised (PascalCase) for parity with the other SDKs.
function TelegramBotSDK:PromoteChatMember(data)
  local EntityMod = require("entity.promote_chat_member_entity")
  if data == nil then
    if self._promote_chat_member == nil then
      self._promote_chat_member = EntityMod.new(self, nil)
    end
    return self._promote_chat_member
  end
  return EntityMod.new(self, data)
end


-- Idiomatic facade: client:RemoveMyProfilePhoto():list() / client:RemoveMyProfilePhoto():load({ id = ... })
-- Entity access is capitalised (PascalCase) for parity with the other SDKs.
function TelegramBotSDK:RemoveMyProfilePhoto(data)
  local EntityMod = require("entity.remove_my_profile_photo_entity")
  if data == nil then
    if self._remove_my_profile_photo == nil then
      self._remove_my_profile_photo = EntityMod.new(self, nil)
    end
    return self._remove_my_profile_photo
  end
  return EntityMod.new(self, data)
end


-- Idiomatic facade: client:RepostStory():list() / client:RepostStory():load({ id = ... })
-- Entity access is capitalised (PascalCase) for parity with the other SDKs.
function TelegramBotSDK:RepostStory(data)
  local EntityMod = require("entity.repost_story_entity")
  if data == nil then
    if self._repost_story == nil then
      self._repost_story = EntityMod.new(self, nil)
    end
    return self._repost_story
  end
  return EntityMod.new(self, data)
end


-- Idiomatic facade: client:SendChatAction():list() / client:SendChatAction():load({ id = ... })
-- Entity access is capitalised (PascalCase) for parity with the other SDKs.
function TelegramBotSDK:SendChatAction(data)
  local EntityMod = require("entity.send_chat_action_entity")
  if data == nil then
    if self._send_chat_action == nil then
      self._send_chat_action = EntityMod.new(self, nil)
    end
    return self._send_chat_action
  end
  return EntityMod.new(self, data)
end


-- Idiomatic facade: client:SendMessageDraft():list() / client:SendMessageDraft():load({ id = ... })
-- Entity access is capitalised (PascalCase) for parity with the other SDKs.
function TelegramBotSDK:SendMessageDraft(data)
  local EntityMod = require("entity.send_message_draft_entity")
  if data == nil then
    if self._send_message_draft == nil then
      self._send_message_draft = EntityMod.new(self, nil)
    end
    return self._send_message_draft
  end
  return EntityMod.new(self, data)
end


-- Idiomatic facade: client:SetMyProfilePhoto():list() / client:SetMyProfilePhoto():load({ id = ... })
-- Entity access is capitalised (PascalCase) for parity with the other SDKs.
function TelegramBotSDK:SetMyProfilePhoto(data)
  local EntityMod = require("entity.set_my_profile_photo_entity")
  if data == nil then
    if self._set_my_profile_photo == nil then
      self._set_my_profile_photo = EntityMod.new(self, nil)
    end
    return self._set_my_profile_photo
  end
  return EntityMod.new(self, data)
end


-- Idiomatic facade: client:UnpinAllForumTopicMessage():list() / client:UnpinAllForumTopicMessage():load({ id = ... })
-- Entity access is capitalised (PascalCase) for parity with the other SDKs.
function TelegramBotSDK:UnpinAllForumTopicMessage(data)
  local EntityMod = require("entity.unpin_all_forum_topic_message_entity")
  if data == nil then
    if self._unpin_all_forum_topic_message == nil then
      self._unpin_all_forum_topic_message = EntityMod.new(self, nil)
    end
    return self._unpin_all_forum_topic_message
  end
  return EntityMod.new(self, data)
end


-- Idiomatic facade: client:Update():list() / client:Update():load({ id = ... })
-- Entity access is capitalised (PascalCase) for parity with the other SDKs.
function TelegramBotSDK:Update(data)
  local EntityMod = require("entity.update_entity")
  if data == nil then
    if self._update == nil then
      self._update = EntityMod.new(self, nil)
    end
    return self._update
  end
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
