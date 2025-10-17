<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * **Note:** Acquirers and processors do not necessarily support all available MCCs; before integrating,
 * you should contact [Integration Support](https://developer.paysafe.com/en/support/) for details.
 *
 * The fundingTransaction object is used to identify authorization requests that are categorized
 * as funding transactions by the merchant in order to provide additional information for the purpose of a transaction.
 *
 * It can be used by merchants registered with MCC 4722, 4829, 6012, 6051, 6211, 6540, 7800, 7801, 7802, 7994, 7995
 * or 9406. The relevant value will be assigned automatically
 * by the Payments API as per the merchant registration with card schemes and his applicable MCC.
 */
class FundingTransaction extends BaseModel
{
	const TYPE_SVDW_FUNDS_TRANSFER = 'SVDW_FUNDS_TRANSFER';
	const TYPE_SDW_WALLET_TRANSFER = 'SDW_WALLET_TRANSFER';
	const TYPE_ACCOUNT_TO_ACCOUNT = 'ACCOUNT_TO_ACCOUNT';
	const TYPE_PERSON_TO_PERSON = 'PERSON_TO_PERSON';
	const TYPE_LIQUID_ASSETS = 'LIQUID_ASSETS';

	const PROCESSOR_APPLIED_TYPE_SVDW_FUNDS_TRANSFER = 'SVDW_FUNDS_TRANSFER';
	const PROCESSOR_APPLIED_TYPE_SDW_WALLET_TRANSFER = 'SDW_WALLET_TRANSFER';
	const PROCESSOR_APPLIED_TYPE_ACCOUNT_TO_ACCOUNT = 'ACCOUNT_TO_ACCOUNT';
	const PROCESSOR_APPLIED_TYPE_PERSON_TO_PERSON = 'PERSON_TO_PERSON';
	const PROCESSOR_APPLIED_TYPE_LIQUID_ASSETS = 'LIQUID_ASSETS';
	const PROCESSOR_APPLIED_TYPE_NOT_APPLIED = 'NOT_APPLIED';

	/**
	 * The fundingTransaction type is included in the request and set by the merchant.
     * Supported funding transaction type values:
	 */
	private string $type;


	/**
	 * The fundingTransaction processorAppliedType value is chosen by Paysafe based on the merchant configuration. 
	 * It is equal to the one which is used by Paysafe based on your MCC and registration. If you 
	 * provide value which is applicable for your MCC but you have been registered for another use case, 
	 * Paysafe will assign the value you have registered for as use case and will provide it into the
	 * response as processorAppliedType.
	 * In case the merchant is not registered in the relevant card scheme system, the processorAppliedValue 
	 * received into the response will be 'NOT_APPLIED'.
	 * The processorAppliedType can be seen in the auth response. 
	 * Supported funding transaction processorAppliedType values: 
	 * - `SVDW_FUNDS_TRANSFER` - Stored Value Digital Wallet Funds Transfer -
     *      Stored Value Digital Wallets operate like prepaid cards by assigning a separate “account” to the customer,
     *      which the customer pre-loads with funds using their Visa payment credential,
     *      before being able to transact with sellers connected to the digital wallet’s platform or complete a
     *      transfer to other users of the wallet’s platform. Generally, customers & sellers are either
     *      transacting within the Stored Value Digital Wallet’s proprietary network of connected users,
     *      or within the Visa ecosystem if the wallet has attached a Visa product (e.g. a prepaid credential)
     *      to the “front” of the wallet, so the wallet uses Visa to make purchases, cash withdrawals etc.
	 * - `SDW_WALLET_TRANSFER` - Staged Digital Wallet Transfer - Staged Digital Wallets are capable of
     *      conducting “back-to-back funding” transactions – also known as a “live-load” or “real-time load”
     *      – which permits the customer to undertake transactions with sellers on the digital wallet’s platform
     *      when there are not sufficient funds in the digital wallet-assigned account to complete the transaction
     *      (which may include a “zero balance”).
	 * - `ACCOUNT_TO_ACCOUNT` - Account to Account - Money Transfer
     *      (funding of the cardholder’s own account at the same or a different financial institution).
	 * - `PERSON_TO_PERSON` - Person to Person - Money Transfer
     *      (transferring funds to another individual’s non-merchant account).
	 * - `LIQUID_ASSETS` - Liquid Assets - Acquisition of stocks, shares, foreign currency and cryptocurrency.
     *      This value will be automatically assigned by Paysafe if you are processing through Paysafe acquiring,
     *      with Visa card and your MCC is 6051 or 6211.
	 * - `NOT_APPLIED` - Not processed as funding transaction
	 * **NOTE:** If more information is required you can contact your account manager.
	 */
	private string $processorAppliedType;


	/**
	 * Builder function for type
	 * 
	 * @param string $type
	 * 
	 * @return FundingTransaction
	 */
	public function type(string $type): self
	{
		$this->setType($type);
		
		return $this;
	}
	/**
	 * Setter function for type
	 * 
	 * @param string $type
	 * 
	 * @return void
	 */
	public function setType(string $type): void
	{
		$this->type = $type;
	}
	/**
	 * Getter function for type
	 * 
	 * @return string
	 */
	public function getType(): string
	{
		return $this->type;
	}

	/**
	 * Builder function for processorAppliedType
	 * 
	 * @param string $processorAppliedType
	 * 
	 * @return FundingTransaction
	 */
	public function processorAppliedType(string $processorAppliedType): self
	{
		$this->setProcessorAppliedType($processorAppliedType);
		
		return $this;
	}
	/**
	 * Setter function for processorAppliedType
	 * 
	 * @param string $processorAppliedType
	 * 
	 * @return void
	 */
	public function setProcessorAppliedType(string $processorAppliedType): void
	{
		$this->processorAppliedType = $processorAppliedType;
	}
	/**
	 * Getter function for processorAppliedType
	 * 
	 * @return string
	 */
	public function getProcessorAppliedType(): string
	{
		return $this->processorAppliedType;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class FundingTransaction {" . PHP_EOL .
			"	type: " . $this->toIndentedString($this->type) . PHP_EOL .
			"	processorAppliedType: " . $this->toIndentedString($this->processorAppliedType) . PHP_EOL .
		"}";
	}
}
