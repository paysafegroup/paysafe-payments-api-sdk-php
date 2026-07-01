<?php
/**
 * All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE
 */

namespace E2e;


use Paysafe\PhpSdk\Model\Verification\Verification;
use Paysafe\PhpSdk\Model\Verification\VerificationList;
use Paysafe\PhpSdk\Model\Verification\VerificationRequest;

class VerificationsE2eTest extends BasePaysafeE2e
{
    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\VerificationService::createVerification
     * @covers \Paysafe\PhpSdk\Service\VerificationService::getVerificationById
     * @covers \Paysafe\PhpSdk\Service\VerificationService::getVerificationByMerchantReferenceNumber
     *
     * @return void
     */
    public function verifications_card_allMethods_areSuccessful(): void
    {
        // first create payment handle
        $paymentHandle = $this->createPayablePaymentHandle();

        // create verification request using previously created payment handle
        /** @var VerificationRequest $verificationRequest */
        $verificationRequest = $this->readObjectFromFile(
            "json/verification/create_verification_request_card.json",
            VerificationRequest::class
        );
        $verificationRequest->setMerchantRefNum($paymentHandle->getMerchantRefNum());
        $verificationRequest->setPaymentHandleToken($paymentHandle->getPaymentHandleToken());

        // test create verification
        $createdVerification = $this->paysafeClient->verificationService()
            ->createVerification($verificationRequest);

        /** @var Verification $expectedVerification */
        $expectedVerification = $this->readObjectFromFile(
            "json/verification/verification_response_card.json",
            Verification::class
        );
        $expectedVerification->setMerchantRefNum($paymentHandle->getMerchantRefNum());
        $expectedVerification->setId($createdVerification->getId());
        $expectedVerification->setTxnTime($createdVerification->getTxnTime());

        // test getting verification by id
        $verificationById = $this->paysafeClient->verificationService()
            ->getVerificationById($createdVerification->getId());

        /** @var Verification $expectedVerificationById */
        $expectedVerificationById = $this->readObjectFromFile(
            "json/verification/get_verification_by_id_response_card.json",
            Verification::class
        );

        $this->setDynamicValues($expectedVerificationById, $verificationById);

        $this->assertEquals($expectedVerificationById, $verificationById);

        // test getting verification using merchant reference number
        $verifications = $this->paysafeClient->verificationService()
            ->getVerificationByMerchantReferenceNumber(
                $createdVerification->getMerchantRefNum(),
                null,
                null,
                null,
                null
            );

        /** @var VerificationList $expectedVerificationUsingMerchantRefNum */
        $expectedVerificationUsingMerchantRefNum = $this->readObjectFromFile(
            "json/verification/get_verification_using_merchant_ref_num_response_card.json",
            VerificationList::class
        );

        $this->setDynamicValuesInList($expectedVerificationUsingMerchantRefNum, $verifications);

        $this->assertEquals($verifications, $expectedVerificationUsingMerchantRefNum);
    }

    /**
     * @param Verification $expectedVerificationById
     * @param Verification $verificationById
     *
     * @return void
     */
    private function setDynamicValues(Verification $expectedVerificationById, Verification $verificationById): void
    {
        // set dynamic values for equals
        $expectedVerificationById->setId($verificationById->getId());
        $expectedVerificationById->setMerchantRefNum($verificationById->getMerchantRefNum());
        $expectedVerificationById->setTxnTime($verificationById->getTxnTime());
        $expectedVerificationById->getGatewayResponse()->setAuthCode(
            $verificationById->getGatewayResponse()->getAuthCode()
        );
        $expectedVerificationById->getGatewayResponse()->setCode(
            $verificationById->getGatewayResponse()->getCode()
        );
        $expectedVerificationById->getGatewayResponse()->setMid(
            $verificationById->getGatewayResponse()->getMid()
        );
        $expectedVerificationById->setCardSchemeTransactionId($verificationById->getCardSchemeTransactionId());
    }

    /**
     * @param VerificationList $expectedVerificationUsingMerchantRefNum
     * @param VerificationList $verifications
     *
     * @return void
     */
    private function setDynamicValuesInList(
        VerificationList $expectedVerificationUsingMerchantRefNum,
        VerificationList $verifications
    ): void
    {
        // set dynamic value for equals
        $expectedVerificationUsingMerchantRefNum->getVerifications()[0]->setMerchantRefNum(
            $verifications->getVerifications()[0]->getMerchantRefNum()
        );
        $expectedVerificationUsingMerchantRefNum->getVerifications()[0]->setTxnTime(
            $verifications->getVerifications()[0]->getTxnTime()
        );
        $expectedVerificationUsingMerchantRefNum->getVerifications()[0]->setId(
            $verifications->getVerifications()[0]->getId()
        );
        $expectedVerificationUsingMerchantRefNum->getVerifications()[0]->getGatewayResponse()
            ->setAuthCode($verifications->getVerifications()[0]->getGatewayResponse()->getAuthCode());
        $expectedVerificationUsingMerchantRefNum->getVerifications()[0]->getGatewayResponse()
            ->setCode($verifications->getVerifications()[0]->getGatewayResponse()->getCode());
        $expectedVerificationUsingMerchantRefNum->getVerifications()[0]->getGatewayResponse()
            ->setMid($verifications->getVerifications()[0]->getGatewayResponse()->getMid());
        $expectedVerificationUsingMerchantRefNum->getVerifications()[0]->setCardSchemeTransactionId(
            $verifications->getVerifications()[0]->getCardSchemeTransactionId()
        );
    }
}
