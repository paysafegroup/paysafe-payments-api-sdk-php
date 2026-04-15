<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Common\Enums;

/**
 * This specifies whether this stored credential request is initial or recurring. Possible values are:
 * <ul>
 * <li>INITIAL – Used when this is the first time the consumer uses this credit card. </li>
 * <li>SUBSEQUENT – Used when the consumer uses this credit card for subsquent requests. </li>
 * </ul>
 * <b>Note:</b> This value defaults to INITIAL.
 */
class StoredCredentialRequestOccurrence
{
	const INITIAL = "INITIAL";
	const SUBSEQUENT = "SUBSEQUENT";


}
