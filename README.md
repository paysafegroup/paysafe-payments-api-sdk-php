# Paysafe PHP SDK

## Table of contents

<!-- TOC -->
* [Introduction](#introduction)
* [Before you begin](#before-you-begin)
* [Installation](#installation)
  * [Requirements](#requirements)
  * [Install via Composer](#install-via-composer)
    * [Add manually to composer.json](#add-manually-to-composerjson)
    * [Install via Composer CLI:](#install-via-composer-cli)
* [Usage](#usage)
  * [Instantiating new PaysafeClient instance](#instantiating-new-paysafeclient-instance)
  * [PaysafeClient customizations](#paysafeclient-customizations)
    * [Maximum automatic retries](#maximum-automatic-retries)
    * [Connect and response timeouts](#connect-and-response-timeouts)
    * [Proxy](#proxy)
    * [SSLContext](#sslcontext)
  * [Transaction flows](#transaction-flows)
    * [Check the status of Payments API](#check-the-status-of-payments-api)
    * [Create a payment handle](#create-a-payment-handle)
  * [Request customizations](#request-customizations)
  * [Error handling](#error-handling)
  * [Overriding base url](#overriding-base-url)
  * [Using undocumented parameters](#using-undocumented-parameters)
* [API Coverage](#api-coverage)
    * [Transactions types and functionalities supported in the SDK:](#transactions-types-and-functionalities-supported-in-the-sdk)
    * [Not supported in current version of the SDK:](#not-supported-in-current-version-of-the-sdk)
* [License](#license)
<!-- TOC -->


## Introduction

Paysafe’s server-side SDKs streamline the integration process by significantly reducing the effort required to interact with [Paysafe’s REST APIs](https://developer.paysafe.com/en/payments-api/#/).

The PHP SDK is seamlessly integrated with Composer, facilitating effortless inclusion in development projects.

While incorporating the SDK into payment flows is not strictly necessary, doing so offers substantial benefits, including:

- **Comprehensive API Coverage**: The library encompasses the latest set of APIs, as documented in the Paysafe Developer Portal, ensuring compatibility with the most recent
  features and enhancements.
- **Auto-Generated Models and Request Structures**: The SDK provides pre-defined models and request parameter structures, mitigating the need for manual construction of API
  payloads and reducing the likelihood of errors.
- **Intelligent Request Handling**: The SDK includes built-in mechanisms for automatic request retries, improving resilience and reliability by mitigating transient failures and
  network-related issues.
- **Advanced Exception Management**: The SDK incorporates robust exception-handling mechanisms for API responses, simplifying error detection and recovery while ensuring seamless
  transaction processing

By leveraging the SDK, developers can expedite integration, enhance maintainability, and focus on core business logic rather than low-level API interactions.

## Before you begin

Contact your business relationship manager or email [Integrations Support](mailto:integrations@paysafe.com) for your Business Portal credentials.
To obtain the Secret API key from the Business Portal:
1. Log in to the Merchant Portal.
2. Go to Developer > API Keys.
3. For the Secret Key, you are required to authenticate once more.
4. When the key is revealed, click the Copy icon to copy the API key.
5. Your API key will have the format username:password, for example:

   `MerchantXYZ:B-tst1-0-51ed39e4-312d02345d3f123120881dff9bb4020a89e8ac44cdfdcecd702151182fdc952272661d290ab2e5849e31bb03deede9`

Note:
- Use the same API key for all payment methods.
- The API key is case-sensitive and sent using HTTP Basic Authentication.

For more information, see [Authentication](https://developer.paysafe.com/en/support/reference-information/authentication/).

## Installation

### Requirements

PHP 7.4 or later.

### Install via Composer
#### Add manually to composer.json

Add this dependency to your project's composer.json file:

    "require": {
        "paysafe/paymentsapi-sdk-php": "*"
    }

Then run:

    composer install

#### Install via Composer CLI:

Run:

    composer require paysafe/paymentsapi-sdk-php

---

## Usage

### Instantiating new PaysafeClient instance

Instantiate new `PaysafeClient` instance using provided constructor or builder.

`PaysafeClient` provides services and methods to execute specific API requests.

You need to provide `apiKey` in format "username:password", for example:

    MerchantXYZ:B-tst1-0-51ed39e4-312d02345d3f123120881dff9bb4020a89e8ac44cdfdcecd702151182fdc952272661d290ab2e5849e31bb03deede7

Please keep your `apiKey` in safe location, for example load it from HashiCorp vault, Java Keystore, Kubernetes Secrets etc.

PaysafeClient can be configured for either **Live** or **Test** environment.

**Important: Do not use real card numbers or other payment instrument details in the Test environment.**
Test/ Sandbox is not compliant with Payment Card Industry Data Security Standards (PCI-DSS) and does not protect cardholder/ payee information.
Any upload of real cardholder data is strictly prohibited, as described in the Terms of Use.

---

You can create a PaysafeClient instance using constructor:

    $paysafeClient = new PaysafeClient($apiKey, Environment::TEST);

Such `PaysafeClient` will use default client configuration (connect and response timeout, automatic retries).

### PaysafeClient customizations

`PaysafeClient` can also be instantiated using setters. This enables additional API client configurations:

    $paysafeClient = new PaysafeClient();
    $paysafeClient->setApiKey('API Key');
    $paysafeClient->setEnvironment(Environment::LIVE);
    $paysafeClient->setConnectTimeout(10);
    $paysafeClient->setResponseTimeout(10);
    $paysafeClient->setMaxAutomaticRetries(5);
    $paysafeClient->setProxy("http://custom-proxy:8080");
    $paysafeClient->setSslContext([
      'cert' => '/path/to/client-cert.pem',
      'key'  => '/path/to/client-key.pem',
      'ca'   => '/path/to/ca-cert.pem'
    ])

If some values are not overwritten via setters, default values from `PaysafeConfiguration` will be 
used.

#### Maximum automatic retries

The client can be configured to automatically retry `GET` requests which have failed due to network problems or
other unpredictable events.
By default, such requests are retried twice (total three requests).
Maximum allowed value for automatic retries is **five**.

#### Connect and response timeouts

The client can be configured to use provided connect and response timeouts.
Values must be provided in milliseconds. We recommend setting the value cautiously, as some requests may take longer to process.

Default values are:
- 30 seconds for connect timeout
- 60 seconds for response timeout

#### Proxy

The client allows for custom proxies. Proxy object can be provided directly in the constructor:

    $proxy = 'http://custom-proxy:8080';

    $config = array(
      'apiKey' => 'apiKey',
      'environment' => 'test',
      'proxy' =>  $proxy)
    $paysafeClient = new PaysafeClient($config);

Additionally, proxy can be automatically discerned from system properties:

    putenv('http_proxyHost=localhost');
    putenv('http_proxyPort=8443');
    putenv('http_proxyUser=squid');
    putenv('http_proxyPassword=ward');

Or:

    putenv('https_proxyHost=localhost');
    putenv('https_proxyPort=8443');
    putenv('https_proxyUser=squid');
    putenv('https_proxyPassword=ward');

In both cases, you do not need to provide specific proxy object to the builder. `PaysafeClient`
will automatically recognize and use system properties for proxy.

#### SSLContext

The client also allows for custom SslContext. For example, custom SSLContext can be created like this:

    $sslOptions = [
      'cert' => '/path/to/client-cert.pem',
      'key'  => '/path/to/client-key.pem',
      'ca'   => '/path/to/ca-cert.pem'
    ];
    $paysafeClient = new PaysafeClient();
    $paysafeClient->setSslContext($sslOptions);

---

### Transaction flows

#### Check the status of Payments API

As a first step, you may check the status of Payments API by calling:

    $paysafeClient = new PaysafeClient('API KEY', Environment::TEST);
    $monitorResponse = $paysafeClient->monitorService()->monitor();
    assertEquals("READY", $monitorResponse->getStatus());

---

#### Create a payment handle

Initial step in creating new transaction is to create a Payment Handle.
A Payment Handle represents tokenized information about the payment method that you set up for a customer.
Once the Payment Handle is created, you then include the paymentHandleToken in a new Payment / Standalone Credit / Original Credit / Verification request.

To create a Payment Handle, please use unique merchant reference number for each request.

Use the provided builder to create Payment Handle Request:

    $paymentHandleRequest = new PaymentHandleRequest();
    $paymentHandleRequest->merchantRefNum('MERCHANT_REF_NUM')
        ->transactionType(TransactionType::PAYMENT)
        ->amount(500)
        ->currencyCode(CurrencyCode::USD)
        ->accountId('1009688230');
        
    // ThreeDs Details
    $threeDs = new ThreeDs();
    $threeDs->merchantUrl('https://api.qa.paysafe.com/checkout/v2/index.html#/desktop')
        ->deviceChannel('BROWSER')
        ->messageCategory('PAYMENT')
        ->transactionIntent(TransactionIntent::CHECK_ACCEPTANCE)
        ->authenticationPurpose(AuthenticationPurpose::PAYMENT_TRANSACTION);
    $orderItemDetails = new OrderItemDetails();
    $orderItemDetails->preOrderItemAvailabilityDate('2014-01-26')
        ->preOrderPurchaseIndicator(PreOrderPurchaseIndicator::MERCHANDISE_AVAILABLE)
        ->reorderItemsIndicator(ReOrderItemsIndicator::FIRST_TIME_ORDER)
        ->shippingIndicator(ShippingIndicator::SHIP_TO_BILLING_ADDRESS);
    $threeDs->orderItemDetails($orderItemDetails);
    $paymentHandleRequest->threeDs($threeDs);
    
    // Card Details
    $cardExpiry = new CardExpiry();
    $cardExpiry->month('10')
        ->year(2027);
    $card = new Card();
    $card->cardNum(4000000000001026)
        ->cardExpiry($cardExpiry)
        ->cvv('111')
        ->issuingCountry('US');
    $paymentHandleRequest->card($card);
    
    // Billing Details
    $billingDetails = new BillingDetails();
    $billingDetails->nickName("Home")
        ->street("Street name")
        ->city("City Name")
        ->state("AL")
        ->country("US")
        ->zip("94404");
    $paymentHandleRequest->billingDetails($billingDetails);
    
    //Return Links
    $returnLinks = [];
    $returnLink1 = new ReturnLink();
    $returnLink1->rel(ReturnLinkRel::DEFAULT)
        ->href('https://usgaminggamblig.com/payment/return/')
        ->method('GET');
    $returnLinks[] = $returnLink1;

    $returnLink2 = new ReturnLink();
    $returnLink2->rel(ReturnLinkRel::ON_COMPLETED)
        ->href('https://usgaminggamblig.com/payment/return/success')
        ->method('GET');
    $returnLinks[] = $returnLink2;

    $returnLink3 = new ReturnLink();
    $returnLink3->rel(ReturnLinkRel::ON_FAILED)
        ->href('https://usgaminggamblig.com/payment/return/failed')
        ->method('GET');
    $returnLinks[] = $returnLink3;
    $paymentHandleRequest->returnLinks($returnLinks);

After which you can call the corresponding method:


    $paysafeClient = new PaysafeClient('API KEY', Environment::TEST);
    try {
      $paymentHandle = $paysafeClient->paymentHandleService()->createPaymentHandle($paymentHandleRequest);
    }
    catch (PaysafeSdkException e) {
      echo "PaysafeSDKException: ". $e->getMessage();
    }

#### Process Payment

To process Payment, you can create the Payment Request and submit it:

    $merchantDescriptor = new MerchantDescriptor();
    $merchantDescriptor->dynamicDescriptor('test')
        ->phone('1000000000');
    $paymentRequest = new PaymentRequest();
    $paymentRequest->merchantRefNum('YOUR_UNIQUE_MERCHANT_REF_NUMBER')
        ->amount(500)
        ->paymentHandleToken('SC2INoYvSe2MzQuB')
        ->currencyCode('USD')
        ->settleWithAuth(false)
        ->customerIp('127.0.0.1')
        ->currencyCode('USD')
        ->merchantDescriptor($merchantDescriptor)
        ->customerIp('172.0.0.1');
  
    try {
        $payment = $paysafeClient->paymentService()->processPayment($paymentRequest);
    } catch (PaysafeSdkException $e) {
        echo "PaysafeSDKException: " . $e->getMessage();
    }

In you want to authorize and settle the Payment in a single request, use `settleWithAuth(true)`.

In you want to authorize and settle the Payment separately, use `settleWithAuth(false)`.

Returned Payment object will, among other fields, contain `id`. This is the unique identifier of the Payment (settled or not), which can be used for Settlement or Refund.

#### Process Settlement

To process a Settlement for a Payment Request created with `settleWithAuth(false)`, you need to create a Settlement Request:

    $paymentId = $payment->getId();
    $settlementRequest = new SettlementRequest();
    $settlementRequest->merchantRefNum('YOUR_UNIQUE_MERCHANT_REF_NUMBER')
        ->amount(500);

    try {
        $settlement = $paysafeClient->settlementService()->processSettlement($paymentId, $settlementRequest);
    } catch (PaysafeSdkException $e) {
        echo "PaysafeSDKException: " . $e->getMessage();
    }

#### Process Refund

To process a Refund, you need to create a Refund Request:

    $refundRequest = new RefundRequest();
    $refundRequest->merchantRefNum('YOUR_UNIQUE_MERCHANT_REF_NUMBER')
        ->amount(500)
        ->dupCheck(true);

If the payment was settled immediately, use:

    $paymentId = $payment->getId();

If the payment was settled manually, by calling Process Settlement, use:

    $paymentId = $settlement->getId();

Finally, execute the request:

    try {
        $refund = $paysafeClient->refundService()->processRefund($id, $refundRequest);
    } catch (PaysafeSdkException $e) {
        echo "PaysafeSDKException: " . $e->getMessage();
    }

---

### Request customizations

Besides client level customizations, following values can also be customized at request level:

- `automaticRetries`
- `connectTimeout`
- `responseTimeout`
- `simulator` header - used only on `TEST` environment, for `POST`, `PUT`, `PATCH`, `DELETE` requests

To customize a request, simply provide `RequestOptions` object in method calls:

    $paymentHandleRequest = new PaymentHandleRequest();
    $requestOptions = new RequestOptions();
    $requestOptions->setMaxAutomaticRetries(3);
    $requestOptions->setConnectTimeout(5);
    $requestOptions->setResponseTimeout(10);
    $requestOptions->setSimulator(PaymentSimulator::INTERNAL);
    
    $paysafeClient = new PaysafeClient('API_KEY', Environment::TEST)
    $paymentHandle = $paysafeClient->paymentHandleService->createPaymentHandle(paymentHandleRequest, requestOptions);

If some value is not provided (in this case, `responseTimeout`), value from `PaysafeClient` will be used.

---

### Error handling

Paysafe PHP SDK automatically handles various error cases. All exceptions thrown by the `PaysafeClient` are subclasses of
[PaysafeSdkException.php](src/Exception/PaysafeSdkException.php).
Specific HTTP response codes or situations are mapped to corresponding exceptions for clearer and more structured error handling:

- [ApiConnectionException.php](src/Exception/ApiConnectionException.php)
- [ApiException.php](src/Exception/ApiException.php)
- [IllegalArgumentException.php](src/Exception/IllegalArgumentException.php)
- [InvalidCredentialsException.php](src/Exception/InvalidCredentialsException.php)
- [InvalidRequestException.php](src/Exception/InvalidRequestException.php)
- [RequestConflictException.php](src/Exception/RequestConflictException.php)
- [RequestDeclinedException.php](src/Exception/RequestDeclinedException.php)
- [UnauthorizedException.php](src/Exception/UnauthorizedException.php)

The following fields may be included in each exception, when available:

- `internalCorrelationId` - unique ID returned by Payments API, that can be provided to the Paysafe Support team as a reference for investigation
- `code` - HTTP status code returned by Payments API
- `error` - contains details about the error, returned from Payments API

---

### Overriding base url

**For testing purposes**, it is possible to override default URL for Payments API:

- LIVE environment: https://api.paysafe.com
- TEST environment: https://api.test.paysafe.com

Use the method `overrideBaseUrl(String url)` to point your `PaysafeClient` instance to local mock server.

---

### Using undocumented parameters

Paysafe PHP SDK is strongly typed and designed to support all officially released API fields.
However, the Payments API includes some undocumented or experimental properties, which are not part of the public API.

To use such parameters in classes representing API payloads (for example `PaymentHandleRequest`),
we have provided field `additionalParameters` which can be added one-by-one or as a complete map:


    // Add a new additional parameter
    public function addAdditionalParameter(string $key, $value): self
    {
      if ($this->additionalParameters === null) {
        $this->additionalParameters = [];
      }
      $this->additionalParameters[$key] = $value;
      return $this;
    }
    
    //Add a new additional parameter to the list
    public function addAdditionalParameters(array $additionalParameters): self
    {
      if ($this->additionalParameters === null) {
        $this->additionalParameters = [];
      }
      $this->additionalParameters = array_merge($this->additionalParameters, $additionalParameters);
      return $this;
    }

Usage:

    paymentHandleRequest->addAdditionalParameter('booleanParameter', true);
    paymentHandleRequest->addAdditionalParameter("arrayParameter",[
      'city' => 'London',
      'country' => 'United Kingdom',
      'phone' => '+2139243'
    ]);


---

## API Coverage

Full API details are available in the Paysafe API Reference.

#### Transactions types and functionalities supported in the SDK:

- [Verify That The Service Is Accessible](https://developer.paysafe.com/en/payments-api/#/operations/verify-that-the-service-is-accessible)
- [Payment Methods](https://developer.paysafe.com/en/payments-api/#/operations/look-up-payment-methods)
- [Payment Handles](https://developer.paysafe.com/en/payments-api/#/operations/create-payment-handle)
- [Verifications](https://developer.paysafe.com/en/payments-api/#/operations/verification)
- [Payments](https://developer.paysafe.com/en/payments-api/#/operations/process-payment)
- [Void Authorizations](https://developer.paysafe.com/en/payments-api/#/operations/void-authorization)
- [Settlements](https://developer.paysafe.com/en/payments-api/#/operations/process-settlement)
- [Refunds](https://developer.paysafe.com/en/payments-api/#/operations/process-refund)
- [Standalone Credits](https://developer.paysafe.com/en/payments-api/#/operations/process-standalone-credit)
- [Original Credits](https://developer.paysafe.com/en/payments-api/#/operations/process-original-credit)
- [Customers](https://developer.paysafe.com/en/payments-api/#/operations/create-customer)
- [Customer Payment Handles](https://developer.paysafe.com/en/payments-api/#/operations/create-payment-handle-for-customer)
- [Customer Addresses](https://developer.paysafe.com/en/payments-api/#/operations/create-address)
- [Customer Single-Use Tokens](https://developer.paysafe.com/en/payments-api/#/operations/create-single-use-customer-token)

#### Not supported in current version of the SDK:

- [Mandate](https://developer.paysafe.com/en/payments-api/#/operations/create-mandate)
- [Sightline Registration](https://developer.paysafe.com/en/payments-api/#/operations/create-a-sightline-registration-call)
- [Vippreferred Registration](https://developer.paysafe.com/en/payments-api/#/operations/create-a-vippreferred-registration-call)
- [Paysafecash Store Locator](https://developer.paysafe.com/en/payments-api/#/operations/store-locator)
- [Get Balance](https://developer.paysafe.com/en/payments-api/#/operations/get-balance)
- [Get Bank](https://developer.paysafe.com/en/payments-api/#/operations/get-bank)

---

## License

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://github.com/paysafegroup/paysafe-payments-api-sdk-php/blob/main/LICENSE.txt)
