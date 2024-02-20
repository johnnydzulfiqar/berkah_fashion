<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        caption {
            margin-bottom: 7px;
            font-size: 18px;
        }       
        body {
            font-size: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 8px;
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
    </style>
</head>
<body>
    <!-- Tambahkan kop surat dan logo perusahaan -->
    <div class="judul">
        <caption>HASIL KERJA PEGAWAI : {{ $nama}}</caption>
        <caption>DARI : {{ $start_date }} - {{ $end_date }}</caption>
        <caption>Total Upah : Rp.{{ number_format($totalUpahProduksi, 0, ',', '.') }} </caption>
    </div>

    <table class="datatable">
        <thead>
            <tr>
                <th>Kode Detail</th>
                <th>Kode Produksi</th>
                <th>Kode Rencana</th>
                <th>Jumlah Rencana (pakaian)</th>
                <th>Tanggal Kerja Pegawai</th>
                <th>Produk</th>
                <th>Warna</th>
                <th>Ukuran</th>
                <th>Berhasil (pakaian)</th>
                <th>Gagal (pakaian)</th>
                <th>Upah (per pakaian)</th>
                <th>Upah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataProduksi as $data)
                <tr>
                    <td>{{ $data->kode_detail_produksipakaian_jahit ?? 'Data Tidak Ada'}}</td>
                    <td>{{ $data->kode_produksipakaian_jahit ?? 'Data Tidak Ada'}}</td>
                    <td>{{ $data->kode_rencanaproduksi  ?? 'Data Tidak Ada'}}</td>
                    <td>{{ $data->jumlah_rencanaproduksi  ?? 'Data Tidak Ada'}}</td>
                    <td>{{ $data->tanggal_kerja ?? 'Data Tidak Ada'}}</td>
                    <td>{{ $data->nama_produk ?? 'Data Tidak Ada'}}</td>
                    <td>{{ $data->warna_produk ?? 'Data Tidak Ada'}}</td>
                    <td>{{ $data->ukuran_produk ?? 'Data Tidak Ada'}}</td>
                    <td>{{ $data->jumlah_berhasil ?? 'Data Tidak Ada'}}</td>
                    <td>{{ $data->jumlah_gagal ?? 'Data Tidak Ada'}}</td>
                    <td>Rp.{{ number_format($data->R_KeProduksiPakaianJahit->R_KeRencanaProduksi->biaya_jahit, 0, ',', '.') }}</td>
                    <td>Rp.{{ number_format($data->upah_kerja, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div style="text-align: left; background-color: #f0f0f0; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <p style="font-size: 14px; margin: 0;">Tanggal Cetak: {{ $tglSekarang }}</p><br>
        <h1 style="font-size: 20px; margin-top: 10px; margin-bottom: 5px;">Bagian</h1>
        <h2 style="font-size: 16px; margin: 0;">{{ Auth::user()->role }}</h2>
    </div>
</body>
</html>
