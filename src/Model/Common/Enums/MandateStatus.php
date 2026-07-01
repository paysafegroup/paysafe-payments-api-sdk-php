<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common\Enums;

/**
 * The status of the mandate request response
 */
class MandateStatus
{
    const PENDING = 'PENDING';
    const ACTIVE = 'ACTIVE';
    const CANCELLED = 'CANCELLED';
    const INACTIVE = 'INACTIVE';
}
