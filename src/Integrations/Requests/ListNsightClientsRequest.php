<?php

namespace Wharfs\RmmNsightClient\Integrations\Requests;

use Illuminate\Support\Collection;
use Sammyjo20\Saloon\Http\SaloonResponse;
use Sammyjo20\Saloon\Traits\Plugins\CastsToDto;
use Wharfs\RmmNsightClient\DataObjects\Client;

class ListNsightClientsRequest extends BaseListNsightClientsRequest
{
    use CastsToDto;

    /**
     * Convert the xml response to collection of Client objects.
     *
     * @param SaloonResponse $response
     *
     * @return \Illuminate\Support\Collection
     */
    protected function castToDto(SaloonResponse $response): Collection
    {
        $clientCollection = new Collection();
        foreach ($response->xml()->items->client as $client) {
            $clientCollection->push((Client::fromSaloon($client)));
        }

        return $clientCollection;
    }
}
