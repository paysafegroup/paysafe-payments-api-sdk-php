<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Common\Enums;

/**
 * This specifies the type of request being made.  Possible values are:
 * <ul>
 * <li> ADHOC – Ad hoc consumer-initiated request  </li>
 * <li> TOPUP – Unscheduled merchant-iniitated request when a consumer balance is below a set limit.  </li>
 * <li> RECURRING – Scheduled, merchant-initiated recurring request.  </li>
 * </ul>
 * 
 * <b>Note:</b> This value defaults to ADHOC.
 */
class StoredCredentialRequestType
{
	const ADHOC = "ADHOC";
	const TOPUP = "TOPUP";
	const RECURRING = "RECURRING";


}
