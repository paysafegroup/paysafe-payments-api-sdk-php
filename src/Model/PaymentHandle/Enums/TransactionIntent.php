<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\PaymentHandle\Enums;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * The transactionIntent property is used to identify the intent of the authorization requests.
 * The value of the transactionIntent shows if the transaction is crypto or quasi-cash related one.
 * -  This field is mandatory for Visa card - cross-border fundingTransactions where the recipient is from any
 *      of the following countries:  India, Bangladesh, Argentina, and Egypt.
 * - It is required only if the use cases explained below are applicable for the merchants
 *      or the default behavior is not acceptable for them.
 * - The merchant needs to add in the request transactionIntent property value as shown in the example below.
 * **Default transactionIntent definition by Paysafe**
 * - All authorizations processed by MCC 6051 will be classified as crypto related
 *      with transactionIntent "CRYPTO_ON_RAMP" or "WALLET_CRYPTO_ON_RAMP" (when funding a wallet),
 *      except their account is not configured by Paysafe for quasi-cash transactions.
 * - All authorizations processed by MCC 6051 will be classified as crypto related
 *      with transactionIntent "CRYPTO_ON_RAMP" or "WALLET_CRYPTO_ON_RAMP" (when funding a wallet),
 *      except their account is not configured by Paysafe for quasi-cash transactions.
 *      All authorizations processed by MCC 6051 or 4829 with quasi-cash configuration turned on will be classified
 *      as quasi-cash related with transactionIntent "QUASI_CASH" .
 * **Expected errors related to invalid transactionIntent values:**
 * - If you send transactionIntent type in the authorization request with value not applicable for your MCC,
 *      the transaction will be declined with error 3072 - "Your request has been declined because
 *      the requested transactionIntent value is not applicable for your merchant category code (MCC)".
 * - If you send transactionIntent type WALLET_CRYPTO_ON_RAMP in the authorization request,
 *      but you didn't classify the transaction as "funding" one with the respective valid fundingTransaction object,
 *      the transaction will be declined with error 3071 - Your request has been declined because of mismatch between
 *      the requested transactionIntent and fundingTransaction type.
 * **Note:** More about the usage of transactionIntent in standalone credit request
 *      can be found here DRAFT - Transaction intent field in standalone credits - Technical documentation
 *      for merchant's comms (dev center address to be added).
 */
class TransactionIntent
{
    public const GOODS_OR_SERVICE_PURCHASE = 'GOODS_OR_SERVICE_PURCHASE';
    public const CHECK_ACCEPTANCE = 'CHECK_ACCEPTANCE';
    public const ACCOUNT_FUNDING = 'ACCOUNT_FUNDING';
    public const QUASI_CASH_TRANSACTION = 'QUASI_CASH_TRANSACTION';
    public const PREPAID_ACTIVATION = 'PREPAID_ACTIVATION';

}
