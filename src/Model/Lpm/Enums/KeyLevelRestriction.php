<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Lpm\Enums;

/**
 * Payment can be restricted for a certain minimum kyc level
 * (implicitly restricts payment to registered consumers only).
 * Possible values are:
 * <ul>
 * <li>FULL </li>
 * <li>SIMPLE. </li>
 * </ul>
 */
class KeyLevelRestriction
{
	const FULL = "FULL";
	const SIMPLE = "SIMPLE";


}
