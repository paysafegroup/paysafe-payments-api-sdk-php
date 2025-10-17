<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\PaymentHandle\Enums;

/**
 * This is the link type that allows different endpoints to be targeted depending on the end state of the transaction.
 * <ul>
 *   <li>
 *     <b>redirect_registration:</b> Merchant needs to redirect consumer to this url to complete registration.
 *   </li>
 *   <li>
 *     <b>redirect_payment:</b> Merchant needs to redirect consumer to this url to complete authentication.
 *   </li>
 *   <li>
 *     <b>on_completed:</b> Paysafe will return to this merchant url post successful payment.
 *   </li>
 *   <li>
 *     <b>on_failed:</b> Paysafe will return to this merchant url post if payment failed.
 *   </li>
 *   <li>
 *     <b>on_cancelled:</b> Paysafe will return to this merchant url post if payment is cancelled.
 *   </li>
 *   <li>
 *     <b>default:</b> The default return URL that will be used if specific status return URL is not defined.
 *   </li>
 * </ul>
 */
class ReturnLinkRel
{
	const REDIRECT_PAYMENT = "redirect_payment";
	const REDIRECT_REGISTRATION = "redirect_registration";
	const ON_COMPLETED = "on_completed";
	const DEFAULT = "default";
	const ON_FAILED = "on_failed";
	const ON_CANCELLED = "on_cancelled";
}
