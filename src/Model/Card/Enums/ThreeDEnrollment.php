<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card\Enums;

/**
 * This indicates whether the cardholder is enrolled in 3D Secure. Possible values are:
 * <ul>
 * <li> Y – Cardholder authentication available. </li>
 * <li> N – Cardholder not enrolled in authentication. </li>
 * <li> U – Cardholder authentication unavailable </li>
 * </ul>
 */
class ThreeDEnrollment
{
	const Y = "Y";
	const N = "N";
	const U = "U";


}
