# A package to create basic classes with tests in your Laravel app

[![Latest Version on Packagist](https://img.shields.io/packagist/v/iak/make-class.svg?style=flat-square)](https://packagist.org/packages/iak/make-class)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/iak/make-class/run-tests?label=tests)](https://github.com/iak/make-class/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/iak/make-class/Check%20&%20fix%20styling?label=code%20style)](https://github.com/iak/make-class/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/iak/make-class.svg?style=flat-square)](https://packagist.org/packages/iak/make-class)

Create a basic class at any path with an optinal test.

## Usage

Example:

```bash
$ php artisan make:class Custom/Folder/MyCoolClass
```

Will create a ```app/Custom/Folder/MyCoolClass.php``` file containing:

```php
<?php

namespace App\Custom\Folder;

class MyCoolClass
{
    //
}
```

Use the ```--test``` option to create a corresponding test in ```test/Unit/Custom/Folder/MyCoolClassTest.php``` using the default laravel unit test stub.

## Customize the stub

Publish the stub using:

```bash
php artisan vendor:publish --tab=stub
```

And edit the ```stubs/class.stub``` file to your liking =) 

## Installation

You can install the package via composer:

```bash
composer require iak/make-class --dev
```

## Testing

```bash
composer test
```

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Isak Berglind](https://github.com/iaK)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
