<?php

namespace Iak\MakeClass;

use Iak\MakeClass\Commands\ClassMakeCommand;
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
            ->hasConfigFile()
            ->hasCommand(ClassMakeCommand::class);
    }
}
