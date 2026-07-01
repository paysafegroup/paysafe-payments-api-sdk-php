<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Card\Enums;

/**
 * For CARD. Defines the processing rails options used for this transaction, indicating whether it is processed via pinless or regular card scheme network.
 */
class ProcessingRails
{
    const PINLESS = 'PINLESS';
    const CARD_SCHEME_ROUTED = 'CARD_SCHEME_ROUTED';
}
