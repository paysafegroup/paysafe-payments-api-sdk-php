<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\VoidAuthorization;
use Paysafe\PhpSdk\Model\BaseApiResponse;


/**
 * Represents the details of a Void Authorization. A Void Authorization allows you to cancel an authorization request, provided the authorization has not yet been settled. If the authorization has already been settled, voiding is not allowed.
 */
class VoidAuthorization extends BaseApiResponse
{
    /**
     * This is the ID returned in the response. This ID can be used for future associated requests.
     */
    private ?string $id = null;
    /**
     * This is the merchant reference number created by the merchant and submitted as part of the request. It must be unique for each request.
     */
    private ?string $merchantRefNum = null;
    /**
     * This is the amount of the request, in minor units. For example, to process US $10.99, this value should be 1099. Maximum: 99999999999
     */
    private ?int $amount = null;
    /**
     * This is the date and time the transaction was processed.
     */
    private ?string $txnTime = null;
    private ?string $status = null;

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
     * Builder function for merchantRefNum
     *
     * @param string $merchantRefNum
     *
     * @return $this
     */
    public function merchantRefNum(?string $merchantRefNum): self
    {
        $this->setMerchantRefNum($merchantRefNum);

        return $this;
    }

    /**
     * Setter function for merchantRefNum
     *
     * @param string $merchantRefNum
     *
     * @return void
     */
    public function setMerchantRefNum(?string $merchantRefNum): void
    {
        $this->merchantRefNum = $merchantRefNum;
    }

    /**
     * Getter function for merchantRefNum
     *
     * @return ?string
     */
    public function getMerchantRefNum(): ?string
    {
        return $this->merchantRefNum;
    }
    /**
     * Builder function for amount
     *
     * @param int $amount
     *
     * @return $this
     */
    public function amount(?int $amount): self
    {
        $this->setAmount($amount);

        return $this;
    }

    /**
     * Setter function for amount
     *
     * @param int $amount
     *
     * @return void
     */
    public function setAmount(?int $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * Getter function for amount
     *
     * @return ?int
     */
    public function getAmount(): ?int
    {
        return $this->amount;
    }
    /**
     * Builder function for txnTime
     *
     * @param string $txnTime
     *
     * @return $this
     */
    public function txnTime(?string $txnTime): self
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
    public function setTxnTime(?string $txnTime): void
    {
        $this->txnTime = $txnTime;
    }

    /**
     * Getter function for txnTime
     *
     * @return ?string
     */
    public function getTxnTime(): ?string
    {
        return $this->txnTime;
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
        return "class VoidAuthorization {" . PHP_EOL
            . "    id: " . $this->toIndentedString($this->id ?? null) . PHP_EOL
            . "    merchantRefNum: " . $this->toIndentedString($this->merchantRefNum ?? null) . PHP_EOL
            . "    amount: " . $this->toIndentedString($this->amount ?? null) . PHP_EOL
            . "    txnTime: " . $this->toIndentedString($this->txnTime ?? null) . PHP_EOL
            . "    status: " . $this->toIndentedString($this->status ?? null) . PHP_EOL
            . "}";
    }
}
