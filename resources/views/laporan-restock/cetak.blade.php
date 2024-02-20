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
        <caption>LAPORAN RESTOCK BAHANBAKU</caption> 
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
    <table class="datatable"> 
        <thead>
            <tr>
                <th>Detail Restock</th>
                <th>Kode Restock</th>
                <th>Kode Pembelian</th>
                <th>Tanggal Restock</th>
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
                    <td>{{ $detail->R_KeRestock->kode_belibahanbaku ?? 'Data Tidak Ada'}}</td>
                    <td>{{ $detail->R_KeRestock->tgl_restock   ?? 'Data Tidak Ada'}}</td>
                    <td>{{ $detail->R_KeBahanBaku->nama_bahanbaku  ?? 'Data Tidak Ada'}}</td>
                    <td>{{ $detail->R_KeWarna->nama_warna ?? 'Data Tidak Ada'}}</td>
                    <td>{{ $detail->R_KeSatuan->nama_satuan ?? 'Data Tidak Ada'}}</td>
                    <td>Rp.{{ number_format($detail->harga_item , 0, ',', '.') }}</td>
                    <td>{{ $detail->jumlah_item ?? 'Data Tidak Ada'}}</td>
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
