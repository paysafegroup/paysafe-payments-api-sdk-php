<?php
/* All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Service;

use GuzzleHttp\Psr7\Response;
use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\Common\PaymentFacilitator\PaymentFacilitator;
use Paysafe\PhpSdk\Model\Common\PaymentFacilitator\SubMerchant;
use Paysafe\PhpSdk\Model\Common\PaymentFacilitator\SubMerchantAddress;
use Paysafe\PhpSdk\Model\Verification\VerificationRequest;
use Paysafe\PhpSdk\Service\VerificationService;

class VerificationServiceTest extends BasePaysafeTest
{
    const VERIFICATION_ENDPOINT = "/paymenthub/v1/verifications";

    const VERIFICATION_ID = "71aea8ae-e801-4df3-9436-c5a61c88d3ad";
    const MERCHANT_REF_NUM = "2009581773001912343";

    private VerificationService $verificationService;

    public function setUp(): void
    {
        parent::setUp();

        $this->verificationService = new VerificationService($this->paysafeApiClient);
    }


    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\VerificationService::getVerificationById
     *
     * @return void
     */
    public function testGetVerificationById_isSuccessful(): void
    {
        $verificationService = clone $this->verificationService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executeGet')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->mockGetResponse()
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($verificationService, VerificationService::class);
        $doReplaceService();

        $response = $verificationService->getVerificationById(self::VERIFICATION_ID);

        $this->assertNotNull($response);
    }


    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\VerificationService::getVerificationById
     *
     * @return void
     */
    public function testGetVerificationById_throwsExceptionOnInvalidCredentialsError(): void
    {
        try {
            $verificationService = clone $this->verificationService;

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
            $doReplaceService = $replaceService->bindTo($verificationService, VerificationService::class);
            $doReplaceService();

            $verificationService->getVerificationById(self::VERIFICATION_ID);

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(401, $exception->getCode());
            $this->assertNull($exception->getInternalCorrelationId());
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
     * @covers \Paysafe\PhpSdk\Service\VerificationService::getVerificationById
     *
     * @return void
     */
    public function testGetVerificationById_throwsExceptionOnEntityNotFoundError(): void
    {
        try {
            $verificationService = clone $this->verificationService;

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
            $doReplaceService = $replaceService->bindTo($verificationService, VerificationService::class);
            $doReplaceService();

            $verificationService->getVerificationById(self::VERIFICATION_ID);

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(404, $exception->getCode());
            $this->assertNull($exception->getInternalCorrelationId());
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
     * @covers \Paysafe\PhpSdk\Service\VerificationService::getVerificationById
     *
     * @return void
     */
    public function testGetVerificationById_throwsExceptionOnUnauthorizedAccessError(): void
    {
        try {
            $verificationService = clone $this->verificationService;

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
            $doReplaceService = $replaceService->bindTo($verificationService, VerificationService::class);
            $doReplaceService();

            $verificationService->getVerificationById(self::VERIFICATION_ID);

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(403, $exception->getCode());
            $this->assertNull($exception->getInternalCorrelationId());
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
     * @covers \Paysafe\PhpSdk\Service\VerificationService::getVerificationById
     *
     * @return void
     */
    public function testGetVerificationById_throwsPaysafeSdkExceptionOnIOError(): void
    {
        try {
            $verificationService = clone $this->verificationService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executeGet')
                ->willReturn(
                    new Response(400)
                );
            $replaceService = function () use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo($verificationService, VerificationService::class);
            $doReplaceService();

            $verificationService->getVerificationById(self::VERIFICATION_ID);

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException|\Exception $exception) {
            $this->assertEquals(400, $exception->getCode());
            $this->assertNull($exception->getInternalCorrelationId());
            $this->assertNull($exception->getError());
        }
    }


    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\VerificationService::getVerificationUsingMerchantReferenceNumber
     *
     * @return void
     */
    public function testGetVerificationUsingMerchantReferenceNumber_isSuccessful(): void
    {
        $verificationService = clone $this->verificationService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executeGet')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->mockGetVerificationUsingMerchantReferenceNumber()
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($verificationService, VerificationService::class);
        $doReplaceService();

        $response = $verificationService->getVerificationByMerchantReferenceNumber(self::MERCHANT_REF_NUM);

        $this->assertNotNull($response);
        $this->assertNotNull($response->getMeta());
        $this->assertNotNull($response->getVerifications());
        $this->assertNotEmpty($response->getVerifications());
    }


    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\VerificationService::getVerificationUsingMerchantReferenceNumber
     *
     * @return void
     */
    public function testGetVerificationUsingMerchantReferenceNumber_throwsExceptionOnInvalidCredentialsError(): void
    {
        try {
            $verificationService = clone $this->verificationService;

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
            $doReplaceService = $replaceService->bindTo($verificationService, VerificationService::class);
            $doReplaceService();

            $verificationService->getVerificationByMerchantReferenceNumber(self::MERCHANT_REF_NUM);

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(401, $exception->getCode());
            $this->assertNull($exception->getInternalCorrelationId());
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
     * @covers \Paysafe\PhpSdk\Service\VerificationService::getVerificationUsingMerchantReferenceNumber
     *
     * @return void
     */
    public function testGetVerificationUsingMerchantReferenceNumber_throwsExceptionOnUnauthorizedAccessError(): void
    {
        try {
            $verificationService = clone $this->verificationService;

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
            $doReplaceService = $replaceService->bindTo($verificationService, VerificationService::class);
            $doReplaceService();

            $verificationService->getVerificationByMerchantReferenceNumber(self::MERCHANT_REF_NUM);

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(403, $exception->getCode());
            $this->assertNull($exception->getInternalCorrelationId());
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
     * @covers \Paysafe\PhpSdk\Service\VerificationService::getVerificationUsingMerchantReferenceNumber
     *
     * @return void
     */
    public function testGetVerificationUsingMerchantReferenceNumber_throwsExceptionOnEntityNotFoundError(): void
    {
        try {
            $verificationService = clone $this->verificationService;

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
            $doReplaceService = $replaceService->bindTo($verificationService, VerificationService::class);
            $doReplaceService();

            $verificationService->getVerificationByMerchantReferenceNumber(self::MERCHANT_REF_NUM);

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(404, $exception->getCode());
            $this->assertNull($exception->getInternalCorrelationId());
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
     * @covers \Paysafe\PhpSdk\Service\VerificationService::getVerificationUsingMerchantReferenceNumber
     *
     * @return void
     */
    public function testGetVerificationUsingMerchantReferenceNumber_throwsPaysafeSdkExceptionOnIOError(): void
    {
        try {
            $verificationService = clone $this->verificationService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executeGet')
                ->willReturn(
                    new Response(400)
                );
            $replaceService = function () use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo($verificationService, VerificationService::class);
            $doReplaceService();

            $verificationService->getVerificationByMerchantReferenceNumber(self::MERCHANT_REF_NUM);

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException|\Exception $exception) {
            $this->assertEquals(400, $exception->getCode());
            $this->assertNull($exception->getInternalCorrelationId());
            $this->assertNull($exception->getError());
        }
    }


    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\VerificationService::createVerification
     *
     * @return void
     */
    public function testCreateVerification_isSuccessful(): void
    {
        $verificationService = clone $this->verificationService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executePost')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->mockCreateVerification()
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($verificationService, VerificationService::class);
        $doReplaceService();

        $response = $verificationService->createVerification($this->buildVerificationRequest());

        $this->assertNotNull($response);
    }


    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\VerificationService::createVerification
     *
     * @return void
     */
    public function testCreateVerification_throwsExceptionOnInvalidCredentialsError(): void
    {
        try {
            $verificationService = clone $this->verificationService;

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
            $doReplaceService = $replaceService->bindTo($verificationService, VerificationService::class);
            $doReplaceService();

            $verificationService->createVerification($this->buildVerificationRequest());

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(401, $exception->getCode());
            $this->assertNull($exception->getInternalCorrelationId());
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
     * @covers \Paysafe\PhpSdk\Service\VerificationService::createVerification
     *
     * @return void
     */
    public function testCreateVerification_throwsExceptionOnUnauthorizedAccessError(): void
    {
        try {
            $verificationService = clone $this->verificationService;

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
            $doReplaceService = $replaceService->bindTo($verificationService, VerificationService::class);
            $doReplaceService();

            $verificationService->createVerification($this->buildVerificationRequest());

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(403, $exception->getCode());
            $this->assertNull($exception->getInternalCorrelationId());
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
     * @covers \Paysafe\PhpSdk\Service\VerificationService::createVerification
     *
     * @return void
     */
    public function testCreateVerification_throwsPaysafeSdkExceptionOnIOError(): void
    {
        try {
            $verificationService = clone $this->verificationService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executePost')
                ->willReturn(
                    new Response(400)
                );
            $replaceService = function () use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo($verificationService, VerificationService::class);
            $doReplaceService();

            $verificationService->createVerification($this->buildVerificationRequest());

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException|\Exception $exception) {
            $this->assertEquals(400, $exception->getCode());
            $this->assertNull($exception->getInternalCorrelationId());
            $this->assertNull($exception->getError());
        }
    }

    /**
     * @return VerificationRequest
     */
    private function buildVerificationRequest(): VerificationRequest
    {
        return (new VerificationRequest())
            ->paymentHandleToken("SCTGXiTclLWRk5Pt")
            ->merchantRefNum("2ca14f87ff6f60976d18")
            ->customerIp("172.10.12.64")
            ->dupCheck(false)
            ->description("Winning payment from Loto 649")
            ->paymentFacilitator((new PaymentFacilitator())
                ->subMerchant((new SubMerchant())
                    ->id("123456789")
                    ->name("PayFacSubMerchant")
                    ->phone("478234562331")
                    ->email("payfac@mail.com")
                    ->url("www.payfac.com")
                    ->address((new SubMerchantAddress())
                        ->street("100 Queen Street West")
                        ->city("Toronto")
                        ->state("ON")
                        ->country("CA")
                        ->zip("M5H 2N2")
                    )
                )
            );
    }

    /**
     * @return string
     */
    private function mockGetResponse(): string
    {
        return "{\n" .
            "  \"id\": \"71aea8ae-e801-4df3-9436-c5a61c88d3ad\",\n" .
            "  \"paymentHandleToken\": \"SCUgzJL5jlRIKCiX\",\n" .
            "  \"merchantRefNum\": \"20095817730019123\",\n" .
            "  \"customerIp\": \"10.10.12.64\",\n" .
            "  \"currencyCode\": \"USD\",\n" .
            "  \"paymentType\": \"CARD\",\n" .
            "  \"description\": \"Verify card for payment request\",\n" .
            "  \"txnTime\": \"2018-12-11T16:33:49Z\",\n" .
            "  \"gatewayResponse\": {\n" .
            "    \"authCode\": \"XXXXXX\",\n" .
            "    \"avsResponse\": \"MATCH\",\n" .
            "    \"cvvVerification\": \"NOT_PROCESSED\",\n" .
            "    \"nameVerification\": \"MATCH\",\n" .
            "    \"firstNameVerification\": \"MATCH\",\n" .
            "    \"lastNameVerification\": \"MATCH\"\n" .
            "  },\n" .
            "  \"status\": \"COMPLETED\",\n" .
            "  \"profile\": {\n" .
            "    \"locale\": \"en_US\",\n" .
            "    \"firstName\": \"John\",\n" .
            "    \"lastName\": \"Smith\",\n" .
            "    \"email\": \"john.smith@somedomain.com\",\n" .
            "    \"phone\": \"713-444-5555\",\n" .
            "    \"dateOfBirth\": {\n" .
            "      \"day\": 6,\n" .
            "      \"month\": 5,\n" .
            "      \"year\": 1998\n" .
            "    }\n" .
            "  },\n" .
            "  \"authentication\": {\n" .
            "    \"id\": \"5d4db3bc-34c9-417f-a051-0d992ad9284e\",\n" .
            "    \"eci\": 5,\n" .
            "    \"cavv\": \"AAABBhkXYgAAAAACBxdiENhf7A.\",\n" .
            "    \"xid\": \"aWg4N1ZZOE53TkFrazJuMmkyRDA=\",\n" .
            "    \"status\": \"COMPLETED \",\n" .
            "    \"merchantRefNum\": \"merchantABC-123-authentications\",\n" .
            "    \"threeDEnrollment\": \"Y\",\n" .
            "    \"threeDResult\": \"Y\",\n" .
            "    \"signatureStatus\": \"Y\",\n" .
            "    \"exemptionIndicator\": \"LOW_VALUE_EXEMPTION\"\n" .
            "  },\n" .
            "  \"paymentFacilitator\": {\n" .
            "    \"subMerchant\": {\n" .
            "      \"id\": \"123456789\",\n" .
            "      \"name\": \"PayFacSubMerchant\",\n" .
            "      \"phone\": \"478234562331\",\n" .
            "      \"email\": \"payfac@mail.com\",\n" .
            "      \"url\": \"www.payfac.com\",\n" .
            "      \"address\": {\n" .
            "        \"street\": \"100 Queen Street West\",\n" .
            "        \"city\": \"Toronto\",\n" .
            "        \"state\": \"ON\",\n" .
            "        \"country\": \"CA\",\n" .
            "        \"zip\": \"M5H 2N2\"\n" .
            "      }\n" .
            "    }\n" .
            "  }\n" .
        "}";
    }

    /**
     * @return string
     */
    private function mockGetVerificationUsingMerchantReferenceNumber(): string
    {
        return "{\n" .
            "  \"meta\": {\n" .
            "    \"numberOfRecords\": 1,\n" .
            "    \"limit\": 10,\n" .
            "    \"page\": 1\n" .
            "  },\n" .
            "  \"verifications\": [\n" .
            "    {\n" .
            "      \"id\": \"71aea8ae-e801-4df3-9436-c5a61c88d3ad\",\n" .
            "      \"paymentHandleToken\": \"SCUgzJL5jlRIKCiX\",\n" .
            "      \"merchantRefNum\": \"2009581773001912343\",\n" .
            "      \"customerIp\": \"10.10.12.64\",\n" .
            "      \"currencyCode\": \"USD\",\n" .
            "      \"paymentType\": \"CARD\",\n" .
            "      \"description\": \"Verify card for payment request\",\n" .
            "      \"txnTime\": \"2018-12-11T16:33:49Z\",\n" .
            "      \"gatewayResponse\": {\n" .
            "        \"authCode\": \"XXXXXX\",\n" .
            "        \"avsResponse\": \"MATCH\",\n" .
            "        \"cvvVerification\": \"NOT_PROCESSED\",\n" .
            "        \"nameVerification\": \"MATCH\",\n" .
            "        \"firstNameVerification\": \"MATCH\",\n" .
            "        \"lastNameVerification\": \"MATCH\"\n" .
            "      },\n" .
            "      \"status\": \"COMPLETED\",\n" .
            "      \"profile\": {\n" .
            "        \"firstName\": \"John\",\n" .
            "        \"lastName\": \"Smith\",\n" .
            "        \"email\": \"john.smith@somedomain.com\",\n" .
            "        \"phone\": \"713-444-5555\",\n" .
            "        \"dateOfBirth\": {\n" .
            "          \"day\": 6,\n" .
            "          \"month\": 5,\n" .
            "          \"year\": 1998\n" .
            "        }\n" .
            "      },\n" .
            "      \"authentication\": {\n" .
            "        \"id\": \"5d4db3bc-34c9-417f-a051-0d992ad9284e\",\n" .
            "        \"eci\": 5,\n" .
            "        \"cavv\": \"AAABBhkXYgAAAAACBxdiENhf7A.=\",\n" .
            "        \"xid\": \"aWg4N1ZZOE53TkFrazJuMmkyRDA=\",\n" .
            "        \"status\": \"COMPLETED \",\n" .
            "        \"merchantRefNum\": \"merchantABC-123-authentications\",\n" .
            "        \"threeDEnrollment\": \"Y\",\n" .
            "        \"threeDResult\": \"Y\",\n" .
            "        \"signatureStatus\": \"Y\",\n" .
            "        \"exemptionIndicator\": \"LOW_VALUE_EXEMPTION\"\n" .
            "      },\n" .
            "      \"paymentFacilitator\": {\n" .
            "        \"subMerchant\": {\n" .
            "          \"id\": \"123456789\",\n" .
            "          \"name\": \"PayFacSubMerchant\",\n" .
            "          \"phone\": \"478234562331\",\n" .
            "          \"email\": \"payfac@mail.com\",\n" .
            "          \"url\": \"www.payfac.com\",\n" .
            "          \"address\": {\n" .
            "            \"street\": \"100 Queen Street West\",\n" .
            "            \"city\": \"Toronto\",\n" .
            "            \"state\": \"ON\",\n" .
            "            \"country\": \"CA\",\n" .
            "            \"zip\": \"M5H 2N2\"\n" .
            "          }\n" .
            "        }\n" .
            "      }\n" .
            "    }\n" .
            "  ]\n" .
        "}";
    }

    /**
     * @return string
     */
    private function mockCreateVerification(): string
    {
        return "{\n" .
            "  \"id\": \"1871638c-0be8-42b8-b5c3-224f8d52ef20\",\n" .
            "  \"paymentType\": \"CARD\",\n" .
            "  \"paymentHandleToken\": \"SCTGXiTclLWRk5Pt\",\n" .
            "  \"merchantRefNum\": \"2ca14f87ff6f60976d18\",\n" .
            "  \"currencyCode\": \"USD\",\n" .
            "  \"txnTime\": \"2023-01-20T06:03:14Z\",\n" .
            "  \"customerIp\": \"172.10.12.64\",\n" .
            "  \"status\": \"COMPLETED\",\n" .
            "  \"description\": \"Winning payment from Loto 649\",\n" .
            "  \"gatewayResponse\": {\n" .
            "    \"authCode\": \"XXXXXX\",\n" .
            "    \"cvvVerification\": \"NOT_PROCESSED\",\n" .
            "    \"nameVerification\": \"MATCH\",\n" .
            "    \"firstNameVerification\": \"MATCH\",\n" .
            "    \"lastNameVerification\": \"MATCH\"\n" .
            "  },\n" .
            "  \"profile\": {\n" .
            "    \"locale\": \"en_US\",\n" .
            "    \"firstName\": \"John\",\n" .
            "    \"lastName\": \"Smith\",\n" .
            "    \"email\": \"john.smith@somedomain.com\",\n" .
            "    \"phone\": \"713-444-5555\",\n" .
            "    \"dateOfBirth\": {\n" .
            "      \"day\": 6,\n" .
            "      \"month\": 5,\n" .
            "      \"year\": 1998\n" .
            "    }\n" .
            "  },\n" .
            "  \"authentication\": {\n" .
            "    \"id\": \"5d4db3bc-34c9-417f-a051-0d992ad9284e\",\n" .
            "    \"eci\": 5,\n" .
            "    \"cavv\": \"AAABBhkXYgAAAAACBxdiENhf7A.=\",\n" .
            "    \"xid\": \"aWg4N1ZZOE53TkFrazJuMmkyRDA=\",\n" .
            "    \"status\": \"COMPLETED \",\n" .
            "    \"merchantRefNum\": \"merchantABC-123-authentications\",\n" .
            "    \"threeDEnrollment\": \"Y\",\n" .
            "    \"threeDResult\": \"Y\",\n" .
            "    \"signatureStatus\": \"Y\",\n" .
            "    \"exemptionIndicator\": \"LOW_VALUE_EXEMPTION\"\n" .
            "  },\n" .
            "  \"paymentFacilitator\": {\n" .
            "    \"subMerchant\": {\n" .
            "      \"id\": \"123456789\",\n" .
            "      \"name\": \"PayFacSubMerchant\",\n" .
            "      \"phone\": \"478234562331\",\n" .
            "      \"email\": \"payfac@mail.com\",\n" .
            "      \"url\": \"www.payfac.com\",\n" .
            "      \"address\": {\n" .
            "        \"street\": \"100 Queen Street West\",\n" .
            "        \"city\": \"Toronto\",\n" .
            "        \"state\": \"ON\",\n" .
            "        \"country\": \"CA\",\n" .
            "        \"zip\": \"M5H 2N2\"\n" .
            "      }\n" .
            "    }\n" .
            "  }\n" .
        "}";
    }

}
