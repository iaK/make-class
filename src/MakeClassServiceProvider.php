<?php

namespace Iak\MakeClass;

use Iak\MakeClass\Commands\MakeClassCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class MakeClassServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('make-class')
            ->hasCommand(MakeClassCommand::class);
    }

    public function boot()
    {
        parent::boot();

        $this->publishes([
            __DIR__.'/stubs' => base_path('stubs'),
        ], 'stub');
    }
}
