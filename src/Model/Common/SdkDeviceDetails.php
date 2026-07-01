<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * Details of the device used for the transaction.
 */
class SdkDeviceDetails extends BaseModel
{
    /**
     * The SDK transaction reference
     */
    private ?string $sdkTransReference = null;
    /**
     * The version of the SDK being used
     */
    private ?string $sdkVersion = null;
    /**
     * The SDK reference number
     */
    private ?string $sdkReferenceNumber = null;
    /**
     * The identifier for the application making the request
     */
    private ?string $applicationId = null;
    /**
     * The IP address of the device
     */
    private ?string $deviceIp = null;
    /**
     * The fingerprint of the device
     */
    private ?string $deviceFingerprint = null;
    /**
     * The location of the device
     */
    private ?string $deviceLocation = null;

    /**
     * Builder function for sdkTransReference
     *
     * @param string $sdkTransReference
     *
     * @return $this
     */
    public function sdkTransReference(?string $sdkTransReference): self
    {
        $this->setSdkTransReference($sdkTransReference);

        return $this;
    }

    /**
     * Setter function for sdkTransReference
     *
     * @param string $sdkTransReference
     *
     * @return void
     */
    public function setSdkTransReference(?string $sdkTransReference): void
    {
        $this->sdkTransReference = $sdkTransReference;
    }

    /**
     * Getter function for sdkTransReference
     *
     * @return ?string
     */
    public function getSdkTransReference(): ?string
    {
        return $this->sdkTransReference;
    }
    /**
     * Builder function for sdkVersion
     *
     * @param string $sdkVersion
     *
     * @return $this
     */
    public function sdkVersion(?string $sdkVersion): self
    {
        $this->setSdkVersion($sdkVersion);

        return $this;
    }

    /**
     * Setter function for sdkVersion
     *
     * @param string $sdkVersion
     *
     * @return void
     */
    public function setSdkVersion(?string $sdkVersion): void
    {
        $this->sdkVersion = $sdkVersion;
    }

    /**
     * Getter function for sdkVersion
     *
     * @return ?string
     */
    public function getSdkVersion(): ?string
    {
        return $this->sdkVersion;
    }
    /**
     * Builder function for sdkReferenceNumber
     *
     * @param string $sdkReferenceNumber
     *
     * @return $this
     */
    public function sdkReferenceNumber(?string $sdkReferenceNumber): self
    {
        $this->setSdkReferenceNumber($sdkReferenceNumber);

        return $this;
    }

    /**
     * Setter function for sdkReferenceNumber
     *
     * @param string $sdkReferenceNumber
     *
     * @return void
     */
    public function setSdkReferenceNumber(?string $sdkReferenceNumber): void
    {
        $this->sdkReferenceNumber = $sdkReferenceNumber;
    }

    /**
     * Getter function for sdkReferenceNumber
     *
     * @return ?string
     */
    public function getSdkReferenceNumber(): ?string
    {
        return $this->sdkReferenceNumber;
    }
    /**
     * Builder function for applicationId
     *
     * @param string $applicationId
     *
     * @return $this
     */
    public function applicationId(?string $applicationId): self
    {
        $this->setApplicationId($applicationId);

        return $this;
    }

    /**
     * Setter function for applicationId
     *
     * @param string $applicationId
     *
     * @return void
     */
    public function setApplicationId(?string $applicationId): void
    {
        $this->applicationId = $applicationId;
    }

    /**
     * Getter function for applicationId
     *
     * @return ?string
     */
    public function getApplicationId(): ?string
    {
        return $this->applicationId;
    }
    /**
     * Builder function for deviceIp
     *
     * @param string $deviceIp
     *
     * @return $this
     */
    public function deviceIp(?string $deviceIp): self
    {
        $this->setDeviceIp($deviceIp);

        return $this;
    }

    /**
     * Setter function for deviceIp
     *
     * @param string $deviceIp
     *
     * @return void
     */
    public function setDeviceIp(?string $deviceIp): void
    {
        $this->deviceIp = $deviceIp;
    }

    /**
     * Getter function for deviceIp
     *
     * @return ?string
     */
    public function getDeviceIp(): ?string
    {
        return $this->deviceIp;
    }
    /**
     * Builder function for deviceFingerprint
     *
     * @param string $deviceFingerprint
     *
     * @return $this
     */
    public function deviceFingerprint(?string $deviceFingerprint): self
    {
        $this->setDeviceFingerprint($deviceFingerprint);

        return $this;
    }

    /**
     * Setter function for deviceFingerprint
     *
     * @param string $deviceFingerprint
     *
     * @return void
     */
    public function setDeviceFingerprint(?string $deviceFingerprint): void
    {
        $this->deviceFingerprint = $deviceFingerprint;
    }

    /**
     * Getter function for deviceFingerprint
     *
     * @return ?string
     */
    public function getDeviceFingerprint(): ?string
    {
        return $this->deviceFingerprint;
    }
    /**
     * Builder function for deviceLocation
     *
     * @param string $deviceLocation
     *
     * @return $this
     */
    public function deviceLocation(?string $deviceLocation): self
    {
        $this->setDeviceLocation($deviceLocation);

        return $this;
    }

    /**
     * Setter function for deviceLocation
     *
     * @param string $deviceLocation
     *
     * @return void
     */
    public function setDeviceLocation(?string $deviceLocation): void
    {
        $this->deviceLocation = $deviceLocation;
    }

    /**
     * Getter function for deviceLocation
     *
     * @return ?string
     */
    public function getDeviceLocation(): ?string
    {
        return $this->deviceLocation;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class SdkDeviceDetails {" . PHP_EOL
            . "    sdkTransReference: " . $this->toIndentedString($this->sdkTransReference ?? null) . PHP_EOL
            . "    sdkVersion: " . $this->toIndentedString($this->sdkVersion ?? null) . PHP_EOL
            . "    sdkReferenceNumber: " . $this->toIndentedString($this->sdkReferenceNumber ?? null) . PHP_EOL
            . "    applicationId: " . $this->toIndentedString($this->applicationId ?? null) . PHP_EOL
            . "    deviceIp: " . $this->toIndentedString($this->deviceIp ?? null) . PHP_EOL
            . "    deviceFingerprint: " . $this->toIndentedString($this->deviceFingerprint ?? null) . PHP_EOL
            . "    deviceLocation: " . $this->toIndentedString($this->deviceLocation ?? null) . PHP_EOL
            . "}";
    }
}
