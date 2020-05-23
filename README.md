# Suprvise PHP SDK

[![Latest Version on Packagist](https://img.shields.io/packagist/v/suprvise/suprvise-php.svg?style=flat-square)](https://packagist.org/packages/suprvise/suprvise-php)
[![Build Status](https://img.shields.io/travis/suprvise/suprvise-php/master.svg?style=flat-square)](https://travis-ci.org/suprvise/suprvise-php)
[![Quality Score](https://img.shields.io/scrutinizer/g/suprvise/suprvise-php.svg?style=flat-square)](https://scrutinizer-ci.com/g/suprvise/suprvise-php)
[![Total Downloads](https://img.shields.io/packagist/dt/suprvise/suprvise-php.svg?style=flat-square)](https://packagist.org/packages/suprvise/suprvise-php)

Official [Suprvise](https://suprvise.com) PHP SDK.

## Installation

You can install the package via composer:

```bash
composer require suprvise/suprvise-php
```

## Usage

``` php
<?php

require __DIR__ . '../../vendor/autoload.php';

use Suprvise\Suprvise;
use Suprvise\Logger;

Suprvise::key('suprvise-key-xxx');
Suprvise::origin('https://example.com'); // Must be a website monitored by Suprvise within your team

Logger::listen();

throw new Exception('Whoops!'); // Captured by Suprvise - Check your dashboard https://suprvise.com/logging
```

### Testing

``` bash
composer test
```

### Security

If you discover any security related issues, please email support@suprvise.com instead of using the issue tracker.

## Credits

- [Suprvise](https://suprvise.com)
- [All Contributors](../../contributors)

## License

MIT
