<?php

namespace Creode\LaravelTaxonomy;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelTaxonomyServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-taxonomy')
            ->hasConfigFile()
            ->hasMigration('create_vocabulary_table')
            ->runsMigrations();
    }
}
