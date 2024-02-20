@extends('layouts.master')
@section('title1')
    Laporan Stok Bahan Baku Berkah Fashionku
@endsection

@section('title2')
    Laporan Stok Bahan Baku Berkah Fashionku
@endsection

@section('main')
    <form method="GET" action="{{ route('laporan-stokbahanbaku.cetak') }}" target="_blank">
            <div class="col-md-1 pt-4">
                <button type="submit" class="btn btn-primary">CETAK</button>
            </div>
        </div>
    </form>
    <table class="datatable">
        <thead>
            <tr>
                <th>Kode Stok BahanBaku</th>
                <th>Bahan Baku</th>
                <th>Warna</th>
                <th>Stok Tersedia</th>
                <th>Satuan</th>
            <tr>
        </thead>
        <tbody>
            @foreach ($kodeBahanBaku as $stok)
                <tr>
                    <td>{{ $stok->kode_bahanbaku ?? 'Data Tidak Ada' }}</td>
                    <td>{{ $stok->nama_bahanbaku ?? 'Data Tidak Ada' }}</td>
                    <td>{{ $stok->R_KeWarna->nama_warna ?? 'Data Tidak Ada' }}</td>
                    <td>{{ $stok->stok ?? 'Data Tidak Ada' }}</td>
                    <td>{{ $stok->R_KeSatuan->nama_satuan ?? 'Data Tidak Ada' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
