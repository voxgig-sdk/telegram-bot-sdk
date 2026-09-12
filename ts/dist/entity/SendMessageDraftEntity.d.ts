import { TelegramBotEntityBase } from '../TelegramBotEntityBase';
import type { TelegramBotSDK } from '../TelegramBotSDK';
import type { Control } from '../types';
import type { SendMessageDraft, SendMessageDraftCreateData } from '../TelegramBotTypes';
declare class SendMessageDraftEntity extends TelegramBotEntityBase<SendMessageDraft> {
    constructor(client: TelegramBotSDK, entopts: any);
    make(this: SendMessageDraftEntity): SendMessageDraftEntity;
    create(this: any, reqdata?: SendMessageDraftCreateData, ctrl?: Control): Promise<SendMessageDraftEntity>;
}
export { SendMessageDraftEntity };
