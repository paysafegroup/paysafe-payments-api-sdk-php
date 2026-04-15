<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Lpm;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * These are the details of the giropay account used for the request.
 */
class Giropay extends BaseModel
{

	/**
	 * This is the unique merchant identifier that allows Paysafe to define the transaction with Giropay.
	 * Example: AirBeg3hIN_SC0yihWNKCzLJ4VPjJOR4RWLZWbIhcUE=
	 */
	private string $subMerchantReference;

	/**
	 * This is the merchant's category of operations. Note: if present and provided with value as I_GAMING,
     * then buyerAccount details will shared in Payment response.
     * For other verticals,it should be either null or shouldn't be provided.
	 * Example: I_GAMING
	 */
	private string $merchantCategory;


	/**
	 * Builder function for subMerchantReference
	 * 
	 * @param string $subMerchantReference
	 * 
	 * @return Giropay
	 */
	public function subMerchantReference(string $subMerchantReference): self
	{
		$this->setSubMerchantReference($subMerchantReference);
		
		return $this;
	}
	/**
	 * Setter function for subMerchantReference
	 * 
	 * @param string $subMerchantReference
	 * 
	 * @return void
	 */
	public function setSubMerchantReference(string $subMerchantReference): void
	{
		$this->subMerchantReference = $subMerchantReference;
	}
	/**
	 * Getter function for subMerchantReference
	 * 
	 * @return string
	 */
	public function getSubMerchantReference(): string
	{
		return $this->subMerchantReference;
	}

	/**
	 * Builder function for merchantCategory
	 * 
	 * @param string $merchantCategory
	 * 
	 * @return Giropay
	 */
	public function merchantCategory(string $merchantCategory): self
	{
		$this->setMerchantCategory($merchantCategory);
		
		return $this;
	}
	/**
	 * Setter function for merchantCategory
	 * 
	 * @param string $merchantCategory
	 * 
	 * @return void
	 */
	public function setMerchantCategory(string $merchantCategory): void
	{
		$this->merchantCategory = $merchantCategory;
	}
	/**
	 * Getter function for merchantCategory
	 * 
	 * @return string
	 */
	public function getMerchantCategory(): string
	{
		return $this->merchantCategory;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class Giropay {" . PHP_EOL . 
			"	subMerchantReference: " . $this->toIndentedString($this->subMerchantReference) . PHP_EOL .
			"	merchantCategory: " . $this->toIndentedString($this->merchantCategory) . PHP_EOL .
		"}";
	}
}
