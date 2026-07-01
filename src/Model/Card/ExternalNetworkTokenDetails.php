<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Card;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * External network token information. Returned when the stored payment method is an external network token and token_type is NETWORK_TOKEN.
 */
class ExternalNetworkTokenDetails extends BaseModel
{
    /**
     * This is the actual network token.
     */
    private ?string $token = null;
    /**
     * This is the cryptogram that will be used.
     */
    private ?string $cryptogram = null;
    private ?CardExpiry $expiry = null;

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
     * Builder function for cryptogram
     *
     * @param string $cryptogram
     *
     * @return $this
     */
    public function cryptogram(?string $cryptogram): self
    {
        $this->setCryptogram($cryptogram);

        return $this;
    }

    /**
     * Setter function for cryptogram
     *
     * @param string $cryptogram
     *
     * @return void
     */
    public function setCryptogram(?string $cryptogram): void
    {
        $this->cryptogram = $cryptogram;
    }

    /**
     * Getter function for cryptogram
     *
     * @return ?string
     */
    public function getCryptogram(): ?string
    {
        return $this->cryptogram;
    }
    /**
     * Builder function for expiry
     *
     * @param CardExpiry $expiry
     *
     * @return $this
     */
    public function expiry(?CardExpiry $expiry): self
    {
        $this->setExpiry($expiry);

        return $this;
    }

    /**
     * Setter function for expiry
     *
     * @param CardExpiry $expiry
     *
     * @return void
     */
    public function setExpiry(?CardExpiry $expiry): void
    {
        $this->expiry = $expiry;
    }

    /**
     * Getter function for expiry
     *
     * @return ?CardExpiry
     */
    public function getExpiry(): ?CardExpiry
    {
        return $this->expiry;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class ExternalNetworkTokenDetails {" . PHP_EOL
            . "    token: " . $this->toIndentedString($this->token ?? null) . PHP_EOL
            . "    cryptogram: " . $this->toIndentedString($this->cryptogram ?? null) . PHP_EOL
            . "    expiry: " . $this->toIndentedString($this->expiry ?? null) . PHP_EOL
            . "}";
    }
}
