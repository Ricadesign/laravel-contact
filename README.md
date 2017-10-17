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

You can configure the email adress where the contact form message is sent to by adding the following variables to the .env file.

```ini
CONTACT_MAIL=john.doe@example.com
```
If you need to modify the form view, you can publish the form view with the following command:

```bash
php artisan vendor:publish
```
This will also publish the config file, contact.php. Wich you can modify to add the email adress:

```php
<?php

return [

    'email' => env('CONTACT_MAIL'),

];
```

## Usage

Once installed you can navigate to the "/contact" URL of you web application. This will show the default view or, in case you have published the view, the custom view for the contact form.

There is a route for "/contact" that's expecting a post method with the message information to be sent to the contact email.




