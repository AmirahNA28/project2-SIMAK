@extends('layout.v_template_tables')

@section('title', 'Edit Data Sapi')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Edit Data Sapi</h5>
                </div>

                <div class="card shadow mb-4">
            <div class="card-body">

            <form action="{{ route('sapi.update', $sapi->id_sapi) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="id_kandang">ID Kandang</label>
                    <select name="id_kandang" id="id_kandang" class="form-control" required>
                        <option value="">-- Pilih Kandang --</option>
                        @foreach ($kandang as $k)
                            <option value="{{ $k->id_kandang }}" {{ $k->id_kandang == $sapi->id_kandang ? 'selected' : '' }}>
                                {{ $k->no_kandang }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-2">
                    <label style="font-weight: 600;">Jenis Sapi</label>
                    <select name="jenis_sapi" class="form-control form-control-sm" required>
                        <option value="" disabled {{ $sapi->jenis_sapi ? '' : 'selected' }}>Pilih jenis sapi</option>
                        <option value="Sapi Perah" {{ $sapi->jenis_sapi == 'Sapi Perah' ? 'selected' : '' }}>Sapi Perah</option>
                        <option value="Sapi Potong" {{ $sapi->jenis_sapi == 'Sapi Potong' ? 'selected' : '' }}>Sapi Potong</option>
                        <option value="Sapi Lokal" {{ $sapi->jenis_sapi == 'Sapi Lokal' ? 'selected' : '' }}>Sapi Lokal</option>
                        <option value="Sapi Limousin" {{ $sapi->jenis_sapi == 'Sapi Limousin' ? 'selected' : '' }}>Sapi Limousin</option>
                        <option value="Sapi Brangus" {{ $sapi->jenis_sapi == 'Sapi Brangus' ? 'selected' : '' }}>Sapi Brangus</option>
                        <option value="Sapi Po" {{ $sapi->jenis_sapi == 'Sapi Po' ? 'selected' : '' }}>Sapi Po</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="berat">Berat (kg)</label>
                    <input type="number" name="berat" class="form-control" value="{{ old('berat', $sapi->berat) }}" required>
                </div>

                <div class="form-group">
                    <label for="tgl_masuk">Tanggal Masuk</label>
                    <input type="date" name="tgl_masuk" class="form-control" value="{{ old('tgl_masuk', $sapi->tgl_masuk) }}" required>
                </div>

                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="number" name="stok" class="form-control" value="{{ old('stok', $sapi->stok) }}" required>
                </div>

                <div class="form-group">
                    <label for="foto_sapi">Foto Sapi (biarkan kosong jika tidak ingin ganti)</label>
                    <input type="file" name="foto_sapi" class="form-control-file">
                    @if ($sapi->foto_sapi)
                        <img src="{{ url('foto_sapi', $sapi->foto_sapi) }}" width="150px" class="mt-2" alt="Foto Lama">
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Update Data</button>
                <a href="/sapi" class="btn btn-secondary">Batal</a>
            </form>

        </div>
    </div>
</div>
@endsection