<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Common\Travel\Cruise\Enums;

/**
 * Indicates if the package includes car rental, airline flight, both or neither.
 * <ul>
 * <li> CAR_RENTAL_RESERVATION - Car rental reservation included  </li>
 * <li> AIRLINE_RESERVATION - Airline flight reservation included  </li>
 * <li> CAR_RENTAL_AND_AIRLINE_RESERVATION - Both car rental and airline flight reservations included  </li>
 * <li> UNKNOWN - Unknown  * Required during settlement request with AMEX for integration with TSYS processor. </li>
 * </ul>
 */
class TravelPackageApplication
{
	const CAR_RENTAL_RESERVATION = "CAR_RENTAL_RESERVATION";
	const AIRLINE_RESERVATION = "AIRLINE_RESERVATION";
	const CAR_RENTAL_AND_AIRLINE_RESERVATION = "CAR_RENTAL_AND_AIRLINE_RESERVATION";
	const UNKNOWN = "UNKNOWN";


}
