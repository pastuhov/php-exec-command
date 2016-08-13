# php-exec-command

[![Build Status](https://travis-ci.org/pastuhov/php-exec-command.svg)](https://travis-ci.org/pastuhov/php-exec-command)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/pastuhov/php-exec-command/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/pastuhov/php-exec-command/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/pastuhov/php-exec-command/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/pastuhov/php-exec-command/?branch=master)
[![Total Downloads](https://poser.pugx.org/pastuhov/php-exec-command/downloads)](https://packagist.org/packages/pastuhov/php-exec-command)
[![StyleCI](https://styleci.io/repos/37724184/shield)](https://styleci.io/repos/37724184)

Simple php command executor with param binding.

## Install

Via Composer

``` bash
$ composer require pastuhov/php-exec-command
```

## Features

* light weight
* param binding
* throws an exception if return status >0

## Usage

```php
    $output = Command::exec(
        'echo {phrase}',
        [
            'phrase' => 'hello'
        ]
    );
    // $output = 'hello'
```
or
```php
    $output = Command::exec(
        'echo {phrase}',
        [
            'phrase' => [
                'hello',
                'world'
            ]
        ]
    );
    // $output = 'hello world'
```

or
```php
    try {
        Command::exec('locate {parody}',
            [
                'parody' => [
                    'pink_unicorn'
                ]
            ]
        );    
        
        echo 'unicorn's was found!';
    } catch (\Exception $e) {
        echo 'cant find unicorn (';
    }
```

By default, all arguments are escaped using
[escapeshellarg](https://secure.php.net/manual/en/function.escapeshellarg.php).
If you need to pass unescaped arguments, use `{!name!}`, like so:

```php
Command::exec('echo {!path!}', ['path' => '$PATH']);
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
