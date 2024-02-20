@extends('layouts.master')

@section('title1')
    Tambah Data produk
@endsection

@section('title2')
    Tambah Data produk
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
                    <form action="{{ route('insertproduk') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="">produk</label>
                            <input type="text" name="nama_produk" class="form-control" >
                        </div>

                        <label for= "kode_warna">Warna:</label>
                        <select name="kode_warna" id="kode_warna" class="form-control" >
                            <option value="">--</option>
                            @foreach ($dataWarna as $kodeWarna => $namaWarna)
                                <option value="{{ $kodeWarna }}">{{ $namaWarna }}</option>
                            @endforeach
                        </select>

                        <!-- Dropdown Kode Satuan -->
                        <label for="kode_ukuran">Ukuran:</label>
                        <select name="kode_ukuran" id="kode_ukuran" class="form-control" >
                            <option value="">--</option>
                            @foreach ($dataUkuran as $kodeUkuran => $namaUkuran)
                                <option value="{{ $kodeUkuran }}">{{ $namaUkuran }}</option>
                            @endforeach
                        </select>

                        <label for="keterangan" class="form-label">Keterangan:</label>
                        <textarea id="keterangan" name="keterangan" class="form-control"></textarea>

                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
