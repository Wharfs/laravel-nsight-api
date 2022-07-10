<?php

namespace Wharfs\RmmNsightClient\Integrations\Requests;

use Sammyjo20\Saloon\Constants\Saloon;
use Sammyjo20\Saloon\Http\SaloonRequest;
use Wharfs\RmmNsightClient\Integrations\Connectors\NsightConnector;

class BaseListNsightSitesRequest extends SaloonRequest
{


    protected string $client_id;

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

    public function __construct($client_id = null)
    {
        $this->client_id = $client_id;
    }

    public function defaultQuery(): array
    {
        return [
            'service' => 'list_sites',
            'clientid' => $this->client_id,
        ];
    }
}
