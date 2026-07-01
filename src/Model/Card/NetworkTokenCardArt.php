<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Card;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * Holds network token card art fields.
 */
class NetworkTokenCardArt extends BaseModel
{
    /**
     * The url for loading the card art url
     */
    private ?string $cardArtUrl = null;
    /**
     * Boolean value whether the card is cobranded
     */
    private ?bool $isCobranded = null;
    /**
     * The name of the cobrand
     */
    private ?string $cobrandName = null;

    /**
     * Builder function for cardArtUrl
     *
     * @param string $cardArtUrl
     *
     * @return $this
     */
    public function cardArtUrl(?string $cardArtUrl): self
    {
        $this->setCardArtUrl($cardArtUrl);

        return $this;
    }

    /**
     * Setter function for cardArtUrl
     *
     * @param string $cardArtUrl
     *
     * @return void
     */
    public function setCardArtUrl(?string $cardArtUrl): void
    {
        $this->cardArtUrl = $cardArtUrl;
    }

    /**
     * Getter function for cardArtUrl
     *
     * @return ?string
     */
    public function getCardArtUrl(): ?string
    {
        return $this->cardArtUrl;
    }
    /**
     * Builder function for isCobranded
     *
     * @param bool $isCobranded
     *
     * @return $this
     */
    public function isCobranded(?bool $isCobranded): self
    {
        $this->setIsCobranded($isCobranded);

        return $this;
    }

    /**
     * Setter function for isCobranded
     *
     * @param bool $isCobranded
     *
     * @return void
     */
    public function setIsCobranded(?bool $isCobranded): void
    {
        $this->isCobranded = $isCobranded;
    }

    /**
     * Getter function for isCobranded
     *
     * @return ?bool
     */
    public function getIsCobranded(): ?bool
    {
        return $this->isCobranded;
    }
    /**
     * Builder function for cobrandName
     *
     * @param string $cobrandName
     *
     * @return $this
     */
    public function cobrandName(?string $cobrandName): self
    {
        $this->setCobrandName($cobrandName);

        return $this;
    }

    /**
     * Setter function for cobrandName
     *
     * @param string $cobrandName
     *
     * @return void
     */
    public function setCobrandName(?string $cobrandName): void
    {
        $this->cobrandName = $cobrandName;
    }

    /**
     * Getter function for cobrandName
     *
     * @return ?string
     */
    public function getCobrandName(): ?string
    {
        return $this->cobrandName;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class NetworkTokenCardArt {" . PHP_EOL
            . "    cardArtUrl: " . $this->toIndentedString($this->cardArtUrl ?? null) . PHP_EOL
            . "    isCobranded: " . $this->toIndentedString($this->isCobranded ?? null) . PHP_EOL
            . "    cobrandName: " . $this->toIndentedString($this->cobrandName ?? null) . PHP_EOL
            . "}";
    }
}
