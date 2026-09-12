import { Context } from './Context';
declare class TelegramBotError extends Error {
    isTelegramBotError: boolean;
    sdk: string;
    code: string;
    ctx: Context;
    status: number;
    get notFound(): boolean;
    constructor(code: string, msg: string, ctx: Context);
}
export { TelegramBotError };
