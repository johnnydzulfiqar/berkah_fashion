<?php

namespace App\Http\Controllers;

use App\Models\DetailRestock;
use App\Models\Restock;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class LaporanRestockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $kodeRestock = Restock::with('R_KeDetailRestock')->orderBy('created_at','desc')->get();

        return view('laporan-restock.index',compact('kodeRestock'));
    }

    public function filter(Request $request){

        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $kodeRestock = Restock::with('R_KeDetailRestock')
                                            ->whereDate('tgl_restock','>=',$start_date)
                                            ->whereDate('tgl_restock','<=',$end_date)
                                            ->orderBy('created_at','desc')
                                            ->get();
                                            
        $details = DetailRestock::whereIn('kode_restock', $kodeRestock->pluck('kode_restock'))->get();
        return view('laporan-restock.pdf',compact('kodeRestock','details'));
    }

    public function cetak(Request $request)
    {
        $tglSekarang = Carbon::now()->format('j F Y');
        // Ambil data berdasarkan tanggal dari masing-masing tabel
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $kodeRestock = Restock::with('R_KeDetailRestock','R_KeDetailRestock')
        ->whereDate('tgl_restock','>=',$start_date)
        ->whereDate('tgl_restock','<=',$end_date)
        ->orderBy('created_at','desc')
        ->get();

        $details = DetailRestock::whereIn('kode_restock', $kodeRestock->pluck('kode_restock'))
        ->orderBy('created_at','desc')
        ->get();

        // Load view cetak.blade.php dan kirimkan data
        $pdf = PDF::loadView('laporan-restock.cetak', compact('tglSekarang', 'details', 'kodeRestock','start_date','end_date'));

        // Tampilkan PDF di browser
        return $pdf->stream('laporan-restock.cetak');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
