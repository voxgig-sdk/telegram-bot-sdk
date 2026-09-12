import { TelegramBotEntityBase } from '../TelegramBotEntityBase';
import type { TelegramBotSDK } from '../TelegramBotSDK';
import type { Control } from '../types';
import type { SendChatAction, SendChatActionCreateData } from '../TelegramBotTypes';
declare class SendChatActionEntity extends TelegramBotEntityBase<SendChatAction> {
    constructor(client: TelegramBotSDK, entopts: any);
    make(this: SendChatActionEntity): SendChatActionEntity;
    create(this: any, reqdata?: SendChatActionCreateData, ctrl?: Control): Promise<SendChatActionEntity>;
}
export { SendChatActionEntity };
