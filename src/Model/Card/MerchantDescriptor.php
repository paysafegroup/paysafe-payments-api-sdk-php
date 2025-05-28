<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * This is the merchant descriptor that will be displayed on the customer's card or bank statement.<br>
 */
class MerchantDescriptor extends BaseModel
{


	/**
	 * This is a merchant descriptor that will be displayed on a customer’s card statement.
	 * 
	 * Example: OnlineStore
	 */
	private string $dynamicDescriptor;


	/**
	 * This is the merchant’s phone number,
     * which is appended to the merchant descriptor on a customer’s card statement.
	 * **Note:** This field is used only in case of payment.
	 * 
	 * Example: 12345678
	 */
	private string $phone;

	/**
	 * Builder function for dynamicDescriptor
	 * 
	 * @param string $dynamicDescriptor
	 * 
	 * @return MerchantDescriptor
	 */
	public function dynamicDescriptor(string $dynamicDescriptor): self
	{
		$this->setDynamicDescriptor($dynamicDescriptor);
		
		return $this;
	}
	/**
	 * Setter function for dynamicDescriptor
	 * 
	 * @param string $dynamicDescriptor
	 * 
	 * @return void
	 */
	public function setDynamicDescriptor(string $dynamicDescriptor): void
	{
		$this->dynamicDescriptor = $dynamicDescriptor;
	}
	/**
	 * Getter function for dynamicDescriptor
	 * 
	 * @return string
	 */
	public function getDynamicDescriptor(): string
	{
		return $this->dynamicDescriptor;
	}

	/**
	 * Builder function for phone
	 * 
	 * @param string $phone
	 * 
	 * @return MerchantDescriptor
	 */
	public function phone(string $phone): self
	{
		$this->setPhone($phone);
		
		return $this;
	}
	/**
	 * Setter function for phone
	 * 
	 * @param string $phone
	 * 
	 * @return void
	 */
	public function setPhone(string $phone): void
	{
		$this->phone = $phone;
	}
	/**
	 * Getter function for phone
	 * 
	 * @return string
	 */
	public function getPhone(): string
	{
		return $this->phone;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class MerchantDescriptor {" . PHP_EOL . 
			"	dynamicDescriptor: " . $this->toIndentedString($this->dynamicDescriptor) . PHP_EOL .
			"	phone: " . $this->toIndentedString($this->phone) . PHP_EOL .
		"}";
	}
}
