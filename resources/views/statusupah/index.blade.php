@extends('layouts.master')

@section('title1')
    Data Status upah
@endsection

@section('title2')
    Data Status upah
@endsection

@section('main')
<hr>
<div class="container">
    <a href="{{ route('create-status-upah') }}" class="btn btn-primary">TAMBAH DATA +</a>
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
                    <th scope="col">Status upah</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <th scope="row">{{ $item->kode_statusupah }}</th>
                    <td>{{ $item->status_upah }}</td>
                    <td>
                        <a href="/status-upah/edit/{{ $item->kode_statusupah }}" class="btn btn-primary">EDIT</a>
                        <a href="{{ route('delete-status-upah', $item->kode_statusupah) }}" class="btn btn-danger btn-delete" data-kodestatusupah="{{ $item->kode_statusupah }}">HAPUS</a>
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
            
            var kodeStatusupah = $(this).data('kodestatusupah');
            var confirmation = confirm('Apakah yakin menghapus data?');

            if (confirmation) {
                window.location.href = '/delete-status-upah/' + kodeStatusupah;
            }
        });
    });
</script>
@endsection