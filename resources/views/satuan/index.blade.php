@extends('layouts.master')

@section('title1')
    Data satuan
@endsection

@section('title2')
    Data satuan
@endsection

@section('main')
<hr>
<div class="container">
    <a href="{{ route('tambahsatuan') }}" class="btn btn-primary">TAMBAH DATA +</a>
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
                    <th scope="col">Kode satuan</th>
                    <th scope="col">satuan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <th scope="row">{{ $item->kode_satuan }}</th>
                    <td>{{ $item->nama_satuan }}</td>
                    <td>
                        <a href="/editsatuan/{{ $item->kode_satuan }}" class="btn btn-primary">EDIT</a>
                        <a href="{{ route('deletesatuan', $item->kode_satuan) }}" class="btn btn-danger btn-delete" data-kodesatuan="{{ $item->kode_satuan }}">HAPUS</a>
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
            
            var kodeSatuan = $(this).data('kodesatuan');
            var confirmation = confirm('Apakah yakin menghapus data?');

            if (confirmation) {
                window.location.href = '/deletesatuan/' + kodeSatuan;
            }
        });
    });
</script>
@endsection