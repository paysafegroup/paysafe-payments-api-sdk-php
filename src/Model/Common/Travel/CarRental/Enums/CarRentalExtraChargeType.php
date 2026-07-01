<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common\Travel\CarRental\Enums;

/**
 * Enum representing the various types of extra charges that may apply to a car rental reservation.
 */
class CarRentalExtraChargeType
{
    const GASOLINE = 'GASOLINE';
    const MILEAGE = 'MILEAGE';
    const LATE_RETURN = 'LATE_RETURN';
    const ONE_WAY_SERVICE_FEE = 'ONE_WAY_SERVICE_FEE';
    const DRIVING_VIOLATION = 'DRIVING_VIOLATION';
}
