<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Card\Enums;

/**
 * Indicates whether a challenge is requested for this transaction.
 */
class ThreeDsRequestorChallengePreference
{
    const NO_PREFERENCE = 'NO_PREFERENCE';
    const NO_CHALLENGE_REQUESTED = 'NO_CHALLENGE_REQUESTED';
    const CHALLENGE_REQUESTED = 'CHALLENGE_REQUESTED';
    const CHALLENGE_MANDATED = 'CHALLENGE_MANDATED';
}
