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

Auth::routes();
Route::post('/login','Auth\LoginController@loginpost')->name('login-post');
Route::group(['middleware' => ['web']], function () {
    Route::get('/logout','Auth\LoginController@logoutpost')->name('logout-post');
});
Route::get('/', 'HomeController@index')->name('home');

//acara
Route::get('/acara', 'AcaraController@index')->name('acara.index');
Route::get('/acara/approve/{id}', 'AcaraController@approve')->name('acara.approve');
//mahasiswa
Route::get('/mahasiswa','MahasiswaController@index')->name('mahasiswa.index');
// pengurus acara
Route::get('/acara-pengurus', 'AcaraPengurusController@index')->name('acara-pengurus.index');
Route::get('/acara-pengurus/create','AcaraPengurusController@create')->name('acara-pengurus.create-page');
Route::get('/acara-pengurus/update/{id}','AcaraPengurusController@edit')->name('acara-pengurus.edit-page');
Route::post('/acara-pengurus/create','AcaraPengurusController@store')->name('acara-pengurus.create');
Route::post('/acara-pengurus/update','AcaraPengurusController@update')->name('acara-pengurus.edit');
Route::post('/acara-pengurus/delete','AcaraPengurusController@delete')->name('acara-pengurus.delete');
Route::get('/acara-pengurus/view/{id}','AcaraPengurusController@view')->name('acara-pengurus.view');

Route::group(['middleware' => ['pengurus']], function () {
    Route::get('/acara/{id}/pendaftar', 'AcaraController@pendaftar')->name('home');
});


