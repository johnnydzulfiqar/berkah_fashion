<?php

namespace App\Http\Controllers;

use App\Models\StatusBeli;
use App\Models\StatusProduksi;
use Illuminate\Http\Request;

class StatusProduksiController extends Controller
{
    public function index (){
        $data = StatusProduksi::all();
        return view('status-produksi.index',compact('data'));
    }
    public function create(){
        return view('status-produksi.tambahstatus');
    }

    public function insert(Request $request){
        
        $request->validate([
            'kode_statusproduksi' => 'required|numeric',
            'status_produksi' => 'required',
        ],[
            'kode_statusproduksi.required' => 'kode status harus diisi',
            'kode_statusproduksi.numeric' => 'kode status harus angka',
            'status_produksi.required' => 'nama status harus diisi',
        ]);
        
       // Membuat entitas baru dengan menyertakan nilai 'ukuran' dari input
        StatusProduksi::create([
            'kode_statusproduksi' =>$request->kode_statusproduksi,
            'status_produksi' => $request->status_produksi,
           
        ]);
        return redirect()->route('status-produksi.index')->with('success','Data berhasil disimpan');
    }

    public function edit($kode_statusproduksi)
{
    $data = StatusProduksi::where('kode_statusproduksi', $kode_statusproduksi)->first();

    if (!$data) {
        // Tambahkan logika penanganan jika data tidak ditemukan, misalnya redirect atau pesan error
        return redirect()->route('status-beli.index')->with('error', 'Data tidak ditemukan');
    }

    return view('status-produksi.editstatus', compact('data'));
}
    public function update(Request $request, $kode_statusproduksi)
    {
        $data = StatusProduksi::where('kode_statusproduksi', $kode_statusproduksi)->first();
        if (!$data) {
            // Tambahkan logika penanganan jika data tidak ditemukan, misalnya redirect atau pesan error
            return redirect()->route('status-produksi.index')->with('error', 'Data tidak ditemukan');
        }
        // Hapus _token dari data request karena tidak perlu disimpan dalam database
        $requestData = $request->except('_token');
        $data->update($requestData);
        return redirect()->route('status-produksi.index')->with('success', 'Data berhasil diupdate');
    }

    public function delete($kode_statusproduksi){
        $data = StatusProduksi::find($kode_statusproduksi);
        $data ->delete();
        return redirect()->route('status-produksi.index')->with('success','Data Berhasil Dihapus');
    }
}
