<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card\ThreeDs;

use Paysafe\PhpSdk\Model\Common\Error\Error;
use Paysafe\PhpSdk\Model\BaseModel;

/**
 * 3D Secure authentication details.
 */
class Authentication extends BaseModel
{
	const STATUS_COMPLETED = 'COMPLETED ';
	const STATUS_FAILED = 'FAILED';

	const THREE_D_ENROLLMENT_Y = 'Y';
	const THREE_D_ENROLLMENT_N = 'N';
	const THREE_D_ENROLLMENT_U = 'U';

	const THREE_D_RESULT_Y = 'Y';
	const THREE_D_RESULT_A = 'A';
	const THREE_D_RESULT_N = 'N';
	const THREE_D_RESULT_U = 'U';
	const THREE_D_RESULT_E = 'E';

	const SIGNATURE_STATUS_Y = 'Y';
	const SIGNATURE_STATUS_N = 'N';

	const EXEMPTION_INDICATOR_LOW_VALUE_EXEMPTION = 'LOW_VALUE_EXEMPTION';
	const EXEMPTION_INDICATOR_TRA_EXEMPTION = 'TRA_EXEMPTION';

	/**
	 * This is the ID of authentication, returned in the response.
	 * Example: 5d4db3bc-34c9-417f-a051-0d992ad9284e
	 */
	private string $id;


	/**
	 * This is the Electronic Commerce Indicator code, which gets returned by the card issuer indicating whether
     * the cardholder was successfully authenticated. Note that in some cases the eci value includes a leading zero,
     * e.g., 01 or 02.
	 * 
	 * **Visa**
	 *  - 5 - Identifies a successfully authenticated transaction.
	 *  - 6 - Identifies an attempts authenticated transaction.
	 *  - 7 - Identifies a non-authenticated transaction.
	 * 
	 * **Mastercard**
	 *  - 2 - Identifies a successfully authenticated transaction.
	 *  - 1 - Identifies an attempts authenticated transaction.
	 *  - 0 - Identifies a non-authenticated transaction.
	 * Example: 5
	 */
	private int $eci;

	/**
	 * This is the Cardholder Authentication Verification Value, which gets returned by the card issuer,
     * indicating that the transaction has been authenticated.
	 * Example: AAABBhkXYgAAAAACBxdiENhf7A+=
	 */
	private string $cavv;

	/**
	 * This is the transaction identifier returned by the card issuer.
	 * Example: aWg4N1ZZOE53TkFrazJuMmkyRDA=
	 */
	private string $xid;


	/**
	 * This is the status of the Enrollment Lookup request. Possible values are:
	 * 
	 * - COMPLETED - The transaction has been completed.
	 * 
	 * - FAILED - The authentication request failed. Check the error code for details.
	 */
	private string $status;


	/**
	 * This is the merchant reference number created by 
	 * the merchant and submitted as part of the request. It must be unique for each request.
	 * Example: merchantABC-123-authentications
	 */
	private string $merchantRefNum;


	/**
	 * This indicates whether or not the cardholder is enrolled in 3D Secure. Possible values are:
	 * 
	 * - Y – Cardholder authentication available.
	 * 
	 * - N – Cardholder not enrolled in authentication.
	 * 
	 * - U – Cardholder authentication unavailable
	 */
	private string $threeDEnrollment;

	/**
	 * This is the unique directory server transaction ID required for Mastercard.
     * Note: This is field is required when the card brand is Mastercard. This exists only for 3D Secure 2.
	 * Example: 123e4567-e89b-12d3-a456-426655445674
	 */
	private string $directoryServerTransactionId;

	/**
	 * This is the 3D secure protocol version.
	 * Example: 2.1.0
	 */
	private string $threeDSecureVersion;


	/**
	 * This indicates the outcome of the Authentication.
	 * 
	 * - Y – The cardholder successfully authenticated with their card issuer.
	 * 
	 * - A – The cardholder authentication was attempted.
	 * 
	 * - N – The cardholder failed to successfully authenticate with their card issuer.
	 * 
	 * - U – Authentication with the card issuer was unavailable.
	 * 
	 * - E – An error occurred during authentication.
	 */
	private string $threeDResult;


	/**
	 * This is the 3D Secure signature verification result value.
	 * - Y – All transaction and signature checks satisfied.
	 * 
	 * - N – At least one transaction or signature check failed.
	 */
	private string $signatureStatus;


	/**
	 * This exemption gives the Merchant the option to bypass the Strong Customer Authentication or 3DS.
     * Note: This exists only for 3D Secure 2.
	 * 
	 * - LOW_VALUE_EXEMPTION - This exemption is valid only for transactions lower or equal to 30 euro,
     *      not exceeding five transactions in a row or 100 euro total amount transactions
     *      with no SCA (Strong Customer Authentication)
	 * - TRA_EXEMPTION - The exemption applies specifically to transactions that are 100 euros or lower.
     *      However, there could be additional criteria that need to be considered.
     *      Please reach out to your account manager for further details.
	 * Example: TRA_EXEMPTION
	 */
	private string $exemptionIndicator;

	private Error $error;

	/**
	 * Builder function for id
	 * 
	 * @param string $id
	 * 
	 * @return Authentication
	 */
	public function id(string $id): self
	{
		$this->setId($id);
		
		return $this;
	}
	/**
	 * Setter function for id
	 * 
	 * @param string $id
	 * 
	 * @return void
	 */
	public function setId(string $id): void
	{
		$this->id = $id;
	}
	/**
	 * Getter function for id
	 * 
	 * @return string
	 */
	public function getId(): string
	{
		return $this->id;
	}

	/**
	 * Builder function for eci
	 * 
	 * @param int $eci
	 * 
	 * @return Authentication
	 */
	public function eci(int $eci): self
	{
		$this->setEci($eci);
		
		return $this;
	}
	/**
	 * Setter function for eci
	 * 
	 * @param int $eci
	 * 
	 * @return void
	 */
	public function setEci(int $eci): void
	{
		$this->eci = $eci;
	}
	/**
	 * Getter function for eci
	 * 
	 * @return int
	 */
	public function getEci(): int
	{
		return $this->eci;
	}

	/**
	 * Builder function for cavv
	 * 
	 * @param string $cavv
	 * 
	 * @return Authentication
	 */
	public function cavv(string $cavv): self
	{
		$this->setCavv($cavv);
		
		return $this;
	}
	/**
	 * Setter function for cavv
	 * 
	 * @param string $cavv
	 * 
	 * @return void
	 */
	public function setCavv(string $cavv): void
	{
		$this->cavv = $cavv;
	}
	/**
	 * Getter function for cavv
	 * 
	 * @return string
	 */
	public function getCavv(): string
	{
		return $this->cavv;
	}

	/**
	 * Builder function for xid
	 * 
	 * @param string $xid
	 * 
	 * @return Authentication
	 */
	public function xid(string $xid): self
	{
		$this->setXid($xid);
		
		return $this;
	}
	/**
	 * Setter function for xid
	 * 
	 * @param string $xid
	 * 
	 * @return void
	 */
	public function setXid(string $xid): void
	{
		$this->xid = $xid;
	}
	/**
	 * Getter function for xid
	 * 
	 * @return string
	 */
	public function getXid(): string
	{
		return $this->xid;
	}

	/**
	 * Builder function for status
	 * 
	 * @param string $status
	 * 
	 * @return Authentication
	 */
	public function status(string $status): self
	{
		$this->setStatus($status);
		
		return $this;
	}
	/**
	 * Setter function for status
	 * 
	 * @param string $status
	 * 
	 * @return void
	 */
	public function setStatus(string $status): void
	{
		$this->status = $status;
	}
	/**
	 * Getter function for status
	 * 
	 * @return string
	 */
	public function getStatus(): string
	{
		return $this->status;
	}

	/**
	 * Builder function for merchantRefNum
	 * 
	 * @param string $merchantRefNum
	 * 
	 * @return Authentication
	 */
	public function merchantRefNum(string $merchantRefNum): self
	{
		$this->setMerchantRefNum($merchantRefNum);
		
		return $this;
	}
	/**
	 * Setter function for merchantRefNum
	 * 
	 * @param string $merchantRefNum
	 * 
	 * @return void
	 */
	public function setMerchantRefNum(string $merchantRefNum): void
	{
		$this->merchantRefNum = $merchantRefNum;
	}
	/**
	 * Getter function for merchantRefNum
	 * 
	 * @return string
	 */
	public function getMerchantRefNum(): string
	{
		return $this->merchantRefNum;
	}

	/**
	 * Builder function for threeDEnrollment
	 * 
	 * @param string $threeDEnrollment
	 * 
	 * @return Authentication
	 */
	public function threeDEnrollment(string $threeDEnrollment): self
	{
		$this->setThreeDEnrollment($threeDEnrollment);
		
		return $this;
	}
	/**
	 * Setter function for threeDEnrollment
	 * 
	 * @param string $threeDEnrollment
	 * 
	 * @return void
	 */
	public function setThreeDEnrollment(string $threeDEnrollment): void
	{
		$this->threeDEnrollment = $threeDEnrollment;
	}
	/**
	 * Getter function for threeDEnrollment
	 * 
	 * @return string
	 */
	public function getThreeDEnrollment(): string
	{
		return $this->threeDEnrollment;
	}

	/**
	 * Builder function for directoryServerTransactionId
	 * 
	 * @param string $directoryServerTransactionId
	 * 
	 * @return Authentication
	 */
	public function directoryServerTransactionId(string $directoryServerTransactionId): self
	{
		$this->setDirectoryServerTransactionId($directoryServerTransactionId);
		
		return $this;
	}
	/**
	 * Setter function for directoryServerTransactionId
	 * 
	 * @param string $directoryServerTransactionId
	 * 
	 * @return void
	 */
	public function setDirectoryServerTransactionId(string $directoryServerTransactionId): void
	{
		$this->directoryServerTransactionId = $directoryServerTransactionId;
	}
	/**
	 * Getter function for directoryServerTransactionId
	 * 
	 * @return string
	 */
	public function getDirectoryServerTransactionId(): string
	{
		return $this->directoryServerTransactionId;
	}

	/**
	 * Builder function for threeDSecureVersion
	 * 
	 * @param string $threeDSecureVersion
	 * 
	 * @return Authentication
	 */
	public function threeDSecureVersion(string $threeDSecureVersion): self
	{
		$this->setThreeDSecureVersion($threeDSecureVersion);
		
		return $this;
	}
	/**
	 * Setter function for threeDSecureVersion
	 * 
	 * @param string $threeDSecureVersion
	 * 
	 * @return void
	 */
	public function setThreeDSecureVersion(string $threeDSecureVersion): void
	{
		$this->threeDSecureVersion = $threeDSecureVersion;
	}
	/**
	 * Getter function for threeDSecureVersion
	 * 
	 * @return string
	 */
	public function getThreeDSecureVersion(): string
	{
		return $this->threeDSecureVersion;
	}

	/**
	 * Builder function for threeDResult
	 * 
	 * @param string $threeDResult
	 * 
	 * @return Authentication
	 */
	public function threeDResult(string $threeDResult): self
	{
		$this->setThreeDResult($threeDResult);
		
		return $this;
	}
	/**
	 * Setter function for threeDResult
	 * 
	 * @param string $threeDResult
	 * 
	 * @return void
	 */
	public function setThreeDResult(string $threeDResult): void
	{
		$this->threeDResult = $threeDResult;
	}
	/**
	 * Getter function for threeDResult
	 * 
	 * @return string
	 */
	public function getThreeDResult(): string
	{
		return $this->threeDResult;
	}

	/**
	 * Builder function for signatureStatus
	 * 
	 * @param string $signatureStatus
	 * 
	 * @return Authentication
	 */
	public function signatureStatus(string $signatureStatus): self
	{
		$this->setSignatureStatus($signatureStatus);
		
		return $this;
	}
	/**
	 * Setter function for signatureStatus
	 * 
	 * @param string $signatureStatus
	 * 
	 * @return void
	 */
	public function setSignatureStatus(string $signatureStatus): void
	{
		$this->signatureStatus = $signatureStatus;
	}
	/**
	 * Getter function for signatureStatus
	 * 
	 * @return string
	 */
	public function getSignatureStatus(): string
	{
		return $this->signatureStatus;
	}

	/**
	 * Builder function for exemptionIndicator
	 * 
	 * @param string $exemptionIndicator
	 * 
	 * @return Authentication
	 */
	public function exemptionIndicator(string $exemptionIndicator): self
	{
		$this->setExemptionIndicator($exemptionIndicator);
		
		return $this;
	}
	/**
	 * Setter function for exemptionIndicator
	 * 
	 * @param string $exemptionIndicator
	 * 
	 * @return void
	 */
	public function setExemptionIndicator(string $exemptionIndicator): void
	{
		$this->exemptionIndicator = $exemptionIndicator;
	}
	/**
	 * Getter function for exemptionIndicator
	 * 
	 * @return string
	 */
	public function getExemptionIndicator(): string
	{
		return $this->exemptionIndicator;
	}

	/**
	 * Builder function for error
	 * 
	 * @param Error $error
	 * 
	 * @return Authentication
	 */
	public function error(Error $error): self
	{
		$this->setError($error);
		
		return $this;
	}
	/**
	 * Setter function for error
	 * 
	 * @param Error $error
	 * 
	 * @return void
	 */
	public function setError(Error $error): void
	{
		$this->error = $error;
	}
	/**
	 * Getter function for error
	 * 
	 * @return Error
	 */
	public function getError(): Error
	{
		return $this->error;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class Authentication {" . PHP_EOL .
			"	id: " . $this->toIndentedString($this->id) . PHP_EOL .
			"	eci: " . $this->toIndentedString($this->eci) . PHP_EOL .
			"	cavv: " . $this->toIndentedString($this->cavv) . PHP_EOL .
			"	xid: " . $this->toIndentedString($this->xid) . PHP_EOL .
			"	status: " . $this->toIndentedString($this->status) . PHP_EOL .
			"	merchantRefNum: " . $this->toIndentedString($this->merchantRefNum) . PHP_EOL .
			"	threeDEnrollment: " . $this->toIndentedString($this->threeDEnrollment) . PHP_EOL .
			"	directoryServerTransactionId: " . $this->toIndentedString($this->directoryServerTransactionId) . PHP_EOL .
			"	threeDSecureVersion: " . $this->toIndentedString($this->threeDSecureVersion) . PHP_EOL .
			"	threeDResult: " . $this->toIndentedString($this->threeDResult) . PHP_EOL .
			"	signatureStatus: " . $this->toIndentedString($this->signatureStatus) . PHP_EOL .
			"	exemptionIndicator: " . $this->toIndentedString($this->exemptionIndicator) . PHP_EOL .
			"	error: " . $this->toIndentedString($this->error) . PHP_EOL .
		"}";
	}
}
