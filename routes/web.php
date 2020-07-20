<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sendmail', 'UsersController@sendMail');
Route::post('/sendmail', 'UsersController@sendingMail');
Route::get('/users', 'UsersController@index');
Route::get('/users/create', 'UsersController@create');
Route::post('/users/create', 'UsersController@store');
Route::get('/users/{id}/show', 'UsersController@show');
Route::get('/users/{id}/edit', 'UsersController@edit');
Route::patch('/users/{id}/edit', 'UsersController@update');
Route::delete('/users/{id}/delete', 'UsersController@destroy');


Route::get('/profiles', 'ProfilesController@index');
Route::get('/profiles/{id}/edit', 'ProfilesController@edit');
Route::patch('/profiles/{id}/edit', 'ProfilesController@update');
