<?php

namespace App\Http\Controllers;

use App\KonsumsiData;
use App\Data;
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
        $dataKonsumsi['konsumsi_month_total'] = array();

        $dataKonsumsi['konsumsi_week1'] = array();
        $dataKonsumsi['konsumsi_week2'] = array();
        $dataKonsumsi['konsumsi_week3'] = array();
        $dataKonsumsi['konsumsi_week_total'] = array();

        $dataKonsumsi['konsumsi_year1'] = array();
        $dataKonsumsi['konsumsi_year2'] = array();
        $dataKonsumsi['konsumsi_year3'] = array();
        $dataKonsumsi['konsumsi_year_total'] = array();

        $dataKonsumsi['konsumsi_day1'] = array();
        $dataKonsumsi['konsumsi_day2'] = array();
        $dataKonsumsi['konsumsi_day3'] = array();
        $dataKonsumsi['konsumsi_day_total'] = array();

        $labelharian = array();

        $daysample = Carbon::now('Asia/Jakarta')->startOfDay();
        $weeksample = Carbon::now('Asia/Jakarta')->startOfDay()->startOfWeek();
        $monthsample = Carbon::now('Asia/Jakarta')->startOfMonth();
        $yearsample = Carbon::now('Asia/Jakarta')->startOfYear();

        
        $countKons1 = null;
        $countKons2 = null;
        $countKons3 = null;
        $countKons4 = null;

        for ($i = 0; $i <=288; $i++) {
            // $data_monthGrafik1 = KonsumsiDataDB::select('select * from users where active = ?', [1])
            array_push($labelharian, $daysample->format('H:i'));
            $data_day1 = KonsumsiData::where('IDSENSOR','=', 1)->where('ONINSERT','>=',$daysample->format('Y-m-d H:i:s'))->where('ONINSERT','<=',$daysample->addMinutes(5)->format('Y-m-d H:i:s'))->sum('POWER');
            $daysample->subMinutes(5);
            $countKons1 = KonsumsiData::where('IDSENSOR','=', 1)->where('POWER', '>', 0)->where('ONINSERT','>=',$daysample->format('Y-m-d H:i:s'))->where('ONINSERT','<=',$daysample->addMinutes(5)->format('Y-m-d H:i:s'))->count();
            $daysample->subMinutes(5);

            $data_day2 = KonsumsiData::where('IDSENSOR','=', 2)->where('ONINSERT','>=',$daysample->format('Y-m-d H:i:s'))->where('ONINSERT','<=',$daysample->addMinutes(5)->format('Y-m-d H:i:s'))->sum('POWER');
            $daysample->subMinutes(5);
            $countKons2 = KonsumsiData::where('IDSENSOR','=', 2)->where('POWER', '>', 0)->where('ONINSERT','>=',$daysample->format('Y-m-d H:i:s'))->where('ONINSERT','<=',$daysample->addMinutes(5)->format('Y-m-d H:i:s'))->count();
            $daysample->subMinutes(5);

            $data_day3 = KonsumsiData::where('IDSENSOR','=', 3)->where('ONINSERT','>=',$daysample->format('Y-m-d H:i:s'))->where('ONINSERT','<=',$daysample->addMinutes(5)->format('Y-m-d H:i:s'))->sum('POWER');
            $daysample->subMinutes(5);
            $countKons3 = KonsumsiData::where('IDSENSOR','=', 3)->where('POWER', '>', 0)->where('ONINSERT','>=',$daysample->format('Y-m-d H:i:s'))->where('ONINSERT','<=',$daysample->addMinutes(5)->format('Y-m-d H:i:s'))->count();            
            $daysample->subMinutes(5);

            $data_day_total = Data::where('ONINSERT','>=',$daysample->format('Y-m-d H:i:s'))->where('ONINSERT','<=',$daysample->addMinutes(5)->format('Y-m-d H:i:s'))->sum('POWER_LOAD');
            $daysample->subMinutes(5);
            $countKons4 = Data::where('POWER_LOAD', '>', 0)->where('ONINSERT','>=',$daysample->format('Y-m-d H:i:s'))->where('ONINSERT','<=',$daysample->addMinutes(5)->format('Y-m-d H:i:s'))->count();

            $status1 = !empty($data_day1);
            $status2 = !empty($data_day2);
            $status3 = !empty($data_day3);
            $status4 = !empty($data_day_total);

            if ($status1) {
                array_push($dataKonsumsi['konsumsi_day1'], round(($data_day1/$countKons1)/12, 2));
            } else {
                array_push($dataKonsumsi['konsumsi_day1'], 0);
            }
            if ($status2) {
                array_push($dataKonsumsi['konsumsi_day2'], round(($data_day2/$countKons2)/12, 2));
            } else {
                array_push($dataKonsumsi['konsumsi_day2'], 0);
            }
            if ($status3) {
                array_push($dataKonsumsi['konsumsi_day3'], round(($data_day3/$countKons3)/12, 2));
            } else {
                array_push($dataKonsumsi['konsumsi_day3'], 0);
            }
            if ($status4) {
                array_push($dataKonsumsi['konsumsi_day_total'], round(($data_day_total/$countKons4)/12, 2));
            } else {
                array_push($dataKonsumsi['konsumsi_day_total'], 0);
            }



            if($i<7){
                $data_week1 = KonsumsiData::where('IDSENSOR','=', 1)->whereBetween('ONINSERT', [$weeksample->format('Y-m-d H:i:s'), $weeksample->addDay()->format('Y-m-d H:i:s')])->sum('POWER');
                $weeksample->subDay();
                $countWeek1 = KonsumsiData::where('POWER','>',0)->where('IDSENSOR','=', 1)->whereBetween('ONINSERT', [$weeksample->format('Y-m-d H:i:s'), $weeksample->addDay()->format('Y-m-d H:i:s')])->count();
                $weeksample->subDay();

                $data_week2 = KonsumsiData::where('IDSENSOR','=', 2)->whereBetween('ONINSERT', [$weeksample->format('Y-m-d H:i:s'), $weeksample->addDay()->format('Y-m-d H:i:s')])->sum('POWER');
                $weeksample->subDay();
                $countWeek2 = KonsumsiData::where('POWER','>',0)->where('IDSENSOR','=', 2)->whereBetween('ONINSERT', [$weeksample->format('Y-m-d H:i:s'), $weeksample->addDay()->format('Y-m-d H:i:s')])->count();
                $weeksample->subDay();

                $data_week3 = KonsumsiData::where('IDSENSOR','=', 3)->whereBetween('ONINSERT', [$weeksample->format('Y-m-d H:i:s'), $weeksample->addDay()->format('Y-m-d H:i:s')])->sum('POWER');
                $weeksample->subDay();
                $countWeek3 = KonsumsiData::where('POWER','>',0)->where('IDSENSOR','=', 3)->whereBetween('ONINSERT', [$weeksample->format('Y-m-d H:i:s'), $weeksample->addDay()->format('Y-m-d H:i:s')])->count();
                $weeksample->subDay();
                
                $data_week_total = Data::whereBetween('ONINSERT', [$weeksample->format('Y-m-d H:i:s'), $weeksample->addDay()->format('Y-m-d H:i:s')])->sum('POWER_LOAD');
                $weeksample->subDay();
                $countWeek4 = Data::where('POWER_LOAD','>',0)->whereBetween('ONINSERT', [$weeksample->format('Y-m-d H:i:s'), $weeksample->addDay()->format('Y-m-d H:i:s')])->count();
            

                $status1 = !empty($data_week1);
                $status2 = !empty($data_week2);
                $status3 = !empty($data_week3);
                $status4 = !empty($data_week_total);
    
                if ($status1) {
                    array_push($dataKonsumsi['konsumsi_week1'], round(($data_week1/$countWeek1)/1000*24, 2));
                } else {
                    array_push($dataKonsumsi['konsumsi_week1'], 0);
                }
                if ($status2) {
                    array_push($dataKonsumsi['konsumsi_week2'], round(($data_week2/$countWeek2)/1000*24, 2));
                } else {
                    array_push($dataKonsumsi['konsumsi_week2'], 0);
                }
                if ($status3) {
                    array_push($dataKonsumsi['konsumsi_week3'], round(($data_week3/$countWeek3)/1000*24, 2));
                } else {
                    array_push($dataKonsumsi['konsumsi_week3'], 0);
                }
                if ($status4) {
                    array_push($dataKonsumsi['konsumsi_week_total'], round(($data_week_total/$countWeek4)/1000*24, 2));
                } else {
                    array_push($dataKonsumsi['konsumsi_week_total'], 0);
                }
            }

            if($i<12){               
                $data_year1 = KonsumsiData::where('IDSENSOR','=', 1)->whereBetween('ONINSERT', [$yearsample->format('Y-m-d H:i:s'), $yearsample->addMonth()->format('Y-m-d H:i:s')])->sum('POWER');
                $yearsample->subMonth();
                $countYear1 =  KonsumsiData::where('IDSENSOR','=', 1)->whereBetween('ONINSERT', [$yearsample->format('Y-m-d H:i:s'), $yearsample->addMonth()->format('Y-m-d H:i:s')])->count();
                $yearsample->subMonth();

                $data_year2 = KonsumsiData::where('IDSENSOR','=', 2)->whereBetween('ONINSERT', [$yearsample->format('Y-m-d H:i:s'), $yearsample->addMonth()->format('Y-m-d H:i:s')])->sum('POWER');
                $yearsample->subMonth();
                $countYear2 =  KonsumsiData::where('IDSENSOR','=', 2)->whereBetween('ONINSERT', [$yearsample->format('Y-m-d H:i:s'), $yearsample->addMonth()->format('Y-m-d H:i:s')])->count();
                $yearsample->subMonth();

                $data_year3 = KonsumsiData::where('IDSENSOR','=', 3)->whereBetween('ONINSERT', [$yearsample->format('Y-m-d H:i:s'), $yearsample->addMonth()->format('Y-m-d H:i:s')])->sum('POWER');
                $yearsample->subMonth();
                $countYear3 =  KonsumsiData::where('IDSENSOR','=', 3)->whereBetween('ONINSERT', [$yearsample->format('Y-m-d H:i:s'), $yearsample->addMonth()->format('Y-m-d H:i:s')])->count();
                $yearsample->subMonth();

                $data_year_total = Data::whereBetween('ONINSERT', [$yearsample->format('Y-m-d H:i:s'), $yearsample->addMonth()->format('Y-m-d H:i:s')])->sum('POWER_LOAD');
                $yearsample->subMonth();
                $countYear4 = Data::where('POWER_LOAD','>',0)->whereBetween('ONINSERT', [$yearsample->format('Y-m-d H:i:s'), $yearsample->addMonth()->format('Y-m-d H:i:s')])->count();
                $yearsample->subMonth();

                $status1 = !empty($data_year1);
                $status2 = !empty($data_year2);
                $status3 = !empty($data_year3);
                $status4 = !empty($data_year_total);

                if ($status1) {
                    array_push($dataKonsumsi['konsumsi_year1'], round(($data_year1/$countYear1)/1000*$yearsample->daysInMonth,2));
                } else {
                    array_push($dataKonsumsi['konsumsi_year1'], 0);
                }
                if ($status2) {
                    array_push($dataKonsumsi['konsumsi_year2'], round(($data_year2/$countYear2)/1000*$yearsample->daysInMonth,2));
                } else {
                    array_push($dataKonsumsi['konsumsi_year2'], 0);
                }
                if ($status3) {
                    array_push($dataKonsumsi['konsumsi_year3'], round(($data_year3/$countYear3)/1000*$yearsample->daysInMonth,2));
                } else {
                    array_push($dataKonsumsi['konsumsi_year3'], 0);
                }
                if ($status4) {
                    array_push($dataKonsumsi['konsumsi_year_total'], round(($data_year_total/$countYear4)/1000*$yearsample->daysInMonth,2));
                } else {
                    array_push($dataKonsumsi['konsumsi_year_total'], 0);
                }

                $yearsample->addMonth();

            }
            if($i < Carbon::now('Asia/Jakarta')->daysInMonth){

                $data_monthGrafik1 = KonsumsiData::where('IDSENSOR','=', 1)->whereBetween('ONINSERT', [$monthsample->format('Y-m-d H:i:s'), $monthsample->addDay()->format('Y-m-d H:i:s')])->sum('POWER');
                $monthsample->subDay();
                $countMonth1 = KonsumsiData::where('IDSENSOR','=', 1)->whereBetween('ONINSERT', [$monthsample->format('Y-m-d H:i:s'), $monthsample->addDay()->format('Y-m-d H:i:s')])->count();
                $monthsample->subDay();

                $data_monthGrafik2 = KonsumsiData::where('IDSENSOR','=', 2)->whereBetween('ONINSERT', [$monthsample->format('Y-m-d H:i:s'), $monthsample->addDay()->format('Y-m-d H:i:s')])->sum('POWER');
                $monthsample->subDay();
                $countMonth2 = KonsumsiData::where('IDSENSOR','=', 2)->whereBetween('ONINSERT', [$monthsample->format('Y-m-d H:i:s'), $monthsample->addDay()->format('Y-m-d H:i:s')])->count();
                $monthsample->subDay();

                $data_monthGrafik3 = KonsumsiData::where('IDSENSOR','=', 3)->whereBetween('ONINSERT', [$monthsample->format('Y-m-d H:i:s'), $monthsample->addDay()->format('Y-m-d H:i:s')])->sum('POWER');
                $monthsample->subDay();
                $countMonth3 = KonsumsiData::where('IDSENSOR','=', 3)->whereBetween('ONINSERT', [$monthsample->format('Y-m-d H:i:s'), $monthsample->addDay()->format('Y-m-d H:i:s')])->count();
                $monthsample->subDay();

                $data_monthGrafikTotal = Data::whereBetween('ONINSERT', [$monthsample->format('Y-m-d H:i:s'), $monthsample->addDay()->format('Y-m-d H:i:s')])->sum('POWER_LOAD');
                $monthsample->subDay();
                $countMonth4 = Data::where('POWER_LOAD','>',0)->whereBetween('ONINSERT', [$monthsample->format('Y-m-d H:i:s'), $monthsample->addDay()->format('Y-m-d H:i:s')])->count();

                $status1 = !empty($data_monthGrafik1);
                $status2 = !empty($data_monthGrafik2);
                $status3 = !empty($data_monthGrafik3);
                $status4 = !empty($data_monthGrafikTotal);

                if ($status1) {
                    array_push($dataKonsumsi['konsumsi_month1'], round(($data_monthGrafik1/$countMonth1) / 1000*24, 2));
                } else {
                    array_push($dataKonsumsi['konsumsi_month1'], 0);
                }
                if ($status2) {
                    array_push($dataKonsumsi['konsumsi_month2'], round(($data_monthGrafik2/$countMonth2) / 1000*24, 2));
                } else {
                    array_push($dataKonsumsi['konsumsi_month2'], 0);
                }
                if ($status3) {
                    array_push($dataKonsumsi['konsumsi_month3'], round(($data_monthGrafik3/$countMonth3) / 1000*24, 2));
                } else {
                    array_push($dataKonsumsi['konsumsi_month3'], 0);
                }
                if ($status4) {
                    array_push($dataKonsumsi['konsumsi_month_total'], round(($data_monthGrafikTotal/$countMonth4) / 1000*24, 2));
                } else {
                    array_push($dataKonsumsi['konsumsi_month_total'], 0);
                }

            }

           
        }

        array_push($jsonData['konsumsi_data'], $dataKonsumsi);

        
        $maxday1 = max($dataKonsumsi['konsumsi_day1']);
        $maxday2 = max($dataKonsumsi['konsumsi_day2']);
        $maxday3 = max($dataKonsumsi['konsumsi_day3']);
        $maxday4 = max($dataKonsumsi['konsumsi_day_total']);

        $max = max($maxday1, $maxday2);
        $max = max($max, $maxday3);
        $max = max($max, $maxday4);
        array_push($jsonData['max'], $max);

        $maxweek1 = max($dataKonsumsi['konsumsi_week1']);
        $maxweek2 = max($dataKonsumsi['konsumsi_week2']);
        $maxweek3 = max($dataKonsumsi['konsumsi_week3']);
        $maxweek4 = max($dataKonsumsi['konsumsi_week_total']);

        $max = max($maxweek1, $maxweek2);
        $max = max($max, $maxweek3);
        $max = max($max, $maxweek4);
        array_push($jsonData['max'], $max);

        $maxmonth1 = max($dataKonsumsi['konsumsi_month1']);
        $maxmonth2 = max($dataKonsumsi['konsumsi_month2']);
        $maxmonth3 = max($dataKonsumsi['konsumsi_month3']);
        $maxmonth4 = max($dataKonsumsi['konsumsi_month_total']);

        $max = max($maxmonth1, $maxmonth2);
        $max = max($max, $maxmonth3);
        $max = max($max, $maxmonth4);
        array_push($jsonData['max'], $max);

        $maxyear1 = max($dataKonsumsi['konsumsi_year1']);
        $maxyear2 = max($dataKonsumsi['konsumsi_year2']);
        $maxyear3 = max($dataKonsumsi['konsumsi_year3']);
        $maxyear4 = max($dataKonsumsi['konsumsi_year_total']);
        
        $max = max($maxyear1, $maxyear2);
        $max = max($max, $maxyear3);
        $max = max($max, $maxyear4);
        array_push($jsonData['max'], $max);

        array_push($jsonData, $labelharian);

        return $jsonData;
    }
}
