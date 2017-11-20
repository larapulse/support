# PHP Support functions

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
<!-- [![Total Downloads][ico-downloads]][link-downloads] -->

PHP package with helper functions.

## Structure

If any of the following are applicable to your project, then the directory structure should follow industry best practises by being named the following.

```
bin/
config/
src/
tests/
vendor/
```


## Install

Via Composer

``` bash
$ composer require larapulse/support
```

## Usage

This package contains some useful functions that can be used for different cases, such as:

``` php
$initial = [
    'environment'   => 'dev',
    'app_start'     => date('Y-m-d H:i:s'),
    'options'       => [
        'test'  => true,
        'debug' => true,
        'log'   => 'notice'.
    ],
];

$hash = md5(implode('|', array_flatten_assoc($initial)));
```

## Change log

Please see [CHANGELOG](docs/CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](docs/CONTRIBUTING.md) and [CODE_OF_CONDUCT](docs/CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email sergey.podgornyy@yahoo.de instead of using the issue tracker.

## Credits

- [Sergey Podgornyy][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/larapulse/support.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/larapulse/support/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/larapulse/support.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/larapulse/support.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/larapulse/support.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/larapulse/support
[link-travis]: https://travis-ci.org/larapulse/support
[link-scrutinizer]: https://scrutinizer-ci.com/g/larapulse/support/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/larapulse/support
[link-downloads]: https://packagist.org/packages/larapulse/support
[link-author]: https://github.com/SergeyPodgornyy
[link-contributors]: ../../contributors
