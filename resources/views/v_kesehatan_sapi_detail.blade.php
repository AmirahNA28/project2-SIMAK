@extends('layout.v_template2')

@section('title')
    Detail Kesehatan Sapi
@endsection

@section('page')
    Halaman Detail Kesehatan Sapi
@endsection

@section('content')
<div class="container" style="max-width: 600px; margin-top: 20px;">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Detail Data Kesehatan Sapi</h3>
        </div>
        <div class="card-body">
            <div class="form-group mb-2">
                <label><strong>ID Kesehatan :</strong></label>
                <p>{{ $kesehatan->id_kesehatan }}</p>
            </div>

            <div class="form-group mb-2">
                <label><strong>ID Sapi :</strong></label>
                <p>{{ $kesehatan->id_sapi }}</p>
            </div>

            <div class="form-group mb-2">
                <label><strong>Tanggal Pemeriksaan :</strong></label>
                <p>{{ \Carbon\Carbon::parse($kesehatan->tgl_pemeriksaan)->format('d-m-Y') }}</p>
            </div>

            <div class="form-group mb-2">
                <label><strong>Status Kesehatan :</strong></label>
                <p>{{ $kesehatan->status_kesehatan }}</p>
            </div>

            <div class="form-group mb-2">
                <label><strong>Tindakan :</strong></label>
                <p>{{ $kesehatan->tindakan }}</p>
            </div>

            <div class="form-group mb-2">
                <label><strong>Nama Obat :</strong></label>
                <p>{{ $kesehatan->nama_obat }}</p>
            </div>
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('kesehatan.index') }}" class="btn btn-sm btn-primary">Kembali</a>
        </div>
    </div>
</div>
@endsection
