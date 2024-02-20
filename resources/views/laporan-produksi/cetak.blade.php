<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        caption {
            margin-bottom: 10px;
        }

        body {
            font-size: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 2px;
        }

        th,
        td {
            padding: 3px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th.rotate {
            white-space: nowrap;
            writing-mode: vertical-rl;
            transform: rotate(180deg);
        }

        th {
            background-color: #f2f2f2;
        }

        th:first-child,
        td:first-child {
            width: 80px;
        }

        tbody tr:hover {
            background-color: #e6f7ff;
        }

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

        .judul {
            text-align: center;
            margin-bottom: 10px;
            color: #333; /* Warna teks hitam */
        }

        .judul caption:nth-child(1) {
            font-size: 24px; /* Ukuran lebih besar untuk caption pertama */
            font-weight: bold;
        }

        .judul caption:nth-child(2),
        .judul caption:nth-child(3) {
            font-size: 16px; /* Ukuran lebih kecil untuk caption kedua dan ketiga */
        }

        .alamat-perusahaan {
            text-align: center;
            font-size: 14px;
            margin-bottom: 20px;
            color: #555; /* Warna teks abu-abu lebih gelap */
        }
    </style>
</head>

<body>
     <!-- Tambahkan kop surat dan logo perusahaan -->
    <div class="judul">
        <caption>BERKAH FASHIONKU</caption> 
        <caption>LAPORAN PRODUKSI PAKAIAN</caption> 
        <caption>DARI : {{ $start_date }} - {{ $end_date }}</caption>
    </div>
    <div class="alamat-perusahaan">
        <div style="display: flex; align-items: center;">
            <!--<img src="admin/assets/img/berkah-fashionku.jpg" alt="Logo Perusahaan" class="logo-perusahaan" style="width: 50px; margin-right: 10px;">-->
            <div>
                <span style="font-size: 14px;">Jl. Selarwi, RT.03/RW.13, Desa Sadu, Kecamatan Soreang, Kabupaten Bandung, Jawa Barat 40913</span>
                <br>
                <span style="font-size: 14px;">Telp.+62 823-1641-0132</span>
            </div>
        </div>
        <hr>
    </div>
    <table>
        
        <thead>
            <tr>
                <th>Rencana Produksi</th>
                <th>Tanggal Awal</th>
                <th>Produk</th>
                <th>Warna</th>
                <th>Ukuran</th>
                <th>Jumlah Rencana(pakaian)</th>
                <th>Berhasil Bag.Cutting (pakaian)</th>
                <th>Gagal Bag.Cutting (pakaian)</th>
                <th>Berhasil Bag.Jahit (pakaian)</th>
                <th>Gagal Bag.Jahit (pakaian)</th>
                <th>Berhasil Bag.Packing (pakaian)</th>
                <th>Gagal Bag.Packing</th>
                <th>Status</th>
                <th>Tanggal Selesai</th>
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

                    <td>{{ $kodeRencanaProduksi->R_KeStatusProduksi->status_produksi ?? 'Belum di produksi' }}</td>

                    @if ($kodeRencanaProduksi->status_produksi == 2)
                        <td>{{ $kodeRencanaProduksi->R_ProduksiPakaianPacking->tanggal_selesai ?? 'Belum di produksi' }}</td>
                    @else
                        <td>Belum di produksi</td>
                    @endif
                </tr>

                <tr>
                    <td colspan="6"></td>
                    
                    <td colspan="2">
                        {{ $kodeRencanaProduksi->R_ProduksiPakaianCutting->total_produksi_pakaian ?? 'Belum di produksi' }}
                    </td>
                    
                    <td colspan="2">
                        {{ $kodeRencanaProduksi->R_ProduksiPakaianJahit->total_produksi_pakaian ?? 'Belum di produksi' }}
                    </td>

                    <td colspan="2">
                        {{ $kodeRencanaProduksi->R_ProduksiPakaianPacking->total_produksi_pakaian ?? 'Belum di produksi' }}
                    </td>
                
                    <td colspan="2"></td>  
                </tr>
            @endforeach
        </tbody>
    </table>
    <div style="text-align: left; background-color: #f0f0f0; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <p style="font-size: 14px; margin: 0;">Tanggal Cetak: {{ $tglSekarang }}</p><br>
        <h1 style="font-size: 20px; margin-top: 10px; margin-bottom: 5px;">Pemilik</h1><br><br>
        <h2 style="font-size: 16px; margin: 0;">{{ Auth::user()->name }}</h2>
    </div>
</body>

</html>
