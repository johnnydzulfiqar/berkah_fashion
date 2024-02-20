<?php

namespace App\Http\Controllers;

use App\Models\DataProduk;
use App\Models\DataUkuran;
use App\Models\DataWarna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataProdukController extends Controller
{
    public function index (){
        $dataproduk = DataProduk::with('R_KeWarna','R_KeUkuran')
        ->orderBy('created_at','desc')
        ->get();
        return view('produk.index',compact('dataproduk'));
    }
    public function tambahproduk (){

        $dataWarna = DataWarna::all()->pluck('nama_warna', 'kode_warna');
        $dataUkuran = DataUkuran::all()->pluck('nama_ukuran', 'kode_ukuran');
        return view('produk.tambahproduk',compact('dataWarna','dataUkuran'));
    }


    private function generateKodeProduk()
    {
        $lastNumber = $this->getLastProdukNumber();
        $newNumber = $lastNumber + 1;
        $formattedNumber = str_pad($newNumber, 5, '0', STR_PAD_LEFT);
    
        return 'PRODUK-' . $formattedNumber;
    }


   private function generateUniqueKodeProduk()
   {
       do {
           $kodeProduk = $this->generateKodeProduk();
       } while ($this->isKodeDetailExists($kodeProduk));
   
       return $kodeProduk;
   }

   private function getLastProdukNumber()
   {
    $lastProdukNumber = DataProduk::latest('kode_produk')->first();
    return $lastProdukNumber ? intval(substr($lastProdukNumber->kode_produk, -5)) : 0;
   }

   private function isKodeDetailExists($kodeProduk)
   {
       return DB::table('data_produks')->where('kode_produk', $kodeProduk)->exists();
   }


    public function insertproduk (Request $request){
        // Validasi input jika diperlukan
        $request->validate([
            'nama_produk' => 'required',
            'kode_warna' => 'required',
            'kode_ukuran' => 'required',
        ],[
            'nama_produk.required' => 'produk harus diisi',
            'kode_warna.required' => 'silahkan pilih warna',
            'kode_ukuran.required' => 'silahkan pilih ukuran',
        ]);

       
        $kodeProduk = $this->generateUniqueKodeProduk();
        Dataproduk::create([
            'kode_produk' => $kodeProduk,
            'nama_produk' => $request->nama_produk,
            'warna_produk' => $request->nama_produk,
            'kode_warna' => $request->kode_warna,
            'kode_ukuran' => $request->kode_ukuran,
            'keterangan' => $request->keterangan,
           
        ]);
        $kodeProduk++;

        return redirect()->route('produk.index')->with('success','Data berhasil disimpan');
    }

    public function editproduk ($kode_produk){

        $dataWarna = DataWarna::all();
        $dataUkuran = DataUkuran::all();
        $data = Dataproduk::where('kode_produk', $kode_produk)->first();
        return  view('produk.editproduk',compact('data','dataWarna','dataUkuran'));
    }

    public function updateproduk (Request $request,$kode_produk){
        $data = Dataproduk::where('kode_produk', $kode_produk)->first();
    if (!$data) {
        // Data tidak ditemukan, tambahkan logika penanganan di sini
        abort(404);
    }
    $data->update($request->all());
        return redirect()->route('produk.index')->with('success','Data berhasil di update');
    } 

    public function deleteproduk ($kode_produk){
        $data = Dataproduk::find($kode_produk);
        $data->delete();
        return redirect()->route('produk.index')->with('success','Data berhasil dihapus');
    }
}
