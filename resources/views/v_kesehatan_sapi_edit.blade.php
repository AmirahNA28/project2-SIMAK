@extends('layout.v_template_tables')

@section('title', 'Edit Data Kesehatan Sapi')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Edit Data Kesehatan Sapi</h2>

    {{-- Pesan sukses/error --}}
    @if(session('pesan'))
        <div class="alert alert-success">{{ session('pesan') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('kesehatan.update', $data->id_kesehatan) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- ID Kesehatan (Hidden) --}}
        <input type="hidden" name="id_kesehatan" value="{{ $data->id_kesehatan }}">

        {{-- ID Sapi --}}
        <div class="form-group mb-3">
            <label for="id_sapi"><strong>Nama Sapi</strong></label>
            <select name="id_sapi" class="form-control @error('id_sapi') is-invalid @enderror" required>
                <option value="">-- Pilih Sapi --</option>
                @foreach($sapi as $item)
                    <option value="{{ $item->id_sapi }}" {{ old('id_sapi', $data->id_sapi) == $item->id_sapi ? 'selected' : '' }}>
                        {{ $item->jenis_sapi }} 
                    </option>
                @endforeach
            </select>
            @error('id_sapi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tanggal Pemeriksaan --}}
        <div class="form-group mb-3">
            <label for="tgl_pemeriksaan"><strong>Tanggal Pemeriksaan</strong></label>
            <input type="date" name="tgl_pemeriksaan" class="form-control @error('tgl_pemeriksaan') is-invalid @enderror"
                   value="{{ old('tgl_pemeriksaan', $data->tgl_pemeriksaan) }}" required>
            @error('tgl_pemeriksaan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Status Kesehatan --}}
        <div class="form-group mb-3">
            <label for="status_kesehatan"><strong>Status Kesehatan</strong></label>
            <select name="status_kesehatan" class="form-control @error('status_kesehatan') is-invalid @enderror" required>
                <option value="">-- Pilih Status --</option>
                <option value="Sehat" {{ old('status_kesehatan', $data->status_kesehatan) == 'Sehat' ? 'selected' : '' }}>Sehat</option>
                <option value="Sakit" {{ old('status_kesehatan', $data->status_kesehatan) == 'Sakit' ? 'selected' : '' }}>Sakit</option>
            </select>
            @error('status_kesehatan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tindakan --}}
        <div class="form-group mb-3">
            <label for="tindakan"><strong>Tindakan</strong></label>
            <input type="text" name="tindakan" class="form-control @error('tindakan') is-invalid @enderror"
                   value="{{ old('tindakan', $data->tindakan) }}" required>
            @error('tindakan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Nama Obat --}}
        <div class="form-group mb-3">
            <label for="nama_obat"><strong>Nama Obat</strong></label>
            <input type="text" name="nama_obat" class="form-control @error('nama_obat') is-invalid @enderror"
                   value="{{ old('nama_obat', $data->nama_obat) }}" required>
            @error('nama_obat')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('kesehatan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
