<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Common\Travel\Lodging\Enums;

/**
 * The code that corresponds to the category of lodging charges.
 * This field determines the nature of the charge being submitted.
 * <p>Allowed values:</p>
 * <ul>
 *   <li><strong>LODGING:</strong> Default value. Submitted charges are for lodging.</li>
 *   <li><strong>NO_SHOW:</strong> Charges for the failure of the guest to check in for a reserved room.</li>
 *   <li><strong>ADVANCED_DEPOSIT:</strong> Charges for an advanced deposit made to reserve one or more rooms.
 *       The settlement date will be sent to the schemes for both the check-in and check-out dates in this case.</li>
 * </ul>
 */
class ProgramCode
{
	const LODGING = "LODGING";
	const NO_SHOW = "NO_SHOW";
	const ADVANCED_DEPOSIT = "ADVANCED_DEPOSIT";


}
