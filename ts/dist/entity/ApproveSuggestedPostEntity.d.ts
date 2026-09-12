import { TelegramBotEntityBase } from '../TelegramBotEntityBase';
import type { TelegramBotSDK } from '../TelegramBotSDK';
import type { Control } from '../types';
import type { ApproveSuggestedPost, ApproveSuggestedPostCreateData } from '../TelegramBotTypes';
declare class ApproveSuggestedPostEntity extends TelegramBotEntityBase<ApproveSuggestedPost> {
    constructor(client: TelegramBotSDK, entopts: any);
    make(this: ApproveSuggestedPostEntity): ApproveSuggestedPostEntity;
    create(this: any, reqdata?: ApproveSuggestedPostCreateData, ctrl?: Control): Promise<ApproveSuggestedPostEntity>;
}
export { ApproveSuggestedPostEntity };
