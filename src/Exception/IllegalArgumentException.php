<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Exception;

/**
 * This type of exception is thrown in the event that PaysafeClient was instantiated with invalid parameters,
 * for example empty or null api key.
 */
class IllegalArgumentException extends PaysafeSdkException
{

}
