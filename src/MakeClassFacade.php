<?php

namespace Iak\MakeClass;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Iak\MakeClass\MakeClass
 */
class MakeClassFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'make-class';
    }
}
