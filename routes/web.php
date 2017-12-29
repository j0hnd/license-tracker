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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout');

Route::match(['GET', 'POST'], '/login', 'Auth\LoginController@login')->name('login');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/licenses', 'LicenseController@index');
    Route::get('/license/reload/list', 'LicenseController@reload');

    Route::post('/send-report', 'LicenseController@send_report');

    Route::match(['post', 'put'], '/license/update', 'LicenseController@update_license');

});

// Route::post('/license/update', 'LicenseController@update_license');
// Route::resource('licenses','LicenseController');
