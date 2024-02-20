<?php

namespace App\Http\Controllers;

use App\Models\DataBahanBaku;
use App\Models\DataSatuan;
use App\Models\DataWarna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataBahanBakuController extends Controller
{
    public function index(){
        $databahanbaku = DataBahanBaku::where('status', '>', 0)
    ->orderBy('created_at', 'desc')
    ->get();

    return view('bahanbaku.index', compact('databahanbaku'));
    
    }
    public function tambahbahanbaku(){
        $databahanbaku = DataBahanBaku::all();
        $dataWarna = DataWarna::pluck('nama_warna','kode_warna');
        $dataSatuan= DataSatuan::pluck('nama_satuan','kode_satuan');
        return view('bahanbaku.tambahbahanbaku',compact('databahanbaku','dataWarna','dataSatuan'));
    }


    private function generateKodeBahanBaku()
    {
        $lastNumber = $this->getLastBahanBakuNumber();
        $newNumber = $lastNumber + 1;
        $formattedNumber = str_pad($newNumber, 5, '0', STR_PAD_LEFT);
    
        return 'BB-' . $formattedNumber;
    }


   private function generateUniqueKodeBahanBaku()
   {
       do {
           $kodeBahanBaku = $this->generateKodeBahanBaku();
       } while ($this->isKodeDetailExists($kodeBahanBaku));
   
       return $kodeBahanBaku;
   }

   private function getLastBahanBakuNumber()
   {
    $lastBahanBakuNumber = DataBahanBaku::latest('kode_bahanbaku')->first();
    return $lastBahanBakuNumber ? intval(substr($lastBahanBakuNumber->kode_bahanbaku, -5)) : 0;
   }

   private function isKodeDetailExists($kodeBahanBaku)
   {
       return DB::table('data_bahanbakus')->where('kode_bahanbaku', $kodeBahanBaku)->exists();
   }


    public function insertbahanbaku(Request $request){
        $request->validate([
            'nama_bahanbaku' => 'required',
            'kode_warna' => 'required',
            'kode_satuan' => 'required',
        ],[
            'nama_bahanbaku.required' => 'bahan baku harus diisi',
            'kode_warna.required' => 'silahkan pilih warna',
            'kode_satuan.required' => 'silahkan pilih satuan',
        ]);

       $kodeBahanBaku = $this->generateUniqueKodeBahanBaku();
        DataBahanBaku::create([
            'kode_bahanbaku' =>$kodeBahanBaku,
            'nama_bahanbaku' => $request->nama_bahanbaku,
            'kode_warna' => $request->kode_warna,
            'kode_satuan' => $request->kode_satuan,
            'stok' => $request->stok,
            'keterangan' => $request->keterangan,
        ]);
        $kodeBahanBaku++;

        return redirect()->route('bahanbaku.index')->with('success','Data berhasil disimpan');
    }
    
    public function editbahanbaku ($kode_bahanbaku){
        $databahanbaku = DataBahanBaku::all()->where('kode_bahanbaku',$kode_bahanbaku)->first();
        $dataWarna = DataWarna::all();
        $dataSatuan = DataSatuan::all();

        return view('bahanbaku.editbahanbaku',compact('databahanbaku','dataWarna','dataSatuan'));
    }
    public function updatebahanbaku(Request $request, $kode_bahanbaku){
        $databahanbaku = DataBahanBaku::where('kode_bahanbaku', $kode_bahanbaku)->first();
        $databahanbaku->update($request->all());

        return redirect()->route('bahanbaku.index')->with('success','Data berhasil di update');
    }
    public function deletebahanbaku ($kode_bahanbaku){
        /* 
        $databahanbaku = DataBahanBaku::find($kode_bahanbaku);
        $databahanbaku->delete();

        return redirect()->route('bahanbaku.index')->with('success','Data berhasil dihapus'); */
        $updateStatus = DataBahanBaku::where('kode_bahanbaku', $kode_bahanbaku)
        ->update([
            'status' => 0
        ]);
        return redirect()->route('bahanbaku.index')->with('success','Data berhasil dihapus');
    }
}
