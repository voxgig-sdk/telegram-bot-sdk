import { TelegramBotEntityBase } from '../TelegramBotEntityBase';
import type { TelegramBotSDK } from '../TelegramBotSDK';
import type { Control } from '../types';
import type { PromoteChatMember, PromoteChatMemberCreateData } from '../TelegramBotTypes';
declare class PromoteChatMemberEntity extends TelegramBotEntityBase<PromoteChatMember> {
    constructor(client: TelegramBotSDK, entopts: any);
    make(this: PromoteChatMemberEntity): PromoteChatMemberEntity;
    create(this: any, reqdata?: PromoteChatMemberCreateData, ctrl?: Control): Promise<PromoteChatMemberEntity>;
}
export { PromoteChatMemberEntity };
