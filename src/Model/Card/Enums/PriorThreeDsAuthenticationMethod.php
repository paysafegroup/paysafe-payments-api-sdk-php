<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Card\Enums;

/**
 * Mechanism used previously by the cardholder to authenticate to the 3DS Requestor.
 */
class PriorThreeDsAuthenticationMethod
{
    const FRICTIONLESS_AUTHENTICATION = 'FRICTIONLESS_AUTHENTICATION';
    const ACS_CHALLENGE = 'ACS_CHALLENGE';
    const AVS_VERIFIED = 'AVS_VERIFIED';
    const OTHER_ISSUER_METHOD = 'OTHER_ISSUER_METHOD';
}
