<?php
/**
 * All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE
 */

namespace E2e;

use Exception;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\Payment\Payment;
use Paysafe\PhpSdk\Model\Payment\PaymentRequest;
use Paysafe\PhpSdk\Model\PaymentHandle\PaymentHandle;
use Paysafe\PhpSdk\Model\PaymentHandle\PaymentHandleRequest;
use Paysafe\PhpSdk\Model\Refund\Refund;
use Paysafe\PhpSdk\Model\Refund\RefundRequest;
use Paysafe\PhpSdk\Model\Settlement\Settlement;
use Paysafe\PhpSdk\Model\Settlement\SettlementRequest;


class RefundsE2eTest extends BasePaysafeE2e
{
    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\RefundService::processRefund
     *
     * @return void
     */
    public function refund_card_regularRefund_isSuccessful(): void
    {
        $payment = $this->createPayment();
        $settlement = $this->createSettlement($payment->getId());

        $refundRequest = (new RefundRequest())->merchantRefNum((string)uniqid());
        $createdRefund = $this->paysafeClient->refundService()->processRefund($settlement->getId(), $refundRequest);

        /** @var Refund $expectedRefund */
        $expectedRefund = $this->readObjectFromFile(
            "json/refund/create_refund_card_response.json",
            Refund::class
        );
        $expectedRefund->setMerchantRefNum($refundRequest->getMerchantRefNum());
        $expectedRefund->setId($createdRefund->getId());
        $expectedRefund->setTxnTime($createdRefund->getTxnTime());

        $this->assertEquals($expectedRefund, $createdRefund);
    }

    /**
     * @return Payment
     *
     * @throws PaysafeSdkException
     * @throws Exception
     */
    private function createPayment(): Payment
    {
        $paymentHandle = $this->createPaymentHandle();

        /** @var PaymentRequest $paymentRequest */
        $paymentRequest = $this->readObjectFromFile(
            "json/payment/create_payment_request_card_acquirer_data.json",
            PaymentRequest::class
        );
        $paymentRequest->setMerchantRefNum($paymentHandle->getMerchantRefNum());
        $paymentRequest->setPaymentHandleToken($paymentHandle->getPaymentHandleToken());

        return $this->paysafeClient->paymentService()->processPayment($paymentRequest);
    }

    /**
     * @return PaymentHandle
     *
     * @throws PaysafeSdkException
     * @throws Exception
     */
    private function createPaymentHandle(): PaymentHandle
    {
        /** @var PaymentHandleRequest $paymentHandleRequest */
        $paymentHandleRequest = $this->readObjectFromFile(
            "json/paymenthandle/create_paymenthandle_request_card_skip3ds.json",
            PaymentHandleRequest::class
        );
        $paymentHandleRequest->setMerchantRefNum((string)uniqid());
        $paymentHandleRequest->addAdditionalParameter('skip3ds', true);

        return $this->paysafeClient->paymentHandleService()->createPaymentHandle($paymentHandleRequest);
    }

    /**
     * @param string $paymentId
     *
     * @return Settlement
     *
     * @throws PaysafeSdkException
     * @throws Exception
     */
    private function createSettlement(string $paymentId): Settlement
    {
        /** @var SettlementRequest $settlementRequest */
        $settlementRequest = $this->readObjectFromFile(
            "json/settlement/create_settlement_card_request.json",
            SettlementRequest::class
        );
        $settlementRequest->setMerchantRefNum((string)uniqid());

        return $this->paysafeClient->settlementService()->processSettlement($paymentId, $settlementRequest);
    }

    /**
     * @param string $settlementId
     *
     * @return Refund
     *
     * @throws PaysafeSdkException
     */
    private function processRefund(string $settlementId): Refund
    {
        $refundRequest = (new RefundRequest())->merchantRefNum((string)uniqid());

        return $this->paysafeClient->refundService()->processRefund($settlementId, $refundRequest);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\RefundService::processRefund
     *
     * @return void
     */
    public function refund_card_regularRefund_isUnsuccessful_alreadyRefunded(): void
    {
        try {
            $payment = $this->createPayment();
            $settlement = $this->createSettlement($payment->getId());

            $refundRequest = (new RefundRequest())->merchantRefNum((string)uniqid());
            $this->paysafeClient->refundService()->processRefund($settlement->getId(), $refundRequest);

            $this->paysafeClient->refundService()->processRefund(
                $settlement->getId(),
                (new RefundRequest())->merchantRefNum((string)uniqid())
            );

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertNotNull($exception->getInternalCorrelationId());
            $this->assertEquals(402, $exception->getCode());
            $this->assertEquals("3404", $exception->getError()->getCode());
            $this->assertEquals(
                "The settlement has already been fully refunded.",
                $exception->getError()->getMessage()
            );
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\RefundService::processRefund
     *
     * @return void
     */
    public function refund_card_regularRefund_isUnsuccessful_duplicateMerchantReference(): void
    {
        try {
            $payment = $this->createPayment();
            $settlement = $this->createSettlement($payment->getId());

            $refundRequest = (new RefundRequest())->merchantRefNum((string)uniqid());
            $this->paysafeClient->refundService()->processRefund($settlement->getId(), $refundRequest);

            // try to refund the second time
            $this->paysafeClient->refundService()->processRefund($settlement->getId(), $refundRequest);

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertNotNull($exception->getInternalCorrelationId());
            $this->assertEquals(409, $exception->getCode());
            $this->assertEquals("5031", $exception->getError()->getCode());
            $this->assertEquals("Duplicate merchant reference", $exception->getError()->getMessage());
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\RefundService::getRefundById
     *
     * @return void
     */
    public function getRefundById_isSuccessful(): void
    {
        $payment = $this->createPayment();
        $settlement = $this->createSettlement($payment->getId());
        $refund = $this->processRefund($settlement->getId());

        $actualRefund = $this->paysafeClient->refundService()->getRefundById($refund->getId());

        /** @var Refund $expectedRefund */
        $expectedRefund = $this->readObjectFromFile("json/refund/get_refund_by_id_response.json", Refund::class);
        $expectedRefund->setMerchantRefNum($refund->getMerchantRefNum());
        $expectedRefund->setTxnTime($refund->getTxnTime());
        $expectedRefund->setId($refund->getId());

        $this->assertEquals($expectedRefund, $actualRefund);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\RefundService::getRefundById
     *
     * @return void
     */
    public function getRefundById_entityNotFound(): void
    {
        try {
            $this->paysafeClient->refundService()->getRefundById("badId");
        } catch (PaysafeSdkException $exception) {
            $this->assertionsEntityNotFound($exception);
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\RefundService::getRefundUsingMerchantReferenceNumber
     *
     * @return void
     */
    public function getRefundByMerchantRefNum_isSuccessful(): void
    {
        $payment = $this->createPayment();
        $settlement = $this->createSettlement($payment->getId());
        $refund = $this->processRefund($settlement->getId());

        $refundList = $this->paysafeClient->refundService()
            ->getRefundUsingMerchantReferenceNumber($refund->getMerchantRefNum());
        $actualRefund = $refundList->getRefunds()[0];

        /** @var Refund $expectedRefund */
        $expectedRefund = $this->readObjectFromFile("json/refund/get_refund_by_id_response.json", Refund::class);
        $expectedRefund->setMerchantRefNum($refund->getMerchantRefNum());
        $expectedRefund->setTxnTime($refund->getTxnTime());
        $expectedRefund->setId($refund->getId());

        $this->assertEquals($expectedRefund, $actualRefund);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\RefundService::getRefundUsingMerchantReferenceNumber
     *
     * @return void
     */
    public function getRefundByMerchantRefNum_fieldErrors(): void
    {
        try {
            $this->paysafeClient->refundService()->getRefundUsingMerchantReferenceNumber("");
        } catch (PaysafeSdkException $exception) {
            $this->assertionsFieldErrors($exception);
        }
    }

}
