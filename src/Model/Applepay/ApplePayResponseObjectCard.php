<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Applepay;

use Paysafe\PhpSdk\Model\BaseModel;

class ApplePayResponseObjectCard extends BaseModel
{
	private string $holderName;
	private string $status;
	private int $lastDigits;
	private string $cardCategory;

	/**
	 * Builder function for holderName
	 * 
	 * @param string $holderName
	 * 
	 * @return $this
	 */
	public function holderName(string $holderName): self
	{
		$this->setHolderName($holderName);
		
		return $this;
	}

	/**
	 * Setter function for holderName
	 * 
	 * @param string $holderName
	 * 
	 * @return void
	 */
	public function setHolderName(string $holderName): void
	{
		$this->holderName = $holderName;
	}

	/**
	 * Getter function for holderName
	 * 
	 * @return string
	 */
	public function getHolderName(): string
	{
		return $this->holderName;
	}

	/**
	 * Builder function for status
	 * 
	 * @param string $status
	 * 
	 * @return $this
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
	 * Builder function for lastDigits
	 * 
	 * @param int $lastDigits
	 * 
	 * @return $this
	 */
	public function lastDigits(int $lastDigits): self
	{
		$this->setLastDigits($lastDigits);
		
		return $this;
	}

	/**
	 * Setter function for lastDigits
	 * 
	 * @param int $lastDigits
	 * 
	 * @return void
	 */
	public function setLastDigits(int $lastDigits): void
	{
		$this->lastDigits = $lastDigits;
	}

	/**
	 * Getter function for lastDigits
	 * 
	 * @return int
	 */
	public function getLastDigits(): int
	{
		return $this->lastDigits;
	}

	/**
	 * Builder function for cardCategory
	 * 
	 * @param string $cardCategory
	 * 
	 * @return $this
	 */
	public function cardCategory(string $cardCategory): self
	{
		$this->setCardCategory($cardCategory);
		
		return $this;
	}

	/**
	 * Setter function for cardCategory
	 * 
	 * @param string $cardCategory
	 * 
	 * @return void
	 */
	public function setCardCategory(string $cardCategory): void
	{
		$this->cardCategory = $cardCategory;
	}

	/**
	 * Getter function for cardCategory
	 * 
	 * @return string
	 */
	public function getCardCategory(): string
	{
		return $this->cardCategory;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class ApplePayResponseObjectCard {" . PHP_EOL
			. "    holderName: " . $this->toIndentedString($this->holderName) . PHP_EOL
			. "    status: " . $this->toIndentedString($this->status) . PHP_EOL
			. "    lastDigits: " . $this->toIndentedString($this->lastDigits) . PHP_EOL
			. "    cardCategory: " . $this->toIndentedString($this->cardCategory) . PHP_EOL
			. "}";
	}
}
