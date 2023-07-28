<?php

namespace Terpise\Solid\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Terpise\Solid\Solid
 */
class Solid extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Terpise\Solid\Solid::class;
    }
}
