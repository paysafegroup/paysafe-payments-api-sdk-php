<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Common\Travel\Lodging;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * Contains information about lodging details.<br />
 * <b>Note:<b> This object is only for Lodging Merchants..<br />
 * <b>Note:<b> This field has to be passed only in case of card transactions.
 */
class LodgingDetails extends BaseModel
{

	private string $hotelFolioNumber;
	private string $checkInDate;
	private string $checkOutDate;
	private string $customerServicePhone;
	private string $propertyLocalPhone;
	private ?array $extraCharges = null;
	private int $roomRate;
	private string $programCode = 'LODGING';
	private int $numberOfNights;
	private bool $isFireSafetyActCompliant;

	/**
	 * Builder function for hotelFolioNumber
	 * 
	 * @param string $hotelFolioNumber
	 * 
	 * @return $this
	 */
	public function hotelFolioNumber(string $hotelFolioNumber): self
	{
		$this->setHotelFolioNumber($hotelFolioNumber);
		
		return $this;
	}

	/**
	 * Setter function for hotelFolioNumber
	 * 
	 * @param string $hotelFolioNumber
	 * 
	 * @return void
	 */
	public function setHotelFolioNumber(string $hotelFolioNumber): void
	{
		$this->hotelFolioNumber = $hotelFolioNumber;
	}

	/**
	 * The card acceptor’s internal invoice or billing ID reference number. Required during settlement
	 * 
	 * @return string
	 */
	public function getHotelFolioNumber(): string
	{
		return $this->hotelFolioNumber;
	}

	/**
	 * Builder function for checkInDate
	 * 
	 * @param string $checkInDate
	 * 
	 * @return $this
	 */
	public function checkInDate(string $checkInDate): self
	{
		$this->setCheckInDate($checkInDate);
		
		return $this;
	}

	/**
	 * Setter function for checkInDate
	 * 
	 * @param string $checkInDate
	 * 
	 * @return void
	 */
	public function setCheckInDate(string $checkInDate): void
	{
		$this->checkInDate = $checkInDate;
	}

	/**
	 * The arrival date. Date format = YYYY-MM-DD, ISO 8601 expected. For example 2023-12-20.
     * Required during settlement.
	 * 
	 * @return string
	 */
	public function getCheckInDate(): string
	{
		return $this->checkInDate;
	}

	/**
	 * Builder function for checkOutDate
	 * 
	 * @param string $checkOutDate
	 * 
	 * @return $this
	 */
	public function checkOutDate(string $checkOutDate): self
	{
		$this->setCheckOutDate($checkOutDate);
		
		return $this;
	}

	/**
	 * Setter function for checkOutDate
	 * 
	 * @param string $checkOutDate
	 * 
	 * @return void
	 */
	public function setCheckOutDate(string $checkOutDate): void
	{
		$this->checkOutDate = $checkOutDate;
	}

	/**
	 * The departure date. Date format = YYYY-MM-DD, ISO 8601 expected. For example 2023-12-20.
     * Required during settlement.
	 * 
	 * @return string
	 */
	public function getCheckOutDate(): string
	{
		return $this->checkOutDate;
	}

	/**
	 * Builder function for customerServicePhone
	 * 
	 * @param string $customerServicePhone
	 * 
	 * @return $this
	 */
	public function customerServicePhone(string $customerServicePhone): self
	{
		$this->setCustomerServicePhone($customerServicePhone);
		
		return $this;
	}

	/**
	 * Setter function for customerServicePhone
	 * 
	 * @param string $customerServicePhone
	 * 
	 * @return void
	 */
	public function setCustomerServicePhone(string $customerServicePhone): void
	{
		$this->customerServicePhone = $customerServicePhone;
	}

	/**
	 * Merchant phone number that the cardholder may call for service. Allowed numeric characters only.
	 * Required during settlement request with Visa or Mastercard for integration with TSYS processor.
	 * 
	 * @return string
	 */
	public function getCustomerServicePhone(): string
	{
		return $this->customerServicePhone;
	}

	/**
	 * Builder function for propertyLocalPhone
	 * 
	 * @param string $propertyLocalPhone
	 * 
	 * @return $this
	 */
	public function propertyLocalPhone(string $propertyLocalPhone): self
	{
		$this->setPropertyLocalPhone($propertyLocalPhone);
		
		return $this;
	}

	/**
	 * Setter function for propertyLocalPhone
	 * 
	 * @param string $propertyLocalPhone
	 * 
	 * @return void
	 */
	public function setPropertyLocalPhone(string $propertyLocalPhone): void
	{
		$this->propertyLocalPhone = $propertyLocalPhone;
	}

	/**
	 * The lodging property location's phone number. Allowed numeric characters only.
	 * Required during settlement requests with Mastercard for integration with TSYS processor.
	 * 
	 * @return string
	 */
	public function getPropertyLocalPhone(): string
	{
		return $this->propertyLocalPhone;
	}

	/**
	 * Builder function for extraCharges
	 * 
	 * @param string[] $extraCharges
	 * 
	 * @return $this
	 */
	public function extraCharges(array $extraCharges): self
	{
		$this->setExtraCharges($extraCharges);
		
		return $this;
	}

	/**
	 * Setter function for extraCharges
	 * 
	 * @param string[] $extraCharges
	 * 
	 * @return void
	 */
	public function setExtraCharges(array $extraCharges): void
	{
		$this->extraCharges = $extraCharges;
	}

	/**
	 * Indicates if the reservation includes additional ancillary charges.
	 * 
	 * @return string[]|null
	 */
	public function getExtraCharges(): array
	{
		return $this->extraCharges;
	}

	/**
	 * Add new extraChargesItem
	 * 
	 * @param string $extraChargesItem
	 * 
	 * @return $this
	 */
	public function addExtraChargesItem(string $extraChargesItem): self
	{
		if ($this->extraCharges === null) {
			$this->setExtraCharges([$extraChargesItem]);
			
			return $this;
		}
		
		$extraCharges = $this->getExtraCharges();
		$extraCharges[] = $extraChargesItem;
		$this->setExtraCharges($extraCharges);
		
		return $this;
	}

	/**
	 * Remove extraChargesItem
	 * 
	 * @param string $extraChargesItem
	 * 
	 * @return $this
	 */
	public function removeExtraChargesItem(string $extraChargesItem): self
	{
		$this->setExtraCharges(array_diff($this->getExtraCharges(), [$extraChargesItem]));
		
		return $this;
	}

	/**
	 * Builder function for roomRate
	 * 
	 * @param int $roomRate
	 * 
	 * @return $this
	 */
	public function roomRate(int $roomRate): self
	{
		$this->setRoomRate($roomRate);
		
		return $this;
	}

	/**
	 * Setter function for roomRate
	 * 
	 * @param int $roomRate
	 * 
	 * @return void
	 */
	public function setRoomRate(int $roomRate): void
	{
		$this->roomRate = $roomRate;
	}

	/**
	 * The nightly rate for one room at the lodging property.
     * Required during settlement request with Amex for integration with TSYS processor. <br />
	 * Maximum: 999999999999
	 * 
	 * @return int
	 */
	public function getRoomRate(): int
	{
		return $this->roomRate;
	}

	/**
	 * Builder function for programCode
	 * 
	 * @param string $programCode
	 * 
	 * @return $this
	 */
	public function programCode(string $programCode): self
	{
		$this->setProgramCode($programCode);
		
		return $this;
	}

	/**
	 * Setter function for programCode
	 * 
	 * @param string $programCode
	 * 
	 * @return void
	 */
	public function setProgramCode(string $programCode): void
	{
		$this->programCode = $programCode;
	}

	/**
	 * Code that corresponds to the category of lodging charges detailed in this message. Allowed values:
	 * <li>LODGING - (Default) Submitted charges are for lodging.</li>
	 * <li>>NO_SHOW - Submitted charges are for the failure of the guest(s) to check in for reserved room.</li>
	 * <li>ADVANCED_DEPOSIT - Submitted charges are for an Advanced Deposit to reserve one or more rooms.
     * In this case,
	 * the settlement date will be sent to the schemes for both the check-in and check-out dates.</li>
	 * If no value is submitted the default value 'LODGING' is used.
	 * 
	 * @return string
	 */
	public function getProgramCode(): string
	{
		return $this->programCode;
	}

	/**
	 * Builder function for numberOfNights
	 * 
	 * @param int $numberOfNights
	 * 
	 * @return $this
	 */
	public function numberOfNights(int $numberOfNights): self
	{
		$this->setNumberOfNights($numberOfNights);
		
		return $this;
	}

	/**
	 * Setter function for numberOfNights
	 * 
	 * @param int $numberOfNights
	 * 
	 * @return void
	 */
	public function setNumberOfNights(int $numberOfNights): void
	{
		$this->numberOfNights = $numberOfNights;
	}

	/**
	 * The total number of nights the room is booked for.
	 * Required during authorization request with Visa for integration with TSYS processor.<br />
	 * Required during settlement request with Amex for integration with TSYS processor. <br />
	 * Maximum: 99
	 * 
	 * @return int
	 */
	public function getNumberOfNights(): int
	{
		return $this->numberOfNights;
	}

	/**
	 * Builder function for isFireSafetyActCompliant
	 * 
	 * @param bool $isFireSafetyActCompliant
	 * 
	 * @return $this
	 */
	public function isFireSafetyActCompliant(bool $isFireSafetyActCompliant): self
	{
		$this->setIsFireSafetyActCompliant($isFireSafetyActCompliant);
		
		return $this;
	}

	/**
	 * Setter function for isFireSafetyActCompliant
	 * 
	 * @param bool $isFireSafetyActCompliant
	 * 
	 * @return void
	 */
	public function setIsFireSafetyActCompliant(bool $isFireSafetyActCompliant): void
	{
		$this->isFireSafetyActCompliant = $isFireSafetyActCompliant;
	}

	/**
	 * Identifies that the facility complies with the Hotel and Motel Fire Safety Act of 1990.
     * Possible values: true, false.
	 * 
	 * @return bool
	 */
	public function getIsFireSafetyActCompliant(): bool
	{
		return $this->isFireSafetyActCompliant;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class LodgingDetails {" . PHP_EOL
			. "    hotelFolioNumber: " . $this->toIndentedString($this->hotelFolioNumber) . PHP_EOL
			. "    checkInDate: " . $this->toIndentedString($this->checkInDate) . PHP_EOL
			. "    checkOutDate: " . $this->toIndentedString($this->checkOutDate) . PHP_EOL
			. "    customerServicePhone: " . $this->toIndentedString($this->customerServicePhone) . PHP_EOL
			. "    propertyLocalPhone: " . $this->toIndentedString($this->propertyLocalPhone) . PHP_EOL
			. "    extraCharges: " . $this->toIndentedString($this->extraCharges) . PHP_EOL
			. "    roomRate: " . $this->toIndentedString($this->roomRate) . PHP_EOL
			. "    programCode: " . $this->toIndentedString($this->programCode) . PHP_EOL
			. "    numberOfNights: " . $this->toIndentedString($this->numberOfNights) . PHP_EOL
			. "    isFireSafetyActCompliant: " . $this->toIndentedString($this->isFireSafetyActCompliant) . PHP_EOL
			. "}";
	}
}
