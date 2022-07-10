<?php

namespace Wharfs\RmmNsightClient\DataObjects;

use SimpleXMLElement;

//use Carbon\Carbon;

final class Client
{
    public function __construct(
        public string $client_id,
        public string $name,
        public int $server_count,
        public int $workstation_count,
        public int $mobile_device_count,
        public int $device_count,
        //public string $last_api_update,
    ) {
    }

    public static function fromSaloon(SimpleXMLElement $client): static
    {
        return new static(
            client_id: strval($client->clientid),
            name: strval($client->name),
            server_count: intval($client->server_count),
            workstation_count: intval($client->workstation_count),
            mobile_device_count: intval($client->mobile_device_count),
            device_count: intval($client->device_count),
            //last_api_update: strval(Carbon::now()),
        );
    }

    public function toArray(): array
    {
        return [
            'client_id' => $this->client_id,
            'name' => $this->name,
            'server_count' => $this->server_count,
            'workstation_count' => $this->workstation_count,
            'mobile_device_count' => $this->mobile_device_count,
            'device_count' => $this->device_count,
            //'last_api_update' => Carbon::now(),
        ];
    }
}
