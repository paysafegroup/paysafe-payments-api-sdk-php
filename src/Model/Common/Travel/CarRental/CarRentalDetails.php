<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common\Travel\CarRental;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Common\Travel\CarRental\Enums\CarRentalExtraChargeType;
use Paysafe\PhpSdk\Model\Customer\Customer;


/**
 * Contains information about your car rental. <br>**Note:** This object is only for Car rental Merchants. <br>**Note:** This field has to be passed only in case of card transactions.
 */
class CarRentalDetails extends BaseModel
{
    /**
     * The rental agreement number for the car rental. Required during settlement
     */
    private ?string $rentalAgreementNumber = null;
    /**
     * The name of the person renting the car. Required during settlement request with Mastercard or Amex for integration with TSYS processor
     */
    private ?string $renterName = null;
    /**
     * The total number of days the car is rented for. Required during authorization request for integration with TSYS processor
     */
    private ?int $rentalDays = null;
    /**
     * Indicates if the customer didn't check in for their booking. true if the customer didn't check in, false if the customer checked in
     */
    private ?bool $noShow = null;
    /**
     * Indicates if the reservation includes additional ancillary charges
     */
    private array $extraCharges = [];
    /**
     * Customer service phone number
     */
    private ?string $customerServicePhone = null;
    private ?CarRentalReturnDetails $returnDetails = null;
    private ?CarRentalPickupDetails $pickupDetails = null;
    private ?string $vehicleClass = null;

    /**
     * Builder function for rentalAgreementNumber
     *
     * @param string $rentalAgreementNumber
     *
     * @return $this
     */
    public function rentalAgreementNumber(?string $rentalAgreementNumber): self
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
    public function setRentalAgreementNumber(?string $rentalAgreementNumber): void
    {
        $this->rentalAgreementNumber = $rentalAgreementNumber;
    }

    /**
     * Getter function for rentalAgreementNumber
     *
     * @return ?string
     */
    public function getRentalAgreementNumber(): ?string
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
    public function renterName(?string $renterName): self
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
    public function setRenterName(?string $renterName): void
    {
        $this->renterName = $renterName;
    }

    /**
     * Getter function for renterName
     *
     * @return ?string
     */
    public function getRenterName(): ?string
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
    public function rentalDays(?int $rentalDays): self
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
    public function setRentalDays(?int $rentalDays): void
    {
        $this->rentalDays = $rentalDays;
    }

    /**
     * Getter function for rentalDays
     *
     * @return ?int
     */
    public function getRentalDays(): ?int
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
    public function noShow(?bool $noShow): self
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
    public function setNoShow(?bool $noShow): void
    {
        $this->noShow = $noShow;
    }

    /**
     * Getter function for noShow
     *
     * @return ?bool
     */
    public function getNoShow(): ?bool
    {
        return $this->noShow;
    }
    /**
     * Builder function for extraCharges
     *
     * @param CarRentalExtraChargeType[] $extraCharges
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
     * @param CarRentalExtraChargeType[] $extraCharges
     *
     * @return void
     */
    public function setExtraCharges(array $extraCharges): void
    {
        $this->extraCharges = $extraCharges;
    }

    /**
     * Getter function for extraCharges
     *
     * @return CarRentalExtraChargeType[]
     */
    public function getExtraCharges(): array
    {
        return $this->extraCharges ?? [];
    }
    /**
     * Builder function for customerServicePhone
     *
     * @param string $customerServicePhone
     *
     * @return $this
     */
    public function customerServicePhone(?string $customerServicePhone): self
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
    public function setCustomerServicePhone(?string $customerServicePhone): void
    {
        $this->customerServicePhone = $customerServicePhone;
    }

    /**
     * Getter function for customerServicePhone
     *
     * @return ?string
     */
    public function getCustomerServicePhone(): ?string
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
    public function returnDetails(?CarRentalReturnDetails $returnDetails): self
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
    public function setReturnDetails(?CarRentalReturnDetails $returnDetails): void
    {
        $this->returnDetails = $returnDetails;
    }

    /**
     * Getter function for returnDetails
     *
     * @return ?CarRentalReturnDetails
     */
    public function getReturnDetails(): ?CarRentalReturnDetails
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
    public function pickupDetails(?CarRentalPickupDetails $pickupDetails): self
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
    public function setPickupDetails(?CarRentalPickupDetails $pickupDetails): void
    {
        $this->pickupDetails = $pickupDetails;
    }

    /**
     * Getter function for pickupDetails
     *
     * @return ?CarRentalPickupDetails
     */
    public function getPickupDetails(): ?CarRentalPickupDetails
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
    public function vehicleClass(?string $vehicleClass): self
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
    public function setVehicleClass(?string $vehicleClass): void
    {
        $this->vehicleClass = $vehicleClass;
    }

    /**
     * Getter function for vehicleClass
     *
     * @return ?string
     */
    public function getVehicleClass(): ?string
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
            . "    rentalAgreementNumber: " . $this->toIndentedString($this->rentalAgreementNumber ?? null) . PHP_EOL
            . "    renterName: " . $this->toIndentedString($this->renterName ?? null) . PHP_EOL
            . "    rentalDays: " . $this->toIndentedString($this->rentalDays ?? null) . PHP_EOL
            . "    noShow: " . $this->toIndentedString($this->noShow ?? null) . PHP_EOL
            . "    extraCharges: " . $this->toIndentedString($this->extraCharges ?? null) . PHP_EOL
            . "    customerServicePhone: " . $this->toIndentedString($this->customerServicePhone ?? null) . PHP_EOL
            . "    returnDetails: " . $this->toIndentedString($this->returnDetails ?? null) . PHP_EOL
            . "    pickupDetails: " . $this->toIndentedString($this->pickupDetails ?? null) . PHP_EOL
            . "    vehicleClass: " . $this->toIndentedString($this->vehicleClass ?? null) . PHP_EOL
            . "}";
    }
}
