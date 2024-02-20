@extends('layouts.master')

@section('title1')
    Edit Data warna
@endsection

@section('title2')
    Edit Data warna
@endsection

@section('main')
<hr>
<body>
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <form action="/updatewarna/{{ $data->kode_warna }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="">warna</label>
                            <input type="text" name="nama_warna" class="form-control" value="{{ $data->nama_warna }}">
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