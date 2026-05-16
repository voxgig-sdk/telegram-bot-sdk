-- TelegramBot SDK error

local TelegramBotError = {}
TelegramBotError.__index = TelegramBotError


function TelegramBotError.new(code, msg, ctx)
  local self = setmetatable({}, TelegramBotError)
  self.is_sdk_error = true
  self.sdk = "TelegramBot"
  self.code = code or ""
  self.msg = msg or ""
  self.ctx = ctx
  self.result = nil
  self.spec = nil
  return self
end


function TelegramBotError:error()
  return self.msg
end


function TelegramBotError:__tostring()
  return self.msg
end


return TelegramBotError
