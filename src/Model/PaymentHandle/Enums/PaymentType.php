<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\PaymentHandle\Enums;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * This is the payment type associated with the Payment Handle used for this request.
 * For Apple Pay and Google Pay, paymentType is 'CARD'.
 * <b>Note:</b> this may not be an exhaustive list.
 *
 * Class representing the various types of payment methods available for transactions.
 * Examples of payment types include:
 * <ul>
 *   <li><code>CARD</code> - Traditional credit or debit cards.</li>
 *   <li><code>APPLEPAY</code> - Apple Pay digital wallet.</li>
 *   <li><code>SKRILL</code> - Skrill digital wallet.</li>
 *   <li><code>PAYPAL</code> - PayPal digital wallet.</li>
 *   <li><code>SEPA</code> - SEPA bank transfers.</li>
 * </ul>
 */
/**
 * This is the payment type associated with the Payment Handle used for this request.
 * For Apple Pay and Google Pay, paymentType is 'CARD'.
 * <b>Note:</b> this may not be an exhaustive list.
 */
class PaymentType
{
    const CARD = 'CARD';
    const APPLEPAY = 'APPLEPAY';
    const SKRILL = 'SKRILL';
    const NETELLER = 'NETELLER';
    const PAYSAFECASH = 'PAYSAFECASH';
    const PAYSAFECARD = 'PAYSAFCARD';
    const PAYPAL = 'PAYPAL';
    const VENMO = 'VENMO';
    const VIPPREFERRED = 'VIPPREFERRED';
    const MAZOOMA = 'MAZOOMA';
    const SIGHTLINE = 'SIGHTLINE';
    const INTERAC_ETRANSFER = 'INTERAC_ETRANSFER';
    const RAPID_TRANSFER = 'RAPID_TRANSFER';
    const SKRILL1TAP = 'SKRILL1TAP';
    const ACH = 'ACH';
    const EFT = 'EFT';
    const BACS = 'BACS';
    const SEPA = 'SEPA';
    const ONLINE_BANK_TRANSFER = 'ONLINE_BANK_TRANSFER';
    const PIX = 'PIX';
    const KHIPU = 'KHIPU';
    const MACH = 'MACH';
    const BOLETO_BANCARIO = 'BOLETO_BANCARIO';
    const SAFETYPAY_CASH = 'SAFETYPAY_CASH';
    const INTERAC = 'INTERAC';
}
