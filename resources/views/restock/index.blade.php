@extends('layouts.master')

@section('title1')
    Daftar Restock Bahan Baku
@endsection

@section('title2')
    Daftar Restock Bahan Baku
@endsection

@section('main')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <!-- Tampilkan data beli_bahan_bakus -->
    <table class="datatable">
        <thead>
            <tr>
                <th>Kode Restock</th>
                <th>Kode Pembelian</th>
                <th>Faktur</th>
                <th>Total Harga</th>
                <th>Tanggal Restock</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataRestock as $restock)
                <tr>
                    <td>{{ $restock->kode_restock }}</td>
                    <td>{{ $restock->kode_belibahanbaku }}</td>
                    <td>{{ $restock->no_faktur ?? 'Tidak ada no faktur'}}</td>
                    <td>Rp.{{ number_format($restock->total_hargaitem, 0, ',', '.') }}</td>
                    <td>{{ $restock->tgl_restock }}</td>
                    <td>
                        <a href="{{ route('restocks.print', $restock->kode_restock) }}" target="_blank" class="btn btn-primary">
                            Cetak 
                        </a>                        
                        
                        <a href="#" onclick="confirmDelete('{{ $restock->kode_restock }}')" class="btn btn-danger">
                            Hapus
                        </a>
                        
                        <form id="delete-form-{{ $restock->kode_restock }}" action="{{ route('restocks.destroy', $restock->kode_restock) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td> 
                </tr>
            @endforeach
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function confirmDelete(kodeRestock) {
            event.preventDefault();
    
            if (confirm("Apakah Anda yakin menghapus data?")) {
                document.getElementById('delete-form-' + kodeRestock).submit();
            }
        }
    </script>
@endsection
