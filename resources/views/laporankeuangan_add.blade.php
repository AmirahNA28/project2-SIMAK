@extends('layout.v_template4')

@section('content')
<div class="container mt-4">
    <h2>Tambah Laporan Keuangan</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('laporankeuangan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" name="keterangan" class="form-control" value="{{ old('keterangan') }}" required>
        </div>

        <div class="mb-3">
            <label for="pendapatan" class="form-label">Pendapatan (Rp)</label>
            <input type="number" name="pendapatan" class="form-control" value="{{ old('pendapatan', 0) }}" min="0">
        </div>

        <div class="mb-3">
            <label for="pengeluaran" class="form-label">Pengeluaran (Rp)</label>
            <input type="number" name="pengeluaran" class="form-control" value="{{ old('pengeluaran', 0) }}" min="0">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('laporankeuangan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
