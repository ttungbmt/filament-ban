<?php

namespace FilamentPro\FilamentBan;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use FilamentPro\FilamentBan\Commands\FilamentBanCommand;

class FilamentBanServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('filament-ban')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('add_banned_at_column_to_users_table');
    }
}
