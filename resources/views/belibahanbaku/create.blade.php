@extends('layouts.master')

@section('title1')
    Form pembelian Bahan Baku
@endsection

@section('title2')
    Form Pembelian Bahan Baku
@endsection

@section('main')
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $item)
                <li>{{ $item }}</li>
            @endforeach
        </div>
    @endif
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                {{-- FORM PEMBELIAN BAHAN BAKU --}}
            </div>
            <div class="card-body">
                <form action="{{ route('belibahanbaku.store') }}" method="post">
                    @csrf

                    <div class="mb-3 form-background-gray">
                        <label for="total_jumlahbeli" class="form-label" hidden>Total Jumlah Beli:</label>
                        <input type="text" name="total_jumlahbeli" value="{{ $totalJumlahBeli }}" readonly
                            class="form-control" hidden>
                    </div>
                    <option value="">PEMBELIAN</option>
                    <div class="mb-3 form-background-gray">
                        <label for="tgl_beli" class="form-label">Tanggal:</label>
                        <input type="date" name="tgl_beli" class="form-control" required>
                    </div>

                    <div class="mb-3 form-background-gray">
                        <label for="status_beli" class="form-label">Status Pembelian:</label>
                        <select name="status_beli" class="form-control">
                            <option value="">--pilih--</option>
                            @foreach ($dataStatusBeli as $statusbeli => $status)
                                <option value="{{ $statusbeli }}">{{ $status }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Formulir untuk detail_belibahanbakus --}}
                    <div id="detail-form-container" class="mb-3">
                        <hr>
                        <div class="detail-form">
                            <hr>
                            <label for="detail_beli[0][kode_bahanbaku]" class="form-label">Bahan Baku:</label>
                            <select name="detail_beli[0][kode_bahanbaku]" id="selectBahanBaku" class="form-control"
                                required>
                                <option value="">--pilih--</option>
                                @foreach ($dataBahanBaku as $kodeBahanBaku => $namaBahanBaku)
                                    <option value="{{ $kodeBahanBaku }}" data-kode="{{ $kodeBahanBaku }}">
                                        {{ $namaBahanBaku }}</option>
                                @endforeach
                            </select>

                            <!-- Dropdown Warna -->
                            <label for="detail_beli[0][kode_warna]" class="form-label">Warna:</label>
                            <select class="selectWarna form-control" name="detail_beli[0][kode_warna]" required>
                                <!-- Opsi warna akan diisi oleh JavaScript -->
                            </select>

                            <!-- Dropdown Satuan -->
                            <label for="detail_beli[0][kode_satuan]" class="form-label">Satuan:</label>
                            <select class="selectSatuan form-control" name="detail_beli[0][kode_satuan]" required>
                                <!-- Opsi satuan akan diisi oleh JavaScript -->
                            </select>

                            <label for="detail_beli[0][jumlah_beli]" class="form-label">Jumlah Bahan Baku:</label>
                            <input type="number" id="jumlah_beli" name="detail_beli[0][jumlah_beli]" required
                                min="1" class="form-control">


                            <label for="detail_beli[0][keterangan]" class="form-label">Keterangan:</label>
                            <textarea id="keterangan" name="detail_beli[0][keterangan]" class="form-control"></textarea>

                            <hr>
                            <button type="button" onclick="hapusDetail(this)" class="btn btn-danger">Hapus</button>
                        </div>
                    </div>
                    <hr>
                    <button type="button" id="tambah-detail" class="btn btn-success">Tambah Detail</button>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <style>
        /* Gaya untuk latar belakang elemen formulir */
        .form-background-gray {
            background-color: #f0f0f0;
            /* Warna abu-abu */
            padding: 10px;
            /* Sesuaikan sesuai kebutuhan */
            border-radius: 8px;
            /* Untuk memberi sudut elemen formulir */
        }
    </style>

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

                // Setelah menambah formulir baru
                newDetailForm.querySelector('.selectWarna').id = 'selectWarna' + detailFormCount;
                newDetailForm.querySelector('.selectSatuan').id = 'selectSatuan' + detailFormCount;

                // Panggil fungsi updateTotalJumlahBeli setiap kali menambah atau menghapus detail
                updateTotalJumlahBeli();
            });

            //Selanjutnya untuk update warna dan satuan berdasarkan kode_bahan baku
            document.getElementById('selectBahanBaku').addEventListener('change', function() {
                updateInfoWarnaSatuan();
            });

            // Event listener untuk container yang ada seluruh formulir detail
            document.getElementById('detail-form-container').addEventListener('change', function(event) {
                if (event.target.matches('select[name^="detail_beli"][name$="[kode_bahanbaku]"]')) {
                    updateInfoWarnaSatuan(event);
                }
            });

            // Panggil fungsi updateTotalJumlahBeli pada saat DOM selesai dimuat
            updateTotalJumlahBeli();
        });


        function hapusDetail(element) {
            if (confirm('Apakah Anda yakin ingin menghapus detail ini?')) {
                element.closest('.detail-form').remove();

                // Panggil fungsi updateTotalJumlahBeli setiap kali menambah atau menghapus detail
                updateTotalJumlahBeli();
            }
        }

        // Fungsi untuk menghitung dan mengupdate total_jumlahbeli
        function updateTotalJumlahBeli() {
            let totalJumlahBeli = 0;
            let jumlahInputs = document.getElementsByName('detail_beli[][jumlah_beli]');

            jumlahInputs.forEach(function(input) {
                totalJumlahBeli += parseFloat(input.value) || 0;
                // Validasi agar jumlah beli minimal 1
                if (jumlahBeli < 1) {
                    alert('Jumlah beli minimal 1');
                    input.value = 1; // Setel nilai menjadi minimal 1
                    jumlahBeli = 1;
                }
                totalJumlahBeli += jumlahBeli;
            });

            document.getElementsByName('total_jumlahbeli')[0].value = totalJumlahBeli;
        }
        document.getElementById('tambah-detail').addEventListener('click', function() {
            updateTotalJumlahBeli();
        });

        function updateInfoWarnaSatuan(event) {
            let selectBahanBaku;
            if (event) {
                selectBahanBaku = event.target;
            } else {
                // Jika event tidak ada (pemanggilan langsung), gunakan elemen pertama
                selectBahanBaku = document.getElementById('selectBahanBaku');
            }

            let kodeBahanBaku = selectBahanBaku.value;
            let kodeBahanBakuData = selectBahanBaku.options[selectBahanBaku.selectedIndex].dataset.kode;

            // Temukan elemen formulir terkait
            let detailForm = selectBahanBaku.closest('.detail-form');

            fetch(`/get-info-warnasatuan/${kodeBahanBakuData}`)
                .then(response => {
                    if (!response.ok) throw new Error('Network response was not ok');
                    return response.json();
                })
                .then(data => {
                    console.log('Received data:', data);

                    // Update nilai warna dan satuan
                    let selectWarna = detailForm.querySelector('.selectWarna');
                    let selectSatuan = detailForm.querySelector('.selectSatuan');

                    selectWarna.innerHTML = `<option value="${data.kodeWarna}">${data.namaWarna}</option>`;
                    selectSatuan.innerHTML = `<option value="${data.kodeSatuan}">${data.namaSatuan}</option>`;
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
@endsection
