@extends('layouts.master')

@section('title1')
    Edit Data bahanbaku
@endsection

@section('title2')
    Edit Data bahanbaku
@endsection

@section('main')
    <hr>
    <body>
        <div class="container">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <form action="/updatebahanbaku/{{ $databahanbaku->kode_bahanbaku }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="">Bahan baku</label>
                                <input type="text" name="nama_bahanbaku" class="form-control"
                                    value="{{ $databahanbaku->nama_bahanbaku }}">
                            </div>

                            <div class="mb-4">
                                <label for="kode_warna">Warna</label>
                                <select name="kode_warna" class="form-control">
                                    <option value="">Pilih Warna</option>
                                    @foreach ($dataWarna as $warna)
                                        <option value="{{ $warna->kode_warna }}"
                                            {{ optional($databahanbaku->R_KeWarna)->kode_warna == $warna->kode_warna ? 'selected' : '' }}>
                                            {{ $warna->nama_warna ?? 'Data Tidak Ada' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="kode_satuan">Satuan</label>
                                <select name="kode_satuan" class="form-control">
                                    <option value="">Pilih Satuan</option>
                                    @foreach ($dataSatuan as $satuan)
                                        <option value="{{ $satuan->kode_satuan }}"
                                            {{ $databahanbaku->R_KeSatuan->kode_satuan == $satuan->kode_satuan ? 'selected' : '' }}>
                                            {{ $satuan->nama_satuan ?? 'Data Tidak Ada' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="stok">Stok:</label>
                                <input type="number" name="stok" required class="form-control"
                                    value="{{ $databahanbaku->stok}}" >
                            </div>
                            <div class="mb-4">
                                <label for="keterangan">Keterangan:</label>
                                <textarea id="keterangan" name="keterangan" class="form-control">{{ $databahanbaku->keterangan }}</textarea>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">SIMPAN</button>
                            </div>
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
