"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.TelegramBotError = void 0;
class TelegramBotError extends Error {
    isTelegramBotError = true;
    sdk = 'TelegramBot';
    code;
    ctx;
    status = -1;
    // `err.notFound` rather than a magic number at every call site.
    get notFound() { return 404 === this.status; }
    constructor(code, msg, ctx) {
        super(msg);
        this.code = code;
        this.ctx = ctx;
    }
}
exports.TelegramBotError = TelegramBotError;
//# sourceMappingURL=TelegramBotError.js.map