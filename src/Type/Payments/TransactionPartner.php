<?php

declare(strict_types=1);

namespace Luzrain\TelegramBotApi\Type\Payments;

use Luzrain\TelegramBotApi\Type;

/**
 * This object describes the source of a transaction, or its recipient for outgoing transactions. Currently, it can be one of
 *
 * @see TransactionPartnerFragment
 * @see TransactionPartnerUser
 * @see TransactionPartnerOther
 */
readonly class TransactionPartner extends Type
{
    protected function __construct(
        /**
         * Type of the transaction partner
         */
        public string $type,
    ) {
    }

    /**
     * @psalm-suppress LessSpecificReturnStatement
     * @psalm-suppress MoreSpecificReturnType
     */
    public static function fromArray(array $data): static
    {
        /** @var self $instance */
        $instance = parent::fromArray($data);

        return self::class !== static::class ? $instance : match ($instance->type) {
            TransactionPartnerFragment::TYPE => TransactionPartnerFragment::fromArray($data),
            TransactionPartnerUser::TYPE => TransactionPartnerUser::fromArray($data),
            TransactionPartnerOther::TYPE => TransactionPartnerOther::fromArray($data),
        };
    }
}
