<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailProduksiPakaian extends Model
{
    use HasFactory;
    protected $table = 'detail_produksi_pakaian_cuttings';
    protected $primaryKey = 'kode_detail_produksipakaian_cutting';
    public $incrementing = false;
    protected $fillable = [
        'kode_detail_produksipakaian_cutting',
        'kode_produksipakaian_cutting',
        'kode_rencanaproduksi',
        'id_user',
        'tanggal_kerja',
        'nama_produk',
        'warna_produk',
        'ukuran_produk',
        'jumlah_rencanaproduksi',
        'jumlah_berhasil',
        'jumlah_gagal',
        'total_berhasildangagal',
        'upah_kerja',
    ];

    public function R_KeProduksiPakaian(){
        return $this -> belongsTo(ProduksiPakaian::class,'kode_produksipakaian_cutting','kode_produksipakaian_cutting');
    }


    public function R_KeUser(){
        return $this ->belongsTo(User::class,'id_user','id');
    }
}
