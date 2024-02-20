@extends('layouts.master')

@section('title1')
    Edit Status Beli
@endsection

@section('title2')
    Edit Status Beli
@endsection

@section('main')
    <hr>
    <body>
        <div class="container">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <form action="/status-beli/update/{{ $data->kode_statusbeli }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="kode_statusbeli">Kode Status beli</label>
                                <input type="number" name="kode_statusbeli" class="form-control" value="{{ $data->kode_statusbeli }}">
                            </div>
                            <div class="mb-4">
                                <label for="status_beli">Status beli</label>
                                <input type="text" name="status_beli" class="form-control" value="{{ $data->status_beli }}">
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