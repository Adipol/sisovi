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

	Route::get('/atickets/','TicketAdminController@index')->name('atickets.index');
	Route::get('/atickets/{id}/deletefile','TicketAdminController@deletefile')->name('atickets.deletefile');
});

Route::group(['middleware' => ['auth']], function () {
	Route::get('/profile','Admin\ProfileController@index')->name('profile.index');
	Route::put('/profile', 'Admin\ProfileController@update')->name('profile.update');
});

Route::namespace('Ticket')->group(function () {
	Route::group(['middleware' => ['auth']], function () {
		Route::get('/tickets','TicketController@index')->name('tickets.index');		
		Route::get('/tickets/{id}/ver','TicketController@show')->name('tickets.show');		
		Route::get('/tickets/finished','TicketController@indexfinished')->name('tickets.indexfinished');
		Route::get('/tickets/{id}/verf','TicketController@showf')->name('tickets.showf');

		Route::group(['middleware' => ['ope']], function () {
			Route::get('/tickets/{id}/editar','TicketController@edit')->name('tickets.edit');
			Route::post('/tickets/{id}/update','TicketController@update')->name('tickets.update');
		});

		Route::group(['middleware' => ['sol']], function () {
			Route::get('/tickets/create','TicketController@create')->name('tickets.create');
			Route::post('/tickets/store','TicketController@store')->name('tickets.store');
			Route::get('/tickets/{id}/restore','TicketController@restore')->name('tickets.restore');
			Route::get('/tickets/{file}/download','TicketController@download')->name('tickets.download');
			Route::get('/tickets/{id}/finished','TicketController@finished')->name('tickets.finished');
			Route::get('/people/create','PersonController@create')->name('people.create');
			Route::post('/people/store','PersonController@store')->name('people.store');			
		});	
	});
});



