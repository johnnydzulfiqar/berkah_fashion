@extends('layouts.master')
@section('title1')
    Laporan Produksi
@endsection

@section('title2')
    Laporan Produksi
@endsection

@section('main')
<!--    <form method="GET" action="{{ route('laporan-produksi.filter') }}">
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

    <form method="GET" action="{{ route('laporan-produksi.cetak') }}"  target="_blank">
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
                    <td>{{ $kodeRencanaProduksi->R_ProduksiPakaianCutting->total_jumlahberhasil ?? 'Belum di produksi' }}</td>
                    <td>{{ $kodeRencanaProduksi->R_ProduksiPakaianCutting->total_jumlahgagal ?? 'Belum di produksi' }}</td>

                    <!-- Untuk Produksi Pakaian Jahit -->
                    <td>{{ $kodeRencanaProduksi->R_ProduksiPakaianJahit->total_jumlahberhasil ?? 'Belum di produksi' }}</td>
                    <td>{{ $kodeRencanaProduksi->R_ProduksiPakaianJahit->total_jumlahgagal ?? 'Belum di produksi' }}</td>

                    <!-- Untuk Produksi Pakaian Packing -->
                    <td>{{ $kodeRencanaProduksi->R_ProduksiPakaianPacking->total_jumlahberhasil ?? 'Belum di produksi' }}
                    </td>
                    <td>{{ $kodeRencanaProduksi->R_ProduksiPakaianPacking->total_jumlahgagal ?? 'Belum di produksi' }}</td>

                    <td class="status-cell">
                        @if ($kodeRencanaProduksi->R_KeStatusProduksi->kode_statusproduksi == 1)
                            <span class="status-unknown">{{ $kodeRencanaProduksi->R_KeStatusProduksi->status_produksi }}</span>
                        @elseif($kodeRencanaProduksi->R_KeStatusProduksi->kode_statusproduksi == 2)
                            <span class="status-done">{{ $kodeRencanaProduksi->R_KeStatusProduksi->status_produksi }}</span>
                        @else
                            <span class="status-unknown">Belum di produksi</span>
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
