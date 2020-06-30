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
Route::get('/', 'HomeController@index')->name('home');
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
