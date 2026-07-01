<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Lpm\Enums;

/**
 * This is the type of fraudulent transaction that was carried out with the intention of financial gain. Possible values for the fraud type: - ACCOUNT_TAKEOVER - Account Takeover - BAD_DEPOSIT - Proceeds of Bad Deposit - FIRST_PARTY_FRAUD - First Party Fraud - INTERCEPTED_PAYMENT - Intercepted Transfer - MERCHANT_DISPUTE - Merchant Dispute - FAMILY_FRIEND_FRAUD - Family/Friendly Fraud - BUSINESS_EMAIL_COMPROMISE - Business Email Compromise - VENDOR_EMAIL_COMPROMISE - Vendor Email Compromise - MALWARE - Malware - APPLICATION_FRAUD - Application Fraud - FRAUD_BUSINESS - Fraudulent Business - OTHER - Other fraud type
 */
class InteracFraudType
{
    const ACCOUNT_TAKEOVER = 'ACCOUNT_TAKEOVER';
    const BAD_DEPOSIT = 'BAD_DEPOSIT';
    const FIRST_PARTY_FRAUD = 'FIRST_PARTY_FRAUD';
    const INTERCEPTED_PAYMENT = 'INTERCEPTED_PAYMENT';
    const MERCHANT_DISPUTE = 'MERCHANT_DISPUTE';
    const FAMILY_FRIEND_FRAUD = 'FAMILY_FRIEND_FRAUD';
    const BUSINESS_EMAIL_COMPROMISE = 'BUSINESS_EMAIL_COMPROMISE';
    const VENDOR_EMAIL_COMPROMISE = 'VENDOR_EMAIL_COMPROMISE';
    const MALWARE = 'MALWARE';
    const APPLICATION_FRAUD = 'APPLICATION_FRAUD';
    const FRAUD_BUSINESS = 'FRAUD_BUSINESS';
    const OTHER = 'OTHER';
}
