<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokBahanBaku extends Model
{
    use HasFactory;
    protected $table = 'stok_bahan_bakus';
    protected $primaryKey = 'kode_stokbahanbaku';
    public $incrementing = false;
    protected $fillable = [
        'kode_stokbahanbaku',
        'kode_bahanbaku',
        'kode_warna',
        'kode_satuan',
        'stok_bahanbaku',
    ];
    
    public function R_KeBahanBaku(){
        return $this -> belongsTo(DataBahanBaku::class,'kode_bahanbaku','kode_bahanbaku');
    }
    public function R_KeWarna(){
        return $this -> belongsTo(DataWarna::class,'kode_warna','kode_warna');
    }
    public function R_KeSatuan(){
        return $this -> belongsTo(DataSatuan::class,'kode_satuan','kode_satuan');
    }
}
