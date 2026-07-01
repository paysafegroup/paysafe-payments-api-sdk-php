<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common\Enums;

/**
 * Specifies whether this stored credential request is initial or recurring.
 */
class StoredCredentialOccurrence
{
    const INITIAL = 'INITIAL';
    const SUBSEQUENT = 'SUBSEQUENT';
}
