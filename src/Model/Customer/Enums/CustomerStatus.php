<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Customer\Enums;

/**
 * This is the status of the customer. Possible values are: - INITIAL - ACTIVE By default the system automatically sets the customer status to an ACTIVE state. If you want to prevent the customer from being used for payments, you can set the status to an INITIAL state (e.g., in cases where you first want to validate the customer).
 */
class CustomerStatus
{
    const INITIAL = 'INITIAL';
    const ACTIVE = 'ACTIVE';
}
