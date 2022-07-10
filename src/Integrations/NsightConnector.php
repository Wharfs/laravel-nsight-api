<?php

namespace Wharfs\RmmNsightClient\Integrations;

class NsightConnector extends BaseNsightConnector
{
    public function __construct()
    {
        $this->apikey = config('nsight-api.config.apikey');
    }
}
