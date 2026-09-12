import { TelegramBotEntityBase } from '../TelegramBotEntityBase';
import type { TelegramBotSDK } from '../TelegramBotSDK';
import type { Control } from '../types';
import type { RemoveMyProfilePhoto, RemoveMyProfilePhotoCreateData } from '../TelegramBotTypes';
declare class RemoveMyProfilePhotoEntity extends TelegramBotEntityBase<RemoveMyProfilePhoto> {
    constructor(client: TelegramBotSDK, entopts: any);
    make(this: RemoveMyProfilePhotoEntity): RemoveMyProfilePhotoEntity;
    create(this: any, reqdata?: RemoveMyProfilePhotoCreateData, ctrl?: Control): Promise<RemoveMyProfilePhotoEntity>;
}
export { RemoveMyProfilePhotoEntity };
