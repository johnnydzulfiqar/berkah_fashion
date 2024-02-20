<?php

namespace App\Http\Controllers;

use App\Models\ProduksiPakaian;
use App\Models\ProduksiPakaianJahit;
use App\Models\ProduksiPakaianPacking;
use App\Models\RencanaProduksi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ProductionReportController extends Controller
{

    public function index (){

        // Ambil data berdasarkan tanggal dari masing-masing tabel
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $rencanaProduksiData = RencanaProduksi::whereBetween('tgl_awal', [$start_date, $end_date])->get();
        $produksiCuttingData = ProduksiPakaian::whereBetween('tanggal_awal', [$start_date, $end_date])->get();
        $produksiJahitData = ProduksiPakaianJahit::whereBetween('tanggal_awal', [$start_date, $end_date])->get();
        $produksiPackingData = ProduksiPakaianPacking::whereBetween('tanggal_awal', [$start_date, $end_date])->get();
        return view('laporan-produksi.index');
    }


    public function generateReport(Request $request)
    {
        // Ambil data berdasarkan tanggal dari masing-masing tabel
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $rencanaProduksiData = RencanaProduksi::whereBetween('tgl_awal', [$start_date, $end_date])->get();
        $produksiCuttingData = ProduksiPakaian::whereBetween('tanggal_awal', [$start_date, $end_date])->get();
        $produksiJahitData = ProduksiPakaianJahit::whereBetween('tanggal_awal', [$start_date, $end_date])->get();
        $produksiPackingData = ProduksiPakaianPacking::whereBetween('tanggal_awal', [$start_date, $end_date])->get();

        // Kirim data ke view
        $data = [
            'rencanaProduksiData' => $rencanaProduksiData,
            'produksiCuttingData' => $produksiCuttingData,
            'produksiJahitData' => $produksiJahitData,
            'produksiPackingData' => $produksiPackingData,
        ];

        // Buat file PDF dari view blade
       // $pdf = PDF::loadView('laporan-produksi', $data);

        // Simpan atau kirim PDF sesuai kebutuhan
        //return $pdf->download('laporan-produksi.pdf');
    }

    public function generatePDF(Request $request)
{
    // Ambil data dari database atau sumber lain
    $data = [
        'rencanaProduksiData' => RencanaProduksi::all(),
        'produksiCuttingData' => ProduksiPakaian::all(),
        'produksiJahitData' => ProduksiPakaianJahit::all(),
        'produksiPackingData' => ProduksiPakaianPacking::all(),
    ];

    // Load view dan data ke dalam PDF
    $pdf = PDF::loadView('laporan-produksi', $data);

    // Simpan atau kirimkan PDF sesuai kebutuhan
    return $pdf->download('laporan_produksi.pdf');
}
}
