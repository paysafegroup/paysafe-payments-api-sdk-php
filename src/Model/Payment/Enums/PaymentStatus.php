<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Payment\Enums;

/**
 * The current status of the payment transaction. Possible values are: - RECEIVED -  The request has been received. - PROCESSING - The payment is being processed. - COMPLETED - The payment has been completed. - HELD - The payment has been held (e.g. for risk review). - FAILED - The payment failed. - CANCELLED - The payment was cancelled. - PENDING - The payment is pending.
 */
class PaymentStatus
{
    const RECEIVED = 'RECEIVED';
    const PROCESSING = 'PROCESSING';
    const COMPLETED = 'COMPLETED';
    const HELD = 'HELD';
    const FAILED = 'FAILED';
    const CANCELLED = 'CANCELLED';
    const PENDING = 'PENDING';
}
