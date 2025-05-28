<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Refund;

use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Lpm\Splitpay;

/**
 * These are internal details to be passed in the process Refund request.
 */
class RefundRequest extends BaseModel
{

	private string $merchantRefNum;
	private int $amount;
	private bool $dupCheck = true;
	private ?array $splitpay = null;
	private array $additionalParameters;

	/**
	 * Builder function for merchantRefNum
	 * 
	 * @param string $merchantRefNum
	 * 
	 * @return $this
	 */
	public function merchantRefNum(string $merchantRefNum): self
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
	public function setMerchantRefNum(string $merchantRefNum): void
	{
		$this->merchantRefNum = $merchantRefNum;
	}

	/**
	 * This is the merchant reference number created by the merchant and submitted as part of the request.
     * It must be unique for each request.
	 * 
	 * @return string
	 */
	public function getMerchantRefNum(): string
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
	public function amount(int $amount): self
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
	public function setAmount(int $amount): void
	{
		$this->amount = $amount;
	}

	/**
	 * This is the amount of the request, in minor units. For example,
     * to process US $10.99, this value should be 1099. <br />
	 * Maximum: 99999999999
	 * 
	 * @return int
	 */
	public function getAmount(): int
	{
		return $this->amount;
	}

	/**
	 * Builder function for dupCheck
	 * 
	 * @param bool $dupCheck
	 * 
	 * @return $this
	 */
	public function dupCheck(bool $dupCheck): self
	{
		$this->setDupCheck($dupCheck);
		
		return $this;
	}

	/**
	 * Setter function for dupCheck
	 * 
	 * @param bool $dupCheck
	 * 
	 * @return void
	 */
	public function setDupCheck(bool $dupCheck): void
	{
		$this->dupCheck = $dupCheck;
	}

	/**
	 * This validates that this request is not a duplicate.
	 * A request is considered a duplicate if the merchantRefNum has already been used
     * in a previous request within the past 90 days.
	 * <b>Note:<b> This value defaults to true.
	 * 
	 * @return bool
	 */
	public function getDupCheck(): bool
	{
		return $this->dupCheck;
	}

	/**
	 * Builder function for splitpay
	 * 
	 * @param Splitpay[] $splitpay
	 * 
	 * @return $this
	 */
	public function splitpay(array $splitpay): self
	{
		$this->setSplitpay($splitpay);
		
		return $this;
	}

	/**
	 * Setter function for splitpay
	 * 
	 * @param Splitpay[] $splitpay
	 * 
	 * @return void
	 */
	public function setSplitpay(array $splitpay): void
	{
		$this->splitpay = $splitpay;
	}

	/**
	 * Get splitpay
	 * 
	 * @return Splitpay[]|null
	 */
	public function getSplitpay(): array
	{
		return $this->splitpay;
	}

	/**
	 * Add new splitpayItem
	 * 
	 * @param Splitpay $splitpayItem
	 * 
	 * @return $this
	 */
	public function addSplitpayItem(Splitpay $splitpayItem): self
	{
		if ($this->splitpay === null) {
			$this->setSplitpay([$splitpayItem]);
			
			return $this;
		}
		
		$splitpay = $this->getSplitpay();
		$splitpay[] = $splitpayItem;
		$this->setSplitpay($splitpay);
		
		return $this;
	}

	/**
	 * Remove splitpayItem
	 * 
	 * @param Splitpay $splitpayItem
	 * 
	 * @return $this
	 */
	public function removeSplitpayItem(Splitpay $splitpayItem): self
	{
		$this->setSplitpay(array_diff($this->getSplitpay(), [$splitpayItem]));
		
		return $this;
	}

	/**
	 * Builder function for additionalParameters
	 * 
	 * @param array $additionalParameters
	 * 
	 * @return $this
	 */
	public function additionalParameters(array $additionalParameters): self
	{
		$this->setAdditionalParameters($additionalParameters);
		
		return $this;
	}

	/**
	 * Setter function for additionalParameters
	 * 
	 * @param array $additionalParameters
	 * 
	 * @return void
	 */
	public function setAdditionalParameters(array $additionalParameters): void
	{
		$this->additionalParameters = $additionalParameters;
	}

	/**
	 * Getter function for additionalParameters
	 * 
	 * @return array
	 */
	public function getAdditionalParameters(): array
	{
		return $this->additionalParameters;
	}

    /**
     * Add a new additional parameter
     *
     * @param string $key
     * @param object $value
     *
     * @return $this
     */
    public function addAdditionalParameter(string $key, object $value): self
    {
        if ($this->additionalParameters === null) {
            $this->additionalParameters = [];
        }

        $this->additionalParameters[$key] = $value;

        return $this;
    }

    /**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class RefundRequest {" . PHP_EOL
			. "    merchantRefNum: " . $this->toIndentedString($this->merchantRefNum) . PHP_EOL
			. "    amount: " . $this->toIndentedString($this->amount) . PHP_EOL
			. "    dupCheck: " . $this->toIndentedString($this->dupCheck) . PHP_EOL
			. "    splitpay: " . $this->toIndentedString($this->splitpay) . PHP_EOL
			. "    additionalParameters: " . $this->toIndentedString($this->additionalParameters) . PHP_EOL
			. "}";
	}
}
