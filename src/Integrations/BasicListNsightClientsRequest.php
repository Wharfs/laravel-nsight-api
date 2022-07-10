<?php

namespace Wharfs\RmmNsightClient\Integrations;

use Sammyjo20\Saloon\Constants\Saloon;
use Sammyjo20\Saloon\Http\SaloonRequest;
use Wharfs\RmmNsightClient\Integrations\NsightConnector;

class BasicListNsightClientsRequest extends SaloonRequest
{

    /**
     * Define the method that the request will use.
     *
     * @var string|null
     */
    protected ?string $method = Saloon::GET;

    /**
     * The connector.
     *
     * @var string|null
     */
    protected ?string $connector = NsightConnector::class;

    public function __construct($service = 'list_clients')
    {
        $this->service = $service;
    }

    public function defaultQuery(): array
    {
        return [
            'service' => $this->service,
        ];
    }
}
