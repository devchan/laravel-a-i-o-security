<?php

namespace Devchan\LaravelAIOSecurity\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Mews\Purifier
 */
class LaravelAIOSecurity extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'purifier';
    }
}
