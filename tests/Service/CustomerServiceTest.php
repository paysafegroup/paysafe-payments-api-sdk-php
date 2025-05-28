<?php
/* All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Service;

use GuzzleHttp\Psr7\Response;
use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\Common\Profile\DateOfBirth;
use Paysafe\PhpSdk\Model\Customer\CustomerRequest;
use Paysafe\PhpSdk\Service\CustomerService;

class CustomerServiceTest extends BasePaysafeTest
{
    const CUSTOMERS_ENDPOINT = "/paymenthub/v1/customers";
    const CUSTOMER_ID = "921cd968-6882-422c-ae4f-a10ddbae95ff";
    const NON_EXISTING_CUSTOMER_ID = "non-existing-customer-id";
    const MERCHANT_CUSTOMER_ID = "merchant@email.com";
    const FIELDS_PARAM_VALUES_REGEX = "addresses,paymenthandles|paymenthandles,addresses";

    private CustomerService $customerService;

    public function setUp(): void
    {
        parent::setUp();

        $this->customerService = new CustomerService($this->paysafeApiClient);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerService::createCustomer
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function testCreateCustomer_isSuccessful(): void
    {
        $customerService = clone $this->customerService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executePost')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->mockCreateCustomerResponse()
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($customerService, CustomerService::class);
        $doReplaceService();

        $customerRequest = (new CustomerRequest())
            ->merchantCustomerId("546456451")
            ->locale("en_US")
            ->firstName("John")
            ->middleName("James")
            ->dateOfBirth((new DateOfBirth())
                ->day(24)
                ->month(10)
                ->year(1981)
            )
            ->email("john.smith@email.com")
            ->phone("777-444-8888")
            ->ip("192.0.126.111")
            ->gender('M')
            ->nationality("Canadian")
            ->cellPhone("777-555-8888");

        $customer = $customerService->createCustomer($customerRequest);

        $this->assertNotNull($customer);
        $this->assertEquals("ACTIVE", $customer->getStatus());
        $this->assertEquals("546456451", $customer->getMerchantCustomerId());
        $this->assertEquals("PPlfJ2gmQoYAQ1d", $customer->getPaymentToken());
        $this->assertEmpty($customer->getPaymentHandles());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerService::createCustomer
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function testCreateCustomerUsingSingleUsePaymentHandleToken_isSuccessful(): void
    {
        $customerService = clone $this->customerService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executePost')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->mockCreateCustomerUsingSingleUsePaymentHandleToken()
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($customerService, CustomerService::class);
        $doReplaceService();

        $customerRequest = (new CustomerRequest())
            ->merchantCustomerId("546456451")
            ->locale("en_US")
            ->firstName("John")
            ->middleName("James")
            ->dateOfBirth((new DateOfBirth())
                ->day(24)
                ->month(10)
                ->year(1981)
            )
            ->email("john.smith@email.com")
            ->phone("777-444-8888")
            ->ip("192.0.126.111")
            ->gender('M')
            ->nationality("Canadian")
            ->cellPhone("777-555-8888")
            ->paymentHandleTokenFrom("SCAXH2IawyUMX9BG")
            ->accountId("1009688230");

        $customer = $customerService->createCustomer($customerRequest);

        $this->assertNotNull($customer);
        $this->assertEquals("ACTIVE", $customer->getStatus());
        $this->assertEquals("f8303a052", $customer->getMerchantCustomerId());
        $this->assertEquals("PNWaCnbFb7Y5zUk", $customer->getPaymentToken());
        $this->assertNotNull($customer->getPaymentHandles());
        $this->assertCount(1, $customer->getPaymentHandles());
        $this->assertEquals(
            "e6ad67f5-16f1-4be6-8944-0b897e3b1380",
            $customer->getPaymentHandles()[0]->getId()
        );
        $this->assertEquals("Dilip", $customer->getPaymentHandles()[0]->getCard()->getHolderName());
        $this->assertEquals("453091", $customer->getPaymentHandles()[0]->getCard()->getCardBin());
        $this->assertNotNull($customer->getAddresses());
        $this->assertCount(1, $customer->getAddresses());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerService::deleteCustomer
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function testDeleteCustomer_isSuccessful(): void
    {
        $customerService = clone $this->customerService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executeDelete')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    json_encode([])
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($customerService, CustomerService::class);
        $doReplaceService();

        $customerService->deleteCustomer(self::CUSTOMER_ID);

        $this->assertTrue(true);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerService::deleteCustomer
     *
     * @return void
     */
    public function testDeleteCustomer_throwsExceptionOnEntityNotFoundError(): void
    {
        try {
            $customerService = clone $this->customerService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executeDelete')
                ->willReturn(
                    new Response(
                        404,
                        [
                            'Content-Type' => 'application/json',
                        ],
                        self::ENTITY_NOT_FOUND_ERROR_RESPONSE
                    )
                );
            $replaceService = function () use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo(
                $customerService,
                CustomerService::class
            );
            $doReplaceService();

            $customerService->deleteCustomer(self::NON_EXISTING_CUSTOMER_ID);

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(404, $exception->getCode());
            $this->assertEquals("5269", $exception->getError()->getCode());
            $this->assertEquals("Entity not found", $exception->getError()->getMessage());
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerService::getCustomerById
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function testGetCustomerById_isSuccessful(): void
    {
        $customerService = clone $this->customerService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executeGet')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->mockCreateCustomerUsingSingleUsePaymentHandleToken()
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($customerService, CustomerService::class);
        $doReplaceService();

        $response = $customerService->getCustomerById(self::CUSTOMER_ID, ['addresses', 'paymenthandles']);

        $this->assertNotNull($response);
        $this->assertNotEmpty($response->getAddresses());
        $this->assertNotEmpty($response->getPaymentHandles());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerService::getCustomerById
     *
     * @return void
     */
    public function testGetCustomerById_throwsExceptionOnEntityNotFoundError(): void
    {
        try {
            $customerService = clone $this->customerService;

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
            $replaceService = function () use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo(
                $customerService,
                CustomerService::class
            );
            $doReplaceService();

            $customerService->getCustomerById(self::NON_EXISTING_CUSTOMER_ID, null);
            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(404, $exception->getCode());
            $this->assertEquals("5269", $exception->getError()->getCode());
            $this->assertEquals("Entity not found", $exception->getError()->getMessage());
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerService::getCustomerByMerchantCustomerId
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function testGetCustomerByMerchantCustomerId_isSuccessful(): void
    {
        $customerService = clone $this->customerService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executeGet')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->mockCreateCustomerUsingSingleUsePaymentHandleToken()
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($customerService, CustomerService::class);
        $doReplaceService();

        $response = $customerService->getCustomerByMerchantCustomerId(
            self::MERCHANT_CUSTOMER_ID,
            ['addresses', 'paymenthandles']
        );

        $this->assertNotNull($response);
        $this->assertNotEmpty($response->getAddresses());
        $this->assertNotEmpty($response->getPaymentHandles());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerService::getCustomerByMerchantCustomerId
     *
     * @return void
     */
    public function testGetCustomerByMerchantCustomerId_throwsExceptionOnEntityNotFoundError(): void
    {
        try {
            $customerService = clone $this->customerService;

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
            $replaceService = function () use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo(
                $customerService,
                CustomerService::class
            );
            $doReplaceService();

            $customerService->getCustomerByMerchantCustomerId(
                self::NON_EXISTING_CUSTOMER_ID,
                null
            );
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(404, $exception->getCode());
            $this->assertEquals("5269", $exception->getError()->getCode());
            $this->assertEquals("Entity not found", $exception->getError()->getMessage());
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerService::updateCustomer
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function testUpdateCustomer_isSuccessful(): void
    {
        $customerService = clone $this->customerService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executePut')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->mockUpdateCustomerResponse()
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($customerService, CustomerService::class);
        $doReplaceService();

        $updateCustomerRequest = (new CustomerRequest())
            ->merchantCustomerId("546456451")
            ->locale("en_US")
            ->firstName("John")
            ->middleName("James")
            ->lastName("Smith")
            ->dateOfBirth((new DateOfBirth())
                ->day(24)
                ->month(10)
                ->year(1981)
            )
            ->gender('M')
            ->email("johnjames.smith@email.com")
            ->phone("777-444-9999")
            ->cellPhone("777-555-8888")
            ->nationality("Canadian")
            ->ip("192.0.126.111")
            ->paymentHandleTokenFrom("PPlfJ2gmQoYAQ1d");

        $response = $customerService->updateCustomer(self::CUSTOMER_ID, $updateCustomerRequest);

        $this->assertNotNull($response);
        $this->assertEquals(self::CUSTOMER_ID, $response->getId());
        $this->assertEquals("ACTIVE", $response->getStatus());
        $this->assertEquals("546456451", $response->getMerchantCustomerId());
        $this->assertEquals("johnjames.smith@email.com", $response->getEmail());
        $this->assertEquals("777-444-9999", $response->getPhone());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerService::updateCustomer
     *
     * @return void
     */
    public function testUpdateCustomer_throwsExceptionOnEntityNotFoundError(): void
    {
        try {
            $customerService = clone $this->customerService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executePut')
                ->willReturn(
                    new Response(
                        404,
                        [
                            'Content-Type' => 'application/json',
                        ],
                        self::ENTITY_NOT_FOUND_ERROR_RESPONSE
                    )
                );
            $replaceService = function () use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo(
                $customerService,
                CustomerService::class
            );
            $doReplaceService();

            $customerService->updateCustomer(self::NON_EXISTING_CUSTOMER_ID, new CustomerRequest());
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(404, $exception->getCode());
            $this->assertEquals("5269", $exception->getError()->getCode());
            $this->assertEquals("Entity not found", $exception->getError()->getMessage());
        }
    }

    /**
     * @return string
     */
    private function mockCreateCustomerResponse(): string
    {
        return "{\n"
        . "  \"id\": \"921cd968-6882-422c-ae4f-a10ddbae95ff\",\n"
        . "  \"status\": \"ACTIVE\",\n"
        . "  \"merchantCustomerId\": \"546456451\",\n"
        . "  \"locale\": \"en_US\",\n"
        . "  \"firstName\": \"John\",\n"
        . "  \"middleName\": \"James\",\n"
        . "  \"lastName\": \"Smith\",\n"
        . "  \"dateOfBirth\": {\n"
        . "    \"day\": 24,\n"
        . "    \"month\": 10,\n"
        . "    \"year\": 1981\n"
        . "  },\n"
        . "  \"gender\": \"M\",\n"
        . "  \"email\": \"john.smith@email.com\",\n"
        . "  \"phone\": \"777-444-8888\",\n"
        . "  \"cellPhone\": \"777-555-8888\",\n"
        . "  \"nationality\": \"Canadian\",\n"
        . "  \"ip\": \"192.0.126.111\",\n"
        . "  \"paymentToken\": \"PPlfJ2gmQoYAQ1d\"\n"
        . "}";
    }

    /**
     * @return string
     */
    private function mockCreateCustomerUsingSingleUsePaymentHandleToken(): string
    {
        return "{\n"
        . "  \"id\": \"d60fc496-9023-4641-890e-e05c852d2ac4\",\n"
        . "  \"status\": \"ACTIVE\",\n"
        . "  \"merchantCustomerId\": \"f8303a052\",\n"
        . "  \"accountId\": \"1009688230\",\n"
        . "  \"locale\": \"en_US\",\n"
        . "  \"firstName\": \"John\",\n"
        . "  \"middleName\": \"James\",\n"
        . "  \"lastName\": \"Smith\",\n"
        . "  \"dateOfBirth\": {\n"
        . "    \"day\": 24,\n"
        . "    \"month\": 10,\n"
        . "    \"year\": 1981\n"
        . "  },\n"
        . "  \"gender\": \"M\",\n"
        . "  \"email\": \"john.smith@email.com\",\n"
        . "  \"phone\": \"777-444-8888\",\n"
        . "  \"cellPhone\": \"777-555-8888\",\n"
        . "  \"nationality\": \"Canadian\",\n"
        . "  \"ip\": \"192.0.126.111\",\n"
        . "  \"paymentToken\": \"PNWaCnbFb7Y5zUk\",\n"
        . "  \"addresses\": [\n"
        . "    {\n"
        . "      \"id\": \"c8af2f97-7d89-413c-80d9-7f3a0c8f5da6\",\n"
        . "      \"nickName\": \"Home\",\n"
        . "      \"street2\": \"Unit 201\",\n"
        . "      \"city\": \"Toronto\",\n"
        . "      \"country\": \"CA\",\n"
        . "      \"zip\": \"M5H 2N2\",\n"
        . "      \"status\": \"ACTIVE\",\n"
        . "      \"street\": \"100 Queen\"\n"
        . "    }\n"
        . "  ],\n"
        . "  \"paymentHandleTokenFrom\": \"SCAXH2IawyUMX9BG\",\n"
        . "  \"paymentHandles\": [\n"
        . "    {\n"
        . "      \"id\": \"e6ad67f5-16f1-4be6-8944-0b897e3b1380\",\n"
        . "      \"merchantRefNum\": \"bb898a885b23c1604f4b\",\n"
        . "      \"status\": \"INITIATED\",\n"
        . "      \"usage\": \"MULTI_USE\",\n"
        . "      \"paymentType\": \"CARD\",\n"
        . "      \"executionMode\": \"SYNCHRONOUS\",\n"
        . "      \"paymentHandleToken\": \"CPFjDfDKp7SMuhL\",\n"
        . "      \"card\": {\n"
        . "        \"lastDigits\": \"2345\",\n"
        . "        \"cardExpiry\": {\n"
        . "          \"month\": \"10\",\n"
        . "          \"year\": \"2025\"\n"
        . "        },\n"
        . "        \"cardBin\": \"453091\",\n"
        . "        \"cardType\": \"VI\",\n"
        . "        \"holderName\": \"Dilip\",\n"
        . "        \"status\": \"ACTIVE\",\n"
        . "        \"cardCategory\": \"CREDIT\",\n"
        . "        \"issuingCountry\": \"US\"\n"
        . "      },\n"
        . "      \"billingDetailsId\": \"c8af2f97-7d89-413c-80d9-7f3a0c8f5da6\"\n"
        . "    }\n"
        . "  ]\n"
        . "}";
    }

    /**
     * @return string
     */
    private function mockUpdateCustomerResponse(): string
    {
        return "{\n"
        . "  \"id\": \"921cd968-6882-422c-ae4f-a10ddbae95ff\",\n"
        . "  \"status\": \"ACTIVE\",\n"
        . "  \"merchantCustomerId\": \"546456451\",\n"
        . "  \"locale\": \"en_US\",\n"
        . "  \"firstName\": \"John\",\n"
        . "  \"middleName\": \"James\",\n"
        . "  \"lastName\": \"Smith\",\n"
        . "  \"dateOfBirth\": {\n"
        . "    \"day\": 24,\n"
        . "    \"month\": 10,\n"
        . "    \"year\": 1981\n"
        . "  },\n"
        . "  \"gender\": \"M\",\n"
        . "  \"email\": \"johnjames.smith@email.com\",\n"
        . "  \"phone\": \"777-444-9999\",\n"
        . "  \"cellPhone\": \"777-555-8888\",\n"
        . "  \"nationality\": \"Canadian\",\n"
        . "  \"ip\": \"192.0.126.111\",\n"
        . "  \"paymentToken\": \"PPlfJ2gmQoYAQ1d\"\n"
        . "}";
    }
}
