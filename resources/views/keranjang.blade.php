@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Keranjang Anda</h2>
    <ul class="list-group mb-4">
        @forelse ($keranjang as $item)
            <li class="list-group-item">
                {{ $item['tipe'] }} - {{ $item['berat'] }}
            </li>
        @empty
            <li class="list-group-item">Keranjang kosong</li>
        @endforelse
    </ul>
    <form action="{{ route('order') }}" method="POST">
        @csrf
        <button class="btn btn-primary">Checkout</button>
    </form>
</div>
@endsection
