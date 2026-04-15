<?php
/* All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Service;

use GuzzleHttp\Psr7\Response;
use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Exception\ApiConnectionException;
use Paysafe\PhpSdk\Exception\ApiException;
use Paysafe\PhpSdk\Exception\InvalidCredentialsException;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Exception\RequestDeclinedException;
use Paysafe\PhpSdk\Exception\UnauthorizedException;
use Paysafe\PhpSdk\Model\Card\Card;
use Paysafe\PhpSdk\Model\Card\CardExpiry;
use Paysafe\PhpSdk\Model\Card\ThreeDs\OrderItemDetails;
use Paysafe\PhpSdk\Model\Card\ThreeDs\PaymentAccountDetails;
use Paysafe\PhpSdk\Model\Card\ThreeDs\PurchasedGiftCardDetails;
use Paysafe\PhpSdk\Model\Card\ThreeDs\ShippingDetailsUsage;
use Paysafe\PhpSdk\Model\Card\ThreeDs\ThreeDs;
use Paysafe\PhpSdk\Model\Card\ThreeDs\UserAccountDetails;
use Paysafe\PhpSdk\Model\Card\ThreeDs\UserLogin;
use Paysafe\PhpSdk\Model\Common\BillingDetails;
use Paysafe\PhpSdk\Model\Common\Meta;
use Paysafe\PhpSdk\Model\Common\ReturnLink;
use Paysafe\PhpSdk\Model\PaymentHandle\PaymentHandle;
use Paysafe\PhpSdk\Model\PaymentHandle\PaymentHandleList;
use Paysafe\PhpSdk\Model\PaymentHandle\PaymentHandleRequest;
use Paysafe\PhpSdk\Service\PaymentHandleService;

class PaymentHandleServiceTest extends BasePaysafeTest
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
     */
    public function testCreatePaymentHandle_isSuccessful(): void
    {
        $paymentHandleService = clone $this->paymentHandleService;

        $mockedResponse = $this->mockCreatePaymentHandleResponse();

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executePost')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $mockedResponse
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($paymentHandleService, PaymentHandleService::class);
        $doReplaceService();

        $paymentHandleRequest = new PaymentHandleRequest();
        $paymentHandleRequest->setMerchantRefNum(self::MERCHANT_REF_NUM);
        $paymentHandleRequest->setTransactionType("PAYMENT");
        $paymentHandleRequest->setThreeDs($this->createThreeDsObject());
        $cardExpiry = new CardExpiry();
        $cardExpiry->setMonth("10");
        $cardExpiry->setYear("10");
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
                        self::INVALID_CREDENTIALS_ERROR_RESPONSE
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
                        self::INTERNAL_SERVER_ERROR_RESPONSE
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
                        self::REQUEST_DECLINED_RESPONSE
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
            $this->assertEquals("random-uuid", $paymentHandle->getId());
            $this->assertEquals("123456", $paymentHandle->getMerchantRefNum());

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
                        self::UNAUTHORIZED_ACCESS_ERROR_RESPONSE
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
                    $this->mockGetPaymentHandleBymerchantRefNum()
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
                        self::INVALID_CREDENTIALS_ERROR_RESPONSE
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
                        self::UNAUTHORIZED_ACCESS_ERROR_RESPONSE
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
                        self::ENTITY_NOT_FOUND_ERROR_RESPONSE
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
                    $this->mockGetPaymentHandleByIdResponse()
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
                        self::INVALID_CREDENTIALS_ERROR_RESPONSE
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
                        self::UNAUTHORIZED_ACCESS_ERROR_RESPONSE
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
                        self::ENTITY_NOT_FOUND_ERROR_RESPONSE
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
     * @return string
     */
    private function mockCreatePaymentHandleResponse(): string
    {
        return "{\n" .
        "  \"id\": \"b5c30668-5724-4499-9b9a-c326c943d31c\",\n" .
        "  \"accountId\": \"1009688230\",\n" .
        "  \"paymentType\": \"CARD\",\n" .
        "  \"paymentHandleToken\": \"SC2INoYvSe2MzQuB\",\n" .
        "  \"merchantRefNum\": \"fc5b62df1202e491475d\",\n" .
        "  \"currencyCode\": \"USD\",\n" .
        "  \"txnTime\": \"2023-01-27T10:14:26Z\",\n" .
        "  \"billingDetails\": {\n" .
        "    \"nickName\": \"Home\",\n" .
        "    \"street\": \"TEST\",\n" .
        "    \"city\": \"CA\",\n" .
        "    \"zip\": \"94404\",\n" .
        "    \"state\": \"CA\",\n" .
        "    \"country\": \"US\"\n" .
        "  },\n" .
        "  \"customerIp\": \"10.195.93.117\",\n" .
        "  \"status\": \"PAYABLE\",\n" .
        "  \"amount\": 500,\n" .
        "  \"action\": \"NONE\",\n" .
        "  \"usage\": \"SINGLE_USE\",\n" .
        "  \"timeToLiveSeconds\": 299,\n" .
        "  \"transactionType\": \"PAYMENT\",\n" .
        "  \"executionMode\": \"SYNCHRONOUS\",\n" .
        "  \"card\": {\n" .
        "    \"cardExpiry\": {\n" .
        "      \"month\": \"10\",\n" .
        "      \"year\": \"2025\"\n" .
        "    },\n" .
        "    \"holderName\": \"Dilip\",\n" .
        "    \"cardType\": \"VI\",\n" .
        "    \"cardBin\": \"400000\",\n" .
        "    \"lastDigits\": \"1026\",\n" .
        "    \"cardCategory\": \"CREDIT\",\n" .
        "    \"issuingCountry\": \"US\"\n" .
        "  },\n" .
        "  \"returnLinks\": [\n" .
        "    {\n" .
        "      \"method\": \"GET\",\n" .
        "      \"rel\": \"default\",\n" .
        "      \"href\": \"https://usgaminggamblig.com/payment/return/\"\n" .
        "    },\n" .
        "    {\n" .
        "      \"method\": \"GET\",\n" .
        "      \"rel\": \"on_completed\",\n" .
        "      \"href\": \"https://usgaminggamblig.com/payment/return/success\"\n" .
        "    },\n" .
        "    {\n" .
        "      \"method\": \"GET\",\n" .
        "      \"rel\": \"on_failed\",\n" .
        "      \"href\": \"https://usgaminggamblig.com/payment/return/failed\"\n" .
        "    }\n" .
        "  ],\n" .
        "  \"skip3ds\": false,\n" .
        "  \"threeDs\": {\n" .
        "    \"merchantUrl\": \"https://api.qa.paysafe.com/checkout/v2/index.html#/desktop\",\n" .
        "    \"deviceChannel\": \"BROWSER\",\n" .
        "    \"requestorChallengePreference\": \"NO_PREFERENCE\",\n" .
        "    \"messageCategory\": \"PAYMENT\",\n" .
        "    \"transactionIntent\": \"CHECK_ACCEPTANCE\",\n" .
        "    \"authenticationPurpose\": \"PAYMENT_TRANSACTION\",\n" .
        "    \"orderItemDetails\": {\n" .
        "      \"preOrderItemAvailabilityDate\": \"2014-01-26\",\n" .
        "      \"preOrderPurchaseIndicator\": \"MERCHANDISE_AVAILABLE\",\n" .
        "      \"reorderItemsIndicator\": \"FIRST_TIME_ORDER\",\n" .
        "      \"shippingIndicator\": \"SHIP_TO_BILLING_ADDRESS\"\n" .
        "    },\n" .
        "    \"purchasedGiftCardDetails\": {\n" .
        "      \"amount\": 1234,\n" .
        "      \"count\": 2,\n" .
        "      \"currency\": \"USD\"\n" .
        "    },\n" .
        "    \"userAccountDetails\": {\n" .
        "      \"addCardAttemptsForLastDay\": 1,\n" .
        "      \"changedDate\": \"2010-01-26\",\n" .
        "      \"changedRange\": \"DURING_TRANSACTION\",\n" .
        "      \"createdDate\": \"2010-01-26\",\n" .
        "      \"createdRange\": \"NO_ACCOUNT\",\n" .
        "      \"passwordChangedDate\": \"2012-01-26\",\n" .
        "      \"passwordChangedRange\": \"NO_CHANGE\",\n" .
        "      \"suspiciousAccountActivity\": true,\n" .
        "      \"totalPurchasesSixMonthCount\": 1,\n" .
        "      \"transactionCountForPreviousDay\": 1,\n" .
        "      \"transactionCountForPreviousYear\": 3,\n" .
        "      \"shippingDetailsUsage\": {\n" .
        "        \"cardHolderNameMatch\": true,\n" .
        "        \"initialUsageDate\": \"2014-01-26\",\n" .
        "        \"initialUsageRange\": \"CURRENT_TRANSACTION\"\n" .
        "      },\n" .
        "      \"userLogin\": {\n" .
        "        \"authenticationMethod\": \"NO_LOGIN\",\n" .
        "        \"data\": \"Some up to 2048 bytes undefined data\",\n" .
        "        \"time\": \"2014-01-26T10:32:28Z\"\n" .
        "      },\n" .
        "      \"paymentAccountDetails\": {\n" .
        "        \"createdRange\": \"NO_ACCOUNT\",\n" .
        "        \"createdDate\": \"2010-01-26\"\n" .
        "      }\n" .
        "    }\n" .
        "  }\n" .
        "}";
    }

    /**
     * @return string
     */
    private function mockGetPaymentHandleBymerchantRefNum(): string
    {
        return "{\n" .
        "    \"meta\": {\n" .
        "        \"numberOfRecords\": 1,\n" .
        "        \"limit\": 10,\n" .
        "        \"page\": 1\n" .
        "    },\n" .
        "    \"paymentHandles\": [\n" .
        "        {\n" .
        "            \"id\": \"e05205d9-93f3-4c20-9c2a-b6b8dc74cf17\",\n" .
        "            \"amount\": 1054,\n" .
        "            \"merchantRefNum\": \"rzkPbqSIHGGOmja8jf2tCKIHg\",\n" .
        "            \"action\": \"NONE\",\n" .
        "            \"currencyCode\": \"USD\",\n" .
        "            \"usage\": \"SINGLE_USE\",\n" .
        "            \"status\": \"COMPLETED\",\n" .
        "            \"timeToLiveSeconds\": 0,\n" .
        "            \"transactionType\": \"PAYMENT\",\n" .
        "            \"paymentType\": \"CARD\",\n" .
        "            \"executionMode\": \"SYNCHRONOUS\",\n" .
        "            \"customerIp\": \"10.195.2.134\",\n" .
        "            \"paymentHandleToken\": \"SCV2sq8UR05XVVqY\",\n" .
        "            \"paymentHandleTokenFrom\": \"SCsDi8oYYlKeeSQm\",\n" .
        "            \"profile\": {\n" .
        "                \"locale\": \"en\",\n" .
        "                \"firstName\": \"John\",\n" .
        "                \"lastName\": \"Doe\",\n" .
        "                \"email\": \"adrian.parvan@paysafe.com\"\n" .
        "            },\n" .
        "            \"billingDetails\": {\n" .
        "                \"street\": \"Airport Terminal\",\n" .
        "                \"city\": \"Columbus\",\n" .
        "                \"country\": \"US\",\n" .
        "                \"state\": \"OH\",\n" .
        "                \"zip\": \"43219\"\n" .
        "            },\n" .
        "            \"card\": {\n" .
        "                \"cardExpiry\": {\n" .
        "                    \"month\": \"12\",\n" .
        "                    \"year\": \"2026\"\n" .
        "                },\n" .
        "                \"holderName\": \"John Doe\",\n" .
        "                \"status\": \"ACTIVE\",\n" .
        "                \"cardType\": \"VI\",\n" .
        "                \"cardBin\": \"400000\",\n" .
        "                \"lastDigits\": \"2503\",\n" .
        "                \"cardCategory\": \"CREDIT\",\n" .
        "                \"issuingCountry\": \"US\",\n" .
        "                \"networkToken\": {\n" .
        "                    \"bin\": \"400000\",\n" .
        "                    \"lastDigits\": \"2503\",\n" .
        "                    \"status\": \"INACTIVE\",\n" .
        "                    \"expiry\": {\n" .
        "                        \"month\": \"12\",\n" .
        "                        \"year\": \"2026\"\n" .
        "                    },\n" .
        "                    \"cardArt\": {\n" .
        "                        \"cardArtUrl\": " .
        "\"https://hosted.qa.ies.paysafe.cloud/networktoken/card-art/visa/22af01f2bdf445e497895d502dd1f1ae.png\",\n" .
        "                        \"isCobranded\": false\n" .
        "                    }\n" .
        "                },\n" .
        "                \"tokenType\": \"NETWORK_TOKEN\"\n" .
        "            },\n" .
        "            \"returnLinks\": [\n" .
        "                {\n" .
        "                    \"method\": \"GET\",\n" .
        "                    \"rel\": \"on_completed\",\n" .
        "                    \"href\": " .
            "\"https://hosted.qa.ies.paysafe.cloud/checkout/v2/pages/redirect-success.html?shouldAutoClose=false\"\n" .
        "                },\n" .
        "                {\n" .
        "                    \"method\": \"GET\",\n" .
        "                    \"rel\": \"on_failed\",\n" .
        "                    \"href\": ".
            "\"https://hosted.qa.ies.paysafe.cloud/checkout/v2/pages/redirect-error.html?shouldAutoClose=false\"\n" .
        "                },\n" .
        "                {\n" .
        "                    \"method\": \"GET\",\n" .
        "                    \"rel\": \"default\",\n" .
        "                    \"href\": ".
            "\"https://hosted.qa.ies.paysafe.cloud/checkout/v2/pages/redirect-success.html?shouldAutoClose=false\"\n" .
        "                }\n" .
        "            ],\n" .
        "            \"txnTime\": \"2024-12-04T14:25:03Z\",\n" .
        "            \"skip3ds\": false\n" .
        "        }\n" .
        "    ]\n" .
        "}";
    }

    /**
     * @return string
     */
    private function mockGetPaymentHandleByIdResponse(): string
    {
        return "{\n" .
        "    \"id\": \"e05205d9-93f3-4c20-9c2a-b6b8dc74cf17\",\n" .
        "    \"paymentType\": \"CARD\",\n" .
        "    \"paymentHandleToken\": \"SCV2sq8UR05XVVqY\",\n" .
        "    \"merchantRefNum\": \"rzkPbqSIHGGOmja8jf2tCKIHg\",\n" .
        "    \"currencyCode\": \"USD\",\n" .
        "    \"txnTime\": \"2024-12-04T14:25:03Z\",\n" .
        "    \"billingDetails\": {\n" .
        "        \"street\": \"Airport Terminal\",\n" .
        "        \"city\": \"Columbus\",\n" .
        "        \"zip\": \"43219\",\n" .
        "        \"state\": \"OH\",\n" .
        "        \"country\": \"US\"\n" .
        "    },\n" .
        "    \"customerIp\": \"10.195.2.134\",\n" .
        "    \"status\": \"COMPLETED\",\n" .
        "    \"amount\": 1054,\n" .
        "    \"action\": \"NONE\",\n" .
        "    \"usage\": \"SINGLE_USE\",\n" .
        "    \"timeToLiveSeconds\": 0,\n" .
        "    \"transactionType\": \"PAYMENT\",\n" .
        "    \"executionMode\": \"SYNCHRONOUS\",\n" .
        "    \"paymentHandleTokenFrom\": \"SCsDi8oYYlKeeSQm\",\n" .
        "    \"profile\": {\n" .
        "        \"locale\": \"en\",\n" .
        "        \"firstName\": \"John\",\n" .
        "        \"lastName\": \"Doe\",\n" .
        "        \"email\": \"adrian.parvan@paysafe.com\"\n" .
        "    },\n" .
        "    \"card\": {\n" .
        "        \"cardExpiry\": {\n" .
        "            \"month\": \"12\",\n" .
        "            \"year\": \"2026\"\n" .
        "        },\n" .
        "        \"holderName\": \"John Doe\",\n" .
        "        \"status\": \"ACTIVE\",\n" .
        "        \"cardType\": \"VI\",\n" .
        "        \"cardBin\": \"400000\",\n" .
        "        \"lastDigits\": \"2503\",\n" .
        "        \"cardCategory\": \"CREDIT\",\n" .
        "        \"issuingCountry\": \"US\",\n" .
        "        \"networkToken\": {\n" .
        "            \"bin\": \"400000\",\n" .
        "            \"lastDigits\": \"2503\",\n" .
        "            \"status\": \"INACTIVE\",\n" .
        "            \"expiry\": {\n" .
        "                \"month\": \"12\",\n" .
        "                \"year\": \"2026\"\n" .
        "            },\n" .
        "            \"cardArt\": {\n" .
        "                \"cardArtUrl\": ".
            "\"https://hosted.qa.ies.paysafe.cloud/networktoken/card-art/visa/22a...png\",\n" .
        "                \"isCobranded\": false\n" .
        "            }\n" .
        "        },\n" .
        "        \"tokenType\": \"NETWORK_TOKEN\"\n" .
        "    },\n" .
        "    \"returnLinks\": [\n" .
        "        {\n" .
        "            \"method\": \"GET\",\n" .
        "            \"rel\": \"on_completed\",\n" .
        "            \"href\": ".
            "\"https://hosted.qa.ies.paysafe.cloud/checkout/v2/pages/redirect-success.html?shouldAutoClose=false\"\n" .
        "        },\n" .
        "        {\n" .
        "            \"method\": \"GET\",\n" .
        "            \"rel\": \"on_failed\",\n" .
        "            \"href\": ".
            "\"https://hosted.qa.ies.paysafe.cloud/checkout/v2/pages/redirect-error.html?shouldAutoClose=false\"\n" .
        "        },\n" .
        "        {\n" .
        "            \"method\": \"GET\",\n" .
        "            \"rel\": \"default\",\n" .
        "            \"href\": ".
            "\"https://hosted.qa.ies.paysafe.cloud/checkout/v2/pages/redirect-success.html?shouldAutoClose=false\"\n" .
        "        }\n" .
        "    ],\n" .
        "    \"threeDs\": {\n" .
        "        \"deviceFingerprintingId\": \"58e81317-8a3e-4ea2-9b08-e4947eba7623\"\n" .
        "    },\n" .
        "    \"skip3ds\": false\n" .
        "}";
    }

}
