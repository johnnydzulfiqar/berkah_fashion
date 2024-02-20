<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RencanaProduksi extends Model
{
    use HasFactory; 
    protected $table = 'rencana_produksis';
    protected $primaryKey = 'kode_rencanaproduksi';
    public $incrementing = false;
    protected $fillable = [
        'kode_rencanaproduksi',
        'kode_produk',
        'kode_warnaproduk',
        'kode_ukuranproduk',
        'tgl_awal',
        'tgl_akhir',
        'biaya_cutting',
        'biaya_jahit',
        'biaya_packing',
        'jumlah_rencanaproduksi',
        'status_produksi',
    ];
    public function R_KeProduk()
    {
        return $this->belongsTo(DataProduk::class, 'kode_produk', 'kode_produk');
    }
    public function R_KeWarna()
    {
        return $this->belongsTo(DataWarna::class, 'kode_warnaproduk', 'kode_warna');
    }
    public function R_KeUkuran()
    {
        return $this->belongsTo(DataUkuran::class, 'kode_ukuranproduk', 'kode_ukuran');
    }
    public function R_KeStatusProduksi()
    {
        return $this->belongsTo(StatusProduksi::class, 'status_produksi', 'kode_statusproduksi');
    }
    public function R_KeDetailRencanaProduksi()
    {
        return $this->hasMany(DetailRencanaProduksi::class, 'kode_rencanaproduksi', 'kode_rencanaproduksi');
    }

    public function R_ProduksiPakaianCutting()
    {
        return $this->hasOne(ProduksiPakaian::class, 'kode_rencanaproduksi', 'kode_rencanaproduksi');
    }

    public function R_ProduksiPakaianJahit()
    {
        return $this->hasOne(ProduksiPakaianJahit::class, 'kode_rencanaproduksi', 'kode_rencanaproduksi');
    }
    public function R_ProduksiPakaianPacking()
    {
        return $this->hasOne(ProduksiPakaianPacking::class, 'kode_rencanaproduksi', 'kode_rencanaproduksi');
    }
}
