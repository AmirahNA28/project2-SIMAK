@extends('layout.v_template2')

@section('title', 'Edit Kandang')

@section('content')
<div class="container-fluid">

    <!-- Form Edit Kandang -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gradient-primary">
            <h3 class="card-title text-white text-center">Edit Data Kandang</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('kandang.update', $kandang->id_kandang) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="no_kandang" class="form-label">No Kandang</label>
            <select name="no_kandang" class="form-control" required>
                <option value="" disabled selected>Pilih No Kandang</option>
                <option value="1">Kandang 1</option>
                <option value="2">Kandang 2</option>
                <option value="3">Kandang 3</option>
                <option value="4">Kandang 4</option>
                <option value="5">Kandang 5</option>
                <option value="6">Kandang 6</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="berat" class="form-label">Berat (Kg)</label>
            <input type="text" name="berat" value="{{ $kandang->berat }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('kandang.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection