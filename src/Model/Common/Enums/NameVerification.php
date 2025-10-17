<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Common\Enums;

/**
 * This is the account name inquiry name result returned by the acquirer.
 */
class NameVerification
{
	const MATCH = "MATCH";
	const PARTIAL_MATCH = "PARTIAL_MATCH";
	const NO_MATCH = "NO_MATCH";
	const NOT_PROCESSED = "NOT_PROCESSED";
	const UNKNOWN = "UNKNOWN";


}
