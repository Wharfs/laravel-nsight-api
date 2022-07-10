<?php

namespace Wharfs\RmmNsightClient\Integrations\Requests;

use Sammyjo20\Saloon\Constants\Saloon;
use Sammyjo20\Saloon\Http\SaloonRequest;
use Wharfs\RmmNsightClient\Integrations\Connectors\NsightConnector;

class BaseListNsightDevicesAtClientRequest extends SaloonRequest
{

    protected string $client_id;
    protected string $device_type;

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

    public function __construct(
        string $client_id = null,
        string $device_type = 'server'
    ) {
        $this->client_id = $client_id;
        $this->device_type = $device_type;
    }

    public function defaultQuery(): array
    {
        return [
            'service' => 'list_devices_at_client',
            'clientid' => $this->client_id,
            'devicetype' => $this->device_type,
        ];
    }
}
