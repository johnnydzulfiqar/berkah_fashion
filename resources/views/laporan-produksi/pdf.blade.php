@extends('layouts.master')
@section('title1')
    Laporan Produksi
@endsection

@section('title2')
    Laporan Produksi
@endsection

@section('main')
    <div class="row">
        <div class="col-md-1 pt-3">
            <a href="{{ route('laporan-produksi.index') }}" class="btn btn-primary btn-sm">KEMBALI</a>
        </div>
    </div>
    <table class="datatable">
        <caption>Rencana Produksi</caption>
        <thead>
            <tr>
                <th>Rencana Produksi</th>
                <th>Tanggal Awal</th>
                <th>Produk</th>
                <th>Warna</th>
                <th>Ukuran</th>
                <th>Jumlah Rencana</th>
                <th>Berhasil Bag.Cutting</th>
                <th>Gagal Bag.Cutting</th>
                <th>Berhasil Bag.Jahit</th>
                <th>Gagal Bag.Jahit</th>
                <th>Berhasil Bag.Packing</th>
                <th>Gagal Bag.Packing</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kodeRencanaProduksis as $kodeRencanaProduksi)
                <tr>
                    <td>{{ $kodeRencanaProduksi->kode_rencanaproduksi }}</td>
                    <td>{{ $kodeRencanaProduksi->tgl_awal }}</td>
                    <td>{{ $kodeRencanaProduksi->R_KeProduk->nama_produk }}</td>
                    <td>{{ $kodeRencanaProduksi->R_KeWarna->nama_warna }}</td>
                    <td>{{ $kodeRencanaProduksi->R_KeUkuran->nama_ukuran }}</td>
                    <td>{{ $kodeRencanaProduksi->jumlah_rencanaproduksi }}</td>

                    <!-- Untuk Produksi Pakaian Cutting -->
                    <td>{{ $kodeRencanaProduksi->R_ProduksiPakaianCutting->total_jumlahberhasil ?? 'Belum' }}</td>
                    <td>{{ $kodeRencanaProduksi->R_ProduksiPakaianCutting->total_jumlahgagal ?? 'Belum' }}</td>

                    <!-- Untuk Produksi Pakaian Jahit -->
                    <td>{{ $kodeRencanaProduksi->R_ProduksiPakaianJahit->total_jumlahberhasil ?? 'Belum' }}</td>
                    <td>{{ $kodeRencanaProduksi->R_ProduksiPakaianJahit->total_jumlahgagal ?? 'Belum' }}</td>

                    <!-- Untuk Produksi Pakaian Packing -->
                    <td>{{ $kodeRencanaProduksi->R_ProduksiPakaianPacking->total_jumlahberhasil ?? 'Belum' }}
                    </td>
                    <td>{{ $kodeRencanaProduksi->R_ProduksiPakaianPacking->total_jumlahgagal ?? 'Belum' }}</td>

                    <td>{{ $kodeRencanaProduksi->R_KeStatusProduksi->status_produksi ?? 'Belum' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
