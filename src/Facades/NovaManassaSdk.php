<?php

namespace Egately\NovaManassaSdk\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Egately\NovaManassaSdk\NovaManassaSdk
 */
class NovaManassaSdk extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Egately\NovaManassaSdk\NovaManassaSdk::class;
    }
}
