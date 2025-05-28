<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\PaymentHandle\Enums;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * This specifies how the Payment Handle will be used for Payments. Possible values are:
 * <ul>
 *   <li>SINGLE_USE – The Payment Handle can be used for one transaction only and expires if not used.</li>
 *   <li>MULTI_USE – The Payment Handle can be used multiple times.</li>
 * </ul>
 */
class PaymentHandleUsage
{
    const SINGLE_USE = 'SINGLE_USE';
    const MULTI_USE = 'MULTI_USE';
}
