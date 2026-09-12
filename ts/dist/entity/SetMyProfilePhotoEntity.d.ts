import { TelegramBotEntityBase } from '../TelegramBotEntityBase';
import type { TelegramBotSDK } from '../TelegramBotSDK';
import type { Control } from '../types';
import type { SetMyProfilePhoto, SetMyProfilePhotoCreateData } from '../TelegramBotTypes';
declare class SetMyProfilePhotoEntity extends TelegramBotEntityBase<SetMyProfilePhoto> {
    constructor(client: TelegramBotSDK, entopts: any);
    make(this: SetMyProfilePhotoEntity): SetMyProfilePhotoEntity;
    create(this: any, reqdata?: SetMyProfilePhotoCreateData, ctrl?: Control): Promise<SetMyProfilePhotoEntity>;
}
export { SetMyProfilePhotoEntity };
