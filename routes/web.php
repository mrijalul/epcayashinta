<?php

Route::get('/', function () {
	return view('welcome');
});

// auth guru
Route::get('register/guru','Auth\RegisterController@registerguru')->name('register.guru');
Route::post('register/guru','Auth\RegisterController@postregisterguru')->name('post.guru.register');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('about','HomeController@about')->name('about');

Route::group(['middleware' => ['web']], function () {
	//about
	//mata pelajaran
	Route::resource('matpel', 'MatapelajaranController')->only(['index','store']);
	Route::resource('soal-latihan', 'SoallatihanController')->only(['index','store','show','essay.index','essay.submit.form','essay.submit.jawaban','soal.latihan.submit.soal.pilgan']);
	
	//modul pembelajaran
	Route::resource('modul-pembelajaran', 'ModulpembelajaranController')->only(['index','store','downloadmodul']);
	
	//video pembelajaran
	Route::resource('video-pembelajaran', 'VideopembelajaranController')->only(['index','store']);
	Route::get('modul-pembelajaran/download/{id}/modul','ModulpembelajaranController@downloadmodul')->name('modul-pembelajaran.download');
	
	//soal latihan
	Route::get('soal-latihan','SoallatihanController@index')->name('soal.latihan.index');
	// soal latihan pilgan
	Route::post('soal-latihan/{id}/submit/pilgan','SoallatihanController@submitsoalpilgan')->name('soal.latihan.submit.soal.pilgan');
	//essay
	Route::get('soal-latihan/{id}/essay', 'SoallatihanessayController@index')->name('soal.latihan.essay.index');
	Route::post('soal-latihan/{id}/essay/submit','SoallatihanessayController@submitsoalessay')->name('soal.latihan.essay.submit.form');
	Route::post('soal-latihan/{id}/essay/submit/jawaban','SoallatihanessayController@submitjawabanessay')->name('soal.latihan.essay.submit.jawaban');

	//kas kecil master 
	Route::get('kas-kecil', 'KaskecilController@index')->name('kaskecil');
	Route::post('kas-kecil', 'KaskecilController@tambah');
	Route::get('/kas-kecil/hapus/{id}',"KaskecilController@hapus")->name('hapuskaskecil');
	Route::get('/kas-kecil/edit/{id}',"KaskecilController@editkaskecil")->name('editkaskecil');
	Route::post('/kas-kecil/edit/{id}',"KaskecilController@konfirmasieditkaskecil");

	//kas kecil pembentukan dana
	Route::get('/kas-kecil/pembentukandana/{id}',"KaskecilController@pembentukandana")->name('pembentukandana');
	Route::post('/kas-kecil/pembentukandana/{id}',"KaskecilController@simpanpembentukandana");

	//kas kecil pengajuan
	Route::get('/kas-kecil/pengajuankaskecil/{id}',"KaskecilController@pengajuankaskecil")->name('pengajuankaskecil');
	Route::post('/kas-kecil/pengajuankaskecil/{id}',"KaskecilController@simpanpengajuankaskecil");
	Route::get('/kas-kecil/listpengajuankaskecil/{id}',"KaskecilController@listpengajuankaskecil")->name('listpengajuankaskecil');
	Route::get('/kas-kecil/listpengajuankaskecil/{id}/hapus/{idhapus}',"KaskecilController@hapuspengajuankaskecil")->name('hapuspengajuankaskecil');
	Route::get('/kas-kecil/listpengajuankaskecil/{id}/edit/{idedit}',"KaskecilController@editpengajuankaskecil")->name('editpengajuankaskecil');
	Route::post('/kas-kecil/listpengajuankaskecil/{id}/edit/{idedit}',"KaskecilController@simpaneditpengajuankaskecil");
	Route::get('/kas-kecil/hapussemuapengajuankaskecil/{id}',"KaskecilController@hapussemuapengajuankaskecil")->name('hapussemuapengajuankaskecil');

	//kas kecil pemgisian kembali
	Route::get('/kas-kecil/pingisiankembali/{id}',"KaskecilController@pingisiankembali")->name('pingisiankembali');
	Route::post('/kas-kecil/pingisiankembali/{id}',"KaskecilController@simpanpingisiankembali");

	//kas kecil jurnal
	Route::get('/kas-kecil/jurnalkaskecil/{id}',"KaskecilController@jurnalkaskecil")->name('jurnalkaskecil');
	
	//kas kecil buku
	Route::get('/kas-kecil/bukukaskecil/{id}',"KaskecilController@bukukaskecil")->name('bukukaskecil');
	Route::post('/kas-kecil/bukukaskecil/{id}',"KaskecilController@simpanbukukaskecil");
});