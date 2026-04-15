<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Verification;

use Paysafe\PhpSdk\Model\BaseModel;

use InvalidArgumentException;

/**
 * This is the status of the verification request. Possible values are:
 * <ul>
 *  <li> RECEIVED - A verification request was received from merchant,
 *      but it has not yet been sent to downstream gateway.</li>
 *  <li> ERROR - The verification has errored - failed for non-business reason (non http status 402 error).</li>
 *  <li> FAILED - The verification has failed and the downstream gateway has returned
 *      an error (http status 402) for some business reason.</li>
 *  <li> COMPLETED - The verification was completed successfully.</li>
 * </ul>
 */
class VerificationStatus extends BaseModel
{
    public const COMPLETED = "COMPLETED";
    public const FAILED = "FAILED";
    public const RECEIVED = "RECEIVED";
    public const ERROR = "ERROR";

    private static array $values = [
        self::COMPLETED,
        self::FAILED,
        self::RECEIVED,
        self::ERROR
    ];

    /**
     * Convert a string value to a VerificationStatus constant.
     *
     * @param string $value
     * @return string
     * @throws InvalidArgumentException
     */
    public static function fromValue(string $value): string {
        $upperValue = strtoupper($value);

        if (in_array($upperValue, self::$values, true)) {
            return $upperValue;
        }

        throw new InvalidArgumentException("Unexpected value '" . $value . "'");
    }
}
