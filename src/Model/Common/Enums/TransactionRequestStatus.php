<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Common\Enums;

/**
 * This is the status of the transaction request for standalone and original credits. Possible values are:
 * <ul>
 * <li> RECEIVED – Our system has received the request and is waiting for the downstream processor’s response.  </li>
 * <li> INITIATED – The transaction was initiated with the downstream provider.  </li>
 * <li> PENDING - The transaction is awaiting the payment service provider's response.  </li>
 * <li> FAILED – The transaction failed, due to either an error or being declined.  </li>
 * <li> CANCELLED – The transaction request is cancelled.  </li>
 * <li> EXPIRED – The transaction request is expired.  </li>
 * <li> COMPLETED – The transaction request is completed. </li>
 * </ul>
 */
class TransactionRequestStatus
{
	const RECEIVED = "RECEIVED";
	const INITIATED = "INITIATED";
	const PENDING = "PENDING";
	const FAILED = "FAILED";
	const CANCELLED = "CANCELLED";
	const EXPIRED = "EXPIRED";
	const COMPLETED = "COMPLETED";


}
