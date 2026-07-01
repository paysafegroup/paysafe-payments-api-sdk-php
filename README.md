# Paysafe PHP SDK

## Table of contents

<!-- TOC -->
* [Paysafe PHP SDK](#paysafe-php-sdk)
  * [Table of contents](#table-of-contents)
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
      * [Process Payment](#process-payment)
      * [Process Settlement](#process-settlement)
      * [Process Refund](#process-refund)
    * [Request customizations](#request-customizations)
    * [LPM Payment Methods](#lpm-payment-methods)
    * [Unsupported HTTP Requests](#unsupported-http-requests)
    * [Logging](#logging)
    * [Webhook Handler](#webhook-handler)
    * [Examples Module](#examples-module)
    * [Error handling](#error-handling)
    * [Overriding base url](#overriding-base-url)
    * [Using undocumented parameters](#using-undocumented-parameters)
    * [End-to-end integration example](#end-to-end-integration-example)
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

Please keep your `apiKey` in safe location, for example load it from your local .env file, HashiCorp vault, Kubernetes Secrets etc.

PaysafeClient can be configured for either **Live** or **Test** environment.

**Important: Do not use real card numbers or other payment instrument details in the Test environment.**
Test/ Sandbox is not compliant with Payment Card Industry Data Security Standards (PCI-DSS) and does not protect cardholder/ payee information.
Any upload of real cardholder data is strictly prohibited, as described in the Terms of Use.

---

You can create a PaysafeClient instance using constructor:
```php
    $paysafeClient = new PaysafeClient($apiKey, Environment::TEST);
```
Such `PaysafeClient` will use default client configuration (connect and response timeout, automatic retries).

### PaysafeClient customizations

`PaysafeClient` can also be instantiated using setters. This enables additional API client configurations:

```php
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
```

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

```php
    $proxy = 'http://custom-proxy:8080';

    $config = array(
      'apiKey' => 'apiKey',
      'environment' => 'test',
      'proxy' =>  $proxy)
    $paysafeClient = new PaysafeClient($config);
```

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
```php
    $sslOptions = [
      'cert' => '/path/to/client-cert.pem',
      'key'  => '/path/to/client-key.pem',
      'ca'   => '/path/to/ca-cert.pem'
    ];
    $paysafeClient = new PaysafeClient();
    $paysafeClient->setSslContext($sslOptions);
```
---

### Transaction flows

#### Check the status of Payments API

As a first step, you may check the status of Payments API by calling:
```php
    $paysafeClient = new PaysafeClient('API KEY', Environment::TEST);
    $monitorResponse = $paysafeClient->monitorService()->monitor();
    assertEquals("READY", $monitorResponse->getStatus());
```
---

#### Create a payment handle

Initial step in creating new transaction is to create a Payment Handle.
A Payment Handle represents tokenized information about the payment method that you set up for a customer.
Once the Payment Handle is created, you then include the paymentHandleToken in a new Payment / Standalone Credit / Original Credit / Verification request.

To create a Payment Handle, please use unique merchant reference number for each request.

Use the provided builder to create Payment Handle Request:
```php
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
    $returnLink1->rel(ReturnLinkRel::_DEFAULT)
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
```
After which you can call the corresponding method:

```php
    $paysafeClient = new PaysafeClient('API KEY', Environment::TEST);
    try {
      $paymentHandle = $paysafeClient->paymentHandleService()->createPaymentHandle($paymentHandleRequest);
    }
    catch (PaysafeSdkException e) {
      echo "PaysafeSDKException: ". $e->getMessage();
    }
```

#### Process Payment

To process Payment, you can create the Payment Request and submit it:

```php
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
```

In you want to authorize and settle the Payment in a single request, use `settleWithAuth(true)`.

In you want to authorize and settle the Payment separately, use `settleWithAuth(false)`.

Returned Payment object will, among other fields, contain `id`. This is the unique identifier of the Payment (settled or not), which can be used for Settlement or Refund.

#### Process Settlement

To process a Settlement for a Payment Request created with `settleWithAuth(false)`, you need to create a Settlement Request:
```php
    $paymentId = $payment->getId();
    $settlementRequest = new SettlementRequest();
    $settlementRequest->merchantRefNum('YOUR_UNIQUE_MERCHANT_REF_NUMBER')
        ->amount(500);

    try {
        $settlement = $paysafeClient->settlementService()->processSettlement($paymentId, $settlementRequest);
    } catch (PaysafeSdkException $e) {
        echo "PaysafeSDKException: " . $e->getMessage();
    }
```

#### Process Refund

To process a Refund, you need to create a Refund Request:
```php
    $refundRequest = new RefundRequest();
    $refundRequest->merchantRefNum('YOUR_UNIQUE_MERCHANT_REF_NUMBER')
        ->amount(500)
        ->dupCheck(true);
```

If the payment was settled immediately, use:
```php
    $paymentId = $payment->getId();
```

If the payment was settled manually, by calling Process Settlement, use:
```php
    $paymentId = $settlement->getId();
```

Finally, execute the request:
```php
    try {
        $refund = $paysafeClient->refundService()->processRefund($id, $refundRequest);
    } catch (PaysafeSdkException $e) {
        echo "PaysafeSDKException: " . $e->getMessage();
    }
```

---

### Request customizations

Besides client level customizations, following values can also be customized at request level:

- `automaticRetries`
- `connectTimeout`
- `responseTimeout`
- `simulator` header - used only on `TEST` environment, for `POST`, `PUT`, `PATCH`, `DELETE` requests

To customize a request, simply provide `RequestOptions` object in method calls:

```php
    $paymentHandleRequest = new PaymentHandleRequest();
    $requestOptions = new RequestOptions();
    $requestOptions->setMaxAutomaticRetries(3);
    $requestOptions->setConnectTimeout(5);
    $requestOptions->setResponseTimeout(10);
    $requestOptions->setSimulator(PaymentSimulator::INTERNAL);
    
    $paysafeClient = new PaysafeClient('API_KEY', Environment::TEST)
    $paymentHandle = $paysafeClient->paymentHandleService->createPaymentHandle(paymentHandleRequest, requestOptions);
```

If some value is not provided (in this case, `responseTimeout`), value from `PaysafeClient` will be used.

---

### LPM Payment Methods

The SDK supports Local Payment Methods (LPM) such as Skrill, PaysafeCash, PaysafeCard, Neteller, and PayPal. You can create payment handles for these methods by specifying the appropriate `PaymentType` in your `PaymentHandleRequest`.

**Example for Skrill:**
```php
    $returnLink = new ReturnLink();
    $returnLink
      ->rel(ReturnLinkRel::_DEFAULT)
      ->href("https://example.com/payment/return/")
      ->method(HttpMethod::GET);
    
    $skrillHandleRequest = new PaymentHandleRequest();
    $skrillHandleRequest
      ->merchantRefNum("YOUR_REF")
      ->transactionType(TransactionType::PAYMENT)
      ->paymentType(PaymentType::SKRILL)
      ->accountId("YOUR_ACCOUNT_ID")
      ->amount(500)
      ->currencyCode(CurrencyCode::EUR)
      ->returnLinks(
        [
            $returnLink
        ]
      );
```

**Other supported LPMs:**
- `PaymentType::PAYSAFECASH`
- `PaymentType::PAYSAFECARD`
- `PaymentType::NETELLER`
- `PaymentType::PAYPAL`

The rest of the flow (processing the payment, handling redirects, etc.) is similar to card payments. See the `/examples` module for end-to-end flows.

---

### Unsupported HTTP Requests

If you attempt to use an HTTP method or endpoint not supported by the SDK, a `PaysafeSdkException` will be thrown. The SDK only exposes supported API operations. 

For unsupported or custom requests, use the `DirectRequestOptions`.

```php
// Create HTTP request headers array, allowing you to set per-request
// configuration options like additional headers if required by the API
$requestHeaders = [
    'MID' => '6571856178'
];

// Build per-request options
$requestOptions = (new RequestOptions())
    ->setConnectTimeout(10 * 1000)
    ->setResponseTimeout(20 * 1000)
    ->setMaxAutomaticRetries(3)
    ->setSimulator(RequestOptions::PAYMENT_SIMULATOR_INTERNAL);

// Build DirectRequestOptions
$options = (new DirectRequestOptions())
    ->setAdditionalHeaders($requestHeaders)
    ->setRequestOptions($requestOptions);

// Initialize Paysafe client
$client = new PaysafeClient('apiKey', Environment::TEST);

// Make the request using PaysafeClient::directRequest()
$response = $client->directRequest(PaysafeClient::REQUEST_METHOD_GET, 'paymenthub/v1/balances', 'name=johndoe&email=johndoe@example.com', $options);

// POST request
// For POST requests, pass serialized JSON (or object/array directly).
$params = [
    'merchantRefNum' => 'merchantRefNum',
    'transactionType' => 'PAYMENT',
    'amount' => 1250,
    'currencyCode' => 'BRL',
];
$requestBody = $client->serialize($params);

$response = $client->directRequest(PaysafeClient::REQUEST_METHOD_POST, 'paymenthub/v1/vippreferred/registrations', $requestBody, $options);

// Cast the response into a specific SDK response class if available
$paymentHandle = $client->deserialize($response->getResponseBody(), PaymentHandle::class);
```

---

### Logging

The SDK logging is client-level. Logger type is `Psr\Log\LoggerInterface`. 

Default logger is always present on `PaysafeClient` (`Monolog\Logger`).

There are two log levels:
- `LoggingLevel::ERROR` logs only errors (default);
- `LoggingLevel::ALL` logs errors plus non-error SDK events.

**Initialization:**
```php
    use Monolog\Logger;
    use Paysafe\PhpSdk\Config\Environment;
    use Paysafe\PhpSdk\Logging\LoggingLevel;
    use Paysafe\PhpSdk\PaysafeClient;

    $paysafeClient = new PaysafeClient('API_KEY', Environment::TEST);
    $paysafeClient->setLogger(new Logger('PaysafeSdk'));
    $paysafeClient->setLoggingLevel(LoggingLevel::ALL);
```

Any PSR-3 compliant logger works (Monolog, Symfony logger, Laravel logger, etc.).

---

### Webhook Handler

The SDK provides a `WebhookHandler` utility to validate and parse webhook events securely:

```php
    use Monolog\Logger;
    use Paysafe\PhpSdk\Logging\LoggingLevel;
    use Paysafe\PhpSdk\Webhook\WebhookHandler;

    $handler = new WebhookHandler(
        new Logger('PaysafeSdkWebhook'),
        LoggingLevel::ERROR
    );
    $event = $handler->parseAndValidate($payload, $signatureHeader, $secretKey);
```

- Signature is verified before parsing.
- All events and errors are logged via the provided logger.
- See `WebhookHandler` and `WebhookEvent` classes for details.

---

### Examples Module

A new `/examples` module is included, providing runnable Spring Boot applications that demonstrate integration flows for all supported payment methods, including LPMs, 3DS, and webhooks. See the `/examples` directory for details.

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

```php
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
```

Usage:
```php
    paymentHandleRequest->addAdditionalParameter('booleanParameter', true);
    paymentHandleRequest->addAdditionalParameter("arrayParameter",[
      'city' => 'London',
      'country' => 'United Kingdom',
      'phone' => '+2139243'
    ]);
```

---

### End-to-end integration example

The following example demonstrates a complete payment flow: SDK initialization, processing a charge, handling errors, and looking up a transaction.

```php
    declare(strict_types=1);
    
    require __DIR__ . '/vendor/autoload.php';
    
    use Paysafe\PhpSdk\PaysafeClient;
    use Paysafe\PhpSdk\Config\Environment;
    use Paysafe\PhpSdk\Client\RequestOptions;
    use Paysafe\PhpSdk\Model\PaymentHandleRequest;
    use Paysafe\PhpSdk\Model\PaymentRequest;
    use Paysafe\PhpSdk\Model\Card;
    use Paysafe\PhpSdk\Model\CardExpiry;
    use Paysafe\PhpSdk\Model\BillingDetails;
    use Paysafe\PhpSdk\Model\MerchantDescriptor;
    use Paysafe\PhpSdk\Model\TransactionType;
    use Paysafe\PhpSdk\Model\CurrencyCode;
    use Paysafe\PhpSdk\Exception\PaysafeSdkException;
    use Paysafe\PhpSdk\Exception\ApiConnectionException;
    use Paysafe\PhpSdk\Exception\InvalidCredentialsException;
    use Paysafe\PhpSdk\Exception\InvalidRequestException;
    use Paysafe\PhpSdk\Exception\RequestDeclinedException;
    
    // --- 1. Initialize the SDK --------------------------------------------------
    // Load your API key from a secure vault - never hardcode credentials.
    $apiKey = getenv('PAYSAFE_API_KEY'); // e.g. "MerchantXYZ:B-tst1-0-..."
    
    $client = new PaysafeClient($apiKey, Environment::TEST);
    
    // Optional: customize timeouts and retry behavior
    $client->setConnectTimeout(10);
    $client->setResponseTimeout(30);
    $client->setMaxAutomaticRetries(3);
    
    // --- 2. Create a Payment Handle ---------------------------------------------
    $cardExpiry = new CardExpiry();
    $cardExpiry->month('12')->year(2027);
    
    $card = new Card();
    $card->cardNum('4000000000001026')
        ->cardExpiry($cardExpiry)
        ->cvv('123');
    
    $billingDetails = new BillingDetails();
    $billingDetails->street('100 Queen Street')
        ->city('Toronto')
        ->state('ON')
        ->country('CA')
        ->zip('M5H 2N2');
    
    $paymentHandleRequest = new PaymentHandleRequest();
    $paymentHandleRequest
        ->merchantRefNum('order-' . uniqid())
        ->transactionType(TransactionType::PAYMENT)
        ->amount(2500)                    // $25.00 in minor units
        ->currencyCode(CurrencyCode::USD)
        ->accountId('1009688230')
        ->card($card)
        ->billingDetails($billingDetails);
    
    try {
        $paymentHandle = $client->paymentHandleService()->createPaymentHandle($paymentHandleRequest);
        echo "Payment Handle created: " . $paymentHandle->getId() . PHP_EOL;
        echo "Token: " . $paymentHandle->getPaymentHandleToken() . PHP_EOL;
    } catch (InvalidRequestException $e) {
        // 400 - validation errors (missing fields, invalid currency, etc.)
        echo "Validation error: " . $e->getError()->getMessage() . PHP_EOL;
        if ($e->getError()->getFieldErrors()) {
            foreach ($e->getError()->getFieldErrors() as $fieldError) {
                echo "  Field '{$fieldError->getField()}': {$fieldError->getError()}" . PHP_EOL;
            }
        }
        exit(1);
    } catch (InvalidCredentialsException $e) {
        // 401 - bad API key
        echo "Authentication failed. Check your API key." . PHP_EOL;
        exit(1);
    }
    
    // --- 3. Process a Payment ----------------------------------------------------
    $merchantDescriptor = new MerchantDescriptor();
    $merchantDescriptor->dynamicDescriptor('MyStore')
        ->phone('1234567890');
    
    $paymentRequest = new PaymentRequest();
    $paymentRequest
        ->merchantRefNum('charge-' . uniqid())
        ->amount(2500)
        ->currencyCode('USD')
        ->paymentHandleToken($paymentHandle->getPaymentHandleToken())
        ->settleWithAuth(true)           // Authorize + settle in one step
        ->merchantDescriptor($merchantDescriptor);
    
    // Use per-request options to override client-level settings
    $requestOptions = new RequestOptions();
    $requestOptions->setConnectTimeout(15);
    $requestOptions->setResponseTimeout(45);
    
    try {
        $payment = $client->paymentService()->processPayment($paymentRequest, $requestOptions);
    
        echo "Payment successful!" . PHP_EOL;
        echo "  Payment ID: " . $payment->getId() . PHP_EOL;
        echo "  Status:     " . $payment->getStatus() . PHP_EOL;
        echo "  Amount:     " . $payment->getAmount() . PHP_EOL;
    
    } catch (RequestDeclinedException $e) {
        // 402 - payment declined by processor
        echo "Payment declined: " . $e->getError()->getMessage() . PHP_EOL;
        echo "  Correlation ID: " . $e->getInternalCorrelationId() . PHP_EOL;
    
        // Access partial response data (e.g. gateway response)
        if ($e->getApiResponse() !== null) {
            echo "  Partial response available for diagnostics." . PHP_EOL;
        }
    
    } catch (ApiConnectionException $e) {
        // Network failure - safe to retry
        echo "Network error: " . $e->getMessage() . PHP_EOL;
    
    } catch (PaysafeSdkException $e) {
        // Catch-all for any other API error (403, 409, 5xx, etc.)
        echo "API error [{$e->getCode()}]: " . $e->getMessage() . PHP_EOL;
        if ($e->getInternalCorrelationId()) {
            echo "  Provide this to Paysafe Support: " . $e->getInternalCorrelationId() . PHP_EOL;
        }
    }
    
    // --- 4. Look up a Payment by ID ---------------------------------------------
    if (isset($payment)) {
        try {
            $fetched = $client->paymentService()->getPaymentById($payment->getId());
            echo "Fetched payment status: " . $fetched->getStatus() . PHP_EOL;
        } catch (PaysafeSdkException $e) {
            echo "Lookup failed: " . $e->getMessage() . PHP_EOL;
        }
    }
```

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
