<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Exception;

use Paysafe\PhpSdk\Exception\Error\PaysafeError;

/**
 * This is the parent class that represents various exceptions that may happen while using the Paysafe SDK.
 */
class PaysafeSdkException extends \Exception
{

    /**
     * @var int|null Http status code returned by Payments API.
     */
    protected $code;

    /**
     * @var string|null Unique ID that can be provided to the Paysafe Support team as a reference for investigation.
     */
    private ?string $internalCorrelationId;

    /**
     * @var PaysafeError|null Represents details of the error.
     */
    private ?PaysafeError $error;

    /**
     * PaysafeSdkException constructor.
     *
     * @param string $message The exception message.
     * @param int|null $code The HTTP status code returned by the Payments API.
     * @param string|null $internalCorrelationId A unique ID for investigation by the Paysafe Support team.
     * @param PaysafeError|null $error The error details.
     */
    public function __construct($message, $code = null, $internalCorrelationId = null, PaysafeError $error = null)
    {
        parent::__construct($message);
        $this->code = $code;
        $this->internalCorrelationId = $internalCorrelationId;
        $this->error = $error;
    }

    /**
     * Gets the error details.
     *
     * @return PaysafeError|null The error details.
     */
    public function getError(): ?PaysafeError
    {
        return $this->error;
    }

    /**
     * Gets the unique correlation ID for the request.
     *
     * @return string|null The unique correlation ID.
     */
    public function getInternalCorrelationId(): ?string
    {
        return $this->internalCorrelationId;
    }

    /**
     * Converts the current object to a string representation.
     *
     * @return string The string representation of the exception.
     */
    public function __toString()
    {
        $className = basename(str_replace('\\', '/', get_class($this)));

        $attributes = [
            "message" => $this->message ?? null,
            "code" => $this->code ?? null,
            "internalCorrelationId" => $this->internalCorrelationId ?? null,
            "error" => $this->error ?? null
        ];

        $properties = [];

        foreach ($attributes as $key => $value) {
            if (!is_null($value)) {
                $properties[] = "$key=" . (is_string($value) ? "'$value'" : $value);
            }
        }

        return $className . "{" . implode(", ", $properties) . "}";
    }
}
