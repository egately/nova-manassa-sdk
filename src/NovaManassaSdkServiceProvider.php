<?php

namespace Egately\NovaManassaSdk;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Egately\NovaManassaSdk\Commands\NovaManassaSdkCommand;

class NovaManassaSdkServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('nova-manassa-sdk')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_nova-manassa-sdk_table')
            ->hasRoute('api');


//            ->hasCommand(NovaManassaSdkCommand::class);
    }
}
