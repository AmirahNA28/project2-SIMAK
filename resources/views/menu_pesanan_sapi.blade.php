@extends('layout.v_template2')

@section('title')
Daftar Pesanan Sapi
@endsection

@section('page')
    Halaman Daftar Pesanan Sapi
@endsection
@section('content')
 <!-- Topbar -->
 <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
</button>

<!-- Topbar Search -->
<form
    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="input-group">
        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
            aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</form>

<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
    <li class="nav-item dropdown no-arrow d-sm-none">
        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
        </a>
        <!-- Dropdown - Messages -->
        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
            aria-labelledby="searchDropdown">
            <form class="form-inline mr-auto w-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small"
                        placeholder="Search for..." aria-label="Search"
                        aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </li>

    <!-- Nav Item - Alerts -->
    <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <!-- Counter - Alerts -->
            <span class="badge badge-danger badge-counter">3+</span>
        </a>
        <!-- Dropdown - Alerts -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">
                Alerts Center
            </h6>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle bg-primary">
                        <i class="fas fa-file-alt text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle bg-success">
                        <i class="fas fa-donate text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle bg-warning">
                        <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                </div>
            </a>
            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
        </div>
    </li>

    <!-- Nav Item - Messages -->
    <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <!-- Counter - Messages -->
            <span class="badge badge-danger badge-counter">7</span>
        </a>
        <!-- Dropdown - Messages -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">
                Message Center
            </h6>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="{{asset('template')}}/img/undraw_profile_1.svg"
                        alt="...">
                    <div class="status-indicator bg-success"></div>
                </div>
                <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a
                        problem I've been having.</div>
                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="{{asset('template')}}/img/undraw_profile_2.svg"
                        alt="...">
                    <div class="status-indicator"></div>
                </div>
                <div>
                    <div class="text-truncate">I have the photos that you ordered last month, how
                        would you like them sent to you?</div>
                    <div class="small text-gray-500">Jae Chun · 1d</div>
                </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="{{asset('Tamplate')}}/img/undraw_profile_3.svg"
                        alt="...">
                    <div class="status-indicator bg-warning"></div>
                </div>
                <div>
                    <div class="text-truncate">Last month's report looks great, I am very happy with
                        the progress so far, keep up the good work!</div>
                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                        alt="...">
                    <div class="status-indicator bg-success"></div>
                </div>
                <div>
                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                        told me that people say this to all dogs, even if they aren't good...</div>
                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                </div>
            </a>
            <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
        </div>
    </li>

    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
            <img class="img-profile rounded-circle"
                src="{{asset('Tamplate')}}/img/undraw_profile.svg">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
            </a>
            <a class="dropdown-item" href="#">
                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                Settings
            </a>
            <a class="dropdown-item" href="#">
                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                Activity Log
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/home" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
            </a>
        </div>
    </li>

</ul>

</nav>
<!-- End of Topbar -->

<div class="card">
<div class="card-header">
<h3 class="card-title">Daftar Pesanan Sapi</h3>
</div>
<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
    @if (session('pesan'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> Success</h5>
            {{ session('pesan') }}
        </div>
    @endif
</table>
<div align="right">
    <a href="/menu_pesanan_sapi/add" class="btn btn-sm btn-primary">Add Data</a><br>
</div>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
            <tr>
                <th>Nama Sapi</th>
                <th>Berat (kg)</th>
                <th>Umur (bulan)</th>
                <th>Gambar</th>
            </tr>

    </thead>
    <body>
    <?php $no=1;?>
    @foreach ($produk_sapis as $sapi)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $sapi->nama }}</td>
        <td>{{ $sapi->berat }}</td>
        <td>{{ $sapi->umur }}</td>
        <td>{{ $sapi->gambar }}</td>
    </tr>

            <img src="{{ url('gambar/'.$sapi->gambar) }}" width="100px">
        </td>
        <td>
            <a href="/menu_pesanan_sapi/detail/{{ $sapi->id_sapi }}" class="btn btn-sm btn-success">Detail</a>
            <a href="/menu_pesanan_sapi/update/{{ $sapi->id_sapi }}" class="btn btn-sm btn-warning">Edit</a>
            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $sapi->id_sapi }}">
                Delete
            </button>
        </td>
    </tr>
    @endforeach
    </body>
    @foreach ($produk_sapis as $sapi)
        <div class="modal fade" id="delete{{ $sapi->id_sapi }}">
            <div class="modal-dialog modal-sm">
                <div class="modal-content bg-danger">
                    <div class="modal-header">
                        <h6 class="modal-title">{{ $sapi->nama }}</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda ingin menghapus data ini?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <a href="/menu_pesanan_sapi/delete/{{ $sapi->id_sapi }}" class="btn btn-outline-light">Yes</a>
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach@extends('layout.v_template2')

@section('title', 'Daftar Pesanan Sapi')

@section('content')
<div class="container-fluid">

    <!-- Tombol Tambah -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('menu_pesanan_sapi.create') }}" class="btn btn-success">
            Add
        </a>
    </div>

    <!-- Tabel Data Sapi -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gradient-primary">
            <h3 class="card-title text-white text-center">Daftar Pesanan Sapi</h3>
        </div>

        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="table-responsive">
                <table id="example1" class="table table-bordered text-center">
                    <thead class="bg-gradient-primary text-white">
                        <tr>
                        <th>Nama Sapi</th>
                        <th>Berat (kg)</th>
                        <th>Umur (bulan)</th>
                        <th>Gambar</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produk_sapis as $key => $sapi)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $sapi->nama }}</td>
                            <td>{{ $sapi->berat }}</td>
                            <td>{{ $sapi->umur }}</td>
                            <td>{{ $sapi->gambar }}</td>
                            <td>
                                @if ($sapi->foto_pakan)
                                    <img src="{{ asset('gambar/' . $sapi->gambar) }}" width="80">
                                @else
                                    <span class="text-muted">Tidak Ada</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('menu_pesanan_sapi.detail', ['id' => $sapi->id]) }}" class="btn btn-info btn-sm">Detail</a>
                                    <a href="{{ route('menu_pesanan_sapi.update', ['id' => $sapi->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $key }}">
                                        Delete
                                    </button>
                                </div>

                                <!-- Modal Konfirmasi Hapus -->
                                <div class="modal fade" id="delete{{ $key }}" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{ route('menu_pesanan_sapi.delete', ['id' => $sapi->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger text-white">
                                                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                    <button type="button" class="close text-white" data-dismiss="modal">
                                                        <span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Yakin ingin menghapus sapi <strong>{{ $sapi->nama }}</strong>?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- End Modal -->
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End Modal -->

@endsection

</table>
</div>
</div>

@endsection

