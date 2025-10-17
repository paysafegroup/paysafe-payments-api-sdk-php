<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card\Enums;

/**
 * Enum representing the various processor applied types for funding transactions.
 * The fundingTransaction processorAppliedType value is
 * chosen by Paysafe based on the merchant configuration.
 * It is equal to the one which is used by Paysafe based on your MCC and registration.
 * If you  provide value which is applicable for your MCC but you have been registered for another use case,
 * Paysafe will assign the value
 * you have registered for as use case and will provide it into the response as processorAppliedType.
 * In case the merchant is not registered
 * in the relevant card scheme system, the processorAppliedValue received into the response will be 'NOT_APPLIED'.
 * The processorAppliedType can be seen in the auth response.
 * <p>Enum Values:</p>
 * <ul>
 *   <li><strong>SVDW_FUNDS_TRANSFER:</strong> Stored Value Digital Wallet Funds Transfer.
 *   Used when a digital wallet is pre-loaded with funds using a Visa payment credential before transactions can occur.
 *  </li>
 *   <li><strong>SDW_WALLET_TRANSFER:</strong> Staged Digital Wallet Transfer.
 *   Used for back-to-back funding transactions, allowing transactions even with insufficient
 *  funds in the wallet account.</li>
 *   <li><strong>ACCOUNT_TO_ACCOUNT:</strong> Account to Account transfer.
 *   Refers to the transfer of money between two accounts, either at the same or different financial institutions.</li>
 *   <li><strong>PERSON_TO_PERSON:</strong> Person to Person transfer.
 *   Refers to transferring funds between two individuals, typically outside of merchant transactions.</li>
 *   <li><strong>NOT_APPLIED:</strong> Not processed as a funding transaction.
 *   This value is used when no funding transaction processor is applied
 *  or when the processor determines no application is relevant.</li>
 * </ul>
 */
class FundingTransactionType
{
	const SVDW_FUNDS_TRANSFER = "SVDW_FUNDS_TRANSFER";
	const SDW_WALLET_TRANSFER = "SDW_WALLET_TRANSFER";
	const ACCOUNT_TO_ACCOUNT = "ACCOUNT_TO_ACCOUNT";
	const PERSON_TO_PERSON = "PERSON_TO_PERSON";
	const NOT_APPLIED = "NOT_APPLIED";


}
