<?php
/**
 * All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE
 */

namespace E2e;

use Exception;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\Customer\Customer;
use Paysafe\PhpSdk\Model\Customer\CustomerRequest;
use Paysafe\PhpSdk\Model\Customer\SingleUseCustomerToken\SingleUseCustomerToken;
use Paysafe\PhpSdk\Model\Customer\SingleUseCustomerToken\SingleUseCustomerTokenRequest;

class CustomerSingleUseTokenE2eTest extends BasePaysafeE2e
{
    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerSingleUseTokenService::createSingleUseCustomerToken
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function createSingleUseCustomerToken_isSuccessful(): void
    {
        $customer = $this->createCustomer();

        $generatedSingleUseToken = $this->createSingleUseCustomerToken($customer);

        /** @var SingleUseCustomerToken $expectedSingleUseToken */
        $expectedSingleUseToken = $this->readObjectFromFile(
            "json/customer/create_customer_single_use_token_response.json",
            SingleUseCustomerToken::class
        );

        $expectedSingleUseToken->setId($generatedSingleUseToken->getId());
        $expectedSingleUseToken->setCustomerId($customer->getId());
        $expectedSingleUseToken->setSingleUseCustomerToken($generatedSingleUseToken->getSingleUseCustomerToken());

        $this->assertEquals($expectedSingleUseToken, $generatedSingleUseToken);
    }

    /**
     * @return Customer
     *
     * @throws PaysafeSdkException
     */
    private function createCustomer(): Customer
    {
        /** @var CustomerRequest $requestBody */
        $requestBody = $this->readObjectFromFile(
            "json/customer/create_customer_payment_handle_request.json",
            CustomerRequest::class
        );
        $requestBody->setMerchantCustomerId((string)uniqid());

        return $this->paysafeClient->customerService()->createCustomer($requestBody);
    }

    /**
     * @param Customer $customer
     *
     * @return SingleUseCustomerToken
     *
     * @throws Exception
     */
    private function createSingleUseCustomerToken(Customer $customer): SingleUseCustomerToken
    {
        /** @var SingleUseCustomerTokenRequest $requestBody */
        $requestBody = $this->readObjectFromFile(
            "json/customer/create_customer_single_use_token_request.json",
            SingleUseCustomerTokenRequest::class
        );
        $requestBody->setMerchantRefNum($customer->getMerchantCustomerId());

        return $this->paysafeClient
            ->customerSingleUseTokenService()
            ->createSingleUseCustomerToken($customer->getId(), $requestBody);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerSingleUseTokenService::createSingleUseCustomerToken
     *
     * @return void
     */
    public function createSingleUseCustomerToken_customerNotFound_throwsException(): void
    {
        try {
            $customer = $this->createCustomer();

            /** @var SingleUseCustomerTokenRequest $requestBody */
            $requestBody = $this->readObjectFromFile(
                "json/customer/create_customer_single_use_token_request.json",
                SingleUseCustomerTokenRequest::class
            );
            $requestBody->setMerchantRefNum($customer->getMerchantCustomerId());

            $this->paysafeClient->customerSingleUseTokenService()->createSingleUseCustomerToken(
                "non-existing-id",
                $requestBody
            );

            $this->fail('exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertionsEntityNotFound($exception);
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerSingleUseTokenService::getSingleUseCustomerToken
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function getSingleUseCustomerToken_isSuccessful(): void
    {
        $generatedSingleUseCustomerToken = $this->createSingleUseCustomerToken($this->createCustomer());

        $singleUseTokenById = $this->paysafeClient->customerSingleUseTokenService()->getSingleUseCustomerToken(
            $generatedSingleUseCustomerToken->getId()
        );

        $this->assertNotNull($singleUseTokenById);
        $this->assertNotNull($singleUseTokenById->getTimeToLiveSeconds());
        $this->assertEquals($generatedSingleUseCustomerToken->getId(), $singleUseTokenById->getId());
        $this->assertEquals($generatedSingleUseCustomerToken->getCustomerId(), $singleUseTokenById->getCustomerId());
        $this->assertEquals(
            $generatedSingleUseCustomerToken->getSingleUseCustomerToken(),
            $singleUseTokenById->getSingleUseCustomerToken()
        );
        $this->assertEquals("ACTIVE", $singleUseTokenById->getStatus());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerSingleUseTokenService::getSingleUseCustomerToken
     *
     * @return void
     */
    public function getSingleUseCustomerToken_tokenNotFound_throwsException(): void
    {
        try {
            $this->paysafeClient->customerSingleUseTokenService()->getSingleUseCustomerToken(
                "non-existing-id",
            );

            $this->fail('exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertionsEntityNotFound($exception);
        }
    }
}
