<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card\Enums;

/**
 * This indicates whether a challenge is requested for this transaction.
 */
class RequesterChallengePreference
{
	const NO_PREFERENCE = "NO_PREFERENCE";
	const NO_CHALLENGE_REQUESTED = "NO_CHALLENGE_REQUESTED";
	const CHALLENGE_REQUESTED = "CHALLENGE_REQUESTED";
	const CHALLENGE_MANDATED = "CHALLENGE_MANDATED";


}
