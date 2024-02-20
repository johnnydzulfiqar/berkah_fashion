@extends('layouts.master')

@section('title1')
    Tambah Status Produksi
@endsection

@section('title2')
Tambah Status produksi
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
                <form action="/status-produksi/insert" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="">Kode Status</label>
                        <input type="number" name="kode_statusproduksi" class="form-control" >
                    </div>
                    <div class="mb-4">
                        <label for="">Status</label>
                        <input type="text" name="status_produksi" class="form-control" >
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