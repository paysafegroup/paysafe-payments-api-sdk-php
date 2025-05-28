<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * Details of the billing cycle information for recurring payments.
|REQUIRED|CONDITION
|-|-
|Conditional|Mandatory if authenticationPurpose = INSTALMENT_TRANSACTION or RECURRING_TRANSACTION
 */
class BillingCycle extends BaseModel
{

	/**
	 * This is the date after which no further authorizations will be performed. The ISO 8601 date format is expected,
     * i.e., YYYY-MM-DD.
	 */
	private string $endDate;

	/**
	 * This is the minimum number of days between authorizations.
	 */
	private int $frequency;


	/**
	 * Builder function for endDate
	 * 
	 * @param string $endDate
	 * 
	 * @return BillingCycle
	 */
	public function endDate(string $endDate): self
	{
		$this->setEndDate($endDate);
		
		return $this;
	}
	/**
	 * Setter function for endDate
	 * 
	 * @param string $endDate
	 * 
	 * @return void
	 */
	public function setEndDate(string $endDate): void
	{
		$this->endDate = $endDate;
	}
	/**
	 * Getter function for endDate
	 * 
	 * @return string
	 */
	public function getEndDate(): string
	{
		return $this->endDate;
	}

	/**
	 * Builder function for frequency
	 * 
	 * @param int $frequency
	 * 
	 * @return BillingCycle
	 */
	public function frequency(int $frequency): self
	{
		$this->setFrequency($frequency);
		
		return $this;
	}
	/**
	 * Setter function for frequency
	 * 
	 * @param int $frequency
	 * 
	 * @return void
	 */
	public function setFrequency(int $frequency): void
	{
		$this->frequency = $frequency;
	}
	/**
	 * Getter function for frequency
	 * 
	 * @return int
	 */
	public function getFrequency(): int
	{
		return $this->frequency;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class BillingCycle {" . PHP_EOL .
			"	endDate: " . $this->toIndentedString($this->endDate) . PHP_EOL .
			"	frequency: " . $this->toIndentedString($this->frequency) . PHP_EOL .
		"}";
	}
}
