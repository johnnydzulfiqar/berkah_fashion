<?php

namespace App\Http\Controllers;

use App\Models\DataBahanBaku;
use App\Models\DataProduk;
use App\Models\DataSatuan;
use App\Models\DataUkuran;
use App\Models\DataWarna;
use App\Models\DetailRencanaProduksi;
use App\Models\RencanaProduksi;
use App\Models\StatusProduksi;
use App\Models\StokBahanBaku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RencanaProduksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Ambil data rencana produksi dan detail rencana produksi
        $rencanaProduksis = RencanaProduksi::orderBy('created_at','desc')->get();
        $detailRencanaProduksis = DetailRencanaProduksi::all();
        $dataStatusBelis = StatusProduksi::all()->pluck('status_produksi','kode_statusproduksi');
        return view('rencanaproduksi.index',compact('rencanaProduksis','detailRencanaProduksis','dataStatusBelis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
            $dataProduks = DataProduk::all();
            $dataWarnaProduks = DataWarna::all()->pluck('nama_warna', 'kode_warna');
            $dataUkuranProduks = DataUkuran::all()->pluck('nama_ukuran', 'kode_ukuran');
            $dataStatusProduksis = StatusProduksi::all()->pluck('status_produksi', 'kode_statusproduksi');
            
            // Menggunakan select untuk memilih kolom yang diperlukan pada StokBahanBaku
            $dataStokBahanBakus = DataBahanBaku::all();
            
            // Menggunakan select untuk memilih kolom yang diperlukan pada StokBahanBaku

            return view('rencanaproduksi.create', compact('dataProduks', 'dataWarnaProduks', 'dataUkuranProduks', 'dataStatusProduksis', 'dataStokBahanBakus'));
    }

    public function getInfoBahanBaku($kode_bahanbaku)
    {
        $stokBahanBaku = DataBahanBaku::where('kode_bahanbaku', $kode_bahanbaku)->first();
    
        if (!$stokBahanBaku) {
            return response()->json(['error' => 'Data not found'], 404);
        }
    
        // Menggunakan relasi untuk mendapatkan informasi warna
        $kodeWarna = $stokBahanBaku->R_KeWarna->kode_warna;
        $namaWarna = DataWarna::where('kode_warna', $kodeWarna)->value('nama_warna');

        // Menggunakan relasi untuk mendapatkan informasi satuan
        $kodeSatuan = $stokBahanBaku->R_KeSatuan->kode_satuan;
        $namaSatuan = DataSatuan::where('kode_satuan', $kodeSatuan)->value('nama_satuan');

        // Menggunakan relasi untuk mendapatkan informasi satuan
        $stokTersedia = $stokBahanBaku->stok;
        
    
        return response()->json([
            'kodeWarna' => $namaWarna,
            'kodeSatuan' => $namaSatuan,
            'stokTersedia' => $stokBahanBaku->stok,
        ]);
    }


    public function getInfoProduk($kode_produk)
    {
        $dataProduk = DataProduk::where('kode_produk', $kode_produk)->first();
    
        if (!$dataProduk) {
            return response()->json(['error' => 'Data not found'], 404);
        }
    
        // mendapatkan informasi warna
        $kodeWarna = $dataProduk->R_KeWarna->kode_warna;
        $namaWarna = DataWarna::where('kode_warna', $kodeWarna)->value('nama_warna');

        // mendapatkan informasi satuan
        $kodeUkuran = $dataProduk->R_KeUkuran->kode_ukuran;
        $namaUkuran = DataUkuran::where('kode_ukuran', $kodeUkuran)->value('nama_ukuran');
        
    
        return response()->json([
            'kodeWarna' => $kodeWarna,
            'kodeUkuran' => $kodeUkuran,
            'namaWarna' => $namaWarna,
            'namaUkuran' => $namaUkuran,
        ]);
    }

    
    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    // Validasi request
    $request->validate([
        'tgl_awal' => 'required',
        'tgl_akhir' => 'required',
        'biaya_cutting' => 'required',
        'biaya_jahit' => 'required',
        'biaya_packing' => 'required',
        'jumlah_rencanaproduksi' => 'required',
        'status_produksi' => 'required',
        'jumlah_perlu_stokbahanbaku' => 'not_in:0',
    ],[
        'jumlah_perlu_stokbahanbaku.not_in' => 'Jumlah Stok Yang Diperlukan Tidak Boleh 0',
        'jumlah_perlu_stokbahanbaku.required' => 'Jumlah Stok Yang Diperlukan Tidak Boleh 0',
    ]);
    //dd($request->all());


        // Simpan data ke tabel rencana_produksis
        $p = RencanaProduksi::latest()->first() ?? new RencanaProduksi();
        $lastNumber = $p ? intval(str_replace('RENCANA-', '', $p->kode_rencanaproduksi)) : 0;
        $newNumber = $lastNumber + 1;

        // Gunakan UUID untuk membuat kode_rencanaproduksi dan tambahkan nomor urut dengan padding nol
        $uuid = Str::uuid()->toString();
        $shortUuid = substr($uuid, -5);
        $kodeRencanaProduksi = 'RENCANA-' . str_pad($newNumber, 5, '0', STR_PAD_LEFT);

        $rencanaProduksi = RencanaProduksi::create([
            'kode_rencanaproduksi' => $kodeRencanaProduksi,
            'kode_produk' => $request->kode_produk,
            'kode_warnaproduk' => $request->kode_warna,
            'kode_ukuranproduk' => $request->kode_ukuran,
            'tgl_awal' => $request->tgl_awal,
            'tgl_akhir' => $request->tgl_akhir,
            'biaya_cutting' => $request->biaya_cutting,
            'biaya_jahit' => $request->biaya_jahit,
            'biaya_packing' => $request->biaya_packing,
            'jumlah_rencanaproduksi' => $request->jumlah_rencanaproduksi,
            'status_produksi' => $request->status_produksi,
        ]);

        // Simpan data ke tabel detail_rencana_produksis
        foreach ($request->input('detail_rencana') as $detail) {

            // Ambil nomor urut terakhir dari tabel detail_rencana_produksis
            $lastDetailNumber = DetailRencanaProduksi::latest('kode_detail_rencanaproduksi')->first();
            $lastNumber = $lastDetailNumber ? intval(substr($lastDetailNumber->kode_detail_rencanaproduksi, -5)) : 0;

            // Menambah satu ke nomor terakhir untuk mendapatkan nilai baru
            $newNumber = $lastNumber + 1;

            // Format nomor urut dengan nol di depan (misal: 00001)
            $formattedNumber = str_pad($newNumber, 5, '0', STR_PAD_LEFT);

            // Membuat kode_detail_rencanaproduksi baru
            $kodeDetailRencanaProduksi = $this->generateUniqueKodeDetail();

             // Simpan data ke tabel detail_rencanaproduksi
            DetailRencanaProduksi::create([
                'kode_detail_rencanaproduksi' => $kodeDetailRencanaProduksi,
                'kode_rencanaproduksi' => $rencanaProduksi->kode_rencanaproduksi,
                'kode_bahanbaku' => $detail['kode_bahanbaku'],
                'kode_warna_stokbahanbaku' => $detail['kode_warna_stokbahanbaku'],
                'kode_satuan_stokbahanbaku' => $detail['kode_satuan_stokbahanbaku'],
                'jumlah_perlu_stokbahanbaku' => $detail['jumlah_perlu_stokbahanbaku'],
            ]);

            // Update stok pada tabel DataBahanBaku
            DataBahanBaku::where('kode_bahanbaku', $detail['kode_bahanbaku'])
                ->update([
                    'stok' => DB::raw('stok - ' . $detail['jumlah_perlu_stokbahanbaku'])
            ]);
        }

        // Update nomor urut pada tabel rencana_produksis
        $rencanaProduksi->update(['kode_detail_rencanaproduksi' => $kodeDetailRencanaProduksi]);

        // Membuat kode_detail_rencanaproduksi baru
        $kodeDetailRencanaProduksi = $this->generateUniqueKodeDetail();

        //Return Ke Halaman Index
        return redirect()->route('rencana-produksi.index')->with('success', 'Data berhasil disimpan.');
    }

    private function generateUniqueKodeDetail()
    {
        do {
            $kodeDetailRencanaProduksi = $this->generateKodeDetail();
        } while ($this->isKodeDetailExists($kodeDetailRencanaProduksi));

        return $kodeDetailRencanaProduksi;
    }

    private function generateKodeDetail()
    {
        $lastNumber = $this->getLastDetailNumber();
        $newNumber = $lastNumber + 1;
        $formattedNumber = str_pad($newNumber, 5, '0', STR_PAD_LEFT);

        return 'D-RENCANA-' . $formattedNumber;
    }
    private function getLastDetailNumber()
    {
        $lastDetailNumber = DetailRencanaProduksi::latest('kode_detail_rencanaproduksi')->first();
        return $lastDetailNumber ? intval(substr($lastDetailNumber->kode_detail_rencanaproduksi, -5)) : 0;
    }

    private function isKodeDetailExists($kodeDetail)
    {
        return DB::table('detail_rencana_produksis')->where('kode_detail_rencanaproduksi', $kodeDetail)->exists();
    }

    public function getDataForPrint($kode_rencanaproduksi)
    {
        $dataRencanaProduksi = RencanaProduksi::with('R_KeDetailRencanaProduksi')->where('kode_rencanaproduksi', $kode_rencanaproduksi)->first();
        
        
        //$dataProduks = RencanaProduksi::where('kode_rencanaproduksi','$kode_rencanaproduksi')->pluck('kode_produk','kode_produk');

        $dataProduk = DataProduk::where('kode_produk', $dataRencanaProduksi->kode_produk)->pluck('nama_produk');
        $dataWarna = DataWarna::where('nama_warna', $dataRencanaProduksi->nama_warna)->pluck('nama_warna');
        
    
        if (!$dataRencanaProduksi) {
            abort(404);
        }
    
        $pdf = PDF::loadView('rencanaproduksi.print', compact('dataRencanaProduksi','dataProduk','dataWarna'));
    
        return $pdf->stream();
    }
}
