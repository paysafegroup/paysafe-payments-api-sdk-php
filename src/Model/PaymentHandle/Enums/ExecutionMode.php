<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Paymenthandle\Enums;
use Paysafe\PhpSdk\Model\Payment\Payment;

/**
 * Specifies the action of the merchant server to complete the Payment.
 */
class ExecutionMode
{
    const SYNCHRONOUS = 'SYNCHRONOUS';
    const ASYNCHRONOUS = 'ASYNCHRONOUS';
}
