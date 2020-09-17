<?php

use Illuminate\Http\Request;
use App\KonsumsiData;
use App\Data;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/esp8266/post','HardwareController@postData');
Route::get('/esp8266/post',function(Request $request){
    $timestamp = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s');
    $data = new Data;
    $data->IDUSER = $request->IDUSER;
    $data->POWER_PS = $request->POWER_PS;
    $data->POWER_LOAD = $request->POWER_LOAD;
    $data->ONINSERT = $timestamp;
    $data->timestamps = false;

    $data->save();
    return "OK";
});
// Route::get('/esp8266/post_kons','HardwareController@postKons');
Route::get('/esp8266/post_kons',function (Request $request){
    $timestamp = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s');
    $data = new KonsumsiData;
    $data->IDUSER = $request->IDUSER;
    $data->IDSENSOR = $request->IDSENSOR;
    $data->POWER = $request->POWER;
    $data->ONINSERT = $timestamp;
    $data->timestamps = false;

    $data->save();
    return "OK";
});