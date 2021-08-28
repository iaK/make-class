<?php

namespace Iak\MakeClass\Commands;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Console\GeneratorCommand;

class MakeClassCommand extends GeneratorCommand
{
    public $name = 'make:class';

    public $description = 'Create a new basic class';

    public $type = 'Class';

    protected $signature = 'make:class {name} {--force} {--test}';

    /**
     * @inheritDoc
     */
    public function handle()
    {
        parent::handle();

        if ($this->option('test')) {
            $this->createTest();
        }
    }

    /**
     * Create a test for the command.
     *
     * @return void
     */
    protected function createTest()
    {
        $this->call('make:test', [
            'name' => Str::studly(Str::replace('\\', '/', $this->argument('name')))  . 'Test',
            '--unit' => true,
        ]);
    }

    /**
     * @inheritDoc
     */
    protected function getStub()
    {
        $file = File::exists(app_path('stubs/class.stub'))
            ? app_path('stubs/class.stub')
            : './../stubs/class.stub';

        return with(
            $file,
            fn ($stub) =>
            file_exists($customPath = $this->laravel->basePath(trim($stub, '/')))
                ? $customPath
                : __DIR__ . $stub
        );
    }
}
