<!-- Sidebar -->
        


        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-tasks"></i>
                </div>
                <div class="sidebar-brand-text mx-2">Antar-Jemput</div>
            </a>
 
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ $menuDashboard ?? '' }}">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-tachometer-alt "></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            
            <li class="nav-item {{ $menuUser ?? '' }}">
                <a class="nav-link" href="{{ route('user') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>User</span></a>
            </li>

            <li class="nav-item {{ $menuStudent ?? '' }}">
                <a class="nav-link" href="{{ route('student') }}">
                    <i class="fas fa-fw fa-user-graduate"></i>
                    <span>Siswa</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-car-side"></i>
                    <span>Sopir dan Kendaraan</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ $menuDriver ?? '' }}" href="{{ route('driver') }}">Sopir</a>
                        <a class="collapse-item {{ $menuVehicle ?? '' }}" href="{{ route('vehicle') }}">Kendaraan</a>
                        <a class="collapse-item {{ $menuDriverVehicle ?? '' }}" href="{{ route('driver_vehicle') }}">Konfigurasi</a>
                    </div>
                </div>
            </li>
            
            <li class="nav-item {{ $menuStatus ?? '' }}">
                <a class="nav-link" href="{{ route('status') }}">
                    <i class="fas fa-fw fa-info"></i>
                    <span>Status Aplikasi</span></a>
            </li>

            <li class="nav-item {{ $menuRideRequest ?? '' }}">
                <a class="nav-link" href="{{ route('riderequest') }}">
                    <i class="fas fa-fw fa-route"></i>
                    <span>Request</span></a>
            </li>

            <li class="nav-item {{ $menuSchedule ?? '' }}">
                <a class="nav-link" href="{{ route('schedule') }}">
                    <i class="fas fa-fw fa-calendar-alt"></i>
                    <span>Jadwal</span></a>
            </li>

            <li class="nav-item {{ $menuHistory ?? '' }}">
                <a class="nav-link" href="{{ route('history') }}">
                    <i class="fas fa-fw fa-history"></i>
                    <span>Riwayat</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->