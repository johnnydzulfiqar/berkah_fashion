<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduksiPakaian extends Model
{
    use HasFactory;
    protected $table = 'produksi_pakaian_cuttings';
    protected $primaryKey = 'kode_produksipakaian_cutting';
    public $incrementing = false;
    protected $dates = ['tanggal_selesai'];
    protected $fillable = [
        'kode_produksipakaian_cutting',
        'kode_rencanaproduksi',
        'nama_produk',
        'warna_produk',
        'ukuran_produk',
        'jumlah_rencanaproduksi',
        'total_jumlahberhasil',
        'total_jumlahgagal',
        'total_produksi_pakaian',
        'status_produksi_cutting',
        'tanggal_awal',
        'tanggal_selesai',
    ];

    public function R_KeRencanaProduksi(){
        return $this -> belongsTo(RencanaProduksi::class,'kode_rencanaproduksi','kode_rencanaproduksi');
    }
    //Fungsi ini menuju ke tabel DetailProduksiPakaianCutting
    public function R_KeDetailProduksiPakaianCutting(){
        return $this -> hasMany(DetailProduksiPakaian::class,'kode_produksipakaian_cutting','kode_produksipakaian_cutting');
    }
    public function R_KeDetailRencanaProduksi(){
        return $this -> hasMany(DetailRencanaProduksi::class,'kode_produksipakaian','kode_produksipakaian');
    }
    public function R_KeStatusProduksi(){
        return $this -> belongsTo(StatusProduksi::class,'status_produksi','status_produksi');
    }

    

    

}