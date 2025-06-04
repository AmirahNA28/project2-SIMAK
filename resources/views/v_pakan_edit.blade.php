@extends('layout.v_template_tables')

@section('title', 'Edit Data Pakan Sapi')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Edit Data Pakan Sapi</h2>

    <form action="{{ route('pakan.update', $pakan->id_pakan) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- ID Pakan -->
        <div class="form-group mb-3">
            <label><strong>ID Pakan</strong></label>
            <input type="text" name="id_pakan" class="form-control" value="{{ $pakan->id_pakan }}" readonly>
        </div>

        <!-- Jenis Pakan -->
        <div class="form-group mb-3">
            <label><strong>Jenis Pakan</strong></label>
            <input type="text" name="jenis_pakan" class="form-control" value="{{ $pakan->jenis_pakan }}" required>
        </div>

        <!-- Harga -->
        <div class="form-group mb-3">
            <label><strong>Harga</strong></label>
            <input type="number" name="harga" class="form-control" value="{{ $pakan->harga }}" required>
        </div>

        <!-- Foto Pakan -->
        <div class="form-group mb-3">
            <label><strong>Foto Pakan</strong></label>
            <input type="file" name="foto_pakan" class="form-control">
            @if ($pakan->foto_pakan)
                <div class="mt-2">
                    <img src="{{ asset('foto_pakan/' . $pakan->foto_pakan) }}" alt="Foto Pakan" width="100">
                </div>
            @endif
        </div>

        <!-- Tombol -->
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('pakan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
