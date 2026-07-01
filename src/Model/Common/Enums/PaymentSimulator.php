<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common\Enums;
use Paysafe\PhpSdk\Model\Lpm\Skrill;
use Paysafe\PhpSdk\Model\Payment\Payment;

/**
 * Defines which Payment Simulator to use for processing test payment transactions. You can choose whether you want to simulate the actual end customer experience or you want to use a page, which lets you simulate all payment handle statuses. Possible values: <ul>   <li>INTERNAL, which redirects to the status simulator page.</li>   <li>EXTERNAL (default), which redirects/connects to the downstream payment method website, e.g. Skrill authentication page</li> </ul>
 */
class PaymentSimulator
{
    const EXTERNAL = 'EXTERNAL';
    const INTERNAL = 'INTERNAL';
}
