<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card\Enums;

/**
 * This indicates the outcome of the Authentication.
 * <ul>
 * <li> Y – The cardholder successfully authenticated with their card issuer.  </li>
 * <li> A – The cardholder authentication was attempted.  </li>
 * <li> N – The cardholder failed to successfully authenticate with their card issuer.  </li>
 * <li> U – Authentication with the card issuer was unavailable.  </li>
 * <li> E – An error occurred during authentication. </li>
 * </ul>
 */
class ThreeDResult
{
	const Y = "Y";
	const A = "A";
	const N = "N";
	const U = "U";
	const E = "E";


}
