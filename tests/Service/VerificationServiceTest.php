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

class VerificationServiceTest extends BasePaysafeService
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
     *
     * @throws PaysafeSdkException
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
                    $this->get_resource_json('verification/get_verification_by_id_card_response.json')
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
                        $this->get_resource_json('error/401_invalid_credentials_response.json')
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
                        $this->get_resource_json("error/404_entity_not_found_response.json")
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
                        $this->get_resource_json('error/403_unauthorized_response.json')
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
                    $this->get_resource_json('verification/get_verification_using_merchant_ref_num_card_response.json')
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
                        $this->get_resource_json('error/401_invalid_credentials_response.json')
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
                        $this->get_resource_json('error/403_unauthorized_response.json')
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
                        $this->get_resource_json("error/404_entity_not_found_response.json")
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
                    $this->get_resource_json('verification/create_verification_card_response.json')
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
                        $this->get_resource_json('error/401_invalid_credentials_response.json')
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
                        $this->get_resource_json('error/403_unauthorized_response.json')
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
}
