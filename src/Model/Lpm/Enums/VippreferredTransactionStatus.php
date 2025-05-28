<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Lpm\Enums;

/**
 * This is the status of the transaction request. Possible values are:
 * <ul>
 * <li>INITIATED - The transaction has been initiated.  </li>
 * <li>RECEIVED – Our system has received the request and is waiting for the downstream processor’s response.  </li>
 * <li>COMPLETED – The transaction has been completed.  </li>
 * <li>PENDING – Our system has received the request but it has not yet been batched.   </li>
 * <li>FAILED – The transaction failed, due to either an error or being declined.  </li>
 * <li>CANCELLED – The request has been fully voided (reversed). </li>
 * </ul>
 */
class VippreferredTransactionStatus
{
	const INITIATED = "INITIATED";
	const RECEIVED = "RECEIVED";
	const COMPLETED = "COMPLETED";
	const PENDING = "PENDING";
	const FAILED = "FAILED";
	const CANCELLED = "CANCELLED";


}
