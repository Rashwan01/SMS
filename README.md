# Package for manage sms gateways

## Installation

You can install the package via composer:

```bash
composer require theamostafa/sms
```

You can publish the config file with:

```bash
php artisan vendor:publish --provider="Theamostafa\SMS\SMSServiceProvider" --tag="config"
```

This is the contents of the published config file:

```php
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

    'username' => env("SMS_USERNAME", null),

    'sender' => env("SMS_SENDER", null),

    'password' => env("SMS_PASSWORD", null),
];
```

## Usage

``` php
use SMS;

SMS::send('message','966512345678');

SMS::message('message')->to('966512345678')->send();
```

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Ahmed Mostafa](https://github.com/AhmedMostafa)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
