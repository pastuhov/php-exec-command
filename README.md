# php-exec-command

[![Build Status](https://travis-ci.org/pastuhov/php-exec-command.svg)](https://travis-ci.org/pastuhov/php-exec-command)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/pastuhov/php-exec-command/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/pastuhov/php-exec-command/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/pastuhov/php-exec-command/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/pastuhov/php-exec-command/?branch=master)
[![Total Downloads](https://poser.pugx.org/pastuhov/php-exec-command/downloads)](https://packagist.org/packages/pastuhov/php-exec-command)

Simple php command executor with param binding.

## Install

Via Composer

``` bash
$ composer require pastuhov/php-exec-command
```

## Features

* light wight
* param binding

## Usage

```php

    $output = Command::exec(
        'echo {phrase}',
        [
            'phrase' => 'hello'
        ]
    );
    
```

## Testing

``` bash
$ composer test
```
or
```bash
$ phpunit
```

## Security

If you discover any security related issues, please email kirill@pastukhov.su instead of using the issue tracker.

## Credits

- [Kirill Pastukhov](https://github.com/pastuhov)
- [All Contributors](../../contributors)

## License

GNU General Public License, version 2. Please see [License File](LICENSE) for more information.
