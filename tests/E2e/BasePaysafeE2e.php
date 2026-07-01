<?php
/**
 * All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE
 */

namespace E2e;

use Exception;
use Paysafe\PhpSdk\Config\ObjectMapperConfiguration;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Logging\LoggingLevel;
use Paysafe\PhpSdk\Model\PaymentHandle\PaymentHandle;
use Paysafe\PhpSdk\Model\PaymentHandle\PaymentHandleRequest;
use Paysafe\PhpSdk\PaysafeClient;
use PHPUnit\Framework\TestCase;

abstract class BasePaysafeE2e extends TestCase
{
    const REQUEST_UNSUCCESSFUL = "Paysafe Payments API request unsuccessful";

    protected string $baseUrl;
    protected string $apiKey;
    protected PaysafeClient $paysafeClient;

    /**
     * Set up configuration before running tests.
     *
     * @throws Exception
     */
    public function setUp(): void
    {
        $configFile = realpath(__DIR__ . "/resources/application.properties");

        if (!file_exists($configFile)) {
            throw new Exception("Configuration file not found: application.properties");
        }

        $properties = parse_ini_file($configFile);
        $this->baseUrl = $properties['paysafe_base_url'] ?? '';
        $this->apiKey = $properties['paysafe_api_key'] ?? '';

        $this->paysafeClient = new PaysafeClient($this->apiKey);
        $this->paysafeClient->loggingLevel(LoggingLevel::ALL);
        $this->paysafeClient->overrideBaseUrl($this->baseUrl);
    }

    /**
     * Create a payment handle via Paysafe API.
     *
     * @return PaymentHandle
     *
     * @throws PaysafeSdkException
     */
    public function createPayablePaymentHandle(): PaymentHandle
    {
        /** @var PaymentHandleRequest $paymentHandleRequest */
        $paymentHandleRequest = self::readObjectFromFile(
            "json/paymenthandle/create_paymenthandle_request_card_skip3ds.json",
            PaymentHandleRequest::class
        );
        $paymentHandleRequest->setMerchantRefNum((string)uniqid());
        $paymentHandleRequest->addAdditionalParameter('skip3ds', true);

        return $this->paysafeClient->paymentHandleService()->createPaymentHandle($paymentHandleRequest);
    }

    /**
     * Reads a JSON file and returns an associative array.
     *
     * @param string $jsonPath
     * @param string $returnType
     *
     * @return object
     *
     * @throws Exception
     */
    public static function readObjectFromFile(string $jsonPath, string $returnType): object
    {
        $filePath = realpath(__DIR__ . "/resources/$jsonPath");
        if (!file_exists($filePath)) {
            throw new Exception("File not found: $jsonPath");
        }
        $jsonContent = file_get_contents($filePath);

        return ObjectMapperConfiguration::deserialize($jsonContent, $returnType);
    }

    /**
     *
     * @param PaysafeSdkException $exception
     *
     * @return void
     */
    protected function assertionsEntityNotFound(PaysafeSdkException $exception): void
    {
        $this->assertEquals(self::REQUEST_UNSUCCESSFUL, $exception->getMessage());
        $this->assertEquals(404, $exception->getCode());
        $this->assertEquals("5269", $exception->getError()->getCode());
        $this->assertEquals("Entity not found", $exception->getError()->getMessage());
        $this->assertCount(1, $exception->getError()->getDetails());
        $this->assertEquals(
            "The ID(s) specified in the URL do not correspond to the values in the system.",
            $exception->getError()->getDetails()[0]
        );
    }

    /**
     * @param PaysafeSdkException $exception
     *
     * @return void
     */
    protected function assertionsFieldErrors(PaysafeSdkException $exception): void
    {
        $this->assertEquals(400, $exception->getCode());
        $this->assertEquals("5068", $exception->getError()->getCode());
        $this->assertEquals("Field error(s)", $exception->getError()->getMessage());
        $this->assertCount(1, $exception->getError()->getDetails());
        $this->assertEquals(
            "Either you submitted a request that is missing a mandatory field "
            . "or the value of a field does not match the format expected.",
            $exception->getError()->getDetails()[0]
        );
    }
}
