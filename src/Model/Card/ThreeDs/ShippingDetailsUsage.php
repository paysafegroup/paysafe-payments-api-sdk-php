<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card\ThreeDs;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * This is the shipping usage information.
 * <ul>
 *   <li>
 *     <b>cardHolderNameMatch:</b> This indicates whether the cardholder name on the account is identical
 *     to the shipping name used for this transaction.
 *   </li>
 *   <li>
 *     <b>initialUsageDate:</b> This is the date when the shipping address for
 *      this transaction was first used with the 3DS Requestor.
 *     The ISO 8601 date format is expected, i.e., YYYY-MM-DD.
 *   </li>
 *   <li>
 *     <b>initialUsageRange:</b> This is the card expiry month. <br />
 *     <i>Allowed values: CURRENT_TRANSACTION, LESS_THAN_THIRTY_DAYS, THIRTY_TO_SIXTY_DAYS, MORE_THAN_SIXTY_DAYS</i>
 *   </li>
 * </ul>
 */
class ShippingDetailsUsage extends BaseModel
{
	const INITIAL_USAGE_RANGE_CURRENT_TRANSACTION = 'CURRENT_TRANSACTION';
	const INITIAL_USAGE_RANGE_LESS_THAN_THIRTY_DAYS = 'LESS_THAN_THIRTY_DAYS';
	const INITIAL_USAGE_RANGE_THIRTY_TO_SIXTY_DAYS = 'THIRTY_TO_SIXTY_DAYS';
	const INITIAL_USAGE_RANGE_MORE_THAN_SIXTY_DAYS = 'MORE_THAN_SIXTY_DAYS';

	/**
	 * This indicates whether the cardholder name on the account is identical to the shipping name used
     * for this transaction.
	 */
	private bool $cardHolderNameMatch;

	/**
	 * This is the date when the shipping address for this transaction was first used with the 3DS Requestor.
     * The ISO 8601 date format is expected, i.e., YYYY-MM-DD.
	 */
	private string $initialUsageDate;

	private string $initialUsageRange;

	/**
	 * Builder function for cardHolderNameMatch
	 *
	 * @param bool $cardHolderNameMatch
	 *
	 * @return ShippingDetailsUsage
	 */
	public function cardHolderNameMatch(bool $cardHolderNameMatch): self
	{
		$this->setCardHolderNameMatch($cardHolderNameMatch);

		return $this;
	}
	/**
	 * Setter function for cardHolderNameMatch
	 *
	 * @param bool $cardHolderNameMatch
	 *
	 * @return void
	 */
	public function setCardHolderNameMatch(bool $cardHolderNameMatch): void
	{
		$this->cardHolderNameMatch = $cardHolderNameMatch;
	}
	/**
	 * Getter function for cardHolderNameMatch
	 *
	 * @return bool
	 */
	public function getCardHolderNameMatch(): bool
	{
		return $this->cardHolderNameMatch;
	}

	/**
	 * Builder function for initialUsageDate
	 *
	 * @param string $initialUsageDate
	 *
	 * @return ShippingDetailsUsage
	 */
	public function initialUsageDate(string $initialUsageDate): self
	{
		$this->setInitialUsageDate($initialUsageDate);

		return $this;
	}
	/**
	 * Setter function for initialUsageDate
	 *
	 * @param string $initialUsageDate
	 *
	 * @return void
	 */
	public function setInitialUsageDate(string $initialUsageDate): void
	{
		$this->initialUsageDate = $initialUsageDate;
	}
	/**
	 * Getter function for initialUsageDate
	 *
	 * @return string
	 */
	public function getInitialUsageDate(): string
	{
		return $this->initialUsageDate;
	}

	/**
	 * Builder function for initialUsageRange
	 *
	 * @param string $initialUsageRange
	 *
	 * @return ShippingDetailsUsage
	 */
	public function initialUsageRange(string $initialUsageRange): self
	{
		$this->setInitialUsageRange($initialUsageRange);

		return $this;
	}
	/**
	 * Setter function for initialUsageRange
	 *
	 * @param string $initialUsageRange
	 *
	 * @return void
	 */
	public function setInitialUsageRange(string $initialUsageRange): void
	{
		$this->initialUsageRange = $initialUsageRange;
	}
	/**
	 * Getter function for initialUsageRange
	 *
	 * @return string
	 */
	public function getInitialUsageRange(): string
	{
		return $this->initialUsageRange;
	}

	/**
	 * Convert the object to a string representation.
	 *
	 * @return string
	 */
	public function __toString(): string
	{
		return "class ShippingDetailsUsage {" . PHP_EOL .
			"	cardHolderNameMatch: " . $this->toIndentedString($this->cardHolderNameMatch) . PHP_EOL .
			"	initialUsageDate: " . $this->toIndentedString($this->initialUsageDate) . PHP_EOL .
			"	initialUsageRange: " . $this->toIndentedString($this->initialUsageRange) . PHP_EOL .
		"}";
	}
}
