<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Common\Travel\Carrental\Enums;

/**
 * Enum representing the various types of extra charges that may apply to a car rental reservation.
 * <p>Enum Values:</p>
 * <ul>
 *   <li><strong>GASOLINE:</strong> Charges related to gasoline or fuel usage during the rental period.</li>
 *   <li><strong>MILEAGE:</strong> Charges for mileage used beyond the agreed-upon limits.</li>
 *   <li><strong>LATE_RETURN:</strong> Charges imposed if the rented vehicle is returned after
 *      the scheduled return time.</li>
 *   <li><strong>ONE_WAY_SERVICE_FEE:</strong> Charges for renting a vehicle and returning it at
 *      a different location from where it was rented.</li>
 *   <li><strong>DRIVING_VIOLATION:</strong> Charges for any fines or penalties incurred due
 *      to driving violations during the rental period.</li>
 * </ul>
 */
class CarRentalExtraChargeType
{
	const GASOLINE = "GASOLINE";
	const MILEAGE = "MILEAGE";
	const LATE_RETURN = "LATE_RETURN";
	const ONE_WAY_SERVICE_FEE = "ONE_WAY_SERVICE_FEE";
	const DRIVING_VIOLATION = "DRIVING_VIOLATION";


}
