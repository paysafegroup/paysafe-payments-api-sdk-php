<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Customer\Enums;

/**
 * This is the status of the customer. Possible values are:
 * <ul>
 * <li> INITIAL  </li>
 * <li> ACTIVE  </li>
 * </ul>
 * By default the system automatically sets the customer status to an ACTIVE state.
 * If you want to prevent the customer from being used for payments, you can set the status to an INITIAL state
 * (e.g., in cases where you first want to validate the customer).
 */
class CustomerStatus
{
	const INITIAL = "INITIAL";
	const ACTIVE = "ACTIVE";


}
