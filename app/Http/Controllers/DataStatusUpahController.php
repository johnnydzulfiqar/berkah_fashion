<?php

namespace App\Http\Controllers;

use App\Models\DataStatusUpah;
use Illuminate\Http\Request;

class DataStatusUpahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index (){
        $data = DataStatusUpah::orderBy('created_at','desc')->get();
        return view('statusupah.index',compact('data'));
    }
    public function create(){
        return view('statusupah.tambahstatus');
    }

    public function insert(Request $request){
        
        $request->validate([
            'kode_statusupah|number' => 'required',
            'status_upah' => 'required|alpha',
        ], [
            'kode_statusupah.number' => 'kode harus angka',
            'kode_statusupah.required' => 'kode harus diisi',
            'status_upah.required' => 'status harus diisi',
            'status_upah.alpha' => 'status harus huruf',
        ]);

       // Membuat entitas baru dengan menyertakan nilai 'ukuran' dari input
        DataStatusUpah::create([
            'kode_statusupah' =>$request->kode_statusupah,
            'status_upah' => $request->status_upah,
           
        ]);
        return redirect()->route('status-upah.index')->with('success','Data berhasil disimpan');
    }

    public function edit($kode_statusupah)
{
    $data = DataStatusUpah::where('kode_statusupah', $kode_statusupah)->first();

    if (!$data) {
        // Tambahkan logika penanganan jika data tidak ditemukan, misalnya redirect atau pesan error
        return redirect()->route('status-upah.index')->with('error', 'Data tidak ditemukan');
    }

    return view('statusupah.editstatus', compact('data'));
}
    public function update(Request $request, $kode_statusupah)
    {
        $data = DataStatusUpah::where('kode_statusupah', $kode_statusupah)->first();
        if (!$data) {
            // Tambahkan logika penanganan jika data tidak ditemukan, misalnya redirect atau pesan error
            return redirect()->route('status-upah.index')->with('error', 'Data tidak ditemukan');
        }
        // Hapus _token dari data request karena tidak perlu disimpan dalam database
        $requestData = $request->except('_token');
        $data->update($requestData);
        return redirect()->route('status-upah.index')->with('success', 'Data berhasil diupdate');
    }

    public function delete($kode_statusupah){
        $data = DataStatusUpah::find($kode_statusupah);
        $data ->delete();
        return redirect()->route('status-upah.index')->with('success','Data Berhasil Dihapus');
    }
}
