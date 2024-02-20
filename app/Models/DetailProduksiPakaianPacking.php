<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailProduksiPakaianPacking extends Model
{
    use HasFactory;
    protected $table = 'detail_produksi_pakaian_packings';
    protected $primaryKey = 'kode_detail_produksipakaian_packing';
    public $incrementing = false;
    protected $fillable = [
        'kode_detail_produksipakaian_packing',
        'kode_produksipakaian_packing',
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

    public function R_KeProduksiPakaianPacking(){
        return $this ->belongsTo(ProduksiPakaianPacking::class,'kode_produksipakaian_packing','kode_produksipakaian_packing');
    }

    public function R_KeUser(){
        return $this ->belongsTo(User::class,'id_user','id');
    }
}
