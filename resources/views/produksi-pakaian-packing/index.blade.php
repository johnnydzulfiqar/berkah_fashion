@extends('layouts.master')

@section('title1')
    Daftar Hasil Kerja Harian Pegawai Packing
@endsection

@section('title2')
    Daftar Hasil Kerja Harian Pegawai Packing
@endsection

@section('main')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        @if (Auth::user()->role !== 'pemilik')
        <form method="GET" action="{{ route('produksi-packing.cetak') }}" target="_blank">
            <div class="row">
                <div class="col-md-3">
                    <label for="">Tanggal Awal</label>
                    <input type="date" name="start_date" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label for="">Tanggal Akhir</label>
                    <input type="date" name="end_date" class="form-control" required>
                </div>
    
                <div class="col-md-3">
                    <label for="">Pegawai</label>
                    <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control" required>
                </div>
    
                <div class="col-md-1 pt-4">
                    <button type="submit" class="btn btn-primary">CETAK</button>
                </div>
            </div>
        </form>
        @endif

    <!-- Tampilkan data beli_bahan_bakus -->
    <table class="datatable">
        <thead>
            <tr>
                <th>Kode Packing</th>
                <th>Rencana Produksi</th>
                <th>Produk</th>
                <th>Warna</th>
                <th>Ukran</th>
                <th>Jumlah R-Produksi (pakaian)</th>
                <th>Patokan Dari Bag.Jahit (pakaian)</th>
                <th>Total Berhasil (pakaian)</th>
                <th>Total Gagal (pakaian)</th>
                <th>Status</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataProduksiPakaianPacking as $produksiPakaianPacking)
                <tr>
                    <td>{{ $produksiPakaianPacking->kode_produksipakaian_packing }}</td>
                    <td>{{ $produksiPakaianPacking->kode_rencanaproduksi }}</td>
                    <td>{{ $produksiPakaianPacking->nama_produk }}</td>
                    <td>{{ $produksiPakaianPacking->warna_produk }}</td>
                    <td>{{ $produksiPakaianPacking->ukuran_produk }}</td>
                    <td>{{ $produksiPakaianPacking->jumlah_rencanaproduksi }}</td>
                    <td>{{ $produksiPakaianPacking->total_berhasil_darijahit }}</td>
                    <td>{{ $produksiPakaianPacking->total_jumlahberhasil }}</td>
                    <td>{{ $produksiPakaianPacking->total_jumlahgagal }}</td>
                    <td class="status-cell">
                        @if ($produksiPakaianPacking->status_produksi_packing == 1)
                            <span class="status-in-progress">Di Produksi</span>
                        @elseif($produksiPakaianPacking->status_produksi_packing == 2)
                            <span class="status-done">Selesai Produksi Di Packing Pada,
                                {{ $produksiPakaianPacking->tanggal_selesai }}</span>
                        @else
                            <span class="status-unknown">Status Tidak Dikenali</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('produksi-packing.detail', $produksiPakaianPacking->kode_produksipakaian_packing) }}"
                            target="_blank" class="btn btn-primary">
                            Detail
                        </a>
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
    <script>
        $(document).ready(function() {
            $('.datatable').DataTable();
        });

        function confirmDelete(kodeRestock) {
            event.preventDefault();

            if (confirm("Apakah Anda yakin menghapus data?")) {
                document.getElementById('delete-form-' + kodeRestock).submit();
            }
        }
    </script>
@endsection
