<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Common\Error;

use Paysafe\PhpSdk\Model\BaseModel;

class ErrorResponse extends BaseModel
{
    private Error $error;

    public function getError(): Error
    {
        return $this->error;
    }

    public function setError(Error $error): void
    {
        $this->error = $error;
    }


}
