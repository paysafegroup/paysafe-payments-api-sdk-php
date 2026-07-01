<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Lpm\Enums;
use Paysafe\PhpSdk\Model\Lpm\Interac;

/**
 * This parameter is used to to identify if user is registered for Interac E-Transfer.
 */
class InteracTransferType
{
    const REGULAR = 'ALIAS_REGULAR';
    const AUTODEPOSIT = 'ALIAS_AUTODEPOSIT';
}
