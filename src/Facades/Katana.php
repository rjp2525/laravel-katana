<?php

namespace Reno\Katana\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Reno\Katana\Katana
 */
class Katana extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Reno\Katana\Katana::class;
    }
}
