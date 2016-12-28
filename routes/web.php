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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix'=>'tracking', 'middleware'=>['auth']], function () {

	Route::resource('kategori', 'KategoriController');

	Route::resource('tugas', 'TugasController');
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

});
