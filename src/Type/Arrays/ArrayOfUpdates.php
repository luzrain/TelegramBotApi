<?php

declare(strict_types=1);

namespace Luzrain\TelegramBotApi\Type\Arrays;

use Luzrain\TelegramBotApi\BaseArray;
use Luzrain\TelegramBotApi\Type\Update;

final class ArrayOfUpdates extends BaseArray
{
    protected static string $type = Update::class;
}
