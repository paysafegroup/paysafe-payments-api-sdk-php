<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Common\Travel\Carrental;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * Contains information about your car rental.<br />
 * <b>Note:</b> This object is only for Car rental Merchants.<br />
 * <b>Note:</b> This field has to be passed only in case of card transactions.
 */
class CarRentalDetails extends BaseModel
{

	private string $rentalAgreementNumber;
	private string $renterName;
	private int $rentalDays;
	private bool $noShow;
	private ?array $extraCharges = null;
	private string $customerServicePhone;
	private CarRentalReturnDetails $returnDetails;
	private CarRentalPickupDetails $pickupDetails;
	private string $vehicleClass;

	/**
	 * Builder function for rentalAgreementNumber
	 * 
	 * @param string $rentalAgreementNumber
	 * 
	 * @return $this
	 */
	public function rentalAgreementNumber(string $rentalAgreementNumber): self
	{
		$this->setRentalAgreementNumber($rentalAgreementNumber);
		
		return $this;
	}

	/**
	 * Setter function for rentalAgreementNumber
	 * 
	 * @param string $rentalAgreementNumber
	 * 
	 * @return void
	 */
	public function setRentalAgreementNumber(string $rentalAgreementNumber): void
	{
		$this->rentalAgreementNumber = $rentalAgreementNumber;
	}

	/**
	 * The rental agreement number for the car rental. Required during settlement.
	 * 
	 * @return string
	 */
	public function getRentalAgreementNumber(): string
	{
		return $this->rentalAgreementNumber;
	}

	/**
	 * Builder function for renterName
	 * 
	 * @param string $renterName
	 * 
	 * @return $this
	 */
	public function renterName(string $renterName): self
	{
		$this->setRenterName($renterName);
		
		return $this;
	}

	/**
	 * Setter function for renterName
	 * 
	 * @param string $renterName
	 * 
	 * @return void
	 */
	public function setRenterName(string $renterName): void
	{
		$this->renterName = $renterName;
	}

	/**
	 * The name of the person renting the car.
     * Required during settlement request with Mastercard or Amex for integration with TSYS processor.
	 * 
	 * @return string
	 */
	public function getRenterName(): string
	{
		return $this->renterName;
	}

	/**
	 * Builder function for rentalDays
	 * 
	 * @param int $rentalDays
	 * 
	 * @return $this
	 */
	public function rentalDays(int $rentalDays): self
	{
		$this->setRentalDays($rentalDays);
		
		return $this;
	}

	/**
	 * Setter function for rentalDays
	 * 
	 * @param int $rentalDays
	 * 
	 * @return void
	 */
	public function setRentalDays(int $rentalDays): void
	{
		$this->rentalDays = $rentalDays;
	}

	/**
	 * The total number of days the car is rented for.
     * Required during authorization request for integration with TSYS processor. <br />
	 * Minimum: 1
	 * maximum: 99
	 * 
	 * @return int
	 */
	public function getRentalDays(): int
	{
		return $this->rentalDays;
	}

	/**
	 * Builder function for noShow
	 * 
	 * @param bool $noShow
	 * 
	 * @return $this
	 */
	public function noShow(bool $noShow): self
	{
		$this->setNoShow($noShow);
		
		return $this;
	}

	/**
	 * Setter function for noShow
	 * 
	 * @param bool $noShow
	 * 
	 * @return void
	 */
	public function setNoShow(bool $noShow): void
	{
		$this->noShow = $noShow;
	}

	/**
	 * Indicates if the customer didn't check in for their booking. Possible values:
	 * <ul>
	 *   <li>true if the customer didn't check in</li>
	 *   <li>false if the customer checked in</li>
	 * </ul>
	 * 
	 * @return bool
	 */
	public function getNoShow(): bool
	{
		return $this->noShow;
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
	 * The customer service phone number of the car rental company. Allowed numeric characters only.
	 * Required during settlement request for integration with TSYS processor.
	 * 
	 * @return string
	 */
	public function getCustomerServicePhone(): string
	{
		return $this->customerServicePhone;
	}

	/**
	 * Builder function for returnDetails
	 * 
	 * @param CarRentalReturnDetails $returnDetails
	 * 
	 * @return $this
	 */
	public function returnDetails(CarRentalReturnDetails $returnDetails): self
	{
		$this->setReturnDetails($returnDetails);
		
		return $this;
	}

	/**
	 * Setter function for returnDetails
	 * 
	 * @param CarRentalReturnDetails $returnDetails
	 * 
	 * @return void
	 */
	public function setReturnDetails(CarRentalReturnDetails $returnDetails): void
	{
		$this->returnDetails = $returnDetails;
	}

	/**
	 * Contains return details information for car rental  <b>Note:<b> This object is only for Car Rental Merchants.
	 * 
	 * @return CarRentalReturnDetails
	 */
	public function getReturnDetails(): CarRentalReturnDetails
	{
		return $this->returnDetails;
	}

	/**
	 * Builder function for pickupDetails
	 * 
	 * @param CarRentalPickupDetails $pickupDetails
	 * 
	 * @return $this
	 */
	public function pickupDetails(CarRentalPickupDetails $pickupDetails): self
	{
		$this->setPickupDetails($pickupDetails);
		
		return $this;
	}

	/**
	 * Setter function for pickupDetails
	 * 
	 * @param CarRentalPickupDetails $pickupDetails
	 * 
	 * @return void
	 */
	public function setPickupDetails(CarRentalPickupDetails $pickupDetails): void
	{
		$this->pickupDetails = $pickupDetails;
	}

	/**
	 * Contains pickup details information for car rental  <b>Note:<b> This object is only for Car Rental Merchants.
	 * 
	 * @return CarRentalPickupDetails
	 */
	public function getPickupDetails(): CarRentalPickupDetails
	{
		return $this->pickupDetails;
	}

	/**
	 * Builder function for vehicleClass
	 * 
	 * @param string $vehicleClass
	 * 
	 * @return $this
	 */
	public function vehicleClass(string $vehicleClass): self
	{
		$this->setVehicleClass($vehicleClass);
		
		return $this;
	}

	/**
	 * Setter function for vehicleClass
	 * 
	 * @param string $vehicleClass
	 * 
	 * @return void
	 */
	public function setVehicleClass(string $vehicleClass): void
	{
		$this->vehicleClass = $vehicleClass;
	}

	/**
	 * A code that corresponds to the classification of the rental vehicle (e.g., midsize, luxury, cargo van, etc.).
	 * Required during settlement request with Amex for integration with TSYS processor.
	 * 
	 * @return string
	 */
	public function getVehicleClass(): string
	{
		return $this->vehicleClass;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class CarRentalDetails {" . PHP_EOL
			. "    rentalAgreementNumber: " . $this->toIndentedString($this->rentalAgreementNumber) . PHP_EOL
			. "    renterName: " . $this->toIndentedString($this->renterName) . PHP_EOL
			. "    rentalDays: " . $this->toIndentedString($this->rentalDays) . PHP_EOL
			. "    noShow: " . $this->toIndentedString($this->noShow) . PHP_EOL
			. "    extraCharges: " . $this->toIndentedString($this->extraCharges) . PHP_EOL
			. "    customerServicePhone: " . $this->toIndentedString($this->customerServicePhone) . PHP_EOL
			. "    returnDetails: " . $this->toIndentedString($this->returnDetails) . PHP_EOL
			. "    pickupDetails: " . $this->toIndentedString($this->pickupDetails) . PHP_EOL
			. "    vehicleClass: " . $this->toIndentedString($this->vehicleClass) . PHP_EOL
			. "}";
	}
}
