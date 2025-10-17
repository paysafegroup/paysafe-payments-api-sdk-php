<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card\Enums;

/**
 * Enum representing the 3D Secure signature verification status.
 * <p>The {@code SignatureStatus} enum defines the result of the 3D Secure signature verification process
 * for a given transaction.</p>
 * <p>Enum Values:</p>
 * <ul>
 *   <li><strong>Y:</strong> All transaction and signature checks were satisfied,
 *      meaning the signature verification passed successfully.</li>
 *   <li><strong>N:</strong> At least one transaction or signature check failed,
 *      meaning the signature verification did not pass.</li>
 * </ul>
 */
class SignatureString
{
	const Y = "Y";
	const N = "N";


}
