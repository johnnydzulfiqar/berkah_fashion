@extends('layouts.master')

@section('title1')
    Data produk
@endsection

@section('title2')
    Data produk
@endsection

@section('main')
<hr>
<div class="container">
    <a href="{{ route('tambahproduk') }}" class="btn btn-primary">TAMBAH DATA +</a>
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
                    <th scope="col">Kode produk</th>
                    <th scope="col">Nama produk</th>
                    <th scope="col">Warna</th>
                    <th scope="col">Ukuran</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataproduk as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration ?? 'Tidak Ada'}}</th>
                    <th scope="row">{{ $item->kode_produk ?? 'Tidak Ada'}}</th>
                    <th scope="row">{{ $item->nama_produk ?? 'Tidak Ada'}}</th>
                    <th scope="row">{{ $item->R_KeWarna->nama_warna ?? 'Tidak Ada'}}</th>
                    <th scope="row">{{ $item->R_KeUkuran->nama_ukuran ?? 'Tidak Ada'}}</th>
                    <th scope="row">{{ $item->keterangan ?? 'Tidak Ada'}}</th>
                    <td>
                        <a href="/editproduk/{{ $item->kode_produk }}" class="btn btn-primary">EDIT</a>
                        <a href="{{ route('deleteproduk', $item->kode_produk) }}" class="btn btn-danger btn-delete" data-kodeproduk="{{ $item->kode_produk }}">HAPUS</a>
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
            
            var kodeProduk = $(this).data('kodeproduk');
            var confirmation = confirm('Apakah yakin menghapus data?');

            if (confirmation) {
                window.location.href = '/deleteproduk/' + kodeProduk;
            }
        });
    });
</script>
@endsection