<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\PaymentMethod;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * This class represents response returned from PaysafeAPI endpoint 'Look Up Payment Methods'.
 */
class LookUpPaymentMethodsResponse extends BaseModel
{

	private ?array $paymentMethods = null;

	/**
	 * Builder function for paymentMethods
	 * 
	 * @param PaymentMethod[] $paymentMethods
	 * 
	 * @return $this
	 */
	public function paymentMethods(array $paymentMethods): self
	{
		$this->setPaymentMethods($paymentMethods);
		
		return $this;
	}

	/**
	 * Setter function for paymentMethods
	 * 
	 * @param PaymentMethod[] $paymentMethods
	 * 
	 * @return void
	 */
	public function setPaymentMethods(array $paymentMethods): void
	{
		$this->paymentMethods = $paymentMethods;
	}

	/**
	 * Get paymentMethods
	 * 
	 * @return PaymentMethod[]
	 */
	public function getPaymentMethods(): array
	{
		return $this->paymentMethods ?? [];
	}

	/**
	 * Add new paymentMethodsItem
	 * 
	 * @param PaymentMethod $paymentMethodsItem
	 * 
	 * @return $this
	 */
	public function addPaymentMethodsItem(PaymentMethod $paymentMethodsItem): self
	{
		if ($this->paymentMethods === null) {
			$this->setPaymentMethods([$paymentMethodsItem]);
			
			return $this;
		}
		
		$paymentMethods = $this->getPaymentMethods();
		$paymentMethods[] = $paymentMethodsItem;
		$this->setPaymentMethods($paymentMethods);
		
		return $this;
	}

	/**
	 * Remove paymentMethodsItem
	 * 
	 * @param PaymentMethod $paymentMethodsItem
	 * 
	 * @return $this
	 */
	public function removePaymentMethodsItem(PaymentMethod $paymentMethodsItem): self
	{
		$this->setPaymentMethods(array_diff($this->getPaymentMethods(), [$paymentMethodsItem]));
		
		return $this;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class LookUpPaymentMethodsResponse {" . PHP_EOL
			. "    paymentMethods: " . $this->toIndentedString($this->paymentMethods) . PHP_EOL
			. "}";
	}
}
