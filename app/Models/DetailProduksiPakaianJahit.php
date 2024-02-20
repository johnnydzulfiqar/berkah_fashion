<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailProduksiPakaianJahit extends Model
{
    use HasFactory;
    protected $table = 'detail_produksi_pakaian_jahits';
    protected $primaryKey = 'kode_detail_produksipakaian_jahit';
    public $incrementing = false;
    protected $fillable = [
        'kode_detail_produksipakaian_jahit',
        'kode_produksipakaian_jahit',
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

    public function R_KeProduksiPakaianJahit(){
        return $this ->belongsTo(ProduksiPakaianJahit::class,'kode_produksipakaian_jahit','kode_produksipakaian_jahit');
    }

    public function R_KeUser(){
        return $this ->belongsTo(User::class,'id_user','id');
    }
}
