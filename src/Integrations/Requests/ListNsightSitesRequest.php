<?php

namespace Wharfs\RmmNsightClient\Integrations\Requests;

use Illuminate\Support\Collection;
use Sammyjo20\Saloon\Http\SaloonResponse;
use Sammyjo20\Saloon\Traits\Plugins\CastsToDto;
use Wharfs\RmmNsightClient\DataObjects\Site;

class ListNsightSitesRequest extends BaseListNsightSitesRequest
{
    use CastsToDto;

    /**
     * Convert the xml response to collection of Site objects.
     *
     * @param SaloonResponse $response
     *
     * @return \Illuminate\Support\Collection
     */
    protected function castToDto(SaloonResponse $response): Collection
    {
        $siteCollection = new Collection();
        foreach ($response->xml()->items->site as $site) {
            $siteCollection->push((Site::fromSaloon($site)));
        }

        return $siteCollection;
    }
}
