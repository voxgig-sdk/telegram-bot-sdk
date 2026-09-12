import { TelegramBotEntityBase } from '../TelegramBotEntityBase';
import type { TelegramBotSDK } from '../TelegramBotSDK';
import type { Control } from '../types';
import type { Update, UpdateListMatch, UpdateCreateData } from '../TelegramBotTypes';
declare class UpdateEntity extends TelegramBotEntityBase<Update> {
    constructor(client: TelegramBotSDK, entopts: any);
    make(this: UpdateEntity): UpdateEntity;
    list(this: any, reqmatch?: UpdateListMatch, ctrl?: Control): Promise<UpdateEntity[]>;
    create(this: any, reqdata?: UpdateCreateData, ctrl?: Control): Promise<UpdateEntity>;
}
export { UpdateEntity };
