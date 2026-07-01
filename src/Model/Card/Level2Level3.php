<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Card;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * Level 2 and Level 3 (L2/L3) credit card processing refers to certain B2B card transactions for which the merchant might be eligible for lower credit card interchange rates. The lower rates may be available for merchants who provide more detailed information when processing card-not-present transactions. In order to be eligible for L2/L3 transactions:  - Your merchant account must be properly configured by Paysafe.  - The BIN of the credit card used for the transaction must be eligible – typically, these are government-issued credit cards.  **Note:** Not all processing gateways support this parameter. Contact your account manager for more information.
 */
class Level2Level3 extends BaseModel
{
    /**
     * This indicates whether or not local tax is exempted for the request. If set to true, then the  localTaxAmount parameter will be ignored. **Note:** This value defaults to false
     */
    private ?bool $exemptLocalTax = null;
    /**
     * This is the local sales tax applied to the purchase, in minor units
     */
    private ?int $localTaxAmount = null;
    /**
     * This is the national tax included in the transaction amount, in minor units
     */
    private ?int $nationalTaxAmount = null;
    /**
     * This is the freight or shipping cost included in the transaction amount, in minor units
     */
    private ?int $freightAmount = null;
    /**
     * This is the duty associated with the import of the purchased goods, in minor units
     */
    private ?int $dutyAmount = null;
    /**
     * This is the postal/zip code of the address to which the purchased goods will be delivered. This field can be identical to the shipFromZip if the customer is present and takes immediate possession of the goods
     */
    private ?string $destinationZip = null;
    /**
     * This is the country to which the goods are being shipped
     */
    private ?string $destinationCountry = null;
    /**
     * This is the postal/zip code of the address from which the purchased goods are being shipped
     */
    private ?string $shipFromZip = null;
    private ?LineItems $lineItems = null;

    /**
     * Builder function for exemptLocalTax
     *
     * @param bool $exemptLocalTax
     *
     * @return $this
     */
    public function exemptLocalTax(?bool $exemptLocalTax): self
    {
        $this->setExemptLocalTax($exemptLocalTax);

        return $this;
    }

    /**
     * Setter function for exemptLocalTax
     *
     * @param bool $exemptLocalTax
     *
     * @return void
     */
    public function setExemptLocalTax(?bool $exemptLocalTax): void
    {
        $this->exemptLocalTax = $exemptLocalTax;
    }

    /**
     * Getter function for exemptLocalTax
     *
     * @return ?bool
     */
    public function getExemptLocalTax(): ?bool
    {
        return $this->exemptLocalTax;
    }
    /**
     * Builder function for localTaxAmount
     *
     * @param int $localTaxAmount
     *
     * @return $this
     */
    public function localTaxAmount(?int $localTaxAmount): self
    {
        $this->setLocalTaxAmount($localTaxAmount);

        return $this;
    }

    /**
     * Setter function for localTaxAmount
     *
     * @param int $localTaxAmount
     *
     * @return void
     */
    public function setLocalTaxAmount(?int $localTaxAmount): void
    {
        $this->localTaxAmount = $localTaxAmount;
    }

    /**
     * Getter function for localTaxAmount
     *
     * @return ?int
     */
    public function getLocalTaxAmount(): ?int
    {
        return $this->localTaxAmount;
    }
    /**
     * Builder function for nationalTaxAmount
     *
     * @param int $nationalTaxAmount
     *
     * @return $this
     */
    public function nationalTaxAmount(?int $nationalTaxAmount): self
    {
        $this->setNationalTaxAmount($nationalTaxAmount);

        return $this;
    }

    /**
     * Setter function for nationalTaxAmount
     *
     * @param int $nationalTaxAmount
     *
     * @return void
     */
    public function setNationalTaxAmount(?int $nationalTaxAmount): void
    {
        $this->nationalTaxAmount = $nationalTaxAmount;
    }

    /**
     * Getter function for nationalTaxAmount
     *
     * @return ?int
     */
    public function getNationalTaxAmount(): ?int
    {
        return $this->nationalTaxAmount;
    }
    /**
     * Builder function for freightAmount
     *
     * @param int $freightAmount
     *
     * @return $this
     */
    public function freightAmount(?int $freightAmount): self
    {
        $this->setFreightAmount($freightAmount);

        return $this;
    }

    /**
     * Setter function for freightAmount
     *
     * @param int $freightAmount
     *
     * @return void
     */
    public function setFreightAmount(?int $freightAmount): void
    {
        $this->freightAmount = $freightAmount;
    }

    /**
     * Getter function for freightAmount
     *
     * @return ?int
     */
    public function getFreightAmount(): ?int
    {
        return $this->freightAmount;
    }
    /**
     * Builder function for dutyAmount
     *
     * @param int $dutyAmount
     *
     * @return $this
     */
    public function dutyAmount(?int $dutyAmount): self
    {
        $this->setDutyAmount($dutyAmount);

        return $this;
    }

    /**
     * Setter function for dutyAmount
     *
     * @param int $dutyAmount
     *
     * @return void
     */
    public function setDutyAmount(?int $dutyAmount): void
    {
        $this->dutyAmount = $dutyAmount;
    }

    /**
     * Getter function for dutyAmount
     *
     * @return ?int
     */
    public function getDutyAmount(): ?int
    {
        return $this->dutyAmount;
    }
    /**
     * Builder function for destinationZip
     *
     * @param string $destinationZip
     *
     * @return $this
     */
    public function destinationZip(?string $destinationZip): self
    {
        $this->setDestinationZip($destinationZip);

        return $this;
    }

    /**
     * Setter function for destinationZip
     *
     * @param string $destinationZip
     *
     * @return void
     */
    public function setDestinationZip(?string $destinationZip): void
    {
        $this->destinationZip = $destinationZip;
    }

    /**
     * Getter function for destinationZip
     *
     * @return ?string
     */
    public function getDestinationZip(): ?string
    {
        return $this->destinationZip;
    }
    /**
     * Builder function for destinationCountry
     *
     * @param string $destinationCountry
     *
     * @return $this
     */
    public function destinationCountry(?string $destinationCountry): self
    {
        $this->setDestinationCountry($destinationCountry);

        return $this;
    }

    /**
     * Setter function for destinationCountry
     *
     * @param string $destinationCountry
     *
     * @return void
     */
    public function setDestinationCountry(?string $destinationCountry): void
    {
        $this->destinationCountry = $destinationCountry;
    }

    /**
     * Getter function for destinationCountry
     *
     * @return ?string
     */
    public function getDestinationCountry(): ?string
    {
        return $this->destinationCountry;
    }
    /**
     * Builder function for shipFromZip
     *
     * @param string $shipFromZip
     *
     * @return $this
     */
    public function shipFromZip(?string $shipFromZip): self
    {
        $this->setShipFromZip($shipFromZip);

        return $this;
    }

    /**
     * Setter function for shipFromZip
     *
     * @param string $shipFromZip
     *
     * @return void
     */
    public function setShipFromZip(?string $shipFromZip): void
    {
        $this->shipFromZip = $shipFromZip;
    }

    /**
     * Getter function for shipFromZip
     *
     * @return ?string
     */
    public function getShipFromZip(): ?string
    {
        return $this->shipFromZip;
    }
    /**
     * Builder function for lineItems
     *
     * @param LineItems $lineItems
     *
     * @return $this
     */
    public function lineItems(?LineItems $lineItems): self
    {
        $this->setLineItems($lineItems);

        return $this;
    }

    /**
     * Setter function for lineItems
     *
     * @param LineItems $lineItems
     *
     * @return void
     */
    public function setLineItems(?LineItems $lineItems): void
    {
        $this->lineItems = $lineItems;
    }

    /**
     * Getter function for lineItems
     *
     * @return ?LineItems
     */
    public function getLineItems(): ?LineItems
    {
        return $this->lineItems;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class Level2Level3 {" . PHP_EOL
            . "    exemptLocalTax: " . $this->toIndentedString($this->exemptLocalTax ?? null) . PHP_EOL
            . "    localTaxAmount: " . $this->toIndentedString($this->localTaxAmount ?? null) . PHP_EOL
            . "    nationalTaxAmount: " . $this->toIndentedString($this->nationalTaxAmount ?? null) . PHP_EOL
            . "    freightAmount: " . $this->toIndentedString($this->freightAmount ?? null) . PHP_EOL
            . "    dutyAmount: " . $this->toIndentedString($this->dutyAmount ?? null) . PHP_EOL
            . "    destinationZip: " . $this->toIndentedString($this->destinationZip ?? null) . PHP_EOL
            . "    destinationCountry: " . $this->toIndentedString($this->destinationCountry ?? null) . PHP_EOL
            . "    shipFromZip: " . $this->toIndentedString($this->shipFromZip ?? null) . PHP_EOL
            . "    lineItems: " . $this->toIndentedString($this->lineItems ?? null) . PHP_EOL
            . "}";
    }
}
