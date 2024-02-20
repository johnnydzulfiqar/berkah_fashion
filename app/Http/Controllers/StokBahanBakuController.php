<?php

namespace App\Http\Controllers;

use App\Models\DataBahanBaku;
use App\Models\DataSatuan;
use App\Models\DataWarna;
use App\Models\StokBahanBaku;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StokBahanBakuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataStokBahanBakus = StokBahanBaku::all();
        $dataBahanBakus = DataWarna::all();
        $dataWarnas = DataWarna::all();
        $dataSatuans = DataWarna::all();
        return view('stokbahanbaku.index',compact('dataStokBahanBakus','dataBahanBakus','dataWarnas','dataSatuans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataBahanBaku = DataBahanBaku::pluck('nama_bahanbaku','kode_bahanbaku');
        $dataWarna = DataWarna::pluck('nama_warna','kode_warna');
        $dataSatuan= DataSatuan::pluck('nama_satuan','kode_satuan');
        return view('stokbahanbaku.create',compact('dataBahanBaku','dataWarna','dataSatuan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
                // Validasi request
                $request->validate([
                    'kode_bahanbaku' => 'required',
                    'kode_warna' => 'required',
                    'kode_satuan' => 'required',
                    'stok_bahanbaku' => 'required',
                ]);

        // Simpan data ke tabel stok bahan baku
        $p = StokBahanBaku::latest()->first() ?? new StokBahanBaku();
        $lastNumber = $p ? intval(str_replace('SBB-', '', $p->kode_stokbahanbaku)) : 0;
        $newNumber = $lastNumber + 1;

        // Gunakan UUID untuk kode_stokbahanbaku dan tambahkan nomor urut dengan padding nol
        $uuid = Str::uuid()->toString();
        $shortUuid = substr($uuid, -5);
        $kodeStokBahanBaku = 'SBB-' . str_pad($newNumber, 5, '0', STR_PAD_LEFT);

        $stokBahanBaku = StokBahanBaku::create([
            'kode_stokbahanbaku' => $kodeStokBahanBaku,
            'kode_bahanbaku' => $request->kode_bahanbaku,
            'kode_warna' => $request->kode_warna,
            'kode_satuan' => $request->kode_satuan,
            'stok_bahanbaku' => $request->stok_bahanbaku,
        ]);
        return redirect()->route('stokbahanbaku.index')->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(StokBahanBaku $stokBahanBaku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $kode_stokbahanbaku)
    {
        $dataStokBahanBaku = StokBahanBaku::all()->where('kode_stokbahanbaku', $kode_stokbahanbaku)->first();
        $dataBahanBaku = DataBahanBaku::all()->pluck('nama_bahanbaku','kode_bahanbaku');
        $dataWarna = DataWarna::all()->pluck('nama_warna','kode_warna');
        $dataSatuan = DataSatuan::all()->pluck('nama_satuan','kode_satuan');
        return view('stokbahanbaku.edit',compact('dataStokBahanBaku','dataBahanBaku','dataWarna','dataSatuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $kode_stokbahanbaku)
    {
        $datastokbahanbaku = StokBahanBaku::where('kode_stokbahanbaku', $kode_stokbahanbaku)->first();

        // Pastikan data ditemukan sebelum melakukan update
        if ($datastokbahanbaku) {
            $datastokbahanbaku->update([
                'kode_bahanbaku' => $request->input('kode_bahanbaku'),
                'kode_warna' => $request->input('kode_warna'),
                'kode_satuan' => $request->input('kode_satuan'),
                'stok_bahanbaku' => $request->input('stok_bahanbaku'),
            ]);

            return redirect()->route('stokbahanbaku.index')->with('success', 'Data berhasil diupdate');
        } else {
            // Tindakan jika data tidak ditemukan
            return redirect()->route('stokbahanbaku.index')->with('error', 'Data tidak ditemukan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($kode_stokbahanbaku)
    {
        $data = StokBahanBaku::find($kode_stokbahanbaku);
        
        if (!$data) {
            return response()->json(['message' => 'Data not found.'], 404);
        }
    
        $data->delete();
        
        return response()->json(['message' => 'Data Berhasil Dihapus.']);
    }
}
