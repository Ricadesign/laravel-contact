<?php

namespace Ricadesign\Contact;

use Illuminate\Support\ServiceProvider;

class ContactServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadViewsFrom(__DIR__.'/views', 'contact');
        $this->publishes([
            __DIR__.'/views' => resource_path('views/vendor/contact'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Ricadesign\Contact\ContactController');
    }
}
