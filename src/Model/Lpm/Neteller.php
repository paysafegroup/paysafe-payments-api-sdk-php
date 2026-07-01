<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Lpm;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * Neteller details to be used for the request.
 */
class Neteller extends BaseModel
{
    /**
     * This is the email address of the customer who is making or receiving the payment. This is to be provided by merchant while making a payout
     */
    private ?string $consumerId = null;
    /**
     * This is a description to be shown on the Skrill payment page in the logo area if there is no logo url parameter. If no value is submitted and there is no logo, the pay_to_email value is shown as the recipient of the payment
     */
    private ?string $recipientDescription = null;
    /**
     * Neteller logo url
     */
    private ?string $logoUrl = null;

    /**
     * Builder function for consumerId
     *
     * @param string $consumerId
     *
     * @return $this
     */
    public function consumerId(?string $consumerId): self
    {
        $this->setConsumerId($consumerId);

        return $this;
    }

    /**
     * Setter function for consumerId
     *
     * @param string $consumerId
     *
     * @return void
     */
    public function setConsumerId(?string $consumerId): void
    {
        $this->consumerId = $consumerId;
    }

    /**
     * Getter function for consumerId
     *
     * @return ?string
     */
    public function getConsumerId(): ?string
    {
        return $this->consumerId;
    }
    /**
     * Builder function for recipientDescription
     *
     * @param string $recipientDescription
     *
     * @return $this
     */
    public function recipientDescription(?string $recipientDescription): self
    {
        $this->setRecipientDescription($recipientDescription);

        return $this;
    }

    /**
     * Setter function for recipientDescription
     *
     * @param string $recipientDescription
     *
     * @return void
     */
    public function setRecipientDescription(?string $recipientDescription): void
    {
        $this->recipientDescription = $recipientDescription;
    }

    /**
     * Getter function for recipientDescription
     *
     * @return ?string
     */
    public function getRecipientDescription(): ?string
    {
        return $this->recipientDescription;
    }
    /**
     * Builder function for logoUrl
     *
     * @param string $logoUrl
     *
     * @return $this
     */
    public function logoUrl(?string $logoUrl): self
    {
        $this->setLogoUrl($logoUrl);

        return $this;
    }

    /**
     * Setter function for logoUrl
     *
     * @param string $logoUrl
     *
     * @return void
     */
    public function setLogoUrl(?string $logoUrl): void
    {
        $this->logoUrl = $logoUrl;
    }

    /**
     * Getter function for logoUrl
     *
     * @return ?string
     */
    public function getLogoUrl(): ?string
    {
        return $this->logoUrl;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class Neteller {" . PHP_EOL
            . "    consumerId: " . $this->toIndentedString($this->consumerId ?? null) . PHP_EOL
            . "    recipientDescription: " . $this->toIndentedString($this->recipientDescription ?? null) . PHP_EOL
            . "    logoUrl: " . $this->toIndentedString($this->logoUrl ?? null) . PHP_EOL
            . "}";
    }
}
