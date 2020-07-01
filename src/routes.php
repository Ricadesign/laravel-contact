<?php

Route::get('contact', 'Ricadesign\Contact\ContactController@index')->middleware('web');
Route::post('contact', 'Ricadesign\Contact\ContactController@store')->middleware('web');


