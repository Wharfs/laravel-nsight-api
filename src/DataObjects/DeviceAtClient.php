<?php

namespace Wharfs\RmmNsightClient\DataObjects;

use SimpleXMLElement;

//use Carbon\Carbon;

final class DeviceAtClient
{
    public function __construct(
        public string $device_id,
        public string $name,
        public string $description,
        public string $username,
        //public string $device_client_last_api_update,
    ) {
    }

    public static function fromSaloon(SimpleXMLElement $device): static
    {
        return new static(
            device_id: strval($device->id),
            name: strval($device->name),
            description: strval($device->description),
            username: strval($device->username),
            //device_client_last_api_update: strval(Carbon::now()),
        );
    }

    public function toArray(): array
    {
        return [
            'device_id' => $this->device_id,
            'name' => $this->name,
            'description' => $this->description,
            'username' => $this->username,
            //'device_client_last_api_update' => Carbon::now(),
        ];
    }
}
