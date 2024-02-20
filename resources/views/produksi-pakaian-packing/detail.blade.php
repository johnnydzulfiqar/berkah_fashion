<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>packing</title>
        <style>
            caption {
                margin-bottom: 10px;
                font-size: 16px;
            }
    
            body {
                font-size: 10px;
            }
    
            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }
    
            th,
            td {
                padding: 4px;
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
        <table>
            <caption>DETAIL PRODUKSI PAKAIAN PACKING</caption>
            <caption>KODE PRODUKSI : ({{ $kode_produksipakaian_packing}})</caption>
            <caption>UNTUK : ({{ $rencana}})</caption>
            <thead>
                <tr>
                    <th>Detail</th>
                    <th>Jumlah Rencana (pakaian)</th>
                    <th>Pegawai</th>
                    <th>Tanggal Kerja</th>
                    <th>Produk</th>
                    <th>Warna</th>
                    <th>Ukuran</th>
                    <th>Berhasil (pakaian)</th>
                    <th>Gagal (pakaian)</th>
                    <th>Upah(per pakaian)</th>
                    <th>Upah</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataProduksiPacking as $dataProduksi)
                    <tr>
                        <td>{{ $dataProduksi->kode_detail_produksipakaian_packing }}</td>
                        <td>{{ $dataProduksi->jumlah_rencanaproduksi }}</td>
                        <td>{{ $dataProduksi->R_KeUser->name}}</td>
                        <td>{{ $dataProduksi->tanggal_kerja }}</td>
                        <td>{{ $dataProduksi->nama_produk }}</td>
                        <td>{{ $dataProduksi->warna_produk }}</td>
                        <td>{{ $dataProduksi->ukuran_produk }}</td>
                        <td>{{ $dataProduksi->jumlah_berhasil }}</td>
                        <td>{{ $dataProduksi->jumlah_gagal }}</td>
                        <td>{{ $dataProduksi->R_KeProduksiPakaianPacking->R_KeRencanaProduksi->biaya_packing }}</td>
                        <td>Rp.{{ number_format($dataProduksi->upah_kerja, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>