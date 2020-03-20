<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Data;
use DateTime;
use Illuminate\Support\Facades\Log;
use App\KonsumsiData;

class ProduksiController extends Controller
{
    //index
    public function index()
    {

        $datetime = Carbon::now('Asia/Jakarta');


        // dd($datetime);
        return view('produksi', ['datetime' => $datetime]);
    }

    public function getRealtimeProduksi()
    {
        $power_data['power_month'] = array();
        $power_data['power_hour'] = array();
        $power_data['power_week'] = array();
        $power_data['power_day'] = array();
        $power_data['time'] = array();
        $power_data['time_day'] = array();
        $power_data['max'] = array();
        $timesample = Carbon::now('Asia/Jakarta')->startOfDay()->subHour();
        // dd($timesample->format('Y-m-d H:i:s'));
        $daysample = Carbon::now('Asia/Jakarta')->startOfDay()->startOfWeek();
        $monthsample = Carbon::now('Asia/Jakarta')->startOfMonth();
        $monthsample1 = Carbon::now('Asia/Jakarta')->startOfMonth()->subDay();
        $yearsample = Carbon::now('Asia/Jakarta')->startOfYear();
        // dd($monthsample1);

        for ($i = 0; $i < $monthsample1->daysInMonth; $i++) {

            $data_month = Data::where('ONINSERT', '>=', $monthsample->format('Y-m-d H:i:s'))->where('ONINSERT', '<=', $monthsample->addDay()->format('Y-m-d H:i:s'))->sum('POWER_PS');
            if (!empty($data_month)) {
                array_push($power_data['power_day'], round($data_month / 1000, 2));
                array_push($power_data['time_day'], $monthsample1->addDay()->day);
            } else {
                array_push($power_data['power_day'], 0);
                array_push($power_data['time_day'], $monthsample1->addDay()->day);
            }

            if($i<=24){
                $data_hour = Data::where('ONINSERT', '>=', $timesample->format('Y-m-d H:i:s'))->where('ONINSERT', '<=', $timesample->addHour()->format('Y-m-d H:i:s'))->sum('POWER_PS');
                if ($data_hour == 0) {
                    array_push($power_data['power_hour'], 0);
                    array_push($power_data['time'], $timesample->format('H:i'));
                } else {
                    // $data_count = Data::where('ONINSERT','>=',$timesample->subHour()->format('Y-m-d H:i:s'))->where('ONINSERT','<=',$timesample->addHour()->format('Y-m-d H:i:s'))->where('POWER_PS','<>',0)->count();
                    array_push($power_data['power_hour'], round($data_hour / 1000, 2));
                    array_push($power_data['time'], $timesample->format('H:i'));
                }
            }

            if ($i < 7) {
                $data_week = Data::where('ONINSERT', '>=', $daysample->format('Y-m-d H:i:s'))->where('ONINSERT', '<=', $daysample->addDay()->format('Y-m-d H:i:s'))->sum('POWER_PS');
                if (!empty($data_week)) array_push($power_data['power_week'], round($data_week / 1000, 2));
                else array_push($power_data['power_week'], 0);
            }

            if ($i < 12) {
                $data = Data::where('ONINSERT', '>=', $yearsample->format('Y-m-d H:i:s'))->where('ONINSERT', '<=', $yearsample->addMonth()->format('Y-m-d H:i:s'))->sum('POWER_PS');
                if ($data == 0) {
                    array_push($power_data['power_month'], 0);
                } else {
                    array_push($power_data['power_month'], round($data / 1000, 2));
                }
            }
        }

        $max_data = max($power_data['power_hour']);
        $max = round(($max_data + 10 / 2) / 10) * 10;
        array_push($power_data['max'], $max);
        $max_data = max($power_data['power_week']);
        $max = round(($max_data + 10 / 2) / 10) * 10;
        array_push($power_data['max'], $max);
        $max_data = max($power_data['power_day']);
        $max = round(($max_data + 10 / 2) / 10) * 10;
        array_push($power_data['max'], $max);
        $max_data = max($power_data['power_month']);
        $max = round(($max_data + 50 / 2) / 50) * 50;
        array_push($power_data['max'], $max);

        //sum data
        $power_data['prod'] = array();
        $waktu = Carbon::now('Asia/Jakarta');
        $waktu->minute = 0;
        $waktu->second = 0;
        $jumlah = Data::where('ONINSERT', '>=', $waktu->subHour()->format('Y-m-d H:i:s'))->where('ONINSERT', '<=', $waktu->addHour()->format('Y-m-d H:i:s'))->sum('POWER_PS');
        array_push($power_data['prod'], round($jumlah / 1000, 2));
        $waktu->startOfDay();
        $jumlah = Data::where('ONINSERT', '>=', $waktu->format('Y-m-d H:i:s'))->where('ONINSERT', '<=', $waktu->addDay()->format('Y-m-d H:i:s'))->sum('POWER_PS');
        array_push($power_data['prod'], round($jumlah / 1000, 2));
        $waktu->subDay()->startOfWeek();
        $jumlah = Data::where('ONINSERT', '>=', $waktu->format('Y-m-d H:i:s'))->where('ONINSERT', '<=', $waktu->endOfWeek()->format('Y-m-d H:i:s'))->sum('POWER_PS');
        array_push($power_data['prod'], round($jumlah / 1000, 2));
        $waktu->subWeek()->startOfMonth();
        $jumlah = Data::where('ONINSERT', '>=', $waktu->format('Y-m-d H:i:s'))->where('ONINSERT', '<=', $waktu->endOfMonth()->format('Y-m-d H:i:s'))->sum('POWER_PS');
        array_push($power_data['prod'], round($jumlah / 1000, 2));
        $waktu->subMonth()->startOfYear();
        $jumlah = Data::where('ONINSERT', '>=', $waktu->format('Y-m-d H:i:s'))->where('ONINSERT', '<=', $waktu->endOfYear()->format('Y-m-d H:i:s'))->sum('POWER_PS');
        array_push($power_data['prod'], round($jumlah / 1000, 2));

        return $power_data;
    }
}
