<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //fungsi index
    public function index()
    {
        return view('dashboard');
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

        $jumlah1 = $this->db->select_sum('POWER')->where('FLAG','pln')->where('ONINSERT >=',$tgl_awal)->where('ONINSERT <=',$tgl_akhir)->get('data_inout')->row();
        $banyak1 = $this->db->where('FLAG','pln')->where('ONINSERT >=',$tgl_awal)->where('ONINSERT <=',$tgl_akhir)->get('data_inout')->num_rows();

        $jumlah2 = $this->db->select_sum('POWER')->where('FLAG','pv')->where('ONINSERT >=',$tgl_awal)->where('ONINSERT <=',$tgl_akhir)->get('data_inout')->row();
        $banyak2 = $this->db->where('FLAG','pv')->where('ONINSERT >=',$tgl_awal)->where('ONINSERT <=',$tgl_akhir)->get('data_inout')->num_rows();

        $jumlah3 = $this->db->select_sum('POWER')->where('IDSENSOR','3')->where('ONINSERT >=',$tgl_awal)->where('ONINSERT <=',$tgl_akhir)->get('data_inout')->row();
        $banyak3 = $this->db->where('IDSENSOR','3')->where('ONINSERT >=',$tgl_awal)->where('ONINSERT <=',$tgl_akhir)->get('data_inout')->num_rows();

        $jumlah4 = $this->db->select_sum('POWER')->where('IDSENSOR','4')->where('ONINSERT >=',$tgl_awal)->where('ONINSERT <=',$tgl_akhir)->get('data_inout')->row();
        $banyak4 = $this->db->where('IDSENSOR','4')->where('ONINSERT >=',$tgl_awal)->where('ONINSERT <=',$tgl_akhir)->get('data_inout')->num_rows();

        if ($banyak1=='0' ) {
            $rata1=0;
        }else {
            $rata1 = $jumlah1->POWER/$banyak1;
        }

        if ($banyak2=='0' ) {
            $rata2=0;
        }else {
            $rata2 = $jumlah2->POWER/$banyak2;
        }

        if ($banyak3=='0' ) {
            $rata3=0;
        }else {
            $rata3 = $jumlah3->POWER/$banyak3;
        }

        if ($banyak4=='0' ) {
            $rata4=0;
        }else {
            $rata4 = $jumlah4->POWER/$banyak4;
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
