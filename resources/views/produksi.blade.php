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
                            <img src="{{asset('/images/Produksi.png')}}" alt="Produksi" height="65" width="65">
                        </div>
                        <div class="col-4">
                            <br>
                            <h3> Monitor Data Produksi</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Produksi Harian / Monitor Data Produksi -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div>
                        <div class="col-12">
                            <h3><strong>Produksi Harian</strong></h3>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <h4 class="card-title" style="color: blue ; margin-left: 15px" ><strong id="realHarian">0KWh</strong></h4>
                                <h6 class="card-subtitle" style="margin-left: 15px">Pada 12.00 PM</h6>
                            </div>
                            <div class="col-auto" style="text-align: left">
                                <h4 class="card-title" style="color: blue ; margin-left: 15px"><strong id="TotalHarian">0KWh</strong></h4>
                                <h6 class="card-subtitle" style="margin-left: 15px">Total Produksi    </h6>
                            </div>
                            <div class="col-auto ml-0 mr-4">
                                <input id="datepicker" width="260" style="margin-left: 15px" />
                                <script>
                                    $('#datepicker').datepicker({
                                        uiLibrary: 'bootstrap4'
                                    });
                                </script>
                            </div>
                            <div class="col-3.5 selector-info my-1" style="position: absolute; right:35px">
                                <h5 class="card-subtitle my-2" style="color: #696969; margin-left: 45px"">{{$datetime->day}} {{$datetime->englishMonth}} {{$datetime->year}}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- column -->
                        <div class="col-lg-12">
                            <canvas id="produksi-Harian" height="80"></canvas>
                        </div>
                        <!-- column -->
                    </div>
                    <br>
                    <div class="ml-auto d-flex no-block align-items-center">
                        <ul class="list-inline font-12 dl mr-3 mb-0" style="margin-left: 30px">
                            <li class="list-inline-item" style="color: black"><i class="fas fa-square" style="color: #2A6EDD"></i> Produksi Panel Surya</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--========================================================================================== -->
                                    <!-- Produksi Mingguan -->
    <!-- ========================================================================================== -->

     <div class="row">
        <!-- column -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                     <div class="col-12">
                        <h3><strong>Produksi Mingguan</strong></h3>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <h4 class="card-title" style="color: blue; margin-left: 30px"><strong id="TotalMingguan">0KWh</strong></h4>
                            <h6 class="card-subtitle" style="margin-left: 30px">Total Produksi</h6>
                        </div>
                        <div class="col-lg-2" style="text-align: left">
                            <!-- <h4 class="card-title" style="color: blue"><strong>600KWh</strong></h4>
                            <h6 class="card-subtitle">Total Produksi    </h6>  -->
                        </div>
                    </div>
                    <!-- Bulanan -->
                    <div class="pt-3">
                        <div class="row">
                            <!-- column -->
                           <div class="col-md-12 col-lg-12">
                              <canvas id="produksi-Mingguan" height="80"></canvas>
                                <div class="row mb-0 mt-3 text-center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
      </div>
    <!-- ============================================================== -->
    <!-- END PRODUKSI MINGGUAN -->
    <!-- ============================================================== -->

    <!-- ========================================================================================== -->
                                            <!-- Produksi Bulanan -->
    <!-- ========================================================================================== -->

     <div class="row">
        <!-- column -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                     <div class="col-12">
                        <h3><strong>Produksi Bulanan</strong></h3>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <h4 class="card-title" style="color: blue; margin-left: 30px"><strong id="TotalBulanan">0KWh</strong></h4>
                            <h6 class="card-subtitle" style="margin-left: 30px">Total Produksi</h6>
                        </div>
                        <div class="col-lg-2" style="text-align: left">
                            <!-- <h4 class="card-title" style="color: blue"><strong>600KWh</strong></h4>
                            <h6 class="card-subtitle">Total Produksi    </h6>  -->
                        </div>
                    </div>
                    <!-- Bulanan -->
                    <div class="pt-3">
                        <div class="row">
                            <!-- column -->
                           <div class="col-md-12 col-lg-12">
                            <canvas id="produksi-Bulanan" height="80"></canvas>
                            <div class="row mb-0 mt-3 text-center">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- END PRODUKSI BULANAN -->
<!-- ============================================================== -->
<!-- ========================================================================================== -->
<!-- Produksi Tahunan -->
<!-- ========================================================================================== -->

<div class="row">
    <!-- column -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="col-12">
                    <h3><strong>Produksi Tahunan</strong></h3>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <h4 class="card-title" style="color: blue; margin-left: 30px"><strong id="TotalTahunan">600KWh</strong></h4>
                        <h6 class="card-subtitle" style="margin-left: 30px">Total Produksi</h6>
                    </div>
                </div>
                <!-- tahunan -->
                <div class="pt-3">
                    <div class="row">
                        <!-- column -->
                        <div class="col-md-12 col-lg-12">
                            <canvas id="produksi-Tahunan" height="80"></canvas>
                                <div class="row mb-0 mt-3 text-center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
      </div>
    <!-- ============================================================== -->
    <!-- END PRODUKSI TAHUNAN -->
    <!-- ============================================================== -->
@endsection