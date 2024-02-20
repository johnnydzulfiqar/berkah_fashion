@extends('layouts.master')
@section('title1')
    Laporan Pembelian
@endsection

@section('title2')
    Laporan Pembelian
@endsection

@section('main')
    <div class="row">
        <div class="col-md-1 pt-3">
            <a href="{{ route('laporan-pembelian.index') }}" class="btn btn-primary btn-sm">KEMBALI</a>
        </div>
    </div>
    <table class="datatable">
        <caption>Rencana Produksi</caption>
        </form>
        <thead>
            <tr>
                <th>Pembelian</th>
                <th>Jumlah Pembelian</th>
                <th>Tanggal Pembelian</th>
                <th>Status Pembelian</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kodePembelians as $kodePembelian)
                <tr>
                    <td>{{ $kodePembelian->kode_belibahanbaku ?? 'Data Tidak Ada'}}</td>
                    <td>{{ $kodePembelian->total_jumlahbeli ?? 'Data Tidak Ada'}}</td>
                    <td>{{ $kodePembelian->tgl_beli ?? 'Data Tidak Ada'}}</td>
                    <td>{{ $kodePembelian->R_KeStatusBeli->status_beli ?? 'Data Tidak Ada'}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <table class="datatable">
        <caption>Detail Rencana Produksi</caption>
        </form>
        <thead>
            <tr>
                <th>Detail Pembelian</th>
                <th>Pembelian</th>
                <th>Bahan Baku</th>
                <th>Warna</th>
                <th>Satuan</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($details as $detail)
                <tr>
                    <td>{{ $detail->kode_detail_belibahanbaku  ?? 'Data Tidak Ada'}}</td>
                    <td>{{ $detail->kode_belibahanbaku  ?? 'Data Tidak Ada'}}</td>
                    <td>{{ $detail->R_KeBahanBaku->nama_bahanbaku  ?? 'Data Tidak Ada'}}</td>
                    <td>{{ $detail->R_KeWarna->nama_warna ?? 'Data Tidak Ada'}}</td>
                    <td>{{ $detail->R_KeSatuan->nama_satuan ?? 'Data Tidak Ada'}}</td>
                    <td>{{ $detail->jumlah_beli ?? 'Data Tidak Ada'}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
