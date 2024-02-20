@extends('layouts.master')

@section('title')
    Edit Pengguna
@endsection

@section('main')
    <div class="container">
        <h2>Edit Pengguna</h2>

        <form action="{{ route('update_pengguna',['user' => $user]) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
            </div>

            <div class="form-group">
                <label for="password">Password Baru:</label>
                <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengubah">
            </div>

            <div class="form-group">
                <label for="role">Role:</label>
                <select name="role" class="form-control" required>
                    <option value="pemilik" {{ $user->role == 'pemilik' ? 'selected' : '' }}>Pemilik</option>
                    <option value="cutting" {{ $user->role == 'cutting' ? 'selected' : '' }}>Cutting</option>
                    <option value="jahit" {{ $user->role == 'jahit' ? 'selected' : '' }}>Jahit</option>
                    <option value="packing" {{ $user->role == 'packing' ? 'selected' : '' }}>Packing</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection