<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/usuarios','Admin\UserController@index')->name('users.index');

Route::get('/usuarios/create','Admin\UserController@create')->name('users.create');

Route::post('/usuarios/store','Admin\UserController@store')->name('users.store');