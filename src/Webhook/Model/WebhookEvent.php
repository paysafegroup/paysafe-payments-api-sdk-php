<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);
namespace Paysafe\PhpSdk\Webhook\Model;

/**
 * Represents a webhook event received from Paysafe.
 * Contains details about the event.
 */
class WebhookEvent {
    private array $payload;
    private int $attemptNumber;
    private string $type;
    private string $resourceId;
    private string $eventDate;
    private string $eventName;

    /**
     * @return array
     */
    public function getPayload(): array
    {
        return $this->payload;
    }

    /**
     * @return int
     */
    public function getAttemptNumber(): int
    {
        return $this->attemptNumber;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getResourceId(): string
    {
        return $this->resourceId;
    }

    /**
     * @return string
     */
    public function getEventDate(): string
    {
        return $this->eventDate;
    }

    /**
     * @return string
     */
    public function getEventName(): string
    {
        return $this->eventName;
    }

    /**
     * @param array $payload
     */
    public function setPayload(array $payload): void
    {
        $this->payload = $payload;
    }

    /**
     * @param int $attemptNumber
     */
    public function setAttemptNumber(int $attemptNumber): void
    {
        $this->attemptNumber = $attemptNumber;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @param string $resourceId
     */
    public function setResourceId(string $resourceId): void
    {
        $this->resourceId = $resourceId;
    }

    /**
     * @param string $eventDate
     */
    public function setEventDate(string $eventDate): void
    {
        $this->eventDate = $eventDate;
    }

    /**
     * @param string $eventName
     */
    public function setEventName(string $eventName): void
    {
        $this->eventName = $eventName;
    }

    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "WebhookEvent{" .
                "payload='" . json_encode($this->payload) . '\'' .
                ", attemptNumber=" . $this->attemptNumber .
                ", type='" . $this->type . '\'' .
                ", resourceId='" . $this->resourceId . '\'' .
                ", eventDate=" . $this->eventDate .
                ", eventName='" . $this->eventName . '\'' .
            '}';
    }
}
