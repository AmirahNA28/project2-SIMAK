@extends('layout.v_template2')

@section('title', 'Data Kesehatan Sapi')

@section('content')
<div class="container-fluid">

    <!-- Tombol Tambah -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('kesehatan.create') }}" class="btn btn-success">
            Add
        </a>
    </div>

    <!-- Tabel Data Kesehatan Sapi -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gradient-primary">
            <h3 class="card-title text-white text-center">Data Kesehatan Sapi</h3>
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
                            <th>No</th>
                            <th>ID Kesehatan</th>
                            <th>ID Sapi</th>
                            <th>Tanggal Pemeriksaan</th>
                            <th>Status Kesehatan</th>
                            <th>Tindakan</th>
                            <th>Nama Obat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kesehatan as $key => $data)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $data->id_kesehatan }}</td>
                            <td>{{ $data->id_sapi }}</td>
                            <td>{{ \Carbon\Carbon::parse($data->tgl_pemeriksaan)->format('d-m-Y') }}</td>
                            <td>{{ $data->status_kesehatan }}</td>
                            <td>{{ $data->tindakan }}</td>
                            <td>{{ $data->nama_obat }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('kesehatan.detail', ['id_kesehatan' => $data->id_kesehatan]) }}" class="btn btn-info btn-sm">Detail</a>
                                    <a href="{{ route('kesehatan.edit', ['id_kesehatan' => $data->id_kesehatan]) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $key }}">
                                        Delete
                                    </button>
                                </div>

                                <!-- Modal Konfirmasi Hapus -->
                                <div class="modal fade" id="delete{{ $key }}" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{ route('kesehatan.delete', ['id_kesehatan' => $data->id_kesehatan]) }}" method="POST">
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
                                                    Yakin ingin menghapus data kesehatan dengan ID <strong>{{ $data->id_kesehatan }}</strong>?
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
