<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/usuarios','Admin\UserController@index')->name('users.index');
Route::get('/usuarios/create','Admin\UserController@create')->name('users.create');
Route::post('/usuarios/store','Admin\UserController@store')->name('users.store');
Route::get('/usuarios/{id}/edit','Admin\UserController@edit')->name('users.edit');
Route::post('/usuarios/{id}/update','Admin\UserController@update')->name('users.update');
Route::get('/usuarios/{id}/eliminar','Admin\UserController@delete')->name('users.delete');
Route::get('/usuarios/{id}/restaurar','Admin\UserController@restore')->name('users.restore');

Route::get('/areas','Admin\AreaController@index')->name('areas.index');
Route::get('/areas/crear','Admin\AreaController@create')->name('areas.create');
Route::post('/areas/ver','Admin\AreaController@store')->name('areas.store');
Route::get('/areas/{id}/editar','Admin\AreaController@edit')->name('areas.edit');
Route::post('/areas/{id}/update','Admin\AreaController@update')->name('areas.update');
Route::get('/areas/{id}/eliminar','Admin\AreaController@delete')->name('areas.delete');
Route::get('/areas/{id}/restaurar','Admin\AreaController@restore')->name('areas.restore');