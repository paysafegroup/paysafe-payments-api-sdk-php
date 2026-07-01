<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Card;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * Card information.
 */
class Card extends BaseModel
{
    /**
     * The card number used for the request
     */
    private ?string $cardNum = null;
    /**
     * The card id returned in the response during save card flow
     */
    private ?string $cardId = null;
    private ?CardExpiry $cardExpiry = null;
    /**
     * The 3- or 4-digit security code that appears on the card following the card number
     */
    private ?string $cvv = null;
    /**
     * The name of the cardholder
     */
    private ?string $holderName = null;
    private ?string $cardType = null;
    /**
     * The last four digits of the card used for the request
     */
    private ?string $lastDigits = null;
    /**
     * The first 6 digits of the card Bank Identification Number (BIN)
     */
    private ?string $cardBin = null;
    /**
     * The card issuing country
     */
    private ?string $issuingCountry = null;
    private ?string $status = null;

    /**
     * Builder function for cardNum
     *
     * @param string $cardNum
     *
     * @return $this
     */
    public function cardNum(?string $cardNum): self
    {
        $this->setCardNum($cardNum);

        return $this;
    }

    /**
     * Setter function for cardNum
     *
     * @param string $cardNum
     *
     * @return void
     */
    public function setCardNum(?string $cardNum): void
    {
        $this->cardNum = $cardNum;
    }

    /**
     * Getter function for cardNum
     *
     * @return ?string
     */
    public function getCardNum(): ?string
    {
        return $this->cardNum;
    }
    /**
     * Builder function for cardId
     *
     * @param string $cardId
     *
     * @return $this
     */
    public function cardId(?string $cardId): self
    {
        $this->setCardId($cardId);

        return $this;
    }

    /**
     * Setter function for cardId
     *
     * @param string $cardId
     *
     * @return void
     */
    public function setCardId(?string $cardId): void
    {
        $this->cardId = $cardId;
    }

    /**
     * Getter function for cardId
     *
     * @return ?string
     */
    public function getCardId(): ?string
    {
        return $this->cardId;
    }
    /**
     * Builder function for cardExpiry
     *
     * @param CardExpiry $cardExpiry
     *
     * @return $this
     */
    public function cardExpiry(?CardExpiry $cardExpiry): self
    {
        $this->setCardExpiry($cardExpiry);

        return $this;
    }

    /**
     * Setter function for cardExpiry
     *
     * @param CardExpiry $cardExpiry
     *
     * @return void
     */
    public function setCardExpiry(?CardExpiry $cardExpiry): void
    {
        $this->cardExpiry = $cardExpiry;
    }

    /**
     * Getter function for cardExpiry
     *
     * @return ?CardExpiry
     */
    public function getCardExpiry(): ?CardExpiry
    {
        return $this->cardExpiry;
    }
    /**
     * Builder function for cvv
     *
     * @param string $cvv
     *
     * @return $this
     */
    public function cvv(?string $cvv): self
    {
        $this->setCvv($cvv);

        return $this;
    }

    /**
     * Setter function for cvv
     *
     * @param string $cvv
     *
     * @return void
     */
    public function setCvv(?string $cvv): void
    {
        $this->cvv = $cvv;
    }

    /**
     * Getter function for cvv
     *
     * @return ?string
     */
    public function getCvv(): ?string
    {
        return $this->cvv;
    }
    /**
     * Builder function for holderName
     *
     * @param string $holderName
     *
     * @return $this
     */
    public function holderName(?string $holderName): self
    {
        $this->setHolderName($holderName);

        return $this;
    }

    /**
     * Setter function for holderName
     *
     * @param string $holderName
     *
     * @return void
     */
    public function setHolderName(?string $holderName): void
    {
        $this->holderName = $holderName;
    }

    /**
     * Getter function for holderName
     *
     * @return ?string
     */
    public function getHolderName(): ?string
    {
        return $this->holderName;
    }
    /**
     * Builder function for cardType
     *
     * @param string $cardType
     *
     * @return $this
     */
    public function cardType(?string $cardType): self
    {
        $this->setCardType($cardType);

        return $this;
    }

    /**
     * Setter function for cardType
     *
     * @param string $cardType
     *
     * @return void
     */
    public function setCardType(?string $cardType): void
    {
        $this->cardType = $cardType;
    }

    /**
     * Getter function for cardType
     *
     * @return ?string
     */
    public function getCardType(): ?string
    {
        return $this->cardType;
    }
    /**
     * Builder function for lastDigits
     *
     * @param string $lastDigits
     *
     * @return $this
     */
    public function lastDigits(?string $lastDigits): self
    {
        $this->setLastDigits($lastDigits);

        return $this;
    }

    /**
     * Setter function for lastDigits
     *
     * @param string $lastDigits
     *
     * @return void
     */
    public function setLastDigits(?string $lastDigits): void
    {
        $this->lastDigits = $lastDigits;
    }

    /**
     * Getter function for lastDigits
     *
     * @return ?string
     */
    public function getLastDigits(): ?string
    {
        return $this->lastDigits;
    }
    /**
     * Builder function for cardBin
     *
     * @param string $cardBin
     *
     * @return $this
     */
    public function cardBin(?string $cardBin): self
    {
        $this->setCardBin($cardBin);

        return $this;
    }

    /**
     * Setter function for cardBin
     *
     * @param string $cardBin
     *
     * @return void
     */
    public function setCardBin(?string $cardBin): void
    {
        $this->cardBin = $cardBin;
    }

    /**
     * Getter function for cardBin
     *
     * @return ?string
     */
    public function getCardBin(): ?string
    {
        return $this->cardBin;
    }
    /**
     * Builder function for issuingCountry
     *
     * @param string $issuingCountry
     *
     * @return $this
     */
    public function issuingCountry(?string $issuingCountry): self
    {
        $this->setIssuingCountry($issuingCountry);

        return $this;
    }

    /**
     * Setter function for issuingCountry
     *
     * @param string $issuingCountry
     *
     * @return void
     */
    public function setIssuingCountry(?string $issuingCountry): void
    {
        $this->issuingCountry = $issuingCountry;
    }

    /**
     * Getter function for issuingCountry
     *
     * @return ?string
     */
    public function getIssuingCountry(): ?string
    {
        return $this->issuingCountry;
    }
    /**
     * Builder function for status
     *
     * @param string $status
     *
     * @return $this
     */
    public function status(?string $status): self
    {
        $this->setStatus($status);

        return $this;
    }

    /**
     * Setter function for status
     *
     * @param string $status
     *
     * @return void
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    /**
     * Getter function for status
     *
     * @return ?string
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class Card {" . PHP_EOL
            . "    cardNum: " . $this->toIndentedString($this->cardNum ?? null) . PHP_EOL
            . "    cardId: " . $this->toIndentedString($this->cardId ?? null) . PHP_EOL
            . "    cardExpiry: " . $this->toIndentedString($this->cardExpiry ?? null) . PHP_EOL
            . "    cvv: " . $this->toIndentedString($this->cvv ?? null) . PHP_EOL
            . "    holderName: " . $this->toIndentedString($this->holderName ?? null) . PHP_EOL
            . "    cardType: " . $this->toIndentedString($this->cardType ?? null) . PHP_EOL
            . "    lastDigits: " . $this->toIndentedString($this->lastDigits ?? null) . PHP_EOL
            . "    cardBin: " . $this->toIndentedString($this->cardBin ?? null) . PHP_EOL
            . "    issuingCountry: " . $this->toIndentedString($this->issuingCountry ?? null) . PHP_EOL
            . "    status: " . $this->toIndentedString($this->status ?? null) . PHP_EOL
            . "}";
    }
}
