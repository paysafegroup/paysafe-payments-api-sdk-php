<?php
/* All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Service;

use GuzzleHttp\Psr7\Response;
use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\Common\Profile\DateOfBirth;
use Paysafe\PhpSdk\Model\Customer\CustomerRequest;
use Paysafe\PhpSdk\Service\CustomerService;

class CustomerServiceTest extends BasePaysafeService
{
    const CUSTOMERS_ENDPOINT = "/paymenthub/v1/customers";
    const CUSTOMER_ID = "d60fc496-9023-4641-890e-e05c852d2ac4";
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
                    $this->get_resource_json('customer/create_customer_response.json')
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
                    $this->get_resource_json('customer/create_customer_using_single_user_payment_handle_token_response.json')
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
                        $this->get_resource_json("error/404_entity_not_found_response.json")
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
                    $this->get_resource_json('customer/get_customer_profile_by_customer_id_with_subcomponents_response.json')
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
                        $this->get_resource_json("error/404_entity_not_found_response.json")
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
                    $this->get_resource_json('customer/get_customer_using_merchant_customer_id_response.json')
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
        $this->assertEmpty($response->getAddresses());
        $this->assertEmpty($response->getPaymentHandles());
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
                        $this->get_resource_json("error/404_entity_not_found_response.json")
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
                    $this->get_resource_json('customer/update_customer_response.json')
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
                        $this->get_resource_json("error/404_entity_not_found_response.json")
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
}
