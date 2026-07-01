<?php
/**
 * All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE
 */

namespace E2e;

use Exception;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\Customer\Address;
use Paysafe\PhpSdk\Model\Customer\Customer;
use Paysafe\PhpSdk\Model\Customer\CustomerRequest;


class CustomAddressE2eTest extends BasePaysafeE2e
{
    const GET_CUSTOMER_ADDRESS_RESPONSE_JSON_PATH = "json/customer/get_customer_address_by_id_response.json";
    const CREATE_CUSTOMER_ADDRESS_REQUEST_JSON_PATH = "json/customer/create_customer_address_request.json";
    const CREATE_CUSTOMER_ADDRESS_RESPONSE_JSON_PATH = "json/customer/create_customer_address_response.json";
    const NON_EXISTING_CUSTOMER_ID = "non-existing-customer-id";
    const NON_EXISTING_ADDRESS_ID = "non-existing-address-id";
    const UPDATE_CUSTOMER_ADDRESS_REQUEST_JSON_PATH = "json/customer/update_customer_address_request.json";
    const UPDATE_CUSTOMER_ADDRESS_RESPONSE_JSON_PATH = "json/customer/update_customer_address_response.json";

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerAddressService::createAddress
     *
     * @return void
     *
     * @throws PaysafeSdkException
     * @throws Exception
     */
    public function createCustomerAddress_isSuccessful(): void
    {
        $createdCustomer = $this->createCustomer();

        /** @var Address $addressRequest */
        $addressRequest = $this->readObjectFromFile(
            self::CREATE_CUSTOMER_ADDRESS_REQUEST_JSON_PATH,
            Address::class
        );

        $createdAddress = $this->paysafeClient
            ->customerAddressService()
            ->createAddress($createdCustomer->getId(), $addressRequest);

        /** @var Address $expectedAddress */
        $expectedAddress = $this->readObjectFromFile(
            self::CREATE_CUSTOMER_ADDRESS_RESPONSE_JSON_PATH,
            Address::class
        );
        $expectedAddress->setId($createdAddress->getId());
        $expectedAddress->setNickName($addressRequest->getNickName());
        $this->assertEquals($expectedAddress, $createdAddress);
    }

    /**
     * @return Customer
     *
     * @throws Exception
     */
    private function createCustomer(): Customer
    {
        /** @var CustomerRequest $customerRequest */
        $customerRequest = $this->readObjectFromFile(
            "json/customer/create_customer_request.json",
            CustomerRequest::class
        );
        $customerRequest->setMerchantCustomerId((string)uniqid());

        $createdCustomer = $this->paysafeClient->customerService()->createCustomer($customerRequest);

        /** @var Customer $expectedCustomer */
        $expectedCustomer = $this->readObjectFromFile(
            "json/customer/create_customer_response.json",
            Customer::class
        );
        $expectedCustomer->setId($createdCustomer->getId());
        $expectedCustomer->setPaymentToken($createdCustomer->getPaymentToken());
        $expectedCustomer->setMerchantCustomerId($customerRequest->getMerchantCustomerId());

        return $expectedCustomer;
    }

    /**
     * @test
     * @covers  \Paysafe\PhpSdk\Service\CustomerAddressService::getAddressById
     * @depends createCustomerAddress_isSuccessful
     *
     * @return void
     *
     * @throws PaysafeSdkException
     * @throws Exception
     */
    public function getAddressById_isSuccessful(): void
    {
        $createdCustomer = $this->createCustomer();
        /** @var Address $addressRequest */
        $addressRequest = $this->readObjectFromFile(
            self::CREATE_CUSTOMER_ADDRESS_REQUEST_JSON_PATH,
            Address::class
        );
        $createdAddress = $this->paysafeClient
            ->customerAddressService()
            ->createAddress($createdCustomer->getId(), $addressRequest);

        $retrievedAddress = $this->paysafeClient
            ->customerAddressService()
            ->getAddressById($createdCustomer->getId(), $createdAddress->getId());
        /** @var Address $expectedAddress */
        $expectedAddress = $this->readObjectFromFile(
            self::GET_CUSTOMER_ADDRESS_RESPONSE_JSON_PATH,
            Address::class
        );
        $expectedAddress->setId($retrievedAddress->getId());
        $expectedAddress->setNickName($retrievedAddress->getNickName());
        $this->assertEquals($expectedAddress, $retrievedAddress);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerAddressService::getAddressById
     *
     * @return void
     */
    public function getAddressById_customerOrAddressNotFound_throwsException(): void
    {
        try {
            $this->paysafeClient
                ->customerAddressService()
                ->getAddressById(self::NON_EXISTING_CUSTOMER_ID, self::NON_EXISTING_ADDRESS_ID);
            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertionsEntityNotFound($exception);
        }
    }

    /**
     * @test
     * @covers  \Paysafe\PhpSdk\Service\CustomerAddressService::updateAddress
     * @depends getAddressById_isSuccessful
     *
     * @return void
     *
     * @throws PaysafeSdkException
     * @throws Exception
     */
    public function updateCustomerAddress_isSuccessful(): void
    {
        $createdCustomer = $this->createCustomer();
        /** @var Address $addressRequest */
        $addressRequest = $this->readObjectFromFile(
            self::CREATE_CUSTOMER_ADDRESS_REQUEST_JSON_PATH,
            Address::class
        );
        $createdAddress = $this->paysafeClient
            ->customerAddressService()
            ->createAddress($createdCustomer->getId(), $addressRequest);

        /** @var Address $updateRequest */
        $updateRequest = $this->readObjectFromFile(
            self::UPDATE_CUSTOMER_ADDRESS_REQUEST_JSON_PATH,
            Address::class
        );
        $updatedAddress = $this->paysafeClient
            ->customerAddressService()
            ->updateAddress($createdCustomer->getId(), $createdAddress->getId(), $updateRequest);

        /** @var Address $expectedAddress */
        $expectedAddress = $this->readObjectFromFile(
            self::UPDATE_CUSTOMER_ADDRESS_RESPONSE_JSON_PATH,
            Address::class
        );
        $expectedAddress->setId($updatedAddress->getId());

        $this->assertEquals($expectedAddress, $updatedAddress);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerAddressService::updateAddress
     *
     * @return void
     *
     * @throws Exception
     */
    public function updateCustomerAddress_customerOrAddressNotFound_throwsException(): void
    {
        try {
            /** @var Address $updateRequest */
            $updateRequest = $this->readObjectFromFile(
                self::UPDATE_CUSTOMER_ADDRESS_REQUEST_JSON_PATH,
                Address::class
            );

            $this->paysafeClient
                ->customerAddressService()
                ->updateAddress(
                    self::NON_EXISTING_CUSTOMER_ID,
                    self::NON_EXISTING_ADDRESS_ID,
                    $updateRequest
                );
            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertionsEntityNotFound($exception);
        }
    }

    /**
     * @test
     * @covers  \Paysafe\PhpSdk\Service\CustomerAddressService::deleteAddress
     * @depends updateCustomerAddress_isSuccessful
     *
     * @return void
     *
     * @throws PaysafeSdkException
     * @throws Exception
     */
    public function deleteCustomerAddress_isSuccessful(): void
    {
        $createdCustomer = $this->createCustomer();
        /** @var Address $addressRequest */
        $addressRequest = $this->readObjectFromFile(
            self::CREATE_CUSTOMER_ADDRESS_REQUEST_JSON_PATH,
            Address::class
        );
        $createdAddress = $this->paysafeClient
            ->customerAddressService()
            ->createAddress($createdCustomer->getId(), $addressRequest);

        $this->paysafeClient
            ->customerAddressService()
            ->deleteAddress($createdCustomer->getId(), $createdAddress->getId());
        $this->assertTrue(true);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerAddressService::deleteAddress
     *
     * @return void
     *
     * @throws Exception
     */
    public function deleteCustomerAddress_addressNotFound_throwsException(): void
    {
        try {
            $this->paysafeClient
                ->customerAddressService()
                ->deleteAddress(
                    self::NON_EXISTING_CUSTOMER_ID,
                    self::NON_EXISTING_ADDRESS_ID
                );
            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertionsEntityNotFound($exception);
        }
    }
}
