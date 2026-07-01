<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common\Enums;

/**
 * CVV verification result.
 */
class CvvVerification
{
    const MATCH = 'MATCH';
    const NO_MATCH = 'NO_MATCH';
    const NOT_PROCESSED = 'NOT_PROCESSED';
    const UNKNOWN = 'UNKNOWN';
}
