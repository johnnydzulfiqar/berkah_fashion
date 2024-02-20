@extends('layouts.master')

@section('title1')
    Tambah Data satuan
@endsection

@section('title2')
Tambah Data satuan
@endsection

@section('main')
@if($errors->any())
<div class="alert alert-danger">
    @foreach ($errors->all() as $item)
        <li>{{ $item }}</li>
    @endforeach
</div>
@endif
</div>
<hr>
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('insertsatuan') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="">satuan</label>
                        <input type="text" name="nama_satuan" class="form-control" required>
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