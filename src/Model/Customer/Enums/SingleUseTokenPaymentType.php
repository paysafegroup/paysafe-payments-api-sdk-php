<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Customer\Enums;

/**
 * List of possible payment types for Single Use Tokens. Possible values: - CARD - EFT - ACH - BACS - SEPA
 */
class SingleUseTokenPaymentType
{
    const CARD = 'CARD';
    const EFT = 'EFT';
    const ACH = 'ACH';
    const BACS = 'BACS';
    const SEPA = 'SEPA';
}
