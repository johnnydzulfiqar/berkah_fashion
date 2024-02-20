@extends('layouts.master')

@section('title1')
Daftar Inputan Rencana Produksi
@endsection

@section('title2')
Daftar Inputan Rencana Produksi
@endsection

@section('main')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <!-- Tampilkan data rencana_produksis -->
    <table class="datatable">
        <thead>
            <tr>
                <th>Rencana Produksi</th>
                <th>Produk</th>
                <th>Warna</th>
                <th>Ukuran</th>
                <th>Tanggal Awal</th>
                <th>Tanggal Akhir</th>
                <th>Biaya Cutting Rp.</th>
                <th>Biaya Jahit Rp.</th>
                <th>Biaya Packing Rp.</th>
                <th>Jumlah Rencana Produksi (pakaian)</th>
                <th>Status Produksi</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rencanaProduksis as $rencanaProduksi)
                <tr>
                    <td class="kode-rencana">
                        <span class="kode-rencana-text">
                            {{ $rencanaProduksi->kode_rencanaproduksi }}
                        </span>
                    </td>
                    <td>{{ $rencanaProduksi->R_KeProduk->nama_produk }}</td>
                    <td>{{ $rencanaProduksi->R_KeWarna->nama_warna }}</td>
                    <td>{{ $rencanaProduksi->R_KeUkuran->nama_ukuran }}</td>
                    <td>{{ $rencanaProduksi->tgl_awal }}</td>
                    <td>{{ $rencanaProduksi->tgl_akhir }}</td>
                    <td>{{ $rencanaProduksi->biaya_cutting}}</td>
                    <td>{{ $rencanaProduksi->biaya_jahit}}</td>
                    <td>{{ $rencanaProduksi->biaya_packing}}</td>
                    <td>{{ $rencanaProduksi->jumlah_rencanaproduksi}}</td>
                    <td>
                        <span class="status-label" style="background-color: {{ $rencanaProduksi->R_KeStatusProduksi->kode_statusproduksi == 1 ? 'grey' : 'green' }}">
                            {{ $rencanaProduksi->R_KeStatusProduksi->status_produksi }}
                        </span>
                    </td>                  <td>
                        <a href="{{ route('rencana-produksi.print', $rencanaProduksi->kode_rencanaproduksi) }}" target="_blank" class="btn btn-primary">
                            Detail
                        </a>                        
                        
                        {{-- <a href="#" onclick="confirmDelete('{{ $beliBahanBaku->kode_belibahanbaku }}')" class="btn btn-danger">
                            Hapus
                        </a>
                        
                        <form id="delete-form-{{ $beliBahanBaku->kode_belibahanbaku }}" action="{{ route('belibahanbaku.destroy', $beliBahanBaku->kode_belibahanbaku) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>  --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <style>
        .kode-rencana-text {
        background-color: rgb(3, 3, 180); 
        padding: 5px;
        border-radius: 3px;
        background-clip: text; 
        color: transparent; 
        display: inline-block; 
        }

        .status-label {
            padding: 5px 10px;
            border-radius: 4px;
            color: #fff;
            font-weight: bold;
            display: inline-block;
        }
    
        .status-label-yellow {
            background-color: yellow;
        }
    
        .status-label-green {
            background-color: green;
        }
    </style>

    <script>
        function confirmDelete(kodeBeliBahanBaku) {
            event.preventDefault();
    
            if (confirm("Apakah Anda yakin menghapus data?")) {
                document.getElementById('delete-form-' + kodeBeliBahanBaku).submit();
            }
        }
    </script>
@endsection
