<?php
/**
 * All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE
 */

namespace E2e;

use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\Payment\PaymentRequest;
use Paysafe\PhpSdk\Model\VoidAuthorization\Enums\VoidAuthorizationStatus;
use Paysafe\PhpSdk\Model\VoidAuthorization\VoidAuthorizationRequest;


class VoidAuthorizationsE2eTest extends BasePaysafeE2e
{
    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\VoidAuthorizationService::voidAuthorization
     * @covers \Paysafe\PhpSdk\Service\VoidAuthorizationService::getVoidAuthorizationById
     * @covers \Paysafe\PhpSdk\Service\VoidAuthorizationService::getVoidAuthorizationUsingMerchantReferenceNumber
     *
     * @return void
     */
    public function voidAuthorization_allMethods_areSuccessful(): void
    {
        // first create payment handle
        $paymentHandle = $this->createPayablePaymentHandle();

        // then create payment using the payment handle
        /** @var PaymentRequest $paymentRequest */
        $paymentRequest = $this->readObjectFromFile(
            "json/payment/create_payment_request_card_no_settlement.json",
            PaymentRequest::class
        );
        $paymentRequest->setMerchantRefNum($paymentHandle->getMerchantRefNum());
        $paymentRequest->setPaymentHandleToken($paymentHandle->getPaymentHandleToken());
        $paymentRequest->setSettleWithAuth(false);

        $payment = $this->paysafeClient->paymentService()->processPayment($paymentRequest);

        $voidAuthRequest = (new VoidAuthorizationRequest())
            ->amount($paymentRequest->getAmount())
            ->merchantRefNum($paymentHandle->getMerchantRefNum());

        // test creating void authorizations
        $createdVoidAuth = $this->paysafeClient->voidAuthorizationService()
            ->voidAuthorization($payment->getId(), $voidAuthRequest);

        $this->assertNotNull($createdVoidAuth->getId());
        $this->assertEquals($voidAuthRequest->getMerchantRefNum(), $createdVoidAuth->getMerchantRefNum());
        $this->assertEquals($voidAuthRequest->getAmount(), $createdVoidAuth->getAmount());
        $this->assertEquals(VoidAuthorizationStatus::COMPLETED, $createdVoidAuth->getStatus());

        // test getting void authorization by id
        $voidAuthById = $this->paysafeClient->voidAuthorizationService()
            ->getVoidAuthorizationById($createdVoidAuth->getId());
        $this->assertEquals($createdVoidAuth, $voidAuthById);

        // test getting void authorization using merchant reference number
        $voidAuthList = $this->paysafeClient->voidAuthorizationService()
            ->getVoidAuthorizationUsingMerchantReferenceNumber(
                $createdVoidAuth->getMerchantRefNum()
            );

        $this->assertEquals(10, $voidAuthList->getMeta()->getLimit());
        $this->assertEquals(1, $voidAuthList->getMeta()->getPage());
        $this->assertEquals(1, $voidAuthList->getMeta()->getNumberOfRecords());

        $this->assertCount(1, $voidAuthList->getVoidAuths());
        $this->assertEquals($createdVoidAuth, $voidAuthList->getVoidAuths()[0]);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\VoidAuthorizationService::voidAuthorization
     *
     * @return void
     */
    public function voidAuthorization_tooLargeAmount_isUnsuccessful(): void
    {
        try {
            // first create payment handle
            $paymentHandle = $this->createPayablePaymentHandle();

            // then create payment using the payment handle
            /** @var PaymentRequest $paymentRequest */
            $paymentRequest = $this->readObjectFromFile(
                "json/payment/create_payment_request_card_no_settlement.json",
                PaymentRequest::class
            );
            $paymentRequest->setMerchantRefNum($paymentHandle->getMerchantRefNum());
            $paymentRequest->setPaymentHandleToken($paymentHandle->getPaymentHandleToken());
            $paymentRequest->setSettleWithAuth(false);

            $payment = $this->paysafeClient->paymentService()->processPayment($paymentRequest);

            /** @var VoidAuthorizationRequest $voidAuthRequest */
            $voidAuthRequest = (new VoidAuthorizationRequest())
                ->amount($paymentRequest->getAmount() * 2)
                ->merchantRefNum($paymentHandle->getMerchantRefNum());

            $this->paysafeClient->voidAuthorizationService()->voidAuthorization($payment->getId(), $voidAuthRequest);
            $this->fail('Exception not thrown!');
        } catch (PaysafeSdkException $exception) {
            // Correlation id is not consistently present across all QA gateway failures.
            $this->assertContains($exception->getCode(), [400, 402]);
            $this->assertNotNull($exception->getError());
            $this->assertContains($exception->getError()->getCode(), ["3501", "5068"]);

            if ($exception->getError()->getCode() === "3501") {
                $this->assertEquals(
                    "The requested authorization reversal amount exceeds the remaining authorization amount.",
                    $exception->getError()->getMessage()
                );
                $this->assertEmpty($exception->getError()->getAdditionalDetails());
                $this->assertEmpty($exception->getError()->getFieldErrors());
            }
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\VoidAuthorizationService::voidAuthorization
     *
     * @return void
     */
    public function voidAuthorization_badId_isUnsuccessful(): void
    {
        try {
            /** @var VoidAuthorizationRequest $voidAuthRequest */
            $voidAuthRequest = (new VoidAuthorizationRequest())
                ->amount(500)
                ->merchantRefNum((string)uniqid());

            $this->paysafeClient->voidAuthorizationService()
                ->voidAuthorization("nonexistentPaymentId", $voidAuthRequest);
            $this->fail('Exception not thrown!');
        } catch (PaysafeSdkException $exception) {
            if ($exception->getCode() >= 500) {
                // Intermittent upstream incidents can return 5xx instead of the expected domain 404.
                $this->markTestSkipped('Skipping due to upstream instability: ' . $exception->getCode());
            }

            $this->assertionsEntityNotFound($exception);
        }
    }

}
