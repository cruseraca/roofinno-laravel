{{-- @section('sidemenu') --}}
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- Menu -->
                <li class="sidebar-item active"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-th-large"></i><span class="hide-menu">Dashboard </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{url('/dashboard')}}" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Dashboard Saya </span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link  waves-effect waves-dark" href="{{url('/dashboard')}}/produksi" aria-expanded="false"><i class="fas fa-solar-panel"></i><span class="hide-menu">Produksi </span></a>
                    <!-- <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{url('/dashboard')}}/produksi" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Dashboard Produksi </span></a></li>
                    </ul> -->
                </li>
                <li class="sidebar-item"> <a class="sidebar-link  waves-effect waves-dark" href="{{url('/dashboard')}}/konsumsi" aria-expanded="false"><i class="fas fa-plug"></i><span class="hide-menu">Konsumsi </span></a>
                    <!-- <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{url('/dashboard')}}/konsumsi" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Dashboard Konsumsi </span></a></li>
                    </ul> -->
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="{{url('/dashboard')}}/performa" aria-expanded="false"><i class="fas fa-signal"></i><span class="hide-menu">Performa </span></a>
                    <!-- <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{url('/dashboard')}}/performa" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Dashboard Performa </span></a></li>
                    </ul> -->
                </li>
                <li class="sidebar-item"> <a class="sidebar-link  waves-effect waves-dark" href="{{url('/dashboard')}}/penghematan" aria-expanded="false"><i class="fas fa-wallet"></i><span class="hide-menu">Penghematan </span></a>
                    <!-- <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{url('/dashboard')}}/penghematan" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Dashboard Penghematan </span></a></li>
                    </ul> -->
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="{{url('/dashboard')}}/baterai" aria-expanded="false"><i class="fas fa-battery-full"></i><span class="hide-menu">Baterai </span></a>
                    <!-- <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{url('/dashboard')}}/baterai" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Dashboard Baterai </span></a></li>
                    </ul> -->
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="{{url('/dashboard')}}/laporan" aria-expanded="false"><i class="fas fa-clipboard-list"></i><span class="hide-menu">Laporan </span></a>
                    <!-- <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item"><a href="{{url('/dashboard')}}/laporan" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Dashboard Laporan </span></a></li>
                    </ul> -->
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="far fa-clock"></i><span class="hide-menu">Penjadwalan </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{url('/dashboard')}}/penjadwalan" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Dashboard Penjadwalan </span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link  waves-effect waves-dark" href="{{url('/dashboard')}}/pengaturan" aria-expanded="false"><i class="fas fa-cog"></i><span class="hide-menu">Pengaturan </span></a>
                    <!-- <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{url('/dashboard')}}/pengaturan" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Pengaturan Dashboard </span></a></li>
                    </ul> -->
                </li>
            </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
{{-- @endsection --}}
