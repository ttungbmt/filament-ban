<?php

namespace FilamentPro\FilamentBan;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentBanServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-ban')
            ->hasMigrations(['create_bans_table', 'add_banned_at_column_to_users_table']);
    }
}
