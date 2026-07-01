<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common\Enums;

/**
 * Specifies the type of stored credential request.
 */
class StoredCredentialType
{
    const ADHOC = 'ADHOC';
    const TOPUP = 'TOPUP';
    const RECURRING = 'RECURRING';
}
