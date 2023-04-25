# Laravel Sevdesk Api

[![Latest Version on Packagist](https://img.shields.io/packagist/v/netstack-de/laravel-sevdesk-api.svg?style=flat-square)](https://packagist.org/packages/netstack-de/laravel-sevdesk-api)
[![Total Downloads](https://img.shields.io/packagist/dt/netstack-de/laravel-sevdesk-api.svg?style=flat-square)](https://packagist.org/packages/netstack-de/laravel-sevdesk-api)
[![Test](https://github.com/NetstackDE/laravel-sevdesk-api/actions/workflows/testing.yml/badge.svg?branch=main)](https://github.com/NetstackDE/laravel-sevdesk-api/actions/workflows/testing.yml)

This package make a connection to the sevdesk api and lets you interact with it.

[Sevdesk API Documentation](https://hilfe.sevdesk.de/knowledge/sevdesk-rest-full-api)

## Installation

You can install the package via composer:

```bash
composer require netstack-de/laravel-sevdesk-api
```

Set your api token in the `.env` file like this:

```
SEVDESK_API_TOKEN=xxxxxxxx
```

Optionally you can publish the config file with:

```bash
php artisan vendor:publish --provider="NetstackDE\LaravelSevdeskApi\SevdeskApiServiceProvider" --tag="config"
```

This is the contents of the published config file:

```php
return [
    /*
     * Api token you from sevdesk. 
     */
    'api_token' => env('SEVDESK_API_TOKEN', ''),
];
```

## Usage

For usage instructions see the [Wiki](https://github.com/NetstackDE/laravel-sevdesk-api/wiki)

## Changelog

Please see the [Releases Tab](https://github.com/NetstackDE/laravel-sevdesk-api/releases) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Eric Bortz](https://github.com/Sebbito)
- [Martin Appelmann](https://github.com/exlo89)
- [All Contributors](../../contributors)

## License

Please see [License File](LICENSE) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
