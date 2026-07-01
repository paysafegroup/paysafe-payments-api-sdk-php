<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Card\Threeds;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * Cardholder login information for 3DS authentication
 */
class UserLogin extends BaseModel
{
    private ?string $authenticationMethod = null;
    /**
     * Field reserved for future iterations of 3D Secure 2
     */
    private ?string $data = null;
    /**
     * Date and time of the cardholder authentication in ISO 8601 format (YYYY-MM-DD-THH:MM:SSZ)
     */
    private ?string $time = null;

    /**
     * Builder function for authenticationMethod
     *
     * @param string $authenticationMethod
     *
     * @return $this
     */
    public function authenticationMethod(?string $authenticationMethod): self
    {
        $this->setAuthenticationMethod($authenticationMethod);

        return $this;
    }

    /**
     * Setter function for authenticationMethod
     *
     * @param string $authenticationMethod
     *
     * @return void
     */
    public function setAuthenticationMethod(?string $authenticationMethod): void
    {
        $this->authenticationMethod = $authenticationMethod;
    }

    /**
     * Getter function for authenticationMethod
     *
     * @return ?string
     */
    public function getAuthenticationMethod(): ?string
    {
        return $this->authenticationMethod;
    }
    /**
     * Builder function for data
     *
     * @param string $data
     *
     * @return $this
     */
    public function data(?string $data): self
    {
        $this->setData($data);

        return $this;
    }

    /**
     * Setter function for data
     *
     * @param string $data
     *
     * @return void
     */
    public function setData(?string $data): void
    {
        $this->data = $data;
    }

    /**
     * Getter function for data
     *
     * @return ?string
     */
    public function getData(): ?string
    {
        return $this->data;
    }
    /**
     * Builder function for time
     *
     * @param string $time
     *
     * @return $this
     */
    public function time(?string $time): self
    {
        $this->setTime($time);

        return $this;
    }

    /**
     * Setter function for time
     *
     * @param string $time
     *
     * @return void
     */
    public function setTime(?string $time): void
    {
        $this->time = $time;
    }

    /**
     * Getter function for time
     *
     * @return ?string
     */
    public function getTime(): ?string
    {
        return $this->time;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class UserLogin {" . PHP_EOL
            . "    authenticationMethod: " . $this->toIndentedString($this->authenticationMethod ?? null) . PHP_EOL
            . "    data: " . $this->toIndentedString($this->data ?? null) . PHP_EOL
            . "    time: " . $this->toIndentedString($this->time ?? null) . PHP_EOL
            . "}";
    }
}
