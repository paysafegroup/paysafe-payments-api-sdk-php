<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common\Enums;

/**
 * The status reason of the mandate request response
 */
class MandateStatusReason
{
    const MERCHANT_CANCELLED = 'MERCHANT_CANCELLED';
    const BANK_CANCELLED = 'BANK_CANCELLED';
    const DECLINED = 'DECLINED';
    const REJECTED = 'REJECTED';
    const DISPUTED = 'DISPUTED';
    const UNAUTHORIZED = 'UNAUTHORIZED';
    const TRANSFERRED = 'TRANSFERRED';
}
