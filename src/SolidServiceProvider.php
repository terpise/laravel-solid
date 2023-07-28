<?php

namespace Terpise\Solid;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Terpise\Solid\Commands\SolidCommand;

class SolidServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-solid')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-solid_table')
            ->hasCommand(SolidCommand::class);
    }
}
