<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Paymenthandle\Enums;
use Paysafe\PhpSdk\Model\Payment\Payment;

/**
 * This is the status of the payment handle. Possible values are: - INITIATED - The transaction was initiated with the downstream provider. - PAYABLE - The merchant can use the Payment Handle for a Payment request. - PROCESSING - The Payment Handle was authorized by customer, awaiting PSP response. - FAILED - The transaction failed due to either an error or being declined. - EXPIRED - The Payment Handle expired because the merchant did not proceed with the Payment. - COMPLETED - The Payment request was initiated successfully using the Payment Handle.
 */
class PaymentHandleStatus
{
    const INITIATED = 'INITIATED';
    const PAYABLE = 'PAYABLE';
    const PROCESSING = 'PROCESSING';
    const FAILED = 'FAILED';
    const EXPIRED = 'EXPIRED';
    const COMPLETED = 'COMPLETED';
}
