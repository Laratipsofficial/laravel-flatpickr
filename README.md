# A laravel clone of the javascript flatpickr package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/asdh/laravel-flatpickr.svg?style=flat-square)](https://packagist.org/packages/asdh/laravel-flatpickr)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/asdh/laravel-flatpickr/run-tests?label=tests)](https://github.com/asdh/laravel-flatpickr/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/asdh/laravel-flatpickr/Check%20&%20fix%20styling?label=code%20style)](https://github.com/asdh/laravel-flatpickr/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/asdh/laravel-flatpickr.svg?style=flat-square)](https://packagist.org/packages/asdh/laravel-flatpickr)

Using this package you can add a beautiful date or datetime picker into your project without touching any javascript with the power or laravel component.


## Installation

You can install the package via composer:

```bash
composer require asdh/laravel-flatpickr
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="flatpickr-config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$laravelFlatpickr = new Asdh\LaravelFlatpickr();
echo $laravelFlatpickr->echoPhrase('Hello, Asdh!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Laratips](https://github.com/Laratipsofficial)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
