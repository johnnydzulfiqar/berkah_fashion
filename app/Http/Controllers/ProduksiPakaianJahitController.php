<?php

namespace App\Http\Controllers;

use App\Models\DataStatusUpah;
use App\Models\DetailProduksiPakaianJahit;
use App\Models\DetailProduksiPakaianPacking;
use App\Models\ProduksiPakaian;
use App\Models\ProduksiPakaianJahit;
use App\Models\ProduksiPakaianPacking;
use App\Models\RencanaProduksi;
use App\Models\StatusProduksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;  // Add this line
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ProduksiPakaianJahitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataProduksiPakaianJahit = ProduksiPakaianJahit::orderBy('created_at','desc')->get();
        $dataDetailProduksiPakaianJahit = DetailProduksiPakaianJahit::orderBy('created_at','desc')->get();
        return view('produksi-pakaian-jahit.index',compact('dataProduksiPakaianJahit','dataDetailProduksiPakaianJahit'));   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Ambil data dari tabel RencanaProduksi Melalui Tabel ProduksiPakaianCutting agar pengerjaannya berurutan
        $dataRencanaProduksis = RencanaProduksi::with('R_ProduksiPakaianCutting')->where('status_produksi','=',1)->pluck('kode_rencanaproduksi','kode_rencanaproduksi');
        $dataStatusProduksi = StatusProduksi::all()->pluck('status_produksi');
        $sekarang = Carbon::now();
        return view('produksi-pakaian-jahit.create', compact('sekarang', 'dataRencanaProduksis', 'dataStatusProduksi'));
    }

    public function getRencanaProduksiData($kodeRencanaProduksi)
    {
        // Ambil data rencana produksi berdasarkan kode_rencanaproduksi
        $rencanaProduksi = RencanaProduksi::where('kode_rencanaproduksi', $kodeRencanaProduksi)->first();
        
        
        // Hitung total produksi pakaian (jumlah total_berhasildangagal di tabel DetailProduksiPakaianJahit)
        $totalProduksiPakaian = DetailProduksiPakaianJahit::where('kode_rencanaproduksi', $kodeRencanaProduksi)
            ->sum('total_berhasildangagal');

        //Ambil Total Berhasil Dari Bagian Cutting Untuk menjadi patokan
        $patokanJumlahProduksi = ProduksiPakaian::where('kode_rencanaproduksi', $kodeRencanaProduksi)->pluck('total_jumlahberhasil')->first();

        if ($rencanaProduksi) {
            // Kirim data dalam format JSON
            return response()->json([
                'data' => [
                    'kode_produk' => $rencanaProduksi->R_KeProduk->nama_produk,
                    'jumlah_rencanaproduksi' => $rencanaProduksi->jumlah_rencanaproduksi,
                    'tanggal_awal' => $rencanaProduksi->tgl_awal,
                    'biaya_cutting' => $rencanaProduksi->biaya_cutting,
                    'biaya_jahit' => $rencanaProduksi->biaya_jahit,
                    'biaya_packing' => $rencanaProduksi->biaya_packing,
                    'kode_warnaproduk' => $rencanaProduksi->R_KeWarna->nama_warna,
                    'kode_ukuranproduk' => $rencanaProduksi->R_KeUkuran->nama_ukuran,
                    'total_produksi_pakaian' => $totalProduksiPakaian,
                    'total_berhasil_daricutting' => $patokanJumlahProduksi,
                ],
            ]);
        } else {
            // Kirim respons error jika data tidak ditemukan
            return response()->json([
                'error' => 'Data Rencana Produksi tidak ditemukan',
            ], 404);
        }
    }

    public function getProduksiPakaianData($kodeRencanaProduksi)
    {
        // Ambil data produksi pakaian berdasarkan kode_rencanaproduksi
        $produksiPakaian = ProduksiPakaianJahit::where('kode_rencanaproduksi', $kodeRencanaProduksi)->first();
    
        if ($produksiPakaian) {
            // Hitung total_produksi_pakaian
            $totalProduksiPakaian = $produksiPakaian->jumlah_rencanaproduksi - $produksiPakaian->total_berhasildangagal;
    
            // Kirim data dalam format JSON
            return response()->json([
                'data' => [
                    'total_produksi_pakaian' => $totalProduksiPakaian,
                    'total_jumlahberhasil' => $produksiPakaian->total_jumlahberhasil,
                    'total_jumlahgagal' => $produksiPakaian->total_jumlahgagal,
                ],
            ]);
        } else {
            // Kirim respons error jika data tidak ditemukan
            return response()->json([
                'error' => 'Data Produksi Pakaian tidak ditemukan',
            ], 404);
        }
    }


    private function generateKodeDetail()
    {
        $lastNumber = $this->getLastDetailNumber();
        $newNumber = $lastNumber + 1;
        $formattedNumber = str_pad($newNumber, 5, '0', STR_PAD_LEFT);
    
        return 'D-JAHIT-' . $formattedNumber;
    }

    private function generateKodeProduksi()
    {
        $lastNumber = $this->getLastProduksiNumber();
        $newNumber = $lastNumber + 1;
        $formattedNumber = str_pad($newNumber, 5, '0', STR_PAD_LEFT);
    
        return 'JAHIT-' . $formattedNumber;
    }


   private function generateUniqueKodeProduksi()
   {
       do {
           $kodeProduksiPakaian = $this->generateKodeProduksi();
       } while ($this->isKodeDetailExists($kodeProduksiPakaian));
   
       return $kodeProduksiPakaian;
   }

   private function generateUniqueKodeDetailProduksi()
   {
       do {
           $kodeDetailProduksiPakaian = $this->generateKodeDetail();
       } while ($this->isKodeDetailExists($kodeDetailProduksiPakaian));
   
       return $kodeDetailProduksiPakaian;
   }


   private function getLastDetailNumber()
   {
       $lastDetailNumber = DetailProduksiPakaianJahit::latest('kode_detail_produksipakaian_jahit')->first();
       return $lastDetailNumber ? intval(substr($lastDetailNumber->kode_detail_produksipakaian_jahit, -5)) : 0;
   }

   private function getLastProduksiNumber()
   {
    $lastDetailNumber = ProduksiPakaianJahit::latest('kode_produksipakaian_jahit')->first();
    return $lastDetailNumber ? intval(substr($lastDetailNumber->kode_produksipakaian_jahit, -5)) : 0;
   }

   private function isKodeDetailExists($kodeDetail)
   {
       return DB::table('detail_produksi_pakaian_jahits')->where('kode_detail_produksipakaian_jahit', $kodeDetail)->exists();
   }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $currentDate = now()->toDateString();

    $validator = Validator::make($request->all(), [
        'kode_rencanaproduksi' => 'required',
        'tanggal_kerja' => 'required|date|date_equals:' . $currentDate,
        'total_produksi_pakaian' => 'required|numeric',
        'jumlah_berhasil' => 'required|numeric|min:1',
        'jumlah_gagal' => 'required|numeric|min:0',
        'total_berhasildangagal' => 'required|numeric',
        'upah_kerja' => 'required|numeric',
    ], [
        'jumlah_berhasil.min' => 'Jumlah berhasil harus lebih dari 0.',
        'jumlah_gagal.min' => 'Jumlah gagal harus minimal 0.',
        'tanggal_kerja.date_equals' => 'Tanggal kerja harus sama dengan hari ini.',
    ]);

    if ($validator->fails()) {
        // Jika validasi gagal, redirect kembali dengan pesan kesalahan
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Dapatkan ID pengguna saat ini
    $idUserSaatIni = auth()->user()->id;

    //Membuat Kode Untuk Primarykeynya
    $kodeProduksiPakaianJahit = $this->generateUniqueKodeProduksi();
    //
    
    //Membuat Kode Untuk Primarykeynya
    $kodeDetailProduksiPakaianJahit = $this->generateUniqueKodeDetailProduksi();

    // Mengambil kode produksipakaian_cutting dari database
    $cekKodeProduksiJahit = ProduksiPakaianJahit::where('kode_rencanaproduksi', $request->kode_rencanaproduksi)->value('kode_produksipakaian_jahit');

    // Jika sudah ada, gunakan kode tersebut. Jika tidak, gunakan kode baru
    $kodeProduksiPakaianJahit = $cekKodeProduksiJahit ?? $kodeProduksiPakaianJahit;    

    // Simpan data ke Detail ProduksiPakaian Cutting
    DetailProduksiPakaianJahit::create([
        'kode_detail_produksipakaian_jahit' => $kodeDetailProduksiPakaianJahit,
        'kode_produksipakaian_jahit' => $kodeProduksiPakaianJahit,
        'kode_rencanaproduksi' => $request->kode_rencanaproduksi,
        'id_user' => $idUserSaatIni,
        'tanggal_kerja' => $request->tanggal_kerja,
        'nama_produk' => $request->nama_produk,
        'warna_produk' => $request->warna_produk,
        'ukuran_produk' => $request->ukuran_produk,
        'jumlah_rencanaproduksi' => $request->jumlah_rencanaproduksi,
        'jumlah_berhasil' => $request->jumlah_berhasil,
        'jumlah_gagal' => $request->jumlah_gagal,
        'total_berhasildangagal' => $request->total_berhasildangagal,
        'upah_kerja' => $request->upah_kerja,
    ]);
    //Lalu kode_detail_produksipakaian_jahit di tambah 1
    $kodeDetailProduksiPakaianJahit++;


    //Selanjutnya Untuk Inputan Pada Tabel detail_produksipakaian_jahit
    // Ambil data rencana produksi berdasarkan kode_rencanaproduksi untuk cek apakah pada tabel sudah ada apa belum 
    $rencanaProduksi = RencanaProduksi::where('kode_rencanaproduksi', $request->kode_rencanaproduksi)->first();

    if (!$rencanaProduksi) {
        return redirect()->back()->with('error', 'Data Rencana Produksi tidak ditemukan');
    }

    // Dapatkan semua data DetailProduksiPakaianJahit yang terkait
    $detailProduksis = DetailProduksiPakaianJahit::where('kode_rencanaproduksi', $request->kode_rencanaproduksi)->get();

    // Hitung total_jumlahberhasil, total_jumlahgagal, dan total_produksi_pakaian
    $totalJumlahBerhasil = $detailProduksis->sum('jumlah_berhasil');
    $totalJumlahGagal = $detailProduksis->sum('jumlah_gagal');
    $totalProduksiPakaian = $totalJumlahBerhasil + $totalJumlahGagal;

    // Tetapkan status_produksi_jahit menjadi 2 jika $totalProduksiPakaian sama dengan total_berhasil_daricutting, karena itu artinya sudah selesai
    $statusProduksiJahit = ($totalProduksiPakaian == $request->total_berhasil_daricutting) ? 2 : 1;

    // Tentukan tanggal_selesai
    $tanggalSelesai = now();  // Gunakan fungsi now() untuk mendapatkan tanggal dan waktu saat ini

    //Lalu Cek apakah memnag sudah selesai apa belum produksinya 
    // Jika totalProduksiPakaian sama dengan jumlah_rencanaproduksi, tambahkan 1 hari
    if ($totalProduksiPakaian == $request->total_berhasil_daricutting) {
        $tanggalSelesai = $tanggalSelesai->addDays(1);
    }

     /// Simpan data Ke tabel ProduksiPakaian Cutting
     // Periksa apakah catatan/kode_rencanaproduksi sudah ada di ProduksiPakaianCutting sebelumnya
    $existingProduksi = ProduksiPakaianJahit::where('kode_rencanaproduksi', $request->kode_rencanaproduksi)->first();
    if ($existingProduksi) {
        // Jika memang sudah ada maka, update / Perbarui catatan yang sudah ada
        $existingProduksi->update([
            'total_berhasil_daricutting' => $request->total_berhasil_daricutting,
            'total_jumlahberhasil' => $existingProduksi->total_jumlahberhasil + $request->jumlah_berhasil,
            'total_jumlahgagal' => $existingProduksi-> total_jumlahgagal + $request->jumlah_gagal,
            'total_produksi_pakaian' => $existingProduksi->total_produksi_pakaian + $request->jumlah_berhasil+ $request->jumlah_gagal,
            'status_produksi_jahit' => $statusProduksiJahit,
        ]);
    } else {
        // Buat kode_rencanaproduksi baru / catatan baru jika belum ada
        ProduksiPakaianJahit::create([
            'kode_produksipakaian_jahit' => $kodeProduksiPakaianJahit,
            'kode_rencanaproduksi' => $request->kode_rencanaproduksi,
            'total_berhasil_daricutting' => $request->total_berhasil_daricutting,
            'nama_produk' => $request->nama_produk,
            'warna_produk' => $request->warna_produk,
            'ukuran_produk' => $request->ukuran_produk,
            'jumlah_rencanaproduksi' => $request->jumlah_rencanaproduksi,
            'total_jumlahberhasil' => $totalJumlahBerhasil,
            'total_jumlahgagal' => $totalJumlahGagal,
            'total_produksi_pakaian' =>  $totalProduksiPakaian,
            'status_produksi_jahit' =>  $statusProduksiJahit,
            'tanggal_awal' =>  $request->tanggal_awal,
            'tanggal_selesai' => $tanggalSelesai,
        ]);
    }
    // Setelah selesai menyimpan data, lalu tambah nilai kode_produksipakaian_cutting 1
    //$kodeProduksiPakaianJahit++;

    // Redirect dengan pesan sukses
    return redirect()->route('produksi-pakaian-jahit.index')->with('success', 'Data Produksi Pakaian berhasil disimpan');
}

    public function cetak(Request $request)
{
        $tglSekarang = Carbon::now()->format('j F Y');
        // Validasi input
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
        
        $id = Auth::user()->id;
        $nama = Auth::user()->name;

        $start_date = $request->start_date;
        $end_date = $request->end_date;

        // Ambil data dari tabel detailProduksi berdasarkan rentang tanggal dan nama pegawai
        $dataProduksi = DetailProduksiPakaianJahit::where('tanggal_kerja', '>=', $request->start_date)
            ->where('tanggal_kerja', '<=', $request->end_date)
            ->where('id_user', $id)
            ->orderBy('created_at','desc')
            ->get();

        // Kalkulasi jumlah total dari data produksi yang didapatkan
        $totalUpahProduksi = $dataProduksi->sum('upah_kerja');

        // Buat PDF dengan menggunakan Dompdf
        $pdf = PDF::loadView('produksi-pakaian-jahit.cetak', compact('tglSekarang', 'start_date','end_date', 'dataProduksi', 'totalUpahProduksi','nama'));

        // Tampilkan atau unduh PDF
        return $pdf->stream('produksi-pakaian-jahit.cetak');
}

    public function detail($kode_produksipakaian_jahit)
{
        $dataProduksiJahit = DetailProduksiPakaianJahit::with('R_KeProduksiPakaianJahit')
            ->where('kode_produksipakaian_jahit', $kode_produksipakaian_jahit)
            ->orderBy('created_at','desc')
            ->get();

        $rencana = DetailProduksiPakaianJahit::with('R_KeProduksiPakaianJahit')
        ->where('kode_produksipakaian_jahit', $kode_produksipakaian_jahit)
        ->pluck('kode_rencanaproduksi')
        ->first();
        return view('produksi-pakaian-jahit.detail', compact('rencana', 'dataProduksiJahit','kode_produksipakaian_jahit'));
}

}
