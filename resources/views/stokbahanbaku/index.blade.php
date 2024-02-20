@extends('layouts.master')

@section('title1')
    Data Stok Bahan Baku
@endsection

@section('title2')
    Data Stok Bahan Baku
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
                <th>Kode Stok</th>
                <th>Kode Bahan Baku</th>
                <th>Kode Warna</th>
                <th>Kode Satuan</th>
                <th>Stok</th>
                <th>Opsi</th>
            </tr> 
        </thead>
        <tbody>
            @foreach ($dataStokBahanBakus as $stokBahanBaku)
                <tr>
                    <td>{{ $stokBahanBaku->kode_stokbahanbaku }}</td>
                    <td>{{ $stokBahanBaku->R_KeBahanBaku->nama_bahanbaku }}</td>
                    <td>{{ $stokBahanBaku->R_KeWarna->nama_warna }}</td>
                    <td>{{ $stokBahanBaku->R_KeSatuan->nama_satuan }}</td>
                    <td>{{ $stokBahanBaku->stok_bahanbaku }}</td>
                    <td>
                        <a href="{{ route('stokbahanbaku.edit', $stokBahanBaku->kode_stokbahanbaku) }}" class="btn btn-primary">Edit</a> 
                        <a href="{{ route('stokbahanbaku.destroy', $stokBahanBaku->kode_stokbahanbaku) }}" class="btn btn-danger btn-delete" data-kodestokbahanbaku="{{ $stokBahanBaku->kode_stokbahanbaku}}">Hapus</a> 
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
$(document).ready(function() {
    $('.btn-delete').on('click', function(e) {
        e.preventDefault();
        
        var kodeStokBahanBaku = $(this).data('kodestokbahanbaku');
        var confirmation = confirm('Apakah yakin menghapus data?');

        if (confirmation) {
            var url = '/stokbahanbaku/' + kodeStokBahanBaku;

            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(response) {
                    // Tampilkan pesan sukses
                    alert(response.message);
                    
                    // Reload halaman
                    window.location.reload();
                },
                error: function(xhr) {
                    // Handle error, mungkin menampilkan pesan kesalahan
                    console.log(xhr.responseText);
                }
            });
        }
    });
});
</script>
@endsection
