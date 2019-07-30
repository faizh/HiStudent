<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/siswa/{id}/editnilai','ApiController@editnilai');
Route::post('/jadwal/{id}/editjadwalrpl1','ApiController@editjadwalrpl1');
Route::post('/jadwal/{id}/editjadwalrpl2','ApiController@editjadwalrpl2');
Route::post('/jadwal/{id}/editjadwalrpl3','ApiController@editjadwalrpl3');
Route::post('/jadwal/{id}/editjadwalrpl4','ApiController@editjadwalrpl4');