<?php

namespace Theamostafa\SMS\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Theamostafa\SMS\SMS
 */
class SMS extends Facade {
    protected static function getFacadeAccessor() {
        return 'sms';
    }
}
