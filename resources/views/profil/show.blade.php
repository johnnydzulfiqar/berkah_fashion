@extends('layouts.master')

@section('title')
    Profil Pengguna
@endsection

@section('main')
    <h2>Profil Pengguna</h2>

    <div>
        <p>Nama: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>
        <p>Bagian: {{ $user->role }}</p>
        <!-- Tambahkan informasi profil lainnya sesuai kebutuhan -->
    </div>
@endsection