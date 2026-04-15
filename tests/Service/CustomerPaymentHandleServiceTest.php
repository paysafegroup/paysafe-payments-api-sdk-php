<?php
/* All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Service;

use GuzzleHttp\Psr7\Response;
use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\Card\CardBillingDetailsRequest;
use Paysafe\PhpSdk\Model\Card\CardExpiry;
use Paysafe\PhpSdk\Model\Customer\CustomerPaymentHandleRequest;
use Paysafe\PhpSdk\Model\Customer\UpdateCustomerRequestCard;
use Paysafe\PhpSdk\Service\CustomerPaymentHandleService;

class CustomerPaymentHandleServiceTest extends BasePaysafeTest
{
    const CUSTOMER_ID = "921cd968-6882-422c-ae4f-a10ddbae95ff";
    const PAYMENT_HANDLE_ID = "c672fd10-962e-4f57-a1f2-1c3105ffe5d3";
    const CUSTOMER_PAYMENT_HANDLES_ENDPOINT = "/paymenthub/v1/customers/%s/paymenthandles/%s";
    const CREATE_CUSTOMER_PAYMENT_HANDLE_ENDPOINT = "/paymenthub/v1/customers/%s/paymenthandles";
    const NON_EXISTING_CUSTOMER_ID = "00000000-0000-0000-0000-000000000000";
    const NON_EXISTING_PAYMENT_HANDLE_ID = "11111111-1111-1111-1111-111111111111";

    private CustomerPaymentHandleService $customerPaymentHandleService ;

    public function setUp(): void
    {
        parent::setUp();

        $this->customerPaymentHandleService  = new CustomerPaymentHandleService($this->paysafeApiClient);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerPaymentHandleService::createPaymentHandleForCustomer
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function testCreateCustomerPaymentHandle_card_isSuccessful(): void
    {
        $customerPaymentHandleService = clone $this->customerPaymentHandleService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executePost')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->mockCreateCustomerPaymentHandleCardResponse()
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo(
            $customerPaymentHandleService,
            CustomerPaymentHandleService::class
        );
        $doReplaceService();

        $paymentHandleRequest = (new CustomerPaymentHandleRequest())
            ->merchantRefNum("wed18012023Test")
            ->card(
                (new UpdateCustomerRequestCard())
                    ->cardNum("4037111111000000")
                    ->cardExpiry(
                        (new CardExpiry())
                            ->month("10")
                            ->year("2025")
                    )
                    ->cvv("111")
                    ->holderName("Dilip")
                    ->issuingCountry("US")
            )
            ->paymentType('CARD')
            ->amount(900)
            ->customerIp("127.0.0.1")
            ->currencyCode('USD')
        ;

        $response = $customerPaymentHandleService->createPaymentHandleForCustomer(
            self::CUSTOMER_ID,
            $paymentHandleRequest
        );

        $this->assertNotNull($response);
        $this->assertEquals('MULTI_USE', $response->getUsage());
        $this->assertEquals('NONE', $response->getAction());
        $this->assertEquals("24ce6840-6d41-4cfa-b27d-cc3e26124236", $response->getBillingDetailsId());
        $this->assertEquals("CPSql8EPmo45jNB", $response->getPaymentHandleToken());
        $this->assertEquals("0000", $response->getCard()->getLastDigits());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerPaymentHandleService::createPaymentHandleForCustomer
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function testCreateCustomerPaymentHandle_multiuse_isSuccessful(): void
    {
        $customerPaymentHandleService = clone $this->customerPaymentHandleService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executePost')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->mockCreateMultiUsePaymentHandleResponse()
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo(
            $customerPaymentHandleService,
            CustomerPaymentHandleService::class
        );
        $doReplaceService();

        $paymentHandleRequest = (new CustomerPaymentHandleRequest())
            ->paymentHandleTokenFrom("SAOMuI4DuXuLXulf");

        $response = $customerPaymentHandleService->createPaymentHandleForCustomer(
            self::CUSTOMER_ID,
            $paymentHandleRequest
        );

        $this->assertNotNull($response);
        $this->assertEquals('MULTI_USE', $response->getUsage());
        $this->assertEquals('NONE', $response->getAction());
        $this->assertEquals("b7be6f48-143d-4be0-95aa-8e8539f17ccc", $response->getBillingDetailsId());
        $this->assertEquals("DSR5qCCJZElTvxe", $response->getPaymentHandleToken());
        $this->assertEquals("12", $response->getEft()->getLastDigits());
        $this->assertEquals("XYZ Company", $response->getEft()->getAccountHolderName());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerPaymentHandleService::getCustomerPaymentHandleByPaymentHandleId
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function testGetCustomerPaymentHandleByPaymentHandleId_isSuccessful(): void
    {
        $customerPaymentHandleService = clone $this->customerPaymentHandleService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executeGet')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->mockGetCustomerPaymentHandleBacsResponse()
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo(
            $customerPaymentHandleService,
            CustomerPaymentHandleService::class
        );
        $doReplaceService();

        $response = $customerPaymentHandleService->getCustomerPaymentHandleByPaymentHandleId(
            self::CUSTOMER_ID,
            self::PAYMENT_HANDLE_ID
        );

        $this->assertNotNull($response);
        $this->assertEquals("PAYABLE", $response->getStatus());
        $this->assertEquals("MULTI_USE", $response->getUsage());
        $this->assertEquals("NONE", $response->getAction());
        $this->assertEquals("BACS", $response->getPaymentType());
        $this->assertEquals("DsOYXhRmFcOCSF2", $response->getPaymentHandleToken());
        $this->assertEquals("a85cb1b2-d3b5-44e0-9c1a-4760fb7deceb", $response->getBillingDetailsId());
        $this->assertEquals("72", $response->getBacs()->getLastDigits());
        $this->assertEquals("Sally Barnes", $response->getBacs()->getAccountHolderName());
        $this->assertEquals("Sally's Barclays Account", $response->getBacs()->getNickName());
        $this->assertEquals("086081", $response->getBacs()->getSortCode());
        $this->assertCount(1, $response->getMandates());
        $this->assertEquals("6c44d842-5720-4155-beb2-f8704a9daf0f", $response->getMandates()[0]->getId());
        $this->assertEquals("DOCNIG2336", $response->getMandates()[0]->getReference());
        $this->assertEquals("PENDING", $response->getMandates()[0]->getStatus());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerPaymentHandleService::updateCustomerPaymentHandle
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function testUpdateCustomerPaymentHandle_card_isSuccessful(): void
    {
        $customerPaymentHandleService = clone $this->customerPaymentHandleService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executePut')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->mockUpdateCustomerPaymentHandleCardResponse()
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo(
            $customerPaymentHandleService,
            CustomerPaymentHandleService::class
        );
        $doReplaceService();

        $updateRequest = (new CustomerPaymentHandleRequest())
            ->merchantRefNum("xzcxzcwqeqwewewqer")
            ->paymentType("CARD")
            ->currencyCode("GBP")
            ->customerIp("10.10.12.64")
            ->billingDetails((new CardBillingDetailsRequest())
                ->street("Andhra bank lane")
                ->street2("Manikonda")
                ->city("Hyderabad")
                ->state("TS")
                ->country("IN")
                ->zip("500089")
            )
            ->card((new UpdateCustomerRequestCard())
                ->cardNum("4222222222222")
                ->lastDigits("2222")
                ->cardExpiry(
                    (new CardExpiry())
                        ->month("12")
                        ->year("2021")
                )
                ->cvv("111")
                ->issuingCountry("US")
            );

        $response = $customerPaymentHandleService->updateCustomerPaymentHandle(
            self::CUSTOMER_ID,
            self::PAYMENT_HANDLE_ID,
            $updateRequest
        );

        $this->assertNotNull($response);
        $this->assertEquals("ad9c23c2-509b-43ae-bf5d-64554c9fc378", $response->getMerchantRefNum());
        $this->assertEquals("INITIATED", $response->getStatus());
        $this->assertEquals("MULTI_USE", $response->getUsage());
        $this->assertEquals("CARD", $response->getPaymentType());
        $this->assertEquals("2222", $response->getCard()->getLastDigits());
        $this->assertEquals("Casino slots payin", $response->getMerchantDescriptor()->getDynamicDescriptor());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerPaymentHandleService::updateCustomerPaymentHandle
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function testUpdateCustomerPaymentHandle_throwsExceptionOnEntityNotFoundError(): void
    {
        try {
            $customerPaymentHandleService = clone $this->customerPaymentHandleService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executePut')
                ->willReturn(
                    new Response(
                        404,
                        [
                            'Content-Type' => 'application/json',
                        ],
                        self::ENTITY_NOT_FOUND_ERROR_RESPONSE
                    )
                );
            $replaceService = function() use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo(
                $customerPaymentHandleService,
                CustomerPaymentHandleService::class
            );
            $doReplaceService();

            $updateRequest = (new CustomerPaymentHandleRequest())
                ->merchantRefNum("xzcxzcwqeqwewewqer")
                ->paymentType("CARD")
                ->currencyCode("GBP")
                ->customerIp("10.10.12.64")
                ->billingDetails((new CardBillingDetailsRequest())
                    ->street("Andhra bank lane")
                    ->street2("Manikonda")
                    ->city("Hyderabad")
                    ->state("TS")
                    ->country("IN")
                    ->zip("500089")
                )
                ->card((new UpdateCustomerRequestCard())
                    ->cardNum("4222222222222")
                    ->lastDigits("2222")
                    ->cardExpiry(
                        (new CardExpiry())
                            ->month("12")
                            ->year("2021")
                    )
                    ->cvv("111")
                    ->issuingCountry("US")
                );

            $customerPaymentHandleService->updateCustomerPaymentHandle(
                self::NON_EXISTING_CUSTOMER_ID,
                self::NON_EXISTING_PAYMENT_HANDLE_ID,
                $updateRequest
            );

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(404, $exception->getCode());
            $this->assertEquals("5269", $exception->getError()->getCode());
            $this->assertEquals("Entity not found", $exception->getError()->getMessage());
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerPaymentHandleService::deleteCustomerPaymentHandle
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function testDeleteCustomerPaymentHandle_isSuccessful(): void
    {
        $customerPaymentHandleService = clone $this->customerPaymentHandleService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executeDelete')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    json_encode([])
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo(
            $customerPaymentHandleService,
            CustomerPaymentHandleService::class
        );
        $doReplaceService();

        $customerPaymentHandleService->deleteCustomerPaymentHandle(
            self::CUSTOMER_ID,
            self::PAYMENT_HANDLE_ID
        );

        $this->assertTrue(true);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\CustomerPaymentHandleService::deleteCustomerPaymentHandle
     *
     * @return void
     */
    public function testDeleteCustomerPaymentHandle_throwsExceptionOnEntityNotFound(): void
    {
        try {
            $customerPaymentHandleService = clone $this->customerPaymentHandleService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executeDelete')
                ->willReturn(
                    new Response(
                        404,
                        [
                            'Content-Type' => 'application/json',
                        ],
                        self::ENTITY_NOT_FOUND_ERROR_RESPONSE
                    )
                );
            $replaceService = function() use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo(
                $customerPaymentHandleService,
                CustomerPaymentHandleService::class
            );
            $doReplaceService();

            $customerPaymentHandleService->deleteCustomerPaymentHandle(
                self::NON_EXISTING_CUSTOMER_ID,
                self::NON_EXISTING_PAYMENT_HANDLE_ID
            );

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(404, $exception->getCode());
            $this->assertEquals("5269", $exception->getError()->getCode());
            $this->assertEquals("Entity not found", $exception->getError()->getMessage());
        }
    }

    /**
     * @return string
     */
    private function mockCreateCustomerPaymentHandleCardResponse(): string
    {
        return "{\n"
            . "  \"id\": \"02858471-6083-49ef-afee-015e4cc5135a\",\n"
            . "  \"merchantRefNum\": \"wed18012023Test\",\n"
            . "  \"status\": \"PAYABLE\",\n"
            . "  \"usage\": \"MULTI_USE\",\n"
            . "  \"paymentType\": \"CARD\",\n"
            . "  \"action\": \"NONE\",\n"
            . "  \"paymentHandleToken\": \"CPSql8EPmo45jNB\",\n"
            . "  \"card\": {\n"
            . "    \"lastDigits\": \"0000\",\n"
            . "    \"cardExpiry\": {\n"
            . "      \"month\": \"10\",\n"
            . "      \"year\": \"2025\"\n"
            . "    },\n"
            . "    \"cardBin\": \"403711\",\n"
            . "    \"holderName\": \"Dilip\",\n"
            . "    \"cardCategory\": \"CREDIT\",\n"
            . "    \"issuingCountry\": \"US\"\n"
            . "  },\n"
            . "  \"billingDetailsId\": \"24ce6840-6d41-4cfa-b27d-cc3e26124236\",\n"
            . "  \"customerId\": \"af363924-bd85-4996-8b77-d78fd696b32b\"\n"
            . "}";
    }

    /**
     * @return string
     */
    private function mockCreateMultiUsePaymentHandleResponse(): string
    {
        return "{\n"
            . "  \"id\": \"8640a692-556e-4e31-b10b-d01256328421\",\n"
            . "  \"merchantRefNum\": \"42206439877181100\",\n"
            . "  \"status\": \"PAYABLE\",\n"
            . "  \"usage\": \"MULTI_USE\",\n"
            . "  \"paymentType\": \"EFT\",\n"
            . "  \"action\": \"NONE\",\n"
            . "  \"executionMode\": \"SYNCHRONOUS\",\n"
            . "  \"accountId\": \"1013691440\",\n"
            . "  \"paymentHandleToken\": \"DSR5qCCJZElTvxe\",\n"
            . "  \"eft\": {\n"
            . "    \"lastDigits\": \"12\",\n"
            . "    \"accountHolderName\": \"XYZ Company\",\n"
            . "    \"paymentDescriptor\": \"payment dtr\",\n"
            . "    \"institutionId\": \"001\",\n"
            . "    \"transitNumber\": \"22446\"\n"
            . "  },\n"
            . "  \"paymentHandleTokenFrom\": \"SAOMuI4DuXuLXulf\",\n"
            . "  \"billingDetailsId\": \"b7be6f48-143d-4be0-95aa-8e8539f17ccc\",\n"
            . "  \"customerId\": \"e10bd22b-056f-4997-a4f3-3c4d2032baa4\"\n"
            . "}";
    }

    /**
     * @return string
     */
    private function mockGetCustomerPaymentHandleBacsResponse(): string
    {
        return "{"
            . "\"id\": \"c672fd10-962e-4f57-a1f2-1c3105ffe5d3\","
            . "\"paymentType\": \"BACS\","
            . "\"paymentHandleToken\": \"DsOYXhRmFcOCSF2\","
            . "\"merchantRefNum\": \"167625194625055\","
            . "\"status\": \"PAYABLE\","
            . "\"masterMerchantId\": \"6932900\","
            . "\"usage\": \"MULTI_USE\","
            . "\"action\": \"NONE\","
            . "\"executionMode\": \"ASYNCHRONOUS\","
            . "\"creationTime\": \"2023-01-27T13:09:38Z\","
            . "\"bacs\": {"
            . "  \"lastDigits\": \"72\","
            . "  \"accountHolderName\": \"Sally Barnes\","
            . "  \"nickName\": \"Sally's Barclays Account\","
            . "  \"sortCode\": \"086081\""
            . "},"
            . "\"mandates\": ["
            . "  {"
            . "    \"id\": \"6c44d842-5720-4155-beb2-f8704a9daf0f\","
            . "    \"reference\": \"DOCNIG2336\","
            . "    \"status\": \"PENDING\""
            . "  }"
            . "],"
            . "\"billingDetailsId\": \"a85cb1b2-d3b5-44e0-9c1a-4760fb7deceb\","
            . "\"customerId\": \"7ab149cc-a65c-4a28-b81a-0a271fa568a1\""
            . "}";
    }

    /**
     * @return string
     */
    private function mockUpdateCustomerPaymentHandleCardResponse(): string
    {
        return "{"
            . "\"id\": \"218d68c7-77c8-4d37-9d06-0a4bb5272adb\","
            . "\"merchantRefNum\": \"ad9c23c2-509b-43ae-bf5d-64554c9fc378\","
            . "\"status\": \"INITIATED\","
            . "\"usage\": \"MULTI_USE\","
            . "\"paymentType\": \"CARD\","
            . "\"action\": \"NONE\","
            . "\"paymentHandleToken\": \"Cy4WEGJ9IWIkcUn\","
            . "\"billingDetailsId\": \"786cf0cd-4296-43ce-8a57-5f4675e3fafd\","
            . "\"card\": {"
            . "  \"lastDigits\": \"2222\","
            . "  \"cardExpiry\": {"
            . "    \"month\": \"12\","
            . "    \"year\": \"2021\""
            . "  },"
            . "  \"issuingCountry\": \"US\""
            . "},"
            . "\"merchantDescriptor\": {"
            . "  \"dynamicDescriptor\": \"Casino slots payin\","
            . "  \"phone\": \"189134336\""
            . "}"
            . "}";
    }

}
