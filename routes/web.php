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

//main route
route::resource('pegawai','PegawaiController');
route::resource('penilaian','PenilaianController');

//rest route
Route::get('/restpegawai','RestPegawaiController@index');
Route::get('/restpegawai/{nip}','RestPegawaiController@show');
Route::post('/restpegawai/store','RestPegawaiController@store');
Route::post('/restpegawai/update/{nip}','RestPegawaiController@update');
Route::post('/restpegawai/delete/{nip}','RestPegawaiController@destroy');

Route::get('/restpenilaian','RestPenilaianController@index');
Route::get('/restpenilaian/{nip}','RestPenilaianController@show');
Route::post('/restpenilaian/store','RestPenilaianController@store');
Route::post('/restpenilaian/update/{nip}','RestPenilaianController@update');
Route::post('/restpenilaian/delete/{nip}','RestPenilaianController@destroy');

//andro route
Route::put('/restpegawai','RestPegawaiController@update');
Route::delete('/restpegawai','RestPegawaiController@destroy');

//utility route
Route::get('select2-autocomplete', 'Select2AutocompleteController@layout');
Route::get('select2-autocomplete-ajax', 'Select2AutocompleteController@dataAjax');

Route::get('/', function () {
    return view('welcome');
});
