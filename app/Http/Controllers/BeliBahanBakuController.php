<?php

namespace App\Http\Controllers;

use App\Models\BeliBahanBaku;
use App\Models\DataBahanBaku;
use App\Models\DataProduk;
use App\Models\DataSatuan;
use App\Models\DataUkuran;
use App\Models\DataWarna;
use App\Models\DetailBeliBahanBaku;
use App\Models\DetailRestock;
use App\Models\Restock;
use App\Models\StatusBeli;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BeliBahanBakuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data beli_bahan_bakus dan detail_beli_bahanbakus
        $beliBahanBakus = BeliBahanBaku::orderBy('created_at', 'desc')->get();
        $detailBeliBakus = DetailBeliBahanBaku::all();
        $dataStatusBeli = StatusBeli::all()->pluck('status_beli','kode_statusbeli');
        return view('belibahanbaku.index',compact('beliBahanBakus','detailBeliBakus','dataStatusBeli'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // Ambil data untuk dropdown kode_bahanbaku dari tabel DataBahanBaku
        $dataBahanBaku = DataBahanBaku::pluck('nama_bahanbaku', 'kode_bahanbaku');
        // Ambil data untuk dropdown kode_warna dari tabel DataWarna
        $dataWarna = DataWarna::pluck('nama_warna', 'kode_warna');
        // Ambil data untuk dropdown kode_satuan dari tabel DataSatuan
        $dataSatuan = DataSatuan::pluck('nama_satuan', 'kode_satuan');
        $dataStatusBeli = StatusBeli::pluck('status_beli', 'kode_statusbeli');

        // Inisialisasi data detail_beli sebagai array kosong jika null
        $detailBeliData = $request->input('detail_beli') ?? [];

        // Hitung total jumlah beli bahan baku dari setiap detail
        $totalJumlahBeli = 0;
        
        foreach ($detailBeliData as $detail) {
            $totalJumlahBeli += $detail['jumlah_beli'] ;
        }

        $minimalJumlahBeli = 1;
        
        return view('belibahanbaku.create',compact('minimalJumlahBeli', 'dataBahanBaku','dataWarna','dataSatuan','dataStatusBeli','detailBeliData','totalJumlahBeli'));
    }

    public function getInfoWarnaSatuan($kodeBahanBakuData)
    {
        $dataBahanBaku = DataBahanBaku::where('kode_bahanbaku', $kodeBahanBakuData)->first();
    
        if (!$dataBahanBaku) {
            return response()->json(['error' => 'Data tidak ada'], 404);
        }
    
        // mendapatkan informasi warna
        $kodeWarna = $dataBahanBaku->R_KeWarna->kode_warna;
        $namaWarna = $dataBahanBaku->R_KeWarna->nama_warna;
    
        // mendapatkan informasi satuan
        $kodeSatuan = $dataBahanBaku->R_KeSatuan->kode_satuan;
        $namaSatuan = $dataBahanBaku->R_KeSatuan->nama_satuan;
    
        return response()->json([
            'kodeWarna' => $kodeWarna,
            'kodeSatuan' => $kodeSatuan,
            'namaWarna' => $namaWarna,
            'namaSatuan' => $namaSatuan,
        ]);
    }


    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            'total_jumlahbeli' => 'required',
            'tgl_beli' => 'required|date|after_or_equal:' . Carbon::now()->toDateString(),            
            'status_beli' => 'required|not_in:2', // Tambahkan aturan not_in
        ],[
            'status_beli.required' => 'status harus diisi',
            'status_beli.not_in' => 'status tidak sesuai',
            'tgl_beli.required' => 'tanggal harus diisi',
            'tgl_beli.after_or_equal' => 'tanggal setidaknya harus sekarang',
        ]);

        // Simpan data ke tabel beli_bahan_bakus
        $p = BeliBahanBaku::latest()->first() ?? new BeliBahanBaku();
        $lastNumber = $p ? intval(str_replace('PBB-', '', $p->kode_belibahanbaku)) : 0;
        $newNumber = $lastNumber + 1;

        // Gunakan UUID untuk kode_belibahanbaku dan tambahkan nomor urut dengan padding nol
        $uuid = Str::uuid()->toString();
        $shortUuid = substr($uuid, -5);
        $kodeBeliBahanBaku = 'PBB-' . str_pad($newNumber, 5, '0', STR_PAD_LEFT);

        $beliBahanBaku = BeliBahanBaku::create([
            'kode_belibahanbaku' => $kodeBeliBahanBaku,
            'total_jumlahbeli' => $request->total_jumlahbeli,
            'tgl_beli' => $request->tgl_beli,
            'status_beli' => $request->status_beli,
        ]);

        // Simpan data ke tabel detail_beli_bahan_bakus
        foreach ($request->input('detail_beli') as $detail) {

            // Ambil nomor urut terakhir dari tabel detail_beli_bahan_bakus
            $lastDetailNumber = DetailBeliBahanBaku::latest('kode_detail_belibahanbaku')->first();
            $lastNumber = $lastDetailNumber ? intval(substr($lastDetailNumber->kode_detail_belibahanbaku, -5)) : 0;

            // Menambah satu ke nomor terakhir untuk mendapatkan nilai baru
            $newNumber = $lastNumber + 1;

            // Format nomor urut dengan nol di depan (misal: 00001)
            $formattedNumber = str_pad($newNumber, 5, '0', STR_PAD_LEFT);

            // Membuat kode_detail_belibahanbaku baru
            $kodeDetailBeliBahanBaku = $this->generateUniqueKodeDetail();

            // Simpan data ke tabel detail_beli_bahan_bakus
            DetailBeliBahanBaku::create([ 
                'kode_detail_belibahanbaku' => $kodeDetailBeliBahanBaku,
                'kode_belibahanbaku' => $beliBahanBaku->kode_belibahanbaku,
                'kode_bahanbaku' => $detail['kode_bahanbaku'],
                'kode_warna' => $detail['kode_warna'],
                'kode_satuan' => $detail['kode_satuan'],
                'jumlah_beli' => $detail['jumlah_beli'],
                'keterangan' => $detail['keterangan'],
            ]);
        }
        // Update nomor urut pada tabel beli_bahan_bakus
        $beliBahanBaku->update(['kode_detail_belibahanbaku' => $kodeDetailBeliBahanBaku]);

        // Membuat kode_detail_beli_bahanbaku baru
        $kodeDetailBeliBahanBaku = $this->generateUniqueKodeDetail();

        // Hitung dan simpan total jumlah beli bahan baku setelah menyimpan detail beli
        $beliBahanBaku->hitungTotalJumlahBeli();

        return redirect()->route('belibahanbaku.index')->with('success', 'Data berhasil disimpan.');
    }
    private function generateUniqueKodeDetail()
    {
        do {
            $kodeDetailBeliBahanBaku = $this->generateKodeDetail();
        } while ($this->isKodeDetailExists($kodeDetailBeliBahanBaku));

        return $kodeDetailBeliBahanBaku;
    }

    private function generateKodeDetail()
    {
        $lastNumber = $this->getLastDetailNumber();
        $newNumber = $lastNumber + 1;
        $formattedNumber = str_pad($newNumber, 5, '0', STR_PAD_LEFT);

        return 'DPBB-' . $formattedNumber;
    }
    private function getLastDetailNumber()
    {
        $lastDetailNumber = DetailBeliBahanBaku::latest('kode_detail_belibahanbaku')->first();
        return $lastDetailNumber ? intval(substr($lastDetailNumber->kode_detail_belibahanbaku, -5)) : 0;
    }

    private function isKodeDetailExists($kodeDetail)
    {
        return DB::table('detail_beli_bahan_bakus')->where('kode_detail_belibahanbaku', $kodeDetail)->exists();
    }

    public function getDataForPrint($kode_belibahanbaku)
    {
        $beliBahanBaku = BeliBahanBaku::with('detailBeliBahanBakus')->where('kode_belibahanbaku', $kode_belibahanbaku)->first();

    
        //Untuk Menampung nilai dari Tabel Detail BeliBahanBaku yang Berupa Array Arag Bisa di tampilkan berulangberdasarkan kode_belibahanbaku
        $dataDetail = DetailBeliBahanBaku::whereIn('kode_belibahanbaku', [$kode_belibahanbaku])->get();
        
        if (!$beliBahanBaku) { 
            abort(404);
        }
        
        $pdf = PDF::loadView('belibahanbaku.print', compact('beliBahanBaku','dataDetail'));

        return $pdf->stream();
    }   


     public function destroy($kode_belibahanbaku)
     {
         // Hapus semua detail_beli_bahan_bakus yang berelasi dengan kode_belibahanbaku
         DetailBeliBahanBaku::where('kode_belibahanbaku', $kode_belibahanbaku)->delete();
     
         // Hapus restock dan detail_restocks berdasarkan kode_belibahanbaku
         Restock::where('kode_belibahanbaku', $kode_belibahanbaku)->get()->each(function ($restock) {
             // Hapus detail_restocks yang berelasi dengan restock
             $restock->R_KeDetailRestock()->delete();
     
             // Hapus restock
             $restock->delete();
         });
     
         // Hapus beli_bahan_baku berdasarkan kode_belibahanbaku
         BeliBahanBaku::where('kode_belibahanbaku', $kode_belibahanbaku)->delete();
     
         return redirect()->route('belibahanbaku.index')->with('success', 'Data berhasil dihapus.');
     }
}
