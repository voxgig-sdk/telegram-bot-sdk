import { TelegramBotEntityBase } from '../TelegramBotEntityBase';
import type { TelegramBotSDK } from '../TelegramBotSDK';
import type { Control } from '../types';
import type { GetBusinessAccountGift, GetBusinessAccountGiftCreateData } from '../TelegramBotTypes';
declare class GetBusinessAccountGiftEntity extends TelegramBotEntityBase<GetBusinessAccountGift> {
    constructor(client: TelegramBotSDK, entopts: any);
    make(this: GetBusinessAccountGiftEntity): GetBusinessAccountGiftEntity;
    create(this: any, reqdata?: GetBusinessAccountGiftCreateData, ctrl?: Control): Promise<GetBusinessAccountGiftEntity>;
}
export { GetBusinessAccountGiftEntity };
