@extends('layout.v_template2')

@section('title')
    Detail Kandang
@endsection

@section('page')
    Halaman Detail Kandang
@endsection

@section('content')
<div class="container">
    <h2>Detail Kandang</h2>
    <table class="table table-striped">
        <tr>
            <th>ID Kandang</th>
            <td>{{ $kandang->id_kandang }}</td>
        </tr>
        <tr>
            <th>No Kandang</th>
            <td>{{ $kandang->no_kandang }}</td>
        </tr>
        <tr>
            <th>Berat (Kg)</th>
            <td>{{ $kandang->berat }}</td>
        </tr>
    </table>
    <a href="{{ route('kandang.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection