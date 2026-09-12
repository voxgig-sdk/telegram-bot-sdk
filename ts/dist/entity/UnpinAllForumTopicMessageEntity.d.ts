import { TelegramBotEntityBase } from '../TelegramBotEntityBase';
import type { TelegramBotSDK } from '../TelegramBotSDK';
import type { Control } from '../types';
import type { UnpinAllForumTopicMessage, UnpinAllForumTopicMessageCreateData } from '../TelegramBotTypes';
declare class UnpinAllForumTopicMessageEntity extends TelegramBotEntityBase<UnpinAllForumTopicMessage> {
    constructor(client: TelegramBotSDK, entopts: any);
    make(this: UnpinAllForumTopicMessageEntity): UnpinAllForumTopicMessageEntity;
    create(this: any, reqdata?: UnpinAllForumTopicMessageCreateData, ctrl?: Control): Promise<UnpinAllForumTopicMessageEntity>;
}
export { UnpinAllForumTopicMessageEntity };
