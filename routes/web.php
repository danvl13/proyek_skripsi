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
Route::get('/', function(){
    return redirect()->route('acara.index');
})->name('home');

//acara
Route::get('/acara', 'AcaraController@index')->name('acara.index');
Route::get('/acara/approve/{id}', 'AcaraController@approve')->name('acara.approve');
Route::get('/acara/view/{id}','AcaraController@view')->name('acara.view');
Route::get('/acara-diikuti/view/{id}','AcaraController@lihat')->name('acara-diikuti.view');
Route::post('/acara/pendaftaran', 'AcaraController@pendaftar')->name('acara.daftar');
Route::get('/acara-diikuti', 'AcaraController@diikuti')->name('acara-diikuti.index');
//mahasiswa
Route::get('/mahasiswa','MahasiswaController@index')->name('mahasiswa.index');
Route::get('/mahasiswa/create','MahasiswaController@create')->name('mahasiswa.create-page');
Route::get('/mahasiswa/update/{id}','MahasiswaController@edit')->name('mahasiswa.edit-page');
Route::post('/mahasiswa/create','MahasiswaController@store')->name('mahasiswa.create');
Route::post('/mahasiswa/update','MahasiswaController@update')->name('mahasiswa.edit');
Route::get('/mahasiswa/profile','MahasiswaController@profile')->name('mahasiswa.profile');
Route::get('/mahasiswa/view/{id}','MahasiswaController@view')->name('mahasiswa.view');
Route::get('/mahasiswa/ganti/{id}', 'MahasiswaController@ganti')->name('mahasiswa.ganti');
Route::post('/mahasiswa/ganti-password/', 'MahasiswaController@gantiPassword')->name('mahasiswa.ganti-password');
// pengurus acara
Route::get('/acara-pengurus', 'AcaraPengurusController@index')->name('acara-pengurus.index');
Route::get('/acara-pengurus/create','AcaraPengurusController@create')->name('acara-pengurus.create-page');
Route::get('/acara-pengurus/update/{id}','AcaraPengurusController@edit')->name('acara-pengurus.edit-page');
Route::post('/acara-pengurus/create','AcaraPengurusController@store')->name('acara-pengurus.create');
Route::post('/acara-pengurus/update','AcaraPengurusController@update')->name('acara-pengurus.edit');
Route::post('/acara-pengurus/delete','AcaraPengurusController@delete')->name('acara-pengurus.delete');
Route::get('/acara-pengurus/view/{id}','AcaraPengurusController@view')->name('acara-pengurus.view');
Route::get('/acara-pengurus/hasil/{id}','AcaraPengurusController@hasil')->name('acara-pengurus.hasil');
Route::post('/acara-pengurus/terima','AcaraPengurusController@terima')->name('acara-pengurus.terima');
Route::get('/acara-pengurus/{acara}/tolak/{id}','AcaraPengurusController@tolak')->name('acara-pengurus.tolak');

//divisi
Route::get('/divisi', 'DivisiController@index')->name('divisi.index');
Route::get('/divisi/create','DivisiController@create')->name('divisi.create-page');
Route::get('/divisi/update/{id}','DivisiController@edit')->name('divisi.edit-page');
Route::post('/divisi/create','DivisiController@store')->name('divisi.create');
Route::post('/divisi/update','DivisiController@update')->name('divisi.edit');
//kategori
Route::get('/kategori', 'KategoriController@index')->name('kategori.index');
Route::get('/kategori/create','KategoriController@create')->name('kategori.create-page');
Route::get('/kategori/update/{id}','KategoriController@edit')->name('kategori.edit-page');
Route::post('/kategori/create','KategoriController@store')->name('kategori.create');
Route::post('/kategori/update','KategoriController@update')->name('kategori.edit');
//middleware
Route::group(['middleware' => ['pengurus']], function () {
    Route::get('/acara/{id}/pendaftar', 'AcaraController@pendaftar')->name('home');
});


