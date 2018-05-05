<?php

Route::redirect('/','tickets');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'admin','namespace'=>'Admin'], function () {   
	Route::get('/usuarios','UserController@index')->name('users.index');
	Route::get('/usuarios/create','UserController@create')->name('users.create');
	Route::post('/usuarios/store','UserController@store')->name('users.store');
	Route::get('/usuarios/{id}/edit','UserController@edit')->name('users.edit');
	Route::post('/usuarios/{id}/update','UserController@update')->name('users.update');
	Route::get('/usuarios/{id}/eliminar','UserController@delete')->name('users.delete');
	Route::get('/usuarios/{id}/restaurar','UserController@restore')->name('users.restore');
	
	Route::get('/areas','AreaController@index')->name('areas.index');
	Route::get('/areas/crear','AreaController@create')->name('areas.create');
	Route::post('/areas/ver','AreaController@store')->name('areas.store');
	Route::get('/areas/{id}/editar','AreaController@edit')->name('areas.edit');
	Route::post('/areas/{id}/update','AreaController@update')->name('areas.update');
	Route::get('/areas/{id}/eliminar','AreaController@delete')->name('areas.delete');
	Route::get('/areas/{id}/restaurar','AreaController@restore')->name('areas.restore');
	
	Route::get('/patios','PatioController@index')->name('patios.index');
	Route::get('/patios/crear','PatioController@create')->name('patios.create');
	Route::post('/patios/ver','PatioController@store')->name('patios.store');
	Route::get('/patios/{id}/editar','PatioController@edit')->name('patios.edit');
	Route::post('/patios/{id}/update','PatioController@update')->name('patios.update');
	Route::get('/patios/{id}/eliminar','PatioController@delete')->name('patios.delete');
	Route::get('/patios/{id}/restaurar','PatioController@restore')->name('patios.restore');
	
	Route::get('/buses','BusController@index')->name('buses.index');
	Route::get('/buses/create','BusController@create')->name('buses.create');
	Route::post('/buses/store','BusController@store')->name('buses.store');
	Route::get('/buses/{id}/edit','BusController@edit')->name('buses.edit');
	Route::post('/buses/{id}/update','BusController@update')->name('buses.update');
	Route::get('/buses/{id}/eliminar','BusController@delete')->name('buses.delete');
	Route::get('/buses/{id}/restaurar','BusController@restore')->name('buses.restore');
});


Route::get('/tickets','Ticket\TicketController@index')->name('tickets.index');
Route::get('/tickets/create','Ticket\TicketController@create')->name('tickets.create');
Route::post('/tickets/store','Ticket\TicketController@store')->name('tickets.store');
Route::get('/tickets/{id}/editar','Ticket\TicketController@edit')->name('tickets.edit');
Route::get('/tickets/{id}/ver','Ticket\TicketController@show')->name('tickets.show');
Route::post('/tickets/{id}/update','Ticket\TicketController@update')->name('tickets.update');
Route::get('/tickets/{file}/download','Ticket\TicketController@download')->name('tickets.download');
Route::get('/tickets/{id}/restore','Ticket\TicketController@restore')->name('tickets.restore');
Route::get('/tickets/finished','Ticket\FinishedController@index')->name('tickets.finished');
