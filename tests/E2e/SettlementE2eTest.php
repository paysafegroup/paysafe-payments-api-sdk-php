<?php
/**
 * All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE
 */

namespace E2e;

use Exception;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\Payment\PaymentRequest;
use Paysafe\PhpSdk\Model\PaymentHandle\PaymentHandleRequest;
use Paysafe\PhpSdk\Model\Settlement\Settlement;
use Paysafe\PhpSdk\Model\Settlement\SettlementList;
use Paysafe\PhpSdk\Model\Settlement\SettlementRequest;


class SettlementE2eTest extends BasePaysafeE2e
{
    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\SettlementService::processSettlement
     *
     * @return void
     * @throws PaysafeSdkException
     */
    public function settlements_card_regularSettlement_isSuccessful(): void
    {
        // Create a payment first
        /** @var string $paymentId */
        $paymentId = $this->createPayment();

        // Create settlement request
        /** @var SettlementRequest $settlementRequest */
        $settlementRequest = $this->readObjectFromFile(
            "json/settlement/create_settlement_card_request.json",
            SettlementRequest::class
        );
        $settlementRequest->setMerchantRefNum((string)uniqid());

        // Process settlement
        /** @var Settlement $createdSettlement */
        $createdSettlement = $this->paysafeClient->settlementService()
            ->processSettlement($paymentId, $settlementRequest);

        /** @var Settlement $expectedSettlement */
        $expectedSettlement = $this->readObjectFromFile(
            "json/settlement/create_settlement_response.json",
            Settlement::class
        );

        // Set dynamic values for assertion
        $expectedSettlement->setMerchantRefNum($settlementRequest->getMerchantRefNum());
        $expectedSettlement->setId($createdSettlement->getId());
        $expectedSettlement->setTxnTime($createdSettlement->getTxnTime());
        $expectedSettlement->setGatewayReconciliationId($createdSettlement->getGatewayReconciliationId());

        $this->assertEquals($expectedSettlement, $createdSettlement);
    }

    /**
     * @return string
     *
     * @throws PaysafeSdkException
     * @throws Exception
     */
    private function createPayment(): string
    {
        // Create a payment handle
        $paymentHandleToken = $this->createPaymentHandle();

        // Create a payment request
        /** @var PaymentRequest $paymentRequest */
        $paymentRequest = $this->readObjectFromFile(
            "json/payment/create_payment_request_card_acquirer_data.json",
            PaymentRequest::class
        );
        $paymentRequest->setMerchantRefNum((string)uniqid());
        $paymentRequest->setPaymentHandleToken($paymentHandleToken);

        $createdPayment = $this->paysafeClient->paymentService()->processPayment($paymentRequest);

        return $createdPayment->getId();
    }

    /**
     * @return string
     *
     * @throws PaysafeSdkException
     * @throws Exception
     */
    private function createPaymentHandle(): string
    {
        /** @var PaymentHandleRequest $paymentHandleRequest */
        $paymentHandleRequest = $this->readObjectFromFile(
            "json/paymenthandle/create_paymenthandle_request_card_skip3ds.json",
            PaymentHandleRequest::class
        );
        $paymentHandleRequest->setMerchantRefNum((string)uniqid());
        $paymentHandleRequest->addAdditionalParameter('skip3ds', true);

        $createdPaymentHandle = $this->paysafeClient->paymentHandleService()
            ->createPaymentHandle($paymentHandleRequest);

        return $createdPaymentHandle->getPaymentHandleToken();
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\SettlementService::processSettlement
     * @covers \Paysafe\PhpSdk\Service\SettlementService::getSettlementById
     *
     * @return void
     * @throws PaysafeSdkException
     */
    public function getSettlementById_isSuccessful(): void
    {
        // Create a payment and settle it
        $paymentId = $this->createPayment();
        /** @var SettlementRequest $settlementRequest */
        $settlementRequest = $this->readObjectFromFile(
            "json/settlement/create_settlement_card_request.json",
            SettlementRequest::class
        );
        $settlementRequest->setMerchantRefNum((string)uniqid());

        /** @var Settlement $createdSettlement */
        $createdSettlement = $this->paysafeClient->settlementService()
            ->processSettlement($paymentId, $settlementRequest);

        // Retrieve settlement by ID
        /** @var Settlement $settlementById */
        $settlementById = $this->paysafeClient->settlementService()->getSettlementById($createdSettlement->getId());

        /** @var Settlement $expectedSettlementById */
        $expectedSettlementById = $this->readObjectFromFile(
            "json/settlement/get_settlement_by_id_response_card.json",
            Settlement::class
        );

        // Set dynamic values for assertion
        $expectedSettlementById->setMerchantRefNum($settlementById->getMerchantRefNum());
        $expectedSettlementById->setId($settlementById->getId());
        $expectedSettlementById->setTxnTime($settlementById->getTxnTime());
        $expectedSettlementById->setGatewayReconciliationId($settlementById->getGatewayReconciliationId());

        $this->assertEquals($expectedSettlementById, $settlementById);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\SettlementService::processSettlement
     * @covers \Paysafe\PhpSdk\Service\SettlementService::getSettlementsUsingMerchantReferenceNumber
     *
     * @return void
     * @throws PaysafeSdkException
     */
    public function getSettlementsByMerchantReferenceNumber_isSuccessful(): void
    {
        // Create a payment and settle it
        $paymentId = $this->createPayment();

        /** @var SettlementRequest $settlementRequest */
        $settlementRequest = $this->readObjectFromFile(
            "json/settlement/create_settlement_card_request.json",
            SettlementRequest::class
        );
        $merchantRefNum = (string)uniqid();
        $settlementRequest->setMerchantRefNum($merchantRefNum);

        $this->paysafeClient->settlementService()->processSettlement($paymentId, $settlementRequest);

        // Retrieve settlement(s) by merchant reference number
        /** @var SettlementList $settlementsList */
        $settlementsList = $this->paysafeClient->settlementService()->getSettlementsUsingMerchantReferenceNumber(
            $merchantRefNum
        );

        // Read expected response from file
        /** @var SettlementList $expectedSettlementsList */
        $expectedSettlementsList = $this->readObjectFromFile(
            "json/settlement/get_settlement_by_merchant_ref_response.json",
            SettlementList::class
        );

        // Ensure we received the same settlement
        $this->assertNotNull($settlementsList);
        $this->assertNotNull($settlementsList->getSettlements());
        $this->assertNotEmpty($settlementsList->getSettlements());
        $this->assertEquals(1, $settlementsList->getMeta()->getNumberOfRecords());

        // Get the retrieved settlement
        /** @var Settlement $retrievedSettlement */
        $retrievedSettlement = $settlementsList->getSettlements()[0];
        /** @var Settlement $expectedSettlement */
        $expectedSettlement = $expectedSettlementsList->getSettlements()[0];

        // Set dynamic values for assertion
        $expectedSettlement->setMerchantRefNum($retrievedSettlement->getMerchantRefNum());
        $expectedSettlement->setId($retrievedSettlement->getId());
        $expectedSettlement->setTxnTime($retrievedSettlement->getTxnTime());
        $expectedSettlement->setGatewayReconciliationId($retrievedSettlement->getGatewayReconciliationId());
        $expectedSettlement->setStatus($retrievedSettlement->getStatus());

        // Assert equality
        $this->assertEquals($expectedSettlement, $retrievedSettlement);
    }

}
