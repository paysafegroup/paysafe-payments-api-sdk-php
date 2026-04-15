<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Lpm\Enums;

/**
 * This is the payment type. Possible values are:
 * <ul>
 * <li>WEB - Website originated debit (Personal bank accounts only) </li>
 * <li>TEL - Telephone-Initiated Entry (Personal bank accounts only) </li>
 * <li>PPD - Personal account debit (Personal bank accounts only) </li>
 * <li>CCD - Business account debit (Business bank accounts only) </li>
 * </ul>
 */
class AchPayMethod
{
	const WEB = "WEB";
	const TEL = "TEL";
	const PPD = "PPD";
	const CCD = "CCD";


}
