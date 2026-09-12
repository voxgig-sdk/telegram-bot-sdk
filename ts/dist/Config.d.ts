import { BaseFeature } from './feature/base/BaseFeature';
declare const FEATURE_PLUGINS: Record<string, any[]>;
declare class Config {
    makeFeature(this: any, fn: string): BaseFeature;
    hasFeature(this: any, fn: string): boolean;
    main: {
        name: string;
        slug: string;
        version: string;
        target: string;
    };
    feature: {
        test: {
            options: {
                active: boolean;
            };
            transport: string;
        };
    };
    options: {
        base: string;
        server: {
            token: string;
        };
        auth: {
            prefix: string;
        };
        headers: {
            "content-type": string;
        };
        entity: {
            approve_suggested_post: {};
            decline_suggested_post: {};
            delete_forum_topic: {};
            edit_forum_topic: {};
            file: {};
            forum_topic: {};
            get_business_account_gift: {};
            get_chat_gift: {};
            get_me: {};
            get_user_gift: {};
            get_user_profile_audio: {};
            message: {};
            message_id: {};
            promote_chat_member: {};
            remove_my_profile_photo: {};
            repost_story: {};
            send_chat_action: {};
            send_message_draft: {};
            set_my_profile_photo: {};
            unpin_all_forum_topic_message: {};
            update: {};
        };
    };
    entity: {
        approve_suggested_post: {
            fields: ({
                name: string;
                req: boolean;
                type: string;
                union: {
                    branches: number;
                    count: number;
                    depth: number;
                };
                short?: undefined;
            } | {
                name: string;
                short: string;
                type: string;
                req?: undefined;
                union?: undefined;
            } | {
                name: string;
                req: boolean;
                type: string;
                union?: undefined;
                short?: undefined;
            } | {
                name: string;
                req: boolean;
                short: string;
                type: string;
                union?: undefined;
            } | {
                name: string;
                type: string;
                req?: undefined;
                union?: undefined;
                short?: undefined;
            })[];
            name: string;
            op: {
                create: {
                    input: string;
                    name: string;
                    points: {
                        args: {};
                        kind: string;
                        method: string;
                        orig: string;
                        segments: {
                            lit: string;
                        }[];
                        select: {};
                        transform: {
                            req: string;
                            res: string;
                        };
                        parts: string[];
                    }[];
                };
            };
            relations: {
                ancestors: never[];
            };
        };
        decline_suggested_post: {
            fields: ({
                name: string;
                req: boolean;
                type: string;
                union: {
                    branches: number;
                    count: number;
                    depth: number;
                };
                short?: undefined;
            } | {
                name: string;
                short: string;
                type: string;
                req?: undefined;
                union?: undefined;
            } | {
                name: string;
                req: boolean;
                type: string;
                union?: undefined;
                short?: undefined;
            } | {
                name: string;
                req: boolean;
                short: string;
                type: string;
                union?: undefined;
            } | {
                name: string;
                type: string;
                req?: undefined;
                union?: undefined;
                short?: undefined;
            })[];
            name: string;
            op: {
                create: {
                    input: string;
                    name: string;
                    points: {
                        args: {};
                        kind: string;
                        method: string;
                        orig: string;
                        segments: {
                            lit: string;
                        }[];
                        select: {};
                        transform: {
                            req: string;
                            res: string;
                        };
                        parts: string[];
                    }[];
                };
            };
            relations: {
                ancestors: never[];
            };
        };
        delete_forum_topic: {
            fields: ({
                name: string;
                req: boolean;
                type: string;
                union: {
                    branches: number;
                    count: number;
                    depth: number;
                };
                short?: undefined;
            } | {
                name: string;
                short: string;
                type: string;
                req?: undefined;
                union?: undefined;
            } | {
                name: string;
                req: boolean;
                type: string;
                union?: undefined;
                short?: undefined;
            } | {
                name: string;
                req: boolean;
                short: string;
                type: string;
                union?: undefined;
            } | {
                name: string;
                type: string;
                req?: undefined;
                union?: undefined;
                short?: undefined;
            })[];
            name: string;
            op: {
                create: {
                    input: string;
                    name: string;
                    points: {
                        args: {};
                        kind: string;
                        method: string;
                        orig: string;
                        segments: {
                            lit: string;
                        }[];
                        select: {};
                        transform: {
                            req: string;
                            res: string;
                        };
                        parts: string[];
                    }[];
                };
            };
            relations: {
                ancestors: never[];
            };
        };
        edit_forum_topic: {
            fields: ({
                name: string;
                req: boolean;
                type: string;
                union: {
                    branches: number;
                    count: number;
                    depth: number;
                };
                short?: undefined;
            } | {
                name: string;
                short: string;
                type: string;
                req?: undefined;
                union?: undefined;
            } | {
                name: string;
                type: string;
                req?: undefined;
                union?: undefined;
                short?: undefined;
            } | {
                name: string;
                req: boolean;
                type: string;
                union?: undefined;
                short?: undefined;
            } | {
                name: string;
                req: boolean;
                short: string;
                type: string;
                union?: undefined;
            })[];
            name: string;
            op: {
                create: {
                    input: string;
                    name: string;
                    points: {
                        args: {};
                        kind: string;
                        method: string;
                        orig: string;
                        segments: {
                            lit: string;
                        }[];
                        select: {};
                        transform: {
                            req: string;
                            res: string;
                        };
                        parts: string[];
                    }[];
                };
            };
            relations: {
                ancestors: never[];
            };
        };
        file: {
            fields: {
                name: string;
                req: boolean;
                type: string;
            }[];
            name: string;
            op: {
                create: {
                    input: string;
                    name: string;
                    points: {
                        args: {};
                        kind: string;
                        method: string;
                        orig: string;
                        segments: {
                            lit: string;
                        }[];
                        select: {};
                        transform: {
                            req: string;
                            res: string;
                        };
                        parts: string[];
                    }[];
                };
            };
            relations: {
                ancestors: never[];
            };
        };
        forum_topic: {
            fields: ({
                name: string;
                req: boolean;
                type: string;
                union: {
                    branches: number;
                    count: number;
                    depth: number;
                };
            } | {
                name: string;
                type: string;
                req?: undefined;
                union?: undefined;
            } | {
                name: string;
                req: boolean;
                type: string;
                union?: undefined;
            })[];
            name: string;
            op: {
                create: {
                    input: string;
                    name: string;
                    points: {
                        args: {};
                        kind: string;
                        method: string;
                        orig: string;
                        segments: {
                            lit: string;
                        }[];
                        select: {};
                        transform: {
                            req: string;
                            res: string;
                        };
                        parts: string[];
                    }[];
                };
            };
            relations: {
                ancestors: never[];
            };
        };
        get_business_account_gift: {
            fields: ({
                name: string;
                short: string;
                type: string;
                req?: undefined;
            } | {
                name: string;
                type: string;
                short?: undefined;
                req?: undefined;
            } | {
                name: string;
                req: boolean;
                short: string;
                type: string;
            })[];
            name: string;
            op: {
                create: {
                    input: string;
                    name: string;
                    points: {
                        args: {};
                        kind: string;
                        method: string;
                        orig: string;
                        segments: {
                            lit: string;
                        }[];
                        select: {};
                        transform: {
                            req: string;
                            res: string;
                        };
                        parts: string[];
                    }[];
                };
            };
            relations: {
                ancestors: never[];
            };
        };
        get_chat_gift: {
            fields: ({
                name: string;
                req: boolean;
                type: string;
                union: {
                    branches: number;
                    count: number;
                    depth: number;
                };
                short?: undefined;
            } | {
                name: string;
                short: string;
                type: string;
                req?: undefined;
                union?: undefined;
            } | {
                name: string;
                req: boolean;
                short: string;
                type: string;
                union?: undefined;
            } | {
                name: string;
                type: string;
                req?: undefined;
                union?: undefined;
                short?: undefined;
            })[];
            name: string;
            op: {
                create: {
                    input: string;
                    name: string;
                    points: {
                        args: {};
                        kind: string;
                        method: string;
                        orig: string;
                        segments: {
                            lit: string;
                        }[];
                        select: {};
                        transform: {
                            req: string;
                            res: string;
                        };
                        parts: string[];
                    }[];
                };
            };
            relations: {
                ancestors: never[];
            };
        };
        get_me: {
            fields: ({
                name: string;
                short: string;
                type: string;
                req?: undefined;
            } | {
                name: string;
                req: boolean;
                short: string;
                type: string;
            } | {
                name: string;
                type: string;
                short?: undefined;
                req?: undefined;
            })[];
            name: string;
            op: {
                create: {
                    input: string;
                    name: string;
                    points: {
                        args: {};
                        kind: string;
                        method: string;
                        orig: string;
                        segments: {
                            lit: string;
                        }[];
                        select: {};
                        transform: {
                            req: string;
                            res: string;
                        };
                        parts: string[];
                    }[];
                };
                load: {
                    input: string;
                    name: string;
                    points: {
                        args: {};
                        kind: string;
                        method: string;
                        orig: string;
                        segments: {
                            lit: string;
                        }[];
                        select: {};
                        transform: {
                            req: string;
                            res: string;
                        };
                        parts: string[];
                    }[];
                };
            };
            relations: {
                ancestors: never[];
            };
        };
        get_user_gift: {
            fields: ({
                name: string;
                short: string;
                type: string;
                req?: undefined;
            } | {
                name: string;
                req: boolean;
                short: string;
                type: string;
            } | {
                name: string;
                type: string;
                short?: undefined;
                req?: undefined;
            } | {
                name: string;
                req: boolean;
                type: string;
                short?: undefined;
            })[];
            name: string;
            op: {
                create: {
                    input: string;
                    name: string;
                    points: {
                        args: {};
                        kind: string;
                        method: string;
                        orig: string;
                        segments: {
                            lit: string;
                        }[];
                        select: {};
                        transform: {
                            req: string;
                            res: string;
                        };
                        parts: string[];
                    }[];
                };
            };
            relations: {
                ancestors: never[];
            };
        };
        get_user_profile_audio: {
            fields: ({
                name: string;
                short: string;
                type: string;
                req?: undefined;
            } | {
                name: string;
                req: boolean;
                short: string;
                type: string;
            } | {
                name: string;
                type: string;
                short?: undefined;
                req?: undefined;
            } | {
                name: string;
                req: boolean;
                type: string;
                short?: undefined;
            })[];
            name: string;
            op: {
                create: {
                    input: string;
                    name: string;
                    points: {
                        args: {};
                        kind: string;
                        method: string;
                        orig: string;
                        segments: {
                            lit: string;
                        }[];
                        select: {};
                        transform: {
                            req: string;
                            res: string;
                        };
                        parts: string[];
                    }[];
                };
            };
            relations: {
                ancestors: never[];
            };
        };
        message: {
            fields: ({
                name: string;
                req: boolean;
                short: string;
                type: string;
                union: {
                    branches: number;
                    count: number;
                    depth: number;
                };
                format?: undefined;
            } | {
                name: string;
                short: string;
                type: string;
                req?: undefined;
                union?: undefined;
                format?: undefined;
            } | {
                name: string;
                req: boolean;
                type: string;
                union: {
                    branches: number;
                    count: number;
                    depth: number;
                };
                short?: undefined;
                format?: undefined;
            } | {
                format: string;
                name: string;
                req: boolean;
                type: string;
                short?: undefined;
                union?: undefined;
            } | {
                name: string;
                req: boolean;
                type: string;
                short?: undefined;
                union?: undefined;
                format?: undefined;
            } | {
                name: string;
                req: boolean;
                short: string;
                type: string;
                union?: undefined;
                format?: undefined;
            })[];
            name: string;
            op: {
                create: {
                    input: string;
                    name: string;
                    points: {
                        args: {};
                        kind: string;
                        method: string;
                        orig: string;
                        segments: {
                            lit: string;
                        }[];
                        select: {};
                        transform: {
                            req: string;
                            res: string;
                        };
                        parts: string[];
                    }[];
                };
            };
            relations: {
                ancestors: never[];
            };
        };
        message_id: {
            fields: ({
                name: string;
                req: boolean;
                type: string;
                union: {
                    branches: number;
                    count: number;
                    depth: number;
                };
            } | {
                name: string;
                type: string;
                req?: undefined;
                union?: undefined;
            } | {
                name: string;
                req: boolean;
                type: string;
                union?: undefined;
            })[];
            name: string;
            op: {
                create: {
                    input: string;
                    name: string;
                    points: {
                        args: {};
                        kind: string;
                        method: string;
                        orig: string;
                        segments: {
                            lit: string;
                        }[];
                        select: {};
                        transform: {
                            req: {
                                message_id: string;
                            };
                            res: string;
                        };
                        parts: string[];
                    }[];
                };
            };
            relations: {
                ancestors: never[];
            };
        };
        promote_chat_member: {
            fields: ({
                name: string;
                type: string;
                req?: undefined;
                union?: undefined;
                short?: undefined;
            } | {
                name: string;
                req: boolean;
                type: string;
                union: {
                    branches: number;
                    count: number;
                    depth: number;
                };
                short?: undefined;
            } | {
                name: string;
                short: string;
                type: string;
                req?: undefined;
                union?: undefined;
            } | {
                name: string;
                req: boolean;
                short: string;
                type: string;
                union?: undefined;
            } | {
                name: string;
                req: boolean;
                type: string;
                union?: undefined;
                short?: undefined;
            })[];
            name: string;
            op: {
                create: {
                    input: string;
                    name: string;
                    points: {
                        args: {};
                        kind: string;
                        method: string;
                        orig: string;
                        segments: {
                            lit: string;
                        }[];
                        select: {};
                        transform: {
                            req: string;
                            res: string;
                        };
                        parts: string[];
                    }[];
                };
            };
            relations: {
                ancestors: never[];
            };
        };
        remove_my_profile_photo: {
            fields: ({
                name: string;
                short: string;
                type: string;
                req?: undefined;
            } | {
                name: string;
                req: boolean;
                short: string;
                type: string;
            } | {
                name: string;
                type: string;
                short?: undefined;
                req?: undefined;
            })[];
            name: string;
            op: {
                create: {
                    input: string;
                    name: string;
                    points: {
                        args: {};
                        kind: string;
                        method: string;
                        orig: string;
                        segments: {
                            lit: string;
                        }[];
                        select: {};
                        transform: {
                            req: string;
                            res: string;
                        };
                        parts: string[];
                    }[];
                };
            };
            relations: {
                ancestors: never[];
            };
        };
        repost_story: {
            fields: ({
                name: string;
                req: boolean;
                type: string;
                union: {
                    branches: number;
                    count: number;
                    depth: number;
                };
                short?: undefined;
            } | {
                name: string;
                short: string;
                type: string;
                req?: undefined;
                union?: undefined;
            } | {
                name: string;
                req: boolean;
                short: string;
                type: string;
                union?: undefined;
            } | {
                name: string;
                type: string;
                req?: undefined;
                union?: undefined;
                short?: undefined;
            } | {
                name: string;
                req: boolean;
                type: string;
                union?: undefined;
                short?: undefined;
            })[];
            name: string;
            op: {
                create: {
                    input: string;
                    name: string;
                    points: {
                        args: {};
                        kind: string;
                        method: string;
                        orig: string;
                        segments: {
                            lit: string;
                        }[];
                        select: {};
                        transform: {
                            req: string;
                            res: string;
                        };
                        parts: string[];
                    }[];
                };
            };
            relations: {
                ancestors: never[];
            };
        };
        send_chat_action: {
            fields: ({
                name: string;
                req: boolean;
                type: string;
                union?: undefined;
                short?: undefined;
            } | {
                name: string;
                req: boolean;
                type: string;
                union: {
                    branches: number;
                    count: number;
                    depth: number;
                };
                short?: undefined;
            } | {
                name: string;
                short: string;
                type: string;
                req?: undefined;
                union?: undefined;
            } | {
                name: string;
                type: string;
                req?: undefined;
                union?: undefined;
                short?: undefined;
            } | {
                name: string;
                req: boolean;
                short: string;
                type: string;
                union?: undefined;
            })[];
            name: string;
            op: {
                create: {
                    input: string;
                    name: string;
                    points: {
                        args: {};
                        kind: string;
                        method: string;
                        orig: string;
                        segments: {
                            lit: string;
                        }[];
                        select: {};
                        transform: {
                            req: string;
                            res: string;
                        };
                        parts: string[];
                    }[];
                };
            };
            relations: {
                ancestors: never[];
            };
        };
        send_message_draft: {
            fields: ({
                name: string;
                req: boolean;
                type: string;
                union: {
                    branches: number;
                    count: number;
                    depth: number;
                };
                short?: undefined;
            } | {
                name: string;
                short: string;
                type: string;
                req?: undefined;
                union?: undefined;
            } | {
                name: string;
                type: string;
                req?: undefined;
                union?: undefined;
                short?: undefined;
            } | {
                name: string;
                req: boolean;
                short: string;
                type: string;
                union?: undefined;
            } | {
                name: string;
                req: boolean;
                type: string;
                union?: undefined;
                short?: undefined;
            })[];
            name: string;
            op: {
                create: {
                    input: string;
                    name: string;
                    points: {
                        args: {};
                        kind: string;
                        method: string;
                        orig: string;
                        segments: {
                            lit: string;
                        }[];
                        select: {};
                        transform: {
                            req: string;
                            res: string;
                        };
                        parts: string[];
                    }[];
                };
            };
            relations: {
                ancestors: never[];
            };
        };
        set_my_profile_photo: {
            fields: ({
                name: string;
                short: string;
                type: string;
                req?: undefined;
            } | {
                name: string;
                req: boolean;
                short: string;
                type: string;
            } | {
                name: string;
                type: string;
                short?: undefined;
                req?: undefined;
            })[];
            name: string;
            op: {
                create: {
                    input: string;
                    name: string;
                    points: {
                        args: {};
                        kind: string;
                        method: string;
                        orig: string;
                        segments: {
                            lit: string;
                        }[];
                        select: {};
                        transform: {
                            req: string;
                            res: string;
                        };
                        parts: string[];
                    }[];
                };
            };
            relations: {
                ancestors: never[];
            };
        };
        unpin_all_forum_topic_message: {
            fields: ({
                name: string;
                req: boolean;
                type: string;
                union: {
                    branches: number;
                    count: number;
                    depth: number;
                };
                short?: undefined;
            } | {
                name: string;
                short: string;
                type: string;
                req?: undefined;
                union?: undefined;
            } | {
                name: string;
                req: boolean;
                type: string;
                union?: undefined;
                short?: undefined;
            } | {
                name: string;
                req: boolean;
                short: string;
                type: string;
                union?: undefined;
            } | {
                name: string;
                type: string;
                req?: undefined;
                union?: undefined;
                short?: undefined;
            })[];
            name: string;
            op: {
                create: {
                    input: string;
                    name: string;
                    points: {
                        args: {};
                        kind: string;
                        method: string;
                        orig: string;
                        segments: {
                            lit: string;
                        }[];
                        select: {};
                        transform: {
                            req: string;
                            res: string;
                        };
                        parts: string[];
                    }[];
                };
            };
            relations: {
                ancestors: never[];
            };
        };
        update: {
            fields: ({
                name: string;
                type: string;
                short?: undefined;
                req?: undefined;
            } | {
                name: string;
                short: string;
                type: string;
                req?: undefined;
            } | {
                name: string;
                req: boolean;
                short: string;
                type: string;
            })[];
            name: string;
            op: {
                create: {
                    input: string;
                    name: string;
                    points: {
                        args: {};
                        kind: string;
                        method: string;
                        orig: string;
                        segments: {
                            lit: string;
                        }[];
                        select: {};
                        transform: {
                            req: string;
                            res: string;
                        };
                        parts: string[];
                    }[];
                };
                list: {
                    input: string;
                    name: string;
                    points: {
                        args: {
                            query: ({
                                kind: string;
                                name: string;
                                orig: string;
                                type: string;
                                example?: undefined;
                            } | {
                                example: number;
                                kind: string;
                                name: string;
                                orig: string;
                                type: string;
                            })[];
                        };
                        kind: string;
                        method: string;
                        orig: string;
                        segments: {
                            lit: string;
                        }[];
                        select: {
                            exist: string[];
                        };
                        transform: {
                            req: string;
                            res: string;
                        };
                        parts: string[];
                    }[];
                };
            };
            relations: {
                ancestors: never[];
            };
        };
    };
}
declare const config: Config;
export { config, FEATURE_PLUGINS, };
