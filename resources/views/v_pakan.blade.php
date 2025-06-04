@extends('layout.v_template2')

@section('title', 'Data Pakan')
@section('page', 'Halaman Data Pakan Sapi')

@section('content')
<div class="container-fluid">

    <!-- Tombol Tambah -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('pakan.create') }}" class="btn btn-success">Add</a>
    </div>

    <!-- Tabel Data Pakan -->
    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white text-center">
            <h3 class="card-title">Data Pakan Sapi</h3>
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
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>ID Pakan</th>
                            <th>Jenis Pakan</th>
                            <th>Harga</th>
                            <th>Foto Pakan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pakan as $key => $data)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $data->id_pakan }}</td>
                            <td>{{ $data->jenis_pakan }}</td>
                            <td>Rp {{ number_format($data->harga, 0, ',', '.') }}</td>
                            <td>
                                @if ($data->foto_pakan)
                                    <img src="{{ asset('foto_pakan/' . $data->foto_pakan) }}" width="80">
                                @else
                                    <span class="text-muted">Tidak Ada</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('pakan.detail', $data->id_pakan) }}" class="btn btn-info btn-sm">Detail</a>
                                    <a href="{{ route('pakan.edit', $data->id_pakan) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $key }}">
                                        Hapus
                                    </button>
                                </div>

                                <!-- Modal Hapus -->
                                <div class="modal fade" id="delete{{ $key }}" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="{{ route('pakan.delete', $data->id_pakan) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <div class="modal-header bg-danger text-white">
                                                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                    <button type="button" class="close text-white" data-dismiss="modal">
                                                        <span>&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    Yakin ingin menghapus pakan <strong>{{ $data->jenis_pakan }}</strong>?
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </div>
                                            </form>
                                        </div>
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
