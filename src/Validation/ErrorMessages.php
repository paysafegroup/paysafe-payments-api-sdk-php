<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Validation;

class ErrorMessages
{
    const MESSAGE_BLANK_API_KEY = "You must provide non-blank api key in format 'username:password'";
    const MESSAGE_INVALID_API_KEY_FORMAT = "Api key does not match format 'username:password'";
    const MESSAGE_MAXIMUM_ALLOWED_NUMBER_OF_AUTOMATIC_RETRIES = "Maximum allowed number of automatic retries is 5";
    const MESSAGE_MAXIMUM_AUTOMATIC_RETRIES_CANNOT_BE_NEGATIVE = "Maximum automatic retries cannot be negative";
    const MESSAGE_CONNECT_TIMEOUT_MUST_BE_A_POSITIVE_VALUE = "Connect timeout must be a positive value";
    const MESSAGE_RESPONSE_TIMEOUT_MUST_BE_A_POSITIVE_VALUE = "Response timeout must be a positive value";
}
