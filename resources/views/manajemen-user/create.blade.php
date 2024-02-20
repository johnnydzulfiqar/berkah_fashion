@extends('layouts.master')

@section('title')
    Tambah Pengguna Baru
@endsection

@section('main')
    <div class="container">
        <!-- Tampilkan pesan kesalahan umum (jika ada) -->
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Tampilkan pesan kesalahan validasi -->
        @if($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $item)
                <li>{{ $item }}</li>
            @endforeach
        </div>
    @endif

        <h2>Tambah Pengguna Baru</h2>

        <form action="{{ route('simpan_pengguna') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" name="name" class="form-control" >
            </div>

            <div class="form-group">
                <label for="email">Alamat Email:</label>
                <input type="email" name="email" class="form-control" >
            </div>

            <div class="form-group">
                <label for="password">Kata Sandi:</label>
                <input type="password" name="password" class="form-control" >
            </div>

            <div class="form-group">
                <label for="role">Bagian:</label>
                <select name="role" class="form-control" >
                    <option value="">--</option>
                    <option value="pemilik">Pemilik</option>
                    <option value="cutting">Cutting</option>
                    <option value="jahit">Jahit</option>
                    <option value="packing">Packing</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
