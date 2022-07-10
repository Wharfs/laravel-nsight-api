<?php

namespace Wharfs\RmmNsightClient;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Wharfs\RmmNsightClient\Commands\RmmNsightClientCommand;

class RmmNsightClientServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-nsight-api')
            ->hasConfigFile()
            //->hasViews()
            //->hasMigration('create_laravel-nsight-api_table')
            ->hasCommand(RmmNsightClientCommand::class);
    }
}
