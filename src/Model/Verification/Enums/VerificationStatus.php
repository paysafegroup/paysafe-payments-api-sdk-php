<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Verification\Enums;

/**
 * This is the status of the verification request. Possible values are:
 * <ul>
 *  <li> RECEIVED - A verification request was received from merchant,
 *      but it has not yet been sent to downstream gateway.</li>
 *  <li> ERROR - The verification has errored - failed for non-business reason (non http status 402 error).</li>
 *  <li> FAILED - The verification has failed and the downstream gateway has returned an error (http status 402)
 *      for some business reason.</li>
 *  <li> COMPLETED - The verification was completed successfully.</li>
 * </ul>
 */
class VerificationStatus
{
	const COMPLETED = "COMPLETED";
	const FAILED = "FAILED";
	const RECEIVED = "RECEIVED";
	const ERROR = "ERROR";


}
