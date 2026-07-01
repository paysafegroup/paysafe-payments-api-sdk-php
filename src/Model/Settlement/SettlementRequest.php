<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Settlement;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Common\Travel\Airline\AirlineTravelDetails;
use Paysafe\PhpSdk\Model\Common\Travel\CarRental\CarRentalDetails;
use Paysafe\PhpSdk\Model\Common\Travel\Cruise\CruiselineTravelDetails;
use Paysafe\PhpSdk\Model\Common\Travel\Lodging\LodgingDetails;
use Paysafe\PhpSdk\Model\Lpm\Splitpay;


/**
 * A Settlement request allows you to settle a previous authorization that was not settled in the original Purchase request (i.e., where settleWithAuth was set to false). <ul>   <li>A regular Settlement, where the initial request was an Authorization that is to be settled.</li>   <li>A Settlement that is split into multiple merchant accounts. This is applicable for those merchants whose accounts are configured to do so.</li>   <li>A Settlement for the authorization with the full airline travel details for the AIRLINE Merchants.</li> </ul>
 */
class SettlementRequest extends BaseModel
{
    /**
     * This is the merchant reference number created by the merchant and submitted as part of the request. It must be unique for each request.
     */
    private ?string $merchantRefNum = null;
    /**
     * This is the amount of the request, in minor units.For example, to process US $10.99, this value should be 1099. Maximum: 99999999999
     */
    private ?int $amount = null;
    /**
     * This validates that this request is not a duplicate. A request is considered a duplicate if the merchantRefNum has already been used in a previous request within the past 90 days. **Note:** This value defaults to true
     */
    private ?bool $dupCheck = null;
    /**
     * Get splitpay
     */
    private array $splitpay = [];
    private ?AirlineTravelDetails $airlineTravelDetails = null;
    private ?CruiselineTravelDetails $cruiselineTravelDetails = null;
    private ?LodgingDetails $lodgingDetails = null;
    private ?CarRentalDetails $carRentalDetails = null;

    /**
     * Builder function for merchantRefNum
     *
     * @param string $merchantRefNum
     *
     * @return $this
     */
    public function merchantRefNum(?string $merchantRefNum): self
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
    public function setMerchantRefNum(?string $merchantRefNum): void
    {
        $this->merchantRefNum = $merchantRefNum;
    }

    /**
     * Getter function for merchantRefNum
     *
     * @return ?string
     */
    public function getMerchantRefNum(): ?string
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
    public function amount(?int $amount): self
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
    public function setAmount(?int $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * Getter function for amount
     *
     * @return ?int
     */
    public function getAmount(): ?int
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
    public function dupCheck(?bool $dupCheck): self
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
    public function setDupCheck(?bool $dupCheck): void
    {
        $this->dupCheck = $dupCheck;
    }

    /**
     * Getter function for dupCheck
     *
     * @return ?bool
     */
    public function getDupCheck(): ?bool
    {
        return $this->dupCheck;
    }
    /**
     * Builder function for splitpay
     *
     * @param Splitpay[] $splitpay
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
     * @param Splitpay[] $splitpay
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
     * @return Splitpay[]
     */
    public function getSplitpay(): array
    {
        return $this->splitpay ?? [];
    }
    /**
     * Builder function for airlineTravelDetails
     *
     * @param AirlineTravelDetails $airlineTravelDetails
     *
     * @return $this
     */
    public function airlineTravelDetails(?AirlineTravelDetails $airlineTravelDetails): self
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
    public function setAirlineTravelDetails(?AirlineTravelDetails $airlineTravelDetails): void
    {
        $this->airlineTravelDetails = $airlineTravelDetails;
    }

    /**
     * Getter function for airlineTravelDetails
     *
     * @return ?AirlineTravelDetails
     */
    public function getAirlineTravelDetails(): ?AirlineTravelDetails
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
    public function cruiselineTravelDetails(?CruiselineTravelDetails $cruiselineTravelDetails): self
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
    public function setCruiselineTravelDetails(?CruiselineTravelDetails $cruiselineTravelDetails): void
    {
        $this->cruiselineTravelDetails = $cruiselineTravelDetails;
    }

    /**
     * Getter function for cruiselineTravelDetails
     *
     * @return ?CruiselineTravelDetails
     */
    public function getCruiselineTravelDetails(): ?CruiselineTravelDetails
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
    public function lodgingDetails(?LodgingDetails $lodgingDetails): self
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
    public function setLodgingDetails(?LodgingDetails $lodgingDetails): void
    {
        $this->lodgingDetails = $lodgingDetails;
    }

    /**
     * Getter function for lodgingDetails
     *
     * @return ?LodgingDetails
     */
    public function getLodgingDetails(): ?LodgingDetails
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
    public function carRentalDetails(?CarRentalDetails $carRentalDetails): self
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
    public function setCarRentalDetails(?CarRentalDetails $carRentalDetails): void
    {
        $this->carRentalDetails = $carRentalDetails;
    }

    /**
     * Getter function for carRentalDetails
     *
     * @return ?CarRentalDetails
     */
    public function getCarRentalDetails(): ?CarRentalDetails
    {
        return $this->carRentalDetails;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class SettlementRequest {" . PHP_EOL
            . "    merchantRefNum: " . $this->toIndentedString($this->merchantRefNum ?? null) . PHP_EOL
            . "    amount: " . $this->toIndentedString($this->amount ?? null) . PHP_EOL
            . "    dupCheck: " . $this->toIndentedString($this->dupCheck ?? null) . PHP_EOL
            . "    splitpay: " . $this->toIndentedString($this->splitpay ?? null) . PHP_EOL
            . "    airlineTravelDetails: " . $this->toIndentedString($this->airlineTravelDetails ?? null) . PHP_EOL
            . "    cruiselineTravelDetails: " . $this->toIndentedString($this->cruiselineTravelDetails ?? null) . PHP_EOL
            . "    lodgingDetails: " . $this->toIndentedString($this->lodgingDetails ?? null) . PHP_EOL
            . "    carRentalDetails: " . $this->toIndentedString($this->carRentalDetails ?? null) . PHP_EOL
            . "}";
    }
    private ?array $additionalParameters = null;

    /**
     * This map holds additional parameters for features not yet available in this library.
     * Each key-value pair is serialized as a top-level field in the request/response.
     *
     * @return array|null
     */
    public function getAdditionalParameters(): ?array
    {
        return $this->additionalParameters;
    }

    public function setAdditionalParameters(array $additionalParameters): void
    {
        $this->additionalParameters = $additionalParameters;
    }

    public function addAdditionalParameter(string $key, $value): self
    {
        if ($this->additionalParameters === null) {
            $this->additionalParameters = [];
        }
        $this->additionalParameters[$key] = $value;
        return $this;
    }


}
