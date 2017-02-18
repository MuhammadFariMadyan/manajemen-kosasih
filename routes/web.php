<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');


Route::get('/telegram', 'HomeController@telegram');

Route::group(['prefix'=>'tracking', 'middleware'=>['auth']], function () {

	Route::resource('kategori', 'KategoriController');

	Route::resource('lokasi', 'LokasiController');

	Route::resource('otoritas', 'OtoritasController');

	Route::resource('tugas', 'TugasController');

	Route::resource('user', 'UserController');

	Route::post('/komentar',[
'middleware' => ['auth'],
'as' => 'tugas.komentar',
'uses' => 'TugasController@komentar'
] );

		Route::get('/sedang-dikerjakan/{id}',[
'middleware' => ['auth'],
'as' => 'tugas.dikerjakan',
'uses' => 'TugasController@sedang_dikerjakan'
] );

		Route::get('/lokasi-tugas/{id}',[
'middleware' => ['auth'],
'as' => 'tugas.lokasi',
'uses' => 'TugasController@lokasi_tugas'
] );

		Route::get('/status-tugas/{id}',[
'middleware' => ['auth'],
'as' => 'tugas.status',
'uses' => 'TugasController@status_tugas'
] );

		Route::get('/petugas-tugas/{id}',[
'middleware' => ['auth'],
'as' => 'tugas.petugas',
'uses' => 'TugasController@petugas_tugas'
] );

		Route::get('/menugaskan-tugas/{id}',[
'middleware' => ['auth'],
'as' => 'tugas.menugaskan',
'uses' => 'TugasController@menugaskan_tugas'
] );

		Route::get('/kategori-tugas/{id}',[
'middleware' => ['auth'],
'as' => 'tugas.kategori',
'uses' => 'TugasController@kategori_tugas'
] );

		Route::get('/selesai-dikerjakan/{id}',[
'middleware' => ['auth'],
'as' => 'tugas.selesai',
'uses' => 'TugasController@selesai_dikerjakan'
] );

		Route::get('/konfirmasi-dikerjakan/{id}',[
'middleware' => ['auth'],
'as' => 'tugas.konfirmasi',
'uses' => 'TugasController@konfirmasi_kerjaan'
] );

		Route::get('/belum-selesai/{id}',[
'middleware' => ['auth'],
'as' => 'tugas.belum',
'uses' => 'TugasController@belum_selesai'
] );

		Route::put('/belum-selesai{id}',[
'middleware' => ['auth'],
'as' => 'tugas.belum-update',
'uses' => 'TugasController@belum_selesai_update'
] );

		Route::put('/sudah-selesai{id}',[
'middleware' => ['auth'],
'as' => 'tugas.selesai-update',
'uses' => 'TugasController@selesai_update'
] );

});
