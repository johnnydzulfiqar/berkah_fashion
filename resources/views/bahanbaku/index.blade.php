@extends('layouts.master')

@section('title1')
    Data bahanbaku
@endsection

@section('title2')
    Data bahanbaku
@endsection

@section('main')
<hr>
<div class="container">
    <a href="{{ route('tambahbahanbaku') }}" class="btn btn-primary">TAMBAH DATA +</a>
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
                    <th scope="col">Kode</th>
                    <th scope="col">Bahan baku</th>
                    <th scope="col">Warna</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($databahanbaku as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration ?? 'Data Tidak Ada' }}</th>
                    <th scope="row">{{ $item->kode_bahanbaku ?? 'Data Tidak Ada'}}</th>
                    <th scope="row">{{ $item->nama_bahanbaku ?? 'Data Tidak Ada'}}</th>
                    <th scope="row">{{ $item->R_KeWarna->nama_warna ?? 'Data Tidak Ada'}}</th>
                    <th scope="row">{{ $item->R_KeSatuan->nama_satuan ?? 'Data Tidak Ada'}}</th>
                    <th scope="row">{{ $item->stok }}</th>
                    <th scope="row">{{ $item->keterangan }}</th>
                    <td>
                        <a href="/editbahanbaku/{{ $item->kode_bahanbaku }}" class="btn btn-primary">EDIT</a>
                        <a href="{{ route('deletebahanbaku', $item->kode_bahanbaku) }}" class="btn btn-danger btn-delete" data-kodebahanbaku="{{ $item->kode_bahanbaku }}">HAPUS</a>

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
            
            var kodeBahanBaku = $(this).data('kodebahanbaku');
            var confirmation = confirm('Apakah yakin menghapus data?');

            if (confirmation) {
                window.location.href = '/deletebahanbaku/' + kodeBahanBaku;
            }
        });
    });
</script>
@endsection