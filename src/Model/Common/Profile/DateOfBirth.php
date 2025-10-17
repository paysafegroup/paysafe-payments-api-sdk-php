<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Common\Profile;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * This is the recipient's date of birth.

**Note:** Required for Pay by Bank.

 */
class DateOfBirth extends BaseModel
{

	/**
	 * This is the day of birth.
	 * Example: 6
	 */
	private int $day;

	/**
	 * This is the month of birth.
	 * Example: 5
	 */
	private int $month;

	/**
	 * This is the year of birth.
	 * Example: 1998
	 */
	private int $year;


	/**
	 * Builder function for day
	 * 
	 * @param int $day
	 * 
	 * @return DateOfBirth
	 */
	public function day(int $day): self
	{
		$this->setDay($day);
		
		return $this;
	}
	/**
	 * Setter function for day
	 * 
	 * @param int $day
	 * 
	 * @return void
	 */
	public function setDay(int $day): void
	{
		$this->day = $day;
	}
	/**
	 * Getter function for day
	 * 
	 * @return int
	 */
	public function getDay(): int
	{
		return $this->day;
	}

	/**
	 * Builder function for month
	 * 
	 * @param int $month
	 * 
	 * @return DateOfBirth
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
	 * @return DateOfBirth
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
		return "class DateOfBirth {" . PHP_EOL . 
			"	day: " . $this->toIndentedString($this->day) . PHP_EOL .
			"	month: " . $this->toIndentedString($this->month) . PHP_EOL .
			"	year: " . $this->toIndentedString($this->year) . PHP_EOL .
		"}";
	}
}
