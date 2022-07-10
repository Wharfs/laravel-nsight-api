<?php

namespace Wharfs\RmmNsightClient\Integrations\Requests;

use Illuminate\Support\Collection;
use Sammyjo20\Saloon\Http\SaloonResponse;
use Sammyjo20\Saloon\Traits\Plugins\CastsToDto;
use Wharfs\RmmNsightClient\DataObjects\DeviceAtClient;

class ListNsightDevicesAtClientRequest extends BaseListNsightDevicesAtClientRequest
{
    use CastsToDto;

    /**
     * Convert the xml response to collection of Device objects.
     *
     * @param SaloonResponse $response
     *
     * @return \Illuminate\Support\Collection
     */
    protected function castToDto(SaloonResponse $response): Collection
    {
        $deviceCollection = new Collection();
        foreach ($response->xml()->items as $items) {
            foreach ($items->client as $client) {
                foreach ($client->site as $site) {
                    foreach ($site->server as $device) {
                        $deviceCollection->push((DeviceAtClient::fromSaloon($device, $site->id, 'server')));
                    }
                    foreach ($site->workstation as $device) {
                        $deviceCollection->push((DeviceAtClient::fromSaloon($device, $site->id, 'workstation')));
                    }
                    foreach ($site->mobile as $device) {
                        $deviceCollection->push((DeviceAtClient::fromSaloon($device, $site->id, 'mobile')));
                    }
                }
            }
        }

        return $deviceCollection;
    }
}
