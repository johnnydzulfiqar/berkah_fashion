<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Pembelian Bahan Baku</title>
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
    <p><strong>Kode Pembelian:</strong> {{ $beliBahanBaku->kode_belibahanbaku }}</p>
    <p><strong>Tanggal Pembelian:</strong> {{ $beliBahanBaku->tgl_beli }}</p>
    <p><strong>Total Jumlah Pembelian :</strong> {{ $beliBahanBaku->total_jumlahbeli }}</p>
    <table>
        <thead>
            <tr>
                <th>Bahan Baku</th>
                <th>Warna</th>
                <th>Satuan</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataDetail as $detail) 
            <tr> 
                <td>{{ $detail->R_KeBahanBaku->nama_bahanbaku ?? 'Data Tidak Ada'}}</td>
                <td>{{ $detail->R_KeWarna->nama_warna ?? 'Data Tidak Ada'}}</td>
                <td>{{ $detail->R_KeSatuan->nama_satuan ?? 'Data Tidak Ada'}}</td>
                <td>{{ $detail->jumlah_beli ?? 'Data Tidak Ada'}}</td>
                <td>{{ $detail->keterangan ?? 'Tidak Ada Keterangan'}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>