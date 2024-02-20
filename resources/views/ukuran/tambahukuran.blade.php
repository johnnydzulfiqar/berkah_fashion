@extends('layouts.master')

@section('title1')
    Tambah Data ukuran
@endsection

@section('title2')
Tambah Data ukuran
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
                <form action="{{ route('insertukuran') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="">Ukuran</label>
                        <input type="text" name="nama_ukuran" class="form-control">
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