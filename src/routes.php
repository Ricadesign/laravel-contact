<?php

Route::get('test', 'Ricadesign\Contact\ContactController@index')->middleware('web');
Route::post('test', 'Ricadesign\Contact\ContactController@store')->middleware('web');
