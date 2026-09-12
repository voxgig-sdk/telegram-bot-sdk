import { TelegramBotEntityBase } from '../TelegramBotEntityBase';
import type { TelegramBotSDK } from '../TelegramBotSDK';
import type { Control } from '../types';
import type { DeclineSuggestedPost, DeclineSuggestedPostCreateData } from '../TelegramBotTypes';
declare class DeclineSuggestedPostEntity extends TelegramBotEntityBase<DeclineSuggestedPost> {
    constructor(client: TelegramBotSDK, entopts: any);
    make(this: DeclineSuggestedPostEntity): DeclineSuggestedPostEntity;
    create(this: any, reqdata?: DeclineSuggestedPostCreateData, ctrl?: Control): Promise<DeclineSuggestedPostEntity>;
}
export { DeclineSuggestedPostEntity };
