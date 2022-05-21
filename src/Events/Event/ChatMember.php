<?php

declare(strict_types=1);

namespace TelegramBot\Api\Events\Event;

use TelegramBot\Api\Events\Event;
use TelegramBot\Api\Types\Update;

final class ChatMember extends Event
{
    public function executeChecker(Update $update): bool
    {
        return $update->getChatMember() !== null;
    }

    public function executeAction(Update $update): mixed
    {
        return $this->callback($update->getChatMember());
    }
}
