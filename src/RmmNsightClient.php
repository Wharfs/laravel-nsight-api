<?php

namespace Wharfs\RmmNsightClient;

use Wharfs\RmmNsightClient\Integrations\ListNsightClientsRequest;

class RmmNsightClient
{
    public function getClients()
    {

        $request = new ListNsightClientsRequest();
        $response = $request->send();
        if ($response->failed()) {
            throw $response->toException();
        }

        dd($response->dto());


        $xml = $response->xml();
        return $xml;
    }
}
