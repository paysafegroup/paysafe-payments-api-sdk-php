<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common\Enums;
use Paysafe\PhpSdk\Model\Lpm\Paysafecash;

/**
 * This is the customer's KYC status for Paysafecash only. VERIFIED is sent as FULL to Paysafecash platform PARTIALLY_VERIFIED is sent as SIMPLE to Paysafecash platform
 */
class KycStatus
{
    const VERIFIED = 'VERIFIED';
    const PARTIALLY_VERIFIED = 'PARTIALLY_VERIFIED';
}
