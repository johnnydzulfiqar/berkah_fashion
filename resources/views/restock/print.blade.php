<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Restock</title>
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
    <p><strong>Kode Restock:</strong> {{ $dataRestock->kode_restock }}</p>
    <p><strong>Kode Pembelian:</strong> {{ $dataRestock->kode_belibahanbaku }}</p>
    <p><strong>Faktur:</strong> {{ $dataRestock->no_faktur }}</p>
    <p><strong>Tanggal:</strong> {{ $dataRestock->tgl_restock }}</p>
    <p><strong>Total Harga Rp.</strong> {{ number_format($dataRestock->total_hargaitem, 0, ',', '.') }}</p>    
    <table>
        <thead>
            <tr>
                <th>Bahan Baku</th>
                <th>Warna</th>
                <th>Satuan</th>
                <th>Harga Item</th>
                <th>Jumlah Item</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataRestock->R_KeDetailRestock as $detail)
            <tr>
                <td>{{ $detail->R_KeBahanBaku->nama_bahanbaku }}</td>
                <td>{{ $detail->R_KeWarna->nama_warna }}</td>
                <td>{{ $detail->R_KeSatuan->nama_satuan }}</td>
                <td>Rp. {{ $detail->harga_item }}</td>
                <td>{{ $detail->jumlah_item }}</td>
                <td>{{ $detail->keterangan ?? 'tidak ada keterangan'}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>