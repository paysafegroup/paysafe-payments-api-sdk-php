<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Exception;

/**
 * This type of exception is thrown in the event of 500 Internal Server Error HTTP response code
 * or 502 External Server Error from Paysafe Payments API.
 */
class ApiException extends PaysafeSdkException
{

}
