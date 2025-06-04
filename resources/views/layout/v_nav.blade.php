 <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/dashboard-pelanggan') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-cow"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Pelanggan</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Menu -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/dashboard-pelanggan') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Beranda</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/daftar-pesanan') }}">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                    <span>Daftar Pesanan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/logout') }}">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

        </ul>