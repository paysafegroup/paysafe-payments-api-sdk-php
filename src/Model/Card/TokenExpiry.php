<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * This is the token's expiry date.
 */
class TokenExpiry extends BaseModel
{

	/**
	 * This is the token expiry month.
	 * Example: 12
	 */
	private int $month;

	/**
	 * This is the token expiry year.
	 * Example: 2023
	 */
	private int $year;


	/**
	 * Builder function for month
	 * 
	 * @param int $month
	 * 
	 * @return TokenExpiry
	 */
	public function month(int $month): self
	{
		$this->setMonth($month);
		
		return $this;
	}
	/**
	 * Setter function for month
	 * 
	 * @param int $month
	 * 
	 * @return void
	 */
	public function setMonth(int $month): void
	{
		$this->month = $month;
	}
	/**
	 * Getter function for month
	 * 
	 * @return int
	 */
	public function getMonth(): int
	{
		return $this->month;
	}

	/**
	 * Builder function for year
	 * 
	 * @param int $year
	 * 
	 * @return TokenExpiry
	 */
	public function year(int $year): self
	{
		$this->setYear($year);
		
		return $this;
	}
	/**
	 * Setter function for year
	 * 
	 * @param int $year
	 * 
	 * @return void
	 */
	public function setYear(int $year): void
	{
		$this->year = $year;
	}
	/**
	 * Getter function for year
	 * 
	 * @return int
	 */
	public function getYear(): int
	{
		return $this->year;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class TokenExpiry {" . PHP_EOL . 
			"	month: " . $this->toIndentedString($this->month) . PHP_EOL .
			"	year: " . $this->toIndentedString($this->year) . PHP_EOL .
		"}";
	}
}
