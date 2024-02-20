@extends('layouts.master')

@section('title1')
    Form Input bahanbaku
@endsection

@section('title2')
    Form Input bahanbaku
@endsection

@section('main')
    <form action="{{ route('stokbahanbaku.store') }}" method="post">
        @csrf
        <div>
            <hr>
            <div>
                <hr>
                <label for="kode_bahanbaku">Kode Bahan Baku:</label>
                <select name="kode_bahanbaku" class="form-control" required>
                    <option value="">Pilih Bahan Baku</option>
                    @foreach ($dataBahanBaku as $kodeBahanBaku => $namaBahanBaku)
                        <option value="{{ $kodeBahanBaku }}">{{ $namaBahanBaku }}</option>
                    @endforeach
                </select>

                <label for="kode_warna">Kode Warna:</label>
                <select name="kode_warna" class="form-control" required>
                    <option value="">Pilih Warna</option>
                    @foreach ($dataWarna as $kodeWarna => $namaWarna)
                        <option value="{{ $kodeWarna }}">{{ $namaWarna }}</option>
                    @endforeach
                </select>

                <label for="kode_satuan">Kode Satuan:</label>
                <select name="kode_satuan" class="form-control" required>
                    <option value="">Pilih Satuan</option>
                    @foreach ($dataSatuan as $kodeSatuan => $namaSatuan)
                        <option value="{{ $kodeSatuan }}">{{ $namaSatuan }}</option>
                    @endforeach
                </select>

                <label for="stok_bahanbaku">Stok:</label>
                <input type="number" name="stok_bahanbaku" required class="form-control" readonly value=0>
            </div>
        </div>
        <hr>
        <button type="submit">Simpan</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <style>
        #detail-form-container {
            display: flex;
            flex-direction: row;
        }

        .detail-form {
            margin-right: 20px;
            /* Ganti sesuai kebutuhan */
        }
    </style>
@endsection
