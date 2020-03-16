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
Route::get('/dashboard', 'DashboardController@index');
Route::get('/dashboard/penghematan', "DashboardController@penghematan");
Route::get('/dashboard/laporan', "DashboardController@laporan");
Route::get('/dashboard/realtime_grafik', 'DashboardController@realtime_grafik');
Route::get('/dashboard/realtime_konsProd', 'DashboardController@realtime_konsprod');
Route::get('/test', 'DashboardController@getRealtimeData');

//Dashboard Konsumsi
Route::get('/dashboard/konsumsi', 'KonsumsiController@index');
Route::get('/dashboard/konsumsi/get-realtime-data', 'KonsumsiController@getRealtimeKonsumsi');

//Dashboard Penjadwalan
Route::get('/dashboard/penjadwalan', 'DashboardController@penjadwalan');
Route::get('/dashboard/penjadwalan/update', 'DashboardController@updateStatusSensor')->name('sensor.update.status');

//Dashboard Performa
Route::get('/dashboard/performa', 'DashboardController@performa');

//Dashboard Produksi
Route::get('/dashboard/produksi', 'ProduksiController@index');
Route::get('/dashboard/produksi/get-realtime-data', 'ProduksiController@getRealtimeProduksi');

Route::get('/get-post-chart-data', 'ChartDataController@getMonthlyPostData');

//Post Data from Hardware
// Route::get('/esp8266/post','HardwareController@postData');
// Route::get('/esp8266/post_kons','HardwareController@postKons');

//Get Data for Hardware
Route::get('/esp8266/get_status_sensor', 'HardwareController@getStatusSensor');
