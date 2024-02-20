<?php

namespace App\Http\Controllers;

use App\Models\StatusBeli;
use Illuminate\Http\Request;

class StatusBeliController extends Controller
{
    public function index()
    {
        $data = StatusBeli::all();
        return view('status-beli.index', compact('data'));
    }

    public function create()
    {
        return view('status-beli.tambahstatus');
    }

    public function insert(Request $request)
    {
        $request->validate([
            'kode_statusbeli' => 'required|numeric',
            'status_beli' => 'required',
        ],[
            'kode_statusbeli.required' => 'kode status harus diisi',
            'kode_statusbeli.numeric' => 'kode status harus angka',
            'status_beli.required' => 'nama status harus diisi',
        ]);

        StatusBeli::create([
            'kode_statusbeli' => $request->kode_statusbeli,
            'status_beli' => $request->status_beli,
        ]);

        return redirect()->route('status-beli.index')->with('success', 'Data berhasil disimpan');
    }

    public function edit($kode_statusbeli)
    {
        $data = StatusBeli::where('kode_statusbeli', $kode_statusbeli)->first();

        if (!$data) {
            return redirect()->route('status-beli.index')->with('error', 'Data tidak ditemukan');
        }

        return view('status-beli.editstatus', compact('data'));
    }

    public function update(Request $request, $kode_statusbeli)
    {
        $data = StatusBeli::where('kode_statusbeli', $kode_statusbeli)->first();

        if (!$data) {
            return redirect()->route('status-beli.index')->with('error', 'Data tidak ditemukan');
        }

        $request->validate([
            'kode_statusbeli' => 'required',
            'status_beli' => 'required',
        ]);

        $data->update([
            'kode_statusbeli' => $request->kode_statusbeli,
            'status_beli' => $request->status_beli,
        ]);

        return redirect()->route('status-beli.index')->with('success', 'Data berhasil diupdate');
    }

    public function delete($kode_statusbeli)
    {
        $data = StatusBeli::find($kode_statusbeli);
        StatusBeli::destroy($kode_statusbeli);
        return redirect()->route('status-beli.index')->with('success','Data berhasil Dihapus');
    }
}
