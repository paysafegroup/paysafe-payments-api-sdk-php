<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Service;

use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Client\RequestOptions;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\Verification\Verification;
use Paysafe\PhpSdk\Model\Verification\VerificationList;
use Paysafe\PhpSdk\Model\Verification\VerificationRequest;
use Paysafe\PhpSdk\Service\Interfaces\VerificationServiceInterface;

/**
 * Service for handling verification-related operations.
 */
class VerificationService extends AbstractPaysafeService implements VerificationServiceInterface
{
    /**
     * Endpoint for the verifications API.
     */
    private const VERIFICATION_ENDPOINT = '/v1/verifications';

    /**
     * Instance of PaysafeApiClient used to execute API requests.
     *
     * @var PaysafeApiClient
     */
    private PaysafeApiClient $paysafeApiClient;

    /**
     * VerificationServiceImpl constructor.
     *
     * @param PaysafeApiClient $paysafeApiClient The PaysafeApiClient instance used for API requests.
     */
    public function __construct(PaysafeApiClient $paysafeApiClient)
    {
        $this->paysafeApiClient = $paysafeApiClient;
    }

    /**
     * Retrieves a verification by its ID.
     *
     * @param string $verificationId The ID of the verification to retrieve.
     * @param RequestOptions|null $requestOptions
     * @return Verification The verification details.
     * @throws PaysafeSdkException If an error occurs with the Paysafe API.
     */
    public function getVerificationById(string $verificationId, RequestOptions $requestOptions = null): Verification
    {
        $endpoint = sprintf(self::ENDPOINT_FORMAT, self::VERIFICATION_ENDPOINT, $verificationId);
        $response = $this->paysafeApiClient->executeGet($endpoint, $requestOptions);
        return PaysafeApiClient::processResponse($response, Verification::class);
    }

    /**
     * Retrieves verifications by merchant reference number.
     *
     * @param string|null $merchantRefNum The merchant reference number.
     * @param string|null $endDate The end date in UTC.
     * @param int|null $limit The total number of records to return.
     * @param int|null $offset The starting position, where 0 is the first record.
     * @param string|null $startDate The start date in UTC.
     * @param RequestOptions|null $requestOptions
     * @return VerificationList The list of verifications.
     * @throws PaysafeSdkException If an error occurs with the Paysafe API.
     */
    public function getVerificationByMerchantReferenceNumber(
        ?string $merchantRefNum,
        ?string $endDate = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $startDate = null,
        RequestOptions $requestOptions = null
    ): VerificationList {
        $path = self::VERIFICATION_ENDPOINT .
            $this->paysafeApiClient->buildQueryParameters(
                $merchantRefNum,
                $endDate,
                $limit,
                $offset,
                $startDate
            );

        $response = $this->paysafeApiClient->executeGet($path, $requestOptions);
        return PaysafeApiClient::processResponse($response, VerificationList::class);
    }

    /**
     * Creates a new verification.
     *
     * @param VerificationRequest $verificationRequest The request body for the verification.
     * @param RequestOptions|null $requestOptions
     * @return Verification The created verification details.
     * @throws PaysafeSdkException If an error occurs with the Paysafe API.
     */
    public function createVerification(
        VerificationRequest $verificationRequest,
        RequestOptions $requestOptions = null
    ): Verification
    {
        $jsonRequestBody = $this->paysafeApiClient->buildJsonRequestBody($verificationRequest);
        $response = $this->paysafeApiClient->executePost(
            self::VERIFICATION_ENDPOINT,
            $jsonRequestBody,
            $requestOptions
        );
        return PaysafeApiClient::processResponse($response, Verification::class);
    }
}
