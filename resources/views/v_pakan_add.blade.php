@extends('layout.v_template2')

@section('title', 'Tambah Pakan Sapi')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Tambah Data Pakan Sapi</h3>

    <form action="{{ route('pakan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- ID Pakan -->
        <div class="form-group mb-3">
            <label><strong>ID Pakan</strong></label>
            <input type="number" name="id_pakan" class="form-control" required>
        </div>

        <!-- Jenis Pakan -->
        <div class="form-group mb-3">
            <label><strong>Jenis Pakan</strong></label>
            <input type="text" name="jenis_pakan" class="form-control" required>
        </div>

        <!-- Harga -->
        <div class="form-group mb-3">
            <label><strong>Harga</strong></label>
            <input type="number" name="harga" class="form-control" required>
        </div>

        <!-- Foto Pakan -->
        <div class="form-group mb-3">
            <label><strong>Foto Pakan</strong></label>
            <input type="file" name="foto_pakan" class="form-control">
        </div>

        <!-- Tombol Aksi -->
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('pakan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
