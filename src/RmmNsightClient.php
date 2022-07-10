<?php

namespace Wharfs\RmmNsightClient;

use Wharfs\RmmNsightClient\Integrations\Requests\ListNsightClientsRequest;
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

    public function getSites(String $client_id)
    {
        $request = new ListNsightSitesRequest($client_id);
        $response = $request->send();
        if ($response->failed()) {
            throw $response->toException();
        }
        return $response->dto();
    }



}
