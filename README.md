# Laravel Filament Ban

## Introduction

Behind the scenes [cybercog/laravel-ban](https://github.com/cybercog/laravel-ban) is used.

![ban_user](https://user-images.githubusercontent.com/12232155/162865596-f96984cd-6e82-41c6-abfa-367eb49247a8.png)

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

### Register Ban Actions in Filament Resource

Register `Ban` and `Unban` actions inside your Model's Resource.

```php
    public static function table(Table $table): Table
    {
        return $table
            ->prependBulkActions([
                \FilamentPro\FilamentBan\Actions\Ban::make(),
                \FilamentPro\FilamentBan\Actions\Unban::make(),
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
