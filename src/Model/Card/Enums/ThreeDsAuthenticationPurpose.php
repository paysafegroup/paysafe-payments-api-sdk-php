<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Card\Enums;
use Paysafe\PhpSdk\Model\Card\Threeds\Authentication;

/**
 * Type of Authentication request.
 */
class ThreeDsAuthenticationPurpose
{
    const PAYMENT_TRANSACTION = 'PAYMENT_TRANSACTION';
    const RECURRING_TRANSACTION = 'RECURRING_TRANSACTION';
    const INSTALMENT_TRANSACTION = 'INSTALMENT_TRANSACTION';
    const ADD_CARD = 'ADD_CARD';
    const MAINTAIN_CARD = 'MAINTAIN_CARD';
    const EMV_TOKEN_VERIFICATION = 'EMV_TOKEN_VERIFICATION';
}
