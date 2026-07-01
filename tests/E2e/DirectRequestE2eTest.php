<?php
/**
 * All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE
 */

declare(strict_types=1);

namespace E2e;

use Paysafe\PhpSdk\Client\DirectRequestOptions;
use Paysafe\PhpSdk\PaysafeClient;

/**
 * E2E tests for PaysafeClient::directRequest covering core HTTP behaviors.
 */
class DirectRequestE2eTest extends BasePaysafeE2e
{
    private const MONITOR_ENDPOINT = '/paymenthub/v1/monitor';
    private const PAYMENT_HANDLES_ENDPOINT = '/paymenthub/v1/paymenthandles';
    private const CUSTOMERS_ENDPOINT = '/paymenthub/v1/customers';

    /**
     * @test
     * @covers \Paysafe\PhpSdk\PaysafeClient::directRequest
     */
    public function directRequest_get_monitor_isSuccessful(): void
    {
        $response = $this->paysafeClient->directRequest(
            PaysafeClient::REQUEST_METHOD_GET,
            self::MONITOR_ENDPOINT,
            null,
            null
        );

        $this->assertNotNull($response);
        $this->assertEquals(200, $response->getHttpStatusCode());
        $this->assertStringContainsString('READY', $response->getResponseBody());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\PaysafeClient::directRequest
     */
    public function directRequest_get_monitor_withCustomHeaders_isSuccessful(): void
    {
        $options = (new DirectRequestOptions())
            ->addCustomHeader('X-Correlation-Id', uniqid('corr-', true));

        $response = $this->paysafeClient->directRequest(
            PaysafeClient::REQUEST_METHOD_GET,
            self::MONITOR_ENDPOINT,
            null,
            $options
        );

        $this->assertNotNull($response);
        $this->assertEquals(200, $response->getHttpStatusCode());
        $this->assertStringContainsString('READY', $response->getResponseBody());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\PaysafeClient::directRequest
     *
     * @return array{id:string,merchantRefNum:string}
     */
    public function directRequest_post_createPaymentHandle_withObjectBody_isSuccessful(): array
    {
        $merchantRefNum = uniqid();

        $response = $this->paysafeClient->directRequest(
            PaysafeClient::REQUEST_METHOD_POST,
            self::PAYMENT_HANDLES_ENDPOINT,
            self::buildPaymentHandleRequestMap($merchantRefNum),
            (new DirectRequestOptions())->addCustomHeader('X-Correlation-Id', uniqid('corr-', true))
        );

        $this->assertNotNull($response);
        $this->assertEquals(201, $response->getHttpStatusCode());
        $this->assertStringContainsString('"status"', $response->getResponseBody());
        $this->assertStringContainsString($merchantRefNum, $response->getResponseBody());

        $id = self::extractField($response->getResponseBody(), 'id');
        $this->assertNotNull($id);

        return ['id' => $id, 'merchantRefNum' => $merchantRefNum];
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\PaysafeClient::directRequest
     * @covers \Paysafe\PhpSdk\PaysafeClient::serialize
     */
    public function directRequest_post_createPaymentHandle_withPreSerializedBody_isSuccessful(): void
    {
        $merchantRefNum = uniqid();
        $preSerializedBody = $this->paysafeClient->serialize(self::buildPaymentHandleRequestMap($merchantRefNum));

        $response = $this->paysafeClient->directRequest(
            PaysafeClient::REQUEST_METHOD_POST,
            self::PAYMENT_HANDLES_ENDPOINT,
            $preSerializedBody,
            null
        );

        $this->assertNotNull($response);
        $this->assertEquals(201, $response->getHttpStatusCode());
        $this->assertStringContainsString($merchantRefNum, $response->getResponseBody());
    }

    /**
     * @test
     * @depends directRequest_post_createPaymentHandle_withObjectBody_isSuccessful
     * @covers \Paysafe\PhpSdk\PaysafeClient::directRequest
     *
     * @param array{id:string,merchantRefNum:string} $created
     */
    public function directRequest_get_paymentHandle_byId_isSuccessful(array $created): void
    {
        $response = $this->paysafeClient->directRequest(
            PaysafeClient::REQUEST_METHOD_GET,
            self::PAYMENT_HANDLES_ENDPOINT . '/' . $created['id'],
            null,
            null
        );

        $this->assertNotNull($response);
        $this->assertEquals(200, $response->getHttpStatusCode());
        $this->assertStringContainsString($created['id'], $response->getResponseBody());
    }

    /**
     * @test
     * @depends directRequest_post_createPaymentHandle_withObjectBody_isSuccessful
     * @covers \Paysafe\PhpSdk\PaysafeClient::directRequest
     *
     * @param array{id:string,merchantRefNum:string} $created
     */
    public function directRequest_get_paymentHandles_byMerchantRefNum_withQueryParams_isSuccessful(array $created): void
    {
        $endpoint = self::PAYMENT_HANDLES_ENDPOINT
            . '?merchantRefNum=' . rawurlencode($created['merchantRefNum'])
            . '&limit=10&offset=0';

        $response = $this->paysafeClient->directRequest(
            PaysafeClient::REQUEST_METHOD_GET,
            $endpoint,
            null,
            null
        );

        $this->assertNotNull($response);
        $this->assertEquals(200, $response->getHttpStatusCode());
        $this->assertStringContainsString($created['merchantRefNum'], $response->getResponseBody());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\PaysafeClient::directRequest
     *
     * @return string created customer id
     */
    public function directRequest_post_createCustomer_withObjectBody_isSuccessful(): string
    {
        $merchantCustomerId = uniqid('', true);

        $request = [
            'merchantCustomerId' => $merchantCustomerId,
            'locale' => 'en_US',
            'profile' => [
                'firstName' => 'John',
                'lastName' => 'Doe',
                'email' => 'john.doe.directrequest@example.com',
            ],
        ];

        $response = $this->paysafeClient->directRequest(
            PaysafeClient::REQUEST_METHOD_POST,
            self::CUSTOMERS_ENDPOINT,
            $request,
            null
        );

        $this->assertNotNull($response);
        $this->assertEquals(201, $response->getHttpStatusCode());
        $this->assertStringContainsString($merchantCustomerId, $response->getResponseBody());

        $id = self::extractField($response->getResponseBody(), 'id');
        $this->assertNotNull($id);

        return $id;
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\PaysafeClient::directRequest
     */
    public function directRequest_get_nonExistentPaymentHandle_returns404(): void
    {
        $response = $this->paysafeClient->directRequest(
            PaysafeClient::REQUEST_METHOD_GET,
            self::PAYMENT_HANDLES_ENDPOINT . '/non-existent-id-00000000',
            null,
            null
        );

        $this->assertNotNull($response);
        $this->assertEquals(404, $response->getHttpStatusCode());
        $this->assertTrue(
            str_contains($response->getResponseBody(), '5269') || str_contains($response->getResponseBody(), 'error')
        );
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\PaysafeClient::directRequest
     */
    public function directRequest_post_createPaymentHandle_missingRequiredFields_returns400(): void
    {
        $invalidRequest = [
            'paymentType' => 'CARD',
        ];

        $response = $this->paysafeClient->directRequest(
            PaysafeClient::REQUEST_METHOD_POST,
            self::PAYMENT_HANDLES_ENDPOINT,
            $invalidRequest,
            null
        );

        $this->assertNotNull($response);
        $this->assertEquals(400, $response->getHttpStatusCode());
        $this->assertTrue(
            str_contains($response->getResponseBody(), 'error') || str_contains($response->getResponseBody(), '5068')
        );
    }

    /**
     * @return array<string,mixed>
     */
    private static function buildPaymentHandleRequestMap(string $merchantRefNum): array
    {
        return [
            'merchantRefNum' => $merchantRefNum,
            'transactionType' => 'PAYMENT',
            'paymentType' => 'CARD',
            'amount' => 500,
            'currencyCode' => 'USD',
            'customerIp' => '111.111.111.111',
            'accountId' => '1024790450',
            'skip3ds' => true,
            'card' => [
                'cardNum' => '4000000000002719',
                'cardExpiry' => [
                    'month' => 10,
                    'year' => 2028,
                ],
                'cvv' => '111',
                'holderName' => 'Dilip',
            ],
            'billingDetails' => [
                'street' => 'abcd',
                'city' => 'defg',
                'state' => 'AL',
                'country' => 'US',
                'zip' => '94404',
            ],
        ];
    }

    private static function extractField(string $json, string $fieldName): ?string
    {
        $decoded = json_decode($json, true);
        if (!is_array($decoded)) {
            return null;
        }

        $value = $decoded[$fieldName] ?? null;

        return is_scalar($value) ? (string) $value : null;
    }
}

