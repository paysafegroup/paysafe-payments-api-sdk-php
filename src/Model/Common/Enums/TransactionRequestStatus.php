<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common\Enums;

/**
 * This is the status of the transaction request for standalone and original credits. Possible values are: - RECEIVED – Our system has received the request and is waiting for the downstream processor's response. - INITIATED – The transaction was initiated with the downstream provider. - PENDING - The transaction is awaiting the payment service provider's response. - FAILED – The transaction failed, due to either an error or being declined. - CANCELLED – The transaction request is cancelled. - EXPIRED – The transaction request is expired. - COMPLETED – The transaction request is completed.
 */
class TransactionRequestStatus
{
    const RECEIVED = 'RECEIVED';
    const INITIATED = 'INITIATED';
    const PENDING = 'PENDING';
    const FAILED = 'FAILED';
    const CANCELLED = 'CANCELLED';
    const EXPIRED = 'EXPIRED';
    const COMPLETED = 'COMPLETED';
}
