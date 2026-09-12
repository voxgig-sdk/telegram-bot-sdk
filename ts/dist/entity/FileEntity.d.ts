import { TelegramBotEntityBase } from '../TelegramBotEntityBase';
import type { TelegramBotSDK } from '../TelegramBotSDK';
import type { Control } from '../types';
import type { File, FileCreateData } from '../TelegramBotTypes';
declare class FileEntity extends TelegramBotEntityBase<File> {
    constructor(client: TelegramBotSDK, entopts: any);
    make(this: FileEntity): FileEntity;
    create(this: any, reqdata?: FileCreateData, ctrl?: Control): Promise<FileEntity>;
}
export { FileEntity };
