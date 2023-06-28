<?php

declare(strict_types=1);

namespace Luzrain\TelegramBotApi\Event;

use Luzrain\TelegramBotApi\Event;
use Luzrain\TelegramBotApi\Type;

final class MyChatMember extends Event
{
    public function executeChecker(Type\Update $update): bool
    {
        return $update->myChatMember !== null;
    }

    public function executeCallback(Type\Update $update): mixed
    {
        return $this->callback($update->myChatMember);
    }
}
