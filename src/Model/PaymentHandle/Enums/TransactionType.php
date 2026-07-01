<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Paymenthandle\Enums;

/**
 * The type of transaction for which a payment handle is created
 */
class TransactionType
{
    const PAYMENT = 'PAYMENT';
    const STANDALONE_CREDIT = 'STANDALONE_CREDIT';
    const ORIGINAL_CREDIT = 'ORIGINAL_CREDIT';
    const VERIFICATION = 'VERIFICATION';
}
