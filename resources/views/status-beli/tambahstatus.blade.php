@extends('layouts.master')

@section('title1')
    Tambah Status Beli
@endsection

@section('title2')
Tambah Status Beli
@endsection

@section('main')
@if($errors->any())
<div class="alert alert-danger">
    @foreach ($errors->all() as $item)
        <li>{{ $item }}</li>
    @endforeach
</div>
@endif

<hr>
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('insert-status-beli') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="">Kode Status</label>
                        <input type="number" name="kode_statusbeli" class="form-control" required>
                    </div>
                    <div class="mb-4">
                        <label for="">Status</label>
                        <input type="text" name="status_beli" class="form-control" >
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