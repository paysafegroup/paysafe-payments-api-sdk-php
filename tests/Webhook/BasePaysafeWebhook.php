<?php
// All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE

namespace Webhook;

use PHPUnit\Framework\TestCase;

class BasePaysafeWebhook extends TestCase
{
    /**
     * @param $path
     *
     * @return string
     */
    protected function get_resource_json($path): string
    {
        $full_path = __DIR__ . "/resources/json/" . $path;
        if (file_exists($full_path)) {
            return file_get_contents($full_path);
        }

        return "{}";
    }
}
