<?php
// All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE

namespace Webhook;

use Paysafe\PhpSdk\Logging\LoggingLevel;
use Paysafe\PhpSdk\Webhook\Exception\SignatureVerificationException;
use Paysafe\PhpSdk\Webhook\Exception\WebhookEventParsingException;
use Paysafe\PhpSdk\Webhook\Exception\WebhookException;
use Paysafe\PhpSdk\Webhook\WebhookHandler;
use Psr\Log\AbstractLogger;

class WebhookHandlerTest extends BasePaysafeWebhook
{
    const SECRET_KEY = "test-secret-key";

    private WebhookHandler $webhookHandler;
    private InMemoryLogger $logger;

    public function setUp(): void
    {
        $this->logger = new InMemoryLogger();
        $this->webhookHandler = new WebhookHandler($this->logger, LoggingLevel::ALL);
    }

    /**
     * @test
     * @covers WebhookHandler::parseAndValidate
     *
     * @throws WebhookException
     */
    public function parseAndValidate_validPayload_shouldReturnWebhookEvent(): void
    {
        $payload = $this->get_resource_json("valid_webhook_payload.json");
        $signature = "hVeP3JaeEpSK0CLPfQ2EPWj3gFN8xc0wkO8fH53dP/E=";

        $event = $this->webhookHandler->parseAndValidate($payload, $signature, self::SECRET_KEY);

        $this->assertNotNull($event);
        $this->assertNotEmpty($event->getPayload());
        $this->assertEquals(1, $event->getAttemptNumber());

        $this->assertTrue($this->containsEvent('Webhook signature verified successfully'));
        $this->assertTrue($this->containsEvent('Webhook event parsed successfully'));
    }

    /**
     * @test
     * @covers WebhookHandler::parseAndValidate
     *
     * @throws WebhookException
     */
    public function parseAndValidate_invalidSignature_shouldThrowSignatureVerificationException(): void
    {
        try {
            $this->webhookHandler->parseAndValidate(
                $this->get_resource_json('empty_webhook_payload.json'),
                "bad-sig",
                self::SECRET_KEY
            );

            self::fail("Expected SignatureVerificationException");
        } catch (SignatureVerificationException $exception) {
            self::assertEquals("Invalid webhook signature!", $exception->getMessage());
        }

        $this->assertTrue($this->containsEvent('Validating webhook signature'));
        $this->assertFalse($this->containsEvent('Webhook signature verified successfully'));
    }

    /**
     * @test
     * @covers WebhookHandler::parseAndValidate
     *
     * @throws WebhookException
     */
    public function parseAndValidate_invalidJson_shouldThrowParsingException(): void
    {
        $payload = "not-json";
        $signature = "f09v2+ljW+xoAnkkrpthfduyf1LyaRCMpilr5e8volk=";

        try {
            $this->webhookHandler->parseAndValidate(
                $payload,
                $signature,
                self::SECRET_KEY
            );

            self::fail("Expected SignatureVerificationException");
        } catch (WebhookEventParsingException $exception) {
            self::assertEquals("Error parsing webhook payload", $exception->getMessage());
        }

        $this->assertTrue($this->containsError('Error parsing webhook payload'));
    }

    private function containsEvent(string $needle): bool
    {
        foreach ($this->logger->events as $event) {
            if (str_contains($event['event'], $needle)) {
                return true;
            }
        }

        return false;
    }

    private function containsError(string $needle): bool
    {
        foreach ($this->logger->errorEvents as $event) {
            if (str_contains($event['event'], $needle)) {
                return true;
            }
        }

        return false;
    }
}

class InMemoryLogger extends AbstractLogger
{
    /** @var array<int,array<string,mixed>> */
    public array $events = [];

    /** @var array<int,array<string,mixed>> */
    public array $errorEvents = [];

    public function log($level, $message, array $context = []): void
    {
        $entry = ['event' => (string) $message, 'context' => $context];

        if ((string) $level === 'error') {
            $this->errorEvents[] = $entry;
            return;
        }

        $this->events[] = $entry;
    }
}
