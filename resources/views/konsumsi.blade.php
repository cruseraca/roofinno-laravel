@extends('layouts.template')

@section('header')
@include('layouts.header')
@endsection

@section('sidemenu')
@include('layouts.sidemenu')
@endsection

@section('content')
<div class="container-fluid" id="dashboard_konsumsi">
    <!-- ============================================================== -->
    <!-- JUDUL MONITOR DATA KONSUMSI -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card bg-transparent">
                <div class="card-body">
                    <div class="row">
                        <div class="col-1">
                            <img src="{{asset('/images/konsumsi.png')}}" alt="Produksi" height="65" width="65">
                        </div>
                        <div class="col-4">
                            <br>
                            <h3> Monitor Data Konsumsi</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Produksi Harian / Monitor Data Konsumsi -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div>
                        <div class="row">
                            <div class="col-8">
                                <h4 class="card-title"><Strong>Konsumsi Harian</Strong></h4>
                                <hr style="width: 1000px">
                            </div>
                            <div class="col-2 float-right">
                                <div class="dl">
                                    <select class="custom-select">
                                        <option value="0" selected>Data Rincian</option>
                                        <option value="1">Rincian 1</option>
                                        <option value="2">Rincian 2</option>
                                        <option value="3">Rincian 3</option>
                                        <option value="4">Rincian 4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2 float-right">
                                <button type="button" class="btn btn-block btn-info" style="margin-right: 100px">Terapkan</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1.5">
                                <h4 class="card-title" style="color: blue ; margin-left: 15px"><strong>2KW</strong></h4>
                                <h6 class="card-subtitle" style="margin-left: 15px">Pada 12.00 PM</h6>
                            </div>
                            <div class=" col " style="text-align: left">
                                <h4 class="card-title" style="color: blue ; margin-left: 15px"><strong>600KWh</strong></h4>
                                <h6 class="card-subtitle" style="margin-left: 15px">Total Konsumsi</h6>
                            </div>
                            <div class=" col-2 col-md-auto">
                                <h5 class="card-subtitle" style=" margin-top:10px; color: black;">7 Agustus 2019</h5>
                            </div>
                            <div class="col-1 col-md-auto">
                                <i class="fas fa-angle-left" style="margin-left:25px; margin-top:10px"></i>
                                <i class="fas fa-angle-right" style="margin-left: 10px; margin-top:10px"></i>
                            </div>
                            <div class="col-md-2">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="datepicker-autoclose" placeholder="mm/dd/yyyy">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- column -->
                        <div class="col-12">
                            <div class="grafik-line-harian" style="height: 250px"></div>
                        </div>
                        <!-- column -->
                    </div>
                    <!-- Simbol Keterangan Warna -->
                    <div class="ml-auto d-flex no-block align-items-center">
                        <ul class="list-inline font-15 dl mr-3 mb-0" style="margin-left: 45px">
                            <li class="list-inline-item"><i class="fas fa-check-square" style="color: #cc0000"></i> Beban A</li>
                            <li class="list-inline-item"><i class="fas fa-check-square" style="color: #00cc00"></i> Beban B</li>
                            <li class="list-inline-item"><i class="fas fa-check-square" style="color: #8A2BE2"></i> Beban C</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--========================================================================================== -->
    <!-- Konsumsi Mingguan -->
    <!-- ========================================================================================== -->

    <div class="row">
        <!-- column -->
        <div class="col-sm-12">

            <div class="card">
                <div class="card-body">
                    <div class="col-12">
                        <h4 class="card-title"><Strong>Konsumsi Mingguan</Strong></h4>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h6 class="card-subtitle" style="margin-left: 30px">Total Konsumsi</h6>
                            <h4 class="card-title" style="color: blue; margin-left: 30px"><strong>600KWh</strong></h4>
                        </div>
                        <div class="col-sm-2 col-md-auto">
                            <h5 class="card-subtitle" style=" margin-top:5px; color: black;">1 Agustus - 7 Agustus</h5>
                        </div>
                        <div class="col-md-1">
                            <i class="fas fa-angle-left" style="margin-left:5px; margin-top:10px"></i>
                            <i class="fas fa-angle-right" style="margin-left: 10px; margin-top:10px"></i>
                        </div>
                    </div>
                    <!-- BULAN TAHUN MINGGU DROPDOWN -->
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-2 float-right">
                            <div class="dl">
                                <select class="custom-select">
                                    <option value="0" selected>Bulan</option>
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-2 float-right">
                            <div class="dl">
                                <select class="custom-select dropdown-toggle">
                                    <option value="0" selected>Tahun</option>
                                    <option value="1">2018</option>
                                    <option value="2">2019</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-2 float-right">
                            <div class="dl">
                                <select class="custom-select">
                                    <option value="0" selected>Minggu</option>
                                    <option value="1">Minggu 1</option>
                                    <option value="2">Minggu 2</option>
                                    <option value="3">Minggu 3</option>
                                    <option value="4">Minggu 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-2 float-right">
                            <button type="button" class="btn btn-block btn-info">Terapkan</button>
                        </div>
                    </div>
                    <!-- Bulanan -->
                    <div class="pt-3">
                        <div class="row">
                            <!-- column -->
                            <div class="col-md-12 col-lg-12">
                                <div id="stacked-column-mingguan" style="position: relative; height:250px;"></div>
                                <div class="row mb-0 mt-3 text-center">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Simbol Keterangan Warna -->
                    <div class="ml-auto d-flex no-block align-items-center">
                        <ul class="list-inline font-15 dl mr-3 mb-0" style="margin-left: 40px">
                            <li class="list-inline-item"><i class="fas fa-check-square" style="color: #ffbf00"></i> Produksi Panel Surya</li>
                            <li class="list-inline-item"><i class="fas fa-check-square" style="color: #cc0000"></i> Beban A</li>
                            <li class="list-inline-item"><i class="fas fa-check-square" style="color: #00cc00"></i> Beban B</li>
                            <li class="list-inline-item"><i class="fas fa-check-square" style="color: #8A2BE2"></i> Beban C</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- END KONSUMSI MINGGUAN -->
    <!-- ============================================================== -->
    <!-- ========================================================================================== -->
    <!-- Konsumsi Bulanan -->
    <!-- ========================================================================================== -->

    <div class="row">
        <!-- column -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-12">
                        <h4 class="card-title"><Strong>Konsumsi Bulanan</Strong></h4>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h6 class="card-subtitle" style="margin-left: 30px">Total Konsumsi</h6>
                            <h4 class="card-title" style="color: blue; margin-left: 30px"><strong>600KWh</strong></h4>
                        </div>
                        <div class="col-sm-2 col-md-auto">
                            <h5 class="card-subtitle" style=" margin-top:5px; color: black">Agustus 2019</h5>
                        </div>
                        <div class="col-md-1">
                            <i class="fas fa-angle-left" style="margin-left:5px; margin-top:10px"></i>
                            <i class="fas fa-angle-right" style="margin-left: 10px; margin-top:10px"></i>
                        </div>
                    </div>
                    <!-- DROPDOWN BULAN, TAHUN, TERAPKAN -->
                    <div class="row">
                        <div class="col-6"></div>
                        <div class="col-2 float-right">
                            <div class="dl">
                                <select class="custom-select">
                                    <option value="0" selected>Bulan</option>
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-2 float-right">
                            <div class="dl">
                                <select class="custom-select dropdown-toggle">
                                    <option value="0" selected>Tahun</option>
                                    <option value="1">2018</option>
                                    <option value="2">2019</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-2 float-right">
                            <button type="button" class="btn btn-block btn-info">Terapkan</button>
                        </div>
                    </div>
                    <!-- DROPDOWN END -->
                    <!-- Bulanan -->
                    <div class="pt-3">
                        <div class="row">
                            <!-- column -->
                            <div class="col-md-12 col-lg-12">
                                <div id="stacked-column-bulanan" style="position: relative; height:250px;"></div>
                                <div class="row mb-0 mt-3 text-center">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Simbol Keterangan Warna -->
                    <div class="ml-auto d-flex no-block align-items-center">
                        <ul class="list-inline font-15 dl mr-3 mb-0" style="margin-left: 40px">
                            <li class="list-inline-item"><i class="fas fa-check-square" style="color: #ffbf00"></i> Produksi Panel Surya</li>
                            <li class="list-inline-item"><i class="fas fa-check-square" style="color: #cc0000"></i> Beban A</li>
                            <li class="list-inline-item"><i class="fas fa-check-square" style="color: #00cc00"></i> Beban B</li>
                            <li class="list-inline-item"><i class="fas fa-check-square" style="color: #8A2BE2"></i> Beban C</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- END KONSUMSI BULANAN -->
    <!-- ============================================================== -->
    <!-- ========================================================================================== -->
    <!-- Konsumsi Tahunan -->
    <!-- ========================================================================================== -->

    <div class="row">
        <!-- column -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-12">
                        <h4 class="card-title"><Strong>Konsumsi Tahunan</Strong></h4>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h6 class="card-subtitle" style="margin-left: 30px">Total Konsumsi</h6>
                            <h4 class="card-title" style="color: blue; margin-left: 30px"><strong>600KWh</strong></h4>
                        </div>
                        <div class="col-dm-2 col-md-auto">
                            <h5 class="card-subtitle" style=" margin-top:5px; color: black">2019</h5>
                        </div>
                        <div class="col-md-1">
                            <i class="fas fa-angle-left" style="margin-left:5px; margin-top:10px"></i>
                            <i class="fas fa-angle-right" style="margin-left: 10px; margin-top:10px"></i>
                        </div>
                    </div>
                    <!-- DROPDOWN TAHUN, TERAPKAN -->
                    <div class="row">
                        <div class="col-8"></div>
                        <div class="col-2 float-right">
                            <div class="dl">
                                <select class="custom-select dropdown-toggle">
                                    <option value="0" selected>Tahun</option>
                                    <option value="1">2018</option>
                                    <option value="2">2019</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-2 float-right">
                            <button type="button" class="btn btn-block btn-info">Terapkan</button>
                        </div>
                    </div>
                    <!-- DROPDOWN END -->
                    <!-- Bulanan -->
                    <div class="pt-3">
                        <div class="row">
                            <!-- column -->
                            <div class="col-md-12 col-lg-12">
                                <div id="stacked-column-tahunan" style="position: relative; height:250px;"></div>
                                <div class="row mb-0 mt-3 text-center">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Simbol Keterangan Warna -->
                    <div class="ml-auto d-flex no-block align-items-center">
                        <ul class="list-inline font-15 dl mr-3 mb-0" style="margin-left: 40px">
                            <li class="list-inline-item"><i class="fas fa-check-square" style="color: #ffbf00"></i> Produksi Panel Surya</li>
                            <li class="list-inline-item"><i class="fas fa-check-square" style="color: #cc0000"></i> Beban A</li>
                            <li class="list-inline-item"><i class="fas fa-check-square" style="color: #00cc00"></i> Beban B</li>
                            <li class="list-inline-item"><i class="fas fa-check-square" style="color: #8A2BE2"></i> Beban C</li>
                    </div>
                    <!--==============================================================-->
                    <!-- END KONSUMSI BULANAN -->
                    <!-- ============================================================== -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- @section('script')
<script type="module" src="{{asset('/dist/js/pages/dashboards/dashboardkonsumsi.js')}}">

import {hello} from "{{asset('/dist/js/pages/dashboards/dashboardkonsumsi.js')}}";
hello();

</script>
@endsection -->