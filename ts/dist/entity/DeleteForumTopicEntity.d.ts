import { TelegramBotEntityBase } from '../TelegramBotEntityBase';
import type { TelegramBotSDK } from '../TelegramBotSDK';
import type { Control } from '../types';
import type { DeleteForumTopic, DeleteForumTopicCreateData } from '../TelegramBotTypes';
declare class DeleteForumTopicEntity extends TelegramBotEntityBase<DeleteForumTopic> {
    constructor(client: TelegramBotSDK, entopts: any);
    make(this: DeleteForumTopicEntity): DeleteForumTopicEntity;
    create(this: any, reqdata?: DeleteForumTopicCreateData, ctrl?: Control): Promise<DeleteForumTopicEntity>;
}
export { DeleteForumTopicEntity };
