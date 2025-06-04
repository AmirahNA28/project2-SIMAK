@extends('layout.v_template2')
@section('title')
Kandang
@endsection
@section('page')
Tambah Data Kandang
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Tambah Kandang</h3>
                </div>
                <!-- form start -->
                <form action="{{ route('kandang.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>ID Kandang</label>
                            <input type="text" name="id_kandang" class="form-control" placeholder="Masukkan ID Kandang" value="{{ old('id_kandang') }}">
                            <div class="text-danger">
                                @error('id_kandang')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label>No Kandang</label>
                            <select name="no_kandang" class="form-control">
                                <option value="" disabled selected>-- Pilih No Kandang --</option>
                                <option value="1" {{ old('no_kandang') == '1' ? 'selected' : '' }}>Kandang 1</option>
                                <option value="2" {{ old('no_kandang') == '2' ? 'selected' : '' }}>Kandang 2</option>
                                <option value="3" {{ old('no_kandang') == '3' ? 'selected' : '' }}>Kandang 3</option>
                                <option value="4" {{ old('no_kandang') == '4' ? 'selected' : '' }}>Kandang 4</option>
                                <option value="5" {{ old('no_kandang') == '5' ? 'selected' : '' }}>Kandang 5</option>
                                <option value="6" {{ old('no_kandang') == '6' ? 'selected' : '' }}>Kandang 6</option>
                            </select>
                            <div class="text-danger">
                                @error('no_kandang')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Berat (Kg)</label>
                            <input type="text" name="berat" class="form-control" placeholder="Masukkan Berat" value="{{ old('berat') }}">
                            <div class="text-danger">
                                @error('berat')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('kandang.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection