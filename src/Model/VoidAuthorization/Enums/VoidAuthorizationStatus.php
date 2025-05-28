<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\VoidAuthorization\Enums;

/**
 * This is the status of the transaction request. Possible values are:
 * <ul>
 * <li>RECEIVED – Our system has received the request and is waiting for the downstream processor's response.</li>
 * <li>COMPLETED – The transaction has been completed.</li>
 * <li>HELD – The transaction has been placed on hold due to risk considerations.</li>
 * <li>FAILED – The transaction failed, due to either an error or being declined.
 * <li>CANCELLED – The request has been fully voided (reversed).</li>
 * <li>PENDING – The request is pending.</li>
 * </ul>
 */
class VoidAuthorizationStatus
{
	const RECEIVED = "RECEIVED";
	const COMPLETED = "COMPLETED";
	const HELD = "HELD";
	const FAILED = "FAILED";
	const CANCELLED = "CANCELLED";
	const PENDING = "PENDING";
}
