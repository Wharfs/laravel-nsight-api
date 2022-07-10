<?php

namespace Wharfs\RmmNsightClient;

use Wharfs\RmmNsightClient\Integrations\Requests\ListNsightClientsRequest;
use Wharfs\RmmNsightClient\Integrations\Requests\ListNsightDevicesAtClientRequest;
use Wharfs\RmmNsightClient\Integrations\Requests\ListNsightDevicesByTypeAtSiteRequest;
use Wharfs\RmmNsightClient\Integrations\Requests\ListNsightSitesRequest;

class RmmNsightClient
{
    public function getClients()
    {
        $request = new ListNsightClientsRequest();
        //$request->addQuery('devicetype', 'server|workstation|mobile_device');
        $response = $request->send();
        if ($response->failed()) {
            throw $response->toException();
        }
        return $response->dto();
    }

    public function getSites(string $client_id)
    {
        $request = new ListNsightSitesRequest($client_id);
        //$request->addQuery('devicetype', 'server|workstation|mobile_device');
        $response = $request->send();
        if ($response->failed()) {
            throw $response->toException();
        }
        return $response->dto();
    }

    public function getDevicesAtClient(string $client_id, $device_type = 'server')
    {
        $request = new ListNsightDevicesAtClientRequest($client_id, $device_type);
        //$request->mergeQuery('devicetype', 'server|workstation|mobile_device');
        $response = $request->send();
        if ($response->failed()) {
            throw $response->toException();
        }
        return $response->dto();
    }

    public function getDevicesByTypeAtSite(string $site_id, $device_type = 'server')
    {
        $request = new ListNsightDevicesByTypeAtSiteRequest($site_id, $device_type);
        //$request->mergeQuery('devicetype', 'server|workstation|mobile_device');
        $response = $request->send();
        if ($response->failed()) {
            throw $response->toException();
        }
        return $response->dto();
    }
}
