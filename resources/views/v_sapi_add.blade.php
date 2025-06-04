@extends('layout.v_template2')
@section('title')
Sapi
@endsection
@section('page')
Tambah Data Sapi
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Tambah Sapi</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="/sapi/insert" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>ID Sapi</label>
                            <input type="text" name="id_sapi" class="form-control" placeholder="Masukkan ID Sapi" value="{{ old('id_sapi') }}">
                            <div class="text-danger">
                                @error('id_sapi')
                                    {{ $message }}
                                @enderror
                            </div>
                    </div>
                        <div class="form-group">
                            <label>ID Kandang</label>
                            <select name="id_kandang" class="form-control">
                                <option value="">-- Pilih No Kandang --</option>
                               @foreach ($kandang as $data)
                                    <option value="{{ $data->id_kandang }}" {{ old('id_kandang') == $data->id_kandang ? 'selected' : '' }}>
                                        {{ $data->no_kandang }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="text-danger">
                                @error('id_kandang')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <label style="font-weight: 600;">Jenis Sapi</label>
                            <select name="jenis_sapi" class="form-control form-control-sm" required>
                                <option value="" disabled selected>Pilih jenis sapi</option>
                                <option value="Sapi Perah">Sapi Perah</option>
                                <option value="Sapi Potong">Sapi Potong</option>
                                <option value="Sapi Lokal">Sapi Lokal</option>
                                <option value="Sapi Limousin">Sapi Limousin</option>
                                <option value="Sapi Brangus">Sapi Brangus</option>
                                <option value="Sapi Po">Sapi Po</option>
                                <!-- Tambahkan opsi lain sesuai kebutuhan -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Berat</label>
                            <input type="text" name="berat" class="form-control" placeholder="Masukkan Berat Sapi" value="{{ old('berat') }}">
                            <div class="text-danger">
                                @error('berat')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <label style="font-weight: 600;">Tanggal Masuk</label>
                            <input type="date" name="tgl_masuk" class="form-control form-control-sm" required>
                        </div>
                        <div class="form-group">
                            <label>Stok</label>
                            <input type="text" name="stok" class="form-control" placeholder="Masukkan Stok Sapi" value="{{ old('stok') }}">
                            <div class="text-danger">
                                @error('stok')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Foto Sapi</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="foto_sapi" class="custom-file-input">
                                    <label class="custom-file-label">Pilih file</label>
                                </div>
                            </div>
                            <div class="text-danger">
                                @error('foto_sapi')
                                    {{ $message }}
                                @enderror
                            </div>
                    </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Insert</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection
