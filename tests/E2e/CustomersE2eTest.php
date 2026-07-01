<?php
/**
 * All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE
 */

namespace E2e;

use Exception;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\Customer\Customer;
use Paysafe\PhpSdk\Model\Customer\CustomerRequest;

class CustomersE2eTest extends BasePaysafeE2e
{
    const CREATE_CUSTOMER_REQUEST_JSON_PATH = "json/customer/create_customer_request.json";
    const GET_CUSTOMER_RESPONSE_JSON_PATH = "json/customer/get_customer_response.json";
    const NON_EXISTING_CUSTOMER_ID = "non-existing-customer-id";

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerService::createCustomer
     *
     * @return void
     *
     * @throws Exception
     */
    public function createCustomer_isSuccessful(): void
    {
        /** @var CustomerRequest $customerRequest */
        $customerRequest = $this->readObjectFromFile(
            self::CREATE_CUSTOMER_REQUEST_JSON_PATH,
            CustomerRequest::class
        );
        $createdCustomer = $this->createCustomer($customerRequest);

        /** @var Customer $expectedCustomer */
        $expectedCustomer = $this->readObjectFromFile(
            "json/customer/create_customer_response.json",
            Customer::class
        );
        $expectedCustomer->setId($createdCustomer->getId());
        $expectedCustomer->setPaymentToken($createdCustomer->getPaymentToken());
        $expectedCustomer->setMerchantCustomerId($customerRequest->getMerchantCustomerId());
        $this->assertEquals($expectedCustomer, $createdCustomer);
    }

    /**
     * @param CustomerRequest $customerRequest
     *
     * @return Customer
     *
     * @throws PaysafeSdkException
     */
    private function createCustomer(CustomerRequest $customerRequest): Customer
    {
        $customerRequest->setMerchantCustomerId((string)uniqid());

        return $this->paysafeClient->customerService()->createCustomer($customerRequest);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerService::deleteCustomer
     *
     * @return void
     *
     * @throws Exception
     */
    public function deleteCustomer_isSuccessful(): void
    {
        /** @var CustomerRequest $customerRequest */
        $customerRequest = $this->readObjectFromFile(
            self::CREATE_CUSTOMER_REQUEST_JSON_PATH,
            CustomerRequest::class
        );
        $createdCustomer = $this->createCustomer($customerRequest);

        $this->paysafeClient->customerService()->deleteCustomer($createdCustomer->getId());

        $this->assertTrue(true);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerService::deleteCustomer
     *
     * @return void
     *
     * @throws Exception
     */
    public function deleteCustomer_customerNotFound_throwsException(): void
    {
        try {
            $this->paysafeClient->customerService()->deleteCustomer(self::NON_EXISTING_CUSTOMER_ID);
            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertionsEntityNotFound($exception);
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
    public function getCustomerById_isSuccessful(): void
    {
        /** @var CustomerRequest $customerRequest */
        $customerRequest = $this->readObjectFromFile(
            self::CREATE_CUSTOMER_REQUEST_JSON_PATH,
            CustomerRequest::class
        );
        $createdCustomer = $this->createCustomer($customerRequest);

        $customerById = $this->paysafeClient->customerService()->getCustomerById($createdCustomer->getId());
        /** @var Customer $expectedCustomer */
        $expectedCustomer = $this->readObjectFromFile(
            self::GET_CUSTOMER_RESPONSE_JSON_PATH,
            Customer::class
        );
        $expectedCustomer->setId($createdCustomer->getId());
        $expectedCustomer->setPaymentToken($createdCustomer->getPaymentToken());
        $expectedCustomer->setMerchantCustomerId($createdCustomer->getMerchantCustomerId());

        $this->assertEquals($expectedCustomer, $customerById);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerService::getCustomerById
     *
     * @return void
     */
    public function getCustomerById_customerNotFound_throwsException(): void
    {
        try {
            $this->paysafeClient->customerService()->getCustomerById(self::NON_EXISTING_CUSTOMER_ID);
            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertionsEntityNotFound($exception);
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
    public function getCustomerByMerchantCustomerId_isSuccessful(): void
    {
        /** @var CustomerRequest $customerRequest */
        $customerRequest = $this->readObjectFromFile(
            self::CREATE_CUSTOMER_REQUEST_JSON_PATH,
            CustomerRequest::class
        );
        $createdCustomer = $this->createCustomer($customerRequest);

        $customerByMerchantCustomerId = $this->paysafeClient->customerService()->getCustomerByMerchantCustomerId(
            $createdCustomer->getMerchantCustomerId()
        );

        /** @var Customer $expectedCustomer */
        $expectedCustomer = $this->readObjectFromFile(
            self::GET_CUSTOMER_RESPONSE_JSON_PATH,
            Customer::class
        );
        $expectedCustomer->setId($customerByMerchantCustomerId->getId());
        $expectedCustomer->setPaymentToken($customerByMerchantCustomerId->getPaymentToken());
        $expectedCustomer->setMerchantCustomerId($customerByMerchantCustomerId->getMerchantCustomerId());

        $this->assertEquals($expectedCustomer, $customerByMerchantCustomerId);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerService::getCustomerByMerchantCustomerId
     *
     * @return void
     */
    public function getCustomerByMerchantCustomerId_customerNotFound_throwsException(): void
    {
        try {
            $this->paysafeClient->customerService()->getCustomerByMerchantCustomerId(
                self::NON_EXISTING_CUSTOMER_ID
            );
            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertionsEntityNotFound($exception);
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
    public function updateCustomer_isSuccessful(): void
    {
        /** @var CustomerRequest $customerRequest */
        $customerRequest = $this->readObjectFromFile(
            self::CREATE_CUSTOMER_REQUEST_JSON_PATH,
            CustomerRequest::class
        );
        $createdCustomer = $this->createCustomer($customerRequest);

        /** @var CustomerRequest $updateCustomerRequest */
        $updateCustomerRequest = $this->readObjectFromFile(
            "json/customer/update_customer_request.json",
            CustomerRequest::class
        );
        $updateCustomerRequest->setMerchantCustomerId($createdCustomer->getMerchantCustomerId());

        $updatedCustomer = $this->paysafeClient->customerService()->updateCustomer(
            $createdCustomer->getId(),
            $updateCustomerRequest
        );

        /** @var Customer $expectedCustomer */
        $expectedCustomer = $this->readObjectFromFile(
            "json/customer/update_customer_response.json",
            Customer::class
        );
        $expectedCustomer->setId($createdCustomer->getId());
        $expectedCustomer->setMerchantCustomerId($createdCustomer->getMerchantCustomerId());
        $expectedCustomer->setPaymentToken($createdCustomer->getPaymentToken());

        $this->assertEquals($expectedCustomer, $updatedCustomer);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerService::updateCustomer
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function updateCustomer_customerNotFound_throwsException(): void
    {
        try {
            /** @var CustomerRequest $customerRequest */
            $customerRequest = $this->readObjectFromFile(
                self::CREATE_CUSTOMER_REQUEST_JSON_PATH,
                CustomerRequest::class
            );
            $createdCustomer = $this->createCustomer($customerRequest);

            /** @var CustomerRequest $updateCustomerRequest */
            $updateCustomerRequest = $this->readObjectFromFile(
                "json/customer/update_customer_request.json",
                CustomerRequest::class
            );
            $updateCustomerRequest->setMerchantCustomerId($createdCustomer->getMerchantCustomerId());

            $this->paysafeClient->customerService()->updateCustomer(
                self::NON_EXISTING_CUSTOMER_ID,
                $updateCustomerRequest
            );
            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertionsEntityNotFound($exception);
        }
    }

}
