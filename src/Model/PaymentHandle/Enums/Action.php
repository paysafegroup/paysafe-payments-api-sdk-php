<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Paymenthandle\Enums;
use Paysafe\PhpSdk\Model\Lpm\Paysafecard;
use Paysafe\PhpSdk\Model\Payment\Payment;

/**
 * This specifies the next step of the user journey once they proceed to the Payment. Possible values are: - NONE: No action is required, for example, for a standard credit card payment. - REDIRECT: The user must be redirected in order to complete a Payment, for example, when an alternate payment method like Paysafecard is used. - LOOKUP: Lookup.
 */
class Action
{
    const NONE = 'NONE';
    const REDIRECT = 'REDIRECT';
    const LOOKUP = 'LOOKUP';
}
