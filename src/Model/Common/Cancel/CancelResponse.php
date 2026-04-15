<?php
/**
 * All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2023. For more information see LICENSE
 *
 */

namespace Paysafe\PhpSdk\Model\Common\Cancel;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * This class represents the response of the following operations:
 * <li>Cancel Payment</li>
 * <li>Cancel Settlement</li>
 * <li>Cancel Refund</li>
 * <li>Cancel Standalone Credit</li>
 * <li>Cancel Original Credit</li>
 * <li>Cancel Mandate</li>
 *
 * <p>
 * Allowed value for status: <code>CANCELLED</code>
 * </p>
 */
class CancelResponse extends BaseModel
{
    private string $status;
    private String $id;
    private String $txnTime;

    /**
     * Builder function for status
     *
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
     * Setter function for status
     *
     * @param string $status
     *
     * @return void
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * Getter function for status
     *
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * Builder function for txnTime
     *
     * @param string $txnTime
     *
     * @return $this
     */
    public function txnTime(string $txnTime): self
    {
        $this->setTxnTime($txnTime);

        return $this;
    }

    /**
     * Setter function for txnTime
     *
     * @param string $txnTime
     *
     * @return void
     */
    public function setTxnTime(string $txnTime): void
    {
        $this->txnTime = $txnTime;
    }

    /**
     * Getter function for txnTime
     *
     * @return string
     */
    public function getTxnTime(): string
    {
        return $this->txnTime;
    }

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
     * Getter function for id
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }


    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class CancelResponse {" . PHP_EOL
            . "    status: " . $this->toIndentedString($this->status) . "\n"
            . "    txnTime: " . $this->toIndentedString($this->txnTime) . "\n"
            . "    id: " . $this->toIndentedString($this->id) . "\n"
            . "}";
    }
}
