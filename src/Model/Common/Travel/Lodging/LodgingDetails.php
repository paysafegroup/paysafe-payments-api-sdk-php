<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common\Travel\Lodging;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Common\Travel\Lodging\Enums\ExtraChargesType;


/**
 * Contains information about lodging details. <br>**Note:** This object is only for Lodging Merchants. <br>**Note:** This field has to be passed only in case of card transactions.
 */
class LodgingDetails extends BaseModel
{
    /**
     * The card acceptor’s internal invoice or billing ID reference number. Required during settlement
     */
    private ?string $hotelFolioNumber = null;
    /**
     * The arrival date. Date format = YYYY-MM-DD, ISO 8601 expected. For example 2023-12-20. * Required during settlement.
     */
    private ?string $checkInDate = null;
    /**
     * The departure date. Date format = YYYY-MM-DD, ISO 8601 expected. For example 2023-12-20. * Required during settlement.
     */
    private ?string $checkOutDate = null;
    /**
     * Merchant phone number that the cardholder may call for service. Allowed numeric characters only. * Required during settlement request with Visa or Mastercard for integration with TSYS processor
     */
    private ?string $customerServicePhone = null;
    /**
     * The lodging property location's phone number. Allowed numeric characters only. * Required during settlement requests with Mastercard for integration with TSYS processor
     */
    private ?string $propertyLocalPhone = null;
    /**
     * Indicates if the reservation includes additional ancillary charges.
     */
    private array $extraCharges = [];
    /**
     * The nightly rate for one room at the lodging property. * Required during settlement request with Amex for integration with TSYS processor
     */
    private ?int $roomRate = null;
    private ?string $programCode = null;
    /**
     * The total number of nights the room is booked for. * Required during authorization request with Visa for integration with TSYS processor * Required during settlement request with Amex for integration with TSYS processor
     */
    private ?int $numberOfNights = null;
    /**
     * Identifies that the facility complies with the Hotel and Motel Fire Safety Act of 1990. Possible values: - true - false
     */
    private ?bool $isFireSafetyActCompliant = null;

    /**
     * Builder function for hotelFolioNumber
     *
     * @param string $hotelFolioNumber
     *
     * @return $this
     */
    public function hotelFolioNumber(?string $hotelFolioNumber): self
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
    public function setHotelFolioNumber(?string $hotelFolioNumber): void
    {
        $this->hotelFolioNumber = $hotelFolioNumber;
    }

    /**
     * Getter function for hotelFolioNumber
     *
     * @return ?string
     */
    public function getHotelFolioNumber(): ?string
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
    public function checkInDate(?string $checkInDate): self
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
    public function setCheckInDate(?string $checkInDate): void
    {
        $this->checkInDate = $checkInDate;
    }

    /**
     * Getter function for checkInDate
     *
     * @return ?string
     */
    public function getCheckInDate(): ?string
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
    public function checkOutDate(?string $checkOutDate): self
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
    public function setCheckOutDate(?string $checkOutDate): void
    {
        $this->checkOutDate = $checkOutDate;
    }

    /**
     * Getter function for checkOutDate
     *
     * @return ?string
     */
    public function getCheckOutDate(): ?string
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
     * Builder function for propertyLocalPhone
     *
     * @param string $propertyLocalPhone
     *
     * @return $this
     */
    public function propertyLocalPhone(?string $propertyLocalPhone): self
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
    public function setPropertyLocalPhone(?string $propertyLocalPhone): void
    {
        $this->propertyLocalPhone = $propertyLocalPhone;
    }

    /**
     * Getter function for propertyLocalPhone
     *
     * @return ?string
     */
    public function getPropertyLocalPhone(): ?string
    {
        return $this->propertyLocalPhone;
    }
    /**
     * Builder function for extraCharges
     *
     * @param ExtraChargesType[] $extraCharges
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
     * @param ExtraChargesType[] $extraCharges
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
     * @return ExtraChargesType[]
     */
    public function getExtraCharges(): array
    {
        return $this->extraCharges ?? [];
    }
    /**
     * Builder function for roomRate
     *
     * @param int $roomRate
     *
     * @return $this
     */
    public function roomRate(?int $roomRate): self
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
    public function setRoomRate(?int $roomRate): void
    {
        $this->roomRate = $roomRate;
    }

    /**
     * Getter function for roomRate
     *
     * @return ?int
     */
    public function getRoomRate(): ?int
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
    public function programCode(?string $programCode): self
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
    public function setProgramCode(?string $programCode): void
    {
        $this->programCode = $programCode;
    }

    /**
     * Getter function for programCode
     *
     * @return ?string
     */
    public function getProgramCode(): ?string
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
    public function numberOfNights(?int $numberOfNights): self
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
    public function setNumberOfNights(?int $numberOfNights): void
    {
        $this->numberOfNights = $numberOfNights;
    }

    /**
     * Getter function for numberOfNights
     *
     * @return ?int
     */
    public function getNumberOfNights(): ?int
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
    public function isFireSafetyActCompliant(?bool $isFireSafetyActCompliant): self
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
    public function setIsFireSafetyActCompliant(?bool $isFireSafetyActCompliant): void
    {
        $this->isFireSafetyActCompliant = $isFireSafetyActCompliant;
    }

    /**
     * Getter function for isFireSafetyActCompliant
     *
     * @return ?bool
     */
    public function getIsFireSafetyActCompliant(): ?bool
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
            . "    hotelFolioNumber: " . $this->toIndentedString($this->hotelFolioNumber ?? null) . PHP_EOL
            . "    checkInDate: " . $this->toIndentedString($this->checkInDate ?? null) . PHP_EOL
            . "    checkOutDate: " . $this->toIndentedString($this->checkOutDate ?? null) . PHP_EOL
            . "    customerServicePhone: " . $this->toIndentedString($this->customerServicePhone ?? null) . PHP_EOL
            . "    propertyLocalPhone: " . $this->toIndentedString($this->propertyLocalPhone ?? null) . PHP_EOL
            . "    extraCharges: " . $this->toIndentedString($this->extraCharges ?? null) . PHP_EOL
            . "    roomRate: " . $this->toIndentedString($this->roomRate ?? null) . PHP_EOL
            . "    programCode: " . $this->toIndentedString($this->programCode ?? null) . PHP_EOL
            . "    numberOfNights: " . $this->toIndentedString($this->numberOfNights ?? null) . PHP_EOL
            . "    isFireSafetyActCompliant: " . $this->toIndentedString($this->isFireSafetyActCompliant ?? null) . PHP_EOL
            . "}";
    }
}
