<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common\Travel\Cruise\Enums;

/**
 * Indicates if the package includes car rental, airline flight, both or neither.
 */
class TravelPackageApplication
{
    const CAR_RENTAL_RESERVATION = 'CAR_RENTAL_RESERVATION';
    const AIRLINE_RESERVATION = 'AIRLINE_RESERVATION';
    const CAR_RENTAL_AND_AIRLINE_RESERVATION = 'CAR_RENTAL_AND_AIRLINE_RESERVATION';
    const UNKNOWN = 'UNKNOWN';
}
