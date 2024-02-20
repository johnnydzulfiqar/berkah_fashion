<?php

use App\Http\Controllers\BeliBahanBakuController;
use App\Http\Controllers\DataBahanBakuController;
use App\Http\Controllers\DataProdukController;
use App\Http\Controllers\DataSatuanController;
use App\Http\Controllers\DataStatusUpahController;
use App\Http\Controllers\DataUkuranController;
use App\Http\Controllers\DataUpahController;
use App\Http\Controllers\DataWarnaController;
use App\Http\Controllers\DetailBeliBahanBakuController;
use App\Http\Controllers\HasilKerjaPegawaiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanDataProduksiPakaian;
use App\Http\Controllers\LaporanPembelianController;
use App\Http\Controllers\LaporanProduksiController;
use App\Http\Controllers\LaporanRestockController;
use App\Http\Controllers\LaporanStokBahanBakuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManajemenUserController;
use App\Http\Controllers\ProductionReportController;
use App\Http\Controllers\ProduksiPakaianController;
use App\Http\Controllers\ProduksiPakaianJahitController;
use App\Http\Controllers\ProduksiPakaianPackingController;
use App\Http\Controllers\ProfilControllerr;
use App\Http\Controllers\RencanaProduksiController;
use App\Http\Controllers\RestockController;
use App\Http\Controllers\StatusBeliController;
use App\Http\Controllers\StatusProduksiController;
use App\Http\Controllers\StokBahanBakuController;
use App\Models\DataStatusUpah;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

    //Route::get('/', function () {
    //return view('admin.home');
    //});

    Route::get('/home',function(){
        return redirect('/admin/home');
    });
    
    //Jika sudah login dan belum logout maka tidak bisa mengakses halaman login
    Route::middleware('guest')->group(function(){
    //Halaman loginnya
    Route::get('/', [LoginController::class, 'index'])->name('login');
    //Proses memasukan data loginnya
    Route::post('/user/login', [LoginController::class, 'login'])->name('user.login');
    });

    
//Admin dan logout hanya bisa jalan jika sudah login
Route::middleware('auth')->group(function(){
    //logout
    Route::get('/logout',[LoginController::class,'logout'])->name('user.logout');
    //Home/dashboard
    Route::get('/admin/home',[HomeController::class,'index'])->name('admin.home');
    Route::get('/admin/pemilik',[HomeController::class,'pemilik'])->name('pemilik.home')->middleware('userAkses:pemilik');
    Route::get('/admin/cutting',[HomeController::class,'cutting'])->name('cutting.home')->middleware('userAkses:cutting');
    Route::get('/admin/jahit',[HomeController::class,'jahit'])->name('jahit.home')->middleware('userAkses:jahit');
    Route::get('/admin/packing',[HomeController::class,'packing'])->name('packing.home')->middleware('userAkses:packing');

    //Manajemen User
    Route::get('/lihat_pengguna', [ManajemenUserController::class, 'index'])->name('lihat-pengguna.index');
    Route::get('/tambah_pengguna', [ManajemenUserController::class, 'tambahPenggunaForm'])->name('tambah_pengguna_form');
    Route::post('/simpan_pengguna', [ManajemenUserController::class, 'simpanPengguna'])->name('simpan_pengguna');
    Route::get('/edit_pengguna/{user}', [ManajemenUserController::class, 'edit'])->name('edit_pengguna');
    Route::put('/update_pengguna/{user}', [ManajemenUserController::class, 'update'])->name('update_pengguna');
    Route::delete('/hapus_pengguna/{user}', [ManajemenUserController::class, 'destroy'])->name('hapus_pengguna');
    
    //Profil
    Route::get('/profil', [ProfilControllerr::class, 'show'])->name('profil.show');

    //Ukuran
    Route::get('/ukuran/index', [DataUkuranController::class, 'index'])->name('ukuran.index');
    Route::resource('/ukuran', DataUkuranController::class);
    Route::get('/tambahukuran',[DataUkuranController::class,'tambahukuran'])->name('tambahukuran');
    Route::post('/insertukuran',[DataUkuranController::class,'insertukuran'])->name('insertukuran');
    Route::get('/editukuran/{kode_ukuran}',[DataUkuranController::class,'editukuran'])->name('editukuran');
    Route::post('/updateukuran/{kode_ukuran}',[DataUkuranController::class,'updateukuran'])->name('updateukuran');
    Route::get('/deleteukuran/{kode_ukuran}',[DataUkuranController::class,'deleteukuran'])->name('deleteukuran');

    //Satuan
    Route::get('/satuan/index', [DataSatuanController::class, 'index'])->name('satuan.index');
    Route::resource('/satuan', DataSatuanController::class);
    Route::get('/tambahsatuan',[DatasatuanController::class,'tambahsatuan'])->name('tambahsatuan');
    Route::post('/insertsatuan',[DatasatuanController::class,'insertsatuan'])->name('insertsatuan');
    Route::get('/editsatuan/{kode_satuan}',[DatasatuanController::class,'editsatuan'])->name('editsatuan');
    Route::post('/updatesatuan/{kode_satuan}',[DatasatuanController::class,'updatesatuan'])->name('updatesatuan');
    Route::get('/deletesatuan/{kode_satuan}',[DatasatuanController::class,'deletesatuan'])->name('deletesatuan');

    //Warna
    Route::get('/warna/index', [DataWarnaController::class, 'index'])->name('warna.index');
    Route::resource('/warna', DataWarnaController::class);
    Route::get('/tambahwarna',[DatawarnaController::class,'tambahwarna'])->name('tambahwarna');
    Route::post('/insertwarna',[DatawarnaController::class,'insertwarna'])->name('insertwarna');
    Route::get('/editwarna/{kode_warna}',[DatawarnaController::class,'editwarna'])->name('editwarna');
    Route::post('/updatewarna/{kode_warna}',[DatawarnaController::class,'updatewarna'])->name('updatewarna');
    Route::get('/deletewarna/{kode_warna}',[DatawarnaController::class,'deletewarna'])->name('deletewarna');

    //Produk
    Route::get('/produk/index', [DataProdukController::class, 'index'])->name('produk.index');
    Route::resource('/produk', DataProdukController::class);
    Route::get('/tambahproduk',[DataprodukController::class,'tambahproduk'])->name('tambahproduk');
    Route::post('/insertproduk',[DataprodukController::class,'insertproduk'])->name('insertproduk');
    Route::get('/editproduk/{kode_produk}',[DataprodukController::class,'editproduk'])->name('editproduk');
    Route::post('/updateproduk/{kode_produk}',[DataprodukController::class,'updateproduk'])->name('updateproduk');
    Route::get('/deleteproduk/{kode_produk}',[DataprodukController::class,'deleteproduk'])->name('deleteproduk');

    //Bahan Baku
    Route::get('/bahanbaku/index', [DataBahanBakuController::class, 'index'])->name('bahanbaku.index');
    Route::resource('/bahan_baku', DataBahanBakuController::class);
    Route::get('/tambahbahanbaku',[DatabahanbakuController::class,'tambahbahanbaku'])->name('tambahbahanbaku');
    Route::post('/insertbahanbaku',[DatabahanbakuController::class,'insertbahanbaku'])->name('insertbahanbaku');
    Route::get('/editbahanbaku/{kode_bahanbaku}',[DatabahanbakuController::class,'editbahanbaku'])->name('editbahanbaku');
    Route::post('/updatebahanbaku/{kode_bahanbaku}',[DatabahanbakuController::class,'updatebahanbaku'])->name('updatebahanbaku');
    Route::get('/deletebahanbaku/{kode_bahanbaku}',[DatabahanbakuController::class,'deletebahanbaku'])->name('deletebahanbaku');

    //Status Produksi
    Route::get('/status-produksi/index', [StatusProduksiController::class, 'index'])->name('status-produksi.index');
    Route::post('/status-produksi/insert', [StatusProduksiController::class, 'insert'])->name('insert-status-produksi');
    Route::get('/status-produksi/edit/{kode_statusproduksi}', [StatusProduksiController::class, 'edit'])->name('edit-status-produksi');
    Route::get('/status-produksi/create', [StatusProduksiController::class, 'create'])->name('create-status-produksi');
    Route::post('/status-produksi/update/{kode_statusproduksi}', [StatusProduksiController::class, 'update'])->name('update-status-produksi');
    Route::get('/delete-status-produksi/{kode_statusproduksi}', [StatusProduksiController::class, 'delete'])->name('delete-status-produksi');

    
    // Status beli
    Route::get('/status-beli/index', [StatusBeliController::class, 'index'])->name('status-beli.index');
    Route::resource('/status-beli', StatusBeliController::class)->except(['create']);
    Route::post('/status-beli/insert', [StatusBeliController::class, 'insert'])->name('insert-status-beli');
    Route::get('/status-beli/edit/{kode_statusbeli}', [StatusBeliController::class, 'edit'])->name('edit-status-beli');
    Route::get('/status-beli-create', [StatusBeliController::class, 'create'])->name('create-status-beli');
    Route::post('/status-beli/update/{kode_statusbeli}', [StatusBeliController::class, 'update'])->name('update-status-beli');
    Route::get('/delete-status-beli/{kode_statusbeli}', [StatusBeliController::class, 'delete'])->name('delete-status-beli');

    //Status Upah || TIDAK DIPAKAI
    Route::get('/status-upah/index', [DataStatusUpahController::class, 'index'])->name('status-upah.index');
    Route::post('/status-upah/insert', [DataStatusUpahController::class, 'insert'])->name('insert-status-upah');
    Route::get('/status-upah/edit/{kode_statusupah}', [DataStatusUpahController::class, 'edit'])->name('edit-status-upah');
    Route::get('/status-upah/create', [DataStatusUpahController::class, 'create'])->name('create-status-upah');
    Route::post('/status-upah/update/{kode_statusupah}', [DataStatusUpahController::class, 'update'])->name('update-status-upah');
    Route::get('/delete-status-upah/{kode_statusupah}', [DataStatusUpahController::class, 'delete'])->name('delete-status-upah');

    //Beli Bahan Baku
    Route::get('/belibahanbaku', [BeliBahanBakuController::class, 'index'])->name('belibahanbaku.index');
    Route::get('/belibahanbaku/create', [BeliBahanBakuController::class, 'create'])->name('belibahanbaku.create');
    Route::post('/belibahanbaku', [BeliBahanBakuController::class, 'store'])->name('belibahanbaku.store');
    Route::get('/belibahanbaku/{beliBahanBaku}', [BeliBahanBakuController::class, 'show'])->name('belibahanbaku.show');
    Route::get('/belibahanbaku/{beliBahanBaku}/edit', [BeliBahanBakuController::class, 'edit'])->name('belibahanbaku.edit');
    Route::put('/belibahanbaku/{beliBahanBaku}', [BeliBahanBakuController::class, 'update'])->name('belibahanbaku.update');
    Route::delete('/belibahanbaku/{beliBahanBaku}', [BeliBahanBakuController::class, 'destroy'])->name('belibahanbaku.destroy');
    Route::get('/belibahanbaku/{beliBahanBaku}', [BeliBahanBakuController::class, 'getDataForPrint'])->name('belibahanbaku.print');
    Route::get('/get-info-warnasatuan/{kodeBahanBakuData}', [BeliBahanBakuController::class, 'getInfoWarnaSatuan'])->name('get-info-warnasatuan');
   
   
    //Detail Beli Bahan Baku || Tidak Digunakan
    Route::get('/detailbelibahanbaku', [DetailBeliBahanBakuController::class, 'index']);
    Route::get('/detailbelibahanbaku/create', [DetailBeliBahanBakuController::class, 'create']);
    Route::post('/detailbelibahanbaku', [DetailBeliBahanBakuController::class, 'store']);
    Route::get('/detailbelibahanbaku/{detailBeliBahanBaku}', [DetailBeliBahanBakuController::class, 'show']);
    Route::get('/detailbelibahanbaku/{detailBeliBahanBaku}/edit', [DetailBeliBahanBakuController::class, 'edit']);
    Route::put('/detailbelibahanbaku/{detailBeliBahanBaku}', [DetailBeliBahanBakuController::class, 'update']);
    Route::delete('/detailbelibahanbaku/{detailBeliBahanBaku}', [DetailBeliBahanBakuController::class, 'destroy']);

    
    //Restock
    Route::get('/restocks', [RestockController::class, 'index'])->name('restocks.index');
    Route::get('/restocks/create', [RestockController::class, 'create'])->name('restocks.create');
    Route::post('/restocks', [RestockController::class, 'store'])->name('restocks.store');
    Route::get('/restocks/{restock}', [RestockController::class, 'show'])->name('restocks.show');
    Route::get('/restocks/{restock}/edit', [RestockController::class, 'edit'])->name('restocks.edit');
    Route::put('/restocks/{restock}', [RestockController::class, 'update'])->name('restocks.update');
    Route::delete('/restocks/{restock}', [RestockController::class, 'destroy'])->name('restocks.destroy');
    Route::get('/getBahanBakuByBelibahanbaku', [RestockController::class, 'getBahanBakuByBelibahanbaku']);
    Route::get('/restocks/{restock}/print', [RestockController::class, 'getDataForPrint'])->name('restocks.print');
    Route::get('/getWarnaByBahanBaku/{kode_bahanbaku}', [RestockController::class, 'getWarnaByBahanBaku']);
    Route::get('/getSatuanByBahanBaku/{kode_bahanbaku}', [RestockController::class, 'getSatuanByBahanBaku']);


    // Stok Bahan Baku || TIDAK DIPAKAI
    Route::get('/stokbahanbaku', [StokBahanBakuController::class, 'index'])->name('stokbahanbaku.index');
    Route::get('/stokbahanbaku/create', [StokBahanBakuController::class, 'create'])->name('stokbahanbaku.create');
    Route::post('/stokbahanbaku', [StokBahanBakuController::class, 'store'])->name('stokbahanbaku.store');
    Route::get('/stokbahanbaku/{stokBahanBaku}', [StokBahanBakuController::class, 'show'])->name('stokbahanbaku.show');
    Route::get('/stokbahanbaku/{stokBahanBaku}/edit', [StokBahanBakuController::class, 'edit'])->name('stokbahanbaku.edit');
    Route::put('/stokbahanbaku/{stokBahanBaku}', [StokBahanBakuController::class, 'update'])->name('stokbahanbaku.update');
    Route::delete('/stokbahanbaku/{stokBahanBaku}', [StokBahanBakuController::class, 'destroy'])->name('stokbahanbaku.destroy');


    //Rencana Produksi
    Route::get('/rencana-produksi', [RencanaProduksiController::class, 'index'])->name('rencana-produksi.index');
    Route::get('/rencana-produksi/create', [RencanaProduksiController::class, 'create'])->name('rencana-produksi.create');
    Route::post('/rencana-produksi', [RencanaProduksiController::class, 'store'])->name('rencana-produksi.store');
    Route::get('/rencana-produksi/{rencanaProduksi}', [RencanaProduksiController::class, 'show'])->name('rencana-produksi.show');
    Route::get('/rencana-produksi/{rencanaProduksi}/edit', [RencanaProduksiController::class, 'edit'])->name('rencana-produksi.edit');
    Route::put('/rencana-produksi/{rencanaProduksi}', [RencanaProduksiController::class, 'update'])->name('rencana-produksi.update');
    Route::delete('/rencana-produksi/{rencanaProduksi}', [RencanaProduksiController::class, 'destroy'])->name('rencana-produksi.destroy');
    Route::get('/get-info-bahanbaku/{kodeBahanbaku}', [RencanaProduksiController::class, 'getInfoBahanBaku'])->name('get-info-bahanbaku');
    Route::get('/get-info-produk/{kodeProduk}', [RencanaProduksiController::class, 'getInfoProduk'])->name('get-info-produk');
    Route::get('/rencana-produksi/{rencanaproduksi}/print', [RencanaProduksiController::class, 'getDataForPrint'])->name('rencana-produksi.print');


    //Produksi Pakaian cutting
    Route::get('/produksi-pakaian', [ProduksiPakaianController::class, 'index'])->name('produksi-pakaian.index');
    Route::get('/produksi-pakaian/create', [ProduksiPakaianController::class, 'create'])->name('produksi-pakaian.create');
    Route::post('/produksi-pakaian', [ProduksiPakaianController::class, 'store'])->name('produksi-pakaian.store');
    Route::get('/produksi-pakaian/{produksi-pakaian}', [ProduksiPakaianController::class, 'show'])->name('produksi-pakaian.show');
    Route::get('/produksi-pakaian/{produksi-pakaian}/edit', [ProduksiPakaianController::class, 'edit'])->name('produksi-pakaian.edit');
    Route::put('/produksi-pakaian/{produksi-pakaian}', [ProduksiPakaianController::class, 'update'])->name('produksi-pakaian.update');
    Route::delete('/produksi-pakaian/{produksi-pakaian}', [ProduksiPakaianController::class, 'destroy'])->name('produksi-pakaian.destroy');
    Route::get('/getRencanaProduksiDataCutting/{kode_rencanaproduksi}', [ProduksiPakaianController::class, 'getRencanaProduksiData'])->name('produksi-pakaian.getRencanaProduksiData');
    Route::get('/produksi-pakaian/{produksi-pakaian}/print', [ProduksiPakaianController::class, 'getDataForPrint'])->name('produksi-pakaian.print');
    Route::get('/laporan-produksi-cutting/cetak', [ProduksiPakaianController::class, 'cetak'])->name('produksi-cutting.cetak');
    Route::get('/laporan-produksi-cutting/detail/{kode_produksipakaian_cutting}', [ProduksiPakaianController::class, 'detail'])->name('produksi-cutting.detail');


    //Produksi Pakaian Jahit
    Route::get('/produksi-pakaian-jahit', [ProduksiPakaianJahitController::class, 'index'])->name('produksi-pakaian-jahit.index');
    Route::get('/produksi-pakaian-jahit/create', [ProduksiPakaianJahitController::class, 'create'])->name('produksi-pakaian-jahit.create');
    Route::post('/produksi-pakaian-jahit', [ProduksiPakaianJahitController::class, 'store'])->name('produksi-pakaian-jahit.store');
    Route::get('/produksi-pakaian-jahit/{produksi-pakaian-jahit}', [ProduksiPakaianJahitController::class, 'show'])->name('produksi-pakaian-jahit.show');
    Route::get('/produksi-pakaian-jahit/{produksi-pakaian-jahit}/edit', [ProduksiPakaianJahitController::class, 'edit'])->name('produksi-pakaian-jahit.edit');
    Route::put('/produksi-pakaian-jahit/{produksi-pakaian-jahit}', [ProduksiPakaianJahitController::class, 'update'])->name('produksi-pakaian-jahit.update');
    Route::delete('/produksi-pakaian-jahit/{produksi-pakaian-jahit}', [ProduksiPakaianJahitController::class, 'destroy'])->name('produksi-pakaian-jahit.destroy');
    Route::get('/getRencanaProduksiDataJahit/{kode_rencanaproduksi}', [ProduksiPakaianJahitController::class, 'getRencanaProduksiData'])->name('produksi-pakaian-jahit.getRencanaProduksiData');
    Route::get('/produksi-pakaian-jahit/{produksi-pakaian-jahit}/print', [ProduksiPakaianJahitController::class, 'getDataForPrint'])->name('produksi-pakaian-jahit.print');
    Route::get('/laporan-produksi-jahit/cetak', [ProduksiPakaianJahitController::class, 'cetak'])->name('produksi-jahit.cetak');
    Route::get('/laporan-produksi-jahit/detail/{kode_produksipakaian_jahit}', [ProduksiPakaianJahitController::class, 'detail'])->name('produksi-jahit.detail');


    //Produksi Pakaian Packing
    Route::get('/produksi-pakaian-packing', [ProduksiPakaianPackingController::class, 'index'])->name('produksi-pakaian-packing.index');
    Route::get('/produksi-pakaian-packing/create', [ProduksiPakaianPackingController::class, 'create'])->name('produksi-pakaian-packing.create');
    Route::post('/produksi-pakaian-packing', [ProduksiPakaianPackingController::class, 'store'])->name('produksi-pakaian-packing.store');
    Route::get('/produksi-pakaian-packing/{produksi-pakaian-packing}', [ProduksiPakaianPackingController::class, 'show'])->name('produksi-pakaian-packing.show');
    Route::get('/produksi-pakaian-packing/{produksi-pakaian-packing}/edit', [ProduksiPakaianPackingController::class, 'edit'])->name('produksi-pakaian-packing.edit');
    Route::put('/produksi-pakaian-packing/{produksi-pakaian-packing}', [ProduksiPakaianPackingController::class, 'update'])->name('produksi-pakaian-packing.update');
    Route::delete('/produksi-pakaian-packing/{produksi-pakaian-packing}', [ProduksiPakaianPackingController::class, 'destroy'])->name('produksi-pakaian-packing.destroy');
    Route::get('/getRencanaProduksiDataPacking/{kode_rencanaproduksi}', [ProduksiPakaianPackingController::class, 'getRencanaProduksiData'])->name('produksi-pakaian-packing.getRencanaProduksiData');
    Route::get('/produksi-pakaian-packing/{produksi-pakaian-packing}/print', [ProduksiPakaianPackingController::class, 'getDataForPrint'])->name('produksi-pakaian-packing.print');
    Route::get('/laporan-produksi-packing/cetak', [ProduksiPakaianPackingController::class, 'cetak'])->name('produksi-packing.cetak');
    Route::get('/laporan-produksi-packing/detail/{kode_produksipakaian_packing}', [ProduksiPakaianPackingController::class, 'detail'])->name('produksi-packing.detail');


    //Laporan Produksi
    Route::get('/laporan-produksi', [LaporanProduksiController::class, 'index'])->name('laporan-produksi.index');
    Route::get('/laporan-produksi/filter', [LaporanProduksiController::class, 'filter'])->name('laporan-produksi.filter');
    Route::get('/laporan-produksi/cetak', [LaporanProduksiController::class, 'cetak'])->name('laporan-produksi.cetak');

    //Laporan Pembelian
    Route::get('/laporan-pembelian', [LaporanPembelianController::class, 'index'])->name('laporan-pembelian.index');
    Route::get('/filter', [LaporanPembelianController::class, 'filter'])->name('laporan-pembelian.filter');
    Route::get('/cetak', [LaporanPembelianController::class, 'cetak'])->name('laporan-pembelian.cetak');

    //Laporan Restock
    Route::get('/laporan-restock', [LaporanRestockController::class, 'index'])->name('laporan-restock.index');
    Route::get('/laporan-restock/filter', [LaporanRestockController::class, 'filter'])->name('laporan-restock.filter');
    Route::get('/laporan-restock/cetak', [LaporanRestockController::class, 'cetak'])->name('laporan-restock.cetak');

     //Laporan stokbahanbaku //INI HARUS DIUBAH LAGI //ATAU JANGAN DIMASUKIN JUGA GPP
     //SEBENARNYA INI MENGGUNAKAN TABEL DATA BAHAN BAKU BUKAN TABEL STOK BAHAN BAKU
    Route::get('/laporan-stokbahanbaku', [LaporanStokBahanBakuController::class, 'index'])->name('laporan-stokbahanbaku.index');
    Route::get('/laporan-stokbahanbaku/cetak', [LaporanStokBahanBakuController::class, 'cetak'])->name('laporan-stokbahanbaku.cetak');

    //LAPORAN DATA PRODUKSI PAKAIAN
    Route::get('/laporan-dataproduksi-pakaian', [LaporanDataProduksiPakaian::class, 'index'])->name('laporan-dataproduksi-pakaian.index');
    Route::get('/laporan-dataproduksi-pakaian/cetak', [LaporanDataProduksiPakaian::class, 'cetak'])->name('laporan-dataproduksi-pakaian.cetak');

});