@extends('layouts.master')

@section('title1')
    Edit bahanbaku
@endsection

@section('title2')
    Edit bahanbaku
@endsection

@section('main')
    <form action="{{ url('stokbahanbaku/' . $dataStokBahanBaku->kode_stokbahanbaku) }}" method="post">
        @csrf
        @method('PUT') <!-- Tambahkan method PUT untuk mengirimkan data dengan metode PUT -->
        <div>
            <hr>
            <div>
                <hr>
                <label for="kode_bahanbaku">Kode Bahan Baku:</label>
                <select name="kode_bahanbaku" class="form-control" required>
                    <option value="">Pilih Bahan Baku</option>
                    @foreach ($dataBahanBaku as $kodeBahanBaku => $namaBahanBaku)
                        <option value="{{ $kodeBahanBaku }}" {{ $dataStokBahanBaku->kode_bahanbaku == $kodeBahanBaku ? 'selected' : '' }}>
                            {{ $namaBahanBaku }}
                        </option>
                    @endforeach
                </select>

                <label for="kode_warna">Kode Warna:</label>
                <select name="kode_warna" class="form-control" required>
                    <option value="">Pilih Warna</option>
                    @foreach ($dataWarna as $kode_warna => $nama_warna)
                        <option value="{{ $kode_warna }}" {{ $dataStokBahanBaku->kode_warna == $kode_warna ? 'selected' : '' }}>
                            {{ $nama_warna }}
                        </option>
                    @endforeach
                </select>

                <label for="kode_satuan">Kode Satuan:</label>
                <select name="kode_satuan" class="form-control" required>
                    <option value="">Pilih Satuan</option>
                    @foreach ($dataSatuan as $kode_satuan => $nama_satuan)
                        <option value="{{ $kode_satuan }}" {{ $dataStokBahanBaku->kode_satuan == $kode_satuan ? 'selected' : '' }}>
                            {{ $nama_satuan }}
                        </option>
                    @endforeach
                </select>

                <label for="stok_bahanbaku">Stok:</label>
                <input type="number" name="stok_bahanbaku" required class="form-control" value="{{ $dataStokBahanBaku->stok_bahanbaku }}">
            </div>
        </div>
        <hr>
        <button type="submit">Update</button>
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