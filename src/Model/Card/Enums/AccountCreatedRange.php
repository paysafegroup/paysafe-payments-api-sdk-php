<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card\Enums;

/**
 * This indicates the length of time that the payment account was enrolled in the cardholder’s account
 * with the 3DS Requestor.
 */
class AccountCreatedRange
{
	const NO_ACCOUNT = "NO_ACCOUNT";
	const DURING_TRANSACTION = "DURING_TRANSACTION";
	const LESS_THAN_THIRTY_DAYS = "LESS_THAN_THIRTY_DAYS";
	const THIRTY_TO_SIXTY_DAYS = "THIRTY_TO_SIXTY_DAYS";
	const MORE_THAN_SIXTY_DAYS = "MORE_THAN_SIXTY_DAYS";


}
