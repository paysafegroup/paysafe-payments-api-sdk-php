<?php
/* All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Service;

use GuzzleHttp\Psr7\Response;
use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Exception\ApiException;
use Paysafe\PhpSdk\Exception\InvalidCredentialsException;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Exception\RequestDeclinedException;
use Paysafe\PhpSdk\Exception\UnauthorizedException;
use Paysafe\PhpSdk\Model\Card\Card;
use Paysafe\PhpSdk\Model\Card\CardExpiry;
use Paysafe\PhpSdk\Model\Card\Threeds\OrderItemDetails;
use Paysafe\PhpSdk\Model\Card\Threeds\PaymentAccountDetails;
use Paysafe\PhpSdk\Model\Card\Threeds\PurchasedGiftCardDetails;
use Paysafe\PhpSdk\Model\Card\Threeds\ShippingDetailsUsage;
use Paysafe\PhpSdk\Model\Card\Threeds\ThreeDs;
use Paysafe\PhpSdk\Model\Card\Threeds\UserAccountDetails;
use Paysafe\PhpSdk\Model\Card\Threeds\UserLogin;
use Paysafe\PhpSdk\Model\Common\BillingDetails;
use Paysafe\PhpSdk\Model\Common\ReturnLink;
use Paysafe\PhpSdk\Model\PaymentHandle\PaymentHandle;
use Paysafe\PhpSdk\Model\PaymentHandle\PaymentHandleRequest;
use Paysafe\PhpSdk\Service\PaymentHandleService;

class PaymentHandleServiceTest extends BasePaysafeService
{
    const PAYMENT_HANDLES_ENDPOINT = "/paymenthub/v1/paymenthandles";
    const MERCHANT_REF_NUM = "rzkPbqSIHGGOmja8jf2tCKIHg";
    const PAYMENT_HANDLE_ID = "e05205d9-93f3-4c20-9c2a-b6b8dc74cf17";

    private PaymentHandleService $paymentHandleService;

    public function setUp(): void
    {
        parent::setUp();

        $this->paymentHandleService = new PaymentHandleService($this->paysafeApiClient);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentHandleService::createPaymentHandle
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function testCreatePaymentHandle_isSuccessful(): void
    {
        $paymentHandleService = clone $this->paymentHandleService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executePost')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->get_resource_json('paymenthandle/create_payment_handle_card_3ds_response.json')
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($paymentHandleService, PaymentHandleService::class);
        $doReplaceService();

        $paymentHandleRequest = $this->buildPaymentHandleRequest();

        $response = $paymentHandleService->createPaymentHandle($paymentHandleRequest);
        $this->assertNotNull($response);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentHandleService::createPaymentHandle
     *
     * @return void
     */
    public function testCreatePaymentHandle_throwsExceptionOnInvalidCredentialsError(): void
    {
        try {
            $paymentHandleService = clone $this->paymentHandleService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executePost')
                ->willReturn(
                    new Response(
                        401,
                        [
                            'Content-Type' => 'application/json',
                        ],
                        $this->get_resource_json('error/401_invalid_credentials_response.json')
                    )
                );
            $replaceService = function () use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo($paymentHandleService, PaymentHandleService::class);
            $doReplaceService();

            $paymentHandleService->createPaymentHandle(new PaymentHandleRequest());

            $this->fail('Exception not thrown');
        } catch (InvalidCredentialsException $exception) {
            $this->assertEquals("5279", $exception->getError()->getCode());
            $this->assertEquals("Invalid credentials", $exception->getError()->getMessage());
            $this->assertEquals(
                "The authentication credentials are invalid.",
                $exception->getError()->getDetails()[0]
            );
        } catch (PaysafeSdkException|\Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentHandleService::createPaymentHandle
     *
     * @return void
     */
    public function testCreatePaymentHandle_throwsApiException(): void
    {
        try {
            $paymentHandleService = clone $this->paymentHandleService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executePost')
                ->willReturn(
                    new Response(
                        500,
                        [
                            'Content-Type' => 'application/json',
                        ],
                        $this->get_resource_json('error/500_internal_server_error_response.json')
                    )
                );
            $replaceService = function () use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo($paymentHandleService, PaymentHandleService::class);
            $doReplaceService();

            $paymentHandleService->createPaymentHandle(new PaymentHandleRequest());

            $this->fail('Exception not thrown');
        } catch (ApiException $exception) {
            $this->assertEquals(500, $exception->getCode());
            $this->assertEquals("1000", $exception->getError()->getCode());
            $this->assertEquals("Internal Error", $exception->getError()->getMessage());
            $this->assertEquals("An internal error occurred.", $exception->getError()->getDetails()[0]);
        } catch (PaysafeSdkException|\Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentHandleService::createPaymentHandle
     *
     * @return void
     */
    public function testCreatePaymentHandle_throwsRequestDeclinedException(): void
    {
        try {
            $paymentHandleService = clone $this->paymentHandleService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executePost')
                ->willReturn(
                    new Response(
                        402,
                        [
                            'Content-Type' => 'application/json',
                        ],
                        $this->get_resource_json('error/402_request_declined_response.json')
                    )
                );
            $replaceService = function () use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo($paymentHandleService, PaymentHandleService::class);
            $doReplaceService();

            $paymentHandleService->createPaymentHandle(new PaymentHandleRequest());

            $this->fail('Exception not thrown');
        } catch (RequestDeclinedException $exception) {
            $this->assertEquals(402, $exception->getCode());
            $this->assertEquals("ALTERNATE-PAYMENTS-GATEWAY-4", $exception->getError()->getCode());
            $this->assertEquals("Transaction declined", $exception->getError()->getMessage());
            $this->assertEquals(
                "The transaction was declined by the processing gateway.",
                $exception->getError()->getDetails()[0]
            );
            $this->assertEquals(
                "Merchant configuration is incorrect. Verify setup in Netbanx.",
                $exception->getError()->getDetails()[1]
            );

            /** @var PaymentHandle $paymentHandle */
            $paymentHandle = $exception->getApiResponse();

            $this->assertEquals(
                "Refer to Issuer",
                $paymentHandle->getGatewayResponse()->getResponseCodeDescription()
            );
            $this->assertEquals("550e8400-e29b-41d4-a716-446655440000", $paymentHandle->getId());
            $this->assertEquals("12345", $paymentHandle->getMerchantRefNum());

            $this->assertEquals("ALTERNATE-PAYMENTS-GATEWAY-4", $paymentHandle->getError()->getCode());
            $this->assertEquals("Transaction declined", $paymentHandle->getError()->getMessage());
            $this->assertEquals(
                "The transaction was declined by the processing gateway.",
                $paymentHandle->getError()->getDetails()[0]
            );
            $this->assertEquals(
                "Merchant configuration is incorrect. Verify setup in Netbanx.",
                $paymentHandle->getError()->getDetails()[1]
            );
        } catch (PaysafeSdkException|\Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentHandleService::createPaymentHandle
     *
     * @return void
     */
    public function testCreatePaymentHandle_throwsExceptionOnUnauthorizedAccessError(): void
    {
        try {
            $paymentHandleService = clone $this->paymentHandleService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executePost')
                ->willReturn(
                    new Response(
                        403,
                        [
                            'Content-Type' => 'application/json',
                        ],
                        $this->get_resource_json('error/403_unauthorized_response.json')
                    )
                );
            $replaceService = function () use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo($paymentHandleService, PaymentHandleService::class);
            $doReplaceService();

            $paymentHandleService->createPaymentHandle(new PaymentHandleRequest());

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals("5270", $exception->getError()->getCode());
            $this->assertEquals("Unauthorized access", $exception->getError()->getMessage());
            $this->assertEquals(
                "The credentials do not have permission to access the requested data.",
                $exception->getError()->getDetails()[0]
            );
        } catch (\Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentHandleService::getPaymentHandleUsingMerchantReferenceNumber
     *
     * @return void
     */
    public function testGetPaymentHandleUsingMerchantReferenceNumber_isSuccessful(): void
    {
        $paymentHandleService = clone $this->paymentHandleService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executeGet')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->get_resource_json('paymenthandle/get_payment_handle_using_merchant_ref_number_card_response.json')
                )
            );
        $replaceService = function () use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($paymentHandleService, PaymentHandleService::class);
        $doReplaceService();

        $response = $paymentHandleService->getPaymentHandleUsingMerchantReferenceNumber(self::MERCHANT_REF_NUM);

        $this->assertNotNull($response);
        $this->assertNotNull($response->getMeta());
        $this->assertNotNull($response->getPaymentHandles());
        $this->assertNotEmpty($response->getPaymentHandles());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentHandleService::getPaymentHandleUsingMerchantReferenceNumber
     *
     * @return void
     */
    public function testGetPaymentHandleUsingMerchantReferenceNumber_throwsExceptionOnInvalidCredentialsError(): void
    {
        try {
            $paymentHandleService = clone $this->paymentHandleService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executeGet')
                ->willReturn(
                    new Response(
                        401,
                        [
                            'Content-Type' => 'application/json',
                        ],
                        $this->get_resource_json('error/401_invalid_credentials_response.json')
                    )
                );
            $replaceService = function () use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo($paymentHandleService, PaymentHandleService::class);
            $doReplaceService();

            $paymentHandleService->getPaymentHandleUsingMerchantReferenceNumber(self::MERCHANT_REF_NUM);

            $this->fail('Exception not thrown');
        } catch (InvalidCredentialsException $exception) {
            $this->assertEquals(401, $exception->getCode());
            $this->assertEmpty($exception->getInternalCorrelationId());
            $this->assertEquals("5279", $exception->getError()->getCode());
            $this->assertEquals("Invalid credentials", $exception->getError()->getMessage());
            $this->assertEquals(
                "The authentication credentials are invalid.",
                $exception->getError()->getDetails()[0]
            );
        } catch (PaysafeSdkException|\Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentHandleService::getPaymentHandleUsingMerchantReferenceNumber
     *
     * @return void
     */
    public function testGetPaymentHandleUsingMerchantReferenceNumber_throwsExceptionOnUnauthorizedAccessError(): void
    {
        try {
            $paymentHandleService = clone $this->paymentHandleService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executeGet')
                ->willReturn(
                    new Response(
                        403,
                        [
                            'Content-Type' => 'application/json',
                        ],
                        $this->get_resource_json('error/403_unauthorized_response.json')
                    )
                );
            $replaceService = function () use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo($paymentHandleService, PaymentHandleService::class);
            $doReplaceService();

            $paymentHandleService->getPaymentHandleUsingMerchantReferenceNumber(self::MERCHANT_REF_NUM);

            $this->fail('Exception not thrown');
        } catch (UnauthorizedException $exception) {
            $this->assertEquals(403, $exception->getCode());
            $this->assertEmpty($exception->getInternalCorrelationId());
            $this->assertEquals("5270", $exception->getError()->getCode());
            $this->assertEquals("Unauthorized access", $exception->getError()->getMessage());
            $this->assertEquals(
                "The credentials do not have permission to access the requested data.",
                $exception->getError()->getDetails()[0]
            );
        } catch (PaysafeSdkException|\Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentHandleService::getPaymentHandleUsingMerchantReferenceNumber
     *
     * @return void
     */
    public function testGetPaymentHandleUsingMerchantReferenceNumber_throwsExceptionOnEntityNotFoundError(): void
    {
        try {
            $paymentHandleService = clone $this->paymentHandleService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executeGet')
                ->willReturn(
                    new Response(
                        404,
                        [
                            'Content-Type' => 'application/json',
                        ],
                        $this->get_resource_json("error/404_entity_not_found_response.json")
                    )
                );
            $replaceService = function () use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo($paymentHandleService, PaymentHandleService::class);
            $doReplaceService();

            $paymentHandleService->getPaymentHandleUsingMerchantReferenceNumber(self::MERCHANT_REF_NUM);

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(404, $exception->getCode());
            $this->assertEmpty($exception->getInternalCorrelationId());
            $this->assertEquals("5269", $exception->getError()->getCode());
            $this->assertEquals("Entity not found", $exception->getError()->getMessage());
            $this->assertEquals(
                "The ID(s) specified in the URL do not correspond to the values in the system.",
                $exception->getError()->getDetails()[0]
            );
        } catch (\Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentHandleService::getPaymentHandleById
     *
     * @return void
     */
    public function testGetPaymentHandleById_isSuccessful(): void
    {
        $paymentHandleService = clone $this->paymentHandleService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executeGet')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->get_resource_json('paymenthandle/get_payment_handle_by_id_card_response.json')
                )
            );
        $replaceService = function () use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($paymentHandleService, PaymentHandleService::class);
        $doReplaceService();

        $response = $paymentHandleService->getPaymentHandleById(self::PAYMENT_HANDLE_ID);

        $this->assertNotNull($response);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentHandleService::getPaymentHandleById
     *
     * @return void
     */
    public function testGetPaymentHandleById_throwsExceptionOnInvalidCredentialsError(): void
    {
        try {
            $paymentHandleService = clone $this->paymentHandleService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executeGet')
                ->willReturn(
                    new Response(
                        401,
                        [
                            'Content-Type' => 'application/json',
                        ],
                        $this->get_resource_json('error/401_invalid_credentials_response.json')
                    )
                );
            $replaceService = function () use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo($paymentHandleService, PaymentHandleService::class);
            $doReplaceService();

            $response = $paymentHandleService->getPaymentHandleById(self::PAYMENT_HANDLE_ID);

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(401, $exception->getCode());
            $this->assertEmpty($exception->getInternalCorrelationId());
            $this->assertEquals("5279", $exception->getError()->getCode());
            $this->assertEquals("Invalid credentials", $exception->getError()->getMessage());
            $this->assertEquals(
                "The authentication credentials are invalid.",
                $exception->getError()->getDetails()[0]
            );
        } catch (\Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentHandleService::getPaymentHandleById
     *
     * @return void
     */
    public function testGetPaymentHandleById_throwsExceptionOnUnauthorizedAccessError(): void
    {
        try {
            $paymentHandleService = clone $this->paymentHandleService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executeGet')
                ->willReturn(
                    new Response(
                        403,
                        [
                            'Content-Type' => 'application/json',
                        ],
                        $this->get_resource_json('error/403_unauthorized_response.json')
                    )
                );
            $replaceService = function () use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo($paymentHandleService, PaymentHandleService::class);
            $doReplaceService();

            $response = $paymentHandleService->getPaymentHandleById(self::PAYMENT_HANDLE_ID);

            $this->fail('Exception not thrown');
        } catch (UnauthorizedException $exception) {
            $this->assertEquals(403, $exception->getCode());
            $this->assertEmpty($exception->getInternalCorrelationId());
            $this->assertEquals("5270", $exception->getError()->getCode());
            $this->assertEquals("Unauthorized access", $exception->getError()->getMessage());
            $this->assertEquals(
                "The credentials do not have permission to access the requested data.",
                $exception->getError()->getDetails()[0]
            );
        } catch (\Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentHandleService::getPaymentHandleById
     *
     * @return void
     */
    public function testGetPaymentHandleById_throwsExceptionOnEntityNotFoundError(): void
    {
        try {
            $paymentHandleService = clone $this->paymentHandleService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executeGet')
                ->willReturn(
                    new Response(
                        404,
                        [
                            'Content-Type' => 'application/json',
                        ],
                        $this->get_resource_json("error/404_entity_not_found_response.json")
                    )
                );
            $replaceService = function () use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo($paymentHandleService, PaymentHandleService::class);
            $doReplaceService();

            $response = $paymentHandleService->getPaymentHandleById(self::PAYMENT_HANDLE_ID);

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(404, $exception->getCode());
            $this->assertEmpty($exception->getInternalCorrelationId());
            $this->assertEquals("5269", $exception->getError()->getCode());
            $this->assertEquals("Entity not found", $exception->getError()->getMessage());
            $this->assertEquals(
                "The ID(s) specified in the URL do not correspond to the values in the system.",
                $exception->getError()->getDetails()[0]
            );
        } catch (\Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @return ThreeDs
     */
    private function createThreeDsObject(): ThreeDs
    {
        $threeDs = new ThreeDs();

        $threeDs->setMerchantUrl("https://api.qa.paysafe.com/checkout/v2/index.html#/desktop");
        $threeDs->setDeviceChannel("BROWSER");
        $threeDs->setMessageCategory("PAYMENT");
        $threeDs->setTransactionIntent("CHECK_ACCEPTANCE");
        $threeDs->setAuthenticationPurpose("PAYMENT_TRANSACTION");

        $orderItemDetails = new OrderItemDetails();
        $orderItemDetails->setPreOrderItemAvailabilityDate("2014-01-26");
        $orderItemDetails->setPreOrderPurchaseIndicator("MERCHANDISE_AVAILABLE");
        $orderItemDetails->setReorderItemsIndicator("FIRST_TIME_ORDER");
        $orderItemDetails->setShippingIndicator("SHIP_TO_BILLING_ADDRESS");
        $threeDs->setOrderItemDetails($orderItemDetails);

        $purchasedGiftCardDetails = new PurchasedGiftCardDetails();
        $purchasedGiftCardDetails->setAmount(1234);
        $purchasedGiftCardDetails->setCount(2);
        $purchasedGiftCardDetails->setCurrency("USD");
        $threeDs->setPurchasedGiftCardDetails($purchasedGiftCardDetails);

        $paymentAccountDetails = new PaymentAccountDetails();
        $paymentAccountDetails->setCreatedRange("NO_ACCOUNT");
        $paymentAccountDetails->setCreatedDate("2010-01-26");

        $userAccountDetails = new UserAccountDetails();
        $userAccountDetails->setAddCardAttemptsForLastDay(1);
        $userAccountDetails->setChangedDate("2010-01-26");
        $userAccountDetails->setChangedRange("DURING_TRANSACTION");
        $userAccountDetails->setCreatedDate("2010-01-26");
        $userAccountDetails->setCreatedRange("NO_ACCOUNT");
        $userAccountDetails->setPasswordChangedDate("2012-01-26");
        $userAccountDetails->setPasswordChangedRange("NO_CHANGE");
        $userAccountDetails->setPaymentAccountDetails($paymentAccountDetails);
        $threeDs->setUserAccountDetails($userAccountDetails);

        $shippingDetailsUsage = new ShippingDetailsUsage();
        $shippingDetailsUsage->setCardHolderNameMatch(true);
        $shippingDetailsUsage->setInitialUsageDate("2014-01-26");
        $shippingDetailsUsage->setInitialUsageRange("CURRENT_TRANSACTION");
        $threeDs->setShippingDetailsUsage($shippingDetailsUsage);

        $threeDs->setSuspiciousAccountActivity(true);
        $threeDs->setTotalPurchasesSixMonthCount(1);
        $threeDs->setTransactionCountForPreviousDay(1);
        $threeDs->setTransactionCountForPreviousYear(3);

        $userLogin = new UserLogin();
        $userLogin->setAuthenticationMethod("NO_LOGIN");
        $userLogin->setData("Some up to 2048 bytes undefined data");
        $userLogin->setTime("2014-01-26T10:32:28Z");
        $threeDs->setUserLogin($userLogin);

        return $threeDs;
    }

    /**
     * @return array
     */
    private function createReturnLinksList(): array
    {
        $returnLinks = [];

        $returnLink1 = new ReturnLink();
        $returnLink1->setRel('DEFAULT');
        $returnLink1->setHref('https://usgaminggamblig.com/payment/return/');
        $returnLink1->setMethod('GET');
        $returnLinks[] = $returnLink1;

        $returnLink2 = new ReturnLink();
        $returnLink2->setRel('ON_COMPLETED');
        $returnLink2->setHref('https://usgaminggamblig.com/payment/return/success');
        $returnLink2->setMethod('GET');
        $returnLinks[] = $returnLink2;

        $returnLink3 = new ReturnLink();
        $returnLink3->setRel('ON_FAILED');
        $returnLink3->setHref('https://usgaminggamblig.com/payment/return/failed');
        $returnLink3->setMethod('GET');
        $returnLinks[] = $returnLink3;

        return $returnLinks;
    }

    /**
     * @return PaymentHandleRequest
     */
    private function buildPaymentHandleRequest(): PaymentHandleRequest
    {
        $paymentHandleRequest = new PaymentHandleRequest();
        $paymentHandleRequest->setMerchantRefNum(self::MERCHANT_REF_NUM);
        $paymentHandleRequest->setTransactionType("PAYMENT");
        $paymentHandleRequest->setThreeDs($this->createThreeDsObject());
        $cardExpiry = new CardExpiry();
        $cardExpiry->setMonth(10);
        $cardExpiry->setYear(10);
        $card = new Card();
        $card->setCardNum("4000000000001026");
        $card->setCardExpiry($cardExpiry);
        $card->setCvv("111");
        $card->setIssuingCountry("US");
        $paymentHandleRequest->setCard($card);
        $paymentHandleRequest->setAccountId("1009688230");
        $paymentHandleRequest->setPaymentType('CARD');
        $paymentHandleRequest->setAmount(500);
        $paymentHandleRequest->setCurrencyCode('USD');
        $billingDetails = new BillingDetails();
        $billingDetails->setNickName("Home");
        $billingDetails->setStreet("Street name");
        $billingDetails->setCity("City Name");
        $billingDetails->setState("AL");
        $billingDetails->setCountry("US");
        $billingDetails->setZip("94404");
        $paymentHandleRequest->setBillingDetails($billingDetails);
        $paymentHandleRequest->setReturnLinks($this->createReturnLinksList());

        return $paymentHandleRequest;
    }
}
