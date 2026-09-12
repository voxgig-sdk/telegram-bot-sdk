import { TelegramBotEntityBase } from '../TelegramBotEntityBase';
import type { TelegramBotSDK } from '../TelegramBotSDK';
import type { Control } from '../types';
import type { EditForumTopic, EditForumTopicCreateData } from '../TelegramBotTypes';
declare class EditForumTopicEntity extends TelegramBotEntityBase<EditForumTopic> {
    constructor(client: TelegramBotSDK, entopts: any);
    make(this: EditForumTopicEntity): EditForumTopicEntity;
    create(this: any, reqdata?: EditForumTopicCreateData, ctrl?: Control): Promise<EditForumTopicEntity>;
}
export { EditForumTopicEntity };
