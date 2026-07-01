<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Card\Enums;

/**
 * Enum representing the various processor applied types for funding transactions. The fundingTransaction processorAppliedType value is chosen by Paysafe based on the merchant configuration. It is equal to the one which is used by Paysafe based on your MCC and registration. If you provide value which is applicable for your MCC but you have been registered for another use case, Paysafe will assign the value you have registered for as use case and will provide it into the response as processorAppliedType. In case the merchant is not registered in the relevant card scheme system, the processorAppliedValue received into the response will be 'NOT_APPLIED'. The processorAppliedType can be seen in the auth response.
 */
class FundingTransactionType
{
    const SVDW_FUNDS_TRANSFER = 'SVDW_FUNDS_TRANSFER';
    const SDW_WALLET_TRANSFER = 'SDW_WALLET_TRANSFER';
    const ACCOUNT_TO_ACCOUNT = 'ACCOUNT_TO_ACCOUNT';
    const PERSON_TO_PERSON = 'PERSON_TO_PERSON';
    const NOT_APPLIED = 'NOT_APPLIED';
}
