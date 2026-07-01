<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Verification\Enums;

/**
 * This is the status of the verification request. Possible values are: - RECEIVED - A verification request was received from merchant, but it has not yet been sent to downstream gateway. - ERROR - The verification has errored - failed for non-business reason (non http status 402 error). - FAILED - The verification has failed and the downstream gateway has returned an error (http status 402) for some business reason. - COMPLETED - The verification was completed successfully.
 */
class VerificationStatus
{
    const COMPLETED = 'COMPLETED';
    const FAILED = 'FAILED';
    const RECEIVED = 'RECEIVED';
    const ERROR = 'ERROR';
}
