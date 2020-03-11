<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data;
use App\KonsumsiData;
use Carbon\Carbon;

class HardwareController extends Controller
{
    //post data
    public function postData(Request $request){
        $timestamp = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s');
        $data = new Data;
        $data->IDUSER = $request->IDUSER;
        $data->POWER_PS = $request->POWER_PS;
        $data->POWER_LOAD = $request->POWER_LOAD;
        $data->ONINSERT = $timestamp;
        $data->timestamps = false;

        $data->save();
        return $data;
    }
    
    public function postKons(Request $request){
        $timestamp = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s');
        $data = new KonsumsiData;
        $data->IDUSER = $request->IDUSER;
        $data->IDSENSOR = $request->IDSENSOR;
        $data->POWER = $request->POWER;
        $data->ONINSERT = $timestamp;
        $data->timestamps = false;

        $data->save();
        return $data;
    }

}
