<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Card;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * This is more detailed information about the items that are being purchased for Level2Level3 merchants. This class is typically used for creating detailed receipts or invoices that include itemized purchases, taxes and total costs.
 */
class LineItems extends BaseModel
{
    /**
     * This is a description of the item(s) being purchased
     */
    private ?string $description = null;
    /**
     * This is the merchant-defined description code of the item being purchased.
     */
    private ?string $productCode = null;
    /**
     * This is the quantity of the item. Note - Max 4 decimals is allowed
     */
    private ?int $quantity = null;
    /**
     * This is the unit price of the item being purchased, in minor units. The currency will be based on the account setting
     */
    private ?int $unitAmount = null;
    /**
     * This is the tax rate used to calculate the tax amount. For example, if the tax rate is 10.5%, this value should be 10.5. Note - Max 2 decimals allowed
     */
    private ?int $taxRate = null;
    /**
     * This is the amount of any value-added taxes that can be associated with the purchased item, in minor units. The currency will be based on the account setting. Note - Our system will not validate the accuracy of this value. The merchant's application must calculate this value correctly
     */
    private ?int $taxAmount = null;
    /**
     * This is the total amount of the line item, typically calculated as price multiplied by quantity, in minor units. The currency is based on the account setting. Note - Our system will not validate the accuracy of this value. The merchant's application must calculate this value correctly
     */
    private ?int $totalAmount = null;

    /**
     * Builder function for description
     *
     * @param string $description
     *
     * @return $this
     */
    public function description(?string $description): self
    {
        $this->setDescription($description);

        return $this;
    }

    /**
     * Setter function for description
     *
     * @param string $description
     *
     * @return void
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * Getter function for description
     *
     * @return ?string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * Builder function for productCode
     *
     * @param string $productCode
     *
     * @return $this
     */
    public function productCode(?string $productCode): self
    {
        $this->setProductCode($productCode);

        return $this;
    }

    /**
     * Setter function for productCode
     *
     * @param string $productCode
     *
     * @return void
     */
    public function setProductCode(?string $productCode): void
    {
        $this->productCode = $productCode;
    }

    /**
     * Getter function for productCode
     *
     * @return ?string
     */
    public function getProductCode(): ?string
    {
        return $this->productCode;
    }
    /**
     * Builder function for quantity
     *
     * @param int $quantity
     *
     * @return $this
     */
    public function quantity(?int $quantity): self
    {
        $this->setQuantity($quantity);

        return $this;
    }

    /**
     * Setter function for quantity
     *
     * @param int $quantity
     *
     * @return void
     */
    public function setQuantity(?int $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * Getter function for quantity
     *
     * @return ?int
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }
    /**
     * Builder function for unitAmount
     *
     * @param int $unitAmount
     *
     * @return $this
     */
    public function unitAmount(?int $unitAmount): self
    {
        $this->setUnitAmount($unitAmount);

        return $this;
    }

    /**
     * Setter function for unitAmount
     *
     * @param int $unitAmount
     *
     * @return void
     */
    public function setUnitAmount(?int $unitAmount): void
    {
        $this->unitAmount = $unitAmount;
    }

    /**
     * Getter function for unitAmount
     *
     * @return ?int
     */
    public function getUnitAmount(): ?int
    {
        return $this->unitAmount;
    }
    /**
     * Builder function for taxRate
     *
     * @param int $taxRate
     *
     * @return $this
     */
    public function taxRate(?int $taxRate): self
    {
        $this->setTaxRate($taxRate);

        return $this;
    }

    /**
     * Setter function for taxRate
     *
     * @param int $taxRate
     *
     * @return void
     */
    public function setTaxRate(?int $taxRate): void
    {
        $this->taxRate = $taxRate;
    }

    /**
     * Getter function for taxRate
     *
     * @return ?int
     */
    public function getTaxRate(): ?int
    {
        return $this->taxRate;
    }
    /**
     * Builder function for taxAmount
     *
     * @param int $taxAmount
     *
     * @return $this
     */
    public function taxAmount(?int $taxAmount): self
    {
        $this->setTaxAmount($taxAmount);

        return $this;
    }

    /**
     * Setter function for taxAmount
     *
     * @param int $taxAmount
     *
     * @return void
     */
    public function setTaxAmount(?int $taxAmount): void
    {
        $this->taxAmount = $taxAmount;
    }

    /**
     * Getter function for taxAmount
     *
     * @return ?int
     */
    public function getTaxAmount(): ?int
    {
        return $this->taxAmount;
    }
    /**
     * Builder function for totalAmount
     *
     * @param int $totalAmount
     *
     * @return $this
     */
    public function totalAmount(?int $totalAmount): self
    {
        $this->setTotalAmount($totalAmount);

        return $this;
    }

    /**
     * Setter function for totalAmount
     *
     * @param int $totalAmount
     *
     * @return void
     */
    public function setTotalAmount(?int $totalAmount): void
    {
        $this->totalAmount = $totalAmount;
    }

    /**
     * Getter function for totalAmount
     *
     * @return ?int
     */
    public function getTotalAmount(): ?int
    {
        return $this->totalAmount;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class LineItems {" . PHP_EOL
            . "    description: " . $this->toIndentedString($this->description ?? null) . PHP_EOL
            . "    productCode: " . $this->toIndentedString($this->productCode ?? null) . PHP_EOL
            . "    quantity: " . $this->toIndentedString($this->quantity ?? null) . PHP_EOL
            . "    unitAmount: " . $this->toIndentedString($this->unitAmount ?? null) . PHP_EOL
            . "    taxRate: " . $this->toIndentedString($this->taxRate ?? null) . PHP_EOL
            . "    taxAmount: " . $this->toIndentedString($this->taxAmount ?? null) . PHP_EOL
            . "    totalAmount: " . $this->toIndentedString($this->totalAmount ?? null) . PHP_EOL
            . "}";
    }
}
