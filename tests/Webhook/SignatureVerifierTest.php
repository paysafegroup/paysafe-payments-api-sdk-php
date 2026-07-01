<?php
// All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE

namespace Webhook;

use Paysafe\PhpSdk\Webhook\Exception\SignatureVerificationException;
use Paysafe\PhpSdk\Webhook\SignatureVerifier;

class SignatureVerifierTest extends BasePaysafeWebhook
{
    const SECRET_KEY = "test-secret-key";
    const VALID_SIGNATURE = "hVeP3JaeEpSK0CLPfQ2EPWj3gFN8xc0wkO8fH53dP/E=";

    private string $payload;

    public function setUp(): void
    {
        parent::setUp();

        $this->payload = $this->get_resource_json("valid_webhook_payload.json");
    }

    /**
     * @test
     * @covers SignatureVerifier::verifySignature
     *
     * @return void
     */
    public function verifySignature_validSignature_shouldNotThrowException(): void
    {
        try {
            SignatureVerifier::verifySignature(
                $this->payload,
                self::VALID_SIGNATURE,
                self::SECRET_KEY
            );

            self::assertTrue(true);
        } catch (SignatureVerificationException $exception) {
            self::fail("Expected no exception, but got: " . $exception->getMessage());
        }
    }

    /**
     * @test
     * @covers SignatureVerifier::verifySignature
     *
     * @return void
     */
    public function verifySignature_invalidSignature_shouldThrowSignatureVerificationException(): void
    {
        try {
            SignatureVerifier::verifySignature(
                $this->payload,
                "invalid-signature",
                self::SECRET_KEY
            );

            self::fail("Expected SignatureVerificationException");
        } catch (SignatureVerificationException $exception) {
            $this->assertEquals("Invalid webhook signature!", $exception->getMessage());
        }
    }

    /**
     * @test
     * @covers SignatureVerifier::verifySignature
     *
     * @return void
     */
    public function verifySignature_tamperedPayload_shouldThrowSignatureVerificationException(): void
    {
        try {
            SignatureVerifier::verifySignature(
                $this->get_resource_json("tampered_webhook_payload.json"),
                self::VALID_SIGNATURE,
                self::SECRET_KEY
            );

            self::fail("Expected SignatureVerificationException");
        } catch (SignatureVerificationException $exception) {
            $this->assertEquals("Invalid webhook signature!", $exception->getMessage());
        }
    }

    /**
     * @test
     * @covers SignatureVerifier::verifySignature
     *
     * @return void
     */
    public function verifySignature_wrongKey_shouldThrowSignatureVerificationException(): void
    {
        try {
            SignatureVerifier::verifySignature(
                $this->payload,
                self::VALID_SIGNATURE,
                "wrong-key"
            );

            self::fail("Expected SignatureVerificationException");
        } catch (SignatureVerificationException $exception) {
            $this->assertEquals("Invalid webhook signature!", $exception->getMessage());
        }
    }
}
