@extends('layouts.master')

@section('title1')
    Form Input Produksi Harian Bagian Jahit
@endsection

@section('title2')
    Form Input Produksi Harian Bagian Jahit
@endsection

@section('main')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('produksi-pakaian-jahit.store') }}" method="post">
        @csrf
        <div id="detail-form-container">
            <div class="detail-form">
                {{-- Formulir milik tabel detail produksi pakaian --}}
                <label for="id_user">Bagian:</label>
                <input type="text" name="name" id="id_user" autocomplete="name"
                    value=" Nama {{ Auth::user()->name }}, Bagian {{ Auth::user()->role }}" readonly>

                <label for="kode_rencanaproduksi">Kode Rencana Produksi:</label>
                <select name="kode_rencanaproduksi" style="background-color: rgb(245, 241, 241)" required>
                    <option value="">-- Pilih Kode --</option>
                    @foreach ($dataRencanaProduksis as $dataRencanaProduksi => $rencanaProduksi)
                        <option value="{{ $dataRencanaProduksi }}">{{ $rencanaProduksi }}</option>
                    @endforeach
                </select>

                {{-- Formulir milik tabel produksi pakaian --}}
                <label for="tanggal_awal">Tanggal Awal Produksi:</label>
                <input type="text" name="tanggal_awal" id="tanggal_awal" required readonly>
                {{-- Formulir milik tabel  produksi pakaian --}}

                <label for="tanggal_kerja">Tanggal Kerja:</label>
                <input type="date" name="tanggal_kerja" style="background-color: rgb(245, 241, 241)" required
                    value="{{ $sekarang->toDateString() }}">

                <label for="nama_produk">Produk:</label>
                <input type="text" name="nama_produk" id="nama_produk" required readonly>

                <label for="warna_produk">Warna:</label>
                <input type="text" name="warna_produk" id="warna_produk" required readonly>

                <label for="ukuran_produk">Ukuran:</label>
                <input type="text" name="ukuran_produk" id="ukuran_produk" required readonly>

                <label for="jumlah_rencanaproduksi">Jumlah Rencana Produksi Pakaian:</label>
                <input type="text" name="jumlah_rencanaproduksi" id="jumlah_rencanaproduksi" required readonly>

                <label for="total_berhasil_daricutting">Patokan Jumlah Pakaian Yang Telah Selesai Dari Bag.Cutting</label>
                <input type="text" name="total_berhasil_daricutting" id="total_berhasil_daricutting" required readonly
                    style="background-color: rgb(245, 241, 241)">

                <label for="total_produksi_pakaian">Jumlah Pakaian Yang Telah Selesai Di Jahit</label>
                <input type="number" name="total_produksi_pakaian" id="total_produksi_pakaian" value=0 readonly
                    style="background-color: rgb(245, 241, 241)" required>

                <label for="sisaBelumDiproduksi">Jumlah Pakaian Yang Belum Di Jahit</label>
                <input type="number" name="sisaBelumDiproduksi" id="sisaBelumDiproduksi" value=0 readonly
                    style="background-color: rgb(245, 241, 241)" required>

                <label for="jumlah_berhasil">Inputkan Jumlah Pakaian Berhasil Di Jahit:</label>
                <input type="text" name="jumlah_berhasil" id="jumlah_berhasil" value="{{ old('jumlah_berhasil') }}"
                    style="background-color:rgb(104, 238, 86)" required>
                @error('jumlah_berhasil')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="jumlah_gagal">Inputkan Jumlah Pakaian Gagal Di Jahit:</label>
                <input type="text" name="jumlah_gagal" id="jumlah_gagal" value="{{ old('jumlah_gagal') }}"
                    style="background-color: rgb(104, 238, 86)" required>
                @error('jumlah_gagal')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="total_berhasildangagal">Total Berhasil dan Gagal:</label>
                <input type="number" name="total_berhasildangagal" id="total_berhasildangagal" required readonly>

                @if (Auth::user()->role == 'cutting') 
                    <label for="biaya_cutting">Upah Kerja Cutting:</label>
                    <input type="number" name="biaya_cutting" id="biaya_cutting" required readonly>
                @elseif (Auth::user()->role == 'jahit')
                    <label for="biaya_jahit">Upah Kerja Jahit (per pakaian) Rp. :</label>
                    <input type="number" name="biaya_jahit" id="biaya_jahit" required readonly>
                @elseif (Auth::user()->role == 'packing')
                    <label for="biaya_packing">Upah Kerja Packing :</label>
                    <input type="number" name="biaya_packing" id="biaya_packing" required readonly>
                @endif

                <label for="upah_kerja">Upah Kerja Rp. :</label>
                <input type="number" name="upah_kerja" id="upah_kerja" required readonly>

                {{-- End milik tabel detail rencana produksi --}}

            </div>
        </div>
        <button type="submit">Simpan</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        #detail-form-container {
            margin: 20px;
        }

        .detail-form {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>

    <script>
        $('select[name="kode_rencanaproduksi"]').on('change', function() {
            var kodeRencanaProduksi = $(this).val();

            $.ajax({
                url: '/getRencanaProduksiDataJahit/' + kodeRencanaProduksi,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Update formulir dengan data yang diterima dari server
                    updateFormWithRencanaProduksiData(data);
                },
                error: function(error) {
                    console.error('Error fetching rencana produksi data:', error);
                }
            });

        });

        // Fungsi untuk memperbarui formulir dengan data rencana produksi
        function updateFormWithRencanaProduksiData(data) {
            // Implementasikan logika untuk mengisi formulir dengan data yang diterima
            // Contoh:
            $('input[name="nama_produk"]').val(data.data.kode_produk);
            $('input[name="jumlah_rencanaproduksi"]').val(data.data.jumlah_rencanaproduksi);
            $('input[name="tanggal_awal"]').val(data.data.tanggal_awal);
            $('input[name="warna_produk"]').val(data.data.kode_warnaproduk);
            $('input[name="ukuran_produk"]').val(data.data.kode_ukuranproduk);

            // Ambil nilai biaya_cutting dari data dan tetapkan ke variabel biayaCutting
            biayaCutting = parseFloat(data.data.biaya_cutting) || 0;
            $('input[name="biaya_cutting"]').val(biayaCutting);

            // Ambil nilai biaya_cutting dari data dan tetapkan ke variabel biayaJahit
            biayaJahit = parseFloat(data.data.biaya_jahit) || 0;
            $('input[name="biaya_jahit"]').val(biayaJahit);

            // Ambil nilai biaya_cutting dari data dan tetapkan ke variabel biayaPacking
            biayaPacking = parseFloat(data.data.biaya_packing) || 0;
            $('input[name="biaya_packing"]').val(biayaPacking);

            $('input[name="ukuran_produk"]').val(data.data.kode_ukuranproduk);
            $('input[name="total_produksi_pakaian"]').val(data.data.total_produksi_pakaian);
            $('input[name="total_berhasil_daricutting"]').val(data.data.total_berhasil_daricutting);

            updateTotalBerhasilDangagal();
        }


        // Event listener pada input jumlah_berhasil
        document.getElementById('jumlah_berhasil').addEventListener('input', function() {
            updateTotalBerhasilDangagal();
        });

        // Event listener pada input jumlah_gagal
        document.getElementById('jumlah_gagal').addEventListener('input', function() {
            updateTotalBerhasilDangagal();
        });

        // Event listener pada input jumlah_rencanaproduksi
        document.getElementById('jumlah_rencanaproduksi').addEventListener('input', function() {
            updateTotalBerhasilDangagal();
        });

        // Event listener pada input total_produksi_pakaian
        document.getElementById('total_produksi_pakaian').addEventListener('input', function() {
            updateTotalBerhasilDangagal();
        });

        // Event listener pada input sisaBelumDiproduksi
        document.getElementById('sisaBelumDiproduksi').addEventListener('input', function() {
            updateTotalBerhasilDangagal();
        });

        // Fungsi untuk menghitung dan mengupdate total_berhasildangagal termasuk menghitung upah_kerja
        function updateTotalBerhasilDangagal() {

            var jumlahBerhasil = parseFloat(document.getElementById('jumlah_berhasil').value) || 0;
            var jumlahGagal = parseFloat(document.getElementById('jumlah_gagal').value) || 0;
            //var jumlahRencanaProduksi = parseFloat(document.getElementById('jumlah_rencanaproduksi').value) || 0;
            //Baris dibawah digenti menjadi jumlahPatokanProduksi karena berdasarkan jumlah berhasil dari Bag.Cutting
            var jumlahPatokanProduksi = parseFloat(document.getElementById('total_berhasil_daricutting').value) || 0;
            var totalProduksiPakaian = parseFloat(document.getElementById('total_produksi_pakaian').value) || 0;

            // Hitung total_berhasildangagal
            var totalBerhasilDangagal = jumlahBerhasil + jumlahGagal;

            // Hitung nilaiSementara
            var nilaiSementara = jumlahPatokanProduksi - totalProduksiPakaian;

            // Validasi agar tidak melebihi nilaiSementara
            if (totalBerhasilDangagal > nilaiSementara) {
                //Total Berhasil + Gagal tidak boleh melebihi Jumlah Berhasil Dari bagian Cutting - Total Produksi Pakaian.
                alert('Tidak Boleh Melebihi Jumlah Pakaian Yang Belum Di Jahit');

                // Setel nilai input ke 0
                document.getElementById('jumlah_berhasil').value = 0;
                document.getElementById('jumlah_gagal').value = 0;
                document.getElementById('total_berhasildangagal').value = 0;
                document.getElementById('upah_kerja').value = 0;

                return;
            }

            // Update nilai total berhasil dan gagal 
            document.getElementById('total_berhasildangagal').value = totalBerhasilDangagal;


            document.getElementById('sisaBelumDiproduksi').value = nilaiSementara;

            // Ambil nilai biaya_cutting, biaya_jahit, atau biaya_packing berdasarkan role user
            var biayaKerja = 0;

            if ("{{ Auth::user()->role }}" == 'cutting') {
                biayaKerja = parseFloat(document.getElementById('biaya_cutting').value) || 0;
            } else if ("{{ Auth::user()->role }}" == 'jahit') {
                biayaKerja = parseFloat(document.getElementById('biaya_jahit').value) || 0;
            } else if ("{{ Auth::user()->role }}" == 'packing') {
                biayaKerja = parseFloat(document.getElementById('biaya_packing').value) || 0;
            }

            // Hitung nilai upah_kerja
            var upahKerja = jumlahBerhasil * biayaKerja;

            // Update nilai upah_kerja pada input
            document.getElementById('upah_kerja').value = upahKerja;
        }
    </script>
@endsection
