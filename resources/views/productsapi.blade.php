@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Pilih Sapi</h2>
    <div class="row">
        @foreach ($productsapi as $product)
        <div class="col-md-4 mb-4">
            <div class="card text-center">
                <img src="/images/{{ $productsapi['tipe'] }}.png" class="card-img-top" alt="{{ $productsapi['tipe'] }}">
                <div class="card-body">
                    <h5>{{ $productsapi['tipe'] }}</h5>
                    <p>{{ $productsapi['berat'] }}</p>
                    <form action="{{ route('keranjang.tambah') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $productsapi['id'] }}">
                        <input type="hidden" name="tipe" value="{{ $producsapit['tipe'] }}">
                        <input type="hidden" name="berat" value="{{ $productsapi['berat'] }}">
                        <button type="submit" class="btn btn-primary">Tambah ke Keranjang</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <a href="{{ route('keranjang') }}" class="btn btn-success">Lihat Keranjang</a>
</div>
@endsection
