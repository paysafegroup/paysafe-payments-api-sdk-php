<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Common\Enums;

/**
 * This is the status reason of the mandate request response.
 */
class MandateRequestResponseStatusReason
{
	const MERCHANT_CANCELLED = "MERCHANT_CANCELLED";
	const BANK_CANCELLED = "BANK_CANCELLED";
	const DECLINED = "DECLINED";
	const REJECTED = "REJECTED";
	const DISPUTED = "DISPUTED";
	const UNAUTHORIZED = "UNAUTHORIZED";
	const TRANSFERRED = "TRANSFERRED";


}
