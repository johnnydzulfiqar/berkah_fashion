@extends('layouts.master')
@section('title1')
    Laporan Pembelian Bahan Baku
@endsection

@section('title2')
    Laporan Pembelian Bahan Baku
@endsection

@section('main')
    <!--<form method="GET" action="{{ route('laporan-pembelian.filter') }}">
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
    </form> -->

    <form method="GET" action="{{ route('laporan-pembelian.cetak') }}" target="_blank">
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
                <th>Pembelian</th>
                <th>Jumlah Pembelian</th>
                <th>Tanggal Pembelian</th>
                <th>Status Pembelian</th>
        </thead>
        <tbody>
            @foreach ($kodePembelians as $kodePembelian)
                <tr>
                    <td>{{ $kodePembelian->kode_belibahanbaku ?? 'Data Tidak Ada' }}</td>
                    <td>{{ $kodePembelian->total_jumlahbeli ?? 'Data Tidak Ada' }}</td>
                    <td>{{ $kodePembelian->tgl_beli }}</td>
                    <td class="status-cell">
                        @if ($kodePembelian->R_KeStatusBeli->kode_statusbeli == 1)
                            <span class="status-unknown">{{ $kodePembelian->R_KeStatusBeli->status_beli }}</span>
                        @elseif($kodePembelian->R_KeStatusBeli->kode_statusbeli == 2)
                            <span class="status-done">{{ $kodePembelian->R_KeStatusBeli->status_beli }}</span>
                        @else
                            <span class="status-unknown">Belum</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <style>
         .status-in-progress,
        .status-done,
        .status-unknown {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 3px;
            font-size: 12px;
            /* Ukuran font yang lebih kecil */
        }

        .status-in-progress {
            background-color: orange;
            /* Warna latar belakang biru seperti btn-primary */
            color: #fff;
            /* Warna teks putih agar terlihat dengan baik */
        }

        .status-done {
            background-color: #28a745;
            /* Warna latar belakang hijau atau warna selesai lainnya */
            color: #fff;
        }

        .status-unknown {
            background-color: #ffc107;
            /* Warna latar belakang kuning atau warna status tidak dikenali lainnya */
            color: #000;
            /* Warna teks hitam agar kontras dengan latar belakang */
        }
    </style>
@endsection
