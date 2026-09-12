import { TelegramBotEntityBase } from '../TelegramBotEntityBase';
import type { TelegramBotSDK } from '../TelegramBotSDK';
import type { Control } from '../types';
import type { MessageId, MessageIdCreateData } from '../TelegramBotTypes';
declare class MessageIdEntity extends TelegramBotEntityBase<MessageId> {
    constructor(client: TelegramBotSDK, entopts: any);
    make(this: MessageIdEntity): MessageIdEntity;
    create(this: any, reqdata?: MessageIdCreateData, ctrl?: Control): Promise<MessageIdEntity>;
}
export { MessageIdEntity };
