<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Beli Bahan Baku</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            margin: 20px;
        }

        h1, h2, h3 {
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        p {
            margin: 0;
        }
    </style>
</head>
<body>
    <p><strong>Kode Rencana Produksi:</strong>{{ $dataRencanaProduksi->kode_rencanaproduksi }}</p>
    <p><strong>Tanggal Awal:</strong> {{ $dataRencanaProduksi->tgl_awal }}</p>
    <p><strong>Tanggal Akhir:</strong> {{ $dataRencanaProduksi->tgl_akhir }}</p>
    <p><strong>Jumlah Rencana Produksi Pakaian:</strong> {{ $dataRencanaProduksi->jumlah_rencanaproduksi }}</p>
    <p><strong>Status Produksi:</strong> {{ $dataRencanaProduksi->R_KeStatusProduksi->status_produksi }}</p>
    <table>
        <thead>
            <tr>
                <th>Produk</th>
                <th>Warna Produk</th>
                <th>Ukuran Produk</th>
                <th>Biaya Cutting Rp.</th>
                <th>Biaya Jahit Rp.</th>
                <th>Biaya Packing Rp.</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $dataRencanaProduksi->R_KeProduk->nama_produk }}</td>
                <td>{{ $dataRencanaProduksi->R_KeWarna->nama_warna }}</td>
                <td>{{ $dataRencanaProduksi->R_KeUkuran->nama_ukuran }}</td>
                <td>{{ $dataRencanaProduksi->biaya_cutting }}</td>
                <td>{{ $dataRencanaProduksi->biaya_jahit }}</td>
                <td>{{ $dataRencanaProduksi->biaya_packing }}</td>
            </tr>
        </tbody>
    </table>
    
    <hr>
    <h2>Tabel Detail Bahan Baku Yang Diperlukan</h2>
    <table>
        <thead>
            <tr>
                <th>Bahan Baku</th>
                <th>Warna</th>
                <th>Satuan</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataRencanaProduksi->R_KeDetailRencanaProduksi as $detail)
            <tr>
                <td>{{ $detail->R_KeDataBahanBaku->nama_bahanbaku }}</td>
                <td>{{ $detail->R_KeDataBahanBaku->R_KeWarna->nama_warna }}</td>
                <td>{{ $detail->R_KeDataBahanBaku->R_KeSatuan->nama_satuan }}</td>
                <td>{{ $detail->jumlah_perlu_stokbahanbaku }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>