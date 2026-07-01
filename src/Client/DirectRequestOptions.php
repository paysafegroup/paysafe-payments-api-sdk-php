<?php
/**
 * All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE
 */


declare(strict_types=1);

namespace Paysafe\PhpSdk\Client;

class DirectRequestOptions extends RequestOptions
{
    private array $customHeaders = [];
    private ?RequestOptions $requestOptions = null;

    public function __construct(?array $customHeaders = [])
    {
        parent::__construct();

        if ($customHeaders !== null) {
            $this->setCustomHeaders($customHeaders);
        }
    }

    /**
     * Get customer headers
     *
     * @return array
     */
    public function getCustomHeaders(): array
    {
        return $this->customHeaders;
    }

    /**
     * Set custom headers
     *
     * @param array $customHeaders
     *
     * @return $this
     */
    public function setCustomHeaders(array $customHeaders): self
    {
        $this->customHeaders = $customHeaders;

        return $this;
    }

    /**
     * Add a custom header value pair.
     */
    public function addCustomHeader(string $name, string $value): self
    {
        $this->customHeaders[$name] = $value;

        return $this;
    }

    /**
     * Set additional headers for this direct request.
     *
     * @param array $headers
     */
    public function setAdditionalHeaders(array $headers): self
    {
        return $this->setCustomHeaders($headers);
    }

    /**
     * Get additional headers for this direct request.
     *
     * @return array
     */
    public function getAdditionalHeaders(): array
    {
        return $this->getCustomHeaders();
    }

    public function setRequestOptions(RequestOptions $requestOptions): self
    {
        $this->requestOptions = $requestOptions;

        return $this;
    }

    public function getRequestOptions(): ?RequestOptions
    {
        return $this->requestOptions;
    }
}
