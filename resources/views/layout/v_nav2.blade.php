<!-- Tambahkan CSS ini di <head> layout -->
<style>
    .bg-gradient-mint {
        background: linear-gradient(180deg, #a7f3d0 0%, #6ee7b7 100%);
        color: #004d40;
    }
    .sidebar-dark .nav-link,
    .sidebar-dark .sidebar-brand-text {
        color: #004d40 !important;
    }
    .sidebar-dark .nav-link:hover {
        color: #ffffff !important;
        background-color: rgba(0, 128, 96, 0.2);
    }
    .nav-link.active {
        background-color: rgba(0, 128, 96, 0.3);
        color: #ffffff !important;
    }
</style>

<!-- Sidebar dengan warna mint -->
<ul class="navbar-nav bg-gradient-mint sidebar sidebar-dark accordion shadow-sm" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center mt-3">
        <div class="sidebar-brand-icon">
            <i class="fas fa-leaf text-dark fa-lg"></i>
        </div>
        <div class="sidebar-brand-text mx-2 font-weight-bold">Saung Kandang</div>
    </a>

    <a class="sidebar-brand d-flex align-items-center justify-content-center mb-3">
        <div class="sidebar-brand-icon">
            <i class="fas fa-user text-dark"></i>
        </div>
        <div class="sidebar-brand-text mx-2">Karyawan</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider bg-white">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('home') ? 'active' : '' }}">
        <a class="nav-link" href="/home">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider bg-white">


    <!-- Menu -->
         <li class="nav-item {{ request()->is('kandang') ? 'active' : '' }}">
        <a class="nav-link" href="/jadwal_kesehatan">
            <i class="fas fa-home fa-lg"></i>
            <span>Jadwal Kesehatan</span>
        </a>
    </li>
    <li class="nav-item {{ request()->is('sapi') ? 'active' : '' }}">
        <a class="nav-link" href="/sapi">
            <i class="fas fa-hippo fa-lg"></i>
            <span>Data Sapi</span>
        </a>
    </li>

    <li class="nav-item {{ request()->is('pakan') ? 'active' : '' }}">
        <a class="nav-link" href="/pakan">
            <i class="fas fa-drumstick-bite fa-lg"></i>
            <span>Data Pakan</span>
        </a>
    </li>

    <li class="nav-item {{ request()->is('kesehatan_sapi') ? 'active' : '' }}">
        <a class="nav-link" href="/kesehatan_sapi">
            <i class="fas fa-hospital fa-lg"></i>
            <span>Data Kesehatan</span>
        </a>
    </li>

    <li class="nav-item {{ request()->is('kandang') ? 'active' : '' }}">
        <a class="nav-link" href="/kandang">
            <i class="fas fa-home fa-lg"></i>
            <span>Data Kandang</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider bg-white">

    <!-- Tombol Back -->
    <div class="text-center mb-3">
        <a class="nav-link btn btn-sm btn-success text-white px-3" href="javascript:history.back()">
            <i class="fas fa-arrow-left mr-1"></i> Back
        </a>
    </div>

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0 bg-white" id="sidebarToggle"></button>
    </div>

</ul>
