<?php

namespace Wharfs\RmmNsightClient\Integrations;

use Illuminate\Support\Collection;
use Sammyjo20\Saloon\Http\SaloonResponse;
use Wharfs\RmmNsightClient\DataOjects\Client;

class NsightConnector extends BaseNsightConnector
{

    public function __construct()
    {
        $this->apikey = config('nsight-api.config.apikey');
    }
}
