<?php

namespace App\Http\Controllers;

use App\KonsumsiData;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KonsumsiController extends Controller
{
    //
    public function index()
    {

        return view('konsumsi');
    }

    public function getRealtimeKonsumsi()
    {

        $jsonData['konsumsi_data'] = array();
        $jsonData['max'] = array();
        $dataKonsumsi['konsumsi_month1'] = array();
        $dataKonsumsi['konsumsi_month2'] = array();
        $dataKonsumsi['konsumsi_month3'] = array();

        $dataKonsumsi['konsumsi_week1'] = array();
        $dataKonsumsi['konsumsi_week2'] = array();
        $dataKonsumsi['konsumsi_week3'] = array();

        $dataKonsumsi['konsumsi_year1'] = array();
        $dataKonsumsi['konsumsi_year2'] = array();
        $dataKonsumsi['konsumsi_year3'] = array();

        $dataKonsumsi['konsumsi_day1'] = array();
        $dataKonsumsi['konsumsi_day2'] = array();
        $dataKonsumsi['konsumsi_day3'] = array();

        $daysample = Carbon::create(2019, 11, 25, 11, 55, 0, 'Asia/Jakarta')->startOfDay()->subHour();
        $weeksample = Carbon::create(2019, 11, 25, 11, 55, 0, 'Asia/Jakarta')->startOfDay()->startOfWeek();
        $monthsample = Carbon::create(2019, 11, 10, 11, 55, 0, 'Asia/Jakarta')->startOfMonth();
        $yearsample = Carbon::create(2019, 11, 11, 11, 11, 11, 'Asia/Jakarta')->startOfYear();
        $sizeDay = $monthsample->daysInMonth;
        for ($i = 0; $i < $sizeDay; $i++) {
            // $data_monthGrafik1 = KonsumsiDataDB::select('select * from users where active = ?', [1])

            $data_monthGrafik1 = KonsumsiData::where('IDSENSOR','=', 2)->whereBetween('ONINSERT', [$monthsample->format('Y-m-d H:i:s'), $monthsample->addDay()->format('Y-m-d H:i:s')])->sum('POWER');
            $monthsample->subDay();
            $data_monthGrafik2 = KonsumsiData::where('IDSENSOR','=', 3)->whereBetween('ONINSERT', [$monthsample->format('Y-m-d H:i:s'), $monthsample->addDay()->format('Y-m-d H:i:s')])->sum('POWER');
            $monthsample->subDay();
            $data_monthGrafik3 = KonsumsiData::where('IDSENSOR','=', 4)->whereBetween('ONINSERT', [$monthsample->format('Y-m-d H:i:s'), $monthsample->addDay()->format('Y-m-d H:i:s')])->sum('POWER');
            $status1 = !empty($data_monthGrafik1);
            $status2 = !empty($data_monthGrafik1);
            $status3 = !empty($data_monthGrafik1);
            // dd($monthsample->format('Y-m-d H:i:s'));
            if ($status1) {
                array_push($dataKonsumsi['konsumsi_month1'], $data_monthGrafik1);
            } else {
                array_push($dataKonsumsi['konsumsi_month1'], 0);
            }
            if ($status2) {
                array_push($dataKonsumsi['konsumsi_month2'], $data_monthGrafik2);
            } else {
                array_push($dataKonsumsi['konsumsi_month2'], 0);
            }
            if ($status3) {
                array_push($dataKonsumsi['konsumsi_month3'],$data_monthGrafik3);
            } else {
                array_push($dataKonsumsi['konsumsi_month3'], 0);
            }


            if($i<7){
                $data_week1 = KonsumsiData::where('IDSENSOR','=', 2)->whereBetween('ONINSERT', [$weeksample->format('Y-m-d H:i:s'), $weeksample->addDay()->format('Y-m-d H:i:s')])->sum('POWER');
                $weeksample->subDay();
                $data_week2 = KonsumsiData::where('IDSENSOR','=', 3)->whereBetween('ONINSERT', [$weeksample->format('Y-m-d H:i:s'), $weeksample->addDay()->format('Y-m-d H:i:s')])->sum('POWER');
                $weeksample->subDay();
                $data_week3 = KonsumsiData::where('IDSENSOR','=', 4)->whereBetween('ONINSERT', [$weeksample->format('Y-m-d H:i:s'), $weeksample->addDay()->format('Y-m-d H:i:s')])->sum('POWER');

                $status1 = !empty($data_week1);
                $status2 = !empty($data_week2);
                $status3 = !empty($data_week3);
    
                if ($status1) {
                    array_push($dataKonsumsi['konsumsi_week1'], $data_week1);
                } else {
                    array_push($dataKonsumsi['konsumsi_week1'], 0);
                }
                if ($status2) {
                    array_push($dataKonsumsi['konsumsi_week2'], $data_week2);
                } else {
                    array_push($dataKonsumsi['konsumsi_week2'], 0);
                }
                if ($status3) {
                    array_push($dataKonsumsi['konsumsi_week3'], $data_week3);
                } else {
                    array_push($dataKonsumsi['konsumsi_week3'], 0);
                }
            }

            if($i<12){
                $data_year1 = KonsumsiData::where('IDSENSOR','=', 2)->whereBetween('ONINSERT', [$yearsample->format('Y-m-d H:i:s'), $yearsample->addMonth()->format('Y-m-d H:i:s')])->sum('POWER');
                $yearsample->subMonth();
                $data_year2 = KonsumsiData::where('IDSENSOR','=', 3)->whereBetween('ONINSERT', [$yearsample->format('Y-m-d H:i:s'), $yearsample->addMonth()->format('Y-m-d H:i:s')])->sum('POWER');
                $yearsample->subMonth();
                $data_year3 = KonsumsiData::where('IDSENSOR','=', 4)->whereBetween('ONINSERT', [$yearsample->format('Y-m-d H:i:s'), $yearsample->addMonth()->format('Y-m-d H:i:s')])->sum('POWER');

                $status1 = !empty($data_year1);
                $status2 = !empty($data_year2);
                $status3 = !empty($data_year2);

                if ($status1) {
                    array_push($dataKonsumsi['konsumsi_year1'], $data_year1);
                } else {
                    array_push($dataKonsumsi['konsumsi_year1'], 0);
                }
                if ($status2) {
                    array_push($dataKonsumsi['konsumsi_year2'], $data_year2);
                } else {
                    array_push($dataKonsumsi['konsumsi_year2'], 0);
                }
                if ($status3) {
                    array_push($dataKonsumsi['konsumsi_year3'], $data_year3);
                } else {
                    array_push($dataKonsumsi['konsumsi_year3'], 0);
                }

            }
            if($i<=12){
                $data_day1 = KonsumsiData::where('IDSENSOR','=', 2)->whereBetween('ONINSERT', [$daysample->format('Y-m-d H:i:s'), $daysample->addHour()->format('Y-m-d H:i:s')])->sum('POWER');
                $daysample->subHour();
                $data_day2 = KonsumsiData::where('IDSENSOR','=', 3)->whereBetween('ONINSERT', [$daysample->format('Y-m-d H:i:s'), $daysample->addHour()->format('Y-m-d H:i:s')])->sum('POWER');
                $daysample->subHour();
                $data_day3 = KonsumsiData::where('IDSENSOR','=', 4)->whereBetween('ONINSERT', [$daysample->format('Y-m-d H:i:s'), $daysample->addHour()->format('Y-m-d H:i:s')])->sum('POWER');

                $status1 = !empty($data_day1);
                $status2 = !empty($data_day2);
                $status3 = !empty($data_day2);

                if ($status1) {
                    array_push($dataKonsumsi['konsumsi_day1'], $data_day1);
                } else {
                    array_push($dataKonsumsi['konsumsi_day1'], 0);
                }
                if ($status2) {
                    array_push($dataKonsumsi['konsumsi_day2'], $data_day2);
                } else {
                    array_push($dataKonsumsi['konsumsi_day2'], 0);
                }
                if ($status3) {
                    array_push($dataKonsumsi['konsumsi_day3'], $data_day3);
                } else {
                    array_push($dataKonsumsi['konsumsi_day3'], 0);
                }

            }

           
        }

        array_push($jsonData['konsumsi_data'], $dataKonsumsi);

        
        $maxday1 = max($dataKonsumsi['konsumsi_day1']);
        $maxday2 = max($dataKonsumsi['konsumsi_day2']);
        $maxday3 = max($dataKonsumsi['konsumsi_day3']);

        $max = max($maxday1, $maxday2);
        $max = max($max, $maxday3);
        array_push($jsonData['max'], $max);

        $maxweek1 = max($dataKonsumsi['konsumsi_week1']);
        $maxweek2 = max($dataKonsumsi['konsumsi_week2']);
        $maxweek3 = max($dataKonsumsi['konsumsi_week3']);

        $max = max($maxweek1, $maxweek2);
        $max = max($max, $maxweek3);
        array_push($jsonData['max'], $max);

        $maxmonth1 = max($dataKonsumsi['konsumsi_month1']);
        $maxmonth2 = max($dataKonsumsi['konsumsi_month2']);
        $maxmonth3 = max($dataKonsumsi['konsumsi_month3']);

        $max = max($maxmonth1, $maxmonth2);
        $max = max($max, $maxmonth3);
        array_push($jsonData['max'], $max);

        $maxyear1 = max($dataKonsumsi['konsumsi_year1']);
        $maxyear2 = max($dataKonsumsi['konsumsi_year2']);
        $maxyear3 = max($dataKonsumsi['konsumsi_year3']);

        $max = max($maxyear1, $maxyear2);
        $max = max($max, $maxyear3);
        array_push($jsonData['max'], $max);

        return $jsonData;
    }
}
