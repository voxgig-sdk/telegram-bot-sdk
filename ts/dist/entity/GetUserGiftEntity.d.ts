import { TelegramBotEntityBase } from '../TelegramBotEntityBase';
import type { TelegramBotSDK } from '../TelegramBotSDK';
import type { Control } from '../types';
import type { GetUserGift, GetUserGiftCreateData } from '../TelegramBotTypes';
declare class GetUserGiftEntity extends TelegramBotEntityBase<GetUserGift> {
    constructor(client: TelegramBotSDK, entopts: any);
    make(this: GetUserGiftEntity): GetUserGiftEntity;
    create(this: any, reqdata?: GetUserGiftCreateData, ctrl?: Control): Promise<GetUserGiftEntity>;
}
export { GetUserGiftEntity };
