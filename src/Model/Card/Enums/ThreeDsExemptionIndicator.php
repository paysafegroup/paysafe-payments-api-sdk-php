<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Card\Enums;
use Paysafe\PhpSdk\Model\Card\Threeds\Authentication;
use Paysafe\PhpSdk\Model\Customer\Customer;

/**
 * Exemption indicator for bypassing Strong Customer Authentication or 3DS.
 */
class ThreeDsExemptionIndicator
{
    const LOW_VALUE_EXEMPTION = 'LOW_VALUE_EXEMPTION';
    const TRA_EXEMPTION = 'TRA_EXEMPTION';
}
