<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Card\Threeds;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Verification\Verification;


/**
 * Authentication details for a payment.
 */
class Authentication extends BaseModel
{
    /**
     * This is the ID of authentication, returned in the response.
     */
    private ?string $id = null;
    /**
     * This is the Electronic Commerce Indicator code, which gets returned by the card issuer indicating whether the cardholder was successfully authenticated. Note that in some cases the eci value includes a leading zero, e.g., 01 or 02. **Visa**   - 5 - Identifies a successfully authenticated transaction.   - 6 - Identifies an attempts authenticated transaction.   - 7 - Identifies a non-authenticated transaction. **Mastercard**   - 2 - Identifies a successfully authenticated transaction.   - 1 - Identifies an attempts authenticated transaction.   - 0 - Identifies a non-authenticated transaction.
     */
    private ?int $eci = null;
    /**
     * This is the Cardholder Authentication Verification Value, which gets returned by the card issuer, indicating that the transaction has been authenticated.
     */
    private ?string $cavv = null;
    /**
     * This is the transaction identifier returned by the card issuer.
     */
    private ?string $xid = null;
    private ?string $status = null;
    /**
     * This is the merchant reference number created by  the merchant and submitted as part of the request. It must be unique for each request.
     */
    private ?string $merchantRefNum = null;
    private ?string $threeDEnrollment = null;
    /**
     * This is the unique directory server transaction ID required for Mastercard. <br>  **Note:** This is field is required when the card brand is Mastercard. This exists only for 3D Secure 2.
     */
    private ?string $directoryServerTransactionId = null;
    /**
     * This is the 3D secure protocol version.
     */
    private ?string $threeDSecureVersion = null;
    private ?string $threeDResult = null;
    private ?string $signatureStatus = null;
    private ?string $exemptionIndicator = null;

    /**
     * Builder function for id
     *
     * @param string $id
     *
     * @return $this
     */
    public function id(?string $id): self
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
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Getter function for id
     *
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * Builder function for eci
     *
     * @param int $eci
     *
     * @return $this
     */
    public function eci(?int $eci): self
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
    public function setEci(?int $eci): void
    {
        $this->eci = $eci;
    }

    /**
     * Getter function for eci
     *
     * @return ?int
     */
    public function getEci(): ?int
    {
        return $this->eci;
    }
    /**
     * Builder function for cavv
     *
     * @param string $cavv
     *
     * @return $this
     */
    public function cavv(?string $cavv): self
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
    public function setCavv(?string $cavv): void
    {
        $this->cavv = $cavv;
    }

    /**
     * Getter function for cavv
     *
     * @return ?string
     */
    public function getCavv(): ?string
    {
        return $this->cavv;
    }
    /**
     * Builder function for xid
     *
     * @param string $xid
     *
     * @return $this
     */
    public function xid(?string $xid): self
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
    public function setXid(?string $xid): void
    {
        $this->xid = $xid;
    }

    /**
     * Getter function for xid
     *
     * @return ?string
     */
    public function getXid(): ?string
    {
        return $this->xid;
    }
    /**
     * Builder function for status
     *
     * @param string $status
     *
     * @return $this
     */
    public function status(?string $status): self
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
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    /**
     * Getter function for status
     *
     * @return ?string
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * Builder function for merchantRefNum
     *
     * @param string $merchantRefNum
     *
     * @return $this
     */
    public function merchantRefNum(?string $merchantRefNum): self
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
    public function setMerchantRefNum(?string $merchantRefNum): void
    {
        $this->merchantRefNum = $merchantRefNum;
    }

    /**
     * Getter function for merchantRefNum
     *
     * @return ?string
     */
    public function getMerchantRefNum(): ?string
    {
        return $this->merchantRefNum;
    }
    /**
     * Builder function for threeDEnrollment
     *
     * @param string $threeDEnrollment
     *
     * @return $this
     */
    public function threeDEnrollment(?string $threeDEnrollment): self
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
    public function setThreeDEnrollment(?string $threeDEnrollment): void
    {
        $this->threeDEnrollment = $threeDEnrollment;
    }

    /**
     * Getter function for threeDEnrollment
     *
     * @return ?string
     */
    public function getThreeDEnrollment(): ?string
    {
        return $this->threeDEnrollment;
    }
    /**
     * Builder function for directoryServerTransactionId
     *
     * @param string $directoryServerTransactionId
     *
     * @return $this
     */
    public function directoryServerTransactionId(?string $directoryServerTransactionId): self
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
    public function setDirectoryServerTransactionId(?string $directoryServerTransactionId): void
    {
        $this->directoryServerTransactionId = $directoryServerTransactionId;
    }

    /**
     * Getter function for directoryServerTransactionId
     *
     * @return ?string
     */
    public function getDirectoryServerTransactionId(): ?string
    {
        return $this->directoryServerTransactionId;
    }
    /**
     * Builder function for threeDSecureVersion
     *
     * @param string $threeDSecureVersion
     *
     * @return $this
     */
    public function threeDSecureVersion(?string $threeDSecureVersion): self
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
    public function setThreeDSecureVersion(?string $threeDSecureVersion): void
    {
        $this->threeDSecureVersion = $threeDSecureVersion;
    }

    /**
     * Getter function for threeDSecureVersion
     *
     * @return ?string
     */
    public function getThreeDSecureVersion(): ?string
    {
        return $this->threeDSecureVersion;
    }
    /**
     * Builder function for threeDResult
     *
     * @param string $threeDResult
     *
     * @return $this
     */
    public function threeDResult(?string $threeDResult): self
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
    public function setThreeDResult(?string $threeDResult): void
    {
        $this->threeDResult = $threeDResult;
    }

    /**
     * Getter function for threeDResult
     *
     * @return ?string
     */
    public function getThreeDResult(): ?string
    {
        return $this->threeDResult;
    }
    /**
     * Builder function for signatureStatus
     *
     * @param string $signatureStatus
     *
     * @return $this
     */
    public function signatureStatus(?string $signatureStatus): self
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
    public function setSignatureStatus(?string $signatureStatus): void
    {
        $this->signatureStatus = $signatureStatus;
    }

    /**
     * Getter function for signatureStatus
     *
     * @return ?string
     */
    public function getSignatureStatus(): ?string
    {
        return $this->signatureStatus;
    }
    /**
     * Builder function for exemptionIndicator
     *
     * @param string $exemptionIndicator
     *
     * @return $this
     */
    public function exemptionIndicator(?string $exemptionIndicator): self
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
    public function setExemptionIndicator(?string $exemptionIndicator): void
    {
        $this->exemptionIndicator = $exemptionIndicator;
    }

    /**
     * Getter function for exemptionIndicator
     *
     * @return ?string
     */
    public function getExemptionIndicator(): ?string
    {
        return $this->exemptionIndicator;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class Authentication {" . PHP_EOL
            . "    id: " . $this->toIndentedString($this->id ?? null) . PHP_EOL
            . "    eci: " . $this->toIndentedString($this->eci ?? null) . PHP_EOL
            . "    cavv: " . $this->toIndentedString($this->cavv ?? null) . PHP_EOL
            . "    xid: " . $this->toIndentedString($this->xid ?? null) . PHP_EOL
            . "    status: " . $this->toIndentedString($this->status ?? null) . PHP_EOL
            . "    merchantRefNum: " . $this->toIndentedString($this->merchantRefNum ?? null) . PHP_EOL
            . "    threeDEnrollment: " . $this->toIndentedString($this->threeDEnrollment ?? null) . PHP_EOL
            . "    directoryServerTransactionId: " . $this->toIndentedString($this->directoryServerTransactionId ?? null) . PHP_EOL
            . "    threeDSecureVersion: " . $this->toIndentedString($this->threeDSecureVersion ?? null) . PHP_EOL
            . "    threeDResult: " . $this->toIndentedString($this->threeDResult ?? null) . PHP_EOL
            . "    signatureStatus: " . $this->toIndentedString($this->signatureStatus ?? null) . PHP_EOL
            . "    exemptionIndicator: " . $this->toIndentedString($this->exemptionIndicator ?? null) . PHP_EOL
            . "}";
    }
}
