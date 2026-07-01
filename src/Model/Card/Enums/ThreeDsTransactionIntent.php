<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Card\Enums;

/**
 * Identifies the type of transaction being authenticated.
 */
class ThreeDsTransactionIntent
{
    const GOODS_OR_SERVICE_PURCHASE = 'GOODS_OR_SERVICE_PURCHASE';
    const CHECK_ACCEPTANCE = 'CHECK_ACCEPTANCE';
    const ACCOUNT_FUNDING = 'ACCOUNT_FUNDING';
    const QUASI_CASH_TRANSACTION = 'QUASI_CASH_TRANSACTION';
    const PREPAID_ACTIVATION = 'PREPAID_ACTIVATION';
}
