@extends('layout.v_template2')

@section('title', 'Tambah Data Kesehatan Sapi')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header bg-gradient-primary text-white">
            <h3 class="text-center">Form Tambah Data Kesehatan Sapi</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('kesehatan.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="id_kesehatan">ID Kesehatan</label>
                    <input type="text" name="id_kesehatan" class="form-control" value="{{ old('id_kesehatan') }}" required>
                    @error('id_kesehatan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="id_sapi">Pilih ID Sapi</label>
                    <select name="id_sapi" class="form-control" required>
                        <option value="">-- Pilih Sapi --</option>
                        @foreach ($sapi as $item)
                            <option value="{{ $item->id_sapi }}" {{ old('id_sapi') == $item->id_sapi ? 'selected' : '' }}>
                                {{ $item->id_sapi }} - {{ $item->jenis_sapi ?? 'Tanpa Nama' }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_sapi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tgl_pemeriksaan">Tanggal Pemeriksaan</label>
                    <input type="date" name="tgl_pemeriksaan" class="form-control" value="{{ old('tgl_pemeriksaan') }}" required>
                    @error('tgl_pemeriksaan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status_kesehatan">Status Kesehatan</label>
                    <select name="status_kesehatan" class="form-control" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="Sehat" {{ old('status_kesehatan') == 'Sehat' ? 'selected' : '' }}>Sehat</option>
                        <option value="Sakit" {{ old('status_kesehatan') == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                    </select>
                    @error('status_kesehatan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tindakan">Tindakan</label>
                    <textarea name="tindakan" class="form-control">{{ old('tindakan') }}</textarea>
                    @error('tindakan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama_obat">Nama Obat</label>
                    <input type="text" name="nama_obat" class="form-control" value="{{ old('nama_obat') }}">
                    @error('nama_obat')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="/kesehatan_sapi" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
