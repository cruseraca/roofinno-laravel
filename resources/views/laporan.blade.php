
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
    <!-- =========== Laporan ============================ -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card bg-transparent">
                <div class="card-body">
                    <div class="row">
                        <div class="col-1">
                            <img src="{{asset('images/icon_baterai.png')}}" alt="Produksi" height="65" width="65">
                        </div>
                        <div class="col-4">
                            <br>
                            <h3> Laporan Bulanan</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="card col-12">
            <div class="card-body">
                <div class="row justify-content-end">
                    <div class="col-md-1 align-middle" style="margin: 0 20px 0 0">
                        <div class="circle text-center" >190<strong> $</strong> </div>
                    </div>
                    <div class="col-md-6 align-middle ">
                        <h4>Selamat tagihan bulan ini di bawah rata-rata, Anda mendapatkan <strong>Carbon Credit</strong></h4>
                    </div>
                    <div class="col">
                        <h5 class="card-subtitle text-right" style="margin-top:10px">7 Agustus 2019</h5>
                    </div>
                    <div class="col-lg-1">
                        <i class="fas fa-angle-left" style="margin-left: 5px; margin-top:10px"></i>
                        <i class="fas fa-angle-right" style="margin-left: 10px; margin-top:10px"></i>
                    </div>
                    <div class=" col col-lg-2">
                        <div class="input-group">
                            <input type="text" class="form-control" id="datepicker-autoclose" placeholder="mm/dd/yyyy">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- PERFORMA SISTEM, TOTAL KONSUMSI -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- column -->
        <div class="col-sm-12">

        </div>
        <div class="col-sm-12 col-lg-6">
            <div class="card bg-white">
                <div class="card-body">
                    <div class="row">
                        <div class="card-title col-12">
                            <h3>Performa Sistem</h3>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <img src="{{asset('images/performa.png')}}" alt="icon performa" height="115" width="120">
                        </div>
                        <div class="col-8" style="margin-left: 10px">
                            <br>
                            <h2 class="card-title" style="color: #5555ff" ;> 85%</h2>
                            <h5> Sistem anda bekerja dengan sangat baik</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
        <div class="col-sm-12 col-lg-6">
            <div class="card bg-white">
                <div class="card-body">
                    <div class="row">
                        <div class="card-title col-12">
                            <h3> Total Konsumsi</h3>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <img src="{{asset('images/konsumsi.png')}}" alt="icon konsumsi" height="115" width="120">
                        </div>
                        <div class="col-8" style="margin-left: 10px">
                            <br>
                            <h2 class="card-title" style="color: #5555ff" ;> 145KWh</h2>
                            <button type="button" class="btn waves-effect waves-light btn-info">Lihat Details</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End CARD performa sistem, total konsumsi -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- TOTAL PRODUKSI, TOTAL IMPOR, TOTAL EXPOR -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- column -->
        <div class="col-sm-12 col-lg-4">
            <div class="card bg-white">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <img src="{{asset('images/Produksi.png')}}" alt="icon produksi" height="115" width="120">
                        </div>
                        <div class="col-6">
                            <br>
                            <h5>Total Produksi</h5>
                            <h2 class="card-title" style="color: #5555ff" ;>28kWh</h2>
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
                            <img src="{{asset('images/impor.png')}}" alt="icon impor" height="115" width="120">
                        </div>
                        <div class="col-6">
                            <br>
                            <h5>Total Impor</h5>
                            <h2 class="card-title" style="color: #5555ff" ;>13kWh</h2>
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
                            <img src="{{asset('images/expor.png')}}" alt="icon expor" height="115" width="120">
                        </div>
                        <div class="col-6">
                            <br>
                            <h5>Total Expor</h5>
                            <h2 class="card-title" style="color: #5555ff" ;>25kWh</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End CARD total produksi, total impor, total expor -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- TOTAL TAGIHAN, TOTAL PENGHEMATAN -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- column -->
        <div class="col-sm-12 col-lg-6">
            <div class="card bg-white">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <img src="{{asset('images/tagihan.png')}}" alt="icon icon tagihan" height="115" width="120">
                        </div>
                        <div class="col-6">
                            <br>
                            <h5> Total Tagihan</h5>
                            <h2 class="card-title" style="color: #5555ff" ;> Rp 1.200.000</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
        <div class="col-sm-12 col-lg-6">
            <div class="card bg-white">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <img src="{{asset('images/penghematan.png')}}" alt="icon penghematan" height="115" width="120">
                        </div>
                        <div class="col-6">
                            <br>
                            <h5> Total Penghematan</h5>
                            <h2 class="card-title" style="color: #5555ff" ;> Rp 1.300.000</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End CARD total tagihan, total penghematan -->
        <!-- ============================================================== -->
    </div>
</div>
@endsection