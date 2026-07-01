<?php
/* All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Service;

use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Model\Common\BillingDetails;
use Paysafe\PhpSdk\Model\Common\Enums\CurrencyCode;
use Paysafe\PhpSdk\Model\Common\Enums\HttpMethod;
use Paysafe\PhpSdk\Model\Common\ReturnLink;
use Paysafe\PhpSdk\Model\Lpm\Enums\KeyLevelRestriction;
use Paysafe\PhpSdk\Model\Lpm\Enums\LanguageCode;
use Paysafe\PhpSdk\Model\Lpm\Enums\PaypalShippingReference;
use Paysafe\PhpSdk\Model\Lpm\Neteller;
use Paysafe\PhpSdk\Model\Lpm\Paypal;
use Paysafe\PhpSdk\Model\Lpm\Paysafecard;
use Paysafe\PhpSdk\Model\Lpm\Paysafecash;
use Paysafe\PhpSdk\Model\Lpm\Skrill;
use Paysafe\PhpSdk\Model\Payment\PaymentRequest;
use Paysafe\PhpSdk\Model\PaymentHandle\Enums\PaymentType;
use Paysafe\PhpSdk\Model\PaymentHandle\Enums\ReturnLinkRel;
use Paysafe\PhpSdk\Model\PaymentHandle\Enums\TransactionType;
use Paysafe\PhpSdk\Model\PaymentHandle\PaymentHandleRequest;
use Paysafe\PhpSdk\Service\PaymentHandleService;
use GuzzleHttp\Psr7\Response;
use Paysafe\PhpSdk\Service\PaymentService;

class LpmPaymentServiceTest extends BasePaysafeService
{
    const PAYMENT_HANDLES_ENDPOINT = "/paymenthub/v1/paymenthandles";
    const PAYMENT_ENDPOINT = "/paymenthub/v1/payments";


    private PaymentHandleService $paymentHandleService;
    private PaymentService $paymentService;

    public function setUp(): void
    {
        parent::setUp();

        $this->paymentHandleService = new PaymentHandleService($this->paysafeApiClient);
        $this->paymentService = new PaymentService($this->paysafeApiClient);
    }

    /**
     * @test
     * @covers PaymentHandleService::createPaymentHandle
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function testCreatePaymentHandle_skrill_isSuccessful()
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
                    $this->get_resource_json("paymenthandle/create_payment_handle_skrill_response.json")
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($paymentHandleService, PaymentHandleService::class);
        $doReplaceService();

        $request = (new PaymentHandleRequest())
            ->merchantRefNum("merchant-ref-skrill-001")
            ->transactionType(TransactionType::PAYMENT)
            ->paymentType(PaymentType::SKRILL)
            ->amount(500)
            ->currencyCode(CurrencyCode::USD)
            ->customerIp("172.0.0.1")
            ->skrill((new Skrill())
                ->consumerId("john.doe@gmail.com")
                ->language(LanguageCode::EN)
                ->logoUrl("http://www.paysafe.com/icon.jpg")
                ->detail1Text("Detail 1 text")
                ->detail1Description("Detail 1 description")
                ->countryCode("DE")
                )
            ->billingDetails((new BillingDetails())
                ->zip("M5H 2N2")
                ->country("CA")
                )
            ->returnLinks($this->buildReturnLinks());

        $response = $paymentHandleService->createPaymentHandle($request);

        $this->assertNotNull($response);
        $this->assertEquals("cdd1e763-352f-4905-a93f-1838ea467a1e", $response->getId());
        $this->assertEquals("SKRILL", $response->getPaymentType());
        $this->assertEquals("INITIATED", $response->getStatus());
        $this->assertEquals(500, $response->getAmount());
        $this->assertNotNull($response->getSkrill());
        $this->assertEquals("john.doe@gmail.com", $response->getSkrill()->getConsumerId());
    }

    /**
     * @test
     * @covers PaymentHandleService::createPaymentHandle
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function testCreatePaymentHandle_neteller_isSuccessful()
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
                    $this->get_resource_json("paymenthandle/create_payment_handle_neteller_response.json")
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($paymentHandleService, PaymentHandleService::class);
        $doReplaceService();

        $request = (new PaymentHandleRequest())
            ->merchantRefNum("merchant-ref-neteller-001")
            ->transactionType(TransactionType::PAYMENT)
            ->paymentType(PaymentType::NETELLER)
            ->amount(500)
            ->currencyCode(CurrencyCode::USD)
            ->customerIp("172.0.0.1")
            ->neteller((new Neteller())
                ->consumerId("neteller.account@example.org")
                ->recipientDescription("logo_url_alt_text")
                ->logoUrl("http://www.paysafe.com/icon.jpg")
                )
            ->billingDetails($this->buildBillingDetails())
            ->returnLinks($this->buildReturnLinks())
            ;

        $response = $paymentHandleService->createPaymentHandle($request);

        $this->assertNotNull($response);
        $this->assertEquals("43693f8a-f3d8-4669-9b92-a04c2208afb5", $response->getId());
        $this->assertEquals("NETELLER", $response->getPaymentType());
        $this->assertEquals("INITIATED", $response->getStatus());
        $this->assertEquals(500, $response->getAmount());
        $this->assertNotNull($response->getNeteller());
        $this->assertEquals("neteller.account@example.org", $response->getNeteller()->getConsumerId());
    }

    /**
     * @test
     * @covers PaymentHandleService::createPaymentHandle
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function testCreatePaymentHandle_paysafecash_isSuccessful()
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
                    $this->get_resource_json("paymenthandle/create_payment_handle_paysafecash_response.json")
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($paymentHandleService, PaymentHandleService::class);
        $doReplaceService();

        $request = (new PaymentHandleRequest())
            ->merchantRefNum("merchant-ref-paysafecash-001")
            ->transactionType(TransactionType::PAYMENT)
            ->amount(500)
            ->currencyCode(CurrencyCode::USD)
            ->customerIp("172.0.0.1")
            ->paysafecash((new Paysafecash())
                ->consumerId("merchantclientid")
                ->minAgeRestriction(18)
                ->kycLevelRestriction(KeyLevelRestriction::SIMPLE)
                ->countryRestriction("DE")
                )
            ->billingDetails($this->buildBillingDetails())
            ->returnLinks($this->buildReturnLinks())
            ;

        $response = $paymentHandleService->createPaymentHandle($request);

        $this->assertNotNull($response);
        $this->assertEquals("d336de7e-b1a3-4fa7-93d4-224b51185122", $response->getId());
        $this->assertEquals("PAYSAFECASH", $response->getPaymentType());
        $this->assertEquals("INITIATED", $response->getStatus());
        $this->assertEquals(500, $response->getAmount());
        $this->assertNotNull($response->getPaysafecash());
        $this->assertEquals("merchantclientid", $response->getPaysafecash()->getConsumerId());
    }

    /**
     * @test
     * @covers PaymentHandleService::createPaymentHandle
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function testCreatePaymentHandle_paysafecard_isSuccessful()
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
                    $this->get_resource_json("paymenthandle/create_payment_handle_paysafecard_response.json")
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($paymentHandleService, PaymentHandleService::class);
        $doReplaceService();

        $request = (new PaymentHandleRequest())
            ->merchantRefNum("merchant-ref-paysafecard-001")
            ->transactionType(TransactionType::PAYMENT)
            ->paymentType(PaymentType::PAYSAFECARD)
            ->amount(500)
            ->currencyCode(CurrencyCode::USD)
            ->customerIp("172.0.0.1")
            ->paysafecard((new Paysafecard())
                ->consumerId("merchantclientid")
                ->minAgeRestriction(18)
                ->kycLevelRestriction(KeyLevelRestriction::SIMPLE)
                ->countryRestriction("DE")
                )
            ->billingDetails($this->buildBillingDetails())
            ->returnLinks($this->buildReturnLinks())
            ;

        $response = $paymentHandleService->createPaymentHandle($request);

        $this->assertNotNull($response);
        $this->assertEquals("29441aa1-dc3d-43a8-8a6e-6557b1cd17d4", $response->getId());
        $this->assertEquals("PAYSAFECARD", $response->getPaymentType());
        $this->assertEquals("INITIATED", $response->getStatus());
        $this->assertEquals(500, $response->getAmount());
        $this->assertNotNull($response->getPaysafecard());
        $this->assertEquals("merchantclientid", $response->getPaysafecard()->getConsumerId());
    }

    /**
     * @test
     * @covers PaymentHandleService::createPaymentHandle
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function testCreatePaymentHandle_paypal_isSuccessful()
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
                    $this->get_resource_json("paymenthandle/create_payment_handle_paypal_response.json")
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($paymentHandleService, PaymentHandleService::class);
        $doReplaceService();

        $request = (new PaymentHandleRequest())
            ->merchantRefNum("merchant-ref-paypal-001")
            ->transactionType(TransactionType::PAYMENT)
            ->paymentType(PaymentType::PAYPAL)
            ->amount(500)
            ->currencyCode(CurrencyCode::USD)
            ->customerIp("172.0.0.1")
            ->payPal((new Paypal())
                ->consumerId("sb-cpfxo1472281@personal.example.com")
                ->recipientDescription("Paysafe store description for payment")
                ->language(LanguageCode::US)
                ->shippingPreference(PaypalShippingReference::SET_PROVIDED_ADDRESS)
                ->consumerMessage("Paysafe note to payer for payment")
                ->orderDescription("Paysafe Order description for payment")
                )
            ->billingDetails($this->buildBillingDetails())
            ->returnLinks($this->buildReturnLinks())
            ;

        $response = $paymentHandleService->createPaymentHandle($request);

        $this->assertNotNull($response);
        $this->assertEquals("e85f125b-a20b-455e-9657-f4a4c2beae3c", $response->getId());
        $this->assertEquals("PAYPAL", $response->getPaymentType());
        $this->assertEquals("INITIATED", $response->getStatus());
        $this->assertEquals(500, $response->getAmount());
        $this->assertNotNull($response->getPayPal());
        $this->assertEquals("sb-cpfxo1472281@personal.example.com", $response->getPayPal()->getConsumerId());
    }

    /**
     * @test
     * @covers PaymentService::processPayment
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function testProcessPayment_skrill_isSuccessful()
    {
        $paymentService = clone $this->paymentService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executePost')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->get_resource_json("payment/process_payment_skrill_response.json")
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($paymentService, PaymentService::class);
        $doReplaceService();

        $request = (new PaymentRequest())
            ->merchantRefNum("merchant-ref-skrill-payment-001")
            ->amount(1000)
            ->settleWithAuth(true)
            ->paymentHandleToken("PHToken_Skrill_001")
            ->customerIp("172.0.0.1")
            ->currencyCode(CurrencyCode::USD)
            ;

        $response = $paymentService->processPayment($request);

        $this->assertNotNull($response);
        $this->assertEquals("f1a2b3c4-d5e6-7890-abcd-ef1234567890", $response->getId());
        $this->assertEquals("SKRILL", $response->getPaymentType());
        $this->assertEquals("COMPLETED", $response->getStatus());
        $this->assertEquals(1000, $response->getAmount());
        $this->assertNotNull($response->getSkrill());
    }

    /**
     * @test
     * @covers PaymentService::processPayment
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function testProcessPayment_neteller_isSuccessful()
    {
        $paymentService = clone $this->paymentService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executePost')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->get_resource_json("payment/process_payment_neteller_response.json")
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($paymentService, PaymentService::class);
        $doReplaceService();

        $request = (new PaymentRequest())
            ->merchantRefNum("merchant-ref-neteller-payment-001")
            ->amount(1000)
            ->settleWithAuth(true)
            ->paymentHandleToken("PHToken_Neteller_001")
            ->customerIp("172.0.0.1")
            ->currencyCode(CurrencyCode::USD)
            ;

        $response = $paymentService->processPayment($request);

        $this->assertNotNull($response);
        $this->assertEquals("f2b3c4d5-e6f7-8901-bcde-f23456789012", $response->getId());
        $this->assertEquals("NETELLER", $response->getPaymentType());
        $this->assertEquals("COMPLETED", $response->getStatus());
        $this->assertEquals(1000, $response->getAmount());
        $this->assertNotNull($response->getNeteller());
    }

    /**
     * @test
     * @covers PaymentService::processPayment
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function testProcessPayment_paysafecash_isSuccessful()
    {
        $paymentService = clone $this->paymentService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executePost')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->get_resource_json("payment/process_payment_paysafecash_response.json")
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($paymentService, PaymentService::class);
        $doReplaceService();

        $request = (new PaymentRequest())
            ->merchantRefNum("merchant-ref-paysafecash-payment-001")
            ->amount(1000)
            ->settleWithAuth(true)
            ->paymentHandleToken("PHToken_Paysafecash_001")
            ->customerIp("172.0.0.1")
            ->currencyCode(CurrencyCode::EUR)
            ;

        $response = $paymentService->processPayment($request);

        $this->assertNotNull($response);
        $this->assertEquals("f3c4d5e6-f7a8-9012-cdef-345678901234", $response->getId());
        $this->assertEquals("PAYSAFECASH", $response->getPaymentType());
        $this->assertEquals("COMPLETED", $response->getStatus());
        $this->assertEquals(1000, $response->getAmount());
        $this->assertNotNull($response->getPaysafecash());
    }

    /**
     * @test
     * @covers PaymentService::processPayment
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function testProcessPayment_paysafecard_isSuccessful()
    {
        $paymentService = clone $this->paymentService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executePost')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->get_resource_json("payment/process_payment_paysafecard_response.json")
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($paymentService, PaymentService::class);
        $doReplaceService();

        $request = (new PaymentRequest())
            ->merchantRefNum("merchant-ref-paysafecard-payment-001")
            ->amount(1000)
            ->settleWithAuth(true)
            ->paymentHandleToken("PHToken_Paysafecard_001")
            ->customerIp("172.0.0.1")
            ->currencyCode(CurrencyCode::EUR)
            ;

        $response = $paymentService->processPayment($request);

        $this->assertNotNull($response);
        $this->assertEquals("f4d5e6f7-a8b9-0123-defa-456789012345", $response->getId());
        $this->assertEquals("PAYSAFECARD", $response->getPaymentType());
        $this->assertEquals("COMPLETED", $response->getStatus());
        $this->assertEquals(1000, $response->getAmount());
        $this->assertNotNull($response->getPaysafecard());
    }

    /**
     * @test
     * @covers PaymentService::processPayment
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function testProcessPayment_paypal_isSuccessful()
    {
        $paymentService = clone $this->paymentService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executePost')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->get_resource_json("payment/process_payment_paypal_response.json")
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($paymentService, PaymentService::class);
        $doReplaceService();

        $request = (new PaymentRequest())
            ->merchantRefNum("merchant-ref-paypal-payment-001")
            ->amount(1000)
            ->settleWithAuth(true)
            ->paymentHandleToken("PHToken_PayPal_001")
            ->customerIp("172.0.0.1")
            ->currencyCode(CurrencyCode::USD)
            ;

        $response = $paymentService->processPayment($request);

        $this->assertNotNull($response);
        $this->assertEquals("f5e6f7a8-b9c0-1234-efab-567890123456", $response->getId());
        $this->assertEquals("PAYPAL", $response->getPaymentType());
        $this->assertEquals("COMPLETED", $response->getStatus());
        $this->assertEquals(1000, $response->getAmount());
        $this->assertNotNull($response->getPayPal());
    }

    /**
     * @return BillingDetails
     */
    private function buildBillingDetails(): BillingDetails
    {
        return (new BillingDetails())
            ->street("100 Queen Street")
            ->city("Toronto")
            ->zip("M5H 2N2")
            ->state("ON")
            ->country("CA")
            ;
    }

    /**
     * @return array
     */
    private function buildReturnLinks(): array
    {
        return [
            (new ReturnLink())
                ->rel(ReturnLinkRel::_DEFAULT)
                ->href("https://example.com/payment/return/")
                ->method(HttpMethod::GET),
            (new ReturnLink())
                ->rel(ReturnLinkRel::ON_COMPLETED)
                ->href("https://example.com/payment/return/success")
                ->method(HttpMethod::GET),
            (new ReturnLink())
                ->rel(ReturnLinkRel::ON_FAILED)
                ->href("https://example.com/payment/return/failed")
                ->method(HttpMethod::GET)
        ];
    }
}
