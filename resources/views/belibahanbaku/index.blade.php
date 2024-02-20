@extends('layouts.master')

@section('title1')
Daftar Pembelian bahanbaku
@endsection

@section('title2')
Daftar Pembelian bahanbaku
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
                <th>Kode Pembelian Bahan Baku</th>
                <th>Jumlah Pembelian</th>
                <th>Tanggal Pembelian</th>
                <th>Status Pembelian</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($beliBahanBakus as $beliBahanBaku)
                <tr>
                    <td>{{ $beliBahanBaku->kode_belibahanbaku }}</td>
                    <td>{{ $beliBahanBaku->total_jumlahbeli }}</td>
                    <td>{{ $beliBahanBaku->tgl_beli }}</td>
                    <td>{{ $beliBahanBaku->R_KeStatusBeli->status_beli }}</td>
                    <td>
                        <a href="{{ route('belibahanbaku.print', $beliBahanBaku->kode_belibahanbaku) }}" target="_blank" class="btn btn-primary">
                            Cetak 
                        </a>                        
                        
                        <a href="#" onclick="confirmDelete('{{ $beliBahanBaku->kode_belibahanbaku }}')" class="btn btn-danger">
                            Hapus
                        </a>
                        
                        <form id="delete-form-{{ $beliBahanBaku->kode_belibahanbaku }}" action="{{ route('belibahanbaku.destroy', $beliBahanBaku->kode_belibahanbaku) }}" method="POST" style="display: none;">
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
        function confirmDelete(kodeBeliBahanBaku) {
            event.preventDefault();
    
            if (confirm("Apakah Anda yakin menghapus data?")) {
                document.getElementById('delete-form-' + kodeBeliBahanBaku).submit();
            }
        }
    </script>
@endsection
