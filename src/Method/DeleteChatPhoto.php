<?php

declare(strict_types=1);

namespace Luzrain\TelegramBotApi\Method;

use Luzrain\TelegramBotApi\BaseMethod;

/**
 * Use this method to delete a chat photo. Photos can't be changed for private chats.
 * The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights.
 * Returns True on success.
 *
 * @extends BaseMethod<true>
 */
final class DeleteChatPhoto extends BaseMethod
{
    protected static string $methodName = 'deleteChatPhoto';

    public function __construct(
        /**
         * Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         */
        protected int|string $chatId,
    ) {
    }
}
