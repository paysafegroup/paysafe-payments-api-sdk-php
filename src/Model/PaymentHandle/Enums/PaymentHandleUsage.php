<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Paymenthandle\Enums;
use Paysafe\PhpSdk\Model\Payment\Payment;

/**
 * This specifies how the Payment Handle will be used for Payments. Possible values are: - SINGLE_USE - The Payment Handle can be used for one transaction only and expires if not used. - MULTI_USE - The Payment Handle can be used multiple times.
 */
class PaymentHandleUsage
{
    const SINGLE_USE = 'SINGLE_USE';
    const MULTI_USE = 'MULTI_USE';
}
