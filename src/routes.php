<?php

Route::get('contact', 'Ricadesign\Contact\ContactController@index')->middleware('web');
Route::post('contact', 'Ricadesign\Contact\ContactController@store')->middleware('web');
Route::get('/mail', function () {
    return new Ricadesign\Contact\Mail\MessageSent('Marc', 'test@test.com', 'Esto es el mensaje');
});

$namespacePrefix = '\\'.config('contact.controllers.namespace').'\\';
//Asset Routes
Route::get('contact-assets', ['uses' => $namespacePrefix.'ContactController@assets', 'as' => 'contact_assets']);
