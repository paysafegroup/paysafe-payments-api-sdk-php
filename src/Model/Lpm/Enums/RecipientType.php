<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Lpm\Enums;
use Paysafe\PhpSdk\Model\Lpm\Paypal;

/**
 * Type of payout recipient. For Paypal, only supported value is PAYPAL_ID.
 */
class RecipientType
{
    const PAYPAL_ID = 'PAYPAL_ID';
    const USER_ID = 'USER_ID';
    const EMAIL = 'EMAIL';
    const PHONE = 'PHONE';
}
