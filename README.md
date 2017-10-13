# Easy Contact Form for Your Laravel App

This composer package offers a Twitter Bootstrap optimized flash messaging setup for your Laravel applications.

## Installation

Begin by pulling in the package through Composer.

```bash
composer require ricadesign/laravel-contact
```

Next, if using Laravel 5, include the service provider within your `config/app.php` file.

```php
'providers' => [
    Laracasts\Flash\FlashServiceProvider::class,
];
```

Finally, as noted above, the default CSS classes for your flash message are optimized for Twitter Bootstrap. As such, pull in the Bootstrap's CSS within your HTML or layout file.

```html
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
```
## Configuration 

## Usage

## Example


If you need to modify the flash message partials, you can run:

```bash
php artisan vendor:publish --provider="Laracasts\Flash\FlashServiceProvider"
```


