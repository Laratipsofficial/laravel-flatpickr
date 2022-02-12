<?php

namespace Asdh\LaravelFlatpickr;

use Asdh\LaravelFlatpickr\Commands\LaravelFlatpickrCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelFlatpickrServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-flatpickr')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-flatpickr_table')
            ->hasCommand(LaravelFlatpickrCommand::class);
    }
}
