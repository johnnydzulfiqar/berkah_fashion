@extends('layouts.master')

@section('title1')
    Tambah Data Bahan Baku
@endsection

@section('title2')
    Tambah Data Bahan Baku
@endsection

@section('main')
@if ($errors->any())
<div class="alert alert-danger mt-3">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
    <hr>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <form action="{{ route('insertbahanbaku') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_bahanbaku" class="form-label">Nama Bahan Baku</label>
                                <input type="text" name="nama_bahanbaku" class="form-control" id="nama_bahanbaku" >
                                @error('nama_bahanbaku')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <label for="kode_warna">Warna:</label>
                            <select name="kode_warna" class="form-control" >
                                <option value="">--Pilih--</option>
                                @foreach ($dataWarna as $kodeWarna => $namaWarna)
                                    <option value="{{ $kodeWarna }}">{{ $namaWarna }}</option>
                                @endforeach
                            </select>
            
                            <label for="kode_satuan"> Satuan:</label>
                            <select name="kode_satuan" class="form-control" >
                                <option value="">--Pilih--</option>
                                @foreach ($dataSatuan as $kodeSatuan => $namaSatuan)
                                    <option value="{{ $kodeSatuan }}">{{ $namaSatuan }}</option>
                                @endforeach
                            </select>

                            <label for="stok">Stok:</label>
                            <input type="number" name="stok" class="form-control" readonly min="0" value=0>

                            <label for="keterangan">Keterangan:</label>
                            <textarea id="keterangan" name="keterangan" class="form-control"></textarea>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection