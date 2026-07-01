<?php
/**
 * All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE
 */

namespace E2e;

use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\Card\MerchantDescriptor;
use Paysafe\PhpSdk\Model\Customer\Customer;
use Paysafe\PhpSdk\Model\Customer\CustomerPaymentHandle;
use Paysafe\PhpSdk\Model\Customer\CustomerPaymentHandleRequest;
use Paysafe\PhpSdk\Model\Customer\CustomerRequest;

class CustomersPaymentHandlesE2eTest extends BasePaysafeE2e
{
    const CREATE_CUSTOMER_REQUEST_JSON = "json/customer/create_customer_request.json";
    const CREATE_CUSTOMER_PAYMENT_HANDLE_REQUEST_JSON = "json/customer/create_customer_payment_handle_request.json";
    const CREATE_CUSTOMER_PAYMENT_HANDLE_RESPONSE_JSON = "json/customer/create_customer_payment_handle_response.json";
    const UPDATE_CUSTOMER_PAYMENT_HANDLE_REQUEST_JSON = "json/customer/update_customer_payment_handle_request.json";
    const UPDATE_CUSTOMER_PAYMENT_HANDLE_RESPONSE_JSON = "json/customer/update_customer_payment_handle_response.json";
    const NON_EXISTING_CUSTOMER_ID = "00000000-0000-0000-0000-000000000000";
    const NON_EXISTING_PAYMENT_HANDLE_ID = "11111111-1111-1111-1111-111111111111";

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerPaymentHandleService::createPaymentHandleForCustomer
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function createCustomerPaymentHandle_isSuccessful(): void
    {
        /** @var CustomerRequest $customerRequest */
        $customerRequest = $this->readObjectFromFile(
            "json/customer/create_customer_request.json",
            CustomerRequest::class
        );
        $customer = $this->createCustomer($customerRequest);

        /** @var CustomerPaymentHandleRequest $customerPaymentHandleRequest */
        $customerPaymentHandleRequest = $this->readObjectFromFile(
            "json/customer/create_customer_payment_handle_request.json",
            CustomerPaymentHandleRequest::class
        );
        $customerPaymentHandleRequest->setMerchantRefNum((string)uniqid());
        $actualHandle = $this->paysafeClient->customerPaymentHandleService()->createPaymentHandleForCustomer(
            $customer->getId(),
            $customerPaymentHandleRequest
        );

        /** @var CustomerPaymentHandle $expectedHandle */
        $expectedHandle = $this->readObjectFromFile(
            "json/customer/create_customer_payment_handle_response.json",
            CustomerPaymentHandle::class
        );

        // set dynamic values for equals()
        $expectedHandle->setCustomerId($customer->getId());
        $expectedHandle->setMerchantRefNum($customerPaymentHandleRequest->getMerchantRefNum());
        $expectedHandle->setId($actualHandle->getId());
        $expectedHandle->setBillingDetailsId($actualHandle->getBillingDetailsId());
        $expectedHandle->setPaymentHandleToken($actualHandle->getPaymentHandleToken());
        $this->assertEquals($expectedHandle, $actualHandle);
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
     * @covers \Paysafe\PhpSdk\Service\CustomerPaymentHandleService::getCustomerPaymentHandleByPaymentHandleId
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function getCustomerPaymentHandleByPaymentHandleId_isSuccessful(): void
    {
        /** @var CustomerRequest $customerRequest */
        $customerRequest = $this->readObjectFromFile(
            self::CREATE_CUSTOMER_REQUEST_JSON,
            CustomerRequest::class
        );
        $customer = $this->createCustomer($customerRequest);

        /** @var CustomerPaymentHandleRequest $customerPaymentHandleRequest */
        $customerPaymentHandleRequest = $this->readObjectFromFile(
            self::CREATE_CUSTOMER_PAYMENT_HANDLE_REQUEST_JSON,
            CustomerPaymentHandleRequest::class
        );
        $customerPaymentHandleRequest->setMerchantRefNum((string)uniqid());
        $createdHandle = $this->paysafeClient
            ->customerPaymentHandleService()
            ->createPaymentHandleForCustomer(
                $customer->getId(),
                $customerPaymentHandleRequest
            );

        $fetchedHandle = $this->paysafeClient
            ->customerPaymentHandleService()
            ->getCustomerPaymentHandleByPaymentHandleId(
                $customer->getId(),
                $createdHandle->getId()
            );

        /** @var CustomerPaymentHandle $expectedHandle */
        $expectedHandle = $this->readObjectFromFile(
            self::CREATE_CUSTOMER_PAYMENT_HANDLE_RESPONSE_JSON,
            CustomerPaymentHandle::class
        );

        $expectedHandle->setCustomerId($customer->getId());
        $expectedHandle->setMerchantRefNum($customerPaymentHandleRequest->getMerchantRefNum());
        $expectedHandle->setId($createdHandle->getId());
        $expectedHandle->setBillingDetailsId($createdHandle->getBillingDetailsId());
        $expectedHandle->setPaymentHandleToken($createdHandle->getPaymentHandleToken());

        $this->assertEquals($expectedHandle, $fetchedHandle);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerPaymentHandleService::updateCustomerPaymentHandle
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function getCustomerPaymentHandleByPaymentHandleId_afterUpdate_isSuccessful(): void
    {
        /** @var CustomerRequest $customerRequest */
        $customerRequest = $this->readObjectFromFile(
            self::CREATE_CUSTOMER_REQUEST_JSON,
            CustomerRequest::class
        );
        $customer = $this->createCustomer($customerRequest);

        /** @var CustomerPaymentHandleRequest $createRequest */
        $createRequest = $this->readObjectFromFile(
            self::CREATE_CUSTOMER_PAYMENT_HANDLE_REQUEST_JSON,
            CustomerPaymentHandleRequest::class
        );
        $createRequest->setMerchantRefNum((string)uniqid());

        $createdHandle = $this->paysafeClient
            ->customerPaymentHandleService()
            ->createPaymentHandleForCustomer(
                $customer->getId(),
                $createRequest
            );

        /** @var CustomerPaymentHandleRequest $updateRequest */
        $updateRequest = $this->readObjectFromFile(
            self::UPDATE_CUSTOMER_PAYMENT_HANDLE_REQUEST_JSON,
            CustomerPaymentHandleRequest::class
        );
        $updateRequest->setMerchantRefNum((string)uniqid());

        $updatedHandle = $this->paysafeClient
            ->customerPaymentHandleService()
            ->updateCustomerPaymentHandle(
                $customer->getId(),
                $createdHandle->getId(),
                $updateRequest
            );

        $fetchedHandle = $this->paysafeClient
            ->customerPaymentHandleService()
            ->getCustomerPaymentHandleByPaymentHandleId(
                $customer->getId(),
                $createdHandle->getId());
        $fetchedHandle->setBillingDetailsId('');
        $fetchedHandle->setMerchantDescriptor(new MerchantDescriptor());

        /** @var CustomerPaymentHandle $expectedHandle */
        $expectedHandle = $this->readObjectFromFile(
            self::UPDATE_CUSTOMER_PAYMENT_HANDLE_RESPONSE_JSON,
            CustomerPaymentHandle::class
        );
        $expectedHandle->setId($updatedHandle->getId());
        $expectedHandle->setCustomerId($customer->getId());
        $expectedHandle->setMerchantRefNum($updatedHandle->getMerchantRefNum());
        $expectedHandle->setPaymentHandleToken($updatedHandle->getPaymentHandleToken());
        $expectedHandle->setBillingDetailsId($fetchedHandle->getBillingDetailsId());
        $expectedHandle->setCard($updatedHandle->getCard());
        $expectedHandle->setMerchantDescriptor($fetchedHandle->getMerchantDescriptor());
        $expectedHandle->setStatus($updatedHandle->getStatus());

        $this->assertEquals($expectedHandle, $fetchedHandle);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerPaymentHandleService::deleteCustomerPaymentHandle
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function deleteCustomerPaymentHandle_isSuccessful(): void
    {
        // Create Customer
        /** @var CustomerRequest $customerRequest */
        $customerRequest = $this->readObjectFromFile(
            self::CREATE_CUSTOMER_REQUEST_JSON,
            CustomerRequest::class
        );
        $customer = $this->createCustomer($customerRequest);

        // Create Payment Handle
        /** @var CustomerPaymentHandleRequest $paymentHandleRequest */
        $paymentHandleRequest = $this->readObjectFromFile(
            self::CREATE_CUSTOMER_PAYMENT_HANDLE_REQUEST_JSON,
            CustomerPaymentHandleRequest::class
        );
        $paymentHandleRequest->setMerchantRefNum((string)uniqid());

        $createdHandle = $this->paysafeClient
            ->customerPaymentHandleService()
            ->createPaymentHandleForCustomer(
                $customer->getId(),
                $paymentHandleRequest
            );

        // Perform Delete
        $this->paysafeClient
            ->customerPaymentHandleService()
            ->deleteCustomerPaymentHandle(
                $customer->getId(),
                $createdHandle->getId()
            );

        $this->assertTrue(true);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerPaymentHandleService::deleteCustomerPaymentHandle
     *
     * @return void
     */
    public function deleteCustomerPaymentHandle_nonExisting_throwsException(): void
    {
        try {
            $this->paysafeClient->customerPaymentHandleService()->deleteCustomerPaymentHandle(
                self::NON_EXISTING_CUSTOMER_ID,
                self::NON_EXISTING_PAYMENT_HANDLE_ID
            );
            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(404, $exception->getCode());
            $this->assertEquals("5269", $exception->getError()->getCode());
            $this->assertEquals("Entity not found", $exception->getError()->getMessage());
        }
    }

}
