<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card\ThreeDs;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * These are the details of the current payment account of the cardholder.
 * <li>
 * <b>createdRange:</b>
 * This indicates the length of time that the payment account was enrolled in the cardholder’s
 * account with the 3DS Requestor. <br />
 * Allowed values:
 * NO_ACCOUNT, DURING_TRANSACTION, LESS_THAN_THIRTY_DAYS, THIRTY_TO_SIXTY_DAYS, MORE_THAN_SIXTY_DAYS
 * </li>
 * <li>
 * <b>createdDate:</b> This is the date that the cardholder opened the account with the 3DS Requestor.
 * The ISO 8601 date format is expected, i.e., YYYY-MM-DD.e.
 * </li>
 */
class PaymentAccountDetails extends BaseModel
{

	private string $createdRange;
	private string $createdDate;

	/**
	 * Builder function for createdRange
	 * 
	 * @param string $createdRange
	 * 
	 * @return $this
	 */
	public function createdRange(string $createdRange): self
	{
		$this->setCreatedRange($createdRange);
		
		return $this;
	}

	/**
	 * Setter function for createdRange
	 * 
	 * @param string $createdRange
	 * 
	 * @return void
	 */
	public function setCreatedRange(string $createdRange): void
	{
		$this->createdRange = $createdRange;
	}

	/**
	 * This indicates the length of time that the payment account was enrolled
     * in the cardholder’s account with the 3DS Requestor.
	 * 
	 * @return string
	 */
	public function getCreatedRange(): string
	{
		return $this->createdRange;
	}

	/**
	 * Builder function for createdDate
	 * 
	 * @param string $createdDate
	 * 
	 * @return $this
	 */
	public function createdDate(string $createdDate): self
	{
		$this->setCreatedDate($createdDate);
		
		return $this;
	}

	/**
	 * Setter function for createdDate
	 * 
	 * @param string $createdDate
	 * 
	 * @return void
	 */
	public function setCreatedDate(string $createdDate): void
	{
		$this->createdDate = $createdDate;
	}

	/**
	 * This is the date that the cardholder opened the account with the 3DS Requestor.
     * The ISO 8601 date format is expected, i.e., YYYY-MM-DD.e.
	 * 
	 * @return string
	 */
	public function getCreatedDate(): string
	{
		return $this->createdDate;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class PaymentAccountDetails {" . PHP_EOL
			. "    createdRange: " . $this->toIndentedString($this->createdRange) . PHP_EOL
			. "    createdDate: " . $this->toIndentedString($this->createdDate) . PHP_EOL
			. "}";
	}
}
