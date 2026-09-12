import { TelegramBotEntityBase } from '../TelegramBotEntityBase';
import type { TelegramBotSDK } from '../TelegramBotSDK';
import type { Control } from '../types';
import type { GetChatGift, GetChatGiftCreateData } from '../TelegramBotTypes';
declare class GetChatGiftEntity extends TelegramBotEntityBase<GetChatGift> {
    constructor(client: TelegramBotSDK, entopts: any);
    make(this: GetChatGiftEntity): GetChatGiftEntity;
    create(this: any, reqdata?: GetChatGiftCreateData, ctrl?: Control): Promise<GetChatGiftEntity>;
}
export { GetChatGiftEntity };
