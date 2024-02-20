<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>laporan stok bahanbaku</title>
    <style>
        caption {
            margin-bottom: 10px;
            font-size: 20px;
        }

        body {
            font-size: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
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
    <table class="datatable">
        <caption>LAPORAN STOK BAHAN BAKU BERKAH FASHIONKU</caption>
        <thead>
            <tr>
                <th>Kode</th>
                <th>Bahan Baku</th>
                <th>Warna</th>
                <th>Satuan</th>
                <th>Stok</th>
                <th>Keterangan</th>
                {{-- <th>Status</th> --}}
            <tr>
        </thead>
        <tbody>
            @foreach ($kodeBahanBaku as $stok)
                <tr>
                    <td>{{ $stok->kode_bahanbaku ?? 'Data Tidak Ada' }}</td>
                    <td>{{ $stok->nama_bahanbaku ?? 'Data Tidak Ada' }}</td>
                    <td>{{ $stok->R_KeWarna->nama_warna ?? 'Data Tidak Ada' }}</td>
                    <td>{{ $stok->R_KeSatuan->nama_satuan ?? 'Data Tidak Ada' }}</td>
                    <td>{{ $stok->stok ?? 'Data Tidak Ada' }}</td>
                    <td>{{ $stok->keterangan ?? 'Tidak Ada Keterangan' }}</td>
                    {{-- <td>{{ $stok->status ?? 'Data Tidak Ada' }}</td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
