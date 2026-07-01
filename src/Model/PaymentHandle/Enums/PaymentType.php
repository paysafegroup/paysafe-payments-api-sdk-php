<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Paymenthandle\Enums;
use Paysafe\PhpSdk\Model\Payment\Payment;

/**
 * Payment type associated with the request.
 */
class PaymentType
{
    const CARD = 'CARD';
    const APPLEPAY = 'APPLEPAY';
    const GOOGLEPAY = 'GOOGLEPAY';
    const SKRILL = 'SKRILL';
    const NETELLER = 'NETELLER';
    const PAYSAFECASH = 'PAYSAFECASH';
    const PAYSAFECARD = 'PAYSAFECARD';
    const PAYPAL = 'PAYPAL';
    const PAY_BY_BANK = 'PAY_BY_BANK';
    const VENMO = 'VENMO';
    const VIPPREFERRED = 'VIPPREFERRED';
    const MAZOOMA = 'MAZOOMA';
    const MBWAY = 'MBWAY';
    const MULTIBANCO = 'MULTIBANCO';
    const SIGHTLINE = 'SIGHTLINE';
    const INTERAC_ETRANSFER = 'INTERAC_ETRANSFER';
    const RAPID_TRANSFER = 'RAPID_TRANSFER';
    const SKRILL1_TAP = 'SKRILL1TAP';
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
}
