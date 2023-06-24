<?php

declare(strict_types=1);

namespace Luzrain\TelegramBotApi\Method;

use Luzrain\TelegramBotApi\BaseMethod;
use Luzrain\TelegramBotApi\Type\ChatAdministratorRights;

/**
 * Use this method to get the current default administrator rights of the bot.
 * Returns ChatAdministratorRights on success.
 *
 * @extends BaseMethod<ChatAdministratorRights>
 */
final class GetMyDefaultAdministratorRights extends BaseMethod
{
    protected static string $methodName = 'getMyDefaultAdministratorRights';
    protected static string $responseClass = ChatAdministratorRights::class;

    public function __construct(
        /**
         * Pass True to get default administrator rights of the bot in channels.
         * Otherwise, default administrator rights of the bot for groups and supergroups will be returned.
         */
        protected bool|null $forChannels = null,
    ) {
    }
}
