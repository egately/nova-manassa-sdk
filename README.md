

# Manassa Wrapper

[![Latest Version on Packagist](https://img.shields.io/packagist/v/egately/nova-manassa-sdk.svg?style=flat-square)](https://packagist.org/packages/egately/nova-manassa-sdk)
[![Total Downloads](https://img.shields.io/packagist/dt/egately/nova-manassa-sdk.svg?style=flat-square)](https://packagist.org/packages/egately/nova-manassa-sdk)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require egately/nova-manassa-sdk
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="nova-manassa-sdk-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="nova-manassa-sdk-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="nova-manassa-sdk-views"
```

## Usage

```php
$novaManassaSdk = new Egately\NovaManassaSdk();
echo $novaManassaSdk->echoPhrase('Hello, Egately!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/egately/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Salah](https://github.com/egately)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
