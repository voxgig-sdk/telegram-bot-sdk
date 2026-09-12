import { TelegramBotEntityBase } from '../TelegramBotEntityBase';
import type { TelegramBotSDK } from '../TelegramBotSDK';
import type { Control } from '../types';
import type { ForumTopic, ForumTopicCreateData } from '../TelegramBotTypes';
declare class ForumTopicEntity extends TelegramBotEntityBase<ForumTopic> {
    constructor(client: TelegramBotSDK, entopts: any);
    make(this: ForumTopicEntity): ForumTopicEntity;
    create(this: any, reqdata?: ForumTopicCreateData, ctrl?: Control): Promise<ForumTopicEntity>;
}
export { ForumTopicEntity };
