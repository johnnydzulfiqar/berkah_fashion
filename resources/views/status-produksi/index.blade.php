@extends('layouts.master')

@section('title1')
    Data Status Produksi
@endsection

@section('title2')
    Data Status Produksi
@endsection

@section('main')
<hr>
<div class="container">
    <a href="{{ route('create-status-produksi') }}" class="btn btn-primary">TAMBAH DATA +</a>
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
                    <th scope="col">Kode Status</th>
                    <th scope="col">Status Produksi</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <th scope="row">{{ $item->kode_statusproduksi }}</th>
                    <td>{{ $item->status_produksi }}</td>
                    <td>
                        <a href="/status-produksi/edit/{{ $item->kode_statusproduksi }}" class="btn btn-primary">EDIT</a>
                        <a href="{{ route('delete-status-produksi', $item->kode_statusproduksi) }}" class="btn btn-danger btn-delete" data-kodestatusproduksi="{{ $item->kode_statusproduksi }}">HAPUS</a>                    </td>
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
            
            var kodeStatusProduksi = $(this).data('kodestatusproduksi');
            var confirmation = confirm('Apakah yakin menghapus data?');

            if (confirmation) {
                window.location.href = '/delete-status-produksi/' + kodeStatusProduksi;
            }
        });
    });
</script>
@endsection