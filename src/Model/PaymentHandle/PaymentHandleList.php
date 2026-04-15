<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\PaymentHandle;

use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Common\Meta;

/**
 * PaymentHandleList
 */
class PaymentHandleList extends BaseModel
{

	private ?array $paymentHandles = null;
	private Meta $meta;

	/**
	 * Builder function for paymentHandles
	 * 
	 * @param PaymentHandle[] $paymentHandles
	 * 
	 * @return $this
	 */
	public function paymentHandles(array $paymentHandles): self
	{
		$this->setPaymentHandles($paymentHandles);
		
		return $this;
	}

	/**
	 * Setter function for paymentHandles
	 * 
	 * @param PaymentHandle[] $paymentHandles
	 * 
	 * @return void
	 */
	public function setPaymentHandles(array $paymentHandles): void
	{
		$this->paymentHandles = $paymentHandles;
	}

	/**
	 * Get paymentHandles
	 * 
	 * @return PaymentHandle[]
	 */
	public function getPaymentHandles(): array
	{
		return $this->paymentHandles ?? [];
	}

	/**
	 * Add new paymentHandlesItem
	 * 
	 * @param PaymentHandle $paymentHandlesItem
	 * 
	 * @return $this
	 */
	public function addPaymentHandlesItem(PaymentHandle $paymentHandlesItem): self
	{
		if ($this->paymentHandles === null) {
			$this->setPaymentHandles([$paymentHandlesItem]);
			
			return $this;
		}
		
		$paymentHandles = $this->getPaymentHandles();
		$paymentHandles[] = $paymentHandlesItem;
		$this->setPaymentHandles($paymentHandles);
		
		return $this;
	}

	/**
	 * Remove paymentHandlesItem
	 * 
	 * @param PaymentHandle $paymentHandlesItem
	 * 
	 * @return $this
	 */
	public function removePaymentHandlesItem(PaymentHandle $paymentHandlesItem): self
	{
		$this->setPaymentHandles(array_diff($this->getPaymentHandles(), [$paymentHandlesItem]));
		
		return $this;
	}

	/**
	 * Builder function for meta
	 * 
	 * @param Meta $meta
	 * 
	 * @return $this
	 */
	public function meta(Meta $meta): self
	{
		$this->setMeta($meta);
		
		return $this;
	}

	/**
	 * Setter function for meta
	 * 
	 * @param Meta $meta
	 * 
	 * @return void
	 */
	public function setMeta(Meta $meta): void
	{
		$this->meta = $meta;
	}

	/**
	 * Contains meta info for the pagination APIs
	 * 
	 * @return Meta
	 */
	public function getMeta(): Meta
	{
		return $this->meta;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class PaymentHandleList {" . PHP_EOL
			. "    paymentHandles: " . $this->toIndentedString($this->paymentHandles) . PHP_EOL
			. "    meta: " . $this->toIndentedString($this->meta) . PHP_EOL
			. "}";
	}
}
