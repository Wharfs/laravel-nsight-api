<?php

namespace Wharfs\RmmNsightClient\DataObjects;

use SimpleXMLElement;

class Client
{
    public function __construct(
        public int $clientid,
        public string $name,
        public string $server_count,
        public string $workstation_count,
        public string $mobile_device_count,
        public string $device_count,
    ) {
    }

    public static function fromSaloon(SimpleXMLElement $client): static
    {
        return new static(
            clientid: intval($client->clientid),
            name: strval($client->name),
            server_count: strval($client->server_count),
            workstation_count: strval($client->workstation_count),
            mobile_device_count: strval($client->mobile_device_count),
            device_count: strval($client->device_count),
        );
    }

    public function toArray(): array
    {
        return [
            'clientid' => $this->clientid,
            'name' => $this->name,
            'server_count' => $this->server_count,
            'workstation_count' => $this->workstation_count,
            'mobile_device_count' => $this->mobile_device_count,
            'device_count' => $this->device_count,
        ];
    }
}
