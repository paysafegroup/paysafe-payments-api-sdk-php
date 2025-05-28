<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card\ThreeDs;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * Purchased gift card details
 * <ul>
 *   <li>
 *     <b>amount:</b> This is the amount of the gift card, in minor units. <br />
 *     Example: 1234
 *   </li>
 *   <li>
 *     <b>count:</b> This is the total count of individual prepaid or gift cards or codes purchased. <br />
 *     Example: 2
 *   </li>
 *   <li>
 *     <b>currency:</b> This is the currency of the gift card. See
 *   <a href="https://developer.paysafe.com/en/support/reference-information/codes/#currency-codes">Currency Codes</a>
 *     Example: USD
 *   </li>
 * </ul>
 */
class PurchasedGiftCardDetails extends BaseModel
{

    /**
     * @var int This is the amount of the gift card, in minor units. Example: 1234
     */
    private int $amount;
    /**
     * @var int This is the total count of individual prepaid or gift cards or codes purchased. Example: 2
     */
    private int $count;
    /**
     * @var string This is the currency of the gift card, e.g., USD or CAD.
     * See [Currency Codes](https://developer.paysafe.com/en/support/reference-information/codes/#currency-codes)
     * Example: USD
     */
    private string $currency;

	/**
	 * Builder function for amount
	 *
	 * @param int $amount
	 *
	 * @return PurchasedGiftCardDetails
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
	 * Getter function for amount
	 *
	 * @return int
	 */
	public function getAmount(): int
	{
		return $this->amount;
	}

	/**
	 * Builder function for count
	 *
	 * @param int $count
	 *
	 * @return PurchasedGiftCardDetails
	 */
	public function count(int $count): self
	{
		$this->setCount($count);

		return $this;
	}
	/**
	 * Setter function for count
	 *
	 * @param int $count
	 *
	 * @return void
	 */
	public function setCount(int $count): void
	{
		$this->count = $count;
	}
	/**
	 * Getter function for count
	 *
	 * @return int
	 */
	public function getCount(): int
	{
		return $this->count;
	}

	/**
	 * Builder function for currency
	 *
	 * @param string $currency
	 *
	 * @return PurchasedGiftCardDetails
	 */
	public function currency(string $currency): self
	{
		$this->setCurrency($currency);

		return $this;
	}
	/**
	 * Setter function for currency
	 *
	 * @param string $currency
	 *
	 * @return void
	 */
	public function setCurrency(string $currency): void
	{
		$this->currency = $currency;
	}
	/**
	 * Getter function for currency
	 *
	 * @return string
	 */
	public function getCurrency(): string
	{
		return $this->currency;
	}

	/**
	 * Convert the object to a string representation.
	 *
	 * @return string
	 */
	public function __toString(): string
	{
		return "class PurchasedGiftCardDetails {" . PHP_EOL .
			"	amount: " . $this->toIndentedString($this->amount) . PHP_EOL .
			"	count: " . $this->toIndentedString($this->count) . PHP_EOL .
			"	currency: " . $this->toIndentedString($this->currency) . PHP_EOL .
		"}";
	}
}
