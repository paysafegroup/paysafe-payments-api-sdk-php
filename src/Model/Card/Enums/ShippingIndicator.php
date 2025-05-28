<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card\Enums;

/**
 * This is the shipping method for the transaction.
 */
class ShippingIndicator
{
	const SHIP_TO_BILLING_ADDRESS = "SHIP_TO_BILLING_ADDRESS";
	const SHIP_TO_VERIFIED_ADDRESS = "SHIP_TO_VERIFIED_ADDRESS";
	const SHIP_TO_DIFFERENT_ADDRESS = "SHIP_TO_DIFFERENT_ADDRESS";
	const SHIP_TO_STORE = "SHIP_TO_STORE";
	const DIGITAL_GOODS = "DIGITAL_GOODS";
	const TRAVEL_AND_EVENT_TICKETS = "TRAVEL_AND_EVENT_TICKETS";
	const OTHER = "OTHER";


}
