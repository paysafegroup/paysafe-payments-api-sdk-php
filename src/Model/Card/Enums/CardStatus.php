<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Card\Enums;
use Paysafe\PhpSdk\Model\Customer\Customer;

/**
 * Optional. Present only if the card is stored for the Customer.
 */
class CardStatus
{
    const ACTIVE = 'ACTIVE';
    const SUSPENDED = 'SUSPENDED';
}
