@extends('layouts.master')

@section('title1')
    Form Rencana Produksi
@endsection

@section('title2')
    Form Rencana Produksi
@endsection

@section('main')
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $item)
                <li>{{ $item }}</li>
            @endforeach
        </div>
    @endif
    <form action="{{ route('rencana-produksi.store') }}" method="post">
        @csrf
        <div class="form-group">
            <div id="rencana-form-container">
                {{-- Formulir untuk tabel rencana_produksis --}}
                <label for="kode_produk">Produk:</label>
                <select name="kode_produk" id="kode_produk">
                    <option value="">--pilih--</option>
                    @foreach ($dataProduks as $dataproduk)
                        <option value="{{ $dataproduk->kode_produk }}">{{ $dataproduk->nama_produk }}</option>
                    @endforeach
                </select>
                 {{-- ini disembunyikan  --}}
                <label for="kode_warna" hidden>Warna:</label>
                <input type="text" name="kode_warna" id="kode_warna" required hidden>

                <label for="kode_ukuran" hidden>Ukuran:</label>
                <input type="text" name="kode_ukuran" id="kode_ukuran" required hidden>
                {{-- END --}}
               
                <label for="nama_warna">Warna:</label>
                <input type="text" name="nama_warna" id="nama_warna" required>

                <label for="nama_ukuran" >Ukuran:</label>
                <input type="text" name="nama_ukuran" id="nama_ukuran" required>

                
                <label for="tgl_awal">Tanggal Awal:</label>
                <input type="date" name="tgl_awal" required>

                <label for="tgl_akhir">Tanggal Akhir:</label>
                <input type="date" name="tgl_akhir" required>

                <label for="biaya_cutting">Biaya Cutting Rp.</label>
                <input type="number" name="biaya_cutting" required>

                <label for="biaya_jahit">Biaya Jahit Rp.</label>
                <input type="number" name="biaya_jahit" required>

                <label for="biaya_packing">Biaya Packing Rp.</label>
                <input type="number" name="biaya_packing" required>

                <label for="jumlah_rencanaproduksi">Jumlah Rencana Produksi (pakaian):</label>
                <input type="number" name="jumlah_rencanaproduksi" required>

                <label for="status_produksi">Status Produksi:</label>
                <select name="status_produksi" required>
                    <option value="">--pilih--</option>
                    @foreach ($dataStatusProduksis as $datastatusproduksi => $statusproduksi)
                        <option value="{{ $datastatusproduksi }}">{{ $statusproduksi }} </option>
                    @endforeach
                </select>
            </div>

            <hr>
            <!-- Formulir untuk tabel detail_rencana_produksis -->
            <h2>Bahan Baku Yang Diperlukan</h2>
            <div id="detail-form-container" mx-auto>
                <hr>
                <div class="detail-form">
                    <label for="detail_rencana[0][kode_bahanbaku]">Bahan Baku:</label>
                    <select name="detail_rencana[0][kode_bahanbaku]" class="form-control kode-bahanbaku" required>
                        <option value="">--pilih--</option>
                        @foreach ($dataStokBahanBakus as $stokBahanBaku)
                            <option value="{{ $stokBahanBaku->kode_bahanbaku }}">
                                {{ $stokBahanBaku->nama_bahanbaku }}
                                - Warna : {{ $stokBahanBaku->R_KeWarna->nama_warna }}
                                - Stok : {{ $stokBahanBaku->stok }}
                            </option>
                        @endforeach
                    </select>

                    <label for="detail_rencana[0][stok]">Stok:</label>
                    <input type="number" id="stok" name="detail_rencana[0][stok]" class="form-control stok"
                        required="" readonly>


                    <label for="detail_rencana[0][kode_warna_stokbahanbaku]">Warna:</label>
                    <input type="text" id="kode_warna_stokbahanbaku" name="detail_rencana[0][kode_warna_stokbahanbaku]"
                        class="form-control kode-warna-stokbahanbaku" required="" readonly>
                    <!-- Pilihan Warna akan diisi otomatis melalui JavaScript -->
                    </select>

                    <label for="detail_rencana[0][kode_satuan_stokbahanbaku]">Satuan:</label>
                    <input type="text" id="kode_satuan_stokbahanbaku" name="detail_rencana[0][kode_satuan_stokbahanbaku]"
                        class="form-control kode-satuan-stokbahanbaku" required="" readonly>
                    <!-- Pilihan Satuan akan diisi otomatis melalui JavaScript -->
                    </select>

                    <label for="detail_rencana[0][jumlah_perlu_stokbahanbaku]">Jumlah:</label>
                    <input type="number" name="detail_rencana[0][jumlah_perlu_stokbahanbaku]"
                        id="jumlah_perlu_stokbahanbaku" class="form-control jumlah_perlu_stokbahanbaku" required
                        min="1">

                    <hr>
                    <button type="button" onclick="hapusDetail(this)">Hapus</button>
                </div>
            </div>
            <hr>
            <button type="button" id="tambah-detail" class="btn btn-primary">Tambah Detail</button>

            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <style>
        #rencana-form-container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        #rencana-form-container label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        #rencana-form-container select,
        #rencana-form-container input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        #rencana-form-container select {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        #rencana-form-container input[type="date"],
        #rencana-form-container input[type="number"] {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        #rencana-form-container button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #rencana-form-container button:hover {
            background-color: #45a049;
        }

        /* Css Untuk Mempercantik formulir detail
                                                */
        #detail-form-container {
            display: flex;
            flex-wrap: wrap;
        }

        #detail-form-container label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .detail-form {
            margin-right: 20px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            padding: 10px;
        }
    </style>
    <!-- Skrip jQuery -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Logika JavaScript untuk menambahkan formulir detail baru
            let detailFormContainer = document.getElementById('detail-form-container');
            let tambahDetailButton = document.getElementById('tambah-detail');
            let detailFormCount = 1;

            tambahDetailButton.addEventListener('click', function() {
                let newDetailForm = document.querySelector('.detail-form').cloneNode(true);
                detailFormCount++;
                newDetailForm.innerHTML = newDetailForm.innerHTML.replace(/\[0\]/g, '[' + detailFormCount +
                    ']');
                detailFormContainer.appendChild(newDetailForm);

                // Setelah menambahkan formulir baru, jalankan fungsi untuk mengatur nilai otomatis
                setupAutofillValues(newDetailForm);
            });

            // Fungsi untuk mengatur nilai otomatis pada formulir detail
            function setupAutofillValues(form) {
                // Menangani perubahan pada dropdown "Kode Stok Bahan Baku"
                $(form).find('.kode-bahanbaku').change(function() {
                    var kodeBahanbaku = $(this).val();

                    // Lakukan AJAX request untuk mendapatkan informasi bahan baku berdasarkan kodeStokBahanBaku
                    $.ajax({
                        url: '/get-info-bahanbaku/' + kodeBahanbaku,
                        // Ganti dengan endpoint yang sesuai
                        type: 'GET',
                        success: function(response) {
                            // Pastikan bahwa response.kodeWarnaList berisi nilai yang sesuai
                            var kodeWarnaStokBahanBakuInput = $(form).find('.kode-warna');
                            kodeWarnaStokBahanBakuInput.val(response
                                .kodeWarnaList); // Mengatur nilai ke dalam input

                            // Pastikan bahwa response.kodeSatuanList berisi nilai yang sesuai
                            var kodeSatuanStokBahanBakuInput = $(form).find('.kode-satuan');
                            kodeSatuanStokBahanBakuInput.val(response
                                .kodeSatuanList); // Mengatur nilai ke dalam input

                            // Mengisi otomatis nilai kode_warna_stokbahanbaku
                            $(form).find('.kode-warna-stokbahanbaku').val(response.kodeWarna);

                            // Mengisi otomatis nilai kode_satuan_stokbahanbaku
                            $(form).find('.kode-satuan-stokbahanbaku').val(response.kodeSatuan);

                            // Mengisi otomatis stok
                            $(form).find('.stok').val(response.stokTersedia);

                            // Set nilai maksimum pada input jumlah_perlu_stokbahanbaku
                            $(form).find('.jumlah_perlu_stokbahanbaku').attr('max', response
                                .stokTersedia);

                        },
                        error: function(xhr, status, error) {
                            console.error('Error: ' + error);
                        }
                    });
                });

                // Menangani perubahan pada input jumlah_perlu_stokbahanbaku
                $(form).find('.jumlah_perlu_stokbahanbaku').change(function() {
                    var jumlahPerlu = parseInt($(this).val());
                    var stokTersedia = parseInt($(form).find('.stok').val());

                    // Debugging: Lihat nilai variabel di konsol
                    console.log('Jumlah Perlu:', jumlahPerlu);
                    console.log('Stok Tersedia:', stokTersedia);

                    // Validasi stok
                    if (jumlahPerlu > stokTersedia) {
                        alert('Stok tidak cukup, silahkan beli terlebih dahulu');
                        $(this).val(stokTersedia); // Set nilai kembali ke stok yang tersedia
                        window.location.href = '/belibahanbaku/create';
                    }
                });
            }

            // Fungsi untuk mengisi nilai otomatis dan mendapatkan informasi produk berdasarkan kode_produk
            function fillProductInfo(form, kodeProduk) {
                $.ajax({
                    url: '/get-info-produk/' + kodeProduk,
                    type: 'GET',
                    success: function(data) {
                        // Mengisi nilai ke input kode_warna dan kode_ukuran
                        form.querySelector('.kode_warna').value = data.kodeWarna;
                        form.querySelector('.kode_ukuran').value = data.kodeUkuran;

                        // Jika Anda memiliki input stok atau input lain yang perlu diisi, tambahkan di sini
                        // form.querySelector('.stok').value = data.stok;
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }

            // Menangani perubahan pada dropdown "Kode Produk"
            $(document).on('change', '.kode_produk', function() {
                var selectedKodeProduk = $(this).val();
                var form = this.closest('.detail-form');

                // Memanggil fungsi fillProductInfo dengan kode_produk yang dipilih
                fillProductInfo(form, selectedKodeProduk);
            });


            // Jalankan fungsi untuk formulir detail pertama saat halaman dimuat
            setupAutofillValues(document.querySelector('.detail-form'));
        });


        $(document).ready(function() {
            // Menangani perubahan pada dropdown "Kode Stok Bahan Baku"
            $('.kode-bahanbaku').change(function() {
                var kodeStokBahanBaku = $(this).val();

                // Lakukan AJAX request untuk mendapatkan informasi bahan baku berdasarkan kodeStokBahanBaku
                $.ajax({
                    url: '/get-info-bahanbaku/' + kodeStokBahanBaku,
                    // Ganti dengan endpoint yang sesuai
                    type: 'GET',
                    success: function(response) {

                        // Pastikan bahwa response.kodeWarnaList berisi nilai yang sesuai
                        var kodeWarnaStokBahanBakuInput = $(this).closest('.detail-form').find(
                            '.kode-warna');
                        kodeWarnaStokBahanBakuInput.val(response
                            .kodeWarnaList); // Mengatur nilai ke dalam input

                        // Pastikan bahwa response.kodeSatuanList berisi nilai yang sesuai
                        var kodeSatuanStokBahanBakuInput = $(this).closest('.detail-form').find(
                            '.kode-satuan');
                        kodeSatuanStokBahanBakuInput.val(response
                            .kodeSatuanList); // Mengatur nilai ke dalam input


                        // Mengisi otomatis nilai kode_warna_stokbahanbaku
                        $('#kode_warna_stokbahanbaku').val(response.kodeWarna);

                        // Mengisi otomatis nilai kode_satuan_stokbahanbaku
                        $('#kode_satuan_stokbahanbaku').val(response.kodeSatuan);

                        // Mengisi otomatis nilai kode_satuan_stokbahanbaku
                        $('#stok').val(response.stokTersedia);

                        // Mengisi otomatis nilai kode_satuan_stokbahanbaku
                        $('#jumlah_perlu_stokbahanbaku').val(0);

                    },
                    error: function(xhr, status, error) {
                        console.error('Error: ' + error);
                    }
                });
            });
        });


        // Fungsi untuk mengambil dan mengisi data berdasarkan kode_produk
        function getInfoProduk(kodeProduk) {
            $.ajax({
                url: '/get-info-produk/' + kodeProduk,
                type: 'GET',
                success: function(data) {
                    // Mengisi nilai ke input kode_warna dan kode_ukuran
                    $('#kode_warna').val(data.kodeWarna);
                    $('#kode_ukuran').val(data.kodeUkuran);

                    //YANG DISIMPAN KE DATABASE GUNAKAN YANG KODE
                    $('#nama_warna').val(data.namaWarna);
                    $('#nama_ukuran').val(data.namaUkuran);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        }

        // Menangani perubahan pada dropdown kode_produk
        $('#kode_produk').change(function() {
            var selectedKodeProduk = $(this).val();

            // Memanggil fungsi getInfoProduk dengan kode_produk yang dipilih
            getInfoProduk(selectedKodeProduk);
        });

        // Fungsi untuk menghapus formulir detail
        function hapusDetail(element) {
            if (confirm('Apakah Anda yakin ingin menghapus detail ini?')) {
                element.closest('.detail-form').remove();

                // Panggil fungsi updateTotalHargaItem setiap kali menambah atau menghapus detail
                updateTotalHargaItem();
            }
        }
    </script>
@endsection
