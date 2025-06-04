@extends('layout/v_template2')
@section('title')
        Pakan
@endsection

@section('page')
    Halaman Detail Pakan Sapi
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Detail Data Pakan Sapi</h3>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Jenis Pakan:</label>
            {{ $pakan->jenis_pakan }}
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Harga :</label>
            {{ $pakan->harga }}
        </div>
        <div class="form-group">
            <label for="exampleInputFile">Foto :</label><br>
            <img src="{{ url('foto_pakan/'.$pakan->foto_pakan) }}" width="200px">
        </div>
    </div>
    <div class="card-footer">
        <a href="/pakan" class="btn btn-primary">Kembali</a>
    </div>
</div>
@endsection
