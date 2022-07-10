<?php

namespace Wharfs\RmmNsightClient;

use Wharfs\RmmNsightClient\Integrations\Requests\ListNsightClientsRequest;

class RmmNsightClient
{
    public function getClients()
    {
        $request = new ListNsightClientsRequest();
        $response = $request->send();
        if ($response->failed()) {
            throw $response->toException();
        }

        return $response->dto();
    }
}
