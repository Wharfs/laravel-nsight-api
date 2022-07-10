<?php

namespace Wharfs\RmmNsightClient\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Wharfs\RmmNsightClient\RmmNsightClient
 */
class RmmNsightClient extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-nsight-api';
    }
}
