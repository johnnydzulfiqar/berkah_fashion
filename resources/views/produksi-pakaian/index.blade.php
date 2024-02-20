@extends('layouts.master')

@section('title1')
    Daftar Hasil Kerja Pegawai Cutting
@endsection

@section('title2')
    Daftar Hasil Kerja Pegawai Cutting
@endsection

@section('main')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (Auth::user()->role !== 'pemilik')
        <form method="GET" action="{{ route('produksi-cutting.cetak') }}" target="_blank">
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
                <th>Kode Cutting</th>
                <th>Rencana Produksi</th>
                <th>Produk</th>
                <th>Warna</th>
                <th>Ukran</th>
                <th>Jumlah R-Produksi (pakaian)</th>
                <th>Total Berhasil (pakaian)</th>
                <th>Total Gagal (pakaian)</th>
                <th>Status</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataProduksiPakaianCutting as $produksiPakaianCutting)
                <tr>
                    <td>
                        {{ $produksiPakaianCutting->kode_produksipakaian_cutting }}
                    </td>
                    <td>{{ $produksiPakaianCutting->kode_rencanaproduksi }}</td>
                    <td>{{ $produksiPakaianCutting->nama_produk }}</td>
                    <td>{{ $produksiPakaianCutting->warna_produk }}</td>
                    <td>{{ $produksiPakaianCutting->ukuran_produk }}</td>
                    <td>{{ $produksiPakaianCutting->jumlah_rencanaproduksi }}</td>
                    <td>{{ $produksiPakaianCutting->total_jumlahberhasil }}</td>
                    <td>{{ $produksiPakaianCutting->total_jumlahgagal }}</td>
                    <td class="status-cell">
                        @if ($produksiPakaianCutting->status_produksi_cutting == 1)
                            <span class="status-in-progress">Di Produksi</span>
                        @elseif($produksiPakaianCutting->status_produksi_cutting == 2)
                            <span class="status-done">Selesai Produksi Di Cutting Pada,
                                {{ $produksiPakaianCutting->tanggal_selesai }}</span>
                        @else
                            <span class="status-unknown">Status Tidak Dikenali</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('produksi-cutting.detail', $produksiPakaianCutting->kode_produksipakaian_cutting) }}"
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
