<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBeliBahanBaku extends Model
{
    use HasFactory;
    protected $table = 'detail_beli_bahan_bakus';
    protected $primaryKey = 'kode_detail_belibahanbaku';
    public $incrementing = false;
    protected $fillable = [
        'kode_detail_belibahanbaku',
        'kode_belibahanbaku',
        'kode_bahanbaku',
        'kode_warna',
        'kode_satuan',
        'jumlah_beli',
        'keterangan',
    ];

    public function R_KeBeliBahanBaku(){
        return $this -> belongsTo(BeliBahanBaku::class,'kode_belibahanbaku','kode_belibahanbaku');
    }

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
