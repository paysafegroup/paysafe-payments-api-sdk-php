<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card\Enums;

/**
 * Enum that indicates the length of time between the most recent password change and the API call
 * of the current transaction.
 */
class PasswordChangedRange
{
	const NO_CHANGE = "NO_CHANGE";
	const DURING_TRANSACTION = "DURING_TRANSACTION";
	const LESS_THAN_THIRTY_DAYS = "LESS_THAN_THIRTY_DAYS";
	const THIRTY_TO_SIXTY_DAYS = "THIRTY_TO_SIXTY_DAYS";
	const MORE_THAN_SIXTY_DAYS = "MORE_THAN_SIXTY_DAYS";


}
