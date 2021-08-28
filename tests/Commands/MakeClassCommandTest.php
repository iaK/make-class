<?php

namespace Iak\MakeClass\Tests\Commands;

use Iak\MakeClass\Tests\TestCase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class MakeClassCommandTest extends TestCase
{
    /** @test */
    public function it_can_generate_a_basic_class()
    {
        Artisan::call('make:class BasicClass');

        $class = app_path('BasicClass.php');
        $this->assertFileExists($class);

        $expectedContents = <<<CLASS
<?php

namespace App;

class BasicClass
{
    //
}

CLASS;

        $this->assertEquals($expectedContents, file_get_contents($class));
    }

    /** @test */
    public function it_can_generate_a_class_in_a_custom_folder()
    {
        Artisan::call('make:class CustomDir/BasicClass');

        $class = app_path('CustomDir/BasicClass.php');
        $this->assertFileExists($class);

        $expectedContents = <<<CLASS
<?php

namespace App\CustomDir;

class BasicClass
{
    //
}

CLASS;

        $this->assertEquals($expectedContents, file_get_contents($class));
    }

    /** @test */
    public function it_can_generate_a_test_along_with_the_class()
    {
        Artisan::call('make:class BasicClass --test');

        $class = $this->cleanUpAndGetPath('tests/Unit/BasicClassTest.php');
        $this->assertFileExists($class);

        $expectedContents = <<<CLASS
<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class BasicClassTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        \$this->assertTrue(true);
    }
}

CLASS;

        $this->assertEquals($expectedContents, file_get_contents($class));
    }

    /** @test */
    public function it_can_location_mirrors_the_file_location()
    {
        Artisan::call('make:class Use/Nested/Path/BasicClass --test');

        $class = $this->cleanUpAndGetPath('tests/Unit/Use/Nested/Path/BasicClassTest.php');
        $this->assertFileExists($class);

        $expectedContents = <<<CLASS
<?php

namespace Tests\Unit\Use\Nested\Path;

use PHPUnit\Framework\TestCase;

class BasicClassTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        \$this->assertTrue(true);
    }
}

CLASS;

        $this->assertEquals($expectedContents, file_get_contents($class));
    }

    protected function cleanUpAndGetPath($file)
    {
        $file = Str::substr($file, 0, 5) == 'tests'
            ? $file
            : 'app/' . $file;

        return base_path($file);
    }
}
