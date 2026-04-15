<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card\ThreeDs;

use Paysafe\PhpSdk\Model\BaseModel;

class ElectronicDelivery extends BaseModel
{

	/**
	 * This is the email address to which the merchandise was delivered.
	 * Example: example@example.com
	 */
	private string $email;

	/**
	 * This indicates whether there is an electronic delivery for the product.
	 */
	private bool $isElectronicDelivery;


	/**
	 * Builder function for email
	 * 
	 * @param string $email
	 * 
	 * @return ElectronicDelivery
	 */
	public function email(string $email): self
	{
		$this->setEmail($email);
		
		return $this;
	}
	/**
	 * Setter function for email
	 * 
	 * @param string $email
	 * 
	 * @return void
	 */
	public function setEmail(string $email): void
	{
		$this->email = $email;
	}
	/**
	 * Getter function for email
	 * 
	 * @return string
	 */
	public function getEmail(): string
	{
		return $this->email;
	}

	/**
	 * Builder function for isElectronicDelivery
	 * 
	 * @param bool $isElectronicDelivery
	 * 
	 * @return ElectronicDelivery
	 */
	public function isElectronicDelivery(bool $isElectronicDelivery): self
	{
		$this->setIsElectronicDelivery($isElectronicDelivery);
		
		return $this;
	}
	/**
	 * Setter function for isElectronicDelivery
	 * 
	 * @param bool $isElectronicDelivery
	 * 
	 * @return void
	 */
	public function setIsElectronicDelivery(bool $isElectronicDelivery): void
	{
		$this->isElectronicDelivery = $isElectronicDelivery;
	}
	/**
	 * Getter function for isElectronicDelivery
	 * 
	 * @return bool
	 */
	public function getIsElectronicDelivery(): bool
	{
		return $this->isElectronicDelivery;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class ElectronicDelivery {" . PHP_EOL .
			"	email: " . $this->toIndentedString($this->email) . PHP_EOL .
			"	isElectronicDelivery: " . $this->toIndentedString($this->isElectronicDelivery) . PHP_EOL .
		"}";
	}
}
