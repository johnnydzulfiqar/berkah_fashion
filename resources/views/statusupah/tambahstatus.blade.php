@extends('layouts.master')

@section('title1')
    Tambah Status upah
@endsection

@section('title2')
Tambah Status upah
@endsection

@section('main')
<hr>
@if ($message = Session ::get('success'))
            <div class="alert alert-success" role="alert">
            {{ $message }}
</div>
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('insert-status-upah') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="">Kode Status</label>
                        <input type="number" name="kode_statusupah" class="form-control" required>
                    </div>
                    <div class="mb-4">
                        <label for="">Status</label>
                        <input type="text" name="status_upah" class="form-control" required>
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="btn btn-primary">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection