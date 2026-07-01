<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Paymenthandle\Enums;

/**
 * This is the link type that allows different endpoints to be targeted depending on the end state of the transaction.
 */
class ReturnLinkRel
{
    const REDIRECT_PAYMENT = 'redirect_payment';
    const REDIRECT_REGISTRATION = 'redirect_registration';
    const ON_COMPLETED = 'on_completed';
    const _DEFAULT = 'default';
    const ON_FAILED = 'on_failed';
    const ON_CANCELLED = 'on_cancelled';
}
