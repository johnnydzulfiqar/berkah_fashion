@extends('layouts.master')

@section('title1')
    Edit Produksi
@endsection

@section('title2')
    Edit Produksi
@endsection

@section('main')
    <hr>
    <body>
        <div class="container">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <form action="/status-produksi/update/{{ $data->kode_statusproduksi }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="kode_statusproduksi">Kode Status Produksi</label>
                                <input type="number" name="kode_statusproduksi" class="form-control" value="{{ $data->kode_statusproduksi }}">
                            </div>
                            <div class="mb-4">
                                <label for="status_produksi">Status Produksi</label>
                                <input type="text" name="status_produksi" class="form-control" value="{{ $data->status_produksi }}">
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="btn btn-primary">SIMPAN</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
@endsection