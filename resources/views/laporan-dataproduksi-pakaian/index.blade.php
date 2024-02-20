@extends('layouts.master')
@section('title1')
    Laporan Data Produksi Pakaian
@endsection

@section('title2')
    Laporan Data Produksi Pakaian
@endsection

@section('main')
    <table class="datatable">
        <thead>
            <tr>
                <th>Kode Rencana Produksi</th>
                <th>Produk</th>
                <th>Warna</th>
                <th>Ukuran</th>
                <th>Jumlah Produksi Pakaian</th>
            <tr>
        </thead>
        <tbody>
            @foreach ($sudahPacking as $produksi)
                <tr>
                    <td>{{ $produksi->kode_rencanaproduksi ?? 'Data Tidak Ada' }}</td>
                    <td>{{ $produksi->R_KeRencanaProduksi->R_KeProduk->nama_produk ?? 'Data Tidak Ada' }}</td>
                    <td>{{ $produksi->R_KeRencanaProduksi->R_KeProduk->R_KeWarna->nama_warna ?? 'Data Tidak Ada' }}</td>
                    <td>{{ $produksi->R_KeRencanaProduksi->R_KeProduk->R_KeUkuran->nama_ukuran ?? 'Data Tidak Ada' }}</td>
                    <td>{{ $produksi->total_jumlahberhasil ?? 'Data Tidak Ada' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
