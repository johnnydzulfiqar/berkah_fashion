@extends('layouts.master')

@section('title1')
    Data warna
@endsection

@section('title2')
    Data warna
@endsection

@section('main')
<hr>
<div class="container">
    <a href="{{ route('tambahwarna') }}" class="btn btn-primary">TAMBAH DATA +</a>
    <hr>
    <div class="row">
        @if ($message = Session ::get('success'))
            <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
        @endif
        <table id="datatables" class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode warna</th>
                    <th scope="col">warna</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <th scope="row">{{ $item->kode_warna }}</th>
                    <td>{{ $item->nama_warna }}</td>
                    <td>
                        <a href="/editwarna/{{ $item->kode_warna }}" class="btn btn-primary">EDIT</a>
                        <a href="{{ route('deletewarna', $item->kode_warna) }}" class="btn btn-danger btn-delete" data-kodewarna="{{ $item->kode_warna }}">HAPUS</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('.btn-delete').on('click', function(e) {
            e.preventDefault();
            
            var kodeWarna = $(this).data('kodewarna');
            var confirmation = confirm('Apakah yakin menghapus data?');

            if (confirmation) {
                window.location.href = '/deletewarna/' + kodeWarna;
            }
        });
    });
</script>
@endsection