<?php

namespace Wharfs\RmmNsightClient\Integrations\Connectors;

use Sammyjo20\Saloon\Http\SaloonConnector;

class BaseNsightConnector extends SaloonConnector
{
    /**
     * @var string
     */
    public const BASE_URI = 'https://www.systemmonitor.co.uk/api';

    public function getApiKey(): string
    {
        return $this->apikey;
        //return self::API_KEY;
    }

    public function defaultQuery(): array
    {
        return [
            'apikey' => $this->getApiKey(),
        ];
    }

    public function defineBaseUrl(): string
    {
        return self::BASE_URI;
    }

    public function defaultConfig(): array
    {
        // Guzzle Config Options...

        return [
            'timeout' => 30,
        ];
    }
}
