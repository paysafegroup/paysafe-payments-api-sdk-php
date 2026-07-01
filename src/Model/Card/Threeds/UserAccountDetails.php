<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Card\Threeds;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * User account details from the merchant website for 3DS authentication
 */
class UserAccountDetails extends BaseModel
{
    /**
     * Number of attempts to add a card in the last 24 hours
     */
    private ?int $addCardAttemptsForLastDay = null;
    /**
     * This is the date that the cardholder’s account with the 3DS Requestor was last changed. The ISO 8601 date format is expected, i.e., YYYY-MM-DD.
     */
    private ?string $changedDate = null;
    private ?string $changedRange = null;
    /**
     * This is the date when the cardholder opened the account with the 3DS Requestor. The ISO 8601 date format is expected, i.e., YYYY-MM-DD
     */
    private ?string $createdDate = null;
    private ?string $createdRange = null;
    /**
     * This is the date when the cardholder’s account was reset or the password was changed. The ISO 8601 date format is expected, i.e., YYYY-MM-DD.
     */
    private ?string $passwordChangedDate = null;
    private ?string $passwordChangedRange = null;
    /**
     * Whether the 3DS Requestor has experienced suspicious activity on the cardholder account
     */
    private ?bool $suspiciousAccountActivity = null;
    /**
     * Transaction count for last 6 months
     */
    private ?int $totalPurchasesSixMonthCount = null;
    /**
     * Number of transactions in the previous day
     */
    private ?int $transactionCountForPreviousDay = null;
    /**
     * Number of transactions in the previous year
     */
    private ?int $transactionCountForPreviousYear = null;
    private ?ShippingDetailsUsage $shippingDetailsUsage = null;
    private ?UserLogin $userLogin = null;
    private ?PaymentAccountDetails $paymentAccountDetails = null;
    private ?PriorThreedsAuthentication $priorThreeDSAuthentication = null;
    private ?TravelDetails $travelDetails = null;

    /**
     * Builder function for addCardAttemptsForLastDay
     *
     * @param int $addCardAttemptsForLastDay
     *
     * @return $this
     */
    public function addCardAttemptsForLastDay(?int $addCardAttemptsForLastDay): self
    {
        $this->setAddCardAttemptsForLastDay($addCardAttemptsForLastDay);

        return $this;
    }

    /**
     * Setter function for addCardAttemptsForLastDay
     *
     * @param int $addCardAttemptsForLastDay
     *
     * @return void
     */
    public function setAddCardAttemptsForLastDay(?int $addCardAttemptsForLastDay): void
    {
        $this->addCardAttemptsForLastDay = $addCardAttemptsForLastDay;
    }

    /**
     * Getter function for addCardAttemptsForLastDay
     *
     * @return ?int
     */
    public function getAddCardAttemptsForLastDay(): ?int
    {
        return $this->addCardAttemptsForLastDay;
    }
    /**
     * Builder function for changedDate
     *
     * @param string $changedDate
     *
     * @return $this
     */
    public function changedDate(?string $changedDate): self
    {
        $this->setChangedDate($changedDate);

        return $this;
    }

    /**
     * Setter function for changedDate
     *
     * @param string $changedDate
     *
     * @return void
     */
    public function setChangedDate(?string $changedDate): void
    {
        $this->changedDate = $changedDate;
    }

    /**
     * Getter function for changedDate
     *
     * @return ?string
     */
    public function getChangedDate(): ?string
    {
        return $this->changedDate;
    }
    /**
     * Builder function for changedRange
     *
     * @param string $changedRange
     *
     * @return $this
     */
    public function changedRange(?string $changedRange): self
    {
        $this->setChangedRange($changedRange);

        return $this;
    }

    /**
     * Setter function for changedRange
     *
     * @param string $changedRange
     *
     * @return void
     */
    public function setChangedRange(?string $changedRange): void
    {
        $this->changedRange = $changedRange;
    }

    /**
     * Getter function for changedRange
     *
     * @return ?string
     */
    public function getChangedRange(): ?string
    {
        return $this->changedRange;
    }
    /**
     * Builder function for createdDate
     *
     * @param string $createdDate
     *
     * @return $this
     */
    public function createdDate(?string $createdDate): self
    {
        $this->setCreatedDate($createdDate);

        return $this;
    }

    /**
     * Setter function for createdDate
     *
     * @param string $createdDate
     *
     * @return void
     */
    public function setCreatedDate(?string $createdDate): void
    {
        $this->createdDate = $createdDate;
    }

    /**
     * Getter function for createdDate
     *
     * @return ?string
     */
    public function getCreatedDate(): ?string
    {
        return $this->createdDate;
    }
    /**
     * Builder function for createdRange
     *
     * @param string $createdRange
     *
     * @return $this
     */
    public function createdRange(?string $createdRange): self
    {
        $this->setCreatedRange($createdRange);

        return $this;
    }

    /**
     * Setter function for createdRange
     *
     * @param string $createdRange
     *
     * @return void
     */
    public function setCreatedRange(?string $createdRange): void
    {
        $this->createdRange = $createdRange;
    }

    /**
     * Getter function for createdRange
     *
     * @return ?string
     */
    public function getCreatedRange(): ?string
    {
        return $this->createdRange;
    }
    /**
     * Builder function for passwordChangedDate
     *
     * @param string $passwordChangedDate
     *
     * @return $this
     */
    public function passwordChangedDate(?string $passwordChangedDate): self
    {
        $this->setPasswordChangedDate($passwordChangedDate);

        return $this;
    }

    /**
     * Setter function for passwordChangedDate
     *
     * @param string $passwordChangedDate
     *
     * @return void
     */
    public function setPasswordChangedDate(?string $passwordChangedDate): void
    {
        $this->passwordChangedDate = $passwordChangedDate;
    }

    /**
     * Getter function for passwordChangedDate
     *
     * @return ?string
     */
    public function getPasswordChangedDate(): ?string
    {
        return $this->passwordChangedDate;
    }
    /**
     * Builder function for passwordChangedRange
     *
     * @param string $passwordChangedRange
     *
     * @return $this
     */
    public function passwordChangedRange(?string $passwordChangedRange): self
    {
        $this->setPasswordChangedRange($passwordChangedRange);

        return $this;
    }

    /**
     * Setter function for passwordChangedRange
     *
     * @param string $passwordChangedRange
     *
     * @return void
     */
    public function setPasswordChangedRange(?string $passwordChangedRange): void
    {
        $this->passwordChangedRange = $passwordChangedRange;
    }

    /**
     * Getter function for passwordChangedRange
     *
     * @return ?string
     */
    public function getPasswordChangedRange(): ?string
    {
        return $this->passwordChangedRange;
    }
    /**
     * Builder function for suspiciousAccountActivity
     *
     * @param bool $suspiciousAccountActivity
     *
     * @return $this
     */
    public function suspiciousAccountActivity(?bool $suspiciousAccountActivity): self
    {
        $this->setSuspiciousAccountActivity($suspiciousAccountActivity);

        return $this;
    }

    /**
     * Setter function for suspiciousAccountActivity
     *
     * @param bool $suspiciousAccountActivity
     *
     * @return void
     */
    public function setSuspiciousAccountActivity(?bool $suspiciousAccountActivity): void
    {
        $this->suspiciousAccountActivity = $suspiciousAccountActivity;
    }

    /**
     * Getter function for suspiciousAccountActivity
     *
     * @return ?bool
     */
    public function getSuspiciousAccountActivity(): ?bool
    {
        return $this->suspiciousAccountActivity;
    }
    /**
     * Builder function for totalPurchasesSixMonthCount
     *
     * @param int $totalPurchasesSixMonthCount
     *
     * @return $this
     */
    public function totalPurchasesSixMonthCount(?int $totalPurchasesSixMonthCount): self
    {
        $this->setTotalPurchasesSixMonthCount($totalPurchasesSixMonthCount);

        return $this;
    }

    /**
     * Setter function for totalPurchasesSixMonthCount
     *
     * @param int $totalPurchasesSixMonthCount
     *
     * @return void
     */
    public function setTotalPurchasesSixMonthCount(?int $totalPurchasesSixMonthCount): void
    {
        $this->totalPurchasesSixMonthCount = $totalPurchasesSixMonthCount;
    }

    /**
     * Getter function for totalPurchasesSixMonthCount
     *
     * @return ?int
     */
    public function getTotalPurchasesSixMonthCount(): ?int
    {
        return $this->totalPurchasesSixMonthCount;
    }
    /**
     * Builder function for transactionCountForPreviousDay
     *
     * @param int $transactionCountForPreviousDay
     *
     * @return $this
     */
    public function transactionCountForPreviousDay(?int $transactionCountForPreviousDay): self
    {
        $this->setTransactionCountForPreviousDay($transactionCountForPreviousDay);

        return $this;
    }

    /**
     * Setter function for transactionCountForPreviousDay
     *
     * @param int $transactionCountForPreviousDay
     *
     * @return void
     */
    public function setTransactionCountForPreviousDay(?int $transactionCountForPreviousDay): void
    {
        $this->transactionCountForPreviousDay = $transactionCountForPreviousDay;
    }

    /**
     * Getter function for transactionCountForPreviousDay
     *
     * @return ?int
     */
    public function getTransactionCountForPreviousDay(): ?int
    {
        return $this->transactionCountForPreviousDay;
    }
    /**
     * Builder function for transactionCountForPreviousYear
     *
     * @param int $transactionCountForPreviousYear
     *
     * @return $this
     */
    public function transactionCountForPreviousYear(?int $transactionCountForPreviousYear): self
    {
        $this->setTransactionCountForPreviousYear($transactionCountForPreviousYear);

        return $this;
    }

    /**
     * Setter function for transactionCountForPreviousYear
     *
     * @param int $transactionCountForPreviousYear
     *
     * @return void
     */
    public function setTransactionCountForPreviousYear(?int $transactionCountForPreviousYear): void
    {
        $this->transactionCountForPreviousYear = $transactionCountForPreviousYear;
    }

    /**
     * Getter function for transactionCountForPreviousYear
     *
     * @return ?int
     */
    public function getTransactionCountForPreviousYear(): ?int
    {
        return $this->transactionCountForPreviousYear;
    }
    /**
     * Builder function for shippingDetailsUsage
     *
     * @param ShippingDetailsUsage $shippingDetailsUsage
     *
     * @return $this
     */
    public function shippingDetailsUsage(?ShippingDetailsUsage $shippingDetailsUsage): self
    {
        $this->setShippingDetailsUsage($shippingDetailsUsage);

        return $this;
    }

    /**
     * Setter function for shippingDetailsUsage
     *
     * @param ShippingDetailsUsage $shippingDetailsUsage
     *
     * @return void
     */
    public function setShippingDetailsUsage(?ShippingDetailsUsage $shippingDetailsUsage): void
    {
        $this->shippingDetailsUsage = $shippingDetailsUsage;
    }

    /**
     * Getter function for shippingDetailsUsage
     *
     * @return ?ShippingDetailsUsage
     */
    public function getShippingDetailsUsage(): ?ShippingDetailsUsage
    {
        return $this->shippingDetailsUsage;
    }
    /**
     * Builder function for userLogin
     *
     * @param UserLogin $userLogin
     *
     * @return $this
     */
    public function userLogin(?UserLogin $userLogin): self
    {
        $this->setUserLogin($userLogin);

        return $this;
    }

    /**
     * Setter function for userLogin
     *
     * @param UserLogin $userLogin
     *
     * @return void
     */
    public function setUserLogin(?UserLogin $userLogin): void
    {
        $this->userLogin = $userLogin;
    }

    /**
     * Getter function for userLogin
     *
     * @return ?UserLogin
     */
    public function getUserLogin(): ?UserLogin
    {
        return $this->userLogin;
    }
    /**
     * Builder function for paymentAccountDetails
     *
     * @param PaymentAccountDetails $paymentAccountDetails
     *
     * @return $this
     */
    public function paymentAccountDetails(?PaymentAccountDetails $paymentAccountDetails): self
    {
        $this->setPaymentAccountDetails($paymentAccountDetails);

        return $this;
    }

    /**
     * Setter function for paymentAccountDetails
     *
     * @param PaymentAccountDetails $paymentAccountDetails
     *
     * @return void
     */
    public function setPaymentAccountDetails(?PaymentAccountDetails $paymentAccountDetails): void
    {
        $this->paymentAccountDetails = $paymentAccountDetails;
    }

    /**
     * Getter function for paymentAccountDetails
     *
     * @return ?PaymentAccountDetails
     */
    public function getPaymentAccountDetails(): ?PaymentAccountDetails
    {
        return $this->paymentAccountDetails;
    }
    /**
     * Builder function for priorThreeDSAuthentication
     *
     * @param PriorThreedsAuthentication $priorThreeDSAuthentication
     *
     * @return $this
     */
    public function priorThreeDSAuthentication(?PriorThreedsAuthentication $priorThreeDSAuthentication): self
    {
        $this->setPriorThreeDSAuthentication($priorThreeDSAuthentication);

        return $this;
    }

    /**
     * Setter function for priorThreeDSAuthentication
     *
     * @param PriorThreedsAuthentication $priorThreeDSAuthentication
     *
     * @return void
     */
    public function setPriorThreeDSAuthentication(?PriorThreedsAuthentication $priorThreeDSAuthentication): void
    {
        $this->priorThreeDSAuthentication = $priorThreeDSAuthentication;
    }

    /**
     * Getter function for priorThreeDSAuthentication
     *
     * @return ?PriorThreedsAuthentication
     */
    public function getPriorThreeDSAuthentication(): ?PriorThreedsAuthentication
    {
        return $this->priorThreeDSAuthentication;
    }
    /**
     * Builder function for travelDetails
     *
     * @param TravelDetails $travelDetails
     *
     * @return $this
     */
    public function travelDetails(?TravelDetails $travelDetails): self
    {
        $this->setTravelDetails($travelDetails);

        return $this;
    }

    /**
     * Setter function for travelDetails
     *
     * @param TravelDetails $travelDetails
     *
     * @return void
     */
    public function setTravelDetails(?TravelDetails $travelDetails): void
    {
        $this->travelDetails = $travelDetails;
    }

    /**
     * Getter function for travelDetails
     *
     * @return ?TravelDetails
     */
    public function getTravelDetails(): ?TravelDetails
    {
        return $this->travelDetails;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class UserAccountDetails {" . PHP_EOL
            . "    addCardAttemptsForLastDay: " . $this->toIndentedString($this->addCardAttemptsForLastDay ?? null) . PHP_EOL
            . "    changedDate: " . $this->toIndentedString($this->changedDate ?? null) . PHP_EOL
            . "    changedRange: " . $this->toIndentedString($this->changedRange ?? null) . PHP_EOL
            . "    createdDate: " . $this->toIndentedString($this->createdDate ?? null) . PHP_EOL
            . "    createdRange: " . $this->toIndentedString($this->createdRange ?? null) . PHP_EOL
            . "    passwordChangedDate: " . $this->toIndentedString($this->passwordChangedDate ?? null) . PHP_EOL
            . "    passwordChangedRange: " . $this->toIndentedString($this->passwordChangedRange ?? null) . PHP_EOL
            . "    suspiciousAccountActivity: " . $this->toIndentedString($this->suspiciousAccountActivity ?? null) . PHP_EOL
            . "    totalPurchasesSixMonthCount: " . $this->toIndentedString($this->totalPurchasesSixMonthCount ?? null) . PHP_EOL
            . "    transactionCountForPreviousDay: " . $this->toIndentedString($this->transactionCountForPreviousDay ?? null) . PHP_EOL
            . "    transactionCountForPreviousYear: " . $this->toIndentedString($this->transactionCountForPreviousYear ?? null) . PHP_EOL
            . "    shippingDetailsUsage: " . $this->toIndentedString($this->shippingDetailsUsage ?? null) . PHP_EOL
            . "    userLogin: " . $this->toIndentedString($this->userLogin ?? null) . PHP_EOL
            . "    paymentAccountDetails: " . $this->toIndentedString($this->paymentAccountDetails ?? null) . PHP_EOL
            . "    priorThreeDSAuthentication: " . $this->toIndentedString($this->priorThreeDSAuthentication ?? null) . PHP_EOL
            . "    travelDetails: " . $this->toIndentedString($this->travelDetails ?? null) . PHP_EOL
            . "}";
    }
}
