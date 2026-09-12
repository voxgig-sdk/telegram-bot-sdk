import { TelegramBotEntityBase } from '../TelegramBotEntityBase';
import type { TelegramBotSDK } from '../TelegramBotSDK';
import type { Control } from '../types';
import type { RepostStory, RepostStoryCreateData } from '../TelegramBotTypes';
declare class RepostStoryEntity extends TelegramBotEntityBase<RepostStory> {
    constructor(client: TelegramBotSDK, entopts: any);
    make(this: RepostStoryEntity): RepostStoryEntity;
    create(this: any, reqdata?: RepostStoryCreateData, ctrl?: Control): Promise<RepostStoryEntity>;
}
export { RepostStoryEntity };
