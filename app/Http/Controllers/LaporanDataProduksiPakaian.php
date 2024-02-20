<?php

namespace App\Http\Controllers;

use App\Models\ProduksiPakaianPacking;
use App\Models\RencanaProduksi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanDataProduksiPakaian extends Controller
{
    public function index(Request $request)
    { 

        $sudahPacking = ProduksiPakaianPacking::with('R_KeRencanaProduksi')
        ->orderBy('created_at','desc')
        ->get();

        return view('laporan-dataproduksi-pakaian.index',compact('sudahPacking'));
    }

    public function cetak(Request $request)
    {
        $sudahPacking = ProduksiPakaianPacking::with('R_KeRencanaProduksi')
        ->orderBy('created_at','desc')
        ->get();

        // Load view cetak.blade.php dan kirimkan data
        $pdf = PDF::loadView('laporan-dataproduksi-pakaian.cetak', compact('sudahPacking'));

        // Tampilkan PDF di browser
        return $pdf->stream('laporan-dataproduksi-pakaian.cetak');
    }
}
