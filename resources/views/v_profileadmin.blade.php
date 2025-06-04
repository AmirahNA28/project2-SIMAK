@extends('template')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-header text-center">
            <h4>Profil Pengguna</h4>
        </div>
        <div class="card-body text-center">
            <img src="{{ asset('images/default-profile.png') }}" class="rounded-circle mb-3" width="120" height="120" alt="Profile Picture">
            <h5 class="card-title">{{ $user->name }}</h5>
            <p class="card-text">{{ $user->email }}</p>
            <a href="#" class="btn btn-primary">Edit Profil</a>
        </div>
    </div>
</div>
@endsection
