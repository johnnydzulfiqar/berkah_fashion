@extends('layouts.master')
@section('title1')
    Laporan Restock
@endsection

@section('title2')
    Laporan Restock
@endsection

@section('main')
   <!--  <form method="GET" action="{{ route('laporan-restock.filter') }}">
        <div class="row">
            <div class="col-md-3">
                <label for="">Tanggal Awal</label>
                <input type="date" name="start_date" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label for="">Tanggal Akhir</label>
                <input type="date" name="end_date" class="form-control" required>
            </div>
            <div class="col-md-1 pt-4">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </div>
    </form>-->

    <form method="GET" action="{{ route('laporan-restock.cetak') }}" target="_blank">
        <div class="row">
            <div class="col-md-3">
                <label for="">Tanggal Awal</label>
                <input type="date" name="start_date" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label for="">Tanggal Akhir</label>
                <input type="date" name="end_date" class="form-control" required>
            </div>
            <div class="col-md-1 pt-4">
                <button type="submit" class="btn btn-primary">CETAK</button>
            </div>
        </div>
    </form>
    <table class="datatable">
        <thead>
            <tr>
                <th>Restock</th>
                <th>Kode Pembelian</th>
                <th>Total Harga</th>
                <th>Tanggal Restock</th>
        </thead>
        <tbody>
            @foreach ($kodeRestock as $restock)
                <tr>
                    <td>{{ $restock->kode_restock ?? 'Data Tidak Ada' }}</td>
                    <td>{{ $restock->kode_belibahanbaku ?? 'Data Tidak Ada' }}</td>
                    <td>Rp.{{ number_format($restock->total_hargaitem, 0, ',', '.') }}</td>
                    <td>{{ $restock->tgl_restock ?? 'Data Tidak Ada'}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
