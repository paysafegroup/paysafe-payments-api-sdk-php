<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * Card information
 * <ul>
 *   <li>
 *     <b>lastDigits:</b> These are the last four digits of the card used for the request.
 *   </li>
 *   <li>
 *     <b>cardExpiry:</b> This is the card's expiry date.
 *   </li>
 *   <li>
 *     <b>cardBin:</b> These are the first 6 digits of the card Bank Identification Number (BIN).
 *     For example: the first 6 digits of the card number. <br />
 *     Example: 411111
 *   </li>
 *   <li>
 *     <b>cardType:</b> This is type of card used for the request. <br />
 *     <i>Allowed values: AM, DI, JC, MC, MD, SO, VI, VD, VE</i>
 *   </li>
 *   <li>
 *     <b>holderName:</b> This is the name of the card holder. <br />
 *     For 3DS2, Holder name must contain only Latin characters (English Alphabet), Space, Apostrophe ('), Dot (.)
 *      or Hyphen (-) <br />
 *     Example: Suresh
 *   </li>
 *   <li>
 *     <b>status:</b> This is <b>Optional</b> - it is present only if the card is stored for the Customer. <br />
 *     <i>Allowed values: ACTIVE, SUSPENDED</i>
 *   </li>
 *   <li>
 *     <b>cardCategory:</b> The type of card being used. <br />
 *     <i>Allowed values: CREDIT, DEBIT</i>
 *   </li>
 *   <li>
 *     <b>tokenType:</b> This is the token type. <br />
 *     <i>Allowed values: APPLE_PAY, NETWORK_TOKEN</i>
 *   </li>
 *   <li>
 *     <b>applePay:</b> When tokenType=APPLE_PAY. Apple Pay token information.
 *     Returned when the stored payment method is an Apple Pay token.
 *   </li>
 *   <li>
 *     <b>networkToken:</b> Holds network token fields.
 *   </li>
 *   <li>
 *     <b>issuingCountry:</b> This is the card issuing country. <br />
 *     Example: US
 *   </li>
 * </ul>
 */
class Card extends BaseModel
{
    private string $cardNum;
    private string $cardId;
    private CardExpiry $cardExpiry;
    private string $cvv;
    private string $holderName;
    private string $cardType;
    private string $lastDigits;
    private string $cardBin;
    private string $issuingCountry;
    private string $status;
    private ApplePayTokenDetails $applePay;
    private string $tokenType;
    private ExternalNetworkTokenRequest $networkToken;

    /**
     * @param string $cardNum
     *
     * @return void
     */
    public function setCardNum(string $cardNum): void
    {
        $this->cardNum = $cardNum;
    }

    /**
     * @return string
     */
    public function getCardNum(): string
    {
        return $this->cardNum;
    }

    /**
     * @param string $cardNum
     *
     * @return $this
     */
    public function cardNum(string $cardNum): self
    {
        $this->setCardNum($cardNum);

        return $this;
    }

    /**
     * @param string $cardId
     *
     * @return void
     */
    public function setCardId(string $cardId): void
    {
        $this->cardId = $cardId;
    }

    /**
     * @return string
     */
    public function getCardId(): string
    {
        return $this->cardId;
    }

    /**
     * @param string $cardId
     *
     * @return $this
     */
    public function cardId(string $cardId): self
    {
        $this->setCardId($cardId);

        return $this;
    }

    /**
     * @param CardExpiry $cardExpiry
     *
     * @return void
     */
    public function setCardExpiry(CardExpiry $cardExpiry): void
    {
        $this->cardExpiry = $cardExpiry;
    }

    /**
     * @return CardExpiry
     */
    public function getCardExpiry(): CardExpiry
    {
        return $this->cardExpiry;
    }

    /**
     * @param CardExpiry $cardExpiry
     *
     * @return $this
     */
    public function cardExpiry(CardExpiry $cardExpiry): self
    {
        $this->setCardExpiry($cardExpiry);

        return $this;
    }

    /**
     * @param string $cvv
     *
     * @return void
     */
    public function setCvv(string $cvv): void
    {
        $this->cvv = $cvv;
    }

    /**
     * @return string
     */
    public function getCvv(): string
    {
        return $this->cvv;
    }

    /**
     * @param string $cvv
     *
     * @return $this
     */
    public function cvv(string $cvv): self
    {
        $this->setCvv($cvv);

        return $this;
    }

    /**
     * @param string $holderName
     *
     * @return void
     */
    public function setHolderName(string $holderName): void
    {
        $this->holderName = $holderName;
    }

    /**
     * @return string
     */
    public function getHolderName(): string
    {
        return $this->holderName;
    }

    /**
     * @param string $holderName
     *
     * @return $this
     */
    public function holderName(string $holderName): self
    {
        $this->setHolderName($holderName);

        return $this;
    }

    /**
     * @param string $cardType
     *
     * @return void
     */
    public function setCardType(string $cardType): void
    {
        $this->cardType = $cardType;
    }

    /**
     * @return string
     */
    public function getCardType(): string
    {
        return $this->cardType;
    }

    /**
     * @param string $cardType
     *
     * @return $this
     */
    public function cardType(string $cardType): self
    {
        $this->setCardType($cardType);

        return $this;
    }

    /**
     * @param string $lastDigits
     *
     * @return void
     */
    public function setLastDigits(string $lastDigits): void
    {
        $this->lastDigits = $lastDigits;
    }

    /**
     * @return string
     */
    public function getLastDigits(): string
    {
        return $this->lastDigits;
    }

    /**
     * @param string $lastDigits
     *
     * @return $this
     */
    public function lastDigits(string $lastDigits): self
    {
        $this->setLastDigits($lastDigits);

        return $this;
    }

    /**
     * @param string $cardBin
     *
     * @return void
     */
    public function setCardBin(string $cardBin): void
    {
        $this->cardBin = $cardBin;
    }

    /**
     * @return string
     */
    public function getCardBin(): string
    {
        return $this->cardBin;
    }

    /**
     * @param string $cardBin
     *
     * @return $this
     */
    public function cardBin(string $cardBin): self
    {
        $this->setCardBin($cardBin);

        return $this;
    }

    /**
     * @param string $issuingCountry
     *
     * @return void
     */
    public function setIssuingCountry(string $issuingCountry): void
    {
        $this->issuingCountry = $issuingCountry;
    }

    /**
     * @return string
     */
    public function getIssuingCountry(): string
    {
        return $this->issuingCountry;
    }

    /**
     * @param string $issuingCountry
     *
     * @return $this
     */
    public function issuingCountry(string $issuingCountry): self
    {
        $this->setIssuingCountry($issuingCountry);

        return $this;
    }

    /**
     * @param string $status
     *
     * @return void
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     *
     * @return $this
     */
    public function status(string $status): self
    {
        $this->setStatus($status);

        return $this;
    }

    /**
     * @param ApplePayTokenDetails $applePay
     *
     * @return void
     */
    public function setApplePay(ApplePayTokenDetails $applePay): void
    {
        $this->applePay = $applePay;
    }

    /**
     * @return ApplePayTokenDetails
     */
    public function getApplePay(): ApplePayTokenDetails
    {
        return $this->applePay;
    }

    /**
     * @param ApplePayTokenDetails $applePay
     *
     * @return $this
     */
    public function applePay(ApplePayTokenDetails $applePay): self
    {
        $this->setApplePay($applePay);

        return $this;
    }

    /**
     * @param string $tokenType
     *
     * @return void
     */
    public function setTokenType(string $tokenType): void
    {
        $this->tokenType = $tokenType;
    }

    /**
     * @return string
     */
    public function getTokenType(): string
    {
        return $this->tokenType;
    }

    /**
     * @param string $tokenType
     *
     * @return $this
     */
    public function tokenType(string $tokenType): self
    {
        $this->setTokenType($tokenType);

        return $this;
    }

    /**
     * @param ExternalNetworkTokenRequest $networkToken
     *
     * @return void
     */
    public function setNetworkToken(ExternalNetworkTokenRequest $networkToken): void
    {
        $this->networkToken = $networkToken;
    }

    /**
     * @return ExternalNetworkTokenRequest
     */
    public function getNetworkToken(): ExternalNetworkTokenRequest
    {
        return $this->networkToken;
    }

    /**
     * @param ExternalNetworkTokenRequest $networkToken
     *
     * @return $this
     */
    public function networkToken(ExternalNetworkTokenRequest $networkToken): self
    {
        $this->setNetworkToken($networkToken);

        return $this;
    }


    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class Card {" . PHP_EOL
            . "    cardNum: " . $this->toIndentedString($this->cardNum) . "\n"
            . "    cardId: " . $this->toIndentedString($this->cardId) . "\n"
            . "    cardExpiry: " . $this->toIndentedString($this->cardExpiry) . "\n"
            . "    cvv: " . $this->toIndentedString($this->cvv) . "\n"
            . "    holderName: " . $this->toIndentedString($this->holderName) . "\n"
            . "    cardType: " . $this->toIndentedString($this->cardType) . "\n"
            . "    lastDigits: " . $this->toIndentedString($this->lastDigits) . "\n"
            . "    cardBin: " . $this->toIndentedString($this->cardBin) . "\n"
            . "    issuingCountry: " . $this->toIndentedString($this->issuingCountry) . "\n"
            . "    status: " . $this->toIndentedString($this->status) . "\n"
            . "    applePay: " . $this->toIndentedString($this->applePay) . "\n"
            . "    tokenType: " . $this->toIndentedString($this->tokenType) . "\n"
            . "    networkToken: " . $this->toIndentedString($this->networkToken) . "\n"
            . "}";
    }
}
