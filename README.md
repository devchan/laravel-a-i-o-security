# Laravel A I O Security

[![Build Status](https://travis-ci.org/devchan/laravel-a-i-o-security.svg?branch=master)](https://travis-ci.org/devchan/laravel-a-i-o-security)
[![styleci](https://styleci.io/repos/CHANGEME/shield)](https://styleci.io/repos/CHANGEME)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/devchan/laravel-a-i-o-security/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/devchan/laravel-a-i-o-security/?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/CHANGEME/mini.png)](https://insight.sensiolabs.com/projects/CHANGEME)
[![Coverage Status](https://coveralls.io/repos/github/devchan/laravel-a-i-o-security/badge.svg?branch=master)](https://coveralls.io/github/devchan/laravel-a-i-o-security?branch=master)

[![Packagist](https://img.shields.io/packagist/v/devchan/laravel-a-i-o-security.svg)](https://packagist.org/packages/devchan/laravel-a-i-o-security)
[![Packagist](https://poser.pugx.org/devchan/laravel-a-i-o-security/d/total.svg)](https://packagist.org/packages/devchan/laravel-a-i-o-security)
[![Packagist](https://img.shields.io/packagist/l/devchan/laravel-a-i-o-security.svg)](https://packagist.org/packages/devchan/laravel-a-i-o-security)

Package description: CHANGE ME

## Installation

Install via composer
```bash
composer require devchan/laravel-a-i-o-security
```

### Register Service Provider

**Note! This and next step are optional if you use laravel>=5.5 with package
auto discovery feature.**

Add service provider to `config/app.php` in `providers` section
```php
Devchan\LaravelAIOSecurity\ServiceProvider::class,
```

### Register Facade

Register package facade in `config/app.php` in `aliases` section
```php
Devchan\LaravelAIOSecurity\Facades\LaravelAIOSecurity::class,
```

### Publish Configuration File

```bash
php artisan vendor:publish --provider="Devchan\LaravelAIOSecurity\ServiceProvider" --tag="config"
```

## Usage

CHANGE ME

## Security

If you discover any security related issues, please email chanakadesilva21@gmail.com
instead of using the issue tracker.

## Credits

- [Chanaka Kasun de Silva](https://github.com/devchan/laravel-a-i-o-security)
- [All contributors](https://github.com/devchan/laravel-a-i-o-security/graphs/contributors)

This package is bootstrapped with the help of
[melihovv/laravel-package-generator](https://github.com/melihovv/laravel-package-generator).
