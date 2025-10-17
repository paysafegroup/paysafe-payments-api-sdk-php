<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Payment\Enums;

/**
 * This is the status of the transaction request for payment, verification. Possible values are
 * <ul>
 * <li> RECEIVED – Our system has received the request and is waiting for the downstream processor’s response. </li>
 * <li> PROCESSING - Transactions are submitted to Payment Service Provider (PSP)/Scheme
 *      and waiting for PSP to complete the transaction </li>
 * <li> COMPLETED – The transaction was completed.  </li>
 * <li> HELD – The request has been placed on hold due to risk considerations. </li>
 * <li> FAILED – The transaction failed, due to either an error or being declined. </li>
 * <li> CANCELLED – The request has been fully voided (reversed). </li>
 * <li> PENDING – The transaction awaiting payment service provider's response. </li>
 * </ul>
 */
class PaymentRequestStatus
{
	const RECEIVED = "RECEIVED";
	const PROCESSING = "PROCESSING";
	const COMPLETED = "COMPLETED";
	const HELD = "HELD";
	const FAILED = "FAILED";
	const CANCELLED = "CANCELLED";
	const PENDING = "PENDING";


}
