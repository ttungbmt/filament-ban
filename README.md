# Laravel Filament Ban

# This is my package filament-ban

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ttungbmt/filament-ban.svg?style=flat-square)](https://packagist.org/packages/ttungbmt/filament-ban)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/ttungbmt/filament-ban/run-tests?label=tests)](https://github.com/ttungbmt/filament-ban/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/ttungbmt/filament-ban/Check%20&%20fix%20styling?label=code%20style)](https://github.com/ttungbmt/filament-ban/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ttungbmt/filament-ban.svg?style=flat-square)](https://packagist.org/packages/ttungbmt/filament-ban)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/filament-ban.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/filament-ban)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require ttungbmt/filament-ban
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-ban-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-ban-config"
```


### Prepare bannable model

```php
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements BannableContract
{
    use Bannable;
}
```

### Prepare bannable model database table

Bannable model must have `nullable timestamp` column named `banned_at`. This value used as flag and simplify checks if user was banned. If you are trying to make default Laravel User model to be bannable you can use example below.

### Register Ban Actions in Nova Resource

Register `Ban` and `Unban` actions inside your `Bannable` Model's Resource.

```php
    public static function table(Table $table): Table
    {
        return $table
            ->prependBulkActions([
                Ban::make('ban'),
                Unban::make('unban'),
            ]);
    }
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Truong Thanh Tung](https://github.com/ttungbmt)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
