<?php

namespace App\Http\Controllers;

use App\Models\BeliBahanBaku;
use App\Models\DataBahanBaku;
use App\Models\DataSatuan;
use App\Models\DataWarna;
use App\Models\DetailBeliBahanBaku;
use App\Models\DetailRestock;
use App\Models\Restock;
use App\Models\StatusBeli;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RestockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil restock dan detail_restock
        $dataRestock = Restock::orderBy('created_at', 'desc')->get();
        $dataDetailRestock = DetailRestock::all();
        //$dataStatusBeli = StatusBeli::all()->pluck('status_beli','kode_statusbeli');
        return view('restock.index',compact('dataRestock','dataDetailRestock'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {   
        // Ambil kode_belibahanbaku dari form
        $selectedKodeBeliBahanBaku = $request->input('kode_belibahanbaku');

        // Ambil data kode_bahanbaku yang berelasi dengan kode_belibahanbaku
        $dataBahanBakuTerkait = [];

        if ($selectedKodeBeliBahanBaku) {
            $beliBahanBaku = BeliBahanBaku::with('detailBeliBahanBakus')->find($selectedKodeBeliBahanBaku);

            if ($beliBahanBaku) {
                $dataBahanBakuTerkait = $beliBahanBaku->detailBeliBahanBakus->pluck('kode_bahanbaku', 'kode_bahanbaku')->toArray();
            }
        }
        // Ambil data untuk dropdown kode_belibahanbaku dari tabel BeliBahanBaku
        $dataBeliBahanBaku = BeliBahanBaku::where('status_beli', 1)->pluck('kode_belibahanbaku', 'kode_belibahanbaku');
        // Ambil data untuk dropdown kode_bahanbaku dari tabel DataBahanBaku
        $dataBahanBaku = DataBahanBaku::pluck('nama_bahanbaku', 'kode_bahanbaku');

        $dataStatusBeli = StatusBeli::pluck('status_beli', 'kode_statusbeli');

        // Inisialisasi data detail_restock sebagai array kosong jika null
        $detailRestockData = $request->input('detail_restock') ?? [];

        // Hitung total harga bahan baku/item dari setiap detail
        $totalHargaItem = 0;

        foreach ($detailRestockData as $detail) {

            $totalHargaItem += $detail['jumlah_item'] * $detail['harga_item'];
        }

        return view('restock.create',compact('dataBeliBahanBaku','dataBahanBaku','dataStatusBeli','detailRestockData','totalHargaItem','dataBahanBakuTerkait'));
    }

    /**
    * Fungsi untuk mendapatkan kode_detail_belibahanbaku berdasarkan kode_belibahanbaku yang dipilih pada dropdown,
    * Juga mengambil nama_bahanbaku dari tabel data_bahanbakus dan menggabungkannya dengan detail_beli_bahan_bakus
    * join('data_bahanbakus', 'detail_beli_bahan_bakus.kode_bahanbaku', '=', 'data_bahanbakus.kode_bahanbaku'):
    * Ini adalah metode join untuk menggabungkan tabel data_bahanbakus dengan detail_beli_bahan_bakus berdasarkan kolom kode_bahanbaku.
    */
    public function getBahanBakuByBelibahanbaku(Request $request)
    {
        $kodeBeliBahanBaku = $request->input('kode_belibahanbaku');

        $bahanBakuTerkait = DetailBeliBahanBaku::where('kode_belibahanbaku', $kodeBeliBahanBaku)
        ->join('data_bahanbakus', 'detail_beli_bahan_bakus.kode_bahanbaku', '=', 'data_bahanbakus.kode_bahanbaku')
        ->pluck('data_bahanbakus.nama_bahanbaku', 'detail_beli_bahan_bakus.kode_bahanbaku')
        ->toArray();

        return response()->json($bahanBakuTerkait);
    }



    public function getWarnaByBahanBaku($kode_bahanbaku)
{
    $warna = DataBahanBaku::where('kode_bahanbaku', $kode_bahanbaku)->first();
    $kodeWarna = $warna->R_KeWarna->kode_warna;
    $namaWarna = $warna->R_KeWarna->nama_warna;

    return response()->json(['kode_warna' => $kodeWarna, 'nama_warna' => $namaWarna]);
}

public function getSatuanByBahanBaku($kode_bahanbaku)
{
    $satuan = DataBahanBaku::where('kode_bahanbaku', $kode_bahanbaku)->first();
    $kodeSatuan = $satuan->R_KeSatuan->kode_satuan;
    $namaSatuan = $satuan->R_KeSatuan->nama_satuan;

    return response()->json(['kode_satuan' => $kodeSatuan, 'nama_satuan' => $namaSatuan]);
}
    
    public function store(Request $request)
    {
            // Validasi form
        $request->validate([
        'tgl_restock' => 'required',
        'status_beli' => 'required',
        'kode_belibahanbaku' => 'required',
        'no_faktur' => 'required',
        'tgl_restock' => 'required',
        ], [
            'tgl_restock.required' => 'Tanggal harus diisi',
            'status_beli.required' => 'Status harus diisi',
            'kode_belibahanbaku.required' => 'Kode pembelian harus diisi',
            'no_faktur.required' => 'No faktur harus diisi',
            'tgl_restock.required' => 'Tanggal harus diisi',
        ]);
    

        // Simpan data ke tabel restock
        $p = Restock::latest()->first() ?? new Restock();
        $lastNumber = $p ? intval(str_replace('RS-', '', $p->kode_restock)) : 0;
        $newNumber = $lastNumber + 1;

        // Gunakan UUID untuk kode_restock dan tambahkan nomor urut dengan padding nol
        $uuid = Str::uuid()->toString();
        $shortUuid = substr($uuid, -5);
        $kodeRestock = 'RS-' . str_pad($newNumber, 5, '0', STR_PAD_LEFT);

        // Ambil total_hargaitem dari formulir
        $totalHargaItem = $request->input('total_hargaitem');

        $restock = Restock::create([
            'kode_restock' => $kodeRestock,
            'no_faktur' => $request->no_faktur,
            'kode_belibahanbaku' => $request->input('kode_belibahanbaku'),
            'total_hargaitem' => $request->total_hargaitem,
            'tgl_restock' => $request->input('tgl_restock'),
        ]);

        //Mengambil kode beli bahan baku untuk kemudian update status
        $kode_belibahanbaku = $request->input('kode_belibahanbaku');

        // Simpan data ke tabel detail_restock
        foreach ($request->input('detail_restock') as $detail) {

            // Ambil nomor urut terakhir dari tabel detail_rsectock
            $lastDetailNumber = DetailRestock::latest('kode_detail_restock')->first();
            $lastNumber = $lastDetailNumber ? intval(substr($lastDetailNumber->kode_detail_restock, -5)) : 0;

            // Menambah satu ke nomor terakhir untuk mendapatkan nilai baru
            $newNumber = $lastNumber + 1;

            // Format nomor urut dengan nol di depan (misal: 00001)
            $formattedNumber = str_pad($newNumber, 5, '0', STR_PAD_LEFT);

            // Membuat kode_detail_restock baru
            $kodeDetailRestock = $this->generateUniqueKodeDetail();

            // Simpan data ke tabel detail_restock
            DetailRestock::create([
                'kode_detail_restock' => $kodeDetailRestock,
                'kode_restock' => $restock->kode_restock,
                'kode_bahanbaku' => $detail['kode_bahanbaku'],
                'kode_warna' => $detail['kode_warna'],
                'kode_satuan' => $detail['kode_satuan'],
                'harga_item' => $detail['harga_item'],
                'jumlah_item' => $detail['jumlah_item'],
                'keterangan' => $detail['keterangan'],
            ]);

                // Update stok di tabel DataBahanBaku
                // Ambil stok saat ini
                $currentStok = DataBahanBaku::where('kode_bahanbaku', $detail['kode_bahanbaku'])->value('stok');

                // Update stok di tabel DataBahanBaku
                $updateStok = DataBahanBaku::where('kode_bahanbaku', $detail['kode_bahanbaku'])
                ->update([
                    'stok' => $currentStok + $detail['jumlah_item']
                ]);
        }

        // Update nomor urut pada tabel restock
        $restock->update(['kode_detail_restock' => $kodeRestock]);
        
         // Membuat kode_detail_restock baru
         $kodeDetailRestock = $this->generateUniqueKodeDetail();
         
        // Update status di tabel belibahanbaku
        $updateStatus = BeliBahanBaku::where('kode_belibahanbaku', $kode_belibahanbaku);
        $updateStatus->update([
            'status_beli' => 2
        ]);

         return redirect()->route('restocks.index')->with('success', 'Data berhasil disimpan.');
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

        return 'DRS-' . $formattedNumber;
    }

    private function getLastDetailNumber()
    {
        $lastDetailNumber = DetailRestock::latest('kode_detail_restock')->first();
        return $lastDetailNumber ? intval(substr($lastDetailNumber->kode_detail_restock, -5)) : 0;
    }

    private function isKodeDetailExists($kodeDetail)
    {
        return DB::table('detail_restocks')->where('kode_detail_restock', $kodeDetail)->exists();
    }

        /**
     * Display the specified resource.
     */
    public function getDataForPrint($kode_restock)
    {
        $dataRestock = Restock::with('R_KeDetailRestock')->where('kode_restock', $kode_restock)->first();
    
        //dd($dataRestock); // Tambahkan ini untuk debug
    
        if (!$dataRestock) {
            abort(404);
        }
    
        $pdf = PDF::loadView('restock.print', compact('dataRestock'));
    
        return $pdf->stream();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($kode_restock)
    {
        // Hapus semua detail_restock yang berelasi dengan kode_restock
        DetailRestock::where('kode_restock', $kode_restock)->delete();
    
        // Hapus restock berdasarkan kode_restock
        Restock::where('kode_restock', $kode_restock)->delete();
    
        return redirect()->route('restocks.index')->with('success', 'Data berhasil dihapus.');
    }
}
