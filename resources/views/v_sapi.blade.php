@extends('layout.v_template2')

@section('title', 'Data Sapi')

@section('content')
<div class="container-fluid">

    <!-- Tombol Tambah -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ url('/sapi/add') }}" class="btn btn-success">Add</a>
    </div>

    <!-- Tabel Data Sapi -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gradient-primary">
            <h3 class="card-title text-white text-center">Data Sapi</h3>
        </div>
        <div class="card-body">
            @if (session('pesan'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session('pesan') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="table-responsive">
                <table id="example1" class="table table-bordered text-center">
                    <thead class="bg-gradient-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>ID Sapi</th>
                            <th>ID Kandang</th>
                            <th>Jenis Sapi</th>
                            <th>Berat (kg)</th>
                            <th>Tanggal Masuk</th>
                            <th>Stok</th>
                            <th>Foto Sapi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sapi as $key => $data)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $data->id_sapi }}</td>
                            <td>{{ $data->id_kandang }}</td>
                            <td>{{ $data->jenis_sapi }}</td>
                            <td>{{ $data->berat }}</td>
                            <td>{{ \Carbon\Carbon::parse($data->tgl_masuk)->format('d-m-Y') }}</td>
                            <td>{{ $data->stok }}</td>
                            <td>
                                <img src="{{ url('foto_sapi/', $data->foto_sapi) }}" width="70px" class="rounded">
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ url('/sapi/detail/' . $data->id_sapi) }}" class="btn btn-info btn-sm">Detail</a>
                                    <a href="{{ url('/sapi/edit/' . $data->id_sapi) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $key }}">
                                        Delete
                                    </button>
                                </div>

                                <!-- Modal Hapus -->
                                <div class="modal fade" id="delete{{ $key }}" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{ url('/sapi/delete/' . $data->id_sapi) }}" method="GET">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger text-white">
                                                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Yakin ingin menghapus data sapi dengan ID <strong>{{ $data->id_sapi }}</strong>?
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
@endsection
