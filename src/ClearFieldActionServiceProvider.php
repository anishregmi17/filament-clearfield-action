<?php

namespace Anish\ClearFieldAction;

use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ClearFieldActionServiceProvider extends PackageServiceProvider
{
    public static string $name = 'clearfield-action';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasConfigFile();
    }
}
