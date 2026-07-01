<?php
/**
 * All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE
 */

namespace E2e;

use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\PaymentHandle\PaymentHandle;
use Paysafe\PhpSdk\Model\PaymentHandle\PaymentHandleList;
use Paysafe\PhpSdk\Model\PaymentHandle\PaymentHandleRequest;

class PaymentHandlesE2eTest extends BasePaysafeE2e
{
    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentHandleService::createPaymentHandle
     * @covers \Paysafe\PhpSdk\Service\PaymentHandleService::getPaymentHandleById
     * @covers \Paysafe\PhpSdk\Service\PaymentHandleService::getPaymentHandleUsingMerchantReferenceNumber
     *
     * @return void
     */
    public function paymentHandle_card_allMethods_areSuccessful(): void
    {
        /** @var PaymentHandleRequest $request */
        $request = self::readObjectFromFile(
            "json/paymenthandle/create_paymenthandle_request_card_skip3ds.json",
            PaymentHandleRequest::class
        );
        $request->setMerchantRefNum((string)uniqid());
        $request->addAdditionalParameter('skip3ds', true);

        $createdPaymentHandle = $this->paysafeClient->paymentHandleService()->createPaymentHandle($request);

        // merchantRefNum, id, paymentHandleToken, txnTime cannot be hardcoded in json
        /** @var PaymentHandle $expectedResponse */
        $expectedResponse = $this->readObjectFromFile(
            "json/paymenthandle/paymenthandle_response_card.json",
            PaymentHandle::class
        );

        $expectedResponse->setMerchantRefNum($request->getMerchantRefNum());
        $expectedResponse->setId($createdPaymentHandle->getId());
        $expectedResponse->setPaymentHandleToken($createdPaymentHandle->getPaymentHandleToken());
        $expectedResponse->setTxnTime($createdPaymentHandle->getTxnTime());
        $expectedResponse->setStatus($createdPaymentHandle->getStatus());
        $expectedResponse->setAction($createdPaymentHandle->getAction());

        // all other fields should match
        $this->assertEquals($expectedResponse, $createdPaymentHandle);

        // test getting payment handle by id
        $paymentHandleById = $this->paysafeClient->paymentHandleService()
            ->getPaymentHandleById($createdPaymentHandle->getId());

        // time to live changed since creating the payment handle, check if value exists and then rewrite it
        $this->assertNotNull($paymentHandleById->getTimeToLiveSeconds());
        $paymentHandleById->setTimeToLiveSeconds($createdPaymentHandle->getTimeToLiveSeconds());

        // accountId is not returned for some reason (tested directly on API), at least on QA
        // set value for equals()
        $paymentHandleById->setAccountId($createdPaymentHandle->getAccountId());

        $this->assertEquals($createdPaymentHandle, $paymentHandleById);

        // test getting payment handle using merchant ref number

        /** @var PaymentHandleList $paymentHandleList */
        $paymentHandleList = $this->paysafeClient->paymentHandleService()
            ->getPaymentHandleUsingMerchantReferenceNumber(
                $createdPaymentHandle->getMerchantRefNum(),
                null,
                10,
                0,
                null
            );

        $this->assertEquals(10, $paymentHandleList->getMeta()->getLimit());
        $this->assertEquals(1, $paymentHandleList->getMeta()->getPage());
        $this->assertEquals(1, $paymentHandleList->getMeta()->getNumberOfRecords());

        $this->assertEquals(1, count($paymentHandleList->getPaymentHandles()));

        // time to live changed since creating the payment handle, check if value exists and then rewrite it
        $this->assertNotNull($paymentHandleList->getPaymentHandles()[0]->getTimeToLiveSeconds());
        $paymentHandleList->getPaymentHandles()[0]
            ->setTimeToLiveSeconds($createdPaymentHandle->getTimeToLiveSeconds());

        // accountId is not returned for some reason (tested directly on API), at least on QA
        // set value for equals()
        $paymentHandleList->getPaymentHandles()[0]->setAccountId($createdPaymentHandle->getAccountId());

        $this->assertEquals($createdPaymentHandle, $paymentHandleList->getPaymentHandles()[0]);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentHandleService::createPaymentHandle
     *
     * @return void
     */
    public function createPaymentHandle_sameMerchantRefNum_isUnsuccessful(): void
    {
        try {
            /** @var PaymentHandleRequest $request */
            $request = $this->readObjectFromFile(
                "json/paymenthandle/create_paymenthandle_request_card_skip3ds.json",
                PaymentHandleRequest::class
            );
            $request->setMerchantRefNum((string)uniqid());

            $createdPaymentHandle = $this->paysafeClient->paymentHandleService()->createPaymentHandle($request);

            $this->assertNotNull($createdPaymentHandle);

            $request->setMerchantRefNum($createdPaymentHandle->getMerchantRefNum());

            $this->paysafeClient->paymentHandleService()->createPaymentHandle($request);
            $this->fail('Exception not thrown!');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(self::REQUEST_UNSUCCESSFUL, $exception->getMessage());
            $this->assertEquals(409, $exception->getCode());
            $this->assertEquals("5031", $exception->getError()->getCode());
            $this->assertEquals("Duplicate merchant reference", $exception->getError()->getMessage());
            $this->assertEquals(1, count($exception->getError()->getDetails()));
            $this->assertEquals(
                "The provided reference has already been used for another request.",
                $exception->getError()->getDetails()[0]
            );
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentHandleService::createPaymentHandle
     *
     * @return void
     */
    public function createPaymentHandle_invalidAccountId_isUnsuccessful(): void
    {
        try {
            /** @var PaymentHandleRequest $request */
            $request = $this->readObjectFromFile(
                "json/paymenthandle/create_paymenthandle_request_card_skip3ds.json",
                PaymentHandleRequest::class
            );
            $request->setMerchantRefNum((string)uniqid());
            $request->setAccountId("badAccountId");

            $this->paysafeClient->paymentHandleService()->createPaymentHandle($request);
            $this->fail('Exception not thrown!');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(self::REQUEST_UNSUCCESSFUL, $exception->getMessage());
            $this->assertionsFieldErrors($exception);

            $this->assertEquals(1, count($exception->getError()->getFieldErrors()));
            $this->assertEquals("accountId", $exception->getError()->getFieldErrors()[0]->getField());
            $this->assertEquals(
                "AccountId provided in the request either doesn't exists or not configured.",
                $exception->getError()->getFieldErrors()[0]->getError()
            );
        }

    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentHandleService::getPaymentHandleById
     *
     * @return void
     */
    public function getPaymentHandleByBadId_isUnsuccessful()
    {
        try {
            $this->paysafeClient->paymentHandleService()->getPaymentHandleById("badId");
            $this->fail('Exception not thrown!');
        } catch (PaysafeSdkException $exception) {
            $this->assertionsEntityNotFound($exception);
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentHandleService::createPaymentHandle
     *
     * @return void
     * @throws PaysafeSdkException
     */
    public function createPaymentHandle_card3ds_isSuccessful(): void
    {
        /** @var PaymentHandleRequest $request */
        $request = $this->readObjectFromFile(
            "json/paymenthandle/create_paymenthandle_request_card_3ds.json",
            PaymentHandleRequest::class
        );
        $request->setMerchantRefNum((string)uniqid());

        $actualResponse = $this->paysafeClient->paymentHandleService()->createPaymentHandle($request);

        // merchantRefNum, id, paymentHandleToken, txnTime vary and cannot be hardcoded in json
        /** @var PaymentHandle $expectedResponse */
        $expectedResponse = $this->readObjectFromFile(
            "json/paymenthandle/paymenthandle_response_card_3ds.json",
            PaymentHandle::class
        );

        $expectedResponse->setMerchantRefNum($request->getMerchantRefNum());
        $expectedResponse->setId($actualResponse->getId());
        $expectedResponse->setPaymentHandleToken($actualResponse->getPaymentHandleToken());
        $expectedResponse->setTxnTime($actualResponse->getTxnTime());

        // all other fields should match
        $this->assertEquals($expectedResponse, $actualResponse);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentHandleService::createPaymentHandle
     *
     * @return void
     */
    public function createPaymentHandle_googlePay_isUnsuccessful(): void
    {
        try {
            /** @var PaymentHandleRequest $request */
            $request = $this->readObjectFromFile(
                "json/paymenthandle/create_paymenthandle_request_googlepay.json",
                PaymentHandleRequest::class
            );
            $request->setMerchantRefNum((string)uniqid());

            // the fail fails due to tokenization data issue
            $this->paysafeClient->paymentHandleService()->createPaymentHandle($request);
            $this->fail('Exception not thrown!');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(self::REQUEST_UNSUCCESSFUL, $exception->getMessage());

            $this->assertionsFieldErrors($exception);

            $this->assertEquals(1, count($exception->getError()->getFieldErrors()));
            $this->assertEquals(
                "googlePayPaymentToken.paymentMethodData.tokenizationData.token",
                $exception->getError()->getFieldErrors()[0]->getField()
            );
            $this->assertEquals("bad field", $exception->getError()->getFieldErrors()[0]->getError());
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentHandleService::createPaymentHandle
     *
     * @return void
     */
    public function createPaymentHandle_applePayDecrypted_isUnsuccessful(): void
    {
        try {
            /** @var PaymentHandleRequest $request */
            $request = $this->readObjectFromFile(
                "json/paymenthandle/create_paymenthandle_request_applepay_decrypted.json",
                PaymentHandleRequest::class
            );
            $request->setMerchantRefNum((string)uniqid());

            // the fail fails due to tokenization data issue
            $this->paysafeClient->paymentHandleService()->createPaymentHandle($request);
            $this->fail('Exception not thrown!');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(self::REQUEST_UNSUCCESSFUL, $exception->getMessage());

            $this->assertEquals(400, $exception->getCode());
            $this->assertEquals("5068", $exception->getError()->getCode());
            $this->assertCount(1, $exception->getError()->getFieldErrors());
            $this->assertEquals("applePayPaymentToken", $exception->getError()->getFieldErrors()[0]->getField());
            $this->assertEquals("invalid token format", $exception->getError()->getFieldErrors()[0]->getError());
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentHandleService::createPaymentHandle
     *
     * @return void
     */
    public function createPaymentHandle_applePayEncrypted_isUnsuccessful(): void
    {
        try {
            /** @var PaymentHandleRequest $request */
            $request = $this->readObjectFromFile(
                "json/paymenthandle/create_paymenthandle_request_applepay_encrypted.json",
                PaymentHandleRequest::class
            );
            $request->setMerchantRefNum((string)uniqid());

            // the fail fails due to tokenization data issue
            $this->paysafeClient->paymentHandleService()->createPaymentHandle($request);
            $this->fail('Exception not thrown!');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(self::REQUEST_UNSUCCESSFUL, $exception->getMessage());

            $this->assertEquals(400, $exception->getCode());
            $this->assertEquals("5068", $exception->getError()->getCode());
            $this->assertEquals('Field error(s)', $exception->getError()->getMessage());
            $this->assertCount(1, $exception->getError()->getFieldErrors());
            $this->assertEquals("applePayPaymentToken", $exception->getError()->getFieldErrors()[0]->getField());
            $this->assertEquals("invalid token format", $exception->getError()->getFieldErrors()[0]->getError());
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentHandleService::createPaymentHandle
     *
     * Test case for creating a payment handle.
     *
     * @throws PaysafeSdkException
     */
    public function testCreatePayablePaymentHandle()
    {
        $paymentHandle = $this->createPayablePaymentHandle();
        $this->assertObjectHasProperty('id', $paymentHandle);
        $this->assertObjectHasProperty('status', $paymentHandle);
    }
}
