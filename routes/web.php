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
Route::get('/', 'HomeController@index')->name('home')->middleware('guest','visitor');

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

// news
Route::get('news', 'NewsController@index')->name('news')->middleware('remember', 'guest');
Route::get('news/{id}', 'NewsController@detail')->name('newsdetail')->middleware('guest');

Route::get('career', 'CareerController@index')->name('career');
Route::get('contact', 'ContactController@index')->name('contact')->middleware('guest','visitor');
Route::get('network', 'NetworkController@index')->name('network');

// pengajuan
Route::post('pengajuan', 'PengajuanController@index')->name('pengajuan');
/*
|
| user routes
|
|
*/
// Route::get('dashboard', 'DashboardController@index')
//     ->name('user.dashboard');

/*
|
| admin routes
|
|
*/
Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    // dashboard
    // admin.dashboard
    Route::get('/dashboard', 'Admin\DashboardController@index')
    ->name('dashboard');
    Route::get('/dashboard-excel', 'Admin\DashboardController@reportexcel')
    ->name('reportexcel');
    // page
    // admin.page
    Route::prefix('/page')->name('page.')->group(function () {
        // home
        // admin.page.home
        Route::prefix('/home')->name('home.')->group(function () {
            // Page
            // Page -> Home
            
            Route::get('/index', 'Admin\CfgHomeController@index')
                ->name('index');

            // Page -> Home -> Slider
            // admin.page.home.slider
            Route::prefix('/slider')->name('slider.')->group(function () {

                Route::get('/add', 'Admin\CfgHomeController@createSlider')
                ->name('add');
                Route::post('/store', 'Admin\CfgHomeController@storeSlider')
                ->name('store');
                Route::get('/{slider}/detail', 'Admin\CfgHomeController@detailSlider')
                ->name('detail');
                Route::put('/{slider}/update', 'Admin\CfgHomeController@updateSlider')
                ->name('update');
                Route::post('/{id}/updateImage', 'Admin\CfgHomeController@updateSliderImage')
                ->name('updateImage');
                Route::delete('/{slider}/delete', 'Admin\CfgHomeController@destroySlider')
                ->name('delete');
                Route::delete('/deleteAll/{idx}', 'Admin\CfgHomeController@deleteSliderAll')
                ->name('delete-all');
            });
            
        });

        // Page -> Product
        Route::get('/product', 'Admin\CfgHomeController@index')
        ->name('product');

        // Page -> Profile
        Route::get('/profile', 'Admin\CfgHomeController@index')
            ->name('profile');
    });

    // Admin -> Post
    Route::prefix('/post')->name('post.')->group(function () {
        Route::get('/index', 'Admin\CfgPostNewsController@index')
        ->name('index');
        Route::get('/add', 'Admin\CfgPostNewsController@createPost')
        ->name('add');
        Route::post('/store', 'Admin\CfgPostNewsController@storePost')
        ->name('store');
        Route::get('/{news}/detail', 'Admin\CfgPostNewsController@detailPost')
        ->name('detail');
        Route::put('/{news}/update', 'Admin\CfgPostNewsController@updatePost')
        ->name('update');
        Route::post('/{id}/updateImage', 'Admin\CfgPostNewsController@updatePostImage')
        ->name('updateImage');
        Route::delete('/{news}/delete', 'Admin\CfgPostNewsController@destroyPost')
        ->name('delete');
        Route::delete('/deleteAll/{idx}', 'Admin\CfgPostNewsController@deletePostAll')
        ->name('delete-all');
    });

    // Admin -> Setting
    // admin.setting
    Route::prefix('/setting')->name('setting.')->group(function () {
        //  Setting -> meta
        Route::get('/meta', 'Admin\CfgHomeController@index')
            ->name('meta');
        // Setting -> system
        Route::get('/system', 'Admin\SystemController@index')
            ->name('system');
    });

});





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
