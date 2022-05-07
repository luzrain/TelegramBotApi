<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Contains information about the current status of a webhook.
 */
class WebhookInfo extends BaseType implements TypeInterface
{
    protected static array $requiredParams = [
        'url',
        'has_custom_certificate',
        'pending_update_count',
    ];

    protected static array $map = [
        'url' => true,
        'has_custom_certificate' => true,
        'pending_update_count' => true,
        'ip_address' => true,
        'last_error_date' => true,
        'last_error_message' => true,
        'last_synchronization_error_date' => true,
        'max_connections' => true,
        'allowed_updates' => true
    ];

    /**
     * Webhook URL, may be empty if webhook is not set up
     */
    protected string $url;

    /**
     * True, if a custom certificate was provided for webhook certificate checks
     */
    protected bool $hasCustomCertificate;

    /**
     * Number of updates awaiting delivery
     */
    protected int $pendingUpdateCount;

    /**
     * Optional. Currently used webhook IP address
     */
    protected ?string $ipAddress = null;

    /**
     * Optional. Unix time for the most recent error that happened when trying to deliver an update via webhook
     */
    protected ?int $lastErrorDate = null;

    /**
     * Optional. Error message in human-readable format for the most recent error that happened when trying to deliver an update via webhook
     */
    protected ?string $lastErrorMessage = null;

    /**
     * Optional. Unix time of the most recent error that happened when trying to synchronize available updates with Telegram datacenters
     */
    protected ?string $lastSynchronizationErrorDate = null;

    /**
     * Optional. Maximum allowed number of simultaneous HTTPS connections to the webhook for update delivery
     */
    protected ?int $maxConnections = null;

    /**
     * Optional. A list of update types the bot is subscribed to. Defaults to all update types except chat_member
     */
    protected ?array $allowedUpdates = null;

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function hasCustomCertificate(): bool
    {
        return $this->hasCustomCertificate;
    }

    public function setHasCustomCertificate(bool $hasCustomCertificate): void
    {
        $this->hasCustomCertificate = $hasCustomCertificate;
    }

    public function getPendingUpdateCount(): int
    {
        return $this->pendingUpdateCount;
    }

    public function setPendingUpdateCount(int $pendingUpdateCount)
    {
        $this->pendingUpdateCount = $pendingUpdateCount;
    }

    public function getIpAddress(): ?string
    {
        return $this->ipAddress;
    }

    public function setIpAddress(string $ipAddress)
    {
        $this->ipAddress = $ipAddress;
    }

    public function getLastErrorDate(): ?int
    {
        return $this->lastErrorDate;
    }

    public function setLastErrorDate(int $lastErrorDate)
    {
        $this->lastErrorDate = $lastErrorDate;
    }

    public function getLastErrorMessage(): ?string
    {
        return $this->lastErrorMessage;
    }

    public function setLastErrorMessage(string $lastErrorMessage)
    {
        $this->lastErrorMessage = $lastErrorMessage;
    }

    public function getLastSynchronizationErrorDate(): ?int
    {
        return $this->lastSynchronizationErrorDate;
    }

    public function setLastSynchronizationErrorDate(int $lastSynchronizationErrorDate)
    {
        $this->lastSynchronizationErrorDate = $lastSynchronizationErrorDate;
    }

    public function getMaxConnections(): ?int
    {
        return $this->maxConnections;
    }

    public function setMaxConnections(int $maxConnections)
    {
        $this->maxConnections = $maxConnections;
    }

    public function getAllowedUpdates(): ?array
    {
        return $this->allowedUpdates;
    }

    public function setAllowedUpdates(array $allowedUpdates)
    {
        $this->allowedUpdates = $allowedUpdates;
    }
}
