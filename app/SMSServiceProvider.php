<?php

namespace Theamostafa\SMS;

use Theamostafa\SMS\Gateways\Alfa;
use Theamostafa\SMS\Gateways\Mshastra;
use Theamostafa\SMS\Gateways\QyadatSMS;
use Illuminate\Support\ServiceProvider;

class SMSServiceProvider extends ServiceProvider {
    public function boot() {
        app("sms")->attach(new Mshastra);
        app("sms")->attach(new QyadatSMS);
        app("sms")->attach(new Alfa);
        $this->publishes([__DIR__ . '/../config/sms.php' => config_path('sms.php')], 'config');
    }

    public function register() {
        $this->mergeConfigFrom(__DIR__ . "./../config/sms.php", 'sms');

        $this->app->singleton('sms', function () {
            return new SMS();
        });
    }

}
