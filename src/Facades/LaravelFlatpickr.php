<?php

namespace Asdh\LaravelFlatpickr\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Asdh\LaravelFlatpickr\LaravelFlatpickr
 */
class LaravelFlatpickr extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-flatpickr';
    }
}
