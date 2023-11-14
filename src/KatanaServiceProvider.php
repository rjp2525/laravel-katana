<?php

namespace Reno\Katana;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Reno\Katana\Commands\KatanaCommand;

class KatanaServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('katana')
            ->hasConfigFile()
            ->hasCommand(KatanaCommand::class);
    }
}
