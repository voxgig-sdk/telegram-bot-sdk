import { TelegramBotEntityBase } from '../TelegramBotEntityBase';
import type { TelegramBotSDK } from '../TelegramBotSDK';
import type { Control } from '../types';
import type { GetUserProfileAudio, GetUserProfileAudioCreateData } from '../TelegramBotTypes';
declare class GetUserProfileAudioEntity extends TelegramBotEntityBase<GetUserProfileAudio> {
    constructor(client: TelegramBotSDK, entopts: any);
    make(this: GetUserProfileAudioEntity): GetUserProfileAudioEntity;
    create(this: any, reqdata?: GetUserProfileAudioCreateData, ctrl?: Control): Promise<GetUserProfileAudioEntity>;
}
export { GetUserProfileAudioEntity };
