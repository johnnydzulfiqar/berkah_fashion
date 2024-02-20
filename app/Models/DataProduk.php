<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataProduk extends Model
{
    use HasFactory;
    protected $table = 'data_produks';
    protected $primaryKey = 'kode_produk';
    public $incrementing = false;
    protected $fillable = [
        'kode_produk',
        'nama_produk',
        'kode_warna',
        'kode_ukuran',
        'keterangan',
    ];

    public function R_KeWarna(){
        return $this -> belongsTo(DataWarna::class,'kode_warna','kode_warna');
    }
    public function R_KeUkuran(){
        return $this -> belongsTo(DataUkuran::class,'kode_ukuran','kode_ukuran');
    }

    public function R_KeRencanaProduksi(){
        return $this -> belongsTo(RencanaProduksi::class,'kode_produk','kode_produk');
    }
}
