<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * This is more detailed information about the items that are being purchased for Level2Level3 merchants
 */
class LineItems extends BaseModel
{

	/**
	 * This is a description of the item(s) being purchased.
	 * Example: Disney Cruise Line
	 */
	private string $description;

	/**
	 * This is a merchant-defined description code of the item being purchased.
	 * Example: DCL
	 */
	private string $productCode;


	/**
	 * This is the quantity of the item.
	 * 
	 * **Note:** Max 4 decimals is allowed.
	 * Example: 4
	 */
	private int $quantity;

	/**
	 * This is the unit price of the item being purchased, in minor units.
     * The currency will be based on the account setting.
	 * Example: 120000
	 */
	private int $unitAmount;


	/**
	 * This is the tax rate used to calculate the tax 
	 * amount. For example, if the tax rate is 10.5%, this value should be 10.5.
	 * 
	 * **Note:** Max 2 decimals allowed.
	 * Example: 5
	 */
	private int $taxRate;


	/**
	 * This is the amount of any value-added taxes that 
	 * can be associated with the purchased item, in 
	 * minor units. The currency will be based on the 
	 * account setting. 
	 * 
	 * **Note:** Our system will not validate the accuracy of this value. The merchant's application must 
	 * calculate this value correctly.
	 * Example: 24000
	 */
	private int $taxAmount;


	/**
	 * This is the total amount of the line item, typically calculated as price multiplied by quantity,
     * in minor units.
     * The currency is based on the account setting.
	 * 
	 * **Note:** Our system will not validate the accuracy of this value.
     * The merchant''s application must calculate this value correctly.
	 */
	private int $totalAmount;


	/**
	 * Builder function for description
	 * 
	 * @param string $description
	 * 
	 * @return LineItems
	 */
	public function description(string $description): self
	{
		$this->setDescription($description);
		
		return $this;
	}
	/**
	 * Setter function for description
	 * 
	 * @param string $description
	 * 
	 * @return void
	 */
	public function setDescription(string $description): void
	{
		$this->description = $description;
	}
	/**
	 * Getter function for description
	 * 
	 * @return string
	 */
	public function getDescription(): string
	{
		return $this->description;
	}

	/**
	 * Builder function for productCode
	 * 
	 * @param string $productCode
	 * 
	 * @return LineItems
	 */
	public function productCode(string $productCode): self
	{
		$this->setProductCode($productCode);
		
		return $this;
	}
	/**
	 * Setter function for productCode
	 * 
	 * @param string $productCode
	 * 
	 * @return void
	 */
	public function setProductCode(string $productCode): void
	{
		$this->productCode = $productCode;
	}
	/**
	 * Getter function for productCode
	 * 
	 * @return string
	 */
	public function getProductCode(): string
	{
		return $this->productCode;
	}

	/**
	 * Builder function for quantity
	 * 
	 * @param int $quantity
	 * 
	 * @return LineItems
	 */
	public function quantity(int $quantity): self
	{
		$this->setQuantity($quantity);
		
		return $this;
	}
	/**
	 * Setter function for quantity
	 * 
	 * @param int $quantity
	 * 
	 * @return void
	 */
	public function setQuantity(int $quantity): void
	{
		$this->quantity = $quantity;
	}
	/**
	 * Getter function for quantity
	 * 
	 * @return int
	 */
	public function getQuantity(): int
	{
		return $this->quantity;
	}

	/**
	 * Builder function for unitAmount
	 * 
	 * @param int $unitAmount
	 * 
	 * @return LineItems
	 */
	public function unitAmount(int $unitAmount): self
	{
		$this->setUnitAmount($unitAmount);
		
		return $this;
	}
	/**
	 * Setter function for unitAmount
	 * 
	 * @param int $unitAmount
	 * 
	 * @return void
	 */
	public function setUnitAmount(int $unitAmount): void
	{
		$this->unitAmount = $unitAmount;
	}
	/**
	 * Getter function for unitAmount
	 * 
	 * @return int
	 */
	public function getUnitAmount(): int
	{
		return $this->unitAmount;
	}

	/**
	 * Builder function for taxRate
	 * 
	 * @param int $taxRate
	 * 
	 * @return LineItems
	 */
	public function taxRate(int $taxRate): self
	{
		$this->setTaxRate($taxRate);
		
		return $this;
	}
	/**
	 * Setter function for taxRate
	 * 
	 * @param int $taxRate
	 * 
	 * @return void
	 */
	public function setTaxRate(int $taxRate): void
	{
		$this->taxRate = $taxRate;
	}
	/**
	 * Getter function for taxRate
	 * 
	 * @return int
	 */
	public function getTaxRate(): int
	{
		return $this->taxRate;
	}

	/**
	 * Builder function for taxAmount
	 * 
	 * @param int $taxAmount
	 * 
	 * @return LineItems
	 */
	public function taxAmount(int $taxAmount): self
	{
		$this->setTaxAmount($taxAmount);
		
		return $this;
	}
	/**
	 * Setter function for taxAmount
	 * 
	 * @param int $taxAmount
	 * 
	 * @return void
	 */
	public function setTaxAmount(int $taxAmount): void
	{
		$this->taxAmount = $taxAmount;
	}
	/**
	 * Getter function for taxAmount
	 * 
	 * @return int
	 */
	public function getTaxAmount(): int
	{
		return $this->taxAmount;
	}

	/**
	 * Builder function for totalAmount
	 * 
	 * @param int $totalAmount
	 * 
	 * @return LineItems
	 */
	public function totalAmount(int $totalAmount): self
	{
		$this->setTotalAmount($totalAmount);
		
		return $this;
	}
	/**
	 * Setter function for totalAmount
	 * 
	 * @param int $totalAmount
	 * 
	 * @return void
	 */
	public function setTotalAmount(int $totalAmount): void
	{
		$this->totalAmount = $totalAmount;
	}
	/**
	 * Getter function for totalAmount
	 * 
	 * @return int
	 */
	public function getTotalAmount(): int
	{
		return $this->totalAmount;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class LineItems {" . PHP_EOL . 
			"	description: " . $this->toIndentedString($this->description) . PHP_EOL .
			"	productCode: " . $this->toIndentedString($this->productCode) . PHP_EOL .
			"	quantity: " . $this->toIndentedString($this->quantity) . PHP_EOL .
			"	unitAmount: " . $this->toIndentedString($this->unitAmount) . PHP_EOL .
			"	taxRate: " . $this->toIndentedString($this->taxRate) . PHP_EOL .
			"	taxAmount: " . $this->toIndentedString($this->taxAmount) . PHP_EOL .
			"	totalAmount: " . $this->toIndentedString($this->totalAmount) . PHP_EOL .
		"}";
	}
}
