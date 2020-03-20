@extends('layouts.template')

@section('header')
    @include('layouts.header')
@endsection

@section('sidemenu')
    @include('layouts.sidemenu')
@endsection

@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Judul Performa -->
    <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card bg-transparent">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-1">
                                <img src="{{asset('/images/performa.png')}}" alt="Produksi" height="65" width="65">
                            </div>
                            <div class="col-4">
                                <br>
                                <h3> Performa</h3>
                            </div>
                        </div>
                    </div>
                </div>
        <!-- ============================================================== -->
        <!-- Performa Kinerja Sistem -->
        <!-- ============================================================= -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <div class="gaugejs">
                                    <canvas id="foo" class="gaugejs" height="100" width="200">gauge</canvas>
                                </div>
                             </div>
                            <div class="col-8">
                                <h3 style="color: blue">Sangat Baik</h3>
                                <h5>Rata-rata performa kinerja sistem panel surya anda</h5>
                                <hr>
                                <h5>Ingin mengetahui cara menghitung performa sistem anda? <a href="    #"> <u> klik disini</u></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    
        <!-- ============================================================== -->
        <!-- Performa Mingguan -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <div class="col-12">
                                <h4 class="card-title"  style="color: black"><Strong>Performa Mingguan</Strong></h4>
                                <hr>
                            </div>
                            <div class="row">
                                <div class="col-2" style="margin-left: 15px;">
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
                                <div class="col-1.5">
                                    <div class="dl">
                                        <select class="custom-select dropdown-toggle">
                                            <option value="0" selected>Tahun</option>
                                            <option value="1">2018</option>
                                            <option value="2">2019</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-2">
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
                                <div class="col-2">
                                    <button type="button" class="btn btn-block btn-info">Terapkan</button>
                                </div>
                                <style>
                                    div.selector-info {
                                        position: relative;
                                        left: 10%;
                                    }
                                </style>
                                <div class="col-3.5 selector-info">
                                    <h5 class="card-subtitle my-2" style="color: #696969;">24 November - 30 November</h5>
                                </div>
                                <style>
                                    div.selector {
                                        position: relative;
                                        justify-self: right;
                                        right: -100px;
                                    }
                                </style>
                                <div class="col-lg-1 selector">
                                    <i class="fas fa-angle-left" style="margin-left:5px; margin-top:10px; color: #696969;" ></i>
                                    <i class="fas fa-angle-right" style="margin-left: 10px; margin-top:10px; color: #696969"></i>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <canvas id="bar-chart-mingguan" height="100"></canvas>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="ml-auto d-flex no-block align-items-center">
                                <ul class="list-inline font-12 dl mr-3 mb-0" style="margin-left: 30px">
                                    <li class="list-inline-item" style="color: black"><i class="fas fa-square" style="color: #00cc00"></i> Sangat Baik</li>
                                    <li class="list-inline-item" style="color: black"><i class="fas fa-square" style="color: #ffbf00"></i> Cukup Baik</li>
                                    <li class="list-inline-item" style="color: black"><i class="fas fa-square" style="color: #cc0000"></i> Buruk</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!--========================================================================================== -->
                                        <!-- Performa Bulanan -->
    <!-- ========================================================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <div class="col-12">
                                <h4 class="card-title" style="color: black"><Strong>Performa Bulanan</Strong></h4>
                                <hr>
                            </div>
                            <!-- Dropdown Bulan, Tahun, Terapkan -->
                            <div class="row">
                                <div class="col-2" style="margin-left: 15px;">
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
                                <div class="col-1.5">
                                    <div class="dl">
                                        <select class="custom-select dropdown-toggle">
                                            <option value="0" selected>Tahun</option>
                                            <option value="1">2018</option>
                                            <option value="2">2019</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <button type="button" class="btn btn-block btn-info">Terapkan</button>
                                </div>
                                <div class="col-3.5">
                                    <h5 class="card-subtitle my-2" style="margin-left: 330px; color: #696969;">November 2019</h5>
                                </div>
                                <div class="col-lg-1">
                                    <i class="fas fa-angle-left" style="margin-left:5px; margin-top:10px; color: #696969;" ></i>
                                    <i class="fas fa-angle-right" style="margin-left: 10px; margin-top:10px; color: #696969"></i>
                                </div>
                            </div>
                            <br>
                            <!-- DROPDOWN BULAN, TAHUN, TERAPKAN END -->
                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <canvas id="bar-chart-bulanan" height="100"></canvas>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="ml-auto d-flex no-block align-items-center">
                                <ul class="list-inline font-12 dl mr-3 mb-0" style="margin-left: 30px">
                                    <li class="list-inline-item" style="color: black"><i class="fas fa-square" style="color: #00cc00"></i> Sangat Baik</li>
                                    <li class="list-inline-item" style="color: black"><i class="fas fa-square" style="color: #ffbf00"></i> Cukup Baik</li>
                                    <li class="list-inline-item" style="color: black"><i class="fas fa-square" style="color: #cc0000"></i> Buruk</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- END Performa Bulanan -->
        <!-- ============================================================== -->
    <!-- ========================================================================================== -->
                                        <!-- Performa Tahunan -->
    <!-- ========================================================================================== -->
         <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <div class="col-12">
                                <h4 class="card-title" style="color: black"><Strong>Performa Tahunan</Strong></h4>
                                <hr>
                            </div>
                            <!-- DROPDOWN TAHUN, TERAPKAN -->
                            <div class="row">
                                <div class="col-1.5" style="margin-left: 15px;">
                                    <div class="dl">
                                        <select class="custom-select dropdown-toggle">
                                            <option value="0" selected>Tahun</option>
                                            <option value="1">2018</option>
                                            <option value="2">2019</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <button type="button" class="btn btn-block btn-info">Terapkan</button>
                                </div>
                                <div class="col-3.5">
                                    <h5 class="card-subtitle my-2" style="margin-left: 550px; color: #696969;">2019</h5>
                                </div>
                                <div class="col-lg-1">
                                    <i class="fas fa-angle-left" style="margin-left:5px; margin-top:10px; color: #696969;" ></i>
                                    <i class="fas fa-angle-right" style="margin-left: 10px; margin-top:10px; color: #696969"></i>
                                </div>
                            </div>
                            <br>
                            <!-- DROPDOWN TAHUN, TERAPKAN, END -->
                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <canvas id="bar-chart-tahunan" height="100"></canvas>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="ml-auto d-flex no-block align-items-center">
                                <ul class="list-inline font-12 dl mr-3 mb-0" style="margin-left: 30px">
                                    <li class="list-inline-item" style="color: black"><i class="fas fa-square" style="color: #00cc00"></i> Sangat Baik</li>
                                    <li class="list-inline-item" style="color: black"><i class="fas fa-square" style="color: #ffbf00"></i> Cukup Baik</li>
                                    <li class="list-inline-item" style="color: black"><i class="fas fa-square" style="color: #cc0000"></i> Buruk</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- END PRODUKSI BULANAN -->
        <!-- ============================================================== -->
    
    </div>
@endsection