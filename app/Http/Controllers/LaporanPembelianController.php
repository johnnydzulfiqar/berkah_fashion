<?php

namespace App\Http\Controllers;

use App\Models\BeliBahanBaku;
use App\Models\DetailBeliBahanBaku;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class LaporanPembelianController extends Controller
{

    public function index(Request $request)
    {

        $kodePembelians = BeliBahanBaku::with('detailBeliBahanBakus','R_KeStatusBeli')->orderBy('created_at','desc')->get();

        return view('laporan-pembelian.index',compact('kodePembelians'));
    }

    public function filter(Request $request){

        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $kodePembelians = BeliBahanBaku::with('detailBeliBahanBakus','R_KeStatusBeli')
                                            ->whereDate('tgl_beli','>=',$start_date)
                                            ->whereDate('tgl_beli','<=',$end_date)
                                            ->orderBy('created_at','desc')
                                            ->get();
                                            
        $details = DetailBeliBahanBaku::whereIn('kode_belibahanbaku', $kodePembelians->pluck('kode_belibahanbaku'))->get();
        return view('laporan-pembelian.pdf',compact('kodePembelians','details'));
    }

    public function cetak(Request $request)
    {
        $tglSekarang = Carbon::now()->format('j F Y');
        // Ambil data berdasarkan tanggal dari masing-masing tabel
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $kodePembeliansStatus1 = BeliBahanBaku::with('detailBeliBahanBakus', 'R_KeStatusBeli')
        ->whereDate('tgl_beli', '>=', $start_date)
        ->whereDate('tgl_beli', '<=', $end_date)
        ->where('status_beli', 1)
        ->orderBy('created_at', 'desc')
        ->get();
    
    $kodePembeliansStatus2 = BeliBahanBaku::with('detailBeliBahanBakus', 'R_KeStatusBeli')
        ->whereDate('tgl_beli', '>=', $start_date)
        ->whereDate('tgl_beli', '<=', $end_date)
        ->where('status_beli', 2)
        ->orderBy('created_at', 'desc')
        ->get();
    
    $kodePembelians = $kodePembeliansStatus1->merge($kodePembeliansStatus2);

        // Load view cetak.blade.php dan kirimkan data
        $pdf = PDF::loadView('laporan-pembelian.cetak', compact('tglSekarang', 'kodePembelians','start_date','end_date'));

        // Tampilkan PDF di browser
        return $pdf->stream('laporan-pembelian.cetak');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
