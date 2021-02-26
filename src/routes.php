<?php

if (config('contact.use_default_get_route')) {
    Route::get('contact', 'Ricadesign\Contact\ContactController@index')->middleware('web')->name('contact');
}
Route::post('contact', 'Ricadesign\Contact\ContactController@store')->middleware('web');


