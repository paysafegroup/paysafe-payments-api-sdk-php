<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card\Enums;

/**
 * Enum representing the processing rails used for card transactions.
 * <p>It indicates whether the transaction is processed via a pinless network
 * or through the regular card scheme network.</p>
 * <p>Enum Values:</p>
 * <ul>
 *   <li><strong>PINLESS:</strong>
 *      The transaction is processed using a pinless card transaction method, bypassing the need for a PIN.
 *  </li>
 *   <li><strong>CARD_SCHEME_ROUTED:</strong> The transaction is processed through the regular card scheme network,
 *      where the standard card network
 *   routing applies.</li>
 * </ul>
 */
class ProcessingRails
{
	const PINLESS = "PINLESS";
	const CARD_SCHEME_ROUTED = "CARD_SCHEME_ROUTED";


}
