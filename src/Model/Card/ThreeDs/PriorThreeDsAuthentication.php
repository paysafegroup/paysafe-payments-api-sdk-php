<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card\ThreeDs;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * This is the previous authentication information used with current merchant, cardholder and card.
 * <ul>
 *   <li>
 *     <b>id:</b> This is the previous authentication ID for the cardholder. <br />
 *     <b>Note:<b> For recurring payments, this is the authenticationId of the first authentication.
 *   </li>
 *   <li>
 *     <b>data:</b> This field is reserved for future iterations of 3D Secure 2.
 *   </li>
 *   <li>
 *     <b>method:</b> This is the mechanism used previously by the cardholder to authenticate to the 3DS Requestor.
 *     <i>Allowed values: FRICTIONLESS_AUTHENTICATION, ACS_CHALLENGE, AVS_VERIFIED, OTHER_ISSUER_METHOD</i>
 *   </li>
 *   <li>
 *     <b>time:</b> This is the date and time of the cardholder authentication.
 *     The ISO 8601 date format is expected, i.e., YYYY-MM-DD-THH:MM:SSZ.
 *   </li>
 * </ul>
 */
class PriorThreeDsAuthentication extends BaseModel
{

    private string $id;
    private string $data;
    private AuthenticationMethod $method;
    private string $time;

    /**
     * Builder function for id
     *
     * @param string $id
     *
     * @return $this
     */
    public function id(string $id): self
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
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * This is the previous authentication ID for the cardholder.
     * <b>Note:<b> For recurring payments, this is the authenticationId of the first authentication.
     *
     * @return string
     */
    public function getId(): string
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
    public function data(string $data): self
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
    public function setData(string $data): void
    {
        $this->data = $data;
    }

    /**
     * This field is reserved for future iterations of 3D Secure 2.
     *
     * @return string
     */
    public function getData(): string
    {
        return $this->data;
    }

    /**
     * Builder function for method
     *
     * @param AuthenticationMethod $method
     *
     * @return $this
     */
    public function method(AuthenticationMethod $method): self
    {
        $this->setMethod($method);

        return $this;
    }

    /**
     * Setter function for method
     *
     * @param AuthenticationMethod $method
     *
     * @return void
     */
    public function setMethod(AuthenticationMethod $method): void
    {
        $this->method = $method;
    }

    /**
     * This is the mechanism used previously by the cardholder to authenticate to the 3DS Requestor.
     *
     * @return AuthenticationMethod
     */
    public function getMethod(): AuthenticationMethod
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
    public function time(string $time): self
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
    public function setTime(string $time): void
    {
        $this->time = $time;
    }

    /**
     * This is the date and time of the cardholder authentication.
     * The ISO 8601 date format is expected, i.e., YYYY-MM-DD-THH:MM:SSZ.
     *
     * @return string
     */
    public function getTime(): string
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
        return "class PriorThreeDsAuthentication {" . PHP_EOL
            . "    id: " . $this->toIndentedString($this->id) . PHP_EOL
            . "    data: " . $this->toIndentedString($this->data) . PHP_EOL
            . "    method: " . $this->toIndentedString($this->method) . PHP_EOL
            . "    time: " . $this->toIndentedString($this->time) . PHP_EOL
            . "}";
    }
}
