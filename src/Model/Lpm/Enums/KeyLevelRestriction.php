<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Lpm\Enums;
use Paysafe\PhpSdk\Model\Payment\Payment;

/**
 * Payment can be restricted for a certain minimum kyc level (implicitly restricts payment to registered consumers only). Possible values are: - FULL - SIMPLE
 */
class KeyLevelRestriction
{
    const FULL = 'FULL';
    const SIMPLE = 'SIMPLE';
}
