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

Route::get('/', 'LicenseController@index');
Route::get('/license/reload/list', 'LicenseController@reload');
Route::post('/send-report', 'LicenseController@send_report');
// Route::post('/license/update', 'LicenseController@update_license');
Route::match(['post', 'put'], '/license/update', 'LicenseController@update_license');
// Route::resource('licenses','LicenseController');
