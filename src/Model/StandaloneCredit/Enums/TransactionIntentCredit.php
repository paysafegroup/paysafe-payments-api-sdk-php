<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\StandaloneCredit\Enums;
use Paysafe\PhpSdk\Model\Payment\Payment;

/**
 * <p>The <b>transactionIntent</b> property is used to identify the intent of the requests. The value of <b>transactionIntent</b> shows if the transaction is crypto or quasi-cash related.</p> <p>- This field is mandatory for Visa card cross-border funding transactions where the recipient is from any of the following countries: India, Bangladesh, Argentina, and Egypt.<br> - It is required only if the use cases explained below are applicable for the merchants or the default behavior is not acceptable for them.<br> - The merchant needs to add in the request <b>transactionIntent</b> property value as shown in the example below.</p> <p><b>Use cases and applicable valid enum transactionIntent options:</b></p> <p><b>WALLET_CRYPTO_OFF_RAMP</b><br> - Use case: The consumer initiates a disbursement from a crypto-capable digital wallet to a card.<br> - MCC values: 4829, 6012, 6051, 6211.</p> <p><b>CRYPTO_OFF_RAMP</b><br> - Use case: The consumer initiates a disbursement from a crypto-capable brokerage/exchange to a card.<br> - MCC values: 6012, 6051, 6211.</p> <p><b>TRAVEL_AND_TOURISM</b><br> - Use case: Payment for travel (Valid only for Paysafe acquiring).<br> - MCC values: ANY.</p> <p><b>EDUCATION</b><br> - Use case: Study (Valid only for Paysafe acquiring).<br> - MCC values: ANY.</p> <p><b>MEDICAL_TREATMENT</b><br> - Use case: Hospitalization and Medical Treatment (Valid only for Paysafe acquiring).<br> - MCC values: ANY.</p> <p><b>SAVINGS</b><br> - Use case: Payment of savings/retirement account (Valid only for Paysafe acquiring).<br> - MCC values: ANY.</p> <p><b>CHARITY</b><br> - Use case: Payment for charity reasons (Valid only for Paysafe acquiring).<br> - MCC values: ANY.</p> <p><b>OTHER</b><br> - Use case: Valid only for Paysafe acquiring.<br> - MCC values: ANY.</p> <p><b>SALARY</b><br> - Use case: Valid only for Paysafe acquiring.<br> - MCC values: ANY.</p> <p><b>Default transactionIntent definition by Paysafe:</b><br> All standalone credits processed by account with MCC 6051 and configured for Visa Direct will be classified as crypto as follows:<br> - If VISA DIRECT set up is FUNDS DISBURSEMENT with transactionIntent \"CRYPTO_OFF_RAMP\".<br> - If VISA DIRECT set up is WALLET TRANSFER or FUNDS TRANSFER with transactionIntent \"WALLET_CRYPTO_OFF_RAMP\".</p> <p><b>Expected errors related to invalid transactionIntent values:</b><br> - If you send transactionIntent in the request with value not applicable for your MCC, the transaction will be declined with error 3072.<br> - If you send transactionIntent in the request with value applicable for your MCC, but not for your VISA direct configuration, the transaction will be declined with error 3069.<br> - If you send transactionIntent with value different than the options above, the transaction will be declined with error 5068.</p>
 */
class TransactionIntentCredit
{
    const WALLET_CRYPTO_OFF_RAMP = 'WALLET_CRYPTO_OFF_RAMP';
    const CRYPTO_OFF_RAMP = 'CRYPTO_OFF_RAMP';
    const TRAVEL_AND_TOURISM = 'TRAVEL_AND_TOURISM';
    const EDUCATION = 'EDUCATION';
    const MEDICAL_TREATMENT = 'MEDICAL_TREATMENT';
    const SAVINGS = 'SAVINGS';
    const CHARITY = 'CHARITY';
    const OTHER = 'OTHER';
    const SALARY = 'SALARY';
}
