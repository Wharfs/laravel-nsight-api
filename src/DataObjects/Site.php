<?php

namespace Wharfs\RmmNsightClient\DataObjects;

use SimpleXMLElement;
//use Carbon\Carbon;

class Site
{
    public function __construct(
        public string $site_id,
        public string $name,
        public int $connection_ok,
        public string $creation_date,
        public string $primary_router,
        public string $secondary_router,
        //public string $last_api_update,
    ) {
    }

    public static function fromSaloon(SimpleXMLElement $client): static
    {
        return new static(
            site_id: strval($client->siteid),
            name: strval($client->name),
            connection_ok: intval($client->connection_ok),
            creation_date: strval($client->creation_date),
            primary_router: strval($client->primary_router),
            secondary_router: strval($client->secondary_router),
            //last_api_update: strval(Carbon::now()),
        );
    }

    public function toArray(): array
    {
        return [
            'site_id' => $this->siteid,
            'name' => $this->name,
            'connection_ok' => $this->connection_ok,
            'creation_date' => $this->creation_date,
            'primary_router' => $this->primary_router,
            'secondary_router' => $this->secondary_router,
            //'last_api_update' => Carbon::now(),
        ];
    }
}
