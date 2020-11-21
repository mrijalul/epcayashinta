<?php

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['web']], function () {
	Route::resource('matpel', 'MataPelajaranController');
	Route::resource('modul-pembelajaran', 'ModulpembelajaranController');
	Route::resource('video-pembelajaran', 'VideopembelajaranController');
	Route::get('modul-pembelajaran/download/{id}/modul','ModulpembelajaranController@downloadmodul')->name('modul-pembelajaran.download');
});