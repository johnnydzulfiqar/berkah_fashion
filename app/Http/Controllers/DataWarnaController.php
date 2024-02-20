<?php

namespace App\Http\Controllers;

use App\Models\DataWarna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataWarnaController extends Controller
{
    public function index (){
        $data = DataWarna::where('status','>',0)
        ->orderBy('created_at','desc')->get();
        return view('warna.index',compact('data'));
    }
    public function tambahwarna (){
        return view('warna.tambahwarna');
    }

    private function generateKodeWarna()
    {
        $lastNumber = $this->getLastWarnaNumber();
        $newNumber = $lastNumber + 1;
        $formattedNumber = str_pad($newNumber, 5, '0', STR_PAD_LEFT);
    
        return 'WARNA-' . $formattedNumber;
    }


   private function generateUniqueKodeWarna()
   {
       do {
           $kodeWarna = $this->generateKodeWarna();
       } while ($this->isKodeDetailExists($kodeWarna));
   
       return $kodeWarna;
   }

   private function getLastWarnaNumber()
   {
    $lastWarnaNumber = DataWarna::latest('kode_warna')->first();
    return $lastWarnaNumber ? intval(substr($lastWarnaNumber->kode_warna, -5)) : 0;
   }

   private function isKodeDetailExists($kodeWarna)
   {
       return DB::table('data_warnas')->where('kode_warna', $kodeWarna)->exists();
   }

    public function insertwarna (Request $request){
        // Validasi input jika diperlukan
        $request->validate([
            'nama_warna' => 'required|alpha',
        ],[
            'nama_warna.required' => 'nama warna harus diisi',
            'nama_warna.alpha' => 'nama warna harus huruf',
        ]);

        $kodeWarna = $this->generateUniqueKodeWarna();
        DataWarna::create([
            'kode_warna' => $kodeWarna,
            'nama_warna' => $request->nama_warna,
        ]);
        $kodeWarna++;

        return redirect()->route('warna.index')->with('success','Data berhasil disimpan');
    }

    public function editwarna ($kode_warna){
        $data = Datawarna::where('kode_warna', $kode_warna)->first();
        return  view('warna.editwarna',compact('data'));
    }

    public function updatewarna (Request $request,$kode_warna){
        $data = Datawarna::where('kode_warna', $kode_warna)->first();
    if (!$data) {
        // Data tidak ditemukan, tambahkan logika penanganan di sini
        abort(404);
    }
    $data->update($request->all());
        return redirect()->route('warna.index')->with('success','Data berhasil di update');
    } 

    public function deletewarna ($kode_warna){
        /* $data = Datawarna::find($kode_warna);
        $data->delete();
        return redirect()->route('warna.index')->with('success','Data berhasil dihapus');*/

        //Menonaktifkan status nya agar tidak ditampilkan di halaman
        $updateStatus = DataWarna::where('kode_warna', $kode_warna)
        ->update([
            'status' => 0
        ]);
        return redirect()->route('warna.index')->with('success','Data berhasil dihapus');
    }
}
