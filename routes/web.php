<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
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
Route::get('product/promo/delete/{id}', 'Product\Promo@delete')->name('promo.delete')->middleware('guest');
Route::get('product/promo/restore/{id}', 'Product\Promo@restore')->name('promo.restore')->middleware('guest');

Route::get('product/promo/detail/{id}', 'Product\Promo@detail')->name('promodetail')->middleware('guest');
Route::get('product/kendaraan', 'Product\Kendaraan@index')->name('kendaraan')->middleware('guest');
Route::get('product/pinjaman_dana', 'Product\PinjamanDana@index')->name('pinjamandana')->middleware('guest');
Route::get('product/simulasi_kredit', 'Product\SimulasiKredit@index')->name('simulasikredit')->middleware('guest');
Route::get('product/umrah', 'Product\Umrah@index')->name('umrah')->middleware('guest');

// profil
Route::get('profile/about', 'Profile\AboutController@index')->name('profile.about')->middleware('guest');
Route::get('profile/visi-misi', 'Profile\VisiController@index')->name('profile.visimisi')->middleware('guest');
Route::get('profile/team-management', 'Profile\TeamManagementController@index')->name('profile.teammanagement')->middleware('guest');
Route::get('profile/pemegang-saham', 'Profile\PemegangSahamController@index')->name('profile.pemegangsaham')->middleware('guest');



Route::get('career', 'CareerController@index')->name('career');
Route::get('contact', 'ContactController@index')->name('contact')->middleware('guest');
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
Route::get('admin/dashboard', 'Admin\DashboardController@index')
    ->name('admin.dashboard')
    ->middleware('auth', 'is_admin');

// Page
Route::get('admin/page/home', 'Admin\CfgHomeController@index')
    ->name('admin.page.home')
    ->middleware('auth', 'is_admin');

Route::get('admin/page/home/add', 'Admin\CfgHomeController@add')
    ->name('admin.page.home.add')
    ->middleware('auth', 'is_admin');

Route::get('admin/page/product', 'Admin\CfgHomeController@index')
    ->name('admin.page.product')
    ->middleware('auth', 'is_admin');

Route::get('admin/page/profile', 'Admin\CfgHomeController@index')
    ->name('admin.page.profile')
    ->middleware('auth', 'is_admin');

// Post
Route::get('admin/post', 'Admin\CfgHomeController@index')
    ->name('admin.post')
    ->middleware('auth', 'is_admin');

// Setting
Route::get('admin/setting/meta', 'Admin\CfgHomeController@index')
    ->name('admin.setting.meta')
    ->middleware('auth', 'is_admin');

Route::get('admin/setting/system', 'Admin\SystemController@index')
    ->name('admin.setting.system')
    ->middleware('auth', 'is_admin');
// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// clear cache
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
});


// Language
Route::get('language/{language}', function ($language) {
    Session()->put('locale', $language);

    return redirect()->back();
})->name('language');


// Logout
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
