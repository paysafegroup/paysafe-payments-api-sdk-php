<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Lpm\Enums;

/**
 * The shipping preference. The possible values are:
 * <ul>
 * <li> NO_SHIPPING - Redacts the shipping address from the PayPal pages. Recommended for digital goods. </li>
 * <li> GET_FROM_FILE - Uses the customer-selected shipping address on PayPal pages. </li>
 * <li> SET_PROVIDED_ADDRESS. If available, uses the merchant-provided shipping address,
 *      which the customer cannot change on the PayPal pages. </li>
 * </ul>
 * If the merchant does not provide an address, the customer can enter the address on PayPal pages.
 */
class PaypalShippingReference
{
	const GET_FROM_FILE = "GET_FROM_FILE";
	const NO_SHIPPING = "NO_SHIPPING";
	const SET_PROVIDED_ADDRESS = "SET_PROVIDED_ADDRESS";


}
