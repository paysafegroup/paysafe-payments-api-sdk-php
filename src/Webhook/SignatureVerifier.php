<?php
/* All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

declare(strict_types=1);
namespace Paysafe\PhpSdk\Webhook;

use Paysafe\PhpSdk\Webhook\Exception\SignatureVerificationException;

class SignatureVerifier
{
    /**
     * @param string $payload
     * @param string $signHeader
     * @param string $secretKey
     *
     * @return void
     *
     * @throws SignatureVerificationException
     */
    public static function verifySignature(string $payload, string $signHeader, string $secretKey): void
    {
        $computedSignature = self::computeHmacSha256Base64($payload, $secretKey);

        $valid = hash_equals(
            $computedSignature,
            $signHeader
        );

        if (!$valid) {
            throw new SignatureVerificationException("Invalid webhook signature!");
        }
    }

    /**
     * @param string $payload
     * @param string $secretKey
     *
     * @return string
     */
    private static function computeHmacSha256Base64(string $payload, string $secretKey): string
    {
        return base64_encode(
            hash_hmac(
                'sha256',
                $payload,
                $secretKey,
                true
            )
        );
    }
}
