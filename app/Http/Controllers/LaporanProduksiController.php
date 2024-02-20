<?php

namespace App\Http\Controllers;

use App\Models\ProduksiPakaian;
use App\Models\ProduksiPakaianJahit;
use App\Models\ProduksiPakaianPacking;
use App\Models\RencanaProduksi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class LaporanProduksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        /*
        // Ambil data berdasarkan tanggal dari masing-masing tabel
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $rencanaProduksiData = RencanaProduksi::whereBetween('tgl_awal', [$start_date, $end_date])->get();
        $produksiCuttingData = ProduksiPakaian::whereBetween('tanggal_awal', [$start_date, $end_date])->get();
        $produksiJahitData = ProduksiPakaianJahit::whereBetween('tanggal_awal', [$start_date, $end_date])->get();
        $produksiPackingData = ProduksiPakaianPacking::whereBetween('tanggal_awal', [$start_date, $end_date])->get();
        */

        $kodeRencanaProduksis = RencanaProduksi::with('R_KeStatusProduksi', 'R_ProduksiPakaianCutting','R_ProduksiPakaianJahit','R_ProduksiPakaianPacking','R_KeProduk','R_KeWarna','R_KeUkuran')
        ->orderBy('created_at','desc')
        ->get();

        return view('laporan-produksi.index',compact('kodeRencanaProduksis'));
    }

    public function filter(Request $request){

        $start_date = $request->start_date;
        $end_date = $request->end_date;


        //$kodeRencanaProduksis = RencanaProduksi::with('R_KeStatusProduksi', 'R_ProduksiPakaianCutting','R_ProduksiPakaianJahit','R_ProduksiPakaianPacking','R_KeProduk','R_KeWarna','R_KeUkuran')->get();
        $kodeRencanaProduksis = RencanaProduksi::whereDate('tgl_awal','>=',$start_date)
                                            ->whereDate('tgl_awal','<=',$end_date)
                                            ->orderBy('created_at','desc')
                                            ->get();
        return view('laporan-produksi.pdf',compact('kodeRencanaProduksis'));
    }

    public function cetak(Request $request)
    {

        $tglSekarang = Carbon::now()->format('j F Y');
        
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $kodeRencanaProduksis = RencanaProduksi::whereDate('tgl_awal','>=',$start_date)
                                            ->whereDate('tgl_awal','<=',$end_date)
                                            ->orderBy('created_at','desc')
                                            ->get();

        // Load view cetak.blade.php dan kirimkan data
        $pdf = PDF::loadView('laporan-produksi.cetak', compact('tglSekarang', 'kodeRencanaProduksis','start_date','end_date'));

        // Tampilkan PDF di browser
        return $pdf->stream('laporan-produksi.cetak');
    }
    
}