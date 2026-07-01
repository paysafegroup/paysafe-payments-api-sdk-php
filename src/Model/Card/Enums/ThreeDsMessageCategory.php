<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Card\Enums;

/**
 * Category of the message for a specific use case.
 */
class ThreeDsMessageCategory
{
    const PAYMENT = 'PAYMENT';
    const NON_PAYMENT = 'NON_PAYMENT';
}
