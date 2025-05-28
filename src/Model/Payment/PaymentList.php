<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Payment;

use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Common\Meta;

/**
 * PaymentList
 */
class PaymentList extends BaseModel
{

	private ?array $payments = null;
	private Meta $meta;

	/**
	 * Builder function for payments
	 * 
	 * @param Payment[] $payments
	 * 
	 * @return $this
	 */
	public function payments(array $payments): self
	{
		$this->setPayments($payments);
		
		return $this;
	}

	/**
	 * Setter function for payments
	 * 
	 * @param Payment[] $payments
	 * 
	 * @return void
	 */
	public function setPayments(array $payments): void
	{
		$this->payments = $payments;
	}

	/**
	 * An array of Payments.
	 * 
	 * @return Payment[]|null
	 */
	public function getPayments(): array
	{
		return $this->payments;
	}

	/**
	 * Add new paymentsItem
	 * 
	 * @param Payment $paymentsItem
	 * 
	 * @return $this
	 */
	public function addPaymentsItem(Payment $paymentsItem): self
	{
		if ($this->payments === null) {
			$this->setPayments([$paymentsItem]);
			
			return $this;
		}
		
		$payments = $this->getPayments();
		$payments[] = $paymentsItem;
		$this->setPayments($payments);
		
		return $this;
	}

	/**
	 * Remove paymentsItem
	 * 
	 * @param Payment $paymentsItem
	 * 
	 * @return $this
	 */
	public function removePaymentsItem(Payment $paymentsItem): self
	{
		$this->setPayments(array_diff($this->getPayments(), [$paymentsItem]));
		
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
		return "class PaymentList {" . PHP_EOL
			. "    payments: " . $this->toIndentedString($this->payments) . PHP_EOL
			. "    meta: " . $this->toIndentedString($this->meta) . PHP_EOL
			. "}";
	}
}
