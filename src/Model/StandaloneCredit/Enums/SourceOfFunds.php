<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\StandaloneCredit\Enums;

/**
 * This field contains the information representing the payment transaction funding source. Possible values: Credit, Debit, Prepaid, Cash, Deposit account, Credit account, Mobile money account
 */
class SourceOfFunds
{
    const CREDIT = 'Credit';
    const DEBIT = 'Debit';
    const PREPAID = 'Prepaid';
    const CASH = 'Cash';
    const DEPOSIT_ACCOUNT = 'Deposit account';
    const CREDIT_ACCOUNT = 'Credit account';
    const MOBILE_MONEY_ACCOUNT = 'Mobile money account';
}
