<?php

namespace App\Http\Controllers;

use App\Models\DataSatuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataSatuanController extends Controller
{
    public function index (){
        $data = DataSatuan::where('status','>',0)
        ->orderBy('created_at','desc')
        ->get();
        return view('satuan.index',compact('data'));
    }

    public function tambahsatuan (){
        return view('satuan.tambahsatuan');
    }


    private function generateKodeSatuan()
    {
        $lastNumber = $this->getLastSatuanNumber();
        $newNumber = $lastNumber + 1;
        $formattedNumber = str_pad($newNumber, 5, '0', STR_PAD_LEFT);
    
        return 'SATUAN-' . $formattedNumber;
    }


   private function generateUniqueKodeSatuan()
   {
       do {
           $kodeSatuan = $this->generateKodeSatuan();
       } while ($this->isKodeDetailExists($kodeSatuan));
   
       return $kodeSatuan;
   }

   private function getLastSatuanNumber()
   {
    $lastSatuanNumber = DataSatuan::latest('kode_satuan')->first();
    return $lastSatuanNumber ? intval(substr($lastSatuanNumber->kode_satuan, -5)) : 0;
   }

   private function isKodeDetailExists($kodeSatuan)
   {
       return DB::table('data_satuans')->where('kode_satuan', $kodeSatuan)->exists();
   }

    public function insertsatuan (Request $request){
        // Validasi input jika diperlukan
        $request->validate([
            'nama_satuan' => 'required|alpha',
        ], [
            'nama_satuan.required' => 'nama satuan harus diisi',
            'nama_satuan.alpha' => 'nama satuan harus huruf',
        ]);

        $kodeSatuan = $this->generateUniqueKodeSatuan();
        DataSatuan::create([
            'kode_satuan' => $kodeSatuan,
            'nama_satuan' => $request->nama_satuan,
           
        ]);
        $kodeSatuan++;

        return redirect()->route('satuan.index')->with('success','Data berhasil disimpan');
    }

    public function editsatuan ($kode_satuan){
        $data = Datasatuan::where('kode_satuan', $kode_satuan)->first();
        return  view('satuan.editsatuan',compact('data'));
    }

    public function updatesatuan (Request $request,$kode_satuan){
        $data = Datasatuan::where('kode_satuan', $kode_satuan)->first();
    if (!$data) {
        // Data tidak ditemukan, tambahkan logika penanganan di sini
        abort(404);
    }
    $data->update($request->all());
        return redirect()->route('satuan.index')->with('success','Data berhasil di update');
    } 

    public function deletesatuan ($kode_satuan){
        /*$data = Datasatuan::find($kode_satuan);
        $data->delete();
        return redirect()->route('satuan.index')->with('success','Data berhasil dihapus');*/

        $updateStatus = DataSatuan::where('kode_satuan', $kode_satuan)
        ->update([
            'status' => 0
        ]);
        return redirect()->route('satuan.index')->with('success','Data berhasil dihapus');
    }
}
