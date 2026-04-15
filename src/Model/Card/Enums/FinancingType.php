<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card\Enums;

/**
 * Enum representing the type of financing offered for a transaction.
 * <p>Allowed values:</p>
 * <ul>
 *     <li><b>DEFERRED_PAYMENT</b>: Financing type where payment is deferred for a certain period.</li>
 *     <li><b>EQUAL_PAYMENT</b>: Financing type where the total amount is divided into equal monthly payments.</li>
 * </ul>
 */
class FinancingType
{
	const DEFERRED_PAYMENT = "DEFERRED_PAYMENT";
	const EQUAL_PAYMENT = "EQUAL_PAYMENT";


}
