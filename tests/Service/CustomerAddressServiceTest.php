<?php
/* All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Service;

use GuzzleHttp\Psr7\Response;
use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\Customer\Address;
use Paysafe\PhpSdk\Service\CustomerAddressService;

class CustomerAddressServiceTest extends BasePaysafeTest
{
    const CUSTOMER_ID = "921cd968-6882-422c-ae4f-a10ddbae95ff";
    const ADDRESS_ID = "921cd968-6882-422c-ae4f-a10ddbae95fe";
    const CUSTOMER_ADDRESS_ENDPOINT = "/paymenthub/v1/customers/%s/addresses";

    private CustomerAddressService $customerAddressService;

    public function setUp(): void
    {
        parent::setUp();

        $this->customerAddressService = new CustomerAddressService($this->paysafeApiClient);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerAddressService::createAddress
     *
     * @return void
     *
     * @throws \Paysafe\PhpSdk\Exception\PaysafeSdkException
     */
    public function testCreateAddress_isSuccessful(): void
    {
        $customerAddressService = clone $this->customerAddressService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executePost')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->mockCreateAddressResponse()
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($customerAddressService, CustomerAddressService::class);
        $doReplaceService();

        $addressRequest = (new Address())
            ->nickName("Home")
            ->street("N.G.O's Colony")
            ->street2("Besdie Sri Ramakrishna P.G College")
            ->city("Nandyal")
            ->zip("518502")
            ->country("CA")
            ->state("ON")
            ->phone("647-788-3901")
            ->defaultShippingAddressIndicator(true);

        $response = $customerAddressService->createAddress(self::CUSTOMER_ID, $addressRequest);

        $this->assertNotNull($response);
        $this->assertEquals("Home", $response->getNickName());
        $this->assertEquals("N.G.O's Colony", $response->getStreet());
        $this->assertEquals("ACTIVE", $response->getStatus());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerAddressService::getAddressById
     *
     * @return void
     *
     * @throws \Paysafe\PhpSdk\Exception\PaysafeSdkException
     */
    public function testGetAddressById_isSuccessful(): void
    {
        $customerAddressService = clone $this->customerAddressService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executeGet')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->mockGetAddressResponse()
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($customerAddressService, CustomerAddressService::class);
        $doReplaceService();

        $response = $customerAddressService->getAddressById(self::CUSTOMER_ID, self::ADDRESS_ID);

        $this->assertNotNull($response);
        $this->assertEquals(self::ADDRESS_ID, $response->getId());
        $this->assertEquals("Home", $response->getNickName());
        $this->assertEquals("ACTIVE", $response->getStatus());
        $this->assertEquals("N.G.O's Colony", $response->getStreet());
        $this->assertEquals("Nandyal", $response->getCity());
        $this->assertEquals("ON", $response->getState());
        $this->assertEquals("CA", $response->getCountry());
        $this->assertEquals("518502", $response->getZip());
        $this->assertEquals("647-788-3901", $response->getPhone());
        $this->assertFalse($response->getDefaultShippingAddressIndicator());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerAddressService::getAddressById
     *
     * @return void
     */
    public function testGetAddressById_throwsExceptionOnEntityNotFoundError(): void
    {
        try {
            $customerAddressService = clone $this->customerAddressService;
            $nonExistingAddressId = "non-existing-address-id";

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
                $customerAddressService,
                CustomerAddressService::class
            );
            $doReplaceService();

            $customerAddressService->getAddressById(self::CUSTOMER_ID, $nonExistingAddressId);
            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(404, $exception->getCode());
            $this->assertEquals("5269", $exception->getError()->getCode());
            $this->assertEquals("Entity not found", $exception->getError()->getMessage());
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerAddressService::updateAddress
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function testUpdateAddress_isSuccessful(): void
    {
        $customerAddressService = clone $this->customerAddressService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executePut')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->mockUpdateAddressResponse()
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($customerAddressService, CustomerAddressService::class);
        $doReplaceService();

        $updatedRequest = (new Address())
            ->nickName("Office")
            ->street("101 Queen")
            ->street2("Unit 202")
            ->city("Toronto0")
            ->zip("M5H 2N2")
            ->country("US")
            ->state("NY")
            ->phone("903-788-3901")
            ->defaultShippingAddressIndicator(false);

        $response = $customerAddressService
            ->updateAddress(self::CUSTOMER_ID, self::ADDRESS_ID, $updatedRequest);

        $this->assertNotNull($response);
        $this->assertEquals("Office", $response->getNickName());
        $this->assertEquals("101 Queen", $response->getStreet());
        $this->assertEquals("Unit 202", $response->getStreet2());
        $this->assertEquals("Toronto0", $response->getCity());
        $this->assertEquals("NY", $response->getState());
        $this->assertEquals("US", $response->getCountry());
        $this->assertEquals("M5H 2N2", $response->getZip());
        $this->assertEquals("903-788-3901", $response->getPhone());
        $this->assertEquals("ACTIVE", $response->getStatus());
        $this->assertFalse($response->getDefaultShippingAddressIndicator());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerAddressService::updateAddress
     *
     * @return void
     */
    public function testUpdateAddress_throwsExceptionOnEntityNotFoundError(): void
    {
        try {
            $customerAddressService = clone $this->customerAddressService;
            $nonExistingAddressId = "non-existing-address-id";

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
                $customerAddressService,
                CustomerAddressService::class
            );
            $doReplaceService();

            $updatedRequest = (new Address())
                ->nickName("Office")
                ->street("101 Queen")
                ->street2("Unit 202")
                ->city("Toronto0")
                ->zip("M5H 2N2")
                ->country("US")
                ->state("NY")
                ->phone("903-788-3901")
                ->defaultShippingAddressIndicator(false);

            $response = $customerAddressService
                ->updateAddress(self::CUSTOMER_ID, $nonExistingAddressId, $updatedRequest);
            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(404, $exception->getCode());
            $this->assertEquals("5269", $exception->getError()->getCode());
            $this->assertEquals("Entity not found", $exception->getError()->getMessage());
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerAddressService::deleteAddress
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function testDeleteAddress_isSuccessful(): void
    {
        $customerAddressService = clone $this->customerAddressService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executeDelete')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->mockUpdateAddressResponse()
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($customerAddressService, CustomerAddressService::class);
        $doReplaceService();

        $customerAddressService->deleteAddress(self::CUSTOMER_ID, self::ADDRESS_ID);
        $this->assertTrue(true);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerAddressService::deleteAddress
     *
     * @return void
     */
    public function testDeleteAddress_throwsExceptionOnEntityNotFound(): void
    {
        try {
            $customerAddressService = clone $this->customerAddressService;
            $nonExistingAddressId = "non-existing-address-id";

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
                $customerAddressService,
                CustomerAddressService::class
            );
            $doReplaceService();

            $customerAddressService->deleteAddress(self::CUSTOMER_ID, $nonExistingAddressId);
            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(404, $exception->getCode());
            $this->assertEquals("5269", $exception->getError()->getCode());
            $this->assertEquals("Entity not found", $exception->getError()->getMessage());
        }
    }

    /**
     * @return string
     */
    private function mockCreateAddressResponse(): string
    {
        return "{\n" .
            "  \"id\": \"921cd968-6882-422c-ae4f-a10ddbae95ff\",\n" .
            "  \"nickName\": \"Home\",\n" .
            "  \"street\": \"N.G.O's Colony\",\n" .
            "  \"street2\": \"Besdie Sri Ramakrishna P.G College\",\n" .
            "  \"city\": \"Nandyal\",\n" .
            "  \"state\": \"ON\",\n" .
            "  \"country\": \"CA\",\n" .
            "  \"zip\": \"518502\",\n" .
            "  \"phone\": \"647-788-3901\",\n" .
            "  \"status\": \"ACTIVE\",\n" .
            "  \"defaultShippingAddressIndicator\": false\n" .
            "}";
    }

    /**
     * @return string
     */
    private function mockGetAddressResponse(): string
    {
        return "{\n" .
            "  \"id\": \"" . self::ADDRESS_ID . "\",\n" .
            "  \"nickName\": \"Home\",\n" .
            "  \"street\": \"N.G.O's Colony\",\n" .
            "  \"street2\": \"Besdie Sri Ramakrishna P.G College\",\n" .
            "  \"city\": \"Nandyal\",\n" .
            "  \"state\": \"ON\",\n" .
            "  \"country\": \"CA\",\n" .
            "  \"zip\": \"518502\",\n" .
            "  \"phone\": \"647-788-3901\",\n" .
            "  \"status\": \"ACTIVE\",\n" .
            "  \"defaultShippingAddressIndicator\": false\n" .
            "}";
    }

    /**
     * @return string
     */
    private function mockUpdateAddressResponse(): string
    {
        return "{\n" .
            "  \"id\": \"" . self::ADDRESS_ID . "\",\n" .
            "  \"nickName\": \"Office\",\n" .
            "  \"street\": \"101 Queen\",\n" .
            "  \"street2\": \"Unit 202\",\n" .
            "  \"city\": \"Toronto0\",\n" .
            "  \"state\": \"NY\",\n" .
            "  \"country\": \"US\",\n" .
            "  \"zip\": \"M5H 2N2\",\n" .
            "  \"phone\": \"903-788-3901\",\n" .
            "  \"status\": \"ACTIVE\",\n" .
            "  \"defaultShippingAddressIndicator\": false\n" .
            "}";
    }
}
