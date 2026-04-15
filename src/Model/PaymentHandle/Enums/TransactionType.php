<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\PaymentHandle\Enums;

/**
 * This specifies the transaction type for which the Payment Handle is created.
 * <ul>
 *   <li>
 *     <b>PAYMENT:</b> Payment Handle is created to continue the Payment.
 *   </li>
 *   <li>
 *     <b>STANDALONE_CREDIT:</b> Payment Handle is created to continue the Standalone Credit.
 *   </li>
 *   <li>
 *     <b>ORIGINAL_CREDIT:</b> Payment Handle is created to continue the Original Credit.
 *   </li>
 *   <li>
 *     <b>VERIFICATION:</b> Payment Handle is created to continue the Verification request.
 *   </li>
 * </ul>
 */
class TransactionType
{
	const PAYMENT = "PAYMENT";
	const STANDALONE_CREDIT = "STANDALONE_CREDIT";
	const ORIGINAL_CREDIT = "ORIGINAL_CREDIT";
	const VERIFICATION = "VERIFICATION";
}
