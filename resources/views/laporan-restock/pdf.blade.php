@extends('layouts.master')
@section('title1')
    Laporan Restock
@endsection

@section('title2')
    Laporan Restock
@endsection

@section('main')
    <div class="row">
        <div class="col-md-1 pt-3">
            <a href="{{ route('laporan-restock.index') }}" class="btn btn-primary btn-sm">KEMBALI</a>
        </div>
    </div>
    <table class="datatable">
        <caption>Rencana Produksi</caption>
        <thead>
            <tr>
                <th>Restock</th>
                <th>Kode Pembelian</th>
                <th>Total Haga</th>
                <th>Tanggal Restock</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kodeRestock as $restock)
                <tr>
                    <td>{{ $restock->kode_restock ?? 'Data Tidak Ada'}}</td>
                    <td>{{ $restock->kode_belibahanbaku ?? 'Data Tidak Ada'}}</td>
                    <td>Rp.{{ number_format($restock->total_hargaitem, 0, ',', '.') }}</td>
                    <td>{{ $restock->tgl_restock ?? 'Data Tidak Ada'}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <table class="datatable">
        <caption>Detail Rencana Produksi</caption>
        </form>
        <thead>
            <tr>
                <th>Detail Restock</th>
                <th>Kode Restock</th>
                <th>Bahan Baku</th>
                <th>Warna</th>
                <th>Satuan</th>
                <th>Harga Item</th>
                <th>Jumlah Item</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($details as $detail)
                <tr>
                    <td>{{ $detail->kode_detail_restock   ?? 'Data Tidak Ada'}}</td>
                    <td>{{ $detail->kode_restock   ?? 'Data Tidak Ada'}}</td>
                    <td>{{ $detail->R_KeBahanBaku->nama_bahanbaku  ?? 'Data Tidak Ada'}}</td>
                    <td>{{ $detail->R_KeWarna->nama_warna ?? 'Data Tidak Ada'}}</td>
                    <td>{{ $detail->R_KeSatuan->nama_satuan ?? 'Data Tidak Ada'}}</td>
                    <td>Rp.{{ number_format($detail->harga_item , 0, ',', '.') }}</td>
                    <td>{{ $detail->jumlah_item ?? 'Data Tidak Ada'}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
