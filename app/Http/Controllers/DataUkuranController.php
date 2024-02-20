<?php

namespace App\Http\Controllers;

use App\Models\DataUkuran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;

class DataUkuranController extends Controller
{
    public function index (){
        $data = DataUkuran::where('status','>',0)
        ->orderBy('created_at','desc')->get();
        return view('ukuran.index',compact('data'));
    }

    public function tambahukuran (){
        return view('ukuran.tambahukuran');
    }

    private function generateKodeUkuran()
    {
        $lastNumber = $this->getLastUkuranNumber();
        $newNumber = $lastNumber + 1;
        $formattedNumber = str_pad($newNumber, 5, '0', STR_PAD_LEFT);
    
        return 'UKURAN-' . $formattedNumber;
    }


   private function generateUniqueKodeUkuran()
   {
       do {
           $kodeUkuran = $this->generateKodeUkuran();
       } while ($this->isKodeDetailExists($kodeUkuran));
   
       return $kodeUkuran;
   }

   private function getLastUkuranNumber()
   {
    $lastUkuranNumber = DataUkuran::latest('kode_ukuran')->first();
    return $lastUkuranNumber ? intval(substr($lastUkuranNumber->kode_ukuran, -5)) : 0;
   }

   private function isKodeDetailExists($kodeUkuran)
   {
       return DB::table('data_ukurans')->where('kode_ukuran', $kodeUkuran)->exists();
   }


    public function insertukuran (Request $request){
        // Validasi input jika diperlukan
        $request->validate([
            'nama_ukuran' => 'required|alpha',
        ], [
            'nama_ukuran.required' => 'nama ukuran harus diisi',
            'nama_ukuran.alpha' => 'nama ukuran harus huruf',
        ]);

        $kodeUkuran = $this->generateUniqueKodeUkuran();
       // Membuat entitas baru dengan menyertakan nilai 'ukuran' dari input
        DataUkuran::create([
            'kode_ukuran' => $kodeUkuran,
            'nama_ukuran' => $request->nama_ukuran,
           
        ]);
        $kodeUkuran++;

        return redirect()->route('ukuran.index')->with('success','Data berhasil disimpan');
    }

    public function editukuran ($kode_ukuran){
        $data = DataUkuran::where('kode_ukuran', $kode_ukuran)->first();
        return  view('ukuran.editukuran',compact('data'));
    }

    public function updateukuran (Request $request,$kode_ukuran){
        $data = DataUkuran::where('kode_ukuran', $kode_ukuran)->first();
    if (!$data) {
        // Data tidak ditemukan, tambahkan logika penanganan di sini
        abort(404);
    }
    $data->update($request->all());
        return redirect()->route('ukuran.index')->with('success','Data berhasil di update');
    } 

    public function deleteukuran ($kode_ukuran){
        /*$data = DataUkuran::find($kode_ukuran);
        $data->delete();
        return redirect()->route('ukuran.index')->with('success','Data berhasil dihapus');*/

        $updateStatus = DataUkuran::where('kode_ukuran', $kode_ukuran)
        ->update([
            'status' => 0
        ]);
        return redirect()->route('ukuran.index')->with('success','Data berhasil dihapus');
    }
}
