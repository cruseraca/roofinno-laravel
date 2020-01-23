<?php 
if (! function_exists('getkode')) {
    function getkode()
    {
        $panjang = 55;
        $karakter       = 'kodingin.com4543534-039849kldsam][].';
        $panjangKata = strlen($karakter);
        $kode = '';
        for ($i = 0; $i < $panjang; $i++) {
            $kode .= $karakter[rand(0, $panjangKata - 1)];
        }
        return $kode;
    }
}
if (! function_exists('tanggal_indo')){
    function tanggal_indo($tanggal, $cetak_hari = false)
    {
        $hari = array ( 1 =>    'Senin',
                    'Selasa',
                    'Rabu',
                    'Kamis',
                    'Jumat',
                    'Sabtu',
                    'Minggu'
                );

        $bulan = array (1 =>   'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
                );
        $split 	  = explode('-', $tanggal);
        $tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];

        if ($cetak_hari) {
            $num = date('N', strtotime($tanggal));
            return $hari[$num] . ', ' . $tgl_indo;
        }
        return $tgl_indo;
    //  tanggal_indo ('2016-03-20', true); // Hasil: Minggu, 20 Maret 2016
    }
}