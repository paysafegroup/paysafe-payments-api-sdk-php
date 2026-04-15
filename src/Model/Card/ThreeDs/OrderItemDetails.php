<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card\ThreeDs;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * Order details
 *
 * - preOrderItemAvailabilityDate:
 * For a pre-ordered purchase, this is the date that the merchandise is expected to be available.
 *   The ISO 8601 date format is expected, i.e., YYYY-MM-DD.
 * - preOrderPurchaseIndicator: Indicates whether the cardholder is placing an order
 *   for available merchandise or merchandise
 *   with a future availability or release date. Allowed values: MERCHANDISE_AVAILABLE, FUTURE_AVAILABILITY
 * - reorderItemsIndicator: Indicates whether the cardholder is reordering merchandise.
 *      Allowed values: FIRST_TIME_ORDER, REORDER
 * - shippingIndicator: This is the shipping method for the transaction.
 *      See ShippingIndicator enum for list of possible values. Example: 2024
 */
class OrderItemDetails extends BaseModel
{
	const PRE_ORDER_PURCHASE_INDICATOR_MERCHANDISE_AVAILABLE = 'MERCHANDISE_AVAILABLE';
	const PRE_ORDER_PURCHASE_INDICATOR_FUTURE_AVAILABILITY = 'FUTURE_AVAILABILITY';

	const REORDER_ITEMS_INDICATOR_FIRST_TIME_ORDER = 'FIRST_TIME_ORDER';
	const REORDER_ITEMS_INDICATOR_REORDER = 'REORDER';

	const SHIPPING_INDICATOR_SHIP_TO_BILLING_ADDRESS = 'SHIP_TO_BILLING_ADDRESS';
	const SHIPPING_INDICATOR_SHIP_TO_VERIFIED_ADDRESS = 'SHIP_TO_VERIFIED_ADDRESS';
	const SHIPPING_INDICATOR_SHIP_TO_DIFFERENT_ADDRESS = 'SHIP_TO_DIFFERENT_ADDRESS';
	const SHIPPING_INDICATOR_SHIP_TO_STORE = 'SHIP_TO_STORE';
	const SHIPPING_INDICATOR_DIGITAL_GOODS = 'DIGITAL_GOODS';
	const SHIPPING_INDICATOR_TRAVEL_AND_EVENT_TICKETS = 'TRAVEL_AND_EVENT_TICKETS';
	const SHIPPING_INDICATOR_OTHER = 'OTHER';

	/**
	 * For a pre-ordered purchase, this is the date that the merchandise is expected to be available.
     * The ISO 8601 date format is expected, i.e., YYYY-MM-DD.
	 */
	private string $preOrderItemAvailabilityDate;

	/**
	 * This indicates whether the cardholder is placing an order for available merchandise
     * or merchandise with a future availability or release date.
	 */
	private string $preOrderPurchaseIndicator;

	/**
	 * This indicates whether the cardholder is reordering merchandise.
	 */
	private string $reorderItemsIndicator;

	/**
	 * This is the shipping method for the transaction.
	 */
	private string $shippingIndicator;


	/**
	 * Builder function for preOrderItemAvailabilityDate
	 *
	 * @param string $preOrderItemAvailabilityDate
	 *
	 * @return OrderItemDetails
	 */
	public function preOrderItemAvailabilityDate(string $preOrderItemAvailabilityDate): self
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
	public function setPreOrderItemAvailabilityDate(string $preOrderItemAvailabilityDate): void
	{
		$this->preOrderItemAvailabilityDate = $preOrderItemAvailabilityDate;
	}
	/**
	 * Getter function for preOrderItemAvailabilityDate
	 *
	 * @return string
	 */
	public function getPreOrderItemAvailabilityDate(): string
	{
		return $this->preOrderItemAvailabilityDate;
	}

	/**
	 * Builder function for preOrderPurchaseIndicator
	 *
	 * @param string $preOrderPurchaseIndicator
	 *
	 * @return OrderItemDetails
	 */
	public function preOrderPurchaseIndicator(string $preOrderPurchaseIndicator): self
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
	public function setPreOrderPurchaseIndicator(string $preOrderPurchaseIndicator): void
	{
		$this->preOrderPurchaseIndicator = $preOrderPurchaseIndicator;
	}
	/**
	 * Getter function for preOrderPurchaseIndicator
	 *
	 * @return string
	 */
	public function getPreOrderPurchaseIndicator(): string
	{
		return $this->preOrderPurchaseIndicator;
	}

	/**
	 * Builder function for reorderItemsIndicator
	 *
	 * @param string $reorderItemsIndicator
	 *
	 * @return OrderItemDetails
	 */
	public function reorderItemsIndicator(string $reorderItemsIndicator): self
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
	public function setReorderItemsIndicator(string $reorderItemsIndicator): void
	{
		$this->reorderItemsIndicator = $reorderItemsIndicator;
	}
	/**
	 * Getter function for reorderItemsIndicator
	 *
	 * @return string
	 */
	public function getReorderItemsIndicator(): string
	{
		return $this->reorderItemsIndicator;
	}

	/**
	 * Builder function for shippingIndicator
	 *
	 * @param string $shippingIndicator
	 *
	 * @return OrderItemDetails
	 */
	public function shippingIndicator(string $shippingIndicator): self
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
	public function setShippingIndicator(string $shippingIndicator): void
	{
		$this->shippingIndicator = $shippingIndicator;
	}
	/**
	 * Getter function for shippingIndicator
	 *
	 * @return string
	 */
	public function getShippingIndicator(): string
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
		return "class OrderItemDetails {" . PHP_EOL .
			"	preOrderItemAvailabilityDate: " . $this->toIndentedString($this->preOrderItemAvailabilityDate) . PHP_EOL .
			"	preOrderPurchaseIndicator: " . $this->toIndentedString($this->preOrderPurchaseIndicator) . PHP_EOL .
			"	reorderItemsIndicator: " . $this->toIndentedString($this->reorderItemsIndicator) . PHP_EOL .
			"	shippingIndicator: " . $this->toIndentedString($this->shippingIndicator) . PHP_EOL .
		"}";
	}
}
