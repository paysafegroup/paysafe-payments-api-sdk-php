<?php
/**
 * All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE
 */

namespace E2e;

use Exception;
use Paysafe\PhpSdk\Client\RequestOptions;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\Common\Enums\MandateStatus;
use Paysafe\PhpSdk\Model\Common\Enums\MandateStatusReason;
use Paysafe\PhpSdk\Model\Common\Enums\PaymentSimulator;
use Paysafe\PhpSdk\Model\Common\Mandate;
use Paysafe\PhpSdk\Model\Customer\Customer;
use Paysafe\PhpSdk\Model\Customer\CustomerPaymentHandle;
use Paysafe\PhpSdk\Model\Customer\CustomerPaymentHandleRequest;
use Paysafe\PhpSdk\Model\Customer\CustomerRequest;


class MandateE2eTest extends BasePaysafeE2e
{
    const NON_EXISTING_CUSTOMER_ID = "00000000-0000-0000-0000-000000000000";
    const NON_EXISTING_PAYMENT_HANDLE_ID = "11111111-1111-1111-1111-111111111111";
    const NON_EXISTING_MANDATE_ID = "22222222-2222-2222-2222-222222222222";

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\MandateService::createMandate
     * @covers \Paysafe\PhpSdk\Service\MandateService::getMandateStatus
     * @covers \Paysafe\PhpSdk\Service\MandateService::cancelMandate
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function mandateLifecycle_createGetCancel_isSuccessful(): void
    {
        $customer = $this->createCustomer();
        $paymentHandle = $this->createBacsCustomerPaymentHandle($customer->getId());
        $mandateReference = "MND" . strtoupper(substr((string)uniqid(), 0, 9));

        $mandateRequest = new Mandate();
        $mandateRequest->setReference($mandateReference);

        $requestOptions = new RequestOptions();
        $requestOptions->setSimulator(PaymentSimulator::EXTERNAL);

        $createdMandate = $this->paysafeClient->mandateService()->createMandate(
            $customer->getId(),
            $paymentHandle->getId(),
            $mandateRequest,
            $requestOptions
        );

        $this->assertNotNull($createdMandate);
        $this->assertNotNull($createdMandate->getId());
        $this->assertEquals($mandateReference, $createdMandate->getReference());
        $this->assertEquals(MandateStatus::PENDING, $createdMandate->getStatus());

        $fetchedMandate = $this->paysafeClient->mandateService()->getMandateStatus(
            $customer->getId(),
            $paymentHandle->getId(),
            $createdMandate->getId(),
            $requestOptions
        );

        $this->assertNotNull($fetchedMandate);
        $this->assertEquals($createdMandate->getId(), $fetchedMandate->getId());
        $this->assertEquals($mandateReference, $fetchedMandate->getReference());
        $this->assertNotNull($fetchedMandate->getStatus());

        $cancelRequest = new Mandate();
        $cancelRequest->setStatus(MandateStatus::CANCELLED);

        $cancelledMandate = $this->paysafeClient->mandateService()->cancelMandate(
            $customer->getId(),
            $paymentHandle->getId(),
            $createdMandate->getId(),
            $cancelRequest,
            $requestOptions
        );

        $this->assertNotNull($cancelledMandate);
        $this->assertEquals($createdMandate->getId(), $cancelledMandate->getId());
        $this->assertEquals($mandateReference, $cancelledMandate->getReference());
        $this->assertEquals(MandateStatus::CANCELLED, $cancelledMandate->getStatus());
        $this->assertEquals(MandateStatusReason::MERCHANT_CANCELLED, $cancelledMandate->getStatusReason());
    }

    /**
     * @return Customer
     *
     * @throws PaysafeSdkException
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

        return $this->paysafeClient->customerService()->createCustomer($customerRequest);
    }

    /**
     * @param string $customerId
     *
     * @return CustomerPaymentHandle
     *
     * @throws PaysafeSdkException
     * @throws Exception
     */
    private function createBacsCustomerPaymentHandle(string $customerId): CustomerPaymentHandle
    {
        /** @var CustomerPaymentHandleRequest $request */
        $request = $this->readObjectFromFile(
            "json/mandate/create_bacs_payment_handle_request.json",
            CustomerPaymentHandleRequest::class
        );
        $request->setMerchantRefNum((string)uniqid());
        return $this->paysafeClient
            ->customerPaymentHandleService()
            ->createPaymentHandleForCustomer($customerId, $request);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\MandateService::createMandate
     *
     * @return void
     */
    public function createMandate_nonExistingCustomer_throwsException(): void
    {
        $mandateRequest = new Mandate();
        $mandateRequest->setReference("GTWYRM6230");

        $requestOptions = new RequestOptions();
        $requestOptions->setSimulator(PaymentSimulator::EXTERNAL);

        try {
            $this->paysafeClient->mandateService()->createMandate(
                self::NON_EXISTING_CUSTOMER_ID,
                self::NON_EXISTING_PAYMENT_HANDLE_ID,
                $mandateRequest,
                $requestOptions
            );

            $this->fail("Expected PaysafeSdkException was not thrown.");
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(self::REQUEST_UNSUCCESSFUL, $exception->getMessage());
            $this->assertEquals(404, $exception->getCode());
            $this->assertEquals("5269", $exception->getError()->getCode());
            $this->assertEquals("Entity not found", $exception->getError()->getMessage());
            $this->assertCount(1, $exception->getError()->getDetails());
            $this->assertEquals(
                "No payment handle found for the given paymentHandleId",
                $exception->getError()->getDetails()[0]
            );
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\MandateService::getMandateStatus
     *
     * @return void
     */
    public function getMandateStatus_nonExistingMandate_throwsException(): void
    {
        $requestOptions = new RequestOptions();
        $requestOptions->setSimulator(PaymentSimulator::EXTERNAL);

        try {
            $this->paysafeClient->mandateService()->getMandateStatus(
                self::NON_EXISTING_CUSTOMER_ID,
                self::NON_EXISTING_PAYMENT_HANDLE_ID,
                self::NON_EXISTING_MANDATE_ID,
                $requestOptions
            );

            $this->fail("Expected PaysafeSdkException was not thrown.");
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(self::REQUEST_UNSUCCESSFUL, $exception->getMessage());
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\MandateService::cancelMandate
     *
     * @return void
     */
    public function cancelMandate_nonExistingMandate_throwsException(): void
    {
        $mandateRequest = new Mandate();
        $mandateRequest->setStatus(MandateStatus::CANCELLED);

        $requestOptions = new RequestOptions();
        $requestOptions->setSimulator(PaymentSimulator::EXTERNAL);

        try {
            $this->paysafeClient->mandateService()->cancelMandate(
                self::NON_EXISTING_CUSTOMER_ID,
                self::NON_EXISTING_PAYMENT_HANDLE_ID,
                self::NON_EXISTING_MANDATE_ID,
                $mandateRequest,
                $requestOptions
            );

            $this->fail("Expected PaysafeSdkException was not thrown.");
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(self::REQUEST_UNSUCCESSFUL, $exception->getMessage());
        }
    }
}
