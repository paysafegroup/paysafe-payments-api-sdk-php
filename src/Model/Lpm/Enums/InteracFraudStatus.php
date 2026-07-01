<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Lpm\Enums;
use Paysafe\PhpSdk\Model\Lpm\Interac;

/**
 * This is the status of the Standalone Interac's Credit call response. Possible values for the fraud status: - CONFIRM_FRAUD - payment is confirmed fraud - CONFIRM_LEGITIMATE - payment is confirmed legitimate - SCAM - payment is scam - PRESUME_LEGITIMATE - payment is presume legitimate - SUSPICIOUS - payment is suspicious
 */
class InteracFraudStatus
{
    const CONFIRM_FRAUD = 'CONFIRM_FRAUD';
    const CONFIRM_LEGITIMATE = 'CONFIRM_LEGITIMATE';
    const SCAM = 'SCAM';
    const PRESUME_LEGITIMATE = 'PRESUME_LEGITIMATE';
    const SUSPICIOUS = 'SUSPICIOUS';
}
