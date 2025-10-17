<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Lpm\Enums;

/**
 * This is the type of fraudulent transaction that was carried out with the intention of financial gain.
 * Possible values for the fraud type:
 * <ul>
 * <li> ACCOUNT_TAKEOVER - Account Takeover   </li>
 * <li> BAD_DEPOSIT - Proceeds of Bad Deposit   </li>
 * <li> FIRST_PARTY_FRAUD  </li>
 * <li> First Party Fraud  </li>
 * <li> INTERCEPTED_PAYMENT  </li>
 * <li> Intercepted Transfer   </li>
 * <li> MERCHANT_DISPUTE - Merchant Dispute  </li>
 * <li> FAMILY_FRIEND_FRAUD - Family/Friendly Fraud  </li>
 * <li> BUSINESS_EMAIL_COMPROMISE - Business Email Compromise  </li>
 * <li> VENDOR_EMAIL_COMPROMISE - Vendor Email Compromise  </li>
 * <li> MALWARE - Malware  </li>
 * <li> APPLICATION_FRAUD - Application Fraud  </li>
 * <li> FRAUD_BUSINESS - Fraudulent Business  </li>
 * <li> OTHER - Other fraud type </li>
 * </ul>
 */
class InteracFraudType
{
	const ACCOUNT_TAKEOVER = "ACCOUNT_TAKEOVER";
	const BAD_DEPOSIT = "BAD_DEPOSIT";
	const FIRST_PARTY_FRAUD = "FIRST_PARTY_FRAUD";
	const INTERCEPTED_PAYMENT = "INTERCEPTED_PAYMENT";
	const MERCHANT_DISPUTE = "MERCHANT_DISPUTE";
	const FAMILY_FRIEND_FRAUD = "FAMILY_FRIEND_FRAUD";
	const BUSINESS_EMAIL_COMPROMISE = "BUSINESS_EMAIL_COMPROMISE";
	const VENDOR_EMAIL_COMPROMISE = "VENDOR_EMAIL_COMPROMISE";
	const MALWARE = "MALWARE";
	const APPLICATION_FRAUD = "APPLICATION_FRAUD";
	const FRAUD_BUSINESS = "FRAUD_BUSINESS";
	const OTHER = "OTHER";


}
