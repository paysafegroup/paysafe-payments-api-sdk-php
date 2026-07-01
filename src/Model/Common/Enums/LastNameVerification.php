<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common\Enums;

/**
 * The account name inquiry last name result returned by the acquirer.
 */
class LastNameVerification
{
    const MATCH = 'MATCH';
    const PARTIAL_MATCH = 'PARTIAL_MATCH';
    const NO_MATCH = 'NO_MATCH';
    const NOT_PROCESSED = 'NOT_PROCESSED';
    const UNKNOWN = 'UNKNOWN';
}
