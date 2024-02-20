<?php

namespace App\Http\Controllers;

use App\Models\DataBahanBaku;
use App\Models\StokBahanBaku;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanStokBahanBakuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    { 

        $kodeBahanBaku = DataBahanBaku::with('R_KeWarna','R_KeSatuan')
        ->orderBy('created_at','desc')
        ->get();

        return view('laporan-stokbahanbaku.index',compact('kodeBahanBaku'));
    }

    public function cetak(Request $request)
    {
        $kodeBahanBaku = DataBahanBaku::with('R_KeWarna','R_KeSatuan')
        ->orderBy('created_at','desc')
        ->get();

        // Load view cetak.blade.php dan kirimkan data
        $pdf = PDF::loadView('laporan-stokbahanbaku.cetak', compact('kodeBahanBaku'));

        // Tampilkan PDF di browser
        return $pdf->stream('laporan-stokbahanbaku.cetak');
    }
}
