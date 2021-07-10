<?php

namespace Iak\MakeClass\Commands;

use Illuminate\Console\GeneratorCommand;

class ClassMakeCommand extends GeneratorCommand
{
    public $name = 'make:class';

    public $description = 'Create a new basic class';

    public $type = 'Class';

    protected function getStub()
    {
        return with(
            '/stubs/class.stub',
            fn ($stub) =>
            file_exists($customPath = $this->laravel->basePath(trim($stub, '/')))
                ? $customPath
                : __DIR__ . $stub
        );
    }
}
