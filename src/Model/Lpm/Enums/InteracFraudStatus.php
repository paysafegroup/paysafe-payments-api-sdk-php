<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Lpm\Enums;

/**
 * This is the status of the Standalone Interac's Credit call response.  Possible values for the fraud status:
 * <ul>
 * <li>CONFIRM_FRAUD - payment is confirmed fraud   </li>
 * <li>CONFIRM_LEGITIMATE - payment is confirmed legitimate   </li>
 * <li>SCAM - payment is scam  </li>
 * <li>PRESUME_LEGITIMATE - payment is presume legitimate  </li>
 * <li>SUSPICIOUS - payment is suspicious
 * </ul>
 */
class InteracFraudStatus
{
	const CONFIRM_FRAUD = "CONFIRM_FRAUD";
	const CONFIRM_LEGITIMATE = "CONFIRM_LEGITIMATE";
	const SCAM = "SCAM";
	const PRESUME_LEGITIMATE = "PRESUME_LEGITIMATE";
	const SUSPICIOUS = "SUSPICIOUS";


}
