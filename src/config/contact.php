<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Contact Mail
    |--------------------------------------------------------------------------
    |
    | Email to send the messages sent by the people who fill the contact form
    |
    | Supported: Valid email adress. Example: "john.doe@example.com"
    |
    */

    'email' => env('CONTACT_MAIL', 'john.doe@example.com'),

     /*
    |--------------------------------------------------------------------------
    | Controllers config
    |--------------------------------------------------------------------------
    |
    | Here you can specify voyager controller settings
    |
    */

    'controllers' => [
        'namespace' => 'Ricadesign\\Contact\\Http\\Controllers',
    ],

];
