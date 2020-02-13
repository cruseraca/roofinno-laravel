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

Route::get('/', function () {
    return view('welcome');
});

//Dashboard Sidemenu
//==================
    //Dashboard Utama
Route::get('/dashboard','DashboardController@index');
Route::get('/dashboard/realtime_grafik','DashboardController@realtime_grafik');
Route::get('/dashboard/realtime_konsProd','DashboardController@realtime_konsprod');
    //Dashboard Penjadwalan
    Route::get('/dashboard/penjadwalan', 'DashboardController@penjadwalan');

Route::get('/get-post-chart-data','ChartDataController@getMonthlyPostData');