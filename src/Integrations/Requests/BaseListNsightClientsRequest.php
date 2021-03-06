<?php

namespace Wharfs\RmmNsightClient\Integrations\Requests;

use Sammyjo20\Saloon\Constants\Saloon;
use Sammyjo20\Saloon\Http\SaloonRequest;
use Wharfs\RmmNsightClient\Integrations\Connectors\NsightConnector;

class BaseListNsightClientsRequest extends SaloonRequest
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

    // public function __construct($params = 'other_params')
    // {
    //     $this->params = $params;
    // }

    public function defaultQuery(): array
    {
        return [
            'service' => 'list_clients',
        ];
    }
}
