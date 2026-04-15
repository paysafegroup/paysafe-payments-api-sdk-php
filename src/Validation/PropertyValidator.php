<?php
/*
 * All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2024. For more information see LICENSE
 */

namespace Paysafe\PhpSdk\Validation;

use InvalidArgumentException;

class PropertyValidator
{
    public static function validateApiKey(string $apiKey): void
    {
        if (empty($apiKey) || trim($apiKey) === '') {
            throw new InvalidArgumentException(ErrorMessages::MESSAGE_BLANK_API_KEY);
        }

        if (!preg_match("/^[^:\s]+:[^:\s]+$/", $apiKey)) {
            throw new InvalidArgumentException(ErrorMessages::MESSAGE_INVALID_API_KEY_FORMAT);
        }
    }

    public static function validateMaxAutomaticRetries(?int $maxAutomaticRetries): void
    {
        if ($maxAutomaticRetries !== null) {
            if ($maxAutomaticRetries > 5) {
                throw new InvalidArgumentException(
                    ErrorMessages::MESSAGE_MAXIMUM_ALLOWED_NUMBER_OF_AUTOMATIC_RETRIES
                );
            }
            if ($maxAutomaticRetries < 0) {
                throw new InvalidArgumentException(
                    ErrorMessages::MESSAGE_MAXIMUM_AUTOMATIC_RETRIES_CANNOT_BE_NEGATIVE
                );
            }
        }
    }

    public static function validateConnectTimeout(?int $connectTimeout): void
    {
        if ($connectTimeout !== null && $connectTimeout <= 0) {
            throw new InvalidArgumentException(
                ErrorMessages::MESSAGE_CONNECT_TIMEOUT_MUST_BE_A_POSITIVE_VALUE
            );
        }
    }

    public static function validateResponseTimeout(?int $responseTimeout): void
    {

        if ($responseTimeout !== null && $responseTimeout <= 0) {
            throw new InvalidArgumentException(
                ErrorMessages::MESSAGE_RESPONSE_TIMEOUT_MUST_BE_A_POSITIVE_VALUE
            );
        }
    }
}
