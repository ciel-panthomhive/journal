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

Route::get('/', function () {
    return view('welcome');

    // auth()->user()->assignRole('writer');

    // if (auth()->user()->hasRole('writer')) {
    //     return 'Oke';
    // }

    // $role = Role::find(2);

    // $role->syncPermissions('delete post', 'edit post', 'add post', 'writer post');
    // dd($role->hasPermissionTo('edit post'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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
Route::post('subkategori/new', 'App\Http\Controllers\SubkategoriController@new')->name('subkategori.new');
Route::get('/subkategori/edit/{id}', 'App\Http\Controllers\SubkategoriController@edit')->name('subkategori.edit');
Route::put('/subkategori/update/{id}', 'App\Http\Controllers\SubkategoriController@update')->name('subkategori.update');
Route::get('/subkategori/delete/{id}', 'App\Http\Controllers\SubkategoriController@delete')->name('subkategori.delete');

//admin-User
Route::get('/user', 'App\Http\Controllers\UserController@index')->name('user');
Route::get('/user/add', 'App\Http\Controllers\UserController@add')->name('user.add');
Route::post('user/new', 'App\Http\Controllers\UserController@new')->name('user.new');
Route::get('/user/delete/{id}', 'App\Http\Controllers\UserController@delete')->name('user.delete');


//redaktur
Route::get('/publish', 'App\Http\Controllers\ArtikelRedakturController@publish')->name('publish');
Route::get('/myartikel', 'App\Http\Controllers\ArtikelRedakturController@myartikel')->name('myartikel');

//redaktur-headline
Route::get('/headline', 'App\Http\Controllers\HeadlineController@index')->name('headline');
Route::get('/headline/edit/{id}', 'App\Http\Controllers\HeadlineController@edit')->name('headline.edit');
Route::put('/headline/update/{id}', 'App\Http\Controllers\HeadlineController@update')->name('headline.update');
