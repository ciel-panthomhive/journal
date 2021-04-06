<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

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

Route::get('/', [App\Http\Controllers\WishlistController::class, 'index'])->name('wishlist');
Route::get('/artikel/{id}', [App\Http\Controllers\WishlistController::class, 'halaman_artikel'])->name('artikel-wishlist');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

//admin-kategori
Route::get('/kategori', 'App\Http\Controllers\KategoriController@index')->name('kategori');
Route::get('/kategori/add', 'App\Http\Controllers\KategoriController@add')->name('kategori.add');
Route::post('kategori/new', 'App\Http\Controllers\KategoriController@new')->name('kategori.new');
Route::get('/kategori/edit/{id}', 'App\Http\Controllers\KategoriController@edit')->name('kategori.edit');
Route::put('/kategori/update/{id}', 'App\Http\Controllers\KategoriController@update')->name('kategori.update');
Route::get('/kategori/delete/{id}', 'App\Http\Controllers\KategoriController@delete')->name('kategori.delete');

//admin-subkategori
Route::get('/subkategori', 'App\Http\Controllers\SubkategoriController@index')->name('subkategori');
Route::get('/subkategori/add', 'App\Http\Controllers\SubkategoriController@add')->name('subkategori.add');
Route::post('/subkategori/new', 'App\Http\Controllers\SubkategoriController@new')->name('subkategori.new');
Route::get('/subkategori/edit/{id}', 'App\Http\Controllers\SubkategoriController@edit')->name('subkategori.edit');
Route::put('/subkategori/update/{id}', 'App\Http\Controllers\SubkategoriController@update')->name('subkategori.update');
Route::get('/subkategori/delete/{id}', 'App\Http\Controllers\SubkategoriController@delete')->name('subkategori.delete');

//admin-User
Route::get('/user', 'App\Http\Controllers\UserController@index')->name('user');
Route::get('/user/add', 'App\Http\Controllers\UserController@add')->name('user.add');
Route::post('user/new', 'App\Http\Controllers\UserController@new')->name('user.new');
Route::get('/user/delete/{id}', 'App\Http\Controllers\UserController@delete')->name('user.delete');


//route utama
Route::get('/publish', 'App\Http\Controllers\DashboardController@publish')->name('publish');
Route::get('/myartikel', 'App\Http\Controllers\DashboardController@myartikel')->name('myartikel');
Route::get('/myartikel/add', 'App\Http\Controllers\ArtikelRedakturController@add')->name('artikelredaktur.add');
Route::get('/publish-jurnalis', 'App\Http\Controllers\DashboardController@publishJurnalis')->name('publish.jurnalis');

//artikel redaktur
Route::post('/artikel/newPublish', 'App\Http\Controllers\ArtikelRedakturController@newPublish')->name('artikelredaktur.new');
Route::post('/artikel/newDraft', 'App\Http\Controllers\ArtikelRedakturController@newDraft')->name('redaktur.draft');
Route::get('/artikel/edit/{id}', 'App\Http\Controllers\ArtikelRedakturController@edit')->name('artikelredaktur.edit');
Route::put('/artikel/update/{id}', 'App\Http\Controllers\ArtikelRedakturController@update')->name('artikelredaktur.update');
Route::put('/artikel/updateDraft/{id}', 'App\Http\Controllers\ArtikelRedakturController@updateDraft')->name('redakturdraft.update');

//artikel jurnalis
Route::post('/artikel/newSend', 'App\Http\Controllers\ArtikelJurnalisController@newPublish')->name('artikeljurnalis.new');
Route::post('/artikel/new', 'App\Http\Controllers\ArtikelJurnalisController@newDraft')->name('artikeljurnalis.newDraft');
Route::put('/jurnalis/update/{id}', 'App\Http\Controllers\ArtikelJurnalisController@updatePublish')->name('artikeljurnalis.update');
Route::put('/jurnalis/upDraft/{id}', 'App\Http\Controllers\ArtikelJurnalisController@updateDraft')->name('artikeljurnalis.upDraft');

//data pribadi
Route::get('/changepass', 'App\Http\Controllers\ProfilController@change')->name('change');
Route::get('/profil/{id}', 'App\Http\Controllers\ProfilController@edit')->name('profil');
Route::put('/profil/update/{id}', 'App\Http\Controllers\ProfilController@update')->name('profil.update');
Route::post('change-password', 'App\Http\Controllers\ProfilController@changePass')->name('change.password');

//verifikasi
Route::get('/read/{id}', 'App\Http\Controllers\RedakturController@view')->name('read');
Route::get('/verifikasi/edit/{id}', 'App\Http\Controllers\RedakturController@edit')->name('verifikasi.edit');
Route::put('/verifikasi/update/{id}', 'App\Http\Controllers\RedakturController@update')->name('verifikasi.update');
Route::get('/tolak/{id}', 'App\Http\Controllers\RedakturController@tolak')->name('tolak');
Route::put('/alasan/{id}', 'App\Http\Controllers\RedakturController@alasan')->name('alasan');
Route::put('/publish/{id}', 'App\Http\Controllers\RedakturController@publish')->name('verifikasi.publish');
