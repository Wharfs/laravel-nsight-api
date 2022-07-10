<?php

namespace Wharfs\RmmNsightClient\Commands;

use Illuminate\Console\Command;

class RmmNsightClientCommand extends Command
{
    public $signature = 'laravel-nsight-api';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
