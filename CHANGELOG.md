# Change Log

## [2.0.1] - 2026-11-04

### Fixed

- Corrected `storedCredential` field naming on `PaymentRequest`.

### Changed

- Minor dependency and test updates.


## [2.0.0] - 2026-06-20

### Added

- Support for Local Payment Methods (LPM): Skrill, PaysafeCash, PaysafeCard, Neteller, PayPal payment handles.
- Webhook handler utility for secure webhook event validation and parsing.
- Pluggable logging: use default JSON SLF4J logger or provide custom implementation via SdkLogger interface.
- New /examples module with runnable Spring Boot applications for all payment flows, including LPMs and webhooks.

### Changed

- **Breaking change:** Some model classes might have a different package structure starting with v2.0.0. Please update your imports accordingly.
- Improved error handling for unsupported HTTP requests.

## [1.2.0] - 2026-04-15

_Updated package dependencies._

## [1.1.0] - 2025-10-17

_Included support for monolog 3._

## [1.0.0] - 2025-05-28

_First release._

### API Coverage

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
