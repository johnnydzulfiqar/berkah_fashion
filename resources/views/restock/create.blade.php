@extends('layouts.master')

@section('title1')
    Form Restock
@endsection

@section('title2')
    Form Restock
@endsection

@section('main')
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $item)
                <li>{{ $item }}</li>
            @endforeach
        </div>
    @endif
    {{-- Formulir untuk restock --}}
    <form action="{{ route('restocks.store') }}" method="post">
        @csrf
        <label for="kode_belibahanbaku">Kode Pembelian:</label>
        <select name="kode_belibahanbaku" id="kode_belibahanbaku" required>
            <option value="">--pilih--</option>
            @foreach ($dataBeliBahanBaku as $belibahanbaku => $beli)
                <option value="{{ $belibahanbaku }}">{{ $beli }} </option>
            @endforeach
        </select>

        <label for="no_faktur">No Faktur:</label>
        <input type="text" name="no_faktur" class="form-control" required>

        <label for="total_hargaitem"></label>
        <input type="number" name="total_hargaitem" id="total_hargaitem"
            value="{{ number_format($totalHargaItem, 0, ',', '.') }}" readonly hidden>

        <label for="tgl_restock">Tanggal:</label>
        <input type="date" name="tgl_restock">

        <label for="status_beli">Status Pembelian:</label>
        <select name="status_beli">
            <option value="">Status</option>
            @foreach ($dataStatusBeli as $statusbeli => $status)
                <option value="{{ $statusbeli }}">{{ $status }} </option>
            @endforeach
        </select>

        {{-- Formulir untuk detail_restock --}}
        <div id="detail-form-container">
            <hr>
            <div class="detail-form" id="detail-form-0">
                <hr>

                <label for="detail_restock[0][kode_bahanbaku]">Bahan Baku:</label>
                <select name="detail_restock[0][kode_bahanbaku]" class="form-control" required>
                    {{-- <option value="" disabled selected>--pilih--</option> --}}
                    <option value="">--pilih--</option>
                    @foreach ($dataBahanBakuTerkait as $kodeBahanBaku => $namaBahanBaku)
                        <option value="{{ $kodeBahanBaku }}">{{ $namaBahanBaku }}</option>
                    @endforeach
                </select>

                <!-- Dropdown Warna -->
                <label for="detail_restock[0][kode_warna]" class="form-label">Warna:</label>
                <select id="kode_warna" name="detail_restock[0][kode_warna]" class="form-control" required>
                    <!-- Opsi warna akan diisi oleh JavaScript -->
                </select>

                <!-- Dropdown Satuan -->
                <label for="detail_restock[0][kode_satuan]" class="form-label">Satuan:</label>
                <select id="kode_satuan" name="detail_restock[0][kode_satuan]" class="form-control" required>
                    <!-- Opsi satuan akan diisi oleh JavaScript -->
                </select>


                <label for="detail_restock[0][harga_item]">Harga Satuan Bahan Baku:</label>
                <input type="number" name="detail_restock[0][harga_item]" required min=1 class="form-control">

                <label for="detail_restock[0][jumlah_item]">Jumlah Satuan Bahan Baku:</label>
                <input type="number" name="detail_restock[0][jumlah_item]" required min=1 class="form-control">

                <label for="detail_restock[0][keterangan]" class="form-label">Keterangan:</label>
                <textarea id="keterangan" name="detail_restock[0][keterangan]" class="form-control"></textarea>


                <hr>
                <button type="button" onclick="hapusDetail(this)">Hapus</button>
            </div>
        </div>
        <hr>
        <button type="button" id="tambah-detail">Tambah Detail</button>

        <button type="submit">Simpan</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <style>
        /* Gaya umum untuk label dan input/select */
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        select,
        input[type="text"],
        input[type="number"],
        input[type="date"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
        }

        /* Gaya khusus untuk select */
        select {
            appearance: none;
            /* Hapus gaya default browser */
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: 4px;
            padding: 8px;
            cursor: pointer;
        }

        /* Gaya untuk tombol tambah detail dan tombol submit */
        #tambah-detail,
        button[type="submit"] {
            border: none;
            padding: 10px 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        #tambah-detail {
            background-color: #28a745;
            color: white;
            margin-top: 20px;
            /* Jarak atas tombol tambah detail */
        }

        #tambah-detail:hover {
            background-color: #218838;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Gaya untuk formulir detail */
        #detail-form-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            /* Jarak antar formulir */
        }

        .detail-form {
            flex: 1;
            /* Menyesuaikan formulir dengan lebar container */
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
            margin-bottom: 20px;
            /* Jarak bawah antar formulir */
        }

        .detail-form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .detail-form select,
        .detail-form input[type="text"],
        .detail-form input[type="number"],
        .detail-form input[type="date"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
        }

        .detail-form button {
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .detail-form button:hover {
            background-color: #c82333;
            /* Warna merah yang sedikit lebih tua saat diklik */
        }

        hr {
            border: 1px solid #ddd;
            margin: 20px 0;
        }
    </style>

    <script>
        $(document).ready(function() {
            // Ketika dropdown kode_belibahanbaku berubah || untuk menampilkan bahan baku
            document.querySelector('select[name="kode_belibahanbaku"]').addEventListener('change', function() {
                let selectedKodeBeliBahanBaku = this.value;

                $.ajax({
                    url: '/getBahanBakuByBelibahanbaku',
                    method: 'GET',
                    data: {
                        kode_belibahanbaku: selectedKodeBeliBahanBaku
                    },
                    success: function(response) {
                        // Perbarui dropdown kode_bahanbaku pada setiap formulir detail
                        updateBahanBakuDropdowns(response);
                    },
                    error: function() {
                        console.log('Gagal mengambil data bahan baku terkait.');
                    }
                });
            });


            // Logika JavaScript untuk menambahkan formulir detail baru
            let detailFormContainer = document.getElementById('detail-form-container');
            let tambahDetailButton = document.getElementById('tambah-detail');
            let detailFormCount = 1;


            //PADA FUNGSI INI PANGGIL FUNGSI AGAR KETIKA DILAKUKAN TAMBAH DETAIL BARU DAN MEMILIH KODE_BAHANBAKU MAKA WARNA
            tambahDetailButton.addEventListener('click', function() {
                let newDetailForm = document.querySelector('.detail-form').cloneNode(true);
                detailFormCount++;
                newDetailForm.innerHTML = newDetailForm.innerHTML.replace(/\[0\]/g, '[' + detailFormCount +
                    ']');
                detailFormContainer.appendChild(newDetailForm);

                // Pasang event listener pada dropdown kode_bahanbaku pada formulir baru
                let newKodeBahanBakuDropdown = newDetailForm.querySelector(
                    'select[name$="[kode_bahanbaku]"]');
                newKodeBahanBakuDropdown.addEventListener('change', function() {
                    let selectedKodeBahanBaku = this.value;

                    // Kirim permintaan Ajax ke server untuk mendapatkan warna
                    $.ajax({
                        url: '/getWarnaByBahanBaku/' + selectedKodeBahanBaku,
                        method: 'GET',
                        success: function(response) {
                            // Update dropdown kode_warna pada formulir detail baru
                            let kodeWarnaDropdown = newDetailForm.querySelector(
                                'select[name$="[kode_warna]"]');
                            kodeWarnaDropdown.innerHTML = '<option value="' + response
                                .kode_warna + '">' + response.nama_warna + '</option>';
                        },
                        error: function() {
                            console.log('Gagal mengambil data warna terkait.');
                        }
                    });

                    // Kirim permintaan Ajax ke server untuk mendapatkan satuan
                    $.ajax({
                        url: '/getSatuanByBahanBaku/' + selectedKodeBahanBaku,
                        method: 'GET',
                        success: function(response) {
                            // Update dropdown kode_satuan pada formulir detail baru
                            let kodeSatuanDropdown = newDetailForm.querySelector(
                                'select[name$="[kode_satuan]"]');
                            kodeSatuanDropdown.innerHTML = '<option value="' + response
                                .kode_satuan + '">' + response.nama_satuan +
                                '</option>';
                        },
                        error: function() {
                            console.log('Gagal mengambil data satuan terkait.');
                        }
                    });
                });

                // Panggil fungsi updateTotalHargaItem setiap kali menambah formulir detail baru
                updateTotalHargaItem();
            });

            // Panggil fungsi updateTotalHargaItem pada saat DOM selesai dimuat
            updateTotalHargaItem();
        });


        //INI UNTUK MENAMPILKAN WARNA DAN SATUAN SAAT KODE BAHANBAKU DIPILIH
        document.querySelector('select[name="detail_restock[0][kode_bahanbaku]"]').addEventListener('change', function() {
            let selectedKodeBahanBaku = this.value;

            // Kirim permintaan Ajax ke server untuk mendapatkan warna
            $.ajax({
                url: '/getWarnaByBahanBaku/' + selectedKodeBahanBaku,
                method: 'GET',
                success: function(response) {
                    // Update dropdown kode_warna pada formulir detail
                    let kodeWarnaDropdown = document.querySelector(
                        'select[name="detail_restock[0][kode_warna]"]');
                    kodeWarnaDropdown.innerHTML = '<option value="' + response.kode_warna + '">' +
                        response.nama_warna + '</option>';
                },
                error: function() {
                    console.log('Gagal mengambil data warna terkait.');
                }
            });

            // Kirim permintaan Ajax ke server untuk mendapatkan satuan
            $.ajax({
                url: '/getSatuanByBahanBaku/' + selectedKodeBahanBaku,
                method: 'GET',
                success: function(response) {
                    // Update dropdown kode_satuan pada formulir detail
                    let kodeSatuanDropdown = document.querySelector(
                        'select[name="detail_restock[0][kode_satuan]"]');
                    kodeSatuanDropdown.innerHTML = '<option value="' + response.kode_satuan + '">' +
                        response.nama_satuan + '</option>';
                },
                error: function() {
                    console.log('Gagal mengambil data satuan terkait.');
                }
            });
        });


        function updateBahanBakuDropdowns(response) {
            let detailForms = document.querySelectorAll('.detail-form');

            detailForms.forEach(function(detailForm) {
                let kodeBahanBakuDropdown = detailForm.querySelector('select[name$="[kode_bahanbaku]"]');
                kodeBahanBakuDropdown.innerHTML = ''; // Hapus opsi yang ada

                // Tambahkan opsi "pilih"
                kodeBahanBakuDropdown.options.add(new Option('--pilih--', ''));

                // Cek apakah response memiliki kode_bahanbaku
                if (Object.keys(response).length > 0) {
                    // Jika lebih dari satu kode_bahanbaku, tambahkan semua opsi
                    for (let kodeBahanBaku in response) {
                        kodeBahanBakuDropdown.options.add(new Option(response[kodeBahanBaku], kodeBahanBaku));
                    }

                    // Panggil fungsi untuk menampilkan warna dan satuan jika ada kode_bahanbaku
                    handleBahanBakuChange(detailForm, kodeBahanBakuDropdown.value);
                }
            });
        }


        // Fungsi untuk menghapus formulir detail
        function hapusDetail(element) {
            if (confirm('Apakah Anda yakin ingin menghapus detail ini?')) {
                element.closest('.detail-form').remove();

                // Panggil fungsi updateTotalHargaItem setiap kali menambah atau menghapus detail
                updateTotalHargaItem();
            }
        }

        // Fungsi untuk menghitung dan mengupdate total_hargaitem
        function updateTotalHargaItem() {
            let totalHargaItem = 0;

            // Ambil semua formulir detail
            let detailForms = document.querySelectorAll('.detail-form');

            detailForms.forEach(function(detailForm) {
                let hargaItem = parseFloat(detailForm.querySelector('input[name$="[harga_item]"]').value) || 0;
                let jumlahItem = parseFloat(detailForm.querySelector('input[name$="[jumlah_item]"]').value) || 0;

                totalHargaItem += hargaItem * jumlahItem;
            });

            // Update nilai total_hargaitem pada input
            document.querySelector('input[name="total_hargaitem"]').value = totalHargaItem;
            console.log('Total Harga Item:', totalHargaItem);
        }

        // Tambahan event listener pada input jumlah_item
        document.querySelector('input[name="detail_restock[0][jumlah_item]"]').addEventListener('input', function() {
            updateTotalHargaItem();
        });

        // Tambahan event listener pada input harga_item
        document.querySelector('input[name="detail_restock[0][harga_item]"]').addEventListener('input', function() {
            updateTotalHargaItem();
        });

        // Event listener pada container yang ada seluruh formulir detail
        document.getElementById('detail-form-container').addEventListener('input', function(event) {
            if (event.target.matches('input[name$="[jumlah_item]"], input[name$="[harga_item]"]')) {
                updateTotalHargaItem();
            }
        });



        document.getElementById('tambah-detail').addEventListener('click', function() {
            updateTotalHargaItem();
        });
    </script>
@endsection
