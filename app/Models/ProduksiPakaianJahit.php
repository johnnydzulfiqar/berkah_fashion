<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduksiPakaianJahit extends Model
{
    use HasFactory;
    protected $table = 'produksi_pakaian_jahits';
    protected $primaryKey = 'kode_produksipakaian_jahit';
    public $incrementing = false;
    protected $dates = ['tanggal_selesai'];
    protected $fillable = [
        'kode_produksipakaian_jahit',
        'kode_rencanaproduksi',
        'total_berhasil_daricutting',
        'nama_produk',
        'warna_produk',
        'ukuran_produk',
        'jumlah_rencanaproduksi',
        'total_jumlahberhasil',
        'total_jumlahgagal',
        'total_produksi_pakaian',
        'status_produksi_jahit',
        'tanggal_awal',
        'tanggal_selesai',
    ];

    public function R_KeRencanaProduksi(){
        return $this -> belongsTo(RencanaProduksi::class,'kode_rencanaproduksi','kode_rencanaproduksi');
    }

    //Fungsi ini menuju ke tabel DetailProduksiPakaianJahit
    public function R_KeDetailProduksiPakaianJahit(){
        return $this ->hasMany(DetailProduksiPakaianJahit::class,'kode_produksipakaian_jahit','kode_produksipakaian_jahit');
    }
    public function R_KeDetailRencanaProduksi(){
        return $this ->hasMany(DetailRencanaProduksi::class,'kode_produksipakaian','kode_produksipakaian');
    }
    public function R_KeStatusProduksi(){
        return $this ->belongsTo(StatusProduksi::class,'status_produksi','status_produksi');
    }
}
