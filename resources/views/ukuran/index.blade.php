@extends('layouts.master')

@section('title1')
    Data ukuran
@endsection

@section('title2')
    Data ukuran
@endsection

@section('main')
<hr>
<div class="container">
    <a href="{{ route('tambahukuran') }}" class="btn btn-primary">TAMBAH DATA +</a>
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
                    <th scope="col">Kode Ukuran</th>
                    <th scope="col">Ukuran</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <th scope="row">{{ $item->kode_ukuran }}</th>
                    <td>{{ $item->nama_ukuran }}</td>
                    <td>
                        <a href="/editukuran/{{ $item->kode_ukuran }}" class="btn btn-primary">EDIT</a>
                        <a href="{{ route('deleteukuran', $item->kode_ukuran) }}" class="btn btn-danger btn-delete" data-kodeukuran="{{ $item->kode_ukuran }}">HAPUS</a>
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
            
            var kodeUkuran = $(this).data('kodeukuran');
            var confirmation = confirm('Apakah yakin menghapus data?');

            if (confirmation) {
                window.location.href = '/deleteukuran/' + kodeUkuran;
            }
        });
    });
</script>
@endsection