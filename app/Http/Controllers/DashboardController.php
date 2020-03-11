<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Data;
use App\Sensor;
use Carbon\Carbon;

class DashboardController extends Controller
{
    //fungsi index
    public function index()
    {
        $datetime = Carbon::now('Asia/Jakarta');
        $time = Carbon::now('Asia/Jakarta'); 
        $daya_total = Data::where('ONINSERT','>=',$time->startOfDay()->format('Y-m-d H:i:s'))->where('ONINSERT','<=',$time->addDay()->format('Y-m-d H:i:s'))->sum('POWER_LOAD');
        $datetime->minute = 0;
        $datetime->second = 0;
        return view('dashboard',['time' => $datetime->format('H:i'), 'daya_total' => round(($daya_total/720)*288/1000,2)]);
    }
    
    //Realtime Grafik
    public function getRealtimeData()
    {
        $data_x = array();
        $data_y = array();
        $kons = array();
        $datetime = Carbon::now('Asia/Jakarta'); //ganti menjadi carbon now
        $datetime = $datetime->startOfDay();
        
        for($i=0;$i <= 288;$i++){
            $data = Data::where('ONINSERT','>=',$datetime->format('Y-m-d H:i:s'))->where('ONINSERT','<=',$datetime->addMinutes(5)->format('Y-m-d H:i:s'))->sum('POWER_LOAD');
            $datetime->subMinutes(5);
            if($data == 0)
            {
                array_push($data_x,$datetime->format('H:i'));
                array_push($data_y,0);
                $datetime->addMinutes(5);
            } else 
            {
                array_push($data_x,$datetime->format('H:i'));
                $count = Data::where('ONINSERT','>=',$datetime->format('Y-m-d H:i:s'))->where('ONINSERT','<=',$datetime->addMinutes(5)->format('Y-m-d H:i:s'))->where('POWER_LOAD','<>',0)->count();
                array_push($data_y,$data/$count);
            }
            
        }
        $max_data = max($data_y);
        $max = round(($max_data + 50/2)/50)*50;
        
        //konsumsi & produksi
        $kons_time = Carbon::now('Asia/Jakarta'); //ganti menjadi carbon now
        // $kons_time = Carbon::now('Asia/Jakarta');
        $kons_time->minute = 0;
        $kons_time->second = 0;
        $kons_data = Data::where('ONINSERT','>=',$kons_time->format('Y-m-d H:i:s'))->where('ONINSERT','<=',$kons_time->addHour()->format('Y-m-d H:i:s'))->sum('POWER_LOAD');
        $kons_count = Data::where('ONINSERT','>=',$kons_time->subHour()->format('Y-m-d H:i:s'))->where('ONINSERT','<=',$kons_time->addHour()->format('Y-m-d H:i:s'))->where('POWER_LOAD','<>',0)->count();
        array_push($kons,round($kons_data/$kons_count,2));
        array_push($kons,$kons_time->subHour()->format('Y-m-d H:i:s'));
        $data_all = array(
            'time' => $data_x,
            'kwh' => $data_y, 
            'max' => $max,
            'kons' => $kons,
        );
        return $data_all;
    }
    public function penghematan()
    {
        return view('penghematan');
    }

    public function konsumsi()
    {
        return view('konsumsi');
    }

    public function laporan()
    {
        return view('laporan');
    }

    //penjadwalan
    public function penjadwalan()
    {
        
        $data = Sensor::all();
        return view('penjadwalan',compact('data'));
    }

    //performa
    public function performa(){
        $data = array('js' =>'' );
        return view('performa',$data);
    }

    //produksi
    public function produksi(){
        $data = array('js' => 'produksi' );
        return view('produksi', $data);
    }

    public function realtime_grafik()
    {
        $Now = date("Y-m-d H:i:s");
        $sekarang = strtotime($Now);
        $dateNow = date("Y-m-d");
        $awal = strtotime($dateNow.' 00:00:00');
        $value1 =array();
        $value2 =array();
        $value3 =array();
        $value4 =array();
        $sum1=0;
        $sum2=0;
        for ($i=0; $i <287 ; $i++) {
        $akhir = $awal+(5*60);
        $tgl_awal = $dateNow." ".date("H:i:s", $awal);
        $tgl_akhir =$dateNow." ".date("H:i:s", $akhir);

        //Get data from database with query builder laravel
        $jumlah1 = Data::where('ONINSERT','<=',$tgl_akhir)->where('ONINSERT', '>=',$tgl_awal)->where('FLAG','pln')->sum('POWER_LOAD');
        $banyak1 = Data::where('ONINSERT','<=',$tgl_akhir)->where('ONINSERT', '>=',$tgl_awal)->where('FLAG','pln')->count();
        
        $jumlah2 = Data::where('ONINSERT','<=',$tgl_akhir)->where('ONINSERT', '>=',$tgl_awal)->where('FLAG','ps')->sum('POWER_LOAD');
        $banyak2 = Data::where('ONINSERT','<=',$tgl_akhir)->where('ONINSERT', '>=',$tgl_awal)->where('FLAG','ps')->count();
        
        $jumlah3 = Data::where('ONINSERT','<=',$tgl_akhir)->where('ONINSERT', '>=',$tgl_awal)->where('IDSENSOR','3')->sum('POWER_LOAD');
        $banyak3 = Data::where('ONINSERT','<=',$tgl_akhir)->where('ONINSERT', '>=',$tgl_awal)->where('IDSENSOR','3')->count();
        
        $jumlah4 = Data::where('ONINSERT','<=',$tgl_akhir)->where('ONINSERT', '>=',$tgl_awal)->where('IDSENSOR','4')->sum('POWER_LOAD');
        $banyak4 = Data::where('ONINSERT','<=',$tgl_akhir)->where('ONINSERT', '>=',$tgl_awal)->where('IDSENSOR','4')->count();


        if ($banyak1=='0' ) {
            $rata1=0;
        }else {
            $rata1 = $jumlah1->POWER_LOAD/$banyak1;
        }

        if ($banyak2=='0' ) {
            $rata2=0;
        }else {
            $rata2 = $jumlah2->POWER_LOAD/$banyak2;
        }

        if ($banyak3=='0' ) {
            $rata3=0;
        }else {
            $rata3 = $jumlah3->POWER_LOAD/$banyak3;
        }

        if ($banyak4=='0' ) {
            $rata4=0;
        }else {
            $rata4 = $jumlah4->POWER_LOAD/$banyak4;
        }

        $awal= $akhir;

        $t1['x'] = strtotime($tgl_akhir);
        $t1['y'] = $rata1;

        $t2['x'] = strtotime($tgl_akhir);
        $t2['y'] = $rata2;

        $t3['x'] = strtotime($tgl_akhir);
        $t3['y'] = $rata3;
        $t4['x'] = strtotime($tgl_akhir);
        $t4['y'] = $rata4;

        $sum1=$sum1+$rata1;
        $sum2=$sum2+$rata2;

        $mirip[$i] = abs(strtotime($tgl_akhir) - $sekarang);
        array_push($value1, $t1);
        array_push($value2, $t2);

        array_push($value3, $t3);
        array_push($value4, $t4);

        }
        $keyNow =array_keys($mirip, min($mirip));
        $realNow1 = $value1[$keyNow[0]]['y'];
        $realNow2 = $value2[$keyNow[0]]['y'];

    echo json_encode(array($value1,$value2,$realNow1,$realNow2,$sum1,$sum2,$value3,$value4));
    }
}
