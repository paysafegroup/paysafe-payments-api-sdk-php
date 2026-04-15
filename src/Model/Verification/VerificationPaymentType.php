<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Verification;

use Paysafe\PhpSdk\Model\BaseModel;
use InvalidArgumentException;

/**
 * This is the payment type associated with the Payment Handle used for this request.
 */
class VerificationPaymentType extends BaseModel
{
    public const CARD = "CARD";
    public const INTERAC_ETRANSFER = "INTERAC_ETRANSFER";
    public const MAZOOMA = "MAZOOMA";
    public const SIGHTLINE = "SIGHTLINE";
    public const VIPPREFERRED = "VIPPREFERRED";
    public const SKRILL = "SKRILL";
    public const NETELLER = "NETELLER";

    private static array $values = [
        self::CARD,
        self::INTERAC_ETRANSFER,
        self::MAZOOMA,
        self::SIGHTLINE,
        self::VIPPREFERRED,
        self::SKRILL,
        self::NETELLER
    ];

    /**
     * Convert a string value to a VerificationPaymentType constant.
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
