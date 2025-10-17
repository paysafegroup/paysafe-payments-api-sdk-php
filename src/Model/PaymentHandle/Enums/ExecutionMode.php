<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\PaymentHandle\Enums;

/**
 * This specifies the action of the merchant server in order to complete the Payment. Possible values are:
 * <ul>
 *   <li>
 *     <b>SYNCHRONOUS :</b> The status of the Payment request will be returned synchronously to the merchant,
 *      e.g., a credit card request.
 *   </li>
 *   <li>
 *     <b>ASYNCHRONOUS :</b> The Payment request is not completed immediately and the merchant must rely on
 *     <a href="https://developer.paysafe.com/en/api-docs/paysafe-checkout/webhoooks/">webhooks</a>
 *     to retrieve the status of the Payment request.
 *   </li>
 * </ul>
 */
class ExecutionMode
{
	const SYNCHRONOUS = "SYNCHRONOUS";
	const ASYNCHRONOUS = "ASYNCHRONOUS";
}
