<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();
// authentication routes
Auth::routes();

/*
|
| public routes
|
|
*/
Route::get('/', 'HomeController@index')->name('home')->middleware('guest');

// test
Route::get('test', 'Test@index')->name('test')->middleware('guest');

// produk
Route::get('product/promo', 'Product\Promo@index')->name('promo')->middleware('remember', 'guest');
Route::get('product/promo/detail/{id}', 'Product\Promo@detail')->name('promodetail')->middleware('guest');
Route::get('product/kendaraan', 'Product\Kendaraan@index')->name('kendaraan')->middleware('guest');
Route::get('product/pinjaman_dana', 'Product\PinjamanDana@index')->name('pinjamandana')->middleware('guest');
Route::get('product/simulasi_kredit', 'Product\SimulasiKredit@index')->name('simulasikredit')->middleware('guest');
Route::get('product/umrah', 'Product\Umrah@index')->name('umrah')->middleware('guest');

// profil
Route::get('profile/about', 'AboutController@index')->name('about')->middleware('guest');
Route::get('profile/visi-misi', 'Profile\VisiController@index')->name('visimisi')->middleware('guest');


Route::get('career', 'CareerController@index')->name('career');
Route::get('contact', 'ContactController@index')->name('contact');
Route::get('network', 'NetworkController@index')->name('network');

/*
|
| user routes
|
|
*/
Route::get('dashboard', 'DashboardController@index')
    ->name('user.dashboard');

/*
|
| admin routes
|
|
*/
Route::get('admin/dashboard', 'DashboardController@adminDashboard')
    ->name('admin.dashboard')
    ->middleware('is_admin');
// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
