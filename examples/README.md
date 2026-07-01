# Paysafe PHP SDK – Merchant Demo

A PHP demo application showcasing the Paysafe Payments SDK.

## Features

- Card payments with 3DS authentication (frictionless and challenge)
- Manual settlement/void for card payments
- Redirect flow and automatic settlement for PaysafeCard, PaysafeCash, and PayPal
- Refunds (with customer account ID for PaysafeCard/PaysafeCash)
- Simple, readable code for easy integration reference

## Requirements

- PHP 8.0 or newer
- [Composer](https://getcomposer.org/)
- Paysafe API credentials (test or live)

## Setup

### Using the published SDK (from Packagist)

1. Navigate to the `examples` directory:

   ```
   cd examples
   ```

2. Install dependencies:

   ```
   composer install
   ```

### Configure credentials

Rename `.env.example` to `.env` to use provided credentials. 

If you want to run using your own credentials, rename `.env.example` in the `examples` directory and edit:

```
PAYSAFE_API_KEY=YOUR_BASE64_API_KEY
PAYSAFE_ACCOUNT_ID=YOUR_CARD_ACCOUNT_ID

# Optional: base URL for redirect/3DS return links (defaults to http://127.0.0.1:8888)
# PAYSAFE_RETURN_URL_BASE=http://127.0.0.1:8888

# Optional SDK logger settings for the demo
# PAYSAFE_LOG_LEVEL=ERROR   # allowed: ERROR, ALL
```

### Run the application

Start the PHP built-in web server:

```
php -S 127.0.0.1:8888 -t public public/index.php
```

Open http://127.0.0.1:8888 in your browser.

### SDK logging in the demo

- The demo configures the SDK through `new PaysafeClient(...)`.
- It uses the SDK default logger (`Monolog\Logger`).
- Default logging level is `ERROR`; use `PAYSAFE_LOG_LEVEL=ALL` to include request/response events.

## Usage

- Select a payment method (Card, PaysafeCard, PaysafeCash, PayPal) from the dropdown.
- Enter payment and billing details (see test cards below for Card payments).
- For PaysafeCard/PaysafeCash refunds, enter the user account ID or registered email as prompted.
- All transactions are shown in the Transactions section.

## What this demonstrates

| Feature                                                    | Payment Methods                  |
|------------------------------------------------------------|----------------------------------|
| 3DS authentication + manual settle/void                    | Card                             |
| Redirect flow + automatic settlement                       | PaysafeCard, PaysafeCash, PayPal |
| Refund (with customer email for PaysafeCard / PaysafeCash) | All settled transactions         |

## Test cards

| Scenario                     | Card number      |
|------------------------------|------------------|
| 3DS frictionless + success   | 4000000000002719 |
| 3DS challenge + success      | 4000000000002503 |
| 3DS rejected                 | 4000000000002537 |
| 3DS error                    | 4000000000002446 |

> **Never** hardcode production credentials in source code. Use environment variables or a secrets manager.

## Troubleshooting

- **Missing credentials**: Ensure your API key and account ID are set in `.env`.
- **Port conflicts**: Change the port in the `php -S` command if 8888 is in use.
- **SDK errors**: Check that the SDK version matches your code and dependencies.
- **Payment method not available**: Make sure your Paysafe account is enabled for the selected method.
- **Session issues**: The app uses PHP sessions to persist transactions in memory. Restarting the server clears all transactions.

## Further reading

- [Paysafe Developer Documentation](https://developer.paysafe.com/)
- [Paysafe API Reference](https://developer.paysafe.com/en/api-reference/)

## License

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://github.com/paysafegroup/paysafe-payments-api-sdk-php/blob/main/LICENSE)

