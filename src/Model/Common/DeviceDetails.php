<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Common;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * This is part of Interac e-Transfer withdrawal Payment Handle request.
 * It is used by Interac Online for risk assessment.
 */
class DeviceDetails extends BaseModel
{

	private string $deviceId;

	/**
	 * Builder function for deviceId
	 * 
	 * @param string $deviceId
	 * 
	 * @return $this
	 */
	public function deviceId(string $deviceId): self
	{
		$this->setDeviceId($deviceId);
		
		return $this;
	}

	/**
	 * Setter function for deviceId
	 * 
	 * @param string $deviceId
	 * 
	 * @return void
	 */
	public function setDeviceId(string $deviceId): void
	{
		$this->deviceId = $deviceId;
	}

	/**
	 * This is part of Interac e-Transfer withdrawal payment handle request.
	 * 
	 * @return string
	 */
	public function getDeviceId(): string
	{
		return $this->deviceId;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class DeviceDetails {" . PHP_EOL
			. "    deviceId: " . $this->toIndentedString($this->deviceId) . PHP_EOL
			. "}";
	}
}
