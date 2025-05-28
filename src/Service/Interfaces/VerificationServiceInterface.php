<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Service\Interfaces;

use Paysafe\PhpSdk\Client\RequestOptions;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\Verification\VerificationRequest;
use Paysafe\PhpSdk\Model\Verification\Verification;
use Paysafe\PhpSdk\Model\Verification\VerificationList;

/**
 * Interface for interacting with the Verification Service in the Paysafe API.
 */
interface VerificationServiceInterface
{
    /**
     * Gets the details of a verification for a specific payment type by its unique ID.
     *
     * @param string $verificationId The ID of the verification.
     * @param RequestOptions|null $requestOptions
     * @return Verification Containing the verification details for a specific payment type.
     * @throws PaysafeSdkException If an error occurs with the Paysafe API.
     */
    public function getVerificationById(string $verificationId, RequestOptions $requestOptions = null): Verification;

    /**
     * Gets the details of a verification for a specific payment type by merchant reference number.
     *
     * @param string $merchantRefNum The merchant reference number used in the verification request.
     * @param string|null $endDate The end date in UTC. Default = current date and time.
     * @param int|null $limit The total number of records to return.
     * @param int|null $offset The starting position, where 0 is the first record.
     * @param string|null $startDate The start date in UTC. Default = 30 days before the end date.
     * @param RequestOptions|null $requestOptions
     * @return VerificationList A list of verification details.
     * @throws PaysafeSdkException If an error occurs with the Paysafe API.
     */
    public function getVerificationByMerchantReferenceNumber(
        string $merchantRefNum,
        ?string $endDate,
        ?int $limit,
        ?int $offset,
        ?string $startDate,
        RequestOptions $requestOptions = null
    ): VerificationList;

    /**
     * Verification allows merchants to validate a credit card without charging any amount on the card.
     *
     * @param VerificationRequest $verificationRequest The request body for creating a verification.
     * @param RequestOptions|null $requestOptions
     * @return Verification The details of a verification for a specific payment type.
     * @throws PaysafeSdkException If an error occurs with the Paysafe API.
     */
    public function createVerification(
        VerificationRequest $verificationRequest,
        RequestOptions $requestOptions = null
    ): Verification;
}
