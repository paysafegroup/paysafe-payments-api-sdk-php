<?php
/* All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

declare(strict_types=1);
namespace Paysafe\PhpSdk\Webhook;

use Paysafe\PhpSdk\Config\ObjectMapperConfiguration;
use Paysafe\PhpSdk\Webhook\Exception\WebhookEventParsingException;
use Paysafe\PhpSdk\Webhook\Exception\WebhookException;
use Paysafe\PhpSdk\Webhook\Model\WebhookEvent;
use Paysafe\PhpSdk\Logging\LoggingLevel;
use Psr\Log\LoggerInterface;

class WebhookHandler
{
    private LoggerInterface $logger;
    private string $loggingLevel;

    public function __construct(LoggerInterface $logger, string $loggingLevel = LoggingLevel::ERROR)
    {
        $this->logger = $logger;
        $this->loggingLevel = $loggingLevel;
    }

    private function logEvent(string $event, array $context = []): void
    {
        if ($this->loggingLevel === LoggingLevel::ALL) {
            $this->logger->info($event, $context);
        }
    }

    private function logError(string $event, \Throwable $error, array $context = []): void
    {
        $context['exception'] = $error;
        $this->logger->error($event, $context);
    }

    /**
     * @param string $payload
     * @param string $signHeader
     * @param string $secretKey
     *
     * @return WebhookEvent
     *
     * @throws WebhookException
     */
    public function parseAndValidate(string $payload, string $signHeader, string $secretKey): WebhookEvent
    {
        $this->logEvent("Validating webhook signature");
        SignatureVerifier::verifySignature($payload, $signHeader, $secretKey);
        $this->logEvent("Webhook signature verified successfully");

        $this->logEvent("Parsing webhook payload");
        $payloadObject = json_decode($payload, true) ?? null;

        if (is_null($payloadObject)) {
            $exception = new WebhookEventParsingException("Error parsing webhook payload");
            $this->logError("Error parsing webhook payload", $exception, ['payload' => $payload]);
            throw $exception;
        }

        /** @var WebhookEvent $event */
        $event = ObjectMapperConfiguration::deserialize($payload, WebhookEvent::class);
        $this->logEvent("Webhook event parsed successfully", ['event' => $event]);

        return $event;
    }
}
