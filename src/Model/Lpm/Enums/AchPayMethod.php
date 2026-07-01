<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Lpm\Enums;

/**
 * This is the payment type. Possible values are: - WEB - Website originated debit (Personal bank accounts only) - TEL - Telephone-Initiated Entry (Personal bank accounts only) - PPD - Personal account debit (Personal bank accounts only) - CCD - Business account debit (Business bank accounts only)
 */
class AchPayMethod
{
    const WEB = 'WEB';
    const TEL = 'TEL';
    const PPD = 'PPD';
    const CCD = 'CCD';
}
