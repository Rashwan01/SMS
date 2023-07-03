<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Default SMS gateway
    |--------------------------------------------------------------------------
    |
    | This option controls the default gateway that is used to send any sms
    | SMS sent by your application. Alternative SMS may be setup
    | and used as needed; however, this SMS will be used by default.
    | Supported: "alpha", "mshastra", "qyadat"
    |
    */
    'default' => env("SMS_GATEWAY", 'qyadat'),

    'username' => env("SMS_USERNAME", ''),

    'sender' => env("SMS_SENDER", ''),

    'password' => env("SMS_PASSWORD", ''),

];
