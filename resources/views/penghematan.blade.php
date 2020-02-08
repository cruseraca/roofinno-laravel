@extends('layouts.template')

@section('header')
@include('layouts.header')
@endsection

@section('sidemenu')
@include('layouts.sidemenu')
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card bg-transparent">
                <div class="card-body">
                    <div class="row">
                        <div class="col-1">
                            <img src="{{asset('images/penghematan.png')}}" alt="Produksi" height="65" width="65">
                        </div>
                        <div class="col-4">
                            <br>
                            <h3> Penghematan</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <br>
                            <h3><strong>Hallo Miftah, bulan ini kamu telah melakukan penghematan sebesar : </strong></h3>
                        </div>
                        <div class="col-4 col-md-auto text-center" style="background-color: #0000e5; text-align: right;  border-radius: 7px">
                            <br>
                            <h1 style="color: white; padding: 1px 50px 1px;">Rp 20.000.000</h1>
                            <h5 style="color: white">20 Juni 2018 - 20 Agustus 2019</h5>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-12">
                        <h4 class="card-title"><Strong>Penghematan Mingguan</Strong></h4>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col ">
                            <h5 class="card-subtitle" style="margin-left: 15px; margin-top: 10px;">Total Penghematan</h5>
                        </div>
                        <!-- <div class="col-lg-2" style="text-align: left; margin-left: 50px;">
                        <h4 class="card-title" style="color: blue"><strong>600KWh</strong></h4>
                        <h6 class="card-subtitle">Total Produksi    </h6>  -->
                        <!-- </div> -->
                        <div class="col-2 col-md-auto ">
                            <h5 class="card-subtitle" style=" margin-right: 0px; margin-top:5px; color: #696969;">1 Agustus - 7 Agustus</h5>
                        </div>
                        <div class="col col-md-1">
                            <i class="fas fa-angle-left" style="margin-top:5px; color: #696969;"></i>
                            <i class="fas fa-angle-right" style=" margin-left: 10px; margin-top:5px; color: #696969"></i>
                        </div>
                    </div>
                    <!-- Dropdown Bulan, Tahun, Terapkan -->
                    <div class="row">
                        <div class="col ">
                            <h4 class="card-title" style="color: blue; margin-left: 15px"><strong>Rp 1.080.000</strong></h4>
                        </div>
                        <div class="col-2 col-md-auto">
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
                        <div class="col-2" style="margin-right: 65px;">
                            <button type="button" class="btn btn-block btn-info">Terapkan</button>
                        </div>
                    </div>
                    <!-- DROPDOWN BULAN, TAHUN, TERAPKAN END -->
                    <!-- Mingguan -->
                    <div class="pt-3">
                        <div class="row">
                            <!-- column -->
                            <div class="col-md-12 col-lg-12">
                                <div id="stacked-column-penghematan-mingguan" style="position: relative; min-height:250px;"></div>
                                <div class="row mb-0 mt-3 text-center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-12">
                        <h4 class="card-title"><Strong>Penghematan Bulanan</Strong></h4>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h5 class="card-subtitle" style="margin-left: 15px; margin-top: 10px;">Total Penghematan</h5>
                        </div>
                        <!-- <div class="col-lg-7" style="text-align: left; margin-left: 40px;"> -->
                        <!-- <h4 class="card-title" style="color: blue"><strong>600KWh</strong></h4>
                        <h6 class="card-subtitle">Total Produksi    </h6>  -->
                        <!-- </div> -->
                        <div class="col-2 col-md-auto">
                            <h5 class="card-subtitle" style="margin-left: 210px; margin-top:5px; color: #696969;">Agustus 2019</h5>
                        </div>
                        <div class="col col-md-1">
                            <i class="fas fa-angle-left" style="margin-left:5px; margin-top:10px; color: #696969;"></i>
                            <i class="fas fa-angle-right" style="margin-left: 10px; margin-top:10px; color: #696969"></i>
                        </div>
                    </div>
                    <!-- Dropdown Bulan, Tahun, Terapkan -->
                    <div class="row">
                        <div class="col">
                            <h4 class="card-title" style="color: blue; margin-left: 15px"><strong>Rp 2.600.000</strong></h4>
                        </div>
                        <div class="col-2 col-md-auto">
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
                        <div class="col-2" style="margin-right: 65px;">
                            <button type="button" class="btn btn-block btn-info">Terapkan</button>
                        </div>
                    </div>
                    <!-- DROPDOWN BULAN, TAHUN, TERAPKAN END -->
                    <!-- Mingguan -->
                    <div class="pt-3">
                        <div class="row">
                            <!-- column -->
                            <div class="col-md-12 col-lg-12">
                                <div id="stacked-column-penghematan-bulanan" style="position: relative; height:250px;"></div>
                                <div class="row mb-0 mt-3 text-center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-12">
                        <h4 class="card-title"><Strong>Penghematan Tahunan</Strong></h4>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h5 class="card-subtitle" style="margin-left: 15px; margin-top: 10px;">Total Penghematan</h5>
                        </div>
                        <!-- <div class="col-md-2 col-md-auto" style="text-align: left"> -->
                        <!-- <h4 class="card-title" style="color: blue"><strong>600KWh</strong></h4>
                        <h6 class="card-subtitle">Total Produksi    </h6>  -->
                        <!-- </div> -->
                        <div class="col-2 col-md-auto">
                            <h5 class="card-subtitle" style="margin-left: 272px; margin-top:5px; color: #696969;">2019</h5>
                        </div>
                        <div class="col col-md-1">
                            <i class="fas fa-angle-left" style="margin-left:5px; margin-top:10px; color: #696969;"></i>
                            <i class="fas fa-angle-right" style="margin-left: 10px; margin-top:10px; color: #696969"></i>
                        </div>
                    </div>
                    <!-- Dropdown Bulan, Tahun, Terapkan -->
                    <div class="row">
                        <div class="col">
                            <h4 class="card-title" style="color: blue; margin-left: 15px"><strong>Rp 36.080.000</strong></h4>
                        </div>
                        <div class="col-2 col-md-auto">
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
                        <div class="col-2" style="margin-right: 65px;">
                            <button type="button" class="btn btn-block btn-info">Terapkan</button>
                        </div>
                    </div>
                    <!-- DROPDOWN BULAN, TAHUN, TERAPKAN END -->
                    <!-- Mingguan -->
                    <div class="pt-3">
                        <div class="row">
                            <!-- column -->
                            <div class="col-md-12 col-lg-12">
                                <div id="stacked-column-penghematan-tahunan" style="position: relative; height:250px;"></div>
                                <div class="row mb-0 mt-3 text-center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- column -->
        <div class="col-sm-12 col-lg-4">
            <div class="card bg-white">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <img src="{{asset('images/pohon.png')}}" alt="performa hari ini" height="115" width="115">
                        </div>
                        <div class="col-6">
                            <br>
                            <h3>215 <small>Pohon</small></h3>
                            <h6 class="card-title text-black">Total Pohon Tertanam</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
        <div class="col-sm-12 col-lg-4">
            <div class="card bg-white">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <img src="{{asset('images/co2.png')}}" alt="performa hari ini" height="115" width="115">
                        </div>
                        <div class="col-6">
                            <br>
                            <h3>215 <small>TCO<sub>2</sub></small></h3>
                            <h6 class="card-title text-black">Total Polusi Tereduksi</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
        <div class="col-sm-12 col-lg-4">
            <div class="card bg-white">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <img src="{{asset('images/energibersih.png')}}" alt="performa hari ini" height="115" width="115">
                        </div>
                        <div class="col-6">
                            <br>
                            <h3>215 <small>KW</small></h3>
                            <h6 class="card-title text-black">Total Green Carbon Credit</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection