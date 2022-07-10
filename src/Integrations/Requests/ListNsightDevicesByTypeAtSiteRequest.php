<?php

namespace Wharfs\RmmNsightClient\Integrations\Requests;

use Illuminate\Support\Collection;
use Sammyjo20\Saloon\Http\SaloonResponse;
use Sammyjo20\Saloon\Traits\Plugins\CastsToDto;
use Wharfs\RmmNsightClient\DataObjects\DeviceAtSite;

class ListNsightDevicesByTypeAtSiteRequest extends BaseListNsightDevicesByTypeAtSiteRequest
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
            foreach ($items->server as $device) {
                $deviceCollection->push((DeviceAtSite::fromSaloon($device)));
            }
            foreach ($items->workstation as $device) {
                $deviceCollection->push((DeviceAtSite::fromSaloon($device)));
            }
            foreach ($items->mobile as $device) {
                $deviceCollection->push((DeviceAtSite::fromSaloon($device)));
            }
        }
        return $deviceCollection;
    }
}
