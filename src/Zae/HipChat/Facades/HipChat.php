<?php

namespace Zae\HipChat\Facades;

use Illuminate\Support\Facades\Facade;

class HipChat extends Facade
{
    /**
     * Name of the binding in the IoC container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'hipchat';
    }
}
