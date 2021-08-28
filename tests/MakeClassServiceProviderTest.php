<?php

namespace Iak\MakeClass\Tests;

use Illuminate\Support\Facades\File;

class MakeClassServiceProviderTest extends TestCase
{
    /** @test */
    public function it_can_publish_the_stub_file()
    {
        File::delete(base_path('stubs/class.stub'));

        $this->assertFileDoesNotExist(base_path('stubs/class.stub'));

        $this
            ->artisan('vendor:publish --tag=stub')
            ->assertExitCode(0);

        $this->assertFileExists(base_path('stubs/class.stub'));
    }
}
