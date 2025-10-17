<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Settlement;

use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Common\Travel\Airline\AirlineTravelDetails;
use Paysafe\PhpSdk\Model\Common\Travel\Carrental\CarRentalDetails;
use Paysafe\PhpSdk\Model\Common\Travel\Cruise\CruiselineTravelDetails;
use Paysafe\PhpSdk\Model\Common\Travel\Lodging\LodgingDetails;
use Paysafe\PhpSdk\Model\Lpm\Splitpay;

class SettlementRequest extends BaseModel
{
    private string $merchantRefNum;
    private int $amount;
    private bool $dupCheck;
    private array $splitpay;
    private AirlineTravelDetails $airlineTravelDetails;
    private CruiselineTravelDetails $cruiselineTravelDetails;
    private LodgingDetails $lodgingDetails;
    private CarRentalDetails $carRentalDetails;
    private array $additionalParameters;


    /**
     * Builder function for merchantRefNum
     *
     * @param string $merchantRefNum
     *
     * @return $this
     */
    public function merchantRefNum(string $merchantRefNum): self
    {
        $this->setMerchantRefNum($merchantRefNum);

        return $this;
    }

    /**
     * Setter function for merchantRefNum
     *
     * @param string $merchantRefNum
     *
     * @return void
     */
    public function setMerchantRefNum(string $merchantRefNum): void
    {
        $this->merchantRefNum = $merchantRefNum;
    }

    /**
     * Getter function for merchantRefNum
     *
     * @return string
     */
    public function getMerchantRefNum(): string
    {
        return $this->merchantRefNum;
    }

    /**
     * Builder function for amount
     *
     * @param int $amount
     *
     * @return $this
     */
    public function amount(int $amount): self
    {
        $this->setAmount($amount);

        return $this;
    }

    /**
     * Setter function for amount
     *
     * @param int $amount
     *
     * @return void
     */
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * Getter function for amount
     *
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * Builder function for dupCheck
     *
     * @param bool $dupCheck
     *
     * @return $this
     */
    public function dupCheck(bool $dupCheck): self
    {
        $this->setDupCheck($dupCheck);

        return $this;
    }

    /**
     * Setter function for dupCheck
     *
     * @param bool $dupCheck
     *
     * @return void
     */
    public function setDupCheck(bool $dupCheck): void
    {
        $this->dupCheck = $dupCheck;
    }

    /**
     * Getter function for dupCheck
     *
     * @return bool
     */
    public function getDupCheck(): bool
    {
        return $this->dupCheck ?? false;
    }

    /**
     * Builder function for splitpay
     *
     * @param array $splitpay
     *
     * @return $this
     */
    public function splitpay(array $splitpay): self
    {
        $this->setSplitpay($splitpay);

        return $this;
    }

    /**
     * Setter function for splitpay
     *
     * @param array $splitpay
     *
     * @return void
     */
    public function setSplitpay(array $splitpay): void
    {
        $this->splitpay = $splitpay;
    }

    /**
     * Getter function for splitpay
     *
     * @return array
     */
    public function getSplitpay(): array
    {
        return $this->splitpay;
    }


    /**
     * Add a new splitpay Item
     *
     * @param Splitpay $splitpayItem
     *
     * @return $this
     */
    public function addSplitpayItem(Splitpay $splitpayItem): self
    {
        $this->splitpay[] = $splitpayItem;

        return $this;
    }

    /**
     * Remove a splitpay item
     *
     * @param Splitpay $splitpayItem
     *
     * @return $this
     */
    public function removeSplitpayItem(Splitpay $splitpayItem): self
    {
        $this->setSplitpay(array_diff($this->getSplitpay(), [$splitpayItem]));

        return $this;
    }

    /**
     * Builder function for airlineTravelDetails
     *
     * @param AirlineTravelDetails $airlineTravelDetails
     *
     * @return $this
     */
    public function airlineTravelDetails(AirlineTravelDetails $airlineTravelDetails): self
    {
        $this->setAirlineTravelDetails($airlineTravelDetails);

        return $this;
    }

    /**
     * Setter function for airlineTravelDetails
     *
     * @param AirlineTravelDetails $airlineTravelDetails
     *
     * @return void
     */
    public function setAirlineTravelDetails(AirlineTravelDetails $airlineTravelDetails): void
    {
        $this->airlineTravelDetails = $airlineTravelDetails;
    }

    /**
     * Getter function for airlineTravelDetails
     *
     * @return AirlineTravelDetails
     */
    public function getAirlineTravelDetails(): AirlineTravelDetails
    {
        return $this->airlineTravelDetails;
    }

    /**
     * Builder function for cruiselineTravelDetails
     *
     * @param CruiselineTravelDetails $cruiselineTravelDetails
     *
     * @return $this
     */
    public function cruiselineTravelDetails(CruiselineTravelDetails $cruiselineTravelDetails): self
    {
        $this->setCruiselineTravelDetails($cruiselineTravelDetails);

        return $this;
    }

    /**
     * Setter function for cruiselineTravelDetails
     *
     * @param CruiselineTravelDetails $cruiselineTravelDetails
     *
     * @return void
     */
    public function setCruiselineTravelDetails(CruiselineTravelDetails $cruiselineTravelDetails): void
    {
        $this->cruiselineTravelDetails = $cruiselineTravelDetails;
    }

    /**
     * Getter function for cruiselineTravelDetails
     *
     * @return CruiselineTravelDetails
     */
    public function getCruiselineTravelDetails(): CruiselineTravelDetails
    {
        return $this->cruiselineTravelDetails;
    }

    /**
     * Builder function for lodgingDetails
     *
     * @param LodgingDetails $lodgingDetails
     *
     * @return $this
     */
    public function lodgingDetails(LodgingDetails $lodgingDetails): self
    {
        $this->setLodgingDetails($lodgingDetails);

        return $this;
    }

    /**
     * Setter function for lodgingDetails
     *
     * @param LodgingDetails $lodgingDetails
     *
     * @return void
     */
    public function setLodgingDetails(LodgingDetails $lodgingDetails): void
    {
        $this->lodgingDetails = $lodgingDetails;
    }

    /**
     * Getter function for lodgingDetails
     *
     * @return LodgingDetails
     */
    public function getLodgingDetails(): LodgingDetails
    {
        return $this->lodgingDetails;
    }

    /**
     * Builder function for carRentalDetails
     *
     * @param CarRentalDetails $carRentalDetails
     *
     * @return $this
     */
    public function carRentalDetails(CarRentalDetails $carRentalDetails): self
    {
        $this->setCarRentalDetails($carRentalDetails);

        return $this;
    }

    /**
     * Setter function for carRentalDetails
     *
     * @param CarRentalDetails $carRentalDetails
     *
     * @return void
     */
    public function setCarRentalDetails(CarRentalDetails $carRentalDetails): void
    {
        $this->carRentalDetails = $carRentalDetails;
    }

    /**
     * Getter function for carRentalDetails
     *
     * @return CarRentalDetails
     */
    public function getCarRentalDetails(): CarRentalDetails
    {
        return $this->carRentalDetails;
    }

    /**
     * This map holds additional parameters that can be used for features not available in this client library.
     *  During serialization, each key-value pair is treated
     *  as if the key were a top-level field in the serialized object,
     *  i.e.
     * <code>
     *     {"merchantRefNum" : "uuid", "additionalParameter1" : 100, "additionalParameter2" : "string" }
     * </code> .
     *
     * @return array|null
     */
    public function getAdditionalParameters(): ?array
    {
        return $this->additionalParameters;
    }

    /**
     * Builder function for this Request
     *
     * @param array $additionalParameters
     *
     * @return $this
     */
    public function additionalParameters(array $additionalParameters): self
    {
        $this->setAdditionalParameters($additionalParameters);

        return $this;
    }

    /**
     * Set the additional parameters list
     *
     * @param array $additionalParameters
     *
     * @return void
     */
    public function setAdditionalParameters(array $additionalParameters): self
    {
        $this->additionalParameters = $additionalParameters;

        return $this;
    }

    /**
     * Add a new additional parameter
     *
     * @param string $key
     * @param object $value
     *
     * @return $this
     */
    public function addAdditionalParameter(string $key, object $value): self
    {
        if ($this->additionalParameters === null) {
            $this->additionalParameters = [];
        }

        $this->additionalParameters[$key] = $value;

        return $this;
    }

    /**
     * Add a new additional parameters to the list
     *
     * @param array $additionalParameters
     *
     * @return $this
     */
    public function addAdditionalParameters(array $additionalParameters): self
    {
        if ($this->additionalParameters === null) {
            $this->additionalParameters = [];
        }

        $this->additionalParameters = array_merge($this->additionalParameters, $additionalParameters);

        return $this;
    }

    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class SettlementRequest {" . PHP_EOL
            . "    merchantRefNum: " . $this->toIndentedString($this->merchantRefNum) . PHP_EOL
            . "    amount: " . $this->toIndentedString($this->amount) . PHP_EOL
            . "    dupCheck: " . $this->toIndentedString($this->dupCheck) . PHP_EOL
            . "    splitpay: " . $this->toIndentedString($this->splitpay) . PHP_EOL
            . "    airlineTravelDetails: " . $this->toIndentedString($this->airlineTravelDetails) . PHP_EOL
            . "    cruiselineTravelDetails: " . $this->toIndentedString($this->cruiselineTravelDetails) . PHP_EOL
            . "    lodgingDetails: " . $this->toIndentedString($this->lodgingDetails) . PHP_EOL
            . "    carRentalDetails: " . $this->toIndentedString($this->carRentalDetails) . PHP_EOL
            . "    additionalParameters: " . $this->toIndentedString($this->additionalParameters) . PHP_EOL
            . "}";
    }
}
