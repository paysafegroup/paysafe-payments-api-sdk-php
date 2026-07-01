<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Card\Threeds;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * Order details for 3DS authentication
 */
class OrderItemDetails extends BaseModel
{
    /**
     * For a pre-ordered purchase, this is the date that the merchandise is expected to be available
     */
    private ?string $preOrderItemAvailabilityDate = null;
    private ?string $preOrderPurchaseIndicator = null;
    private ?string $reorderItemsIndicator = null;
    private ?string $shippingIndicator = null;

    /**
     * Builder function for preOrderItemAvailabilityDate
     *
     * @param string $preOrderItemAvailabilityDate
     *
     * @return $this
     */
    public function preOrderItemAvailabilityDate(?string $preOrderItemAvailabilityDate): self
    {
        $this->setPreOrderItemAvailabilityDate($preOrderItemAvailabilityDate);

        return $this;
    }

    /**
     * Setter function for preOrderItemAvailabilityDate
     *
     * @param string $preOrderItemAvailabilityDate
     *
     * @return void
     */
    public function setPreOrderItemAvailabilityDate(?string $preOrderItemAvailabilityDate): void
    {
        $this->preOrderItemAvailabilityDate = $preOrderItemAvailabilityDate;
    }

    /**
     * Getter function for preOrderItemAvailabilityDate
     *
     * @return ?string
     */
    public function getPreOrderItemAvailabilityDate(): ?string
    {
        return $this->preOrderItemAvailabilityDate;
    }
    /**
     * Builder function for preOrderPurchaseIndicator
     *
     * @param string $preOrderPurchaseIndicator
     *
     * @return $this
     */
    public function preOrderPurchaseIndicator(?string $preOrderPurchaseIndicator): self
    {
        $this->setPreOrderPurchaseIndicator($preOrderPurchaseIndicator);

        return $this;
    }

    /**
     * Setter function for preOrderPurchaseIndicator
     *
     * @param string $preOrderPurchaseIndicator
     *
     * @return void
     */
    public function setPreOrderPurchaseIndicator(?string $preOrderPurchaseIndicator): void
    {
        $this->preOrderPurchaseIndicator = $preOrderPurchaseIndicator;
    }

    /**
     * Getter function for preOrderPurchaseIndicator
     *
     * @return ?string
     */
    public function getPreOrderPurchaseIndicator(): ?string
    {
        return $this->preOrderPurchaseIndicator;
    }
    /**
     * Builder function for reorderItemsIndicator
     *
     * @param string $reorderItemsIndicator
     *
     * @return $this
     */
    public function reorderItemsIndicator(?string $reorderItemsIndicator): self
    {
        $this->setReorderItemsIndicator($reorderItemsIndicator);

        return $this;
    }

    /**
     * Setter function for reorderItemsIndicator
     *
     * @param string $reorderItemsIndicator
     *
     * @return void
     */
    public function setReorderItemsIndicator(?string $reorderItemsIndicator): void
    {
        $this->reorderItemsIndicator = $reorderItemsIndicator;
    }

    /**
     * Getter function for reorderItemsIndicator
     *
     * @return ?string
     */
    public function getReorderItemsIndicator(): ?string
    {
        return $this->reorderItemsIndicator;
    }
    /**
     * Builder function for shippingIndicator
     *
     * @param string $shippingIndicator
     *
     * @return $this
     */
    public function shippingIndicator(?string $shippingIndicator): self
    {
        $this->setShippingIndicator($shippingIndicator);

        return $this;
    }

    /**
     * Setter function for shippingIndicator
     *
     * @param string $shippingIndicator
     *
     * @return void
     */
    public function setShippingIndicator(?string $shippingIndicator): void
    {
        $this->shippingIndicator = $shippingIndicator;
    }

    /**
     * Getter function for shippingIndicator
     *
     * @return ?string
     */
    public function getShippingIndicator(): ?string
    {
        return $this->shippingIndicator;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class OrderItemDetails {" . PHP_EOL
            . "    preOrderItemAvailabilityDate: " . $this->toIndentedString($this->preOrderItemAvailabilityDate ?? null) . PHP_EOL
            . "    preOrderPurchaseIndicator: " . $this->toIndentedString($this->preOrderPurchaseIndicator ?? null) . PHP_EOL
            . "    reorderItemsIndicator: " . $this->toIndentedString($this->reorderItemsIndicator ?? null) . PHP_EOL
            . "    shippingIndicator: " . $this->toIndentedString($this->shippingIndicator ?? null) . PHP_EOL
            . "}";
    }
}
