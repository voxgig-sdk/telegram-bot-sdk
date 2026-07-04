# TelegramBot SDK

require_relative 'utility/struct/voxgig_struct'
require_relative 'core/utility_type'
require_relative 'core/spec'
require_relative 'core/helpers'

# Load utility registration
require_relative 'utility/register'

# Load config and features
require_relative 'config'
require_relative 'feature/base_feature'
require_relative 'features'

# Load typed models (Struct value objects).
require_relative 'TelegramBot_types'


class TelegramBotSDK
  attr_accessor :mode, :features, :options

  def initialize(options = {})
    @mode = "live"
    @features = []
    @options = nil

    utility = TelegramBotUtility.new
    @_utility = utility

    config = TelegramBotConfig.make_config

    @_rootctx = utility.make_context.call({
      "client" => self,
      "utility" => utility,
      "config" => config,
      "options" => options || {},
      "shared" => {},
    }, nil)

    @options = utility.make_options.call(@_rootctx)

    if VoxgigStruct.getpath(@options, "feature.test.active") == true
      @mode = "test"
    end

    @_rootctx.options = @options

    # Add features from config.
    feature_opts = TelegramBotHelpers.to_map(VoxgigStruct.getprop(@options, "feature"))
    if feature_opts
      items = VoxgigStruct.items(feature_opts)
      if items
        items.each do |item|
          fname = item[0]
          fopts = TelegramBotHelpers.to_map(item[1])
          if fopts && fopts["active"] == true
            utility.feature_add.call(@_rootctx, TelegramBotFeatures.make_feature(fname))
          end
        end
      end
    end

    # Add extension features.
    extend_val = VoxgigStruct.getprop(@options, "extend")
    if extend_val.is_a?(Array)
      extend_val.each do |f|
        if f.respond_to?(:get_name)
          utility.feature_add.call(@_rootctx, f)
        end
      end
    end

    # Initialize features.
    @features.each do |f|
      utility.feature_init.call(@_rootctx, f)
    end

    utility.feature_hook.call(@_rootctx, "PostConstruct")
  end

  def options_map
    out = VoxgigStruct.clone(@options)
    out.is_a?(Hash) ? out : {}
  end

  def get_utility
    TelegramBotUtility.copy(@_utility)
  end

  def get_root_ctx
    @_rootctx
  end

  def prepare(fetchargs = {})
    utility = @_utility
    fetchargs ||= {}

    ctrl = TelegramBotHelpers.to_map(VoxgigStruct.getprop(fetchargs, "ctrl")) || {}

    ctx = utility.make_context.call({
      "opname" => "prepare",
      "ctrl" => ctrl,
    }, @_rootctx)

    opts = @options
    path = VoxgigStruct.getprop(fetchargs, "path") || ""
    path = "" unless path.is_a?(String)
    method_val = VoxgigStruct.getprop(fetchargs, "method") || "GET"
    method_val = "GET" unless method_val.is_a?(String)
    params = TelegramBotHelpers.to_map(VoxgigStruct.getprop(fetchargs, "params")) || {}
    query = TelegramBotHelpers.to_map(VoxgigStruct.getprop(fetchargs, "query")) || {}
    headers = utility.prepare_headers.call(ctx)

    base = VoxgigStruct.getprop(opts, "base") || ""
    base = "" unless base.is_a?(String)
    prefix = VoxgigStruct.getprop(opts, "prefix") || ""
    prefix = "" unless prefix.is_a?(String)
    suffix = VoxgigStruct.getprop(opts, "suffix") || ""
    suffix = "" unless suffix.is_a?(String)

    ctx.spec = TelegramBotSpec.new({
      "base" => base, "prefix" => prefix, "suffix" => suffix,
      "path" => path, "method" => method_val,
      "params" => params, "query" => query, "headers" => headers,
      "body" => VoxgigStruct.getprop(fetchargs, "body"),
      "step" => "start",
    })

    # Merge user-provided headers.
    uh = VoxgigStruct.getprop(fetchargs, "headers")
    if uh.is_a?(Hash)
      uh.each { |k, v| ctx.spec.headers[k] = v }
    end

    _, err = utility.prepare_auth.call(ctx)
    raise err if err

    utility.make_fetch_def.call(ctx)
  end

  def direct(fetchargs = {})
    utility = @_utility

    # direct() is the raw-HTTP escape hatch: it always returns a result hash
    # ({ "ok" => ..., ... }) and never raises. prepare() raises on error, so
    # trap that and surface it in the hash.
    begin
      fetchdef = prepare(fetchargs)
    rescue TelegramBotError => err
      return { "ok" => false, "err" => err }
    end

    fetchargs ||= {}
    ctrl = TelegramBotHelpers.to_map(VoxgigStruct.getprop(fetchargs, "ctrl")) || {}

    ctx = utility.make_context.call({
      "opname" => "direct",
      "ctrl" => ctrl,
    }, @_rootctx)

    url = fetchdef["url"] || ""
    fetched, fetch_err = utility.fetcher.call(ctx, url, fetchdef)

    return { "ok" => false, "err" => fetch_err } if fetch_err

    if fetched.nil?
      return {
        "ok" => false,
        "err" => ctx.make_error("direct_no_response", "response: undefined"),
      }
    end

    if fetched.is_a?(Hash)
      status = TelegramBotHelpers.to_int(VoxgigStruct.getprop(fetched, "status"))
      headers = VoxgigStruct.getprop(fetched, "headers") || {}

      # No-body responses (204, 304) and explicit zero content-length must
      # skip JSON parsing — calling json() on an empty body errors.
      content_length = headers.is_a?(Hash) ? headers["content-length"] : nil
      no_body = status == 204 || status == 304 || content_length.to_s == "0"

      json_data = nil
      unless no_body
        jf = VoxgigStruct.getprop(fetched, "json")
        if jf.is_a?(Proc)
          begin
            json_data = jf.call
          rescue StandardError
            # Non-JSON body — leave data nil, keep status/headers.
            json_data = nil
          end
        end
      end

      return {
        "ok" => status >= 200 && status < 300,
        "status" => status,
        "headers" => headers,
        "data" => json_data,
      }
    end

    return {
      "ok" => false,
      "err" => ctx.make_error("direct_invalid", "invalid response type"),
    }
  end


  # Canonical facade: client.ApproveSuggestedPost.list / client.ApproveSuggestedPost.load({ "id" => ... })
  def ApproveSuggestedPost(data = nil)
    require_relative 'entity/approve_suggested_post_entity'
    ApproveSuggestedPostEntity.new(self, data)
  end


  # Canonical facade: client.DeclineSuggestedPost.list / client.DeclineSuggestedPost.load({ "id" => ... })
  def DeclineSuggestedPost(data = nil)
    require_relative 'entity/decline_suggested_post_entity'
    DeclineSuggestedPostEntity.new(self, data)
  end


  # Canonical facade: client.DeleteForumTopic.list / client.DeleteForumTopic.load({ "id" => ... })
  def DeleteForumTopic(data = nil)
    require_relative 'entity/delete_forum_topic_entity'
    DeleteForumTopicEntity.new(self, data)
  end


  # Canonical facade: client.EditForumTopic.list / client.EditForumTopic.load({ "id" => ... })
  def EditForumTopic(data = nil)
    require_relative 'entity/edit_forum_topic_entity'
    EditForumTopicEntity.new(self, data)
  end


  # Canonical facade: client.File.list / client.File.load({ "id" => ... })
  def File(data = nil)
    require_relative 'entity/file_entity'
    FileEntity.new(self, data)
  end


  # Canonical facade: client.ForumTopic.list / client.ForumTopic.load({ "id" => ... })
  def ForumTopic(data = nil)
    require_relative 'entity/forum_topic_entity'
    ForumTopicEntity.new(self, data)
  end


  # Canonical facade: client.GetBusinessAccountGift.list / client.GetBusinessAccountGift.load({ "id" => ... })
  def GetBusinessAccountGift(data = nil)
    require_relative 'entity/get_business_account_gift_entity'
    GetBusinessAccountGiftEntity.new(self, data)
  end


  # Canonical facade: client.GetChatGift.list / client.GetChatGift.load({ "id" => ... })
  def GetChatGift(data = nil)
    require_relative 'entity/get_chat_gift_entity'
    GetChatGiftEntity.new(self, data)
  end


  # Canonical facade: client.GetMe.list / client.GetMe.load({ "id" => ... })
  def GetMe(data = nil)
    require_relative 'entity/get_me_entity'
    GetMeEntity.new(self, data)
  end


  # Canonical facade: client.GetUserGift.list / client.GetUserGift.load({ "id" => ... })
  def GetUserGift(data = nil)
    require_relative 'entity/get_user_gift_entity'
    GetUserGiftEntity.new(self, data)
  end


  # Canonical facade: client.GetUserProfileAudio.list / client.GetUserProfileAudio.load({ "id" => ... })
  def GetUserProfileAudio(data = nil)
    require_relative 'entity/get_user_profile_audio_entity'
    GetUserProfileAudioEntity.new(self, data)
  end


  # Canonical facade: client.Message.list / client.Message.load({ "id" => ... })
  def Message(data = nil)
    require_relative 'entity/message_entity'
    MessageEntity.new(self, data)
  end


  # Canonical facade: client.MessageId.list / client.MessageId.load({ "id" => ... })
  def MessageId(data = nil)
    require_relative 'entity/message_id_entity'
    MessageIdEntity.new(self, data)
  end


  # Canonical facade: client.PromoteChatMember.list / client.PromoteChatMember.load({ "id" => ... })
  def PromoteChatMember(data = nil)
    require_relative 'entity/promote_chat_member_entity'
    PromoteChatMemberEntity.new(self, data)
  end


  # Canonical facade: client.RemoveMyProfilePhoto.list / client.RemoveMyProfilePhoto.load({ "id" => ... })
  def RemoveMyProfilePhoto(data = nil)
    require_relative 'entity/remove_my_profile_photo_entity'
    RemoveMyProfilePhotoEntity.new(self, data)
  end


  # Canonical facade: client.RepostStory.list / client.RepostStory.load({ "id" => ... })
  def RepostStory(data = nil)
    require_relative 'entity/repost_story_entity'
    RepostStoryEntity.new(self, data)
  end


  # Canonical facade: client.SendChatAction.list / client.SendChatAction.load({ "id" => ... })
  def SendChatAction(data = nil)
    require_relative 'entity/send_chat_action_entity'
    SendChatActionEntity.new(self, data)
  end


  # Canonical facade: client.SendMessageDraft.list / client.SendMessageDraft.load({ "id" => ... })
  def SendMessageDraft(data = nil)
    require_relative 'entity/send_message_draft_entity'
    SendMessageDraftEntity.new(self, data)
  end


  # Canonical facade: client.SetMyProfilePhoto.list / client.SetMyProfilePhoto.load({ "id" => ... })
  def SetMyProfilePhoto(data = nil)
    require_relative 'entity/set_my_profile_photo_entity'
    SetMyProfilePhotoEntity.new(self, data)
  end


  # Canonical facade: client.UnpinAllForumTopicMessage.list / client.UnpinAllForumTopicMessage.load({ "id" => ... })
  def UnpinAllForumTopicMessage(data = nil)
    require_relative 'entity/unpin_all_forum_topic_message_entity'
    UnpinAllForumTopicMessageEntity.new(self, data)
  end


  # Canonical facade: client.Update.list / client.Update.load({ "id" => ... })
  def Update(data = nil)
    require_relative 'entity/update_entity'
    UpdateEntity.new(self, data)
  end



  def self.test(testopts = nil, sdkopts = nil)
    sdkopts = sdkopts || {}
    sdkopts = VoxgigStruct.clone(sdkopts)
    sdkopts = {} unless sdkopts.is_a?(Hash)

    testopts = testopts || {}
    testopts = VoxgigStruct.clone(testopts)
    testopts = {} unless testopts.is_a?(Hash)
    testopts["active"] = true

    VoxgigStruct.setpath(sdkopts, "feature.test", testopts)

    sdk = TelegramBotSDK.new(sdkopts)
    sdk.mode = "test"
    sdk
  end
end
