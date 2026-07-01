<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Card\Threeds;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * Previous authentication information used with current merchant, cardholder and card
 */
class PriorThreedsAuthentication extends BaseModel
{
    /**
     * Previous authentication ID for the cardholder. For recurring payments, this is the authenticationId of the first authentication
     */
    private ?string $id = null;
    /**
     * Field reserved for future iterations of 3D Secure 2
     */
    private ?string $data = null;
    private ?string $method = null;
    /**
     * Date and time of the cardholder authentication in ISO 8601 format (YYYY-MM-DD-THH:MM:SSZ)
     */
    private ?string $time = null;

    /**
     * Builder function for id
     *
     * @param string $id
     *
     * @return $this
     */
    public function id(?string $id): self
    {
        $this->setId($id);

        return $this;
    }

    /**
     * Setter function for id
     *
     * @param string $id
     *
     * @return void
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Getter function for id
     *
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
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
     * Builder function for method
     *
     * @param string $method
     *
     * @return $this
     */
    public function method(?string $method): self
    {
        $this->setMethod($method);

        return $this;
    }

    /**
     * Setter function for method
     *
     * @param string $method
     *
     * @return void
     */
    public function setMethod(?string $method): void
    {
        $this->method = $method;
    }

    /**
     * Getter function for method
     *
     * @return ?string
     */
    public function getMethod(): ?string
    {
        return $this->method;
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
        return "class PriorThreedsAuthentication {" . PHP_EOL
            . "    id: " . $this->toIndentedString($this->id ?? null) . PHP_EOL
            . "    data: " . $this->toIndentedString($this->data ?? null) . PHP_EOL
            . "    method: " . $this->toIndentedString($this->method ?? null) . PHP_EOL
            . "    time: " . $this->toIndentedString($this->time ?? null) . PHP_EOL
            . "}";
    }
}
