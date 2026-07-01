<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Card\Enums;
use Paysafe\PhpSdk\Model\Card\Threeds\Authentication;

/**
 * Indicates the outcome of the Authentication.
 */
class ThreeDResult
{
    const Y = 'Y';
    const A = 'A';
    const N = 'N';
    const U = 'U';
    const E = 'E';
}
