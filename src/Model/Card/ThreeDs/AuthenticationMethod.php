<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card\ThreeDs;

/**
 * This is the mechanism used by the cardholder to authenticate to the 3DS Requester.
 */
class AuthenticationMethod
{
    const NO_LOGIN = "NO_LOGIN";
    const INTERNAL_CREDENTIALS = "INTERNAL_CREDENTIALS";
    const FEDERATED_ID = "FEDERATED_ID";
    const ISSUER_CREDENTIALS = "ISSUER_CREDENTIALS";
    const THIRD_PARY_AUTHENTICATION = "THIRD_PARY_AUTHENTICATION";
    const FIDO_AUTHENTICATOR = "FIDO_AUTHENTICATOR";


}
