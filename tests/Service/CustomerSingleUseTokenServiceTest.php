<?php
/* All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Service;

use GuzzleHttp\Psr7\Response;
use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\Customer\SingleUseCustomerToken\SingleUseCustomerTokenRequest;
use Paysafe\PhpSdk\Service\CustomerSingleUseTokenService;

class CustomerSingleUseTokenServiceTest extends BasePaysafeTest
{
    const CREATE_CUSTOMER_SINGLE_USE_TOKEN_ENDPOINT = "/paymenthub/v1/customers/%s/singleusecustomertokens";
    const GET_CUSTOMER_SINGLE_USE_TOKEN_ENDPOINT = "/paymenthub/v1/singleusecustomertokens/%s";
    const CUSTOMER_ID = "73ed165d-de44-4c5f-990c-392a84708cc1";
    const NON_EXISTING_CUSTOMER_ID = "non-existing-customer-id";
    const SINGLE_USE_TOKEN_ID = "86211e38-c467-4a3f-bbc6-7c739f67b01f";
    const NON_EXISTING_TOKEN_ID = "non-existing-token-id";


    private CustomerSingleUseTokenService $customerSutService;

    public function setUp(): void
    {
        parent::setUp();

        $this->customerSutService = new CustomerSingleUseTokenService($this->paysafeApiClient);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerSingleUseTokenService::createSingleUseCustomerToken
     *
     * @return void
     *
     * @throws \Paysafe\PhpSdk\Exception\PaysafeSdkException
     */
    public function testCreateSingleUseCustomerToken_isSuccessful(): void
    {
        $customerService = clone $this->customerSutService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executePost')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->mockCreateSingleUseCustomerTokenResponse()
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($customerService, CustomerSingleUseTokenService::class);
        $doReplaceService();

        $requestBody = (new SingleUseCustomerTokenRequest())
            ->merchantRefNum("merchantRefNum")
            ->paymentType(['CARD']);

        $response = $customerService->createSingleUseCustomerToken(
            self::CUSTOMER_ID,
            $requestBody
        );

        $this->assertNotNull($response);
        $this->assertNotNull($response->getId());
        $this->assertNotNull($response->getSingleUseCustomerToken());
        $this->assertEquals("ACTIVE", $response->getStatus());
        $this->assertEquals(self::CUSTOMER_ID, $response->getCustomerId());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerSingleUseTokenService::createSingleUseCustomerToken
     *
     * @return void
     */
    public function testCreateSingleUseCustomerToken_throwsExceptionOnEntityNotFoundError(): void
    {
        try {
            $customerService = clone $this->customerSutService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executePost')
                ->willReturn(
                    new Response(
                        404,
                        [
                            'Content-Type' => 'application/json',
                        ],
                        self::ENTITY_NOT_FOUND_ERROR_RESPONSE
                    )
                );
            $replaceService = function() use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo(
                $customerService,
                CustomerSingleUseTokenService::class
            );
            $doReplaceService();

            $customerService->createSingleUseCustomerToken(
                self::NON_EXISTING_CUSTOMER_ID,
                new SingleUseCustomerTokenRequest()
            );

            $this->fail('exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(404, $exception->getCode());
            $this->assertEquals("5269", $exception->getError()->getCode());
            $this->assertEquals("Entity not found", $exception->getError()->getMessage());
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerSingleUseTokenService::getSingleUseCustomerToken
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function testGetSingleUseCustomerToken_isSuccessful(): void
    {
        $customerService = clone $this->customerSutService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executeGet')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->mockCreateSingleUseCustomerTokenResponse()
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($customerService, CustomerSingleUseTokenService::class);
        $doReplaceService();

        $response = $customerService->getSingleUseCustomerToken(self::SINGLE_USE_TOKEN_ID);

        $this->assertNotNull($response);
        $this->assertNotNull($response->getTimeToLiveSeconds());
        $this->assertEquals(self::SINGLE_USE_TOKEN_ID, $response->getId());
        $this->assertEquals("SPt2i5lriNH9owTA", $response->getSingleUseCustomerToken());
        $this->assertEquals("ACTIVE", $response->getStatus());
        $this->assertEquals(self::CUSTOMER_ID, $response->getCustomerId());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerSingleUseTokenService::getSingleUseCustomerToken
     *
     * @return void
     */
    public function testGetSingleUseCustomerToken_tokenNotFound_throwsExceptionOnEntityNotFound(): void
    {
        try {
            $customerService = clone $this->customerSutService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executeGet')
                ->willReturn(
                    new Response(
                        404,
                        [
                            'Content-Type' => 'application/json',
                        ],
                        self::ENTITY_NOT_FOUND_ERROR_RESPONSE
                    )
                );
            $replaceService = function() use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo(
                $customerService,
                CustomerSingleUseTokenService::class
            );
            $doReplaceService();

            $customerService->getSingleUseCustomerToken(self::NON_EXISTING_CUSTOMER_ID);

            $this->fail('exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(404, $exception->getCode());
            $this->assertEquals("5269", $exception->getError()->getCode());
            $this->assertEquals("Entity not found", $exception->getError()->getMessage());
        }
    }

    /**
     * @return string
     */
    private function mockCreateSingleUseCustomerTokenResponse(): string
    {
        return "{\n"
            . "  \"id\": \"86211e38-c467-4a3f-bbc6-7c739f67b01f\",\n"
            . "  \"timeToLiveSeconds\": 899,\n"
            . "  \"status\": \"ACTIVE\",\n"
            . "  \"singleUseCustomerToken\": \"SPt2i5lriNH9owTA\",\n"
            . "  \"locale\": \"en_US\",\n"
            . "  \"customerId\": \"73ed165d-de44-4c5f-990c-392a84708cc1\"\n"
            . "}";
    }
}
