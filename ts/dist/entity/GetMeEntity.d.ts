import { TelegramBotEntityBase } from '../TelegramBotEntityBase';
import type { TelegramBotSDK } from '../TelegramBotSDK';
import type { Control } from '../types';
import type { GetMe, GetMeListMatch, GetMeCreateData } from '../TelegramBotTypes';
declare class GetMeEntity extends TelegramBotEntityBase<GetMe> {
    constructor(client: TelegramBotSDK, entopts: any);
    make(this: GetMeEntity): GetMeEntity;
    list(this: any, reqmatch?: GetMeListMatch, ctrl?: Control): Promise<GetMeEntity[]>;
    create(this: any, reqdata?: GetMeCreateData, ctrl?: Control): Promise<GetMeEntity>;
}
export { GetMeEntity };
