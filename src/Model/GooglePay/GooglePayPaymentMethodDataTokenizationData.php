<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\GooglePay;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Payment\Payment;


/**
 * The tokenization data for Google Pay
 */
class GooglePayPaymentMethodDataTokenizationData extends BaseModel
{
    /**
     * This object contains the user's payment credentials
     */
    private ?string $token = null;
    /**
     * Type property of Google Pay Payment Method
     */
    private ?string $type = null;
    private ?GooglePayDecryptedToken $decryptedToken = null;

    /**
     * Builder function for token
     *
     * @param string $token
     *
     * @return $this
     */
    public function token(?string $token): self
    {
        $this->setToken($token);

        return $this;
    }

    /**
     * Setter function for token
     *
     * @param string $token
     *
     * @return void
     */
    public function setToken(?string $token): void
    {
        $this->token = $token;
    }

    /**
     * Getter function for token
     *
     * @return ?string
     */
    public function getToken(): ?string
    {
        return $this->token;
    }
    /**
     * Builder function for type
     *
     * @param string $type
     *
     * @return $this
     */
    public function type(?string $type): self
    {
        $this->setType($type);

        return $this;
    }

    /**
     * Setter function for type
     *
     * @param string $type
     *
     * @return void
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    /**
     * Getter function for type
     *
     * @return ?string
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * Builder function for decryptedToken
     *
     * @param GooglePayDecryptedToken $decryptedToken
     *
     * @return $this
     */
    public function decryptedToken(?GooglePayDecryptedToken $decryptedToken): self
    {
        $this->setDecryptedToken($decryptedToken);

        return $this;
    }

    /**
     * Setter function for decryptedToken
     *
     * @param GooglePayDecryptedToken $decryptedToken
     *
     * @return void
     */
    public function setDecryptedToken(?GooglePayDecryptedToken $decryptedToken): void
    {
        $this->decryptedToken = $decryptedToken;
    }

    /**
     * Getter function for decryptedToken
     *
     * @return ?GooglePayDecryptedToken
     */
    public function getDecryptedToken(): ?GooglePayDecryptedToken
    {
        return $this->decryptedToken;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class GooglePayPaymentMethodDataTokenizationData {" . PHP_EOL
            . "    token: " . $this->toIndentedString($this->token ?? null) . PHP_EOL
            . "    type: " . $this->toIndentedString($this->type ?? null) . PHP_EOL
            . "    decryptedToken: " . $this->toIndentedString($this->decryptedToken ?? null) . PHP_EOL
            . "}";
    }
}
