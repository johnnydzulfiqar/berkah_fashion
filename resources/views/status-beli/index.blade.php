@extends('layouts.master')

@section('title1')
Status Pembelian Bahan Baku
@endsection

@section('title2')
Status Pembelian Bahan baku
@endsection

@section('main')
<hr>
<div class="container">
    <a href="{{ route('create-status-beli') }}" class="btn btn-primary">TAMBAH DATA +</a>
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
                    <th scope="col">Status beli</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->status_beli }}</td>
                    <td>
                        <a href="/status-beli/edit/{{ $item->kode_statusbeli }}" class="btn btn-primary">EDIT</a>
                        <a href="{{ route('delete-status-beli', $item->kode_statusbeli) }}" class="btn btn-danger btn-delete" data-kodestatusbeli="{{ $item->kode_statusbeli }}">HAPUS</a>                    </td>
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
            
            var kodeStatusBeli = $(this).data('kodestatusbeli');
            var confirmation = confirm('Apakah yakin menghapus data?');

            if (confirmation) {
                window.location.href = '/delete-status-beli/' + kodeStatusBeli;
            }
        });
    });
</script>
@endsection