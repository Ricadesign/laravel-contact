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
    | Use default GET route
    |--------------------------------------------------------------------------
    |
    | By default, the package will generate a default /contact GET route to contact view.
    | Set this option to false if you don't want this route to be registered.
    |
    */

    'use_default_get_route' => true,
];
