<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Monitor;

use Paysafe\PhpSdk\Model\BaseModel;

class MonitorResponse extends BaseModel
{
    private string $status;

    /**
     * @param string $status
     *
     * @return $this
     */
    public function status(string $status): self
    {
        $this->setStatus($status);

        return $this;
    }

    /**
     * @param string $status
     *
     * @return $this
     */
    public function setStatus(string $status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * This is the status of the service. Expected value: READY
     *
     * @return string|null
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    public function __toString()
    {
        return "class MonitorResponse {\n"
            . "    status: " . $this->toIndentedString($this->status) . "\n"
            . "}";
    }
}
