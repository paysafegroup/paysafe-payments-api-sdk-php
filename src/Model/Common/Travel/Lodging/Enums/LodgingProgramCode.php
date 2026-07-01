<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common\Travel\Lodging\Enums;

/**
 * Code that corresponds to the category of lodging charges detailed in this message. Allowed values: - LODGING - (Default) Submitted charges are for lodging - NO_SHOW - Submitted charges are for the failure of the guest(s) to check in for reserved room - ADVANCED_DEPOSIT - Submitted charges are for an Advanced Deposit to reserve one or more rooms. In this case, the settlement date will be sent to the schemes for both the check-in and check-out dates. <br>**Note:** If no value is submitted the default value 'LODGING' is used.
 */
class LodgingProgramCode
{
    const LODGING = 'LODGING';
    const NO_SHOW = 'NO_SHOW';
    const ADVANCED_DEPOSIT = 'ADVANCED_DEPOSIT';
}
