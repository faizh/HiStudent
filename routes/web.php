<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/login','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout');


Route::group(['middleware'=>['auth','checkLevel:admin']],function(){
	Route::get('/siswa','SiswaController@index');
	Route::post('/siswa/create','SiswaController@create');
	Route::get('/siswa/{siswa}/edit','SiswaController@edit');
	Route::post('/siswa/{siswa}/update','SiswaController@update');
	Route::get('/siswa/{siswa}/delete','SiswaController@delete');
	Route::get('/siswa/{siswa}/profile','SiswaController@profile');
	Route::post('/siswa/{id}/addnilai','SiswaController@addnilai');
	Route::get('/siswa/{siswa}/{idmapel}/deletenilai', 'SiswaController@deletenilai');
	Route::get('/siswa/exportexcel','SiswaController@exportExcel');
	Route::get('/siswa/exportpdf','SiswaController@exportPdf');

	Route::get('/guru','GuruController@index');
	Route::post('/guru/create','GuruController@create');
	Route::get('/guru/{guru}/profile','GuruController@profile');	
	Route::get('/guru/{guru}/edit','GuruController@edit');
	Route::post('/guru/{guru}/update','GuruController@update');
	Route::get('/guru/{guru}/delete','GuruController@delete');
	Route::get('/guru/exportexcel','GuruController@exportExcel');
	Route::get('/guru/exportpdf','GuruController@exportPdf');

	Route::get('/mapel','MapelController@index');
	Route::post('/mapel/create','MapelController@create');
	Route::get('/mapel/{mapel}/edit','MapelController@edit');
	Route::post('/mapel/{mapel}/update','MapelController@update');
	Route::get('/mapel/{mapel}/delete','MapelController@delete');
	Route::get('/mapel/{mapel}/profile','MapelController@profile');
	Route::get('/mapel/exportexcel','MapelController@exportExcel');
	Route::get('/mapel/exportpdf','MapelController@exportPdf');

	Route::get('/kelas','KelasController@index');
	Route::post('/kelas/create','KelasController@create');
	Route::get('/kelas/{id}/siswa','SiswaController@kelas');
	Route::get('/kelas/{kelas}/edit','KelasController@edit');
	Route::post('/kelas/{kelas}/update','KelasController@update');
	Route::get('/kelas/{kelas}/delete','KelasController@delete');

	Route::get('/jadwal','JadwalController@index');
	Route::post('/jadwal/create','JadwalController@create');

});

Route::group(['middleware'=>['auth','checkLevel:admin,siswa,guru']],function(){
	Route::get('/dashboard','DashboardController@index');
});