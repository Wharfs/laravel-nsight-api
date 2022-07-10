<?php

namespace Wharfs\RmmNsightClient\Integrations\Requests;

use Sammyjo20\Saloon\Constants\Saloon;
use Sammyjo20\Saloon\Http\SaloonRequest;
use Wharfs\RmmNsightClient\Integrations\Connectors\NsightConnector;

class BaseListNsightDevicesByTypeAtSiteRequest extends SaloonRequest
{

    protected string $site_id;
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
        string $site_id = null,
        string $device_type = 'server'
    ) {
        $this->site_id = $site_id;
        $this->device_type = $device_type;
    }

    public function defaultQuery(): array
    {
        return [
            'service' => 'list_servers',
            'siteid' => $this->site_id,
            'devicetype' => $this->device_type,
        ];
    }
}
