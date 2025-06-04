@extends('layout/v_template2')

@section('title')
    Sapi
@endsection

@section('page')
    Halaman Detail Sapi
@endsection

@section('content')
<div class="card card-primary mx-auto" style="max-width: 400px; font-size: 0.95rem;">
    <h1 class="h3 mb-4 text-gray-800">Detail Data Sapi</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID Sapi</th>
                    <td>{{ $sapi->id_sapi }}</td>
                </tr>
                <tr>
                    <th>ID Kandang</th>
                    <td>{{ $sapi->id_kandang }} ({{ $sapi->no_kandang ?? '-' }})</td>
                </tr>
                <tr>
                    <th>Jenis Sapi</th>
                    <td>{{ $sapi->jenis_sapi }}</td>
                </tr>
                <tr>
                    <th>Berat (kg)</th>
                    <td>{{ $sapi->berat }}</td>
                </tr>
                <tr>
                    <th>Tanggal Masuk</th>
                    <td>{{ $sapi->tgl_masuk }}</td>
                </tr>
                <tr>
                    <th>Stok</th>
                    <td>{{ $sapi->stok }}</td>
                </tr>
                <tr>
                    <th>Foto Sapi</th>
                    <td>
                        @if($sapi->foto_sapi)
                        <img src="{{ url('foto_sapi', $sapi->foto_sapi) }}" width="200px" alt="Foto Sapi">
                        @else
                        Tidak ada foto
                        @endif
                    </td>
                </tr>
            </table>

            <a href="/sapi" class="btn btn-secondary mt-3">Kembali</a>
            <a href="/sapi/edit/{{ $sapi->id_sapi }}" class="btn btn-warning mt-3">Edit</a>
        </div>
    </div>
</div>
@endsection