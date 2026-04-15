<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card\Enums;

/**
 * Enum representing the possible statuses of an Enrollment Lookup request.
 * <p>Values:</p>
 * <ul>
 *   <li><strong>COMPLETED:</strong> The transaction has been completed successfully.
 *  The authentication was successful.</li>
 *   <li><strong>FAILED:</strong> The authentication request failed. Further investigation is required,
 *      and the error code
 *   should be checked for more details.</li>
 * </ul>
 */
class AuthenticationStatus
{
	const COMPLETED = "COMPLETED ";
	const FAILED = "FAILED";


}
