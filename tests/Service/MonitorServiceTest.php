<?php
/* All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Service;

use GuzzleHttp\Psr7\Response;
use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Service\MonitorService;

class MonitorServiceTest extends BasePaysafeService
{
    const MONITOR_ENDPOINT = "/paymenthub/v1/monitor";

    private MonitorService $monitorService;

    public function setUp(): void
    {
        parent::setUp();

        $this->monitorService = new MonitorService($this->paysafeApiClient);
    }

     /**
      * @test
      * @covers \Paysafe\PhpSdk\Service\MonitorService::monitor
      *
      * @return void
      */
     public function testMonitor_isSuccessful(): void
     {
         $monitorService = clone $this->monitorService;

         $mockCore = $this->createMock(PaysafeApiClient::class);
         $mockCore->method('executeGet')
             ->willReturn(
                 new Response(
                     200,
                     [
                         'Content-Type' => 'application/json',
                     ],
                     $this->get_resource_json('monitor/verify_that_service_is_accessible_response.json')
                 )
             );
         $replaceService = function() use ($mockCore) {
             $this->paysafeApiClient = $mockCore;
         };
         $doReplaceService = $replaceService->bindTo($monitorService, MonitorService::class);
         $doReplaceService();

         $monitorResponse = $monitorService->monitor();

         $this->assertEquals("READY", $monitorResponse->getStatus());
     }
}
