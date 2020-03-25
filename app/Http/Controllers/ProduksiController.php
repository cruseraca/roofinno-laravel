<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Data;
use DateTime;
use Illuminate\Support\Facades\Log;
use App\KonsumsiData;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

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
            $monthsample->subDay();
            $countMonth = Data::where('POWER_PS', '>', 0)->where('ONINSERT', '>=', $monthsample->format('Y-m-d H:i:s'))->where('ONINSERT', '<=', $monthsample->addDay()->format('Y-m-d H:i:s'))->count();

            if (!empty($data_month)) {
                array_push($power_data['power_day'], round(($data_month/$countMonth )/1000*24, 2));
                array_push($power_data['time_day'], $monthsample1->addDay()->day);
            } else {
                array_push($power_data['power_day'], 0);
                array_push($power_data['time_day'], $monthsample1->addDay()->day);
            }

            if($i<=24){
                $data_hour = Data::where('ONINSERT', '>=', $timesample->format('Y-m-d H:i:s'))->where('ONINSERT', '<=', $timesample->addHour()->format('Y-m-d H:i:s'))->sum('POWER_PS');
                $timesample->subHour();
                $countHour = Data::where('POWER_PS','>', 0)->where('ONINSERT', '>=', $timesample->format('Y-m-d H:i:s'))->where('ONINSERT', '<=', $timesample->addHour()->format('Y-m-d H:i:s'))->count();

                if ($data_hour == 0) {
                    array_push($power_data['power_hour'], 0);
                    array_push($power_data['time'], $timesample->format('H:i'));
                } else {
                    // $data_count = Data::where('ONINSERT','>=',$timesample->subHour()->format('Y-m-d H:i:s'))->where('ONINSERT','<=',$timesample->addHour()->format('Y-m-d H:i:s'))->where('POWER_PS','<>',0)->count();
                    array_push($power_data['power_hour'], round(($data_hour/$countHour), 2));
                    array_push($power_data['time'], $timesample->format('H:i'));
                }
            }

            if ($i < 7) {
                $data_week = Data::where('ONINSERT', '>=', $daysample->format('Y-m-d H:i:s'))->where('ONINSERT', '<=', $daysample->addDay()->format('Y-m-d H:i:s'))->sum('POWER_PS');
                $daysample->subDay();
                $countWeek = Data::where('POWER_PS', '>', 0)->where('ONINSERT', '>=', $daysample->format('Y-m-d H:i:s'))->where('ONINSERT', '<=', $daysample->addDay()->format('Y-m-d H:i:s'))->count();

                if (!empty($data_week)) array_push($power_data['power_week'], round(($data_week/$countWeek)/ 1000*24, 2));
                else array_push($power_data['power_week'], 0);
            }

            if ($i < 12) {
                $data = Data::where('ONINSERT', '>=', $yearsample->format('Y-m-d H:i:s'))->where('ONINSERT', '<=', $yearsample->addMonth()->format('Y-m-d H:i:s'))->sum('POWER_PS');
                $yearsample->subMonth();
                $countYear = Data::where('POWER_PS', '>', 0)->where('ONINSERT', '>=', $yearsample->format('Y-m-d H:i:s'))->where('ONINSERT', '<=', $yearsample->addMonth()->format('Y-m-d H:i:s'))->count();
                $yearsample->subMonth();

                if ($data == 0) {
                    array_push($power_data['power_month'], 0);
                } else {
                    array_push($power_data['power_month'], round(($data/$countYear) / 1000 * $yearsample->daysInMonth, 2));
                }
                $yearsample->addMonth();
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
        $jumlahHome = Data::where('ONINSERT', '>=', $waktu->subHour()->format('Y-m-d H:i:s'))->where('ONINSERT', '<=', $waktu->addHour()->format('Y-m-d H:i:s'))->sum('POWER_LOAD');
        $home = round($jumlahHome / 1000, 2);
        
        //sum average
       $avg_ps = Data::selectRaw("DATE(ONINSERT) date, HOUR(ONINSERT) hour, AVG(POWER_PS) average")
        ->groupBy('date', 'hour')
        ->get();
        $avg_load = Data::selectRaw("DATE(ONINSERT) date, HOUR(ONINSERT) hour, AVG(POWER_LOAD) average")
        ->groupBy('date', 'hour')
        ->get();
        
       $sum_avg_ps = 0;
       $sum_avg_load = 0;

        foreach($avg_ps as $num => $values) {
            $sum_avg_ps += $values['average'];
        }
        foreach($avg_load as $num => $values) {
            $sum_avg_load += $values['average'];
        }
        //end of sum average
               
       
        $jumlah_all_ps = round($sum_avg_ps / 1000, 2);
        $jumlah_all_load = round($sum_avg_load / 1000, 2);
        
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/FirebaseKey.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://savtrik-cc04d.firebaseio.com/')
        ->create();

        $database = $firebase->getDatabase();
        $ref = $database->getReference('productionRealtime');
        $ref->set([
            //'now' => $power_data['prod'][0],
            'today' => $power_data['prod'][1],
            'week' => $power_data['prod'][2],
            'month' => $power_data['prod'][3],
            'year' => $power_data['prod'][4],
            'all_ps' => $jumlah_all_ps,
            'all_load' => $jumlah_all_load,
            'home'=> $home
        ]);
        return $power_data;
    }
}
