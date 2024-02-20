<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduksiPakaianPacking extends Model
{
    use HasFactory;
    protected $table = 'produksi_pakaian_packings';
    protected $primaryKey = 'kode_produksipakaian_packing';
    public $incrementing = false;
    protected $dates = ['tanggal_selesai'];
    protected $fillable = [
        'kode_produksipakaian_packing',
        'kode_rencanaproduksi',
        'total_berhasil_darijahit',
        'nama_produk',
        'warna_produk',
        'ukuran_produk',
        'jumlah_rencanaproduksi',
        'total_jumlahberhasil',
        'total_jumlahgagal',
        'total_produksi_pakaian',
        'status_produksi_packing',
        'tanggal_awal',
        'tanggal_selesai',
    ];

    public function R_KeRencanaProduksi(){
        return $this ->belongsTo(RencanaProduksi::class,'kode_rencanaproduksi','kode_rencanaproduksi');
    }

    //Fungsi ini menuju ke tabel DetailProduksiPakaianJahit
    public function R_KeDetailProduksiPakaianJahit(){
        return $this ->hasMany(DetailProduksiPakaianPacking::class,'kode_produksipakaian_packing','kode_produksipakaian_packing');
    }

    public function R_KeStatusProduksi(){
        return $this ->belongsTo(StatusProduksi::class,'status_produksi','status_produksi');
    }
}
