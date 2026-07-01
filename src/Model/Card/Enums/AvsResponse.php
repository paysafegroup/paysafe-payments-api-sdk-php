<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Card\Enums;

/**
 * The AVS response returned from the card issuer.
 */
class AvsResponse
{
    const MATCH = 'MATCH';
    const MATCH_ADDRESS_ONLY = 'MATCH_ADDRESS_ONLY';
    const MATCH_ZIP_ONLY = 'MATCH_ZIP_ONLY';
    const NO_MATCH = 'NO_MATCH';
    const NOT_PROCESSED = 'NOT_PROCESSED';
    const UNKNOWN = 'UNKNOWN';
}
