<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Common;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * Contains customer bank's mandate details 
 */
class Mandate extends BaseModel
{
	const STATUS_PENDING = 'PENDING';
	const STATUS_ACTIVE = 'ACTIVE';
	const STATUS_CANCELLED = 'CANCELLED';
	const STATUS_INACTIVE = 'INACTIVE';

	const STATUS_REASON_MERCHANT_CANCELLED = 'MERCHANT_CANCELLED';
	const STATUS_REASON_BANK_CANCELLED = 'BANK_CANCELLED';
	const STATUS_REASON_DECLINED = 'DECLINED';
	const STATUS_REASON_REJECTED = 'REJECTED';
	const STATUS_REASON_DISPUTED = 'DISPUTED';
	const STATUS_REASON_UNAUTHORIZED = 'UNAUTHORIZED';
	const STATUS_REASON_TRANSFERRED = 'TRANSFERRED';

	/**
	 * This is the id of the mandate that got created.
	 * Example: abcdc28d-486e-4b0a-bbf9-314033863542
	 */
	private string $id;


	/**
	 * This is the identifier of the mandate in the 
	 * banking system.
	 * Example: ABCDEF0796
	 */
	private string $reference;

	/**
	 * This is the status of the mandate request response.
	 */
	private string $status;

	/**
	 * This is the status reason of the mandate request response.
	 * Example: MERCHANT_CANCELLED
	 */
	private string $statusReason;


	/**
	 * Builder function for id
	 * 
	 * @param string $id
	 * 
	 * @return Mandate
	 */
	public function id(string $id): self
	{
		$this->setId($id);
		
		return $this;
	}
	/**
	 * Setter function for id
	 * 
	 * @param string $id
	 * 
	 * @return void
	 */
	public function setId(string $id): void
	{
		$this->id = $id;
	}
	/**
	 * Getter function for id
	 * 
	 * @return string
	 */
	public function getId(): string
	{
		return $this->id;
	}

	/**
	 * Builder function for reference
	 * 
	 * @param string $reference
	 * 
	 * @return Mandate
	 */
	public function reference(string $reference): self
	{
		$this->setReference($reference);
		
		return $this;
	}
	/**
	 * Setter function for reference
	 * 
	 * @param string $reference
	 * 
	 * @return void
	 */
	public function setReference(string $reference): void
	{
		$this->reference = $reference;
	}
	/**
	 * Getter function for reference
	 * 
	 * @return string
	 */
	public function getReference(): string
	{
		return $this->reference;
	}

	/**
	 * Builder function for status
	 * 
	 * @param string $status
	 * 
	 * @return Mandate
	 */
	public function status(string $status): self
	{
		$this->setStatus($status);
		
		return $this;
	}
	/**
	 * Setter function for status
	 * 
	 * @param string $status
	 * 
	 * @return void
	 */
	public function setStatus(string $status): void
	{
		$this->status = $status;
	}
	/**
	 * Getter function for status
	 * 
	 * @return string
	 */
	public function getStatus(): string
	{
		return $this->status;
	}

	/**
	 * Builder function for statusReason
	 * 
	 * @param string $statusReason
	 * 
	 * @return Mandate
	 */
	public function statusReason(string $statusReason): self
	{
		$this->setStatusReason($statusReason);
		
		return $this;
	}
	/**
	 * Setter function for statusReason
	 * 
	 * @param string $statusReason
	 * 
	 * @return void
	 */
	public function setStatusReason(string $statusReason): void
	{
		$this->statusReason = $statusReason;
	}
	/**
	 * Getter function for statusReason
	 * 
	 * @return string
	 */
	public function getStatusReason(): string
	{
		return $this->statusReason;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class Mandate {" . PHP_EOL .
			"	id: " . $this->toIndentedString($this->id) . PHP_EOL .
			"	reference: " . $this->toIndentedString($this->reference) . PHP_EOL .
			"	status: " . $this->toIndentedString($this->status) . PHP_EOL .
			"	statusReason: " . $this->toIndentedString($this->statusReason) . PHP_EOL .
		"}";
	}
}
