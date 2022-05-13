<?php

namespace TelegramBot\Api\Types\Passport;

/**
 * Represents an issue with one of the files that constitute the translation of a document. The error is considered resolved when the file changes.
 */
class PassportElementErrorTranslationFile extends PassportElementError
{
    protected static array $map = [
        'source' => true,
        'type' => true,
        'file_hash' => true,
        'message' => true,
    ];

    public static function create(
        string $type,
        string $fileHash,
        string $message,
    ): self {
        $instance = new self();
        $instance->type = $type;
        $instance->fileHash = $fileHash;
        $instance->message = $message;

        return $instance;
    }

    /**
     * Error source, must be translation_file
     */
    protected string $source = 'translation_file';

    /**
     * Type of element of the user's Telegram Passport which has the issue, one of“passport”, “driver_license”,“identity_card”,
     * “internal_passport”, “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration”, “temporary_registration”
     */
    protected string $type;

    /**
     * Base64-encoded file hash
     */
    protected string $fileHash;

    /**
     * Error message
     */
    protected string $message;

    public function getSource(): string
    {
        return $this->source;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getFileHash(): string
    {
        return $this->fileHash;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}
