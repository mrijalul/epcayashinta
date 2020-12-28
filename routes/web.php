<?php

Route::get('/', function () {
	return view('welcome');
});

// auth guru
Route::get('register/guru','Auth\RegisterController@registerguru')->name('register.guru');
Route::post('register/guru','Auth\RegisterController@postregisterguru')->name('post.guru.register');

Auth::routes();
// home epca
Route::get('/home', 'HomeController@index')->name('home');
// about epca
Route::get('about','HomeController@about')->name('about');

Route::group(['middleware' => ['web']], function () {
	//mata pelajaran
	Route::resource('matpel', 'MatapelajaranController')->only(['index','store']);
	Route::resource('soal-latihan', 'SoallatihanController')->only(['index','store','show','essay.index','essay.submit.form','essay.submit.jawaban','soal.latihan.submit.soal.pilgan','soal.latihan.siswa.pilgan','soal.latihan.siswa.pilgan.submit','soal.latihan.submit.soal.essay','soal.latihan.siswa.essay.download','soal.latihan.siswa.essay.submit.jawab']);
	
	//modul pembelajaran
	Route::resource('modul-pembelajaran', 'ModulpembelajaranController')->only(['index','store','downloadmodul']);
	
	//video pembelajaran
	Route::resource('video-pembelajaran', 'VideopembelajaranController')->only(['index','store']);
	Route::get('modul-pembelajaran/download/{id}/modul','ModulpembelajaranController@downloadmodul')->name('modul-pembelajaran.download');
	
	//soal latihan
	Route::get('soal-latihan','SoallatihanController@index')->name('soal.latihan.index');
	// soal latihan pilgan
	Route::post('soal-latihan/{id}/submit/pilgan','SoallatihanController@submitsoalpilgan')->name('soal.latihan.submit.soal.pilgan');
	// siswa menjawab soal pilgan
	Route::get('soal-latihan/{id}/pilihan-ganda/siswa','SoallatihanController@soalpilihangandasiswa')->name('soal.latihan.siswa.pilgan');
	// siswa mensubmit jawaban pilgan
	Route::post('soal-latihan/{id}/pilihan-ganda/siswa/submit','SoallatihanController@soalpilihangandasiswasubmit')->name('soal.latihan.siswa.pilgan.submit');
	// cek hasil pilgan
	Route::get('soal-latihan/{id}/hasil/{user_id}','SoallatihanController@hasil')->name('soal.latihan.siswa.hasil');
	//soal latihan essay
	Route::post('soal-latihan/{id}/submit/essay', 'SoallatihanController@submitsoalessay')->name('soal.latihan.submit.soal.essay');
	//download soal uraian
	Route::get('soal-latihan/download/{id}/essay','SoallatihanController@downloadsoalessay')->name('soal.latihan.siswa.essay.download');
	// siswa melihat soal essay
	Route::get('soal-latihan/{id}/essay/siswa','SoallatihanController@soalessaysiswa')->name('soal.latihan.siswa.essay');
	// siswa upload jawaban essay
	Route::post('soal-latihan/{matapelajaran_id}/essay/{soal_id}/siswa/submit','SoallatihanController@soalessaysiswasubmit')->name('soal.latihan.siswa.essay.submit.jawab');

	// rekap nilai
	Route::get('rekap-nilai','RekapnilaiController@nilai')->name('rekap-nilai.nilai');

	//kas kecil master 
	Route::get('kas-kecil', 'KaskecilController@index')->name('kaskecil');
	Route::get('kas-kecil-guru', 'KaskecilController@indexguru')->name('kaskecilguru');
	Route::post('kas-kecil', 'KaskecilController@tambah');
	Route::get('/kas-kecil/hapus/{id}',"KaskecilController@hapus")->name('hapuskaskecil');
	Route::get('/kas-kecil/edit/{id}',"KaskecilController@editkaskecil")->name('editkaskecil');
	Route::post('/kas-kecil/edit/{id}',"KaskecilController@konfirmasieditkaskecil");
	Route::get('buku-kas-kecil-guru/{id}', 'KaskecilController@bukukaskecilguru')->name('bukukaskecilguru');
	Route::get('jurnal-kas-kecil-guru/{id}', 'KaskecilController@jurnalkaskecilguru')->name('jurnalkaskecilguru');

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
	Route::get('/kas-kecil/serahkanjurnalkaskecil/{id}',"KaskecilController@serahkanjurnalkaskecil")->name('serahkanjurnalkaskecil');
	
	//kas kecil buku
	Route::get('/kas-kecil/bukukaskecil/{id}',"KaskecilController@bukukaskecil")->name('bukukaskecil');
	Route::post('/kas-kecil/bukukaskecil/{id}',"KaskecilController@simpanbukukaskecil");
	Route::get('/kas-kecil/serahkanbukukaskecil/{id}',"KaskecilController@serahkanbukukaskecil")->name('serahkanbukukaskecil');
	
});