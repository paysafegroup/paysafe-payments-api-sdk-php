<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card\Enums;

/**
 * This is the type of Authentication request. This data element provides additional information to the ACS
 * to determine the best approach for handling an authentication request.
 */
class AuthenticationPurpose
{
	const PAYMENT_TRANSACTION = "PAYMENT_TRANSACTION";
	const RECURRING_TRANSACTION = "RECURRING_TRANSACTION";
	const INSTALMENT_TRANSACTION = "INSTALMENT_TRANSACTION";
	const ADD_CARD = "ADD_CARD";
	const MAINTAIN_CARD = "MAINTAIN_CARD";
	const EMV_TOKEN_VERIFICATION = "EMV_TOKEN_VERIFICATION";


}
