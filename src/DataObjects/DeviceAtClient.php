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
        public string $site_id,
        public string $device_type,
        //public string $device_client_last_api_update,
    ) {
    }

    public static function fromSaloon(SimpleXMLElement $device, string $site_id, string $device_type): static
    {
        return new static(
            device_id: strval($device->id),
            name: strval($device->name),
            description: strval($device->description),
            username: strval($device->username),
            site_id: intval($site_id),
            device_type: strval($device_type),
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
            'site_id' => $this->site_id,
            'device_type' => $this->device_type,
            //'device_client_last_api_update' => Carbon::now(),
        ];
    }
}
