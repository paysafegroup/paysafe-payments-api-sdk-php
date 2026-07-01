<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Lpm\Enums;

/**
 * Identifies whether the transaction was processed via ACH or RTP network.
 */
class PayByBankScheme
{
    const ACH = 'ACH';
    const RTP = 'RTP';
}
