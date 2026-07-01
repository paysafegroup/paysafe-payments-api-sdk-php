<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Card;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Common\Profile\Profile;


/**
 * The fundingTransaction object is used to identify authorization requests that are categorized as funding transactions by the merchant in order to provide additional information for the purpose of a transaction. It can be used by merchants registered with MCC 4722, 4829, 6012, 6051, 6211, 6540, 7800, 7801, 7802, 7994, 7995 or 9406. The relevant value will be assigned automatically by the Payments API as per the merchant registration with card schemes and his applicable MCC.  **Funding Transaction Type Mappings:**  | Funding Transaction Type | Visa | Mastercard | |--------------------------|------|------------| | SVDW_FUNDS_TRANSFER | Applicable for 4722, 4829, 6012, 6051, 6211 and 6540 | Applicable for 4829, 6540, 6051, 6211, 7800, 7801, 7802, 7994, 7995, 9406 | | SDW_WALLET_TRANSFER | Applicable for 4829, 6012 and 6051 | Applicable for 6540, 6051, 6211, 7800, 7801, 7802, 7994, 7995, 9406 | | ACCOUNT_TO_ACCOUNT | Applicable for 4829, 6012 and 6211 | Not applicable | | PERSON_TO_PERSON | Applicable for 4829 and 6012 | Applicable for 6540, 4829 |  **Notes:**  - The transactionIntent property is used to identify the intent of the authorization requests. This field is mandatory for Visa card - cross-border fundingTransactions where the recipient is from any of the following countries: India, Bangladesh, Argentina, and Egypt.  - If you want to support Visa AFT and Mastercard Funding, you should perform registration with the Card schemes in advance. Please contact Paysafe's operational support or your account manager in order to receive more information and to begin with the registration process. Please note also that not every processor supports funding transactions for all MCCs listed here.  - If you send fundingTransaction type value in the authorization request, you must also send profile and billingDetails, as described below: Profile: firstName, lastName, merchantCustomerId; Billing Details: street, city, state (If US or Canada), country, zip. If not, the funding transaction will be declined due to missing data.  - If you send fundingTransaction type value in the authorization request, but your acquirer doesn't support funding transactions, or your account is not configured (you have not performed the registration process), the transaction will be declined with error: 5040.  - If you send fundingTransaction type in the authorization request with a value not applicable for your MCC, the transaction will be declined with error: 3068.  - If you send fundingTransaction type in the authorization request with a value applicable for your MCC, but not for your VISA direct configuration, the transaction will be declined with error 3069.  - If you send fundingTransaction type in the authorization request with a value not part of the list, the transaction will be declined with error: 5068.  - If you send fundingTransaction type value in the authorization request and your account is configured to process funding transactions, but you are not registered to process funding transactions to a specific card brand, the transaction will be successfully processed and processorAppliedType in the response will be 'NOT_APPLIED'.  - Suppose you send fundingTransaction type value in the authorization request, and your account is configured to process funding transactions. You are registered to process funding transactions to the respective card brand. In that case, the transaction will be successfully processed, and the processorAppliedType will be equal to the fundingTransaction type provided in the request.
 */
class FundingTransaction extends BaseModel
{
    private ?string $type = null;
    private ?string $processorAppliedType = null;

    /**
     * Builder function for type
     *
     * @param string $type
     *
     * @return $this
     */
    public function type(?string $type): self
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
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    /**
     * Getter function for type
     *
     * @return ?string
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * Builder function for processorAppliedType
     *
     * @param string $processorAppliedType
     *
     * @return $this
     */
    public function processorAppliedType(?string $processorAppliedType): self
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
    public function setProcessorAppliedType(?string $processorAppliedType): void
    {
        $this->processorAppliedType = $processorAppliedType;
    }

    /**
     * Getter function for processorAppliedType
     *
     * @return ?string
     */
    public function getProcessorAppliedType(): ?string
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
        return "class FundingTransaction {" . PHP_EOL
            . "    type: " . $this->toIndentedString($this->type ?? null) . PHP_EOL
            . "    processorAppliedType: " . $this->toIndentedString($this->processorAppliedType ?? null) . PHP_EOL
            . "}";
    }
}
