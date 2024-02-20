@extends('layouts.master')

@section('title1')
    Edit Data produk
@endsection

@section('title2')
    Edit Data produk
@endsection

@section('main')
    <hr>

    <body>
        <div class="container">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <form action="/updateproduk/{{ $data->kode_produk }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="">produk</label>
                                <input type="text" name="nama_produk" class="form-control"
                                    value="{{ $data->nama_produk }}">
                            </div>
                            <label for="kode_ukuran">Ukuran</label>
                            <select name="kode_ukuran" class="form-control">
                                <option value="">Pilih Ukuran</option>
                                @foreach ($dataUkuran as $ukuran)
                                    <option value="{{ $ukuran->kode_ukuran }}"
                                        {{ optional($data->R_KeUkuran)->kode_ukuran == $ukuran->kode_ukuran ? 'selected' : '' }}>
                                        {{ $ukuran->nama_ukuran ?? 'Data Tidak Ada' }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="mb-4">
                                <label for="kode_warna">Warna</label>
                                <select name="kode_warna" class="form-control">
                                    <option value="">Pilih Warna</option>
                                    @foreach ($dataWarna as $warna)
                                        <option value="{{ $warna->kode_warna }}"
                                            {{ optional($data->R_KeWarna)->kode_warna == $warna->kode_warna ? 'selected' : '' }}>
                                            {{ $warna->nama_warna ?? 'Data Tidak Ada' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="keterangan">Keterangan:</label>
                                <textarea id="keterangan" name="keterangan" class="form-control">{{ $data->keterangan }}</textarea>
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="btn btn-primary">SIMPAN</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
    </body>
@endsection
