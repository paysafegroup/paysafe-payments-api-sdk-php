<?php
/**
 * All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE
 */

namespace E2e;


use Error;
use Paysafe\PhpSdk\Model\Payment\Payment;
use Paysafe\PhpSdk\Model\Payment\PaymentList;
use Paysafe\PhpSdk\Model\Payment\PaymentRequest;
use Paysafe\PhpSdk\Model\PaymentHandle\PaymentHandle;

class PaymentsE2eTest extends BasePaysafeE2e
{

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentService::processPayment
     * @covers \Paysafe\PhpSdk\Service\PaymentService::getPaymentById
     * @covers \Paysafe\PhpSdk\Service\PaymentService::getPaymentsUsingMerchantReferenceNumber
     *
     * @return void
     */
    public function payments_card_withAcquirerData_allMethods_areSuccessful(): void
    {
        // first create payment handle
        /** @var PaymentHandle $cardPaymentHandle */
        $cardPaymentHandle = $this->createPayablePaymentHandle();

        // create payment request using previously created payment handle
        /** @var PaymentRequest $paymentRequest */
        $paymentRequest = $this->readObjectFromFile(
            "json/payment/create_payment_request_card_acquirer_data.json",
            PaymentRequest::class
        );
        $paymentRequest->setMerchantRefNum($cardPaymentHandle->getMerchantRefNum());
        $paymentRequest->setPaymentHandleToken($cardPaymentHandle->getPaymentHandleToken());

        // test create payment
        /** @var Payment createdPayment */
        $createdPayment = $this->paysafeClient->paymentService()->processPayment($paymentRequest);

        /** @var Payment $expectedPayment */
        $expectedPayment = $this->readObjectFromFile(
            "json/payment/create_payment_response_card_acquirer_data.json",
            Payment::class
        );

        // set dynamic values for equals
        $expectedPayment->setMerchantRefNum($cardPaymentHandle->getMerchantRefNum());
        $expectedPayment->setId($createdPayment->getId());
        $expectedPayment->setTxnTime($createdPayment->getTxnTime());
        $expectedPayment->setPaymentHandleToken($createdPayment->getPaymentHandleToken());
        $expectedPayment->getGatewayResponse()->setAuthCode($createdPayment->getGatewayResponse()->getAuthCode());
        $expectedPayment->getGatewayResponse()->setMid($createdPayment->getGatewayResponse()->getMid());

        $this->assertEquals($expectedPayment, $createdPayment);

        // wait 3 seconds, so we are sure Gateway response is finalized
        sleep(3);

        // test getting payment by id
        $paymentById = $this->paysafeClient->paymentService()->getPaymentById($createdPayment->getId());

        /** @var Payment $expectedPaymentById */
        $expectedPaymentById = $this->readObjectFromFile(
            "json/payment/get_payment_by_id_response_card_acquirer_data.json",
            Payment::class
        );

        // set dynamic values for equals
        $this->setDynamicValues($expectedPaymentById, $paymentById);
        $expectedPaymentById->setAirlineTravelDetails($paymentById->getAirlineTravelDetails());

        $this->assertEquals($expectedPaymentById, $paymentById);

        // test getting payment using merchant reference number
        $payments = $this->paysafeClient->paymentService()
            ->getPaymentsUsingMerchantReferenceNumber($createdPayment->getMerchantRefNum());

        /** @var PaymentList $expectedPaymentUsingMerchantRefNum */
        $expectedPaymentUsingMerchantRefNum = $this->readObjectFromFile(
            "json/payment/get_payment_using_merchant_ref_num_response_card_acquirer_data.json",
            PaymentList::class
        );

        // set dynamic value for equals
        $this->setDynamicValuesInList($expectedPaymentUsingMerchantRefNum, $payments);
        $expectedPaymentUsingMerchantRefNum->getPayments()[0]->setAirlineTravelDetails($payments->getPayments()[0]->getAirlineTravelDetails());

        $this->assertEquals($expectedPaymentUsingMerchantRefNum, $payments);
    }

    /**
     * sets dynamic value for equals to pass
     *
     * @param Payment $expectedPayment
     * @param Payment $actualPayment
     *
     * @return void
     */
    private function setDynamicValues(Payment $expectedPayment, Payment $actualPayment)
    {
        $expectedPayment->setMerchantRefNum($actualPayment->getMerchantRefNum());
        $expectedPayment->setId($actualPayment->getId());
        $expectedPayment->setTxnTime($actualPayment->getTxnTime());
        $expectedPayment->setPaymentHandleToken($actualPayment->getPaymentHandleToken());
        $expectedPayment->getGatewayResponse()->setAuthCode($actualPayment->getGatewayResponse()->getAuthCode());
        $expectedPayment->getGatewayResponse()->setCode($actualPayment->getGatewayResponse()->getCode());
        $expectedPayment->getGatewayResponse()->setMid($actualPayment->getGatewayResponse()->getMid());
    }

    /**
     * sets dynamic value for equals to pass
     *
     * @param PaymentList $expectedPaymentUsingMerchantRefNum
     * @param PaymentList $payments
     *
     * @return void
     */
    private function setDynamicValuesInList(PaymentList $expectedPaymentUsingMerchantRefNum, PaymentList $payments)
    {
        $expectedPaymentUsingMerchantRefNum->getPayments()[0]->setMerchantRefNum(
            $payments->getPayments()[0]->getMerchantRefNum()
        );
        $expectedPaymentUsingMerchantRefNum->getPayments()[0]->setPaymentHandleToken(
            $payments->getPayments()[0]->getPaymentHandleToken()
        );
        $expectedPaymentUsingMerchantRefNum->getPayments()[0]->setTxnTime(
            $payments->getPayments()[0]->getTxnTime()
        );
        $expectedPaymentUsingMerchantRefNum->getPayments()[0]->setId(
            $payments->getPayments()[0]->getId()
        );
        $expectedPaymentUsingMerchantRefNum->getPayments()[0]->getGatewayResponse()
            ->setAuthCode($payments->getPayments()[0]->getGatewayResponse()->getAuthCode());
        $expectedPaymentUsingMerchantRefNum->getPayments()[0]->getGatewayResponse()
            ->setCode($payments->getPayments()[0]->getGatewayResponse()->getCode());
        $expectedPaymentUsingMerchantRefNum->getPayments()[0]->getGatewayResponse()
            ->setMid($payments->getPayments()[0]->getGatewayResponse()->getMid());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentService::processPayment
     * @covers \Paysafe\PhpSdk\Service\PaymentService::getPaymentById
     * @covers \Paysafe\PhpSdk\Service\PaymentService::getPaymentsUsingMerchantReferenceNumber
     *
     * @return void
     */
    public function payments_card_lodgingDetails_allMethods_areSuccessful(): void
    {
        // first create payment handle
        /** @var PaymentHandle $cardPaymentHandle */
        $cardPaymentHandle = $this->createPayablePaymentHandle();

        // create payment request using previously created payment handle
        /** @var PaymentRequest $paymentRequest */
        $paymentRequest = $this->readObjectFromFile(
            "json/payment/create_payment_request_card_lodging.json",
            PaymentRequest::class
        );
        $paymentRequest->setMerchantRefNum($cardPaymentHandle->getMerchantRefNum());
        $paymentRequest->setPaymentHandleToken($cardPaymentHandle->getPaymentHandleToken());

        // test create payment
        /** @var Payment $createdPayment */
        $createdPayment = $this->paysafeClient->paymentService()->processPayment($paymentRequest);

        /** @var Payment $expectedPayment */
        $expectedPayment = $this->readObjectFromFile(
            "json/payment/create_payment_response_card_lodging.json",
            Payment::class
        );

        // set dynamic values for equals
        $this->setDynamicValues($expectedPayment, $createdPayment);
        $expectedPayment->getSettlements()[0]
            ->setMerchantRefNum($createdPayment->getSettlements()[0]->getMerchantRefNum());
        $expectedPayment->getSettlements()[0]
            ->setId($createdPayment->getSettlements()[0]->getId());
        $expectedPayment->getSettlements()[0]
            ->setTxnTime($createdPayment->getSettlements()[0]->getTxnTime());
        $expectedPayment->getSettlements()[0]
            ->setGatewayReconciliationId($createdPayment->getSettlements()[0]->getGatewayReconciliationId());

        $this->assertEquals($expectedPayment, $createdPayment);

        // wait 3 seconds so we are sure Gateway response is finalized
        sleep(3);

        // test getting payment by id
        $paymentById = $this->paysafeClient->paymentService()->getPaymentById($createdPayment->getId());

        /** @var Payment $expectedPaymentById */
        $expectedPaymentById = $this->readObjectFromFile(
            "json/payment/get_payment_by_id_response_card_lodging.json",
            Payment::class
        );

        // set dynamic values for equals
        $this->setDynamicValues($expectedPaymentById, $paymentById);

        // this field is sometimes returned as empty object, and sometimes as null
        try {
            $airlineTravelDetails = $paymentById->getAirlineTravelDetails();
            $expectedPaymentById->setAirlineTravelDetails($airlineTravelDetails);
        } catch (Error $e) {
            // property not initialized - ignore
        }

        $this->assertEquals($expectedPaymentById, $paymentById);

        // test getting payment using merchant reference number
        $payments = $this->paysafeClient->paymentService()
            ->getPaymentsUsingMerchantReferenceNumber($createdPayment->getMerchantRefNum());

        /** @var PaymentList $expectedPaymentUsingMerchantRefNum */
        $expectedPaymentUsingMerchantRefNum = $this->readObjectFromFile(
            "json/payment/get_payment_using_merchant_ref_num_response_card_lodging.json",
            PaymentList::class
        );

        // set dynamic value for equals
        $this->setDynamicValuesInList($expectedPaymentUsingMerchantRefNum, $payments);

        // this field is sometimes returned as empty object, and sometimes as null
        try {
            $airlineTravelDetails = $payments->getPayments()[0]->getAirlineTravelDetails();
            $expectedPaymentUsingMerchantRefNum->getPayments()[0]
                ->setAirlineTravelDetails($airlineTravelDetails);
        } catch (Error $e) {
            // property not initialized - ignore
        }

        $this->assertEquals($payments, $expectedPaymentUsingMerchantRefNum);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentService::processPayment
     * @covers \Paysafe\PhpSdk\Service\PaymentService::getPaymentById
     * @covers \Paysafe\PhpSdk\Service\PaymentService::getPaymentsUsingMerchantReferenceNumber
     *
     * @return void
     */
    public function payments_card_payfacAirline_allMethods_areSuccessful(): void
    {
        // first create payment handle
        /** @var PaymentHandle $cardPaymentHandle */
        $cardPaymentHandle = $this->createPayablePaymentHandle();

        // create payment request using previously created payment handle
        /** @var PaymentRequest $paymentRequest */
        $paymentRequest = $this->readObjectFromFile(
            "json/payment/create_payment_request_card_payment_payfac_airline.json",
            PaymentRequest::class
        );
        $paymentRequest->setMerchantRefNum($cardPaymentHandle->getMerchantRefNum());
        $paymentRequest->setPaymentHandleToken($cardPaymentHandle->getPaymentHandleToken());

        // test create payment
        $createdPayment = $this->paysafeClient->paymentService()->processPayment($paymentRequest);

        /** @var Payment $expectedPayment */
        $expectedPayment = $this->readObjectFromFile(
            "json/payment/create_payment_response_card_payment_payfac_airline.json",
            Payment::class
        );

        // set dynamic values for equals
        $this->setDynamicValues($expectedPayment, $createdPayment);
        $expectedPayment->getSettlements()[0]
            ->setMerchantRefNum($createdPayment->getSettlements()[0]->getMerchantRefNum());
        $expectedPayment->getSettlements()[0]
            ->setId($createdPayment->getSettlements()[0]->getId());
        $expectedPayment->getSettlements()[0]
            ->setTxnTime($createdPayment->getSettlements()[0]->getTxnTime());
        $expectedPayment->getSettlements()[0]
            ->setGatewayReconciliationId($createdPayment->getSettlements()[0]->getGatewayReconciliationId());

        $this->assertEquals($expectedPayment, $createdPayment);

        // wait 3 seconds so we are sure Gateway response is finalized
        sleep(2);

        // test getting payment by id
        $paymentById = $this->paysafeClient->paymentService()->getPaymentById($createdPayment->getId());

        /** @var Payment $expectedPaymentById */
        $expectedPaymentById = $this->readObjectFromFile(
            "json/payment/get_payment_by_id_response_card_payfac_airline.json",
            Payment::class
        );

        $this->setDynamicValues($expectedPaymentById, $paymentById);

        // this field is sometimes returned as empty object, and sometimes as null
        try {
            $airlineTravelDetails = $paymentById->getAirlineTravelDetails();
            $expectedPaymentById->setAirlineTravelDetails($airlineTravelDetails);
        } catch (Error $e) {
            // property not initialized - ignore
        }

        $this->assertEquals($expectedPaymentById, $paymentById);

        // test getting payment using merchant reference number
        $payments = $this->paysafeClient->paymentService()
            ->getPaymentsUsingMerchantReferenceNumber($createdPayment->getMerchantRefNum());

        /** @var PaymentList $expectedPaymentUsingMerchantRefNum */
        $expectedPaymentUsingMerchantRefNum = $this->readObjectFromFile(
            "json/payment/get_payment_using_merchant_ref_num_response_card_payfac_airline.json",
            PaymentList::class
        );

        $this->setDynamicValuesInList($expectedPaymentUsingMerchantRefNum, $payments);

        // this field is sometimes returned as empty object, and sometimes as null
        try {
            $airlineTravelDetails = $payments->getPayments()[0]->getAirlineTravelDetails();
            $expectedPaymentUsingMerchantRefNum->getPayments()[0]
                ->setAirlineTravelDetails($airlineTravelDetails);
        } catch (Error $e) {
            // property not initialized - ignore
        }

        $this->assertEquals($payments, $expectedPaymentUsingMerchantRefNum);
    }
}
