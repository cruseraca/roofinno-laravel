<div class="card gredient-info-bg mt-0 mb-0" style="background-image:url('{{ URL::to('/') }}assets/images/Untitled-123.png');height: 100%;background-position: center; background-repeat: no-repeat;background-size: cover;">
    <div class="card-body">
      <!-- KOTAKAN -->
      <div class="row">
          <!-- column -->
          <div class="col-sm-12 col-lg-5">
              <div class="card bg-transparent" >
                  <div class="card-body">
                     <b> <h5 class="card-title" style="color: #ffbc34;font-weight: bold;">Selamat Datang Rian</h5></b> <br>
                      <h3 style="color:white"><strong>Monitor Data Harian</strong></h3>
                      <h5 class="card-subtitle text-white">{{ tanggal_indo(date('Y-m-d'),true) }}</h5>
                  </div>
              </div>
          </div>
          <!-- column -->
           <div class="col-sm-12 col-lg-3">
             <div class="card" style="background-color: rgba(0, 0, 0, 0.23);border-radius:10px;">
              <div class="card-body">
                <div class="info d-flex align-items-center">
                   <div class="mr-4">
                       <i class="fas fa-plug fa-3x" style="color:white"></i>
                   </div>
                   <div>
                       <h3 class="text-white mb-0" id="sum1"> 600KWh</h3>
                       <span style="color:white"> Konsumsi hari ini </span>
                       <h6>    </h6>
                       <button type="button" class="btn waves-effect waves-light btn-warning">Lihat Lebih</button>
                       <br>
                   </div>
               </div>
              </div>
             </div>
           </div>
            <!-- column -->
            <div class="col-sm-12 col-lg-3">
              <div class="card" style="background-color: rgba(0, 0, 0, 0.23);border-radius:10px;">
               <div class="card-body">
                 <div class="info d-flex align-items-center">
                    <div class="mr-4">
                        <i class="fas fa-solar-panel fa-3x" style="color:white"></i>
                    </div>
                    <div>
                        <h3 class="text-white mb-0" id="sum2"> 500KWh</h3>
                        <span style="color:white"> Produksi hari ini </span>
                        <h6>    </h6>
                        <button type="button" class="btn waves-effect waves-light btn-warning">Lihat Lebih</button>
                    </div>
                </div>
               </div>
              </div>
            </div>
          </div>
    </div>
</div>
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Sales chart -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                  <h2>Realtime Monitoring</h2>
                    <div class="d-md-flex align-items-center">
                            <div class="col-3">
                                <h4 class="card-title" style="color: blue" id="kons">10KW</h4>
                                <span><h5 class="card-subtitle">Konsumsi pada 12.00 PM</h5></span>
                            </div>
                            <div class="col-3">
                                 <h4 class="card-title" style="color: orange" id="prod">10KW</h4>
                                <h5 class="card-subtitle">Produksi pada 12.00 PM</h5>
                            </div> <br>
                    </div>
                    <div class="row">
                        <!-- column -->
                        <div class="col-lg-12"  id="aa">
                          <div id="rickshawGraph" data-color1="#2d3bed" data-color2="#ffa500"></div>
                        </div>
                        <table width="100%" style="font-size:smaller;">
                          <tr>
                            <td>00:00</td>
                            <td>01:00</td>
                            <td>02:00</td>
                            <td>03:00</td>
                            <td>04:00</td>
                            <td>05:00</td>
                            <td>06:00</td>
                            <td>07:00</td>
                            <td>08:00</td>
                            <td>09:00</td>
                            <td>10:00</td>
                            <td>11:00</td>
                            <td>12:00</td>
                            <td>13:00</td>
                            <td>14:00</td>
                            <td>15:00</td>
                            <td>16:00</td>
                            <td>17:00</td>
                            <td>18:00</td>
                            <td>19:00</td>
                            <td>20:00</td>
                            <td>21:00</td>
                            <td>22:00</td>
                            <td>23:00</td>
                          </tr>
                        </table>
                        <!-- <div class="col-lg-12">
                            <div class="grafik ct-charts"></div>
                        </div> -->
                        <!-- column -->

                    </div>
                    <hr style="margin-top: unset;">
                    <div class="ml-auto d-flex no-block align-items-center">
                            <ul class="list-inline font-15 dl mr-3 mb-0">
                                <li class="list-inline-item text-info"><i class="fas fa-check-square"></i> Konsumsi</li>
                                <li class="list-inline-item text-primary"><i class="fas fa-check-square" style="color: orange"></i> Produksi</li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
      <div class="card">
        <!--end .card-body -->
  		</div>
    </div>
    <!-- ============================================================== -->
    <!-- Daya baterai, performa hari ini -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- column -->
        <div class="col-sm-12 col-lg-4">
            <div class="card bg-white">
            <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <img src="{{ URL::to('/') }}assets/images/dayabaterai.png" alt="performa hari ini" height="115" width="110">
                        </div>
                        <div class="col-6">
                            <br>
                            <h3>80%</h3>
                            <h6 class="card-title text-black">Daya Baterai</h6>
                            <button type="button" class="btn waves-effect waves-light btn-info">Lihat Lebih</button>
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
                            <img src="{{ URL::to('/') }}assets/images/penghematan.png" alt="performa hari ini" height="115" width="110">
                        </div>
                        <div class="col-6">
                            <br>
                            <h3>Rp 134.000</h3>
                            <h6 class="card-title text-black">Penghematan Hari Ini</h6>
                            <button type="button" class="btn waves-effect waves-light btn-info">Lihat Lebih</button>
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
                            <img src="{{ URL::to('/') }}assets/images/performa.png" alt="performa hari ini" height="115" width="110">
                        </div>
                        <div class="col-6">
                            <br>
                            <h3>80%</h3>
                            <h6 class="card-title text-black">Performa Hari Ini</h6>
                            <button type="button" class="btn waves-effect waves-light btn-info">Lihat Lebih</button>
                        </div>
                    </div>
                    </div>
            </div>
        </div>
      </div>

</div>


{{-- 
<script type="text/javascript">
$(document).ready(function(){
  setTimeout(function () {
    grafik();
    $( window ).resize(function() {
        graphData.configure({
          height: $('#rickshawGraph').height(),
          width: $('#rickshawGraph').closest('#aa').width()
        });
        callGraph();
    });
  }, 1000);
});
</script>

<script type="text/javascript">
$(function() {
  grafikData();
  setInterval(function () {
    // grafikData();

  }, 1000);
})

function realtime_konsProd() {
  $.get("/User/realtime_konsProd", function(data, status){

     alert("Data: " + data + "\nStatus: " + status);
   });
}
</script> --}}
