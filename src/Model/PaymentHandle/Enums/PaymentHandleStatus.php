<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\PaymentHandle\Enums;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * This is the status of the payment handle. Possible values are:
 * <ul>
 *   <li>
 *     <b>INITIATED:</b> The transaction was initiated with the downstream provider.
 *   </li>
 *   <li>
 *     <b>PAYABLE:</b> The merchant can use the Payment Handle for a Payment request.
 *   </li>
 *   <li>
 *     <b>PROCESSING:</b> The Payment Handle was authorized by customer, awaiting PSP response.
 *   </li>
 *   <li>
 *     <b>FAILED:</b> The transaction failed due to either an error or being declined.
 *   </li>
 *   <li>
 *     <b>EXPIRED:</b> The Payment Handle expired because the merchant did not proceed with the Payment.
 *   </li>
 *   <li>
 *     <b>COMPLETED:</b> The Payment request was initiated successfully using the Payment Handle.
 *   </li>
 * </ul>
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
