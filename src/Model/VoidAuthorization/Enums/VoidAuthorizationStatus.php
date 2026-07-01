<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\VoidAuthorization\Enums;

/**
 * This is the status of the transaction request. Possible values are: - RECEIVED - Our system has received the request and is waiting for the downstream processor's response. - COMPLETED - The transaction has been completed. - HELD - The transaction has been placed on hold due to risk considerations. - FAILED - The transaction failed, due to either an error or being declined. - CANCELLED - The request has been fully voided (reversed). - PENDING - The request is pending.
 */
class VoidAuthorizationStatus
{
    const RECEIVED = 'RECEIVED';
    const COMPLETED = 'COMPLETED';
    const HELD = 'HELD';
    const FAILED = 'FAILED';
    const CANCELLED = 'CANCELLED';
    const PENDING = 'PENDING';
}
