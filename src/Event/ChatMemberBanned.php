<?php

declare(strict_types=1);

namespace Luzrain\TelegramBotApi\Event;

use Luzrain\TelegramBotApi\BaseMethod;
use Luzrain\TelegramBotApi\Event;
use Luzrain\TelegramBotApi\Type\ChatMemberBanned as ChatMemberBannedType;
use Luzrain\TelegramBotApi\Type\Update;

final class ChatMemberBanned extends Event
{
    public function executeChecker(Update $update): bool
    {
        return $update->getMyChatMember()?->getNewChatMember() instanceof ChatMemberBannedType;
    }

    public function executeAction(Update $update): BaseMethod|null
    {
        return $this->callback($update->getMyChatMember()->getFrom());
    }
}
