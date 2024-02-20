@extends('layouts.master')

@section('title1')
    Edit Data ukuran
@endsection

@section('title2')
    Edit Data ukuran
@endsection

@section('main')
<hr>
<body>
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <form action="/updateukuran/{{ $data->kode_ukuran }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="">Ukuran</label>
                            <input type="text" name="nama_ukuran" class="form-control" value="{{ $data->nama_ukuran }}">
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