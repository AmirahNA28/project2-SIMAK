@extends('layout.v_template2')

@section('title', 'Data Kandang')

@section('content')
<div class="container-fluid">

    <!-- Tombol Tambah -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('kandang.create') }}" class="btn btn-success">
            Add
        </a>
    </div>

    <!-- Tabel Data Kandang -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gradient-primary">
            <h3 class="card-title text-white text-center">Data Kandang</h3>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Sukses!</strong> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-gradient-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>ID Kandang</th>
                            <th>No Kandang</th>
                            <th>Berat (Kg)</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kandang as $index => $data)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $data->id_kandang }}</td>
                            <td>{{ $data->no_kandang }}</td>
                            <td>{{ $data->berat }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('kandang.detail', $data->id_kandang) }}" class="btn btn-sm btn-info">Detail</a>
                                    <a href="{{ route('kandang.edit', $data->id_kandang) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_kandang }}">
                                        Hapus
                                    </button>
                                </div>

                                <!-- Modal Konfirmasi Hapus -->
                                <div class="modal fade" id="delete{{ $data->id_kandang }}" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel{{ $data->id_kandang }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{ route('kandang.delete', $data->id_kandang) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger text-white">
                                                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Tutup">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Yakin ingin menghapus kandang dengan ID <strong>{{ $data->id_kandang }}</strong>?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
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
