# Paysafe PHP SDK – Merchant Demo

A plain PHP demo application showcasing the Paysafe Payments SDK.

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

### Using the local SDK (for development)

If you want to use the local version of the PHP SDK (e.g. before the SDK is published to Packagist):

1. Navigate to the `examples` directory:

   ```sh
   cd examples
   ```

2. Install dependencies using the local composer file:

   ```sh
   COMPOSER=composer.local.json composer install
   ```

   On Windows (PowerShell):

   ```powershell
   $env:COMPOSER="composer.local.json"; composer install
   ```

   This will symlink the parent SDK directory instead of downloading it from Packagist.

### Configure credentials

Edit `.env` in the `examples` directory:

```dotenv
PAYSAFE_API_KEY=YOUR_BASE64_API_KEY
PAYSAFE_ACCOUNT_ID=YOUR_ACCOUNT_ID

# Optional: base URL for redirect/3DS return links (defaults to http://127.0.0.1:8080)
# PAYSAFE_RETURN_URL_BASE=http://127.0.0.1:8888
```

### Run the application

Start the PHP built-in web server:

```sh
php -S 127.0.0.1:8888 -t public public/index.php
```

Open http://127.0.0.1:8888 in your browser.
