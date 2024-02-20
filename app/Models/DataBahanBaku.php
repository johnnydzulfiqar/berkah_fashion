<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBahanBaku extends Model
{
    use HasFactory;
    protected $table = 'data_bahanbakus';
    protected $primaryKey = 'kode_bahanbaku';
    public $incrementing = false;
    protected $fillable = [
        'kode_bahanbaku',
        'nama_bahanbaku',
        'kode_warna',
        'kode_satuan',
        'stok',
        'keterangan',
    ];
    
    public function R_KeWarna(){
        return $this -> belongsTo(DataWarna::class,'kode_warna','kode_warna');
    }
    public function R_KeSatuan(){
        return $this -> belongsTo(DataSatuan::class,'kode_satuan','kode_satuan');
    }
}
