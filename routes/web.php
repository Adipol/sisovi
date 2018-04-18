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

Route::get('/patios','Admin\PatioController@index')->name('patios.index');
Route::get('/patios/crear','Admin\PatioController@create')->name('patios.create');
Route::post('/patios/ver','Admin\PatioController@store')->name('patios.store');
Route::get('/patios/{id}/editar','Admin\PatioController@edit')->name('patios.edit');
Route::post('/patios/{id}/update','Admin\PatioController@update')->name('patios.update');
Route::get('/patios/{id}/eliminar','Admin\PatioController@delete')->name('patios.delete');
Route::get('/patios/{id}/restaurar','Admin\PatioController@restore')->name('patios.restore');

Route::get('/buses','Admin\BusController@index')->name('buses.index');
Route::get('/buses/create','Admin\BusController@create')->name('buses.create');
Route::post('/buses/store','Admin\BusController@store')->name('buses.store');
Route::get('/buses/{id}/edit','Admin\BusController@edit')->name('buses.edit');
Route::post('/buses/{id}/update','Admin\BusController@update')->name('buses.update');
Route::get('/buses/{id}/eliminar','Admin\BusController@delete')->name('buses.delete');
Route::get('/buses/{id}/restaurar','Admin\BusController@restore')->name('buses.restore');

Route::get('/tickets','Ticket\TicketController@index')->name('tickets.index');
Route::get('/tickets/create','Ticket\TicketController@create')->name('tickets.create');
Route::post('/tickets/store','Ticket\TicketController@store')->name('tickets.store');
Route::get('/tickets/{id}/editar','Ticket\TicketController@edit')->name('tickets.edit');
Route::post('/tickets/{id}/update','Ticket\TicketController@update')->name('tickets.update');
Route::get('/tickets/{file}/download','Ticket\TicketController@download')->name('tickets.download');