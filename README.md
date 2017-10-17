# Easy Contact Form for Your Laravel App

This composer package offers a Twitter Bootstrap optimized flash messaging setup for your Laravel applications.

## Installation

Begin by pulling in the package through Composer.

```bash
composer require ricadesign/laravel-contact
```



Next, if using Laravel 5, include the service provider within your `config/app.php` file. From version 5.5 and thanks to [package autodiscovery](https://laravel-news.com/package-auto-discovery) this is no longer necesary.
```php
'providers' => [
    Ricadesign\Contact\ContactServiceProvider::class,
];
```
## Configuration 

## Usage

## Example


If you need to modify the flash message partials, you can run:

```bash
php artisan vendor:publish --provider="Laracasts\Flash\FlashServiceProvider"
```


