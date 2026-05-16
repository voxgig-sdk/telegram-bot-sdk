
import { Context } from './Context'


class TelegramBotError extends Error {

  isTelegramBotError = true

  sdk = 'TelegramBot'

  code: string
  ctx: Context

  constructor(code: string, msg: string, ctx: Context) {
    super(msg)
    this.code = code
    this.ctx = ctx
  }

}

export {
  TelegramBotError
}

