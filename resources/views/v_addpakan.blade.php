@extends('layout/v_template2')
@section('title')
    Pakan
@endsection

@section('page')
    Tambah Data Pakan
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">

            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Add</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="/pakan/insert" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jenis Pakan</label>
                                <input type="text" name="jenis_pakan" class="form-control" id="exampleInputEmail1" placeholder="Masukan Jenis Pakan" value="{{ old('jenis_pakani') }}">
                                <div class="text-danger">
                                    @error('jenis_pakan')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Harga</label>
                                <input type="text" name="harga" class="form-control" id="exampleInputEmail1" placeholder="Masukan Harga" value="{{ old('harga') }}">
                                <div class="text-danger">
                                    @error('harga')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Foto Pakan</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="foto_pakan" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                                <div class="text-danger">
                                    @error('foto_pakan')
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
</div>
@endsection
