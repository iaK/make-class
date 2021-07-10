<?php

namespace Iak\MakeClass\Tests\Commands;

use Iak\MakeClass\Tests\TestCase;
use Illuminate\Support\Facades\Artisan;

class ClassMakeCommandTest extends TestCase
{
    /** @test */
    public function true_is_true()
    {
        Artisan::call('make:class Hej/Pa/Dej');
    }
}
