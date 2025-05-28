<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Common\Profile\Enums;

/**
 * Is the customer’s email ID verified by merchant or not?  <br>
 * If not sent, default value will be set to NOT_VERIFIED.
 * Be aware that unverified email may lead to request failures, as this is the part of our risk check parameters.  <br>
 */
class EmailVerified
{
	const NOT_VERIFIED = "NOT_VERIFIED";
	const VERIFIED = "VERIFIED";


}
