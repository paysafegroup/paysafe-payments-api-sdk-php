<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\PaymentHandle\Enums;

/**
 * This specifies the next step of the user journey once they proceed to the Payment. Possible values are:
 * <ul>
 *   <li>
 *     <b>NONE:</b> No action is required, for example, for a standard credit card payment.
 *   </li>
 *   <li>
 *     <b>REDIRECT:</b> The user must be redirected in order to complete a Payment, for example,
 *     when an alternate payment method like Paysafecard is used.
 *   </li>
 *   <li>
 *     <b>LOOKUP:</b> Lookup.
 *   </li>
 * </ul>
 */
class Action
{
	const NONE = "NONE";
	const REDIRECT = "REDIRECT";
	const LOOKUP = "LOOKUP";
}
